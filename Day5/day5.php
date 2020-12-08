<?php
//https://adventofcode.com/2020/day/5
$raw_data = file('input.txt');
$maxId=0;

foreach($raw_data as $line) {
    $row = getRow(substr($line,0,7));
    $column = getColumn(substr($line,7,3));
    $id = $row * 8 + $column;
    if ($id > $maxId) {
        $maxId=$id;
    }
}
echo $maxId;

function getRow($code) {
    $search  = array('F', 'B');
    $replace = array('0', '1');
    $c= str_replace($search,$replace,$code);
    return bindec($c);
}

function getColumn($code) {
    $search  = array('L', 'R');
    $replace = array('0', '1');
    $c= str_replace($search,$replace,$code);
    return bindec($c);
}
