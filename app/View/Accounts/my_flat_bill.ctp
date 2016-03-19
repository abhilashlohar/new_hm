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

$result_opening_balance= $this->requestAction(array('controller' => 'Incometrackers', 'action' => 'fetch_opening_balance_via_user_id'),array('pass'=>array($s_user_id)));


?>

<style media="print">
 #result_statement a[href]:after { display:none; } 
 #result_statement{
	 width:98% !important;
 }
</style>
<?php
$result_user_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($s_user_id)));
	$multiple_flat=$result_user_info["wing_flat"];
?>


<div align="center" class="hide_at_print">
	<table>
		<tr>
		<?php  if(sizeof($multiple_flat)>1){  ?>
		<td>
		<select class="m-wrap" data-placeholder="Choose a Category"  id="flat_select_box">
			<option value="" style="display:none;" >Select...</option>
			<?php $count=0; foreach($multiple_flat as $user_flat_id=>$wing_flat){ $count++;
				?>
			<option value="<?php echo $user_flat_id; ?>" <?php if($count==1){ echo 'selected="selected"'; } ?> ><?php echo $wing_flat; ?></option>
			<?php } ?>
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
	$("#go").live('click',function(){
		var flat_id=$("#flat_select_box").val();
		var from=$("#from").val();
		var to=$("#to").val();
		$("#result_statement").show();
		$("#result_statement").html('<div align="center"><h4>Loading...</h4></div>').load('my_flat_bill_ajax/'+from+'/'+to+'/'+flat_id);
	});
});
</script>