<?php
include 'header.php';
include 'sidebar.php';
//include 'main.php';
include '../../config/db.php';
include '../models/subjects.php';
include '../models/exams.php';
include '../models/examinees.php';
include '../models/questions.php';


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

            // ADD SUBJECTS
        case 'addSubjects':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['addSubject'])) {
                    $nameSubject = $_POST['nameSubject'];
                    insertSubjects($nameSubject);
                    $notification = "Success!";
                }
            }
            include "pages/subjects/addSubjects.php";
            break;

            // LIST ALL SUBJECTS
        case 'manageSubjects':
            $listSubject = listSubject();
            include "pages/subjects/manageSubjects.php";
            break;

            // LOAD 1 SUBJECTS
        case 'updateOneSubject':
            if (isset($_GET['id_subject']) && ($_GET['id_subject'] > 0)) {
                $loadOne = loadOneSubject($_GET['id_subject']);
            }
            include 'pages/subjects/updateSubjects.php';
            break;

            // UPDATE SUBJECTS
        case 'updateSubjects':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['updateSubject'])) {
                    $nameSubject = $_POST['nameSubject'];
                    $idSubject = $_POST['idSubject'];
                    updateSubject($nameSubject, $idSubject);
                    $notification = "Success!";
                }
            }
            $listSubject = listSubject();
            include 'pages/subjects/manageSubjects.php';
            break;

            // DELETE SUBJECT
        case 'deleteSubjects':
            if (isset($_GET['id_subject']) && ($_GET['id_subject'] > 0)) {
                $idSubject = $_GET['id_subject'];
                $delete = deleteSubject($idSubject);
            }
            $listSubject = listSubject();
            include 'pages/subjects/manageSubjects.php';
            break;

            // ADD EXAMS
        case 'addExams':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['addExam'])) {
                    $examTitle = $_POST['examTitle'];
                    $examDesc = $_POST['examDesc'];
                    $examTimeLimit = $_POST['examTimeLimit'];
                    $examLimitQuest = $_POST['examLimitQuest'];
                    $idSubject = $_POST['subjectId'];
                    addExams($examTitle, $examTimeLimit, $examLimitQuest, $examDesc, $idSubject);
                    $notification = "Success!";
                }
            }
            $listSubject = listSubject();
            include 'pages/exams/addExams.php';
            break;

            // LIST ALL EXAMS
        case 'manageExams':
            $listSubject = listSubject();
            $listExam = listExams();

            include 'pages/exams/manageExams.php';
            break;

            //UPDATE EXAMS
        case 'updateOneExam':
            if (isset($_GET['id_exam']) && ($_GET['id_exam'] > 0)) {
                $loadOne = loadOneExam($_GET['id_exam']);
                $listQuestion = listQuestions($_GET['id_exam']);
            }
            $listSubject = listSubject();
            include 'pages/exams/updateExams.php';
            break;

        case 'updateExams':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['updateExam'])) {
                    $idExam = $_POST['idExam'];
                    $examTitle = $_POST['examTitle'];
                    $examDesc = $_POST['examDesc'];
                    $examTimeLimit = $_POST['examTimeLimit'];
                    $examLimitQuest = $_POST['examLimitQuest'];
                    $idSubject = $_POST['subjectId'];
                    updateExams($examTitle, $examTimeLimit, $examLimitQuest, $examDesc, $idExam, $idSubject);
                    $notification = "Success!";
                }
            }
            $listExam = listExams();
            $listSubject = listSubject();
            include 'pages/exams/manageExams.php';
            break;

            // ADD EXAMINEES
        case 'addExaminees':

            break;

            // LIST ALL EXAMINEES      
        case 'manageExaminees':

            break;

        default:
            //include 'main.php';
    }
} else {
    //include 'main.php';
}

include 'footer.php';
?>