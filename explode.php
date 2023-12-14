<?php

/*Create an explodeWords function that takes a string as the first argument, a separator as the second argument, and a limit as the third argument.

This function will be able to return an array of strings, each of which is a substring of a string formed by dividing it on boundaries formed by the string separator.

The second parameter will by default be equal to a space if it is not filled in.

The third parameter will by default be equal to PHP_INT_MAX if it is not specified.

/!\ Pay attention to the limit parameter /!\

    If limit is set and positive, the returned array will contain a maximum of limit elements with the last element containing the rest of the string.
    If the limit parameter is negative, all components except the last -limit are returned.
    If the limit parameter is equal to zero, then this is treated as 1.

Example :

explodeWords('My name is John'); // ['My', 'name', 'is', 'John']

explodeWords('My-name/is-John', '/'); // ['My-name', 'is-John']

explodeWords('My-name/is-John/and-i-love-apple', '/', 2); // ['My-name', 'is-John/and-i-love-apple']

explodeWords('My-name/is-John/and-i-love-apple', '/', -1); // ['My-name', 'is-John']

You are not allowed to use explode, make your own. */

function explodeWords($string, $separator = ' ', $limit = PHP_INT_MAX) {
    $result = [];
    $current = '';
    $count = 0;

    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];

        if ($char === $separator) {
            $result[] = $current;
            $current = '';
            $count++;

            if ($count === abs($limit)) {
                break;
            }
        } else {
            $current .= $char;
        }
    }

    if ($current !== '') {
        $result[] = $current;
    }

    if ($limit === 0) {
        return array_slice($result, 0, 1);
    }

    if ($limit > 0) {
        $lastIndex = count($result) - 1;
        $result[$lastIndex] .= substr($string, $i);
    }

    return ($limit < 0) ? array_slice($result, 0, $limit) : $result;
}

// Examples
print_r(explodeWords('My name is John')); // ['My', 'name', 'is', 'John']
print_r(explodeWords('My-name/is-John', '/')); // ['My-name', 'is-John']
print_r(explodeWords('My-name/is-John/and-i-love-apple', '/', 2)); // ['My-name', 'is-John/and-i-love-apple']
print_r(explodeWords('My-name/is-John/and-i-love-apple', '/', -1)); // ['My-name', 'is-John']

