<div class="portlet-body" style="width:65%;">
	<table class="table table-striped table-bordered table-advance table-hover">

		<tbody>
			<tr>
				<td rowspan="4" width="30%"  valign="top">


					<?php if(!empty($profile_pic) and $profile_pic!="blank.jpg"){ ?>
					<img src="<?php echo $webroot_path ; ?>/profile/<?php echo $profile_pic; ?>" style="width:100%; height:160px;">
					<?php } elseif(!empty($f_profile_pic)){ ?>
					<img src="<?php echo $f_profile_pic ; ?>" style="width:100%; height:160px;">

					<?php } elseif(!empty($g_profile_pic)){ ?>
					<img src="<?php echo $g_profile_pic ; ?>" style="width:100%; height:160px;">
					<?php } elseif(empty($g_profile_pic) and empty($f_profile_pic)){ if(empty($profile_pic)){ $profile_pic="blank.jpg"; } ?>
					<img src="<?php echo $webroot_path ; ?>/profile/<?php echo $profile_pic; ?>" style="width:100%; height:160px;"> <?php } ?>         

				</td>
				<td>
					<label>Name</label>
				</td>
				<td class="hidden-phone">&nbsp&nbsp<?php echo $c_name; ?></td>


			</tr>
			<tr>
				<td><label>Unit</label></td>
				<td class="hidden-phone">&nbsp&nbsp<?php echo $wing_flat ; ?></td>

			</tr>

			<tr>
				<td><label>Mobile</label></td>
				<td class="hidden-phone">&nbsp&nbsp<?php echo  $c_mobile; ?></td>

			</tr>

			<tr>
				<td><label>Email</label></td>
				<td class="hidden-phone">&nbsp&nbsp<?php echo $c_email; ?> </td>

			</tr>

		</tbody>
	</table>

<br>
	<div>
		<p style="font-size:18px; color:#666;">Other Information</p>
	</div>

	<table class="table table-striped table-bordered table-advance table-hover">

		<tbody>
			<tr>
				<td width="20%">
				</td>
				<td width="30%">
				<p style=" font-size:14px; color:#666;">Commitee Member</p>	
				</td>
				<td width="20%">
				</td>
				<td class="hidden-phone" width="30%">
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
					<td class="hidden-phone" width="30%">
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
				<td class="hidden-phone" width="30%">
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
				<td class="hidden-phone" width="30%">
					<?php echo @$age_group ; ?>
				</td>


			</tr>

	<?php if($role_id==3) { ?>
			<tr>
					<td width="20%">
					</td>
					<td width="30%">
						<p style=" font-size:14px; color:#666;">Permanent address:	</p>
					</td>
					<td width="20%">
					</td>	
					<td class="hidden-phone" width="30%">
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
				<td class="hidden-phone" width="30%">
					<?php echo $com_address; ?>
				</td>

			</tr> <?php } ?>


			<tr>
				<td width="20%">
				</td>	
				<td>
					<p style=" font-size:14px; color:#666;">Hobbies:</p>
				</td>
				<td width="20%">
				</td>
				<td class="hidden-phone" width="30%">
					<?php echo $hobbies; ?>
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
				<td class="hidden-phone" width="30%">
					<?php echo @$medical; ?>
				</td>

			</tr>
			<?php } ?>

		</tbody>
	</table>
</div>