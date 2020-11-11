<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $errors = [];

    if (empty($_POST['user_name'])) {
        $errors['user_name'] = 'Username is required';
    }


    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    }

    if (empty($_POST['password2'])) {
        $errors['password2'] = 'Password Confirmation is required';
    }

    if (!empty($_POST['password']) && !empty($_POST['password2'])) {
        if (($_POST['password'] != $_POST['password2'])) {
            $errors['password2'] = 'Passwords don\'t match';
        }
    }

    
    if (empty($_POST['phone'])) {
        $errors['phone'] = 'Phone number is required';
    }


    if (empty($_POST['gender'])) {
        $errors['gender'] = 'Gender is required';
    }
    
    if (count($errors) == 0) {


        foreach($_POST as $key => $value) {

            if($key == "user_name"){
                echo "username: $value <br>";
            }


            #no need to print the password confirmation
            else if($key == "password2"){
                continue;
            }

            else{
                echo "$key: $value <br>";
            }
          
        }
    }

    if (count($errors) != 0) {

        foreach ($errors as $e) {
            echo "* $e <br>";
        }
    }
}    

    ?>
