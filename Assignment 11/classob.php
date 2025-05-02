<?php
class Student {
    public $name;
    public $age;
    public $marks;
    public $cgpa;
    
    public function __construct($name, $age, $marks) {
        $this->name = $name;
        $this->age = $age;
        $this->marks = $marks;
        $this->calculateCGPA();
    }
    
    private function calculateCGPA() {
        if ($this->marks >= 90) {
            $this->cgpa = 4.0;
        } elseif ($this->marks >= 80) {
            $this->cgpa = 3.5;
        } elseif ($this->marks >= 70) {
            $this->cgpa = 3.0;
        } elseif ($this->marks >= 60) {
            $this->cgpa = 2.5;
        } else {
            $this->cgpa = 2.0;
        }
    }
    
    public function display() {
        echo "Student Information:\n";
        echo "Name: " . $this->name . "\n";
        echo "Age: " . $this->age . "\n";
        echo "Marks: " . $this->marks . "\n";
        echo "CGPA: " . $this->cgpa . "\n";
    }
}
$student1 = new Student("suhani",21,85);
$student1->display();
?>