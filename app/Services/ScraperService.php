<?php

namespace App\Services;

use Illuminate\Console\Command;

class ScraperService 
{
    public function runNodeScraperScript(String $script, Command $command) {
        $path = base_path("scripts/{$script}");
        $url = $command->option("url")!="default"? $command->option("url") : "undefined";
        $id = $command->option("id")!="default"? $command->option("id") : "undefined";
        $command = "node {$path} {$url} {$id}";
        $result = shell_exec($command);

        return $result;
    }
}