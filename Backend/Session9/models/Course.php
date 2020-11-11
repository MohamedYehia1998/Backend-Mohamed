<?php

require_once('../config/dbConnect.php');

class Course{

    private $id;
    private $name;
    private $description;
    private $instructor_id;

    private static $connection;

    public function __construct(){
        echo "object created";
    }

    public function get_id(){
        return $this->id;
    }

    public function get_name(){
        return $this->name;
    }

    
    public function get_description(){
        return $this->description;
    }
        
    public function get_instructor_id(){
        return $this->instructor_id;
    }


    public function set_name($name){
        $this->name = $name;
    }

    public function set_description($description){
        $this->description = $description;
    }
        
    public function set_instructor_id($instructor_id){
        $this->instructor_id = $instructor_id;
    }

    public static function all_courses(){

        global $connection;
        self::$connection = $connection;

        $sql = "SELECT * FROM courses";
        $prepared_stat = self::$connection->prepare($sql);
        $prepared_stat->execute();

        return $prepared_stat->fetchAll(PDO::FETCH_OBJ);

    }

    public function insert_course(){

        global $connection;
        self::$connection = $connection;

        $sql = "INSERT INTO `courses` (`name`, `description`, instructor_id) VALUES (?, ?, ?)";
        $prepared_stat = self::$connection->prepare($sql);
        $prepared_stat ->execute([$this->name, $this->description, $this->instructor_id]);

        return self::$connection->lastInsertId();

    }
}