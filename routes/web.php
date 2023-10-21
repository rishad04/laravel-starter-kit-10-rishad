<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
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
    Route::get('/dashboard',    [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout',        [AuthController::class, 'logout'])->name('Logout');

    // user
    Route::prefix('user')->group(function () {
        Route::get('/',                         [UserController::class,   'index'])->name('user.index');
        Route::get('/create',                   [UserController::class,   'create'])->name('user.create');
        Route::post('/store',                   [UserController::class,   'store'])->name('user.store');
        Route::get('/edit/{id}',                [UserController::class,   'edit'])->name('user.edit');
        Route::put('/update',                   [UserController::class,   'update'])->name('user.update');
        Route::delete('/delete/{id}',           [UserController::class,   'destroy'])->name('user.update');
        // Route::delete('/delete/{id}',       [UserController::class, 'destroy'])->name('user.delete');

        // profile 
        Route::get('profile/{id}',              [UserController::class, 'profile'])->name('profile');
        Route::get('profile/edit',              [UserController::class, 'profileEdit'])->name('profile.edit');
        Route::put('profile/update',            [UserController::class, 'profileUpdate'])->name('profile.update');

        Route::get('change-password/{id}',      [UserController::class, 'passwordChange'])->name('passwordChange');
        Route::put('update-password/{id}',      [UserController::class, 'passwordUpdate'])->name('passwordUpdate');

        Route::delete('/delete/{id}',           [UserController::class,   'delete'])->name('delete');

        Route::get('/permissions/{id}',         [PermissionController::class,   'permissions'])->name('permissions');
        Route::put('/permissions/update',       [PermissionController::class,   'permissionsUpdate'])->name('permissions.update');

        //role
        Route::prefix('role')->group(function () {
            Route::get('/',                             [RoleController::class,    'index'])->name('role.index');
            Route::get('/create',                       [RoleController::class,    'create'])->name('role.create');
            Route::post('/store',                       [RoleController::class,    'store'])->name('role.store');
            Route::get('/edit/{id}',                    [RoleController::class,    'edit'])->name('role.edit');
            Route::put('/update',                       [RoleController::class,    'update'])->name('role.update');
            Route::delete('/delete/{id}',               [RoleController::class,    'delete'])->name('role.delete');
        });

          // To_do List route
          Route::get('todo/todo_list',                [TodoController::class, 'index'])->name('todo.index')->middleware('hasPermission:todo_read');
          Route::post('todo/todo_add',                [TodoController::class, 'store'])->name('todo.store')->middleware('hasPermission:todo_create');
          Route::post('todo/momal',                   [TodoController::class, 'todoModal'])->name('todo.modal');
          Route::post('todo/processing',              [TodoController::class, 'todoProcessing'])->name('todo.processing')->middleware('hasPermission:todo_update');
          Route::post('todo/completed',               [TodoController::class, 'todoComplete'])->name('todo.completed')->middleware('hasPermission:todo_update');
          Route::put('todo/update',                   [TodoController::class, 'update'])->name('todo.update')->middleware('hasPermission:todo_update');
          Route::delete('todo/delete/{id}',           [TodoController::class, 'destroy'])->name('todo.delete')->middleware('hasPermission:todo_delete');


          Route::prefix('activity-logs')->group(function(){
            Route::get('/',                             [ActivityLogController::class, 'index'])->name('activity.logs.index')->middleware('hasPermission:activity_logs_read');
            Route::get('/view/{id}',                    [ActivityLogController::class, 'view'])->name('activity.logs.view');
        });

             // database backup
             Route::get('database/backup',           [DatabaseBackupController::class, 'index'])->name('database.backup.index')->middleware('haspermission:database_backup_read');
             Route::get('database/backup/download',  [DatabaseBackupController::class, 'databaseBackup'])->name('database.backup.download')->middleware('hasPermission:database_backup_read');





    });


    //end user 

}); //auth
