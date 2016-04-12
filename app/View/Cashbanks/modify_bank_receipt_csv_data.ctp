<style>
input.m-wrap[type="text"]{
	background-color:#FFF !important;
}
</style>
<input type="hidden" value="<?php echo $financial_year_string; ?>" id="f_y"/>
<div style="background-color:#FFF;">
<table id="report_tb" class="table table-bordered table-condensed" width="100%">
	<thead>
	<tr>
		<th>Transaction Date</th>
		<th>Deposited In</th>
		<th>Receipt Mode</th>
		<th>Member</th>
		<th>Amount Applied</th>
		<th>Receipt Type</th>
		<th>Narration</th>
		<th>Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($result_bank_receipt_converted as $receipt_converted){ 
		$auto_id=$receipt_converted["bank_receipt_csv_converted"]["auto_id"];
		$trajection_date=$receipt_converted["bank_receipt_csv_converted"]["trajection_date"];
		$deposited_in=(int)$receipt_converted["bank_receipt_csv_converted"]["deposited_in"];
		$receipt_mode=$receipt_converted["bank_receipt_csv_converted"]["receipt_mode"];
		$cheque_or_reference_no=$receipt_converted["bank_receipt_csv_converted"]["cheque_or_reference_no"];
		$date=$receipt_converted["bank_receipt_csv_converted"]["date"];
		$drown_in_which_bank=$receipt_converted["bank_receipt_csv_converted"]["drown_in_which_bank"];
		$branch_of_bank=$receipt_converted["bank_receipt_csv_converted"]["branch_of_bank"];
		$ledger_sub_account_id=(int)$receipt_converted["bank_receipt_csv_converted"]["ledger_sub_account_id"];
		$amount=$receipt_converted["bank_receipt_csv_converted"]["amount"];
		$receipt_type=$receipt_converted["bank_receipt_csv_converted"]["receipt_type"];
		$narration=$receipt_converted["bank_receipt_csv_converted"]["narration"];
		?>
	<tr id="<?php echo $auto_id; ?>">
		<td valign="top">
			<div class="transaction">
			<input class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy" style="background-color:white !important;" id="datt1" value="<?php echo $trajection_date; ?>" type="text" placeholder="Transaction Date" record_id="<?php echo $auto_id; ?>" field="trajection_date" />
			</div>
		</td>
		<td valign="top">
			<div class="deposited">
			<select class="m-wrap chosen" style="width=100%;" record_id="<?php echo $auto_id; ?>" field="deposited_in">
				<option value="" style="display:none;">Select...</option>
				 <?php
				foreach ($result_banks as $banks_info){
					$bank_id = (int)$banks_info['ledger_sub_account']["auto_id"];
					$bank_name = $banks_info['ledger_sub_account']["name"];
					$bank_account_number = $banks_info['ledger_sub_account']["bank_account"];
					if($deposited_in==$bank_id){
						$select_string='selected="selected"';
					}else{ $select_string=''; }
					?>
					<option value="<?php echo $bank_id; ?>" <?php echo $select_string; ?> ><?php echo $bank_name; ?> &nbsp;&nbsp; <?php echo $bank_account_number; ?></option>
				<?php } ?>
			</select>
			</div>
		</td>
		<td valign="top">
			<div class="receipt_m">
			<select class="m-wrap receipt_mode"  style="width=100%;margin: 0px;" record_id="<?php echo $auto_id; ?>" field="receipt_mode" >
				<option value="" style="display:none;">receipt mode</option>    
				<option value="Cheque" <?php if($receipt_mode=="cheque" || empty($receipt_mode)){ echo 'selected="selected"'; } ?> >Cheque</option>
				<option value="NEFT" <?php if($receipt_mode=="neft"){ echo 'selected="selected"'; } ?> >NEFT</option>
				<option value="PG" <?php if($receipt_mode=="pg"){ echo 'selected="selected"'; } ?> >PG</option>
			</select>
			</div>
			<div id="cheque_div<?php echo $auto_id; ?>" <?php if($receipt_mode=="neft" || $receipt_mode=="pg"){ echo 'style="display:none;"'; } ?> >
				<div class="row-fluid">
					<div class="span6">
						<div class="cheque_utr">
						<input placeholder="Cheque No." class="m-wrap span12" value="<?php echo $cheque_or_reference_no; ?>" type="text" style="margin: 0px;" record_id="<?php echo $auto_id; ?>" field="cheque_or_reference_no">
						</div>
					</div>
					<div class="span6">
						<div class="date">
						<input class="date-picker m-wrap span12" value="<?php echo $date; ?>" data-date-format="dd-mm-yyyy" placeholder="Date" type="text" style="margin: 0px;" record_id="<?php echo $auto_id; ?>" field="date">
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="drown">
						<input class="m-wrap span12" value="<?php echo $drown_in_which_bank; ?>" placeholder="Drawn on which bank?" type="text" style="margin: 0px;" record_id="<?php echo $auto_id; ?>" field="drown_in_which_bank">
						</div>
					</div>
					<div class="span6">
						<div class="branch">
						<input class="m-wrap span12" value="<?php echo $branch_of_bank; ?>" placeholder="Branch of Bank"  type="text" style="margin: 0px;" record_id="<?php echo $auto_id; ?>" field="branch_of_bank">
						</div>
					</div>
				</div>
			</div>
			<div id="neft_pg<?php echo $auto_id; ?>" <?php if($receipt_mode=="cheque" || empty($receipt_mode)){ echo 'style="display:none;"'; } ?> >
				<div class="row-fluid">
					<div class="span6">
						<div class="cheque_utr">
						<input class="m-wrap span12" value="<?php echo $cheque_or_reference_no; ?>" placeholder="Reference/UTR #" type="text" style="margin: 0px;" record_id="<?php echo $auto_id; ?>" field="cheque_or_reference_no">
						</div>
					</div>
					<div class="span6">
						<div class="date">
						<input class="date-picker m-wrap span12" value="<?php echo $date; ?>" data-date-format="dd-mm-yyyy" placeholder="Date" type="text" style="margin: 0px;" record_id="<?php echo $auto_id; ?>" field="date">
						</div>
					</div>
				</div>
			</div>
			
		</td>
		<td valign="top">
			<div class="member">
			<select class="m-wrap chosen" style="width=100%;" record_id="<?php echo $auto_id; ?>"field="ledger_sub_account_id" >
				<option value="" style="display:none;">Select...</option>
				 <?php
				foreach ($result_members as $member_info){
					$member_id = (int)$member_info['ledger_sub_account']["auto_id"];
					
					$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($member_id)));
					$user_name=$member_info["user_name"];
					$wing_name=$member_info["wing_name"];
					$flat_name=$member_info["flat_name"];
					$wing_flat=$wing_name.' - '.$flat_name;
					
					if($ledger_sub_account_id==$member_id){
						$select_string='selected="selected"';
					}else{ $select_string=''; }
					?>
					<option value="<?php echo $member_id; ?>" <?php echo $select_string; ?> ><?php echo $user_name; ?> &nbsp;&nbsp; <?php echo $wing_flat; ?></option>
				<?php } ?>
			</select>
			</div>
		</td>
		<td valign="top">
			<div class="amount">
			<input type="text" class="m-wrap span12" maxlength="10" style="text-align:right;" placeholder="Amount" value="<?php echo $amount; ?>" record_id="<?php echo $auto_id; ?>" field="amount" />
			</div>
		</td>
		<td valign="top">
			<div class="r_type">
			<select class="span12 m-wrap"  record_id="<?php echo $auto_id; ?>" field="receipt_type" >
				<option value="" style="display:none;">Select...</option>
				<option value="1" <?php if($receipt_type=="maintenance"){ echo 'selected="selected"'; } ?> >Maintanace</option>
				<option value="2" <?php if($receipt_type=="other"){ echo 'selected="selected"'; } ?> >Other</option>
			</select>
			</div>
		</td>
		<td valign="top">
			<input class="m-wrap span12" type="text" placeholder="Narration" value="<?php echo $narration; ?>" record_id="<?php echo $auto_id; ?>" field="narration" />
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
	<span>Total entries: <?php echo ($count_bank_receipt_converted); ?></span>
