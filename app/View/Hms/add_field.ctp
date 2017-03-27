<br>
<form method="post">
<table class="table table-condensed table-bordered" >
<tr>
	<td>Sr.no</td>
	<td>Society Name</td>
	<td>Quarter Bill</td>
	<td>Bill Number</td>
	<td>Status</td>
</tr>
<?php $i=0;
foreach($regular_ledger_posting as $data){
$i++;
?>
<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $data['regular_ledger_posting']['society_name']; ?></td>
	<td><?php echo $data['regular_ledger_posting']['quarter_bill']; ?></td>
	<td><?php echo $data['regular_ledger_posting']['bill_number']; ?></td>
	<td><?php echo $data['regular_ledger_posting']['status']; ?></td>
	
</tr>
<?php } ?>
</table>
<button class="btn blue ledger_posting" type="button">Check ledger posting</button>
</form>
<div id="echo_flat"></div>
<script>
$(document).ready(function(){
	$(".ledger_posting").bind('click',function(){
		$('#echo_flat').html("Loading...").load('add_ac_field');

	});
});


</script>

