<div class="col-md-10">
    <form method="post" id="">
        <input type="hidden" name="examAction" id="examAction">
        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
            <div class="card-body">
                <div class="scroll-area-sm" style="min-height: 400px;">
                    <div class="scrollbar-container">
                        <table>
                            <?php
                                foreach ($listAllQuest as $question) {
                                    extract($question);
                                                
                            ?>
                            <tr><?php echo $title_question;  ?></tr>
                            <ul>
                                <li><?php echo $choice1_question; ?></li>
                                <li><?php echo $choice2_question; ?></li>
                                <li><?php echo $choice3_question; ?></li>
                                <li><?php echo $choice4_question; ?></li>
                            </ul>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>

        </table>

    </form>
</div>