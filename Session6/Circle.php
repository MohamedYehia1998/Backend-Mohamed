<?php

require_once("./Shape.php");

class Circle extends Shape{
    
    const SHAPE_TYPE = 3;
    protected $radius;

    function __construct($radius){
        parent::__construct(0, 0);
        $this->radius = $radius;
    }

    public function area(){
        return pow($this->radius, 2) * pi();
    }

    
    public function getFullDescription(){
        $r = $this->radius;
        $n = $this->name;
        return "Circle<#" . static::SHAPE_TYPE . ">: $n - $r <br>";
    }
}


$c1 = new Circle(2); # constructor works
$c1->set_name("c1");
echo "Name: " . " " . $c1->get_name() . "<br>";  # name setter and getter works
echo "ID: " . " " . $c1->get_id() . "<br>";  # id getter works
echo Circle::getTypeDescription();  # works
echo $c1->getFullDescription();   # works
echo "Area: " . $c1->area();   # works