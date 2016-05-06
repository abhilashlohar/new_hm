<center>
<a href="<?php echo $webroot_path; ?>Hms/create_login" class="btn blue">Create Login</a>
<a href="<?php echo $webroot_path; ?>Hms/hm_create_role" class="btn blue">Create Role</a>
<a href="<?php echo $webroot_path; ?>Hms/assign_module_to_role_hm" class="btn red">Assign Module to Role</a>
</center>
<br>

<form method="post">
<label style="font-size:14px;">Select Role</label>
<div class="controls">
<select class="m-wrap span6" data-placeholder="Choose A Role" onchange="assign_module_ajax(this.value)" name="role_name">
<option value="">Select Role</option>
<?php 
foreach($result_hms_role as $data)
{
$role_id = (int)$data['hms_role']['auto_id'];		
$role_name = $data['hms_role']['role_name'];	
?>
<option value="<?php echo $role_id; ?>"><?php echo $role_name; ?></option>
<?php
}
?>
</select>
</div>
<br>
<div id="ajax_content"></div>
</form>
<script>
function assign_module_ajax(vv)
{
$(document).ready(function() {
$("#ajax_content").html('<div align="center"><img src="<?php echo $this->webroot ; ?>/as/windows.gif"/></div>').load('assign_modules_to_role_ajax_hm?con=' + vv);				
});
}
</script>