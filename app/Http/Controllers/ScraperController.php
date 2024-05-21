<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScraperController extends Controller
{

    private function handleNotParamethizedScript(String $script) {
        $path = base_path("scripts/{$script}");
        $command = "node {$path}";
        $result = shell_exec($command);

        return $result;
    }

    public function googleauthorprofile() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleAuthorProfile.js")
        ]);
    }
    public function googleautocomplete() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleAutocompleteScraper.js")
        ]);
    }
    public function googlefinance() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleFinanceScraper.js")
        ]);
    }
    public function googleimagesscraping2() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleImagesScraping2.js")
        ]);
    }
    public function googlejobs() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleJobsScraper.js")
        ]);
    }
}
