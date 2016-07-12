<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div style="overflow:auto;">
	<table class="table table-condensed table-bordered" id="sample_1"  >
			<thead>
				<tr>
					<th>Sr.</th>
					<th>User Name</th>
					<th >unit</th>
					<th>Designation </th>
					<th>Email</th>
					<th>Mobile</th>
				</tr>
			</thead>
			<tbody>
			  	<?php 
				$i=0;
				foreach($result_committee_member as $data){
					$i++;
					$user_name= $data['user_name'];
					$wing_flat= $data['wing_flat'];
					$email= $data['email'];
					$mobile= $data['mobile'];
					$designation_name= $data['designation_name'];
					
				?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td> <?php echo $user_name; ?> </td>
					<td> <?php echo $wing_flat; ?> </td>
					<td> <?php echo $designation_name; ?> </td>
					<td> <?php echo $email; ?> </td>
					<td> <?php echo $mobile; ?> </td>
				</tr>
				
				<?php } ?>
			</tbody>
	</table>
</div>	