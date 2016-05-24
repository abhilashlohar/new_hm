<?php 
	foreach ($cursor1 as $collection){
	$transaction_id=(int)$collection['cash_bank']['transaction_id'];	
	  $receipt_no = $collection['cash_bank']['receipt_number'];
		$d_date = $collection['cash_bank']['transaction_date'];
		  $today = date("d-M-Y");
			$amount = $collection['cash_bank']['amount'];
			  $society_id = (int)$collection['cash_bank']['society_id'];
				$narration = @$collection['cash_bank']['narration'];
				  $user_id = (int)@$collection['cash_bank']['sundry_creditor_id'];
					$account_type = (int)@$collection['cash_bank']['account_type'];
					  $sub_account = (int)$collection['cash_bank']['account_head'];
				$transaction_date = date('d-m-Y');
}
?>

<form method="post">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Update Petty Cash Payment</h4>
</div>
<div class="portlet-body form">

<div class="row-fluid">
<div class="span6">
<input type="hidden" value="<?php echo $financial_year_string; ?>" id="f_y"/>
<input type="hidden" name="element_id" value="<?php echo $transaction_id; ?>">
<input type="hidden" name="receipt_no" value="<?php echo $receipt_no; ?>">

	<label style="font-size:14px;">Transaction Date<span style="color:red;">*</span></label>
	<input type="text" class="date-picker m-wrap span6" data-date-format="dd-mm-yyyy" value="<?php echo $transaction_date; ?>" name="transaction_date">
    <label id="date" class="validation"></label>

<br />


	<label style="font-size:14px;">A/c Group<span style="color:red;">*</span></label>
	<select name="account_group" class="m-wrap span6 chosen">
	<option value="" style="display:none;">Select</option>
	<option value="1" <?php if($account_type == 1) { ?> selected="selected" <?php } ?>>Sundry Creditors Control A/c</option>
	<option value="2" <?php if($account_type == 2) { ?> selected="selected" <?php } ?>>All Expenditure A/cs</option>
	<option value="3" <?php if($account_type == 3) { ?> selected="selected" <?php } ?>>Liability</option>
	</select>
   <label id="group" class="validation"></label>
<br />

		<label style="font-size:14px;">Expense/Party A/c<span style="color:red;">*</span></label>	
		<div <?php if($account_type==2 || $account_type==3){ ?> class="hide" <?php } ?> id="sundry_creditors_select_box">
			<select class="m-wrap medium chosen" name="sundry_creditor">
			<option value="" style="display:none;">Select</option>
			<?php foreach ($cursor4 as $collection){
			$auto_id=(int)$collection['ledger_sub_account']['auto_id'];
			$name=$collection['ledger_sub_account']['name'];
			?>
			<option value="<?php echo $auto_id; ?>" <?php if($account_type==1 && $auto_id==$user_id){ ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
			<?php } ?>
			</select>
			<label id="sundry_creditor" class="validation"></label>
		</div>
	
		<div <?php if($account_type==1 || $account_type==3){ ?> class="hide" <?php } ?> id="expenditure_select_box">
			<select class="m-wrap medium chosen" name="expenditure">
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
			<option value="<?php echo $sub_id; ?>" <?php if($account_type==2 && $sub_id==$user_id){ ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
			<?php }} ?>
			</select>
			<label id="expenditure" class="validation"></label>
		</div>
			<div <?php if($account_type==2 || $account_type==1){ ?> class="hide" <?php } ?> id="liability_dropdown">
				<select class="m-wrap medium chosen" name="tax">
				<option value="" style="display:none;">Select</option>
				<option value="16" <?php if($account_type==3 && $user_id==16){ ?> selected="selected"    <?php } ?>>Tax deducted at source (TDS payable)</option>
				</select>
			  <label id="tax_valid" class="validation"></label>
			</div>
<br>

</div>
<div class="span6">

	<label style="font-size:14px;">Paid From<span style="color:red;">*</span></label>
	<select name="paid_from" class="m-wrap span6 chosen">
	<option value="" style="display:none;">Select</option>
	<option value="32" selected="selected">Cash-in-hand</option>
	</select> 
	<label id="paid_from" class="validation"></label>
<br />


<label style="font-size:14px;">Amount<span style="color:red;">*</span></label>

