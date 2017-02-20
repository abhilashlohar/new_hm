<div align="center" class="mobile-align">
	<a href="bank_reconciliation"  rel='tab' class="btn blue tooltips space-responsive"  ><i class="icon-folder-open"></i> Ledger Matching </a>
	<a href="reconciliation_match_report"  rel='tab' class="btn blue  tooltips space-responsive" ><i class="icon-folder-close"></i> Reconciliation Match Report</a>
	<a href="reconciliation_form"  rel='tab' class="btn red  tooltips space-responsive" ><i class="icon-folder-close"></i> Reconciliation Form</a>
	<a href="reconciliation_report"  rel='tab' class="btn blue  tooltips space-responsive" ><i class="icon-folder-close"></i> Reconciliation Report</a>
</div>
<br>
<style>
.er{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>


<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>


<div class="portlet box">
	<div class="portlet-body">
	<form method="post" id="myForm">
		<table class="table table-condensed table-bordered" id="main">
			<thead>
				<tr>
					<th width="130px">Passbook Date <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="50px">Bank name <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="150px">Check number/Neft <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="150px">Deposit amount <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="150px" >Withdraw Amount <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="" >Narration</th>
				</tr>
			</thead>
			<tbody>
				
				
			</tbody>
		</table>
		<button type="submit" class="btn blue pull-right" name="submit">Submit</button>
	</form>
		<!--<a href="#" role="button" id="add_row" class="btn"><i class="icon-plus"></i> Add Row</a>-->
	</div>
</div>

<table id="sample" style="display:none;">
<tbody>
	<tr>
		<td>
			<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy"  value="" name="passbook_date[]" placeholder="Passbook date">
		</td>
		<td>
				<select class="medium m-wrap"  name="bank_name[]" style="width:130px !important;">
				<option value="" style="display:none;width:50px;">Select Bank</option>
					<?php
						 foreach($result_ledger_sub_account as $data){
							 
							  $ledger_sub_ac_id=$data['ledger_sub_account']['auto_id'];
							  $bank_name=$data['ledger_sub_account']['name'];
							 ?>
						  
								<option value="<?php echo $ledger_sub_ac_id; ?>"><?php echo $bank_name; ?> </option>
						  
					<?php } ?>
				</select>
		</td>
		<td>
			
			<input type="text" placeholder="Cheque/Utr No." class="m-wrap span12" name="cheque_number[]">
					
		</td>
		<td>
			<!--<select class="medium m-wrap "  name="transection_type[]" style="width:150px !important;">
					<option value="" style="display:none;">Select transection type</option>
						<option value="Deposit">Deposited</option>
						<option value="Withdraw">Withdraw</option>
					
			</select>-->
			<input type="text" class="m-wrap span12" placeholder="Amount" name="deposit_amount[]">
			
		</td>
		<td>
			<input type="text" class="m-wrap span12" placeholder="Amount" name="withdraw_amount[]">
		</td>
		<td>
		
			<input type="text" class="m-wrap span11 pull-left" placeholder="Narration" name="narration[]">
		<div style="margin-top: -4px; margin-right: -5px;font-size: 14px !important;" class="pull-right">

			<a style="" role="button" class="btn mini  remove_row" href="#"><i class="icon-trash"></i></a><br>
			<a href="#" class="btn mini add_row" role="button">	 
			<i class="icon-plus"></i></a>
		</div>
		</td>
	</tr>
</tbody>
</table>
<script>
$(document).ready(function(){
	add_row();
	$(".add_row").die().live("click",function(){
		add_row();
	});
	
	$(".remove_row").die().live("click",function(){
		$(this).closest("tr").remove();
	})
	
	function add_row(){
		var new_line=$("#sample tbody").html();
		$("#main tbody").append(new_line);
		$('#main tbody tr:last select[name="bank_name[]"]').chosen();
		$('#main tbody tr:last select[name="transection_type[]"]').chosen();
		$('#main tbody tr:last input[name="passbook_date[]"]').datepicker();
	}
	
	$("form").die().on("submit",function(e){
		var allow="yes";
		
		
		
		$('#main tbody tr input[name="passbook_date[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		
		$('#main tbody tr input[name="cheque_number[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		
	$('#main tbody tr').die().each(function(i, obj) {
		var deposit_amount=$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').val();
		var withdraw_amount=$('#main tbody tr:eq('+i+') td').find('input[name="withdraw_amount[]"]').val();
		if(deposit_amount && withdraw_amount ){
			$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').closest('td').find(".er").remove();
			$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').closest('td').append('<span class="er">only one amount required</span>');
			allow="no";
		}else{
			$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').closest('td').find(".er").remove();
		}
		if(!deposit_amount && !withdraw_amount ){
			$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').closest('td').append('<span class="er">one amount required</span>');
			allow="no";
		}
	});
		
		$('#main tbody tr select[name="bank_name[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		
		if(allow=="no"){
			e.preventDefault();
		}else{
			$("button[name=submit]").hide();	
		}
		
	});
	
	
	$('select[name="bank_name[]"]').die().live("change",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	$('input[name="passbook_date[]"]').die().live("change",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	
	$('input[name="cheque_number[]"]').die().live("keyup blur",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	$('select[name="transection_type[]"]').die().live("change",function(){
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