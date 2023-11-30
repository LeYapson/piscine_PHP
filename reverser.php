<?php

function reverse(string $str): string
{
    return strrev($str);
}

function isPalindrome(string $str): bool
{
    $revstr = strrev($str);
    if ($str == $revstr) {
        return TRUE;
    }
}
