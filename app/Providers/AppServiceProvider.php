<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // Traten de buscar en internet como activar la opción "innodb_large_prefix", luego si ven que no pudieron ya descomentan esta línea xddd
        // Schema::defaultStringLength(191);

        $checkRole = function ($role, $user = null) {
            $user = $user ?? Auth::user();
            return $user->role === $role;
        };

        Blade::if('is', function ($user, $role = null) use ($checkRole) {
            return $checkRole($user, $role);
        });

        Blade::if('isnt', function ($user, $role = null) use ($checkRole) {
            return !$checkRole($user, $role);
        });

        Collection::macro('pairs', function () {
            $this->mapWithKeys(function ($value) {
                return [$value => $value];
            });
        });

        Paginator::useBootstrap();
    }
}
