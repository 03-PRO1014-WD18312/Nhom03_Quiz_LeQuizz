<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div> MANAGE EXAM
                        <div class="page-title-subheading">
                            Add Question for
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
                                <form method="post" id="updateExamFrm">
                                    <div class="form-group">
                                        <label>Subjects</label>
                                        <select class="form-control" name="subjectId" required="">
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Exam Title</label>
                                        <input type="hidden" name="examId" value="">
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
                                        <button type="submit" class="btn btn-primary btn-lg">Update</button>
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