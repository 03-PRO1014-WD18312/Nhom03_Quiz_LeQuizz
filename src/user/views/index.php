<?php

session_start();
include '../../config/db.php';
include '../../admin/models/subjects.php';
include '../../admin/models/examinees.php';

include 'header.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'login':
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = loginAccount($email, $password);

                if (is_array($user)) {
                    $_SESSION['user'] = $user;
                    echo "<script>window.location.href='index.php';</script>";
                    // header('Location: index.php');
                } else {
                    $notice = 'Email or password is incorrect!';
                    include 'login.php';
                }
            } else {
                include 'login.php';
            }

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
