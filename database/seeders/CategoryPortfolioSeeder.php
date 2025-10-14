<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryPortfolios = [
            [
                'id' => 84,
                'portfolio_id' => 95,
                'category_id' => 2, // Лендинг
                'created_at' => '2024-12-09 11:25:25',
                'updated_at' => '2024-12-09 11:25:25',
            ],
            [
                'id' => 65,
                'portfolio_id' => 101,
                'category_id' => 5, // Мобильные приложения
                'created_at' => '2024-10-09 05:23:30',
                'updated_at' => '2024-10-09 05:23:30',
            ],
        ];

        foreach ($categoryPortfolios as $categoryPortfolio) {
            DB::table('category_portfolio')->updateOrInsert(
                ['id' => $categoryPortfolio['id']],
                $categoryPortfolio
            );
        }
    }
}
