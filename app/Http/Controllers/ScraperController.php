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

    public function googleAuthorProfile() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleAuthorProfile.js")
        ]);
    }
    public function googleAutoComplete() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleAutocompleteScraper.js")
        ]);
    }
    public function googleFinance() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleFinanceScraper.js")
        ]);
    }
    public function googleImagesScraping2() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleImagesScraping2.js")
        ]);
    }
    public function googleJobs() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleJobsScraper.js")
        ]);
    }
    public function googleLinkedin() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleLinkedinScraper.js")
        ]);
    }
    public function googleMapsReviews() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleMapsReviewsScraper.js")
        ]);
    }
    public function googleNews() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleNewsScraper.js")
        ]);
    }
    public function googlePlay() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GooglePlayScraper.js")
        ]);
    }
    public function googleScholarCite() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleScholarCite.js")
        ]);
    }
    public function googleScholarOrganicResults() {

        return response()->json([
            "data" => $this->handleNotParamethizedScript("GoogleScholarOrganicResults.js")
        ]);
    }
}
