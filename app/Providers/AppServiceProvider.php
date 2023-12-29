<?php

namespace App\Providers;

use App\Models\Sekolah;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Paginator::useBootstrap();

        // Membagikan data sekolah ke semua view
        view()->composer('*', function ($view) {
            $sekolah = Sekolah::first();
            $view->with('sekolah', $sekolah);
        });
    }
}
