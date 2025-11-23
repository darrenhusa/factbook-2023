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
    
    // data from ipeds data center????
    // 4-YR RATES 
   
    $data17 = [
             ['label' => 'CCSJ', 'color' => '#8d230f', 'values' => [0, 0, 0, 0, 0] ],
             ['label' => 'IUNW', 'color' => '#217ca3', 'values' => [0, 0, 0, 0, 0] ],
             ['label' => 'PUNW', 'color' => '', 'values' => [0, 0, 0, 0, 0] ],
    ];

    $chart_lables = ["RY 2020", 'RY 2021', 'RY 2022', 'RY 2023', 'RY 2024'];
    
    $series17 = [
        'title' => "4-Yr Graduation Rates (in %)",
        'subtitle' => "",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => $chart_lables,
        'data' => $data17,
    ];

    @endphp

    <div id="app">

        <h2>Figure ?? - 4-Yr Graduation Rates (in %)</h2>
        
        <column-chart-for-percentages2 
            :series='@json($series17)'
            :chart-width="1200"
            :chart-height="600">
        </column-chart-for-percentages2>

    </div>

    <script src="/js/app.js"></script>
</body>
</html>