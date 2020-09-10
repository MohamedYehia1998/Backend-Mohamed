<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student = new Student();

    $student->setFirstName($_POST['first_name']);
    $student->setLastName($_POST['last_name']);
    $student->setEmail($_POST['email']);
    $student->setPhone($_POST['phone']);
    $student->setOccupation($_POST['occupation']);
    $student->setEducation($_POST['education']);

    $student->store();

    header('Location: ../../index.php?p=students');
}

?>

<html>
    <body>
        <h1>Create New Student</h1>

            <form method="POST">
                <label>First Name</label>
                <input name="first_name">
                <br>
                <br>
                
                <label>Last Name</label>
                <input name="last_name">
                <br>
                <br>            
                <label>Email</label>
                <input name="email">
                <br>
                <br>            
                <label>Phone Number</label>
                <input name="phone">
                <br>
                <br>            
                <label>Occupation</label>
                <input name="occupation">
                <br>
                <br>            
                <label>Education</label>
                <input name="education">
                <br>
                <br>
                <button type="submit">Submit</button>
            </form>
    </body>
</html>