<div class="hide_at_print">	
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<?php  
$default_date_from = date('d-m-Y',$from); 
$default_date_to = date('d-m-Y',$to);
?> 
</div>

<div align="center" class="hide_at_print">
	
	<input type="text" id="from" class="date-picker m-wrap medium" data-date-format="dd-mm-yyyy" name="from" placeholder="To"  value="<?php echo $default_date_to; ?>" style="background-color:#FFF !important;">
	<a href="#" style="margin-bottom: 12px;" role="button" class="btn blue icn-only" id="go"><i class="m-icon-swapright m-icon-white"></i></a>
</div>


<div id="result"></div>



<script>
$(document).ready(function() {
	$("#go").bind('click',function(){
		
		var from=document.getElementById('from').value;
		
		$("#result").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("balance_sheet_ajax/"+from);
		
	});
});
</script>	