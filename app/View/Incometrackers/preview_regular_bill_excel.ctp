<?php

$filename='Bill_Preview_screen_view';
$filename = str_replace(' ', '_', $filename);
$filename = str_replace(' ', '-', $filename);
@header("Expires: 0");
@header("border: 1");
@header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
@header("Cache-Control: no-cache, must-revalidate");
@header("Pragma: no-cache");
@header("Content-type: application/vnd.ms-excel");
@header("Content-Disposition: attachment; filename=".$filename.".xls");
@header("Content-Description: Generated Report");

?>


<?php 

$start_date_billing=@$regular_bills[0]["regular_bill_temp"]["start_date"];
$start_date_billing= date("d-M-Y",$start_date_billing);
$billing_cycle_find=@$regular_bills[0]["regular_bill_temp"]["billing_cycle"];
$due_date_bill=@$regular_bills[0]["regular_bill_temp"]["due_date"];
$due_date_bill= date("d-M-Y",$due_date_bill);



//$income_head_array_th=@$regular_bills[0]["regular_bill_temp"]["income_head_array"];
$income_head_array_th=@$regular_bills[0]["regular_bill_temp"]["income_head_array"];
$other_charge_ih_ids=array();
foreach($regular_bills as $regular_bill){
	$other_charge=$regular_bill["regular_bill_temp"]["other_charge"];
	foreach($other_charge as $key=>$value){
		$other_charge_ih_ids[]=(int)$key;
	}
}
if(sizeof($other_charge_ih_ids)>0){
	$other_charge_ih_ids = array_unique($other_charge_ih_ids);
}

if($billing_cycle_find==1){
	$billing_cycle_show="Monthly";
}elseif($billing_cycle_find==2){
	$billing_cycle_show="Bi-Monthly";
}elseif($billing_cycle_find==3){
	$billing_cycle_show="Quarterly";
}elseif($billing_cycle_find==6){
	$billing_cycle_show="Half Yearly";
}elseif($billing_cycle_find==12){
	$billing_cycle_show="Yearly";
}

?>

<div align="right" id="save_result" style="height:20px;float:right;"></div>
<div align="center">
<span> Bill start date: <?php echo @$start_date_billing; ?>  </span> &nbsp| <span> Bill due date: <?php echo @$due_date_bill; ?> </span> &nbsp|
<span> Billing cycle: <?php echo @$billing_cycle_show; ?> </span>

