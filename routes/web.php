<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/autentikasi', [App\Http\Controllers\AuthController::class, 'autentikasi']);

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard');

//achievements
Route::get('/achievement', [App\Http\Controllers\AchievementController::class, 'index']);
Route::post('/achievement/create', [App\Http\Controllers\AchievementController::class, 'create']);
Route::post('/achievement/edit/{id}', [App\Http\Controllers\AchievementController::class, 'edit']);
