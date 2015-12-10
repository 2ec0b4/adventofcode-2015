<?php

$filename   = __DIR__ . '/input.txt';
if( !file_exists($filename) ) {
    die('Please, create a file ('.$filename.')');
}

$input  = file_get_contents($filename);

$distances = [];
$paths   = explode("\n", $input);
foreach($paths as $path) {
    $matches    = [];
    preg_match('@^([a-z]+) to ([a-z]+) = ([0-9]+)$@im', $path, $matches);
    
    $distances[$matches[1]][$matches[2]] = $distances[$matches[2]][$matches[1]] = $matches[3];
}

function makeRoutes($cities, $visited = [])
{
    if( !empty($cities) ) {
        $return = array();      
        for($i=count($cities)-1;$i>=0;$i--) {
            $newCities = $cities;
            $newVisited = $visited;
            list($city)  = array_splice($newCities, $i, 1);
            array_unshift($newVisited, $city);
            $return = array_merge($return, makeRoutes($newCities, $newVisited));
        }
    } else {
        $return = array($visited);
    }
    
    return $return;
}

$routes = makeRoutes(array_keys($distances));

$allDistances   = [];
foreach($routes as $route) {
    $total = 0;
    for($i=0,$end=count($route)-1; $i<$end; $i++) {
        $total += $distances[$route[$i]][$route[$i+1]];
    }
    array_push($allDistances, $total);
}