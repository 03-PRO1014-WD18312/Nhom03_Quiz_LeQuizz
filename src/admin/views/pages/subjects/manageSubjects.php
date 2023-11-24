<div class="app-main__outer col-10">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE SUBJECTS</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Subjects List
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th class="text-left pl-4">SUBJECTS ID</th>
                                <th class="text-center" width="20%">SUBJECTS NAME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listSubject as $subject) {
                                extract($subject);
                                $updateOneSubject = "index.php?act=updateOneSubject&id_subject=" . $id_subject;
                                $deleteSubjects = "index.php?act=deleteSubjects&id_subject=" . $id_subject;

                                echo '<tr>
                                        <td class="text-left pl-4">' . $id_subject . '</td>
                                        <td class="text-center">' . $name_subject . '</td>
                                        <td class="text-right pl-4">
                                            <a href="' . $updateOneSubject . '"><input type="button" value="UPDATE"></a>
                                            <a href="' . $deleteSubjects . '"><input type="button" value="DELETE"></a>
                                        </td>
                                    </tr>';
                            }


                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>