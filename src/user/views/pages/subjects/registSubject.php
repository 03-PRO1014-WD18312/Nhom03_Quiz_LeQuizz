<h1 class="text-center">Danh sách môn học</h1>

<div class="row">

    <?php
    foreach ($listSubject as $subject) {
        extract($subject);

        echo '
        <div class="card col-3" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">' . $name_subject . '</h5>
        <p class="card-text"></p>
        <a href="index.php?act=detailSubject?id=' . $id_subject . '" class="btn btn-primary">Xem chi tiết</a>
        </div>
        </div>';
    }
    ?>

</div>