<?php

$filename   = __DIR__ . '/input.txt';
if( !file_exists($filename) ) {
    die('Please, create a file ('.$filename.')');
}

$input  = file_get_contents($filename);

foreach($patterns as $pattern) {
    $matches    = [];
    
    preg_match_all('@^'.$pattern.'$@im', $input, $matches);
    
    if( !isset($matches[0]) ) {
        die(0);
    }
    
    $input    = implode("\n", $matches[0]);
}

echo 'Answer: '.sizeof($matches[0]);