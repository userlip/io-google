<?php

namespace App\Console\Commands;

use App\Services\ScraperService;
use Illuminate\Console\Command;

class GoogleNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:google-news {--url=default} {--id=default} {--gl=default}';

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
        $path = base_path("scripts/GoogleNewsScraper.js");
        $url = $this->option("url")!="default"? $this->option("url") : "undefined";
        $id = $this->option("id")!="default"? $this->option("id") : "undefined";
        $gl = $this->option("gl")!="default"? $this->option("gl") : "undefined";
        $command = "node {$path} {$url} {$id} {$gl}";
        $result = shell_exec($command);

        $this->info($result);
    }
}
