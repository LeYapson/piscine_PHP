<?php
function explodeWords(string $sentence, string $separator = " ", int $limit = PHP_INT_MAX) : array
{
    $arr = str_split($sentence);
    $count = 0;
    $new_limit = 0;
    $finalArr = [];
    for ($i = 0; $i < sizeof($arr); $i++)
    {
        if ($limit >= 0)
        {
            if ($arr[$i] != $separator && $count < $limit - 1)
            {
                $finalArr[$count] .= $arr[$i];
            }
            elseif ($arr[$i] == $separator && $count < $limit - 1) 
            {
                $count++;
            }
            else 
            {
                $finalArr[$count] .= $arr[$i];
            }
        }
        else 
        {
            if ($arr[$i] == $separator)
            {
                $new_limit++;
            }
        }
    }
    for ($i = 0; $i < sizeof($arr); $i++)
    {
        if ($limit < 0)
        {
            if ($arr[$i] != $separator && $count < ($new_limit + $limit + 1))
            {
                $finalArr[$count] .= $arr[$i];
            }
            elseif ($arr[$i] == $separator && $count < ($new_limit + $limit + 1)) 
            {
                $count++;
            }
        }
    }
    return $finalArr;
}
print_r(explodeWords('My-name/is-John', '/'));