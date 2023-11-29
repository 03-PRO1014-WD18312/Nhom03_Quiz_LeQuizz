<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <p>Chào mừng bạn đến với Le_Quizz!</p>
                <p>
                    <a class="btn btn-primary btn-lg" href="index.php?act=registSubject" role="button">Đăng ký môn học</a>
                </p>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-6">
            <h3 class="">Danh sách môn học</h3>
        </div>

        <div class="col-6">
            <form action="index.php?act=listExams" method="post" class="d-flex">
                <select class="form-select form-select-sm mr-3" aria-label="Default select example" name="search">
                    <option value="0" selected>All Subject</option>
                    <?php
                    foreach ($listSubject as $subject) {
                        extract($subject);
                        echo '<option value="' . $id_subject . '">' . $name_subject . '</option>';
                    }
                    ?>
                </select>
                <input class="form-control mr-3" type="text" placeholder="Search" name="key">
                <input class="btn btn-outline-success" type="submit" name="listChecked" value="Search">
            </form>
        </div>
    </div>

    <div class="row">
        <?php
        foreach ($listSubject as $subject) {
            extract($subject);
            echo '<div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <p class="card-text">' . $name_subject . '</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="index.php?act=detailSubject&id=' . $id_subject . '"><button type="button" class="btn btn-sm btn-primary mr-3">Xem chi tiết</button></a>
                                    <a href="index.php?act=registerSubject&id=' . $id_subject . '"><button type="button" class="btn btn-sm btn-primary">Đăng ký</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>