</div>
<table id="fixed_hdr1" border="1">
	<thead>
		<tr>
			<th>Unit</th>
			<th>Member Name</th>
			<?php foreach($income_head_array_th as $income_head=>$amount){ 
			$income_head_name = $this->requestAction(array('controller' => 'Fns', 'action' => 'income_head_name_via_id'),array('pass'=>array($income_head)));?>
			<th><?php echo $income_head_name; ?></th>
			<?php } ?>
			<th>Noc</th>
			<?php foreach($other_charge_ih_ids as $other_charge_ih_id){ 
			$income_head_name = $this->requestAction(array('controller' => 'Fns', 'action' => 'income_head_name_via_id'),array('pass'=>array($other_charge_ih_id)));?>
			<th><?php echo $income_head_name; ?></th>
			<?php } ?>
			<th>Total</th>
			<th>Arrears-Principal</th> 
			<th>Arrears-Interest</th> 
			<th>Interest on Arrears</th> 
			<th>Credit/Adjustment</th>
			<th>Due for payment</th>
		</tr>
	</thead>
	<tbody>
	<?php $row_id=0; $income_head_tatal=array(); $noc_tatal=0; $other_charge_tatal=array(); $total_arrear_maintenance=0; $total_arrear_intrest=0; $total_intrest_on_arrears=0;  $total_credit_stock=0; $total_due_for_payment=0;
	foreach($regular_bills as $regular_bill){ $row_id++;
	$auto_id=$regular_bill["regular_bill_temp"]["auto_id"];
	$ledger_sub_account_id=$regular_bill["regular_bill_temp"]["ledger_sub_account_id"];
	$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
	$income_head_array=$regular_bill["regular_bill_temp"]["income_head_array"];
	$noc_charge=$regular_bill["regular_bill_temp"]["noc_charge"];
	$other_charge=$regular_bill["regular_bill_temp"]["other_charge"];
	$total=$regular_bill["regular_bill_temp"]["total"];
	$arrear_principle=$regular_bill["regular_bill_temp"]["arrear_principle"];
	$arrear_intrest=$regular_bill["regular_bill_temp"]["arrear_intrest"];
	$intrest_on_arrears=$regular_bill["regular_bill_temp"]["intrest_on_arrears"];
	$credit_stock=$regular_bill["regular_bill_temp"]["credit_stock"];
	$due_for_payment=$regular_bill["regular_bill_temp"]["due_for_payment"];
	$other_charge_key=array(); 
	foreach($other_charge as $key=>$value){
		$other_charge_key[]=$key;
	}?>
		<tr>
			<td><?php echo $member_info["wing_name"]."-".$member_info["flat_name"]; ?></td>
			<td><?php echo $member_info["user_name"]; ?></td>
			<?php
			foreach($income_head_array as $income_head=>$amount){ 
			$income_head_tatal[$income_head]=@$income_head_tatal[$income_head]+$amount; ?>
			<td><?php echo $amount; ?></td>
			<?php } ?>
			<td><?php echo $noc_charge; ?>
			<?php $noc_tatal+=$noc_charge; ?>
			</td>
			<?php foreach($other_charge_ih_ids as $other_charge_ih_id){
			if (in_array($other_charge_ih_id, $other_charge_key)){
				$other_charge_tatal[$other_charge_ih_id]=@$other_charge_tatal[$other_charge_ih_id]+$other_charge[$other_charge_ih_id];?>
			<td>
			<?php echo $other_charge[$other_charge_ih_id]; ?></td>
			<?php }else{ ?>
			<td> 0 </td>
			<?php }} ?>
			<td><?php echo $total; ?></td>
			<td><?php echo $arrear_principle; ?>
			<?php $total_arrear_maintenance+=$arrear_principle; ?>
			</td>
			<td><?php echo $arrear_intrest; ?>
			<?php $total_arrear_intrest+=$arrear_intrest; ?>
			</td>
			<td><?php echo $intrest_on_arrears; ?>
			<?php $total_intrest_on_arrears+=$intrest_on_arrears; ?>
			</td>
			<td><?php echo $credit_stock; ?>
			<?php $total_credit_stock+=$credit_stock; ?>
			</td>
			<td>
			<?php $due_for_payment=$total+$arrear_principle+$arrear_intrest+$intrest_on_arrears+$credit_stock; ?>
			<?php echo $due_for_payment; ?>
			<?php $total_due_for_payment+=$due_for_payment; ?>
			</td>
		</tr>
	<?php } ?>
		<tr>
			<td colspan="2"><b>Total</b></td>
			<?php $total_total=0; 
			foreach($income_head_array_th as $income_head=>$amount){ 
			$total_total+=$income_head_tatal[$income_head]; ?>
			<td><?php echo $income_head_tatal[$income_head]; ?></td>
			<?php } ?>
			<td><?php echo $noc_tatal; ?></td>
			<?php $total_total+=$noc_tatal; 
			foreach($other_charge_ih_ids as $other_charge_ih_id){ 
			$total_total+=$other_charge_tatal[$other_charge_ih_id]; ?>
			<td><?php echo $other_charge_tatal[$other_charge_ih_id]; ?></td>
			<?php } ?>
			<td><?php echo $total_total; ?></td>
			<td><?php echo $total_arrear_maintenance; ?></td>
			<td><?php echo $total_arrear_intrest; ?></td>
			<td><?php echo $total_intrest_on_arrears; ?></td>
			<td><?php echo $total_credit_stock; ?></td>
			<td><?php echo $total_due_for_payment; ?></td>
		</tr>
	</tbody>
	</table>