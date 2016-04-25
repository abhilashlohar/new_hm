<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'),array('pass' => array()));
?>
<center>
<a href="<?php echo $webroot_path; ?>Cashbanks/new_bank_receipt" class="btn yellow" rel='tab'>Create</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" class="btn" rel='tab'>View</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_deposit_slip" class="btn" rel='tab'>Deposit Slip</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_approve" class="btn" rel='tab'>Approve Receipts</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/import_bank_receipts_csv" class="btn purple"   style="float:right; margin-right:8px;"><i class="fa fa-database"></i> Import csv</a>
</center>

<?php $current_date= date('d-m-Y'); ?>
<input type="text" value="<?php echo $financial_year_string; ?>" id="f_y" style="display:none;"/>
<div class="portlet box">
	<div class="portlet-body" >
	<form method="post" id="myForm">
		<table class="table table-condensed table-bordered" id="main">
			<thead>
				<tr>
					<th>Transaction Date</th>
					<th width="200px">Deposited In</th>
					<th>Receipt Mode</th>
					<th width="200px">Received From</th>
					<th  width="115px">Amount Applied</th>
					<th>Narration</th>
				</tr>
			</thead>
			<tbody>
				
				
			</tbody>
		</table>
		<button type="submit" class="btn blue pull-right" name="submit">Create Receipt</button>
	</form>
		<a href="#" role="button" id="add_row" class="btn"><i class="icon-plus"></i> Add Row</a>
	</div>
</div>

<table id="sample" style="display:none;">
<tbody>
	<tr>
		<td>
			<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy"  value="<?php echo $current_date; ?>" name="transaction_date[]">
		</td>
		<td>
			<select name="deposited_in[]">
				<option value="" style="display:none;width:200px;">Select Bank</option>
				<?php 
				foreach($bank_data as $bank_info){ 
					$bank_id=$bank_info["ledger_sub_account"]["auto_id"];
					$bank_name=$bank_info["ledger_sub_account"]["name"];
					$bank_account=$bank_info["ledger_sub_account"]["bank_account"];
					
					echo '<option value='.$bank_id.'>'.$bank_name.' '.$bank_account.'</option>';
				} ?>
			</select>
		</td>
		<td>
			<select name="receipt_mode[]" class="m-wrap span12">
				<option value="cheque">Cheque</option>
				<option value="neft">Neft</option>
				<option value="pg">PG</option>
			</select>
			<input type="text" placeholder="Cheque/Utr No." class="m-wrap span6" name="cheque_number[]">
			<input type="text" class="date-picker m-wrap span6" data-date-format="dd-mm-yyyy" placeholder="Date" name="date[]">
			<div id="non_cheque">
			<input type="text" class="m-wrap span6" placeholder="Drawn in which bank" name="drown_in_which_bank[]">
			<input type="text" class="m-wrap span6" placeholder="Branch of Bank" name="branch_of_bank[]">
			</div>
			
		</td>
		<td>
			<select name="received_from[]" class="m-wrap span12" style="width:200px;">
				<option value="" style="display:none;">--select--</option>
				<option value="residential">Residential</option>
				<option value="non_residential">Non-Residential</option>
			</select>
			<div id="residential" style="display:none;">
				<select name="ledger_sub_account[]" class="m-wrap" style="width:200px;">
					<option value="" style="display:none;">--member--</option>
					<?php foreach($members_for_billing as $ledger_sub_account_id){
						$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
						echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
					} ?>
				</select>
				<select name="receipt_type[]" class="m-wrap span12" style="width:200px;">
					<option value="maintenance">Maintenance Receipt</option>
					<option value="other">Other Receipt</option>
				</select>
			</div>
			<div id="non_residential" style="display:none;">
		<select name="non_member_ledger_sub_account[]" class="m-wrap" style="width:200px;">
		<option value="" style="display:none;">--non member--</option>
		<?php foreach($non_members as $ledger_sub_account_data){
		       $ledger_sub_account_id = $ledger_sub_account_data['ledger_sub_account']['auto_id'];
		       $non_member_name = $ledger_sub_account_data['ledger_sub_account']['name']; ?>
			   <option value="<?php echo $ledger_sub_account_id; ?>"><?php echo $non_member_name; ?></option>
		<?php } ?>
		</select>
		<input type="text" class="m-wrap" style="width:190px;" name="bill_reference[]" Placeholder="Bill Reference">
			</div>
		</td>
		<td>
			<input type="text" class="m-wrap span12" placeholder="Amount Applied" name="amount[]">
		</td>
		<td>
			<a style="margin-top: -4px; margin-right: -5px;font-size: 14px !important;" role="button" class="btn mini pull-right remove_row" href="#"><i class="icon-trash"></i></a>
			<input type="text" class="m-wrap span9 pull-left" placeholder="Narration" name="narration[]">
			
		</td>
	</tr>
