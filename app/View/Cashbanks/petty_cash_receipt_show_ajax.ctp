<style>
#table th{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
#table td{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
</style>
<script>
$(document).ready(function(){
jQuery('.tooltips').tooltip();
});
</script> 
<?php $nnn = 55;         
$m_from = date("Y-m-d", strtotime($from));
	$m_to = date("Y-m-d", strtotime($to));
		$from_strto = strtotime($m_from);
			$to_strto = strtotime($m_to); ?>
<?php foreach ($cursor1 as $collection){
	$transaction_id = (int)$collection['cash_bank']['transaction_date'];	
		if($transaction_id >= $from_strto && $transaction_id <= $to_strto){
			$nnn = 555;
}} ?>
<?php if($nnn == 555) { ?>

<div class="portlet box">
	<div class="portlet-body">

	<div align="center"><?php echo strtoupper($society_name); ?> Bank Payment Register From : <?php echo $from;?> To : <?php echo $to;?>
		<span class="hide_at_print">
			
			
			<input class="m-wrap medium pull-right" placeholder="Search" id="search" style="height: 15px; margin-bottom: 4px; font-size: 12px;padding: 4px !important;" type="text">
			<a href="petty_cash_receipt_excel?f=<?php echo $from; ?>&t=<?php echo $to; ?>" target="_blank" class="btn blue mini pull-right" style="margin-right:1%;"><i class="icon-download"></i></a>
			
			<a  class=" printt btn green mini pull-right" onclick="window.print()" style="margin-right:2px;"><i class="icon-print"></i> </a>
			
		</span>
	</div>

<table  width="100%" style=" background-color:white;" class="table table-bordered table-striped" id="table">
<thead>
<tr>
<th>PC Receipt#</th>
<th>Transaction Date</th>
<th>Received From</th>
<th>Amount</th>
<th>Narration</th>
<th class="hide_at_print">Action</th>
</tr>
</thead>			
<tbody id="table">
<?php $n=1; $total_credit = 0; $total_debit = 0;
foreach ($cursor1 as $collection){
	$edited_by="";
	$edited_on="";
	$receipt_no = @$collection['cash_bank']['receipt_number'];
	$transaction_id = (int)$collection['cash_bank']['transaction_id'];	
	$account_type = (int)$collection['cash_bank']['account_type'];			  
	$d_user_id = (int)$collection['cash_bank']['ledger_sub_account_id'];
	$date = $collection['cash_bank']['transaction_date'];
	$prepaired_by = (int)$collection['cash_bank']['created_by'];   
	$narration = $collection['cash_bank']['narration'];
	$account_head = $collection['cash_bank']['account_head'];
	$amount = $collection['cash_bank']['amount'];
	$prepaired_by = (int)$collection['cash_bank']['created_by'];   
	$current_date = $collection['cash_bank']['created_on'];
	$creation_date = date('d-m-Y',strtotime($current_date));
	@$edited_by=@$collection['cash_bank']['edited_by'];
	@$edited_on=@$collection['cash_bank']['edited_on'];
		
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
	
	
	
	$result_gh = $this->requestAction(array('controller'=>'hms','action'=>'profile_picture'),array('pass'=>array($prepaired_by)));
	foreach ($result_gh as $collection){
	$prepaired_by_name = (int)$collection['user']['user_name'];
	}			
	if($account_type == 1){				
		$user_id1 = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($d_user_id)));
		foreach ($user_id1 as $collection){
		//$user_id = $collection['ledger_sub_account']['user_id'];
		$user_flat_id=(int)$collection['ledger_sub_account']['user_flat_id'];
		}

		
		$user_flat_detail=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_flat_info_via_user_flat_id'),array('pass'=>array($user_flat_id)));
		foreach($user_flat_detail as $user_flat_detail){
		$user_id=$user_flat_detail["user_flat"]["user_id"];
		$wing=$user_flat_detail["user_flat"]["wing"];
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
			
$result2 = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($prepaired_by)));
foreach ($result2 as $collection) 
{
$prepaired_by_name = $collection['user']['user_name'];   
$society_id = $collection['user']['society_id'];  	
}	




			
if($date >= $from_strto && $date <= $to_strto)
{
$date = date('d-m-Y',($date));  
$total_debit = $total_debit + $amount;
$new_amount=$amount;
$amount = number_format($amount);
?>
<tr>
<td><?php echo $receipt_no; ?> </td>
<td><?php echo $date; ?> </td>
<td><?php echo $user_name; ?>  &nbsp&nbsp&nbsp&nbsp<?php echo @$wing_flat; ?> </td>
<td style="text-align:right;"><?php echo $amount; ?><span style="display:none;"><?php echo $new_amount; ?></span></td>
<td><?php echo $narration; ?></td>
<td class="hide_at_print" style="text-align:left;">

   <div class="btn-group" style="margin:0 !important;">
	<a class="btn blue mini" href="#" data-toggle="dropdown">
	<i class="icon-chevron-down"></i>	
	</a>
	<ul class="dropdown-menu" style="min-width:80px !important; margin-left: -52px;">
	<li><a href="petty_cash_receipt_html_view/<?php echo $transaction_id; ?>" target="_blank"><i class="icon-search"></i>View</a></li>
	<li><a href="petty_cash_receipt_update/<?php echo $transaction_id; ?>"><i class="icon-edit"></i>Edit</a> </li>
	<!--<li><a href="petty_cash_receipt_pdf?c=<?php echo $transaction_id; ?>" target="_blank"><i class="icon-file"></i>Pdf</a></li>-->
	</ul>
	</div>

	<a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $prepaired_by_name ?><br/><b>Generated On: </b><?php echo $creation_date ?><?php echo @$edit_info; ?>" role="button"><i class="icon-exclamation-sign"></i></a>
	
  
</td>
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
<td class="hide_at_print"></td>
</tr>
</tbody>
</table>  
</div>
</div>            
                             
<?php } 
if($nnn == 55)
{
?>                                    
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
			
			
			
			
			
			
			
			
			
			
			
	