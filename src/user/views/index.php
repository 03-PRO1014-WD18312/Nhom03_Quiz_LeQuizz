<?php

session_start();
include '../../config/db.php';
include '../../admin/models/subjects.php';
include '../../admin/models/exams.php';
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

        case 'logout':
            unset($_SESSION['user']);
            echo "<script>window.location.href='index.php';</script>";
            // header('Location: index.php');
            break;

        case 'detailSubject':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $loadOneSubject = loadOneSubject($id);
                $listExamsBySubject = listExamsBySubject($id);

                include 'content.php';
                include './pages/subjects/detailSubject.php';
            } else {
                echo "<script>window.location.href='index.php';</script>";
                // header('Location: index.php');
            }

            break;

        case 'registerSubject':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $notice = "Đăng ký môn học thành công!";

                $loadOneSubject = loadOneSubject($id);
                $listExamsBySubject = listExamsBySubject($id);

                echo "<script>alert('" . $notice . "');</script>";
                echo "<script>window.location.href='index.php?act=detailSubject&id=" . $id . "';</script>";
            } else {
                echo "<script>window.location.href='index.php';</script>";
                // header('Location: index.php');
            }

            break;


        case 'registSubject':
            $listSubject = listSubject();

            include 'content.php';
            include './pages/subjects/registSubject.php';
            break;

        case 'listExams':
            if (isset($_POST['listChecked'])) {
                $key = $_POST['key'];
                $search = $_POST['search'];
            } else {
                $key = "";
                $search = 0;
            }

            $listSubject = listSubject();
            $listExam = listExams($key, $search);

            include 'content.php';
            include './pages/exams/listExams.php';
            break;

        default:
            $listSubject = listSubject();
            include 'content.php';
            include 'home.php';
            // include 'main.php';
            break;
    }
} else {
    $listSubject = listSubject();
    include 'content.php';
    include 'home.php';
    // include 'main.php';
}

include 'footer.php';
