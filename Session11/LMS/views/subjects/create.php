<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $subject = new Subject();
    $subject->set_name($_POST["name"]);

    $subject->create();

    header("Location: ./index.php?p=subjects");
}

?>



<html>
    <form method = "POST">
        <label>Enter the name of the new subject</label>
        <input name = "name">
        <button class="btn btn-dark" type = "submit">Create</button>
    </from>
</html>