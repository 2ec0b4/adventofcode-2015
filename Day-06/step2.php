<?php

require_once __DIR__ . '/common.php';

$grid   = [];
for($i=0;$i<=999;$i++) {
    for($j=0;$j<=999;$j++) {
        $grid[$i][$j]   = 0;
    }
}

$instructions   = explode("\n", $input);
foreach($instructions as $instruction) {
    $matches    = [];
    preg_match('@^([a-z ]+) ([0-9]+),([0-9]+) through ([0-9]+),([0-9]+)$@im', $instruction, $matches);
    
    for($i=$matches[2];$i<=$matches[4];$i++) {
        for($j=$matches[3];$j<=$matches[5];$j++) {
            switch($matches[1]) {
                case 'toggle':
                    $grid[$i][$j]   += 2;
                    break;
                
                case 'turn off':
                    if( $grid[$i][$j] > 0 ) {
                        $grid[$i][$j]   -= 1;
                    }
                    break;

                case 'turn on':
                    $grid[$i][$j]   += 1;
                    break;
            }
        }
    }
}

$brightness  = 0;
for($i=0;$i<=999;$i++) {
    $brightness  += array_sum($grid[$i]);
}

echo 'Answer: '.$brightness;