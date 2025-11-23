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
    
    $data16 = [
             ['label' => '4-YR Rate', 'color' => '#8d230f', 'values' => [17.1, 26.7, 25.4, 16.7, 11.8] ],
             ['label' => '6-YR Rate', 'color' => '#217ca3', 'values' => [26.4, 35.3, 27.9, 33.3, 23.5] ],
    ];
    
    $series16 = [
        'title' => "CCSJ Graduation Rates (in %)",
        'subtitle' => "",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => ["RY 2020", 'RY 2021', 'RY 2022', 'RY 2023', 'RY 2024'],
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


    @php
    
    $data17 = [
             ['label' => 'CCSJ', 'color' => '#8d230f', 'values' => [16.0, 17.1, 26.7, 25.4, 16.7] ],
             ['label' => 'IUNW', 'color' => '#217ca3', 'values' => [8.6, 15.0, 16.0, 15.1, 22.0] ],
             ['label' => 'PUNW', 'color' => '', 'values' => [12.4, 15.6, 18.4, 21.5, 20.7] ],
    ];
    
    $series17 = [
        'title' => "4-Yr Graduation Rates (in %)",
        'subtitle' => "",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => ["RY 2020", 'RY 2021', 'RY 2022', 'RY 2023', 'RY 2024'],
        'data' => $data17,
    ];

    @endphp


        <h2>Figure ?? - 4-Yr Graduation Rates (in %)</h2>
        
        <column-chart-for-percentages2 
            :series='@json($series17)'
            :chart-width="1200"
            :chart-height="600">
        </column-chart-for-percentages2>

    
    @php
    
    $data18 = [
             ['label' => 'CCSJ', 'color' => '#8d230f', 'values' => [16.0, 17.1, 26.7, 25.4, 16.7] ],
             ['label' => 'IUNW', 'color' => '#217ca3', 'values' => [8.6, 15.0, 16.0, 15.1, 22.0] ],
             ['label' => 'PUNW', 'color' => '', 'values' => [12.4, 15.6, 18.4, 21.5, 20.7] ],
    ];
    
    $series18 = [
        'title' => "6-Yr Graduation Rates (in %)",
        'subtitle' => "",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => ["RY 2020", 'RY 2021', 'RY 2022', 'RY 2023', 'RY 2024'],
        'data' => $data18,
    ];

    @endphp


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