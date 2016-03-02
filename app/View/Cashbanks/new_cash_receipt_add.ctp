
<?php $tranction_date = date('d-m-Y'); ?>
<tr class="add_row">

	<td> 
	<input type="text" class="date-picker m-wrap small" 
	data-date-format="dd-mm-yyyy" style="background-color:white !important; margin-top:3px;" 
	value="<?php echo $tranction_date; ?>" id="date1">
	</td>
					  
					  
	<td>
	<select class="small m-wrap chosen">
	<option value="" style="display:none;">Select Bank</option>    
	<?php
	foreach ($result_ledger_sub_account as $db) 
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
	<select class="medium m-wrap chosen show_div" >
	<option value="" style="display:none;">receipt mode</option>    
	<option value="Cheque">Cheque</option>
	<option value="NEFT">NEFT</option>
	<option value="PG">PG</option>
	</select><br>
<div class="hide receipt_mode_first">
<input type="text" placeholder="Cheque No." class="m-wrap span6" 
id="chhno1" style="background-color:#FFF !important; margin-top:3px;">

<input type="text" class="date-picker m-wrap span6" data-date-format="dd-mm-yyyy" 
placeholder="Date" id="dtt1" style="background-color:#FFF !important; margin-top:3px;"/><br>
	
<div class="hide receipt_mode" >
<input type="text" class="m-wrap span6" placeholder="Drawn on which bank?" id="bnkkk1" 
style="background-color:#FFF !important; margin-top:3px;" data-provide="typeahead" 
data-source="[<?php if(!empty($kendo_implode)) { echo $kendo_implode; } ?>]">

<input type="text" class="m-wrap span6" placeholder="Branch of Bank" 
id="branchh1" style="background-color:#FFF !important; margin-top:3px;" data-provide="typeahead" 
data-source="[<?php if(!empty($kendo_implode2)) { echo $kendo_implode2; } ?>]">
</div>
</td>

<td>
<select class="medium m-wrap chosen receive_from" valign="top" >
<option value="" style="display:none;">received from</option>    
<option value="1">Residential</option>
<option value="2">Non-Residential</option>
</select>
	<div class='resident_drop_down'>
	<?php
	$this->requestAction(array('controller' => 'Hms', 'action' => 'resident_drop_down')); ?>
	</div>
		
		<div class='receipt_type'>
		<select class="m-wrap chosen medium" id="ttppp1" onchange="amtshw2(this.value,1)">
		<option value="" style="display:none;">Select Receipt Type</option>
		<option value="1">Maintanace Receipt</option>
		<option value="2">Other Receipt</option>
		</select><br>
		</div>
</td>
<td>
<input type="text" class="m-wrap small" 
style="text-align:right; background-color:#FFF !important; margin-top:3px;"
maxlength="10" onkeyup="numeric_vali(this.value,1)" id="amttt1" placeholder="Amount" />
</td>
<td>
 <input type="text" class="m-wrap small" style="background-color:#FFF !important; margin-top:3px;" id="desc1" Placeholder="Narration" />
</td>
</tr>