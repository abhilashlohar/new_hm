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
<?php $nnn = 55;
	$m_from = date("Y-m-d", strtotime($from));
		$m_to = date("Y-m-d", strtotime($to));
			$m_from = strtotime($from);
				$m_to = strtotime($to);
?>
<?php foreach ($cursor2 as $collection){
	$transaction_date = $collection['cash_bank']['transaction_date'];
		if($transaction_date >= $m_from && $transaction_date <= $m_to){
			$nnn = 555;	
}} ?>
<?php if($nnn == 555){ ?>

<div class="portlet box">
	<div class="portlet-body">


	<div style="text-align:center;"><?php echo strtoupper($society_name); ?> Bank Payment Register From : <?php echo $from;?> To : <?php echo $to;?>
	
		<span class="hide_at_print">
			
			
			<input class="m-wrap medium pull-right" placeholder="Search" id="search" style="height: 15px; margin-bottom: 4px; font-size: 12px;padding: 4px !important;" type="text">
			<a href="bank_payment_excel?f=<?php echo $from; ?>&t=<?php echo $to; ?>" class="btn blue mini pull-right" style="margin-right:1%;"><i class="icon-download"></i></a>
			
			<a class="printt btn green mini pull-right" onclick="window.print()" style="margin-right:2px;"><i class="icon-print"></i></a>
		</span>
	</div>


			
<table  width="100%" style="background-color:white;" class="table table-bordered table-condensed" id="table_css">
<thead>
		<tr>
		<th>Transaction Date</th>
		<th>Payment Voucher</th>
		<th>Paid To</th>
		<th>Invoice Ref</th>
		<th>Paid By</th>
		<th>Cheque/UTR</th>
		<th>Bank Account </th>
		<th>Gross Amount (Rs.)</th>
		<th class="hide_at_print">Action</th>
	</tr>
</thead>
<tbody id="table">								
<?php $total_credit = 0; $total_debit = 0;
foreach ($cursor2 as $collection){
$receipt_no=$collection['cash_bank']['receipt_id'];
$transaction_id=(int)$collection['cash_bank']['transaction_id'];	
$date=$collection['cash_bank']['transaction_date'];
$prepaired_by_id=(int)$collection['cash_bank']['prepaired_by'];
$user_id=(int)$collection['cash_bank']['sundry_creditor_id'];   
$invoice_reference=$collection['cash_bank']['invoice_reference'];
$description=$collection['cash_bank']['narration'];
$receipt_mode=$collection['cash_bank']['receipt_mode'];
$receipt_instruction=$collection['cash_bank']['receipt_instruction'];
$account_id=(int)$collection['cash_bank']['account_head'];
$amount=$collection['cash_bank']['amount'];
$current_date=$collection['cash_bank']['created_on'];		
$ac_type=(int)$collection['cash_bank']['account_type'];
$tds_id=(int)$collection['cash_bank']['tds_id']; 
$total_tds_amount=$amount;	
	foreach($tds_arr as $tds_ddd){
	$tdsss_taxxx = (int)$tds_ddd[0];  
	$tds_iddd = (int)$tds_ddd[1];  
		if($tds_iddd == $tds_id){
		$tds_tax = $tdsss_taxxx;   
		$tds_amount=(round((@$tds_tax/100)*$amount));
		$total_tds_amount=($amount - $tds_amount);
		}
	}
	
$creation_date=date('d-m-Y',strtotime($current_date));											
	$ussr_dataa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($prepaired_by_id)));  
	foreach ($ussr_dataa as $ussrrr){
	$creater_name = $ussrrr['user']['user_name'];  
	}	

if($ac_type == 1){
	$result_lsaaaa = $this->requestAction(array('controller' => 'Hms', 'action' => 'ledger_sub_account_fetch')
	,array('pass'=>array($user_id))); 
	foreach ($result_lsaaaa as $dataaaa){
	$user_name = $dataaaa['ledger_sub_account']['name'];  
    }
}											
else if($ac_type == 2){
	$result_lsa = $this->requestAction(array('controller' => 'hms', 'action' => 'expense_head'),array('pass'=>array($user_id)));  
	foreach ($result_lsa as $collection){
	$user_name = $collection['ledger_account']['ledger_name'];  
	}	
}	
	$result55 = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($prepaired_by_id)));
	foreach ($result55 as $collection){
	$prepaired_by_name = $collection['user']['user_name'];
	}									 
									
	$result_lsa2 = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($account_id))); 					   
	foreach ($result_lsa2 as $collection){
	$account_no = $collection['ledger_sub_account']['name'];  
	}    		

if($date >= $m_from && $date <= $m_to){
$date = date('d-m-Y',($date));
$total_debit =  $total_debit + $total_tds_amount; 
$total_tds_amount = number_format($total_tds_amount); ?>
<tr>
	<td><?php echo $date; ?> </td>
	<td><?php echo $receipt_no; ?> </td>
	<td><?php echo $user_name; ?></td>
	<td><?php echo $invoice_reference; ?> </td>
	<td><?php echo $receipt_mode; ?> </td>
	<td><?php echo $receipt_instruction; ?> </td>
	<td><?php echo $account_no; ?> </td>
	<td style="text-align:right;"><?php echo $total_tds_amount; ?> </td>
	<td class="hide_at_print">
	<div class="btn-group" style="margin:0 !important;">
		<a class="btn blue mini" href="#" data-toggle="dropdown">
		<i class="icon-chevron-down"></i>	
		</a>
		<ul class="dropdown-menu" style="min-width:80px !important; margin-left: -52px;">
			<li><a href="<?php echo $webroot_path; ?>Cashbanks/bank_payment_html_view/<?php echo $transaction_id; ?>" target="_blank"><i class="icon-search"></i>View</a></li>
			<li><a href="<?php echo $webroot_path; ?>Cashbanks/bank_payment_pdf/<?php echo $transaction_id; ?>" target="_blank"><i class="icon-file"></i>Pdf</a></li>
			<li><a href="<?php echo $webroot_path; ?>Cashbanks/bank_payment_update/<?php echo $transaction_id; ?>" rel="tab"><i class="icon-edit"></i>Edit</a></li>
		</ul>
	</div> 
		<i class="icon-info-sign tooltips" data-placement="left" data-original-title="Created by: <?php echo $creater_name; ?> 
		on: <?php echo $creation_date; ?>"></i>
	</td>
</tr>
<?php }} ?>
<tr>
	<td colspan="7" style="text-align:right;"><b>Total</b></td>
	<td style="text-align:right;"><b><?php 
	$total_debit = number_format($total_debit);
	echo $total_debit; ?> <?php //echo "  DR"; ?></b></td>
	<td class="hide_at_print"></td>
</tr>
</tbody>
</table>
</div>
</div>
<?php } if($nnn == 55) { ?>											
<br /><br />											
<center>
	<h3 style="color:red;">
	<b>No Records Found in Selected Period</b>
	</h3>
</center>
<br /><br />											
		
											
											
<?php 
}
?>
											
											
<script>
		 var $rows = $('#table tr');
		 $('#search').keyup(function() {
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
			
			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				return !~text.indexOf(val);
			}).hide();
		});
 </script>											
											
											
											
											
											
											
											
											
											
											
											