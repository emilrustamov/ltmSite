<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Portfolio;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap for the website';

    public function handle()
    {
        $baseUrl = rtrim(config('app.url'), '/'); // убираем завершающий слэш на всякий
        $langs   = ['ru', 'en', 'tm'];
        $sitemap = Sitemap::create();

        // 1. Главная для каждой локали
        foreach ($langs as $lang) {
            $full = "{$baseUrl}/{$lang}/";
            $url = Url::create($full)
                ->setPriority(1.0)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setLastModificationDate(now());

            foreach ($langs as $alt) {
                $url->addAlternate("{$baseUrl}/{$alt}/", $alt);
            }

            $sitemap->add($url);
        }

        // 2. Список портфолио
        foreach ($langs as $lang) {
            $full = "{$baseUrl}/{$lang}/portfolio/";
            $url  = Url::create($full)
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setLastModificationDate(now());

            foreach ($langs as $alt) {
                $url->addAlternate("{$baseUrl}/{$alt}/portfolio/", $alt);
            }

            $sitemap->add($url);
        }

        // 3. Отдельные проекты
        Portfolio::all()->each(function ($item) use ($sitemap, $langs, $baseUrl) {
            foreach ($langs as $lang) {
                $full = "{$baseUrl}/{$lang}/portfolio/{$item->slug}";
                $url  = Url::create($full)
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setLastModificationDate($item->updated_at);

                foreach ($langs as $alt) {
                    $url->addAlternate("{$baseUrl}/{$alt}/portfolio/{$item->slug}", $alt);
                }

                $sitemap->add($url);
            }
        });

        // 4. Статические страницы
        $static = [
            'services'  => [0.8, Url::CHANGE_FREQUENCY_MONTHLY],
            'bitrix24'  => [0.7, Url::CHANGE_FREQUENCY_MONTHLY],
            'about_us'  => [0.6, Url::CHANGE_FREQUENCY_YEARLY],
            'contacts'  => [0.5, Url::CHANGE_FREQUENCY_YEARLY],
        ];

        foreach ($static as $page => [$prio, $freq]) {
            foreach ($langs as $lang) {
                $full = "{$baseUrl}/{$lang}/{$page}";
                // если нужно, добавить завершающий слэш: "{$full}/"
                $url  = Url::create($full)
                    ->setPriority($prio)
                    ->setChangeFrequency($freq)
                    ->setLastModificationDate(now());

                foreach ($langs as $alt) {
                    $url->addAlternate("{$baseUrl}/{$alt}/{$page}", $alt);
                }

                $sitemap->add($url);
            }
        }

        // Запись в файл
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at public/sitemap.xml');
    }
}
