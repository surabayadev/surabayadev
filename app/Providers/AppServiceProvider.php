<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $theme = resource_path('views/themes/' . config('surabayadev.theme'));
        $this->loadViewsFrom($theme, 'theme');

        $admin = resource_path('views/admin');
        $this->loadViewsFrom($admin, 'admin');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
