
<?php  
$default_from = date('d-m-Y',$from); 
$default_to = date('d-m-Y',$to);
?> 

<div class="hide_at_print">	
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>
</div>

<div align="center">
	<select class="m-wrap chosen large" id="wise"> 
		<option value="" style="display:none;">Select Option</option>
		<option value="4" style="text-align:left">1) Summarized Trial balance (w/o subledgers)</option>
		<option value="5" style="text-align:left">2) Detailed Trial balance (with subledger)</option>
		<option value="2" style="text-align:left">3) Members Control Accounts</option>
		<!--<option value="6" style="text-align:left">4) Sundry Debtors Control A/c</option>-->
		<option value="3" style="text-align:left">4) Bank Accounts</option>
		<option value="1" style="text-align:left">5) Sundry Creditors Control A/c</option>
	</select> 
	<input type="text" id="from" class="date-picker m-wrap small" data-date-format="dd-mm-yyyy" name="from" placeholder="From"  value="<?php echo $default_from; ?>" style="background-color:#FFF !important; margin-top:3px;">
	<input type="text" id="to" class="date-picker m-wrap small" data-date-format="dd-mm-yyyy" name="to" placeholder="To"  value="<?php echo $default_to; ?>" style="background-color:#FFF !important; margin-top:3px;">
	<a href="#" style="margin-bottom: 27px;" role="button" class="btn blue icn-only" id="go"><i class="m-icon-swapright m-icon-white"></i></a>
</div>


<div id="result"></div>



<script>
$(document).ready(function() {
	$("#go").bind('click',function(){
		var wise=document.getElementById('wise').value;
		var from=document.getElementById('from').value;
		var to=document.getElementById('to').value;
		if(wise==4){
		$("#result").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("trial_balance_ajax_show/"+from+"/"+to+"/"+wise);
		}
		else if(wise==5){
		$("#result").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("trial_balance_ajax_show_with_sub_ledger/"+from+"/"+to+"/"+wise);	
			
		}
		else{
			$("#result").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("trial_balance_ajax_show_sub_ledger/"+from+"/"+to+"/"+wise);
		}
	});
});
</script>	