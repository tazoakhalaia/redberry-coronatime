<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::group(['middleware' => 'setLocale', 'controller' => RegisterController::class], function(){
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'register')->name('register');
});

Route::get('/send-email', function(){
    return view('confirm-email');
})->name('send-email');

Route::get('/account-confirm/{token}', function(){
    return view('account_confirm_page.account-confirm');
})->name('confirm');

Route::get('/hello/{token}', [VerificationController::class, 'verify'])->name('verify');









