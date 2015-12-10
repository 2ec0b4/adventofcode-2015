<?php

require_once __DIR__ . '/common.php';

foreach($presents as $present) {
    list($l,$w,$h) = $dimensions = explode('x', $present);
    sort($dimensions);
    $area   = 2*$l*$w + 2*$w*$h + 2*$h*$l;
    $total  += $area + $dimensions[0]*$dimensions[1];
}

echo 'Answer: '.$total;