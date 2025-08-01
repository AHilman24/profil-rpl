<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/autentikasi', [App\Http\Controllers\AuthController::class, 'autentikasi']);

Route::middleware(['login'])->group(function () {
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard');

    //achievements
    Route::get('/achievement', [App\Http\Controllers\AchievementController::class, 'index']);
    Route::post('/achievement/create', [App\Http\Controllers\AchievementController::class, 'create']);
    Route::post('/achievement/edit/{id}', [App\Http\Controllers\AchievementController::class, 'edit']);
    Route::post('/achievement/delete/{id}', [App\Http\Controllers\AchievementController::class, 'delete']);

    //projects
    Route::get('/project', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::post('/project/create', [App\Http\Controllers\ProjectController::class, 'create']);
    Route::post('/project/edit/{id}', [App\Http\Controllers\ProjectController::class, 'edit']);
    Route::post('/project/delete/{id}', [App\Http\Controllers\ProjectController::class, 'delete']);

    //galleries
    Route::get('/gallerie', [App\Http\Controllers\GallerieController::class, 'index']);
    Route::post('/gallerie/create', [App\Http\Controllers\GallerieController::class, 'create']);
    Route::post('/gallerie/edit/{id}', [App\Http\Controllers\GallerieController::class, 'edit']);
    Route::post('/gallerie/delete/{id}', [App\Http\Controllers\GallerieController::class, 'delete']);
});
