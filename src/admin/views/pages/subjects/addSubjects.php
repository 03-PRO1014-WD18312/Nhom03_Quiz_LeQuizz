<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div> ADD SUBJECTS
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div id="refreshData">
                <div class="row">
                    <div class="col-md-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <form action="index.php?act=addSubjects" method="POST" id="addSubjectsFrm">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="nameSubject" class="form-control">
                                    </div>
                                    <div class="form-group" align="right">
                                        <input type="submit" class="btn btn-primary btn-lg" name="addSubject"
                                            value="Add Subject">
                                    </div>
                                    <div>
                                        <?php
                                             if (isset($notification) && ($notification != "")) {
                                                echo $notification;
                                            }
                                        ?>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>