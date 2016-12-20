<style>
.table th{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
.table td{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
</style>


<?php
$society_result=$this->requestAction(array('controller' => 'Hms', 'action' => 'society_name'),array('pass'=>array($s_society_id)));
$society_name=$society_result[0]["society"]["society_name"];
?>
<div align="center">
<span style="font-size: 14px;"><?php echo $society_name; ?></span><br/>
<span >Trial-Balance Report</span><br/>
From: <?php echo $from; ?> To: <?php echo $to; ?>
	<div style="overflow: auto;">
		<a href="trial_balance_ajax_show_excel_with_sub_ledger/<?php echo $from; ?>/<?php echo $to; ?>/<?php echo $wise; ?>" class="btn mini green pull-right tooltips" data-placement="left" data-original-title="Download in excel" ><i class="fa fa-file-excel-o"></i> </a>
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
	$total_ob_debit=0; $total_ob_credit=0; $total_debit=0; $total_credit=0; $total_cb_debit=0; $total_cb_credit=0;// pr($result_ledger_account); exit;
	
	foreach($result_ledger_account as $ledger_account){ 
		  $ledger_account_id= $ledger_account["ledger_account"]["auto_id"];
		
		$ledger_account_name=$ledger_account["ledger_account"]["ledger_name"];
			
			
		
///////////////////// Start Sub Ledger Code ///////////////////////////////////////		
		if($ledger_account_id == 34 || $ledger_account_id == 15 || $ledger_account_id == 33 || $ledger_account_id == 35 || $ledger_account_id == 112)	
		{
		foreach($result_ledger_sub_account as $ledger_sub_account){ 
		$ledger_sub_account_id=(int)$ledger_sub_account["ledger_sub_account"]["auto_id"];
		$ledger_sub_account_name=$ledger_sub_account["ledger_sub_account"]["name"];
		
		$ledger_id=(int)$ledger_sub_account["ledger_sub_account"]["ledger_id"];
		if($ledger_account_id==34 and $ledger_id==34){
				$result_member = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
						$ledger_sub_account_name=$result_member['user_name'];
						$wing_name=$result_member['wing_name'];
						$flat_name=$result_member['flat_name'];
						$wing_flat=$wing_name.'-'.$flat_name;
						$ledger_extra_info=$wing_flat;
						
					//	if($trail_balance["opening_balance"][0]==0 && $trail_balance["debit"]==0 && $trail_balance["credit"]==0 && $trail_balance["closing_balance"][0]==0){ continue; }
						$trail_balance=$this->requestAction(array('controller' => 'Accounts', 'action' => 'calculate_opening_balance_for_trail_balance_for_sub_account'),array('pass'=>array($from,$to,$ledger_account_id,$ledger_sub_account_id)));
						?>
			
			<tr>
				<td><?php echo $ledger_sub_account_name; ?> <span style="padding-left: 10px;font-weight: 100;"><?php echo $ledger_extra_info; ?></span></td>
				<?php if($trail_balance["opening_balance"][1]=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["opening_balance"][0], "INR"); 
						$total_ob_debit+=$trail_balance["opening_balance"][0]; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($trail_balance["opening_balance"][1]=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["opening_balance"][0], "INR"); 
						$total_ob_credit+=$trail_balance["opening_balance"][0]; ?>
					</td>
					<?php
				}
				if($trail_balance["opening_balance"][1]==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				<td style="text-align: right;"><?php echo $this->Currency->formatCurrency( $trail_balance["debit"], "INR"); 
				$total_debit+=$trail_balance["debit"];
				?></td>
				<td style="text-align: right;"><?php echo $this->Currency->formatCurrency( $trail_balance["credit"], "INR"); 
				$total_credit+=$trail_balance["credit"];
				?></td>
				
				<?php if($trail_balance["closing_balance"][1]=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["closing_balance"][0], "INR"); 
						$total_cb_debit+=$trail_balance["closing_balance"][0]; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($trail_balance["closing_balance"][1]=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["closing_balance"][0], "INR"); 
						$total_cb_credit+=$trail_balance["closing_balance"][0]; ?>
					</td>
					<?php
				}
				if($trail_balance["closing_balance"][1]==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				
			</tr>
			<?php
		}
		if($ledger_account_id==33 and $ledger_id==33){
			@$bank_account=@$ledger_sub_account["ledger_sub_account"]["bank_account"];
			$ledger_extra_info=$bank_account;
			//if($trail_balance["opening_balance"][0]==0 && $trail_balance["debit"]==0 && $trail_balance["credit"]==0 && $trail_balance["closing_balance"][0]==0){ continue; }
			$trail_balance=$this->requestAction(array('controller' => 'Accounts', 'action' => 'calculate_opening_balance_for_trail_balance_for_sub_account'),array('pass'=>array($from,$to,$ledger_account_id,$ledger_sub_account_id)));
			?>
			
			<tr>
				<td><?php echo $ledger_sub_account_name; ?> <span style="padding-left: 10px;font-weight: 100;"><?php echo $ledger_extra_info; ?></span></td>
				<?php if($trail_balance["opening_balance"][1]=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["opening_balance"][0], "INR"); 
						$total_ob_debit+=$trail_balance["opening_balance"][0]; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($trail_balance["opening_balance"][1]=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["opening_balance"][0], "INR"); 
						$total_ob_credit+=$trail_balance["opening_balance"][0]; ?>
					</td>
					<?php
				}
				if($trail_balance["opening_balance"][1]==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				<td style="text-align: right;"><?php echo $this->Currency->formatCurrency( $trail_balance["debit"], "INR"); 
				$total_debit+=$trail_balance["debit"];
				?></td>
				<td style="text-align: right;"><?php echo $this->Currency->formatCurrency( $trail_balance["credit"], "INR"); 
				$total_credit+=$trail_balance["credit"];
				?></td>
				
				<?php if($trail_balance["closing_balance"][1]=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["closing_balance"][0], "INR"); 
						$total_cb_debit+=$trail_balance["closing_balance"][0]; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($trail_balance["closing_balance"][1]=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["closing_balance"][0], "INR"); 
						$total_cb_credit+=$trail_balance["closing_balance"][0]; ?>
					</td>
					<?php
				}
				if($trail_balance["closing_balance"][1]==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				
			</tr>
			<?php
		}
		if($ledger_account_id==15 and $ledger_id==15){
			$ledger_extra_info="";
			//if($trail_balance["opening_balance"][0]==0 && $trail_balance["debit"]==0 && $trail_balance["credit"]==0 && $trail_balance["closing_balance"][0]==0){ continue; }
			$trail_balance=$this->requestAction(array('controller' => 'Accounts', 'action' => 'calculate_opening_balance_for_trail_balance_for_sub_account'),array('pass'=>array($from,$to,$ledger_account_id,$ledger_sub_account_id)));
			?>
			
			<tr>
				<td><?php echo $ledger_sub_account_name; ?> <span style="padding-left: 10px;font-weight: 100;"><?php echo $ledger_extra_info; ?></span></td>
				<?php if($trail_balance["opening_balance"][1]=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["opening_balance"][0], "INR"); 
						$total_ob_debit+=$trail_balance["opening_balance"][0]; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($trail_balance["opening_balance"][1]=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["opening_balance"][0], "INR"); 
						$total_ob_credit+=$trail_balance["opening_balance"][0]; ?>
					</td>
					<?php
				}
				if($trail_balance["opening_balance"][1]==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				<td style="text-align: right;"><?php echo $this->Currency->formatCurrency( $trail_balance["debit"], "INR"); 
				$total_debit+=$trail_balance["debit"];
				?></td>
				<td style="text-align: right;"><?php echo $this->Currency->formatCurrency( $trail_balance["credit"], "INR"); 
				$total_credit+=$trail_balance["credit"];
				?></td>
				
				<?php if($trail_balance["closing_balance"][1]=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["closing_balance"][0], "INR"); 
						$total_cb_debit+=$trail_balance["closing_balance"][0]; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($trail_balance["closing_balance"][1]=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["closing_balance"][0], "INR"); 
						$total_cb_credit+=$trail_balance["closing_balance"][0]; ?>
					</td>
					<?php
				}
				if($trail_balance["closing_balance"][1]==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				
			</tr>
			<?php
		}
			
			
			
			//if($trail_balance["opening_balance"][0]==0 && $trail_balance["debit"]==0 && $trail_balance["credit"]==0 && $trail_balance["closing_balance"][0]==0){ continue; }
			
		} 	
			
		}
		else
		{
		$trail_balance=$this->requestAction(array('controller' => 'Accounts', 'action' => 'calculate_opening_balance_for_trail_balance'),array('pass'=>array($from,$to,$ledger_account_id)));
////////////////////////End Sub Ledger Code ////////////////////////////////////////////		
		if($trail_balance["opening_balance"][0]==0 && $trail_balance["debit"]==0 && $trail_balance["credit"]==0 && $trail_balance["closing_balance"][0]==0){ continue; }
			?>
			<tr>
				<td><?php echo $ledger_account_name; ?></td>
				<?php if($trail_balance["opening_balance"][1]=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["opening_balance"][0], "INR"); 
						$total_ob_debit+=$trail_balance["opening_balance"][0]; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($trail_balance["opening_balance"][1]=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["opening_balance"][0], "INR"); 
						$total_ob_credit+=$trail_balance["opening_balance"][0]; ?>
					</td>
					<?php
				}
				if($trail_balance["opening_balance"][1]==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				<td style="text-align: right;"><?php echo $this->Currency->formatCurrency( $trail_balance["debit"], "INR"); 
				$total_debit+=$trail_balance["debit"];
				?></td>
				<td style="text-align: right;"><?php echo$this->Currency->formatCurrency( $trail_balance["credit"], "INR"); 
				$total_credit+=$trail_balance["credit"];
				?></td>
				
				<?php if($trail_balance["closing_balance"][1]=="Dr"){
					?>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency($trail_balance["closing_balance"][0], "INR"); 
						$total_cb_debit+=$trail_balance["closing_balance"][0]; ?>
					</td>
					<td style="text-align: right;">0</td>
				<?php } 
				if($trail_balance["closing_balance"][1]=="Cr"){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">
						<?php echo $this->Currency->formatCurrency( $trail_balance["closing_balance"][0], "INR"); 
						$total_cb_credit+=$trail_balance["closing_balance"][0]; ?>
					</td>
					<?php
				}
				if($trail_balance["closing_balance"][1]==null){
					?>
					<td style="text-align: right;">0</td>
					<td style="text-align: right;">0</td>
					<?php
				}
				?>
				
				
			</tr>
			<?php
		  } }?>
		
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