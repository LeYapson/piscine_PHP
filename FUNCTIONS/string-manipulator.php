<?php

function capsMe(string $str): string
{
    return strtoupper($str);
}
function lowerMe(string $str): string
{
    return strtolower($str);
}
function upperCaseFirst(string $str): string
{
    return ucwords($str);
}
function lowerCaseFirst($string) {
    $words = explode(' ', $string);
    $lowercasedWords = array_map('lcfirst', $words);
    return implode(' ', $lowercasedWords);
}
function removeBlankSpace(string $str): string
{
    return trim($str);
}
