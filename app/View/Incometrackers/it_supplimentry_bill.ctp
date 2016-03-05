<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   


<input type="hidden" id="fi" value="<?php echo $datef1; ?>" />
<input type="hidden" id="ti" value="<?php echo $datet1;  ?>" /> 
<input type="hidden" id="cn" value="<?php echo $count;  ?>" /> 
<?php
$default_date = date('d-m-Y');
?>
<!-----------------------------Start New Supplimentry Bill Form --------------------->
<div class="portlet box">
	<div class="portlet-body">
	<form method="post" >
		<table class="table table-condensed table-bordered" id="main" width="100%">
			<thead>
				<tr>
					<th>Billing Date</th>
					<th>Payment Due Date</th>
					<th>Bill Type</th>
					<th>Income Head</th>
					<th>Amount</th>
					<th>Narration</th>
				</tr>
			</thead>
			<tbody>
				
				
			</tbody>
		</table>

<a href="#" role="button" id="add_row">Add Row</a>
</div>
</div>
<!------------ Start sample code ------------->
<table id="sample" style="display:none;">
	<tr>
		<td>
			<input type="text" class="m-wrap small date-picker" 
			data-date-format="dd-mm-yyyy" placeholder="Bill Date" value="<?php echo $default_date; ?>" 
			style="background-color:white !important;"/>
		</td>
		<td>
			<input type="text" class="m-wrap small date-picker" Placeholder="Payment Due Date">
		</td>
		<td>
			<select class="m-wrap span12" name="bill_type[]" style="width:200px;">
				<option value="" style="display:none;">Select</option>
				<option value="2">Residential</option>
				<option value="1">Non Residential</option>
			</select>
			
		    <div class="hide" id="non_resident_drop_down">
				<select class="chosen m-wrap medium">
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
			
			<div class="hide" id="resident_dropdown_div">
			<?php 
			$this->requestAction(array('controller' => 'Hms', 'action' => 'resident_drop_down'));
			?>
			</div>
			<div id="company_name_div" class="hide">
			<input type="text" class="m-wrap span12" style="background-color:white !important;" Placeholder="Company Name" style="width:150px;">
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
			<input type="text" class="m-wrap small">
		</td>
		<td>
		<input type="text" class="m-wrap span12" style="width:150px;">
		</td>
	</tr>
</table>

<!------------- End Sample code --------------->
<script>
$(document).ready(function(){
	add_row();
	function add_row(){
	
		var new_line=$("#sample tbody").html();
		$("#main tbody").append(new_line);
		$('#main tbody tr:last select[name="bill_type[]"]').chosen();
		$('#main tbody tr:last select[name="income_head[]"]').chosen();
	}
	
	$("#add_row").on("click",function(){
		add_row();
		
	})
});
</script>

<script>
$('select[name="bill_type[]"]').die().live("change",function(){
		var received_from=$(this).val();
		if(received_from==1){
			$(this).closest("td").find("#resident_dropdown_div").show();
			$(this).closest("td").find("#non_resident_drop_down").hide();
			$(this).closest("td").find("#company_name_div").show();
			 //$("#company_name_div").show();
		}else{
			$(this).closest("td").find("#resident_dropdown_div").hide();
			$(this).closest("td").find("#non_resident_drop_down").show();
			$(this).closest("td").find("#company_name_div").hide();
		    //$("#company_name_div").show();
		}
	})

</script>



		
