<?php



declare(strict_types=1);

namespace BrianFaust\Tests\ChartJS\Tests\Facades;

use BrianFaust\ChartJS\Builder;
use BrianFaust\ChartJS\Facades\ChartJS;
use BrianFaust\Tests\ChartJS\AbstractTestCase;
use GrahamCampbell\TestBenchCore\FacadeTrait;

class ChartJSTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'chartjs';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return ChartJS::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return Builder::class;
    }
}
