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
    
    $data17 = [
             ['label' => 'Black or African American', 'color' => '#217ca3', 'values' => [22, 17, 75, 114]],
             ['label' => 'Hispanics of any race', 'color' => '#8d230f', 'values' => [32, 12, 72, 116]],
             ['label' => 'Other', 'color' => '#50CB93', 'values' => [8, 5, 12, 25]],
             ['label' => 'White', 'color' => 'purple', 'values' => [45, 9, 71, 125]],
             ['label' => 'Unknown', 'color' => '', 'values' => [39, 0, 1, 40]],
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
        'subtitle' => '(Fall 2025 Full-time Undergraduates)',
        'categories' => ['First-time Students', 'Transfer Students', 'Continuing/Returning Students', 'All FT Undergrads'],
        'data' => $data17,
    ];

    @endphp

    <h2>Figure ?? - Demographic Distribution (in %) - Fall 2025 Full-time Undergraduates</h2>
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
             ['label' => 'Black or African American', 'color' => '#217ca3', 'values' => [0, 0, 5, 5]],
             ['label' => 'Hispanics of any race', 'color' => '#8d230f', 'values' => [0, 0, 2, 2]],
             ['label' => 'Other', 'color' => '#50CB93', 'values' => [0, 0, 0, 0]],
             ['label' => 'White', 'color' => 'purple', 'values' => [0, 0, 2, 2]],
             ['label' => 'Unknown', 'color' => '', 'values' => [0, 0, 0, 0]],
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
        'subtitle' => '(Fall 2025 Part-time Undergraduates)',
        'categories' => ['First-time Students', 'Transfer Students', 'Continuing/Returning Students', 'All PT Undergrads'],
        'data' => $data18,
    ];

    @endphp

    <h2>Figure ?? - Demographic Distribution (in %) - Fall 2025 Part-time Undergraduates</h2>
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


</div>

    <script src="/js/app.js"></script>
</body>
</html>