<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FronEnd\HomePageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\JournalController as AdminJournalController;
use App\Http\Controllers\FronEnd\JournalController as FrontJournalController;

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
Route::get('/', [HomePageController::class, 'index']);
Route::get('/blog', [HomePageController::class, 'blog']);
Route::get('/journals', [FrontJournalController::class, 'index']);
Route::get('/journals/{slug}', [FrontJournalController::class, 'show']);



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
    Route::get('/create-blog-news', [AdminController::class, 'createBlogNews']);

    Route::post('/storeblog', [BlogsController::class, 'storeBlog']);
    Route::get('/admin/blog-list', [BlogsController::class, 'blogList']);
    Route::get('/admin/delete-blog/{id}', [BlogsController::class, 'deleteBlog']);
    Route::get('/admin/edit-blog/{id}', [BlogsController::class, 'editBlog']);
    Route::post('/admin/update-blog/{id}', [BlogsController::class, 'updateBlog']);
    Route::get('/admin/gallery', [GalleryController::class, 'index']);
    Route::get('/admin/gallery/create', [GalleryController::class, 'create']);
    Route::post('/admin/gallery/store', [GalleryController::class, 'store']);
    Route::get('/admin/gallery/edit/{id}', [GalleryController::class, 'edit']);
    Route::post('/admin/gallery/update/{id}', [GalleryController::class, 'update']);
    Route::get('/admin/gallery/delete/{id}', [GalleryController::class, 'destroy']);
    Route::get('/admin/profile', [AdminController::class, 'editProfile']);
    Route::post('/admin/profile', [AdminController::class, 'updateProfile']);

    // Admin Journal routes
    Route::get('/admin/journals', [AdminJournalController::class, 'index']);
    Route::get('/admin/journals/create', [AdminJournalController::class, 'create']);
    Route::post('/admin/journals/store', [AdminJournalController::class, 'store']);
    Route::get('/admin/journals/edit/{id}', [AdminJournalController::class, 'edit']);
    Route::get('/admin/journals/{id}/edit', [AdminJournalController::class, 'edit']);
    Route::post('/admin/journals/update/{id}', [AdminJournalController::class, 'update']);
    Route::post('/admin/journals/{id}/update', [AdminJournalController::class, 'update']);
    Route::get('/admin/journals/delete/{id}', [AdminJournalController::class, 'destroy']);
    Route::delete('/admin/journals/{id}', [AdminJournalController::class, 'destroy']);

   
        
});



