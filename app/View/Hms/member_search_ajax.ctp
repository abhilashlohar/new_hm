<table class="table table-condensed table-bordered dataTable">
<thead>
<tr>
 <th>Sr no.</th>
 <th>User Name</th>
 <th>Unit </th>
 <th>Roles </th>
 <th>Email</th>
 <th>Mobile</th>
 <th>Status </th>
 <th>Society Name</th> 
</tr>
</thead>
<tbody>
<?php  if(sizeof(@$arranged_users)>0){  $sr_no=0; $i=0;
foreach($arranged_users as $data){ $i++;
$user_name=$data['user_name'];
$email=$data['email'];
$mobile=$data['mobile'];
$society_name=$data['society_name'];
$validation_status=$data['validation_status'];
$wing_flats=$data['wing_flat'];
$user_flat_id=$data['user_flat_id'];
$roles=$data['roles'];


if(sizeof($wing_flats)>0){
					$q=0;
					foreach($wing_flats as $user_flat_id=>$wing_flat){ $sr_no++; ?>
						<tr>
							<td><?php echo $sr_no;  ?></td>
							<td> <?php echo $user_name; ?> </td>
							<td><?php echo $wing_flat; ?></td>
							<td><?php echo $roles; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php echo $mobile; ?></td>
							<?php if(empty($validation_status)){
								if(!empty($email)){
									echo '<td> </td>'; 
								}elseif(!empty($mobile)){
									echo '<td>  </td>';
								}else{
									echo '<td></td>';
								}
							}else{
								echo '<td><a class="btn green mini">'.ucfirst($validation_status).'</a></td>';
							} ?>
							<td><?php echo $society_name; ?></td>
							
						</tr>
					<?php } 
				}else{ $sr_no++; ?>
					<tr>
							<td><?php echo $sr_no;  ?></td>
							<td> <?php echo $user_name; ?> </td>
							<td><?php echo @$wing_flat; ?></td>
							<td><?php echo $roles; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php echo $mobile; ?></td>
							<?php if(empty($validation_status)){
								if(!empty($email)){
									echo '<td>  </td>'; 
								}elseif(!empty($mobile)){
									echo '<td>  </td>';
								}else{
									echo '<td></td>';
								}
							}else{
								echo '<td><a class="btn green mini">'.ucfirst($validation_status).'</a></td>';
							} ?>
							<td><?php echo $society_name; ?></td>
							
					</tr>


				<?php } } } if(sizeof(@$arranged_users)==0){ ?> <tr><td colspan="8"> No matching records found</td></tr> <?php } ?>
</tbody>
</table>