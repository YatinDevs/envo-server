<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\LeaderController;
use App\Http\Controllers\Api\ClientController;
// use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\HeroSectionController;
use App\Http\Controllers\Api\ServiceHeroSectionController;
use App\Http\Controllers\Api\BlogHeroSectionController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\ContactListController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api')->controller(HomeController::class)->group(function () {
    
Route::get('/testimonials', [TestimonialController::class, 'index']);

Route::get('/leaders', [LeaderController::class, 'index']);

Route::get('/clients', [ClientController::class, 'index']);

// Route::get('/about', [AboutUsController::class, 'index']);

Route::get('/hero-sections', [HeroSectionController::class, 'index']);

Route::get('/service-hero-sections', [ServiceHeroSectionController::class, 'index']);

Route::get('/blog-hero-sections', [BlogHeroSectionController::class, 'index']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{slug}', [BlogController::class, 'show']);
Route::post('/blogs', [BlogController::class, 'store']);

Route::get('/contact-details', [ContactController::class, 'index']);

// Route::post('/contact-submit', [ContactListController::class, 'store']);

});


