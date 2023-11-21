<?php

    // ADD EXAMS
    function addExams($examTitle, $examTimeLimit, $examLimitQuest, $examDesc, $idSubject) {
        $sql = "INSERT INTO exams(exam_title, exam_time_limit, exam_limit_quest, exam_description, id_subject) 
        VALUES ('$examTitle', '$examTimeLimit', '$examLimitQuest', '$examDesc', '$idSubject')";
        pdo_execute($sql);
    }

    // LIST ALL EXAMS
    function listExams() {
        $sql = "SELECT * FROM exams ORDER BY id_exam DESC";
        $listExam = pdo_query($sql);
        return $listExam;
    }

    // DELETE EXAMS
    function deleteExams($idExam) {
        $sql = "DELETE FROM exams WHERE id_exam =".$idExam;
        pdo_execute($sql);
    }

    // LOAD 1 EXAM
    function loadOneExam($idExam) {
        $sql = "SELECT FROM exams WHERE id_exam =".$idExam;
        $exam = pdo_query_one($sql);
        return $exam;
    }

    // UPDATE EXAMS
    function updateExams($examTitle, $examTimeLimit, $examLimitQuest, $examDesc, $idExam) {
        $sql = "UPDATE exams SET exam_title = '".$examTitle."', exam_time_limit = '".$examTimeLimit."', 
        exam_limit_quest = '".$examLimitQuest."', exam_description = '".$examDesc."' 
        WHERE id_exam =".$idExam;
        
        pdo_query($sql);
    }
?>