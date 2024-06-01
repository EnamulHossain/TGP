<?php

namespace App\Console\Commands;

use App\Models\Grant;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Str;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add specific public pages to the sitemap
        $publicRoutes = [
            '/',
            'faqs',
            'privacy_policy',
            'cookie-policy',
            'terms-service',
            'pricing-and-plans',
            'contact_us',
            'about-us',
            'hire-a-grant-writer',
            'i-am-a-grant-provider',
            'i-am-a-grant-writer',
        ];

        foreach ($publicRoutes as $route) {
            $url = url($route);
            $sitemap->add(
                Url::create($url)
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        }

        // Add routes for grant details pages
        Grant::get()->each(function (Grant $grant) use ($sitemap) {
            $title = Str::slug($grant->opportunity_title);
            $sitemap->add(
                Url::create("/grant-details/{$grant->id}/{$title}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
