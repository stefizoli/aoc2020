<?php
//https://adventofcode.com/2020/day/14
$data = str_getcsv(file_get_contents('input.txt'), "\n");
$mask = [];
$memory = [];
foreach($data as $row) {
    $parts = explode(' = ', $row);
    $new_indexes = [];
    if ($parts[0] == 'mask') {
        echo $parts[1]. ' p1<br>';
        $mask = str_split($parts[1],1);
    } else {
        $index = substr($parts[0],4,-1);
        $new_indexes[] = 0;
        echo $new_indexes[0]. ' ni<br>';
        $dec = $parts[1];
        echo $dec. ' dec<br>';
        for($i=0;$i<36;$i++) {
            if ($mask[$i] == '0') {
                $cal_index = $index & 2**(35-$i);
                foreach($new_indexes as &$new_index) {
                    $new_index += $cal_index;
                }
            } elseif ($mask[$i] == '1') {
                $cal_index = 2**(35-$i);
                foreach($new_indexes as &$new_index) {
                    $new_index += $cal_index;
                }
            } else {
                $cal_index = 2**(35-$i);
                $new_indexes2 = $new_indexes;
                $new_indexes = [];
                foreach($new_indexes2 as $new_index2) {
                    $new_indexes[] = $new_index2;
                    $new_indexes[] = $new_index2 + $cal_index;
                }
            }
            //echo $i . '<br>';
            //print_r($new_indexes). '<br>';
        }
        print_r($new_indexes). '<br>';
        foreach($new_indexes as $new_index3) {
            $memory[$new_index3] = $dec;
        }

    }
}
echo array_sum($memory);
