<?php

include '../../config/db.php';
include '../../admin/models/subjects.php';

include 'header.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'login':
            include 'login.php';
            break;

        case 'register':
            include 'register.php';
            break;

        case 'forgotPassword':
            include 'forgotPassword.php';
            break;

        case 'registSubject':
            $listSubject = listSubject();

            include './pages/subjects/registSubject.php';
            break;

        default:
            include 'sidebar.php';
            // include 'main.php';
            break;
    }
} else {
    include 'sidebar.php';
    // include 'main.php';
}

include 'footer.php';
