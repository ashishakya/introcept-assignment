<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class HelperServiceProvider
 * @package App\Providers
 */
class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ( glob(app_path('Helpers').'/*.php') as $file ) {
            require_once $file;
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
