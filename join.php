<?php

/*
Create a joinWords function that takes an array of words as the first argument and a separator as the second argument.

This function will be able to join values ​​of arrays with a given separator.

The second parameter will by default be equal to a space if it is not filled in.

Examples :

joinWords(['My', 'name', 'is', 'John']); // My name is John

joinWords(['My', 'name', 'is', 'John'], "-"); // My-name-is-John

You are not allowed to use 'implode' or 'join', create your own.
*/

function joinWords($array, $separator = " "): string {
    $result = "";
    foreach ($array as $key => $value) {
        $result .= $value;
        if ($key < count($array) - 1) {
            $result .= $separator;
        }
    }
    return $result;
}