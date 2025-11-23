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
<div id="app">
@php
    
    $data30 = [
             ['label' => 'Has HS GPA', 'color' => '#217ca3', 'values' => [83, 119, 151, 110, 138]],
             ['label' => 'No HS GPA', 'color' => '#8d230f', 'values' => [18, 4, 1, 0, 4]],
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
        'categories' => ['Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024', 'Fall 2025'],
        'data' => $data30,
    ];

    @endphp

    <h2>Figure ?? - First-time, Full-time, Freshman with HS GPA Scores</h2>
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
             ['label' => '', 'color' => '#217ca3', 'values' => [2.77, 2.60, 2.77, 2.69, 2.81]],
    ];

    $series31 = [
        'title' => 'Average High School GPA',
        'subtitle' => 'of First-time, Full-time Freshman',
        'y_axis_max' => 4.0,
        'categories' => ['Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024', 'Fall 2025'],
        'data' => $data31,
    ];

    @endphp

    <h2>Figure ?? - Average High School GPA of First-time, Full-time Freshman</h2>
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
        'categories' => ['Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024', 'Fall 2025'],
        'data' => $data32,
    ];

    @endphp

    <h2>Figure ?? - Percent of First-time, Full-time Freshman by HS GPA Ranges</h2>
    <stacked-percentage-column-chart 
        :series='@json($series32)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart>
    
    @php
    
    
</div>

    <script src="/js/app.js"></script>
</body>
</html>