</div>
<div class="pagination pagination-large ">
<ul>
<?php 
$loop=(int)($count_bank_receipt_converted/20);
if($count_bank_receipt_converted%20>0){
	$loop++;
}
for($ii=1;$ii<=$loop;$ii++){ ?>
	<li><a href="<?php echo $webroot_path; ?>Cashbanks/modify_bank_receipt_csv_data/<?php echo $ii; ?>" rel='tab' role="button" ><?php echo $ii; ?></a></li>
<?php } ?>
</ul>
</div>
<br/>

<div align="center" id="submit_sec">
<a class="btn blue" role="button" id="final_import">IMPORT RECEIPTS </a>
<a class="btn red" role="button" id="cancel_process">Cancel this process</a>							
<div id="check_validation_result"></div>
</div>

<div class="confirm_div" style="display: none;">
	<div class="modal-backdrop fade in"></div>
	<div class="modal" id="poll_edit_content">
	<div class="modal-body">
		Are you sure to cancle this process?				   			   
	</div>
	<div class="modal-footer">
		<button type="button" class="btn" id="close_button">NO</button>
		<a href="<?php echo $webroot_path; ?>Cashbanks/cancle_bank_receipt_import" class="btn red">YES</a>
	</div>
	</div>
</div>
		
<script>
$(document).ready(function() {
	$("#cancel_process").on("click",function(){
		$(".confirm_div").show();
	});
	$("#close_button").on("click",function(){
		$(".confirm_div").hide();
	});
	
	$( ".receipt_mode" ).change(function() {
		var record_id=$(this).attr('record_id');
		var mode=$("option:selected",this).text();
		if(mode=="Cheque"){
			$("#neft_pg"+record_id).hide();
			$("#cheque_div"+record_id).show();
		}
		if(mode=="NEFT" || mode=="PG"){
			$("#cheque_div"+record_id).hide();
			$("#neft_pg"+record_id).show();
		}
		
	});
	
	$( "#final_import" ).click(function() {
		var allow="yes";
		
		$('#report_tb tbody tr input[field="trajection_date"]').die().each(function(ii, obj){
			
			var trajection_date=$(this).val();
			trajection_date=trajection_date.split('-').reverse().join('');
			
			var f_y=$("#f_y").val();
			var f_y2=f_y.split(',');
			var al=0;
			$.each(f_y2, function( index, value ) {
				var f_y3=value.split('/');
				var from2=f_y3[0];
				from2=from2.split('-').reverse().join('');
				var to=f_y3[1];
				to=to.split('-').reverse().join('');
				if(trajection_date>=from2 && trajection_date<=to){
					
					//$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').find(".er").remove();
					al=al+1;
					
				}else{
					//$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').find(".er").remove();
					//$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').append('<p class="er">Not in financial year</p>');
					al=al+0;
					
				}
			});
			if(al==0){
					$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').find(".er").remove();
					$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').append('<p class="er">Not in financial year</p>');
				allow="no";
			}
			else{
				$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').find(".er").remove();
			}
		}); 
		
		
		
		
		
		
		
		$('#report_tb tbody tr select[field=deposited_in]').each(function(i, obj) {
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		$('#report_tb tbody tr select[field=ledger_sub_account_id]').each(function(i, obj) {
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		$('#report_tb tbody tr input[field=amount]').each(function(i, obj) {
			var a=$(this).val();
			if(a=="" || a==0){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		if(allow=="yes"){
			$.ajax({
				url: "<?php echo $webroot_path; ?>Cashbanks/allow_import_bank_receipt",
			}).done(function(response){
				if(response=="not_validate"){
					$("#submit_sec").find(".alert-error").remove();
					$("#final_import").before('<div class="alert alert-error" style="width: 50%;">There are errors on other pages.</div>');
				}else{
					change_page_automatically("<?php echo $webroot_path; ?>Cashbanks/import_bank_receipts_csv");
				}
				
			});
		}else{
			$("#submit_sec").find(".alert-error").remove();
			$("#final_import").before('<div class="alert alert-error" style="width: 50%;">There are errors above, marked with red color.</div>');
		}
		
	});
	$('select[field=deposited_in]').die().live("change",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	$('select[field=ledger_sub_account_id]').die().live("change",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	$('input[field=amount]').die().live("keyup blur",function(){
		var amount=$(this).val();
		if(amount=="" || amount==0){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
		
	});
});

function change_page_automatically(pageurl){
	$("#loading").show();

	$.ajax({
		url: pageurl,
		}).done(function(response) {
		
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
    $.ajax({
		url: "<?php echo $webroot_path; ?>Cashbanks/check_bank_receipt_csv_validation/<?php echo $page; ?>",
		dataType: 'json'
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
	});
});

$( document ).ready(function() {
	$( 'input[type="text"]' ).blur(function() {
		var record_id=$(this).attr("record_id");
		var field=$(this).attr("field");
		var value=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Cashbanks/auto_save_bank_receipt/"+record_id+"/"+field+"/"+value,
		}).done(function(response){
			if(response=="F"){
				$("table#report_tb tr#"+record_id+" td").each(function(){
					$(this).find('input[field="'+field+'"]').parent("div").css("border", "");
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
			url: "<?php echo $webroot_path; ?>Cashbanks/auto_save_bank_receipt/"+record_id+"/"+field+"/"+value,
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
		$.ajax({
			url: "<?php echo $webroot_path; ?>Cashbanks/delete_bank_receipt_row/"+record_id,
		}).done(function(response){
			if(response=="1"){
				$( '#'+record_id ).addClass('animated zoomOut')
				setTimeout(function() {
					$( '#'+record_id ).remove();
				}, 1000);
			}
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