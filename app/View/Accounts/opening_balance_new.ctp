<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>

<form method="post">
	<input type="text" class="m-wrap medium date-picker" data-date-format="dd-mm-yyyy" Placeholder="Opening Balance Date" style="background-color:white !important;" name="date" id="date">
	<br><br>
	<table class="table table-bordered table-condensed " style="background-color:white;">
		<tr>
			<th>Accounts Group</th>
			<th>ledger Name</th>
			<th>Debit</th>
			<th>Credit</th>
			<th>Penalty (debit)</th>
		</tr>
       <?php 
	   $total_debit=0;
	   $total_credit=0;
	   $total_penalty=0;
	   $grand_total_debit=0;
	   $grand_total_credit=0;
		foreach($arranged_groups as $group_id=>$ledger_acc_data){
		foreach($ledger_acc_data as $key=>$ledger_accounts){
			if($key!=0){
			$ledger_account_id=$ledger_accounts["ledger_account"]["auto_id"];
		$debit_for_view="";
		$credit_for_view="";
		if(!empty($result_bank_receipt_converted))
		{
			foreach($result_bank_receipt_converted as $data){ 
			$csv_id=(int)$data['opening_balance_csv_converted']['auto_id']; 
			$group_id2=(int)$data['opening_balance_csv_converted']['group_id'];
			$ledger_id=(int)$data['opening_balance_csv_converted']['ledger_id'];
			$ledger_type=(int)$data['opening_balance_csv_converted']['ledger_type'];
			$wing_id = (int)$data['opening_balance_csv_converted']['wing_id'];
			$flat_id = (int)$data['opening_balance_csv_converted']['flat_id'];
			$debit = $data['opening_balance_csv_converted']['debit'];
			$credit = $data['opening_balance_csv_converted']['credit'];
			$penalty = $data['opening_balance_csv_converted']['penalty'];
				if($ledger_account_id == $ledger_id && $group_id2 != 34 && $group_id2 != 33 && $group_id2 != 35 && $group_id2 != 15 && $group_id2 != 112)
				{
				$total_debit=$total_debit+$debit;
				$total_credit=$total_credit+$credit;
				$grand_total_debit=$grand_total_debit+$debit;
				$grand_total_credit=$grand_total_credit+$credit;
				$debit_for_view=$debit;
				$credit_for_view=$credit;
				}
			}	
		}		
?>
                <tr>
					<td><?php echo $ledger_acc_data[0]["group_name"]; ?></td>
					<td><?php echo $ledger_accounts["ledger_account"]["ledger_name"]; ?>
					<input type="hidden" value="<?php echo $ledger_accounts["ledger_account"]["auto_id"]; ?>" name="ledger_id[]">
					</td>
					<td><input type="text" class="m-wrap small debit" name="debit[]" Placeholder="Debit" value="<?php echo $debit_for_view; ?>"></td>
					<td><input type="text" class="m-wrap small credit" name="credit[]" Placeholder="Credit" value="<?php echo $credit_for_view; ?>"></td>
					<td><input type="hidden" value="" name="penalty[]"></td>
				</tr>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	<?php 
     foreach($members_for_billing as $ledger_sub_account_id){
		$debit_for_view="";
		$credit_for_view="";
		$penalty_for_view="";
	     $ledger_sub_account=(int)$ledger_sub_account_id;

	      $ledger_sub_account_data = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account)));
	      foreach ($ledger_sub_account_data as $ledger_sub_account_data){
$ledger_sub_account_name = $ledger_sub_account_data['ledger_sub_account']['name'];
$ledger_id=(int)$ledger_sub_account_data['ledger_sub_account']['ledger_id'];
$ledger_sub_account_id=(int)$ledger_sub_account_data['ledger_sub_account']['auto_id'];
$user_flat_id=(int)$ledger_sub_account_data['ledger_sub_account']['user_flat_id'];
}

$user_flat_data=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_flat_info_via_user_flat_id'),array('pass'=>array($user_flat_id)));				
foreach($user_flat_data as $user_flat_dataa){
$wing_id=(int)$user_flat_dataa['user_flat']['wing'];
$flat_id=(int)$user_flat_dataa['user_flat']['flat'];
}
$wing_flat=$this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat_new')
,array('pass'=>array($wing_id,$flat_id)));	
		  
		  
		  $ledger_data = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_account_info_via_ledger_id'),array('pass'=>array($ledger_id)));
	      foreach ($ledger_data as $ledger_data){
	      $ledger_name = $ledger_data['ledger_account']['ledger_name'];
		  }
        $debit_for_view="";
        $credit_for_view="";
        if(!empty($result_bank_receipt_converted))
		{
			foreach($result_bank_receipt_converted as $data){ 
			$csv_id=(int)$data['opening_balance_csv_converted']['auto_id']; 
			$group_id2=(int)$data['opening_balance_csv_converted']['group_id'];
			$ledger_id=(int)$data['opening_balance_csv_converted']['ledger_id'];
			$ledger_type=(int)$data['opening_balance_csv_converted']['ledger_type'];
			$wing_id = (int)$data['opening_balance_csv_converted']['wing_id'];
			$flat_id = (int)$data['opening_balance_csv_converted']['flat_id'];
			$debit = $data['opening_balance_csv_converted']['debit'];
			$credit = $data['opening_balance_csv_converted']['credit'];
			$penalty = $data['opening_balance_csv_converted']['penalty'];
				if($ledger_sub_account_id == $ledger_id)
				{
				$total_debit=$total_debit+$debit;
				$total_credit=$total_credit+$credit;
				$total_penalty=$total_penalty+$penalty;
				$grand_total_debit=$grand_total_debit+$debit+$penalty;
				$grand_total_credit=$grand_total_credit+$credit;
				$debit_for_view=$debit;
				$credit_for_view=$credit;
				$penalty_for_view=$penalty;
				}
			}	
		}	
	  ?>
	<tr>
		<td><?php echo $ledger_name; ?></td> 
		<td><?php echo $ledger_sub_account_name; ?>&nbsp;&nbsp; (<?php echo $wing_flat; ?>)
		<input type="hidden" value="<?php echo $ledger_id; ?>,<?php echo $ledger_sub_account_id; ?>"
		name="ledger_id[]">
		</td>
		<td><input type="text" class="m-wrap small debit" name="debit[]" Placeholder="Debit"value="<?php echo $debit_for_view; ?>"></td> 
		<td><input type="text" class="m-wrap small credit" name="credit[]" Placeholder="Credit"value="<?php echo $credit_for_view; ?>"></td>
		<td><input type="text" class="m-wrap small penalty" name="penalty[]" Placeholder="Penalty" value="<?php echo $penalty_for_view; ?>"></td> 
	</tr>
