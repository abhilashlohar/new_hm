<?php
$from_date_renge=date("Y-m-d", strtotime($from));
$from_date_renge=strtotime($from_date_renge);
$to_date_renge=date("Y-m-d", strtotime($to));
$to_date_renge=strtotime($to_date_renge);  ?>
<?php $nnn = 55; ?>
<?php  if($wise == 2){ 
foreach($cursor1 as $collection){
$ledger_sub_account_id_via_regular_bill=$collection['regular_bill']['ledger_sub_account_id'];
$date_from=@$collection['regular_bill']['start_date'];	
$total_amt=(int)@$collection['regular_bill']['due_for_payment'];
$flat_id=(int)@$collection['regular_bill']['ledger_sub_account_id'];
$new_arrear_intrest = @$collection['regular_bill']['new_arrear_intrest'];
$new_arrear_maintenance = @$collection['regular_bill']['new_arrear_maintenance'];
$new_intrest_on_arrears = @$collection['regular_bill']['new_intrest_on_arrears'];
$new_total = @$collection['regular_bill']['new_total'];
	if(empty($new_total) && empty($new_intrest_on_arrears) && empty($new_arrear_maintenance) && empty($new_arrear_intrest)){ 
	$due_amt = $total_amt;	
	}
	else{
	$due_amt = (($new_arrear_intrest)+($new_arrear_maintenance)+($new_intrest_on_arrears)+($new_total));
	}
if($wise == 2){
if($ledger_sub_account_id == $ledger_sub_account_id_via_regular_bill){
if($date_from >= $from_date_renge && $date_from <= $to_date_renge){
	if($due_amt > 0){
	$nnn = 555;
}}}}}
} ?>
<?php if($wise == 1){ ?>
<?php foreach($result_ledger_sub_account as $data){
$ledger_sub_account_id = $data['ledger_sub_account']['auto_id'];
$result_regular_bill=$this->requestAction(array('controller' => 'Fns', 'action' => 'regular_bill_info_via_ledger_sub_account'),array('pass'=>array($ledger_sub_account_id)));
foreach ($result_regular_bill as $collection){
$date_from = @$collection['regular_bill']['start_date'];	
$total_amt = (int)@$collection['regular_bill']['due_for_payment'];
$ledger_sub_account_id_via_regular_bill=$collection['regular_bill']['ledger_sub_account_id'];
$new_arrear_intrest = @$collection['regular_bill']['new_arrear_intrest'];
$new_arrear_maintenance = @$collection['regular_bill']['new_arrear_maintenance'];
$new_intrest_on_arrears = @$collection['regular_bill']['new_intrest_on_arrears'];
$new_total = @$collection['regular_bill']['new_total'];
}
	if(empty($new_total) && empty($new_intrest_on_arrears) && empty($new_arrear_maintenance) && empty($new_arrear_intrest)){
	$due_amt = $total_amt;	
	}
	else{
	$due_amt = (($new_arrear_intrest)+($new_arrear_maintenance)+($new_intrest_on_arrears)+($new_total));
	}
	$result_user=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
	$wing_id = $result_user['wing_id'];	

if(@$date_from >= $from_date_renge && @$date_from <= $to_date_renge){
if($due_amt>0){
$nnn = 555;	
}}
} ?>

<?php } ?>
<?php if($nnn == 55){ ?>
<br /><br />											
<center>
<h3 style="color:red;">
<b>No Records Found in Selected Period</b>
</h3>
</center>
<br /><br />
<?php } ?>
















