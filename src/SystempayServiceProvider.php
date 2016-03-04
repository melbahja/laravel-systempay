<?php

namespace Restoore\Systempay;

use Illuminate\Support\ServiceProvider;

class SystempayServiceProvider extends ServiceProvider
{

    protected $defer = true;

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
        $this->app->bind('systempay', 'Restoore\Systempay\Systempay');
    }

    /**
     * Only load library if she is called
     * @return array
     */
    public function provides()
    {
        return ['systempay'];
    }

}