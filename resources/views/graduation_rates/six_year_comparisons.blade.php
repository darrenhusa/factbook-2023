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

    // data from ipeds data feedback reports (DFR)s
    // 6-YR RATES (150%)
    // 2024 = cohort start 2017
    // 2023 = cohort start 2016
    // 2022 = cohort start 2015
    // 2021 = cohort start 2014
    // 2020 = cohort start 2013
    
    $ccsj = [44, 28, 24, 25, 30];
    $iunw = [35, 32, 38, 37, 37];
    $punw = [38, 42, 40, 44, 44];

    $chart_lables = ["RY 2020-CS 2013", 'RY 2021-CS 2014', 'RY 2022-CS 2015', 'RY 2023-CS 2016', 'RY 2024-CS 2017'];
    
    $data18 = [
             ['label' => 'CCSJ', 'color' => '#8d230f', 'values' => $ccsj ],
             ['label' => 'IUNW', 'color' => '#217ca3', 'values' => $iunw ],
             ['label' => 'PUNW', 'color' => '', 'values' => $punw ],
    ];
    
    $series18 = [
        'title' => "6-Yr Graduation Rates (in %)",
        'subtitle' => "",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => $chart_lables,
        'data' => $data18,
    ];

    @endphp

    <div id="app">

        <h2>Figure ?? - 6-Yr Graduation Rates (in %)</h2>
        
        <column-chart-for-percentages2 
            :series='@json($series18)'
            :chart-width="1200"
            :chart-height="600">
        </column-chart-for-percentages2>
    
    </div>

    <script src="/js/app.js"></script>
</body>
</html>