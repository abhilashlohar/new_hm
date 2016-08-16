<div style="background-color:#EFEFEF; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;">
Multi Society Enrollment 
</div>



<div class="portlet-body" style="padding:10px;";>
<!--BEGIN TABS-->
	<div class="tabbable tabbable-custom">
		<ul class="nav nav-tabs">
			<li class="active" ><a href="multi_society_enrollment" rel='tab' >Multi Society Enrollment </a></li>
		</ul> 
		<div class="tab-content" style="min-height:500px;">
			<form id="contact-form" method="POST">
				<div class="control-group">
					<div class="controls">
						<select style="font-size:16px;" id="soc_wing" class="m-wrap chosen change_society " name="society"  data-placeholder="Choose a Category"   tabindex="1">
						<option value="" >--Select Name of The Society--</option>
						<?php 

						foreach ($result_society as $db) 
						{
						$society_id=$db['society']["society_id"];
						$society_name=$db['society']["society_name"];
						?>
						<option value="<?php echo $society_id; ?>"><?php echo $society_name; ?></option>
						<?php } ?>
						</select>
					</div>
					<div id="society_select" style="color:red;"></div>
				</div>
				
				<div class="control-group" id="member_show">
					<div class="controls">
						<select style="font-size:16px;" id="user_info" class="m-wrap chosen user_info" name="user"  data-placeholder="Choose a Category"   tabindex="1">
							<option value="" >--Select member--</option>
							<?php 

								foreach ($result_user as $db) 
								{
								$user_id=$db['user']["user_id"];
								$user_name=$db['user']["user_name"];
								?>
								<option value="<?php echo $user_id; ?>"><?php echo $user_name; ?></option>
							<?php } ?>
						</select>
					</div>
					<div id="error" style="color:red;"> </div>
				</div>
				
				<div class="control-group" id="show_wing">
					<div class="controls">
						<select style="font-size:16px;" id="wing" class="m-wrap chosen wing_select" name="wing_name"  data-placeholder="Choose a Category"   tabindex="1">
							<option value="" >--Select wing--</option>
						</select>
					</div>
					
				</div>
				<div id="wing_select" style="color:red;"></div>
				<div class="control-group" id="show_flat">
					<div class="controls">
						<select style="font-size:16px;" id="" class="m-wrap chosen " name="flat_name"  data-placeholder="Choose a Category"   tabindex="1">
							<option value="" >--Select flat--</option>
						</select>
					</div>
					
				</div>
				<div id="flat_select" style="color:red;"></div>
				<div class="control-group">
					<label class="control-label" style="font-size:16px;">Owner </label>
					<div class="controls">
						<label class="radio">
							<div class="radio" id="uniform-undefined">
							 <span>
								<input type="radio" id="ty" onClick="commite()"name="tenant"  value="yes"  style="opacity: 0; font-size:14px;">
							 </span>
							</div>
							<span style="font-size:16px;"> Yes</span>
						</label>
						<label class="radio">
							<div class="radio" id="uniform-undefined">
								<span class="checked">
									<input type="radio" onClick="commite()" name="tenant" id="tno" value="no" checked  style="opacity: 0; font-size:14px;"   >
								</span>
							</div>
							<span style="font-size:16px;"> No </span>
						</label>  
					</div>
				</div>
				
				
				<div class="control-group" id="resident_show" style="display:none;">
					<label class="control-label" style="font-size:16px;">Committee Member</label>
						<div class="controls">
							<label class="radio">
								<div class="radio" id="uniform-undefined">
									<span>
										<input type="radio" name="committe" value="yes" id="cmy"   style="opacity: 0; font-size:14px;" >
									</span>
								</div>
								<span style="font-size:16px;">Yes</span>
							</label>
							<label class="radio">
								<div class="radio" id="uniform-undefined">
									<span class="checked">
										<input type="radio"  name="committe" value="no" checked style="opacity: 0; font-size:14px;" >
									</span>
								</div>
								<span style="font-size:16px;"> No </span>
							</label>  
						</div>
				</div>
				
				<div>
				
				<button type="submit" name="sub" class="btn blue" >Submit</button>
				
				</div>
				
				
			</form>

		</div>
	</div>
<!--END TABS-->
</div>



<script>
function wing_change(){
	var society_id=$("#soc_wing").val();
	$.ajax({
			url: "society_wise_member_list/"+society_id+"/"+2,
		}).done(function(response) {
			$("#show_wing").html(response);
		
		}); 
}

function flat_society_wise(){
	var society_id=$("#soc_wing").val();
	var wing=$("#wing").val();
	$.ajax({
			url: "society_wise_member_list/"+society_id+"/"+3+"/"+wing,
		}).done(function(response) {
			
			$("#show_flat").html(response);
			
		}); 
}


$(document).ready(function(){
	$("#tno").click(function(){
		$("#resident_show").hide();
	//$("#tno").hide();

	});
	$("#ty").click(function(){
		$("#resident_show").show();
	//$("#other_show").show();

	});
	
	$(".change_society").change(function(){
		wing_change();
	});	
	
/*	$(".change_society").change(function(){
		var society_id=$(this).val();
		//alert(society_id);
		$.ajax({
			url: "society_wise_member_list/"+society_id+"/"+1,
		}).done(function(response) {
			$("#member_show").html(response);
			wing_change();
		}); 
		
	}); */
	
	$(".wing_select").die().live("change",function(){
		flat_society_wise();
	});
	
	$("form").die().on("submit",function(e){
		var allow="yes";
		
		var society_id=$("#soc_wing").val();
		var user_id=$("#user_info").val();
		var wing=$("#wing").val();
		var flat=$("select[name='flat_name']").val();
		
		if(society_id==""){
			var allow="no";
			$("#society_select").html('This field is required');
		 }else{
			$("#society_select").html('');
	     }
		
		if(user_id==""){
			
			var allow="no";
			$("#error").html('This field is required');
		 }else{
			
				$("#error").html('');
				$.ajax({
					url: "society_member_valid/"+society_id+"/"+user_id,
					async: false,
				}).done(function(response) {
					result=response;
				}); 
			
				if(result=="false"){ 
					var allow="no";
					$("#error").html('This member is already exist');
				}else{
					$("#error").html('');
				}
	     }
		
		if(wing==""){
			var allow="no"; 
			$("#wing_select").html('This field is required');
		 }else{
			$("#wing_select").html('');
		 }	
		 
		if(flat==""){
			var allow="no";
			$("#flat_select").html('This field is required');
		 }else{
			$("#flat_select").html('');
		 }	

		if(allow=="no"){

			e.preventDefault();
		}		 
	});
	
	
});
</script>