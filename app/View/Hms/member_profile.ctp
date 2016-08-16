<?php


$result_member_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_flat_id'),array('pass'=>array((int)$user_flat_id)));

	$wing_flat=$result_member_info["wing_flat"];
	$owner=$result_member_info["owner"];
	
	$result_user=$result_member_info["result_user"];
	
	$result_user_profile=$result_member_info["result_user_profile"];
	
	$user_id=(int)$result_user[0]['user']['user_id'];
	$user_name=$result_user[0]['user']['user_name'];
	$email=$result_user[0]['user']['email'];
	$mobile=$result_user[0]['user']['mobile'];
	$email_privacy=@$result_user[0]['user']['email_privacy'];
	$mobile_privacy=@$result_user[0]['user']['mobile_privacy'];
	$profile_pic=@$result_user[0]['user']['profile_pic'];
	$f_profile_pic = @$result_user[0]['user']['f_profile_pic'];
	$g_profile_pic = @$result_user[0]['user']['g_profile_pic'];
	
	$age_privacy = @$result_user_profile[0]['user_profile']['age_privacy'];
	$communication_address_privacy = @$result_user_profile[0]['user_profile']['communication_address_privacy'];
	$hob_privacy = @$result_user_profile[0]['user_profile']['hob_privacy'];
	$per_address_privacy = @$result_user_profile[0]['user_profile']['per_address_privacy'];
	
	$da_dob=@$result_user_profile[0]['user_profile']['age'];
	$per_address=@$result_user_profile[0]['user_profile']['per_address'];
	$com_address=@$result_user_profile[0]['user_profile']['comm_address'];
	$hobbies=@$result_user_profile[0]['user_profile']['hobbies'];
	$blood_group=@$result_user_profile[0]['user_profile']['blood_group'];
	
	$medical_pro = @$result_user_profile[0]['user_profile']['medical_pro'];
		if($medical_pro==1){ $medical="Yes"; }
		if($medical_pro==2){ $medical="No"; }
		
		if(!empty($hobbies)){
					
				foreach($hobbies as $data){
					$hobbies_name[] = $this->requestAction(array('controller' => 'hms', 'action' => 'hobbies_category_fetch'),array('pass'=>array((int)$data)));		
				
				}
					$hobbies=implode(', ',$hobbies_name);
		 }	
		
		$result_role=$this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_all_role_via_user_id'),array('pass'=>array($user_id)));
		$role_id[]=$result_role[0]['user_role']['role_id'];
		
		if(in_array(2,$role_id)){
			$commitee="Yes";
		}else{
			$commitee="No";
		}
		if($da_dob==1){ $age_group="18-24"; }
		if($da_dob==2){ $age_group="25-34"; }
		if($da_dob==3) { $age_group="35-44"; }
		if($da_dob==4){ $age_group="45-54"; }
		if($da_dob==5) { $age_group="55-64"; }
		if($da_dob==6){ $age_group="65+"; }
			
		if($blood_group==1){ $b_group="A+"; }
		if($blood_group==2){ $b_group="B+"; }
		if($blood_group==3){ $b_group="AB+"; }
		if($blood_group==4){ $b_group="O+"; }
		if($blood_group==5){ $b_group="A-"; }
		if($blood_group==6){ $b_group="B-"; }
		if($blood_group==7){ $b_group="AB-"; }
		if($blood_group==8){ $b_group="O-"; }
		if($email_privacy=="Private"){ 
			if($user_id!=$s_user_id){
				$email="*";
				
			}
		}
		if($mobile_privacy=="Private"){ 
			if($user_id!=$s_user_id){
				$mobile="*";
				
			}
		}
		if($communication_address_privacy=="Private"){ 
			if($user_id!=$s_user_id){
				$com_address="*";
				
			}
		}
		if($per_address_privacy=="Private"){ 
			if($user_id!=$s_user_id){
				$per_address="*";
				
			}
		}
		if($hob_privacy=="Private"){ 
			if($user_id!=$s_user_id){
				$hobbies="*";
				
			}
		}
		if($age_privacy=="Private"){ 
			if($user_id!=$s_user_id){
				$age_group="*";
				
			}
		}

?>


