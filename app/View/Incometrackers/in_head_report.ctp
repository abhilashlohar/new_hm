<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>

<div style="text-align:center;" class="hide_at_print">
	<a href="<?php echo $webroot_path; ?>Incometrackers/in_head_report" class="btn yellow" rel='tab'>Regular Bill Report</a>
	<a href="<?php echo $webroot_path; ?>Incometrackers/it_reports_supplimentry" class="btn" rel='tab'>Supplementary Bill Report</a>
	<a href="<?php echo $webroot_path; ?>Incometrackers/account_statement" class="btn" rel='tab'>Account Statement</a>
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
				<option value="<?php echo $period[0].'-'.$period[1]; ?>"><?php echo date("d-M",$period[0]); ?> to <?php echo date("d-M-Y",$period[1]); ?></option>
				<?php } ?>
				</select>
			</td>
		<td>
			<button class="btn yellow" id="go" style="margin-top: -3px;">Go</button>
		</td>
		</tr>
	</table>
</div>

<div id="ajax_result">

</div>
<script>
$(document).ready(function(){
	
	$("#go").on("click",function(){
		var period=$("#period option:selected").val();
		if(period!=""){
			$.ajax({
				url: "<?php echo $webroot_path; ?>Incometrackers/regular_bill_report/"+period,
			}).done(function(response){
				$("#ajax_result").html(response);
				
			});
		}
		
	});
});
</script>
