<?php

require_once __DIR__ . '/common.php';

$instructions   = explode("\n", $input);
foreach($instructions as $instruction) {
    $matches    = [];
    preg_match('@^([a-z ]+) ([0-9]+),([0-9]+) through ([0-9]+),([0-9]+)$@im', $instruction, $matches);
    
    switch($matches[1]) {
        case 'toggle':
            break;
        
        case 'turn off':
            break;
        
        case 'turn off':
            break;
    }
}