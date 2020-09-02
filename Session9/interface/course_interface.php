<?php

require_once("../models/Course.php");
require_once("../models/Instructor.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $course = new Course();
    $course->set_name($_POST["course_name"]);
    $course->set_description($_POST["description"]);
    $course->set_instructor_id($_POST["instructor_id"]);

    $course->insert_course();
}

$courses = Course::all_courses();
$instructors = Instructor::all();   # all instructor tuples


?>


<html>
    <body>
        <form method = "POST">
            <label>Course Name</label>
            <input name = course_name>
            <br>
            <label>Description</label>
            <input name = description>
            <br>

            <label>Instructor ID</label>
            <select name="instructor_id">
                <?php
                foreach ($instructors as $instructor) { ?>
                    <option value= <?php echo $instructor->id; ?> > <?php echo $instructor->id; ?>  </option>
                <?php}?>
            </select>

            <button type = "submit">Submit</button>
        </form>

        <table border="1" cellspacing="0"> 
            <thead>
                <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Description</th>
                <th>Instructor ID</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                <?php foreach ($courses as $c){ ?>
                    <td> <?php echo $c->id; ?> </td>
                    <td> <?php echo $c->name; ?> </td>
                    <td> <?php echo $c->description; ?> </td>
                    <td> <?php echo $c->instructor_id; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
</html>
