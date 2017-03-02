<style>
#bg_color th{
font-size: 10px !important;background-color:#C8EFCE;padding:2px;border:solid 1px #55965F;
}
#report_tb td{
padding:2px;
font-size: 12px;border:solid 1px #55965F;background-color:#FFF;
}
.text_bx{
width: 50px;
height: 15px !important;
margin-bottom: 0px !important;
font-size: 12px;
}
.text_rdoff{
width: 50px;
height: 15px !important;
border: none !important;
margin-bottom: 0px !important;
font-size: 12px;
}
</style>
<?php
$m_from=date("Y-m-d",strtotime($from));
$m_to=date("Y-m-d",strtotime($to));
$date_renge_from=strtotime($m_from);
$date_renge_to=strtotime($m_to);
?>
<?php 
$nnn = 55;
if($supplimentry_bill_type_for_view==1){
foreach ($cursor1 as $collection){
$transaction_date=$collection['supplimentry_bill']['transaction_date'];
if($date_renge_from<=$transaction_date && $date_renge_to>=$transaction_date){
$nnn = 555;
}}} 
if($supplimentry_bill_type_for_view==2){
foreach($cursor1 as $collection){
$supplimentry_bill_type=$collection['supplimentry_bill']["supplimentry_bill_type"];
$transaction_date = $collection['supplimentry_bill']['transaction_date'];
if($supplimentry_bill_type=="resident"){
if($date_renge_from<=$transaction_date && $date_renge_to>=$transaction_date){
$nnn = 555;
}}}}
if($supplimentry_bill_type_for_view == 3){
foreach($cursor1 as $collection){
$supplimentry_bill_type=$collection['supplimentry_bill']["supplimentry_bill_type"];
$transaction_date = $collection['supplimentry_bill']['transaction_date'];
if($supplimentry_bill_type=="non_resident"){
if($date_renge_from<=$transaction_date && $date_renge_to>=$transaction_date){	
$nnn=555;	
}}}}?>

<!-------------- Start Supplimentry Bill View Code ------------------>
<?php if($nnn==555){ ?>
<div style="width:100%;"class="hide_at_print">
<span style="margin-left:80%;">
<a href="supplimentry_bill_excel?f=<?php echo $from; ?>&t=<?php echo $to; ?>&tp=<?php echo $supplimentry_bill_type_for_view; ?>" class="btn blue mini"><i class="icon-download"></i></a>
<a type="button" class=" printt btn green mini" onclick="window.print()"><i class="icon-print"></i></a></span>
</div>
<div style="width:100%; overflow:auto; margin-top:10px;" class="hide_at_print">
<label class="m-wrap pull-right"><input type="text" id="search" class="m-wrap medium" style="background-color:#FFF !important;" placeholder="Search"></label>	
</div>
<?php if($supplimentry_bill_type_for_view == 1){ ?>
<table style="background-color:white; width:100%;" class="table table-bordered">
<tr>
<th colspan="9" style="text-align:center;">
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
<th class="hide_at_print">View</th>
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
<tr class="search_data">
<td><?php echo $i;?> </td>
<td><?php echo $receipt_id;?></td>
<td><?php echo $current_date;?></td>
<td><?php echo $supplimentry_bill_type_for_view;?></td>
<td><?php echo @$user_name;?>&nbsp;&nbsp;<?php echo @$wing_flat;?> </td>
<td><?php echo $transaction_date_for_view;?></td>
<td style="text-align:right;"><span style="display:none"><?php echo $total_amount; ?></span><?php $g_total=$this->Currency->formatCurrency( $total_amount, "INR"); echo $g_total;?></td>
<td><?php echo $description;?></td>
<td class="hide_at_print" style="text-align:left;">
<div class="btn-group">
<a class="btn blue mini" href="#" data-toggle="dropdown">
<i class="icon-chevron-down"></i></a>
<ul class="dropdown-menu" style="min-width:75px !important;">
<li>
<a href="supplimentry_view/<?php echo $supplimentry_bill_id; ?>" target="_blank"><i class="icon-search"></i> View</a>
</li>
</ul>
</div>
<?php if(!empty($creater_name)){ ?>

	<a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $creater_name; ?><br/><b>Generated On: </b><?php echo $current_date; ?>" role="button"><i class="icon-exclamation-sign"></i></a>
	
<?php } ?>

</td>
</tr>
<?php }} ?>
<tr>
	<td colspan="6" style="text-align:right;"><b>Total</b></td>
	<td style="text-align:right;"><b><?php $grand_total = $this->Currency->formatCurrency( $grand_total, "INR"); echo $grand_total;?></b></td>
	<td></td>
	<td class="hide_at_print"></td>
