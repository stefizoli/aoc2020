<?php
//https://adventofcode.com/2020/day/12
$data = str_getcsv(file_get_contents('input.txt'), "\n");
$ts = (int)$data[0];
$buses = explode(',',$data[1]);
$buses = array_filter($buses, function($bus) {
    return $bus != 'x';
});

echo  $ts;print_r($buses);

$min = 1000000;
$min_bus = 0;
foreach($buses as $bus) {
    $dist = $bus - ($ts % $bus);
    if ($dist < $min) {
        $min = $dist;
        $min_bus = $bus;
    }
}
echo '<pre>';
echo $min * $min_bus;
echo '</pre>';
