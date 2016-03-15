<style>

input.m-wrap[type="text"]{
	background-color:#FFF !important;
}
</style>
<div style="background-color:#FFF;">
<table id="report_tb" class="table table-bordered table-striped" width="100%">
	<tr>
		<th>Unit</th>
		<th>Flat Type</th>
		<th>Flat Area</th>
		<th>Delete</th>
	</tr>
	<?php foreach($unit_configuration_csv_converted as $user_enrollment_converted){ 
		$auto_id=$user_enrollment_converted["unit_configuration_csv_converted"]["auto_id"];
		$flat_area=$user_enrollment_converted["unit_configuration_csv_converted"]["flat_area"];
		$flat_type=(int)$user_enrollment_converted["unit_configuration_csv_converted"]["flat_type"];
		$wing=(int)$user_enrollment_converted["unit_configuration_csv_converted"]["wing"];
		$flat=(int)$user_enrollment_converted["unit_configuration_csv_converted"]["flat"];
		
		?>
	<tr id="<?php echo $auto_id; ?>">
		
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
			<div class="flat_type">
				<select class="m-wrap flat_type" style="width=100%;" record_id="<?php echo $auto_id; ?>" field="flat_type">
				<option value="" style="display:none;">Select...</option>
				 <?php
				foreach($result_flat_type as $data){
					$flat_type_id=$data['flat_type_name']['auto_id'];
					$flat_name=$data['flat_type_name']['flat_name'];
					?>
					<option value="<?php echo $flat_type_id; ?>" <?php if($flat_type_id==$flat_type){ ?> selected <?php } ?>><?php echo $flat_name; ?></option>
					<?php }  ?>
			</select>
			</div>
			
			
		</td>
		<td valign="top">
			<div class="flat_area">
				<input class="m-wrap span12"  style="background-color:white !important;" id="datt1" value="<?php echo $flat_area; ?>" type="text" placeholder="flat area" record_id="<?php echo $auto_id; ?>" field="flat_area" />
			</div>
		</td>
		
		<td valign="top">
			<a href="#" class="btn mini black delete_row" record_id="<?php echo $auto_id; ?>" role="button"><i class="icon-trash"></i></a>
		</td>
	</tr>
	<?php } ?>
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
	<li><a href="<?php echo $webroot_path; ?>Hms/modify_unit_configuration_csv/<?php echo $ii; ?>" rel='tab' role="button" ><?php echo $ii; ?></a></li>
<?php } ?>
</ul>
</div>
<br/>

<a class="btn purple " role="button" id="final_import">Import Unit Configuration <i class="m-icon-swapright m-icon-white"></i></a>									
<div id="check_validation_result"></div>

	
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script>
$(document).ready(function() {
	$("select.wing_flat").chosen();
	$("select.flat_type").chosen();
	
	$( "#final_import" ).click(function() {
		
		$("#check_validation_result").html('<img src="<?php echo $webroot_path; ?>as/loding.gif" /><span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Importing User Enrollment.</span>');
		
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
	
	$( 'input[type="text"]' ).blur(function() {
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


$( document ).ready(function() {
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
