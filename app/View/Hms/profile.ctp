<?php
               		
					foreach($result_user as $collection){
					$da_user_id = (int)$collection['user']['user_id'];
					$c_name = $collection['user']['user_name'];
					$c_email = $collection['user']['email'];
					$c_mobile = $collection['user']['mobile'];
					@$profile_pic = @$collection['user']['profile_pic'];
					$email_privacy = @$collection['user']['email_privacy'];
					$mobile_privacy = @$collection['user']['mobile_privacy'];
					@$f_profile_pic = @$collection['user']['f_profile_pic'];
					@$g_profile_pic = @$collection['user']['g_profile_pic'];
					
					$result_user_flat = $this->requestAction(array('controller' => 'Fns', 'action' => 'user_flat_info_via_user_id'),array('pass'=>array($da_user_id)));
					 $c_wing_id = (int)@$result_user_flat[0]['user_flat']['wing'];
					 $c_flat_id = (int)@$result_user_flat[0]['user_flat']['flat']; 
					$result_user_profile = $this->requestAction(array('controller' => 'Fns', 'action' => 'user_profile_info_via_user_id'),array('pass'=>array($da_user_id)));
					
					$medical_pro = @$result_user_profile[0]['user_profile']['medical_pro'];
					
					//@$profile_pic = @$result_user_profile[0]['user_profile']['profile_pic'];
					//@$f_profile_pic = @$result_user_profile[0]['user_profile']['f_profile_pic'];
					//@$g_profile_pic = @$result_user_profile[0]['user_profile']['g_profile_pic'];
					$c_sex = (int)@$result_user_profile[0]['user_profile']['gender'];
					$gender_privacy = @$result_user_profile[0]['user_profile']['gender_privacy'];
					
					$da_dob=@$result_user_profile[0]['user_profile']['age'];
					$age_privacy = @$result_user_profile[0]['user_profile']['age_privacy'];
					
					$per_address=@$result_user_profile[0]['user_profile']['per_address'];
					$per_address_privacy=@$result_user_profile[0]['user_profile']['per_address_privacy'];
					
					$com_address=@$result_user_profile[0]['user_profile']['comm_address'];
					$communication_address_privacy=@$result_user_profile[0]['user_profile']['communication_address_privacy'];
					
					$hobbies=@$result_user_profile[0]['user_profile']['hobbies'];
					$hob_privacy=@$result_user_profile[0]['user_profile']['hob_privacy'];
					
					@$blood_group=@$result_user_profile[0]['user_profile']['blood_group'];
					@$blood_group_privacy=@$result_user_profile[0]['user_profile']['blood_group_privacy'];
					
					
					//$multi_flat=@$collection['user']['multiple_flat'];
					$contact_emergency3=@$result_user_profile[0]['user_profile']['contact_emergency'];
					$contact_num_emergency_privacy=@$result_user_profile[0]['user_profile']['contact_num_emergency_privacy'];
					
				 }
				  
$flat = $this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat'),array('pass'=>array($c_wing_id,$c_flat_id)));				  
					$ccc=0;
									if(!empty($c_email))
									{
										$ccc++;
									}
									if(!empty($c_mobile))
									{
										$ccc++;
									}
									if(!empty($c_name))
									{
										$ccc++;
									}
									if(!empty($profile_pic))
									{
										$ccc++;
									}
									if(!empty($c_sex))
									{
										$ccc++;
									}
									/*if(!empty($c_wing_id))
									{
										$ccc++;
									}
									if(!empty($c_flat_id))
									{
										$ccc++;
									}*/
									if(!empty($da_dob))
									{
										$ccc++;
									}
									if(!empty($per_address))
									{
										$ccc++;
									}
									if(!empty($com_address))
									{
										$ccc++;
									}
									if(!empty($hobbies))
									{
										$ccc++;
									}
									if(!empty($contact_emergency3))
									{
										$ccc++;
									}
						//$progres=$ccc*100/11;
						$progres=$ccc*100/10;
				

?>
				



