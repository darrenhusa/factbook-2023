<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {    
    return view('index');
});

// Route::get('/sample-charts', function () {    
//     return view('sample-charts');
// });

// Route::get('/practice', function () {    
//     return view('section01-practice');
// });


// Route::get('/export', function () {
//     return view('export-chart2');
// });

// Route::get('/sparklines', function () {
//     return view('sparkline-demo');
// });


Route::get('/historical_headcounts', function () {
    return view('enrollment.historical_headcounts');
});

Route::get('/section01-enrollment', function () {
    return view('enrollment.__section01-enrollment');
});

Route::get('/table-01', function () {
    return view('enrollment.table-01');
});

Route::get('/table-02', function () {
    return view('enrollment.table-02');
});

Route::get('/table-03', function () {
    return view('enrollment.table-03');
});

Route::get('/table-04', function () {
    return view('enrollment.table-04');
});

Route::get('/catholic', function () {
    return view('enrollment.catholic');
});

Route::get('/term_demographics', function () {
    return view('enrollment.term_demographics');
});


// Route::get('/section01-practice', function () {
//     return view('section01-practice');
// });

Route::get('/section02', function () {
    return view('retention.section02');
});

Route::get('/section03', function () {
    return view('high_school_gpas.section03');
});

Route::get('/ccsj_grs', function () {
    return view('graduation_rates.ccsj');
});

Route::get('/4yr_comp', function () {
    return view('graduation_rates.four_year_comparisons');
});

Route::get('/6yr_comp', function () {
    return view('graduation_rates.six_year_comparisons');
});

// Route::get('/sankey-chart', function () {    
//     return view('sankey_charts.sankey-chart');
// });

// Route::get('/sankey-demo', function () {    
//     return view('sankey-demo');
// });

// Route::get('/sankey-dept1', function () {    
//     return view('sankey-chart-dept1');
// });

// Route::get('/', function () {
//     return view('welcome');
// });
