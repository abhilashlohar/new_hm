<style>
input{
	margin-bottom: 0px !important;
	height: 15px !important;width: 100px;
}
input[readonly=""]{
    border: medium none !important;
	background-color: transparent;
}


</style>
<a href="<?php echo $webroot_path; ?>Incometrackers/in_head_report" role="button" rel="tab" class="btn"><i class="icon-arrow-left"></i> Back</a>
<?php if($count>0){
	//echo "<br/>You can not edit this bill."; exit;
} ?>
<?php 

$result1 = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch'),array('pass'=>array(7)));			
foreach($result1 as $collection)
{
$ac_name = $collection['ledger_account']['ledger_name'];
$ac_id = (int)$collection['ledger_account']['auto_id'];		
if($ac_id != 43 && $ac_id != 39 && $ac_id != 40)
{
$income_head_arr1[] = (int)$ac_id;	
}
}
$income_head_selected_arr=$society_info[0]["society"]["income_head"];
if(!empty($income_head_selected_arr))
{
@$income_head_arr2 = array_diff($income_head_arr1,$income_head_selected_arr);
}
else
{
$income_head_arr2 = $income_head_arr1;	
}
foreach($income_head_arr2 as $data)
{
$income_arrr[] = $data;
}



$tax=(float)$society_info[0]["society"]["tax"];
foreach($regular_bill_info as $regular_bill){
	$ledger_sub_account_id=(int)$regular_bill["regular_bill"]["ledger_sub_account_id"];
	$start_date=$regular_bill["regular_bill"]["start_date"];
	$start_date=date("Y-m-d",$start_date); 
	$due_date=$regular_bill["regular_bill"]["due_date"];
	$bill_number=$regular_bill["regular_bill"]["bill_number"];
	$income_head_array=$regular_bill["regular_bill"]["income_head_array"];
	$total=$regular_bill["regular_bill"]["total"];
	$intrest_on_arrears=$regular_bill["regular_bill"]["intrest_on_arrears"];
	$arrear_principle=$regular_bill["regular_bill"]["arrear_principle"];
	$arrear_intrest=$regular_bill["regular_bill"]["arrear_intrest"];
	$due_for_payment=$regular_bill["regular_bill"]["due_for_payment"];
	$credit_stock=$regular_bill["regular_bill"]["credit_stock"];
	$income_head_array=$regular_bill["regular_bill"]["income_head_array"];
	$other_charges_array=$regular_bill["regular_bill"]["other_charge"];
	$noc_charges=$regular_bill["regular_bill"]["noc_charge"];
	$description=$regular_bill["regular_bill"]["description"];
	$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
	$user_name=$member_info["user_name"];
	$wing_name=$member_info["wing_name"];
	$flat_name=$member_info["flat_name"];
	$wing_flat=$wing_name.' - '.$flat_name;
		
	$result = $this->requestAction(array('controller' => 'Fns', 'action' => 'calculate_arrears_and_without_interest_edit'),array('pass'=>array($ledger_sub_account_id,$start_date)));
	
	 $result_interest = $this->requestAction(array('controller' => 'Fns', 'action' => 'calculate_arrears_and_interest_edit'),array('pass'=>array($ledger_sub_account_id,$start_date)));
//	pr($result_interest); //exit;
	$maint_arrear=$result["maint_arrear"];
			
	$non_maint_arrear=$result["non_maint_arrear"];
	//$bill_amount=$result["bill_amount"];
	
	$arrear_principle=$maint_arrear+$non_maint_arrear;
	//$maint_arrear=$maint_arrear+$bill_amount;
	$maint_arrear=$maint_arrear;
	$arrear_interest=$result["arrear_intrest"];
	$intrest_on_arrears=$result_interest["intrest_on_arrears"];
	if($intrest_on_arrears<0){$intrest_on_arrears=0; }
	$intrest_on_arrears=round($intrest_on_arrears);
	$intrest_on_arrears=$intrest_on_arrears;
	$due_for_payment+=$arrear_principle;
	$due_for_payment+=$arrear_interest;
	$due_for_payment+=$intrest_on_arrears;
	
	//if($intrest_on_arrears<0){$intrest_on_arrears=0; }
}; ?>
<div class="portlet box blue">
	<div class="portlet-title">
		<h4><i class="icon-edit"></i> Regeneration of Bill -<?php echo $bill_number; ?></h4>
	</div>
	<div class="portlet-body" style="overflow:auto;">
		<?php if(!empty($other_same)){ ?> 
						<div class="alert alert-error">
							<button class="close" data-dismiss="alert"></button>
								<strong>Error!</strong> <?php echo $other_same; ?>
						</div> 
				<?php } ?>
		<table style="width:100%; float:left;" >
			<tr>
				<td width="10%">Name: </td>
				<td><?php echo $member_info["user_name"]; ?></td>
				<td width="10%">Flat/Shop No.: </td>
				<td><?php echo $wing_flat; ?></td>
			</tr>
			<tr>
				<td width="10%">Bill Date:</td>
				<td><?php echo date("d-M-Y",strtotime($start_date)); ?></td>
				<td width="10%">Due Date:</td>
				<td><?php echo date("d-M-Y",$due_date); ?></td>
			</tr>
		</table>
		<form method="post" class="submit_actual">
		<div class="portlet-body span6">
			<table class="table table-bordered" id="table_bill">
				<thead>
					<tr>
						<th>Particulars of charges</th>
						<th>Amount (Rs.)</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=0; foreach($income_head_array as $income_head_id=>$income_head_amount){ $i++;
					$result_income_head = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($income_head_id)));	
					foreach($result_income_head as $data2){
						$income_head_name = $data2['ledger_account']['ledger_name'];
					} ?>
					<tr>
						<td><?php echo $income_head_name; ?></td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $income_head_amount; ?>" name="income_head[<?php echo $income_head_id; ?>]" id="income_head<?php echo $i; ?>" /></td>
					</tr>
					<?php } ?>
					
					<tr>
						<td>Non Occupancy charges</td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $noc_charges; ?>" name="non_occupancy_charges" /></td>
					</tr>
					
					<?php 
					if(sizeof($other_charges_array)>0){
						$j=0; foreach($other_charges_array as $other_charge_id=>$other_charge_amount){ $j++;
					$result_income_head = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($other_charge_id)));	
					foreach($result_income_head as $data2){
						$income_head_name = $data2['ledger_account']['ledger_name'];
					} ?>
					<tr>
						<td><?php echo $income_head_name; ?></td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $other_charge_amount; ?>" name="other_charges[<?php echo $other_charge_id; ?>]" id="other_charges<?php echo $j; ?>" /></td>
					</tr>
					<?php } } ?>
					
					<tr class="income_cha" >
						<td>
						<label> Select other charges</label>
							<select name="income_head_data[]"  class="m-wrap" data-placeholder="Select Income Head" tabindex="1">
								<option > </option>
								<?php
								
							if(!empty($income_arrr)){
							for($r=0; $r<sizeof($income_arrr); $r++){ 
							
								$income_id = (int)$income_arrr[$r];

								$ledgerac = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($income_id)));			
								foreach($ledgerac as $collection2){
									$ac_name = $collection2['ledger_account']['ledger_name'];
									$ac_id = (int)$collection2['ledger_account']['auto_id'];		
								}

							?>
							<option value="<?php echo $ac_id; ?>"><?php echo $ac_name; ?> </option>
							<?php }} ?>
							</select>
						</td>
						
						<td>
						<label> Amount</label>
						 <input type="text" maxlength="6" name="charge_other_amount[]" class="m-wrap call_calculation">
							<div style="margin-top: -4px; margin-right: -5px;font-size: 14px !important;" class="pull-right">
								<a role="button" class="btn mini  remove_row" href="#" ><i class="icon-trash"></i></a><br>
								<a href="#" class="btn mini add_row" role="button">	 
								<i class="icon-plus"></i></a>
							</div>
						</td>
					
					</tr>
					
					<tr>
						<?php $due_for_payment=0; ?>
						<td style="text-align: right;">Total</td>
						<td><input type="text" class="m-wrap textbx" value="<?php echo $total; ?>" name="total" readonly="" />
						<?php $due_for_payment+=$total; ?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Interest on arrears</td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $intrest_on_arrears; ?>" name="interest_on_arrears" />
						<?php $due_for_payment+=$intrest_on_arrears; ?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Arrears   (Maint.)</td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $arrear_principle; ?>" name="arrear_maintenance" readonly />
						<?php $due_for_payment+=$arrear_principle; ?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Arrears   (Int.)</td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $arrear_interest; ?>" name="arrear_intrest" readonly />
						<?php $due_for_payment+=$arrear_interest; ?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Credit/Adjustment</td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $credit_stock; ?>" name="credit_stock" />
						<?php $due_for_payment+=$credit_stock; ?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;"><b>Due For Payment</b></td>
						<td><input type="text" class="m-wrap textbx" value="<?php echo $due_for_payment; ?>" name="due_for_payment" readonly="" />
						</td>
					</tr>
					<tr>
						<td style="text-align: right;"><b>Description</b></td>
						<td><input type="text" class="span12 textbx" value="<?php echo $description; ?>" name="description"  />
						</td>
					</tr>
				</tbody>
			</table>
			<input type="hidden" value="<?php echo $maint_arrear; ?>" name="maint_arrear"/>
			<input type="hidden" value="<?php echo $non_maint_arrear; ?>" name="non_maint_arrear"/>
			<a href="#" role="button" class="btn green submit_button">UPDATE BILL</a>
		</div>
		
		<div class="confirm_div" style="display: none;">
			<div class="modal-backdrop fade in"></div>
			<div class="modal" id="poll_edit_content">
			<div class="modal-body">
				Are you sure to edit this bill?				   			   
			</div>
			<div class="modal-footer">
				<button type="button" class="btn" id="close_button">CLOSE</button>
				<button type="submit" name="edit_bill" class="btn red form_des ">UPDATE BILL</button>
			</div>
			</div>
		</div>
		
		</form>
		
		
	</div>
