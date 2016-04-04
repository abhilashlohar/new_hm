	

<?php

$filename="".$society_name."_Bill_Report";
header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );

?>

		<?php
		foreach($regular_bills as $regular_bill){
			$income_head_array=$regular_bill["regular_bill"]["income_head_array"];
			foreach($income_head_array as $income_head_id=>$value){
				$income_head_ids[]=$income_head_id;
			}
			$other_charge=$regular_bill["regular_bill"]["other_charge"];
			if(sizeof(@$other_charge)==0){ $other_charge=array(); }
			$other_charge_ids=array();
			foreach($other_charge as $other_charge_id=>$value){
				$other_charge_ids[]=$other_charge_id;
			}
			$start_date=$regular_bill["regular_bill"]["start_date"];
			$end_date=$regular_bill["regular_bill"]["end_date"];
		}
		$income_head_ids=array_unique($income_head_ids);
		$other_charge_ids=array_unique($other_charge_ids);
		echo '<div class="row-fluid" align="center"><div class="span6"><span style="font-size: 14px;">Billing Period: '.date("d-M",$start_date).' to '.date("d-M-Y",$end_date).'</span><br/></div>';
		?>
		
		
		<table class="table table-condensed table-bordered table-striped table-hover" id="main" border="1">
			<thead>
				<tr>
					<th>Unit</th>
					<th>Name</th>
					<th>Unit area</th>
					<th>Bill No.</th>
					<?php foreach($income_head_ids as $income_head_id){
						$income_head_name = $this->requestAction(array('controller' => 'Fns', 'action' => 'income_head_name_via_id'),array('pass'=>array($income_head_id)));
						echo '<th>'.$income_head_name.'</th>';
					} ?>
					<th>Non Occupancy charges</th>
					<?php foreach($other_charge_ids as $other_charge_id){
						$income_head_name = $this->requestAction(array('controller' => 'Fns', 'action' => 'income_head_name_via_id'),array('pass'=>array($other_charge_id)));
						echo '<th>'.$income_head_name.'</th>';
					} ?>
					<th>Total</th>
					<th>Arrears-Principal</th>
					<th>Arrears-Interest</th>
					<th>Interest on Arrears</th>
					<th>Credit/Adjustment</th>
					<th>Due For Payment</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
$total_noc_charges=0; $total_total=0; $total_arrear_maintenance=0; $total_arrear_intrest=0; $total_intrest_on_arrears=0; $total_credit_stock=0; $total_due_for_payment=0;
				foreach($regular_bills as $data){
					$auto_id=$data["regular_bill"]["auto_id"];
					$bill_number=$data["regular_bill"]["bill_number"];
					$ledger_sub_account_id=$data["regular_bill"]["ledger_sub_account_id"];
					$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
					$flat_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'flat_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
					$flat_area=$flat_info[0]["flat"]["flat_area"];
					$income_head_array=$data["regular_bill"]["income_head_array"];
					$noc_charge=$data["regular_bill"]["noc_charge"];
					$other_charge=$data["regular_bill"]["other_charge"];
					$total=$data["regular_bill"]["total"];
					$arrear_maintenance=$data["regular_bill"]["arrear_maintenance"];
					$arrear_intrest=$data["regular_bill"]["arrear_intrest"];
					$intrest_on_arrears=$data["regular_bill"]["intrest_on_arrears"];
					$credit_stock=$data["regular_bill"]["credit_stock"];
					$due_for_payment=$data["regular_bill"]["due_for_payment"];?>
					<tr>
						<td><?php echo $member_info["wing_name"].'-'.$member_info["flat_name"]; ?></td>
						<td><?php echo $member_info["user_name"]; ?></td>
						<td><?php echo $flat_area; ?></td>
						<td><?php echo $bill_number; ?></td>
						<?php foreach($income_head_ids as $income_head_id){
							echo '<td>'.@$income_head_array[$income_head_id].' </td>';
								$total_income_heads[$income_head_id][]=$income_head_array[$income_head_id];
						} ?>
						<td><?php echo $noc_charge; $total_noc_charges+=$noc_charge; ?></td>
						<?php foreach($other_charge_ids as $other_charge_id){
							echo '<th>'.$other_charge[$other_charge_id].'</th>';
							$total_other_charges[$other_charge_id][]=$other_charge[$other_charge_id];
						} ?>
						<td><?php echo $total;  $total_total+=$total; ?></td>
						<td><?php echo $arrear_maintenance; $total_arrear_maintenance+=$arrear_maintenance; ?></td>
						<td><?php echo $arrear_intrest; $total_arrear_intrest+=$arrear_intrest; ?></td>
						<td><?php echo $intrest_on_arrears; $total_intrest_on_arrears+=$intrest_on_arrears; ?></td>
						<td><?php echo $credit_stock; $total_credit_stock+=$credit_stock; ?></td>
						<td><?php echo $due_for_payment; $total_due_for_payment+=$due_for_payment; ?></td>
						
					</tr>
				<?php } ?>
			</tbody>
				<tfoot style="font-weight: 600;">
					<tr>
							<td colspan="4" align="right"><b>Total </b></td>
							<?php  foreach($income_head_ids as $income_head_id){ $total_income_heads_am=0;
										foreach($total_income_heads[$income_head_id] as $data5){
											$total_income_heads_am+=$data5;
										} ?>
							<td><b><?php echo $total_income_heads_am; ?></b></td>
							<?php } ?>
							<td><b><?php echo $total_noc_charges; ?></b></td>
							<?php foreach($other_charge_ids as $other_charge_id){ $total_other_charges_am=0;
										foreach($total_other_charges[$other_charge_id] as $data6){
											$total_other_charges_am+=$data6;
										}
									?>
							<td><b><?php echo $total_other_charges_am; ?></b></td>
								
								
						<?php	} ?>
						
						<td><b><?php echo $total_total; ?></b></td>
						<td><b><?php echo $total_arrear_maintenance; ?></b></td>
						<td><b><?php echo $total_arrear_intrest; ?></b></td>
						<td><b><?php echo $total_intrest_on_arrears; ?></b></td>
						<td><b><?php echo $total_credit_stock; ?></b></td>
						<td><b><?php echo $total_due_for_payment; ?></b></td>
					</tr>
				</tfoot>
			
		</table>
