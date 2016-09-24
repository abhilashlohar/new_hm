<style>
#table_css th{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
#table_css td{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
</style>
<script>
$(document).ready(function(){
jQuery('.tooltips').tooltip();
});
</script> 
<?php
	$m_from=date("Y-m-d", strtotime($from));
		$m_from = strtotime($m_from);
			$m_to=date("Y-m-d", strtotime($to));
				$m_to = strtotime($m_to);
?>
<?php
$nnn = 55;
foreach ($cursor1 as $collection){
	$transaction_date = $collection['cash_bank']['transaction_date'];
		if($transaction_date >= $m_from && $transaction_date <= $m_to){
			$nnn = 555;								
}} ?>
<?php if($nnn == 555) { ?>
<div class="portlet box">
<div class="portlet-body">
	<div align="center"><?php echo strtoupper($society_name); ?> Petty Cash Payment Register From : <?php echo $from;?> To : <?php echo $to;?>
		<span class="hide_at_print">
			<input class="m-wrap medium pull-right" placeholder="Search" id="search" style="height: 15px; margin-bottom: 4px; font-size: 12px;padding: 4px !important;" type="text">
			<a href="petty_cash_payment_excel?f=<?php echo $from; ?>&t=<?php echo $to; ?>" class="btn blue mini pull-right" style="margin-right:1%;"><i class="icon-download"></i></a>
			<a  class=" printt btn green mini pull-right" onclick="window.print()" style="margin-right:2px;"><i class="icon-print"></i></a>
		</span>
	</div>
<table width="100%" style="background-color:white;" class="table table-bordered table-striped" id="table_css">
<thead>
	
		<tr id="bg_color">
		<th>PC Payment Vochure</th>
		<th>Transaction Date</th>
		<th>Paid To</th>
		<th>Amount</th>
		<th>Narration</th>
		<th class="hide_at_print">Action </th>
	</tr>
</thead>
<tbody id="table">
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
$prepaired_by = (int)$collection['cash_bank']['created_by'];   
$narration = @$collection['cash_bank']['narration'];
$account_head = $collection['cash_bank']['account_head'];
$amount = $collection['cash_bank']['amount'];
$current_date = $collection['cash_bank']['created_on'];
$creation_date = date('d-m-Y',strtotime($current_date));
@$edited_by=@$collection['cash_bank']['edited_by'];
@$edited_on=@$collection['cash_bank']['edited_on'];
	
$result_gh = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($prepaired_by)));
foreach ($result_gh as $collection) 
{
$prepaired_by_name = $collection['user']['user_name'];
}	

	if(!empty($edited_by)){
				$creator_info=$this->requestAction(array('controller'=>'Fns','action'=> 'member_info_via_user_id'),array('pass'=>array((int)$edited_by)));
				$edited_by=$creator_info["user_name"];
				$wing_flats=$creator_info['wing_flat'];
				foreach($wing_flats as $wing_flat){

				}
				$edited_on=date('d-m-Y',strtotime($edited_on));
				$edit_info="<br/><b>Edited By: </b>".$edited_by." ".$wing_flat."<br/><b>Edited On: </b>".$edited_on."";	
			}else{
				$edit_info='';
			 }
		
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
$new_amount=$amount;
$amount = number_format($amount);
?>
<tr>
<td><?php echo $receipt_no; ?> </td>
<td><?php echo $date; ?> </td>
<td><?php echo $user_name; ?> </td>
<td><?php echo $amount; ?> <span style="display:none;"><?php echo $new_amount; ?></span></td>
<td><?php echo $narration; ?></td>
<td class="hide_at_print">
<div class="btn-group" style="margin:0 !important;">
<a class="btn blue mini" href="#" data-toggle="dropdown">
<i class="icon-chevron-down"></i>	
</a>
<ul class="dropdown-menu" style="min-width:80px !important; margin-left: -52px;">
<li><a href="petty_cash_payment_html_view/<?php echo $transaction_id; ?>" target="_blank"><i class="icon-search"></i>View</a></li>
<li><a href="petty_cash_payment_update/<?php echo $transaction_id; ?>"><i class="icon-edit"></i>Edit</a> </li>

</ul>
</div>

<a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $prepaired_by_name ?><br/><b>Generated On: </b><?php echo $creation_date ?><?php echo @$edit_info; ?>" role="button"><i class="icon-exclamation-sign"></i></a>
	
</td>
</tr>
<?php }} ?>
 <tr>
<td colspan="3" style="text-align:right;"><b>Total</b></td>
<td><b><?php 
$total_debit = number_format($total_debit);
echo $total_debit; ?></b></td>
<td></td>
<td class="hide_at_print"></td>
</tr>
</tbody>
</table>
</div>
</div>
<?php } else { ?>
<br /><br />											
<center>
<h3 style="color:red;">
<b>No Records Found in Selected Period</b>
</h3>
</center>
<br /><br />
<?php } ?>


<script>
jQuery('.popovers').popover({html: true});
		 var $rows = $('#table tr');
		 $('#search').keyup(function() {
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
			
			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				return !~text.indexOf(val);
			}).hide();
		});
 </script>











