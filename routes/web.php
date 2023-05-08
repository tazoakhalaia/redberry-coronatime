<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;


Route::get('/', [SessionController::class, 'index'])->name('loginpage')->middleware('setLocale');
Route::post('/login', [SessionController::class, 'login'])->name('login');
Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware('admin');

Route::group(['middleware' => 'setLocale', 'controller' => RegisterController::class], function(){
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'register')->name('register');
});

Route::view('/send-email', 'confirm-email')->name('send-email');
Route::view('/account-confirm/{token}', 'account_confirm_page.account-confirm')->name('confirm');

Route::get('/verify/{user:token}', [VerificationController::class, 'verify'])->name('verify');









