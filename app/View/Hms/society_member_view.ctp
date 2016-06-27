<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div align="right" style="margin-right: 25px;">
	<div class="pull-left" style="margin-left: 30px;">
	<span> Owner </span> - <span id="owner">  0 </span> |
	<span> Owner family member</span> - <span id="owner_family">  0 </span> |
	<span> Tenant </span> - <span id="tenant"> 0 </span> |
	<span> Tenant family member </span> - <span id="tenant_family"> 0 </span> |
	<span style="color:red; font-size:10px;" > <i class=" icon-star"></i></span><span> Awaiting User Validation </span> - <span id="awa_count"> 0 </span>  |
	<span style="color:blue; font-size:10px;"><i class=" icon-star-empty" ></i> </span> <span> Resident </span> -  <span id="resident">  0 </span> 
	
	</div>
	<a href="society_member_excel" class="blue mini btn" download="download"><i class="fa fa-file-excel-o"></i></a> 

</div> 
<div class="portlet box">
	<div class="portlet-body mobile_responce">
	<div align="center" style="font-size:15px;padding-bottom: 5px;"> 
		<?php echo $result_society_name; ?> 
	</div>
		<table class="table table-condensed table-bordered" id="sample_1" >
			<thead>
				<tr>
					<th width="5%">Sr.</th>
					<th>User Name</th>
					<th>unit</th>
					<th>Roles</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Validation Status</th>
					<th>Portal Enrollment date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php $sr_no=0;
			//pr($arranged_users); 
			$count_owner=0; $count_tenant=0; $count_family_owner=0;$resident_count=0;$count_family_tenant=0;$awating_count=0;
			foreach($arranged_users as $user_id=>$user_info){ 
				$user_name=$user_info["user_name"];
				$user_flat_id=$user_info["user_flat_id"];
				$user_id=$user_info["user_id"];
				$wing_flats=$user_info["wing_flat"];
				$roles=$user_info["roles"];
				$resident_member=$user_info["resident_member"];
							
				$count_member_owner_info=$user_info["count_member_owner"];
				$count_member_tenant_info=$user_info["count_member_tenant"];
				$count_member_family_owner=$user_info["count_member_family_owner"];
				$count_member_family_tenant=$user_info["count_member_family_tenant"];
				if(!empty($count_member_owner_info)){ $count_owner+=$count_member_owner_info; }
				if(!empty($count_member_tenant_info)){ $count_tenant+=$count_member_tenant_info; }
				if(!empty($count_member_family_owner)){ $count_family_owner+=$count_member_family_owner; }
				if(!empty($count_member_family_tenant)){ $count_family_tenant+=$count_member_family_tenant; }
				$email=$user_info["email"];
				$mobile=$user_info["mobile"];
				$validation_status=$user_info["validation_status"];
				$date=$user_info["date"];
				
				if(sizeof($wing_flats)>0){
					$q=0;
					foreach($wing_flats as $user_flat_id=>$wing_flat){ $sr_no++; ?>
						<tr>
							<td><?php echo $sr_no; if(!empty($resident_member)){ if(@$resident_member[$user_flat_id]==1){ $resident_count++; ?> <span style="color:blue; font-size:10px;" class="pull-right"> <i class=" icon-star-empty" ></i> </span> <?php } } ?>  </td>
							<td><?php echo $user_name; ?>  
							     <?php if(empty($validation_status)){ $awating_count++; ?>  
									<span style="color:red; font-size:10px;" class="pull-right"> <i class=" icon-star"></i> </span> 
								 <?php } ?>
							</td>
							<td><?php echo $wing_flat; ?></td>
							<td><?php echo $roles; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php echo $mobile; ?></td>
							<?php if(empty($validation_status)){
								if(!empty($email)){
									echo '<td><a href="#" role="button" class="resend btn red mini" id="'.$user_id.'" style="white-space: nowrap;">  Send Reminder </a></td>'; 
								}elseif(!empty($mobile)){
									echo '<td><a href="#" role="button" class="resend_sms btn red mini" id="'.$user_id.'" style="white-space: nowrap;">  Send Reminder </a></td>';
								}else{
									echo '<td></td>';
								}
							}else{
								echo '<td><a class="btn green mini">'.$validation_status.'</a></td>';
							} ?>
							<td><?php echo $date; ?></td>
							<td>
								<div class="btn-group" style="margin: 0px !important;">
								<a class="btn blue mini" href="#" data-toggle="dropdown">
								<i class="icon-chevron-down"></i>	
								</a>
								<ul class="dropdown-menu" style="min-width: 80px ! important; margin-left: -52px;">
									<li><a href="update_member_info/<?php echo $user_id; ?>" ><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="#" role="button" class="exit" user_flat_id="<?php echo $user_flat_id; ?>" style="color:red;"><i class=" icon-exclamation-sign "></i> Exit</a></li>
								</ul>
								</div>
							</td>
						</tr>
					<?php } 
				}else{ $sr_no++;  ?>
					<tr>
						<td ><?php echo $sr_no; if(!empty($resident_member)){ if(@$resident_member[$user_flat_id]==1){ $resident_count++; ?> <span style="color:blue; font-size:10px;" class="pull-right"> <i class=" icon-star-empty" ></i> </span> <?php } } ?>  </td>
						<td><?php echo $user_name; ?>
							<?php if(empty($validation_status)){ $awating_count++; ?>  
									<span style="color:red; font-size:10px;" class="pull-right"> <i class=" icon-star"></i> </span> 
								 <?php } ?>
						
						</td>
						<td></td>
						<td><?php echo $roles; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $mobile; ?></td>
						<?php if(empty($validation_status)){
							if(!empty($email)){
								echo '<td><a href="#" role="button" class="resend btn red mini" id="'.$user_id.'" style="white-space: nowrap;"> Send Reminder </a></td>'; 
							}elseif(!empty($mobile)){
								echo '<td><a href="#" role="button" class="resend_sms btn red mini" id="'.$user_id.'" style="white-space: nowrap;">  Send Reminder </a></td>';
							}else{
								echo '<td></td>';
							}
						}else{
							echo '<td><a class="btn green mini">'.$validation_status.'</a></td>';
						} ?>
						<td><?php echo $date; ?></td>
						<td>
							<div class="btn-group" style="margin: 0px !important;">
							<a class="btn blue mini" href="#" data-toggle="dropdown">
							<i class="icon-chevron-down"></i>	
							</a>
							<ul class="dropdown-menu" style="min-width: 80px ! important; margin-left: -52px;">
								<li><a href="update_member_info/<?php echo $user_id; ?>" ><i class="icon-pencil"></i> Edit</a></li>
								<li><a href="#" role="button" class="exit" user_flat_id="<?php echo $user_flat_id; ?>"  style="color:red;"><i class=" icon-exclamation-sign" ></i> Exit</a></li>
							</ul>
							</div>
						</td>
					</tr>
				<?php } ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div id="confirm" style="display:none;">
	<div class="modal-backdrop fade in"></div>
	<div style="display: block;" class="modal hide fade in" >
		<div class="modal-body">
			<p>Are you sure you want to exit this user ?</p>
		</div>
		<div class="modal-footer">
			<button class="btn" id="close">Close</button>
			<button class="btn blue" id="exit_user" user_flat_id="0">Confirm</button>
		</div>
	</div>
</div>
<div id="success" style="display:none;">

</div>

<div id="total_member_info" owner_count="<?php echo $count_owner; ?>" tenant_count="<?php echo $count_tenant; ?>" count_family_tenant="<?php echo $count_family_tenant; ?>" resident_count="<?php echo $resident_count; ?>" count_family_owner="<?php echo $count_family_owner; ?>" awating_count="<?php echo $awating_count; ?>"> </div>

<script>
$(document).ready(function(){
	
		var ow= $("#total_member_info").attr("owner_count");
		var te= $("#total_member_info").attr("tenant_count");
		var t_fa= $("#total_member_info").attr("count_family_tenant");
		var o_fa= $("#total_member_info").attr("count_family_owner");
		var re= $("#total_member_info").attr("resident_count");
		var aw= $("#total_member_info").attr("awating_count");
		$("#owner").html(ow);
		$("#tenant").html(te);
		$("#owner_family").html(o_fa);
		$("#tenant_family").html(t_fa);
		$("#resident").html(re);
		$("#awa_count").html(aw);
		
	 $(".resend").bind('click',function(){
		var id=$(this).attr('id');
		$(this).html('Sending Email...').load( 'resident_approve_resend_mail?con=' + id, function() {
		$(this).closest( "td" ).append( "<strong>Email sent.</strong>" );
		$(this).remove();
		});
	 });
	
	$(".resend_sms").bind('click',function(){
		var id=$(this).attr('id');
		
		$(this).html('Sending Sms...').load( 'resident_approve_resend_sms?con=' + id, function() {
		$(this).closest( "td" ).append( "<strong>Sms sent.</strong>" );
		$(this).remove();
		});
	 });
	 
	
	$(".exit").on("click",function(){
		$("#confirm").show();
		var user_flat_id=$(this).attr("user_flat_id");
		$("#exit_user").attr("user_flat_id",user_flat_id);
	});
	$("#close").die().live("click",function(){
		$("#confirm").hide();
		$("#success").hide();
		var user_flat_id=$(this).attr("user_flat_id");
		var exited=$(this).attr("exited");
		if(exited=="yes"){
			$(".exit[user_flat_id="+user_flat_id+"]").closest("td").text("Exited");
		}
	});
	$("#exit_user").on("click",function(){
		var user_flat_id=$(this).attr("user_flat_id");
		$.ajax({
			url: "exit_user/"+user_flat_id,
		}).done(function(response){
			
			$("#confirm").hide();
			$("#success").html(response);
			$("#success").show();
		});
	});
});
</script>