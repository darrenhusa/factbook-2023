<?php

if (! function_exists('calculate_element_sum')) {
    
    function calculate_element_sum($data) {
        $total_sum = [];
        
        foreach ($data as $item) {
            $values = $item['values'];
            foreach ($values as $index => $value) {
                // If the index in $total_sum doesn't exist yet, initialize it to 0
                if (!isset($total_sum[$index])) {
                    $total_sum[$index] = 0;
                }
                // Add the current value to the corresponding element
                $total_sum[$index] += $value;
            }
        }
        
        return $total_sum;
    }
}

// if (! function_exists('anotherHelper')) {
//     function anotherHelper($value)
//     {
//         return strtoupper($value);
//     }
// }