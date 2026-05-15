<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
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
    Paginator::useBootstrap();

    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        URL::forceScheme('https');
    }

    if (env('APP_ENV') === 'production' || (env('APP_URL') && str_contains(env('APP_URL'), 'https'))) {
        URL::forceScheme('https');
    }
}
    
}