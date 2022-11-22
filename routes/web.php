<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GaleriController;

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
Route::get('/sinopsis', function () {
    return view('sinopsis');
});
Route::get('/scene', function () {
    return view('scene');
});
Route::get('/discussion', function () {
    return view('discussion');
});
Route::get('/country', function () {
    return view('country');
});

Route::get('/photos', [PhotoController::class, 'random']);

Route::get('/photos', [PhotoController::class, 'scene']);

Route::get('/photos', [PhotoController::class, 'sinopsis']);

Route::get('/photos', [PhotoController::class, 'diskusi']);

Route::get('/buku', [BukuController::class, 'index']);

Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');

Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');

Route::post('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');

Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');

Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');;

Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');

Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');

Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('galeri.edit');

Route::post('/galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');

Route::post('/galeri/delete/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

Route::get('/detail-buku/{buku_seo}', [BukuController::class, 'galbuku'])->name('buku.detail');