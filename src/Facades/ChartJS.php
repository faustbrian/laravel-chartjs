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

namespace Artisanry\ChartJS\Facades;

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
