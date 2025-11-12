<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FullCategoryPortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryPortfolios = [
            // Nur Plastik (95) - Лендинг (2)
            [
                'id' => 84,
                'portfolio_id' => 95,
                'category_id' => 2,
                'created_at' => '2024-12-09 11:25:25',
                'updated_at' => '2024-12-09 11:25:25',
            ],
            // Atto (99) - Мобильные приложения (5)
            [
                'id' => 63,
                'portfolio_id' => 99,
                'category_id' => 5,
                'created_at' => '2024-10-09 05:22:11',
                'updated_at' => '2024-10-09 05:22:11',
            ],
            // TM Uber (101) - Мобильные приложения (5)
            [
                'id' => 65,
                'portfolio_id' => 101,
                'category_id' => 5,
                'created_at' => '2024-10-09 05:23:30',
                'updated_at' => '2024-10-09 05:23:30',
            ],
            // Duomouseion (102) - Лендинг (2)
            [
                'id' => 66,
                'portfolio_id' => 102,
                'category_id' => 2,
                'created_at' => '2024-10-09 05:24:52',
                'updated_at' => '2024-10-09 05:24:52',
            ],
            // Nidzhat (103) - Многостраничник (3)
            [
                'id' => 67,
                'portfolio_id' => 103,
                'category_id' => 3,
                'created_at' => '2024-10-09 05:26:19',
                'updated_at' => '2024-10-09 05:26:19',
            ],
            // Container-TM (107) - Лендинг (2)
            [
                'id' => 71,
                'portfolio_id' => 107,
                'category_id' => 2,
                'created_at' => '2024-10-22 04:23:37',
                'updated_at' => '2024-10-22 04:23:37',
            ],
            // Anima Home (108) - Мобильные приложения (5)
            [
                'id' => 72,
                'portfolio_id' => 108,
                'category_id' => 5,
                'created_at' => '2024-10-22 04:46:03',
                'updated_at' => '2024-10-22 04:46:03',
            ],
            // Tulpar (122) - Мобильные приложения (5)
            [
                'id' => 86,
                'portfolio_id' => 122,
                'category_id' => 5,
                'created_at' => '2025-04-13 14:54:14',
                'updated_at' => '2025-04-13 14:54:14',
            ],
            // Eurocosmetics (123) - Сайт каталог (6)
            [
                'id' => 85,
                'portfolio_id' => 123,
                'category_id' => 6,
                'created_at' => '2025-04-13 14:52:27',
                'updated_at' => '2025-04-13 14:52:27',
            ],
            // Nurana Bedew (124) - Bitrix (1)
            [
                'id' => 87,
                'portfolio_id' => 124,
                'category_id' => 1,
                'created_at' => '2025-04-14 14:38:31',
                'updated_at' => '2025-04-14 14:38:31',
            ],
            // Transcaspian Tours (125) - Сайт каталог (6)
            [
                'id' => 88,
                'portfolio_id' => 125,
                'category_id' => 6,
                'created_at' => '2025-04-18 14:46:40',
                'updated_at' => '2025-04-18 14:46:40',
            ],
            // Kenek (126) - Мобильные приложения (5)
            [
                'id' => 89,
                'portfolio_id' => 126,
                'category_id' => 5,
                'created_at' => '2025-04-19 13:25:34',
                'updated_at' => '2025-04-19 13:25:34',
            ],
            // Colife Invest (127) - Bitrix (1)
            [
                'id' => 90,
                'portfolio_id' => 127,
                'category_id' => 1,
                'created_at' => '2025-04-19 13:43:25',
                'updated_at' => '2025-04-19 13:43:25',
            ],
            // Takyk Abzal (128) - Bitrix (1)
            [
                'id' => 91,
                'portfolio_id' => 128,
                'category_id' => 1,
                'created_at' => '2025-04-23 10:19:59',
                'updated_at' => '2025-04-23 10:19:59',
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
