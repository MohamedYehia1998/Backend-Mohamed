<?php

require_once("../models/Subject.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $subject = new Subject();
    $subject->set_name($_POST["subject_name"]);

    $subject->insert_subject();
}

$subjects = Subject::all_subjects();


?>





<html>
    <body>
        <form method = "POST">
            <label>Subject Name</label>
            <input name = subject_name>
            <button type = "submit">Submit</button>
        </form>

        <table border="1" cellspacing="0"> 
            <thead>
                <tr>
                <th>ID</th>
                <th>Subject Name</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                <?php foreach ($subjects as $s){ ?>
                    <td> <?php echo $s->id; ?> </td>
                    <td> <?php echo $s->name; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
</html>
