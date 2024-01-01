<?php

namespace App\Providers;

use App\Models\Sekolah;
use App\Models\Admin;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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

        View::composer('*', function ($view) {
            $admin = Auth::guard('admin')->user();
            $url = $admin ? asset('storage/' . $admin->profile_picture) : null;
            $view->with('url', $url);
        });
    }
}
