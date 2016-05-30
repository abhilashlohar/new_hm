<!-- BEGIN LOGO -->
  <div class="logo">
    <img src="<?php echo $webroot_path ; ?>/as/hm/hm-logo.png" alt="logo" /> 
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div class="content" >
    <!-- BEGIN LOGIN FORM -->
    <form id="contact-form" method="post" class="form-vertical login-form"  />
    <fieldset>
      <h4 class="form-title"><center>Sign in to HousingMatters </center></h4>
	  <?php  if(!empty($wrong_fb)){ ?>
		<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert"></button>
			<p style="color:#BB2413;">
				<?php echo $wrong_fb; ?>
		</div>
	  <?php } ?>

	
      <div id="result"></div>
      <div class="control-group">
	  	<div class="controls">
        	<div class="input-icon left"><i class="icon-user"></i>
			<input type="text"  class="m-wrap" name="username" style="font-size:16px;" value="<?php echo @$bgColor ; ?>"  placeholder="Your email ID or mobile*">	
             </div>
		</div>
	  </div>
       <div class="control-group">
	  	<div class="controls">
        	<div class="input-icon left"><i class="icon-lock"></i>
			<input type="password"   class="m-wrap" placeholder="Password*" style="font-size:16px;" value="<?php echo @$txtColor; ?>" name="password" >
           
             </div>
		</div>
	  </div> 
<div class="form-actions " style="background-color: #FBFBFB;border: none;" >
       <label class="checkbox">
        <div class="checker" id="uniform-undefined"><span><input type="checkbox" <?php if(!empty($bgColor)){?> checked="checked" <?php } ?> name="rememberme" value="1" style="opacity: 0;"></span></div> Remember me
        </label>
			<button type="submit" name="login" class="btn green  pull-right" style="font-size:16px; width:45%" >Login  <i class="icon-signin m-icon-white" ></i></button>
      </div>	  
      
	  
	    <div align="center" style="color:#7A7A7A;"><b>OR</b></div>
		<br/>
	   <a href="http://app.housingmatters.co.in/1353/fbconfig.php" style="text-decoration: none;">
		 <div style="color:#fff;">
		 <table width="100%">
			<tr>
				<td width="20%" style="background-color:#35508D;padding: 7px;" align="center"><i class="icon-facebook" style="font-size: 28px;"></i></td>
				<td style="background-color: rgb(60, 90, 152); padding-left: 15px; font-size: 14px; font-weight: bold;">Sign up with Facebook</td>
			</tr>
		 </table>
		 </div>
	 </a>
	 <br/>
	 <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;redirect_uri=http%3A%2F%2Fapp.housingmatters.co.in%2Fgoogle-login-api%2Findex.php&amp;client_id=453149326689-5k5b4ar6s49bs1rv0n4k9umno56qf113.apps.googleusercontent.com&amp;scope=email+profile&amp;access_type=online&amp;approval_prompt=auto" style="text-decoration: none;">
		 <div style="color:#fff;">
		 <table width="100%">
			<tr>
				<td width="20%" style="background-color:#C5462E;padding: 7px;" align="center"><i class="icon-google-plus" style="font-size: 28px;"></i></td>
				<td style="background-color: #DD4D3B; padding-left: 15px; font-size: 14px; font-weight: bold;">Sign up Google</td>
			</tr>
		 </table>
		 </div>
	 </a>
	 <br/>
	  
	 </form> 
	<!-- The plugin will be embedded into this div //-->
	
	
	




<div id="status" style="display:none;">
</div>
	  
      <div class="forget-password">Forgot your password ?
        <p>
          no worries, click <a href="<?php echo $webroot_path ; ?>hms/forget" class="" id="forget-password">here</a>
          to reset your password.
        </p>
      </div>
      <center>
      <a href="<?php echo $webroot_path ; ?>hms/sign_up" class="btn blue " style="font-size:16px;" >New User Sign up</a> </center>
      </fieldset>
    
    <!-- END LOGIN FORM -->        
 </div>
  <!-- END LOGIN -->
  

<script>
$(document).ready(function(){
		$('#contact-form').validate({
	    rules: {
	      username: {
	        required: true
	      },
	      password: {
	        required: true,
	      },
	    },
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}, 
			submitHandler: function () {
				$("button[name=login]").attr('disabled','disabled');
				$("button[name=login]").text('Please wait..');
				var url = "<?php echo $webroot_path ; ?>hms/submit_login";
				$.ajax({
				   type: "POST",
				   url: url,
				   data: $("#contact-form").serialize(), // serializes the form's elements.
				   success: function(data){
					//alert(data);
					   var obj = jQuery.parseJSON(data);
					   
					   if(obj.result=="success"){
						   $("#result").removeClass("alert alert-error").addClass("alert alert-success").html("Redirecting...");
						   window.location.href = obj.url;
					   }
					   if(obj.result=="error"){
						    $("button[name=login]").removeAttr('disabled');
							$("button[name=login]").html('Login <i class="icon-signin m-icon-white" ></i>');
							$("#result").addClass("alert alert-error").html(obj.message);
						}
				   }
				 });
			}
	  });
	  
	
}); 
</script>

