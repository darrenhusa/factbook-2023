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

// for figure 01   
// colors taken from Excel chart via rgb lookup.
// colors converted to hex using https://www.rgbtohex.net/
$dcp_headcounts = [155, 150, 141,	143, 165, 189, 306, 343, 339, 377, 464, 483, 443, 392, 359, 365, 343, 337, 326, 265, 324, 279, 253, 249, 149, 141, 130, 133, 130, 124, 133];
$grad_headcounts = ['', '', '', '', '', '', '', '', '', 115, 171, 149, 129,	196, 216, 157, 194,	184, 170, 164, 152,	169, 220, 256, 214, 190, 169, 139, 108, 95, 114];
$trad_ft_headcounts = [350,	357, 313, 286, 327,	319, 300, 267, 313, 326, 383, 405, 435, 435, 448, 493, 565, 543, 493, 475, 528, 496, 497, 443, 403, 353, 384, 409, 371, 409, 411];
$trad_pt_headcounts = [598, 618, 578,	559, 497, 468, 397,	365, 353, 323, 312,	301, 255, 248, 218,	199, 210, 187, 153,	129, 132, 85, 72, 46, 37, 31, 30, 24, 24, 30, 20];
$grand_totals_headcounts = [1103, 1125, 1032, 988, 989, 976, 1003, 975, 1005, 1141, 1330, 1338, 1262,	1271, 1241,	1214, 1312,	1251, 1142,	1033, 1136,	1029, 1042,	994, 803, 715, 713, 705, 633, 658, 678];

$data1 = [['label' => 'DCP', 'color' => '#5B9BD5', 'showDataLabels' => false,  'values' => $dcp_headcounts],
         ['label' => 'GRAD', 'color' => '#ED7D31', 'showDataLabels' => false, 'values' => $grad_headcounts],
         ['label' => 'TRAD - FT', 'color' => '#A5A5A5',  'showDataLabels' => true, 'values' => $trad_ft_headcounts],
         ['label' => 'TRAD - PT', 'color' => '#FFCC00', 'showDataLabels' => false, 'values' => $trad_pt_headcounts],
         ['label' => 'Grand Total', 'color' => '#4472C4', 'showDataLabels' => true, 'values' => $grand_totals_headcounts],
];

