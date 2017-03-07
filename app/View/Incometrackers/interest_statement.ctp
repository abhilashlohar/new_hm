<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>

<div style="text-align:center;" class="hide_at_print">
	<a href="<?php echo $webroot_path; ?>Incometrackers/in_head_report" class="btn " rel='tab'>Regular Bill Report</a>
	<a href="<?php echo $webroot_path; ?>Incometrackers/it_reports_supplimentry" class="btn" rel='tab'>Supplementary Bill Report</a>
	<a href="<?php echo $webroot_path; ?>Incometrackers/account_statement" class="btn" rel='tab'>Account Statement</a>
	<a href="<?php echo $webroot_path; ?>Incometrackers/interest_statement" class="btn yellow" rel='tab'>Interest Statement</a>
</div>

<div class="hide_at_print" align="center">
	<table border="0">
		<tr>
			<td>
				<select class="m-wrap medium chosen" id="period">
				<option value="" style="display:none;">--Select period--</option>
				<?php
				foreach($periods as $period){
					$period=explode('-',$period); ?>
				<option value="<?php echo $period[0]; ?>"><?php echo date("d-M",$period[0]); ?> to <?php echo date("d-M-Y",$period[1]); ?></option>
				<?php } ?>
				</select>
			</td>
			<td>
				<select class="m-wrap medium chosen" id="member">
				<option value="" style="display:none;">--member--</option>
					<?php foreach($members_for_billing as $ledger_sub_account_id){
						$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
						echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
					} ?>
				</select>
			</td>
		<td>
			<button class="btn yellow" id="go" style="margin-top: -3px;">Go</button>
		</td>
		</tr>
	</table>
</div>

<div id="ajax_result" >

</div>
<script>
$(document).ready(function(){
	
	$("#go").on("click",function(){
		//$("#ajax_result").css('overflow-x','');
		var period=$("#period option:selected").val();
		var ledger=$("#member option:selected").val();
	
		if(period!=""){
			$("#ajax_result").html("<div align='center'>Loading...</div>");
			$.ajax({
				url: "<?php echo $webroot_path; ?>Incometrackers/interest_statement_ajax/"+period+"/"+ledger,
			}).done(function(response){
				//$("#ajax_result").css('overflow-x','scroll');
				$("#ajax_result").html(response);
				
			});
		}
		
	});
});
</script>
