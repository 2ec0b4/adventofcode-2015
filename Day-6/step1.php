<?php

require_once __DIR__ . '/common.php';

$grid           = [];
$instructions   = explode("\n", $input);
foreach($instructions as $instruction) {
    $matches    = [];
    preg_match('@^([a-z ]+) ([0-9]+),([0-9]+) through ([0-9]+),([0-9]+)$@im', $instruction, $matches);
    
    for($i=$matches[2];$i<=$matches[4];$i++) {
        for($j=$matches[3];$j<=$matches[5];$j++) {
            switch($matches[1]) {
                case 'toggle':
                    if( !isset($grid[$i][$j]) ) {
                        $grid[$i][$j]   = 1;
                        break;
                    }
                case 'turn off':
                    unset($grid[$i][$j]);
                    break;

                case 'turn on':
                    $grid[$i][$j]   = 1;
                    break;
            }
        }
    }
}

$count  = 0;
for($i=0;$i<=999;$i++) {
    if( isset($grid[$i]) ) {
        $count  += sizeof($grid[$i]);
    }
}

echo 'Answer: '.$count;