<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Html Table with Sparklines</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
#result {
    text-align: right;
    color: gray;
    min-height: 2em;
}
#table-sparkline {
    margin: 0 auto;
    border-collapse: collapse;
}
th {
    font-weight: bold;
    text-align: left;
}
td, th {
    padding: 5px;
    border-bottom: 1px solid silver;
    height: 20px;
}

thead th {
    border-top: 2px solid gray;
    border-bottom: 2px solid gray;
}
.highcharts-tooltip>span {
    background: white;
    border: 1px solid silver;
    border-radius: 3px;
    box-shadow: 1px 1px 2px #888;
    padding: 8px;
}

</style>
</head>
<body>
@php
  
  $data = [
    ["Accounting", [16, 14, 10, 12, 15]],
    ["Associates in Science Degree", [0, 0, 5, 1, 0]],
    ["Biomedical Science", [22, 12, 7, 4, 9]],
    ["Business Management", [98, 106, 119, 104, 123]],
    ["Criminal Justice", [53, 56, 47, 38, 49]],
    ["Digital & Studio Arts", [21, 43, 31, 27, 25]],
    ["Elementary Education", [20, 20, 22, 25, 31]],
    ["English & Media Communications", [12, 12, 19, 13, 15]],
    ["Forensic Biotechnology (*)", [1, 2, 0, 0, 0]],
    ["Forensic Science", [4, 5, 3, 6, 10]],
    ["General Studies", [36, 31, 23, 42, 27]],
    ["Health Science (*)", [6, 6, 0, 0, 0]],
    ["Human Services", [16, 10, 6, 4, 1]],
    ["Integrated Studies", [0, 0, 1, 1, 0]],
    ["Kinesiology", [29, 54, 67, 49, 56]],
    ["Life Science", [1, 1, 1, 1, 5]],
    ["Medical Lab Science", [1, 3, 4, 2, 3]],
    ["Neuroscience", [0, 0, 0, 2, 2]],
    ["Psychology", [35, 34, 47, 26, 11]],
    ["Psychology and Human Services", [0, 0, 0, 15, 37]],
    ["Public Health Management", [0, 0, 0, 4, 1]],
  ];

  // Initialize an array to store the column totals
  $columnTotals = [];

  // Iterate through the main data array
  foreach ($data as $row) {
    // The numbers array is the second element in each row (index 1)
    $nums = $row[1];

    // Iterate through the numbers array to sum the columns
    foreach ($nums as $columnKey => $value) {
        // If the column key doesn't exist in $columnTotals yet, initialize it to 0
        if (!isset($columnTotals[$columnKey])) {
            $columnTotals[$columnKey] = 0;
        }
        // Add the current value to the appropriate column total
        $columnTotals[$columnKey] += $value;
    }
  }

  // Optional: Display the results
  echo "Column Totals:\n";
  print_r($columnTotals);

  array_push($data, ["Grand Total", [$columnTotals[0], $columnTotals[1], $columnTotals[2], $columnTotals[3], $columnTotals[4]]]);

    foreach ($data as $val)
   {
       $programs[] = $val[0];
       $numbers[] = $val[1];
       $sparkline[] = implode(', ', $val[1]);
    }

    $length = count($data);

@endphp

<h2>Full-Time Undergraduates - First Majors - Traditional Programs</h2>
<div id="result"></div>
<table id="table-sparkline">
    <thead>
        <tr>
            <th></th>
            <th>Fall 2021</th>
            <th>Fall 2022</th>
            <th>Fall 2023</th>
            <th>Fall 2024</th>
            <th>Fall 2025</th>            
            <th>Sparklines</th>
        </tr>
    </thead>
    <tbody id="tbody-sparkline">
        @for ($i = 0; $i < $length; $i++)
        <tr>
            <th>{{ $programs[$i] }}</td>
            @for ($j = 0; $j < 5; $j++)
                <td>{{ $numbers[$i][$j] }}</td>
            @endfor
            <td data-sparkline="{{ $sparkline[$i] }}" />
        </tr>
        @endfor  
    </tbody>
</table>

<script>
/**
 * Create a constructor for sparklines that takes some sensible defaults and merges in the individual
 * chart options. This function is also available from the jQuery plugin as $(element).highcharts('SparkLine').
 */
Highcharts.SparkLine = function (a, b, c) {
    const hasRenderToArg = typeof a === 'string' || a.nodeName;
    let options = arguments[hasRenderToArg ? 1 : 0];
    const defaultOptions = {
        chart: {
            renderTo: (options.chart && options.chart.renderTo) || (hasRenderToArg && a),
            backgroundColor: null,
            borderWidth: 0,
            type: 'area',
            margin: [2, 0, 2, 0],
            width: 120,
            height: 20,
            style: {
                overflow: 'visible'
            },
            // small optimalization, saves 1-2 ms each sparkline
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            startOnTick: false,
            endOnTick: false,
            tickPositions: []
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0]
        },
        legend: {
            enabled: false
        },
        tooltip: {
            hideDelay: 0,
            outside: true,
            shared: true
        },
        plotOptions: {
            series: {
                animation: false,
                lineWidth: 1,
                shadow: false,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                marker: {
                    radius: 1,
                    states: {
                        hover: {
                            radius: 2
                        }
                    }
                },
                fillOpacity: 0.25
            },
            column: {
                negativeColor: '#910000',
                borderColor: 'silver'
            }
        }
    };

    options = Highcharts.merge(defaultOptions, options);
    console.log(hasRenderToArg);
    return hasRenderToArg ?
        new Highcharts.Chart(a, options, c) :
        new Highcharts.Chart(options, b);
};

const start = +new Date(),
    tds = Array.from(document.querySelectorAll('td[data-sparkline]')),
    fullLen = tds.length;

let n = 0;

// Creating 153 sparkline charts is quite fast in modern browsers, but IE8 and mobile
// can take some seconds, so we split the input into chunks and apply them in timeouts
// in order avoid locking up the browser process and allow interaction.
function doChunk() {
    const time = +new Date(),
        len = tds.length;

    for (let i = 0; i < len; i += 1) {
        const td = tds[i];
        const stringdata = td.dataset.sparkline;
        const arr = stringdata.split('; ');
        const data = arr[0].split(', ').map(parseFloat);
        const chart = {};

        if (arr[1]) {
            chart.type = arr[1];
        }

        Highcharts.SparkLine(td, {
            series: [{
                data: data,
                pointStart: 1
            }],
            tooltip: {
                headerFormat: '<span style="font-size: 10px">' + td.parentElement.querySelector('th').innerText + ', Q{point.x}:</span><br/>',
                pointFormat: '<b>{point.y}.000</b> USD'
            },
            chart: chart
        });

        n += 1;

        // If the process takes too much time, run a timeout to allow interaction with the browser
        if (new Date() - time > 500) {
            tds.splice(0, i + 1);
            setTimeout(doChunk, 0);
            break;
        }

        // Print a feedback on the performance
        // if (n === fullLen) {
        //     document.getElementById('result').innerHTML = 'Generated ' + fullLen + ' sparklines in ' + (new Date() - start) + ' ms';
        // }
    }
}
doChunk();
</script>
</body>
</html>