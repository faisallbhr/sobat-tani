<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('currency', function ( $expression ) { return "Rp<?php echo number_format($expression,0,',','.'); ?>"; });
    }
    public $bindings = [
        \Laravel\Fortify\Http\Controllers\RegisteredUserController::class => \App\Http\Controllers\RegisteredUserController::class,
        \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class => \App\Http\Controllers\AuthenticatedSessionController::class,
    ];
}
