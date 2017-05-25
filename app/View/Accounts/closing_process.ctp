<div class="hide_at_print">	
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>
</div>
<center>

<form method="post" onSubmit="return valid()">
<div  class="hide_at_print main_search">
        <table style="">
        <tr>
        
				<td>
						<select class="medium m-wrap chosen" id="account_category">
						<option value="" style="display:none;">Select A/c</option>
						<option value="3"> Income A/c </option>
						<option value="4"> Expenditure A/c  </option>
						</select>
				</td>


				<td>
				<input type="text" placeholder="To" id="date2" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="to" style="background-color:white !important; margin-top:7px;" value="<?php echo date("d-m-Y"); ?>" >
				</td>
		
				<td valign="top">
				<button type="button" id="go" name="sub" class="btn yellow" style="margin-top:7px;">Submit</button>
				</td>
		</tr>
</table>
</div>
</form>
</center>

<div id="ledger_view_1" style="width:100%;">
</div>


<script>
$(document).ready(function() {
	
	    $("#go").bind('click',function(){
			var account_category = $('#account_category').val();
			//var from=$('#date1').val();
		    var to=$('#date2').val();
			$("#ledger_view_1").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("closing_process_ajax/" +account_category+ "/" +to+"");
	});
});
</script>