<?php

use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.home');
});

Route::get('/artists', [ArtistsController::class,'index'])->name('artists');
Route::get('/reviews', [ReviewController::class,'index'])->name('reviews');
