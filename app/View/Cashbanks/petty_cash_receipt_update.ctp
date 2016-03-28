<?php
foreach($cursor1 as $data){
	$receipt_no=$data['cash_bank']['receipt_id'];
	$d_date=$data['cash_bank']['transaction_date'];
	$today=date("d-M-Y");
	$amount=$data['cash_bank']['amount'];
	$society_id=(int)$data['cash_bank']['society_id'];
	$narration=@$data['cash_bank']['narration'];
	$user_id=(int)@$data['cash_bank']['user_id'];
	$account_type=(int)@$data['cash_bank']['account_type'];
	$sub_account=(int)$data['cash_bank']['account_head'];
	$auto_id=(int)$data['cash_bank']['transaction_id'];
}

$trnsaction_date = date('d-m-Y',$d_date);
?>
<form method="post">
<input type="hidden" value="<?php echo $receipt_no; ?>" name="receipt_no">
<input type="hidden" value="<?php echo $auto_id; ?>" name="element_id">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Update Petty Cash Receipt</h4>
</div>
<div class="portlet-body form">
<div class="row-fluid">                      
<div class="span6">

	<label style="font-size:14px;">Transaction Date</label>                        
	<input type="text" class="date-picker m-wrap span6" data-date-format="dd-mm-yyyy" name="transaction_date" data-date-start-date="+0d" value="<?php echo $trnsaction_date; ?>">  

<br>

	<label style="font-size:14px;">A/c Group</label>  
	<select class="m-wrap span6 chosen" name="account_group">
	<option value="" style="display:none;">Select</option>
	<option value="1" <?php if($account_type == 1){ ?> selected="selected" <?php } ?>>Members Control A/c</option>
	<option value="2" <?php if($account_type == 2){ ?> selected="selected" <?php } ?>>Other Income</option>
	</select>

