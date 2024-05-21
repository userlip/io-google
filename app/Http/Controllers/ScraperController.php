<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function googleauthorprofile() {
        $script = "GoogleAuthorProfile.js";
        $path = base_path("scripts/{$script}");
        $command = "node {$path}";
        $result = shell_exec($command);

        return response()->json([
            "data" => $result
        ]);
    }
}
