<div class="modal-header" >
	<h4 id="myModalLabel1">Update Mobile Number</h4> 	
</div>
<div class="modal-body">
	
	
	<div class="control-group">
	  <label class="control-label" style="margin-left: 24px;">  Current number</label>
	  <div class="controls">
		<span style="color:red;vertical-align: middle;">+91</span> <input class="m-wrap " maxlength="10" readonly id=""  type="text" value="<?php echo $mobile; ?> ">
	  </div>
   </div>
   
   <div class="control-group" >
	  <label class="control-label" style="margin-left: 24px;">  New number</label>
	  <div class="controls">
		<span style="color:red;vertical-align: middle;">+91</span> <input class="m-wrap " maxlength="10" id="new_mobile"  type="text" value="">
	  </div>
	  <div id="validation" style="color:red;"></div>
   </div>
	<div class="control-group"  id="otp_code">
	
	</div>
					   
</div>
<div class="modal-footer">

	<button class="btn" id="close_edit">Close</button>
	<button class="btn blue save_edited" member_id="<?php echo $user_id; ?>">Save</button>
</div>