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
    // NOTE divideArraysElementByElement() is in app/helpers.php

    // data from ipeds data center
    // 4-YR RATES (using the 150% cohort or the ipeds standard report data)
   
    // GR2023 = cohort start 2017
    // GR2022 = cohort start 2016
    // GR2021 = cohort start 2015
    // GR2020 = cohort start 2014
    // GR2019 = cohort start 2013
    
    $chart_labels = ["GR2019-CS2013", "GR2020-CS2014", 'GR2021-CS2015', 'GR2022-CS2016', 'GR2023-CS2017'];

    // ccsj data
    $ccsj_adjusted_cohort = [116, 122, 114, 102, 94];
    $ccsj_bach_completers_in_4 = [31, 31, 16, 12, 20];
    
    $ccsj_temp = divideArraysElementByElement($ccsj_bach_completers_in_4, $ccsj_adjusted_cohort);

    // Option A: Modify the original array
    foreach ($ccsj_temp as &$element) {
        $element *= 100.0;
    }
    unset($element); // Unset the reference to prevent unintended side effects
    
    // Round each element to zero decimal places
    $ccsj_4yr_grs = array_map('round', $ccsj_temp);

    // end - ccsj block
    
    // iunw data
    $iunw_adjusted_cohort = [670, 622, 567, 547, 543];
    $iunw_bach_completers_in_4 = [107, 94, 125, 98, 121];
    
    $iunw_temp = divideArraysElementByElement($iunw_bach_completers_in_4, $iunw_adjusted_cohort);

    // Option A: Modify the original array
    foreach ($iunw_temp as &$element) {
        $element *= 100.0;
    }
    unset($element); // Unset the reference to prevent unintended side effects
    
    // Round each element to zero decimal places
    $iunw_4yr_grs = array_map('round', $iunw_temp);

    // end - iunw block
    
    // punw data
    $punw_adjusted_cohort = [1394, 1423, 1510, 1203, 1070];
    $punw_bach_completers_in_4 = [257, 306, 313, 307, 299];
    
    $punw_temp = divideArraysElementByElement($punw_bach_completers_in_4, $punw_adjusted_cohort);

    // Option A: Modify the original array
    foreach ($punw_temp as &$element) {
        $element *= 100.0;
    }
    unset($element); // Unset the reference to prevent unintended side effects
    
    // Round each element to zero decimal places
    $punw_4yr_grs = array_map('round', $punw_temp);

    // end - punw block
    
    // DON'T EDIT PHP BLOCK BELOW THIS LINE
    
    $data17 = [
             ['label' => 'CCSJ', 'color' => '#8d230f', 'values' => $ccsj_4yr_grs ],
             ['label' => 'IUNW', 'color' => '#217ca3', 'values' => $iunw_4yr_grs ],
             ['label' => 'PUNW', 'color' => '#ffa500', 'values' => $punw_4yr_grs ],
    ];

    
    $series17 = [
        'title' => "4-Yr Graduation Rates (in %)",
        'subtitle' => "Using completers of bachelor's or equiv degrees in 4 years or less",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => $chart_labels,
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