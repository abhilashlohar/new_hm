 <!-- BEGIN LOGO -->
  <div class="logo">
    <img src="<?php echo $webroot_path ; ?>/as/hm/hm-logo.png" alt="logo" /> 
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form id="contact-form" method="post" class="form-vertical login-form"  />
    <fieldset>
       <h3 class="">Forgot Password ?</h3>
			<div class="controls">
				<label class="radio">
				<div class="radio" id="uniform-undefined"><span><input type="radio" name="forget_type" value="email" style="opacity: 0;" checked=""></span></div>
				Email
				</label>
				<label class="radio">
				<div class="radio" id="uniform-undefined"><span class="checked"><input type="radio" name="forget_type" value="mobile" style="opacity: 0;"></span></div>
				Mobile
				</label>  
			 
			</div>
			<br/>
		<div id="email_show">
			  <p>Enter your e-mail address below to reset your password.</p>
			 
			  <div style="color:red;"><?php echo @$wrong; echo @$right;?></div>
			  <div class="control-group">
				<div class="controls">
					<div class="input-icon left"><i class="icon-envelope"></i>
					<input type="text"   class="m-wrap" name="email" style="font-size:16px;"  placeholder="Login-Id*" >
					 </div>
				</div>
			  </div>
		  </div>
		  
		  <div id="mobile_show" style="display:none;">
			<p >Enter your mobile numenr below to reset your password.</p>
			 <div style="color:red;"><?php echo @$wrong; echo @$right;?></div>
			  <div class="control-group">
				<div class="controls">
					<div class="input-icon left"><i class="icon-envelope"></i>
					<input type="text"   class="m-wrap" name="mobile" style="font-size:16px;" maxlength="10" placeholder="Login-Id*" >
					 </div>
				</div>
			  </div>
		  </div>
		      
      <input type="submit" class="btn blue btn-block" value="Submit" style="font-size:16px;" name="forget" >
	 <!-- <hr>
	  Demo Link for Mobile
	  <a href="mobile.php" class="btn yellow btn-block">Call</a>-->
      </fieldset>
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
  
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
 
  
<script>
$(document).ready(function(){
	
	 $("input[type=radio]").bind('click',function(){
		var type=$(this).val();
		if(type=="email"){
			$("#email_show").show();
			$("#mobile_show").hide();
		}else{
			$("#email_show").hide();
			$("#mobile_show").show();
		}
	 });
	
	
		$('#contact-form').validate({
	    rules: {
	      email: {
	       
	        required: true,
			email:true,
			remote: "forget_check_email_exits"
	      },
		   mobile: {
	       
	        required: true,
			number:true,
			remote: "forget_check_mobile_exits"
	      }
	     
	    },
		messages: {
	                email: {
	                    remote: "This Email is not exist"
	                },
					 mobile: {
	                    remote: "This Mobile number is not exist"
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

  
  