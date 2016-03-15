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
if($ledger_sub_account_id == $ledger_sub_account_id_via_regular_bill){
if($date_from >= $from_date_renge && $date_from <= $to_date_renge){
	if($due_amt > 0){
	$nnn = 555;
}}}}
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
if($wing_id == $wing){
if(@$date_from >= $from_date_renge && @$date_from <= $to_date_renge){
if($due_amt>0){
$nnn = 555;	
}}}
} ?>
<?php } ?>
<?php if($nnn == 555){ ?>
<div style="width:100%;" class="hide_at_print">
	<?php if($wise == 1){ ?>
		<span style="float:right;"> <a href="overdue_excel?f=<?php echo $from; ?>&t=<?php echo $to; ?>&w=<?php echo $wise; ?>&wi=<?php echo $wing; ?>" class="btn blue mini"><i class="icon-download"></i></a></span>
	<?php
	}else if($wise == 2){
	?>
		<span style="float:right;"> <a href="overdue_excel?f=<?php echo $from; ?>&t=<?php echo $to; ?>&w=<?php echo $wise; ?>&u=<?php echo $ledger_sub_account_id; ?>" class="btn blue mini"><i class="icon-download"></i></a></span>
	<?php } ?>
		<span style="float:right; margin-right:1%;"><a type="button" class=" printt btn green mini" onclick="window.print()"><i class="icon-print"></i></a></span>
</div>
<br />
<div style="width:100%; overflow:auto; margin-top:10px;" class="hide_at_print">
	<label class="m-wrap pull-right"><input type="text" id="search" class="m-wrap medium" style="background-color:#FFF !important;" placeholder="Search"></label>	
</div>

<table class="table table-bordered table-striped table-hover" style="width:100%; background-color:white;">
	<thead>
		<tr>
			<th colspan="8" style="text-align:center;">
			Over Due Report  (<?php echo $society_name; ?> Society)
			</th>
			</tr>
			<tr>
			<th style="text-align:center;">Bill No</th>
			<th style="text-align:center;">Name of Owner</th>
			<th style="text-align:center;">Bill Date</th>
			<th style="text-align:center;">Due date</th>
			<th style="text-align:center;">Bill Amount</th>
			<th style="text-align:center;">Due Amount</th>
			<th style="text-align:center;" class="hide_at_print">Bill View</th>
		</tr>
	</thead>
	<tbody id="table">
<?php $c=0; $total_due_amt = 0; $total_bill_amt = 0;
foreach($cursor1 as $collection){
$auto_id = (int)@$collection['regular_bill']['auto_id'];
$bill_no = @$collection['regular_bill']['bill_number'];	
$date_from = @$collection['regular_bill']['start_date'];	
$date_to = @$collection['regular_bill']['end_date'];	
$due_date = @$collection['regular_bill']['due_date'];	
$total_amt = (int)@$collection['regular_bill']['due_for_payment'];
$ledger_sub_account_id_via_regular_bill=$collection['regular_bill']['ledger_sub_account_id'];
$current_date = @$collection['regular_bill']['current_date'];
$new_arrear_intrest = @$collection['regular_bill']['new_arrear_intrest'];
$new_arrear_maintenance = @$collection['regular_bill']['new_arrear_maintenance'];
$new_intrest_on_arrears = @$collection['regular_bill']['new_intrest_on_arrears'];
$new_total = @$collection['regular_bill']['new_total'];

if(empty($new_total) && empty($new_intrest_on_arrears) && empty($new_arrear_maintenance) && empty($new_arrear_intrest)){
$due_amt = $total_amt;	
} else { 
$due_amt = (($new_arrear_intrest)+($new_arrear_maintenance)+($new_intrest_on_arrears)+($new_total));
}
$total_amount=$total_amt;
$bill_start_date_for_view=date('d-M-Y',($date_from));
$due_date_for_view=date('d-M-Y',($due_date));

	$result_flat = $this->requestAction(array('controller' => 'Fns', 'action' => 'flat_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id_via_regular_bill)));				
	foreach ($result_flat as $data){
	$wing_id=(int)$data['flat']['wing_id']; 
	$flat_id=(int)$data['flat']['flat_id'];
	$flat_name=$data['flat']['flat_name'];
	}	

	$result_ledger_sub_account=$this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id_via_regular_bill)));				
	foreach ($result_ledger_sub_account as $data){
	$user_name=$data['ledger_sub_account']['name']; 
	}	
	$wing_flat = $this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat_new'),array('pass'=>array($wing_id,$flat_id)));
if($wise == 2){ 
if($ledger_sub_account_id == $ledger_sub_account_id_via_regular_bill){
if($date_from >= $from_date_renge && $date_from <= $to_date_renge){
if($due_amt > 0){	
$total_bill_amt = $total_bill_amt+$total_amt;
$total_due_amt=$total_due_amt+$due_amt;
$total_amt = number_format($total_amt);
$due_amt2 = number_format($due_amt);	
?>
<tr>
	<td style="text-align:center;"><?php echo $bill_no; ?></td>
	<td style="text-align:center;"><?php echo $user_name; ?> &nbsp;&nbsp; <?php echo $wing_flat; ?></td>
	<td style="text-align:center;"><?php echo $bill_start_date_for_view; ?></td>
	<td style="text-align:center;"><?php echo $due_date_for_view; ?></td>
	<td style="text-align:right;"><?php echo $total_amt; ?></td>
	<td style="text-align:right;"><?php echo $due_amt2; ?></td>
	<td style="text-align:left;" class="hide_at_print">
		<div class="btn-group">
		<a class="btn blue mini" href="#" data-toggle="dropdown">
		<i class="icon-chevron-down"></i>	
		</a><ul class="dropdown-menu" style="min-width:80px !important;">
		<li><a href="regular_bill_view/<?php echo $auto_id; ?>" target="_blank"><i class="icon-search"></i> View</a></li>
		</ul>
		</div>
	</td>
</tr>
<?php }}}}else{ 
if($wing == $wing_id){
if($date_from >= $from_date_renge && $date_from <= $to_date_renge){
if($due_amt > 0){
$total_bill_amt = $total_bill_amt+$total_amt;
$total_due_amt=$total_due_amt+$due_amt;
$total_amt = number_format($total_amt);
$due_amt2 = number_format($due_amt); ?>
<tr>
	<td style="text-align:center;"><?php echo $bill_no; ?></td>
	<td style="text-align:center;"><?php echo $user_name; ?> &nbsp;&nbsp; <?php echo $wing_flat; ?></td>
	<td style="text-align:center;"><?php echo $bill_start_date_for_view; ?></td>
	<td style="text-align:center;"><?php echo $due_date_for_view; ?></td>
	<td style="text-align:right;"><?php echo $total_amt; ?></td>
	<td style="text-align:right;"><?php echo $due_amt2; ?></td>
	<td style="text-align:left;" class="hide_at_print">

	 <div class="btn-group">
		<a class="btn blue mini" href="#" data-toggle="dropdown">
		<i class="icon-chevron-down"></i>	
		</a><ul class="dropdown-menu" style="min-width:80px !important;">
		<li><a href="regular_bill_view/<?php echo $auto_id; ?>" target="_blank"><i class="icon-search"></i> View</a></li>
		</ul>
		</div>
	</td>
</tr>
<?php }}}} ?>
<?php } 
$total_due_amt = number_format($total_due_amt);
$total_bill_amt = number_format($total_bill_amt);
?>
<tr>
<td style="text-align:right;" colspan="4"><b>Total</b></td>
<td style="text-align:right;"><b><?php echo $total_bill_amt; ?></b></td>
<td style="text-align:right;"><b><?php echo $total_due_amt; ?></b></td>
<td style="text-align:right;" class="hide_at_print"></td>
</tr>
</tbody>
</table>
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
















