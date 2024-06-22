<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datetime = Carbon::now()->toDateTimeString();

        // Customer 1
        DB::table('trainings')->insert([
            'user_id' => '2',
            'created_at' => $datetime,
            'updated_at' => $datetime,
            'photo' => 'training_01_0000.jpg',
            'printing_color_option' => '2',
            'layout_option' => 'potrait',
            'copies' => '4',
            'order_id' => 'ZKHWD',
            'payment_status' => 'Paid',
            'total_price' => '0.8',
            'time' => $datetime,
            'payment_method' => 'stripe',
            'order_progress' => 'pending',
        ]);

        DB::table('trainings')->insert([
            'user_id' => '2',
            'created_at' => $datetime,
            'updated_at' => $datetime,
            'photo' => 'training_02_0000.jpg',
            'printing_color_option' => '1',
            'layout_option' => 'landscape',
            'copies' => '6',
            'order_id' => 'UGHXD',
            'payment_status' => 'Unpaid',
            'total_price' => '0.6',
            'time' => $datetime,
            'payment_method' => 'stripe',
            'order_progress' => 'pending',
        ]);

        // Customer 2
        DB::table('trainings')->insert([
            'user_id' => '3',
            'created_at' => $datetime,
            'updated_at' => $datetime,
            'photo' => 'training_03_0000.jpg',
            'printing_color_option' => '2',
            'layout_option' => 'potrait',
            'copies' => '6',
            'order_id' => 'JJKIO',
            'payment_status' => 'Paid',
            'total_price' => '1.2',
            'time' => $datetime,
            'payment_method' => 'stripe',
            'order_progress' => 'pending',
        ]);

        DB::table('trainings')->insert([
            'user_id' => '3',
            'created_at' => $datetime,
            'updated_at' => $datetime,
            'photo' => 'training_04_0000.jpg',
            'printing_color_option' => '1',
            'layout_option' => 'landscape',
            'copies' => '4',
            'order_id' => 'WERNF',
            'payment_status' => 'Unpaid',
            'total_price' => '0.4',
            'time' => $datetime,
            'payment_method' => 'stripe',
            'order_progress' => 'pending',
        ]);
    }
}
