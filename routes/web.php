<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| HALAMAN HOME + SEARCH
|--------------------------------------------------------------------------
|
| Form search di home.blade.php pakai action route('home')
| dan input name="q", jadi di-handle oleh ResepController@home.
*/
Route::get('/', [ResepController::class, 'home'])->name('home');


/*
|--------------------------------------------------------------------------
| HALAMAN DETAIL STATIC (DESAIN KHUSUS)
|--------------------------------------------------------------------------
|
| Ini halaman yang pakai desain manual: rendang-padang.blade.php,
| gudeg-jogja.blade.php, sate-madura.blade.php, kerak-telor.blade.php.
*/
Route::get('/kerak-telor', fn () => view('kerak-telor'))->name('kerak-telor');
Route::get('/rendang-padang', fn () => view('rendang-padang'))->name('resep.rendang');
Route::get('/gudeg-jogja', fn () => view('gudeg-jogja'))->name('resep.gudeg');
Route::get('/sate-madura', fn () => view('sate-madura'))->name('resep.sate');


/*
|--------------------------------------------------------------------------
| CRUD RESEP (DATA DARI DATABASE)
|--------------------------------------------------------------------------
|
| Dipakai kalau kamu nanti mau list semua resep / tambah / edit dari DB.
| Untuk detail resep dari DB, kita pakai route('resep.show', $id).
*/
Route::resource('reseps', ResepController::class);

// detail resep dari database (dipanggil di home.blade.php saat hasil search)
Route::get('/resep/{id}', [ResepController::class, 'show'])->name('resep.show');


/*
|--------------------------------------------------------------------------
| AUTH: LOGIN, LOGOUT, REGISTER, GOOGLE LOGIN
|--------------------------------------------------------------------------
*/
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


/*
|--------------------------------------------------------------------------
| FAVORITES
|--------------------------------------------------------------------------
|
| - /favorites          => list resep favorit user (favorites.index)
| - /reseps/{resep}/favorite  => toggle favorite (add / remove)
*/
Route::get('/favorites', [FavoriteController::class, 'index'])
    ->name('favorites.index');

// boleh GET & POST supaya kalau ke-refresh / dibuka dari URL tidak 404
Route::match(['get', 'post'], '/reseps/{resep}/favorite', [FavoriteController::class, 'toggle'])
    ->name('reseps.favorite');
