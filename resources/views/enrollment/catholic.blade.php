<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 01</title>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>
<body>
        
    <div id="app">
   
    @php

    // NOTE: calculate_element_sum defined in app/helpers.php

    //$catholic = ['label' => 'Catholic', 'values' => [174, 162, 105, 73, 47]];
    
    //$non_catholic_data = [
    //    ['label' => 'Baptist', 'values' => [0, 0, 6, 4, 4]],
    //     ['label' => 'Christian', 'values' => [2, 7, 30, 35, 14]],
    //    ['label' => 'Lutheran', 'values' => [0, 0, 4, 2, 2]],
    //    ['label' => 'None', 'values' => [1, 2, 18, 19, 13]],
    //    ['label' => 'Other', 'values' => [215, 235, 117, 81, 67]]
    //];
    
    //$unknown = ['label' => 'Unknown', 'values' => [3, 33, 148, 176, 282]];

    // DON'T EDIT PHP BLOCK BELOW THIS LINE

    //$non_catholic_totals = calculate_element_sum($non_catholic_data);

    //$data16 = [
    //         ['label' => 'Catholic', 'color' => '#8d230f', 'values' => $catholic['values']],
    //        ['label' => 'Non-Catholic', 'color' => '#217ca3', 'values' => $non_catholic_totals],
    //         ['label' => 'Unknown', 'color' => '', 'values' => $unknown['values']],
    //];
    
    //$series16 = [
    //    'title' => "Percent of Catholic Traditional Students",
    //    'subtitle' => "",
    //    'x_axis' => '',
    //    'y_axis_visible' => false,
    //    'y_axis' => 'Percentage (%)',
    //    'y_axis_max' => 100,
    //    'categories' => ['Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024', 'Fall 2025', ],
    //    'data' => $data16,
    //];

    // Optional: Display the results
    //echo "Catholics:\n";
    //print_r($catholic['values']);

    //echo "Non-Catholics:\n";
    //print_r($non_catholic_totals);

    //echo "Unknown:\n";
    //print_r($unknown['values']);

    @endphp

    <h2>Figure ?? - Percentages of Catholic Traditional Students</h2>
    <stacked-percentage-column-chart 
        :series='@json($series)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart>
    
    <column-chart-for-percentages2 
        :series='@json($series)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart-for-percentages2>
    
</div>

    <script src="/js/app.js"></script>
</body>
</html>