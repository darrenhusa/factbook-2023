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

// for figure 20   
// colors taken from Excel chart via rgb lookup.
// colors converted to hex using https://www.rgbtohex.net/

$f1_to_f2 = [68.5, 86.2, 67.1, 77.0, 76.1];
$f1_to_so = [41.8, 56.9, 37.1, 40.4, 52.2];
$so_to_jr = [75.3, 63.3, 72.3, 70.1, 86.9];
$jr_to_sr = [80.0, 83.5, 75.3, 83.8, 83.3];

$chart_labels = ['Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024'];

// DON'T EDIT PHP BLOCK BELOW THIS LINE

$data20 = [['label' => 'F1 to F2', 'color' => '#4f81bd', 'showDataLabels' => false,  'values' => $f1_to_f2],
         ['label' => 'F1 to SO', 'color' => '#be4a48', 'showDataLabels' => false, 'values' => $f1_to_so],
         ['label' => 'SO to JR', 'color' => '#92d050',  'showDataLabels' => false, 'values' => $so_to_jr],
         ['label' => 'JR to SR', 'color' => '#7030a0', 'showDataLabels' => false, 'values' => $jr_to_sr],
];

    $length20 = count($data20);
    
    $labels20 = [$data20[0]['label'], $data20[1]['label'], $data20[2]['label'], $data20[3]['label']];
    $numbers20 = [$data20[0]['values'], $data20[1]['values'], $data20[2]['values'], $data20[3]['values']];

    $f1_f2_avg = array_sum($data20[0]['values'])/5.0;
    $f1_so_avg = array_sum($data20[1]['values'])/5.0;
    $so_jr_avg = array_sum($data20[2]['values'])/5.0;
    $jr_sr_avg = array_sum($data20[3]['values'])/5.0;

    echo "F1-F2 Average = " . $f1_f2_avg . "\n";
    echo "F1-SO Average = " . $f1_so_avg . "\n";
    echo "SO-JR Average = " . $so_jr_avg . "\n";
    echo "JR-SR Average = " . $jr_sr_avg . "\n";

$series20 = [
    'title' => 'Retention Rates',
    'subtitle' => '(Full-time Traditional)',
    'y_axis_min' => 0,
    'y_axis_max' => 100,
    'y_axis_tickinterval' => 10,
    'categories' => $chart_labels,
    'data' => $data20,
];
@endphp

<div id="app">

        <h2>Figure 20 - Historical Retention Rates of Full-time Traditional Students</h2>
        <line-chart2 
            v-bind:series='@json($series20)'
            v-bind:chart-width="1200"
            v-bind:chart-height="600">
        </line-chart2>

        <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series20['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length20; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels20[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ number_format($numbers20[$j][$i], 1) }}%</td>
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