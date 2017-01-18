<table class="table table-condensed table-bordered dataTable">
<thead>
<tr>
 <th>Sr no.</th>
 <th>User Name</th>
 <th>Unit </th>
 <th>Roles </th>
 <th>Email</th>
 <th>Mobile</th>
 <th> Validation Status </th>
 <th>Society Name</th> 
</tr>
</thead>
<tbody>
<?php pr($arranged_users); if(sizeof(@$arranged_users)>0){ $i=0;
foreach($arranged_users as $data){ $i++;
$user_name=$data['user_name'];
$email=$data['email'];
$mobile=$data['mobile'];
$society_name=$data['society_name'];
$validation_status=$data['validation_status'];
$wing_flat=$data['wing_flat'];
$user_flat_id=$data['user_flat_id'];
$roles=$data['roles'];
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $user_name; ?></td>
<td><?php echo @$wing_flat[$user_flat_id]; ?></td>
<td><?php echo $roles; ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $mobile; ?></td>
<td><?php  ?></td>
<td><?php echo $society_name; ?></td>
</tr>
<?php } } if(sizeof(@$result_user)==0){ ?> <tr><td colspan="8"> No matching records found</td></tr> <?php } ?>
</tbody>
</table>