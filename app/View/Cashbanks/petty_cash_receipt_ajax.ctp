
<?php if($value == 1){  ?>
		<select name="ledger_sub_account[]" class="m-wrap" style="width:200px;">
		<option value="" style="display:none;">--member--</option>
		<?php foreach($members_for_billing as $ledger_sub_account_id){
		$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
		echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
		} ?>
		</select>    
<?php } else if($value == 2){ ?>	
<select name="user_id" class="m-wrap chosen span12">
<option value="" style="display:none;">Select</option>
<?php
foreach ($cursor2 as $collection){
$auto_id = (int)$collection['ledger_account']['auto_id'];
$name = $collection['ledger_account']['ledger_name'];
?>
<option value="<?php echo $auto_id; ?>"><?php echo $name; ?></option>
<?php } ?>
</select>
<?php }else{ ?>
<select name="user_id" class="m-wrap span12 chosen" id="usr">
<option value="">Select</option>
</select>
<?php } ?>