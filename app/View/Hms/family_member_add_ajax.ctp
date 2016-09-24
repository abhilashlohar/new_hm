<?php

	foreach($result_user as $data)
	{

		$user_id=$data['user']['user_id'];
		$user_name=$data['user']['user_name'];
		$mobile=$data['user']['mobile'];
		$email=$data['user']['email'];
		
		$relation=$data['user']['relationship'];
		$result_user_profile = $this->requestAction(array('controller' => 'Fns', 'action' => 'user_profile_info_via_user_id'),array('pass'=>array($user_id)));
		$dob=$result_user_profile[0]['user_profile']['age'];

		@$blood_group=$result_user_profile[0]['user_profile']['blood_group']; 
	}
?>

<div class="row-fluid">
   <div class="span12">

<div style="background-color:#fff;">
<div style="background-color:#EFEFEF; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;">
Family Member
</div style="width:100%;">
<br>
<div style="width:30%; margin-left:30%;" class="family-responsive">
<form id="contact-form" method="POST" class="" />
<input type="hidden" value="<?php echo $user_id; ?>" id="meber_info">
<center>
<table width="100%">
<tr>
<td>
<div class="control-group">
<div class="controls">

<input type="text"   class="span12 m-wrap" name="name1" style="font-size:16px;" placeholder="Name*" value="<?php echo @$user_name; ?>" >

</div>
</div>
 </td></tr>
<tr><td> 

<input type="text" class=" span12 m-wrap" placeholder="Email Address" style="font-size:16px;"  name="email1" value="<?php echo @$email; ?>" id="1" >


</td></tr>
<tr><td> 


<input type="text"   class="span12 m-wrap" placeholder="Mobile No"style="font-size:16px;"  id="mob" maxlength="10" name="mobile1"  value="<?php echo @$mobile; ?>" >




</td></tr>

<tr>
<td>
<select class="span12 m-wrap" data-placeholder="Choose Age Group" name="dob1">
<option value="" style="display:none;"></option>
<option value="1"<?php if($dob==1){?>selected <?php } ?>> 18-24 </option>
<option value="2" <?php if($dob==2){?>selected <?php } ?>> 25-34 </option>
<option value="3"<?php if($dob==3){?>selected <?php } ?>> 35-44 </option>
<option value="4"<?php if($dob==4){?>selected <?php } ?>> 45-54 </option>
<option value="5" <?php if($dob==5){?>selected <?php } ?>> 55-64 </option>
<option value="6" <?php if($dob==6){?>selected <?php } ?>> 65+</option>
</select> 
 
 </td>
 </tr>
 <tr>
<td> 
<div class="control-group">
<div class="controls">
<select class=" span12 m-wrap "placeholder=" Blood Group" name="blood_group1">
<option value="" style="display:none;">Blood group</option>
<option value="1" <?php if($blood_group==1){ ?> selected="selected" <?php } ?> >  A+ </option>
<option value="2" <?php if($blood_group==2){ ?> selected="selected" <?php } ?>>  B+ </option>
<option value="3" <?php if($blood_group==3){ ?> selected="selected" <?php } ?>>  AB+  </option>
<option value="4" <?php if($blood_group==4){ ?> selected="selected" <?php } ?>>  O+  </option>
<option value="5" <?php if($blood_group==5){ ?> selected="selected" <?php } ?>>  A- </option>
<option value="6" <?php if($blood_group==6){ ?> selected="selected" <?php } ?>>  B- </option>
<option value="7" <?php if($blood_group==7){ ?> selected="selected" <?php } ?>>  AB-  </option>
<option value="8" <?php if($blood_group==8){ ?> selected="selected" <?php } ?>>  O-  </option>
</select>
</div>
</div>
 </td>
 </tr>
 <tr>
<td>

        <input class="span12 m-wrap " type="text" name="relation1" placeholder="Relationship" value="<?php echo @$relation; ?>">
 </td></tr>
 
 
<tr><td>
<div class="form-actions">
<button type="submit" name="login" class="btn blue pull" >Update</button>
</div>


</td></tr></table>

</center>
</form>

</div>
</div>
</div>
</div>

<script>
$(document).ready(function(){
$('#contact-form').validate({
  ignore: 'null',
rules: {
name1: {

required: true
},

relation1: {

required: true
},
email1: {

//required: true,
email: true,
remote: {
			url: "family_member_check_email",
			type: "post",
			data: {
				society: function() { return $("#meber_info").val();}
		 
			}
		}
 
},
dob1: {

required: true,
//remote: "dob_check"
},
mobile1: {

//required: true,
number: true,
minlength: 10,
maxlength: 10,
remote: {
			url: "family_member_check_mobile",
			type: "post",
			data: {
				society: function() { return $("#meber_info").val();}
		 
			}
		}
}
},

messages: {
	                email1: {
	                    remote: "Login-Id is Already Exist."
	                },
					 mobile1: {
	                    remote: "Mobile-No is Already Exist."
	                },
					 dob: {
	                    remote: "Your age should be above 13"
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

