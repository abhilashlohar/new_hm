<table class="table table-condensed table-bordered">
<tr>
	<td>Auto id</td>
	<td>Society Name</td>
	<td>type of transction</td>
	<td>transction date</td>
	<td>vouchar id</td>
	<td>ledger posting</td>
</tr>
<?php $i=0; 
foreach($actual_data as $data){
$i++;
?>
<tr>
	<td><?php echo $data['auto_id']; ?></td>
	<td><?php echo $data['society_name']; ?></td>
	<td><?php echo $data['source']; ?></td>
	<td><?php echo $data['transaction_date']; ?></td>
	<td><?php echo $data['Number']; ?></td>
	<td><?php echo $data['status']; ?></td>
	
</tr>
<?php }  ?>
</table>