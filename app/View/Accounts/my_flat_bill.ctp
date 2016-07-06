<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>				   

<?php
foreach($result_society as $data){
	$society_name=@$data["society"]["society_name"];
	$society_reg_num=@$data["society"]["society_reg_num"];
	$society_address=@$data["society"]["society_address"];
	$society_email=@$data["society"]["society_email"];
	$society_phone=@$data["society"]["society_phone"];
}

//$result_opening_balance= $this->requestAction(array('controller' => 'Incometrackers', 'action' => 'fetch_opening_balance_via_user_id'),array('pass'=>array($s_user_id)));


?>

<style media="print">
 #result_statement a[href]:after { display:none; } 
 #result_statement{
	 width:98% !important;
 }
</style>
<?php
$result_user_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($s_user_id)));
$multiple_flat = sizeof($result_user_info);	
?>
<?php  
$default_date_from = date('d-m-Y',$from); 
$default_date_to = date('d-m-Y',$to);
?> 

<div align="center" class="hide_at_print hidden-phone">
	<table>
		<tr>
		<?php  if($multiple_flat>1){  ?>
		<td>
		<select name="ledger_sub_account[]" class="m-wrap" style="width:200px;" id="ledger_sub_account">
		<?php foreach($members_for_billing as $ledger_sub_account_id){
		$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
		echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
		} ?>
		</select>  
		</td>
		<?php } ?>
		<td><input class="date-picker m-wrap medium" id="from" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;" value="<?php echo $default_date_from; ?>" type="text"></td>
		<td><input class="date-picker  m-wrap medium" id="to" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;" value="<?php echo $default_date_to; ?>" type="text"></td>
		<td valign="top"><button type="button" name="sub" class="btn yellow" id="go">Go</button></td>
		</tr>
	</table>
</div>

<div class="controls controls-row visible-phone">
	<div class="span3"> 
		<?php  if($multiple_flat>1){  ?>
		
		<select name="ledger_sub_account[]" class="m-wrap" style="width:200px;" id="ledger_sub_account1">
		<?php foreach($members_for_billing as $ledger_sub_account_id){
		$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
		echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
		} ?>
		</select>  
		
		<?php } ?>
	</div>
	<div class="span3">
		<input class="date-picker m-wrap medium" id="from1" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;" value="<?php echo $default_date_from; ?>" type="text">
	</div>
	<div class="span3">
		<input class="date-picker  m-wrap medium" id="to1" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;" value="<?php echo $default_date_to; ?>" type="text">
	</div>
	<div class="span3">
		<button type="button" name="sub" class="btn yellow" id="go1">Go</button>
	</div>
</div>

<br/>
<div style="width:98%;margin:auto;overflow:auto;background-color:#FFF;padding:5px;display:none;border:solid 1px #ccc;" id="result_statement" >
	
</div>

<script>
$(document).ready(function() {
	$("#go").die().live('click',function(){
		var ledger_sub_account_id=$("#ledger_sub_account option:selected").val();

		var from=$("#from").val();
		var to=$("#to").val();
		$("#result_statement").show();
		$("#result_statement").html("<div align='center'><h4>Loading...</h4></div>");
		$.ajax({
		   url: '<?php echo $webroot_path; ?>Accounts/my_flat_bill_ajax1/'+from+'/'+to+'/'+ledger_sub_account_id,
		   success: function(data){
			   $("#result_statement").html(data);
		   }
		 });
	});
	$("#go1").die().live('click',function(){
		var ledger_sub_account_id=$("#ledger_sub_account1 option:selected").val();

		var from=$("#from1").val();
		var to=$("#to1").val();
		$("#result_statement").show();
		$("#result_statement").html("<div align='center'><h4>Loading...</h4></div>");
		$.ajax({
		   url: '<?php echo $webroot_path; ?>Accounts/my_flat_bill_ajax1/'+from+'/'+to+'/'+ledger_sub_account_id,
		   success: function(data){
			   $("#result_statement").html(data);
		   }
		 });
	});
});
</script>