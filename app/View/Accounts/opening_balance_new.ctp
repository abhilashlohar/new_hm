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
	</table>
	<button type="submit" name="sub" class="btn green" id="submit_opening_balance">Submit</button>
</form>