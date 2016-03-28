<center>
<a href="<?php echo $webroot_path; ?>Hms/create_login" class="btn red">Create Login</a>
<a href="<?php echo $webroot_path; ?>Hms/hm_create_role" class="btn blue">Create Role</a>
<a href="<?php echo $webroot_path; ?>Hms/assign_module_to_role_hm" class="btn blue">Assign Module to Role</a>
<a href="<?php echo $webroot_path; ?>Hms/asign_role_to_user" class="btn blue">Assign Role to Users</a>
<center>
<br>
<form method="post" id="contact-form">          
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Create Login</h4>
</div>
<div class="portlet-body form">

<label style="font-size:14px;">Name<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span4" name="name" id="name"><br>
<span id="nam" style="color:red;"></span>
</div>
<br>



<label style="font-size:14px;">Email<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span4 email_mobile" name="email" id="email"><br>
<span id="mail" style="color:red;"></span>
</div>
<br>


<label style="font-size:14px;">Mobile<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span4 email_mobile" name="mobile" id="mobile" maxlength="10"><br>
<span id="mob" style="color:red;"></span>
</div>
<br>

<label style="font-size:14px;">Password<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span4" name="password" id="password"><br>
<span id="pass" style="color:red;"></span>
</div>
<br>


<div class="form-actions">
<button type="submit" class="btn blue" id="submit" name="sub">Submit</button>
<button type="button" class="btn">Cancel</button>
</div>
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


