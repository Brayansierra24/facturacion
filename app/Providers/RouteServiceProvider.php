<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Después del login, redirige aquí.
     */
    public const HOME = '/clientes';

    /**
     * Registra tus rutas de web y api.
     */
    public function boot(): void
    {
        $this->routes(function () {
            require base_path('routes/web.php');
            require base_path('routes/api.php');
        });
    }
}
