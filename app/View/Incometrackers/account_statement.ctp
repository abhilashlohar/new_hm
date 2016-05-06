<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>	
<style>
#report_tb th{
	font-size: 14px !important;background-color:#C8EFCE;padding:5px;border:solid 1px #55965F;text-align: left;
}
#report_tb td{
	padding:5px;
	font-size: 15px;border:solid 1px #55965F;background-color:#FFF;
}
table#report_tb tr:hover td {
background-color: #E6ECE7;
}
</style>
<?php $default_from = date('1-m-Y'); $default_to = date('d-m-Y'); ?>

<div style="text-align:center;" class="hide_at_print">
<a href="<?php echo $webroot_path; ?>Incometrackers/in_head_report" class="btn" rel='tab'>Regular Bill Report</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_reports_supplimentry" class="btn" rel='tab'>Supplementary Bill Report</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/account_statement" class="btn yellow" rel='tab'>Account Statement</a>
</div>

<div class="hide_at_print" align="center">
<table>
		<tr>
			<td>
				<select name="ledger_sub_account[]" class="m-wrap chosen medium" style="width:200px;" id="ledger_sub_account_id">
				<option value="" style="display:none;">--member--</option>
				<?php foreach($members_for_billing as $ledger_sub_account_id){
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
				} ?>
				</select> 
			</td>
			<td>
			<input class="date-picker m-wrap medium" id="from" data-date-format="dd-mm-yyyy" name="from" 
			placeholder="From" style="background-color:white !important; margin-top:8px;" value="<?php echo $default_from; ?>" type="text">
			</td>
			<td>
				<input class="date-picker  m-wrap medium" id="to" data-date-format="dd-mm-yyyy" 
				name="to" placeholder="To" style="background-color:white !important; margin-top:8px;" 
				value="<?php echo $default_to; ?>" type="text">
			</td>
			<td valign="top"><button type="button" name="sub" class="btn yellow" id="go" style="margin-top:8px;">Go</button>
			</td>
		</tr>
</table>
</div>


<br/>
<div style="width:98%;margin:auto;overflow:auto;background-color:#FFF;padding:5px;display:none;border:solid 1px #ccc;" id="result_statement" >
	
</div>
<script>
$(document).ready(function(){
	$( "#go" ).click(function() {
		var ledger_sub_account_id=$("#ledger_sub_account_id").val();
		var from=$("#from").val();
		var to=$("#to").val();
		$("#result_statement").show();
		$("#result_statement").html('<div align="center"><h4>Loading...</h4></div>')
		.load('<?php echo $webroot_path; ?>Incometrackers/account_statement_for_flat_ajax/'+ledger_sub_account_id+'/'+from+'/'+to);
	});
});
</script>











