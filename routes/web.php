<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\TodoController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\backend\ActivityLogController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\SearchController;

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/',             [DashboardController::class, 'index'])->name('home'); //need to modify as requirement

    Route::get('logout',        [AuthController::class, 'logout'])->name('Logout');

    Route::get('/dashboard',    [DashboardController::class, 'index'])->name('dashboard')->middleware('hasPermission:dashboard_read');

    // profile 
    Route::get('profile',                           [ProfileController::class, 'profile'])->name('profile')->middleware('hasPermission:profile_read');
    Route::get('profile/edit',                      [ProfileController::class, 'profile'])->name('profile.edit')->middleware('hasPermission:profile_update');
    Route::put('profile/update',                    [ProfileController::class, 'profileUpdate'])->name('profile.update')->middleware('hasPermission:profile_update');
    Route::get('profile/change-password',           [ProfileController::class, 'profile'])->name('passwordUpdateForm')->middleware('hasPermission:password_update');
    Route::put('profile/update-password',           [ProfileController::class, 'passwordUpdate'])->name('passwordUpdate')->middleware('hasPermission:password_update');

    // To_do List route
    Route::get('todo/todo_list',                    [TodoController::class, 'index'])->name('todo.index')->middleware('hasPermission:todo_read');
    Route::get('todo/todo_create',                  [TodoController::class, 'create'])->name('todo.create')->middleware('hasPermission:todo_create');
    Route::get('todo/edit/{id}',                    [TodoController::class, 'edit'])->name('todo.edit')->middleware('hasPermission:todo_update');
    Route::post('todo/todo_add',                    [TodoController::class, 'store'])->name('todo.store')->middleware('hasPermission:todo_create');
    Route::put('todo/update',                       [TodoController::class, 'update'])->name('todo.update')->middleware('hasPermission:todo_update');
    Route::delete('todo/delete/{id}',               [TodoController::class, 'destroy'])->name('todo.delete')->middleware('hasPermission:todo_delete');

    Route::prefix('admin')->group(function () {
        // activity-logs
        Route::get('activity-logs',                     [ActivityLogController::class, 'index'])->name('activity.logs.index')->middleware('hasPermission:activity_logs_read');
        Route::get('activity-logs/view/{id}',           [ActivityLogController::class, 'view'])->name('activity.logs.view');
    });


    // route search functionality 
    Route::get('search',                [SearchController::class, 'search'])->name('search')->middleware('hasPermission:route_search');
    Route::post('search/routes',        [SearchController::class, 'searchRoute'])->name('search.route')->middleware('hasPermission:route_search');
});