</tbody>
</table>
<style>
input,select{
	margin:0 !important;
}
.chzn-container {
	margin:0 !important;
}
</style>
<script>
$(document).ready(function(){
	add_row();
	$("#add_row").on("click",function(){
		add_row();
	})
	$(".remove_row").die().live("click",function(){
		$(this).closest("tr").remove();
	})
	$('select[name="receipt_mode[]"]').die().live("change",function(){
		var receipt_mode=$(this).val();
		if(receipt_mode=="cheque"){
			$(this).closest("td").find("#non_cheque").show();
		}else{
			$(this).closest("td").find("#non_cheque").hide();
		}
	})
	
	
	
	function add_row(){
		var new_line=$("#sample tbody").html();
		$("#main tbody").append(new_line);
		$('#main tbody tr:last select[name="ledger_sub_account[]"]').chosen();
		$('#main tbody tr:last input[name="transaction_date[]"]').datepicker();
		$('#main tbody tr:last input[name="date[]"]').datepicker();
		$('#main tbody tr:last select[name="deposited_in[]"]').chosen();
		$('#main tbody tr:last select[name="non_member_ledger_sub_account[]"]').chosen();
	}
	
	$("form").die().on("submit",function(e){
		var allow="yes";
		$('#main tbody tr input[name="transaction_date[]"]').die().each(function(ii, obj){
			var transaction_date=$(this).val();
			transaction_date=transaction_date.split('-').reverse().join('');
			
			var f_y=$("#f_y").val();
			var f_y2=f_y.split(',');
			var al=0;
			$.each(f_y2, function( index, value ) {
				var f_y3=value.split('/');
				var from=f_y3[0];
				from=from.split('-').reverse().join('');
				var to=f_y3[1];
				to=to.split('-').reverse().join('');
				
				if(transaction_date>=from && transaction_date<=to){
					$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();
					al=al+1;
				}else{
					$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();
					$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').append('<p class="er">Not in financial year</p>');
					al=al+0;
					
				}
			});
			if(al==0){
				allow="no";
			}
		});
		
		$('#main tbody tr select[name="deposited_in[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		$('#main tbody tr select[name="received_from[]"]').die().each(function(i, obj) {
			var received_from=$(this).val();
			if(received_from==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Select received from</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
			if(received_from=="residential"){
				var ledger_sub_account=$(this).closest("td").find('select[name="ledger_sub_account[]"]').val();
				if(ledger_sub_account==""){
					$(this).closest('td').find(".er").remove();
					$(this).closest('td').append('<span class="er">Select member</span>');
					allow="no";
				}else{
					$(this).closest('td').find(".er").remove();
				}
			}
			if(received_from=="non_residential"){
			  var ledger_sub_account=$(this).closest("td").find('select[name="non_member_ledger_sub_account[]"]').val();
			  var bill_reference=$(this).closest("td").find('input[name="bill_reference[]"]').val();
			  if(ledger_sub_account=="" || bill_reference==""){
				  $(this).closest('td').find(".er").remove();
					$(this).closest('td').append('<span class="er">Required</span>');
					allow="no";
			  }else{
				  $(this).closest('td').find(".er").remove();
				  
			  }
			
			}
		});
		
		$('#main tbody tr input[name="amount[]"]').die().each(function(i, obj) {
			var a=$(this).val();
			if(a=="" || a==0){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
	$('#main tbody tr select[name="receipt_mode[]"]').die().each(function(i, obj){
		var mode=$(this).val();
		  var cheque_number=$(this).closest('td').find('input[name="cheque_number[]"]').val();
			var date=$(this).closest('td').find('input[name="date[]"]').val();
		if(mode=="cheque"){
		var drawn=$(this).closest('td').find('input[name="drown_in_which_bank[]"]').val();
			
			if(cheque_number=="" || date=="" || drawn==""){
			 $(this).closest('td').find(".er").remove();
			  $(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}			
		}else{
			if(cheque_number=="" || date==""){
			$(this).closest('td').find(".er").remove();
			  $(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		}
			
		});
		
		
		
		
		
		
		
		
		
		
		  if(allow=="no"){
				e.preventDefault();
			}
		
	});
	
	
	
	$('select[name="deposited_in[]"]').die().live("change",function(){
		var deposited_in=$(this).val();
		if(deposited_in==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	$('select[name="received_from[]"]').die().live("change",function(){
		var received_from=$(this).val();
		if(received_from=="residential"){
			$(this).closest("td").find("#residential").show();
			$(this).closest("td").find("#non_residential").hide();
		}else{
			$(this).closest("td").find("#residential").hide();
			$(this).closest("td").find("#non_residential").show();
		}
		if(received_from==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Select received from</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
		if(received_from=="residential"){
			var ledger_sub_account=$(this).closest("td").find('select[name="ledger_sub_account[]"]').val();
			if(ledger_sub_account==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Select member</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		}
	})
	
	$('select[name="ledger_sub_account[]"]').die().live("change",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	$('input[name="amount[]"]').die().live("keyup blur",function(){
		var amount=$(this).val();
		if(amount=="" || amount==0){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
		$(this).val($(this).val().toString().replace(/^[0-9]\./g, ',')
    .replace(/\./g, ''));
			if($.isNumeric(amount))
		{
		}else{
		$(this).val('');	
		}
	});
	
});
</script>
<script>
$(document).ready(function() {
	<?php
	$vouchar=$this->Session->read('bank_receipt');	
	$bank_receipt=(int)$vouchar[0];
	if($bank_receipt==1)
	{
	?>
	$.gritter.add({
	title: 'Bank Receipt Voucher',
	text: '<p>Voucher <?php echo $vouchar[1]; ?> is generated sucessfully.</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array('bank_receipt')));
	} ?>
	});
</script> 
<style>
.er{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>