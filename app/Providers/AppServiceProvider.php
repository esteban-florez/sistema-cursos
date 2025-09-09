<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

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
        Schema::defaultStringLength(191);

        Collection::macro('pairs', function () {
            return $this->mapWithKeys(function ($value) {
                return [$value => $value];
            });
        });

        Paginator::useBootstrap();

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        if (config('app.url') === 'https://estebanflorez.com/sistema-cursos') {
            URL::forceRootUrl(config('app.url'));
        }
    }
}
