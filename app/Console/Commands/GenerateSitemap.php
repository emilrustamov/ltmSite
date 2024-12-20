<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap for the website';

    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
            ->getSitemap()
            ->writeToFile(public_path('sitemap.xml'));
        
        $this->info('Sitemap generated successfully!');
    }
}
