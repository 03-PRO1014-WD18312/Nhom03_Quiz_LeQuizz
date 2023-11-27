<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Chi tiết môn học</h1>
        </div>
    </div>

    <div class="row">
        <?php
        echo "<h3>Môn: " . $loadOneSubject['name_subject'] . "</h3>";
        ?>

        <!-- listExamsBySubject -->
        <?php
        foreach ($listExamsBySubject as $key => $value) {
            echo "<div class='col-12'>";
            echo "<h4>Đề: " . $value['exam_title'] . "</h4>";
            echo "<p>Thời gian làm bài: " . $value['exam_time_limit'] . " phút</p>";
            echo "<p>Số lượng câu hỏi: " . $value['exam_limit_quest'] . "</p>";
            echo "<p>Mô tả: " . $value['exam_description'] . "</p>";
            echo "<a href='index.php?act=doExam&id=" . $value['id_exam'] . "' class='btn btn-primary'>Làm bài</a>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="row">
        <div class="col-12 mt-3">
            <a href="index.php" class="btn btn-primary">Trang chủ</a>
            <a href="index.php?act=registSubject" class="btn btn-primary">Quay lại</a>
            <a href="index.php?act=registerSubject&id=<?php echo $loadOneSubject['id_subject']; ?>" class="btn btn-primary">Đăng ký môn học</a>
        </div>
    </div>
</div>