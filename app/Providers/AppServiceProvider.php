<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        if ($this->app->environment('production') || config('app.force_https')) {
            URL::forceScheme('https');
        }

        Paginator::useBootstrapFour();
        View::composer('user.*', function ($view) {
            $view->with('siteSetting', Schema::hasTable('site_settings')
                ? SiteSetting::query()->first()
                : null);
        });
    }
}
