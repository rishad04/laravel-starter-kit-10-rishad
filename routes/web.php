<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\StaffController;
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


Route::get('/',                 [AuthController::class,'showForm']);
Route::post('/admin-login',     [AuthController::class,'adminLogin'])->name('admin.login');
Route::get('/register',         [AuthController::class,'registerForm'])->name('registerForm');
Route::post('/admin-register',  [AuthController::class,'register'])->name('admin.register');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/logout',   [AuthController::class,'logout'])->name('admin.logout');

    Route::prefix('role')->name('role.')->group(function(){
        Route::get('/',                             [RoleController::class,    'index'])->name('index');
        Route::get('/create',                       [RoleController::class,    'create'])->name('create');
        Route::post('/store',                       [RoleController::class,    'store'])->name('store');
        Route::get('/edit/{id}',                    [RoleController::class,    'edit'])->name('edit');
        Route::put('/update',                       [RoleController::class,    'update'])->name('update');
        Route::delete('/delete/{id}',               [RoleController::class,    'delete'])->name('delete');
    });
});



        // user
        Route::prefix('user')->name('users.')->group(function(){
            Route::get('/',                             [UserController::class,   'index'])->name('index');
            Route::get('/create',                       [UserController::class,   'create'])->name('create');
            Route::post('/store',                       [UserController::class,   'store'])->name('store');
            Route::get('/edit/{id}',                    [UserController::class,   'edit'])->name('edit');
            Route::put('/update',                       [UserController::class,   'update'])->name('update');
            Route::delete('/delete/{id}',               [UserController::class,   'delete'])->name('delete');
            Route::get('/permissions/{id}',             [UserController::class,   'permissions'])->name('permissions');
            Route::put('/permissions/update',           [UserController::class,   'permissionsUpdate'])->name('permissions.update');
            Route::post('/status/change/{id}',          [UserController::class,   'StatusChange'])->name('status.change');
            Route::post('/ban/unban/{id}',              [UserController::class,   'BanUnban'])->name('ban.unban');
        });
        //end user

        //role
        Route::prefix('role')->name('role.')->group(function(){
            Route::get('/',                             [RoleController::class,    'index'])->name('index');
            Route::get('/create',                       [RoleController::class,    'create'])->name('create');
            Route::post('/store',                       [RoleController::class,    'store'])->name('store');
            Route::get('/edit/{id}',                    [RoleController::class,    'edit'])->name('edit');
            Route::put('/update',                       [RoleController::class,    'update'])->name('update');
            Route::delete('/delete/{id}',               [RoleController::class,    'delete'])->name('delete');
        });
        //end role

          //staff
          Route::prefix('staff')->name('staff.')->group(function(){
            Route::get('/',                             [StaffController::class,   'index'])->name('index');
            Route::get('/create',                       [StaffController::class,   'create'])->name('create');
            Route::post('/store',                       [StaffController::class,   'store'])->name('store');
            Route::get('/edit/{id}',                    [StaffController::class,   'edit'])->name('edit');
            Route::put('/update',                       [StaffController::class,   'update'])->name('update');
            Route::delete('/delete/{id}',               [StaffController::class,   'delete'])->name('delete');
            Route::get('/permissions/{id}',             [StaffController::class,   'permissions'])->name('permissions');
            Route::put('/permissions/update',           [StaffController::class,   'permissionsUpdate'])->name('permissions.update');
            Route::post('/status/change/{id}',          [StaffController::class,   'StatusChange'])->name('status.change');
            Route::post('/ban/unban/{id}',              [StaffController::class,   'BanUnban'])->name('ban.unban');
        });
        //end staff






// Route::group(['prefix' => 'admin'], function(){


  
//   Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
//   Route::get('/logout',   [AuthController::class,'logout'])->name('admin.logout');

//         //user
//         Route::prefix('user')->name('user.')->group(function(){
//             Route::get('/',                             [UserController::class,   'index'])->name('index');
//             Route::get('/create',                       [UserController::class,   'create'])->name('create');
//             Route::post('/store',                       [UserController::class,   'store'])->name('store');
//             Route::get('/edit/{id}',                    [UserController::class,   'edit'])->name('edit');
//             Route::put('/update',                       [UserController::class,   'update'])->name('update');
//             Route::delete('/delete/{id}',               [UserController::class,   'delete'])->name('delete');
//             Route::get('/permissions/{id}',             [UserController::class,   'permissions'])->name('permissions');
//             Route::put('/permissions/update',           [UserController::class,   'permissionsUpdate'])->name('permissions.update');
//             Route::post('/status/change/{id}',          [UserController::class,   'StatusChange'])->name('status.change');
//             Route::post('/ban/unban/{id}',              [UserController::class,   'BanUnban'])->name('ban.unban');
//         });
//         //end user

//         //role
//         Route::prefix('role')->name('role.')->group(function(){
//             Route::get('/',                             [RoleController::class,    'index'])->name('index');
//             Route::get('/create',                       [RoleController::class,    'create'])->name('create');
//             Route::post('/store',                       [RoleController::class,    'store'])->name('store');
//             Route::get('/edit/{id}',                    [RoleController::class,    'edit'])->name('edit');
//             Route::put('/update',                       [RoleController::class,    'update'])->name('update');
//             Route::delete('/delete/{id}',               [RoleController::class,    'delete'])->name('delete');
//         });
//         //end role

//           //staff
//           Route::prefix('staff')->name('staff.')->group(function(){
//             Route::get('/',                             [StaffController::class,   'index'])->name('index');
//             Route::get('/create',                       [StaffController::class,   'create'])->name('create');
//             Route::post('/store',                       [StaffController::class,   'store'])->name('store');
//             Route::get('/edit/{id}',                    [StaffController::class,   'edit'])->name('edit');
//             Route::put('/update',                       [StaffController::class,   'update'])->name('update');
//             Route::delete('/delete/{id}',               [StaffController::class,   'delete'])->name('delete');
//             Route::get('/permissions/{id}',             [StaffController::class,   'permissions'])->name('permissions');
//             Route::put('/permissions/update',           [StaffController::class,   'permissionsUpdate'])->name('permissions.update');
//             Route::post('/status/change/{id}',          [StaffController::class,   'StatusChange'])->name('status.change');
//             Route::post('/ban/unban/{id}',              [StaffController::class,   'BanUnban'])->name('ban.unban');
//         });
//         //end staff

// });