</div>
<input type="hidden" value="<?php echo sizeof($income_head_array); ?>" id="income_head_count"/>
<input type="hidden" value="<?php echo sizeof($other_charges_array); ?>" id="other_charges_count"/>
<input type="hidden" value="1" id="other_charges_count_extra"/>
<input type="hidden" value="0" id="confirm"/>






<script>
$(document).ready(function() {
	
$("form").validate({
	  submitHandler: function(form) {
		  $(".form_des").attr('disabled','disabled');
		  form.submit();
	  }
});
	
	$(".add_row").die().live("click",function(){
		var len=$(".add_row").length;
		len=len+1;
		
		$("#other_charges_count_extra").val(len);
		//var z= $(".income_cha:first").clone().insertAfter($('[class^=income_cha]:last'));
		var z= $(".income_cha:first").clone().insertAfter($('[class^=income_cha]:last')).find("input:text").val("");
		
		bill_calculation();
	})
	
	$(".remove_row").die().live("click",function(){
		
		var len=$(".remove_row").length;
		if(len!=1){
			len=len-1;
			
		$("#other_charges_count_extra").val(len);	
		  $(this).closest("tr").remove();
		}
		bill_calculation();
	})
	
	$('.call_calculation').live('keyup',function(){
		bill_calculation();
	});
	 
	$('.submit_button').die().live('click',function(){
		var allow="yes";
		//$('.confirm_div').show();
		  
		$('.income_cha').die().each(function(i, obj){
			var ot=$(this).closest('tr').find('select[name="income_head_data[]"]').val();
			var am=$(this).closest('tr').find('input[name="charge_other_amount[]"]').val();
			 if(ot!=""){
				if(am==""){
					alert('Please fill amount.'); 
					 allow="no";
				 }
			 }
			 
			  if(am!=""){
				if(ot==""){
					alert('Please select other charges.'); 
					 allow="no";
				 }
			 }
		}); 
		
		if(allow=="yes"){
			$('.confirm_div').show();
		}
		
	});
	$('#close_button').live('click',function(){
		$('.confirm_div').hide();
	});
});

