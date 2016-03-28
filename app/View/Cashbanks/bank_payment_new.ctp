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
		<a href="#" role="button" id="add_row" class="btn"><i class="icon-plus"></i> Add Row</a>
</div>
</div>	

<table id="sample" style="display:none;">
	<tbody>
	<tr>
	     <td>
			<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy" 
			value="<?php echo $default_date; ?>" 
			style="background-color:white !important; margin-top:2.5px;" name="transaction_date[]">
		 
			<input type="text" class="m-wrap span12" 
			style="background-color:white !important; margin-top:2.5px;" Placeholder="Invoice Reference"
			name="invoice_reference[]">
		 </td>
		 <td>
					<select class="m-wrap span12" name="ledger_account[]">
					<option value="" style="display:none;">Select</option>
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
			style="text-align:right; background-color:white !important; margin-top:2.5px;" Placeholder="Instrument/UTR" name="instrument[]">
		 </td>
		 <td>
			<select class="m-wrap span12" name="payment_mode[]">
			<option value="" style="display:none;">Select</option>
			<option value="Cheque">Cheque</option>
			<option value="NEFT">NEFT</option>
			<option value="PG">PG</option>
			</select>
		 
		 <input type="text" class="m-wrap span12" style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="10" Placeholder="Amount" name="amount[]">
		 </td>
		 <td>
			<select class="m-wrap span12" name="tds[]">
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
			readonly="readonly" style="background-color:white !important; margin-top:2.5px;" Placeholder="Net Amount" name="net_amount[]">
		 </td>
		 <td>
		 <a style="margin-top: -4px; margin-right: -5px;" role="button" class="btn mini pull-right remove_row" href="#"><i class="icon-trash"></i></a>
				<select class="m-wrap span10" name="bank_account[]">
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
				<input type="text" class="m-wrap span10" style="background-color:white !important; margin-top:2.5px;" Placeholder="Narration" name="narration[]">
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
	$('#main tbody tr:last select[name="ledger_account[]"]').chosen();
	$('#main tbody tr:last select[name="payment_mode[]"]').chosen();
	$('#main tbody tr:last select[name="tds[]"]').chosen();
	$('#main tbody tr:last select[name="bank_account[]"]').chosen();
	$('#main tbody tr:last input[name="transaction_date[]"]').datepicker();
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