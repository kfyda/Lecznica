<?php

namespace App\Providers;

use App\Models\News;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
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
        Carbon::setLocale(app()->getLocale());
        App::setLocale('pl');

        // Pobranie nazw usług i wyświetlenie ich na stronie głównej i pasku nawigacji
        view()->composer(
            ['home', 'livewire.navigation'],
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
