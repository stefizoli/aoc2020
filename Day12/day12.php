<?php
//https://adventofcode.com/2020/day/12
$instructions = str_getcsv(file_get_contents('input.txt'), "\n");
echo count($instructions);
$a = [
    [1,0],
    [0,-1],
    [-1,0],
    [0,1]
];
$i=0;
$east = 0;
$north = 0;
$directions = [1,0]; //east=1,north=0
foreach($instructions as $instruction) {

    $command = substr($instruction,0,1);
    $value = substr($instruction,1);
    echo 'cvi: ' .$command. ' ' . $value . ' - ' . $i . '<br>';
    switch ($command) {
        case 'F' :
            $east += $directions[0] * $value;
            $north += $directions[1] * $value;
            break;
        case 'N':
            $north +=  $value;
            break;
        case 'S':
            $north -=  $value;
            break;
        case 'E':
            $east += $value;
            break;
        case 'W':
            $east -= $value;
            break;
        case 'L':
            $turn = $value/90;
            $i = (($i - $turn) + 4) % 4;
            $directions = $a[$i];
        break;
        case 'R':
            $turn = $value/90;
            $i = ($i + $turn) % 4;
            $directions = $a[$i];
        break;
    }
    echo $east. ' ' . $north . '<br>';
}
echo '<pre>';
echo $east. ' ' . $north . '<br>';
echo abs($east)+abs($north);
echo '</pre>';
