<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FronEnd\HomePageController;
use App\Http\Controllers\Admin\AdminController;

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
// Frnotend Routes
Route::get("/", [App\Http\Controllers\FronEnd\HomePageController::class, 'index']);

Route::get("blog", [App\Http\Controllers\FronEnd\HomePageController::class, 'blog']);



// Disable Registration, Password Reset, and Email Verification Routes
Auth::routes([
    'register' => false, // Disable registration routes
    'reset' => false,    // Disable password reset routes
    'verify' => false,   // Disable email verification routes
]);

// Backend Routes



// Admin Routes (Protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('admin/logout', [AdminController::class, 'logout']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/creat-blog&news', [AdminController::class, 'createBlogNews']);
});



