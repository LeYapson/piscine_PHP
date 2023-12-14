<?php

function myArrayMap(?callable $callback, array $array1, array ...$arrays)
{
    $result = [];
    foreach ($array1 as $key => $value) {
        $temp = [$value];
        foreach ($arrays as $arr) {
            $temp[] = $arr[$key];
        }
        $result[] = $callback ? $callback($temp) : $temp;
    }
    return $result;
}
// Test #5
$result5 = myArrayMap(static fn ($n) => $n * $n * $n, [1, 2, 3, 4, 5]);
var_dump($result5 === [[1], [8], [27], [64], [125]]);
// Test #8
$result8 = myArrayMap(null, [1, 2, 3], ['one', 'two', 'three'], ['uno', 'dos', 'tres']);
var_dump($result8 === [[1, 'one', 'uno'], [2, 'two', 'dos'], [3, 'three', 'tres']]);
?>