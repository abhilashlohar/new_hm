
<div class="portlet box">
	<div class="portlet-body" >
		<?php
		$other_charge_ids=array();
		foreach($regular_bills as $regular_bill){
			$income_head_array=$regular_bill["regular_bill"]["income_head_array"];
			foreach($income_head_array as $income_head_id=>$value){
				$income_head_ids[]=$income_head_id;
			}
			$other_charge=$regular_bill["regular_bill"]["other_charge"];
			if(sizeof(@$other_charge)==0){ $other_charge=array(); }
			
			foreach($other_charge as $other_charge_id=>$value){
				$other_charge_ids[]=$other_charge_id;
			}
			$start_date=$regular_bill["regular_bill"]["start_date"];
			$end_date=$regular_bill["regular_bill"]["end_date"];
		}
		$income_head_ids=array_unique($income_head_ids);
		$other_charge_ids=array_unique($other_charge_ids);
		echo '<div class="row-fluid"><div class="span6"><span style="font-size: 14px;">Billing Period: '.date("d-M",$start_date).' to '.date("d-M-Y",$end_date).'</span></div>';
		?>
		<div class="span6" align="right">
			<a href="regular_bill_report_excel?period=<?php echo $period; ?>" class="btn mini green tooltips" data-original-title="Download in excel"><i class="fa fa-file-excel-o"></i></a>
			<a href="#" class="btn mini blue tooltips" onclick="window.print();" role="button" data-original-title="Print"><i class="fa fa-print"></i></a>
			<input type="text" id="search" class="m-wrap medium" style="height: 15px; margin-bottom: 4px; font-size: 12px;padding: 4px !important;" placeholder="Search">
		</div>
		</div>
		<div style="overflow-x: scroll;">
		<table class="table table-condensed table-bordered table-striped table-hover" id="main">
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
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($regular_bills as $data){
					$auto_id=$data["regular_bill"]["auto_id"];
					$bill_number=$data["regular_bill"]["bill_number"];
					$edit_text=@$data["regular_bill"]["edit_text"];
					$ledger_sub_account_id=$data["regular_bill"]["ledger_sub_account_id"];
					$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
					$flat_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'flat_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
					$flat_area=$flat_info[0]["flat"]["flat_area"];
					$income_head_array=$data["regular_bill"]["income_head_array"];
					$noc_charge=$data["regular_bill"]["noc_charge"];
					$other_charge=$data["regular_bill"]["other_charge"];
					$total=$data["regular_bill"]["total"];
					$arrear_principle=$data["regular_bill"]["arrear_principle"];
					$arrear_intrest=$data["regular_bill"]["arrear_intrest"];
					$intrest_on_arrears=$data["regular_bill"]["intrest_on_arrears"];
					$credit_stock=$data["regular_bill"]["credit_stock"];
					$due_for_payment=$data["regular_bill"]["due_for_payment"];?>
					<tr>
						<td><?php echo $member_info["wing_name"].'-'.$member_info["flat_name"]; ?></td>
						<td><?php echo $member_info["user_name"]; ?></td>
						<td><?php echo $flat_area; ?></td>
						<td><?php echo $bill_number.$edit_text; ?></td>
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
						<td>
							<div class="btn-group" style="margin: 0px !important;">
							<a class="btn blue mini" href="#" data-toggle="dropdown">
							<i class="icon-chevron-down"></i>	
							</a>
							<ul class="dropdown-menu" style="min-width: 80px ! important; margin-left: -52px;">
							<li><a href="regular_bill_view/<?php echo $auto_id; ?>" target="_blank"><i class="icon-search"></i> View</a></li>
							<li>
							<a href="regular_bill_edit2/<?php echo $auto_id; ?>" role="button" rel="tab"><i class="icon-edit"></i> Edit</a></li>
							</ul>
							</div>
						</td>
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
</div>
<style>
th,td{
	font-size: 12px !important;
	white-space: nowrap;
}
input{
	margin: 0px !important;
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
	$('#main tfoot tr td:first').remove();
	$('#main tfoot tr td:first').attr("colspan",3).html("<b>Total</b>");
});

var $rows = $('#main tbody tr');
$('#search').keyup(function() {
	var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

	$rows.show().filter(function() {
		var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
		return !~text.indexOf(val);
	}).hide();
});
</script>
