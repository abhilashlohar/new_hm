<?php
foreach($cursor1 as $data){
	$receipt_no=$data['cash_bank']['receipt_id'];
	$d_date=$data['cash_bank']['transaction_date'];
	$today=date("d-M-Y");
	$amount=$data['cash_bank']['amount'];
	$society_id=(int)$data['cash_bank']['society_id'];
	$narration=@$data['cash_bank']['narration'];
	$user_id=(int)@$data['cash_bank']['user_id'];
	$account_type=(int)@$data['cash_bank']['account_type'];
	$sub_account=(int)$data['cash_bank']['account_head'];
	$auto_id=(int)$data['cash_bank']['transaction_id'];
}

$trnsaction_date = date('d-m-Y',$d_date);
?>
<form method="post" id="contact-form">
<input type="hidden" value="<?php echo $receipt_no; ?>" name="receipt_no">
<input type="hidden" value="<?php echo $auto_id; ?>" name="element_id">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Update Petty Cash Receipt</h4>
</div>
<div class="portlet-body form">
<div class="row-fluid">                      
<div class="span6">

	<label style="font-size:14px;">Transaction Date<span style="color:red;">*</span></label>                        
	<input type="text" class="date-picker m-wrap span6" data-date-format="dd-mm-yyyy" name="transaction_date" data-date-start-date="+0d" value="<?php echo $trnsaction_date; ?>" id="date">  
     <label id="date"></label>
<br>

	<label style="font-size:14px;">A/c Group<span style="color:red;">*</span></label>  
	<select class="m-wrap span6 chosen" name="account_group">
	<option value="" style="display:none;">Select</option>
	<option value="1" <?php if($account_type == 1){ ?> selected="selected" <?php } ?>>Members Control A/c</option>
	<option value="2" <?php if($account_type == 2){ ?> selected="selected" <?php } ?>>Other Income</option>
	</select>
    <span class="er1"></span>
<br>

		<label style="font-size:14px;">Income/Party A/c<span style="color:red;">*</span></label>  
		<div id="members_select_box" <?php if($account_type==2){ ?> class="hide" <?php } ?>>
		<select name="ledger_sub_account" class="m-wrap medium chosen">
		<option value="" style="display:none;">Select</option>
		<?php foreach($members_for_billing as $ledger_sub_account_id){
		$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
		?>
		<option value=<?php echo $ledger_sub_account_id; ?> <?php if($ledger_sub_account_id==$user_id && $account_type==1){ ?> selected="selected" <?php } ?>><?php echo ''.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
		} ?>
		</select> 
		</div>
		<div id="other_income_select_box" <?php if($account_type==1){ ?> class="hide" <?php } ?>>
		<select name="other_income" class="m-wrap medium chosen">
		<option value="" style="display:none;">Select</option>
		<?php
		foreach ($cursor2 as $collection){
		$auto_id = (int)$collection['ledger_account']['auto_id'];
		$name = $collection['ledger_account']['ledger_name'];
		?>
		<option value="<?php echo $auto_id; ?>" <?php if($auto_id==$user_id && $account_type==2){ ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
		<?php } ?>
		</select>
		</div>

</div>
<div class="span6">
  
	<label style="font-size:14px;">Account Head<span style="color:red;">*</span></label>  
	<select   name="account_head" class="m-wrap span6 chosen">
	<option value="" style="display:none;">Select</option>
	<option value="32" selected="selected">Cash-in-hand</option>
	</select> 

<br>

<label style="font-size:14px;">Amount<span style="color:red;">*</span></label>  
<input type="text" class="m-wrap span6" style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="5" name="amount" value="<?php echo $amount; ?>">

<br>

<label style="font-size:14px;">Narration</label> 
<input type="text" class="m-wrap span10"  name="narration" style="background-color:white !important; margin-top:2.5px;" value="<?php echo $narration; ?>">


 
</div>                          
</div>                           
<div class="form-actions">
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_receipt_view" class="btn green" rel="tab"><i class="icon-arrow-left"></i> Back</a>
<button type="submit" class="btn blue" name="submit">Update</button>
</div>
</div>
</div>
</form>

<script>
$('select[name="account_group"]').die().live("change",function(){
		var account_group=$(this).val();
		if(account_group=='1'){
			$("#other_income_select_box").hide();
			$("#members_select_box").show();
		}else{
			$("#other_income_select_box").show();
			$("#members_select_box").hide();
		}
});

</script>

		
		
		
	


