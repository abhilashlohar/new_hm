<form method="post">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block"><i class="icon-reorder"></i>Validation States</h4>
</div>
<div class="portlet-body form">

<label style="font-size:14px;">Select Society</label>
<div class="controls">
<select class="m-wrap span6" data-placeholder="Choose A Role" onchange="show_user_drop_down(this.value)" name="role_name">
<option value="">Select Society</option>
<?php 
foreach($result_society as $data)
{
$society_id = (int)$data['society']['society_id'];		
$society_name = $data['society']['society_name'];	
?>
<option value="<?php echo $society_id; ?>"><?php echo $society_name; ?></option>
<?php
}
?>
</select>
</div>
<br>



<label style="font-size:14px;">Select User</label>
<div class="controls">
<select class="m-wrap span6" data-placeholder="Choose A Role" onchange="show_user_drop_down(this.value)" name="role_name">
<option value="">Select User</option>
<?php 
foreach($result_user as $data)
{
$user_id = (int)$data['user']['user_id'];		
$user_name = $data['user']['user_name'];	
?>
<option value="<?php echo $user_id; ?>"><?php echo $user_name; ?></option>
<?php
}
?>
</select>
</div>
<br>


<label style="font-size:14px;">Select Role</label>
<div class="controls">
<select class="m-wrap span6" data-placeholder="Choose A Role" onchange="assign_module_ajax(this.value)" name="role_name">
<option value="">Select Role</option>
<?php 
foreach($result_hm_role as $data)
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
                          
<div class="form-actions">
<button type="submit" class="btn blue">Submit</button>
<button type="button" class="btn">Cancel</button>
</div>
</div>
</div>
</form>
