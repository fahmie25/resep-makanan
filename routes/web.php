<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\ResepAdminController;
use App\Http\Controllers\Admin\FavoriteStatsController;
// use App\Http\Controllers\UserUploadController;

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
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register-choice', [AuthController::class, 'showRegisterChoice'])->name('register.choice');
    Route::get('/register-email', [AuthController::class, 'showRegisterForm'])->name('register.email');
    Route::post('/register-email', [AuthController::class, 'register'])->name('register.email.post');
    Route::get('/auth/google/redirect', [AuthController::class, 'googleRedirect'])
    ->name('google.redirect');
    Route::get('/auth/google/callback', [AuthController::class, 'googleCallback'])
    ->name('google.callback');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// hanya user yang login boleh logout
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



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

// GOOGLE LOGIN — harus ADA sebelum middleware group
// Route::get('/auth/google/redirect', [AuthController::class, 'googleRedirect'])
//     ->name('google.redirect');

// Route::get('/auth/google/callback', [AuthController::class, 'googleCallback'])
//     ->name('google.callback');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [ResepAdminController::class, 'index'])->name('dashboard');

        Route::resource('resep', ResepAdminController::class);
    });

Route::middleware('auth')->group(function () {

    // halaman form upload resep
    Route::get('/upload-resep', [ResepController::class, 'createUser'])
        ->name('upload.resep');

    // proses upload resep user
    Route::post('/upload-resep', [ResepController::class, 'storeUser'])
        ->name('upload.resep.store');

    });

// Statistik favorit resep (admin only)
Route::get('/admin/favorite-stats', [FavoriteStatsController::class, 'index'])
    ->name('admin.favorite.stats')
    ->middleware('auth');