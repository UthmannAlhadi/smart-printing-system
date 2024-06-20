<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;

use Illuminate\Console\Command;

class CalculateDailyCopies extends Command
{
    protected $signature = 'calculate:daily-copies';
    protected $description = 'Calculate the total copies printed each day';

    public function handle()
    {
        $date = now()->toDateString();
        $totalCopies = DB::table('trainings')
            ->whereDate('created_at', $date)
            ->sum('copies');

        DB::table('daily_copies')->updateOrInsert(
            ['date' => $date],
            ['total_copies' => $totalCopies, 'created_at' => now(), 'updated_at' => now()]
        );

        $this->info('Daily copies calculated successfully.');
    }
}
