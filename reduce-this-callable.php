<?php

function myArrayReduce(array $array, callable $callback, $initial = null) {
    $result = $initial;
    foreach ($array as $value) {
        $result = $callback($result, $value);
    }
    return $result;
}