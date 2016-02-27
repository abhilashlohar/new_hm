<?php
foreach($cursor3 as $dataaa)
{
@$income_head_array = @$dataaa['society']['income_head'];	
}
?>

<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////// ?>            
<table  align="center" border="1" bordercolor="#FFFFFF" cellpadding="0">
<tr>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/select_income_heads" class="btn" rel='tab'>Selection of Income Heads</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_rate_card" class="btn" style="font-size:16px;" rel='tab'>Rate Card</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_noc" class="btn yellow" style="font-size:16px;" rel='tab'>Non Occupancy Charges</a>
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
</tr>
</table> 

    <div align="center">
    <a href="master_noc" class='btn red' role="button" rel='tab'>Non Occupancy Charges</a>
    <a href="master_noc_status" class='btn blue' role="button"  rel='tab'>Non Occupancy Status</a>
    </div>

        <div class="alert alert-error hide" id="mgg">
        <button class="close" data-dismiss="alert"></button>
        <center>
        <strong>Record Updated Successfully</strong>
        </center>
        </div>        
<!---------------------------------- Start Non Occupancy Charges Form ------------------------->
<form method="post">
			
			<div class="portlet box blue">
			<div class="portlet-title">
			<h4 class="block">Non Occupancy Charges</h4>
			</div>
			<div class="portlet-body form">
			<div id="error_msg" style="width:80%;"></div>
 
<div id="output">Every change you make is automatically saved.</div>

 
		<table class="table table-bordered" style="width:100%; background-color:white;">
        <tr style="background-color:#E8EAE8;">
        <th style="text-align:center;" rowspan="2">Flat Type</th>
        <th style="text-align:center;" colspan="4">Non Occupancy charges(Leased Only)</th>
		</tr>
		<tr style="background-color:#F4F7F5;">
		<th style="width:20%;">Type of Charge</th>
		<th style="width:10%;">Amount Applied</th>
		<th style="width:30%;">Income Head</th>
		<th style="width:30%;"></th>
		</tr>
			
				
			<?php foreach($flat_type_ids as $flat_type_id){
		$flat_type_name=$this->requestAction(array('controller' => 'Fns', 'action' => 'flat_type_name_via_flat_type_id'), array('pass' => array($flat_type_id)));?>
		    <tr>
			<th><?php echo $flat_type_name; ?></th>	
			<th>
<select name="" class="m-wrap medium go" onchange="save_noc_charges(<?php echo $flat_type_id; ?>)" id="type<?php echo $flat_type_id; ?>">
<option value="" style="display:none;">Select</option>
<option value="1">Lump Sum</option>
<option value="2"><?php if($area_typppp == 0) { ?>Per Square Feet<?php } else { ?>Per Square Meter<?php } ?></option>
<option value="3">Flat Type</option>
<option value="4">10% of Maintanance Charge</option>
<option value="5">Not Applicable</option>
</select>
</th>	
<th>
<input type="text" name="" class="m-wrap small" value="" style="text-align:right; background-color:white !important;" maxlength="10" onblur="save_noc_charges(<?php echo $flat_type_id; ?>)" id="amt<?php echo $flat_type_id; ?>">
</th>
<th>
<select data-placeholder="Select Account Heads" class="m-wrap large chosen" multiple="multiple" tabindex="6" onchange="save_noc_charges(<?php echo $flat_type_id; ?>)" id="head<?php echo $flat_type_id; ?>">	
<option value="" style="display:none;">Select</option>
<?php
foreach($income_head_array as $income_head)
{
$ledgerac = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($income_head)));			
foreach($ledgerac as $collection2)
{
$ac_name = $collection2['ledger_account']['ledger_name'];
$income_id = (int)$collection2['ledger_account']['auto_id'];		
}
?>	
<option value="<?php echo $income_id; ?>"><?php echo $ac_name; ?></option>
<?php } ?>
</select>
</th>
<th></th>
</tr>
<?php } ?>
</table>
</div>
</div>
</form>				
				
		

<!------------------------------- End Non Occupancy Charges Form ------------------------------->
<script>
function save_noc_charges(vvv)
{
var type = $("#type" + vvv).val();
var amt = $("#amt" + vvv).val();
var head = $("#head"+vvv).val();

$("#output").html("Saving changes...");
if(isNaN(rate)===true){rate=0;}
$.ajax({
url: "<?php echo $webroot_path; ?>Incometrackers/auto_save_noc_rate/"+flat_type_id+"/"+income_head_id+"/"+rate_type+"/"+rate,
}).done(function(response){
$("#output").html("Every change you make is automatically saved.");
});

	
	
	
}
</script>


















          
            