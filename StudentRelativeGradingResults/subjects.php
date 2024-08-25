<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary" style="border-top: 0; background: #e0e0e0; border-radius: 20px; box-shadow: 15px 15px 30px #bebebe,-15px -15px 30px #ffffff; padding: 20px;">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_subject" href="javascript:void(0)" style="background: #097969; border: 0; color: #ffffff;"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="10%">
					<col width="20%">
					<col width="20%">
					<col width="30%">
					<col width="20%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Code</th>
						<th>Subjects</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM subjects order by unix_timestamp(date_created) desc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center" style="border: 0.5px solid #808080;"><?php echo $i++ ?></th>
						<td style="border: 0.5px solid #808080;"><b><?php echo ucwords($row['subject_code']) ?></b></td>
						<td style="border: 0.5px solid #808080;"><b><?php echo ucwords($row['subject']) ?></b></td>
						<td style="border: 0.5px solid #808080;"><p class=""><?php echo $row['description'] ?></p></td>
						<td class="text-center" style="border: 0.5px solid #808080;">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' style="background: #097969; border: 0;" class="btn btn-primary btn-flat manage_subject">
		                          <i class="fas fa-pen"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_subject" data-id="<?php echo $row['id'] ?>" style="background: #E0115F; border: 0;">
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
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.new_subject').click(function(){
			uni_modal("New Subject","manage_subject.php")
		})
		$('.manage_subject').click(function(){
			uni_modal("Manage Subject","manage_subject.php?id="+$(this).attr('data-id'))
		})
	$('.delete_subject').click(function(){
	_conf("Are you sure to delete this Subject?","delete_subject",[$(this).attr('data-id')])
	})
	})
	function delete_subject($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_subject',
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