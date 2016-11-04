<?php

namespace BrianFaust\ChartJS;

class ServiceProvider extends \BrianFaust\ServiceProvider\ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishViews();
        $this->loadViews();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        parent::register();

        $this->app->singleton('chartjs', function ($app) {
            return new Builder();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_merge(parent::provides(), ['chartjs']);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName()
    {
        return 'chartjs';
    }
}
