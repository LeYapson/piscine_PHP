<?php

function invertTree(?BinaryNode $root): ?BinaryNode {
    if ($root === null) {
        return null;
    }
    $temp = $root->left;
    $root->left = invertTree($root->right);
    $root->right = invertTree($temp);
    return $root;
}