
<table width="100%" class="table table-bordered " id="receiptmain">
	<thead>
		<tr>
			
            <th>Sr no.</th>
			<th>Title</th>
			<th>From date</th>
		    <th>To date</th>
			<th>Requested</th>
			<th>Prepared</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody id="table">
	<?php
	$i=0;
	
	foreach($ledger_yearly as $data){
	$i++;	
		$account_category_id=$data['ledger_yearly']['account_category_id'];
		$from=$data['ledger_yearly']['from'];
		$to=$data['ledger_yearly']['to'];
		$request_date=$data['ledger_yearly']['request_date'];
		$request_time=$data['ledger_yearly']['request_time'];
		$prepared_date=@$data['ledger_yearly']['prepared_date'];
		$prepared_time=@$data['ledger_yearly']['prepared_time'];
		
		if($account_category_id==34){
			$account_name="Member control accounts";
			
		}
		
		$flag=$data['ledger_yearly']['flag'];
		if($flag==0){
			$status="Preparing ...";
		}else{
			$status="<a href='ledger_yearly_excel?from=$from&to=$to&account_category_id=$account_category_id'>download</a>";
		}
	?>
	 <tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $account_name; ?></td>
		<td><?php echo date("d-m-Y",$from); ?></td>
		<td><?php echo date("d-m-Y",$to); ?></td>
		<td><?php echo $request_date; echo "  ".$request_time; ?></td>
		<td><?php echo $prepared_date; echo "  ".$prepared_time; ?></td>
		<td><?php echo $status; ?></td>
		
	</tr>
	<?php } ?>
	</tbody>
	
</table>