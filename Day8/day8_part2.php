<?php
//https://adventofcode.com/2020/day/8
$change = [
    'nop' => 'jmp',
    'jmp' => 'nop',
];
$lines = file('input.txt');
$j=0;
$countOfAllLines = count($lines);

do {
    $line = $lines[$j];
    list($op, $value) = explode(' ', $line);
    if ($op != 'acc') {
        $mod_lines=$lines;
        $mod_lines[$j] = str_replace($op, $change[$op], $lines[$j]);
        $j++;
    } else {
        $j++;
        continue;
    }

    $acc = 0;
    $i=0;
    $visitedIndexes = [];
    while(!in_array($i, $visitedIndexes) && ($countOfAllLines != count($visitedIndexes))) {
        $visitedIndexes[] =$i;
        $line = $mod_lines[$i];
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
} while($countOfAllLines != count($visitedIndexes));
echo $acc;
