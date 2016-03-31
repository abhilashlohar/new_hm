<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>
<table  align="center" border="1" bordercolor="#FFFFFF" cellpadding="0">
<tr>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/select_income_heads" class="btn " rel='tab'>Selection of Income Heads</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_rate_card" class="btn" style="font-size:16px;" rel='tab'>Rate Card</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_noc" class="btn" style="font-size:16px;" rel='tab'>Non Occupancy Charges</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_penalty" class="btn" style="font-size:16px;" rel='tab'>Penalty Option</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/neft_add" class="btn" style="font-size:16px;" rel='tab'>Add NEFT</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_setup" class="btn" style="font-size:16px;" rel='tab'>Remarks</a>
</td>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/other_charges" class="btn" rel='tab'>Other Charges</a>
</td>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/map_other_members" class="btn yellow" rel='tab'>Advance</a>
</td>
</tr>
</table>

<div align="center">
	<form method="post" id="contact-form">
		<table>
			<tr>
				<td id="first">
				<select class="m-wrap" name="first">
					<option value="" style="display:none;">Select</option>
					<?php foreach($arranged_accounts as $key=>$data){
						echo '<option value='.$key.' >'.$data["user_name"].' ('.$data["wing_flat"].')</option>';
					} ?>
				</select>
				</td>
				<td id="second"></td>
				<td valign="top"><button type="submit" name="sub" class="btn blue" id="go">Submit</button></td>
			</tr>
		</table>
	</form>
</div>

<div class="portlet box span6" >
	<div class="portlet-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Member</th>
					<th>Representator</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($ledger_sub_accounts as $ledger_sub_account){
				$ledger_sub_account_id=$ledger_sub_account["ledger_sub_account"]["auto_id"];
				$representator=$ledger_sub_account["ledger_sub_account"]["representator"];
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				$representator_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($representator)));?>
				<tr>
					<td><?php echo $member_info["user_name"].' '.$member_info["wing_name"].' - '.$member_info["flat_name"]; ?></td>
					<td><?php echo $representator_info["user_name"].' '.$representator_info["wing_name"].' - '.$representator_info["flat_name"]; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script>
$(document).ready(function(){
	var sel=$("#first").html();
	$("#second").html(sel);
	$("#first select").chosen();
	$("#second select").chosen();
	$("#second select").attr("name","second");
});
</script>