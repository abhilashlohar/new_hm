<?php
foreach($result_cash_bank as $data){
	$transaction_date=$data['cash_bank']['transaction_date'];
	  @$invoice_reference=@$data['cash_bank']['invoice_reference'];
		$ledger_id=(int)$data['cash_bank']['user_id'];
		  @$narration=@$data['cash_bank']['narration'];
			$receipt_mode=$data['cash_bank']['receipt_mode'];
			  $receipt_instruction=$data['cash_bank']['receipt_instruction'];
				$account_head=(int)$data['cash_bank']['account_head'];
				  $amount=$data['cash_bank']['amount'];
					$tds_id_via_table=(int)$data['cash_bank']['tds_id'];
					  $account_type=(int)$data['cash_bank']['account_type'];
                        $transaction_id=(int)$data['cash_bank']['transaction_id'];
                          $receipt_id=$data['cash_bank']['receipt_id'];
	$transaction_date=date('d-m-Y',($transaction_date));					  
	
}


?>
<form method="post">
<input type="hidden" value="<?php echo $financial_year_string; ?>" id="f_y"/>
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Update Bank Payment</h4>
</div>
<div class="portlet-body form">
<div class="row-fluid">                       
<div class="span6">
<input type="hidden" name="element_id" value="<?php echo $transaction_id; ?>">
<label style="font-size:14px;">Transaction Date<span style="color:red;">*</span></label>
<input type="text" class="date-picker m-wrap span6" data-date-format="dd-mm-yyyy" value="<?php echo $transaction_date; ?>" style="background-color:white !important; margin-top:2.5px;" name="transaction_date">
<label id="date" class="validation"></label>
<br>

<label style="font-size:14px;">invoice_reference</label>
<input type="text" class="m-wrap span6" style="background-color:white !important; margin-top:2.5px;" Placeholder="Invoice Reference" name="invoice_reference" value="<?php echo $invoice_reference; ?>">
<br><br>

