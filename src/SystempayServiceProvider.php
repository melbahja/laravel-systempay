<?php

namespace Restoore\Systempay;

use Illuminate\Support\ServiceProvider;

class SystempayServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        //Publishes package config file to applications config folder
        $this->publishes([__DIR__ . '/config/systempay.php' => config_path('systempay.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('restoore-systempay',function(){
            return new Systempay();
        });
    }

}