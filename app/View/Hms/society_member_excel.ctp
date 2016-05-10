

<?php 
foreach ($result_society as $collection){ 
	$society_name=$collection['society']['society_name'];
}
?>
<div class="portlet box">
	<div class="portlet-body">
		<table class="table table-condensed table-bordered" border="1" >
			<thead>
				<tr>
					<th>Sr.</th>
					<th>User Name</th>
					<th>unit</th>
					<th>Roles</th>
					<th>Email</th>
					<th>Mobile</th>
					
					<th>Portal Enrollment date</th>
					
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
					$q=0;
					foreach($wing_flats as $user_flat_id=>$wing_flat){ $q++; 
					if($q==1){?>
						<tr>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $sr_no; ?></td>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $user_name; ?></td>
							<td><?php echo $wing_flat; ?></td>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $roles; ?></td>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $email; ?></td>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $mobile; ?></td>
							
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $date; ?></td>
							
						</tr>
					<?php }else{ ?>
						<tr>
							<td><?php echo $wing_flat; ?></td>
							
						</tr>
					<?php } ?>
					
					<?php } 
				}else{ ?>
					<tr>
						<td><?php echo $sr_no; ?></td>
						<td><?php echo $user_name; ?></td>
						<td></td>
						<td><?php echo $roles; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $mobile; ?></td>
						
						<td><?php echo $date; ?></td>
						
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>