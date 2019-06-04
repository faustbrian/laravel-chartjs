<?php

declare(strict_types=1);

/*
 * This file is part of Laravel ChartJS.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Tests\ChartJS\Tests\Facades;

use Artisanry\ChartJS\Builder;
use Artisanry\ChartJS\Facades\ChartJS;
use Artisanry\Tests\ChartJS\AbstractTestCase;
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
