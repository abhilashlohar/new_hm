<form method="post" >
<table width="100%" class="table table-bordered " id="receiptmain">
	<thead>
		<tr>
			
            <th>Ledger A/c Name</th>
			<th>Debit</th>
			<th>Credit</th>
		
			
		</tr>
	</thead>
	<tbody id="table">
	<?php
	$total=0; $total_debit=0; $total_credit=0; $amount=0;
	foreach($closing_process as $data){
    	$ledger_account_name=$data['ledger_account_name'];
	    $ledger_account_id=$data['ledger_account_id'];
		$debit=$data['total_debit'];
		$credit=$data['total_credit'];
		
		if($accounts_category_id==3){ $amount =$credit-$debit; $income=$amount;  }else{ $amount =$debit-$credit; $expen=$amount; } 
		
	?>
	<tr>
	  <td><?php echo $ledger_account_name; ?>
	   <input type="hidden" name="ledger_account_id[]" value="<?php echo $ledger_account_id;?>">
	  </td>
	  <td><?php if($accounts_category_id==3){ echo $amount; }  $total_debit+=$debit; ?>  
	   <input type="hidden" name="amount[]" value="<?php echo $amount ?>">
	  </td>
	  <td><?php if($accounts_category_id==4){ echo $amount; } $total_credit+=$credit; ?>
	  <input type="hidden" name="transaction_date" value="<?php echo $to; ?>">
	  </td>
	 
	</tr>
	<?php } ?>
	</tbody>
	<tfoot>
	<tr>
	<td>Income & Expenditure A/c </td>
	<td > <?php if($accounts_category_id==3){ $total =$total_credit-$total_debit;   }else{ $total =$total_debit-$total_credit; } ?>
	<?php echo $total; ?>
	<input type="hidden" name="income_expenditure" value="<?php echo $total; ?>">
	</td>
	<td><input type="hidden" name="accounts_category_id" value="<?php echo $accounts_category_id; ?>"></td>
	</tr>
	</tfoot>
	</table>
	
	<button type="submit" name="closing_process" class="btn blue" >Submit</button>
</form>