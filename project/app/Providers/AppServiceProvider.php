<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;
use Illuminate\Pagination\Paginator;

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
		Date::setLocale('nl');

		Paginator::defaultView('vendor.pagination.default');

		Paginator::defaultSimpleView('vendor.pagination.simple');
    }
}
