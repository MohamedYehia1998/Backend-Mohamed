<?php

require_once("./Animal.php");

class Bird extends Animal{

    private $distance_covered;


    function __construct($name, $age,$distance_covered){
        parent::__construct($name, $age);
        $this->distance_covered = $distance_covered;
    }

    function get_dist(){
        return $this->distance_covered;
    }

    function set_dist($distance_covered){
        $this->distance_covered = $distance_covered;
    }


    
    function __call($name, $args){

        if ($name == "talk") {
            switch (count($args)) {

                case 0:
                    echo "Bird Chirps <br>";
                    break;

                        
                case 1:
                    $y= $args[0];
                    echo "**$y**$y** <br>";
                    break;
                
                default:
                    break;
            }
        }

    }

    function walk(){
        echo "Bird flies <br>";
    }



}


$bird1 = new Bird("Sunny", 2, "100");
$bird1->set_dist(10);
echo $bird1->get_dist();
echo "<br>";
$bird1->walk();
$bird1->talk();
$bird1->talk("123456");
