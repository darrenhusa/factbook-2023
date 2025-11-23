<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HS GPAs</title>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>
<body>

@php
    
    $rank_1_group = [42, 34, 33, 32, 37];
    $rank_2_group = [22, 18, 28, 21, 23];
    $rank_3_group = [22, 26, 30, 35, 36];
    $rank_4_group = [14, 23, 9, 13, 4];
    
    $chart_labels = ['Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024', 'Fall 2025'];

    // DON'T EDIT PHP BLOCK BELOW THIS LINE

    $data32 = [
             ['label' => '3.0 and above', 'color' => '#217ca3', 'values' => $rank_1_group],
             ['label' => '2.5 to 2.99', 'color' => '#8d230f', 'values' => $rank_2_group],
             ['label' => '2.0 to 2.49', 'color' => '#50CB93', 'values' => $rank_3_group],
             ['label' => '1.99 or below', 'color' => 'purple', 'values' => $rank_4_group],
    ];

    $series32 = [
        'title' => "Percent of First-time, Full-time, Freshman",
        'subtitle' => "by HS GPA Ranges",
        'x_axis' => '',
        'y_axis' => '',
        'categories' => $chart_labels,
        'data' => $data32,
    ];

@endphp

<div id="app">

    <h2>Figure ?? - Percent of First-time, Full-time Freshman by HS GPA Ranges</h2>
    <stacked-percentage-column-chart 
        :series='@json($series32)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart>
    
</div>

    <script src="/js/app.js"></script>
</body>
</html>