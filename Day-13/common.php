<?php

$filename   = __DIR__ . '/input.txt';
if( !file_exists($filename) ) {
    die('Please, create a file ('.$filename.')');
}

$input  = file_get_contents($filename);

$happinesses = [];
$rows   = explode("\n", $input);
foreach($rows as $row) {
    $matches    = [];
    preg_match('@^([\w]+) would ([\w]+) ([\d]+) happiness units by sitting next to ([\w]+)\.$@im', $row, $matches);
    
    $happinesses[$matches[1]][$matches[4]] = ( $matches[2] === 'lose' ? -1 : 1 ) * $matches[3];
}

function makeTables($guests, $seated = [])
{
    if( !empty($guests) ) {
        $return = array();      
        for($i=count($guests)-1;$i>=0;$i--) {
            $newGuests = $guests;
            $newSeated = $seated;
            list($city)  = array_splice($newGuests, $i, 1);
            array_unshift($newSeated, $city);
            $return = array_merge($return, makeTables($newGuests, $newSeated));
        }
    } else {
        $return = array($seated);
    }
    
    return $return;
}

function getMaxHappiness($tables, $happinesses) {
    $allHappinesses = [];
    foreach($tables as $table) {
        $happiness = 0;
        for($i=0,$end=count($table)-1; $i<$end; $i++) {
            $happiness += $happinesses[$table[$i]][$table[$i+1]];
            $happiness += $happinesses[$table[$i+1]][$table[$i]];
        }
        $happiness += $happinesses[$table[0]][$table[$end]];
        $happiness += $happinesses[$table[$end]][$table[0]];

        array_push($allHappinesses, $happiness);
    }
    
    return max($allHappinesses);
}