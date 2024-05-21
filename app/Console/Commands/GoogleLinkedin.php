<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GoogleLinkedin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:google-linkedin';

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
        $script = "GoogleLinkedinScraper.js";
        $path = base_path("scripts/{$script}");
        $command = "node {$path}";
        $result = shell_exec($command);

        $this->info($result);
    }
}
