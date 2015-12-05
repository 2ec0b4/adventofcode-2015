<?php

require_once __DIR__ . '/common.php';

$floor  = 0;
for($i=0,$end=strlen($input);$i<$end;$i++) {
    $step   = substr($input, $i, 1);
    $floor  += ( $step == '(' ? 1 : -1 );
    if( $floor == -1 ) {
        echo 'Answer: '.($i+1);
        exit;
    }
}