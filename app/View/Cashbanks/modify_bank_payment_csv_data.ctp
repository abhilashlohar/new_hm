
<input type="hidden" value="<?php echo $financial_year_string; ?>" id="f_y"/>
<div class="portlet box">
<div class="portlet-body">
<table class="table table-condensed table-bordered" id="report_tb">
		<thead>
			<tr>
				<th width="20%">Transaction Date</th>
				<th width="20%">Ledger A/c</th>
				<th width="20%">Mode of Payment</th>
				<th width="20%">Amount</th>
				<th width="20%">Bank Account</th>
			</tr>
		</thead>
        <tbody>
	<?php
			foreach($result_bank_receipt_converted as $data)
			{
			$tds="";
			 $csv_auto_id = (int)$data['payment_csv_converted']['auto_id'];
			   $transaction_date = $data['payment_csv_converted']['trajection_date'];	
				$ledger_account_id = (int)$data['payment_csv_converted']['ledger_ac'];	
				  $type = (int)$data['payment_csv_converted']['type'];
					$amount = $data['payment_csv_converted']['amount'];		
					  $tds = $data['payment_csv_converted']['tds'];	
						$mode = $data['payment_csv_converted']['mode'];	
						  $instrument = $data['payment_csv_converted']['instrument'];	
							$bank_id = $data['payment_csv_converted']['bank'];	
							  $invoice_ref = $data['payment_csv_converted']['invoice_ref'];
								$narration = $data['payment_csv_converted']['narration'];
			
			?>
		
		
		
            <tr id="<?php echo $csv_auto_id; ?>">
					<td>
					<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy" 
					value="<?php echo $transaction_date; ?>" 
					style="background-color:white !important; margin-top:2.5px;" field="transaction_date" record_id="<?php echo $csv_auto_id; ?>">
					</td>
			
			<td>
					<select class="m-wrap span12 chosen" field="ledger_data" record_id="<?php echo $csv_auto_id; ?>">
					<option value="" style="display:none;">--SELECT--</option>
					<?php
					foreach($cursor11 as $collection)
					{
					$auto_id = $collection['ledger_sub_account']['auto_id'];
					$name = $collection['ledger_sub_account']['name'];
					?>
					<option value="<?php echo $auto_id; ?>,1" <?php if($ledger_account_id == $auto_id && $type == 1) { ?> selected="selected" <?php } ?> ><?php echo $name; ?></option>
					<?php } ?>
					<?php
					foreach($cursor12 as $collection)
					{
					$auto_id_a = (int)$collection['accounts_group']['auto_id'];
					$result33 = $this->requestAction(array('controller' => 'hms', 'action' => 'expense_tracker_fetch2'),array('pass'=>array($auto_id_a)));
					foreach($result33 as $collection)
					{
					$auto_id = (int)$collection['ledger_account']['auto_id'];
					$name = $collection['ledger_account']['ledger_name'];
					if($auto_id == 15)
					continue;
					?>
					<option value="<?php echo $auto_id; ?>,2" <?php if($ledger_account_id == $auto_id && $type == 2) { ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
					<?php }} ?>
					<option value="32,2" <?php if($ledger_account_id == 32 && $type == 2) { ?> selected="selected" <?php } ?>>Cash-in-hand</option>
					<?php
					foreach($cursor13 as $collection)
					{
					$auto_id_b = (int)$collection['accounts_group']['auto_id'];

					$result33 = $this->requestAction(array('controller' => 'hms', 'action' => 'expense_tracker_fetch2'),array('pass'=>array($auto_id_b)));
					foreach($result33 as $collection)
					{
					$auto_id = (int)$collection['ledger_account']['auto_id'];
					$name = $collection['ledger_account']['ledger_name'];
					?>
					<option value="<?php echo $auto_id; ?>,2" <?php if($ledger_account_id == $auto_id && $type == 2) { ?> selected="selected" <?php } ?> ><?php echo $name; ?></option>
					<?php }} ?>
					</select>
			
				  <input type="text" class="m-wrap span12" 
				  style="background-color:white !important; margin-top:2.5px;" id="inv_ref1"
				  value="<?php echo $invoice_ref; ?>" field="invoice" record_id="<?php echo $csv_auto_id; ?>">
			
			</td>
			<td>
				<select class="m-wrap span12 chosen" field="mode" record_id="<?php echo $csv_auto_id; ?>">
				<option value="" style="display:none;">Select</option>
				<option value="Cheque" <?php if($mode == "Cheque") { ?>selected="selected" <?php } ?>>Cheque</option>
				<option value="NEFT" <?php if($mode == "NEFT") { ?>selected="selected" <?php } ?>>NEFT</option>
				<option value="PG" <?php if($mode == "PG") { ?>selected="selected" <?php } ?>>PG</option>
				</select>
				
				<input type="text"  class="m-wrap span12" 
			  style="text-align:right; background-color:white !important; margin-top:2.5px;" id="instru1" value="<?php echo $instrument; ?>" field="inst" record_id="<?php echo $csv_auto_id; ?>">
			</td>
			<td>
			<input type="text" class="m-wrap span12" id="amttt1" 
				style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="10" value="<?php echo $amount; ?>" 
				field="amt" record_id="<?php echo $csv_auto_id; ?>">
			
			
			<input type="text" class="m-wrap span6" field="tdss" record_id="<?php echo $csv_auto_id; ?>" style="background-color:white !important; margin-top:2.5px;" Placeholder="TDS Amount" value="<?php echo $tds; ?>">
			
			<?php
			$total_tds_amount=$amount-$tds;
						
			?>
			<input type="text"  class="m-wrap span6" 
				  readonly="readonly" style="background-color:white !important; margin-top:2.5px;" value="<?php echo $total_tds_amount; ?>" field="net_amt">
			
			
			
			</td>
			<td> <a style="margin-top: -4px; margin-right: -5px;" role="button" class="btn mini pull-right delete_row" href="#" record_id="<?php echo $csv_auto_id; ?>"><i class="icon-trash"></i></a>
			     <select onchange="get_value(this.value)" class="m-wrap chosen span10" field="bankk" record_id="<?php echo $csv_auto_id; ?>">
					<option value="" style="display:none;">Select</option>    
					<?php
					foreach ($cursor2 as $db) 
					{
					$sub_account_id =(int)$db['ledger_sub_account']['auto_id'];
					$sub_account_name =$db['ledger_sub_account']['name'];
					$ac_number = $db['ledger_sub_account']['bank_account']; 
					$bank_acccc = substr($ac_number,-4);  
					?>
					<option value="<?php echo $sub_account_id; ?>" <?php if($sub_account_id == $bank_id) { ?> selected="selected" <?php } ?>><?php echo $sub_account_name; ?>&nbsp;&nbsp;<?php echo $bank_acccc; ?></option>
					<?php } ?>
					</select>
				<input type="text" class="m-wrap span12" 
				  style="background-color:white !important; margin-top:2.5px;" 
				  value="<?php echo $narration; ?>" field="desc" record_id="<?php echo $csv_auto_id; ?>">
			
			</td>
            </tr>
			
			
			
			<?php } ?>			
        </tbody>

</table>
</div>
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
	<li><a href="<?php echo $webroot_path; ?>Cashbanks/modify_bank_payment_csv_data/<?php echo $ii; ?>" rel='tab' role="button" ><?php echo $ii; ?></a></li>
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
		<a href="<?php echo $webroot_path; ?>Cashbanks/cancle_bank_payment_import" class="btn red">YES</a>
	</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#cancel_process").on("click",function(){
		$(".confirm_div").show();
	});
	$("#close_button").on("click",function(){
		$(".confirm_div").hide();
	});
	
	$( "#final_import" ).click(function(){
		var allow="yes";
		
		$('#report_tb tbody tr input[field="transaction_date"]').die().each(function(ii, obj){
			var transaction_date=$(this).val();
		transaction_date=transaction_date.split('-').reverse().join('');
			
			var f_y=$("#f_y").val();
			var f_y2=f_y.split(',');
			var al=0;
			$.each(f_y2, function( index, value ){
				var f_y3=value.split('/');
				var from=f_y3[0];
				from=from.split('-').reverse().join('');
				var to=f_y3[1];
				to=to.split('-').reverse().join('');
				
				if(transaction_date>=from && transaction_date<=to){
					//$('#report_tb tbody tr:eq('+ii+') input[field="transaction_date"]').closest('td').find(".er").remove();
					al=al+1;
				}else{
					//$('#report_tb tbody tr:eq('+ii+') input[field="transaction_date"]').closest('td').find(".er").remove();
					//$('#report_tb tbody tr:eq('+ii+') input[field="transaction_date"]').closest('td').append('<p class="er">Not in financial year</p>');
					al=al+0;
					
				}
			});
			if(al==0){
					$('#report_tb tbody tr:eq('+ii+') input[field="transaction_date"]').closest('td').find(".er").remove();
					$('#report_tb tbody tr:eq('+ii+') input[field="transaction_date"]').closest('td').append('<p class="er">Not in financial year</p>');
				allow="no";
			}
			else{
				$('#report_tb tbody tr:eq('+ii+') input[field="transaction_date"]').closest('td').find(".er").remove();
			}
		}); 
		
		$('#report_tb tbody tr select[field=ledger_data]').each(function(i, obj){
			var ledger_data=$(this).val();
				if(ledger_data==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Ledger A/c Required</p>');
						allow="no";
				}else{
					$(this).closest('td').find(".er").remove();
				}
		});
	
		$('#report_tb tbody tr select[field=mode]').each(function(i, obj){
			var mode=$(this).val();
			var inst=$('#report_tb tbody tr:eq('+i+') input[field=inst]').val();
			if(mode=="" || inst==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<p class="er">Required</p>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});	
	
	
	 $('#report_tb tbody tr input[field="amt"]').die().each(function(i, obj){
			var amount=$(this).val();
			if(amount==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Amount Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
	
	
	 $('#report_tb tbody tr select[field="bankk"]').die().each(function(i, obj){
			var bankk=$(this).val();
			if(bankk==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<p class="er">Select bank Account</p>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});	
	
	if(allow=="yes"){
			$.ajax({
				url: "<?php echo $webroot_path; ?>Cashbanks/allow_import_bank_payment",
			}).done(function(response){
				if(response=="not_validate"){
					$("#submit_sec").find(".alert-error").remove();
					$("#final_import").before('<div class="alert alert-error" style="width: 50%;">There are errors on other pages.</div>');
				}else{
					change_page_automatically("<?php echo $webroot_path; ?>Cashbanks/bank_payment_import_csv");
				}
				
			});
		}else{
			$("#submit_sec").find(".alert-error").remove();
			$("#final_import").before('<div class="alert alert-error" style="width: 50%;">There are errors above, marked with red color.</div>');
		}
	
	
	
	
	
	
	});
});
</script>

<script>
$( document ).ready(function() {
	$( 'input[type="text"]' ).blur(function() {
		var record_id=$(this).attr("record_id");
		var field=$(this).attr("field");
		var value=$(this).val();
		
		$.ajax({
			url: "<?php echo $webroot_path; ?>Cashbanks/auto_save_bank_payment/"+record_id+"/"+field+"/"+value,
		}).done(function(response){
			
			
		});
	});
	
	$( 'select' ).change(function() {
		var record_id=$(this).attr("record_id");
		var field=$(this).attr("field");
		var value=$("option:selected",this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Cashbanks/auto_save_bank_payment/"+record_id+"/"+field+"/"+value,
		}).done(function(response){
			if(response=="F"){
				$("#main_table tr#"+record_id+" td").each(function(){
					$(this).find('select[field="'+field+'"]').parent("div").css("border", "solid 1px red");
				});
			}else{
				$("#main_table tr#"+record_id+" td").each(function(){
					$(this).find('select[field="'+field+'"]').parent("div").css("border", "");
				});
			}
		});
	});
});

</script>
			  
<script>			  
	$( document ).ready(function() {
    $.ajax({
		url: "<?php echo $webroot_path; ?>Cashbanks/check_bank_receipt_csv_validation/<?php echo $page; ?>",
		dataType: 'json'
	}).done(function(response){
		
		response.forEach(function(item) {
			
			if(item[0]==1){ $("#main_table tr#"+item[6]+" td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(1) .one").css("border", "solid 1px red","!important"); }
			if(item[1]==1){ $("#main_table tr#"+item[6]+" td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(2) .two").css("border", "solid 1px red","!important"); }
			if(item[2]==1){ $("#main_table tr#"+item[6]+" td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(4) .three").css("border", "solid 1px red","!important"); }
			if(item[3]==1){ $("#main_table tr#"+item[6]+" td:nth-child(1) #sub_table2 tr:nth-child(4) td:nth-child(2) .four").css("border", "solid 1px red","!important"); }
			if(item[4]==1){ $("#main_table tr#"+item[6]+" td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(3) .five").css("border", "solid 1px red","!important"); }
			if(item[5]==1){ $("#main_table tr#"+item[6]+" td:nth-child(1) #sub_table2 tr:nth-child(2) td:nth-child(4) .six").css("border", "solid 1px red","!important"); }
			
			
		});
	});
});		  
</script>
<script>			  
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
</script>	


<script>
$( document ).ready(function() {
	$( '.delete_row' ).click(function() {
		var record_id=$(this).attr("record_id");
		$.ajax({
			url: "<?php echo $webroot_path; ?>Cashbanks/delete_bank_payment_row/"+record_id,
		}).done(function(response){
			response = response.replace(/\s+/g,' ').trim();
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

<script>
$(document).ready(function(){
		
	
$('select[field=ledger_data]').die().live("change",function(i, obj){
var ledger_data=$(this).val();
	if(ledger_data==""){
		$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<p class="er">Ledger A/c Required</p>');
			allow="no";
	}else{
		$(this).closest('td').find(".er").remove();
	}
});


	$('select[field=mode]').die().live("change",function(i, obj){
			var mode=$(this).val();
			var inst=$(this).closest("td").find('input[field=inst]').val();
			if(mode=="" || inst==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<p class="er">Required</p>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});	

	$('input[field=inst]').die().live("keyup blur",function(i, obj){
			var inst=$(this).val();
			var mode=$(this).closest("td").find('select[field=mode]').val();
			if(mode=="" || inst==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<p class="er">Required</p>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});	

	$('input[field="amt"]').die().live("keyup blur",function(i, obj){
			var amount=$(this).val();
			if(amount==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Amount Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		var tds=parseInt($(this).closest("tr").find('input[field="tdss"]').val());
			var total_amount=Math.round(amount-tds);	
	if($.isNumeric(total_amount)==false){ total_amount=amount; }						
		$(this).closest("tr").find('input[field="net_amt"]').val(total_amount);	
			
		});


$('input[field="tdss"]').die().live("keyup blur",function(){
		var tds=parseFloat($(this).val());
			var amount=parseFloat($(this).closest("tr").find('input[field="amt"]').val());
				var total_amount=Math.round(amount-tds);	
	if($.isNumeric(total_amount)==false){ total_amount=amount; }						
		$(this).closest("tr").find('input[field="net_amt"]').val(total_amount);	
});

});
</script>




		  
			  