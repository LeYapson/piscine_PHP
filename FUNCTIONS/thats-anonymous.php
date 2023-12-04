<?php

/*
Create a $today closure that will return "It is (current month) (current day number), (current year)"

Example : It is July 29, 2021

Create a $isLeapYear closure which will check if the year passed as a parameter is leap.
*/
$today = function () {
    $date = date('F 0j, Y');
    return "It is $date";
};

$isLeapYear = function ($year) {
    return date('L', mktime(0, 0, 0, 1, 1, $year)) === '1';
};

echo $today() . "\n";
echo $isLeapYear(2021) . "\n";

