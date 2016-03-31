<?php 
foreach ($cursor1 as $collection) 
{
$transaction_id=(int)$collection['cash_bank']['transaction_id'];	
$receipt_no = $collection['cash_bank']['receipt_id'];
$d_date = $collection['cash_bank']['transaction_date'];
$today = date("d-M-Y");
$amount = $collection['cash_bank']['amount'];
$society_id = (int)$collection['cash_bank']['society_id'];
$narration = @$collection['cash_bank']['narration'];
$user_id = (int)@$collection['cash_bank']['user_id'];
$account_type = (int)@$collection['cash_bank']['account_type'];
$sub_account = (int)$collection['cash_bank']['account_head'];
$transaction_date = date('d-m-Y');
}
?>
<body onload="loaddajjax(<?php echo $account_type; ?>,<?php echo $user_id;  ?>)" style="overflow:hidden">
<form method="post">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Update Petty Cash Payment</h4>
</div>
<div class="portlet-body form">

<div class="row-fluid">
<div class="span6">
<input type="hidden" name="element_id" value="<?php echo $transaction_id; ?>">
<input type="hidden" name="receipt_no" value="<?php echo $receipt_no; ?>">

	<label style="font-size:14px;">Transaction Date<span style="color:red;">*</span></label>
	<input type="text" class="date-picker m-wrap span6" data-date-format="dd-mm-yyyy" value="<?php echo $transaction_date; ?>" name="transaction_date">


<br />


	<label style="font-size:14px;">A/c Group<span style="color:red;">*</span></label>
	<select name="account_group" class="m-wrap span6 chosen">
	<option value="" style="display:none;">Select</option>
	<option value="1" <?php if($account_type == 1) { ?> selected="selected" <?php } ?>>Sundry Creditors Control A/c</option>
	<option value="2" <?php if($account_type == 2) { ?> selected="selected" <?php } ?>>All Expenditure A/cs</option>
	</select>

<br />

		<label style="font-size:14px;">Expense/Party A/c<span style="color:red;">*</span></label>	
		<div <?php if($account_type==2){ ?> class="hide" <?php } ?> id="sundry_creditors_select_box">
			<select class="m-wrap medium chosen" name="sundry_creditor">
			<option value="" style="display:none;">Select</option>
			<?php foreach ($cursor4 as $collection){
			$auto_id=(int)$collection['ledger_sub_account']['auto_id'];
			$name=$collection['ledger_sub_account']['name'];
			?>
			<option value="<?php echo $auto_id; ?>" <?php if($account_type==1 && $auto_id==$user_id){ ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
			<?php } ?>
			</select>
		</div>
	
		<div <?php if($account_type==1){ ?> class="hide" <?php } ?> id="expenditure_select_box">
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
		</div>

<br>

</div>
<div class="span6">

	<label style="font-size:14px;">Paid From<span style="color:red;">*</span></label>
	<select name="paid_from" class="m-wrap span6 chosen">
	<option value="" style="display:none;">Select</option>
	<option value="32" selected="selected">Cash-in-hand</option>
	</select> 

<br />


<label style="font-size:14px;">Amount<span style="color:red;">*</span></label>

<input type="text" name="amount" class="m-wrap span6" value="<?php echo $amount; ?>">

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
		}else{
			$("#expenditure_select_box").show();
			$("#sundry_creditors_select_box").hide();
		}
});
</script> 





