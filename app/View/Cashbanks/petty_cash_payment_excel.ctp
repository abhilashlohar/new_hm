<?php
$m_from=date("Y-m-d", strtotime($from));
$m_from = strtotime($m_from);
$m_to=date("Y-m-d", strtotime($to));
$m_to = strtotime($m_to);
?>
<table width="100%" border="1">
<thead>
	<tr>
		<th colspan="4" style="text-align:center;"><?php echo $society_name; ?> Petty Cash Payment Register From : <?php echo $from; ?> To : <?php echo $to; ?></th>
		</tr>
	<tr>
		<th>PC Payment Vochure</th>
		<th>Transaction Date</th>
		<th>Paid To</th>
		<th>Amount</th>
		<th>Narration</th>
	</tr>
</thead>
<tbody>
<?php

$total_debit = 0;
$total_credit = 0;
foreach ($cursor1 as $collection) 
{
$receipt_no = (int)@$collection['cash_bank']['receipt_number'];
$transaction_id = (int)$collection['cash_bank']['transaction_id'];	
$account_type = (int)$collection['cash_bank']['account_type'];
$user_id = (int)$collection['cash_bank']['sundry_creditor_id'];
$date = $collection['cash_bank']['transaction_date'];
//$prepaired_by = (int)$collection['cash_bank']['created_by'];   
@$narration = @$collection['cash_bank']['narration'];
$account_head = $collection['cash_bank']['account_head'];
$amount = $collection['cash_bank']['amount'];
$current_date = $collection['cash_bank']['created_on'];
$creation_date = date('d-m-Y',strtotime($current_date));
		
if($account_type == 1)
{
	$result_lsa = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($user_id)));
	foreach ($result_lsa as $collection) 
	{
	$user_name = $collection['ledger_sub_account']['name'];	  
	}
}
else if($account_type == 2)
{
	$result_la = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_amount'),array('pass'=>array($user_id)));
	foreach ($result_la as $collection) 
	{
	$user_name = $collection['ledger_account']['ledger_name'];	  
	}
}
if($account_type == 3){
		$result_la = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_amount'),array('pass'=>array($user_id)));
		foreach ($result_la as $collection) 
		{
		$user_name = $collection['ledger_account']['ledger_name'];	  
		}	
	
}
      
if($date >= $m_from && $date <= $m_to)
{
$date = date('d-m-Y',($date));	   
$total_debit = $total_debit + $amount;
$amount = number_format($amount);
?>
<tr>
<td><?php echo $receipt_no; ?> </td>
<td><?php echo $date; ?> </td>
<td><?php echo $user_name; ?> </td>
<td><?php echo $amount; ?></td>
<td><?php echo $narration; ?></td>
</tr>
<?php }} ?>
<tr>
<td colspan="3" style="text-align:right;"><b>Total</b></td>
<td><b><?php 
$total_debit = number_format($total_debit);
echo $total_debit; ?></b></td>
<td></td>
</tr>
</tbody>
</table>