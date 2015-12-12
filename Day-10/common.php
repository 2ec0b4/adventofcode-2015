<?php

$filename   = __DIR__ . '/input.txt';
if( !file_exists($filename) ) {
    die('Please, create a file ('.$filename.')');
}

$input  = file_get_contents($filename);

for($i=1;$i<=$end;$i++) {
    $newString  = '';
    $currentChar    = substr($input, 0, 1);
    $count  = 1;
    for($j=1,$max=strlen($input);$j<=$max;$j++) {
        $char  = substr($input, $j, 1);
        if( $char != $currentChar ) {
            $newString  .= $count.$currentChar;
            $currentChar    = $char;
            $count  = 1;
        } else {
            $count++;
        }
    }

    $input  = $newString;
}

echo 'Answer: '.strlen($newString);