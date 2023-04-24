<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\register\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::middleware('setLocale')->group(function(){
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
});
