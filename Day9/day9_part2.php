<?php
//https://adventofcode.com/2020/day/8
$lines = file('input.txt');
$nr=25;
$j=503;
$sum = 15353384;
do {
    $j++;
    $result = isSumOfContiguous($sum,$j-1);
    echo $result;

} while(!$result);

function isSumOfContiguous($s,$j)
{
    global $lines,$nr;
    for($k=0;$k<$j-1;$k++) {
        for($l=$k+1;$l<$j;$l++) {
            $numbers = array_slice($lines, $k, $l-$k);
            $possibleSum = array_sum($numbers);
            /*print_r($numbers);

            echo $possibleSum.'-'. $s .'<br>';*/
            if ($possibleSum > $s) {
                break;
            }

            if ($possibleSum == $s) {
                array_walk($numbers, function(&$item) {
                    $item = (int)$item;
                });
                $min = min($numbers);
                $max = max($numbers);
                echo $min . ' - ' . $max;
                print_r($numbers);
                return $min+$max;
            }
        }
    }
    return false;
}
