<style>
td{ 
margin-bottom:0px !important;
}
</style>


<table class="table table-bordered" style="background-color:white;">
	<tr>
		<th>Accounts Group</th>
		<th>ledger Name</th>
		<th>Debit</th>
		<th>Credit</th>
		<th>Penalty</th>
	</tr>
	<?php 
	foreach($arranged_groups as $group_id=>$ledger_acc_data){
		foreach($ledger_acc_data as $key=>$ledger_accounts){
			if($key!=0){
				?>
				<tr>
					<td><?php echo $ledger_acc_data[0]["group_name"]; ?></td>
					<td><?php echo $ledger_accounts["ledger_account"]["ledger_name"]; ?></td>
					<td><input type="text" class="m-wrap small"></td>
					<td><input type="text" class="m-wrap small"></td>
					<td><input type="text" class="m-wrap small"></td>
				</tr>
			<?php } ?>
		<?php } ?>
	<?php } ?>
</table>