<div align="center" class="mobile-align">
	<a href="bank_reconciliation"  rel='tab' class="btn blue tooltips space-responsive"  ><i class="icon-folder-open"></i> Ledger Matching </a>
	<a href="reconciliation_match_report"  rel='tab' class="btn blue  tooltips space-responsive" ><i class="icon-folder-close"></i> Reconciliation Match Report</a>
	<a href="reconciliation_form"  rel='tab' class="btn red  tooltips space-responsive" ><i class="icon-folder-close"></i> Reconciliation Form</a>
</div>
<br>



<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>

<div style="border:solid 2px #4cae4c; width:90%; margin:auto;" class='portal'>
<div style="border-bottom:solid 2px #4cae4c; color:white; background-color: #5cb85c; padding:4px; font-size:20px;" ><i class="icon-envelope-alt"></i> Reconciliation Form </div>
<div style="padding:10px;background-color:#FFF;">
<form method="post" id="contact-form" name="myform" enctype="multipart/form-data" >
<div id="output"></div>


<div class="row-fluid">

<div class="span6 responsive">

<div class="control-group">
		<label style="font-size:14px; font-weight:bold;">Transection type</label>
		<div class="controls">
		<label class="radio">
		<div class="radio" id="uniform-undefined"><span class="checked"><input type="radio" name="transection_type" value="1" style="opacity: 0;" checked=""></span></div>
		Deposited
		</label>
		<label class="radio">
		<div class="radio" id="uniform-undefined"><span ><input type="radio" name="transection_type" value="2"  style="opacity: 0;"></span></div>
		Withdraw
		</label>  
		 
		 
		</div>
</div>
</div>
<div class="span6 responsive">
 <label style="font-size:14px; font-weight:bold;">Bank Name</label>
<div class="controls">
					<select class="medium m-wrap chosen" id="ledger_account" name="bank_name">
						<option value="" style="display:none;">Select Bank A/c</option>
						<?php
						 foreach($result_ledger_sub_account as $data){
							 
							  $ledger_sub_ac_id=$data['ledger_sub_account']['auto_id'];
							  $bank_name=$data['ledger_sub_account']['name'];
							 ?>
                          
								<option value="<?php echo $ledger_sub_ac_id; ?>"><?php echo $bank_name; ?> </option>
						  
						  <?php } ?>
						</select>
</div>
</div>

</div>

<!-------------------------->

<div class="row-fluid">

<div class="span6 responsive">


<label style="font-size:14px; font-weight:bold;">Passbook entry Date</label>
<div class="control-group" id="single_date">
  <div class="controls">
	<input type="text" name="passbook_date" data-date-format="dd-mm-yyyy" class="span6 m-wrap date-picker" placeholder="Date">
  </div>
  <label report="date" class="remove_report"></label>
</div>

</div>
<div class="span6 responsive">

<div class="control-group">
  <label class="control-label" style="font-size:14px; font-weight:bold;">Check number/Neft</label>
  <div class="controls">
	 <input type="text" name="check_number" data-date-format="dd-mm-yyyy" class="span6 m-wrap" placeholder="">
  </div>
</div>


</div>
</div>

<div class="row-fluid">
<div class="span3 responsive">

<div class="control-group">
		<label style="font-size:14px; font-weight:bold;">Amount type</label>
		<div class="controls">
		<label class="radio">
		<div class="radio" id="uniform-undefined"><span class="checked"><input type="radio" name="amount_type" value="1" style="opacity: 0;" checked=""></span></div>
		Credit
		</label>
		<label class="radio">
		<div class="radio" id="uniform-undefined"><span ><input type="radio" name="amount_type" value="2"  style="opacity: 0;"></span></div>
		Debit
		</label>  
		 
		 
		</div>
</div>

</div>

<div class="span3 responsive">



<div class="control-group" >
  <label class="control-label" style="font-size:14px; font-weight:bold;">Amount</label>
  <div class="controls">
	 <input type="text" name="amount" data-date-format="dd-mm-yyyy" class="span6 m-wrap" placeholder="">
	 <label report="location" class="remove_report"></label>
  </div>
</div>


</div>

<div class="span6 responsive">


<div class="control-group" >
  <label class="control-label" style="font-size:14px; font-weight:bold;">Description:</label>
  <div class="controls">
	 <textarea name="covering_note" rows="3" id="alloptions" class="span12 m-wrap" placeholder="Description" style="resize:none;"></textarea>
	 <label report="" class="remove_report"></label>
  </div>
</div>


</div>
</div>

	<div id="hide_sub">
		<button type="submit" name="sub" class="btn blue test" value="1"><i class=" icon-envelope-alt "></i> Submit</button>
		
	</div>
</form>

</div>
</div>

<div class="alert alert-block alert-success fade in" style="display:none;">
	<h4 class="alert-heading">Success!</h4>
</div>

