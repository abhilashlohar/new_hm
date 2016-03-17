<div class="portlet box">
	<div class="portlet-body">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Number</th>
					<th>Transaction date</th>
					<th>Receipt Type</th>
					<th>Party Name</th>
					<th>Deposited in</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($receipts as $receipt){
				$receipt_number=$receipt["cash_bank"]["receipt_number"];
				$transaction_date=$receipt["cash_bank"]["transaction_date"];
				$receipt_type=$receipt["cash_bank"]["receipt_type"];
				$ledger_sub_account_id=$receipt["cash_bank"]["ledger_sub_account_id"];
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				$user_name=$member_info["user_name"];
				$wing_name=$member_info["wing_name"];
				$flat_name=$member_info["flat_name"];
				$deposited_in=(int)$receipt["cash_bank"]["deposited_in"];
				$deposited_in_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($deposited_in)));
				pr($deposited_in_info);
				$name=$deposited_in_info[0]["ledger_sub_account"]["name"];?>
				<tr>
					<td><?php echo $receipt_number; ?></td>
					<td><?php echo date("d-m-Y",$transaction_date); ?></td>
					<td><?php echo $receipt_type; ?></td>
					<td><?php echo $user_name.' ('.$wing_name.' - '.$flat_name.')'; ?></td>
					<td><?php echo $name; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>