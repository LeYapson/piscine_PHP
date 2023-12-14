<?php

function reverse(array $array): array {
    $result = [];
    for ($i = count($array) - 1; $i >= 0; $i--) {
        $result[] = $array[$i];
    }
    return $result;
}
function push(array &$array, string ...$elements): int {
    foreach ($elements as $element) {
        $array[] = $element;
    }
    return count($array);
}
function sum(array $array): int {
    $result = 0;
    foreach ($array as $value) {
        $result += $value;
    }
    return $result;
}
function arrayContains(array $array, int|string|float $value): mixed {
    foreach ($array as $element) {
        if ($element === $value) {
            return $value;
        }
    }
    return "Nothing";
}
function merge(array ...$arrays): array {
    $result = [];
    foreach ($arrays as $array) {
        foreach ($array as $element) {
            $result[] = $element;
        }
    }
    return $result;
}