<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobPosition;
use App\Models\TechnicalSkill;
use App\Models\WorkFormat;
use App\Models\Language;
use App\Models\City;

class VacancyDataSeeder extends Seeder
{
    public function run(): void
    {
        // Заполняем должности
        $jobPositions = [
            ['name_ru' => 'Менеджер по работе с клиентами', 'name_en' => 'Client Relations Manager', 'slug' => 'client-manager', 'sort_order' => 1],
            ['name_ru' => 'Frontend разработчик', 'name_en' => 'Frontend Developer', 'slug' => 'frontend-developer', 'sort_order' => 2],
            ['name_ru' => 'Backend-разработчик', 'name_en' => 'Backend Developer', 'slug' => 'backend-developer', 'sort_order' => 3],
            ['name_ru' => 'Flutter разработчик', 'name_en' => 'Flutter Developer', 'slug' => 'flutter-developer', 'sort_order' => 4],
            ['name_ru' => 'UI/UX дизайнер', 'name_en' => 'UI/UX Designer', 'slug' => 'ui-ux-designer', 'sort_order' => 5],
            ['name_ru' => 'Тимлид', 'name_en' => 'Team Lead', 'slug' => 'team-lead', 'sort_order' => 6],
        ];

        foreach ($jobPositions as $position) {
            JobPosition::firstOrCreate(['slug' => $position['slug']], $position);
        }

        // Заполняем технические навыки
        $technicalSkills = [
            ['name_ru' => 'JavaScript / TypeScript', 'name_en' => 'JavaScript / TypeScript', 'slug' => 'javascript-typescript', 'sort_order' => 1],
            ['name_ru' => 'Python', 'name_en' => 'Python', 'slug' => 'python', 'sort_order' => 2],
            ['name_ru' => 'PHP', 'name_en' => 'PHP', 'slug' => 'php', 'sort_order' => 3],
            ['name_ru' => 'Dart (Flutter)', 'name_en' => 'Dart (Flutter)', 'slug' => 'dart-flutter', 'sort_order' => 4],
            ['name_ru' => 'Java', 'name_en' => 'Java', 'slug' => 'java', 'sort_order' => 5],
            ['name_ru' => 'C#', 'name_en' => 'C#', 'slug' => 'csharp', 'sort_order' => 6],
            ['name_ru' => 'Vue.js', 'name_en' => 'Vue.js', 'slug' => 'vuejs', 'sort_order' => 7],
            ['name_ru' => 'React', 'name_en' => 'React', 'slug' => 'react', 'sort_order' => 8],
            ['name_ru' => 'TailwindCSS', 'name_en' => 'TailwindCSS', 'slug' => 'tailwindcss', 'sort_order' => 9],
            ['name_ru' => 'Laravel (PHP)', 'name_en' => 'Laravel (PHP)', 'slug' => 'laravel-php', 'sort_order' => 10],
            ['name_ru' => 'Node.js / Express', 'name_en' => 'Node.js / Express', 'slug' => 'nodejs-express', 'sort_order' => 11],
            ['name_ru' => 'AdonisJS', 'name_en' => 'AdonisJS', 'slug' => 'adonisjs', 'sort_order' => 12],
        ];

        foreach ($technicalSkills as $skill) {
            TechnicalSkill::firstOrCreate(['slug' => $skill['slug']], $skill);
        }

        // Заполняем форматы работы
        $workFormats = [
            ['name_ru' => 'Офисный', 'name_en' => 'Office', 'sort_order' => 1],
            ['name_ru' => 'Гибридный', 'name_en' => 'Hybrid', 'sort_order' => 2],
            ['name_ru' => 'Удаленный', 'name_en' => 'Remote', 'sort_order' => 3],
        ];

        foreach ($workFormats as $format) {
            WorkFormat::firstOrCreate(['name_ru' => $format['name_ru']], $format);
        }

        // Заполняем языки
        $languages = [
            ['name_ru' => 'Русский язык', 'name_en' => 'Russian', 'name_tm' => 'Rus dili', 'code' => 'ru', 'sort_order' => 1],
            ['name_ru' => 'Туркменский язык', 'name_en' => 'Turkmen', 'name_tm' => 'Türkmen dili', 'code' => 'tm', 'sort_order' => 2],
            ['name_ru' => 'Английский язык', 'name_en' => 'English', 'name_tm' => 'Iňlis dili', 'code' => 'en', 'sort_order' => 3],
        ];

        foreach ($languages as $language) {
            Language::firstOrCreate(['code' => $language['code']], $language);
        }

        // Заполняем города
        $cities = [
            ['name_ru' => 'Ашхабад', 'name_en' => 'Ashgabat', 'name_tm' => 'Aşgabat', 'sort_order' => 1],
            ['name_ru' => 'Мары', 'name_en' => 'Mary', 'name_tm' => 'Mary', 'sort_order' => 2],
            ['name_ru' => 'Туркменабад', 'name_en' => 'Turkmenabat', 'name_tm' => 'Türkmenabat', 'sort_order' => 3],
        ];

        foreach ($cities as $city) {
            City::firstOrCreate(['name_ru' => $city['name_ru']], $city);
        }
    }
}