<?php

$students = Student::all();


?>

<html>
    <body>
        <h1>students</h1>

        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Occupation</th>
                    <th>Education</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($students as $student) {
                        ?>
                        <tr>
                            <td><?= $student->id ?></td>
                            <td><?= $student->first_name ?></td>
                            <td><?= $student->last_name ?></td>
                            <td><?= $student->email ?></td>
                            <td><?= $student->phone ?></td>
                            <td><?= $student->occupation ?></td>
                            <td><?= $student->education ?></td>
                            <td>
                                <a href="./?p=students&action=show&id=<?= $student->id ?>" class="btn btn-sm btn-info">Show</a>
                                <a href="./?p=students&action=edit&id=<?= $student->id ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="./?p=students&action=delete&id=<?= $student->id ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <a href="./?p=students&action=create" class="btn btn-lg btn-success">Create New Instructor</a>
    </body>
</html>