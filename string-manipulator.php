<?php

$str ="mamaguevo et chimichangas";

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
    return ucfirst($str);
}
function lowerCaseFirst(string $str): string
{
    return lcfirst($str);
}
function removeBlankSpace(string $str): string
{
    return trim($str);
}