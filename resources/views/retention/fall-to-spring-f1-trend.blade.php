<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retention Rates</title>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>
<body>

@php
    
    $full_time = [75.7, 75.8, 70.2, 89.1, 66.7];
    $part_time = [0.0, 66.7, 12.5, 33.3, 20.0];

    $chart_labels = ['Fall 2018-Spring 2019', 
                     'Fall 2019-Spring 2020', 
                     'Fall 2020-Spring 2021', 
                     'Fall 2021-Spring 2022', 
                     'Fall 2022-Spring 2023'];

    // DON'T EDIT PHP BLOCK BELOW THIS LINE
    
    $data29 = [
             ['label' => 'Full-time', 'color' => '#217ca3', 'values' => $full_time],
             ['label' => 'Part-time', 'color' => '#8d230f', 'values' => $part_time],
    ];

    
    $series29 = [
        'title' => "Fall-to-Spring",
        'subtitle' => "Retention of First-time, First-semester TRAD Freshman (F1)",
        'x_axis' => '',
        'y_axis' => 'Percentage (%)',
        'categories' => $chart_labels,
        'data' => $data29,
    ];

@endphp

<div id="app">

    <h2>Figure ?? - Fall-to-Spring Retention of First-time, First-semester TRAD Freshman</h2>
    <!-- <stacked-percentage-column-chart 
        :series='@json($series29)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart> -->
    
    <column-chart-for-percentages2  
        :series='@json($series29)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart-for-percentages2>
   
</div>

    <script src="/js/app.js"></script>
</body>
</html>