<label style="font-size:14px;">Ledger A/c<span style="color:red;">*</span></label>
		<select class="m-wrap span6 chosen" name="ledger_account">
		<option value="" style="display:none;">Select</option>
		<?php foreach($cursor11 as $collection){
		$auto_id = $collection['ledger_sub_account']['auto_id'];
		$name = $collection['ledger_sub_account']['name'];
		?>
		<option value="<?php echo $auto_id; ?>,1" <?php if($account_type==1 && $ledger_id==$auto_id) { ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
		<?php } ?>
		<?php foreach($cursor12 as $collection){
		$auto_id_a=(int)$collection['accounts_group']['auto_id'];
		$result33=$this->requestAction(array('controller'=>'hms','action' => 'expense_tracker_fetch2'),array('pass'=>array($auto_id_a)));
		foreach($result33 as $collection){
		$auto_id = (int)$collection['ledger_account']['auto_id'];
		$name = $collection['ledger_account']['ledger_name'];
		if($auto_id == 15)
		continue;
		?>
		<option value="<?php echo $auto_id; ?>,2" <?php if($account_type==2 && $ledger_id==$auto_id) { ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
		<?php }} ?>
		<?php foreach($cursor13 as $collection){
		$auto_id_b = (int)$collection['accounts_group']['auto_id'];
		$result33 = $this->requestAction(array('controller'=>'hms','action'=> 'expense_tracker_fetch2'),array('pass'=>array($auto_id_b)));
		foreach($result33 as $collection){
		$auto_id = (int)$collection['ledger_account']['auto_id'];
		$name = $collection['ledger_account']['ledger_name'];
		?>
		<option value="<?php echo $auto_id; ?>,2" <?php if($account_type==2 && $ledger_id==$auto_id) { ?> selected="selected" <?php } ?>><?php echo $name; ?></option>
		<?php }} ?>
		</select>
		<label id="ledger_account" class="validation"></label>
<br>					

<label style="font-size:14px;">Instrument/UTR<span style="color:red;">*</span></label>
	<input type="text" class="m-wrap span6" style="text-align:right; background-color:white !important; margin-top:2.5px;" Placeholder="Instrument/UTR" name="instrument" value="<?php echo $receipt_instruction; ?>">
	<label id="instrument" class="validation"></label>
<br>
	<label style="font-size:14px;">Mode of Payment<span style="color:red;">*</span></label>
	<select class="m-wrap span6 chosen" name="payment_mode">
	<option value="" style="display:none;">Select</option>
	<option value="Cheque" <?php if($receipt_mode=="Cheque" || $receipt_mode=="cheque"){ ?> selected="selected" <?php } ?>>Cheque</option>
	<option value="NEFT" <?php if($receipt_mode=="NEFT"){ ?> selected="selected" <?php } ?>>NEFT</option>
	<option value="PG" <?php if($receipt_mode=="PG"){ ?> selected="selected" <?php } ?>>PG</option>
	</select>
	<label id="mode" class="validation"></label>
	<br>	 
	



</div>
<div class="span6">
	<label style="font-size:14px;">Amount<span style="color:red;">*</span></label>	
	<input type="text" class="m-wrap span6" style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="10" Placeholder="Amount" name="amount" value="<?php echo $amount; ?>">
	<label id="amount" class="validation"></label>
<br>
			<label style="font-size:14px;">TDS%</label>	
			<select class="m-wrap span6 chosen" name="tds">
			<option value="" style="display:none;">Select</option>
			<?php for($k=0; $k<sizeof($tds_arr); $k++){
			$tds_sub_arr = $tds_arr[$k];	
			$tds_id = (int)$tds_sub_arr[1];
			$tds_tax = $tds_sub_arr[0];	
			?>
			<option value= "<?php echo $tds_id; ?>" charge="<?php echo $tds_tax; ?>" <?php if($tds_id==$tds_id_via_table){ ?> selected="selected" <?php } ?>><?php echo $tds_tax; ?></option>
			<?php } ?>                           
			</select>
			<br><br>
			
			
			<label style="font-size:14px;">Net Amount</label>
		    <input type="text"  class="m-wrap span6" 
			readonly="readonly" style="background-color:white !important; margin-top:2.5px;" Placeholder="Net Amount" name="net_amount">		
			<br><br>
		
				<label style="font-size:14px;">Bank Account<span style="color:red;">*</span></label>
				<select class="m-wrap span6 chosen" name="bank_account">
				<option value="" style="display:none;">Select</option>    
				<?php
				foreach($cursor2 as $db){
				$sub_account_id =(int)$db['ledger_sub_account']['auto_id'];
				$sub_account_name =$db['ledger_sub_account']['name'];
				$ac_number = $db['ledger_sub_account']['bank_account']; 
				$bank_acccc = substr($ac_number,-4);  
				?>
				<option value="<?php echo $sub_account_id; ?>" <?php if($account_head==$sub_account_id){ ?> selected="selected" <?php } ?>><?php echo $sub_account_name; ?>&nbsp;&nbsp;<?php echo $bank_acccc; ?></option>
				<?php } ?>
				</select>
				<label id="bank" class="validation"></label>
				<br>
				
				<label style="font-size:14px;">Narration</label>
				<input type="text" class="m-wrap span10" style="background-color:white !important; margin-top:2.5px;" Placeholder="Narration" name="narration" value="<?php echo @$narration; ?>">	
		
</div>                      
</div>                          
<div class="form-actions">
    <a href="<?php echo $webroot_path; ?>Cashbanks/bank_payment_view" class="btn green" rel="tab"><i class="icon-arrow-left"></i> Back</a>
	<button type="submit" class="btn blue" name="submit">Update</button>
	
</div>
</div>
</div>
</form>

<script>
$(document).ready(function(){
	$("form").on("submit",function(e){
	var allow="yes";
		var transaction_date=$('input[name="transaction_date"]').val();
			transaction_date=transaction_date.split('-').reverse().join('');
			var f_y=$("#f_y").val();
				var f_y2=f_y.split(',');
					var al=0;
			$.each(f_y2, function( index, value ) {
				var f_y3=value.split('/');
					var from=f_y3[0];
						from=from.split('-').reverse().join('');
							var to=f_y3[1];
				to=to.split('-').reverse().join('');
				if(transaction_date>=from && transaction_date<=to){
					$("#date").html('');
					al=al+1;
				}else{
					$("#date").html('Not in financial year');
					al=al+0;
				}
			});
			if(al==0){
				allow="no";
			}
		
	 var ledger_account=$('select[name="ledger_account"]').val();
	  if(ledger_account==""){
			$("#ledger_account").html('Required');	
				allow="no";
			}else{
				$("#ledger_account").html('');
			}
	 var instrument=$('input[name="instrument"]').val();
	  if(instrument==""){
			$("#instrument").html('Required');	
				allow="no";
			}else{
				$("#instrument").html('');
			}
	 
	 var payment_mode=$('select[name="payment_mode"]').val();
	  if(payment_mode==""){
			$("#mode").html('Required');	
				allow="no";
			}else{
				$("#mode").html('');
			}
	
	
	var amount=$('input[name="amount"]').val();
	  if(amount==""){
			$("#amount").html('Required');	
				allow="no";
			}else{
				$("#amount").html('');
			}
	
	 var bank_account=$('select[name="bank_account"]').val();
	  if(bank_account==""){
			$("#bank").html('Required');	
				allow="no";
			}else{
				$("#bank").html('');
			}

		if(allow=="no"){
		e.preventDefault();
		} 
	});
	
	
	$('input[name="transaction_date"]').die().live("keyup blur",function(){
		var transaction_date=$(this).val();
		
		transaction_date=transaction_date.split('-').reverse().join('');
			var f_y=$("#f_y").val();
				var f_y2=f_y.split(',');
					var al=0;
						$.each(f_y2, function( index, value ) {
							var f_y3=value.split('/');
								var from=f_y3[0];
									from=from.split('-').reverse().join('');
										var to=f_y3[1];
					to=to.split('-').reverse().join('');
				
				if(transaction_date>=from && transaction_date<=to){
					
					al=al+1;
				}else{
					
					al=al+0;
				}
			});
		if(al==0){
				$("#date").html('not in financial year');
			}
			else{ $("#date").html('');  }
	});
	
	
$('select[name="ledger_account"]').die().live("change",function(){
		var ledger_account=$(this).val();
		if(ledger_account==""){
			$("#ledger_account").html('Required');
		}else{
			$("#ledger_account").html('');
		}
	});	

$('input[name="instrument"]').die().live("keyup blur",function(){
		var instrument=$(this).val();	
		if(instrument==""){
			$("#instrument").html('Required');
		}else{
			$("#instrument").html('');
		}
	
});
	
	$('select[name="payment_mode"]').die().live("change",function(){
		var payment_mode=$(this).val();
		if(payment_mode==""){
			$("#mode").html('Required');
		}else{
			$("#mode").html('');
		}
	});	
$('input[name="amount"]').die().live("keyup blur",function(){
		var amount=$(this).val();	
		if(amount==""){
			$("#amount").html('Required');
		}else{
			$("#amount").html('');
		}
		if($.isNumeric(amount))
		{
		}else{
			$('input[name="amount"]').val('');
		}
	
});	
$('select[name="bank_account"]').die().live("change",function(){
		var bank_account=$(this).val();
		if(bank_account==""){
			$("#bank").html('Required');
		}else{
			$("#bank").html('');
		}
	});		
});
</script>

<style>		
.validation{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>

