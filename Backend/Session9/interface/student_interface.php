<?php

require_once('../models/Student.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $student1 = new Student();
    echo "Student created <br>";

    $student1->set_firstName($_POST["first_name"]);
    $student1->set_lastName($_POST["last_name"]);
    $student1->set_email($_POST["email"]);
    $student1->set_phone($_POST["phone"]);
    $student1->set_occupation($_POST["occupation"]);
    $student1->set_education($_POST["education"]);

    echo $student1->add_student();
}

$student_tuples = Student::all_students();


?>


<html>
    <body>
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

        <table> 
            <thead>
                <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Education</th>
                <th>Email</th>
                <th>Phone</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                <?php foreach ($student_tuples as $student){ ?>
                    <td> <?php echo $student->id; ?> </td>
                    <td> <?php echo $student->first_name; ?> </td>
                    <td> <?php echo $student->last_name; ?> </td>
                    <td> <?php echo $student->email; ?> </td>
                    <td> <?php echo $student->phone; ?> </td>
                    <td> <?php echo $student->education; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
            </table>





    </body>
</html>        