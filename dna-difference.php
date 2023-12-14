<?php
function dnaDiff($left, $right) : int|bool {
    $diff = 0;
    if (strlen($left) !== strlen($right)) {
        return false;
    }
    for ($i = 0; $i < max(strlen($left), strlen($right)); $i++) {
        if ($i >= strlen($left) || $i >= strlen($right)) break;
        $firstChar = $left[$i];
        $lastChar  = $right[$i];
        if ($firstChar !== $lastChar) {
            $diff++;
        }
    }
    return $diff;
}