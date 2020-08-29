<?php

# "." means in the same directory, another "." means one level outside ... etc
require_once('../config/dbConnect.php');

class Student{

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $education;
    private $occupation;

    # interface between student and database
    private static $connection;


    public function get_id(){
        return $this->id;
    }

    public function get_firstName(){
        return $this->firstName;
    }
    
    public function get_lastName(){
        return $this->lastName;
    }
    
    public function get_email(){
        return $this->email;
    }
    
    public function get_phone(){
        return $this->firstName;
    }
    
    public function get_education(){
        return $this->lastName;
    }
    
    public function get_occupation(){
        return $this->email;
    }
    #####

    public function set_firstName($firstName){
        $this->firstName = $firstName;
    }
    

    public function set_lastName($lastName){
        $this->lastName = $lastName;
    }
    
    public function set_email($email){
        $this->email = $email;
    }
    
    public function set_phone($phone){
        $this->phone = $phone;
    }
    
    public function set_education($education){
        $this->education = $education;
    }
    
    public function set_occupation($occupation){
        $this->occupation = $occupation;
    }


    public function add_student(){
        # connect with database
        global $connection;   # use the connection variable in the dbConnect file inside this function (hence the word global).
        self::$connection = $connection; # now connect the student object with the mysql database

       # $firstName = $this->get_firstName();
       # $lastName = $this->get_lastName();
       # $education = $this->get_education();
        #$email = $this->get_email();
        #$phone = $this->get_phone();
        #$occupation = $this->get_occupation();

        $sql = "INSERT INTO students (first_name, last_name, education, email, phone, occupation) 
        VALUES (:firstName, :lastName, :education, :email, :phone, :occupation)"; 

        $data = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'education' => $this->education,
            'phone' => $this->phone,
            'occupation' => $this->occupation,
            'email' => $this->email
        ];

        $prepared_sql = self::$connection->prepare($sql);
        $prepared_sql->execute($data);

        #return the newly entered row
        return self::$connection->lastInsertId();

    }
    
    public static function all_students(){
        # connect with database
        global $connection;   # use the connection variable in the dbConnect file inside this function (hence the word global).
        self::$connection = $connection; # now connect the student object with the mysql database


        $sql = "SELECT * FROM students"; 

        $prepared_sql = self::$connection->prepare($sql);
        $prepared_sql->execute();

        #return ALL present rows
        return $prepared_sql->fetchAll(PDO::FETCH_OBJ);

    }
}