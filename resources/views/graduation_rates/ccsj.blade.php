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

    $ccsj_4yr = [0, 0, 0, 0, 0];
    $ccsj_6yr = [44, 28, 24, 25, 30];
    $chart_lables = ["RY 2020", 'RY 2021', 'RY 2022', 'RY 2023', 'RY 2024'];
    $red = '#8d230f';
    $blue = '#217ca3';

    $data16 = [
             ['label' => '4-YR Rate', 'color' => $blue, 'values' => $ccsj_4yr ],
             ['label' => '6-YR Rate', 'color' => $red, 'values' => $ccsj_6yr ],
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