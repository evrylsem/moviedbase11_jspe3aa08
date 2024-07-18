<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::post('/register',[AuthController::class,'register'])->name('register');

// Route::post('/login',[AuthController::class,'login'])->name('login');

// Route::middleware('')->group(function() {
//     Route::apiResource('movies', MovieController::class);

//     Route::get('/movies', [MovieController::class, 'showAll']);

//     Route::get('/movies/{id}', [MovieController::class, 'showAll']);
// });

// Authentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    // Route::apiResource('movies', [MovieController::class]);

    Route::post('/movies', [MovieController::class, 'getAllMovies']);
    Route::post('/movies/{id}', [MovieController::class, 'getMovieById']);
    Route::post('/directors/{id}', [MovieController::class, 'getDirectorById']);
    Route::post('/actors/{id}', [MovieController::class, 'getActorById']);
    Route::post('/movies-with-genres', [MovieController::class, 'getMoviesWithGenres']);
    Route::post('/movies-with-ratings', [MovieController::class, 'getMoviesWithRatings']);

    Route::get('/movies', [MovieController::class, 'getAllMovies']);
    Route::get('/movies/{id}', [MovieController::class, 'getMovieById']);
    Route::get('/directors/{id}', [MovieController::class, 'getDirectorById']);
    Route::get('/actors/{id}', [MovieController::class, 'getActorById']);
    Route::get('/movies-with-genres', [MovieController::class, 'getMoviesWithGenres']);
    Route::get('/movies-with-ratings', [MovieController::class, 'getMoviesWithRatings']);
});


