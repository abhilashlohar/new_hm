<div class="hide_at_print">
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>				   
</div>
<?php
$default_date = date('d-m-Y');
?>

<div style="overflow-x:auto;">
<form method="POST" class="">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Update My Receipt</h4>
</div>
<div class="portlet-body form">
<div id="validdn"></div>                 
<table class="table "  id="main_table">
<tr>
<td >                    
                        
                        
<table class="table table-bordered" id="sub_table">
					 <tr style="background-color:#E8EAE8;">
							<th style="width:13%;">Transaction Date</th>
							<th style="width:17%;">Deposited In</th>
							<th style="width:20%;">Receipt Mode</th>
							<th style="width:15%;">Cheque/UTR Ref</th>
							<th style="width:15%;">Date</th>
							<th style="width:20%;">Drawn on which bank</th>
					 </tr>
	  <tr style="background-color:#E8F3FF;">
					  
					  <td>
					  <input type="text" class="date-picker m-wrap span12" 
					  data-date-format="dd-mm-yyyy" style="background-color:white !important; margin-top:3px;" 
					  value="<?php echo $default_date; ?>">
					  </td>
							  
							  
						<td>
						<select class="span12 m-wrap chosen">
						<option value="" style="display:none;">Select Bank</option>    
						<?php
						foreach ($bank_detail as $db) 
						{
						$bank_id = (int)$db['ledger_sub_account']["auto_id"];
						$bank_ac = $db['ledger_sub_account']["name"];
						$bank_account_number = $db['ledger_sub_account']["bank_account"];
						?>
						<option value="<?php echo $bank_id; ?>"><?php echo $bank_ac; ?> &nbsp;(<?php echo $bank_account_number; ?>)</option>
						<?php } ?>
						</select>
						</td>
						
						
						<td>
						<select class="span12 m-wrap chosen" onchange="receipt_mode(this.value)">
						<option value="" style="display:none;">receipt mode</option>    
						<option value="Cheque">Cheque</option>
						<option value="NEFT">NEFT</option>
						<option value="PG">PG</option>
						</select>
						</td>
	
						  
		<td>
		<input type="text" placeholder="Cheque No." class="m-wrap span12" 
		id="chhno1" style="background-color:#FFF !important; margin-top:3px;">
		</td>
						
			
				
					<td>
					<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy" 
					placeholder="Date" style="background-color:#FFF !important; margin-top:3px;"/>
					</td>
							  
				
			

  			  
					<td>
					<input type="text" class="m-wrap span12" placeholder="Drawn on which bank?" 
					style="background-color:#FFF !important; margin-top:3px;" data-provide="typeahead" 
			   data-source="[<?php if(!empty($kendo_implode)) { echo $kendo_implode; } ?>]" id="bnkkk">
					</td>
				 </tr>
				 
				 <tr style="background-color:#E8EAE8;">
				    <th>Branch</th>
                    <th>Received From</th>
		            <th>Amount (Rupees)</th>
                    <th>Remarks</th>
					<th></th>
					<th></th>
				 </tr>
				
				 <tr style="background-color:#E8F3FF;">
					
<td>
<input type="text" class="m-wrap span12" placeholder="Branch of Bank" 
style="background-color:#FFF !important; margin-top:3px;" data-provide="typeahead" 
data-source="[<?php if(!empty($kendo_implode2)) { echo $kendo_implode2; } ?>]" id="branchh">
</td>
					
					
										 
					<td>
			<?php if(sizeof(@$members_for_billing)>1){ ?>
			<select name="ledger_sub_account[]" class="m-wrap" style="width:200px;">
			<option value="" style="display:none;">--member--</option>
			<?php foreach($members_for_billing as $ledger_sub_account_id){
			$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
			echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
			} ?>
			</select>  
			<?php } ?>		
			<?php if(sizeof(@$members_for_billing)==1){ ?>
			<select name="ledger_sub_account[]" class="m-wrap" style="width:200px;" disabled="disabled">
			<option value="" style="display:none;">--member--</option>
			<?php foreach($members_for_billing as $ledger_sub_account_id){
			$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
			echo '<option value='.$ledger_sub_account_id.' selected="selected">'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
			} ?>
			</select>  
			<?php } ?>	
			</td>
								 
				 <td>
				 <input type="text" class="m-wrap span12"  
				 style="text-align:right; background-color:#FFF !important; margin-top:3px;"
				 maxlength="10" />
				 </td>
								 
				 <td>
				 <input type="text" class="m-wrap span12" style="background-color:#FFF !important; margin-top:3px;"/>
				 </td>
				  <td></td>
				  <td></td>
				 </tr>
			</table>
						
						
</td>
</tr>						
</table>
<div class="form-actions">
<button type="submit" class="btn green" name="my_flat_receipt_update">Update Payment Detail </button>
</div>
</div>
</div>
</form>
</div>

