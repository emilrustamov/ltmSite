<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,      // Сначала создаем разрешения
            AdminUserSeeder::class,       // Затем создаем администратора с правами
            FullDataSeeder::class,        // Заполняем полными данными (категории, портфолио, связи)
        ]);
    }
}