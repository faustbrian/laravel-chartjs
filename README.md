# Laravel ChartJS

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-chartjs
```

Add the service provider to `config/app.php` in the `providers` array.

``` php
'providers' => [
    // ... Illuminate Providers
    // ... App Providers
    BrianFaust\ChartJS\ServiceProvider::class
];
```

If you want you can use the [facade](http://laravel.com/docs/facades). Add the reference in `config/app.php` to your aliases array.

``` php
'aliases' => [
    // ... Illuminate Facades
    'ChartJS' => BrianFaust\ChartJS\Facades\ChartJS::class
];
```

## Usage

``` php
public function index()
{
    $areaChart = ChartJS::name('areaChart')
                        ->type('Line')
                        ->element('areaChart')
                        ->dimension(250)
                        ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
                        ->datasets([[
                            'label' => 'Electronics',
                            'fillColor' => 'rgba(210, 214, 222, 1)',
                            'strokeColor' => 'rgba(210, 214, 222, 1)',
                            'pointColor' => 'rgba(210, 214, 222, 1)',
                            'pointStrokeColor' => '#c1c7d1',
                            'pointHighlightFill' => '#fff',
                            'pointHighlightStroke' => 'rgba(220,220,220,1)',
                            'data' => [65, 59, 80, 81, 56, 55, 40],
                        ], [
                            'label' => 'Digital Goods',
                            'fillColor' => 'rgba(60,141,188,0.9)',
                            'strokeColor' => 'rgba(60,141,188,0.8)',
                            'pointColor' => '#3b8bba',
                            'pointStrokeColor' => 'rgba(60,141,188,1)',
                            'pointHighlightFill' => '#fff',
                            'pointHighlightStroke' => 'rgba(60,141,188,1)',
                            'data' => [28, 48, 40, 19, 86, 27, 90],
                        ]])->options([
                            'showScale' => true,
                            'scaleShowGridLines' => false,
                            'scaleGridLineColor' => 'rgba(0,0,0,.05)',
                            'scaleGridLineWidth' => 1,
                            'scaleShowHorizontalLines' => true,
                            'scaleShowVerticalLines' => true,
                            'bezierCurve' => true,
                            'bezierCurveTension' => 0.3,
                            'pointDot' => false,
                            'pointDotRadius' => 4,
                            'pointDotStrokeWidth' => 1,
                            'pointHitDetectionRadius' => 20,
                            'datasetStroke' => true,
                            'datasetStrokeWidth' => 2,
                            'datasetFill' => true,
                            'legendTemplate' => '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                            'maintainAspectRatio' => false,
                            'responsive' => true,
                        ]);

    return $this->render('home');
}
```

```html
<div class="row">
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Area Chart</h3>
            </div>
            <div class="box-body">
                {!! ChartJS::renderCanvas('areaChart') !!}
            </div>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

{!! ChartJS::renderScripts('areaChart') !!}
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
