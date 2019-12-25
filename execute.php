<?php

include_once __DIR__ . '/classes/App.php';
App::boot();


function getArray()
{
    static $array = [];
    if (empty($array)) {
        for ($i = 0; $i < 1000000; ++$i) {
            $array[] = $i;
        }
    }
    return $array;
}

// for
$array = getArray();
MicroTime::check('for');
for ($i = 0, $end = count($array); $i < $end; ++$i) {
    $array[$i] = $array[$i] * $array[$i];
}
MicroTime::check('for');

// foreach
$array = getArray();
MicroTime::check('foreach');
foreach ($array as $i=>$v) {
    $array[$i] = $v * $v;
}
MicroTime::check('foreach');

// map-arrow
$array = getArray();
MicroTime::check('map-arrow');
$array = array_map(fn($v) => $v * $v, $array);
MicroTime::check('map-arrow');

// map-callback
$array = getArray();
MicroTime::check('map-callback');
$array = array_map(function ($v) {
    return $v * $v;
}, $array);
MicroTime::check('map-callback');

var_dump(MicroTime::getDiffs());