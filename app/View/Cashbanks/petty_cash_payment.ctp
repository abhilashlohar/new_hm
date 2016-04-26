<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

<center>
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_payment" class="btn yellow" rel='tab'>Create</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_payment_view" class="btn" rel='tab'>View</a>
</center>	   
<?php
$default_date = date('d-m-Y');
?>
<input type="hidden" value="<?php echo $financial_year_string; ?>" id="f_y"/>
<!-------------------------- START NEW CODE--------------------------->
<div class="portlet box">
<div class="portlet-body">
	<form method="post">
		<table class="table table-condensed table-bordered" id="main">
			<thead>
				<tr>
					<th width="120px">Transaction Date</th>
					<th width="200px">A/c Group</th>
					<th width="200px">Expense/Party A/c</th>
					<th width="130px">Paid From</th>
					<th width="100px">Amount</th>
					<th>Narration</th>
				</tr>
			</thead>
			<tbody>
				
				
			</tbody>
		</table>
		<button type="submit" class="btn blue pull-right" name="submit">Create Voucher</button>
	</form>
		<!--<a href="#" role="button" id="add_row" class="btn"><i class="icon-plus"></i> Add Row</a>-->
</div>
</div>

<table id="sample" style="display:none;">
	<tbody>
		<tr>
			<td><input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy"  value="<?php echo $default_date; ?>" name="transaction_date[]"></td>
			
			<td><select class="m-wrap span12" name="account_group[]">
			<option value="" style="display:none;">Select</option>
			<option value="1">Sundry Creditors Control A/c</option>
			<option value="2">All Expenditure A/cs</option>
			</select></td>

			<td>
			<div id="default_select_box">
			<select class="m-wrap span12">
			<option value="" style="display:none;">Select</option>
			</select>
			</div>
			<div class="hide" id="sundry_creditors_select_box">
				<select class="m-wrap medium" name="sundry_creditor[]">
				<option value="" style="display:none;">Select</option>
				<?php foreach ($cursor1 as $collection){
				$auto_id=(int)$collection['ledger_sub_account']['auto_id'];
				$name=$collection['ledger_sub_account']['name'];
				?>
				<option value="<?php echo $auto_id; ?>"><?php echo $name; ?></option>
				<?php } ?>
				</select>
			</div>
			<div class="hide" id="expenditure_select_box">
				<select class="m-wrap medium" name="expenditure[]">
				<option value="" style="display:none;">Select</option>
				<?php
				foreach($cursor2 as $collection)
				{
				$auto_id1 = (int)$collection['accounts_group']['auto_id'];
				$result_ledger_account = $this->requestAction(array('controller' => 'hms', 'action' => 'expense_tracker_fetch2'),array('pass'=>array($auto_id1)));
				foreach($result_ledger_account as $collection2)
				{
				$sub_id = (int)$collection2['ledger_account']['auto_id'];
				$name = $collection2['ledger_account']['ledger_name'];
				?>
				<option value="<?php echo $sub_id; ?>"><?php echo $name; ?></option>
				<?php }} ?>
				</select>
			</div>
			</td>

			<td><select name="paid_from[]" class="m-wrap span12">
			<option value="" style="display:none;">Select</option>
			<option value="32" selected="selected">Cash-in-hand</option>
			</select></td>

			<td><input type="text" class="m-wrap span12" maxlength="5" name="amount[]" style="text-align:right;" id="amount">
			</td>
			
			<td><input type="text" class="m-wrap span10" name="narration[]">
			<div style="margin-top: -4px; margin-right: -5px;" class="pull-right">
			<a style="" role="button" class="btn mini  remove_row" href="#"><i class="icon-trash"></i></a><br>
			<a href="#" class="btn mini add_row" role="button"><i class="icon-plus"></i></a>
			</div>
			
			
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
	$('#main tbody tr:last select[name="paid_from[]"]').chosen();
	$('#main tbody tr:last select[name="sundry_creditor[]"]').chosen();
	$('#main tbody tr:last select[name="expenditure[]"]').chosen();
	$('#main tbody tr:last input[name="transaction_date[]"]').datepicker();
	}
	
	$("#add_row").on("click",function(){
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
			$(this).parent().next('td').find("#expenditure_select_box").hide();
			$(this).parent().next('td').find("#sundry_creditors_select_box").show();
		}else{
			$(this).parent().next('td').find("#default_select_box").hide();
			$(this).parent().next('td').find("#expenditure_select_box").show();
			$(this).parent().next('td').find("#sundry_creditors_select_box").hide();
		}
		if(account_group==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
});

</script> 

<script>
$('input[name="amount[]"]').die().live("keyup",function(){
	var amount=$(this).val();
	if($.isNumeric(amount)){
	}else{
		$(this).closest("td").find("#amount").val('');	
	}
});
</script>








<script>
$("form").on("submit",function(e){
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


		$('#main tbody tr select[name="account_group[]"]').each(function(i, obj) {
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
			if(deposited_in==1){
				
				var ledger_sub_account=$(this).closest("tr").find('select[name="sundry_creditor[]"]').val();
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
				
			var other_income=$(this).closest("tr").find('select[name="expenditure[]"]').val();
			
			if(other_income==""){
				$(this).parent().next('td').find(".er").remove();
				$(this).parent().next('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).parent().next('td').find(".er").remove();
			}	
				
			}
			
			
			
			
			
			
			
			
			
		});	

		
	$('#main tbody tr select[name="paid_from[]"]').each(function(i, obj) {
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
		
     if(allow=="no"){
			e.preventDefault();
		}
		else{
		$("button[name=submit]").hide();
	}
});

$('select[name="sundry_creditor[]"]').die().live("change",function(){
		var deposited_in=$(this).val();
		if(deposited_in==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
$('select[name="expenditure[]"]').die().live("change",function(){
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

$('input[name="transaction_date[]"]').die().live("keyup blur",function(){
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
				  al=al+1;
				}else{
				   al=al+0;
				}
			});
			if(al==0){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<p class="er">Not in financial year</p>');
			}else{
				$(this).closest('td').find(".er").remove();
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
<!---------------------------END NEW CODE---------------------------->
   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   