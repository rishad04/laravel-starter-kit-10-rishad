<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('XSS', 'guest')->group(function () {
    Route::get('login',                         [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('login',                        [AuthController::class, 'login'])->name('login');
    // token resend 
    Route::post('token/resend',                 [AuthController::class, 'resendToken'])->name('token.resend')->withoutMiddleware('guest');

    // registration 
    Route::get('register',                      [RegisterController::class, 'registerForm'])->name('registerForm');
    Route::post('register',                     [RegisterController::class, 'register'])->name('register');
    Route::get('register/token/verify',         [RegisterController::class, 'tokenForm'])->name('register.tokenForm');
    Route::post('register/token/verify',        [RegisterController::class, 'verifyToken'])->name('register.verifyToken');

    // password reset 
    Route::get('password/verify/email',         [PasswordController::class, 'passwordForgotForm'])->name('password.forgotForm');
    Route::post('password/verify/email',        [PasswordController::class, 'verifyEmail'])->name('password.verify.email');

    Route::get('password/verify/token',         [PasswordController::class, 'tokenForm'])->name('password.tokenForm');
    Route::post('password/verify/token',        [PasswordController::class, 'verifyToken'])->name('password.verifyToken');

    Route::get('password/reset',                [PasswordController::class, 'passwordResetForm'])->name('password.resetForm');
    Route::post('password/reset',               [PasswordController::class, 'passwordReset'])->name('password.reset');
});
