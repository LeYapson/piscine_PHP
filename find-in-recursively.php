<?php

//Create a findIn function that retrieves the value of a key in an array or false if no key with that name.
//findIn with the following available parameters :

//The value key to find : string
//The array : array

function findIn($value, $array)
{
    if (array_key_exists($value, $array)) {
        return $array[$value];
    } else {
        return false;
    }
}