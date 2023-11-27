<?php
// ADD SUBJECTS
function insertSubjects($nameSubject)
{
    $sql = "INSERT INTO subjects(name_subject) VAlUES ('$nameSubject')";
    pdo_execute($sql);
}

// LIST ALL SUBJECTS
function listSubject()
{
    $sql = "SELECT * FROM subjects ORDER BY id_subject DESC";
    $listSubject = pdo_query($sql);
    return $listSubject;
}

// DELETE SUBJECTS
function deleteSubject($idSubject)
{
    $sql = "DELETE FROM subjects WHERE id_subject=" . $idSubject;
    pdo_execute($sql);
}

// LOAD 1 SUBJECT
function loadOneSubject($idSubject)
{
    $sql = "SELECT * FROM subjects WHERE id_subject=" . $idSubject;
    $subject = pdo_query_one($sql);
    return $subject;
}

// UPDATE SUBJECTS
function updateSubject($nameSubject, $idSubject)
{
    $sql = "UPDATE subjects SET name_subject='" . $nameSubject . "' WHERE id_subject=" . $idSubject;
    pdo_execute($sql);
}
