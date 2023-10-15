<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthController::class,'showForm']);
Route::post('/admin-login', [AuthController::class,'adminLogin'])->name('admin.login');
Route::get('/register', [AuthController::class,'registerForm'])->name('registerForm');
Route::post('/admin-register', [AuthController::class,'register'])->name('admin.register');

Route::group(['Middleware' => 'auth'], function(){
  Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.index');
  Route::get('/logout',   [AuthController::class,'logout'])->name('admin.logout');
});







