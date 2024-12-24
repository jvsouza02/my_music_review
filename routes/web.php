<?php

use App\Http\Controllers\AlbumController;
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

// Artists Page Screen
Route::get('/artist/{id}/profile', [ArtistsController::class, 'showArtist'])->name('artists.profile');
Route::post('/artist/album/store', [AlbumController::class, 'store'])->name('albums.store');
Route::post('/artist/album/update/{id}', [AlbumController::class, 'update'])->name('albums.update');
Route::get('/artist/album/delete/{id}', [AlbumController::class, 'delete'])->name('albums.delete');


Route::get('/reviews', [ReviewController::class,'index'])->name('reviews');
