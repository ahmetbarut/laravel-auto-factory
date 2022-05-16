<?php

namespace AhmetBarut\LaravelAutoFactory\Providers;

class LaravelAutoFactoryServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/auto-factory.php' => config_path('auto-factory.php'),
        ], 'auto-factory-config');

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'ahmetbarut-laravel-auto-factory');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/auto-factory.php',
            'auto-factory'
        );
    }
}
