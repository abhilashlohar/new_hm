<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
<center>                
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_receipt" class="btn yellow" rel='tab'>Create</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_receipt_view" class="btn" rel='tab'>View</a>
</center>
<!--<a href="http://localhost/new_hm/Cashbanks/import_petty_cash_receipts_csv" class="btn purple" style="float:right; margin-right:8px;"><i class="fa fa-database"></i> Import csv</a>-->
<!---------------- Start Petty Cash Receipt Form ------------------------->
<?php $default_date = date('d-m-Y'); ?>
<div class="portlet box">
<div class="portlet-body">
	<form method="post">
		<table class="table table-condensed table-bordered" id="main">
			<thead>
				<tr>
					<th width="130px">Transaction Date <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="200px">A/c Group <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="200px">Income/Party A/c <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="130px">Account Head</th>
					<th width="100px">Amount <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th>Narration</th>
				</tr>
			</thead>
			<tbody>
				
				
			</tbody>
		</table>
		<button type="submit" class="btn blue pull-right" name="submit">Create Receipt</button>
	</form>
<!--<a href="#" role="button" id="add_row" class="btn"><i class="icon-plus"></i> Add Row</a>-->
</div>
</div>
<table id="sample" style="display:none;">
<tbody>
<tr>
	<td>
	<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy"  data-date-start-date="+0d" style="background-color:white !important; margin-top:2.5px;" value="<?php echo $default_date; ?>" name="transaction_date[]">
	</td>
	
	<td>
	<select class="m-wrap span12" name="account_group[]">
    <option value="" style="display:none;">Select</option>
    <option value="1">Members Control A/c</option>
    <option value="2">Other Income</option>
    </select>
	</td>
	
	<td>
	<div id="default_select_box">
	<select class="m-wrap span12">
    <option value="" style="display:none;">Select</option>
    </select>
    </div>
			<div id="members_select_box" class="hide">
			<select name="ledger_sub_account[]" class="m-wrap medium">
			<option value="" style="display:none;">Select</option>
			<?php foreach($members_for_billing as $ledger_sub_account_id){
			$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
			echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
			} ?>
			</select> 
			</div>
		<div id="other_income_select_box" class="hide">
		<select name="other_income[]" class="m-wrap medium">
		<option value="" style="display:none;">Select</option>
		<?php
		foreach ($cursor2 as $collection){
		$auto_id = (int)$collection['ledger_account']['auto_id'];
		$name = $collection['ledger_account']['ledger_name'];
		?>
		<option value="<?php echo $auto_id; ?>"><?php echo $name; ?></option>
		<?php } ?>
		</select>
		</div>
	</td>
	<td>
	<select class="m-wrap span12" name="account_head[]">
    <option value="" style="display:none;">Select</option>
    <option value="32" selected="selected">Cash-in-hand</option>
    </select>
	</td>
	<td>
	<input type="text" class="m-wrap span12" style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="5" name="amount[]" id="amount">
	</td>
	<td>
	<div style="margin-top: -4px; margin-right: -5px;" class="pull-right">
	<a style="" role="button" class="btn mini  remove_row" href="#"><i class="icon-trash"></i></a><br>
	<a href="#" role="button" class="btn mini add_row"><i class="icon-plus"></i></a>
	</div>
	
	<input type="text" class="m-wrap span10"  name="narration[]" style="background-color:white !important; margin-top:2.5px;">
	</td>
</tr>
</tbody>
</table>

<script>
$(document).ready(function(){
	add_row();
	function add_row(){
	var new_line=$("#sample tbody").html();
	$("#main tbody").append(new_line);
	$('#main tbody tr:last select[name="account_group[]"]').chosen();
	$('#main tbody tr:last select[name="account_head[]"]').chosen();
	$('#main tbody tr:last select[name="other_income[]"]').chosen();
	$('#main tbody tr:last select[name="ledger_sub_account[]"]').chosen();
	$('#main tbody tr:last input[name="transaction_date[]"]').datepicker();
	}
	
	$(".add_row").die().live("click",function(){
		add_row();
	})
	$(".remove_row").die().live("click",function(){
		$(this).closest("tr").remove();
	})

});
</script>

