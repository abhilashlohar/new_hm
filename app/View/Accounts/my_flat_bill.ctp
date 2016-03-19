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


<div align="center" class="hide_at_print">
	<table>
		<tr>
		<?php  if($multiple_flat>1){  ?>
		<td>
		<select name="ledger_sub_account[]" class="m-wrap" style="width:200px;">
		<option value="" style="display:none;">--member--</option>
		<?php foreach($members_for_billing as $ledger_sub_account_id){
		$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
		echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
		} ?>
		</select>  
		</td>
		<?php } ?>
		<td><input class="date-picker m-wrap medium" id="from" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;" value="<?php echo date("d-m-Y",strtotime($from)); ?>" type="text"></td>
		<td><input class="date-picker  m-wrap medium" id="to" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;" value="<?php echo date("d-m-Y",strtotime($to)); ?>" type="text"></td>
		<td valign="top"><button type="button" name="sub" class="btn yellow" id="go">Go</button></td>
		</tr>
	</table>
</div>



<br/>
<div style="width:98%;margin:auto;overflow:auto;background-color:#FFF;padding:5px;display:none;border:solid 1px #ccc;" id="result_statement" >
	
</div>

<script>
$(document).ready(function() {
	$("#go").die().live('click',function(){
		var user_flat_id=$("#flat_select_box option:selected").val();
		var from=$("#from").val();
		var to=$("#to").val();
		$("#result_statement").show();
		$.ajax({
		   url: '<?php echo $webroot_path; ?>Accounts/my_flat_bill_ajax/'+from+'/'+to+'/'+user_flat_id,
		   success: function(data){
			   $("#result_statement").html(data);
		   }
		 });
	});
});
</script>