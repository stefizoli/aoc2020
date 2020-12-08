<?php
//https://adventofcode.com/2020/day/7
$raw_data = file('input.txt');
$shinyGoldBags = [];
$colors = ['shiny gold'];

do {
    $allContainigColors = [];
    foreach($colors as $color) {
        $containigColors = findBags($raw_data, $color);
        $allContainigColors = array_merge($allContainigColors, $containigColors);
    }
    //print_r($allContainigColors);
    $colors = array_keys($allContainigColors);
    $shinyGoldBags = array_merge($allContainigColors, $shinyGoldBags);
} while (count($colors));
echo count($shinyGoldBags);

function findBags($data, $color) {
    $bags = [];
    foreach($data as $line) {
        if (strpos($line, $color)) {
            $word = explode(' ',$line);
            $bags[$word[0] . ' ' . $word[1]] = 1;
        }
    }
    return $bags;
}
