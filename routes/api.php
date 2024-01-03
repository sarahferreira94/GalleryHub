<?php

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

Route::post('login', [\App\Http\Controllers\AuthController::class,'login']);
Route::post('logout', [\App\Http\Controllers\AuthController::class,'logout']);
Route::post('register', [\App\Http\Controllers\AuthController::class,'register']);
Route::resource('owner', \App\Http\Controllers\OwnerController::class);

Route::middleware(['jwt.auth'])->group(function () {
    Route::prefix('v1')->group(function () {
        // Listagem
        Route::resource('artwork', \App\Http\Controllers\ArtworkController::class);

        // Filtros
        // Route::resource('owner', \App\Http\Controllers\OwnerController::class);
        Route::resource('country', \App\Http\Controllers\CountryController::class);
        Route::resource('artist', \App\Http\Controllers\ArtistController::class);
    });
});
