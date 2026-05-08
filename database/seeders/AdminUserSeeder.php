<?php

namespace Database\Seeders;

use App\Constants\Permissions;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем администратора
        $admin = User::firstOrCreate(
            ['email' => 'admin@ltm.com'],
            [
                'name' => 'Администратор',
                'password' => Hash::make('password123'),
            ]
        );

        // Даем администратору все разрешения
        $allPermissions = Permissions::getAllPermissions();
        $admin->syncPermissions($allPermissions);
    }
}
