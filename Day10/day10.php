<?php
//https://adventofcode.com/2020/day/10
$lines = file('input.txt');
array_walk($lines, function(&$item) {
    $item = (int)$item;
});
sort($lines);
$diffs = [];
foreach($lines as $i=>$line) {
    $diffs[$line - $lines[$i-1]]++;
}
print_r($diffs);
echo  $diffs[1]*($diffs[3]+1);
