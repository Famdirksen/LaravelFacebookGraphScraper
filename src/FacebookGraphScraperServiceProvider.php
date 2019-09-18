<?php

namespace Famdirksen\LaravelFacebookGraphScraper;

use Famdirksen\LaravelFacebookGraphScraper\Commands\FacebookGraphScrape;
use Illuminate\Support\ServiceProvider;

class FacebookGraphScraperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('fgs:scrape', FacebookGraphScrape::class);

        $this->commands([
            FacebookGraphScrape::class,
        ]);

        $this->app->make('Famdirksen\LaravelFacebookGraphScraper\FacebookGraphScraperController');
    }
}
