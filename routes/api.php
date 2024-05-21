<?php

use App\Http\Controllers\ScraperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("scraper")->group(function() {
    Route::controller(ScraperController::class)->group(function () {
        Route::get("google-author-profile", [ScraperController::class, "googleAuthorProfile"]);
        Route::get("google-autocomplete", [ScraperController::class, "googleAutoComplete"]);
        Route::get("google-finance", [ScraperController::class, "googleFinance"]);
        Route::get("google-images-scraping2", [ScraperController::class, "googleImagesScraping2"]);
        Route::get("google-jobs", [ScraperController::class, "googleJobs"]);
        Route::get("google-linkedin", [ScraperController::class, "googleLinkedin"]);
        Route::get("google-maps-reviews", [ScraperController::class, "googleMapsReviews"]);
        Route::get("google-news", [ScraperController::class, "googleNews"]);
        Route::get("google-play", [ScraperController::class, "googlePlay"]);
        Route::get("google-scholar-cite", [ScraperController::class, "googleScholarCite"]);
        Route::get("google-scholar-organic-results", [ScraperController::class, "googleScholarOrganicResults"]);
    });
});