<script>
$('select[name="account_group[]"]').die().live("change",function(){
		var account_group=$(this).val();
		if(account_group=='1'){
			$(this).parent().next('td').find("#default_select_box").hide();
			$(this).parent().next('td').find("#other_income_select_box").hide();
			$(this).parent().next('td').find("#members_select_box").show();
		}else{
			$(this).parent().next('td').find("#default_select_box").hide();
			$(this).parent().next('td').find("#other_income_select_box").show();
			$(this).parent().next('td').find("#members_select_box").hide();
		}
		if(account_group==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			
		}else{
			$(this).closest('td').find(".er").remove();
		}
		
		
		
		
});

</script>

<script>
$('input[name="amount[]"]').die().live("keyup",function(){
		var amount=$(this).val();
		if($.isNumeric(amount))
		{
		}else{
		$(this).closest("td").find("#amount").val('');	
		}
});
</script>

<script>
$("form").on("submit",function(e){
		var allow="yes";
					
		$('#main tbody tr select[name="account_group[]"]').each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
			if(deposited_in==1){
				
				var ledger_sub_account=$(this).closest("tr").find('select[name="ledger_sub_account[]"]').val();
			if(ledger_sub_account==""){
				$(this).parent().next('td').find(".er").remove();
				$(this).parent().next('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).parent().next('td').find(".er").remove();
			}
			}
			else
			{
				
			var other_income=$(this).closest("tr").find('select[name="other_income[]"]').val();
			
			if(other_income==""){
				$(this).parent().next('td').find(".er").remove();
				$(this).parent().next('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).parent().next('td').find(".er").remove();
			}	
				
			}
			
		});	

	
$('#main tbody tr select[name="account_head[]"]').each(function(i, obj) {
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});


$('#main tbody tr input[name="amount[]"]').each(function(i, obj) {
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
	
	$('#main tbody tr input[name="transaction_date[]"]').die().each(function(ii, obj){
			var transaction_date=$(this).val();
			var ledger_sub_account_id=$('#main tbody tr:eq('+ii+') select[name="ledger_sub_account[]"]').val();
			var ledger_type=$('#main tbody tr:eq('+ii+') select[name="account_group[]"]').val();
			if(ledger_type==1){
			var result=""; 
			$.ajax({
			url:"<?php echo $webroot_path; ?>Cashbanks/petty_cash_receipt_date_validation/"+transaction_date+"/"+ledger_sub_account_id, 
			async: false,
			success: function(data){
			result=data;
			}
		});
		if(result=="financial_year"){
			allow="no";
			$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();
			$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').append('<p class="er">Not in financial year</p>');
		}else if(result=="match"){
		 allow="no";
			$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();
			$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').append('<p class="er">Regular bill date error</p>');
		}else{
		$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();		
		}
		
		
		
			}else{
				
			var result=""; 
			$.ajax({
			url:"<?php echo $webroot_path; ?>Cashbanks/financial_year_validation/"+transaction_date, 
			async: false,
			success: function(data){
			result=data;
			}
			});	
				
			if(result=="not_match"){
		 allow="no";
			$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();
			$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').append('<p class="er">Not in financial year</p>');
		}
		if(result=="match"){
		$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();	
		}	
    	}
	});

	
	if(allow=="no"){
			e.preventDefault();
		}
});

$('select[name="ledger_sub_account[]"]').die().live("change",function(){
		var deposited_in=$(this).val();
		if(deposited_in==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	
	
	
	
	
$('select[name="other_income[]"]').die().live("change",function(){
		var deposited_in=$(this).val();
		if(deposited_in==""){
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
		$(this).closest("td").find("#amount").val('');	
		}
	});
	
</script>
<style>
input,select{
	margin:0 !important;
}
.er{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>
<?php $default_date = date('d-m-Y'); ?>
