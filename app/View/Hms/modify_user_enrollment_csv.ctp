<style>

input.m-wrap[type="text"]{
	background-color:#FFF !important;
}
</style>
<div style="background-color:#FFF;">
<table id="report_tb" class="table table-bordered table-condensed" width="100%">
	<thead>
	<tr>
		<th>Name</th>
		<th>Unit</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Owner</th>
		<th>Committee</th>
		<th>Delete</th>
	</tr>
	</thead>
	</tbody>
	<?php foreach($user_enrollment_csv_converted as $user_enrollment_converted){ 
		$auto_id=$user_enrollment_converted["user_enrollment_csv_converted"]["auto_id"];
		$name=$user_enrollment_converted["user_enrollment_csv_converted"]["name"];
		$wing=(int)$user_enrollment_converted["user_enrollment_csv_converted"]["wing"];
		$email=$user_enrollment_converted["user_enrollment_csv_converted"]["email"];
		$mobile=$user_enrollment_converted["user_enrollment_csv_converted"]["mobile"];
		 $owner=$user_enrollment_converted["user_enrollment_csv_converted"]["owner"];
		 $committee=$user_enrollment_converted["user_enrollment_csv_converted"]["committee"];
		$flat=(int)$user_enrollment_converted["user_enrollment_csv_converted"]["flat"];
		
		?>
	<tr id="<?php echo $auto_id; ?>">
		<td valign="top">
			<div class="name">
			<input class="m-wrap span12" style="background-color:white !important;" id="datt1" value="<?php echo $name; ?>" type="text" placeholder="Name" record_id="<?php echo $auto_id; ?>" field="name" />
			</div>
		</td>
		<td valign="top">
			<div class="unit">
			<select class="m-wrap wing_flat" style="width=100%;" record_id="<?php echo $auto_id; ?>" field="flat">
				<option value="" style="display:none;">Select...</option>
				 <?php
				foreach($flat_set as $key=>$value){
					$wing_flat_exp=explode(',',$key);
					$wing_id=$wing_flat_exp[0];
					$flat_id=$wing_flat_exp[1];
					?>
					<option value="<?php echo $wing_id; ?>,<?php echo $flat_id; ?>" <?php if($wing_id==$wing and $flat_id==$flat){ ?> selected <?php } ?>><?php echo $value; ?></option>
					<?php }  ?>
			</select>
			</div>
		</td>
		<td valign="top">
			<div class="email">
				<input class=" m-wrap span12" style="background-color:white !important;" id="datt1" value="<?php echo $email; ?>" type="text" placeholder="Email" record_id="<?php echo $auto_id; ?>" field="email" />
			</div>
			
			
		</td>
		<td valign="top">
			<div class="mobile_new">
				<input class="m-wrap span12"  style="background-color:white !important;" id="datt1" value="<?php echo $mobile; ?>" type="text" placeholder="Mobile" record_id="<?php echo $auto_id; ?>" field="mobile" />
			</div>
		</td>
		<td valign="top">
			<div class="owner">
				<select class="m-wrap span12 owner_tenant " record_id="<?php echo $auto_id; ?>" field="owner" >
				<option value="">Select</option>
				<option value="yes" <?php if($owner=="yes"){?> selected <?php } ?>>Yes</option>
				<option value="no" <?php if($owner=="no"){?> selected <?php } ?>>No</option>
				</select>
			</div>
		</td>
		<td valign="top">
			<div class="committee" <?php if($owner=="no") { ?> style="display:none" <?php } ?>>
				<select class="m-wrap span12 " record_id="<?php echo $auto_id; ?>" field="committee">
				
				<option value="yes" <?php if($committee=="yes"){?> selected <?php } ?>>Yes</option>
				<option value="no" <?php if($committee=="no"){?> selected <?php } ?> >No</option>
				</select>
			</div>
		</td>
		
		<td valign="top">
			<a href="#" class="btn mini black delete_row" record_id="<?php echo $auto_id; ?>" role="button"><i class="icon-trash"></i></a>
		</td>
	</tr>
	<?php } ?>
	</tbody>
