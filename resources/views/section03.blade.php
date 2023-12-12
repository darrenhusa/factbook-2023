<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 03</title>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>
<body>
<div id="app">
@php
    
    $data30 = [
             ['label' => 'Has HS GPA', 'color' => '#217ca3', 'values' => [123, 132, 99, 121, 150]],
             ['label' => 'No HS GPA', 'color' => '#8d230f', 'values' => [9, 1, 2, 2, 2]],
    ];

    $length30 = count($data30);
    $total30 = [];

    for ($i = 0; $i < 5; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length30; $j++) {
            $sum += $data30[$j]['values'][$i];
        }
        array_push($total30, $sum);
    }

   
    //calculate percentages for html table
    
    for ($i = 0; $i < 5; $i++)
    {   $num1 = round(100.0 * $data30[0]['values'][$i]/$total30[$i], 0);
        $num2 = round(100.0 * $data30[1]['values'][$i]/$total30[$i], 0);
        $percents30[] = [$num1, $num2, 100]; 
    }

    $labels30 = [];
    $numbers30 = [];

    for ($j = 0; $j < $length30; $j++) {
        array_push($labels30, $data30[$j]['label']);
        array_push($numbers30, $data30[$j]['values']);
    }
    array_push($labels30, 'Grand Total');
    array_push($numbers30, $total30);

    $series30 = [
        'title' => 'Numbers of First-time, Full-time, Freshman',
        'subtitle' => 'with High School GPA scores',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data30,
    ];

    @endphp

    <h2>Figure 30 - First-time, Full-time, Freshman with HS GPA Scores</h2>
    <stacked-column-chart 
        :series='@json($series30)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-column-chart>

    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series30['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length30+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels30[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ number_format($numbers30[$j][$i]) }} ({{$percents30[$i][$j] }}%)</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>



@php
    
    $data31 = [
             ['label' => '', 'color' => '#217ca3', 'values' => [2.75, 2.70, 2.73, 2.60, 2.77]],
    ];

    $series31 = [
        'title' => 'Average High School GPA',
        'subtitle' => 'of First-time, Full-time Freshman',
        'y_axis_max' => 4.0,
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data31,
    ];

    @endphp

    <h2>Figure 31 - Average High School GPA of First-time, Full-time Freshman</h2>
    <column-chart2 
        :series='@json($series31)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart2>

    @php
    
    $data32 = [
             ['label' => '3.0 and above', 'color' => '#217ca3', 'values' => [35.8, 34.1, 41.4, 33.1, 32.7]],
             ['label' => '2.5 to 2.99', 'color' => '#8d230f', 'values' => [29.3, 19.7, 21.2, 19.8, 28.7]],
             ['label' => '2.0 to 2.49', 'color' => '#50CB93', 'values' => [17.9, 28.0, 19.2, 25.6, 30.0]],
             ['label' => 'Less than 2.0', 'color' => 'purple', 'values' => [17.1, 18.2, 18.2, 21.5, 8.7]],
    ];

    $series32 = [
        'title' => "Percent of First-time, Full-time, Freshman",
        'subtitle' => "by HS GPA Ranges",
        'x_axis' => '',
        'y_axis' => '',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data32,
    ];

    @endphp

    <h2>Figure 32 - Percent of First-time, Full-time Freshman by HS GPA Ranges</h2>
    <stacked-percentage-column-chart 
        :series='@json($series32)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart>
    
    @php
    
    $data33 = [
             ['label' => 'MATH 103', 'color' => '#217ca3', 'values' => [285, 285, 345, 345, 237]],
             ['label' => 'MATH 097', 'color' => '#8d230f', 'values' => [180, 198, 213, 336, 210]],
             ['label' => 'MATH 095', 'color' => '#50CB93', 'values' => [105, 141, 153, 183, 165]],             
             ['label' => '(EWPC)/EMCO 096', 'color' => 'lightblue', 'values' => [240, 204, 90, 84, 213]],
    ];

    $length33 = count($data33);
    $total33 = [];

    for ($i = 0; $i < 5; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length33; $j++) {
            $sum += $data33[$j]['values'][$i];
        }
        array_push($total33, $sum);
    }

    $labels33 = [];
    $numbers33 = [];

    for ($j = 0; $j < $length33; $j++) {
        array_push($labels33, $data33[$j]['label']);
        array_push($numbers33, $data33[$j]['values']);
    }
    array_push($labels33, 'Grand Total');
    array_push($numbers33, $total33);

    $series33 = [
        'title' => 'Credit Hours in',
        'subtitle' => 'Developmental Courses',
        'categories' => ['2019-2020', '2020-2021', '2021-2022', '2022-2023', '2023-2024'],
        'data' => $data33,
    ];

    @endphp

    <h2>Figure 33 - Credit Hours in Developmental Courses</h2>
    <stacked-column-chart 
        :series='@json($series33)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-column-chart>

    @php
    
    $data34 = [
             ['label' => 'Cr Hrs in Dev', 'color' => '#217ca3', 'values' => [810, 816, 801, 948, 825]],
             ['label' => 'Cr Hrs in TRAD (Non-Dev)', 'color' => '#8d230f', 'values' => [10578, 10777, 10088, 10280, 7129]],
    ];

    $length34 = count($data34);
    $total34 = [];

    for ($i = 0; $i < 5; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length34; $j++) {
            $sum += $data34[$j]['values'][$i];
        }
        array_push($total34, $sum);
    }

    $labels34 = [];
    $numbers34 = [];

    for ($j = 0; $j < $length34; $j++) {
        array_push($labels34, $data34[$j]['label']);
        array_push($numbers34, $data34[$j]['values']);
    }
    array_push($labels34, 'Grand Total');
    array_push($numbers34, $total34);

    $total34 = [];

    //calculate percentages for html table
    for ($i = 0; $i < 5; $i++)
    {
        $total34[] = $data34[0]['values'][$i] + $data34[1]['values'][$i]; 
    }
    
    for ($i = 0; $i < 5; $i++)
    {   $num1 = round(100.0 * $data34[0]['values'][$i]/$total34[$i], 0);
        $num2 = round(100.0 * $data34[1]['values'][$i]/$total34[$i], 0);
        $percents34[] = [100, $num1, $num2]; 
    }

    $labels34 = ['Total', $data34[0]['label'], $data34[1]['label']];
    $numbers34 = [$total34, $data34[0]['values'], $data34[1]['values']];


    $series34 = [
        'title' => 'Credit Hours in Developmental Courses vs Credit Hours in TRAD (Non-Dev) Courses',
        'subtitle' => '',
        'categories' => ['2019-2020', '2020-2021', '2021-2022', '2022-2023', '2023-2024'],
        'data' => $data34,
    ];

    @endphp

    <h2>Figure 34 - Credit Hours in Developmental Courses vs Credit Hours in TRAD (NON-DEV) Courses</h2>
    <p>TODO - Add HTML table to display numbers and percentages????</p>
    <stacked-column-chart 
        :series='@json($series34)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-column-chart>

    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series34['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length34+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels34[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ number_format($numbers34[$j][$i]) }} ({{$percents34[$i][$j] }}%)</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>


    <stacked-column-with-data-label-percents-chart 

        :series='@json($series34)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-column-with-data-label-percents-chart>



    @php
    
    $data35 = [
             ['label' => 'Full-time Instructor', 'color' => '#217ca3', 'values' => [41.0, 40.7, 40.5, 41.3, 51.9]],
             ['label' => 'Adjunct Instructor', 'color' => '#8d230f', 'values' => [59.0, 59.3, 59.5, 58.7, 48.1]],
    ];

    $series35 = [
        'title' => "Percentage Credit Hours Taught",
        'subtitle' => "by Full-Time vs. Adjunct Faculty",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => ['2019-2020', '2020-2021', '2021-2022', '2022-2023', '2023-2024'],
        'data' => $data35,
    ];

    @endphp

    <h2>Figure 35 - Percentage Credit Hours Taught by Full-Time vs. Adjunct Faculty</h2>
    <!-- <stacked-percentage-column-chart 
        :series='@json($series35)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart> -->
    
    <column-chart-for-percentages2 
        :series='@json($series35)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart-for-percentages2>
    
    @php
    
    $data36 = [
             ['label' => 'Full-time Instructor', 'color' => '#217ca3', 'values' => [45.8, 40.9, 38.7, 37.9, 48.1]],
             ['label' => 'Adjunct Instructor', 'color' => '#8d230f', 'values' => [54.2, 59.1, 61.3, 62.1, 51.9]],
    ];

    $series36 = [
        'title' => "Percentage General Education Credit Hours Taught",
        'subtitle' => "by Full-Time vs. Adjunct Faculty",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => ['2019-2020', '2020-2021', '2021-2022', '2022-2023', '2023-2024'],
        'data' => $data36,
    ];

    @endphp

    <h2>Figure 36 - Percentage General Education Credit Hours Taught by Full-Time vs. Adjunct Faculty</h2>
    <!-- <stacked-percentage-column-chart 
        :series='@json($series35)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart> -->
    
    <column-chart-for-percentages2 
        :series='@json($series36)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart-for-percentages2>
    

    @php
    
    $data37 = [
             ['label' => 'Traditional Undergraduate', 'color' => '#217ca3', 'values' => [11388, 11593, 10889, 11228, 7954]],
             ['label' => 'Traditional-Intersession', 'color' => '#8d230f', 'values' => [39, 195, 129, 111, 6]],
             ['label' => 'Degree Completion', 'color' => '#50CB93', 'values' => [2349, 2226, 2169, 1974, 1203]],
             ['label' => 'Graduate', 'color' => 'purple', 'values' => [2689, 2576, 1827, 1885, 829]],
    ];
    $length37 = count($data37);
    $total37 = [];

    //calculate percentages for html table
    for ($i = 0; $i < 5; $i++)
    {
        $total37[] = $data37[0]['values'][$i] + $data37[1]['values'][$i] + $data37[2]['values'][$i] + $data37[3]['values'][$i]; 
    }
    
    for ($i = 0; $i < 5; $i++)
    {   $num1 = round(100.0 * $data37[0]['values'][$i]/$total37[$i], 0);
        $num2 = round(100.0 * $data37[1]['values'][$i]/$total37[$i], 0);
        $num3 = round(100.0 * $data37[2]['values'][$i]/$total37[$i], 0);
        $num4 = round(100.0 * $data37[3]['values'][$i]/$total37[$i], 0);
        $percents37[] = [100, $num1, $num2, $num3, $num4]; 
    }

    $labels37 = ['Total', $data37[0]['label'], $data37[1]['label'], $data37[2]['label'], $data37[3]['label']];
    $numbers37 = [$total37, $data37[0]['values'], $data37[1]['values'], $data37[2]['values'], $data37[3]['values']];

   $series37 = [
        'title' => 'Credit Hour Production',
        'categories' => ['2019-2020', '2020-2021', '2021-2022', '2022-2023', '2023-2024'],
        'data' => $data37,
    ];

    
    @endphp

    <div id="app">
        <h2>Figure 37 - Credit Hour Production</h2>
        <stacked-column-with-data-label-percents-chart 
            :series='@json($series37)'
            :chart-width="1200"
            :chart-height="400">
        </stacked-column-with-data-label-percents-chart>

        <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series37['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length37+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels37[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ number_format($numbers37[$j][$i]) }} ({{$percents37[$i][$j] }}%)</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>

</div>

    <script src="/js/app.js"></script>
</body>
</html>