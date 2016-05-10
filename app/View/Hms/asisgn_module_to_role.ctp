<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>

<form method="post" >
<center>
<select class="span4 m-wrap" name="r_name" onchange="role_fetch_privilages(this.value)">
	<option value="" style="display:none;">--Select a role--</option>
	<?php
	foreach ($result_role as $collection) 
	{
	$role_name = $collection['role']['role_name'];
	$role_id=$collection['role']['role_id'];
	?>
	<option value="<?php echo $role_id; ?>"><?php echo $role_name; ?></option>
	<?php } ?>
</select>
</center>
<div id="ajax_contant" style="background-color:#FFF; padding: 5px;"></div>
</form>


<script>
function role_fetch_privilages(role_id)
{
	$(document).ready(function() {
		$("#ajax_contant").html('<div align="center"><img src="<?php echo $this->webroot ; ?>/as/windows.gif"/></div>').load('assign_modules_to_role_ajax/'+role_id);				
	});
}
</script>