</table>
</div>
<?php if(empty($page)){ $page=1;} ?>
<div >
	<span>Showing page:</span><span> <?php echo $page; ?></span> <br/>
	<span>Total entries: <?php echo ($count_user_enrollment_csv_converted); ?></span>
</div>
<div class="pagination pagination-large ">
<ul>
<?php 
$loop=(int)($count_user_enrollment_csv_converted/50);
if($count_user_enrollment_csv_converted%20>0){
	$loop++;
}
for($ii=1;$ii<=$loop;$ii++){ ?>
	<li><a href="<?php echo $webroot_path; ?>Hms/modify_user_enrollment_csv/<?php echo $ii; ?>" rel='tab' role="button" ><?php echo $ii; ?></a></li>
<?php } ?>
</ul>
</div>
<br/>
<div align="center" id="submit_sec">
<a class="btn purple " role="button" id="final_import">Import user enrollment <i class="m-icon-swapright m-icon-white"></i></a>	<a class="btn cancel_user">Cancel</a>					
<div id="check_validation_result"></div>
</div>
<input type="hidden" id="email_valid1">
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script>
$(document).ready(function() {
	$("select.wing_flat").chosen();
	
	$( ".cancel_user" ).click(function() {
		
			var answer = confirm ("Confirm, Are you want to cancel user enrollment ? .")
			if(answer){
				$.ajax({
				url: "<?php echo $webroot_path; ?>Hms/cancel_user_enrollment",
				}).done(function(response){
					if(response=="ok"){
						window.location.href="<?php echo $webroot_path; ?>Hms/import_user_enrollment";
					}
				});
				
			}
	});
	
	
	
	$( ".owner_tenant" ).die().change(function() {
		
		var sel=$(this).val();
		if(sel=="yes"){
			$(this).closest("tr").find(".committee").show();
		}else{
			$(this).closest("tr").find(".committee").hide();
		}
			
		
		
	});
	
	$( "#final_import" ).click(function(){
		var allow="yes";
		
		//Start mobile number validation//
		$('#report_tb tbody tr input[field=mobile]').each(function(i, obj){
			var mobile=$(this).val();
				if(mobile==""){
					$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').find(".er").remove();
				}else{
					var result;	
					$.ajax({
							url:"<?php echo $webroot_path; ?>Hms/mobile_validation_with_table/"+mobile, 
							async: false,
							success: function(data){
							result=data;
							}
						});
						if(result == 'match'){
							    allow='no';
								$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').find(".er").remove();
								$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').append('<p class="er">Already Exist</p>');
						}
						else if(result=='match_overlap'){
							    allow='no';
								$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').find(".er").remove();
								$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').append('<p class="er">Overlap mobile</p>');
							
						}
						else{
								$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').find(".er").remove();	
					}
				}
	});
		
	/*	
	$('#report_tb tbody tr input[field=mobile]').each(function(i, obj){
		var mobile=$(this).val();
			if(mobile==""){
				$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').find(".er").remove();
			}else{
				var result;	
					$.ajax({
							url:"<?php echo $webroot_path; ?>Hms/mobile_overlap_validation/"+mobile, 
							async: false,
							success: function(data){
								result=data;
							}
						});
						if(result == 'match'){
							allow='no';
								$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').find(".er").remove();
								$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').append('<p class="er">Overlap Mobile</p>');
						}else{
								$('#report_tb tbody tr:eq('+i+') input[field=mobile]').closest('td').find(".er").remove();	
					}
				}
	});	
		*/
		
		//End mobile number validation//
		
		//Start Email Validation//
		$('#report_tb tbody tr input[field=email]').each(function(i, obj){
		var email=$(this).val();
			if(email==""){
				$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').find(".er").remove();
			}else{
				var result;	
					$.ajax({
							url:"<?php echo $webroot_path; ?>Hms/user_enrolment_validation_with_table/"+email, 
							async: false,
							success: function(data){
							result=data;
							}
						});
						if(result=='match'){
							allow='no';
								$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').find(".er").remove();
								$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').append('<p class="er">Already Exist</p>');
						}else if(result=='match_overlap'){
							allow="no";
							$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').find(".er").remove();
							$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').append('<p class="er">Overlap Email</p>');
						}else{
								$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').find(".er").remove();	
					}
				}
	}); 
			/*$('#report_tb tbody tr input[field=email]').each(function(i, obj){
				var email=$(this).val();
					if(email==""){
					$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').find(".er").remove();
					}else{
					var result;	
					$.ajax({
							url:"<?php echo $webroot_path; ?>Hms/email_overlap_validation/"+email, 
							async: false,
							success: function(data){
								result=data;
							}
						});
						if(result == 'match'){
							allow='no';
								$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').find(".er").remove();
								$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').append('<p class="er">Overlap Email</p>');
						}else{
								$('#report_tb tbody tr:eq('+i+') input[field=email]').closest('td').find(".er").remove();	
					}
				}
	});  */	
		
		
		
		//End Email Validation//
		
		//Start Wing Flat Validation//
		
		$('#report_tb tbody tr select[field=flat]').each(function(i, obj){
			var flat=$(this).val();
			var owner_type=$('#report_tb tbody tr:eq('+i+') select[field=owner]').val();
			
				if(flat==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
						allow="no";
				}else{
					$.ajax({
							url:"<?php echo $webroot_path; ?>Hms/wing_flat_validation/"+flat+"/"+owner_type, 
							async: false,
							success: function(data){
							result=data;
							}
						});
					if(result=='self_occupied'){
						allow="no";
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').find(".er").remove();
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').append('<p class="er">Flat Self Occupied</p>'); 
					 }
					 if(result=='owner_already'){
						 allow="no";
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').find(".er").remove();
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').append('<p class="er">Flat Already Exist</p>');  
					 }
					 if(result=='tenant_already'){
						 allow="no";
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').find(".er").remove();
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').append('<p class="er">Flat Already Exist</p>'); 
					 }
					 if(result=='already_exist'){
						 allow="no";
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').find(".er").remove();
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').append('<p class="er">Flat Already Exist</p>'); 
					 }
					 if(result='match_overlap'){
						 allow="no";
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').find(".er").remove();
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').append('<p class="er">Flat Overlap</p>');  
					 }
					 if(result=='not_match'){
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').find(".er").remove(); 
					 }
				}
		});
		
		
		/*
		$('#report_tb tbody tr select[field=flat]').each(function(i, obj){
			var flat=$(this).val();
			var owner_type=$('#report_tb tbody tr:eq('+i+') select[field=owner]').val();
			
				if(flat==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
						allow="no";
				}else{
					$.ajax({
							url:"<?php echo $webroot_path; ?>Hms/wing_flat_overlap_validation/"+flat+"/"+owner_type, 
							async: false,
							success: function(data){
							result=data;
							}
						});
						
                        if(result=='match'){
							
							allow="no";
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').find(".er").remove();
						$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').append('<p class="er">Flat overlap</p>'); 
						
						}else{
							$('#report_tb tbody tr:eq('+i+') select[field=flat]').closest('td').find(".er").remove();
						}
					 
				}
		});
		
		*/
		
		
		//End Wing Flat Validation//
	   
		$('#report_tb tbody tr input[field=name]').each(function(i, obj){
			var name=$(this).val();
				if(name==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
					allow="no";
				}else{
					$(this).closest('td').find(".er").remove();
				}
		});
		
		
		
		
		
		$('#report_tb tbody tr select[field=owner]').each(function(i, obj){
			var owner=$(this).val();
				if(owner==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
					allow="no";
				}else{
					$(this).closest('td').find(".er").remove();
				}
		});
		
			if(allow=="yes"){
				$.ajax({
					url: "<?php echo $webroot_path; ?>Hms/allow_user_enrollment",
					}).done(function(response){
						if(response=="F"){
							$("#check_validation_result").html("");
								alert("Your Data Is Not Validate.");
							}else{
								change_page_automatically("<?php echo $webroot_path; ?>Hms/import_user_enrollment");
							}
				});
			}else{
			$("#submit_sec").find(".alert-error").remove();
			$("#final_import").before('<div class="alert alert-error" style="width: 50%;">There are errors above, marked with red color.</div>');	
		}
	});
});

