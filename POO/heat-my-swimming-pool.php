<?php
// Interface definition
interface PoolTempsInterface {
    public function getActualTemp(): int;
    public function getLastDaysTemps(): array;
    public function setHeater(bool $isHeaterOn): void;
}
// Class implementation
class PoolTemps implements PoolTempsInterface {
    private int $actualTemp;
    private array $lastDaysTemps;
    public bool $isActive = false;
    // Constructor
    public function __construct(int $actualTemp, array $lastDaysTemps) {
        $this->actualTemp = $actualTemp;
        $this->lastDaysTemps = $lastDaysTemps;
    }
    // Implementing interface methods
    public function getActualTemp(): int {
        return $this->actualTemp;
    }
    public function getLastDaysTemps(): array {
        return $this->lastDaysTemps;
    }
    public function setHeater(bool $isHeaterOn): void {
        $this->isActive = $isHeaterOn;
    }
    // Custom method to activate the heater based on conditions
    public function activateHeater(): void {
        $averageLastDaysTemp = array_sum($this->lastDaysTemps) / count($this->lastDaysTemps);
        if ($averageLastDaysTemp > 20 && $this->actualTemp >= 25) {
            $this->setHeater(true);
        }
    }
}
// Example usage
$poolTemps = new PoolTemps(25, [19, 20, 21, 16, 19, 23, 20]);
$poolTemps->activateHeater();
var_dump($poolTemps->isActive); // false
$poolTemps2 = new PoolTemps(26, [24, 26, 27, 25, 27, 23, 20]);
$poolTemps2->activateHeater();
var_dump($poolTemps2->isActive); // true
