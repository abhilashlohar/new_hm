<br>
<form method="post">
<table class="table table-condensed table-bordered" >
<tr>
	<td>Sr.no</td>
	<td>source</td>
	<td>Date</td>
	<td>Number</td>
	<td>Status</td>
</tr>
<?php $i=0; 
foreach($actual_data as $data){
$i++;
?>
<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $data['source']; ?></td>
	<td><?php echo $data['transaction_date']; ?></td>
	<td><?php echo $data['Number']; ?></td>
	<td><?php echo $data['status']; ?></td>
	
</tr>
<?php }  ?>
</table>
<br/>
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
<?php }  ?>
</table> 


<input type="text" class="date-picker m-wrap small" id="date1" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;" value="">
<input type="text" class="date-picker m-wrap small" id="date2" data-date-format="dd-mm-yyyy" name="from" placeholder="To" style="background-color:white !important;" value="">
<button class="btn blue ledger_posting" type="button">Check ledger posting</button>
</form>
<div id="echo_flat"></div>
<script>
$(document).ready(function(){
	$(".ledger_posting").bind('click',function(){
		var z=$("#date1").val();
		var t=$("#date2").val();
		$('#echo_flat').html("Loading...").load('add_ac_field?date='+z+'&to='+t);

	});
});


</script>

