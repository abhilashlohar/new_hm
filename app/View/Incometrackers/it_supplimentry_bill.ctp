<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
<?php $default_date = date('d-m-Y'); ?>
<!-----------Start New Supplimentry Bill Form -------->
<div class="portlet box">
<div class="portlet-body">
<form method="post">
	<table class="table table-condensed table-bordered" id="main" width="100%">
	<thead>
			<tr>
				<th>Billing Date</th>
				<th>Payment Due Date</th>
				<th style="width:200px !important;">Bill Type</th>
				<th>Income Head</th>
				<th>Amount</th>
				<th>Narration</th>
			</tr>
	</thead>
	<tbody>
				
				
			</tbody>
			</table>
		<button type="submit" class="btn blue pull-right" name="submit">Create Receipt</button>
</form>
<a href="#" role="button" id="add_row" class="btn" ><i class="icon-plus"></i> Add Row</a>
</div>
</div>
<!------------ Start sample code ------------->
<table id="sample" style="display:none;">
<tr>
	<td>
		<input type="text" class="date-picker m-wrap small" 
		data-date-format="dd-mm-yyyy" placeholder="Bill Date" value="<?php echo $default_date; ?>" style="background-color:white !important;" name="transaction_date[]"/>
	</td>
	<td>
		<input type="text" class="date-picker m-wrap small" Placeholder="Payment Due Date"name="payment_due_date[]" data-date-format="dd-mm-yyyy"></td>
	<td>
		<select class="m-wrap medium" name="bill_type[]" style="width:200px;">
		<option value="" style="display:none;">Select</option>
		<option value="resident">Residential</option>
		<option value="non_resident">Non Residential</option>
		</select>
		
		<div id="div_non_resident_drop_down" class="hide">
			<select class="m-wrap medium" name="non_resident[]">
			<option value="" style="display:none;">Select</option>
			<?php
			foreach ($cursor11 as $collection) 
			{
			$auto_id = (int)$collection['ledger_sub_account']['auto_id'];
			$user_name = $collection['ledger_sub_account']['name'];
			?>
			<option value="<?php echo $auto_id; ?>"><?php echo $user_name; ?></option>
			<?php } ?>
			</select>
		</div>
		
		<div id="div_resident_drop_down" class="hide">
		<select  class="m-wrap medium" style="width:200px;" name="resident[]">
				<option value="" style="display:none;">--member--</option>
				<?php foreach($members_for_billing as $ledger_sub_account_id){
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
				} ?>
			</select>
		
		</div>
		
		<div id="div_company_name" class="hide">
		<input type="text" class="m-wrap medium" Placeholder="Company Name" name="company_name[]">
		</div>
	</td>
	<td>
		<select class="m-wrap" style="width:200px;" name="income_head[]">
		<option value="" style="display:none;">Select</option>
		<?php  
		foreach ($cursor2 as $collection) 
		{
		$income_heads_id= (int)$collection['ledger_account']["auto_id"];
		$income_heads_name=$collection['ledger_account']["ledger_name"];
		if($income_heads_id != 43 && $income_heads_id != 39 && $income_heads_id != 40)
		{
		?>
		<option value="<?php echo $income_heads_id; ?>"><?php echo $income_heads_name; ?></option>
		<?php }} ?>
		</select>
	</td>
	<td>
	<input type="text" class="m-wrap small" name="amount[]">
	</td>
	<td>
	<a style="margin-top: -4px; margin-right: -5px;" role="button" class="btn mini pull-right remove_row" href="#"><i class="icon-trash"></i></a>
	<input type="text" class="m-wrap span12" style="width:150px;" name="narration[]">
	</td>
</tr>
</table>

<script>
$(document).ready(function(){
	add_row();
	function add_row(){
	
		var new_line=$("#sample tbody").html();
		$("#main tbody").append(new_line);
		$('#main tbody tr:last select[name="bill_type[]"]').chosen();
		$('#main tbody tr:last select[name="income_head[]"]').chosen();
		$('#main tbody tr:last select[name="non_resident[]"]').chosen();
		$('#main tbody tr:last select[name="resident[]"]').chosen();
		$('#main tbody tr:last input[name="transaction_date[]"]').datepicker();
		$('#main tbody tr:last input[name="payment_due_date[]"]').datepicker();
	}
	
	$("#add_row").on("click",function(){
		add_row();
		
	})
	$(".remove_row").die().live("click",function(){
		$(this).closest("tr").remove();
	})
});
</script>















<script>
$('select[name="bill_type[]"]').die().live("change",function(){
		var received_from=$(this).val();
		if(received_from=='resident'){
			$(this).closest("td").find("#div_resident_drop_down").show();
			$(this).closest("td").find("#div_non_resident_drop_down").hide();
			$(this).closest("td").find("#div_company_name").hide();
			
		}else{
			$(this).closest("td").find("#div_resident_drop_down").hide();
			$(this).closest("td").find("#div_non_resident_drop_down").show();
			$(this).closest("td").find("#div_company_name").show();
		    
		}
	})

</script>




