<center>
<div align="center" class="mobile-align">
	<a href="bank_reconciliation"  rel='tab' class="btn red tooltips space-responsive"  ><i class="icon-folder-open"></i> Reconciliation </a>
	<a href="reconciliation_match_report"  rel='tab' class="btn blue  tooltips space-responsive" ><i class="icon-folder-close"></i> Reconciliation Match Report</a>
</div>
<form method="post" onSubmit="return valid()">
<div  class="hide_at_print">
        <table style="width:60%;">
        <tr>
        
				<td>
						<select class="medium m-wrap chosen" id="ledger_account">
						<option value="" style="display:none;">Select Bank A/c</option>
						<?php
						 foreach($result_ledger_sub_account as $data){
							 
							  $ledger_sub_ac_id=$data['ledger_sub_account']['auto_id'];
							  $bank_name=$data['ledger_sub_account']['name'];
							 ?>
                          
								<option value="<?php echo $ledger_sub_ac_id; ?>"><?php echo $bank_name; ?> </option>
						  
						  <?php } ?>
						</select>
				</td>
		
				<td>
					<input type="text" placeholder="From" id="date1" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="from" style="background-color:white !important; margin-top:7px;" value="">
				</td>

				<td>
				<input type="text" placeholder="To" id="date2" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="to" style="background-color:white !important; margin-top:7px;" value="">
				</td>
		
				<td valign="top">
				<button type="button" id="go" name="sub" class="btn yellow" style="margin-top:7px;">Search</button>
				</td>
		</tr>
</table>
</div>
</form>
</center>

<div id="ledger_view" style="width:100%;">
</div>


<script>
$(document).ready(function() {
	
	    $("#go").bind('click',function(){
			var ledger_account_id = $('#ledger_account').val();
			var from=$('#date1').val();
		    var to=$('#date2').val();
			$("#ledger_view").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("bank_reconciliation_ajax/" +ledger_account_id+ "/" +from+ "/" +to+"");
	});
});
</script>