<?php

require_once __DIR__ . '/common.php';

$coordinates    = ['0x0'];
$coordinatesX   = 0;
$coordinatesY   = 0;
for($i=0,$end=strlen($input);$i<$end;$i++) {
    $char   = substr($input, $i, 1);
    switch($char) {
        case '<':
            $coordinatesX   -= 1;
            break;
        
        case '>':
            $coordinatesX   += 1;
            break;
        
        case 'v':
            $coordinatesY   -= 1;
            break;
        
        case '^':
            $coordinatesY   += 1;
            break;
    }
    
    $coordinates[]  = $coordinatesX.'x'.$coordinatesY;
}

echo 'Answer: '.sizeof(array_unique($coordinates));