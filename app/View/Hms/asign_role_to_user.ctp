<center>
<a href="<?php echo $webroot_path; ?>Hms/create_login" class="btn blue">Create Login</a>
<a href="<?php echo $webroot_path; ?>Hms/hm_create_role" class="btn blue">Create Role</a>
<a href="<?php echo $webroot_path; ?>Hms/assign_module_to_role_hm" class="btn blue">Assign Module to Role</a>
<a href="<?php echo $webroot_path; ?>Hms/asign_role_to_user" class="btn red">Assign Role to Users</a>
</center>
<br>

<form method="post" id="contact-form">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block"><i class="icon-reorder"></i>Assign role to user</h4>
</div>
<div class="portlet-body form">










<label style="font-size:14px;">Select Society</label>
<div class="controls">
<select class="m-wrap span6" data-placeholder="Choose A Role" name="society" id="society">
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
<label id="society"></label>
</div>
<br>



<label style="font-size:14px;">Select User</label>
<div class="controls">
<select class="m-wrap span6" data-placeholder="Choose A Role" name="user" id="user">
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
<label id="user"></label>
</div>
<br>

<label style="font-size:14px;">Select Role</label>
<div class="controls">
<select class="m-wrap span6" data-placeholder="Choose A Role" name="role" id="role">
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
<label id="role"></label>
</div>
<br>

<table class="table table-condensed table-bordered">
	<tr>
		<th>User Name</th>
		<th>Society Name</th>
		<th>Role Name</th>
		<th></th>
	</tr>
<?php foreach($hms_rights_result as $data){
$user_id = (int)$data['hms_right']['user_id'];
$role_id = (int)$data['hms_right']['role_id'];
$society_id = (int)$data['hms_right']['society_id'];

	$result_user = $this->requestAction(array('controller'=>'Fns','action'=>'user_info_via_user_id'),array('pass'=>array($user_id)));
	foreach($result_user as $data){
	$user_name = $data['user']['user_name'];	
	}
	$result_society = $this->requestAction(array('controller'=>'Fns','action'=>'society_info_via_society_id'),array('pass'=>array($society_id)));
	foreach($result_society as $data){
	$society_name = $data['society']['society_name'];	
	}
	$result_hms_role=$this->requestAction(array('controller'=>'Fns','action'=>'hms_role_info_via_role_id'),array('pass'=>array($role_id)));
	foreach($result_hms_role as $data){
	$role_name = $data['hms_role']['role_name'];	
	}
	


?>	
	<tr>
		<td><?php echo $user_name; ?></td>
		<td><?php echo $society_name; ?></td>
		<td><?php echo $role_name; ?></td>
		<td></td>
	</tr>	
<?php } ?>

</table>








                          
<div class="form-actions">
<button type="submit" class="btn blue" name="sub">Submit</button>
<button type="button" class="btn">Cancel</button>
</div>
</div>
</div>
</form>




<script>
$(document).ready(function(){
		$.validator.setDefaults({ ignore: ":hidden:not(select)" });
		
		$('#contact-form').validate({
		
		errorElement: "label",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        //error.appendTo("label#errors");
						error.appendTo('label#' + element.attr('id'));
                    },
					
	    rules: {
	      
		  role: {
	        required: true
	         },
		  
		   user: {
	        required: true
	         },
		  
		 society: {
	        required: true
	         },
		  
		
		


		
		
		
		
		
		},
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}
	  });

}); 
</script>








