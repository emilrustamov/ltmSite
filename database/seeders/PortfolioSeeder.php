<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use App\Models\PortfolioTranslation;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'id' => 95,
                'slug' => 'nur-plastik',
                'photo' => 'portfolio-image/1744111035.png',
                'when' => '2025-10-20',
                'url_button' => 'https://nur-plastik.com/',
                'is_main_page' => 0,
                'status' => 1,
                'ordering' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Nur Plastik',
                        'who' => 'Nur Plastik',
                        'description' => 'Company entering international market',
                        'target' => '<p>Company entering international market</p>',
                        'result' => '<p>Clean, laconic website with all necessary features</p>',
                    ],
                    'ru' => [
                        'title' => 'Nur Plastik',
                        'who' => 'Nur Plastik',
                        'description' => 'Компания выходит на международный рынок',
                        'target' => '<p>Компания выходит на международный рынок</p>',
                        'result' => '<p>Чистый, лаконичный сайт со всеми необходимыми функциями</p>',
                    ],
                    'tm' => [
                        'title' => 'Nur Plastik',
                        'who' => 'Nur Plastik',
                        'description' => 'Kompaniýa halkara bazara çykýar',
                        'target' => '<p>Kompaniýa halkara bazara çykýar</p>',
                        'result' => '<p>Arassa, lakoniki sahypa ähli zerur funksiýalar bilen</p>',
                    ],
                ],
                'created_at' => '2024-10-09 05:17:53',
                'updated_at' => '2025-05-10 06:24:47',
            ],
            [
                'id' => 101,
                'slug' => 'tm-uber',
                'photo' => 'portfolio-image/FiSqleIHwCxNJp2VbBXp7ITkfFrPmJ7p2D9rLiWi.png',
                'when' => '2024-10-09',
                'url_button' => null,
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'TM Uber',
                        'who' => 'TM Uber',
                        'description' => 'Taxi service application',
                        'target' => '<p>Full-featured taxi service system</p>',
                        'result' => '<p>Complete system with web dispatcher, driver and client apps</p>',
                    ],
                    'ru' => [
                        'title' => 'TM Uber',
                        'who' => 'TM Uber',
                        'description' => 'Приложение для такси',
                        'target' => '<p>Полноценная система такси</p>',
                        'result' => '<p>Комплексная система с веб-диспетчерской и приложениями</p>',
                    ],
                    'tm' => [
                        'title' => 'TM Uber',
                        'who' => 'TM Uber',
                        'description' => 'Taksi hyzmaty üçin goşundy',
                        'target' => '<p>Doly taksi hyzmaty ulgamy</p>',
                        'result' => '<p>Web-dispetçer we goşundylar bilen doly ulgam</p>',
                    ],
                ],
                'created_at' => '2024-10-09 05:23:30',
                'updated_at' => '2025-05-10 06:31:44',
            ],
        ];

        foreach ($portfolios as $portfolioData) {
            $translations = $portfolioData['translations'];
            unset($portfolioData['translations']);
            
            // Создаем портфолио
            $portfolio = Portfolio::updateOrCreate(
                ['id' => $portfolioData['id']],
                $portfolioData
            );
            
            // Создаем переводы
            foreach ($translations as $locale => $translationData) {
                PortfolioTranslation::updateOrCreate(
                    [
                        'portfolio_id' => $portfolio->id,
                        'locale' => $locale,
                    ],
                    $translationData
                );
            }
        }
    }
}