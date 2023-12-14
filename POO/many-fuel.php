<?php
class Car {
    private float $tank;
    // Constructor with default values
    public function __construct() {
        $this->tank = 0;
    }
    // Accessors (Getters)
    public function getTank(): float {
        return $this->tank;
    }
    // Mutators (Setters)
    public function setTank(float $tank): self {
        $this->tank = $tank;
        return $this;
    }
    // Mutator to add gallons of fuel to the tank
    public function addFuel(float $gallons): self {
        $this->tank += $gallons;
        return $this;
    }
    // Method to calculate fuel consumption and subtract from the tank
    public function ride(float $distance): self {
        $consumedFuel = $distance / 20; // Assuming 1 gallon per 20 kilometers
        $this->tank -= $consumedFuel;
        return $this;
    }
}
// Usage example
$car = new Car();
// Adding 10 gallons of fuel, riding 200 kilometers, and displaying the remaining fuel level
$fuelLevel = $car->addFuel(10)->ride(200)->getTank();
echo "Remaining Fuel Level: " . $fuelLevel . " gallons\n";
