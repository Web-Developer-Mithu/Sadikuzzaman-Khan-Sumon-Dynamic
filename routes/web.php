<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FronEnd\HomePageController;

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

Route::get("/", [App\Http\Controllers\FronEnd\HomePageController::class, 'index']);

Route::get("blog", [App\Http\Controllers\FronEnd\HomePageController::class, 'blog']);

Auth::routes([
    'register' => false, // Disable registration routes
    'reset' => false,    // Disable password reset routes
    'verify' => false,   // Disable email verification routes
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
