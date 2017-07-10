<center>
	<a href="budget_import"  rel='tab' class="btn blue tooltips space-responsive"  ><i class="icon-folder-open"></i> Budget Import </a>
	<a href="budget_report"  rel='tab' class="btn red  tooltips space-responsive" ><i class="icon-folder-close"></i> Report </a>


<form method="post" onsubmit="return valid()">
	<div class="hide_at_print">
			<table>
				<tbody>
				  <tr>
						<td>
							<input type="text" placeholder="From" id="date1" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="from" style="background-color:white !important; margin-top:7px;" value="<?php echo $from ; ?>">
						</td>

						<td>
						<input type="text" placeholder="To" id="date2" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="to" style="background-color:white !important; margin-top:7px;" value="<?php echo $to ; ?>">
						</td>

						<td valign="top">
						<button type="button" id="go" name="sub" class="btn yellow" style="margin-top:7px;">Go</button>
						</td>
				  </tr>
				</tbody>
			</table>
	</div>
</form>
</center>

<div id="budget_view" style="width:100%;">
</div>


<script>
$(document).ready(function() {
	
	    $("#go").bind('click',function(){
			
			var from=$('#date1').val();
		    var to=$('#date2').val();
			$("#budget_view").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("budget_report_ajax/" +from+ "/" +to+"");
	});
});
</script>