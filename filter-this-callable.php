<?php

function myArrayFilter(array $array, ?callable $callback = null): array
{
    if ($callback === null) {
        $callback = static fn ($n) => $n;
    }
    $result = [];
    foreach ($array as $key => $value) {
        if ($callback($value)) {
            $result[$key] = $value;
        }
    }
    return $result;
}