<?php
include 'db_connect.php';
$qry = $conn->query("SELECT r.*,concat(s.firstname,' ',s.middlename,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class,s.gender FROM results r inner join classes c on c.id = r.class_id inner join students s on s.id = r.student_id where r.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
    $$k = $v;
}

// Function to convert marks to grade points
function getGradePoint($mark) {
    if ($mark >= 90) return 10;
    if ($mark >= 80) return 9;
    if ($mark >= 70) return 8;
    if ($mark >= 60) return 7;
    if ($mark >= 50) return 6;
    if ($mark >= 40) return 5;
    return 0; // Fail
}

// Function to convert marks to grades
function getGrade($mark) {
    if ($mark >= 90) return 'O';
    if ($mark >= 80) return 'A+';
    if ($mark >= 70) return 'A';
    if ($mark >= 60) return 'B+';
    if ($mark >= 50) return 'B';
    if ($mark >= 40) return 'C';
    return 'F'; // Fail
}

$totalGradePoints = 0;
$numSubjects = 0;

?>
<div class="container-fluid" id="printable">
    <table width="100%">
        <tr>
            <td width="50%">Student ID #: <b><?php echo $student_code ?></b></td>
            <td width="50%">Class: <b><?php echo $class ?></b></td>
        </tr>
        <tr>
            <td width="50%">Student Name: <b><?php echo ucwords($name) ?></b></td>
            <td width="50%">Gender: <b><?php echo ucwords($gender) ?></b></td>
        </tr>
    </table>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject</th>
                <th>Mark</th>
                <th>Grade Point</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $items=$conn->query("SELECT r.*,s.subject_code,s.subject FROM result_items r inner join subjects s on s.id = r.subject_id where result_id = $id  order by s.subject_code asc");
                while($row = $items->fetch_assoc()):
                    $gradePoint = getGradePoint($row['mark']);
                    $grade = getGrade($row['mark']);
                    $totalGradePoints += $gradePoint;
                    $numSubjects++;
            ?>
            <tr>
                <td><?php echo $row['subject_code'] ?></td>
                <td><?php echo ucwords($row['subject']) ?></td>
                <td class="text-center"><?php echo number_format($row['mark']) ?></td>
                <td class="text-center"><?php echo $gradePoint ?></td>
                <td class="text-center"><?php echo $grade ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">CGPA</th>
                <th class="text-center">
                    <?php 
                        $cgpa = $numSubjects > 0 ? $totalGradePoints / $numSubjects : 0;
                        echo number_format($cgpa, 2);
                    ?>
                </th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-success" id="print" style="background: #097969;"><i class="fa fa-print"></i> Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: #000000;">Close</button>
</div>
<style>
    #uni_modal .modal-footer{
        display: none
    }
    #uni_modal .modal-footer.display{
        display: flex
    }
</style>
<noscript>
    <style>
        table.table{
            width:100%;
            border-collapse: collapse;
        }
        table.table tr,table.table th, table.table td{
            border:1px solid;
        }
        .text-cnter{
            text-align: center;
        }
    </style>
    <h3 class="text-center"><b>Student Result</b></h3>
</noscript>
<script>
    $('#print').click(function(){
        start_load()
        var ns = $('noscript').clone()
        var content = $('#printable').clone()
        ns.append(content)
        var nw = window.open('','','height=700,width=900')
        nw.document.write(ns.html())
        nw.document.close()
        nw.print()
        setTimeout(function(){
            nw.close()
            end_load()
        },750)
    })
</script>
