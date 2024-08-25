<?php include 'db_connect.php' ?>

<div class="col-lg-12">
    <div class="card card-outline card-primary" style="border-top: 0; background: #e0e0e0; border-radius: 20px; box-shadow: 15px 15px 30px #bebebe, -15px -15px 30px #ffffff; padding: 20px; margin-top: 50px;">
        <?php if (!isset($_SESSION['rs_id'])): ?>
            <div class="card-header">
                <div class="card-tools">
                    <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index2.php?page=new_result" style="background: #097969; border: 0; color: #ffffff;"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <table class="table tabe-hover table-bordered" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="25%">
                    <col width="20%">
                    <col width="10%">
                    <col width="10%">
                    <col width="15%">
                </colgroup>
                <thead>
                    <tr style="text-align: center;">
                        <th class="text-center">#</th>
                        <th>ID#</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Subjects</th>
                        <th>CGPA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $where = "";
                    if (isset($_SESSION['rs_id'])) {
                        $where = " where r.student_id = {$_SESSION['rs_id']} ";
                    }
                    $qry = $conn->query("SELECT r.*,concat(s.firstname,' ',s.middlename,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class FROM results r inner join classes c on c.id = r.class_id inner join students s on s.id = r.student_id $where order by unix_timestamp(r.date_created) desc ");
                    while ($row = $qry->fetch_assoc()):
                        $subjects = $conn->query("SELECT * FROM result_items where result_id =" . $row['id'])->num_rows;

                        // Calculate CGPA
                        $totalGradePoints = 0;
                        $numSubjects = 0;
                        $items = $conn->query("SELECT r.*, s.subject_code, s.subject FROM result_items r inner join subjects s on s.id = r.subject_id where result_id = " . $row['id']);
                        while ($item = $items->fetch_assoc()) {
                            $mark = $item['mark'];
                            $gradePoint = 0;
                            if ($mark >= 90) $gradePoint = 10;
                            elseif ($mark >= 80) $gradePoint = 9;
                            elseif ($mark >= 70) $gradePoint = 8;
                            elseif ($mark >= 60) $gradePoint = 7;
                            elseif ($mark >= 50) $gradePoint = 6;
                            elseif ($mark >= 40) $gradePoint = 5;
                            else $gradePoint = 0; // Fail
                            $totalGradePoints += $gradePoint;
                            $numSubjects++;
                        }
                        $cgpa = $numSubjects > 0 ? $totalGradePoints / $numSubjects : 0;
                    ?>
                    <tr>
                        <th class="text-center" style="border: 0.5px solid #808080;"><?php echo $i++ ?></th>
                        <td style="border: 0.5px solid #808080;" class="text-center"><b><?php echo $row['student_code'] ?></b></td>
                        <td style="border: 0.5px solid #808080;" class="text-center"><b><?php echo ucwords($row['name']) ?></b></td>
                        <td style="border: 0.5px solid #808080;" class="text-center"><b><?php echo ucwords($row['class']) ?></b></td>
                        <td style="border: 0.5px solid #808080;" class="text-center"><b><?php echo $subjects ?></b></td>
                        <td style="border: 0.5px solid #808080;" class="text-center"><b><?php echo number_format($cgpa, 2) ?></b></td>
                        <td style="border: 0.5px solid #808080;" class="text-center">
                            <?php if (isset($_SESSION['login_id'])): ?>
                                <div class="btn-group">
                                    <a href="./index2.php?page=edit_result&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat" style="background: #097969; border: 0;">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button data-id="<?php echo $row['id'] ?>" type="button" class="btn btn-info btn-flat view_result" style="border: 0;">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-flat delete_result" data-id="<?php echo $row['id'] ?>" style="background: #E0115F; border: 0;">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </div>
                            <?php elseif (isset($_SESSION['rs_id'])): ?>
                                <button data-id="<?php echo $row['id'] ?>" type="button" class="btn btn-info btn-flat view_result" style="border: 0;">
                                    <i class="fas fa-eye"></i> View Results
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for viewing results -->
<div class="modal fade" id="uni_modal" tabindex="-1" role="dialog" aria-labelledby="uni_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uni_modal_label">Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- The result will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#list').dataTable();

        $('.view_result').click(function(){
            var result_id = $(this).attr('data-id');
            $.ajax({
                url: 'view_result.php', // Path to your view_result.php file
                method: 'GET',
                data: {id: result_id},
                success: function(response){
                    $('#uni_modal .modal-body').html(response);
                    $('#uni_modal').modal('show');
                },
                error: function(){
                    alert('An error occurred while fetching the result.');
                }
            });
        });

        $('.delete_result').click(function(){
            var result_id = $(this).attr('data-id');
            if (confirm("Are you sure to delete this result?")) {
                $.ajax({
                    url: 'ajax.php?action=delete_result',
                    method: 'POST',
                    data: {id: result_id},
                    success: function(response){
                        if (response == 1) {
                            alert("Data successfully deleted");
                            location.reload();
                        }
                    }
                });
            }
        });
    });
</script>
