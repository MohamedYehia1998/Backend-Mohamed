<?php

ob_start();

require_once('./config/dbConnect.php');
require_once('./models/Instructor.php');
require_once('./models/Student.php');
require_once('./models/Subject.php');

$page = $_GET['p'];


if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

require_once('./views/_common/header.php');

switch($page) {
    case 'instructors':
        if (!isset($action)) {
            require_once('./views/instructors/index.php');
        } else if ($action == 'create') {
            require_once('./views/instructors/create.php');
        } else if ($action == 'show') {
            require_once('./views/instructors/show.php');
        } else if ($action == 'edit') {
            require_once('./views/instructors/edit.php');
        } else if ($action == 'delete') {
            require_once('./views/instructors/delete.php');
        }
        break;
    
    case 'students':
        if (!isset($action)) {
            require_once('./views/students/index.php');
        } else if ($action == 'create') {
            require_once('./views/students/create.php');
        } else if ($action == 'show') {
            require_once('./views/students/show.php');
        } else if ($action == 'edit') {
            require_once('./views/students/edit.php');
        } else if ($action == 'delete') {
            require_once('./views/students/delete.php');
        }
        break;
            
    case 'subjects':
        if (!isset($action)) {
            require_once('./views/subjects/index.php');
        } else if ($action == 'create') {
            require_once('./views/subjects/create.php');
        } else if ($action == 'read') {
            require_once('./views/subjects/read.php');
        } else if ($action == 'update') {
            require_once('./views/subjects/update.php');
        } else if ($action == 'delete') {
            require_once('./views/subjects/delete.php');
        }
        break;

    case 'home';
        require_once('./views/_common/home.php');
        break;

    default:
        echo 'Error 404 Page Not Found';
}

require_once('./views/_common/footer.php');

?>
