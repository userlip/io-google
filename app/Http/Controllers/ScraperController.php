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

    public function googleAuthorProfile(Request $request) {

        return response()->json([
            "data" => $this->handleParamethizedScript($request,"GoogleAuthorProfile.js"),
        ]);
    }
    public function googleAutoComplete(Request $request) {

        return response()->json([
            "data" => $this->handleParamethizedScript($request,"GoogleAutocompleteScraper.js"),
        ]);
    }
    public function googleFinance(Request $request) {

        return response()->json([
            "data" => $this->handleParamethizedScript($request,"GoogleFinanceScraper.js"),
        ]);
    }
    public function googleImages2(Request $request) {

        return response()->json([
            "data" => $this->handleParamethizedScript($request,"GoogleImagesScraping2.js"),
        ]);
    }
    public function googleJobs(Request $request) {

        return response()->json([
            "data" => $this->handleParamethizedScript($request,"GoogleJobsScraper.js"),
        ]);
    }
    public function googleLinkedin(Request $request) {

        return response()->json([
            "data" => $this->handleParamethizedScript($request,"GoogleLinkedinScraper.js"),
        ]);
    }
    public function googleMapsReviews(Request $request) {

        return response()->json([
            "data" => $this->handleParamethizedScript($request,"GoogleMapsReviewsScraper.js"),
        ]);
    }
    public function googleNews(Request $request) {
        $path = base_path("scripts/GoogleNewsScraper.js");
        $url = $request->has("url")? $request->query("url") :"undefined";
        $id = $request->has("id")? $request->query("id") :"undefined";
        $gl = $request->has("gl")? $request->query("gl") :"undefined";
        $command = "node {$path} {$url} {$id} {$gl}";
        $result = shell_exec($command);

        return response()->json([
            "data" => $result,
        ]);
    }
}
