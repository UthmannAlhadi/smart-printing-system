<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datetime = Carbon::now()->toDateTimeString();
        //
        DB::table('users')->insert([
            'user_id' => '1',
            'name' => 'Admin',
            'email' => 'ziegersshop@gmail.com',
            'password' => Hash::make('admin12345'),
            'role' => 'admin',
            'email_verified_at' => $datetime,
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ]);

        DB::table('users')->insert([
            'user_id' => '2',
            'name' => 'Syuraeem',
            'email' => 'syuraeem2901@gmail.com',
            'password' => Hash::make('user12345'),
            'role' => 'customer',
            'email_verified_at' => $datetime,
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ]);

        DB::table('users')->insert([
            'user_id' => '3',
            'name' => 'Ikhwan',
            'email' => 'ikhwan@gmail.com',
            'password' => Hash::make('user12345'),
            'role' => 'customer',
            'email_verified_at' => $datetime,
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ]);

        DB::table('users')->insert([
            'user_id' => '4',
            'name' => 'guest1',
            'email' => 'guest@example.com',
            'role' => 'guest',
            'password' => Hash::make('12345678'),
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ]);

    }
}
