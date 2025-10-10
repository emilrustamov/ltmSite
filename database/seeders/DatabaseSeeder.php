<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаем администратора
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@ltm.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'admin' => 1,
            'email_verified_at' => now(),
        ]);
    }
}