function change_page_automatically(pageurl){
	$("#loading").show();

	$.ajax({
		url: pageurl,
		}).done(function(response) {
		
		//$("#loading_ajax").html('');
		
		$(".page-content").html(response);
		$("#loading").hide();
		$("html, body").animate({
			scrollTop:0
		},"slow");
		 $('#submit_success').hide();
		});
	
	window.history.pushState({path:pageurl},'',pageurl);
}

$( document ).ready(function() {
	/*
    $.ajax({
		url: "<?php echo $webroot_path; ?>Hms/check_user_enrollment_validation/<?php echo $page; ?>",
		//dataType: 'json'
	}).done(function(response){
		alert(response);
		response.forEach(function(item) {
			
			if(item[0]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(1) .transaction").css("border", "solid 1px red","!important"); }
			if(item[1]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(2) .deposited").css("border", "solid 1px red","!important"); }
			if(item[2]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(3) .receipt_m").css("border", "solid 1px red","!important"); }
			if(item[3]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(3) .cheque_utr").css("border", "solid 1px red","!important"); }
			if(item[4]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(3) .date").css("border", "solid 1px red","!important"); }
			if(item[5]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(3) .drown").css("border", "solid 1px red","!important"); }
			if(item[6]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(3) .branch").css("border", "solid 1px red","!important"); }
			if(item[7]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(4) .member").css("border", "solid 1px red","!important"); }
			if(item[8]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(5) .amount").css("border", "solid 1px red","!important"); }
			if(item[9]==1){ $("table#report_tb tr#"+item[9]+" td:nth-child(6) .r_type").css("border", "solid 1px red","!important"); }
		});
	}); */
});

