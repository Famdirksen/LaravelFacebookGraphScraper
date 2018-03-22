<?php

namespace Famdirksen\LaravelFacebookGraphScraper\Commands;

use Famdirksen\LaravelFacebookGraphScraper\FacebookGraphScraperController;
use Illuminate\Console\Command;

class FacebookGraphScrape extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fgs:scrape {object} {access_token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the Facebook Graph Scrape action';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $object = $this->argument('object');
        $access_token = $this->argument('access_token');

        $fgsc = new FacebookGraphScraperController();
        $return = $fgsc->scrape($object, $access_token);

        if(!$return['status']) {
            $this->info($return['response']);
        } else {
            $this->info('Succesfully scraped '.$object);
        }
    }
}
