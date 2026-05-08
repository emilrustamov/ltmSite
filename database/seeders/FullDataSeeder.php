<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FullDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // БЕЗОПАСНАЯ версия - НЕ очищаем существующие данные
        // Только добавляем недостающие записи
        $this->command->info('🔄 Добавляем недостающие данные портфолио...');
        
        // Запускаем все сидеры в правильном порядке
        $this->call([
            FullPortfolioSeeder::class,            // Потом все портфолио
            FullCategoryPortfolioSeeder::class,    // И все связи между ними
        ]);
        
        $this->command->info('✅ База данных успешно очищена и заполнена ВСЕМИ данными из дампа!');
        $this->command->info('📊 Создано:');
        $this->command->info('   - ' . \App\Models\User::count() . ' пользователей');
        $this->command->info('   - ' . \App\Models\Categories::count() . ' категорий');
        $this->command->info('   - ' . \App\Models\Portfolio::count() . ' проектов портфолио');
        $this->command->info('   - ' . \App\Models\CategoryTranslation::count() . ' переводов категорий');
        $this->command->info('   - ' . \App\Models\PortfolioTranslation::count() . ' переводов портфолио');
        $this->command->info('   - ' . DB::table('category_portfolio')->count() . ' связей портфолио-категории');
    }
}
