<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;

Route::get('/', [ResepController::class, 'index']);
Route::resource('reseps', ResepController::class);
Route::resource('reseps', ResepController::class);
