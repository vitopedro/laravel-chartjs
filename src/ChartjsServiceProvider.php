<?php

namespace vitopedro\chartjs;

use Illuminate\Support\ServiceProvider;

class ChartjsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('vitopedro\chartjs\LineChart');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->loadRoutesFrom(__DIR__.'/routes.php');
        //$this->loadMigrationsFrom(__DIR__.'/migrations');
        //$this->loadViewsFrom(__DIR__.'/views', 'todolist');
        $this->loadViewsFrom(__DIR__ . '/views', 'chartjs');

        $this->publishes([
            __DIR__ . '/assets/js' => public_path('vitopedro/chartjs/js'),
        ], 'public');

        $this->publishes([
            //__DIR__.'/views' => base_path('resources/views/wisdmlabs/todolist'),
            __DIR__ . '/views' => base_path('resources/views/vitopedro/chartjs'),
        ], 'views');
    }
}