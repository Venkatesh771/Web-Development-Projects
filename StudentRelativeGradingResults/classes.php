<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary" style="border-top: 0; background: #e0e0e0; border-radius: 20px; box-shadow: 15px 15px 30px #bebebe,-15px -15px 30px #ffffff; padding: 20px;">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_class" href="javascript:void(0)" style="background: #097969; border: 0; color: #ffffff;"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body" style="border-radius: 15px;">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="20%">
					<col width="60%">
					<col width="20%">
				</colgroup>
				<thead>
					<tr style="border: 0.5px solid #808080;">
						<th class="text-center">#</th>
						<th>Level</th>
						<th>Section</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM classes order by level asc, section asc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center" style="border: 0.5px solid #808080;"><?php echo $i++ ?></th>
						<td style="border: 0.5px solid #808080;"><b><?php echo $row['level'] ?></b></td>
						<td style="border: 0.5px solid #808080;"><b><?php echo $row['section'] ?></b></td>
						<td style="border: 0.5px solid #808080;" class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' style="background: #097969; border: 0;" class="btn btn-primary btn-flat manage_class">
		                          <i class="fas fa-pen"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_class" data-id="<?php echo $row['id'] ?>" style="background: #E0115F; border: 0;">
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
		$('.new_class').click(function(){
			uni_modal("New class","manage_class.php")
		})
		$('.manage_class').click(function(){
			uni_modal("Manage class","manage_class.php?id="+$(this).attr('data-id'))
		})
	$('.delete_class').click(function(){
	_conf("Are you sure to delete this class?","delete_class",[$(this).attr('data-id')])
	})
	})
	function delete_class($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_class',
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