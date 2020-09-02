<?php

require_once('../config/dbConnect.php');

class Subject{

    private $id;
    private $name;

    private static $connection;


    public function get_id(){
        return $this->id;
    }

    
    public function get_name(){
        return $this->name;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public static function all_subjects(){

        global $connection;
        self::$connection = $connection;

        $sql = "SELECT * FROM subjects";
        $prepared_stat = self::$connection->prepare($sql);
        $prepared_stat->execute();

        return $prepared_stat->fetchAll(PDO::FETCH_OBJ);

    }

    public function insert_subject(){

        global $connection;
        self::$connection = $connection;

        $sql = "INSERT INTO subjects (name) VALUES (?)";
        $prepared_stat = self::$connection->prepare($sql);
        $prepared_stat ->execute([$this->name]);

        return self::$connection->lastInsertId();

    }
}