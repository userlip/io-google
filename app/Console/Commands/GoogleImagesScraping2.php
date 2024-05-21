<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GoogleImagesScraping2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:google-images-scraping2';

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
        $script = "GoogleImagesScraping2.js";
        $path = base_path("scripts/{$script}");
        $command = "node {$path}";
        $result = shell_exec($command);

        $this->info($result);
    }
}
