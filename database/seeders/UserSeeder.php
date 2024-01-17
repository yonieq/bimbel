<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        // user
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false
        ]);
    }
}
