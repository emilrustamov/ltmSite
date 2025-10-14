<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;
use App\Models\CategoryTranslation;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'slug' => 'bitrix',
                'translations' => [
                    'tm' => 'Bitrix',
                    'ru' => 'Bitrix',
                    'en' => 'Bitrix',
                ],
                'created_at' => '2024-04-25 14:17:43',
                'updated_at' => '2024-04-26 13:07:43',
            ],
            [
                'id' => 2,
                'slug' => 'lending',
                'translations' => [
                    'tm' => 'Lending',
                    'ru' => 'Лендинг',
                    'en' => 'Landing',
                ],
                'created_at' => '2024-04-25 13:17:43',
                'updated_at' => '2024-04-26 13:24:43',
            ],
            [
                'id' => 3,
                'slug' => 'multipage-website',
                'translations' => [
                    'tm' => 'Köp sahypaly web',
                    'ru' => 'Многостраничник',
                    'en' => 'MultiPage Website',
                ],
                'created_at' => '2024-04-25 13:45:43',
                'updated_at' => '2024-04-26 13:37:43',
            ],
            [
                'id' => 5,
                'slug' => 'mobile-applications',
                'translations' => [
                    'tm' => 'Mobil applikasiýalar',
                    'ru' => 'Мобильные Приложения',
                    'en' => 'Mobile Applications',
                ],
                'created_at' => '2024-04-25 13:55:43',
                'updated_at' => '2024-04-26 13:09:43',
            ],
            [
                'id' => 6,
                'slug' => 'online-shop',
                'translations' => [
                    'tm' => 'Internet Magazin',
                    'ru' => 'Интернет Магазин',
                    'en' => 'Online Shop',
                ],
                'created_at' => '2024-04-25 13:07:43',
                'updated_at' => '2024-04-26 13:17:43',
            ],
            [
                'id' => 7,
                'slug' => 'web-catalog',
                'translations' => [
                    'tm' => 'Katalog web-sahypa',
                    'ru' => 'Сайт каталог',
                    'en' => 'WebCatalog',
                ],
                'created_at' => '2024-04-25 13:23:43',
                'updated_at' => '2024-04-26 13:12:43',
            ],
        ];

        foreach ($categories as $categoryData) {
            $translations = $categoryData['translations'];
            unset($categoryData['translations']);
            
            // Создаем категорию
            $category = Categories::updateOrCreate(
                ['id' => $categoryData['id']],
                $categoryData
            );
            
            // Создаем переводы
            foreach ($translations as $locale => $name) {
                CategoryTranslation::updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'locale' => $locale,
                    ],
                    [
                        'name' => $name,
                    ]
                );
            }
        }
    }
}