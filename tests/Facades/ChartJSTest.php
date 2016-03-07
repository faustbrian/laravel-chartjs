<?php

/*
 * This file is part of Laravel ChartJS.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Tests\ChartJS\Tests\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use DraperStudio\Tests\ChartJS\AbstractTestCase;
use DraperStudio\ChartJS\Facades\ChartJS;
use DraperStudio\ChartJS\Builder;

/**
 * This is the facade test class.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
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
