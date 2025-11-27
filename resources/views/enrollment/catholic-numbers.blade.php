<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numbers of Catholic</title>
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>
<body>
        
    <div id="app">
   
    <h2>Figure ?? - Numbers of Catholic Traditional Students</h2>
    
    <column-chart-for-percentages2 
        :series='@json($series)'
        :chart-width="1200"
        :chart-height="600">
    </column-chart-for-percentages2>
    
</div>

    <script src="/js/app.js"></script>
</body>
</html>