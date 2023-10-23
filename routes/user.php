<?php

use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;

Route::middleware(['XSS', 'auth'])->prefix('admin')->group(function () {

    Route::prefix('user')->group(function () {
        Route::get('/',                         [UserController::class, 'index'])->name('user.index')->middleware('hasPermission:user_read');
        Route::get('/create',                   [UserController::class, 'create'])->name('user.create')->middleware('hasPermission:user_create');
        Route::post('/store',                   [UserController::class, 'store'])->name('user.store')->middleware('hasPermission:user_create');
        Route::get('/edit/{id}',                [UserController::class, 'edit'])->name('user.edit')->middleware('hasPermission:user_update');
        Route::put('/update',                   [UserController::class, 'update'])->name('user.update')->middleware('hasPermission:user_update');
        Route::delete('/delete/{id}',           [UserController::class, 'delete'])->name('user.delete')->middleware('hasPermission:user_delete');
    });

    // permissions
    Route::get('permissions/{id}',              [PermissionController::class, 'permissions'])->name('permissions')->middleware('hasPermission:permissions_update');
    Route::put('permissions/update',            [PermissionController::class, 'permissionsUpdate'])->name('permissions.update')->middleware('hasPermission:permissions_update');

    //role
    Route::prefix('role')->group(function () {
        Route::get('/',                             [RoleController::class, 'index'])->name('role.index')->middleware('hasPermission:role_read');
        Route::get('/create',                       [RoleController::class, 'create'])->name('role.create')->middleware('hasPermission:role_create');
        Route::post('/store',                       [RoleController::class, 'store'])->name('role.store')->middleware('hasPermission:role_create');
        Route::get('/edit/{id}',                    [RoleController::class, 'edit'])->name('role.edit')->middleware('hasPermission:role_update');
        Route::put('/update',                       [RoleController::class, 'update'])->name('role.update')->middleware('hasPermission:role_update');
        Route::delete('/delete/{id}',               [RoleController::class, 'delete'])->name('role.delete')->middleware('hasPermission:role_delete');
    });
});
