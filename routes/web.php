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
Route::post('/artists/update/{id}', [ArtistsController::class, 'update'])->name('artists.update');
Route::get('/artists/delete/{id}', [ArtistsController::class, 'delete'])->name('artists.delete');
Route::get('/artists/page/{id}', [ArtistsController::class, 'showArtist'])->name('artists.page');

Route::get('/reviews', [ReviewController::class,'index'])->name('reviews');
