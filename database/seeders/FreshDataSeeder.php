<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreshDataSeeder extends Seeder
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
        
        // Запускаем все сидеры
        $this->call([
            UsersSeeder::class,
            CategoriesSeeder::class,
            PortfolioSeeder::class,
            CategoryPortfolioSeeder::class,
        ]);
        
        $this->command->info('✅ База данных успешно очищена и заполнена свежими данными!');
    }
}
