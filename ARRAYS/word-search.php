<?php

function searchWord($board, $word): bool
{
    $rows = count($board);
    $columns = count($board[0]);
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            if (internalFunction($board, $word, $i, $j, 0)) {
                return true;
            }
        }
    }
    return false;
}
function internalFunction($board, $word, $x, $y, $index): bool
{
    if ($index == strlen($word)) {
        return true;
    }
    if ($x < 0 || $y < 0 || $x == count($board) || $y == count($board[0]) || $board[$x][$y] != $word[$index]) {
        return false;
    }
    $temp = $board[$x][$y];
    $board[$x][$y] = '/';
    $found = internalFunction($board, $word, $x - 1, $y, $index + 1) ||
        internalFunction($board, $word, $x + 1, $y, $index + 1) ||
        internalFunction($board, $word, $x, $y - 1, $index + 1) ||
        internalFunction($board, $word, $x, $y + 1, $index + 1);
    $board[$x][$y] = $temp;
    return $found;
}