<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('reseps', ResepController::class);