<div class="portlet box green" >
							<div class="portlet-title">
								<h4>Receipts Pending for Approval</h4>
							</div>
							<div class="portlet-body" style="overflow:auto;">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Transaction Date</th>
											<th>Deposited In</th>
											<th>Receipt Mode</th>
											<th>Cheque/UTR Ref</th>
											<th>Date</th>
											<th>Drawn on which bank</th>
											<th>Branch</th>
											<th>Received From</th>
											<th>Amount</th>
											<th>Remarks</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($temp_cash_banks as $temp_cash_bank){ 
									$auto_id=$temp_cash_bank["temp_cash_bank"]["auto_id"];
									$receipt_date=$temp_cash_bank["temp_cash_bank"]["receipt_date"];
									$deposited_in=$temp_cash_bank["temp_cash_bank"]["deposited_bank_id"];
									$deposited_in_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($deposited_in)));
									$bank_name=$deposited_in_info[0]["ledger_sub_account"]["name"];
									$bank_account=$deposited_in_info[0]["ledger_sub_account"]["bank_account"];
									$receipt_mode=$temp_cash_bank["temp_cash_bank"]["receipt_mode"];
									$cheque_number=$temp_cash_bank["temp_cash_bank"]["cheque_number"];
									$cheque_date=$temp_cash_bank["temp_cash_bank"]["cheque_date"];
									$drawn_on_which_bank=@$temp_cash_bank["temp_cash_bank"]["drawn_on_which_bank"];
									$bank_branch=@$temp_cash_bank["temp_cash_bank"]["bank_branch"];
									$ledger_sub_account_id=@$temp_cash_bank["temp_cash_bank"]["ledger_sub_account_id"];
									$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
											$user_name=$member_info["user_name"];
											$wing_name=$member_info["wing_name"];
											$flat_name=$member_info["flat_name"];
									$amount=@$temp_cash_bank["temp_cash_bank"]["amount"];
									$narration=@$temp_cash_bank["temp_cash_bank"]["narration"];
									$status=@$temp_cash_bank["temp_cash_bank"]["status"];
									if(empty($status)){
										$status="Pending";
										$status_class="label-danger";
									}
									?>
										<tr>
											<td><?php echo date("d-m-Y",$receipt_date); ?></td>
											<td><?php echo $bank_name.' - '.$bank_account; ?></td>
											<td><?php echo $receipt_mode; ?></td>
											<td><?php echo $cheque_number; ?></td>
											<td><?php echo $cheque_date; ?></td>
											<td><?php echo $drawn_on_which_bank; ?></td>
											<td><?php echo $bank_branch; ?></td>
											<td><?php echo $user_name.' ('.$wing_name.'-'.$flat_name.')'; ?></td>
											<td><?php echo $amount; ?></td>
											<td><?php echo $narration; ?></td>
											<td><span class="label <?php echo $status_class; ?>"><?php echo $status; ?></span></td>
											<td><a href="<?php echo $webroot_path; ?>Accounts/delete_receipt_by_member/<?php echo $auto_id; ?>" class="btn mini red"><i class="icon-trash"></i></a></td>
										</tr>
									<?php } 
									if(sizeof($temp_cash_banks)==0){?>
										<tr>
											<td colspan="12" >No Record</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>




<script>
$(document).ready(function() { 
	$('form').submit( function(ev){
	ev.preventDefault();
		
		var ar = [];
		var unic = $("#unic_id").val();
		var flat = $("#flat_id").val();
		var transaction_date = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(1) input").val();
	  	var bank_id = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(2) select").val();
		var mode = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(3) select").val();
			
			if(mode == "Cheque")
			{
	var cheque_no = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(4) input").val();
	var cheque_date = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(5) input").val();
	var drawn_bank = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(6) input").val();
	var branch = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(1) input").val();
			}
			else
			{
			var utr = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(4) input").val();	
			var date = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(5) input").val();
			}
	var flat_id = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(2) select").val();
	var amount = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(3) input").val();
	var narration = encodeURIComponent($("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(4) input").val());
		
ar.push([transaction_date,mode,cheque_no,cheque_date,drawn_bank,branch,date,utr,amount,narration,bank_id,flat_id]);
		
		
		
		var myJsonString = JSON.stringify(ar);
			$.ajax({
			url: "<?php echo $webroot_path; ?>Accounts/my_flat_receipt_update_json?q="+myJsonString,
			dataType:'json',
			}).done(function(response){
				
				if(response.type == 'error'){
			
			 $("#validdn").html('<div class="alert alert-error" style="color:red;">'+response.text+'</div>');
			}
		    if(response.type == 'success'){
			  $("#shwd").show();
			 
			}
});			
});
});

</script>	

<script>
function receipt_mode(value)
{
	
		if(value == "Cheque")	
		{
		$("#bnkkk").removeAttr("readonly","readonly");
		$("#branchh").removeAttr("readonly","readonly");		
		}
		else
		{
		$("#bnkkk").attr("readonly","readonly");
		$("#branchh").attr("readonly","readonly");	
		$("#bnkkk").val("");
		$("#branchh").val("");
		}	
}

</script>

<div id="shwd" class="hide">
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body">
<p>Thank You for updating your payment details. After verification with bank records,a receipt will be issued to you</p>
</div>
<div class="modal-footer">
<a href="<?php echo $webroot_path; ?>Accounts/my_flat_receipt_update" class="btn red" rel='tab'>OK</a>
</div>
</div>
</div> 




