<?php

namespace App\Http\Controllers;

use Stripe\StripeClient;
use Stripe\Webhook;
use App\Models\Payment; // Your Payment model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Training;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StripePaymentController extends Controller
{
    //

    public function checkout(Request $request)
    {

        $price = session()->get('total_price');
        if (!$price) {
            return redirect()->back()->withErrors(['error' => 'Price not found.']);
        }

        $paymentMethod = $request->input('payment_method');
        $orderId = $this->generateOrderId(); // Generate a unique order ID
        $currentTime = Carbon::now('Asia/Kuala_Lumpur'); // Get the current timestamp
        $userId = auth()->user()->user_id; // Get the authenticated user's ID

        // Store the order ID and total price in the trainings table
        $trainingIds = session()->get('uploaded_training_ids');
        DB::table('trainings')->whereIn('id', $trainingIds)->update([
            'order_id' => $orderId,
            'total_price' => $price,
            'time' => $currentTime,
            'payment_status' => $paymentMethod === 'cash' ? 'Pending' : 'Unpaid',
            'payment_method' => $paymentMethod,
            'user_id' => $userId, // Add the user_id here
        ]);

        // Update the order_id in the payments table
        DB::table('payments')->where('payment_method', $paymentMethod)
            ->whereNull('order_id')
            ->update(['order_id' => $orderId]);

        // Handle cash & qr payment separately
        if ($paymentMethod === 'cash' || $paymentMethod === 'qr') {
            // Clear session data related to print-preview and training-list
            session()->forget(['total_price', 'trainings', 'uploaded_training_ids']);
            Session::forget('printing_color_option');
            Session::forget('layout_option');
            Session::forget('copies');
            Session::forget('total_price');
            Session::forget('trainings');
            Session::forget('uploaded_training_ids');
            Session::forget('total_pages');
            Session::forget('training_page');
            Session::forget('page');
            Session::forget('image_path');
            Session::forget('training');

            \Log::info('Session data after clearing in checkout (' . $paymentMethod . '): ', session()->all());
            return redirect()->route('user.print-history');
        }

        $stripeSecret = env('STRIPE_SECRET');
        \Log::info('STRIPE_SECRET value: ' . $stripeSecret);
        $stripe = new StripeClient($stripeSecret);

        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'unit_amount' => $price * 100,
                        'product_data' => [
                            'name' => 'Print Service',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['order_id' => $orderId]),
            'cancel_url' => route('user.print-preview'),
            'metadata' => [
                'order_id' => $orderId, // Pass the order ID to Stripe
            ],
        ]);

        // Debugging to log session data before clearing
        \Log::info('Session data before clearing in checkout: ', session()->all());

        // Clear session data related to print-preview and training-list
        session()->forget(['total_price', 'trainings', 'uploaded_training_ids']);
        Session::forget('printing_color_option');
        Session::forget('layout_option');
        Session::forget('copies');
        Session::forget('total_price');
        Session::forget('trainings');
        Session::forget('uploaded_training_ids');
        Session::forget('total_pages');
        Session::forget('training_page');
        Session::forget('page');
        Session::forget('image_path');
        Session::forget('training');

        // Debugging to log session data after clearing
        \Log::info('Session data after clearing in checkout (stripe): ', session()->all());

        return redirect()->to($session->url);
    }

    public function success(Request $request)
    {
        $orderId = $request->query('order_id');
        $userId = auth()->user()->user_id; // Get the authenticated user's ID

        if (!$orderId) {
            return redirect()->route('user.print-preview')->withErrors(['error' => 'Order ID not found.']);
        }

        // Update the payment status in the database
        DB::table('trainings')->where('order_id', $orderId)->update(['payment_status' => 'Paid']);


        // Retrieve the user's orders
        $orders = DB::table('trainings')
            ->select('order_id', DB::raw('SUM(total_price) as total_price'))
            ->where('user_id', $userId) // Filter by the authenticated user's ID
            ->where('payment_status', 'paid')
            ->groupBy('order_id')
            ->get();

        // Retrieve the user's trainings by order
        $trainingsByOrder = DB::table('trainings')
            ->where('user_id', $userId) // Filter by the authenticated user's ID
            ->whereIn('order_id', $orders->pluck('order_id'))
            ->get()
            ->groupBy('order_id');

        // Retrieve the trainings associated with this order ID
        // $trainings = Training::where('order_id', $orderId)->get();
        $trainings = Training::where('user_id', $userId)->get();

        return view('user.print-history', compact('trainings', 'orderId'));
    }

    public function printHistory()
    {
        $userId = auth()->user()->user_id; // Get the authenticated user's ID

        // Retrieve the user's orders
        $orders = DB::table('trainings')
            ->select('order_id', DB::raw('SUM(total_price) as total_price'))
            ->where('user_id', $userId) // Filter by the authenticated user's ID
            ->where('payment_status', 'paid')
            ->groupBy('order_id')
            ->get();

        // Retrieve the user's trainings by order
        $trainingsByOrder = DB::table('trainings')
            ->where('user_id', $userId) // Filter by the authenticated user's ID
            ->whereIn('order_id', $orders->pluck('order_id'))
            ->get()
            ->groupBy('order_id');

        // Retrieve all trainings for the authenticated user
        $trainings = Training::where('user_id', $userId)->get();

        return view('user.print-history', compact('orders', 'trainingsByOrder', 'trainings'));
    }

    public function adminPrintHistory()
    {
        $userId = auth()->user()->user_id; // Get the authenticated user's ID

        // Retrieve the user's orders
        $orders = DB::table('trainings')
            ->select('order_id', DB::raw('SUM(total_price) as total_price'))
            ->where('user_id', $userId) // Filter by the authenticated user's ID
            ->where('payment_status', 'paid')
            ->groupBy('order_id')
            ->get();

        // Retrieve the user's trainings by order
        $trainingsByOrder = DB::table('trainings')
            ->whereIn('order_id', $orders->pluck('order_id'))
            ->get()
            ->groupBy('order_id');

        $trainings = Training::all();

        return view('user.admin-print-history', compact('orders', 'trainingsByOrder', 'trainings'));
    }

    public function generateOrderId()
    {
        return strtoupper(Str::random(5)); // Generates a random string of 5 characters in uppercase
    }

    public function adminUpdateOrder()
    {
        // Retrieve order IDs where there's at least one training with 'pending' payment status
        $ordersWithPending = DB::table('trainings')
            ->select('order_id')
            ->where('payment_status', 'pending')
            ->groupBy('order_id')
            ->get()
            ->pluck('order_id')
            ->toArray();

        $ordersWithUnpaid = DB::table('trainings')
            ->select('order_id')
            ->where('payment_status', 'unpaid')
            ->groupBy('order_id')
            ->get()
            ->pluck('order_id')
            ->toArray();

        // Merge both arrays of order IDs
        $orderIDs = array_unique(array_merge($ordersWithPending, $ordersWithUnpaid));

        // Retrieve all trainings with order IDs that have either pending or unpaid payments
        $trainings = Training::whereIn('order_id', $orderIDs)->get();


        return view('user.admin-update-order', compact('trainings'));
    }

    public function updatePayment(Request $request)
    {
        $orderId = $request->input('order_id');
        \Log::info('Updating payment for order ID: ' . $orderId);

        if (!$orderId) {
            return redirect()->back()->withErrors(['error' => 'Order ID not found.']);
        }

        // Update the payment status in the database
        DB::table('trainings')->where('order_id', $orderId)->update(['payment_status' => 'Paid']);

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }

    public function deleteOrder(Request $request)
    {
        $orderId = $request->input('order_id');

        if (!$orderId) {
            return redirect()->back()->withErrors(['error' => 'Order ID not found.']);
        }

        // Delete the order from the database
        DB::table('trainings')->where('order_id', $orderId)->delete();

        return redirect()->back()->with('success', 'Order deleted successfully.');
    }

    public function uploadReceipt(Request $request)
    {
        $request->validate([
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'payment_method' => 'required|string',
        ]);

        if ($request->hasFile('receipt')) {
            $fileName = time() . '.' . $request->receipt->extension();
            $request->receipt->move(public_path('uploads'), $fileName);

            Payment::create([
                'receipt' => $fileName,
                'payment_method' => $request->payment_method,
            ]);

            return redirect()->route('checkout', ['payment_method' => $request->payment_method]);
        }

        return back()->with('error', 'File upload failed.');
    }

    public function index()
    {
        // Retrieve all receipts with payment method 'qr' and related training data
        $receipts = Payment::where('payment_method', 'qr')->with('training')->get();

        return view('user.admin-receipt', compact('receipts'));
    }


    public function showReceipts()
    {
        // Eager load the training data for each receipt
        $receipts = Payment::with('training')->get();
        return view('admin-receipt', compact('receipts'));
    }

    public function trackOrder()
    {
        $userId = auth()->user()->user_id; // Get the authenticated user's ID

        // Retrieve the user's pending or in progress orders
        $orders = DB::table('trainings')
            ->select('order_id', DB::raw('SUM(total_price) as total_price'))
            ->where('user_id', $userId) // Filter by the authenticated user's ID
            ->whereIn('order_progress', ['pending', 'in progress']) // Include both pending and in progress
            ->groupBy('order_id')
            ->get();

        // Retrieve the user's trainings by order
        $trainingsByOrder = DB::table('trainings')
            ->where('user_id', $userId) // Filter by the authenticated user's ID
            ->whereIn('order_id', $orders->pluck('order_id'))
            ->get()
            ->groupBy('order_id');

        // Retrieve all trainings for the authenticated user with pending or in progress status
        $trainings = Training::where('user_id', $userId)
            ->whereIn('order_progress', ['pending', 'in progress']) // Include both pending and in progress
            ->get();

        return view('user.track-order', compact('orders', 'trainingsByOrder', 'trainings'));
    }


    public function adminTrackOrder()
    {
        // Retrieve order IDs where there's at least one training with 'pending' or 'in progress' order progress
        $ordersWithPending = DB::table('trainings')
            ->select('order_id')
            ->whereIn('order_progress', ['pending', 'in progress'])
            ->groupBy('order_id')
            ->get()
            ->pluck('order_id')
            ->toArray();

        // Retrieve all trainings with order IDs that have either pending or in-progress status
        $trainings = Training::whereIn('order_id', $ordersWithPending)->get();


        return view('user.admin-track-order', compact('trainings'));
    }

    public function updateOrderProgress(Request $request)
    {
        $orderId = $request->input('order_id');
        $orderProgress = $request->input('order_progress');
        \Log::info('Updating order progress for order ID: ' . $orderId);

        if (!$orderId) {
            return redirect()->back()->withErrors(['error' => 'Order ID not found.']);
        }

        // Update the order progress in the database
        DB::table('trainings')->where('order_id', $orderId)->update(['order_progress' => $orderProgress]);

        return redirect()->back()->with('success', 'Order progress updated successfully.');
    }

}
