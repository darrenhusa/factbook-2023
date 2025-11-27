<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartDataController extends Controller
{
     
    public function showData()
    {
        
        // specify data
        $catholic = ['label' => 'Catholic', 'values' => [174, 162, 105, 73, 47]];
    
        $non_catholic_data = [
            ['label' => 'Baptist', 'values' => [0, 0, 6, 4, 4]],
            ['label' => 'Christian', 'values' => [2, 7, 30, 35, 14]],
            ['label' => 'Lutheran', 'values' => [0, 0, 4, 2, 2]],
            ['label' => 'None', 'values' => [1, 2, 18, 19, 13]],
            ['label' => 'Other', 'values' => [215, 235, 117, 81, 67]]
        ];
    
        $unknown = ['label' => 'Unknown', 'values' => [3, 33, 148, 176, 282]];

        $non_catholic_totals = calculate_element_sum($non_catholic_data);

        $data = [
                ['label' => 'Catholic', 'color' => '#8d230f', 'values' => $catholic['values']],
                ['label' => 'Non-Catholic', 'color' => '#217ca3', 'values' => $non_catholic_totals],
                ['label' => 'Unknown', 'color' => '', 'values' => $unknown['values']],
        ];
        
        $series = [
            'title' => "Percent of Catholic Traditional Students",
            'subtitle' => "",
            'x_axis' => '',
            'y_axis_visible' => false,
            'y_axis' => 'Percentage (%)',
            'y_axis_max' => 100,
            'categories' => ['Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024', 'Fall 2025', ],
            'data' => $data,
        ];

        return view('enrollment.catholic', [
            'series' => $series,
        ]);


    }

}
