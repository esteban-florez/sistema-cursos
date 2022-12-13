<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::if('is', fn($role) => $role === getCurrentRole());

        Blade::if('isnt', fn($role) => $role !== getCurrentRole());

        Collection::macro('pairs', fn() =>
            $this->mapWithKeys(fn($value) => 
                [$value => $value]));

        Paginator::useBootstrap();
    }
}
