<?php
//https://adventofcode.com/2020/day/8
$lines = file('input.txt');
$nr=25;
$j=$nr;
do {
    $s = $lines[$j];
    $j++;

} while(isSumOfTwo($s,$j-1));
echo $s;

function isSumOfTwo($s,$j)
{
    global $lines,$nr;
    for($k=$j-$nr;$k<$j-1;$k++) {
        for($l=$k+1;$l<$j;$l++) {
            $first = (int)$lines[$k];
            $second = (int)$lines[$l];
            echo $first . '-' . $second.'-'. $s .'<br>';
            //die();

            if ($first + $second == (int)$s) {
                return true;
            }
        }
    }
    return false;
}
