<?php
$m_from = date("Y-m-d", strtotime($from));
$m_to = date("Y-m-d", strtotime($to));
$from_strto = strtotime($m_from);
$to_strto = strtotime($m_to); ?>


<table  width="100%" border="1">
<thead>
<tr>
<th colspan="5" style="text-align:center;"><?php echo $society_name; ?> Petty Cash Receipt Register From : <?php echo $from; ?> &nbsp;&nbsp; To : <?php echo $to; ?></th>
</tr>
<tr>
<th>PC Receipt#</th>
<th>Transaction Date</th>
<th>Received From</th>
<th>Amount</th>
<th>Narration</th>
</tr>
</thead>			
<tbody id="table">
<?php $n=1; $total_credit = 0; $total_debit = 0;
foreach ($cursor1 as $collection){
	$receipt_no = @$collection['cash_bank']['receipt_number'];
	$transaction_id = (int)$collection['cash_bank']['transaction_id'];	
	$account_type = (int)$collection['cash_bank']['account_type'];			  
	$d_user_id = (int)$collection['cash_bank']['ledger_sub_account_id'];
	$date = $collection['cash_bank']['transaction_date'];
	//$prepaired_by = (int)$collection['cash_bank']['prepaired_by'];   
	$narration = $collection['cash_bank']['narration'];
	$account_head = $collection['cash_bank']['account_head'];
	$amount = $collection['cash_bank']['amount'];
	//$prepaired_by = (int)$collection['cash_bank']['prepaired_by'];   
	$current_date = $collection['cash_bank']['created_on'];
	$creation_date = date('d-m-Y',strtotime($current_date));
	
			
	if($account_type == 1){				
		$user_id1 = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($d_user_id)));
		foreach ($user_id1 as $collection){
		
		$user_flat_id=(int)$collection['ledger_sub_account']['user_flat_id'];
		}

		
		$user_flat_detail=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_flat_info_via_user_flat_id'),array('pass'=>array($user_flat_id)));
		foreach($user_flat_detail as $user_flat_detail){
		$wing=$user_flat_detail["user_flat"]["wing"];
		$user_id=$user_flat_detail["user_flat"]["user_id"];
		$flat_id=$user_flat_detail["user_flat"]["flat"];
		} 
			$result = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($user_id)));
			foreach ($result as $collection){
			$user_name = $collection['user']['user_name'];
			@$tenant = (int)$collection['user']['tenant'];
			}	
		$wing_flat = $this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat'),array('pass'=>array($wing,$flat_id)));
		}
			

				if($account_type == 2)
				{
$user_name1 = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_amount'),array('pass'=>array($d_user_id)));
				foreach ($user_name1 as $collection)
				{
				$user_name = $collection['ledger_account']['ledger_name'];
				$wing_flat = "";
				}
				}
			
	

			
if($date >= $from_strto && $date <= $to_strto)
{
$date = date('d-m-Y',($date));  
$total_debit = $total_debit + $amount;
$amount = number_format($amount);
?>
<tr>
<td><?php echo $receipt_no; ?> </td>
<td><?php echo $date; ?> </td>
<td><?php echo $user_name; ?>  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$wing_flat; ?> </td>
<td style="text-align:right;"><?php echo $amount; ?></td>
<td><?php echo $narration; ?></td>
</tr>
<?php   
}}
?> 
<tr>
<td colspan="3" style="text-align:right;"><b>Total</b></td>
<td style="text-align:right;"><b><?php 
$total_debit = number_format($total_debit);
echo $total_debit; ?></b></td>
<td></td>  
</tr>
</tbody>
</table>  