<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::group(['middleware' => 'setLocale', 'controller' => SessionController::class], function () {
    Route::view('/', 'login')->name('signup');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});
Route::group(['middleware' => ['user.auth', 'setLocale'], 'controller' => DashboardController::class], function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::group(['middleware' => 'setLocale', 'controller' => RegisterController::class], function () {
    Route::view('/register', 'register')->name('registration');
    Route::post('/register', 'register')->name('register');
});

Route::view('/recover-password', 'recover-password')->name('recover.password');

Route::view('/send-email', 'confirm-email')->name('send-email');
Route::view('/account-confirm/{token}', 'account_confirm_page.account-confirm')->name('confirm');

Route::get('/verify/{user:token}', [VerificationController::class, 'verify'])->name('verify');
