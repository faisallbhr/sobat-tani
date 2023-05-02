<?php

namespace App\Providers;

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
        //
    }
    public $bindings = [
        \Laravel\Fortify\Http\Controllers\RegisteredUserController::class => \App\Http\Controllers\RegisteredUserController::class,
        \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class => \App\Http\Controllers\AuthenticatedSessionController::class,
    ];
}
