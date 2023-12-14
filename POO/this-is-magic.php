<?php
class Magic {
    public string $card = 'As';
    public function __construct() {
        echo "__construct method called\n";
    }
    public function __destruct() {
        echo "__destruct method called\n";
    }
    public function __get($property) {
        echo "__get method called for property: $property\n";
    }
    public function __set($property, $value) {
        echo "__set method called for property: $property with value: $value\n";
    }
    public function __isset($property) {
        echo "__isset method called for property: $property\n";
    }
    public function __toString() {
        echo "__toString method called\n";
        return $this->card;
    }
}
$magic = new Magic();
echo $magic->undefinedProperty;
$magic->newProperty = 'New Value';
isset($magic->existingProperty);
echo $magic;
