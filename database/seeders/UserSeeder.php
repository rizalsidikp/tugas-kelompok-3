<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'name' => "Staff",
            'email' => 'staff@gmail.com',
            'password' => Hash::make('staff123'),
            'role' => 'staff',
            'is_admin' => false
        ]);

        DB::table('users')->insert([
            'name' => "Customer",
            'email' => 'customer@gmail.com',
            'password' => Hash::make('cs123'),
            'role' => 'customer',
            'is_admin' => false
        ]);

        DB::table('users')->insert([
            'name' => "Customer2",
            'email' => 'customer2@gmail.com',
            'password' => Hash::make('cs123'),
            'role' => 'customer',
            'is_admin' => false
        ]);
    }
}