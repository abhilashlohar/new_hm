<?php 

$filename=''.$so_name.'_Reco_'.$bank_name.'_'.$bank_account.'_'.$to.'_Report';

$filename = str_replace(' ', '_', $filename);
$filename = str_replace(' ', '-', $filename);

header ("Expires: 0");
header ("border: 1");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );

?>

<div style="background-color:#fff;" align="center">
<div>
<?php echo $society_name; ?><br>
Bank Reconciliation Statement as on <?php echo $to; ?><br>
<?php echo $bank_name; ?> Bank  Account Number: <?php echo $bank_account; ?>
	
</div>

</div>
<table width="100%" border="1">
	<thead>
	<tr>
	<td colspan="5"  align="right"><strong> Closing balance as  per passbook  </strong>  </td>
		<td align="right"><span><?php echo $closing_pasbook;?></span> </td>
	</tr>
		<tr>
			<th width='120px' align="left"></th>
			<th> </th>
			<th width='120px'>Source</th>
            <th>Cheque/Neft no.</th>
           	<th>Amount</th>
			<th width='112px'></th>
		</tr>
		<tr>
			<th><strong> Add </strong></th>
			<th colspan="5" align="left">Cheques deposited but not cleared in Bank Passbook </th>
		</tr>
	</thead>
	<tbody id="table">
	
	<?php  
	$i=0; $total_debit=0; $total_credit=0; // pr($result_bank_reconciliation_debit); 
	$debit_receipt=sizeof($result_bank_reconciliation_debit_receipt);
	foreach($result_bank_reconciliation_debit_receipt as $data){ $i++;
	$auto_id=(int)$data["bank_reconciliation"]["auto_id"];
	$flag=(int)$data["bank_reconciliation"]["flag"];
	$debit=$data["bank_reconciliation"]["debit"];
	$cheque_number=$data["bank_reconciliation"]["cheque_number"];
	//$credit=$data["bank_reconciliation"]["credit"];
	$transaction_date=$data["bank_reconciliation"]["transaction_date"];
	$source="";$description="";
	$table_name=$data["bank_reconciliation"]["table_name"]; 
	
	
	$total_debit=$total_debit+$debit;
	//$total_credit=$total_credit+$credit;
	 if($table_name=="cash_bank"){ 
		$element_id=(int)@$data["bank_reconciliation"]["element_id"];
	    $subledger_id = (int)@$data["bank_reconciliation"]["ledger_sub_account_id"];
	    $ledger_id = (int)@$data["bank_reconciliation"]["ledger_account_id"];
		$result_cash_bank=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'receipt_info_via_auto_id'), array('pass' => array((int)$element_id)));
		
		$receipt_source = @$result_cash_bank[0]["cash_bank"]["source"]; 
		if($receipt_source == "bank_receipt"){
		  $source="Receipt";
		  $description = @$result_cash_bank[0]["cash_bank"]["narration"];
		  //$description=substrwords($description,200,'...');
		}elseif($receipt_source == "bank_payment"){
		  $source="Bank payment";
		  $description = @$result_cash_bank[0]["cash_bank"]["narration"];
		  //$description=substrwords($description,200,'...');
		} 
	}
		
		?>
		<tr>
			<td><?php echo date("d-m-Y",$transaction_date); ?></td>
		    
            <td><?php echo $description; ?></td>
			<td><?php echo $source; ?></td>
			<td style="text-align:right;"><?php echo $cheque_number; ?></td>
			<td style="text-align:right;"><?php echo $debit; ?></td>
			
			<td style="text-align:right;" ><b><?php if(sizeof($result_bank_reconciliation_debit_receipt)==$i){ echo $total_debit; } ?></b></td>
			
		</tr>
	<?php } ?>
	
	
	<tr>
	<td><strong>Add </strong></td>
	<td colspan="5"><strong> Debit/Withdrawal entries appearing in Bank Passbook only  </strong> </td>
	</tr>