function bill_calculation(){
	$(document).ready(function() {
		var total=0; var due_for_payment=0; 
		$('input[name="charge_other_amount[]"]').die().each(function(i, obj){
			var charge_extra=parseInt($(this).val());
			if($.isNumeric(charge_extra)==false){ charge_extra=0; }
			 total=total+charge_extra;
		});
		
		var income_head_count=$('#income_head_count').val();
		var other_charges_count=$('#other_charges_count').val();
		
		for(var iqq=1;iqq<=income_head_count;iqq++){
			var income_head_vlaue=parseInt($('#income_head'+iqq).val());
			if($.isNumeric(income_head_vlaue)==false){ income_head_vlaue=0; }
			total=total+income_head_vlaue;
		}
		
		
		var noc_charges=parseInt($('input[name=non_occupancy_charges]').val());
		if($.isNumeric(noc_charges)==false){ noc_charges=0; }
		total=total+noc_charges;
		
		for(var iq2=1;iq2<=other_charges_count;iq2++){
			var other_charges_vlaue=parseInt($('#other_charges'+iq2).val());
			if($.isNumeric(other_charges_vlaue)==false){ other_charges_vlaue=0; }
			total=total+other_charges_vlaue;
		}
		$('input[name=total]').val(total);
		
		
		var arrear_maintenance=parseInt($('input[name=arrear_maintenance]').val());
		if($.isNumeric(arrear_maintenance)==false){ arrear_maintenance=0; }
		due_for_payment=due_for_payment+total;
		due_for_payment=due_for_payment+arrear_maintenance;
		
		var arrear_intrest=parseInt($('input[name=arrear_intrest]').val());
		if($.isNumeric(arrear_intrest)==false){ arrear_intrest=0; }
		due_for_payment=due_for_payment+arrear_intrest;
		
		var interest_on_arrears=parseInt($('input[name=interest_on_arrears]').val());
		if($.isNumeric(interest_on_arrears)==false){ interest_on_arrears=0; }
		due_for_payment=due_for_payment+interest_on_arrears;
		
		var credit_stock=parseInt($('input[name=credit_stock]').val());
		if($.isNumeric(credit_stock)==false){ credit_stock=0; }
		due_for_payment=due_for_payment+credit_stock;
		
		due_for_payment=Math.round(due_for_payment);
		$('input[name=due_for_payment]').val(due_for_payment);
		
	});
}
</script>