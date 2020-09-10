<?php

$id = $_GET['id'];

Student::delete($id);

header('Location: ./?p=students');