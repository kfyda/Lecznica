<?php

namespace App\Providers;

use App\Models\Service;
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
    public function boot(): void
    {
        // Pobranie
        view()->composer(
            ['home', 'layouts.navigation'],
            function ($view) {
                $view->with('services',
                    Service::query()
                        ->select('name', 'slug')
                        ->limit(18)
                        ->get()
                );
            }
        );
    }
}
