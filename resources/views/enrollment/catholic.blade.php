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