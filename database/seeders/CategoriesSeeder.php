<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;
use App\Models\CategoryTranslation;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'slug' => 'web-development',
                'translations' => [
                    'ru' => 'Веб-разработка',
                    'en' => 'Web Development',
                    'tm' => 'Web ösdürmek',
                ],
            ],
            [
                'slug' => 'mobile-app',
                'translations' => [
                    'ru' => 'Мобильное приложение',
                    'en' => 'Mobile Application',
                    'tm' => 'Ykjam programma',
                ],
            ],
            [
                'slug' => 'design',
                'translations' => [
                    'ru' => 'Дизайн',
                    'en' => 'Design',
                    'tm' => 'Dizaýn',
                ],
            ],
            [
                'slug' => 'crm-system',
                'translations' => [
                    'ru' => 'CRM система',
                    'en' => 'CRM System',
                    'tm' => 'CRM ulgamy',
                ],
            ],
            [
                'slug' => 'e-commerce',
                'translations' => [
                    'ru' => 'Интернет-магазин',
                    'en' => 'E-Commerce',
                    'tm' => 'Internet dükany',
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            // Создаем категорию
            $category = Categories::create([
                'slug' => $categoryData['slug'],
            ]);

            // Создаем переводы для каждого языка
            foreach ($categoryData['translations'] as $locale => $name) {
                CategoryTranslation::create([
                    'category_id' => $category->id,
                    'locale' => $locale,
                    'name' => $name,
                ]);
            }
        }
    }
}

