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
		<a href="<?php echo $webroot_path; ?>Cashbanks/cancle_petty_cash_payment_import" class="btn red">YES</a>
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
		 //alert(update_id);
		$(this).closest('tr').find('td:nth-child(3)').load('<?php echo $webroot_path; ?>Cashbanks/party_account_change_by_acgroup/'+accounts_group+'/'+update_id+'/'+sundry_id+"/"+1);
	});
	
	$('#report_tb tbody tr input,select').die().live("change",function(){ 
		var value=$(this).val(); 
		var update_id=$(this).attr("record_id");  
		var field=$(this).attr("field"); 
		$.ajax({
				url: "<?php echo $webroot_path; ?>Cashbanks/auto_save_petty_cash_payment/"+update_id+"/"+field+"/"+value,
			}).done(function(response){
			 //alert(response);
		});
	});
	
});	

$('.delete_row').click(function() {
		var record_id=$(this).attr("record_id");
		$.ajax({
			url: "<?php echo $webroot_path; ?>Cashbanks/delete_petty_cash_payment_row/"+record_id,
		}).done(function(response){
			//alert(response);
			if(response=="1"){
				$( '#'+record_id ).addClass('animated zoomOut')
				setTimeout(function() {
					$( '#'+record_id ).remove();
				}, 1000);
			}
		});
		
});

$("#cancel_process").on("click",function(){
	$(".confirm_div").show();
});
$("#close_button").on("click",function(){
	$(".confirm_div").hide();
});

$("#final_import" ).click(function() {
		var allow="yes";
	 
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
		
		$('#report_tb tbody tr input[field=trajection_date]').each(function(i, obj) {
			var a=$(this).val();  
			if(a==""){ 
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		$('#report_tb tbody tr select[field=ac_group]').each(function(i, obj) {
			var a=$(this).val(); 
			if(a==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
	  
		$('#report_tb tbody tr select[field=party_account]').each(function(i, obj) {
			var a=$(this).val(); 
			if(a==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		
		
	  if(allow=="yes"){
			$.ajax({
				url: "<?php echo $webroot_path; ?>Cashbanks/allow_import_petty_cash_payment",
			}).done(function(response){

				if(response=="not_validate"){
					$("#submit_sec").find(".alert-error").remove();
					$("#final_import").before('<div class="alert alert-error" style="width: 50%;">There are errors on other pages.</div>');
				}else{
					
					change_page_automatically("<?php echo $webroot_path; ?>Cashbanks/import_petty_cash_payment_csv");
				}
				
			});
		}else{
			$("#submit_sec").find(".alert-error").remove();
			$("#final_import").before('<div class="alert alert-error" style="width: 50%;">There are errors above, marked with red color.</div>');
		}
	  
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


</script>
<style>
.er{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>