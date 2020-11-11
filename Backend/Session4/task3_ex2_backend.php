<?php

$database = [
    ["alex@gmail.com", "123456"],
    ["tom@gmail.com", "abcdefg"],
    ["sally@yahoo.com", "qwerty"],
];

$message = "No account with such credentials exists, please register for a new account";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        
        $email = $_POST["email"];
        $password = $_POST["password"];


        #Check if the account is present in the database
        for ($i=0; $i < count($database); $i++) {

            if($database[$i][0] == $email && $database[$i][1] == $password ){
                $message = "Welcome";
            }
        }

    echo $message;

    }

    else{
        echo "Incomplete data";
    }
}

?>