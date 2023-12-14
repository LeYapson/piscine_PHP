<?php
class Mojito {
    // Attributes
    public $alcoholRate;
    public $ingredients;
    public $price;
    // Constructor with default values
    public function __construct() {
        $this->alcoholRate = 0.15;
        $this->ingredients = ['rum', 'lime', 'sparkling water', 'mint', 'sugar'];
        $this->price = 8;
    }
}
// Usage example
$mojito = new Mojito();
// Accessing attributes
echo "Alcohol Rate: " . $mojito->alcoholRate . "\n";
echo "Ingredients: " . implode(', ', $mojito->ingredients) . "\n";
echo "Price: $" . $mojito->price . "\n";
