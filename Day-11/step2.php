<?php

require_once __DIR__ . '/common.php';

$passwords  = [];
while(count($passwords) < 2) {
    $input  = increment($input, $stringLength-1);
    if( valid($input) ) {
        $passwords[]    = $input;
    }
}

echo 'Answer: '.$passwords[1];