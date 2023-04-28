<?php

namespace App\Providers;

use App\Models\Phonebook;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\Observers\PhonbookObserver;

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
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        Config::set('app.timezone', 'Asia/Tashkent');

        Phonebook::observe(PhonbookObserver::class);
    }
}
