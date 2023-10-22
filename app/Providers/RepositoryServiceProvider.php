<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use App\Repositories\AuthRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Upload\UploadInterface;
use App\Repositories\Upload\UploadRepository;
use App\Repositories\Permission\PermissionInterface;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\LoginActivity\LoginActivityInterface;
use App\Repositories\LoginActivity\LoginActivityRepository;
use App\Repositories\Settings\GeneralSettingsInterface;
use App\Repositories\Settings\GeneralSettingsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthInterface::class,          AuthRepository::class);
        $this->app->bind(LoginActivityInterface::class, LoginActivityRepository::class);
        $this->app->bind(LoginActivityInterface::class, LoginActivityRepository::class);

        $this->app->bind(UserInterface::class,                  UserRepository::class);

        $this->app->bind(RoleInterface::class,                  RoleRepository::class);

        $this->app->bind(UploadInterface::class,                UploadRepository::class);

        $this->app->bind(PermissionInterface::class,                PermissionRepository::class);
        $this->app->bind(GeneralSettingsInterface::class,      GeneralSettingsRepository::class);
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
