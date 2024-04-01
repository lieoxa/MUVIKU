<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccUserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SerialController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::get('/movie', [AuthController::class, 'movie'])->name('movie');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/serial', [AuthController::class, 'serial'])->name('serial');
Route::get('/search', [AuthController::class, 'search'])->name('search');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::get('/watchlist', [AuthController::class, 'watchlist'])->name('watchlist');
Route::get('/film', [AuthController::class, 'film'])->name('film');
Route::get('/toystory', [AuthController::class, 'toystory'])->name('toystory');
Route::get('/mario', [AuthController::class, 'mario'])->name('mario');
Route::get('/spy', [AuthController::class, 'spy'])->name('spy');
Route::get('/iron3', [AuthController::class, 'iron3'])->name('iron3');
Route::get('/century', [AuthController::class, 'century'])->name('century');
Route::get('/jawa', [AuthController::class, 'jawa'])->name('jawa');
Route::get('/pertaruhan', [AuthController::class, 'pertaruhan'])->name('pertaruhan');
Route::get('/detailsrc', [AuthController::class, 'detailsrc'])->name('detailsrc');
Route::get('/jumanji', [AuthController::class, 'jumanji'])->name('jumanji');
Route::get('/podcast', [AuthController::class, 'podcast'])->name('podcast');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/product', [AdminController::class, 'product'])->name('product');
Route::get('/admin/film', [AdminController::class, 'film'])->name('film');
Route::get('/admin/serial', [AdminController::class, 'serial'])->name('serial');
Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('laporan');

Route::resource('user', AccUserController::class);

Route::resource('banner', BannerController::class);

Route::resource('laporan', LaporanController::class);

Route::resource('film', FilmController::class);

Route::resource('broadcast', PodcastController::class);

Route::resource('rekomendasi', RekomendasiController::class);

Route::resource('kategori', KategoriController::class);

Route::resource('serial', SerialController::class);