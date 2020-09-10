<?php


if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

Subject::delete($id);

header("Location: ./index.php?p=subjects");

?>