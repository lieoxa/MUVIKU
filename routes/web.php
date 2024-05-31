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
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\ValidateController;

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

Route::get('/adminlog', [AuthController::class, 'getAdmin']);
Route::post('/adminlog', [AuthController::class, 'postAdmin']);

Route::get('/log-out', [AuthController::class, 'logoutLogin'])->name('logoutLogin');

Route::get('/logout', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');

// Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

Route::post('/switchstatus/{id}', [AccUserController::class, 'switchstatus']);
Route::post('/switchstatuss/{id}', [AccUserController::class, 'switchstatuss']);

Route::group(['middleware' => 'auth'], function () {
    Route::post('/profile/editSandi', [ValidateController::class, 'editSandi']);
    Route::post('/profile/editAkun', [ValidateController::class, 'editAkun']);
    Route::post('/profile/editProfil', [ValidateController::class, 'editProfil']);
    Route::post('/profile/laporkan', [ValidateController::class, 'kirimLaporan']);
});

Route::get('/watchlist', [AuthController::class, 'watchlist'])->name('watchlist');
Route::get('/favorit', [AuthController::class, 'favorit'])->name('favorit');
// Route::get('/search', [AuthController::class, 'search'])->name('search');

Route::get('/jujutsu', [UserPageController::class, 'jujutsu'])->name('jujutsu');
Route::get('/op', [UserPageController::class, 'op'])->name('op');
Route::get('/toystory', [UserPageController::class, 'toystory'])->name('toystory');
Route::get('/mario', [UserPageController::class, 'mario'])->name('mario');
Route::get('/spy', [UserPageController::class, 'spy'])->name('spy');
Route::get('/iron3', [UserPageController::class, 'iron3'])->name('iron3');
Route::get('/century', [UserPageController::class, 'century'])->name('century');
Route::get('/jawa', [UserPageController::class, 'jawa'])->name('jawa');
Route::get('/pertaruhan', [UserPageController::class, 'pertaruhan'])->name('pertaruhan');
Route::get('/detailsrc', [UserPageController::class, 'detailsrc'])->name('detailsrc');
Route::get('/jumanji', [UserPageController::class, 'jumanji'])->name('jumanji');
Route::get('/podcast', [UserPageController::class, 'podcast'])->name('podcast');
Route::get('/cars', [UserPageController::class, 'cars'])->name('cars');
Route::get('/conjuring', [UserPageController::class, 'conjuring'])->name('conjuring');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/product', [AdminController::class, 'product'])->name('product');
Route::get('/admin/film', [AdminController::class, 'film'])->name('film');
Route::get('/admin/serial', [AdminController::class, 'serial'])->name('serial');
Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('laporan');

Route::resource('user', AccUserController::class);

Route::resource('banner', BannerController::class);

Route::resource('laporan', LaporanController::class);

Route::resource('broadcast', PodcastController::class);

Route::resource('rekomendasi', RekomendasiController::class);

Route::resource('kategori', KategoriController::class);

Route::resource('serial', SerialController::class);

Route::get('utama', [UtamaController::class, 'home']);

Route::get('search', [SearchController::class, 'search']);

Route::get('daftarseason', [FilmController::class, 'season']);

Route::get('daftareps', [FilmController::class, 'episode']);

Route::get('detailserial', [FilmController::class, 'detail']);

Route::group(['namespace'=>'App\Http\Controllers'], function () {
    Route::post('season', 'FilmController@post')->name('postSeason');
    Route::post('episode', 'FilmController@postEps')->name('postEps');
    Route::post('/editeps/{id}', [FilmController::class, 'editEps'])->name('editEps');
    Route::post('/editseason/{id}', [FilmController::class, 'editSeason'])->name('editSeason');
    Route::get('/episode/{id}', [FilmController::class, 'deleteEps'])->name('deleteEps');
    Route::get('/season/{id}', [FilmController::class, 'deleteSeason'])->name('deleteSeason');
    Route::resource('film', 'FilmController');
    // Route::delete('episode', 'FilmController@deleteEps')->name('deleteEps');
    // Route::put('editeps', 'FilmController@put')->name('putEps');
});

Route::get('/getSeason', [FilmController::class, 'getSeason'])->name('getSeason');
Route::get('/getEpisode', [FilmController::class, 'getEpisode'])->name('getEpisode');
