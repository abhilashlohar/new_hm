<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div align="right" style="margin-right: 25px;">
	<div class="pull-left">
		<span style="color:red; font-size:14px;" > <i class=" icon-star"></i></span><span> Awaiting User Validation  </span> 
	</div>
	<a href="society_member_excel" class="blue mini btn" download="download"><i class=" icon-download-alt"></i> </a> 

</div> 
<div class="portlet box">
	<div class="portlet-body">
	<div align="center" style="font-size:18px;padding-bottom: 10px;"> 
		<?php echo $result_society_name; ?> 
	</div>
		<table class="table table-condensed table-bordered" >
			<thead>
				<tr>
					<th>Sr.</th>
					<th>User Name</th>
					<th>unit</th>
					<th>Roles</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Validation Status</th>
					<th>Portal Enrollment date</th>
					<th>Exit</th>
				</tr>
			</thead>
			<tbody>
			<?php $sr_no=0;
			foreach($arranged_users as $user_id=>$user_info){ $sr_no++;
				$user_name=$user_info["user_name"];
				$user_flat_id=$user_info["user_flat_id"];
				$wing_flats=$user_info["wing_flat"];
				$roles=$user_info["roles"];
				$email=$user_info["email"];
				$mobile=$user_info["mobile"];
				$validation_status=$user_info["validation_status"];
				$date=$user_info["date"];
				if(sizeof($wing_flats)>0){
					$q=0;
					foreach($wing_flats as $user_flat_id=>$wing_flat){ $q++; 
					if($q==1){?>
						<tr>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $sr_no; ?></td>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $user_name; ?>  
							     <?php if(empty($validation_status)){ ?>  
									<span style="color:red; font-size:10px;" class="pull-right"> <i class=" icon-star"></i> </span> 
								 <?php } ?>
							</td>
							<td><?php echo $wing_flat; ?></td>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $roles; ?></td>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $email; ?></td>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $mobile; ?></td>
							<?php if(empty($validation_status)){
								if(!empty($email)){
									echo '<td rowspan='.sizeof($wing_flats).'><a href="#" role="button" class="resend" id="'.$user_id.'"> <span class="btn red mini"><i class=" icon-exclamation-sign"></i> Send Reminder </span></a></td>'; 
								}elseif(!empty($mobile)){
									echo '<td rowspan='.sizeof($wing_flats).'><a href="#" role="button" class="resend_sms" id="'.$user_id.'"> <span class="btn red mini"><i class=" icon-exclamation-sign"></i> Send Reminder </span></a></td>';
								}else{
									echo '<td rowspan="'.sizeof($wing_flats).'"></td>';
								}
							}else{
								echo '<td rowspan='.sizeof($wing_flats).'><span class="btn green mini"><i class=" icon-ok"></i> '.$validation_status.'</span></td>';
							} ?>
							<td rowspan="<?php echo sizeof($wing_flats); ?>"><?php echo $date; ?></td>
							<td><a href="#" role="button" class="btn red mini exit" user_flat_id="<?php echo $user_flat_id; ?>"><i class=" icon-exclamation-sign"></i> Exit</a></td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td><?php echo $wing_flat; ?></td>
							<td><a href="#" role="button" class="btn red mini exit" user_flat_id="<?php echo $user_flat_id; ?>"><i class=" icon-exclamation-sign"></i> Exit</a></td>
						</tr>
					<?php } ?>
					
					<?php } 
				}else{ ?>
					<tr>
						<td><?php echo $sr_no; ?></td>
						<td><?php echo $user_name; ?>
							<?php if(empty($validation_status)){ ?>  
									<span style="color:red; font-size:10px;" class="pull-right"> <i class=" icon-star"></i> </span> 
								 <?php } ?>
						
						</td>
						<td></td>
						<td><?php echo $roles; ?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $mobile; ?></td>
						<?php if(empty($validation_status)){
							if(!empty($email)){
								echo '<td rowspan='.sizeof($wing_flats).'><a href="#" role="button" class="resend" id="'.$user_id.'"> <span class="btn red mini"><i class=" icon-exclamation-sign"></i> Send Reminder </span></a></td>'; 
							}elseif(!empty($mobile)){
								echo '<td rowspan='.sizeof($wing_flats).'><a href="#" role="button" class="resend_sms" id="'.$user_id.'"> <span class="btn red mini"><i class=" icon-exclamation-sign"></i> Send Reminder </span> </a></td>';
							}else{
								echo '<td></td>';
							}
						}else{
							echo '<td><span class="btn green mini"><i class=" icon-ok"></i>'.$validation_status.'</span></td>';
						} ?>
						<td><?php echo $date; ?></td>
						<td><a href="#" role="button" class="btn red mini exit" user_flat_id="<?php echo $user_flat_id; ?>"><i class=" icon-exclamation-sign"></i> Exit</a></td>
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
			<p>Confirm Message</p>
		</div>
		<div class="modal-footer">
			<button class="btn" id="close">Close</button>
			<button class="btn blue" id="exit_user" user_flat_id="0">Confirm</button>
		</div>
	</div>
</div>
<div id="success" style="display:none;">

</div>
<script>
$(document).ready(function(){
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