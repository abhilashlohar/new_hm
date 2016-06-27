<div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box green">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Switch Password</h4>
                        <div class="tools">
                          
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                       <form method="post" class="form-horizontal" id="contact-form">
                          
						  <div class="control-group">
								<div class="controls">
									<div class="">
									<input type="password" class="m-wrap" name="current_password"  style="font-size:16px;" placeholder="Current Password*">
									</div>
								</div>
							</div>
						  
						  
							<div class="control-group">
								<div class="controls">
									<div class="">
									<input type="password" class="m-wrap" name="pass" id="register_password" style="font-size:16px;" placeholder="New Password*">
									</div>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="">
									<input type="password" class="m-wrap" name="cpass" style="font-size:16px;" placeholder="Retype Password*">
									</div>
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
$(document).ready(function(){
		$('#contact-form').validate({
	    rules: {
		 current_password: {
	       
	        required: true,
			remote: "check_current_password"
			
	      },
	      pass: {
	       
	        required: true
			
	      },
		   cpass: {
	       
	        equalTo: "#register_password"
			
	      }
		  
	     
	    },messages: {
	                current_password: {
	                    remote: "you have enter wrong password"
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