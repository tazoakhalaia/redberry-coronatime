<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::group(['middleware' => 'setLocale', 'controller' => SessionController::class], function () {
    Route::get('/', 'index')->name('loginpage');
    Route::post('/login', 'login')->name('login');
});
Route::group(['middleware' => 'admin', 'controller' => DashboardController::class], function () {
    Route::middleware('setLocale')->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/dashboard/search', 'search')->name('dashboard.search');
});

Route::group(['middleware' => 'setLocale', 'controller' => RegisterController::class], function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'register')->name('register');
});

Route::view('/send-email', 'confirm-email')->name('send-email');
Route::view('/account-confirm/{token}', 'account_confirm_page.account-confirm')->name('confirm');

Route::get('/verify/{user:token}', [VerificationController::class, 'verify'])->name('verify');
