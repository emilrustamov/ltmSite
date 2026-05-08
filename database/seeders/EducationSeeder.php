<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            [
                'name_ru' => 'Среднее общее',
                'name_en' => 'Secondary general',
                'name_tm' => 'Orta umumy',
                'slug' => 'secondary-general',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name_ru' => 'Среднее профессиональное',
                'name_en' => 'Secondary vocational',
                'name_tm' => 'Orta hünär',
                'slug' => 'secondary-vocational',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name_ru' => 'Высшее образование',
                'name_en' => 'Higher education',
                'name_tm' => 'Ýokary bilim',
                'slug' => 'higher-education',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($educations as $education) {
            Education::firstOrCreate(['slug' => $education['slug']], $education);
        }
    }
}
