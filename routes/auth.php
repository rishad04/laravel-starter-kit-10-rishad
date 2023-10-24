<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('login',             [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('login',            [AuthController::class, 'login'])->name('login');
    Route::get('register',          [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('register',         [AuthController::class, 'register'])->name('register');
});


Route::middleware('XSS')->group(function () {
    // verification 
    Route::get('verify/email',          [AuthController::class, 'emailVerificationForm'])->name('verify.email.form');
    Route::post('verify/email',         [AuthController::class, 'emailVerification'])->name('verify.email');
    Route::post('verify/resend-token',  [AuthController::class, 'resendToken'])->name('token.resend');
});
