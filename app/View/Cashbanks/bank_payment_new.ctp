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
					
			<input type="text" class="m-wrap span12" 
			style="text-align:right; background-color:white !important; margin-top:2.5px;" Placeholder="Instrument/UTR">
		 </td>
		 <td>
			<select class="m-wrap span12">
			<option value="">Select</option>
			<option value="Cheque">Cheque</option>
			<option value="NEFT">NEFT</option>
			<option value="PG">PG</option>
			</select>
		 
		 <input type="text" class="m-wrap span12" style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="10" Placeholder="Amount">
		 </td>
		 <td>
			<select class="m-wrap span12">
			<option value="" style="display:none;">Select</option>
			<?php for($k=0; $k<sizeof($tds_arr); $k++){
			$tds_sub_arr = $tds_arr[$k];	
			$tds_id = (int)$tds_sub_arr[1];
			$tds_tax = $tds_sub_arr[0];	
			?>
			<option value= "<?php echo $tds_id; ?>"><?php echo $tds_tax; ?></option>
			<?php } ?>                           
			</select>
		    <input type="text"  class="m-wrap span12" 
			readonly="readonly" style="background-color:white !important; margin-top:2.5px;" Placeholder="Net Amount">
		 </td>
		 <td>
				<select class="m-wrap span12">
				<option value="" style="display:none;">Select</option>    
				<?php
				foreach($cursor2 as $db){
				$sub_account_id =(int)$db['ledger_sub_account']['auto_id'];
				$sub_account_name =$db['ledger_sub_account']['name'];
				$ac_number = $db['ledger_sub_account']['bank_account']; 
				$bank_acccc = substr($ac_number,-4);  
				?>
				<option value="<?php echo $sub_account_id; ?>"><?php echo $sub_account_name; ?>&nbsp;&nbsp;<?php echo $bank_acccc; ?></option>
				<?php } ?>
				</select>
				<input type="text" class="m-wrap span12" style="background-color:white !important; margin-top:2.5px;" Placeholder="Narration">
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