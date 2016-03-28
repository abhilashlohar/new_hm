<br><br>
<?php $default_date = date('d-m-Y'); ?>
<!------Start Form Code---------->
<div class="portlet box">
<div class="portlet-body">
	<form method="post">
		<table class="table table-condensed table-bordered" id="main">
			<thead>
				<tr>
					<th width="20%">Transaction Date</th>
					<th width="20%">Ledger A/c</th>
					<th width="20%">Mode of Payment</th>
					<th width="20%">TDS%</th>
					<th width="20%">Bank Account</th>
				</tr>
			</thead>
			<tbody>
				
				
			</tbody>
		</table>
		<button type="submit" class="btn blue pull-right" name="submit">Create Receipt</button>
	</form>
		<a href="#" role="button" id="add_row">Add Row</a>
</div>
</div>	

<table id="sample" style="display:none;">
	<tbody>
	<tr>
	     <td>
			<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy" 
			value="<?php echo $default_date; ?>" 
			style="background-color:white !important; margin-top:2.5px;">
		 
			<input type="text" class="m-wrap span12" 
			style="background-color:white !important; margin-top:2.5px;" Placeholder="Invoice Reference">
		 </td>
		 <td>
					<select class="m-wrap span12">
					<option value="">--SELECT--</option>
					<?php foreach($cursor11 as $collection){
					$auto_id = $collection['ledger_sub_account']['auto_id'];
					$name = $collection['ledger_sub_account']['name'];
					?>
					<option value="<?php echo $auto_id; ?>,1" ><?php echo $name; ?></option>
					<?php } ?>
					<?php foreach($cursor12 as $collection){
					$auto_id_a=(int)$collection['accounts_group']['auto_id'];
					$result33=$this->requestAction(array('controller'=>'hms','action' => 'expense_tracker_fetch2'),array('pass'=>array($auto_id_a)));
					foreach($result33 as $collection){
					$auto_id = (int)$collection['ledger_account']['auto_id'];
					$name = $collection['ledger_account']['ledger_name'];
					if($auto_id == 15)
					continue;
					?>
					<option value="<?php echo $auto_id; ?>,2" ><?php echo $name; ?></option>
					<?php }} ?>
					<?php foreach($cursor13 as $collection){
					$auto_id_b = (int)$collection['accounts_group']['auto_id'];
					$result33 = $this->requestAction(array('controller'=>'hms','action'=> 'expense_tracker_fetch2'),array('pass'=>array($auto_id_b)));
					foreach($result33 as $collection){
					$auto_id = (int)$collection['ledger_account']['auto_id'];
					$name = $collection['ledger_account']['ledger_name'];
					?>
					<option value="<?php echo $auto_id; ?>,2" ><?php echo $name; ?></option>
					<?php }} ?>
					
					
					
					
					
					</select>
					
					
					
					
		 
		 </td>
		 <td>
		 
		 
		 </td>
		 <td>
		 
		 
		 </td>
		 <td>
		 
		 
		 </td>
	</tr>
	</tbody>
</table>



<script>
$(document).ready(function(){
	add_row();
	function add_row(){
	var new_line=$("#sample tbody").html();
	$("#main tbody").append(new_line);
	//$('#main tbody tr:last select[name="account_group[]"]').chosen();
	//$('#main tbody tr:last select[name="account_head[]"]').chosen();
	//$('#main tbody tr:last select[name="other_income[]"]').chosen();
	//$('#main tbody tr:last select[name="ledger_sub_account[]"]').chosen();
	//$('#main tbody tr:last input[name="transaction_date[]"]').datepicker();
	}
	
	$("#add_row").on("click",function(){
		add_row();
	})
	$(".remove_row").die().live("click",function(){
		$(this).closest("tr").remove();
	})

});
</script>












	
<!--------End Form Code ---------------->	