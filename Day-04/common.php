<?php

$filename   = __DIR__ . '/input.txt';
if( !file_exists($filename) ) {
    die('Please, create a file ('.$filename.')');
}

$input  = file_get_contents($filename);
$string = str_pad("", $nbZeroes, "0");

$i  = 0;
while(true) {
    $i++;
    $md5    = md5($input.$i);
    if( substr($md5, 0, $nbZeroes) === $string ) {
        echo 'Answer: '.$i.' ('.$md5.')';
        exit;
    }
}