<?php

namespace DraperStudio\ChartJS;

class Builder
{
    private $charts = [];

    private $defaults = [
        'context' => '2d',
        'datasets' => [],
        'dimension' => ['width' => 'auto', 'height' => 'auto'],
        'element' => null,
        'labels' => [],
        'prefix' => 'chartjs-',
        'type' => 'Line',
        'options' => [
            'animation' => true,
            'animationSteps' => 100,
            'animationEasing' => 'easeOutBounce',
        ],
    ];

    private $types = [
        'Bar' => 'extended',
        'Doughnut' => 'minimal',
        'Line' => 'extended',
        'Pie' => 'minimal',
        'PolarArea' => 'minimal',
        'Radar' => 'extended',
    ];

    public function name($name)
    {
        $this->name = $name;
        $this->charts[$name] = $this->defaults;

        return $this;
    }

    public function element($element)
    {
        return $this->set('element', $element);
    }

    public function context($context)
    {
        return $this->set('context', $context);
    }

    public function labels(array $labels)
    {
        return $this->set('labels', $labels);
    }

    public function datasets(array $datasets)
    {
        return $this->set('datasets', $datasets);
    }

    public function prefix($prefix)
    {
        return $this->set('prefix', $prefix);
    }

    public function type($type)
    {
        if (!array_key_exists($type, $this->types)) {
            throw new \InvalidArgumentException('Invalid Chart type.');
        }

        return $this->set('type', $type);
    }

    public function dimension($width, $height = 0)
    {
        if (empty($height)) {
            $height = $width;
        }

        return $this->set('dimension', compact('width', 'height'));
    }

    public function options(array $options)
    {
        foreach ($options as $key => $value) {
            $this->set('options.'.$key, $value);
        }

        return $this;
    }

    public function renderCanvas($name)
    {
        $chart = $this->charts[$name];

        return view('chartjs::canvas')
                ->with('dimension', $chart['dimension'])
                ->with('element', $chart['element'])
                ->with('prefix', $chart['prefix']);
    }

    public function renderScripts($name)
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

    private function getView($name)
    {
        return 'chartjs::scripts.'.$this->types[$this->charts[$name]['type']];
    }

    private function get($key)
    {
        return array_get($this->charts[$this->name], $key);
    }

    private function set($key, $value)
    {
        array_set($this->charts[$this->name], $key, $value);

        return $this;
    }
}
