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
        $admin = User::firstOrCreate(
            ['email' => 'admin@ltm.com'],
            [
                'name' => 'Администратор',
                'password' => Hash::make('password123'),
            ]
        );

        $secondAdmin = User::firstOrCreate(
            ['email' => 'erustamow2@gmail.com'],
            [
                'name' => 'E Rustamow',
                'password' => Hash::make('883F5o!ZPY6ikcWfk9'),
            ]
        );

        $allPermissions = Permissions::getAllPermissions();
        $admin->syncPermissions($allPermissions);
        $secondAdmin->syncPermissions($allPermissions);
    }
}
