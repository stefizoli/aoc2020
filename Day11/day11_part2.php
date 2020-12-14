<?php
//https://adventofcode.com/2020/day/10
$seats = str_getcsv(file_get_contents('input.txt'), "\n");
$columns= strlen($seats[0]);
$rows = count($seats);
foreach($seats as &$row) {
    $row = str_split($row,1);
}
echo '<pre>';
$i=0;
$newSeats = [];
do {
    if(!empty($newSeats)) {
        $seats = $newSeats;
    }
    $newSeats = occupy_seats($seats,$i);
    //print_r($newSeats);
    $i++;

} while($newSeats != $seats);
$occ=0;
for($k=0;$k<$rows;$k++) {
    for($l=0;$l<$columns;$l++) {
        if ($newSeats[$k][$l] == '#') {
            $occ++;
        }
    }
}
echo $occ;

function occupy_seats($seats3,$i) {
    global $rows,$columns;
    for ($a=0;$a<count($seats3);$a++) {
        $newSeats[] = $seats3[$a];
    }

    //var_dump($newSeats);
    //var_dump($seats3);
    for($k=0;$k<$rows;$k++) {
        for($l=0;$l<$columns;$l++) {
            $seat = $seats3[$k][$l];
            //var_dump($seats3[9][0]);
            if ($seat != '.') {
                $numberOfAdjacentOccupiedSeats = countNumberOfAdjacentOccupiedSeats($seats3, $k, $l);
                //echo 'numberOfAdjacentOccupiedSeats: '.$numberOfAdjacentOccupiedSeats.'<br>';
                if ($i % 2 == 0) {
                    if (($seat == 'L') && ($numberOfAdjacentOccupiedSeats == 0)) {
                        $newSeats[$k][$l] = '#';
                    }
                } else {
                    if (($seat == '#')  && ($numberOfAdjacentOccupiedSeats >= 5)) {
                        $newSeats[$k][$l] = 'L';
                    }
                }
            }
        }
    }
    return $newSeats;
}
function countNumberOfAdjacentOccupiedSeats($seats2, $k, $l) {
    //print_r($seats2);
    $nr = 0;
    for ($m = -1; $m <= 1; $m++) {
        for ($n = -1; $n <= 1; $n++) {
            if ( ($m != 0) || ($n != 0) ) {
                if (check($seats2,$k,$l,$m,$n,1)) {
                    $nr++;
                }
            }
        }
    }
    //echo $k. ' . ' . $l . ' - ' . $nr . ' - ' . $seats2[9][0] .'<br>';
    return $nr;
}

function check($seats2,$k,$l,$m,$n,$i) {
    $i1 = $k+$m*$i;
    $i2 = $l+$n*$i;
    if (!isset($seats2[$i1][$i2])) {
        return false;
    }
    if ($seats2[$i1][$i2] == '#') {
        return true;
    }
    if ($seats2[$i1][$i2] == '.') {
        return check($seats2,$k,$l,$m,$n,$i+1);
    }

    return false;

}

echo '</pre>';
