<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Society Name</th> <th>User Name</th> <th>Email</th> <th>mobile</th>
</tr>
</thead>
<tbody>
<?php if(sizeof(@$result_user)>0){
foreach($result_user as $data){
$user_name=$data['user']['user_name'];
$email=$data['user']['email'];
$mobile=$data['user']['mobile'];
$society_id=@$data['user']['society_id'];
if(is_array($society_id)){
		$society_id=$society_id[0];
	}else{
		$society_id;
	}

$society_name=$this->requestAction(array('controller' => 'Fns', 'action' => 'society_name_via_society_id'), array('pass' => array($society_id)));
?>
<tr>
<td><?php echo $society_name; ?></td>
<td><?php echo $user_name; ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $mobile; ?></td>
</tr>
<?php } } if(sizeof(@$result_user)==0){ ?> <tr><td colspan="4"> No matching records found</td></tr> <?php } ?>
</tbody>
</table>