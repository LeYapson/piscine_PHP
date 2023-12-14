<?php

/*Geneticists need to calculate the differences between two strands of DNA represented, for example, as follows :

GAGCCTACTAACGGGAT
CATCGTAATGACGGCCT
^ ^ ^  ^ ^    ^^

    The differences are represented by ^. For example here the answer is 7.

Create a dnaDiff function which takes two strings as mandatory parameters and returns the number of differences between the two strands of DNA. If the two DNA strands are not the same size return false.

You are not allowed to use the native array_diff or array_diff_assoc functions, make your own. */

function dnaDiff(string $str1, string $str2) : int
{
    $arr1 = str_split($str1);
    $arr2 = str_split($str2);
    $count = 0;
    if (sizeof($arr1) != sizeof($arr2))
    {
        return 0;
    }
    else 
    {
        for ($i = 0; $i < sizeof($arr1); $i++)
        {
            if ($arr1[$i] != $arr2[$i])
            {
                $count++;
            }
        }
    }
    return $count;
}
print_r(dnaDiff('GAGCCTACTAACGGGAT', 'CATCGTAATGACGGCCT'));
print_r(dnaDiff('GAGCCTACTAACGGGAT', 'CATCGTAATGACGGCCTAZA'));