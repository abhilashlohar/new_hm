
<?php 

$society_name=$society_info[0]["society"]["society_name"];
$from1= date("d-m-Y",$from);
$to1= date("d-m-Y",$to);

$filename=$society_name.'_Bank_receipt_'.$from1.'_'.$to1;
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




<div class="portlet box">
	<div class="portlet-body">
	<div align="center"><?php echo strtoupper($society_name); ?> Bank Receipt Register From : <?php echo date("d-m-Y",$from);?> To : <?php echo date("d-m-Y",$to);?>
		
		<table class="table table-condensed table-bordered" id="receiptmain" border="1">
			<thead>
				<tr>
					<th>Receipt No.</th>
					<th>Transaction date</th>
					<th>Receipt Type</th>
					<th>Party Name</th>
					<th>Deposited in</th>
					<th>Payment Mode</th>
					<th>Instrument/UTR</th>
					<th>Narration</th>
					<th>Amount</th>
					
				</tr>
			</thead>
			<tbody>
			<?php
				$total_amount=0;
			foreach($receipts as $receipt){
			
				$auto_id=$receipt["cash_bank"]["transaction_id"];
				$receipt_number=$receipt["cash_bank"]["receipt_number"];
				$transaction_date=$receipt["cash_bank"]["transaction_date"];
				$received_from = $receipt['cash_bank']['received_from'];
				if($received_from == "residential")
				{
				$receipt_type="Residential";
				$ledger_sub_account_id=$receipt["cash_bank"]["ledger_sub_account_id"];
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				$user_name=$member_info["user_name"];
				$wing_name=$member_info["wing_name"];
				$flat_name=$member_info["flat_name"];
				}
				else
				{
					$receipt_type="Non Residential";
				$ledger_sub_account_id=$receipt["cash_bank"]["ledger_sub_account_id"];	
				$result_ledger_sub_account = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id)));
				foreach($result_ledger_sub_account as $data)
				{
				$user_name = $data['ledger_sub_account']['name'];	
				}
				
				
				
				
				}
				$created_by = $receipt['cash_bank']['created_by'];
				$created_on = @$receipt['cash_bank']['created_on'];
				$creator_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array($created_by)));
				$creator_name=$creator_info["user_name"];
				
				$deposited_in=$receipt["cash_bank"]["deposited_in"];
				$deposited_in_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($deposited_in)));
				
				$bank_name=$deposited_in_info[0]["ledger_sub_account"]["name"];
				$bank_account=$deposited_in_info[0]["ledger_sub_account"]["bank_account"];
				$receipt_mode=$receipt["cash_bank"]["receipt_mode"];
				$cheque_number=$receipt["cash_bank"]["cheque_number"];
				$narration=$receipt["cash_bank"]["narration"];
				$amount=$receipt["cash_bank"]["amount"];?>
				<tr>
					<td><?php echo $receipt_number; ?></td>
					<td><?php echo date("d-m-Y",$transaction_date); ?></td>
					<td><?php echo $receipt_type; ?></td>
					<td>
					<?php if($received_from == "residential"){ ?>
					<?php echo $user_name.' ('.$wing_name.' - '.$flat_name.')'; ?> <?php }else { ?>
					<?php echo $user_name; ?>
					<?php } ?>
					</td>
					<td><?php echo $bank_name.' - '.$bank_account; ?></td>
					<td><?php echo $receipt_mode; ?></td>
					<td><?php echo $cheque_number; ?></td>
					<td><?php echo $narration; ?></td>
					<td style="text-align: right;"><?php echo $amount; $total_amount+=$amount; ?> </td>
					
				</tr>
			<?php } ?>
			</tbody>
			<tfoot style="font-weight: 600;">
				<tr>
				<td colspan="8" align="right">Total</td><td align="right"><?php echo $total_amount; ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
