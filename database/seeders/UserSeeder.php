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
        $user = User::create([
            'name' => "user",
            'email' => "user@gmail.com",
            'password' => "admin123"
        ]);

        $user->assignRole('user');

        $admin = User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => "admin123"
        ]);

        $admin->assignRole('admin');
    }
}