<?php }	?>
<?php 
    foreach($ledger_sub_account_dataa as $ledger_sub_account_dataa){
        $ledger_sub_account_id = $ledger_sub_account_dataa['ledger_sub_account']['auto_id'];
		$ledger_sub_account_name = $ledger_sub_account_dataa['ledger_sub_account']['name'];
        $ledger_id = (int)$ledger_sub_account_dataa['ledger_sub_account']['ledger_id'];
	    $debit_for_view="";
		$credit_for_view="";
		if($ledger_id != 34)
		{		
		$ledger_data = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_account_info_via_ledger_id'),array('pass'=>array($ledger_id)));
		foreach ($ledger_data as $ledger_data){
		$ledger_name = $ledger_data['ledger_account']['ledger_name'];
		}
		
		if(!empty($result_bank_receipt_converted))
		{
		foreach($result_bank_receipt_converted as $data){ 
		$csv_id=(int)$data['opening_balance_csv_converted']['auto_id']; 
		$group_id2=(int)$data['opening_balance_csv_converted']['group_id'];
		$ledger_id=(int)$data['opening_balance_csv_converted']['ledger_id'];
		$ledger_type=(int)$data['opening_balance_csv_converted']['ledger_type'];
		$wing_id = (int)$data['opening_balance_csv_converted']['wing_id'];
		$flat_id = (int)$data['opening_balance_csv_converted']['flat_id'];
		$debit = $data['opening_balance_csv_converted']['debit'];
		$credit = $data['opening_balance_csv_converted']['credit'];
		$penalty = $data['opening_balance_csv_converted']['penalty'];
		if($ledger_sub_account_id == $ledger_id)
		{
		$total_debit=$total_debit+$debit;
		$total_credit=$total_credit+$credit;
		$grand_total_debit=$grand_total_debit+$debit;
		$grand_total_credit=$grand_total_credit+$credit;
		$debit_for_view=$debit;
		$credit_for_view=$credit;
		}
		}	
		}	
		?>
		
		<tr>
		<td><?php echo $ledger_name; ?></td>
		<td><?php echo $ledger_sub_account_name; ?>
<input type="hidden" value="<?php echo $ledger_id; ?>,<?php echo $ledger_sub_account_id; ?>" name="ledger_id[]">
		
		</td>
		<td><input type="text" class="m-wrap small debit" name="debit[]" Placeholder="Debit"value="<?php echo $debit_for_view; ?>"></td>
		<td><input type="text" class="m-wrap small credit" name="credit[]" Placeholder="Credit"value="<?php echo $credit_for_view; ?>"></td>
		<td><input type="hidden" value="" name="penalty[]" Placeholder="Penalty"></td>
		</tr>
	<?php }} ?>
	<tr>	
	<th colspan="2" style="text-align:right;">Total</th>
	<th><input type="text" class="m-wrap small total_debit" id="total_debit" value="<?php echo $total_debit; ?>"></th>
	<th><input type="text" class="m-wrap small total_credit" id="total_credit" value="<?php echo $total_credit; ?>"></th>
	<th><input type="text" class="m-wrap small total_penalty" id="total_penalty" value="<?php echo $total_penalty; ?>"></th>	
</tr>
<tr>
	<td colspan="2"></td>
	<td><input type="text" class="m-wrap small" id="grand_total_debit" value="<?php echo $grand_total_debit; ?>"><br><b>Total Debit</b></td>
	<td colspan="2"><input type="text" class="m-wrap small" id="grand_total_credit" value="<?php echo $grand_total_credit; ?>"><br><b>Total Credit</b></td>
</tr>
	</table>
	<button type="submit" name="sub" class="btn green" id="submit_opening_balance">Submit</button>

</form>