<div style="padding-left: 2px;">
<a href="<?php echo $webroot_path ; ?>hms/resident_directory" role="button" rel='tab' class="btn blue" > Back </a> </div>
<center>
<div class="portlet-body profile_responsive" style="width:65%; background-color: #FFF;">
	<div class="controls controls-row visible-phone">
		<div class="span12" >
			<div style="width:50%">
				<?php if(!empty($profile_pic) and $profile_pic!="blank.jpg"){ ?>
					<img src="<?php echo $webroot_path ; ?>/profile/<?php echo $profile_pic; ?>" style="width:100%; height:160px;">
					<?php } elseif(!empty($f_profile_pic)){ ?>
					<img src="<?php echo $f_profile_pic ; ?>" style="width:100%; height:160px;">

					<?php } elseif(!empty($g_profile_pic)){ ?>
					<img src="<?php echo $g_profile_pic ; ?>" style="width:100%; height:160px;">
					<?php } elseif(empty($g_profile_pic) and empty($f_profile_pic)){ if(empty($profile_pic)){ $profile_pic="blank.jpg"; } ?>
					<img src="<?php echo $webroot_path ; ?>/profile/<?php echo $profile_pic; ?>" style="width:100%; height:160px;"> <?php } ?>  
			</div>
		</div>
	</div>
	<table class="table  table-bordered table-advance table-hover">

		<tbody>
			<tr>
				<td rowspan="4" width="30%"  valign="top" class="hidden-phone">


					<?php if(!empty($profile_pic) and $profile_pic!="blank.jpg"){ ?>
					<img src="<?php echo $webroot_path ; ?>/profile/<?php echo $profile_pic; ?>" style="width:100%; height:160px;">
					<?php } elseif(!empty($f_profile_pic)){ ?>
					<img src="<?php echo $f_profile_pic ; ?>" style="width:100%; height:160px;">

					<?php } elseif(!empty($g_profile_pic)){ ?>
					<img src="<?php echo $g_profile_pic ; ?>" style="width:100%; height:160px;">
					<?php } elseif(empty($g_profile_pic) and empty($f_profile_pic)){ if(empty($profile_pic)){ $profile_pic="blank.jpg"; } ?>
					<img src="<?php echo $webroot_path ; ?>/profile/<?php echo $profile_pic; ?>" style="width:100%; height:160px;"> <?php } ?>         

				</td>
				<td style="border-left: 1px solid #ddd;">
					<label>Name</label>
				</td>
				<td class="">&nbsp&nbsp<?php echo $user_name; ?></td>


			</tr>
			<tr>
				<td><label>Unit</label></td>
				<td class="">&nbsp&nbsp<?php echo $wing_flat ; ?></td>

			</tr>

			<tr>
				<td><label>Mobile</label></td>
				<td class="">&nbsp&nbsp<?php echo  $mobile; ?></td>

			</tr>

			<tr>
				<td><label>Email</label></td>
				<td class="">&nbsp&nbsp<?php echo $email; ?> </td>

			</tr>

		</tbody>
	</table>

<br>
	<div>
		<p style="font-size:18px; color:#666;">Other Information</p>
	</div>

	<table class="table  table-bordered table-advance table-hover">

		<tbody>
			<tr>
				<td width="20%">
				</td>
				<td width="30%">
				<p style=" font-size:14px; color:#666;">Commitee Member</p>	
				</td>
				<td width="20%">
				</td>
				<td class="" width="30%">
				<?php echo $commitee ; ?>
				</td>


			</tr>
			<tr>
					<td width="20%">
					</td>
					<td width="30%">
						<p style=" font-size:14px; color:#666;">Owner</p>	
					</td>
					<td width="20%">
					</td>
					<td class="" width="30%">
						<?php echo $owner ; ?>
					</td>


			</tr>

			<tr>
				<td width="20%">
				</td>
				<td width="30%">
					<p style=" font-size:14px; color:#666;">Society</p>	
				</td>
				<td width="20%">
				</td>
				<td class="" width="30%">
					<?php echo $society_name ; ?>
				</td>


			</tr>

			<tr>
				<td width="20%">
				</td>
				<td width="30%">
					<p style=" font-size:14px; color:#666;">Age Group</p>	
				</td>
				<td width="20%">
				</td>
				<td class="" width="30%">
					<?php echo @$age_group ; ?>
				</td>


			</tr>

	
			<tr>
					<td width="20%">
					</td>
					<td width="30%">
						<p style=" font-size:14px; color:#666;">Permanent address:	</p>
					</td>
					<td width="20%">
					</td>	
					<td class="" width="30%">
						<?php echo $per_address; ?>
					</td>

			</tr> 


			<tr>
				<td width="20%">
				</td>	
				<td>
					<p style=" font-size:14px; color:#666;">Communication address:</p>
				</td>
				<td width="20%">
				</td>
				<td class="" width="30%">
					<?php echo $com_address; ?>
				</td>

			</tr>


			<tr>
				<td width="20%">
				</td>	
				<td>
					<p style=" font-size:14px; color:#666;">Hobbies:</p>
				</td>
				<td width="20%">
				</td>
				<td class="" width="30%">
					<?php echo $hobbies; ?>
				</td>

			</tr>
			
			<tr>
				<td width="20%">
				</td>	
				<td>
					<p style=" font-size:14px; color:#666;">Blood Group:</p>
				</td>
				<td width="20%">
				</td>
				<td class="" width="30%">
					<?php echo @$b_group; ?>
				</td>

			</tr>

			<?php if(@$medical_pro==1){ ?>
			<tr>
				<td width="20%">
				</td>	
				<td>
					<p style=" font-size:14px; color:#666;">Medical Profession</p>

				</td>
				<td width="20%">
				</td>
				<td class="" width="30%">
					<?php echo @$medical; ?>
				</td>

			</tr>
			<?php } ?>

		</tbody>
	</table>
</div>
</center>