<div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE FORM PORTLET-->   
                  <div class="portlet box blue">
                     <div class="portlet-title" style="background-color: rgb(134, 171, 196);">
                        <h4>
                           <span class="hidden-phone">User Profile</span>
                           <span class="visible-phone">Profile</span>
                        </h4>
                     </div>
                     <div class="portlet-body">
						<div class="row-fluid">
									<div class="span12">
                        <div class="tabbable tabbable-custom">
                          <ul class="nav nav-tabs">
									
									
								
									
										
									<li class="active"><a href="profile" rel='tab' >Basic</a></li>	
									<?php 
									if(($owner=="yes" and $family_member==1 and $member_type=="member") or ($owner=="no" and $family_member_tenant==1 and $member_type=="member")){ ?>
									<li class=""><a href="family_member_view" rel='tab' >Family Member</a></li>

									<?php } ?>	
						 </ul>
						 
                           <div class="tab-content">
                               <form method="post" enctype="multipart/form-data" id="contact-form1"> 
                              <div class="tab-pane active" id="portlet_tab2">
                                 <div class="controls controls-row">
								  
								   <div class="span12"> 
										<div class="span3"> 
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 80%; height: 150px;">
												<?php if(!empty($profile_pic) && $profile_pic!="blank.jpg"){ ?>
												 <img src="<?php echo $webroot_path; ?>profile/<?php echo $profile_pic; ?>" style="width:100%; height:200px;" alt="Profile Picture">
												<?php }
												elseif(!empty($f_profile_pic)){ ?>
													 <img src="<?php echo $f_profile_pic; ?>" style="width:100%; height:200px;" alt="Profile Picture">
												<?php }
												elseif(!empty($g_profile_pic)){ ?>
													 <img src="<?php echo $g_profile_pic; ?>" style="width:100%; height:200px;" alt="Profile Picture">
												<?php }
												else{ ?>
													 <img src="<?php echo $webroot_path; ?>profile/<?php echo $profile_pic; ?>" style="width:100%; height:200px;" alt="Profile Picture">
												<?php } ?>
												  
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
												<div>
												   <span class="btn btn-file mini black"><span class="fileupload-new">Change</span>
												   <span class="fileupload-exists">Remove</span>
												  
												   <input type="file" class="default" name="profile_photo"></span>
												  
																					  
												 </div>
											 </div>
									   </div>
									 <div class="span3"> 
											Name
									   </div>
									<div class="span3"> 
											<input type="text" class="m-wrap" readonly id="name" value="<?php echo $c_name;  ?>" name="name">
									   </div>
									   
									</div>
										
									   
								   
                                    
                              </div>
								 
								 
								 <div class="controls controls-row">
                                    <div class="span3"> 
											
									</div>
									<div class="span3"> 
											 Wing-Flat
									</div>
									<div class="span3"> 
										<?php if(!empty($multi_flat)) { ?>
											<select name='wing_flt'>
											<option style='display:none;'></option>
											<?php 
											foreach($multi_flat as $ds)
											{
											 
												$wing_id=$ds[0];
												$flat_id=$ds[1];
												$wing_flat1 = $this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat'),array('pass'=>array($wing_id,$flat_id)));
											?>
											<option value='<?php echo $wing_id; ?>,<?php echo $flat_id ; ?>' <?php if($flat==$wing_flat1) { ?> selected <?php } ?>><?php echo $wing_flat1 ; ?> </option>
											<?php }  ?>
											</select> <?php } else { echo $flat ; } ?>
								   </div>
                                 </div>
								
								
								<div class="controls controls-row">
									<div class="span3"> 
											
									</div>
										<div class="span3"> 
												 Mobile Number <span style="color:red">+91</span> 
										</div>
										<div class="span3"> 
												<input type="text" class="m-wrap change_mobile" value="<?php echo $c_mobile; ?>" name="mobile1" readonly maxlength="10" member_update="<?php echo $da_user_id; ?>">
										</div>
										<div class="span3"> 
											<select class="span12 m-wrap check_privacy" data-placeholder="Choose a Category" tabindex="1" name="sel_private" change_field="mobile" >
											<option value="Public" <?php if($mobile_privacy=='Public'){ ?> selected <?php } ?> >Public</option>
											<option value="Private" <?php if($mobile_privacy=='Private'){ ?> selected <?php } ?>>Private</option>

											</select>
										</div>
								
								
								</div>
                                
								<div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
												Email-Id
										</div>
										<div class="span3"> 
												<input type="text" value="<?php echo $c_email;  ?>"   class=" m-wrap" name="email">
										</div>
										
										<div class="span3"> 
											<select class="span12 m-wrap check_privacy" data-placeholder="Choose a Category" tabindex="1" name="sel_private" change_field="email">
											<option value="Public" <?php if($email_privacy=='Public'){ ?> selected <?php } ?>>Public</option>
											<option value="Private" <?php if($email_privacy=='Private'){ ?> selected <?php } ?>>Private</option>
											</select>
									</div>
								
								</div>
								 <center>    
											<div>
											<p style="font-size:20px; color:#666;">Other Information</p>
											</div>
                                   </center>
								   
								   <div class="controls controls-row">
                                    <div class="span3"> 
											
									</div>
									<div class="span3"> 
											Gender
									</div>
									<div class="span3"> 
										<label class="radio">
                                        <input type="radio" name="sex" value="1" <?php if( @$c_sex == 0 ||  @$c_sex == 1) { ?>checked <?php } ?> >
                                          Male
                                          </label>
                                             <label class="radio">
                                          <input type="radio" name="sex" value="2" <?php if( @$c_sex == 2) { ?>checked <?php } ?>>
                                        Female
                                          </label>
								   </div>
								   
								   <div class="span3"> 
											<select class="span12 m-wrap check_privacy" data-placeholder="Choose a Category" tabindex="1" name="sel_private" change_field="gender">
											<option value="Public"<?php if($gender_privacy=='Public'){ ?> selected <?php } ?> >Public</option>
											<option value="Private" <?php if($gender_privacy=='Private'){ ?> selected <?php } ?>>Private</option>

											</select>
									</div>
								   
								   
								   
                                 </div>
								   
								   
								   <div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
												Age Group
										</div>
										<div class="span3"> 
											<select class="m-wrap m-ctrl-medium " data-placeholder="Choose Age Group" name="age">
											<option value="" style="display:none;"></option>
											<option value="1"<?php if($da_dob==1){?>selected <?php } ?>> 18-24 </option>
											<option value="2" <?php if($da_dob==2){?>selected <?php } ?>> 25-34 </option>
											<option value="3"<?php if($da_dob==3){?>selected <?php } ?>> 35-44 </option>
											<option value="4"<?php if($da_dob==4){?>selected <?php } ?>> 45-54 </option>
											<option value="5" <?php if($da_dob==5){?>selected <?php } ?>> 55-64 </option>
											<option value="6" <?php if($da_dob==6){?>selected <?php } ?>> 65+</option>
											</select> 
										</div>
										
										<div class="span3"> 
											<select class="span12 m-wrap check_privacy" data-placeholder="Choose a Category" tabindex="1" name="sel_private" change_field="age">
											<option value="Public" <?php if($age_privacy=='Public'){ ?> selected <?php } ?>>Public</option>
											<option value="Private" <?php if($age_privacy=='Private'){ ?> selected <?php } ?>>Private</option>
											</select>
									  </div>
								
								</div>
								   
								    
								<div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
												Contact number Emergency
										</div>
										<div class="span3"> 
												 <input type="text" class="m-wrap valid" id="cont_emergency" value="<?php echo $contact_emergency3 ; ?>" name="contact_emergency1" maxlength="10">
										</div>
										
									<div class="span3"> 
											<select class="span12 m-wrap check_privacy" data-placeholder="Choose a Category" tabindex="1" name="sel_private" change_field="contact_num_emergency" >
											<option value="Public" <?php if($contact_num_emergency_privacy=='Public'){ ?> selected <?php } ?>>Public</option>
											<option value="Private" <?php if($contact_num_emergency_privacy=='Private'){ ?> selected <?php } ?>>Private</option>

											</option></select>
									</div>
								
								</div>
								
								<div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
												Permanent address
										</div>
										<div class="span3"> 
												<textarea rows="5" cols="" name="per_address" class="m-wrap" style="resize:none;" ><?php echo $per_address; ?></textarea>
										</div>
										
									<div class="span3"> 
											<select class="span12 m-wrap check_privacy" data-placeholder="Choose a Category" tabindex="1" name="sel_private" change_field="per_address">
											<option value="Public" <?php if($per_address_privacy=='Public'){ ?> selected <?php } ?>>Public</option>
											<option value="Private" <?php if($per_address_privacy=='Private'){ ?> selected <?php } ?>>Private</option>

											</select>
									</div>
								
								</div>
								
								<div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
												Communication address
										</div>
										<div class="span3"> 
												<textarea rows="5" cols="" name="com_address" class="m-wrap m-ctrl-medium" style="resize:none;" ><?php echo $com_address; ?></textarea>
										</div>
										
										<div class="span3"> 
											<select class="span12 m-wrap check_privacy" data-placeholder="Choose a Category" tabindex="1" name="sel_private" change_field="communication_address">
											<option value="Public" <?php if($communication_address_privacy=='Public'){ ?> selected <?php } ?>>Public</option>
											<option value="Private" <?php if($communication_address_privacy=='Private'){ ?> selected <?php } ?>>Private</option>

											</select>
									   </div>
								
								</div>
								
								<div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
												Hobbies
										</div>
										<div class="span3"> 
											<select data-placeholder="select hobbies"  name="hob[]" id="multi" class="chosen span9" multiple="multiple" tabindex="6">
											<?php
											foreach($hobbies_category as $data){

											$hobbies_id=$data['hobbies_category']['hobbies_id'];
											$hobbies_name=$data['hobbies_category']['hobbies_name'];
											?>

											<option value="<?php echo $hobbies_id; ?>" <?php if(@in_array($hobbies_id,$hobbies)) { ?> selected <?php } ?>><?php echo $hobbies_name; ?></option>

											<?php } ?>
											</select>
										</div>
										
										<div class="span3"> 
												<select class="span12 m-wrap check_privacy" data-placeholder="Choose a Category" tabindex="1" name="sel_private" change_field="hob" >
												<option value="Public" <?php if($hob_privacy=='Public'){ ?> selected <?php } ?>>Public</option>
												<option value="Private" <?php if($hob_privacy=='Private'){ ?> selected <?php } ?>>Private</option>

												</select>
										</div>
								
								</div>
								
								
								   <div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
												Blood Group
										</div>
										<div class="span3"> 
												<select class="m-wrap m-ctrl-medium chosen" data-placeholder="Choose A Blood Group" name="blood_group">
											<option value="" style="display:none;"></option>
											<option value="1" <?php if(@$blood_group==1){ ?> selected <?php } ?>>  A+ </option>
											<option value="2" <?php if(@$blood_group==2){ ?> selected <?php } ?>>  B+ </option>
											<option value="3" <?php if(@$blood_group==3){ ?> selected <?php } ?>>  AB+  </option>
											<option value="4" <?php if(@$blood_group==4){ ?> selected <?php } ?>>  O+  </option>
											<option value="5" <?php if(@$blood_group==5){ ?> selected <?php } ?>>  A- </option>
											<option value="6" <?php if(@$blood_group==6){ ?> selected <?php } ?>>  B- </option>
											<option value="7" <?php if(@$blood_group==7){ ?> selected <?php } ?>>  AB-  </option>
											<option value="8" <?php if(@$blood_group==8){ ?> selected <?php } ?>>  O-  </option>
											</select>
										</div>
										
										<div class="span3"> 
											<select class="span12 m-wrap check_privacy" data-placeholder="Choose a Category" tabindex="1" name="sel_private" change_field="blood_group">
											<option value="Public" <?php if($blood_group_privacy=='Public'){ ?> selected <?php } ?>>Public</option>
											<option value="Private" <?php if($blood_group_privacy=='Private'){ ?> selected <?php } ?>>Private</option>
											</select>
										</div>
								
								</div>
								
								<div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
												Are you a medical professional ?
										</div>
										<div class="span3"> 
													 <label class="radio">
												<div class="radio" id="uniform-undefined"><span class="checked"><input type="radio" name="medical" value="1"  style="opacity: 0;" <?php  if($medical_pro==1){ ?>checked="" <?php } ?>></span></div>
												   Yes
												  </label>
													 <label class="radio">
												  <div class="radio" id="uniform-undefined"><span><input type="radio" name="medical" value="2" style="opacity: 0;"<?php  if($medical_pro==2){ ?>checked="" <?php } ?> ></span></div>
												 No
												  </label>
										</div>
										
										
								
								</div>
								
								<div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
												Your profile completeness
										</div>
										<div class="span3"> 
												<div id="bar" class="progress progress-success progress-striped" style="width:100%;">
												<div class="bar" style="width: <?php echo $progres ; ?>%;"></div>
												</div>
										</div>
										
										<div class="span3"> 
												<b><?php echo (int)$progres ; ?>% </b>
										</div>
								
								</div>
								
								<div class="span12"> 
									  <div align="center">
										<span style="color:red; font-size:10px;"> <i class=" icon-star"></i></span><span> Private:- Visible to Society Admin/Managing Committee only </span> | <span > Public:- Visible to all your society members</span>
		
										</div>
								  </div>
								
								<div class="controls controls-row">
										<div class="span3"> 
												
										</div>
										<div class="span3"> 
											<button type="submit" class="btn blue" name="sub" >Update</button> 	
										</div>
										
								
								</div>
								
                              </div>
                             </form> 
                           </div>
						
                        </div>
                     </div>
                  </div>
				  </div>
                  </div>
                  <!-- END SAMPLE FORM PORTLET-->
               </div>
            </div>
