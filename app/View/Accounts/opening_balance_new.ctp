<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<form method="post">

<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block"><i class="icon-reorder"></i>Opening Balance Import</h4>
</div>
<div class="portlet-body form">

<input type="text" class="m-wrap medium date-picker" Placeholder="Opening Balance Date" style="background-color:white !important;" name="date">

<table class="table table-bordered" style="background-color:white;">
	<tr>
		<th>Accounts Group</th>
		<th>ledger Name</th>
		<th>Debit</th>
		<th>Credit</th>
		<th>Penalty (debit)</th>
	</tr>
	<?php 
	foreach($arranged_groups as $group_id=>$ledger_acc_data){
		foreach($ledger_acc_data as $key=>$ledger_accounts){
			if($key!=0){
				?>
				<tr>
					<td><?php echo $ledger_acc_data[0]["group_name"]; ?></td>
					<td><?php echo $ledger_accounts["ledger_account"]["ledger_name"]; ?>
					<input type="hidden" value="<?php echo $ledger_accounts["ledger_account"]["auto_id"]; ?>" name="ledger_id[]">
					</td>
					<td><input type="text" class="m-wrap small debit" name="debit[]"></td>
					<td><input type="text" class="m-wrap small credit" name="credit[]"></td>
					<td><input type="hidden" value="" name="penalty[]"></td>
				</tr>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	
<?php 
     foreach($members_for_billing as $ledger_sub_account_id){
	     $ledger_sub_account=(int)$ledger_sub_account_id;

	      $ledger_sub_account_data = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account)));
	      foreach ($ledger_sub_account_data as $ledger_sub_account_data){
$ledger_sub_account_name = $ledger_sub_account_data['ledger_sub_account']['name'];
$ledger_id=(int)$ledger_sub_account_data['ledger_sub_account']['ledger_id'];
$ledger_sub_account_id=(int)$ledger_sub_account_data['ledger_sub_account']['auto_id'];
$flat_id=(int)$ledger_sub_account_data['ledger_sub_account']['user_flat_id'];
		  }
$flat_dataa=$this->requestAction(array('controller' => 'hms', 'action' => 'fetch_wing_id_via_flat_id'),array('pass'=>array($flat_id)));				
foreach($flat_dataa as $flat_dataaa){
$wing_id=(int)$flat_dataaa['flat']['wing_id'];
}
$wing_flat=$this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat_new')
,array('pass'=>array($wing_id,$flat_id)));	
		  
		  
		  $ledger_data = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_account_info_via_ledger_id'),array('pass'=>array($ledger_id)));
	      foreach ($ledger_data as $ledger_data){
	      $ledger_name = $ledger_data['ledger_account']['ledger_name'];
		  }	?>
	<tr>
		<td><?php echo $ledger_name; ?></td> 
		<td><?php echo $ledger_sub_account_name; ?>&nbsp;&nbsp; (<?php echo $wing_flat; ?>)
<input type="hidden" value="<?php echo $ledger_id; ?>,<?php echo $ledger_sub_account_id; ?>"
name="ledger_id[]">
		</td>
		<td><input type="text" class="m-wrap small debit" name="debit[]"></td> 
		<td><input type="text" class="m-wrap small credit" name="credit[]"></td>
		<td><input type="text" class="m-wrap small penalty" name="penalty[]"></td> 
	</tr>
<?php }	?>
<?php 
    foreach($ledger_sub_account_dataa as $ledger_sub_account_dataa){
        $ledger_sub_account_id = $ledger_sub_account_dataa['ledger_sub_account']['auto_id'];
		$ledger_sub_account_name = $ledger_sub_account_dataa['ledger_sub_account']['name'];
        $ledger_id = (int)$ledger_sub_account_dataa['ledger_sub_account']['ledger_id'];
	
		
		if($ledger_id != 34)
		{		
		$ledger_data = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_account_info_via_ledger_id'),array('pass'=>array($ledger_id)));
		foreach ($ledger_data as $ledger_data){
		$ledger_name = $ledger_data['ledger_account']['ledger_name'];
		}
		?>
		
		<tr>
		<td><?php echo $ledger_name; ?></td>
		<td><?php echo $ledger_sub_account_name; ?>
<input type="hidden" value="<?php echo $ledger_id; ?>,<?php echo $ledger_sub_account_id; ?>" name="ledger_id[]">
		
		</td>
		<td><input type="text" class="m-wrap small debit" name="debit[]"></td>
		<td><input type="text" class="m-wrap small credit" name="credit[]"></td>
		<td><input type="hidden" value="" name="penalty[]"></td>
		</tr>
	<?php }} ?>
<tr>	
	<th colspan="2" style="text-align:right;">Total</th>
	<th><input type="text" class="m-wrap small total_debit" id="total_debit"></th>
	<th><input type="text" class="m-wrap small total_credit" id="total_credit"></th>
	<th><input type="text" class="m-wrap small total_penalty" id="total_penalty"></th>	
</tr>
<tr>
	<td colspan="2"></td>
	<td><input type="text" class="m-wrap small" id="grand_total_debit"><br><b>Total Debit</b></td>
	<td colspan="2"><input type="text" class="m-wrap small" id="grand_total_credit"><br><b>Total Credit</b></td>
</tr>	
</table>
<div id="validation" style="color:red;"></div>
<div class="form-actions">
<button type="submit" name="opening_balance_submit" class="btn green" id="submit_opening_balance">Submit</button>
<button type="button" class="btn">Cancel</button>
</div>
</div>
</div>

</form>

<script>
$(document).ready(function(){
    function grand_total(){
		var total_debit=parseFloat($("#total_debit").val());
		if(IsNumeric(total_debit)==false){ total_debit=0; }
		var total_credit=parseFloat($("#total_credit").val());
		if(IsNumeric(total_credit)==false){ total_debit=0; }
		var total_penalty=parseFloat($("#total_penalty").val());
		if(IsNumeric(total_penalty)==false){ total_debit=0; }
		var grand_total_debit=total_debit+total_penalty;
	    var grand_total_credit=total_credit;
	alert(grand_total_debit);
	alert(grand_total_credit);
	}   
	
	$(".debit").on("blur",function(){
		 var sum = 0;
		$(".debit").each(function(){
			sum+= +$(this).val();
			total_debit+= +$(this).val();
		});
		$(".total_debit").val(sum);
		grand_total();
	});
	
	$(".credit").on("blur",function(){
		 var sum = 0;
		$(".credit").each(function(){
			sum+= +$(this).val();
		});
		$(".total_credit").val(sum);
		grand_total();
	});
	
	$(".penalty").on("blur",function(){
		 var sum = 0;
		$(".penalty").each(function(){
			sum+= +$(this).val();
		});
		$(".total_penalty").val(sum);
		grand_total();
	});
});
$(document).on("click", "#submit_opening_balance", function() {
	var total_debit = 0;
    $("#total_debit").each(function(){
        total_debit += +$(this).val();
    });	
	
    $("#total_penalty").each(function(){
        total_debit += +$(this).val();
    });	
	
	var total_credit = 0;
    $("#total_credit").each(function(){
        total_credit += +$(this).val();
    });
	
	
	if(total_credit != total_debit)
	{
	$("#validation").html('Total Debit Shold be Equal to Total Debit');	
	return false;	
	}
});
</script>