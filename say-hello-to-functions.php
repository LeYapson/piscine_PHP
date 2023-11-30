<?php

function sayHello(): String
{
    echo "Hello";
}

$name = "Abdelou";

function sayHelloTo(string $name): String
{
    echo "Hello $name";
}
