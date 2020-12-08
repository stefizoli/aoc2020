<?php
//https://adventofcode.com/2020/day/3
$map = file('input.txt');
$lines = count($map);
$columns = strlen($map[0]);
$data =[];
foreach($map as $m) {
    $d = [];
    for($i=0;$i < strlen($m)-1; $i++) {
        $d[]=$m[$i];
    }
    $data[] = $d;
}
$posibilities =  [
    [1, 1],
    [3, 1],
    [5, 1],
    [7, 1],
    [1, 2],
];
foreach($posibilities as $k=>$p) {
    $trees[$k] = 0;
    for($i=1;$i < $lines/$p[1]; $i++) {
        $d = $data[$i*$p[1]][$i*$p[0] % 31];
        //echo ($i*3 % 31) . ' - ' . $d . '<br>';
        if ($d == '#') {
            $trees[$k]++;
        }
    }
    echo $trees[$k]. '<br>';
}
function product($carry, $item)
{
    $carry *= $item;
    return $carry;
}


var_dump(array_reduce($trees, "product", 1));

/*for($i=0;$i < $lines; $i++) {
    for($j=0;$j < $lines; $j++) {
        echo $data[$i][$j % 31];
    }
    echo '<br>';

}*/
