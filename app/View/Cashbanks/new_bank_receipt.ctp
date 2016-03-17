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
<div class="portlet box">
	<div class="portlet-body" >
	<form method="post">
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
					$bank_id=$bank_info["ledger_sub_account"]["ledger_id"];
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
			hello
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
	}
	
	$("form").on("submit",function(e){
		var allow="yes";
		$('#main tbody tr select[name="deposited_in[]"]').each(function(i, obj) {
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		$('#main tbody tr select[name="received_from[]"]').each(function(i, obj) {
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
		});
		
		$('#main tbody tr input[name="amount[]"]').each(function(i, obj) {
			var a=$(this).val();
			if(a=="" || a==0){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
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
	});
	
});
</script>
<style>
.er{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>