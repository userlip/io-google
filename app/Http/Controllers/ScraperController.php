<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScraperController extends Controller
{
    private function handleParamethizedScript(Request $request, String $script) {
        $path = base_path("scripts/{$script}");
        $url = $request->has("url")? $request->query("url") :"undefined";
        $id = $request->has("id")? $request->query("id") :"undefined";
        $command = "node {$path} {$url} {$id}";
        $result = shell_exec($command);

        return $result;
    }
}
