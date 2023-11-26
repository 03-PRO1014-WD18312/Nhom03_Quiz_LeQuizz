<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>LIST EXAMS</div>
                </div>
            </div>
        </div>

        <form action="index.php?act=listExams" method="post">
            <input type="text" name="key">
            <select name="search">
                <option value="0" selected>ALL SUBJECTS</option>
                <?php
                    foreach ($listSubject as $subject) {
                    extract($subject);
                    echo '<option value="'.$id_subject.'">'.$name_subject.'</option>';      
                }
                ?>
            </select>
            <input type="submit" name="listChecked" value="GO">
        </form>

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
                                <th class="text-left pl-4">NAME SUBJECT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listExam as $exam) {
                                extract($exam);
                                $updateOneExam = "index.php?act=updateOneExam&id_exam=" . $id_exam;
                                $deleteExams = "index.php?act=deleteExams&id_exam=" . $id_exam;

                                echo '<tr>
                                        <td class="text-left pl-4">' . $id_exam . '</td>
                                        <td class="text-left pl-4">' . $exam_title . '</td>
                                        <td class="text-left pl-4">' . $exam_description . '</td>
                                        <td class="text-left pl-4">' . $exam_time_limit . '</td>
                                        <td class="text-left pl-4">' . $exam_limit_quest . '</td>';

                                foreach ($listSubject as $subject) {
                                    extract($subject);
                                    if ($exam['id_subject'] == $id_subject) {
                                        echo '<td class="text-left pl-4">' . $name_subject . '</td>';
                                    }
                                }

                                echo '<td class="text-left pl-4"><a href="' . $updateOneExam . '"><input type="button" value="DO TEST"></a>
                                        <a href="' . $deleteExams . '"><input type="button" value="CHECK STATUS"></a></td>
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
</div>