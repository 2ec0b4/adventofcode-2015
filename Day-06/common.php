<?php

$filename   = __DIR__ . '/input.txt';
if( !file_exists($filename) ) {
    die('Please, create a file ('.$filename.')');
}

$input  = file_get_contents($filename);