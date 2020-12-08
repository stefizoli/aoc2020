<?php
//https://adventofcode.com/2020/day/7

$raw_data = file('input.txt');
$color = 'shiny gold';

echo nrOfBags($raw_data, $color);

function nrOfBags($data, $color) {
    foreach($data as $line) {
        if (strpos($line, $color) === 0) {
            $parts = explode(' bags contain ', $line);
            break;
        }
    }
    $bags = explode(', ', $parts[1]);
    $count =0;
    foreach($bags as $bag) {
        if (substr($bag,0,-1) == 'no other bags.') {
            return 0;
        }
        list($nr, $color1, $color2, $b) = explode(' ', $bag);
        $count += $nr * (1 + nrOfBags($data, $color1 . ' ' . $color2));
    }
    return $count;
}
