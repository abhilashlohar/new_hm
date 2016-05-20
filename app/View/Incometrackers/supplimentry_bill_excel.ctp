<?php
$filename="".$socc_namm."_Supplimentry_Report_Register_".$fdddd."_".$tdddd."";
header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );

$m_from = date("Y-m-d", strtotime($from));
$m_to = date("Y-m-d", strtotime($to));

$date_renge_from = strtotime($m_from);
$date_renge_to = strtotime($m_to);
?>

<?php

if($tp == 1)
{
?>
<table border="1">
<tr>
<th colspan="8" style="text-align:center;">
<?php echo $society_name; ?> Supplimentry Bill Register From : <?php echo $from; ?> &nbsp;&nbsp; To : <?php echo $to; ?>
</th>
</tr>
<tr>
<th>Sr No.</th>
<th>Bill No</th>
<th>Generated on</th>
<th>Bill Type</th>
<th>Member Name</th>
<th>Bill Date</th>
<th>Bill Amount</th>
<th>Narration</th>
</tr>

<?php $grand_total=0; $i=0;
foreach($cursor1 as $collection){
$creater_name="";
$supplimentry_bill_id=(int)$collection['supplimentry_bill']["supplimentry_bill_id"];
$receipt_id=$collection['supplimentry_bill']['receipt_id'];
$date=$collection['supplimentry_bill']["date"];
$supplimentry_bill_type=$collection['supplimentry_bill']["supplimentry_bill_type"];
$total_amount=$collection['supplimentry_bill']["total_amount"];
$transaction_date=$collection['supplimentry_bill']['transaction_date'];
$description=$collection['supplimentry_bill']['description'];
$current_date=date('d-m-Y',strtotime($date));	
$transaction_date_for_view = date('d-m-Y',($transaction_date));
$creater_id=(int)$collection['supplimentry_bill']['created_by']; 
	$user_detail = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array((int)$creater_id)));
	foreach($user_detail as $user_detailll){
	$creater_name=$user_detailll['user']['user_name'];
	
	}
if($supplimentry_bill_type=="resident"){
$ledger_sub_account_id=(int)$collection['supplimentry_bill']['ledger_sub_account_id'];
	$ledger_sub_account_detail = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
	foreach($ledger_sub_account_detail as $ledger_sub_account_data) {
	$user_name=$ledger_sub_account_data['ledger_sub_account']['name'];
	$user_flat_id=$ledger_sub_account_data['ledger_sub_account']['user_flat_id'];
	}
	$result_user_flat=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_flat_info_via_user_flat_id'),array('pass'=>array($user_flat_id)));	
	foreach($result_user_flat as $collection){	
	$flat_id = (int)$collection['user_flat']['flat'];
	}
$flat_detaill=$this->requestAction(array('controller' => 'hms', 'action' => 'fetch_wing_id_via_flat_id'),
array('pass'=>array($flat_id)));				
foreach($flat_detaill as $flat_dataaa){
$wing_id = (int)$flat_dataaa['flat']['wing_id'];
}
$wing_flat = $this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat_new')
,array('pass'=>array($wing_id,$flat_id)));	
$supplimentry_bill_type_for_view="Residential";
}
if($supplimentry_bill_type=="non_resident"){
$ledger_sub_account_id=(int)$collection['supplimentry_bill']['ledger_sub_account_id'];
$ledger_sub_account_detail = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
foreach ($ledger_sub_account_detail as $ledger_sub_account_date) {
$user_name = $ledger_sub_account_date['ledger_sub_account']['name'];
}
$supplimentry_bill_type_for_view="Non-Residential";
$wing_flat="";
}
if($date_renge_from<=$transaction_date && $date_renge_to>=$transaction_date)
{
$i++;
$grand_total=$grand_total+$total_amount;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $receipt_id;?></td>
<td><?php echo $current_date;?></td>
<td><?php echo $supplimentry_bill_type_for_view;?></td>
<td><?php echo @$user_name;?>&nbsp;&nbsp;<?php echo @$wing_flat;?> </td>
<td><?php echo $transaction_date_for_view;?></td>
<td style="text-align:right;"><?php $g_total=number_format($total_amount); echo $g_total;?></td>
<td><?php echo $description;?></td>

</tr>
<?php }} ?>
<tr>
	<td colspan="6" style="text-align:right;"><b>Total</b></td>
	<td style="text-align:right;"><b><?php $grand_total = number_format($grand_total); echo $grand_total;?></b></td>
	<td></td>
	
