<style>
.table th{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
.table td{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
</style>


<?php

echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));

$society_result=$this->requestAction(array('controller' => 'Hms', 'action' => 'society_name'),array('pass'=>array($s_society_id)));
$society_name=$society_result[0]["society"]["society_name"];
?>
<div align="center">
<span style="font-size: 14px;"><?php echo $society_name; ?></span><br/>
<span >Trial-Balance Report</span><br/>
From: <?php echo $from; ?> To: <?php echo $to; ?>
	<div style="overflow: auto;">
		<a href="" class="btn mini green pull-right tooltips" data-placement="left" data-original-title="Download in excel" ><i class="fa fa-file-excel-o"></i> </a>
	</div>
</div>
<div style="width:100%; overflow:auto; margin-top:10px;" class="hide_at_print">
<label class="m-wrap pull-right"><input type="text" id="search" class="m-wrap medium" style="background-color:#FFF !important;" placeholder="Search"></label>	
</div>	

<div style="background-color:#FFF;">
<table class="table table-bordered table-striped table-hover" width="100%">
	<thead>
		<tr>
			<th></th>
			<th style="text-align: center;" colspan="2">Opening Balance</th>
            <th style="text-align: center;" colspan="2">Transactions</th>
			<th style="text-align: center;" colspan="2">Closing Balance</th>
		</tr>
		<tr>
			<th>Ledger Accounts/Ledger Sub Accounts</th>
			<th style="text-align: right;width: 10%;">Debit</th>
			<th style="text-align: right;width: 10%;">Credit</th>
            <th style="text-align: right;width: 10%;">Debit</th>
            <th style="text-align: right;width: 10%;">Credit</th>
			<th style="text-align: right;width: 10%;">Debit</th>
			<th style="text-align: right;width: 10%;">Credit</th>
		</tr>
	</thead>
	<tbody id="table">
	<?php  
	$total_ob_debit=0; $total_ob_credit=0; $total_debit=0; $total_credit=0; $total_cb_debit=0; $total_cb_credit=0;
	foreach($result_trial_balance as $ledger_account){ 
				$auto_id= $ledger_account["trial_balance_converted_society"]["auto_id"];

					$ledger_account_name=$ledger_account["trial_balance_converted_society"]["ledger_account_name"];
					$opening_amount=$ledger_account["trial_balance_converted_society"]["opening_amount"];
					$opening_amount_type=$ledger_account["trial_balance_converted_society"]["opening_amount_type"];
					$debit=$ledger_account["trial_balance_converted_society"]["debit"];
					$credit=$ledger_account["trial_balance_converted_society"]["credit"];
					$closing_amount=$ledger_account["trial_balance_converted_society"]["closing_amount"];
					$closing_amount_type=$ledger_account["trial_balance_converted_society"]["closing_amount_type"];
					//$closing_amount=$ledger_account["trial_balance_converted_society"]["closing_amount"];
					
		
			?>
			
			<tr>
				<td><?php echo $ledger_account_name; ?> </td>
				<?php if($opening_amount_type=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $opening_amount, "INR"); 
						$total_ob_debit+=$opening_amount; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($opening_amount_type=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $opening_amount, "INR"); 
						$total_ob_credit+=$opening_amount ?>
					</td>
					<?php
				}
				if($opening_amount_type==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				<td style="text-align: right;"><?php echo $this->Currency->formatCurrency( $debit, "INR"); 
				$total_debit+=$debit;
				?></td>
				<td style="text-align: right;"><?php echo $this->Currency->formatCurrency( $credit, "INR"); 
				$total_credit+=$credit;
				?></td>
				
				<?php if($closing_amount_type=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $closing_amount, "INR"); 
						$total_cb_debit+=$closing_amount; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($closing_amount_type=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $closing_amount, "INR"); 
						$total_cb_credit+=$closing_amount; ?>
					</td>
					<?php
				}
				if($closing_amount_type==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				
			</tr>
			<?php
		} ?>	
			
		
		<tr>
			<th><b>TOTAL</b></th>
			<th style="text-align: right;"><?php echo $this->Currency->formatCurrency( $total_ob_debit, "INR"); ?></th>
			<th style="text-align: right;"><?php echo $this->Currency->formatCurrency( $total_ob_credit, "INR"); ?></th>
            <th style="text-align: right;"><?php echo $this->Currency->formatCurrency( $total_debit, "INR"); ?></th>
            <th style="text-align: right;"><?php echo $this->Currency->formatCurrency( $total_credit, "INR"); ?></th>
			<th style="text-align: right;"><?php echo $this->Currency->formatCurrency( $total_cb_debit, "INR"); ?></th>
			<th style="text-align: right;"><?php echo $this->Currency->formatCurrency( $total_cb_credit, "INR"); ?></th>
		</tr>
	</tbody>
</table>
</div>



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