<?php

namespace App\Providers;

use App\Models\News;
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
        // Pobranie nazw usług i wyświetlenie ich na stronie głównej i pasku nawigacji
        view()->composer(
            ['home', 'layouts.navigation'],
            function ($view) {
                $view->with('services',
                    Service::query()
                        ->select('name', 'slug')
                        ->get()
                );
            }
        );

        // Pobranie trzech najnowszych ogłoszeń na stronę główną
        view()->composer(
            ['home'],
            function ($view) {
                $view->with('newsCollection',
                    News::query()
                        ->orderBy('created_at', 'desc')
                        ->limit(4)
                        ->get()
                );
            }
        );
    }
}
