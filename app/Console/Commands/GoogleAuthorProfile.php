<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GoogleAuthorProfile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:google-author-profile';

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
        $script = "GoogleAuthorProfile.js";
        $path = base_path("scripts/{$script}");
        $command = "node {$path}";
        $result = shell_exec($command);

        $this->info($result);

        // return 0;
    }
}
