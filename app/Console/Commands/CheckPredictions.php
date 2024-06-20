<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CopiesExceededNotification;
use App\Models\User;


use Illuminate\Console\Command;

class CheckPredictions extends Command
{
    protected $signature = 'check:predictions';
    protected $description = 'Check if daily copies exceed the predictions and notify';

    public function handle()
    {
        $predictions = DB::table('predictions')->get();
        $date = now()->toDateString();

        $dailyCopies = DB::table('daily_copies')->whereDate('date', $date)->first();
        $dailyTotal = $dailyCopies ? $dailyCopies->total_copies : 0;

        foreach ($predictions as $prediction) {
            if ($dailyTotal > $prediction->predicted_copies) {
                // Send notification to the users
                $users = User::all();
                Notification::send($users, new CopiesExceededNotification($dailyTotal, $prediction->predicted_copies));
            }
        }

        $this->info('Predictions checked successfully.');
    }
}
