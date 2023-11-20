<?php
include 'header.php';
include 'sidebar.php';
//include 'main.php';
include 'footer.php';
include '../../config/db.php';
include '../models/subjects.php';
include '../models/exams.php';
include '../models/examinees.php';


if (isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
    case 'addSubjects':
      if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
        $tenDm = $_POST['tendm'];
        $thongbao = "Thêm danh mục thành công";
      }
      include "pages/subjects/addSubjects.php";
      break;

    default:
      //include 'main.php';
  }
}
else {
  //include 'main.php';
}