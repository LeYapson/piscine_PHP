<?php

/*Robot testers have called for an easier way to control robots remotely. They would like to enter a list of characters corresponding to the desired movements. For example : 'RRLFBF'.

Conversion table :
----------------
R | RIGHT
L | LEFT
F | FRONT
B | BACKWARDS

Create a manageMovements function which takes a string of characters among R, L, F, B and returns an array containing the list of instructions to give to the robot.

Warning if the user typed a duplicate statement (RR, LL, FF, BB), on the second statement, for example, specify 'RIGHT AGAIN'. */


function manageMovements(string $str) : array
{
    $arr = str_split($str);
    $finalArr = [];
    for ($i = 0; $i < sizeof($arr); $i++)
    {
        if ($arr[$i] == 'R')
        {
            $finalArr[$i] = 'RIGHT';
        }
        elseif ($arr[$i] == 'L')
        {
            $finalArr[$i] = 'LEFT';
        }
        elseif ($arr[$i] == 'F')
        {
            $finalArr[$i] = 'FRONT';
        }
        elseif ($arr[$i] == 'B')
        {
            $finalArr[$i] = 'BACKWARDS';
        }
    }
    for ($i = 0; $i < sizeof($finalArr); $i++)
    {
        if ($finalArr[$i] == $finalArr[$i + 1])
        {
            $finalArr[$i + 1] .= ' AGAIN';
        }
    }
    return $finalArr;
}

echo print_r(manageMovements('RRLFBF'));