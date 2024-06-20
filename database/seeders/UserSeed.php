<?php

namespace Database\Seeders;

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
        //
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'admin@sps.com',
            'role' => 'admin',
            /*  'matric_number' => 'test',
             'exco' => 'test', */
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'role' => 'customer',
            /*  'matric_number' => 'test',
             'exco' => 'test', */
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'uthmann',
            'email' => 'uthmann@example.com',
            'role' => 'customer',
            /*  'matric_number' => 'test',
             'exco' => 'test', */
            'password' => Hash::make('12345678'),
        ]);

    }
}
