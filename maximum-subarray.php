<?php

function findMaximumSubarray($arr) : int | float {
    $n = count($arr);
    if ($n === 0) {
        return 0; // Ou une autre valeur appropriée selon vos besoins
    }
    $maxEndingHere = $maxSoFar = $arr[0];
    for ($i = 1; $i < $n; $i++) {
        $maxEndingHere = max($arr[$i], $maxEndingHere + $arr[$i]);
        $maxSoFar = max($maxSoFar, $maxEndingHere);
    }
    return $maxSoFar;
}