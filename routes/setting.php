<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingsController;

//end social authentication
Route::get('localization/{language}', [SettingsController::class, 'setLocalization'])->name('setLocalization');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'XSS'], function () {
        Route::group(['prefix' => 'admin/settings'], function () {

            // General settings
            Route::get('general-settings/index',    [SettingsController::class, 'index'])->name('settings.general.index')->middleware('hasPermission:general_settings_read');
            Route::put('general-settings/update',   [SettingsController::class, 'update'])->name('settings.general.update')->middleware('hasPermission:general_settings_update');

            // Mail Setting Routes
            Route::get('mail/index',                [SettingsController::class, 'mailSettings'])->name('settings.mail.index')->middleware('hasPermission:mail_settings_read');
            Route::put('mail/update',               [SettingsController::class, 'updateMailSettings'])->name('settings.mail.update')->middleware('hasPermission:mail_settings_update');

            // Mail Setting Routes
            Route::get('recaptcha/index',           [SettingsController::class, 'recaptchaSettings'])->name('settings.recaptcha.index')->middleware('hasPermission:recaptcha_settings_read');

            //social login settings
            Route::get('social-login',                  [SettingsController::class, 'socialLoginSettingsIndex'])->name('settings.social.login.index')->middleware('hasPermission:social_login_settings_read');
            Route::put('social-login/update/{social}',  [SettingsController::class, 'socialLoginSettingsUpdate'])->name('settings.social.login.update')->middleware('hasPermission:social_login_settings_update');

            // database backup
            Route::get('database/backup',           [SettingsController::class, 'databaseBackupIndex'])->name('database.backup.index')->middleware('hasPermission:database_backup_read');
            Route::get('database/backup/download',  [SettingsController::class, 'databaseBackup'])->name('database.backup.download')->middleware('hasPermission:database_backup_read');

            // SMS 
            Route::get('sms/index',             [SmsSettingsController::class, 'index'])->name('settings.sms.index')->middleware('hasPermission:sms_settings_read');
            Route::get('sms/create',            [SmsSettingsController::class, 'create'])->name('settings.sms.create')->middleware('hasPermission:sms_settings_create');
            Route::post('sms/store',            [SmsSettingsController::class, 'store'])->name('settings.sms.store')->middleware('hasPermission:sms_settings_create');
            Route::get('sms/edit/{id}',         [SmsSettingsController::class, 'edit'])->name('settings.sms.edit')->middleware('hasPermission:sms_settings_update');
            Route::put('sms/update',            [SmsSettingsController::class, 'update'])->name('settings.sms.update')->middleware('hasPermission:sms_settings_update');
            Route::delete('sms/delete/{id}',    [SmsSettingsController::class, 'delete'])->name('settings.sms.delete')->middleware('hasPermission:sms_settings_delete');

            //payout setup settings
            Route::get('online-payment-list',                   [PayoutSetupController::class, 'onlinePaymentList'])->name('online.payment.list')->middleware('hasPermission:online_payment_read');
            Route::get('pay-out/setup',                         [PayoutSetupController::class, 'index'])->name('payout.setup.settings.index')->middleware('hasPermission:payout_setup_settings_read');
            Route::put('pay-out/setup/update/{paymentMethod}',  [PayoutSetupController::class, 'PayoutSetupUpdate'])->name('payout.setup.settings.update')->middleware('hasPermission:payout_setup_settings_update');
        });
    });
});
