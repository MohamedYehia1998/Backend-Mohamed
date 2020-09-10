<?php

$id = $_GET['id'];

$student = Student::show($id);
?>

<html>
    <body>
        <h1>Show <?= $student->first_name . ' ' . $student->last_name ?></h1>
        <hr>
        <p>Email: <?= $student->email ?></p>
        <p>Phone: <?= $student->phone ?></p>
        <p>Occupation: <?= $student->occupation ?></p>
        <p>Education: <?= $student->education ?></p>
    </body>
</html>