<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Source;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = [
            [
                'name_ru' => 'LinkedIn',
                'name_en' => 'LinkedIn',
                'name_tm' => 'LinkedIn',
                'slug' => 'linkedin',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name_ru' => 'Instagram',
                'name_en' => 'Instagram',
                'name_tm' => 'Instagram',
                'slug' => 'instagram',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name_ru' => 'Google',
                'name_en' => 'Google',
                'name_tm' => 'Google',
                'slug' => 'google',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name_ru' => 'Информационный портал (turkmenportal, business.tm)',
                'name_en' => 'Information portal (turkmenportal, business.tm)',
                'name_tm' => 'Maglumat portaly (turkmenportal, business.tm)',
                'slug' => 'information-portal',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name_ru' => 'Кадровое агентство',
                'name_en' => 'Recruitment agency',
                'name_tm' => 'Kadr agentligi',
                'slug' => 'recruitment-agency',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($sources as $source) {
            Source::firstOrCreate(['slug' => $source['slug']], $source);
        }
    }
}
