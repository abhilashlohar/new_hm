<?php 

//$filename=$society_name.'_balance_sheet_'.$from ;
//$filename = str_replace(' ', '_', $filename);
//$filename = str_replace(' ', '-', $filename);
$filename="Ledger_Yearly_Report";
header ("Expires: 0");
header ("border: 1");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );




foreach($ledger_yearly_read as $data){
	$ledger_all_report='';
	$auto_id=$data['ledger_yearly_read']['auto_id'];
	$ledger_account_name=$data['ledger_yearly_read']['ledger_account_name'];
	$from=$data['ledger_yearly_read']['from'];
	$to=$data['ledger_yearly_read']['to'];
	$closing_amount=$data['ledger_yearly_read']['closing_amount'];
	$closing_amount_type=$data['ledger_yearly_read']['closing_amount_type'];
	$opening_amount=$data['ledger_yearly_read']['opening_amount'];
	$opening_amount_type=$data['ledger_yearly_read']['opening_amount_type'];
	$from=date("d-m-Y",$from);
	$to=date("d-m-Y",$to);
	
	$account_category_id=$data['ledger_yearly_read']['account_category_id'];
	if($account_category_id==34){
		$account_name="Members Control A/c";
	}
	echo"<center><p>Ledger Report <br/> $account_name > $ledger_account_name <br/> From :$from To :$to </p></center>";
	
	
	$ledger_all_report=$ledger_yearly_all[$auto_id]; 
?>

<table width="100%" class="table table-bordered " id="receiptmain" border="1">
	<thead>
	
	<tr>
	<td align="right" colspan="7">Opening Balance: <?php echo $opening_amount.' ' .$opening_amount_type; ?></td>
	</tr>
		<tr>
			
            <th>Transaction Date</th>
			<th>Corresponding a/c</th>
			<th>Description</th>
		    <th>Source</th>
			<th>Reference</th>
			<th>Debit</th>
			<th>Credit</th>
		</tr>
	</thead>
	<tbody id="table" >
	<?php
	$total_debit=0;$total_credit=0;
	foreach($ledger_all_report as $data){
		$transaction_date=$data['transaction_date'];
		$corresponding=$data['corresponding'];
		$description=$data['description'];
		$reference=$data['reference'];
		$source=$data['source'];
		$debit=$data['debit'];
		$credit=$data['credit'];
		
		
	?>
	 <tr>
		<td><?php echo date("d-m-Y",$transaction_date); ?></td>
		<td><?php echo $corresponding; ?></td>
		<td><?php echo $description; ?></td>
		<td><?php echo $source; ?></td>
		<td><?php echo $reference; ?></td>
		<td><?php echo $debit; $total_debit+=$debit; ?></td>
		<td><?php echo $credit; $total_credit+=$credit; ?></td>
		
	</tr>
	<?php } ?>
	</tbody>
	<tfoot>
	<tr>
			<td align="right" colspan="5"> <b> Total </b> </td> <td> <b> <?php echo $total_debit; ?> </b></td>
			 <td> <b> <?php echo $total_credit; ?> </b></td>
	</tr>
	<tr>
			<td align="right" colspan="6">Closing Balance: </td> <td><?php echo $closing_amount.' ' .$closing_amount_type; ?></td>
	</tr>
	</tfoot>
</table>

<?php  } ?>