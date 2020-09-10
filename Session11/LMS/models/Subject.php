<?php

# The subject model. Anything that has to do with the mysql database goes here (CRUD)

class Subject{


    private $name;
    private $id;
    private static $connection;

    public function set_name($name){
        $this->name = $name;
    }
    
    public function get_name(){
        return $this->name;
    }
    
    public function get_id(){
        return $this->id;
    }

    # no need to create an object to get all subjects
    public static function all(){

        global $connection;  // refer to the connection in dbConnect
        self::$connection = $connection;  // connect to the lms database

        $sql = "SELECT * FROM subjects ORDER BY id";
        $prepared_statement = self::$connection->prepare($sql); 
        $prepared_statement->execute();

        return $prepared_statement->fetchAll(PDO::FETCH_OBJ);

    }

    # cannot be static because it uses the object's attributes
    public function create(){

        global $connection;  // refer to the connection in dbConnect
        self::$connection = $connection;  // connect to the lms database

        $sql = "INSERT INTO subjects (name) VALUES (?)";
        $data = [$this->name];

        $prepared_statement = self::$connection->prepare($sql); 

        $prepared_statement->execute($data);
    }

    
    public static function read($id){

        global $connection;  // refer to the connection in dbConnect
        self::$connection = $connection;  // connect to the lms database

        $sql = "SELECT * FROM subjects WHERE id = ?";
        $data = [$id];

        $prepared_statement = self::$connection->prepare($sql); 

        $prepared_statement->execute($data);

        return $prepared_statement->fetch(PDO::FETCH_OBJ);
    }

    # cannot be static because it uses the object's attributes (later in the form the user will set the new name)
    public function update($id){

        global $connection;  // refer to the connection in dbConnect
        self::$connection = $connection;  // connect to the lms database

        $sql = "UPDATE subjects SET name = ? WHERE id = ?";
        $data = [$this->get_name(), $id];

        $prepared_statement = self::$connection->prepare($sql); 
        $prepared_statement->execute($data);


    }

    public static function delete($id){

        global $connection;  // refer to the connection in dbConnect
        self::$connection = $connection;  // connect to the lms database

        $sql = "DELETE FROM subjects WHERE id = ?";
        $data = [$id];

        $prepared_statement = self::$connection->prepare($sql); 
        $prepared_statement->execute($data);

    }

}



















?>