<?php

function sayHello(): String
{
   return "Hello";
}

$name = "Abdelou";

function sayHelloTo(string $name): String
{
   return "Hello $name";
}
