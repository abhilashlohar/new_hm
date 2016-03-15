<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div class="portlet box">
	<div class="portlet-body">
		<table class="table table-condensed table-bordered table-hover" >
			<thead>
				<tr>
					<th>Sr.</th>
					<th>User Name</th>
					<th>unit</th>
					<th>Roles</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Validation Status</th>
					<th>Portal Enrollment date</th>
					<th>Exit</th>
				</tr>
			</thead>
			<tbody>
			<?php $sr_no=0;
			foreach($arranged_users as $user_id=>$user_info){ $sr_no++;
				$user_name=$user_info["user_name"];
				$user_flat_id=$user_info["user_flat_id"];
				$wing_flats=$user_info["wing_flat"];
				$roles=$user_info["roles"];
				$email=$user_info["email"];
				$mobile=$user_info["mobile"];
				$validation_status=$user_info["validation_status"];
				$date=$user_info["date"];
				if(sizeof($wing_flats)>0){
					foreach($wing_flats as $wing_flat){ ?>
					<tr>
						<td><?php echo $sr_no; ?></td>
						<td><?php echo $user_name; ?></td>
						<td><?php echo $wing_flat; ?></td>
						<td><?php echo $roles; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $mobile; ?></td>
						<?php if(empty($validation_status)){
							echo '<td><a href="#" role="button" class="resend" id="14"> Send Reminder</a></td>';
						}else{
							echo '<td>'.$validation_status.'</td>';
						} ?>
						<td><?php echo $date; ?></td>
						<td><a href="#" role="button" class="btn red mini exit" user_flat_id="<?php echo $user_flat_id; ?>"><i class=" icon-exclamation-sign"></i> Exit</a></td>
					</tr>
					<?php } 
				}else{ ?>
					<tr>
						<td><?php echo $sr_no; ?></td>
						<td><?php echo $user_name; ?></td>
						<td></td>
						<td><?php echo $roles; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $mobile; ?></td>
						<?php if(empty($validation_status)){
							echo '<td><a href="#" role="button" class="resend" id="14"> Send Reminder</a></td>';
						}else{
							echo '<td>'.$validation_status.'</td>';
						} ?>
						<td><?php echo $date; ?></td>
						<td><a href="#" role="button" class="btn red mini exit" user_flat_id="<?php echo $user_flat_id; ?>"><i class=" icon-exclamation-sign"></i> Exit</a></td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div id="confirm" style="display:none;">
	<div class="modal-backdrop fade in"></div>
	<div style="display: block;" class="modal hide fade in" >
		<div class="modal-body">
			<p>Confirm Message</p>
		</div>
		<div class="modal-footer">
			<button class="btn" id="close">Close</button>
			<button class="btn blue" id="exit_user" user_flat_id="0">Confirm</button>
		</div>
	</div>
</div>
<div id="success" style="display:none;">

</div>
<script>
$(document).ready(function(){
	$(".exit").on("click",function(){
		$("#confirm").show();
		var user_flat_id=$(this).attr("user_flat_id");
		$("#exit_user").attr("user_flat_id",user_flat_id);
	});
	$("#close").die().live("click",function(){
		$("#confirm").hide();
		$("#success").hide();
	});
	$("#exit_user").on("click",function(){
		var user_flat_id=$(this).attr("user_flat_id");
		$.ajax({
			url: "exit_user/"+user_flat_id,
		}).done(function(response){
			$("#confirm").hide();
			$("#success").html(response);
			$("#success").show();
			$("body").find(".exit[user_flat_id="+user_flat_id+"]").closest("td").html("exited");
		});
	});
});
</script>