<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<input type="text" class="m-wrap medium date-picker" Placeholder="Opening Balance Date" style="background-color:white !important;">

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
					<td><?php echo $ledger_accounts["ledger_account"]["ledger_name"]; ?></td>
					<td><input type="text" class="m-wrap small" onblur="total_debit()"></td>
					<td><input type="text" class="m-wrap small" onblur="total_credit()"></td>
					<td></td>
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
	      $ledger_id = (int)$ledger_sub_account_data['ledger_sub_account']['ledger_id'];
		  }
		  $ledger_data = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_account_info_via_ledger_id'),array('pass'=>array($ledger_id)));
	      foreach ($ledger_data as $ledger_data){
	      $ledger_name = $ledger_data['ledger_account']['ledger_name'];
		  }	?>
	<tr>
		<td><?php echo $ledger_name; ?></td> 
		<td><?php echo $ledger_sub_account_name; ?></td>
		<td><input type="text" class="m-wrap small debit" onblur="total_debit()"></td> 
		<td><input type="text" class="m-wrap small credit" onblur="total_credit()"></td>
		<td><input type="text" class="m-wrap small penalty" onblur="total_penalty()"></td> 
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
		<td><?php echo $ledger_sub_account_name; ?></td>
		<td><input type="text" class="m-wrap small debit" onblur="total_debit()"></td>
		<td><input type="text" class="m-wrap small credit" onblur="total_credit()"></td>
		<td></td>
		</tr>
	<?php }} ?>
<tr>	
<th colspan="2" style="text-align:right;">Total</th>
<th><input type="text" class="m-wrap small total_debit"></th>
<th><input type="text" class="m-wrap small total_credit"></th>
<th><input type="text" class="m-wrap small total_penalty"></th>	
</tr>	
	

	
</table>


<script>

$(document).on("change", ".debit", function() {
	 var sum = 0;
    $(".debit").each(function(){
        sum+= +$(this).val();
    });
    $(".total_debit").val(sum);
});

$(document).on("change", ".credit", function() {
	 var sum = 0;
    $(".credit").each(function(){
        sum+= +$(this).val();
    });
    $(".total_credit").val(sum);
});


$(document).on("change", ".penalty", function() {
	 var sum = 0;
    $(".penalty").each(function(){
        sum+= +$(this).val();
    });
    $(".total_penalty").val(sum);
});
</script>