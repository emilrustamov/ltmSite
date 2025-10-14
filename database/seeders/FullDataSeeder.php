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
        // Очищаем таблицы в правильном порядке (с учетом внешних ключей)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('category_portfolio')->truncate();
        DB::table('portfolio_translations')->truncate();
        DB::table('category_translations')->truncate();
        DB::table('portfolio')->truncate();
        DB::table('categories')->truncate();
        DB::table('users')->truncate();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        // Запускаем все сидеры в правильном порядке
        $this->call([
            UsersSeeder::class,                    // Сначала пользователи
            CategoriesSeeder::class,               // Затем категории
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
