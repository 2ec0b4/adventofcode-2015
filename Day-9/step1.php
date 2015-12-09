<?php

require_once __DIR__ . '/common.php';

$distances = [];
$paths   = explode("\n", $input);
foreach($paths as $path) {
    $matches    = [];
    preg_match('@^([a-z]+) to ([a-z]+) = ([0-9]+)$@im', $path, $matches);
    
    $distances[$matches[1]][$matches[2]] = $distances[$matches[2]][$matches[1]] = $matches[3];
}

$routes = [];
foreach($distances as $source => $destinations) {
    
}

$shortestRoute  = 0;
echo 'Answer: '.$shortestRoute;