<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Portfolio;
use App\Models\PortfolioTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoPortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Categories::with('translations')
            ->where('status', true)
            ->get();

        if ($categories->isEmpty()) {
            $this->command?->warn('⚠️  DemoPortfolioSeeder: активные категории не найдены, демо-портфолио не созданы.');
            return;
        }

        foreach ($categories as $category) {
            $categoryNames = [
                'ru' => $category->translation('ru')->name ?? Str::headline($category->slug),
                'en' => $category->translation('en')->name ?? Str::headline($category->slug),
                'tm' => $category->translation('tm')->name ?? Str::headline($category->slug),
            ];

            for ($i = 1; $i <= 2; $i++) {
                $slug = "demo-{$category->slug}-{$i}";

                $portfolio = Portfolio::updateOrCreate(
                    ['slug' => $slug],
                    [
                        'photo' => '',
                        'url_button' => null,
                        'when' => now()->subDays(random_int(30, 540)),
                        'status' => true,
                        'is_main_page' => false,
                        'ordering' => 200 + $i,
                    ]
                );

                $translations = [
                    'ru' => [
                        'title' => "Демо {$categoryNames['ru']} #{$i}",
                        'who' => 'Демо клиент',
                        'description' => "Тестовый проект №{$i} в категории {$categoryNames['ru']}.",
                        'target' => "<p>Цель: показать возможности категории {$categoryNames['ru']}.</p>",
                        'result' => "<p>Результат: демонстрационный кейс подготовлен.</p>",
                    ],
                    'en' => [
                        'title' => "Demo {$categoryNames['en']} Project #{$i}",
                        'who' => 'Demo Client',
                        'description' => "Sample project {$i} in the {$categoryNames['en']} category.",
                        'target' => "<p>Goal: showcase the capabilities of the {$categoryNames['en']} category.</p>",
                        'result' => "<p>Result: demo case study delivered.</p>",
                    ],
                    'tm' => [
                        'title' => "Demo {$categoryNames['tm']} Taslama #{$i}",
                        'who' => 'Demo Müşderi',
                        'description' => "Demo taslama {$i}, {$categoryNames['tm']} kategoriýasynda.",
                        'target' => "<p>Maksat: {$categoryNames['tm']} kategoriýasynyň mümkinçiliklerini görkezmek.</p>",
                        'result' => "<p>Netije: demo taslama üstünlikli görkezildi.</p>",
                    ],
                ];

                foreach ($translations as $locale => $payload) {
                    PortfolioTranslation::updateOrCreate(
                        [
                            'portfolio_id' => $portfolio->id,
                            'locale' => $locale,
                        ],
                        $payload
                    );
                }

                $portfolio->categories()->syncWithoutDetaching([$category->id]);
            }
        }
    }
}

