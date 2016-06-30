
<div class="hide_at_print">
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

</div>
<center>  
<div class="hide_at_print">            
<?php
//if($s_role_id == 3)
//{
?>              
<a href="<?php echo $webroot_path; ?>Cashbanks/new_bank_receipt" class="btn" rel='tab'>Create</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" class="btn" rel='tab'>View</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_deposit_slip" class="btn" rel='tab'>Deposit Slip</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_approve" class="btn yellow" rel='tab'>Approve Receipts</a>
<?php //} ?>
</div>
</center>
<br>
<?php	
$nnn=55;
foreach ($result_temp_cash_bank as $collection) 
{
$nnn = 555;
}
?>


<?php if($nnn == 555)
{
	?>
<table  width="100%" class="table table-bordered table-hover" id="report_tb">
<thead>
<tr id="bg_color">
<th>Sr#</th>
<th>Receipt Date </th>
<th>Party Name</th>
<th>Payment Mode</th>
<th>Instrument/UTR</th>
<th>Deposit Bank</th>
<th>Narration</th>
<th>Amount</th>
<th class="hide_at_print">Action</th> 
</tr>
</thead>
<tbody id="table">

	<?php
	$total_credit = 0;
	$total_debit = 0;
	$n=0;
	foreach ($result_temp_cash_bank as $collection) 
	{
	$n++;
	$receipt_mode = $collection['temp_cash_bank']['receipt_mode'];
	$TransactionDate = $collection['temp_cash_bank']['receipt_date'];
	$transaction_id = $collection['temp_cash_bank']['auto_id'];
	$bill_one_time_id = @$collection['temp_cash_bank']['bill_one_time_id'];
	$deposit_status = (int)@$collection['temp_cash_bank']['deposit_status']; 			
	$current_date = $collection['temp_cash_bank']['current_date']; 			
	$current_datttt = date('d-m-Y',strtotime($current_date));
	$creater_user_id =(int)@$collection['temp_cash_bank']['prepaired_by'];
			
	$result_user = $this->requestAction(array('controller'=>'Fns','action'=>'user_info_via_user_id'),array('pass'=>array($creater_user_id)));
	foreach ($result_user as $user_data) {
	$creater_name = $user_data['user']['user_name'];
	}	
	if($receipt_mode == "Cheque"){
		 $reference_utr = $collection['temp_cash_bank']['cheque_number'];
		 $cheque_date = $collection['temp_cash_bank']['cheque_date'];
		 $drawn_on_which_bank = $collection['temp_cash_bank']['drawn_on_which_bank'];
	}
	else{
		 $reference_utr = $collection['temp_cash_bank']['reference_utr'];
		 $cheque_date = $collection['temp_cash_bank']['cheque_date'];
	}
		$member_type = $collection['temp_cash_bank']['member_type'];
		$narration = @$collection['temp_cash_bank']['narration'];
	if($member_type == "residential"){
			 $ledger_sub_account_id = (int)$collection['temp_cash_bank']['ledger_sub_account_id'];
			 $receipt_type = $collection['temp_cash_bank']['receipt_type'];
		if($receipt_type == "maintenance"){
			$receipt_tppp = "Maintenance";	
		}
		else{
			$receipt_tppp = "Other";	
		}
				
		$member_info=$this->requestAction(array('controller'=>'Fns','action'=>'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
		$wing_id = $member_info['wing_id'];
		$flat_id = $member_info['flat_id'];
		$party_name = $member_info['user_name'];
			
		$wing_flat=$this->requestAction(array('controller' => 'Fns', 'action' => 'wing_flat_via_wing_id_and_flat_id'),array('pass'=>array($wing_id,$flat_id)));
	}
	else
	{
		$receipt_tppp = "Non-Residential";	
		$wing_flat = "";
		$party_name_id = (int)$collection['temp_cash_bank']['party_name_id'];
				
		$ledger_subaccc = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($party_name_id)));
		foreach ($ledger_subaccc as $dataaa) 
		{
		$party_name = $dataaa['ledger_sub_account']['name'];
		}	
		$bill_reference = @$collection['temp_cash_bank']['bill_reference'];	
	}
	
	$amount=$collection['temp_cash_bank']['amount'];
	$deposited_bank_id = (int)$collection['temp_cash_bank']['deposited_bank_id'];
	$current_date = $collection['temp_cash_bank']['current_date'];
	if($receipt_mode == "Cheque")
	{
	$receipt_mode = $receipt_mode;
	}
			
			
			$ledger_sub_account_fetch_result = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($deposited_bank_id)));			
			foreach($ledger_sub_account_fetch_result as $rrrr)
			{
				$deposited_bank_name = $rrrr['ledger_sub_account']['name'];	
				$bank_account = $rrrr['ledger_sub_account']['bank_account'];
			}			
			
		
		$TransactionDate = date('d-m-Y',$TransactionDate);
		$total_debit =  $total_debit + $amount; 
		if(empty($reference_utr)){
		$reference_utr = $reference_utr;
		}
?>
<tr <?php if($deposit_status == 1) { ?> style="background-color:#E8EAE8;"  <?php } ?> >
<td><?php echo $n; ?> </td>
<td><?php echo $TransactionDate; ?></td>
<td><?php echo $party_name; ?>&nbsp;(<?php echo $wing_flat; ?>)</td>
<td><?php echo $receipt_mode; ?> - <?php echo @$drawn_on_which_bank; ?></td>
<td><?php echo @$reference_utr; ?> </td>
<td><?php echo $deposited_bank_name; ?>&nbsp;(<?php echo $bank_account; ?>)</td>
<td><?php echo $narration; ?> </td>
<td align='right'>
<?php 
if(!empty($amount))
{
$amount = number_format($amount);
}
echo $amount; ?></td>
<td class="hide_at_print">
<a href="approve_bank_receipt_ajax/<?php echo $transaction_id; ?>" class="btn mini red">Approve</a>
<a href="aprrove_bank_receipt_update?bb=<?php echo $transaction_id; ?>" class="btn mini blue">Edit</a>
</td>
</tr>
<?php	
	 
}

?>
<tr>
<td colspan="8" style="text-align:right;"><b>Total</b></td>
<td align="right"><b><?php 
$total_debit = number_format($total_debit);
echo $total_debit; ?> <?php //echo "  dr"; ?></b></td>
<td class="hide_at_print"></td>
</tr>
</tbody>										 
</table> 

<?php } else {
	?>
	<center>
	<br><br>
<h3>No Receipt Found for Approval</h4>
</center>
	<?php
	
}






