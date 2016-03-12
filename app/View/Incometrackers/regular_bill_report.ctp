<div class="portlet box">
	<div class="portlet-body" style="overflow-x: scroll;">
		<?php
		foreach($regular_bills as $regular_bill){
			$income_head_array=$regular_bill["regular_bill"]["income_head_array"];
			foreach($income_head_array as $income_head_id=>$value){
				$income_head_ids[]=$income_head_id;
			}
			$other_charge=$regular_bill["regular_bill"]["other_charge"];
			$other_charge_ids=array();
			foreach($other_charge as $other_charge_id=>$value){
				$other_charge_ids[]=$other_charge_id;
			}
			$start_date=$regular_bill["regular_bill"]["start_date"];
			$end_date=$regular_bill["regular_bill"]["end_date"];
		}
		$income_head_ids=array_unique($income_head_ids);
		$other_charge_ids=array_unique($other_charge_ids);
		echo '<span style="font-size: 14px;">Billing Period: '.date("d-M",$start_date).' to '.date("d-M-Y",$end_date).'</span><br/>';
		?>
		<table class="table table-condensed table-bordered table-striped table-hover" id="main">
			<thead>
				<tr>
					<th>Unit</th>
					<th>Name</th>
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
				<?php foreach($regular_bills as $data){
					$auto_id=$data["regular_bill"]["auto_id"];
					$ledger_sub_account_id=$data["regular_bill"]["ledger_sub_account_id"];
					$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
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
						<?php foreach($income_head_ids as $income_head_id){
							echo '<td>'.@$income_head_array[$income_head_id].'</td>';
						} ?>
						<td><?php echo $noc_charge; ?></td>
						<?php foreach($other_charge_ids as $other_charge_id){
							echo '<th>'.$other_charge[$other_charge_id].'</th>';
						} ?>
						<td><?php echo $total; ?></td>
						<td><?php echo $arrear_maintenance; ?></td>
						<td><?php echo $arrear_intrest; ?></td>
						<td><?php echo $intrest_on_arrears; ?></td>
						<td><?php echo $credit_stock; ?></td>
						<td><?php echo $due_for_payment; ?></td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot style="font-weight: 600;">
				<tr>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<style>
th,td{
	font-size: 12px !important;
	white-space: nowrap;
}
</style>
<script>
$(document).ready(function(){
	var tr=1; 
	$('#main thead tr th').each(function(i, obj) {
		var total=0;
		$('#main tbody tr td:nth-child('+tr+')').each(function(i, obj) {
			var value=parseInt($(this).text());
			total=total+value;
		});
		$('#main tfoot tr').append('<td>'+total+'</td>');
		tr++;
	});
	$('#main tfoot tr td:first').remove();
	$('#main tfoot tr td:first').attr("colspan",2).html("<b>Total</b>");
});
</script>