<?php	
$total_debit_bank_payment=0;$j=0;
	foreach($result_bank_reconciliation_debit_bank_payment as $data){ $j++;
	$auto_id=(int)$data["bank_reconciliation"]["auto_id"];
	$flag=(int)$data["bank_reconciliation"]["flag"];
	$debit=$data["bank_reconciliation"]["debit"];
	//$credit=$data["bank_reconciliation"]["credit"];
	$transaction_date=$data["bank_reconciliation"]["transaction_date"];
	$source="";$description="";
	$table_name=$data["bank_reconciliation"]["table_name"]; 
	$cheque_number=$data["bank_reconciliation"]["cheque_number"];
	
	$total_debit_bank_payment=$total_debit_bank_payment+$debit;
	//$total_credit=$total_credit+$credit;
	if($table_name=="reconciliation"){ 
			 $transection_type=$data["bank_reconciliation"]["transection_type"];
			 $description=$data["bank_reconciliation"]["narration"];
			//$description=substrwords($description,200,'...');
			$source=$transection_type; 
		}
		
		?>
	<tr>
			<td><?php echo date("d-m-Y",$transaction_date); ?></td>
		    
            <td><?php echo $description; ?></td>
			<td><?php echo $source; ?></td>
            
			<td style="text-align:right;"><?php echo $cheque_number; ?></td>
			<td style="text-align:right;"><?php echo $debit; ?></td>
			<td style="text-align:right;" ><b><?php if(sizeof($result_bank_reconciliation_debit_bank_payment)==$j){ echo $total_debit_bank_payment; } ?></b></td>
			
		</tr>
	<?php } ?>
	
	<tr>
	<td><strong>Less </strong></td>
	<td colspan="5"><strong>Cheques issued but not cleared in Bank Passbook </strong> </td>
	</tr>
		
		
		<?php $k=0;
		foreach($result_bank_reconciliation_credit_bank_payment as $data){ $k++;
	$auto_id=(int)$data["bank_reconciliation"]["auto_id"];
	$flag=(int)$data["bank_reconciliation"]["flag"];
	//$debit=$data["bank_reconciliation"]["debit"];
	$credit=$data["bank_reconciliation"]["credit"];
	$transaction_date=$data["bank_reconciliation"]["transaction_date"];
	$source="";$description="";
	$table_name=$data["bank_reconciliation"]["table_name"]; 
	$cheque_number=$data["bank_reconciliation"]["cheque_number"];
	
	//$total_debit=$total_debit+$debit;
	$total_credit=$total_credit+$credit;
	 if($table_name=="cash_bank"){ 
		$element_id=(int)@$data["bank_reconciliation"]["element_id"];
	    $subledger_id = (int)@$data["bank_reconciliation"]["ledger_sub_account_id"];
	    $ledger_id = (int)@$data["bank_reconciliation"]["ledger_account_id"];
		$result_cash_bank=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'receipt_info_via_auto_id'), array('pass' => array((int)$element_id)));
		
		$receipt_source = @$result_cash_bank[0]["cash_bank"]["source"]; 
		if($receipt_source == "bank_receipt"){
		  $source="Receipt";
		  $description = @$result_cash_bank[0]["cash_bank"]["narration"];
		  //$description=substrwords($description,200,'...');
		}elseif($receipt_source == "bank_payment"){
		  $source="Bank payment";
		  $description = @$result_cash_bank[0]["cash_bank"]["narration"];
		  //$description=substrwords($description,200,'...');
		} 
	}
		
		?>
		<tr>
			<td><?php echo date("d-m-Y",$transaction_date); ?></td>
		    
            <td><?php echo $description; ?></td>
			<td><?php echo $source; ?></td>
			<td style="text-align:right;"><?php echo $cheque_number; ?></td>
			<td style="text-align:right;"><?php echo $credit; ?></td>
			
			<td style="text-align:right;" ><b><?php if(sizeof($result_bank_reconciliation_credit_bank_payment)==$k){ echo $total_credit; } ?></b></td>
			
		</tr>
	<?php } ?>
	
	
	<tr>
	<td><strong>Less </strong></td>
	<td colspan="5"><strong> Credit/Deposit entries appearing in Bank Passbook only  </strong> </td>
	</tr>
	
<?php 
	$total_deposite_credit=0; $l=0;
	foreach($result_bank_reconciliation_credit_deposite as $data){ $l++;
	$auto_id=(int)$data["bank_reconciliation"]["auto_id"];
	$flag=(int)$data["bank_reconciliation"]["flag"];
	//$debit=$data["bank_reconciliation"]["debit"];
	$credit=$data["bank_reconciliation"]["credit"];
	$transaction_date=$data["bank_reconciliation"]["transaction_date"];
	$source="";$description="";
	$table_name=$data["bank_reconciliation"]["table_name"]; 
	$cheque_number=$data["bank_reconciliation"]["cheque_number"];
	
	//$total_debit=$total_debit+$debit;
	$total_deposite_credit=$total_deposite_credit+$credit;
	if($table_name=="reconciliation"){ 
			 $transection_type=$data["bank_reconciliation"]["transection_type"];
			 $description=$data["bank_reconciliation"]["narration"];
			//$description=substrwords($description,200,'...');
			$source=$transection_type; 
		}
		
		?>
		<tr>
			<td><?php echo date("d-m-Y",$transaction_date); ?></td>
		    
            <td><?php echo $description; ?></td>
			<td><?php echo $source; ?></td>
            <td style="text-align:right;"><?php echo $cheque_number; ?></td>
			<td style="text-align:right;"><?php echo $credit; ?></td>
			
			<td style="text-align:right;" ><b><?php if(sizeof($result_bank_reconciliation_credit_deposite)==$l){ echo $total_deposite_credit; } ?></b></td>
			
			
		</tr>
	<?php } ?>
	
	
	<tr>
		<td colspan="5" style="text-align:right;"><b>Total  <?php  $total_debit_amount=$total_debit+$total_debit_bank_payment; $total_credit_amount=$total_credit+$total_deposite_credit; ?> </b></td>
		<td style="text-align:right;"><b><span id="total_diff_amount"><?php echo $actual=$total_debit_amount-$total_credit_amount; ?> </span></b></td>
	</tr>
	<tr>
		<td colspan="5" style="text-align:right;"><b>Closing balance as per system</b></td>
		<td style="text-align:right;"><b><span id="closing_balance"><?php echo $closing_balance; ?> </span> </b></td>
	</tr>	
	
	<tr>
		<td colspan="5" style="text-align:right;"><b>Difference</b></td>

		<td style="text-align:right;"><b><span id="total_diff"><?php echo $actual+$closing_pasbook-$closing_balance; ?></span></b></td>
	</tr>	
		
	</tbody>
</table>
</div>
