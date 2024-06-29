<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Charts\MonthlyUsersChart;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\DB;
use App\Notifications\CopiesExceededNotification;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(MonthlyUsersChart $chart)
    {
        return view('user.admin-sales', ['chart' => $chart->build()]);
    }

    public function getPredictions()
    {
        // Define the path to the Python script
        $scriptPath = base_path('predict_model.py');

        // Execute the Python script
        $process = new Process(['python', $scriptPath]);
        $process->run();

        // Check if the process ran successfully
        if (!$process->isSuccessful()) {
            \Log::error('Python script failed: ' . $process->getErrorOutput());
            throw new ProcessFailedException($process);
        }

        // Get the output from the script
        $output = $process->getOutput();
        \Log::info('Python script output: ' . $output); // Logging for debugging

        // Decode the JSON output
        $predictions = json_decode($output, true);
        \Log::info('Decoded predictions: ' . print_r($predictions, true)); // Logging for debugging

        // Ensure predictions is an array
        if (is_null($predictions) || !is_array($predictions)) {
            $predictions = [];
        }

        // Save predictions to the database
        foreach ($predictions as $day => $predictedCopies) {
            DB::table('predictions')->updateOrInsert(
                ['day' => $day],
                ['predicted_copies' => $predictedCopies, 'created_at' => now(), 'updated_at' => now()]
            );
        }

        // Calculate total predicted copies
        $totalPredictedCopies = array_sum($predictions);

        // Usage analytics logic
        $activities = DB::table('user_activities')->select([
            DB::raw('DAYNAME(created_at) as day_of_week'),
            DB::raw('COUNT(*) as count')
        ])->groupBy(DB::raw('DAYNAME(created_at)'))->get()->keyBy('day_of_week');


        // Get the total number of copies printed today
        $todayCopies = DB::table('trainings')
            ->whereDate('created_at', now()->toDateString())
            ->sum('copies');

        // Check if today's copies exceed the predicted total for the week
        if ($todayCopies > $totalPredictedCopies) {
            $user = auth()->user(); // Or any user you want to notify
            $user->notify(new CopiesExceededNotification($totalPredictedCopies, $todayCopies));

            // Set session variable to indicate copies exceeded
            session()->flash('copies_exceeded', true);
        }

        // Return the view with both sets of data
        return view('user.admin-sales', [
            'predictions' => $predictions,
            'totalPredictedCopies' => $totalPredictedCopies,
            'activities' => $activities->toArray()
        ]);

    }





    public function predictPython()
    {
        // Execute the Python script
        $command = escapeshellcmd('python C:\laragon\www\Test1\predict_model.py');
        $output = shell_exec($command);

        // Decode the JSON output
        $predictions = json_decode($output, true);

        // Pass the predictions to the view
        return view('user.admin-sales', compact('predictions'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
