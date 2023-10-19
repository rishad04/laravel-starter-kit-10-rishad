<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;

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

//end social authentication
Route::get('localization/{language}', [SettingController::class, 'setLocalization'])->name('setLocalization');


Route::middleware('guest')->group(function () {
    Route::get('login',             [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('login',            [AuthController::class, 'login'])->name('login');
    Route::get('register',          [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('register',         [AuthController::class, 'register'])->name('register');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',    [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout',       [AuthController::class, 'logout'])->name('logout');

    // user
    Route::prefix('user')->group(function () {
        Route::get('/',                         [UserController::class,   'index'])->name('user.index');
        Route::get('/create',                   [UserController::class,   'create'])->name('user.create');
        Route::post('/store',                   [UserController::class,   'store'])->name('user.store');
        Route::get('/edit/{id}',                [UserController::class,   'edit'])->name('user.edit');
        Route::put('/update',                   [UserController::class,   'update'])->name('user.update');

        // profile 
        Route::get('profile/{id}',              [UserController::class, 'profile'])->name('profile');
        Route::get('profile/edit',              [UserController::class, 'profileEdit'])->name('profile.edit');
        Route::put('profile/update',            [UserController::class, 'profileUpdate'])->name('profile.update');

        Route::get('change-password/{id}',      [UserController::class, 'passwordChange'])->name('password.change');
        Route::put('update-password/{id}',      [UserController::class, 'passwordUpdate'])->name('password.update');

        Route::delete('/delete/{id}',           [UserController::class,   'delete'])->name('delete');

        Route::post('/status/change/{id}',      [UserController::class,   'StatusChange'])->name('status.change');
        Route::post('/ban/unban/{id}',          [UserController::class,   'BanUnban'])->name('ban.unban');

        Route::get('/permissions/{id}',         [PermissionController::class,   'permissions'])->name('permissions');
        Route::put('/permissions/update',       [PermissionController::class,   'permissionsUpdate'])->name('permissions.update');
    });
    //end user






    //role
    Route::prefix('role')->name('role.')->group(function () {
        Route::get('/',                             [RoleController::class,    'index'])->name('index');
        Route::get('/create',                       [RoleController::class,    'create'])->name('create');
        Route::post('/store',                       [RoleController::class,    'store'])->name('store');
        Route::get('/edit/{id}',                    [RoleController::class,    'edit'])->name('edit');
        Route::put('/update',                       [RoleController::class,    'update'])->name('update');
        Route::delete('/delete/{id}',               [RoleController::class,    'delete'])->name('delete');
    });
    //end role

    //staff
    Route::prefix('staff')->name('staff.')->group(function () {
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

});


// Route::group(['prefix' => 'admin'], function(){


  
//   Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.index');
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
