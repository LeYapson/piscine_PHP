<?php
// Abstract class
abstract class AbstractGeometry {
    // Abstract methods
    abstract public function area();
    abstract public function perimeter();
}
// Rectangle class
class Rectangle extends AbstractGeometry {
    protected $width;
    protected $height;
    // Constructor
    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
    // Implementing abstract methods
    public function area() {
        return $this->width * $this->height;
    }
    public function perimeter() {
        return 2 * ($this->width + $this->height);
    }
}
// Square class
class Square extends AbstractGeometry {
    protected $side;
    // Constructor
    public function __construct($side) {
        $this->side = $side;
    }
    // Implementing abstract methods
    public function area() {
        return $this->side * $this->side;
    }
    public function perimeter() {
        return 4 * $this->side;
    }
}
// Triangle class
class Triangle extends AbstractGeometry {
    protected $side1;
    protected $side2;
    protected $side3;
    // Constructor
    public function __construct($side1, $side2, $side3) {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
    }
    // Implementing abstract methods
    public function area() {
        // Using Heron's formula for area of a triangle
        $s = ($this->side1 + $this->side2 + $this->side3) / 2;
        return sqrt($s * ($s - $this->side1) * ($s - $this->side2) * ($s - $this->side3));
    }
    public function perimeter() {
        return $this->side1 + $this->side2 + $this->side3;
    }
}
// Example usage
$rectangle = new Rectangle(5, 10);
echo "Rectangle Area: " . $rectangle->area() . "\n";
echo "Rectangle Perimeter: " . $rectangle->perimeter() . "\n";
$square = new Square(4);
echo "Square Area: " . $square->area() . "\n";
echo "Square Perimeter: " . $square->perimeter() . "\n";
$triangle = new Triangle(3, 4, 5);
echo "Triangle Area: " . $triangle->area() . "\n";
echo "Triangle Perimeter: " . $triangle->perimeter() . "\n";
