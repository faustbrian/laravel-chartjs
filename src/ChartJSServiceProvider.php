<?php

declare(strict_types=1);

/*
 * This file is part of Laravel ChartJS.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\ChartJS;

use Illuminate\Support\ServiceProvider;

class ChartJSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-chartjs'),
        ], 'views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-chartjs');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->registerBuilder();
    }

    /**
     * Register the builder.
     */
    private function registerBuilder()
    {
        $this->app->singleton('chartjs', function ($app) {
            return new Builder();
        });
    }
}
