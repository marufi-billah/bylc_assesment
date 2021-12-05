<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Default Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'phone' => '01711121212',
        ]);
        User::create([
            'name' => 'Default Employee',
            'email' => 'employee@example.com',
            'password' => Hash::make('password'),
            'phone' => '01711121212',
            'role' => 'employee',
        ]);
        User::create([
            'name' => 'Default Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone' => '01711121212',
            'role' => 'admin',
        ]);
    }
}
