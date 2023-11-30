<?php

$month = date("n");

switch ($month) {
    case 1:
        echo "We are in the month of January";
        break;
    case 2:
        echo "We are in the month of February";
        break;
    case 3:
        echo "We are in the month of March";
        break;
    case 4:
        echo "We are in the month of April";
        break;
    case 5:
        echo "We are in the month of May";
        break;
    case 6:
        echo "We are in the month of June";
        break;
    case 7:
        echo "We are in the month of July";
        break;
    case 8:
        echo "We are in the month of August";
        break;
    case 9:
        echo "We are in the month of September";
        break;
    case 10:
        echo "We are in the month of October";
        break;
    case 11:
        echo "We are in the month of November";
        break;
    case 12:
        echo "We are in the month of December";
        break;
    default:
        echo "Invalid month";
}