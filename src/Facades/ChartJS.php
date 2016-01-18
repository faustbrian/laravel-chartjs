<?php

namespace DraperStudio\ChartJS\Facades;

use Illuminate\Support\Facades\Facade;

class ChartJS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'chartjs';
    }
}