</tr>
</tbody>
</table>
<?php } ?>
<?php if($supplimentry_bill_type_for_view == 2) { ?>
<table style="background-color:white; width:100%;" class="table table-bordered">
<thead>
<tr>
<th colspan="8" style="text-align:center;">
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
<th class="hide_at_print">View</th>
</tr>
</thead>
<tbody id="table" >
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
<tr class="search_data">
<td><?php echo $i;?></td>
<td><?php echo $receipt_id;?></td>
<td><?php echo $current_date;?></td>
<td><?php echo @$user_name;?>&nbsp;&nbsp;<?php echo @$wing_flat;?> </td>
<td><?php echo $transaction_date_for_view;?></td>
<td style="text-align:right;"><span style="display:none"><?php echo $total_amount; ?></span><?php $g_total=number_format($total_amount); echo $g_total;?></td>
<td><?php echo $description;?></td>
<td class="hide_at_print" style="text-align:left;">
<div class="btn-group">
<a class="btn blue mini" href="#" data-toggle="dropdown">
<i class="icon-chevron-down"></i></a>
<ul class="dropdown-menu" style="min-width:75px !important;">
<li>
<a href="supplimentry_view/<?php echo $supplimentry_bill_id; ?>" target="_blank"><i class="icon-search"></i> View</a>
<?php if(!empty($creater_name)){ ?>
</li>
</ul>
</div>
	<a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $creater_name; ?><br/><b>Generated On: </b><?php echo $current_date; ?>" role="button"><i class="icon-exclamation-sign"></i></a>
<?php } ?>

</td>
</tr>
<?php }}}?>
<tr>
<td colspan="5" style="text-align:right;"><b>Total</b></td>
<td style="text-align:right;"><b><?php 
$grand_total = number_format($grand_total);
echo $grand_total; ?></b></td>
<td></td>
<td class="hide_at_print"></td>
</tr>
</tbody>
</table>
<?php } ?>
<?php if($supplimentry_bill_type_for_view == 3){ ?>	
<table class="table table-bordered" style="background-color:white; width:100%;">
<thead>
<tr>
<th colspan="8" style="text-align:center;">
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
<th class="hide_at_print">View</th>
</tr>
</thead>
<tbody id="table" class="search_data">	
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
<tr class="search_data">
<td><?php echo $i; ?> </td>
<td><?php echo $receipt_id; ?></td>
<td><?php echo $date; ?></td>
<td><?php echo $user_name; ?>&nbsp;&nbsp;<?php echo $wing_flat; ?> </td>
<td><?php echo $transaction_date_for_view; ?></td>
<td style="text-align:right;"><span style="display:none"><?php echo $g_total; ?></span><?php $g_total = number_format($g_total); echo $g_total; ?></td>
<td><?php echo $description; ?></td>
<td class="hide_at_print" style="text-align:left;">
<div class="btn-group">
		<a class="btn blue mini" href="#" data-toggle="dropdown">
		<i class="icon-chevron-down"></i>	
		</a>
		
		<ul class="dropdown-menu" style="min-width:75px !important;">
		<li><a href="supplimentry_view/<?php echo $supplimentry_bill_id; ?>"  target="_blank"><i class="icon-search"></i> View</a></li>
		</ul>
		</div>

		<?php if(!empty($creater_name))
		{ ?>
<a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $creater_name; ?><br/><b>Generated On: </b><?php echo $current_date; ?>" role="button"><i class="icon-exclamation-sign"></i></a>
		
		<?php } ?>

</td>
</tr>
<?php }}}	 ?>
<tr>
<td colspan="5" style="text-align:right;"><b>Total</b></td>
<td style="text-align:right;"><b><?php 
$grand_total = number_format($grand_total);
echo $grand_total; ?></b></td>
<td></td>
<td class="hide_at_print"></td>
</tr>
</tbody>
</table>
<?php }}
if($nnn == 55) { ?>
<br /><br />
<center>
<h3 style="color:red;"><b>No Record Found in Selected Period</b></h3>
</center>
<br /><br />
<?php 
}
?>

<script>
jQuery('.popovers').popover({html: true});
var $rows = $('.search_data');
$('#search').keyup(function() {
var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
$rows.show().filter(function() {
var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
return !~text.indexOf(val);
}).hide();
});
</script>	

















