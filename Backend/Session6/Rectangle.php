<?php

require_once("./Shape.php");

class Rectangle extends Shape{

    const SHAPE_TYPE = 2;

    function __construct($length, $width){
        parent::__construct($length, $width);
    }

    public function area(){
        return $this->length * $this->width;
    }

}


$r1 = new Rectangle(6, 8); # constructor works
$r1->set_name("r1");
echo "Name: " . " " . $r1->get_name() . "<br>";  # name setter and getter works
echo "ID: " . " " . $r1->get_id() . "<br>";  # id getter works
echo Rectangle::getTypeDescription();  # works
echo $r1->getFullDescription();   # works
echo "Area: " . $r1->area();   # works