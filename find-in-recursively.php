<?php

//Create a findIn function that retrieves the value of a key in an array or false if no key with that name.
//findIn with the following available parameters :

//The value key to find : string
//The array : array

function findIn($key, $array):string | bool {
    if (array_key_exists($key, $array)) {
        return $array[$key];
    }
    
    foreach ($array as $value) {
        if (is_array($value)) {
            $result = findIn($key, $value);
            if ($result !== false) {
                return $result;
            }
        }
    }
    
    return false;
}