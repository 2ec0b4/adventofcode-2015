<?php

require_once __DIR__ . '/common.php';

foreach($presents as $present) {
    $dimensions = explode('x', $present);
    sort($dimensions);
    $total  += 2*$dimensions[0]+2*$dimensions[1];
    $total  += array_product($dimensions);
}

echo 'Answer: '.$total;