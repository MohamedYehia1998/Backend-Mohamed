<?php



$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$search = $_POST['search'];
$study = $_POST['study'];


var_dump($firstName);
var_dump($lastName);
var_dump($email);
var_dump($pwd);
var_dump($search);
var_dump($study);


?>


<html>
    <body>
        <h1>User Data</h1>
        <p>Your name is <?php echo $firstName . ' ' . $lastName; ?></p>
        <p>Your email is <?php echo $email ?></p>
        <p>Your Passowrd is <?php echo $pwd ?></p>
    </body>
</html>