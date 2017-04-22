<?php



declare(strict_types=1);

namespace BrianFaust\ChartJS\Facades;

use Illuminate\Support\Facades\Facade;

class ChartJS extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'chartjs';
    }
}
