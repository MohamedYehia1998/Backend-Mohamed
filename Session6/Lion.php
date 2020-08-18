<?php

require("./Animal.php");

class Lion extends Animal{

    private $numberOfPreys;

    function __construct($name, $age,$numberOfPreys){
        parent::__construct($name, $age);
        $this->numberOfPreys = $numberOfPreys;
    }

    public function get_preys(){
        return $this->numberOfPreys;
    }

    public function set_preys($numberOfPreys){
        $this->numberOfPreys = $numberOfPreys;
    }

    function walk(){
        $name = $this->get_name();
        echo "Lion $name walks <br>";
    }

    function __call($name, $args){

        if ($name == "talk") {
            switch (count($args)) {

                case 0:
                    echo "Lion talks <br>";
                    break;

                        
                case 1:
                    $y= $args[0];
                    echo "**$y** <br>";
                    break;
                
                default:
                    break;
            }
        }

    }

}

$lion1 = new Lion("Simba", 30, 5);
$lion1->walk();
$lion1->talk();
$lion1->talk("roar");
$lion1->set_preys(5);
echo $lion1->get_preys();