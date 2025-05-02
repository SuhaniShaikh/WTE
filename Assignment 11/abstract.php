<?php
abstract class Shape {
    abstract public function area(); 
    
    public function printArea() { 
        echo "Area: " . $this->area() . "\n";
    }
}

class Circle extends Shape {
    public function area() { 
        return 3.14 * 5 * 5;
    }
}

$circle = new Circle();
$circle->printArea();
?>