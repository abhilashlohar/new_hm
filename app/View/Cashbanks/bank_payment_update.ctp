<?php
foreach($result_cash_bank as $data){
	$transaction_date=$data['cash_bank'][''];
	  $transaction_date=$data['cash_bank'][''];
		$transaction_date=$data['cash_bank'][''];
		  $transaction_date=$data['cash_bank'][''];
			$transaction_date=$data['cash_bank'][''];
			  $transaction_date=$data['cash_bank'][''];
				$transaction_date=$data['cash_bank'][''];
				  $transaction_date=$data['cash_bank'][''];
					$transaction_date=$data['cash_bank'][''];
					  $transaction_date=$data['cash_bank'][''];


	
}
?>

<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Update Bank Payment</h4>
</div>
<div class="portlet-body form">
<div class="row-fluid">                       
<div class="span6">
<label style="font-size:14px;">Transaction Date<span style="color:red;">*</span></label>
<input type="text" class="date-picker m-wrap span6" data-date-format="dd-mm-yyyy" value="" style="background-color:white !important; margin-top:2.5px;" name="transaction_date">
<br>

<label style="font-size:14px;">invoice_reference</label>
<input type="text" class="m-wrap span6" style="background-color:white !important; margin-top:2.5px;" Placeholder="Invoice Reference" name="invoice_reference">
<br>

<label style="font-size:14px;">Ledger A/c<span style="color:red;">*</span></label>
		<select class="m-wrap span6 chosen" name="ledger_account[]">
		<option value="" style="display:none;">Select</option>
		<?php foreach($cursor11 as $collection){
		$auto_id = $collection['ledger_sub_account']['auto_id'];
		$name = $collection['ledger_sub_account']['name'];
		?>
		<option value="<?php echo $auto_id; ?>,1" ><?php echo $name; ?></option>
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
		<option value="<?php echo $auto_id; ?>,2" ><?php echo $name; ?></option>
		<?php }} ?>
		<?php foreach($cursor13 as $collection){
		$auto_id_b = (int)$collection['accounts_group']['auto_id'];
		$result33 = $this->requestAction(array('controller'=>'hms','action'=> 'expense_tracker_fetch2'),array('pass'=>array($auto_id_b)));
		foreach($result33 as $collection){
		$auto_id = (int)$collection['ledger_account']['auto_id'];
		$name = $collection['ledger_account']['ledger_name'];
		?>
		<option value="<?php echo $auto_id; ?>,2" ><?php echo $name; ?></option>
		<?php }} ?>
		</select>
<br>					

<label style="font-size:14px;">Instrument/UTR<span style="color:red;">*</span></label>
	<input type="text" class="m-wrap span6" style="text-align:right; background-color:white !important; margin-top:2.5px;" Placeholder="Instrument/UTR" name="instrument">
<br>
	<label style="font-size:14px;">Mode of Payment<span style="color:red;">*</span></label>
	<select class="m-wrap span6 chosen" name="payment_mode">
	<option value="" style="display:none;">Select</option>
	<option value="Cheque">Cheque</option>
	<option value="NEFT">NEFT</option>
	<option value="PG">PG</option>
	</select>
	<br>	 
	



</div>
<div class="span6">
	<label style="font-size:14px;">Amount<span style="color:red;">*</span></label>	
	<input type="text" class="m-wrap span6" style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="10" Placeholder="Amount" name="amount">
<br>
			<label style="font-size:14px;">TDS%</label>	
			<select class="m-wrap span6 chosen" name="tds">
			<option value="" style="display:none;">Select</option>
			<?php for($k=0; $k<sizeof($tds_arr); $k++){
			$tds_sub_arr = $tds_arr[$k];	
			$tds_id = (int)$tds_sub_arr[1];
			$tds_tax = $tds_sub_arr[0];	
			?>
			<option value= "<?php echo $tds_id; ?>" charge="<?php echo $tds_tax; ?>"><?php echo $tds_tax; ?></option>
			<?php } ?>                           
			</select>
			<br>
			
			
			<label style="font-size:14px;">Net Amount</label>
		    <input type="text"  class="m-wrap span6" 
			readonly="readonly" style="background-color:white !important; margin-top:2.5px;" Placeholder="Net Amount" name="net_amount">		
		<br>
		
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
				<option value="<?php echo $sub_account_id; ?>"><?php echo $sub_account_name; ?>&nbsp;&nbsp;<?php echo $bank_acccc; ?></option>
				<?php } ?>
				</select>
				<br>
				
				<label style="font-size:14px;">Narration</label>
				<input type="text" class="m-wrap span10" style="background-color:white !important; margin-top:2.5px;" Placeholder="Narration" name="narration">	
		
		
		
		
		
		
		
		
		
		
		
		
</div>                      
</div>                          
<div class="form-actions">
    <a href="" class="btn green"><i class="icon-arrow-left"></i> Back</a>
	<button type="submit" class="btn blue">Save</button>
	
</div>
</div>
</div>