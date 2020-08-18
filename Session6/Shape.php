<?php

 abstract class Shape{

    const SHAPE_TYPE = 1;
    public $name;
    protected $length;
    protected $width;
    private $id;

    function __construct($length, $width){
        $this->length = $length;
        $this->width = $width;
        $this->id = uniqid();
    }

    function set_name($name){
        $this->name = $name;
    }

    function get_name(){
        return $this->name;
    }

    
    function get_id(){
        return $this->id;
    }

    public abstract function area();

    public static function getTypeDescription(){
        return "Type: " . static::SHAPE_TYPE . "<br>";
    }

    
    public function getFullDescription(){
        $l = $this->length;
        $w = $this->width;
        $n = $this->name;
        return "Shape<#" . static::SHAPE_TYPE . ">: $n - $l x $w <br>";
    }
    
}

# Before abstraction tests:

// $s1 = new Shape(2, 3); # constructor works
// $s1->set_name("s1");
// echo "Name: " . " " . $s1->get_name() . "<br>";  # name setter and getter works
// echo "ID: " . " " . $s1->get_id() . "<br>";  # id getter works
// echo Shape::getTypeDescription();  # works
// echo $s1->getFullDescription();    # works





