<?php

namespace App\Services\Sitemap;

use App\Models\JobPosition;
use App\Models\Portfolio;
use Carbon\CarbonInterface;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapBuilder
{
    /**
     * @var string[]
     */
    private array $languages = ['ru', 'en', 'tm'];

    /**
     * @return Sitemap
     */
    public function build(string $baseUrl): Sitemap
    {
        $sitemap = Sitemap::create();

        $this->addLocalizedPages($sitemap, $baseUrl, '', 1.0, Url::CHANGE_FREQUENCY_DAILY);
        $this->addLocalizedPages($sitemap, $baseUrl, 'portfolio', 0.9, Url::CHANGE_FREQUENCY_WEEKLY);
        $this->addLocalizedPages($sitemap, $baseUrl, 'jobs', 0.8, Url::CHANGE_FREQUENCY_DAILY);

        $staticPages = [
            'services' => [0.8, Url::CHANGE_FREQUENCY_MONTHLY],
            'bitrix24' => [0.7, Url::CHANGE_FREQUENCY_MONTHLY],
            'about_us' => [0.6, Url::CHANGE_FREQUENCY_YEARLY],
            'contacts' => [0.5, Url::CHANGE_FREQUENCY_YEARLY],
        ];

        foreach ($staticPages as $path => [$priority, $frequency]) {
            $this->addLocalizedPages($sitemap, $baseUrl, $path, $priority, $frequency);
        }

        Portfolio::query()->get()->each(function (Portfolio $portfolio) use ($sitemap, $baseUrl) {
            $this->addLocalizedPages(
                $sitemap,
                $baseUrl,
                "portfolio/{$portfolio->slug}",
                0.8,
                Url::CHANGE_FREQUENCY_WEEKLY,
                $portfolio->updated_at
            );
        });

        JobPosition::query()->where('status', true)->get()->each(function (JobPosition $jobPosition) use ($sitemap, $baseUrl) {
            $this->addLocalizedPages(
                $sitemap,
                $baseUrl,
                "jobs/{$jobPosition->id}",
                0.7,
                Url::CHANGE_FREQUENCY_WEEKLY,
                $jobPosition->updated_at
            );
        });

        return $sitemap;
    }

    /**
     * @param CarbonInterface|null $lastModificationDate
     * @return void
     */
    private function addLocalizedPages(
        Sitemap $sitemap,
        string $baseUrl,
        string $path,
        float $priority,
        string $frequency,
        ?CarbonInterface $lastModificationDate = null
    ): void {
        $normalizedPath = trim($path, '/');
        $suffix = $normalizedPath === '' ? '/' : "/{$normalizedPath}";
        $lastModificationDate = $lastModificationDate ?? now();

        foreach ($this->languages as $language) {
            $url = Url::create("{$baseUrl}/{$language}{$suffix}")
                ->setPriority($priority)
                ->setChangeFrequency($frequency)
                ->setLastModificationDate($lastModificationDate);

            foreach ($this->languages as $alternate) {
                $url->addAlternate("{$baseUrl}/{$alternate}{$suffix}", $alternate);
            }

            $sitemap->add($url);
        }
    }
}
