<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$subject = Subject::read($id);

?>

<html>
<h2>Subject Details</h2>
<label> ID: <?php echo $subject->id ?></label>
<br>
<label> Name: <?php echo $subject->name ?></label>
<br>
<a href = "./index.php?p=subjects" class="btn btn-sm btn-info">Back</a>
</html>