<div class="edit_div" style="display: none;">
<div class="modal-backdrop fade in"></div>
<div class="modal"  id="profile_edit_content">

</div>
</div>		
			
<script>

$(document).ready(function(){
	$( ".change_mobile" ).click(function() {
		var user_id = $(this).attr("member_update");
		
		$(".edit_div").show();
		$.ajax({
			url: "<?php echo $webroot_path; ?>/Hms/profile_mobile_verification/"+user_id,
			}).done(function(response) {
			$("#profile_edit_content").html(response);	
		});		
	});
	
	$(".save_edited").live("click",function() {
		var mob=$("#new_mobile").val();
		var user_id=$(this).attr("member_id");
		//$("#load_data").html('<div ><img src="<?php echo $this->webroot ; ?>/as/indicator_blue_small.gif" /><br/><h5>Please Wait</h5></div>');
		if($.isNumeric(mob)){
			
			if(mob.length!=10){
				$("#validation").html('Please enter at least 10 characters.');
			}else{
					$("#validation").html('');
					$("#load_data").html('');
					$.ajax({
					url: "<?php echo $webroot_path; ?>/Hms/profile_mobile_verification_already/"+user_id+"/"+mob,
					}).done(function(response) {
					if(response=="true"){
						$("#validation").html('');
						$.ajax({
						url: "<?php echo $webroot_path; ?>/Hms/profile_mobile_verification_send/"+user_id+"/"+mob,
						}).done(function(response) {
							$('#new_mobile').prop('readonly', true);
							$("#otp_code").html(response);
							$( ".save_edited" ).addClass("mobile_update");	
							$( ".mobile_update" ).removeClass("save_edited");					
						});	
						
						
						
					}else{
						$("#validation").html('Mobile-No is Already Exist.');
					}
				});	
			}
			
			
		}else{
			$("#validation").html('please fill only numeric value');
			$("#new_mobile").val('');
			
		}
		
		
		
	});
	
	
	$(".mobile_update").die().live("click",function() {
		
		var otp_number=$("#otp_number").val();
		var user_id=$(this).attr("member_id");
			if(otp_number==""){
				
				$("#validation_otp").html('Please fill 4 digit number');
			}else{
				$("#validation_otp").html('');
				
					$.ajax({
					url: "<?php echo $webroot_path; ?>/Hms/profile_mobile_update/"+user_id+"/"+otp_number,
					}).done(function(response) {
							
							if(response=="update"){
								
								window.location.href="profile";
							}else{
								
								$("#validation_otp").html('You have enter wrong digit');
							}
					});	
					
			}
	});	
	
	 $("#close_edit").live('click',function(){
		$(".edit_div").hide();
	 });
	 
		$( "select.check_privacy" ).change(function() {
			var update=$(this).val();
			var field=$(this).attr('change_field');
			$.ajax({
			url: "<?php echo $webroot_path; ?>/Hms/profile_check_private/"+update+"/"+field,
			}).done(function(response) {
				
		});		
		});	
		
		
		
$('#contact-form1').validate({
	    rules: {
	name: {
			required: true,
			
	      },

mobile1: {
			//required: true,
			number: true,
			minlength: 10,
			maxlength: 10,
			remote: "profile_mobile_check"
	      },
email: {
			//required: true,
			email : true,
			remote: "profile_email_check"
	      },

contact_emergency1: {
			number: true,
			minlength: 10,
			maxlength: 10,
			
	      },
		  
	    },
		
		messages: {
	                email: {
	                    remote: "Login-Id is Already Exist."
	                },
					 mobile1: {
	                    remote: "Mobile-No is Already Exist."
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