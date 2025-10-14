<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Запускаем все сидеры в правильном порядке
        $this->call([
            UsersSeeder::class,           // Сначала пользователи
            CategoriesSeeder::class,      // Затем категории
            PortfolioSeeder::class,       // Потом портфолио
            CategoryPortfolioSeeder::class, // И связи между ними
        ]);
    }
}