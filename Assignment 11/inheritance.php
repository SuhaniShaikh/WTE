<?php 

//single

class A {
public $a = 10;
}

class B extends A {
    public $b = 20;

    public function sum(){
        $sum = $this->a + $this->b ;
        echo $sum;
    }
}

$ob1 = new  B();
$ob1->sum();

// Multilevel 

class C {
    public $c = 30;
}

class D extends C {
    public $d = 50;
    public $sum; 
    
    public function __construct() {
        $this->sum = $this->c + $this->d;  
    }
}

class E extends D {
    public $e = 40;

    public function finalSum() {
        $finalsum = $this->sum + $this->e;  
        echo $finalsum;
    }
}

$ob2 = new E();
$ob2->finalSum(); 


//hirarchical 

class F {
    public $baseValue = 100;
}

class G extends F {
    public $g = 25;
    
    public function showSum() {
        $sum = $this->baseValue + $this->g;
        echo  $sum;  
    }
}

class H extends F {
    public $h = 50;
    
    public function showProduct() {
        $product = $this->baseValue * $this->h;
        echo  $product;  
    }
}

$objG = new G();
$objG->showSum();

$objH = new H();
$objH->showProduct();

?>