$( document ).ready(function() {
	
	$('input[type="text"]').blur(function() {
		var record_id=$(this).attr("record_id");
		var field=$(this).attr("field");
		var value=$(this).val();
		
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/auto_save_user_enrollment/"+record_id+"/"+field+"/"+value,
		}).done(function(response){
			
			if(response=="F"){
				$("table#report_tb tr#"+record_id+" td").each(function(){
					$(this).find('input[field="'+field+'"]').parent("div").css("border", "solid 1px red");
				});
			}else{
				$("table#report_tb tr#"+record_id+" td").each(function(){
					$(this).find('input[field="'+field+'"]').parent("div").css("border", "");
				});
			}
		}); 
	});
	
	$( 'select' ).change(function() {
		var record_id=$(this).attr("record_id");
		var field=$(this).attr("field");
		var value=$("option:selected",this).val();
		
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/auto_save_user_enrollment/"+record_id+"/"+field+"/"+value,
		}).done(function(response){
			if(response=="F"){
				$("table#report_tb tr#"+record_id+" td").each(function(){
					$(this).find('select[field="'+field+'"]').parent("div").css("border", "solid 1px red");
				});
			}else{
				$("table#report_tb tr#"+record_id+" td").each(function(){
					$(this).find('select[field="'+field+'"]').parent("div").css("border", "");
				});
			}
		}); 
	}); 
	
});

$(document).ready(function(){
	$( '.delete_row' ).click(function() {
		var record_id=$(this).attr("record_id");
		$(this).closest("tr").remove();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/delete_user_enrollment_row/"+record_id,
		}).done(function(response){
			
		});
	});
});
</script>
<style>
.er{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>









