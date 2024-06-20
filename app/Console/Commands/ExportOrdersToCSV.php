<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Training;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ExportOrdersToCSV extends Command
{
    protected $signature = 'export:orders';
    protected $description = 'Export orders data to a CSV file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Fetch data from the 'trainings' table
        $orders = DB::table('trainings')
            ->select('created_at', 'copies', 'total_price', 'time')
            ->get();

        // Define the file path
        $filePath = storage_path('app/orders.csv');

        // Open file in write mode
        $file = fopen($filePath, 'w');

        // Write the header
        fputcsv($file, ['created_at', 'copies', 'total_price', 'time']);

        // Write data rows
        foreach ($orders as $order) {
            fputcsv($file, [
                $order->created_at,
                $order->copies,
                $order->total_price,
                $order->time
            ]);
        }

        // Close the file
        fclose($file);

        // Provide feedback
        $this->info('Orders data has been exported successfully to ' . $filePath);
    }
}
