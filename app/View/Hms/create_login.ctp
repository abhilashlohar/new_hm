<center>
<a href="<?php echo $webroot_path; ?>Hms/create_login" class="btn red">Create Login</a>
<a href="<?php echo $webroot_path; ?>Hms/hm_create_role" class="btn blue">Create Role</a>
<a href="<?php echo $webroot_path; ?>Hms/assign_module_to_role_hm" class="btn blue">Assign Module to Role</a>
<a href="<?php echo $webroot_path; ?>Hms/asign_role_to_user" class="btn blue">Assign Role to Users</a>
</center>
<br>
<form method="post" id="contact-form">          
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Create Login</h4>
</div>
<div class="portlet-body form">

<table class="table table-condensed table-bordered">
	<tr>
		<th><input type="text" class="m-wrap span12" name="name" id="name" Placeholder="Name"><br>
		<span id="nam" style="color:red;"></span>
		</th>
		<th>
		<input type="text" class="m-wrap span12 email_mobile" name="email" id="email" Placeholder="E-mail"><br>
		<span id="mail" style="color:red;"></span>
		</th>
		<th>
		<input type="text" class="m-wrap span12 email_mobile" name="mobile" id="mobile" maxlength="10"  Placeholder="Mobile"><br>
		<span id="mob" style="color:red;"></span>
		</th>
		<th>
		<input type="text" class="m-wrap span12" name="password" id="password" Placeholder="Password"><br>
		<span id="pass" style="color:red;"></span>
		</th>
		<th>
		<button type="submit" class="btn blue" id="submit" name="sub">Submit</button>
		</th>
	</tr>
	</table>
	<br>
	
	<table class="table table-condensed table-bordered">
	<tr>
	   <th>Sr.No.</th>
	   <th width="20%">Name</th>
	   <th width="30%">Email</th>
	   <th width="20%">Mobile</th>
	   <th width="20%">Password</th>
	</tr>
	<?php $n=0; foreach($result_user as $data){ $n++;
		$user_name = $data['user']['user_name'];
		@$email = @$data['user']['email'];
		@$mobile = @$data['user']['mobile'];
		$password = $data['user']['password']; ?>
	<tr>
	    <td><?php echo $n; ?></td>
		<td><?php echo $user_name; ?></td>
		<td><?php echo @$email; ?></td>
		<td><?php echo @$mobile; ?></td>
		<td><?php echo $password; ?></td>
	</tr>
		
		<?php } ?>
	
	
	
	
	
	</table>
	

</div>
</div>
</form>


<script>
jQuery.validator.addMethod("require_from_group", function(value, element, options) {
  var numberRequired = options[0];
  var selector = options[1];
  var fields = $(selector, element.form);
  var filled_fields = fields.filter(function() {
    // it's more clear to compare with empty string
    return $(this).val() != ""; 
  });
  var empty_fields = fields.not(filled_fields);
  // we will mark only first empty field as invalid
  if (filled_fields.length < numberRequired && empty_fields[0] == element) {
    return false;
  }
  return true;
// {0} below is the 0th item in the options field
}, jQuery.format("Please fill out at least email or mobile"));
$(document).ready(function(){
	
$('#contact-form').validate({
	
  ignore: 'null', 
rules: {

name: {

required: true
},
email: {
 require_from_group: [1, ".email_mobile"],
email: true,
remote: "signup_emilexits"
},
mobile: {

 require_from_group: [1, ".email_mobile"],
 number: true,
			minlength: 10,
			maxlength: 10,
			remote: "signup_mobileexit"
},
password: {

required: true
},
},
messages: {
	           email: {
	                     remote: "Login-Id is Already Exist."
	                },
					 mobile: {
	                    remote: "Mobile-No is Already Exist."
	                }
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


