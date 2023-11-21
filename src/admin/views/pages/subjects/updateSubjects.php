<?php
if (is_array($loadOne)) {
    extract($loadOne);
}
?>

<div class="app-main__outer col-10">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div> UPDATE SUBJECTS
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
                                <form action="index.php?act=updateSubjects" method="POST" id="addSubjectsFrm">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="nameSubject" class="form-control" value="<?php if (isset($name_subject) && ($name_subject != "")) echo $name_subject; ?>">
                                    </div>
                                    <div class="form-group" align="right">
                                        <input type="hidden" name="idSubject" value="<?php if (isset($id_subject) && ($id_subject > 0)) echo $id_subject ?>">
                                        <input type="submit" class="btn btn-primary btn-lg" name="updateSubject" value="Update Subject">
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