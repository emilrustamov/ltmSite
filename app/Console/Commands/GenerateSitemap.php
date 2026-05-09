<?php

namespace App\Console\Commands;

use App\Services\Sitemap\SitemapBuilder;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap for the website';

    /**
     * @return int
     */
    public function handle(SitemapBuilder $sitemapBuilder): int
    {
        $baseUrl = rtrim((string) config('app.url'), '/');

        if ($baseUrl === '' || str_contains($baseUrl, 'localhost') || str_contains($baseUrl, 'ltm.local')) {
            $baseUrl = 'https://ltm.studio';
        }

        $sitemapBuilder->build($baseUrl)->writeToFile(public_path('sitemap.xml'));
        $this->info('Sitemap generated successfully at public/sitemap.xml');

        return self::SUCCESS;
    }
}
