<?php

class vehicle {

    private $color;
    private $passenger_capacity;
    private $distance;   #distance from origin


    function __construct($col, $pc, $distance = 0) {
        $this->color = $col;
        $this->passenger_capacity = $pc;
        $this->distance = $distance; 
    }

    public function print_details(){
        
        echo "<br>";
        echo "Vehicle color is $this->color <br>" ;
        echo "Passenger capacity is $this->passenger_capacity <br>" ;
        echo "distance is $this->distance <br>" ;
    }



    public function get_color(){
        return $this->color;
    }

    public function set_color($color){
        $this->color = $color;
    }

    
    public function get_pass_cap(){
        return $this->passenger_capacity;
    }

    
    public function get_distance(){
        return $this->distance ;
    }

        
    public function set_distance($x){
        $this->distance = $x ;
    }


    public function move(){
        echo "Vehicle is moving";
    }

}


# Inheritance
class car extends vehicle {

    private $type;

    #overriding
    public function print_details(){
        $col = $this->get_color();
        $pc = $this->get_pass_cap();
        $d = $this->get_distance();

        echo "<br>";

        echo "Car color is $col <br>";
        echo "Passenger capacity is $pc <br>" ;
        echo "Distance is $d <br>" ;
        echo "Type is $this->type <br> <br>" ;
    }


    function __construct($col, $pc, $distance = 0, $type) {

        parent::__construct($col, $pc, $distance);
        $this->type = $type;

    }

    # Polymorphism (overriding)
    public function move(){
        echo "Car is moving";
    }

    public function set_type($t){
        $this->type = $t;
    }

    
    public function get_type(){
        return($this->type);
    }



}



# Inheritance
class plane extends vehicle {

    function __construct($col, $pc, $distance = 0) {

        parent::__construct($col, $pc, $distance = 0);

    }

    # Polymorphism (overriding)
    public function move(){
        echo "Plane is flying";
    }

    public function print_details(){
        $col = $this->get_color();
        $pc = $this->get_pass_cap();
        $d = $this->get_distance();

        echo "<br>";
        echo "Plane color is $col <br>";
        echo "Plane passenger capacity is $pc <br>" ;
        echo "Distance is $d <br> <br>" ;
    }


    # Polymorphism (overloading) - not working atm
    #public function set_distance($x, $y){
    #    $this->distance = sqrt(pow($x, 2) + pow($y, 2));
    #}

}


$vehicle1 = new vehicle("blue", 4, 8);
$vehicle1->move();
$vehicle1->set_color("red");
$vehicle1->print_details();

echo "=================<br>";

$car1 = new car("red", 4, 9, "bmw");
$car1->move();
$car1->set_type("Toyota");
$car1->print_details();

$x = $car1->get_pass_cap();
echo"$x <br>";

echo "=================<br>";

$p = new plane("white", 4, 8);
$p->move();
$p->set_color("black");
$p->print_details();



?>