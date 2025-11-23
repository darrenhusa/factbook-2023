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
    
    $hs_averages = [2.77, 2.60, 2.77, 2.69, 2.81];
    $chart_labels = ['Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024', 'Fall 2025'];

    // DON'T EDIT PHP BLOCK BELOW THIS LINE
    
    $data31 = [
             ['label' => '', 'color' => '#217ca3', 'values' => $hs_averages],
    ];

    $series31 = [
        'title' => 'Average High School GPA',
        'subtitle' => 'of First-time, Full-time Freshman',
        'y_axis_max' => 4.0,
        'categories' => $chart_labels,
        'data' => $data31,
    ];

@endphp

<div id="app">

    <h2>Figure ?? - Average High School GPA of First-time, Full-time Freshman</h2>
    <column-chart2 
        :series='@json($series31)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart2>

</div>

    <script src="/js/app.js"></script>
</body>
</html>