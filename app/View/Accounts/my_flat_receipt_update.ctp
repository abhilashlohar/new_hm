<div class="hide_at_print">
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>				   
</div>
<?php
$default_date = date('d-m-Y');
?>


<form method="POST">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Update My Receipt</h4>
</div>
<div class="portlet-body form">
<div id="validdn"></div>                 
<table class="table table-hover" style="background-color:#CDE9FE;" id="main_table">
<tr>
<td style="border:solid 1px blue;">                    
                        
                        
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
		            <th>Select Resident</th>
		            <th>Receipt Type</th>
		            <th>Amount (Rupees)</th>
                    <th>Remarks</th>
				 </tr>
				
				 <tr style="background-color:#E8F3FF;">
					
<td>
<input type="text" class="m-wrap span12" placeholder="Branch of Bank" 
style="background-color:#FFF !important; margin-top:3px;" data-provide="typeahead" 
data-source="[<?php if(!empty($kendo_implode2)) { echo $kendo_implode2; } ?>]" id="branchh">
</td>
					
					<td>
					<select class="span12 m-wrap" disabled="disabled">
					<option value="" style="display:none;">received from</option>    
					<option value="1" selected="selected">Residential</option>
					<option value="2">Non-Residential</option>
					</select>
				    </td>
										 
					<td>
			<?php if(sizeof($members_for_billing)>1){ ?>
			<select name="ledger_sub_account[]" class="m-wrap" style="width:200px;">
			<option value="" style="display:none;">--member--</option>
			<?php foreach($members_for_billing as $ledger_sub_account_id){
			$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
			echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
			} ?>
			</select>  
			<?php } ?>		
			<?php if(sizeof($members_for_billing)==1){ ?>
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
				<select class="m-wrap span12" disabled="disabled">
				<option value="" style="display:none;">Select Receipt Type</option>
				<option value="1" selected="selected">Maintanace Receipt</option>
				<option value="2">Other Receipt</option>
				</select>
				</td>
								 
				 <td>
				 <input type="text" class="m-wrap span12"  
				 style="text-align:right; background-color:#FFF !important; margin-top:3px;"
				 maxlength="10" />
				 </td>
								 
				 <td>
				 <input type="text" class="m-wrap span12" style="background-color:#FFF !important; margin-top:3px;"/>
				 </td>
				 
				 </tr>
			</table>
						
						
</td>
</tr>						
</table>
<div class="form-actions">
<button type="submit" class="btn green" name="my_flat_receipt_update">Update My Receipt</button>
</div>
</div>
</div>
</form>


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
	var flat_id = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(3) select").val();
	var amount = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(5) input").val();
	var narration = $("#main_table tr:nth-child(1) td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(6) input").val();
		
ar.push([transaction_date,mode,cheque_no,cheque_date,drawn_bank,branch,date,utr,amount,narration,bank_id,flat_id]);
		
		
		
		var myJsonString = JSON.stringify(ar);
			$.ajax({
			url: "<?php echo $webroot_path; ?>Accounts/my_flat_receipt_update_json?q="+myJsonString,
			dataType:'json',
			}).done(function(response){
				 //alert(response);
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




