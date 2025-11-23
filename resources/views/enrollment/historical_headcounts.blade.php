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

    <div id="app">

        <h2>Figure ?? - Historical CCSJ Headcounts (Fall 1993 to Fall 2023)</h2>
        <basic-line-chart 
            v-bind:series='@json($series1)'
            v-bind:chart-width="1200"
            v-bind:chart-height="800">
        </basic-line-chart>
    
    </div>

    <script src="/js/app.js"></script>
</body>
</html>