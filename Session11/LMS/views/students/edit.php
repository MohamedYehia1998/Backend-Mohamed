<?php

$id = $_GET['id'];

$existingStudent = Student::show($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updatedStudent = new Student();
    $updatedStudent->setFirstName($_POST['first_name']);
    $updatedStudent->setLastName($_POST['last_name']);
    $updatedStudent->setEmail($_POST['email']);
    $updatedStudent->setPhone($_POST['phone']);
    $updatedStudent->setOccupation($_POST['occupation']);
    $updatedStudent->setEducation($_POST['education']);

    $updatedStudent->update($id);

    header('Location: ./?p=students');
}

?>

<html>
    <body>
        <h1>Edit <?= $existingStudent->first_name . ' ' . $existingStudent->last_name ?></h1>

            <form method="POST">
                <label>First Name</label>
                <input name="first_name" value="<?= $existingStudent->first_name ?>">
                <br>
                <br>
                
                <label>Last Name</label>
                <input name="last_name" value="<?= $existingStudent->last_name ?>">
                <br>
                <br>            
                <label>Email</label>
                <input name="email" value="<?= $existingStudent->email ?>">
                <br>
                <br>            
                <label>Phone Number</label>
                <input name="phone" value="<?= $existingStudent->phone ?>">
                <br>
                <br>            
                <label>Occupation</label>
                <input name="occupation" value="<?= $existingStudent->occupation ?>">
                <br>
                <br>            
                <label>Education</label>
                <input name="education" value="<?= $existingStudent->education ?>">
                <br>
                <br>
                <button type="submit">Submit</button>
            </form>
    </body>
</html>