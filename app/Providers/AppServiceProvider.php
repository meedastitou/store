<?php

namespace App\Providers;

use App\Repositories\IRoleRepository;
use App\Repositories\RoleRepository;
use App\Services\IRoleService;
use App\Services\RoleService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(IRoleRepository::class, RoleRepository::class);
        $this->app->bind(IRoleService::class, RoleService::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
