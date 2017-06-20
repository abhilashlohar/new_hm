
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
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="table">
	<?php
	$i=0;
//	pr($ledger_yearly);
	foreach($ledger_yearly as $data){
	$i++;	
	
	$ledger_yearly_id=$data['ledger_yearly']['ledger_yearly_id'];
		$account_category_id=$data['ledger_yearly']['account_category_id'];
		$from=$data['ledger_yearly']['from'];
		$to=$data['ledger_yearly']['to'];
		$request_date=$data['ledger_yearly']['request_date'];
		$request_time=$data['ledger_yearly']['request_time'];
		$prepared_date=@$data['ledger_yearly']['prepared_date'];
		$prepared_time=@$data['ledger_yearly']['prepared_time'];
		
		if($account_category_id==34){
			$account_name="Member control accounts";
			
		}elseif($account_category_id==2){
			$account_name="Asset accounts";
		}elseif($account_category_id==3){
			$account_name="Income Accounts";
		}elseif($account_category_id==4){
			$account_name=" Expenditure accounts";
		}elseif($account_category_id==1){
			$account_name="Liability accounts";
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
		<td>
		<a style="" role="button" class="btn mini pull-left remove_row" remove_id="<?php echo $ledger_yearly_id; ?>"  href="#"><i class="icon-trash"></i></a>
		</td>
	</tr>
	<?php } ?>
	</tbody>
	
</table>