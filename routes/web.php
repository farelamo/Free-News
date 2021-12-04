<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\messagesController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\User\NewsController as UserNewsController;
use App\Http\Controllers\userController;
use App\Http\Controllers\Auth\LoginController;

// USER PAGE
Route::view('/', 'user.home');
Route::view('/category', 'user.news.category');
Route::get('/latest', [UserNewsController::class, 'latest']);
Route::get('/news/{id}', [UserNewsController::class, 'show']);
Route::view('/about', 'user.about');
Route::view('/contact', 'user.contact');
// END USER

// ADMIN DASHBOARD

Auth::routes();
// Route::resource('/admin/login', LoginController::class);
// Route::post('/admin/login', [LoginController::class, 'login']);

Route::middleware('auth')->prefix('admin')->name('admin')->group(function () {
    Route::resource('/home', homepageController::class);
    Route::resource('/news', newsController::class);
    Route::resource('/category', categoryController::class);
    Route::resource('/messages', messagesController::class);
    Route::get('/profile', [profileController::class, 'index']);
    Route::patch('/profile/update/{profile}', [profileController::class, 'update']);
    Route::resource('/user', userController::class);
});
// END ADMIN DASHBOARD