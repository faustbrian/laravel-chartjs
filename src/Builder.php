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

use Illuminate\View\View;

class Builder
{
    /**
     * @var array
     */
    private $charts = [];

    /**
     * @var array
     */
    private $defaults = [
        'context'   => '2d',
        'datasets'  => [],
        'dimension' => ['width' => 'auto', 'height' => 'auto'],
        'element'   => null,
        'labels'    => [],
        'prefix'    => 'chartjs-',
        'type'      => 'Line',
        'options'   => [
            'animation'       => true,
            'animationSteps'  => 100,
            'animationEasing' => 'easeOutBounce',
        ],
    ];

    /**
     * @var array
     */
    private $types = [
        'Bar'       => 'extended',
        'Doughnut'  => 'minimal',
        'Line'      => 'extended',
        'Pie'       => 'minimal',
        'PolarArea' => 'minimal',
        'Radar'     => 'extended',
    ];

    /**
     * @param $name
     *
     * @return $this
     */
    public function name($name): self
    {
        $this->name = $name;
        $this->charts[$name] = $this->defaults;

        return $this;
    }

    /**
     * @param $element
     *
     * @return Builder
     */
    public function element($element): self
    {
        return $this->set('element', $element);
    }

    /**
     * @param $context
     *
     * @return Builder
     */
    public function context($context): self
    {
        return $this->set('context', $context);
    }

    /**
     * @param array $labels
     *
     * @return Builder
     */
    public function labels(array $labels): self
    {
        return $this->set('labels', $labels);
    }

    /**
     * @param array $datasets
     *
     * @return Builder
     */
    public function datasets(array $datasets): self
    {
        return $this->set('datasets', $datasets);
    }

    /**
     * @param $prefix
     *
     * @return Builder
     */
    public function prefix($prefix): self
    {
        return $this->set('prefix', $prefix);
    }

    /**
     * @param $type
     *
     * @return Builder
     */
    public function type($type): self
    {
        if (!array_key_exists($type, $this->types)) {
            throw new \InvalidArgumentException('Invalid Chart type.');
        }

        return $this->set('type', $type);
    }

    /**
     * @param $width
     * @param int $height
     *
     * @return Builder
     */
    public function dimension($width, $height = 0): self
    {
        if (empty($height)) {
            $height = $width;
        }

        return $this->set('dimension', compact('width', 'height'));
    }

    /**
     * @param array $options
     *
     * @return $this
     */
    public function options(array $options): self
    {
        foreach ($options as $key => $value) {
            $this->set('options.'.$key, $value);
        }

        return $this;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function renderCanvas($name): View
    {
        $chart = $this->charts[$name];

        return view('chartjs::canvas')
                ->with('dimension', $chart['dimension'])
                ->with('element', $chart['element'])
                ->with('prefix', $chart['prefix']);
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function renderScripts($name): View
    {
        $chart = $this->charts[$name];

        return view($this->getView($name))
                ->with('context', $chart['context'])
                ->with('datasets', $chart['datasets'])
                ->with('element', $chart['element'])
                ->with('labels', $chart['labels'])
                ->with('options', $chart['options'])
                ->with('prefix', $chart['prefix'])
                ->with('type', $chart['type']);
    }

    /**
     * @param $name
     *
     * @return string
     */
    private function getView($name): string
    {
        return 'chartjs::scripts.'.$this->types[$this->charts[$name]['type']];
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    private function get($key)
    {
        return array_get($this->charts[$this->name], $key);
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    private function set($key, $value): self
    {
        array_set($this->charts[$this->name], $key, $value);

        return $this;
    }
}
