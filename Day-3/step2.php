<?php

require_once __DIR__ . '/common.php';

$coordinatesSanta = $coordinatesRobot = ['0x0'];
$coordinatesSantaX = $coordinatesRobotX = 0;
$coordinatesSantaY = $coordinatesRobotY = 0;
for($i=0,$end=strlen($input);$i<$end;$i++) {
    if( $i%2 == 0 ) {
        $var    = 'coordinatesRobot';
    } else {
        $var    = 'coordinatesSanta';
    }
    
    $char   = substr($input, $i, 1);
    switch($char) {
        case '<':
            ${$var.'X'} -= 1;
            break;
        
        case '>':
            ${$var.'X'} += 1;
            break;
        
        case 'v':
            ${$var.'Y'} -= 1;
            break;
        
        case '^':
            ${$var.'Y'} += 1;
            break;
    }
    
    ${$var}[]   = ${$var.'X'}.'x'.${$var.'Y'};
}

$coordinates    = array_merge($coordinatesRobot, $coordinatesSanta);

echo 'Answer: '.sizeof(array_unique($coordinates));