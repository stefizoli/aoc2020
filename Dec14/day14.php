<?php
//https://adventofcode.com/2020/day/14
$data = str_getcsv(file_get_contents('input.txt'), "\n");
$mask = [];
$memory = [];
foreach($data as $row) {
    $parts = explode(' = ', $row);
    if ($parts[0] == 'mask') {
        echo $parts[1]. '<br>';
        $mask = str_split($parts[1],1);
    } else {
        $index = substr($parts[0],4,-1);
        echo $index. '<br>';
        $dec = $parts[1];
        echo $dec. '<br>';
        $new_value = 0;
        for($i=0;$i<36;$i++) {
            if ($mask[$i] == 'X') {
                $new_value += $dec & 2**(35-$i);
            } else {
                $new_value += $mask[$i] * 2**(35-$i);
            }
        }
        echo $new_value. '<br>';
        $memory[$index] = $new_value;
    }
}
echo array_sum($memory);
