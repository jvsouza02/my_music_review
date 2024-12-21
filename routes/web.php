<?php

use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.home');
})->name('home');

// Artists Screen
Route::get('/artists', [ArtistsController::class,'index'])->name('artists');
Route::post('/artists/store', [ArtistsController::class,'store'])->name('artists.store');

Route::get('/reviews', [ReviewController::class,'index'])->name('reviews');
