<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\messagesController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\User\NewsController as UserNewsController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// USER PAGE
Route::view('/', 'user.home');
Route::view('/category', 'user.news.category');
Route::get('/latest', [UserNewsController::class, 'latest']);
Route::view('/news/{id}', 'user.news.show');
Route::view('/about', 'user.about');
Route::view('/contact', 'user.contact');
// END USER

// ADMIN DASHBOARD
Route::prefix('admin')->name('admin')->group(function () {
    Route::resource('/home', homepageController::class);
    Route::resource('/news', newsController::class);
    Route::resource('/category', categoryController::class);
    Route::resource('/messages', messagesController::class);
    Route::get('/profile/{id}', [profileController::class, 'index'])->name('.detail');
    Route::patch('/profile/update/{profile}', [profileController::class, 'update']);
    Route::resource('/user', userController::class);
});
// END ADMIN DASHBOARD

Auth::routes();
