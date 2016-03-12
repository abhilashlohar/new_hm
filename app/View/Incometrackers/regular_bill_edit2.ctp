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
<?php 
$tax=(float)$society_info[0]["society"]["tax"];
foreach($regular_bill_info as $regular_bill){
	$ledger_sub_account_id=(int)$regular_bill["regular_bill"]["ledger_sub_account_id"];
	$start_date=$regular_bill["regular_bill"]["start_date"];
	$due_date=$regular_bill["regular_bill"]["due_date"];
	$bill_number=$regular_bill["regular_bill"]["bill_number"];
	$income_head_array=$regular_bill["regular_bill"]["income_head_array"];
	$total=$regular_bill["regular_bill"]["total"];
	$intrest_on_arrears=$regular_bill["regular_bill"]["intrest_on_arrears"];
	$arrear_maintenance=$regular_bill["regular_bill"]["arrear_maintenance"];
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
		
	//Arrears//
	$result = $this->requestAction(array('controller' => 'Fns', 'action' => 'calculate_arrears'),array('pass'=>array($ledger_sub_account_id)));
	$arrear_maintenance=$result["arrear_principle"];
	$arrear_interest=$result["arrear_interest"];
	
	
	
	
	$last_bill_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'last_bill_info_for_bill_regeneration'),array('pass'=>array($ledger_sub_account_id)));
	
	if(sizeof($last_bill_info)==0){
		$last_bill_arrear_principal=$arrear_maintenance;
	}
	
	if(sizeof($last_bill_info)>0){
		$last_bill_start_date=$last_bill_info[0]["regular_bill"]["start_date"];
		$last_bill_due_date=$last_bill_info[0]["regular_bill"]["due_date"];
		$last_bill_arrear_principal=$last_bill_info[0]["regular_bill"]["arrear_maintenance"];
		$last_bill_arrear_intrest=$last_bill_info[0]["regular_bill"]["arrear_intrest"];
		$last_bill_intrest_on_arrears=$last_bill_info[0]["regular_bill"]["intrest_on_arrears"];
		$last_bill_total=$last_bill_info[0]["regular_bill"]["total"];
		
		$last_bill_arrear_intrest=$last_bill_arrear_intrest+$last_bill_intrest_on_arrears;
		$new_start_date=$last_bill_start_date;
		$new_due_date=$last_bill_due_date;
	}
	
	//Interest computation start//
	$interest_on_arrears=0;
	if(sizeof($last_bill_info)>0){
		$tax_factor=$tax/100;
		$last_receipts_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'last_receipts_info_for_bill_regeneration'),array('pass'=>array($ledger_sub_account_id,$last_bill_start_date,$start_date)));
		
		if(sizeof($last_receipts_info)>0 && sizeof($last_bill_info)>0){
			$i=0;
			foreach($last_receipts_info as $receipts_info){ $i++;
				$receipt_auto_id=$receipts_info["cash_bank"]["auto_id"];
				$receipt_date=$receipts_info["cash_bank"]["transaction_date"];
				$amount=$receipts_info["cash_bank"]["amount"];
				
				//receipt minus//
				if($last_bill_arrear_intrest!=0){
					$reminder=$last_bill_arrear_intrest-$amount;
					
					$days=abs(floor(($new_start_date-$receipt_date)/(60*60*24)));
					$interest_on_arrears+=$last_bill_arrear_principal*$tax_factor*($days/365);
					$new_start_date=$receipt_date;
					
					if($receipt_date>$new_due_date){
						$days=abs(floor(($new_due_date-$receipt_date)/(60*60*24)));
						$interest_on_arrears+=$last_bill_total*$tax_factor*($days/365);
						$new_due_date=$receipt_date;
					}
					
					if($reminder>=0){
						$last_bill_arrear_intrest=$reminder;
					}else{
						$last_bill_arrear_intrest=0;
						$last_bill_arrear_principal=$last_bill_arrear_principal-abs($reminder);
						if($last_bill_arrear_principal<0){
							$last_bill_total=$last_bill_total-abs($last_bill_arrear_principal);
							$last_bill_arrear_principal=0;
							if($last_bill_total<0){
								$last_bill_arrear_principal=$last_bill_total;
								$last_bill_total=0;
							}
						}
						
					}
					
				}elseif($last_bill_arrear_principal!=0){
					$reminder=$last_bill_arrear_principal-$amount;
					
					$days=abs(floor(($new_start_date-$receipt_date)/(60*60*24)));
					$interest_on_arrears+=$last_bill_arrear_principal*$tax_factor*($days/365);
					$new_start_date=$receipt_date;
					
					if($receipt_date>$new_due_date){
						$days=abs(floor(($new_due_date-$receipt_date)/(60*60*24)));
						$interest_on_arrears+=$last_bill_total*$tax_factor*($days/365);
						$new_due_date=$receipt_date;
					}
					
					if($reminder>=0){
						$last_bill_arrear_principal=$reminder;
					}else{
						$last_bill_arrear_principal=0;
						$last_bill_total=$last_bill_total-abs($reminder);
						if($last_bill_total<0){
							$last_bill_arrear_principal=$last_bill_total;
							$last_bill_total=0;
						}
						
					}
				}elseif($last_bill_total!=0){
					$reminder=$last_bill_total-$amount;
					
					if($receipt_date>$new_due_date){
						
						$days=abs(floor(($new_due_date-$receipt_date)/(60*60*24)));
						$interest_on_arrears+=$last_bill_total*$tax_factor*($days/365);
						$new_due_date=$receipt_date;
					}
					
					if($reminder>=0){
						$last_bill_total=$reminder;
					}else{
						$last_bill_total=0;
						$last_bill_arrear_principal=$reminder;
						
					}
					
				}
					
			}
			if($last_bill_arrear_principal>0){
				 $days=abs(floor(($new_start_date-$start_date)/(60*60*24)));
				 $interest_on_arrears+=$last_bill_arrear_principal*$tax_factor*($days/365);
			}
			
			if($last_bill_total>0){
				$days=abs(floor(($new_due_date-$start_date)/(60*60*24)));
				$interest_on_arrears+=$last_bill_total*$tax_factor*($days/365);
			}
			
			
		}elseif(sizeof($last_bill_info)>0){
			$days=abs(floor(($new_start_date-$start_date)/(60*60*24)));
			$interest_on_arrears+=$last_bill_arrear_principal*$tax_factor*($days/365);
			
			$days=abs(floor(($new_due_date-$start_date)/(60*60*24)));
			$interest_on_arrears+=$last_bill_total*$tax_factor*($days/365);
		}
	}
		$new_arrear_principal=$last_bill_total+$last_bill_arrear_principal;
		if($interest_on_arrears<0){ $interest_on_arrears=0; }
		$interest_on_arrears=round($interest_on_arrears);
}; ?>
<div class="portlet box blue">
	<div class="portlet-title">
		<h4><i class="icon-edit"></i> Regeneration of Bill -<?php echo $bill_number; ?></h4>
	</div>
	<div class="portlet-body" style="overflow:auto;">
		<table style="width:100%; float:left;" >
			<tr>
				<td width="10%">Name: </td>
				<td><?php echo $member_info["user_name"]; ?></td>
				<td width="10%">Flat/Shop No.: </td>
				<td><?php echo $wing_flat; ?></td>
			</tr>
			<tr>
				<td width="10%">Bill Date:</td>
				<td><?php echo date("d-M-Y",$start_date); ?></td>
				<td width="10%">Due Date:</td>
				<td><?php echo date("d-M-Y",$due_date); ?></td>
			</tr>
		</table>
		<form method="post">
		<div class="portlet-body span6">
			<table class="table table-bordered">
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
					
					<tr>
						<?php $due_for_payment=0; ?>
						<td style="text-align: right;">Total</td>
						<td><input type="text" class="m-wrap textbx" value="<?php echo $total; ?>" name="total" readonly="" />
						<?php $due_for_payment+=$total; ?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Interest on arrears</td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $interest_on_arrears; ?>" name="interest_on_arrears" />
						<?php $due_for_payment+=$interest_on_arrears; ?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Arrears   (Maint.)</td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $new_arrear_principal; ?>" name="arrear_maintenance" readonly />
						<?php $due_for_payment+=$new_arrear_principal; ?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Arrears   (Int.)</td>
						<td><input type="text" class="m-wrap textbx call_calculation" value="<?php echo $arrear_intrest; ?>" name="arrear_intrest" readonly />
						<?php $due_for_payment+=$arrear_intrest; ?>
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
						<td><input type="text" class="m-wrap textbx" value="<?php echo $description; ?>" name="description"  />
						</td>
					</tr>
				</tbody>
			</table>
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
				<button type="submit" name="edit_bill" class="btn red">UPDATE BILL</button>
			</div>
			</div>
		</div>
		
		</form>
		
		
	</div>
</div>
<input type="hidden" value="<?php echo sizeof($income_head_array); ?>" id="income_head_count"/>
<input type="hidden" value="<?php echo sizeof($other_charges_array); ?>" id="other_charges_count"/>
<input type="hidden" value="0" id="confirm"/>






<script>
$(document).ready(function() {
	$('.call_calculation').live('keyup',function(){
		bill_calculation();
	});
	 
	$('.submit_button').live('click',function(){
		$('.confirm_div').show();
	});
	$('#close_button').live('click',function(){
		$('.confirm_div').hide();
	});
});

function bill_calculation(){
	$(document).ready(function() {
		var total=0; var due_for_payment=0;
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