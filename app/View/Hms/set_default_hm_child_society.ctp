<!-- BEGIN LOGO -->
  <div class="logo">
    
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
 <div class="content" style="min-height: 200px;" >
    <!-- BEGIN LOGIN FORM -->
		<form method="post">
			<div class="row-fluid">

				<div class="span12 responsive">

					<div class="control-group">
						<label style="font-size:14px;">Chose the society to work</label>
								<div class="controls">
								
								<select class=" chosen chzn-done" name="society">
									<option>Select society</option>
										<?php

										foreach($result_hms_right as $data){
											$society_id=$data['hms_right']['society_id'];
											$default=$data['hms_right']['default'];
											$result_society=$this->requestAction(array('controller' => 'Hms', 'action' => 'society_name'), array('pass' => array($society_id)));
												$society_name=$result_society[0]['society']['society_name'];										

										?>
										<option value="<?php echo $society_id; ?>" <?php if($default=="yes"){?> selected <?php } ?>><?php echo $society_name; ?> </option>
									
										<?php } ?>
								</select>
									 <input type="submit" name="sub" value="Next" class="btn blue" style="margin-bottom:7px;">
								 
								</div>
					</div>
				</div>


			</div>
		</form>
    
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
			}
	  });
}); 
</script>

