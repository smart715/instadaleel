<?php

namespace App\Providers;

use App\Models\SettingsModule\AppInfo;
use App\Models\SettingsModule\Page;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);


        Paginator::useBootstrap();

        $app_info = AppInfo::first();

        $unauthorized = "You are not authorized for this";

        View::share([
            'app_info' => $app_info,
        ]);

    }
}
