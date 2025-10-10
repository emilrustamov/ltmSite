<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'slug' => 'web-development',
                'name_ru' => 'Веб-разработка',
                'name_en' => 'Web Development',
                'name_tm' => 'Web ösdürmek',
            ],
            [
                'slug' => 'mobile-app',
                'name_ru' => 'Мобильное приложение',
                'name_en' => 'Mobile Application',
                'name_tm' => 'Ykjam programma',
            ],
            [
                'slug' => 'design',
                'name_ru' => 'Дизайн',
                'name_en' => 'Design',
                'name_tm' => 'Dizaýn',
            ],
            [
                'slug' => 'crm-system',
                'name_ru' => 'CRM система',
                'name_en' => 'CRM System',
                'name_tm' => 'CRM ulgamy',
            ],
            [
                'slug' => 'e-commerce',
                'name_ru' => 'Интернет-магазин',
                'name_en' => 'E-Commerce',
                'name_tm' => 'Internet dükany',
            ],
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}

