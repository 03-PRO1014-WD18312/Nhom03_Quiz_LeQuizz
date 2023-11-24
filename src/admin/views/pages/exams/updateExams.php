<?php
    if (is_array($loadOne)) {
        extract($loadOne);
    }
?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div> MANAGE EXAM
                        <div class="page-title-subheading">
                            Add Question for <?php echo $exam_title ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div id="refreshData">
                <div class="row">
                    <div class="col-md-6">
                        <div class="main-card mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Information
                            </div>
                            <div class="card-body">
                                <form method="post" id="updateExamFrm" action="index.php?act=updateExams">
                                    <div class="form-group">
                                        <label>Subjects</label>
                                        <select class="form-control" name="subjectId" required="">
                                            <?php
                                        foreach ($listSubject as $subject) {
                                            extract($subject);
                                            if ($idSubject == $id_subject) {
                                                echo '<option value="'.$id_subject.'" selected>'.$name_subject.'';   
                                            }
                                            else {
                                                echo '<option value="'.$id_subject.'">'.$name_subject.'';
                                            }
                                        }
                                    ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Exam Title</label>
                                        <input type="text" name="examTitle" class="form-control" required=""
                                            value="<?php echo $exam_title?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Exam Description</label>
                                        <input type="text" name="examDesc" class="form-control" required=""
                                            value="<?php echo $exam_description?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Exam Time limit</label>
                                        <select class="form-control" name="examTimeLimit" required="">
                                            <option value="<?php echo $exam_time_limit?>"><?php echo $exam_time_limit?>
                                                Minutes</option>
                                            <option value="10">10 Minutes</option>
                                            <option value="20">20 Minutes</option>
                                            <option value="30">30 Minutes</option>
                                            <option value="40">40 Minutes</option>
                                            <option value="50">50 Minutes</option>
                                            <option value="60">60 Minutes</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Display limit</label>
                                        <input type="number" name="examLimitQuest" class="form-control"
                                            value="<?php echo $exam_limit_quest?>">
                                    </div>

                                    <div class="form-group" align="right">
                                        <input type="hidden" name="idExam" value="<?php echo $id_exam ?>">
                                        <input type="submit" name="updateExam" class="btn btn-primary btn-lg"
                                            value="UPDATE">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="main-card mb-3 card">
                            <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate">
                                </i>Exam Question's
                                <span class="badge badge-pill badge-primary ml-2">
                                </span>
                                <div class="btn-actions-pane-right">
                                    <button class="btn btn-sm btn-primary " data-toggle="modal"
                                        data-target="#modalForAddQuestion">Add Question</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="scroll-area-sm" style="min-height: 400px;">
                                    <div class="scrollbar-container">


                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>