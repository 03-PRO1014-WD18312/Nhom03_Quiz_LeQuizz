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