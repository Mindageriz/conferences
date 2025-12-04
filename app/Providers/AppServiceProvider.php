<?php

namespace App\Providers;

use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (isset($this->app['router'])) {
            $this->app['router']->pushMiddlewareToGroup('web', LocaleMiddleware::class);
        }
    }
}
