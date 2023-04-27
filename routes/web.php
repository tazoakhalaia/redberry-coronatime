<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\register\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::group(['middleware' => 'setLocale', 'controller' => RegisterController::class], function(){
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'store')->name('register');
});

Route::get('/confirm-email', function(){
    return view('confirm-email');
})->name('confirm-email');