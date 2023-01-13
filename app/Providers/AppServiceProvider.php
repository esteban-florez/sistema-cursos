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
        // Esto se queda comentado de ahora en adelante, para que los strings sean de 255 max, la solución es configurar algo en la base de datos, busquen en internet xd
        // Schema::defaultStringLength(191);

        Blade::if('is', fn($role) => $role === Auth::user()->role);

        Blade::if('isnt', fn($role) => $role !== Auth::user()->role);

        Collection::macro('pairs', fn() =>
            $this->mapWithKeys(fn($value) => 
                [$value => $value]));

        Collection::macro('ids', fn() => 
            $this->map(fn($model) => $model->id));

        Paginator::useBootstrap();
    }
}
