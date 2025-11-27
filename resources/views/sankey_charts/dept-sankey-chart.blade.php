<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highcharts Vue 2 Wrapper Demo</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>
<body>
   
@php

    $nodes = [
        ['id' => 'General Studies', 'name' => 'General Studies', 'color' => '#7cb5ec'],
        ['id' => 'Human Services', 'name' => 'Human Services', 'color' => '#434348'],
        ['id' => 'Psychology', 'name' => 'Psychology', 'color' => '#90ed7d'],
        ['id' => 'General Studies2', 'name' => 'General Studies', 'color' => '#7cb5ec'],
        ['id' => 'Human Services2', 'name' => 'Human Services', 'color' => '#434348'],
        ['id' => 'Psychology2', 'name' => 'Psychology', 'color' => '#90ed7d'],
        ['id' => 'General Studies3', 'name' => 'General Studies', 'color' => '#7cb5ec'],
        ['id' => 'Human Services3', 'name' => 'Human Services', 'color' => '#434348'],
        ['id' => 'Psychology3', 'name' => 'Psychology', 'color' => '#90ed7d'],
        ['id' => 'Changed Programs2', 'name' => 'Changed Programs', 'color' => '#e4d354'],
        ['id' => 'Earned Bachelors2', 'name' => 'Earned Bachelors', 'color' => '#2b908f'],
        ['id' => 'Stop-out2', 'name' => 'Stop-out', 'color' => '#f45b5b'],
        ['id' => 'Changed Programs3', 'name' => 'Changed Programs', 'color' => '#e4d354'],
        ['id' => 'Earned Bachelors3', 'name' => 'Earned Bachelors', 'color' => '#2b908f'],
        ['id' => 'Stop-out3', 'name' => 'Stop-out', 'color' => '#f45b5b'],
    ];
    
    $data = [
             ['from' => 'General Studies', 'to' => 'General Studies2', 'weight' => 17],
             ['from' => 'General Studies', 'to' => 'Changed Programs2', 'weight' => 8],
             ['from' => 'General Studies', 'to' => 'Earned Bachelors2', 'weight' => 2],
             ['from' => 'General Studies', 'to' => 'Stop-out2', 'weight' => 13],

             ['from' => 'General Studies2', 'to' => 'General Studies3', 'weight' => 7],
             ['from' => 'Stop-out2', 'to' => 'General Studies3', 'weight' => 1],
             ['from' => 'General Studies2', 'to' => 'Changed Programs3', 'weight' => 11],
             ['from' => 'General Studies2', 'to' => 'Earned Bachelors3', 'weight' => 3],
             ['from' => 'General Studies2', 'to' => 'Stop-out3', 'weight' => 18],
             
             ['from' => 'Human Services', 'to' => 'Human Services2', 'weight' => 11],
             ['from' => 'Human Services', 'to' => 'Changed Programs2', 'weight' => 3],
             ['from' => 'Human Services', 'to' => 'Earned Bachelors2', 'weight' => 1],
             ['from' => 'Human Services', 'to' => 'Stop-out2', 'weight' => 4],
             
             ['from' => 'Human Services2', 'to' => 'Human Services3', 'weight' => 7],
             ['from' => 'Human Services2', 'to' => 'Changed Programs3', 'weight' => 3],
             ['from' => 'Human Services2', 'to' => 'Earned Bachelors3', 'weight' => 2],
             ['from' => 'Human Services2', 'to' => 'Stop-out3', 'weight' => 7],
             
             ['from' => 'Psychology', 'to' => 'Psychology2', 'weight' => 19],
             ['from' => 'Psychology', 'to' => 'Changed Programs2', 'weight' => 5],
             ['from' => 'Psychology', 'to' => 'Earned Bachelors2', 'weight' => 1],
             ['from' => 'Psychology', 'to' => 'Stop-out2', 'weight' => 3],

             ['from' => 'Psychology2', 'to' => 'Psychology3', 'weight' => 19],
             ['from' => 'Stop-out2', 'to' => 'Psychology3', 'weight' => 0],
             ['from' => 'Psychology2', 'to' => 'Changed Programs3', 'weight' => 5],
             ['from' => 'Psychology2', 'to' => 'Earned Bachelors3', 'weight' => 2],
             ['from' => 'Psychology2', 'to' => 'Stop-out3', 'weight' => 10],
        ];


    // DON'T EDIT PHP BLOCK BELOW THIS LINE
    
    $series = [
        'title' => "TITLE",
        'name' => "NAME",
        'keys' => ['from', 'to', 'weight'],
        'nodes' => $nodes,
        'data' => $data,
    ];

    // Optional: Display the results
    // echo "Sankey Nodes:\n";
    // print_r($series.nodes);
    // print_r($nodes);

    // echo "Sankey Data:\n";
    // print_r($data);
    // print_r($series.data);

    @endphp

    <div id="app">

        <h2>Behavioral & Social Sciences</h2>
        <h3>Fall xxxx to Spring xxxx to Fall xxxx TRAD Retention in Majors</h3>
        <!-- <div class="flex justify-between pt-4">
            <span>At Start of<br />Fall 2020</span>
            <span>At Start of<br />Spring 2021</span>
            <span>At Start of<br />Fall 2021</span>
        </div> -->
        <dept-sankey-chart
            :series='@json($series)'
        ></dept-sankey-chart>
        
        
        <h2>LONG FORM DEPT SANKEY CHARTS!!!!</h2>
        <h3>Dept 2</h3>
        <dept2-sankey-chart></dept2-sankey-chart>
        
        <h3>Dept 3</h3>
        <dept3-sankey-chart></dept3-sankey-chart>
        
        <h3>Dept 4</h3>
        <dept4-sankey-chart></dept4-sankey-chart>

        <h3>Dept 5</h3>
        <dept5-sankey-chart></dept5-sankey-chart>

        <h3>Dept 6</h3>
        <dept6-sankey-chart></dept6-sankey-chart>
    
    </div>
    <script src="/js/app.js"></script>
</body>
</html>