<?php

namespace BrianFaust\ChartJS\Facades;

use Illuminate\Support\Facades\Facade;

class ChartJS extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'chartjs';
    }
}
