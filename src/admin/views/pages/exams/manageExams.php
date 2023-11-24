<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE EXAMS</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Exams List
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th class="text-left pl-4">EXAMS ID</th>
                                <th class="text-left pl-4">EXAMS TITLE</th>
                                <th class="text-left pl-4">EXAMS DESCRIPTION</th>
                                <th class="text-left pl-4">EXAMS TIME LIMIT</th>
                                <th class="text-left pl-4">EXAMS QUESTS LIMIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($listExam as $exam) {
                                    extract($exam);
                                    $updateOneExam = "index.php?act=updateOneExam&id_exam=".$id_exam;
                                    $deleteExams = "index.php?act=deleteExams&id_exam=".$id_exam;
                                        
                                        echo '<tr>
                                        <td class="text-left pl-4">'.$id_exam.'</td>
                                        <td class="text-left pl-4">'.$exam_title.'</td>
                                        <td class="text-left pl-4">'.$exam_description.'</td>
                                        <td class="text-left pl-4">'.$exam_time_limit.'</td>
                                        <td class="text-left pl-4">'.$exam_limit_quest.'</td>
                                        <td class="text-left pl-4"><a href="'.$updateOneExam.'"><input type="button" value="UPDATE"></a>
                                        <a href="'.$deleteExams.'"><input type="button" value="DELETE"></a></td>
                                        <tr>';
                                    }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>