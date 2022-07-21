<?php

namespace App\Providers;

use App\Repository\Repos\RoleRepo;
use App\Repository\Repos\AdminRepo;
use Illuminate\Support\ServiceProvider;
use App\Repository\Repos\PermissionRepo;
use App\Repository\Interfaces\RoleInterface;
use App\Repository\Interfaces\AdminInterface;
use App\Repository\Interfaces\PermissionInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            AdminInterface::class,
            AdminRepo::class
        );
        $this->app->bind(
            PermissionInterface::class,
            PermissionRepo::class
        );
        $this->app->bind(
            RoleInterface::class,
            RoleRepo::class
        );
    }
}
