<?php

class Animal{

    private $name;
    private $age;
    private static $type;


    function __construct($n, $a){
        $this->name = $n;
        $this->age = $a;
    }

    function get_name(){
       return $this->name;
    }
   
   
    function get_age(){
      return $this->age;
    } 

  
    function get_type(){
      return self::$type;
    }

    
    function set_type($t){
      self::$type = $t;
    }

        
    function set_name($n){
      $this->name= $n;
    }

        
    function set_age($a){
      $this->age = $a;
    }
    
      
    function walk(){
      $x = $this->name;
      echo "Animal $x walks";
    } 
    

# method to be overriden then overloaded, hence is written via a call function not a talk() function in the parent as well as child!
    function __call($name, $args){

      if ($name == "talk") {
          switch (count($args)) {

              case 0:
                  echo "Animal talks";
                  break;
              
              default:
                  break;
          }
      }

  }


}


$animal1 = new Animal("Foxy", 10);
$animal1->talk();
echo "<br>";
$animal1->walk();
$a = $animal1->get_age();
$n = $animal1->get_name();
Animal::set_type("dog");
$t = Animal::get_type();
echo "<br>$n the $t is $a years old";
echo "<br>==========================================<br>";


?>