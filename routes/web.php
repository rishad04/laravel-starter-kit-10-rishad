<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\TodoController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\backend\ActivityLogController;

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


Route::middleware('guest')->group(function () {
    Route::get('login',             [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('login',            [AuthController::class, 'login'])->name('login');
    Route::get('register',          [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('register',         [AuthController::class, 'register'])->name('register');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/',             [DashboardController::class, 'index'])->name('home'); //need to modify as requirement

    Route::get('/dashboard',    [DashboardController::class, 'index'])->name('dashboard')->middleware('hasPermission:dashboard_read');
    Route::get('logout',        [AuthController::class, 'logout'])->name('Logout');

    // profile 
    Route::get('profile',                           [UserController::class, 'profile'])->name('profile')->middleware('hasPermission:profile_read');
    Route::get('profile/edit',                      [UserController::class, 'profileEdit'])->name('profile.edit')->middleware('hasPermission:profile_update');
    Route::put('profile/update',                    [UserController::class, 'profileUpdate'])->name('profile.update')->middleware('hasPermission:profile_update');
    Route::get('profile/change-password',           [UserController::class, 'passwordChange'])->name('passwordChange')->middleware('hasPermission:password_update');
    Route::put('profile/update-password',           [UserController::class, 'passwordUpdate'])->name('passwordUpdate')->middleware('hasPermission:password_update');

    // To_do List route
    Route::get('todo/todo_list',                    [TodoController::class, 'index'])->name('todo.index')->middleware('hasPermission:todo_read');
    Route::get('todo/todo_create',                  [TodoController::class, 'create'])->name('todo.create')->middleware('hasPermission:todo_create');
    Route::get('todo/edit/{id}',                    [TodoController::class,    'edit'])->name('todo.edit')->middleware('hasPermission:todo_update');
    Route::post('todo/todo_add',                    [TodoController::class, 'store'])->name('todo.store')->middleware('hasPermission:todo_create');
    Route::put('todo/update',                       [TodoController::class,    'update'])->name('todo.update')->middleware('hasPermission:todo_update');
    Route::delete('todo/delete/{id}',               [TodoController::class, 'destroy'])->name('todo.delete')->middleware('hasPermission:todo_delete');

<<<<<<< HEAD
        //role
        Route::prefix('role')->group(function () {
            Route::get('/',                             [RoleController::class,    'index'])->name('role.index')->middleware('hasPermission:role_read');
            Route::get('/create',                       [RoleController::class,    'create'])->name('role.create')->middleware('hasPermission:role_create');
            Route::post('/store',                       [RoleController::class,    'store'])->name('role.store')->middleware('hasPermission:role_create');
            Route::get('/edit/{id}',                    [RoleController::class,    'edit'])->name('role.edit')->middleware('hasPermission:role_update');
            Route::put('/update',                       [RoleController::class,    'update'])->name('role.update')->middleware('hasPermission:role_update');
            Route::delete('/delete/{id}',               [RoleController::class,    'delete'])->name('role.delete')->middleware('hasPermission:role_delete');
        });

        // To_do List route
        Route::get('todo/todo_list',                [TodoController::class, 'index'])->name('todo.index')->middleware('hasPermission:todo_read');
        Route::get('todo/todo_create',             [TodoController::class, 'create'])->name('todo.create')->middleware('hasPermission:todo_create');
        Route::get('todo/edit/{id}',                    [TodoController::class,    'edit'])->name('todo.edit')->middleware('hasPermission:todo_update');
        Route::post('todo/todo_add',                [TodoController::class, 'store'])->name('todo.store')->middleware('hasPermission:todo_create');
        Route::put('todo/update',                       [TodoController::class,    'update'])->name('todo.update')->middleware('hasPermission:todo_update');
        Route::delete('todo/delete/{id}',           [TodoController::class, 'destroy'])->name('todo.delete')->middleware('hasPermission:todo_delete');


        Route::prefix('activity-logs')->group(function () {
            Route::get('/',                             [ActivityLogController::class, 'index'])->name('activity.logs.index')->middleware('hasPermission:activity_logs_read');
            Route::get('/view/{id}',                    [ActivityLogController::class, 'view'])->name('activity.logs.view');
        });

        // database backup
        // Route::get('database/backup',           [DatabaseBackupController::class, 'index'])->name('database.backup.index')->middleware('haspermission:database_backup_read');
        // Route::get('database/backup/download',  [DatabaseBackupController::class, 'databaseBackup'])->name('database.backup.download')->middleware('hasPermission:database_backup_read');
    });
    //end user 

}); //auth
=======
    // activity-logs
    Route::get('activity-logs',                     [ActivityLogController::class, 'index'])->name('activity.logs.index')->middleware('hasPermission:activity_logs_read');
    Route::get('activity-logs/view/{id}',           [ActivityLogController::class, 'view'])->name('activity.logs.view');
});
>>>>>>> cc63a89981e01c2b7ae536b151c664f21977f26f
