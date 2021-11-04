<?php

use Illuminate\Support\Facades\Route;

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

 Route::get('/', function () {
     return view('welcome');
 });

// Route::get('/', function () {
//     return view('admin/berita/index');
// });

Route::get('/berita', function () {
    return view('admin/berita/news');
});

Route::get('/profile', function () {
    return view('admin/profile/index');
});

Route::get('/pengaturan-admin', function () {
    return view('admin/user/index');
});

Route::get('/pesan', function () {
    return view('admin/pesan/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
