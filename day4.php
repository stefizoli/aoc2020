<?php
//https://adventofcode.com/2020/day/4
$fields = ['byr', 'ecl', 'eyr', 'hcl', 'hgt', 'iyr', 'pid'];
$raw_data = file('input_day4.txt');
$data = [];
$i=0;
foreach($raw_data as $line) {

    if (strLen($line) > 1) {
        $data[$i] .= substr($line,0,-1).' ';
    } else {
        $i++;
    }
}
$valid=0;
echo count($data);
foreach($data as $d) {
    $d = rtrim($d);
    $params = explode(' ', $d);
    $keys = [];
    foreach($params as $p) {
        list($key, $value) = explode(':', $p);
        if ($key != 'cid') {
            $keys[] = $key;
        }
    }
    sort($keys);
    print_r($keys);
    echo '<br>';
    if ($keys == $fields) {
        $valid++;
    }
}
echo $valid;
