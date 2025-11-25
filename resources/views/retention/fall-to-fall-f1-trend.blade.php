<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 02</title>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>
<body>
   
@php
    
    $full_time = [48.5, 57.6, 42.7, 59.4, 35.8];
    $part_time = [0.0, 0.0, 25.0, 33.3, 0.0];

    $chart_labels = ['Fall 2018-Fall 2019', 
                     'Fall 2019-Fall 2020', 
                     'Fall 2020-Fall 2021', 
                     'Fall 2021-Fall 2022', 
                     'Fall 2022-Fall 2023'];

    // DON'T EDIT PHP BLOCK BELOW THIS LINE
    
    
    $data30 = [
             ['label' => 'Full-time', 'color' => '#217ca3', 'values' => $full_time],
             ['label' => 'Part-time', 'color' => '#8d230f', 'values' => $part_time],
    ];

    $series30 = [
        'title' => "Fall-to-Fall",
        'subtitle' => "Retention of First-time, First-semester TRAD Freshman (F1)",
        'x_axis' => '',
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => $chart_labels,
        'data' => $data30,
    ];

@endphp

<div id="app">

    <h2>Figure 30 - Fall-to-Fall Retention of First-time, First-semester TRAD Freshman</h2>
    <!-- <stacked-percentage-column-chart 
        :series='@json($series30)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart> -->
    
    <column-chart-for-percentages2 
        :series='@json($series30)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart-for-percentages2>

</div>

    <script src="/js/app.js"></script>
</body>
</html>