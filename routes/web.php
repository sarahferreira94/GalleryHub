<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1')->group( function () {
    // List
    Route::resource('artwork', \App\Http\Controllers\ArtworkController::class);

    // Filters
    Route::resource('owner', \App\Http\Controllers\OwnerController::class);
    Route::resource('country', \App\Http\Controllers\CountryController::class);
    Route::resource('artist', \App\Http\Controllers\ArtistController::class);
});