</tr>
</tbody>
</table>
<?php
}
?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<?php
if($tp == 2)
{
?>
<table border="1">
<tr>
<th colspan="7" style="text-align:center;">
<?php echo $society_name; ?> Supplimentry Bill Register From : <?php echo $from; ?> &nbsp;&nbsp; To : <?php echo $to; ?>
</th>
</tr>
<tr>
<th>Sr No.</th>
<th>Bill No</th>
<th>Generated on</th>
<th>Member Name</th>
<th>Bill Date</th>
<th>Bill Amount</th>
<th>Narration</th>
</tr>
<?php
$grand_total = 0;
$i=0;
foreach($cursor1 as $collection) 
{
$creater_name = "";
$supplimentry_bill_id= (int)$collection['supplimentry_bill']["supplimentry_bill_id"];
$receipt_id = $collection['supplimentry_bill']['receipt_id'];
$date=$collection['supplimentry_bill']["date"];
$residential=$collection['supplimentry_bill']["supplimentry_bill_type"];
$total_amount=$collection['supplimentry_bill']["total_amount"];
$transaction_date = $collection['supplimentry_bill']['transaction_date'];
$description = $collection['supplimentry_bill']['description']; 
$transaction_date_for_view = date('d-m-Y',($transaction_date));
$creater_id = (int)$collection['supplimentry_bill']['created_by'];
$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($creater_id)));
foreach ($user_dataaaa as $user_detailll) 
{
$creater_name = $user_detailll['user']['user_name'];
}
$current_date = date('d-m-Y',strtotime($date));	
if($residential=="resident")
{
$ledger_sub_account_id = (int)$collection['supplimentry_bill']['ledger_sub_account_id'];	
	$ledger_sub_account_detail = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
	foreach ($ledger_sub_account_detail as $ledger_sub_account_data) {
	$user_name = $ledger_sub_account_data['ledger_sub_account']['name'];
	$user_flat_id=$ledger_sub_account_data['ledger_sub_account']['user_flat_id'];
	}
	$result_user_flat=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_flat_info_via_user_flat_id'),array('pass'=>array($user_flat_id)));	
	foreach($result_user_flat as $collection){	
	$flat_id = (int)$collection['user_flat']['flat'];
	}
	$flat_detaill = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_wing_id_via_flat_id'),
	array('pass'=>array($flat_id)));				
	foreach($flat_detaill as $flat_dataaa){
	$wing_id = (int)$flat_dataaa['flat']['wing_id'];
	}
	$wing_flat = $this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat_new')
,array('pass'=>array($wing_id,$flat_id)));									
$bill_for = $wing_flat;
$bill_type = "Residential";
	
if($date_renge_from <= $transaction_date && $date_renge_to >= $transaction_date)
{
$i++;
$date = date('d-m-Y',strtotime($date));
$grand_total = $grand_total + $total_amount;


?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $receipt_id;?></td>
<td><?php echo $current_date;?></td>
<td><?php echo @$user_name;?>&nbsp;&nbsp;<?php echo @$wing_flat;?> </td>
<td><?php echo $transaction_date_for_view;?></td>
<td style="text-align:right;"><?php $g_total=number_format($total_amount); echo $g_total;?></td>
<td><?php echo $description;?></td>

</tr>
<?php }}}?>
<tr>
<td colspan="5" style="text-align:right;"><b>Total</b></td>
<td style="text-align:right;"><b><?php 
$grand_total = number_format($grand_total);
echo $grand_total; ?></b></td>
<td></td>

</tr>
</tbody>
</table>

<?php
}
?>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>

<?php
if($tp == 3)
{
?>	
<table border="1">

<tr>
<th colspan="7" style="text-align:center;">
<?php echo $society_name; ?> Supplimentry Bill Register From : <?php echo $from; ?> &nbsp;&nbsp; To : <?php echo $to; ?>
</th>
</tr>
<tr>
<th>Sr No.</th>
<th>Bill No</th>
<th>Generated on</th>
<th>Member Name</th>
<th>Bill Date</th>
<th>Bill Amount</th>
<th>Narration</th>
</tr>	
<?php
$grand_total = 0;
$i=0;
foreach($cursor1 as $collection) 
{
$creater_name = "";
$supplimentry_bill_id= (int)$collection['supplimentry_bill']["supplimentry_bill_id"];
$receipt_id = $collection['supplimentry_bill']['receipt_id'];
$date=$collection['supplimentry_bill']["date"];
$residential=$collection['supplimentry_bill']["supplimentry_bill_type"];
$g_total=$collection['supplimentry_bill']["total_amount"];
$transaction_date = $collection['supplimentry_bill']['transaction_date'];
$description = $collection['supplimentry_bill']['description'];
$transaction_date_for_view = date('d-m-Y',($transaction_date));
$creater_id = (int)$collection['supplimentry_bill']['created_by'];

$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($creater_id)));
foreach($user_dataaaa as $user_detailll) 
{
$creater_name = $user_detailll['user']['user_name'];
}

$current_date = date('d-m-Y',strtotime($date));	
if($residential=="non_resident")
{
$ledger_sub_account_id = (int)$collection['supplimentry_bill']['ledger_sub_account_id'];	
$ledger_sub_account_detail = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
foreach ($ledger_sub_account_detail as $ledger_sub_account_date){
$user_name = $ledger_sub_account_date['ledger_sub_account']['name'];
}
$bill_type = "Non-residential";
$wing_flat = "";
if($date_renge_from <= $transaction_date && $date_renge_to >= $transaction_date)
{
$i++;
$date = date('d-m-Y',strtotime($date));
$grand_total = $grand_total + $g_total; ?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $receipt_id; ?></td>
<td><?php echo $date; ?></td>
<td><?php echo $user_name; ?>&nbsp;&nbsp;<?php echo $wing_flat; ?> </td>
<td><?php echo $transaction_date_for_view; ?></td>
<td style="text-align:right;"><?php $g_total = number_format($g_total); echo $g_total; ?></td>
<td><?php echo $description; ?></td>

</tr>
<?php }}}	 ?>
<tr>
<td colspan="5" style="text-align:right;"><b>Total</b></td>
<td style="text-align:right;"><b><?php 
$grand_total = number_format($grand_total);
echo $grand_total; ?></b></td>
<td></td>
</tr>
</tbody>
</table>
<?php }

?>