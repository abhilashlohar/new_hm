<div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box green">
                     <div class="portlet-title">
                        <h4><i class="fa fa-unlock-alt" aria-hidden="true"></i>Change Password</h4>
                        <div class="tools">
                          
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                       <form method="post" class="form-horizontal" id="contact-form">
                          
						
						  <div class="control-group">
						 
								<div class="controls">
									 <label >Current Password</label>
									<input type="password" class="m-wrap" name="current_password" id="c_pass" style="font-size:16px;" placeholder="Current Password*">
									
								</div>
							</div>
						  
						  
							<div class="control-group">
							
								<div class="controls">
									 <label class="" >New Password</label>
									<input type="password" class="m-wrap" name="pass" id="register_password" style="font-size:16px;" placeholder="New Password*">
									
								</div>
							</div>
							<div class="control-group">
							
								<div class="controls">
									 <label class="" >Confirmation password</label>
									<input type="password" class="m-wrap" name="cpass" style="font-size:16px;" placeholder="Retype Password*">
								
								</div>
							</div>
						   
                           <div class="form-actions">
                              <button type="submit" class="btn green">Submit</button>
                             
                           </div>
                        </form>
                        <!-- END FORM-->  
                     </div>
                  </div>
                  <!-- END PORTLET-->
               </div>
            </div>
			
			
	
<script>
jQuery.validator.addMethod("notEqualTo", function(value, element, param) {
 return this.optional(element) || value != $(param).val();
 }, "You used this password recently. Please choose a different one.");
$(document).ready(function(){
		$('#contact-form').validate({
	    rules: {
		 current_password: {
	       
	        required: true,
			remote: "check_current_password"
			
	      },
	      pass: {
	       
	        required: true,
			notEqualTo: "#c_pass"
			
	      },
		   cpass: {
	       
	        equalTo: "#register_password"
			
	      }
		  
	     
	    },messages: {
	                current_password: {
	                    remote: "you have enter wrong password"
	                },
					cpass: {
	                    equalTo: "The new password does not match the confirmation password"
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