
<style>
#report_tb th{
	font-size: 14px !important;background-color:#C8EFCE;padding:5px;border:solid 1px #55965F;
}
#report_tb td{
	padding:5px;
	font-size: 14px;border:solid 1px #55965F;background-color:#FFF;
}
table#report_tb tr:hover td {
background-color: #E6ECE7;
}
</style>

<div style="background-color:#fff;" align="center">
<div>
<?php echo $society_name; ?><br>
Bank Reconciliation Statement as on <?php echo $to; ?><br>
<?php echo $bank_name; ?> Bank

</div>
<div class="pull-right">
Closing balance as  per passbook <input class="m-wrap small call_calculation  hide_at_print" placeholder="" id="opening_balance" style="height: 15px; margin-bottom: 4px; font-size: 12px;padding: 4px !important;" type="text">
</div>
<table width="100%" class="table table-bordered " id="receiptmain">
	<thead>
		<tr>
			<th>Transaction Date</th>
			<th>Description</th>
			<th>Source</th>
           	<th>Debit</th>
			<th>Credit</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="table">
	
	<?php  
	$i=0; $total_debit=0; $total_credit=0;  //pr($result_bank_reconciliation); 
	foreach($result_bank_reconciliation as $data){ $i++;
	$auto_id=(int)$data["bank_reconciliation"]["auto_id"];
	$flag=(int)$data["bank_reconciliation"]["flag"];
	$debit=$data["bank_reconciliation"]["debit"];
	$credit=$data["bank_reconciliation"]["credit"];
	$transaction_date=$data["bank_reconciliation"]["transaction_date"];
	$source="";$description="";
	$table_name=$data["bank_reconciliation"]["table_name"]; 
	
	
	$total_debit=$total_debit+$debit;
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
	}elseif($table_name=="reconciliation"){ 
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
            
			<td style="text-align:right;"><?php echo $debit; ?></td>
			<td style="text-align:right;"><?php echo $credit; ?></td>
			<td></td>
			
		</tr>
	<?php } ?>
		<tr>
			<td colspan="3" style="text-align:right;"><b>Total</b></td>
			<td style="text-align:right;"><b><?php echo $total_debit; ?></b></td>
			<td style="text-align:right;"><b><?php echo $total_credit; ?></b></td>
			<td style="text-align:right;"><b><span id="total_diff_amount"><?php echo $diffrence=$total_debit-$total_credit; ?></span></b></td>
		</tr>
		
		<tr>
			<td colspan="5" style="text-align:right;"><b>Closing balance as per system</b></td>
			
			<td style="text-align:right;width:100px;">
				<input class="m-wrap small call_calculation  hide_at_print" placeholder="" id="closing_balance" style="height: 15px; margin-bottom: 4px; font-size: 12px;padding: 4px !important;" type="text">
			</td>
		</tr>
		
		<tr>
			<td colspan="5" style="text-align:right;"><b>Difference</b></td>
			
			<td style="text-align:right;"><b><span id="total_diff">100</span></b></td>
		</tr>
		
	</tbody>
</table>
</div>

<script>
$(document).ready(function() {
	total_calculation();
	
	function total_calculation(){
		var total=0; var grant_total=0;
			var opening_balance=$('#opening_balance').val();
			var total_diff_amount=$('#total_diff_amount').html();
			var closing_balance=$('#closing_balance').val();
			total=parseInt(opening_balance)+parseInt(total_diff_amount);
			grant_total=parseInt(total)-parseInt(closing_balance);
			$('#total_diff').html(grant_total);
	};
	   
	$('.call_calculation').die().live('blur',function(){

	   total_calculation();
	});
	   
	   
});



</script>


