<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>
<table  align="center" border="1" bordercolor="#FFFFFF" cellpadding="0">
<tr>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/select_income_heads" class="btn " rel='tab'>Selection of Income Heads</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_rate_card" class="btn" style="font-size:16px;" rel='tab'>Rate Card</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_noc" class="btn" style="font-size:16px;" rel='tab'>Non Occupancy Charges</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_penalty" class="btn" style="font-size:16px;" rel='tab'>Penalty Option</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/neft_add" class="btn" style="font-size:16px;" rel='tab'>Add NEFT</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_setup" class="btn" style="font-size:16px;" rel='tab'>Remarks</a>
</td>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/other_charges" class="btn" rel='tab'>Other Charges</a>
</td>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/map_other_members" class="btn yellow" rel='tab'>Bill(s) Maping</a>
</td>
</tr>
</table>

<div align="center">
	<form method="post" id="contact-form2">
		<table>
			<thead>
				<tr>
					<th>Select Member</th>
					<th>Bill(s) will be sent to</th>
				</tr>
			</thead>
			<tr>
				<td id="first" style="vertical-align: top;">
				<select class="m-wrap first_member" name="first" >
					<option value="" style="display:none;">Select</option>
					<?php foreach($arranged_accounts as $key=>$data){
						echo '<option value='.$key.' >'.$data["user_name"].' ('.$data["wing_flat"].')</option>';
					} ?>
				</select>
				<label id="required_field"></label>
				</td>
				<td id="second" style="vertical-align: top;">
				<select class="m-wrap second_member" name="second">
					<option value="" style="display:none;">Select</option>
					<?php foreach($arranged_accounts1 as $key=>$data){
						echo '<option class="rem_opt" value='.$key.' >'.$data["user_name"].' ('.$data["wing_flat"].')</option>';
					} ?>
				</select>
				<label id="required_field2"></label>
				</td>
				<td valign="top"><button type="submit" name="sub" class="btn blue" id="go">Submit</button></td>
			</tr>
		</table>
	</form>
</div>

<div class="portlet box span6" style="margin-left:25%;">
	<div class="portlet-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Member</th>
					<th>Representative</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($ledger_sub_accounts as $ledger_sub_account){
				$ledger_sub_account_id=$ledger_sub_account["ledger_sub_account"]["auto_id"];
				$representator=$ledger_sub_account["ledger_sub_account"]["representator"];
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				$representator_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($representator)));?>
				<tr>
					<td><?php echo $member_info["user_name"].' '.$member_info["wing_name"].' - '.$member_info["flat_name"]; ?></td>
					<td><?php echo $representator_info["user_name"].' '.$representator_info["wing_name"].' - '.$representator_info["flat_name"]; ?>
					
					<a role="button" led_sub_id="<?php echo $ledger_sub_account_id; ?>" class="btn mini pull-right rep_delete red"> <i class="icon-trash"></i>  </a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div id="delete_topic_result">

</div>

<script>
$(document).ready(function(){

$("#contact-form2").on("submit",function(e){
	allow="yes";
	var x=$("select.first_member").val();
	var y=$("select.second_member").val();
	if(x==""){
		allow="no";
		$("#required_field").html("<span style='color:red;'>This field is required</span>");
	}else{
		$("#required_field").html("");
	}
	if(y==""){
		allow="no";
		$("#required_field2").html("<span style='color:red;'>This field is required</span>");
	}else{
		$("#required_field2").html("");
	}
	if(allow=="no"){
		e.preventDefault();
	}
});

	$(".rep_delete").on("click",function(){
		
		var user_flat_id=$(this).attr("led_sub_id");
		$('#delete_topic_result').html('<div id="pp"><div class="modal-backdrop fade in"></div><div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"><div class="modal-body" style="font-size:14px;"><i class="icon-warning-sign" style="color:#d84a38;"></i> Are you sure you want to delete ? </div><div class="modal-footer"><a href="<?php echo $webroot_path; ?>Incometrackers/map_other_members_delete/'+user_flat_id+'" class="btn blue" id="yes">Yes</a><a href="#"  role="button" id="can" class="btn">No</a></div></div></div>');
		
	});
	
	$("#can").live('click',function(){
			$('#pp').hide();
		});
	
	$(".first_member").on("change",function(){	
		var user_id =$(this).val();
		var text2= $(this).children('option[value='+user_id+']').text();
		$(".second_member").children('option').show();
		$(".second_member").children('option[value='+user_id+']').hide();
		$(".chzn-results>li.rem_opt").show();
		$(".chzn-results>li.rem_opt:contains("+text2+")").hide();
	});	

	
	//var sel=$("#first").html();
	//$("#second").html(sel);
	$("#first select").chosen();
	$("#second select").chosen();
	//$("#second select").attr("name","second");
});
</script>