$series1 = [
    'title' => 'Historical CCSJ Headcounts (Fall 1993 to Fall 2023)',
    'subtitle' => '',
    'y_axis' => '',
    'categories' => [19931,	19941,	19951,	19961,	19971,	19981, 19991,	20001,	20011,	20021,	20031,	20041,	20051,	20061,	20071,	20081,	20091,	20101,	20111,	20121,	20131,	20141,	20151,	20161,	20171,	20181,	20191,	20201,	20211, 20221, 20231],
    'data' => $data1,
];
@endphp

        <h2>Figure 01 - Historical CCSJ Headcounts (Fall 1993 to Fall 2023)</h2>
        <basic-line-chart 
            v-bind:series='@json($series1)'
            v-bind:chart-width="1200"
            v-bind:chart-height="800">
        </basic-line-chart>

        @php
    
    $data3 = [
             ['label' => 'Athlete', 'color' => '#217ca3', 'values' => [268, 220, 217, 417, 529]],
             ['label' => 'NonAthlete', 'color' => '#8d230f', 'values' => [883, 1297, 353, 670, 895]]
    ];
    $length3 = count($data3);
    $total3 = [];

    for ($i = 0; $i < 5; $i++)
    {
        $total3[] = $data3[0]['values'][$i] + $data3[1]['values'][$i]; 
    }

    $labels3 = ['Total', $data3[0]['label'], $data3[1]['label']];
    $numbers3 = [$total3, $data3[0]['values'], $data3[1]['values']];

   $series3 = [
        'title' => 'Number of Submitted Applications - TRAD Programs',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data3,
    ];

    @endphp


        <h2>Figure 3 - TRAD Applications by Athletic Status</h2>
        <stacked-column-with-data-label-percents-chart 
            :series='@json($series3)'
            :chart-width="1200"
            :chart-height="400">
        </stacked-column-with-data-label-percents-chart>

        <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series3['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length3+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels3[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ number_format($numbers3[$j][$i]) }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>
    @php
    
    $data4 = [
             ['label' => 'Athlete', 'color' => '#217ca3', 'values' => [205, 165, 171, 320, 394]],
             ['label' => 'NonAthlete', 'color' => '#8d230f', 'values' => [395, 682, 158, 261, 420]]
    ];
    $length4 = count($data4);

    for ($i = 0; $i < 5; $i++)
    {
        $total4[] = $data4[0]['values'][$i] + $data4[1]['values'][$i]; 
    }

    $labels4 = ['Total', $data4[0]['label'], $data4[1]['label']];
    $numbers4 = [$total4, $data4[0]['values'], $data4[1]['values']];

    $series4 = [
        'title' => 'Number of Accepted - TRAD Programs',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data4,
    ];

    @endphp

    
    <h2>Figure 4 - TRAD Accepted by Athletic Status</h2>
    <stacked-column-with-data-label-percents-chart 
        :series='@json($series4)'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-with-data-label-percents-chart>
    
    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series4['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length4+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels4[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers4[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>

    @php
    
    $data5 = [
             ['label' => 'Athlete', 'color' => '#217ca3', 'values' => [132, 124, 135, 242, 241]],
             ['label' => 'NonAthlete', 'color' => '#8d230f', 'values' => [158, 278, 87, 87, 132]]
    ];

    $length5 = count($data5);

    for ($i = 0; $i < 5; $i++)
    {
        $total5[] = $data5[0]['values'][$i] + $data5[1]['values'][$i]; 
    }

    $labels5 = ['Total', $data5[0]['label'], $data5[1]['label']];
    $numbers5 = [$total5, $data5[0]['values'], $data5[1]['values']];

    $series5 = [
        'title' => 'Number of Admitted (Final Accepted) - TRAD Programs',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data5,
    ];

    @endphp

    <h2>Figure 5 - TRAD Admitted by Athletic Status</h2>
    <stacked-column-with-data-label-percents-chart 
        :series='@json($series5)'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-with-data-label-percents-chart>
    
    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series5['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length5+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels5[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers5[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>

    @php
    
    $data6 = [
             ['label' => 'Athlete', 'color' => '#217ca3', 'values' => [113, 96, 115, 181, 184]],
             ['label' => 'NonAthlete', 'color' => '#8d230f', 'values' => [125, 107, 60, 60, 65]]
    ];

    $length6 = count($data6);

    for ($i = 0; $i < 5; $i++)
    {
        $total6[] = $data6[0]['values'][$i] + $data6[1]['values'][$i]; 
    }

    $labels6 = ['Total', $data6[0]['label'], $data6[1]['label']];
    $numbers6 = [$total6, $data6[0]['values'], $data6[1]['values']];

    $series6 = [
        'title' => 'Number of Registered - TRAD Programs',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data6,
    ];

    @endphp

    <h2>Figure 6 - TRAD Registered by Athletic Status</h2>
    <stacked-column-with-data-label-percents-chart 
        :series='@json($series6)'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-with-data-label-percents-chart>

    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series6['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length6+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels6[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers6[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>

    @php
    
    $data7 = [
             ['label' => 'Athlete', 'color' => '#217ca3', 'values' => [107, 90, 112, 156, 159]],
             ['label' => 'NonAthlete', 'color' => '#8d230f', 'values' => [90, 67, 51, 51, 47]]
    ];

    $length7 = count($data7);

    for ($i = 0; $i < 5; $i++)
    {
        $total7[] = $data7[0]['values'][$i] + $data7[1]['values'][$i]; 
    }

    $labels7 = ['Total', $data7[0]['label'], $data7[1]['label']];
    $numbers7 = [$total7, $data7[0]['values'], $data7[1]['values']];

    $series7 = [
        'title' => 'Number of Enrolled - TRAD Programs',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data7,
    ];

    @endphp

    <h2>Figure 7 - TRAD Enrolled by Athletic Status</h2>
    <stacked-column-with-data-label-percents-chart 
        :series='@json($series7)'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-with-data-label-percents-chart>
       
    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series7['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length7+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels7[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers7[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>


@php
    
    $data8 = [
             ['label' => 'first-time', 'color' => '#217ca3', 'values' => [4, 4, 2, 48, 12, 13, 8, 6, 1, 16, 1, 1, 23, 0, 2, 19]],
             ['label' => 'continuing', 'color' => '#8d230f', 'values' => [5, 0, 5, 62, 32, 17, 14, 12, 2, 6, 5, 0, 37, 0, 3, 23]],
             ['label' => 'transfer', 'color' => '#50CB93', 'values' => [1, 2, 0, 16, 6, 2, 3, 1, 0, 2, 0, 0, 9, 1, 0, 5]]
    ];

    $programs8 = ['Acct', 'Asd', 'Biomed', 'Bmt', 'CriJ', 'DSA', 'Educ', 'Emco', 'FrnsSci', 'GenStud', 'HSv', 'IntStud', 'Kines', 'LifSci', 'MedLabSci', 'Psyc'];

    $series8 = [
        'title' => "Fall 2023 TRAD Enrollment",
        'subtitle' => "by Program and by Entry-type",
        'x_axis' => 'Programs',
        'y_axis' => 'Headcount - Full-time and Part-time',
        'y_axis_max' => 110,
        'categories' => $programs8,
        'data' => $data8,
    ];

    @endphp

    <h2>Figure 8 - Fall 2023 TRAD Enrolled by Program and by Entry-type (numbers)</h2>
    <stacked-column-chart2 
        :series='@json($series8)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-column-chart2>
       
    @php
    
    $data9 = [
             ['label' => 'first-time', 'color' => '#217ca3', 'values' => [2, 6, 31, 16, 17, 5, 3, 1, 1, 19, 3, 1, 25, 0, 2, 0, 6]],
             ['label' => 'continuing', 'color' => '#8d230f', 'values' => [13, 8, 58, 38, 21, 17, 9, 1, 2, 15, 3, 8, 22, 1, 1, 1, 27]],
             ['label' => 'transfer', 'color' => '#50CB93', 'values' => [2, 0, 20, 9, 9, 1, 1, 1, 2, 7, 1, 0, 7, 0, 0, 0, 3]]
    ];

    $programs9 = ['Acct', 'Biomed', 'Bmt', 'CriJ', 'DSA', 'Educ', 'Emco', 'FrnsBio', 'FrnsSci', 'GenStud', 'HlthSci', 'HSv', 'Kines', 'LifSci', 'MedLabSci', 'NonDegree', 'Psyc'];

    $series9 = [
        'title' => "Fall 2023 TRAD Enrollment",
        'subtitle' => "by Program and by Entry-type",
        'x_axis' => 'Programs',
        'y_axis' => 'Percentages',
        'y_axis_max' => 100,
        'categories' => $programs9,
        'data' => $data9,
    ];

    @endphp

    <h2>Figure 9 - Fall 2023 TRAD Enrolled by Program and by Entry-type (percentage)</h2>
    <stacked-percentage-column-chart2 
        :series='@json($series9)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart2>
    
    @php
    
    $data10 = [
             ['label' => '', 'color' => '#217ca3', 'values' => [30, 24, 24, 30, 20]],
    ];

    $series10 = [
        'title' => 'TRAD Programs - Part-time Students',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'y_axis_visible' => false,
        'data' => $data10,
    ];

    @endphp

    <h2>Figure 10 - TRAD Programs - Number of Part-time Students</h2>
    <column-chart2 
        :series='@json($series10)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart2>



    <h2>Figure 11 - Fall 2023 Total College Headcount Treemap</h2>
        <headcount-treemap></headcount-treemap>

    @php
    
    $data12 = [
             ['label' => 'continuing', 'color' => '#217ca3', 'values' => [226, 263, 241, 243, 223]],
             ['label' => 'first-time', 'color' => '#8d230f', 'values' => [135, 141, 104, 128, 160]],
             ['label' => 'transfer', 'color' => 'lightblue', 'values' => [53, 29, 50, 68, 48]],
    ];
    $length12 = count($data12);
    $total12 = [];

    for ($i = 0; $i < 5; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length12; $j++) {
            $sum += $data12[$j]['values'][$i];
        }
        array_push($total12, $sum);
    }

    $labels12 = [];
    $numbers12 = [];

    for ($j = 0; $j < $length12; $j++) {
        array_push($labels12, $data12[$j]['label']);
        array_push($numbers12, $data12[$j]['values']);
    }
    array_push($labels12, 'Grand Total');
    array_push($numbers12, $total12);

    $series12 = [
        'title' => 'TRAD Programs - By Entry Type',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data12,
    ];

    @endphp

    <h2>Figure 12 - Traditional Programs - By Entry-type (numbers and percentages)</h2>
    <stacked-column-with-data-label-percents-chart 
        :series='@json($series12)'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-with-data-label-percents-chart>
       
    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series12['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length12+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels12[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers12[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>

    @php
    
    $data13 = [
             ['label' => '0', 'color' => '#217ca3', 'values' => [3, 1, 0, 1, 12]],
             ['label' => '1-15', 'color' => '#8d230f', 'values' => [7, 7, 4, 17, 8]],
             ['label' => '16-30', 'color' => '#50CB93', 'values' => [8, 8, 8, 11, 3]],
             ['label' => '31-60', 'color' => 'purple', 'values' => [24, 7, 14, 20, 13]],
             ['label' => '61-90', 'color' => 'lightblue', 'values' => [9, 6, 15, 14, 8]],
             ['label' => '91 and above', 'color' => 'orange', 'values' => [2, 0, 9, 5, 4]],
    ];

    $length13 = count($data13);
    $total13 = [];

    for ($i = 0; $i < 5; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length13; $j++) {
            $sum += $data13[$j]['values'][$i];
        }
        array_push($total13, $sum);
    }

    //calculate percentages for html table
    for ($i = 0; $i < 5; $i++)
    {
        $total13[] = $data13[0]['values'][$i] + $data13[1]['values'][$i] + $data13[2]['values'][$i] + $data13[3]['values'][$i] + $data13[4]['values'][$i] + $data13[5]['values'][$i]; 
    }
    for ($i = 0; $i < 5; $i++)
    {   $num1 = round(100.0 * $data13[0]['values'][$i]/$total13[$i], 0);
        $num2 = round(100.0 * $data13[1]['values'][$i]/$total13[$i], 0);
        $num3 = round(100.0 * $data13[2]['values'][$i]/$total13[$i], 0);
        $num4 = round(100.0 * $data13[3]['values'][$i]/$total13[$i], 0);
        $num5 = round(100.0 * $data13[4]['values'][$i]/$total13[$i], 0);
        $num6 = round(100.0 * $data13[5]['values'][$i]/$total13[$i], 0);
        $percents13[] = [$num1, $num2, $num3, $num4, $num5, $num6, 100]; 
    }

    $labels13 = [];
    $numbers13 = [];

    for ($j = 0; $j < $length13; $j++) {
        array_push($labels13, $data13[$j]['label']);
        array_push($numbers13, $data13[$j]['values']);
    }
    array_push($labels13, 'Grand Total');
    array_push($numbers13, $total13);

    $series13 = [
        'title' => 'TRAD Transfer Students - By Transfer Cr Hrs Earned Ranges',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data13,
    ];

    @endphp

    <h2>Figure 13 - TRAD Programs - Transfer Students by Transfer Credit Hours Earned Ranges</h2>
    <stacked-column-chart 
        :series='@json($series13)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-column-chart>

    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series13['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length13 + 1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels13[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers13[$j][$i] }} ({{$percents13[$i][$j] }}%)</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>
    
    @php
    
    $data14 = [
             ['label' => 'continuing', 'color' => '#217ca3', 'values' => [87, 88, 102, 93, 93]],
             ['label' => 'first-time', 'color' => '#8d230f', 'values' => [0, 1, 0, 0, 8]],
             ['label' => 'returning', 'color' => '#50CB93', 'values' => [1, 2, 0, 0, 0]],
             ['label' => 'transfer', 'color' => 'purple', 'values' => [42, 42, 28, 31, 31]],
    ];

    $length14 = count($data14);
    $total14 = [];

    for ($i = 0; $i < 5; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length14; $j++) {
            $sum += $data14[$j]['values'][$i];
        }
        array_push($total14, $sum);
    }

    //calculate percentages for html table
    for ($i = 0; $i < 5; $i++)
    {
        $total14[] = $data14[0]['values'][$i] + $data14[1]['values'][$i] + $data14[2]['values'][$i] + $data14[3]['values'][$i]; 
    }
    for ($i = 0; $i < 5; $i++)
    {   $num1 = round(100.0 * $data14[0]['values'][$i]/$total14[$i], 0);
        $num2 = round(100.0 * $data14[1]['values'][$i]/$total14[$i], 0);
        $num3 = round(100.0 * $data14[2]['values'][$i]/$total14[$i], 0);
        $num4 = round(100.0 * $data14[3]['values'][$i]/$total14[$i], 0);
        $percents14[] = [$num1, $num2, $num3, $num4, 100]; 
    }

    $labels14 = [];
    $numbers14 = [];

    for ($j = 0; $j < $length14; $j++) {
        array_push($labels14, $data14[$j]['label']);
        array_push($numbers14, $data14[$j]['values']);
    }
    array_push($labels14, 'Grand Total');
    array_push($numbers14, $total14);

    $series14 = [
        'title' => 'DCP Programs - By Entry Type',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data14,
    ];

    @endphp

    <h2>Figure 14 - DCP Programs - By Entry-type (numbers and percentages)</h2>
    <stacked-column-with-data-label-percents-chart 
        :series='@json($series14)'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-with-data-label-percents-chart>
       
    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series14['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length14 + 1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels14[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers14[$j][$i] }} ({{$percents14[$i][$j] }}%)</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>
    
        @php
    
    $data15 = [
             ['label' => '0', 'color' => '#217ca3', 'values' => [0, 0, 0, 0, 8]],
             ['label' => '1-15', 'color' => '#8d230f', 'values' => [0, 0, 0, 0, 1]],
             ['label' => '16-30', 'color' => '#50CB93', 'values' => [1, 0, 0, 0, 2]],
             ['label' => '31-60', 'color' => 'purple', 'values' => [3, 3, 3, 1, 3]],
             ['label' => '61-90', 'color' => 'lightblue', 'values' => [25, 23, 17, 13, 9]],
             ['label' => '91 and above', 'color' => 'orange', 'values' => [13, 16, 8, 17, 8]],
    ];

    $length15 = count($data15);
    $total15 = [];

    for ($i = 0; $i < 5; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length15; $j++) {
            $sum += $data15[$j]['values'][$i];
        }
        array_push($total15, $sum);
    }

    //calculate percentages for html table
    for ($i = 0; $i < 5; $i++)
    {
        $total15[] = $data15[0]['values'][$i] + $data15[1]['values'][$i] + $data15[2]['values'][$i] + $data15[3]['values'][$i] + $data15[4]['values'][$i] + $data15[5]['values'][$i]; 
    }
    for ($i = 0; $i < 5; $i++)
    {   $num1 = round(100.0 * $data15[0]['values'][$i]/$total15[$i], 0);
        $num2 = round(100.0 * $data15[1]['values'][$i]/$total15[$i], 0);
        $num3 = round(100.0 * $data15[2]['values'][$i]/$total15[$i], 0);
        $num4 = round(100.0 * $data15[3]['values'][$i]/$total15[$i], 0);
        $num5 = round(100.0 * $data15[4]['values'][$i]/$total15[$i], 0);
        $num6 = round(100.0 * $data15[5]['values'][$i]/$total15[$i], 0);
        $percents15[] = [$num1, $num2, $num3, $num4, $num5, $num6, 100]; 
    }

    $labels15 = [];
    $numbers15 = [];

    for ($j = 0; $j < $length15; $j++) {
        array_push($labels15, $data15[$j]['label']);
        array_push($numbers15, $data15[$j]['values']);
    }
    array_push($labels15, 'Grand Total');
    array_push($numbers15, $total15);

    $series15 = [
        'title' => 'DCP Transfer Students - By Transfer Cr Hrs Earned Ranges',
        'categories' => ['Fall 2018', 'Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022'],
        'data' => $data15,
    ];

    @endphp

    <h2>Figure 15 - DCP Programs - Transfer Students by Transfer Credit Hours Earned Ranges</h2>
    <stacked-column-chart 
        :series='@json($series15)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-column-chart>

    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series15['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length15 + 1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels15[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers15[$j][$i] }} ({{$percents15[$i][$j] }}%)</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>
    
    @php
    
    $data16 = [
             ['label' => 'Catholic', 'color' => '#217ca3', 'values' => [43, 42, 44, 37, 23]],
             ['label' => 'Non-Catholic', 'color' => '#8d230f', 'values' => [57, 52, 55, 56, 41]],
             ['label' => 'Unknown', 'color' => '', 'values' => [0, 6, 1, 8, 36]],
    ];

    $series16 = [
        'title' => "Percent of Catholic Traditional Students",
        'subtitle' => "",
        'x_axis' => '',
        'y_axis_visible' => false,
        'y_axis' => 'Percentage (%)',
        'y_axis_max' => 100,
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data16,
    ];

    @endphp

    <h2>Figure 16 - Percentages of Catholic Traditional Students</h2>
    <stacked-percentage-column-chart 
        :series='@json($series16)'
        :chart-width="1200"
        :chart-height="600">
    </stacked-percentage-column-chart>
    
    <column-chart-for-percentages2 
        :series='@json($series16)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart-for-percentages2>
    
    @php
    
    $data17 = [
             ['label' => 'Black or African American', 'color' => '#217ca3', 'values' => [63, 18, 59, 140]],
             ['label' => 'Hispanics of any race', 'color' => '#8d230f', 'values' => [44, 13, 77, 134]],
             ['label' => 'Other', 'color' => '#50CB93', 'values' => [18, 8, 17, 43]],
             ['label' => 'White', 'color' => 'purple', 'values' => [29, 9, 58, 96]],
             ['label' => 'Unknown', 'color' => '', 'values' => [4, 0, 0, 4]],
    ];

    $length17 = count($data17);
    $total17 = [];

    for ($i = 0; $i < 4; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length17; $j++) {
            $sum += $data17[$j]['values'][$i];
        }
        array_push($total17, $sum);
    }

    $labels17 = [];
    $numbers17 = [];

    for ($j = 0; $j < $length17; $j++) {
        array_push($labels17, $data17[$j]['label']);
        array_push($numbers17, $data17[$j]['values']);
    }
    array_push($labels17, 'Grand Total');
    array_push($numbers17, $total17);

    $series17 = [
        'title' => 'Demographic Distribution',
        'subtitle' => '(Fall 2023 Full-time Undergraduates)',
        'categories' => ['First-time Students', 'Transfer Students', 'Continuing Students', 'All FT Undergrads'],
        'data' => $data17,
    ];

    @endphp

    <h2>Figure 17 - Demographic Distribution (in %) - Fall 2023 Full-time Undergraduates</h2>
    <stacked-column-with-data-label-percents-chart 
        :series='@json($series17)'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-with-data-label-percents-chart>
       
    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 4; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series17['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length17+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels17[$j] }}</th>
                        @for ($i = 0; $i < 4; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers17[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>

        @php
    
    $data18 = [
             ['label' => 'Black or African American', 'color' => '#217ca3', 'values' => [4, 4, 17, 25]],
             ['label' => 'Hispanics of any race', 'color' => '#8d230f', 'values' => [1, 8, 42, 51]],
             ['label' => 'Other', 'color' => '#50CB93', 'values' => [0, 1, 6, 7]],
             ['label' => 'White', 'color' => 'purple', 'values' => [4, 14, 34, 52]],
             ['label' => 'Unknown', 'color' => '', 'values' => [1, 5, 6, 12]],
    ];

    $length18 = count($data18);
    $total18 = [];

    for ($i = 0; $i < 4; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length18; $j++) {
            $sum += $data18[$j]['values'][$i];
        }
        array_push($total18, $sum);
    }

    $labels18 = [];
    $numbers18 = [];

    for ($j = 0; $j < $length18; $j++) {
        array_push($labels18, $data18[$j]['label']);
        array_push($numbers18, $data18[$j]['values']);
    }
    array_push($labels18, 'Grand Total');
    array_push($numbers18, $total18);

    $series18 = [
        'title' => 'Demographic Distribution',
        'subtitle' => '(Fall 2023 Part-time Undergraduates)',
        'categories' => ['First-time Students', 'Transfer Students', 'Continuing Students', 'All PT Undergrads'],
        'data' => $data18,
    ];

    @endphp

    <h2>Figure 18 - Demographic Distribution (in %) - Fall 2023 Part-time Undergraduates</h2>
    <stacked-column-with-data-label-percents-chart 
        :series='@json($series18)'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-with-data-label-percents-chart>
       
    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 4; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series18['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length18+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels18[$j] }}</th>
                        @for ($i = 0; $i < 4; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers18[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div>

        @php
    
    $data19 = [
             ['label' => 'Is First-Generation', 'color' => '#217ca3', 'values' => [42, 53, 28, 43, 49]],
             ['label' => 'Is Not First-Generation', 'color' => '#8d230f', 'values' => [83, 73, 67, 76, 96]],
             ['label' => 'Unknown', 'color' => '#50CB93', 'values' => [7, 7, 6, 4, 10]],
    ];

    $length19 = count($data19);
    $total19 = [];

    for ($i = 0; $i < 5; $i++) {
        $sum = 0;
        for ($j = 0; $j < $length19; $j++) {
            $sum += $data19[$j]['values'][$i];
        }
        array_push($total19, $sum);
    }

    //calculate percentages for html table
    for ($i = 0; $i < 5; $i++)
    {
        $total19[] = $data19[0]['values'][$i] + $data19[1]['values'][$i] + $data19[2]['values'][$i]; 
    }
    for ($i = 0; $i < 5; $i++)
    {   $num1 = round(100.0 * $data19[0]['values'][$i]/$total19[$i], 0);
        $num2 = round(100.0 * $data19[1]['values'][$i]/$total19[$i], 0);
        $num3 = round(100.0 * $data19[2]['values'][$i]/$total19[$i], 0);
        $percents19[] = [$num1, $num2, $num3, 100]; 
    }

    $labels19 = [];
    $numbers19 = [];

    for ($j = 0; $j < $length19; $j++) {
        array_push($labels19, $data19[$j]['label']);
        array_push($numbers19, $data19[$j]['values']);
    }
    array_push($labels19, 'Grand Total');
    array_push($numbers19, $total19);

    $series19 = [
        'title' => 'First-Generation Students',
        'subtitle' => 'of the First-time, Full-time, Freshman',
        'categories' => ['Fall 2019', 'Fall 2020', 'Fall 2021', 'Fall 2022', 'Fall 2023'],
        'data' => $data19,
    ];

    @endphp

    <h2>Figure 19 - First-Generation Students of the First-time, Full-time, Freshman</h2>
    <stacked-column-with-data-label-percents-chart 
        :series='@json($series19)'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-with-data-label-percents-chart>
       
    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 5; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series19['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length19+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels19[$j] }}</th>
                        @for ($i = 0; $i < 5; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers19[$j][$i] }} ({{$percents19[$i][$j] }}%)</td>
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