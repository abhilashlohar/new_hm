<?php 
$user_name=$user_info["user_name"];
$email=$user_info["email"];
$mobile=$user_info["mobile"];
?>
<div class="row-fluid">
   <div class="span12">
	  <!-- BEGIN VALIDATION STATES-->
	  <div class="portlet box green">
		 <div class="portlet-title">
			<h4><i class="icon-user icon-white"></i> Update member's Profile</h4>
		 </div>
		 <div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form method="post" class="form-horizontal">
			   <div class="control-group">
				  <label class="control-label">Name</label>
				  <div class="controls">
					 <input class="span6 m-wrap" type="text" value="<?php echo $user_name; ?>" name="name">
				  </div>
			   </div>
			    <div class="control-group">
				  <label class="control-label">Email</label>
				  <div class="controls">
					 <input class="span6 m-wrap" type="text" value="<?php echo $email; ?>" name="email" >
					 <span id="email"></span>
				  </div>
			   </div>
			    <div class="control-group">
				  <label class="control-label">Mobile</label>
				  <div class="controls">
					 <input class="span6 m-wrap" type="text" value="<?php echo $mobile; ?>" name="mobile" >
					  <span id="mobile"></span>
				  </div>
			   </div>
			   <div class="form-actions">
				  <button type="submit" class="btn green" name="sub">Update</button>
			   </div>
			</form>
			<!-- END FORM-->
		 </div>
	  </div>
	  <!-- END VALIDATION STATES-->
   </div>
</div>
<script>
$(document).ready(function(){
	$("form").die().on("submit",function(e){
		var allow="yes";
		var email=$('input[name="email"]').val();
		var mobile=$('input[name="mobile"]').val();
		
		if(email==""){
			allow="no";
			$('#email').html("Email is required.");
		}else{
			var filter=/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			if (filter.test(email)) {
				$.ajax({
					url:"<?php echo $webroot_path; ?>Hms/validate_for_member_info_update?email="+email+"&user_id=<?php echo $user_id; ?>",
					async: false,
					success: function(data){
						if(data!=""){
							allow=data;
							$('#email').html("Email is not unique.");
						}
						
					}
				});
			}else{
				allow="no";
				$('#email').html("Email is not valid.");
			}
		}
		
		if(mobile==""){
			allow="no";
			$('#mobile').html("Mobile is required.");
		}else{
			var filter2=/^[0-9-+]+$/;
			if (filter2.test(mobile)) {
				$.ajax({
					url:"<?php echo $webroot_path; ?>Hms/validate_for_member_info_update_mobile?mobile="+mobile+"&user_id=<?php echo $user_id; ?>",
					async: false,
					success: function(data){
						if(data!=""){
							allow=data;
							$('#mobile').html("Mobile is not unique.");
						}
						
						
					}
				});
			}else{
				allow="no";
				$('#mobile').html("Mobile is not valid.");
			}
		}
			
			
		if(allow=="no"){
				e.preventDefault();
			}
	})
})
</script>