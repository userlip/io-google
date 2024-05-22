<?php

namespace App\Console\Commands;

use App\Services\ScraperService;
use Illuminate\Console\Command;

class GoogleJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:google-jobs {--url=default} {--id=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $result = (new ScraperService())->runNodeScraperScript('GoogleJobsScraper.js', $this);

        $this->info($result);
    }
}
