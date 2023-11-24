<div class="col-md-10">
    <div id="refreshData">
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Information
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?act=addExams" id="updateExamFrm">
                            <div class="form-group">
                                <label>Subjects</label>
                                <select class="form-control" name="subjectId" required="">
                                    <?php
                                        foreach ($listSubject as $subject) {
                                            extract($subject);
                                            echo '<option value="'.$id_subject.'">'.$name_subject.'';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Exam Title</label>
                                <input type="" name="examTitle" class="form-control" required="" value="">
                            </div>

                            <div class="form-group">
                                <label>Exam Description</label>
                                <input type="" name="examDesc" class="form-control" required="" value="">
                            </div>

                            <div class="form-group">
                                <label>Exam Time limit</label>
                                <select class="form-control" name="examTimeLimit" required="">
                                    <option value=""> Minutes</option>
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
                                <input type="number" name="examLimitQuest" class="form-control" value="">
                            </div>

                            <div class="form-group" align="right">
                                <input type="submit" class="btn btn-primary btn-lg" name="addExam" value="ADD">
                            </div>
                        </form>
                    </div>
                </div>