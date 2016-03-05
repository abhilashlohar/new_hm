<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>
<div class="portlet box">
	<div class="portlet-body">
	<?php 
	foreach($arranged_bills as $start_date=>$arranged_bill){
	echo '<span>'.date("d-m-Y",$start_date).'</span><br/>'; ?>
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Unit</th>
					<th>Name</th>
					<th>Last Name</th>
					<th class="hidden-phone">Username</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($arranged_bill as $data){
				$auto_id=$data["regular_bill_temp"]["auto_id"];
				$ledger_sub_account_id=$data["regular_bill_temp"]["ledger_sub_account_id"];
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));?>
				<tr>
					<td><?php echo $member_info["wing_name"].'-'.$member_info["flat_name"]; ?></td>
					<td><?php echo $member_info["user_name"]; ?></td>
					<td>Otto</td>
					<td class="hidden-phone">makr124</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php } ?>
	</div>
</div>