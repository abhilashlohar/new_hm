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
		<th width="130px">Transaction Date <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
		<th>A/c Group <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
		<th>Expense/Party A/c <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
		<th>Paid From </th>
		<th>Amount <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
		<th>Narration</th>
		<th>Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($result_bank_receipt_converted as $receipt_converted){ 
			$auto_id=$receipt_converted["petty_cash_csv_converted"]["auto_id"];
			$trajection_date=$receipt_converted["petty_cash_csv_converted"]["trajection_date"];
			$account_type=$receipt_converted["petty_cash_csv_converted"]["account_type"];
			$sundry_creditor_id=$receipt_converted["petty_cash_csv_converted"]["sundry_creditor_id"];
			$account_head=$receipt_converted["petty_cash_csv_converted"]["account_head"];
			$amount=$receipt_converted["petty_cash_csv_converted"]["amount"];
			$narration=$receipt_converted["petty_cash_csv_converted"]["narration"];


	?>
	<tr id="<?php echo $auto_id; ?>">
		<td valign="top">
			<div class="transaction">
			<input class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy" style="background-color:white !important;" id="datt1" value="<?php echo $trajection_date; ?>" type="text" placeholder="Transaction Date" record_id="<?php echo $auto_id; ?>" field="trajection_date" />
			</div>
		</td>
		<td valign="top">
			<select class="m-wrap span12 account_head" record_id="<?php echo $auto_id; ?>" field="ac_group" sundry_id="<?php echo $sundry_creditor_id; ?>" >
			<option value="" style="display:none;">Select</option>
			<option value="1" <?php if($account_type==1){ ?> selected <?php } ?>>Sundry Creditors Control A/c</option>
			<option value="2" <?php if($account_type==2){ ?> selected <?php } ?>>All Expenditure A/cs</option>
			<option value="3" <?php if($account_type==3){ ?> selected <?php } ?>>Liability</option>
			</select>
		</td>
		<td valign="top">
			<select class="m-wrap span12">
			<option value="" style="display:none;">Select</option>
			</select>
			
		</td>
		<td valign="top">
			<select class="m-wrap span12">
			<option value="" style="display:none;">Select</option>
			<option value="32" selected="selected">Cash-in-hand</option>
			</select>
		</td>
		<td valign="top">
			<div class="amount">
			<input type="text" class="m-wrap span12" maxlength="10" style="text-align:right;" placeholder="Amount" value="<?php echo $amount; ?>" record_id="<?php echo $auto_id; ?>" field="amount" />
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
$loop=(int)($count_bank_receipt_converted/2);
if($count_bank_receipt_converted%2>0){
	$loop++;
}
for($ii=1;$ii<=$loop;$ii++){ ?>
	<li><a href="<?php echo $webroot_path; ?>Cashbanks/modify_petty_cash_csv_data/<?php echo $ii; ?>" rel='tab' role="button" ><?php echo $ii; ?></a></li>
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
	$('#report_tb tbody tr select.account_head').die().each(function(i, obj){ 
		var accounts_group=$(this).val(); 
		var update_id=$(this).attr("record_id");  
		var sundry_id=$(this).attr("sundry_id"); 
		$(this).closest('tr').find('td:nth-child(3)').load('<?php echo $webroot_path; ?>Cashbanks/party_account_change_by_acgroup/'+accounts_group+'/'+update_id+'/'+sundry_id+"/"+0);
	});
	
	$('#report_tb tbody tr select.account_head').die().live("change",function(){ 
		var accounts_group=$(this).val(); 
		var update_id=$(this).attr("record_id");  
		var sundry_id=$(this).attr("sundry_id"); 
		 alert(update_id);
		$(this).closest('tr').find('td:nth-child(3)').load('<?php echo $webroot_path; ?>Cashbanks/party_account_change_by_acgroup/'+accounts_group+'/'+update_id+'/'+sundry_id+"/"+1);
	});
	
	$('#report_tb tbody tr input,select').die().live("change",function(){ 
		var value=$(this).val(); 
		var update_id=$(this).attr("record_id");  
		var field=$(this).attr("field"); 
		$.ajax({
				url: "<?php echo $webroot_path; ?>Cashbanks/auto_save_petty_cash_payment/"+update_id+"/"+field+"/"+value,
			}).done(function(response){
			 alert(response);
		});
	});
	
	$('.new_load').chosen();
	$("#cancel_process").on("click",function(){
		$(".confirm_div").show();
	});
	$("#close_button").on("click",function(){
		$(".confirm_div").hide();
	});
	
	
	
	$("#final_import" ).click(function() {
		var allow="yes";
		
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
		$('#report_tb tbody tr select[field=ledger_sub_account_id]').each(function(i, obj){
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
		
		$('#report_tb tbody tr input[field="trajection_date"]').die().each(function(ii, obj){
			var transaction_date=$(this).val();
			var ledger_sub_account_id=$('#report_tb tbody tr:eq('+ii+') select[field="ledger_sub_account_id"]').val();
			var result=""; 
		$.ajax({
			url:"<?php echo $webroot_path; ?>Cashbanks/bank_receipt_date_validation/"+transaction_date+"/"+ledger_sub_account_id, 
			async: false,
			success: function(data){
			result=data;
			}
		});
		if(result=="financial_year"){
			allow="no";
			$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').find(".er").remove();
			$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').append('<p class="er">Not in financial year</p>');
		}else if(result=="match"){
		 allow="no";
			$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').find(".er").remove();
			$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').append('<p class="er">Regular bill date error</p>');
		}
		if(result=="not_match"){
		$('#report_tb tbody tr:eq('+ii+') input[field="trajection_date"]').closest('td').find(".er").remove();	
		}
			
	});
		
		if(allow=="yes"){
			$.ajax({
				url: "<?php echo $webroot_path; ?>Cashbanks/allow_import_bank_receipt",
			}).done(function(response){
				//alert(response);
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