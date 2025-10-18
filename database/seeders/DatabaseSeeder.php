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
            // 1. Сначала создаем разрешения
            PermissionSeeder::class,
            
            // 2. Создаем администратора с правами
            AdminUserSeeder::class,
            
            // 3. Заполняем справочные данные для заявок
            SourceSeeder::class,          // Источники заявок
            EducationSeeder::class,       // Образование
            ApplicationDataSeeder::class, // Должности, навыки, языки, города, форматы работы
            
            // 4. Заполняем ВСЕ данные портфолио из дампа
            FullDataSeeder::class,        // Очищает и заполняет все портфолио, категории и связи
            
            // 5. Обновляем только поля result для существующих портфолио (БЕЗОПАСНО)
            UpdatePortfolioResultsSeeder::class,  // Обновляет только описания результатов
            
            // 6. Обновляем только поля description для существующих портфолио (БЕЗОПАСНО)
            UpdatePortfolioDescriptionsSeeder::class,  // Обновляет только краткие описания
        ]);
    }
}