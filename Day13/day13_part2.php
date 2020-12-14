<?php
//https://adventofcode.com/2020/day/13
$data = str_getcsv(file_get_contents('input.txt'), "\n");
$ts = (int)$data[0];
$buses = explode(',',$data[1]);
foreach($buses as $i=>$bus) {
    if ($bus == 'x') {
        unset($buses[$i]);
    }
};
echo $ts;
print_r($buses);

$product = array_product($buses);

$min = 0;
foreach($buses as $index=>$dt) {
    $i = ($dt - $index % $dt ) % $dt;
    $ni = $product / $dt;
    $mi = modInverse($ni, $dt);
    $partSum = $i*$mi*$ni;
    $min += $partSum;
};

function modInverse($a, $m)
{
    $m0 = $m;
    $y = 0;
    $x = 1;

    if ($m == 1)
    return 0;

    while ($a > 1)
    {

        // q is quotient
        $q = (int) ($a / $m);
        $t = $m;

        // m is remainder now,
        // process same as
        // Euclid's algo
        $m = $a % $m;
        $a = $t;
        $t = $y;

        // Update y and x
        $y = $x - $q * $y;
        $x = $t;
    }

    // Make x positive
    if ($x < 0)
    $x += $m0;

    return $x;
}

echo '<pre>';
echo $min % $product;
echo '</pre>';
