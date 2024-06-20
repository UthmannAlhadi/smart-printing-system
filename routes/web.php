<?php

use App\Http\Controllers\PrintJobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\StripePaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/image', [ProfileController::class, 'showImageForm'])->name('profile.image');
    Route::post('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.image.update');

    // Print Job
    Route::get('/user/print-upload', [PrintJobController::class, 'displayUpload'])->name('user.print-upload');
    Route::get('/user/print-explain', [PrintJobController::class, 'displayExplain'])->name('user.print-explain');
    Route::get('/user/print-preference', [PrintJobController::class, 'displayPreference'])->name('user.print-preference');
    Route::get('/user/print-preview', [PrintJobController::class, 'displayPreview'])->name('user.print-preview');
    Route::get('/user/print-history', [PrintJobController::class, 'displayPrintHistory'])->name('user.print-history');
    Route::get('/user/admin-print-job', [PrintJobController::class, 'displayAdminPrintJob'])->name('user.admin-print-job');
    Route::get('/user/admin-receipt', [PrintJobController::class, 'displayAdminReceipt'])->name('user.admin-receipt');
    Route::get('/user/admin-set-printer', [PrintJobController::class, 'displayAdminSetPrinter'])->name('user.admin-set-printer');
    Route::get('/user/track-order', [PrintJobController::class, 'displayTrackOrder'])->name('user.track-order');
    Route::get('/user/admin-track-order', [PrintJobController::class, 'displayAdminTrackOrder'])->name('user.admin-track-order');


    // Upload File
    Route::get('/user/print-upload', [TrainingController::class, 'getTrainingList'])->name('user.print-upload');
    Route::post('/user.print-upload', [TrainingController::class, 'postAddTraining'])->name('user.print-upload');
    Route::get('/user/training-form', [TrainingController::class, 'getTrainingForm'])->name('user.training-form');
    Route::get('/user/training-list', [TrainingController::class, 'getTrainingList'])->name('user.training-list');
    Route::get('/user/print-preview', [TrainingController::class, 'printPreview'])->name('user.print-preview');
    Route::post('/user/print-preview', [TrainingController::class, 'printPreview'])->name('user.print-preview'); //test
    Route::post('/user/add-training', [TrainingController::class, 'postAddTraining'])->name('user.add-training');
    Route::post('/user/delete-training', [TrainingController::class, 'DeleteTraining'])->name('user.delete-training');
    Route::post('/user/update-document-display', [TrainingController::class, 'updateDocumentDisplay'])->name('user.update-document-display');
    Route::post('user/update-preferences', [TrainingController::class, 'updatePreferences'])->name('user.update-preferences');
    Route::post('user/cancel-preview', [TrainingController::class, 'cancelPreview'])->name('user.cancel-preview');

    // Payment method
    Route::get('/checkout', [StripePaymentController::class, 'checkout'])->name('checkout');
    Route::get('/payment-success', [StripePaymentController::class, 'success'])->name('payment.success');
    Route::get('/print-history', [StripePaymentController::class, 'printHistory'])->name('user.print-history');
    Route::get('/admin-print-history', [StripePaymentController::class, 'adminPrintHistory'])->name('user.admin-print-history');
    Route::get('/admin-update-order', [StripePaymentController::class, 'adminUpdateOrder'])->name('user.admin-update-order');
    Route::post('/update-payment', [StripePaymentController::class, 'updatePayment'])->name('update.payment');
    Route::post('/delete-order', [StripePaymentController::class, 'deleteOrder'])->name('delete.order');
    Route::post('/upload-receipt', [StripePaymentController::class, 'uploadReceipt'])->name('upload.receipt');
    Route::get('/user/admin-receipt', [StripePaymentController::class, 'index'])->name('user.admin-receipt');
    Route::get('/track-order', [StripePaymentController::class, 'trackOrder'])->name('user.track-order');
    Route::get('/admin-track-order', [StripePaymentController::class, 'adminTrackOrder'])->name('user.admin-track-order');
    Route::post('/update-order-progress', [StripePaymentController::class, 'updateOrderProgress'])->name('update.order.progress');






    // Dashboard Admin

    // Route::get('/user/admin-sales', [UserController::class, 'predictPython'])->name('user.admin-sales');


    // Admin Sales
    Route::get('/user/admin-sales', [UserController::class, 'index'])->name('user.admin-sales');
    Route::get('/user/admin-sales', [UserController::class, 'getPredictions'])->name('user.admin-sales');




    // Admin Set Printer




});

require __DIR__ . '/auth.php';
