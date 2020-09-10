<?php

$id = $_GET['id'];

Instructor::delete($id);

header('Location: ./?p=instructors');