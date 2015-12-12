<?php

$filename   = __DIR__ . '/input.txt';
if( !file_exists($filename) ) {
    die('Please, create a file ('.$filename.')');
}

$input  = file_get_contents($filename);

$stringLength   = 8;
$firstLetter    = ord('a');
$lastLetter     = ord('z');

function increment($input, $position) {
    global $firstLetter, $lastLetter;
    
    if( $position < 0 ) {
        return $input;
    }
    
    $char   = ord(substr($input, $position, 1));
    
    if( $char == $lastLetter ) {
        $input  = substr_replace($input, chr($firstLetter), $position, 1);
        return increment($input, $position-1);
    } else {
        return substr_replace($input, chr($char+1), $position, 1);
    }
}

$patterns   = [];

$threeLetters   = [];
for($i=$firstLetter,$end=$lastLetter-2;$i<=$end;$i++) {
    $threeLetters[] = chr($i).chr($i+1).chr($i+2);
}

$threeLettersPattern    = '.*(?:'.implode('|', $threeLetters).').*';

function valid($input) {
    global $threeLettersPattern;
    
    if( preg_match('@[iol]+@', $input) === 1
        || preg_match('@'.$threeLettersPattern.'@', $input) !== 1 ) {
        return false;
    }
    
    preg_match_all('@(.)\1@im', $input, $matches);
    return ( isset($matches[1]) && count($matches[1]) >= 2 );
}