<span class="label label-important">NOTE</span>
<span> No need to save this form. The system will automatically save updated data. </span>

<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th>Role Name</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
									                     
<?php

foreach ($result_role as $collection){
	
	$role_id=(int)$collection['role']["role_id"];
	$role_name=$collection['role']["role_name"];
	$c_n=$this->requestAction(array('controller' => 'hms', 'action' => 'user_role'),array('pass'=>array($role_id,$user_id)));
		if($role_id!=3 and $role_id!=4 and $role_id!=5 and $role_id!=6 ){ 
		?>
			<tr>
				<td ><?php echo $role_name; ?></td>
				<td>
						<input type="checkbox" <?php if($c_n>0) { ?>checked="checked" <?php } ?>  name="role[]" value="<?php echo $role_id; ?>" class="role_assign" />
				</td>
			</tr>
		<?php
		}
}
?>

	
    </tbody>
</table>  
