<?php
//https://adventofcode.com/2020/day/6
$raw_data = file('input.txt');
$answers=[];
$group=0;
$group_count=0;
foreach($raw_data as $line) {
    if(strlen($line) < 2) {
        print_r($answers[$group]);
        echo count($answers[$group]).'<br><br>';
        $group_count +=count($answers[$group]);
        $group++;
        continue;
    }
    for($i=0;$i<strlen($line)-1;$i++) {
        $letter=$line[$i];
        if (isset($answers[$group][$letter])) {
            $answers[$group][$letter]++;
        } else {
            $answers[$group][$letter]=1;
        }
    }
}
echo ' - ';
print_r($group_count);
