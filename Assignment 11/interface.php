<?php
interface Animal {
    public function makeSound();
}

class Dog implements Animal {
    public function makeSound() {
        echo "Woof!\n";
    }
}

class Cat implements Animal {
    public function makeSound() {
        echo "Meow!\n";
    }
}

$dog = new Dog();
$cat = new Cat();

$dog->makeSound();
$cat->makeSound(); 
?>