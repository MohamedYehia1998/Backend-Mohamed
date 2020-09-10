<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$old_subject = Subject::read($id);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $new_subject = new Subject();
    $new_subject->set_name($_POST["name"]);
    $new_subject->update($id);

    header("Location: ./index.php?p=subjects");
}


?>


<html>
    <h2>Edit Subject <?php echo $old_subject->id ?></h2>
        <form method = "POST">
            <label>Name</label>
            <input name = "name" value = <?php echo $old_subject->name ?>>
            <button type = "submit">Change</button>
        </form>
</html>