<div class="modal-header" >
	<h4 id="myModalLabel1">Update Email</h4> 	
</div>
<div class="modal-body">
	
	
	<div class="control-group">
	  <label class="control-label" >  Current Email</label>
	  <div class="controls">
		<input class="m-wrap "  readonly id=""  type="text" value="<?php echo $email; ?> ">
	  </div>
   </div>
   
   <div class="control-group" >
	  <label class="control-label" >  New Email</label>
	  <div class="controls">
		 <input class="m-wrap "  id="new_email"  type="text" value="">
	  </div>
	  <div id="validation_email" style="color:red;"></div>
   </div>
	<div class="control-group"  id="otp_code_email">
	
	</div>
					   
</div>
<div class="modal-footer">

	<button class="btn" id="close_edit">Close</button>
	<button class="btn blue save_email" member_id="<?php echo $user_id; ?>">Save</button>
</div>