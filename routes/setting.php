<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingsController;

//end social authentication
Route::get('localization/{language}', [SettingsController::class, 'setLocalization'])->name('setLocalization');

Route::middleware(['XSS', 'auth'])->prefix('admin/settings')->group(function () {

    // General settings
    Route::get('general-settings',              [SettingsController::class, 'generalSettings'])->name('settings.general.index')->middleware('hasPermission:general_settings_read');
    Route::put('update-settings',               [SettingsController::class, 'updateSettings'])->name('settings.update')->middleware('hasPermission:general_settings_update');

    // Mail Setting Routes
    Route::get('mail',                          [SettingsController::class, 'mailSettings'])->name('settings.mail')->middleware('hasPermission:mail_settings_read');
    Route::post('mail/test-send-mail',          [SettingsController::class, 'testSendMail'])->name('settings.testSendMail')->middleware('hasPermission:mail_settings_update');

    // Mail Setting Routes
    Route::get('recaptcha',                     [SettingsController::class, 'recaptcha'])->name('settings.recaptcha.index')->middleware('hasPermission:recaptcha_settings_read');

    //social login settings
    Route::get('social-login',                  [SettingsController::class, 'socialLoginSettingsIndex'])->name('settings.social.login.index')->middleware('hasPermission:social_login_settings_read');

    // database backup
    Route::get('database/backup',               [SettingsController::class, 'databaseBackupIndex'])->name('database.backup.index')->middleware('hasPermission:database_backup_read');
});
