<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Charts\MonthlyUsersChart;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\DB;

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

        // Usage analytics logic
        $activities = DB::table('user_activities')->select([
            DB::raw('HOUR(created_at) as hour'),
            DB::raw('COUNT(*) as count')
        ])->groupBy('hour')->get();

        // Return the view with both sets of data
        return view('user.admin-sales', [
            'predictions' => $predictions,
            'activities' => $activities
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
