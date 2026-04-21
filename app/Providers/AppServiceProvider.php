<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();

        // Ensure Telescope is not recording (safe, reversible guard).
        if (class_exists(\Laravel\Telescope\Telescope::class)) {
            try {
                \Laravel\Telescope\Telescope::stopRecording();
            } catch (\Throwable $e) {
                // Ignore any issues stopping Telescope to avoid breaking bootstrap.
            }
        }
    }
}
