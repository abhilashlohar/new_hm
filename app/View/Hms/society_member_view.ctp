<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div class="portlet box">
	<div class="portlet-body">
		<table class="table table-condensed table-bordered table-hover" id="sample_1">
			<thead>
				<tr>
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
			<?php foreach($arranged_users as $user_id=>$user_info){ 
				$user_name=$user_info["user_name"];
				$wing_flats=$user_info["wing_flat"];
				$roles=$user_info["roles"];
				$email=$user_info["email"];
				$mobile=$user_info["mobile"];
				$validation_status=$user_info["validation_status"];
				$date=$user_info["date"];
				if(sizeof($wing_flats)>0){
					foreach($wing_flats as $wing_flat){ ?>
					<tr>
						<td><?php echo $user_name; ?></td>
						<td><?php echo $wing_flat; ?></td>
						<td><?php echo $roles; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $mobile; ?></td>
						<td><?php echo $validation_status; ?></td>
						<td><?php echo $date; ?></td>
						<td><?php echo $user_id; ?></td>
					</tr>
					<?php } 
				}else{ ?>
					<tr>
						<td><?php echo $user_name; ?></td>
						<td></td>
						<td><?php echo $roles; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $mobile; ?></td>
						<td><?php echo $validation_status; ?></td>
						<td><?php echo $date; ?></td>
						<td><?php echo $user_id; ?></td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
