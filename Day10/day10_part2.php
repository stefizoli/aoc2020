<?php
//https://adventofcode.com/2020/day/10
$lines = file('input.txt');
array_walk($lines, function(&$item) {
    $item = (int)$item;
});
$lines[]=0;
$lines[]=max($lines) + 3;
sort($lines);
print_r($lines);
$cache = [];
echo leaveoff(0);

function leaveoff($n) {
    global $lines, $cache;
    $count = count($lines);
    if ($n == $count - 1) {
        return 1;
    }
    if (isset($cache[$n])) {
        return $cache[$n];
    }

    $possibilities = 0;
    for ($i = $n + 1; $i < $count; $i++) {
        if ($lines[$i] - $lines[$n] <= 3) {
            $possibilities += leaveoff($i);
        }
    }
    $cache[$n] = $possibilities;
    return $possibilities;
}
