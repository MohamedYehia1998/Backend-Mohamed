<?php

class Student {
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $education;
    private $occupation;
    private $phone;
    private static $connection;

    public function __construct() {
        global $connection;
        self::$connection = $connection;
    }

    private static function setConnection() {
        global $connection;
        self::$connection = $connection;
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getOccupation() {
        return $this->occupation;
    }

    public function setOccupation($occupation) {
        $this->occupation = $occupation;
    }
    

    public function getEducation() {
        return $this->education;
    }

    public function setEducation($education) {
        $this->education = $education;
    }

    public static function all() {
        self::setConnection();

        $sql = 'SELECT * FROM `students`';

        $smt = self::$connection->prepare($sql);
        $smt->execute();

        return $smt->fetchAll(PDO::FETCH_OBJ);
    }

    public function store() {
        $sql = 'INSERT into `students` (first_name, last_name, email, phone, occupation, education) VALUES (:firstName, :lastName, :email, :phone, :occupation, :education)';

        $data = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'occupation' => $this->occupation,
            'education' => $this->education
        ];

        $smt = self::$connection->prepare($sql);

        $smt->execute($data);

        return self::$connection->lastInsertId();
    }

    public static function show($id) {
        self::setConnection();
        $sql = 'SELECT * FROM `students` WHERE id=:id';

        $data = [
            'id' => $id
        ];

        $smt = self::$connection->prepare($sql);

        $smt->execute($data);

        return $smt->fetch(PDO::FETCH_OBJ);
    }

    public function update($id) {
        $sql = 'UPDATE `students` SET first_name=:firstName, last_name=:lastName, email=:email, phone=:phone, occupation=:occupation, education=:education WHERE id=:id';

        $data = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'occupation' => $this->occupation,
            'education' => $this->education,
            'id' => $id
        ];

        $smt = self::$connection->prepare($sql);
        $smt->execute($data);

        return $smt->fetch(PDO::FETCH_OBJ);
    }

    public static function delete($id) {
        self::setConnection();

        $sql = 'DELETE FROM `students` WHERE id=:id';

        $data = [
            'id' => $id
        ];

        $smt = self::$connection->prepare($sql);
        $smt->execute($data);
    }

}