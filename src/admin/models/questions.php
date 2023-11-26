<?php

    // ADD QUESTIONS
    function addQuestions($titleQuestion, $choice1, $choice2, $choice3, $choice4, $correctAnswer, $idExam) {
        $sql = "INSERT INTO questions(title_question, choice1_question, choice2_question, choice3_question, choice4_question, correct_answer, id_exam) 
        VALUES ('$titleQuestion' , '$choice1', '$choice2', '$choice3', '$choice4', '$correctAnswer') WHERE id_exam =".$idExam;
        pdo_execute($sql);
    }


    // LOAD 1 QUESTION
    function loadOneQuesion($idQuestion) {
        $sql = "SELECT * FROM questions WHERE id_question =".$idQuestion;
        $question = pdo_query_one($sql);
        return $question;
    }

    // LIST QUESTIONS IN EXAM
    function listQuestions($examId) {
        $sql = "SELECT * FROM questions WHERE id_exam ='".$examId."' ORDER BY id_question DESC";
        $listQuestion = pdo_query($sql);
        return $listQuestion;
    }

    // UPDATE QUESTIONS
    function updateQuestions($titleQuestion, $choice1, $choice2, $choice3, $choice4, $correctAnswer, $idQuestion) {
        $sql = "UPDATE questions SET title_question = '".$titleQuestion."', choice1_question = '".$choice1."', 
        choice2_question = '".$choice2."', choice3_question = '".$choice3."', 
        choice4_question = '".$choice4."', correct_answer = '".$correctAnswer."'
        WHERE id_question =".$idQuestion;
        pdo_query($sql);
    }

    // DELETE QUESTIONS
    function deleteQuestions($idQuestion) {
        $sql = "DELETE FROM questions WHERE id_question =".$idQuestion;
        pdo_execute($sql);
    }
?>