<input type="text" name="amount" class="m-wrap span6" value="<?php echo $amount; ?>" style="text-align:right;">
<label id="amount" class="validation"></label>
<br />



<label style="font-size:14px;">Narration</label>
<input type="text" name="narration" class="m-wrap span10" value="<?php echo $narration; ?>">

<br>
</div>
</div>
<div class="form-actions">
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_payment_view" class="btn green"><i class="icon-arrow-left"></i> Back</a>
<button type="submit" class="btn blue" name="submit">Update</button>
</div>
</div>
</div>
</form>
</body>



<script>
$('select[name="account_group"]').die().live("change",function(){
		var account_group=$(this).val();
		if(account_group=='1'){
			$("#expenditure_select_box").hide();
			$("#sundry_creditors_select_box").show();
			$("#liability_dropdown").hide();
		}else if(account_group=='2'){
			$("#expenditure_select_box").show();
			$("#sundry_creditors_select_box").hide();
			$("#liability_dropdown").hide();
		}
		else{
			$("#expenditure_select_box").hide();
			$("#sundry_creditors_select_box").hide();
			$("#liability_dropdown").show();
		}
		
		
		if(account_group==""){
			$("#group").html('Required');
		}else{
			$("#group").html('');
		}
});
</script> 
<script>
$(document).ready(function(){	
	$("form").die().on("submit",function(e){
		var allow="yes";
		
		var transaction_date=$('input[name="transaction_date"]').val();
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
					$("#date").html('');
					al=al+1;
				}else{
					$("#date").html('not in financial year');
					al=al+0;
				}
			});
			if(al==0){
				allow="no";
			}
		 
		 var account_group=$('select[name="account_group"]').val();
	  if(account_group==""){
			$("#group").html('Required');	
				allow="no";
			}else{
				$("#group").html('');
			}
		
		if(account_group==1)	
		{
		var sundry_creditor=$('select[name="sundry_creditor"]').val();	
			 if(sundry_creditor==""){
			$("#sundry_creditor").html('Required');	
				allow="no";
			}else{
				$("#sundry_creditor").html('');
			}
		}else if(account_group==2){
			var expenditure=$('select[name="expenditure"]').val();	
			 if(expenditure==""){
			$("#expenditure").html('Required');	
				allow="no";
			}else{
				$("#expenditure").html('');
			}
		}else{
			var expenditure=$('select[name="tax"]').val();	
			 if(expenditure==""){
			$("#tax_valid").html('Required');	
				allow="no";
			}else{
				$("#tax_valid").html('');
			}
     	}
		 var paid_from=$('select[name="paid_from"]').val();
			if(paid_from==""){
			$("#paid_from").html('Required');	
				allow="no";
			}else{
				$("#paid_from").html('');
			}	
			 var amount=$('input[name="amount"]').val();
			if(amount==""){
			$("#amount").html('Required');	
				allow="no";
			}else{
				$("#amount").html('');
			}
		
		
		
		
		
		
		
		
	 if(allow=="no"){
				e.preventDefault();
			}	
	});
});	

$('input[name="transaction_date"]').die().live("keyup blur",function(){
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
				$("#date").html('not in financial year');
			}
			else{ $("#date").html('');  }
	});


$('select[name="sundry_creditor"]').die().live("change",function(){
		var sundry_creditor=$(this).val();
		if(sundry_creditor==""){
			$("#sundry_creditor").html('Required');
		}else{
			$("#sundry_creditor").html('');
		}
	});
$('select[name="expenditure"]').die().live("change",function(){
		var expenditure=$(this).val();
		if(expenditure==""){
			$("#expenditure").html('Required');
		}else{
			$("#expenditure").html('');
		}
	});
	
$('select[name="paid_from"]').die().live("change",function(){
		var paid_from=$(this).val();
		if(paid_from==""){
			$("#paid_from").html('Required');
		}else{
			$("#paid_from").html('');
		}
	});
	
$('input[name="amount"]').die().live("keyup blur",function(){
		var amount=$(this).val();
		if(amount=="" || amount==0){
			$("#amount").html('Required');
		}else{
			$("#amount").html('');
		}
		if($.isNumeric(amount))
		{
		}else{
			$('input[name="amount"]').val('');
		}
	});






		
</script>		

<style>		
.validation{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>


