<?php

namespace BrianFaust\Tests\ChartJS;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use BrianFaust\ChartJS\ServiceProvider;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return ServiceProvider::class;
    }
}
