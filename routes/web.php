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
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\HomeController;

// USER PAGE
Route::get('/', [HomeController::class, 'index']);
Route::group(['prefix' => 'category'], function() {
    Route::get('/', [UserCategoryController::class, 'index']);
    Route::get('/{slug}', [UserCategoryController::class, 'show']);
});
Route::get('/latest', [UserNewsController::class, 'latest']);
Route::get('/news/{slug}', [UserNewsController::class, 'show']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'store']);
// END USER

// ADMIN DASHBOARD

Auth::routes();
Route::middleware('auth')->prefix('admin')->name('admin')->group(function () {
    Route::resource('/home', homepageController::class);
    Route::resource('/news', newsController::class);
    Route::resource('/category', categoryController::class);
    Route::resource('/messages', messagesController::class);
    Route::resource('/user', userController::class)->middleware('Role');
    Route::resource('/profile', profileController::class);
});
// END ADMIN DASHBOARD