<?php

namespace DraperStudio\ChartJS;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'chartjs';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishViews()
             ->loadViews();
    }

    public function register()
    {
        $this->app->singleton('chartjs', function ($app) {
            return new Builder();
        });
    }
}
