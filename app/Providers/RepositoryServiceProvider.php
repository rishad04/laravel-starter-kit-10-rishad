<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use App\Repositories\AuthRepository;
use App\Repositories\Language\LanguageInterface;
use App\Repositories\Language\LanguageRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Role\RoleInterface;
use App\Repositories\Todo\TodoInterface;
use App\Repositories\User\UserInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Todo\TodoRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Upload\UploadInterface;
use App\Repositories\Upload\UploadRepository;
use App\Repositories\Permission\PermissionInterface;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\LoginActivity\LoginActivityInterface;
use App\Repositories\LoginActivity\LoginActivityRepository;
use App\Repositories\Settings\Backup\BackupInterface;
use App\Repositories\Settings\Backup\BackupRepository;
use App\Repositories\Settings\SettingsInterface;
use App\Repositories\Settings\SettingsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LanguageInterface::class,            LanguageRepository::class);
        $this->app->bind(PermissionInterface::class,            PermissionRepository::class);

        // settings 
        $this->app->bind(SettingsInterface::class,              SettingsRepository::class);
        $this->app->bind(BackupInterface::class,                BackupRepository::class);

        $this->app->bind(LoginActivityInterface::class,         LoginActivityRepository::class);
        $this->app->bind(LoginActivityInterface::class,         LoginActivityRepository::class);

        $this->app->bind(AuthInterface::class,                  AuthRepository::class);

        $this->app->bind(UploadInterface::class,                UploadRepository::class);

        $this->app->bind(UserInterface::class,                  UserRepository::class);

        $this->app->bind(RoleInterface::class,                  RoleRepository::class);

        $this->app->bind(TodoInterface::class,                  TodoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
