<center>
<a href="<?php echo $webroot_path; ?>Hms/create_login" class="btn blue">Create Login</a>
<a href="<?php echo $webroot_path; ?>Hms/hm_create_role" class="btn red">Create Role</a>
<a href="<?php echo $webroot_path; ?>Hms/assign_module_to_role_hm" class="btn blue">Assign Module to Role</a>
<a href="<?php echo $webroot_path; ?>Hms/asign_role_to_user" class="btn blue">Assign Role to Users</a>
<center>
<br>


<form method="post">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Create Role</h4>
</div>
<div class="portlet-body form">
<div class="row-fluid">
<div class="span6">

<label style="font-size:14px;">Role Name<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" name="role" id="role" class="m-wrap span9"><br>
<span id="rol" style="color:red; margin-left:5px;"></span>
</div>

</div>
<div class="span6">
<table class="table table-bordered table-stripped ">
<tr>
<th> #</th>
<th>Role Name</th>
</tr>
<?php
$ii = 0;
foreach($result_hms_role as $data)
{
$ii++;
$role_name = $data['hms_role']['role_name'];	
?>
<tr>
<td><?php echo $ii; ?></td>
<td><?php echo $role_name; ?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
<div class="form-actions">
<button type="submit" class="btn blue" id="submit" name="sub">Submit</button>
<button type="button" class="btn">Cancel</button>
</div>
</div>
</div>
</form>

<script>
$(document).ready(function(){
$("#submit").bind('click',function(){

var role = $("#role").val();
if(role == "")
{
$("#rol").html('Role Name is Required');
return false;	
}
else
{
$("#rol").html('');	
}
});
});
</script>




             