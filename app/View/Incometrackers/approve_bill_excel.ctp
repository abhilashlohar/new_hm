<?php 
$filename='Approve_bill_excel';
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
 
	$other_charge_ids=array();
	if(sizeof(@$arranged_bills)==0){$arranged_bills=array(); echo 'No bills for approval.'; } 
	foreach($arranged_bills as $start_date=>$arranged_bill){
		foreach($arranged_bill as $data){
			$income_head_array=$data["regular_bill_temp"]["income_head_array"];
			
			foreach($income_head_array as $income_head_id=>$value){
				
				$income_head_ids[]=$income_head_id;
			}
			$other_charge=$data["regular_bill_temp"]["other_charge"];
			
			
			foreach($other_charge as $other_charge_id=>$value){
				$other_charge_ids[]=$other_charge_id;
				
			}
			
			$end_date=$data["regular_bill_temp"]["end_date"];
		}
		
		$income_head_ids=array_unique($income_head_ids);
		$other_charge_ids=array_unique($other_charge_ids);
	
		echo '<center><span style="font-size: 14px;">Billing Period: '.date("d-m-Y",$start_date).' - '.date("d-m-Y",$end_date).'</span></center>'; ?>
		
		
		<table border="1">
			<thead>
				<tr>
					
					<th>Unit</th>
					<th>Name</th>
					<th>Unit area</th>
					<?php foreach($income_head_ids as $income_head_id){
						$income_head_name = $this->requestAction(array('controller' => 'Fns', 'action' => 'income_head_name_via_id'),array('pass'=>array($income_head_id)));
						echo '<th>'.$income_head_name.'</th>';
					} ?>
					<th>Noc</th>
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
			<?php foreach($arranged_bill as $data){
				$auto_id=$data["regular_bill_temp"]["auto_id"];
				$ledger_sub_account_id=$data["regular_bill_temp"]["ledger_sub_account_id"];
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				$flat_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'flat_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				$flat_area=$flat_info[0]["flat"]["flat_area"];
				$income_head_array=$data["regular_bill_temp"]["income_head_array"];
				$noc_charge=$data["regular_bill_temp"]["noc_charge"];
				$other_charge=$data["regular_bill_temp"]["other_charge"];
				$total=$data["regular_bill_temp"]["total"];
				$arrear_principle=$data["regular_bill_temp"]["arrear_principle"];
				$arrear_intrest=$data["regular_bill_temp"]["arrear_intrest"];
				$intrest_on_arrears=$data["regular_bill_temp"]["intrest_on_arrears"];
				$credit_stock=$data["regular_bill_temp"]["credit_stock"];
				$due_for_payment=$data["regular_bill_temp"]["due_for_payment"];?>
				<tr>
					
					<td><?php echo $member_info["wing_name"].'-'.$member_info["flat_name"]; ?></td>
					<td><?php echo $member_info["user_name"]; ?></td>
					<td><?php echo $flat_area; ?></td>
					<?php foreach($income_head_ids as $income_head_id){
						echo '<td>'.@$income_head_array[$income_head_id].'</td>';
					} ?>
					<td><?php echo $noc_charge; ?></td>
					<?php foreach($other_charge_ids as $other_charge_id){
						echo '<td>'.@(int)$other_charge[$other_charge_id].'</td>';
					} ?>
					<td><?php echo $total; ?></td>
					<td><?php echo $arrear_principle; ?></td>
					<td><?php echo $arrear_intrest; ?></td>
					<td><?php echo $intrest_on_arrears; ?></td>
					<td><?php echo $credit_stock; ?></td>
					<td><?php echo $due_for_payment; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php } ?>
	

