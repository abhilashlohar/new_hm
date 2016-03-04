<div class="hide_at_print">	
<center>
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
</center>
</div>
		
<!-------------------------------Start Ledger Form --------------------------->
<?php  
$default_date_from = date('1-m-Y'); 
$default_date_to = date('d-m-Y')
?> 
<center>
<form method="post" onSubmit="return valid()">
<div  class="hide_at_print">
        <table style="width:60%;">
        <tr>
        
				<td>
						<select class="medium m-wrap chosen" id="ledger_account">
						<option value="" style="display:none;">Select Ledger A/c</option>
						<?php
							 foreach ($cursor1 as $collection) 
							 {
							   $auto_id = (int)$collection['ledger_account']['auto_id'];
							   $name = $collection['ledger_account']['ledger_name'];
						if($auto_id != 34 && $auto_id != 33 && $auto_id != 35 && $auto_id != 15 && $auto_id != 112)
						{
						?>
						<option value="<?php echo $auto_id; ?>,2"><?php echo $name; ?></option>
							 <?php }}
                             foreach ($cursor2 as $collection) 
							 {
							 $account_number = "";
							 $wing_flat = "";
							 $auto_id2 = (int)$collection['ledger_sub_account']['auto_id'];
							 $name2 = $collection['ledger_sub_account']['name']; 
                             $ledger_id = (int)$collection['ledger_sub_account']['ledger_id'];
						
						if($ledger_id == 34)
						{							


							$result_member = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($auto_id2)));
							$name2=$result_member['user_name'];
							$wing_name=$result_member['wing_name'];
							$flat_name=$result_member['flat_name'];
							$wing_flat=$wing_name.'-'.$flat_name;
						}
						if($ledger_id == 33){
$account_number = $collection['ledger_sub_account']['bank_account'];  	
							
						}
							 ?>
                          
					<option value="<?php echo $auto_id2; ?>,1"><?php echo $name2; ?> &nbsp;&nbsp; <?php echo @$wing_flat; ?><?php echo @$account_number; ?></option>
						  
						  <?php } ?>
						</select>
				</td>
		
		
				<!--<td id="sub_ledger_ajax_view">
						<select class="medium m-wrap" tabindex="1" name="user_name" id="sub_id" style="margin-top:7px;">
						<option value="0">Select Sub Ledger A/c</option>
						</select>
				</td>-->

				<td>
					<input type="text" placeholder="From Date" id="date1" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="from" style="background-color:white !important; margin-top:7px;" value="<?php echo $default_date_from; ?>">
				</td>

				<td>
				<input type="text" placeholder="To Date" id="date2" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="to" style="background-color:white !important; margin-top:7px;" value="<?php echo $default_date_to; ?>">
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
<!-----------------------------------End Ledger Form ------------------------------------------>
 		
<!------------------------------------ Start Java Script --------------------------------->
<script>/*
$(document).ready(function(){
	
	    $("#ledger_account").bind('change',function(){
		  var ledger_account_id = $('#ledger_account').val();
		  $("#sub_ledger_ajax_view").html('loading...');
		  $("#sub_ledger_ajax_view").load("ledger_ajax?ledger_account_id=" +ledger_account_id+ "");
	    });
	
}); */
</script>			
		
<script>
$(document).ready(function() {
	
	    $("#go").bind('click',function(){
			var ledger_account_id = $('#ledger_account').val();
			var date1=$('#date1').val();
		    var date2=$('#date2').val();
		$("#ledger_view").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("ledger_show_ajax/"+1+"/" +ledger_account_id+ "/" +date1+ "/" +date2+"");
	});
});
</script>			
<script>
function paginttion2(ii)
{
var ledger_account_id = $('#ledger_account').val();
var date1=$('#date1').val();
var date2=$('#date2').val();
		$("#ledger_view").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("ledger_show_ajax/"+ii+"/" +ledger_account_id + "/" +date1+ "/" +date2+"");	
	
	
}



</script>
<!------------------------------------End Java Script Code------------------------------------->