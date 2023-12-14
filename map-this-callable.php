<?php

function myArrayMap(?callable $callback, array $array, array ...$arrays): array
{
    // Check if the array is associative
    $associative = array_keys($array) !== range(0, count($array) - 1);
    if ($callback === null || !is_callable($callback) || $associative) {
        if (empty($arrays)) {
            return array_values($array);
        }
        $result = [];
        foreach ($array as $key => $value) {
            $merged = [$value];
            foreach ($arrays as $arr) {
                $merged[] = $arr[$key] ?? null;
            }
            $result[] = $merged;
        }
        if ($callback !== null && is_callable($callback)) {
            // Check if the callback returns an associative array
            $firstResult = $callback($result[0]);
            if (is_array($firstResult) && array_keys($firstResult) !== range(0, count($firstResult) - 1)) {
                return array_values($result);
            }
        }
        return array_values($result);
    }
    if (count($array) === 0) {
        return [];
    }
    $result = [];
    foreach ($array as $key => $value) {
        $args = [$value];
        foreach ($arrays as $arr) {
            $args[] = $arr[$key] ?? null;
        }
        $result[] = $callback(...$args);
    }
    return $result;
}