<br>

		<label style="font-size:14px;">Income/Party A/c</label>  
		<div id="members_select_box" <?php if($account_type==2){ ?> class="hide" <?php } ?>>
		<select name="ledger_sub_account" class="m-wrap medium chosen">
		<option value="" style="display:none;">Select</option>
		<?php foreach($members_for_billing as $ledger_sub_account_id){
		$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
		?>
		<option value=<?php echo $ledger_sub_account_id; ?> <?php if($ledger_sub_account_id==$user_id && $account_type==1){ ?> selected="selected" <?php } ?>><?php echo ''.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
		} ?>
		</select> 
		</div>
		<div id="other_income_select_box" <?php if($account_type==1){ ?> class="hide" <?php } ?>>
		<select name="other_income" class="m-wrap medium chosen">
		<option value="" style="display:none;">Select</option>
		<?php
		foreach ($cursor2 as $collection){
		$auto_id = (int)$collection['ledger_account']['auto_id'];
		$name = $collection['ledger_account']['ledger_name'];
		?>
		<option value="<?php echo $auto_id; ?>" <?php if($auto_id==$user_id && $account_type==2){ ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
		<?php } ?>
		</select>
		</div>

</div>
<div class="span6">
  
	<label style="font-size:14px;">Account Head</label>  
	<select   name="account_head" class="m-wrap span6 chosen">
	<option value="" style="display:none;">Select</option>
	<option value="32" selected="selected">Cash-in-hand</option>
	</select> 

<br>

<label style="font-size:14px;">Amount</label>  
<input type="text" class="m-wrap span6" style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="5" name="amount" value="<?php echo $amount; ?>">

<br>

<label style="font-size:14px;">Narration</label> 
<input type="text" class="m-wrap span10"  name="narration" style="background-color:white !important; margin-top:2.5px;" value="<?php echo $narration; ?>">


 
</div>                          
</div>                           
<div class="form-actions">
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_receipt_view" class="btn green" rel="tab"><i class="icon-arrow-left"></i> Back</a>
<button type="submit" class="btn blue" name="submit">Update</button>
</div>
</div>
</div>
</form>

<script>
$('select[name="account_group"]').die().live("change",function(){
		var account_group=$(this).val();
		if(account_group=='1'){
			$("#other_income_select_box").hide();
			$("#members_select_box").show();
		}else{
			$("#other_income_select_box").show();
			$("#members_select_box").hide();
		}
});

</script>


<?php
/*
?>
<body onload="loaddajjax(<?php echo $account_type; ?>,<?php echo $user_id; ?>)"> 
<div style="background-color:#FFF; overflow:auto; border:1px solid #CCC;">
<h4 style="color: #03F;font-weight: 500;border-bottom: solid 1px #DAD9D9;padding-bottom:18px;">&nbsp;&nbsp;&nbsp;<i class="icon-money"></i> Update Petty Cash receipt</h4>	
<form method="post">
	
	
<div style="background-color:#FFF; width:48%; float:left; margin-left:8px;">
  
<input type="hidden" value="<?php echo $auto_id; ?>" id="elldd" />
   
<label style="font-size:14px;">Transaction Date<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="date-picker m-wrap span7" data-date-format="dd-mm-yyyy" name="date" id="date" data-date-start-date="+0d" value="<?php echo $trnsaction_date; ?>">
<label report="dddd" class="remove_report"></label>
</div>
<br />


<label style="font-size:14px;">A/c Group<span style="color:red;">*</span> <i class=" icon-info-sign tooltips" data-placement="right" data-original-title="Please select account group"> </i></label>
<div class="controls">
<select name="type" id="go" class="m-wrap span9 chosen">
<option value="" style="display:none;">Select</option>
<option value="1" <?php if($account_type == 1) { ?> selected="selected" <?php } ?>>Sundry Debtors Control A/c</option>
<option value="2" <?php if($account_type == 2) { ?> selected="selected" <?php } ?>>Other Income</option>
</select>
<label report="acggg" class="remove_report"></label>
</div>
<br />

<label style="font-size:14px;">Income/Party A/c<span style="color:red;">*</span></label>
<div class="controls" id="show_user">
<select name="user_id" class="m-wrap span9 chosen" id="usr">
<option value="">Select</option>
</select> 
<label report="ussrr" class="remove_report"></label>
</div>
<br />



</div>
<div style="background-color:#FFF; width:50%; float:right;">		
<label style="font-size:14px;">Account Head<span style="color:red;">*</span> <i class=" icon-info-sign tooltips" data-placement="right" data-original-title="Please select account head"> </i></label>
<div class="controls">
<select   name="account_head" class="m-wrap span9 chosen" id="acn">
<option value="" style="display:none;">Select</option>
<option value="32" selected="selected">Cash-in-hand</option>
</select> 
<label report="achdd" class="remove_report"></label>
</div>
<br />

<label style="font-size:14px;">Amount<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span9"  name="amount" id="amt" value="<?php echo $amount; ?>">
<label report="amttt" class="remove_report"></label>
</div>
<br />


<label style="font-size:14px;">Narration</label></td>
<div class="controls">
<textarea   rows="4" name="narration" class="m-wrap span9" style="resize:none;" id="narr"><?php echo $narration; ?></textarea>
</div>
<br />
	
 
</div> 
<br />
<div style="width:100%; overflow:auto;">
<hr />
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" class="btn red" style="margin-left:5%;" rel="tab">Back</a>
<button type="submit" class="btn green form_post" name="bank_receipt_update">Save</button>
<button type="button" class="btn">Cancel</button>
</div>
</form>

</div>
</body>

<script>
$(document).ready(function() {
$("#go").bind('change',function(){
var value=document.getElementById('go').value;
$("#show_user").load("<?php echo $webroot_path; ?>Cashbanks/petty_cash_receipt_ajax?value=" +value+ "");
});
});
</script>	

<script>
function loaddajjax(ttpp,uudd)
{
$("#show_user").load("<?php echo $webroot_path; ?>Cashbanks/petty_cash_receipt_ajax?value=" +ttpp+ "&ussidd=" +uudd+ "");	
}
</script>



<script>
$(document).ready(function() { 
	$('form').submit( function(ev){
	
	
	ev.preventDefault();
		
		var m_data = new FormData();
		m_data.append( 'dddd', $('#date').val());
		m_data.append( 'actpp', $('#go').val());
		m_data.append( 'usssr', $('#usr').val());
		m_data.append( 'acheadd', $('#acn').val());
		m_data.append( 'amttt', $('#amt').val());
		m_data.append( 'nrrr', $('#narr').val());
		m_data.append( 'elidd', $('#elldd').val());
		
		$(".form_post").addClass("disabled");
		$("#wait").show();
			
			$.ajax({
			url: "<?php echo $webroot_path; ?>Cashbanks/petty_cash_receipt_update_json",
			data: m_data,
			processData: false,
			contentType: false,
			type: 'POST',
			//dataType:'json',
			}).done(function(response) {
				alert(response);
				if(response.report_type=='error'){
					$(".remove_report").html('');
						jQuery.each(response.report, function(i, val) {
						$("label[report="+val.label+"]").html('<span style="color:red;">'+val.text+'</span>');
					});
				}
				if(response.report_type=='publish'){
                $("#shwd").show()
				}
			
			$("html, body").animate({
			scrollTop:0
			},"slow");
			$(".form_post").removeClass("disabled");
			$("#wait").hide();
			});

	 
});
});

</script>		


<div id="shwd" class="hide">
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body">
<p style="font-size:15px; font-weight:600;">Record Updated Successfully</p>
</div>
<div class="modal-footer">
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_receipt" class="btn green" rel='tab'>OK</a>
</div>
</div>
</div> 


*/ ?>


