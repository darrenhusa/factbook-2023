<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graduation Rates</title>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>
<body>
        
@php

    $ccsj_4yr = [16, 17, 27, 25, 14];
    $ccsj_6yr = [24, 26, 35, 28, 17];
    $ccsj_8yr = [27, 33, 41, 29, 18];

    $chart_lables = ['DFR 2020-CS 2011', 'DFR 2021-CS 2012', 'DFR 2022-CS 2013', 'DFR 2023-CS 2014', 'DFR 2024-CS 2015'];
    $red = '#8d230f';
    $blue = '#217ca3';
    $orange = '#ffa500';

    $data16 = [
             ['label' => '4-YR Rate', 'color' => $blue, 'values' => $ccsj_4yr ],
             ['label' => '6-YR Rate', 'color' => $red, 'values' => $ccsj_6yr ],
             ['label' => '8-YR Rate', 'color' => $orange, 'values' => $ccsj_8yr ],
    ];
    
    $series16 = [
        'title' => "CCSJ Graduation Rates (in %)",
        'subtitle' => "",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => $chart_lables,
        'data' => $data16,
    ];

    @endphp

    <div id="app">

        <h2>Figure ?? - CCSJ Graduation Rates (in %)</h2>
        
        <column-chart-for-percentages2 
            :series='@json($series16)'
            :chart-width="1200"
            :chart-height="600">
        </column-chart-for-percentages2>

    </div>

    <script src="/js/app.js"></script>
</body>
</html>