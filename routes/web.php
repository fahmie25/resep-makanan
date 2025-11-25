<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;

// HALAMAN HOME
Route::get('/', function () {
    return view('home');
})->name('home');

// HALAMAN DETAIL STATIC
Route::get('/kerak-telor', fn() => view('kerak-telor'))->name('kerak-telor');
Route::get('/rendang-padang', fn() => view('rendang-padang'))->name('resep.rendang');
Route::get('/gudeg-jogja', fn() => view('gudeg-jogja'))->name('resep.gudeg');
Route::get('/sate-madura', fn() => view('sate-madura'))->name('resep.sate');

// ROUTE CRUD RESEP
Route::resource('reseps', ResepController::class);
Route::get('/resep/{id}', [ResepController::class, 'show'])->name('resep.show');

// LOGIN & REGISTER
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// halaman pilihan daftar
Route::get('/register-choice', [AuthController::class, 'showRegisterChoice'])
    ->name('register.choice');

// register via email
Route::get('/register-email', [AuthController::class, 'showRegisterForm'])
    ->name('register.email');
Route::post('/register-email', [AuthController::class, 'register'])
    ->name('register.email.post');

// GOOGLE LOGIN
Route::get('/auth/google/redirect', [AuthController::class, 'googleRedirect'])
    ->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'googleCallback'])
    ->name('google.callback');

// FAVORITES
Route::get('/favorites', [FavoriteController::class, 'index'])
    ->name('favorites.index');

// boleh GET & POST supaya tidak 404 kalau diakses lewat URL
Route::match(['get', 'post'], '/reseps/{resep}/favorite', [FavoriteController::class, 'toggle'])
    ->name('reseps.favorite');