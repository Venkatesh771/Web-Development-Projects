<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary" style="border-top: 0; background: #e0e0e0; border-radius: 20px; box-shadow: 15px 15px 30px #bebebe,-15px -15px 30px #ffffff; padding: 20px;">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary " href="./index2.php?page=new_student" style="background: #097969; border: 0; color: #ffffff;"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Student ID</th>
						<th>Name</th>
						<th>Class</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT s.*,concat(c.level,'-',c.section) as class,concat(firstname,' ',middlename,' ',lastname) as name FROM students s inner join classes c on c.id = s.class_id order by concat(firstname,' ',middlename,' ',lastname) asc  ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<td class="text-center" style="border: 0.5px solid #808080;"><?php echo $i++ ?></td>
						<td style="border: 0.5px solid #808080;"><b><?php echo $row['student_code'] ?></b></td>
						<td style="border: 0.5px solid #808080;"><b><?php echo ucwords($row['name']) ?></b></td>
						<td style="border: 0.5px solid #808080;"><b><?php echo ucwords($row['class']) ?></b></td>
						<td class="text-center" style="border: 0.5px solid #808080;">
		                    <div class="btn-group">
		                        <a href="index2.php?page=edit_student&id=<?php echo $row['id'] ?>" style="background: #097969; border: 0;" class="btn btn-primary btn-flat">
		                          <i class="fas fa-pen"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_student" data-id="<?php echo $row['id'] ?>" style="background: #E0115F; border: 0;">
		                          <i class="fas fa-times-circle"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.view_student').click(function(){
			uni_modal("Student's Details","view_student.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_student').click(function(){
	_conf("Are you sure to delete this Student?","delete_student",[$(this).attr('data-id')])
	})
	})
	function delete_student($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_student',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>