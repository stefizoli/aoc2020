<?php
//https://adventofcode.com/2020/day/8
$lines = file('input.txt');
$acc = 0;
$i=0;
$visitedIndexes = [];
while(!in_array($i, $visitedIndexes)) {
    $visitedIndexes[] =$i;
    $line = $lines[$i];
    list($op, $value) = explode(' ', substr($line, 0, -1));
    if ($op == 'acc') {
        $acc += (int)$value;
    }
    if ($op == 'jmp') {
        $i += (int)$value;
        continue;
    }
    $i++;
}
echo $acc;
