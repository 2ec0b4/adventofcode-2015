<?php

$filename   = __DIR__ . '/input.txt';
if( !file_exists($filename) ) {
    die('Please, create a file ('.$filename.')');
}

$input  = file_get_contents($filename);

function walkAndSum($data, &$sum=0, $filter=false) {
    if( is_numeric($data) ) {
        $sum    += intval($data);
    } else if( is_object($data) ) {
        $data   = get_object_vars($data);
        if( $filter && in_array('red', $data, true) ) {
            return $sum;
        }
    }
    
    if( is_array($data) ) {
        foreach($data as $value) {
            walkAndSum($value, $sum, $filter);
        }
    }
    
    return $sum;
}