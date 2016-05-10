<div class="hide_at_print"> 
<?php echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array())); ?>
</div>
<div class="hide_at_print" align="center">            
	<a href="<?php echo $webroot_path; ?>Cashbanks/new_bank_receipt" class="btn" rel='tab'>Create</a>
	<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" class="btn yellow" rel='tab'>View</a>
	<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_deposit_slip" class="btn" rel='tab'>Deposit Slip</a>
	<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_approve" class="btn" rel='tab'>Approve Receipts</a>
</div>

<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<?php
$c_date = date('d-m-Y');
$b_date = date('1-m-Y');
?>

<div class="hide_at_print" align="center">
	<table>
	<tr>
	<td><input type="text" class="date-picker m-wrap small" id="date1" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;" value="<?php echo $b_date; ?>"></td>
	<td><input type="text" class="date-picker  m-wrap small" id="date2" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;" value="<?php echo $c_date; ?>"></td>
	<td valign="top"><button type="button" name="sub" class="btn yellow" id="go">Go</button></td>
	</tr>
	</table>
</div>

<div id="result" style="width:100%;">
</div>

<script>
$(document).ready(function() {
	$("#go").bind('click',function(){
		var from=document.getElementById('date1').value;
		var to=document.getElementById('date2').value;
	
		$("#result").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path;?>as/loding.gif" />Loading....</div>').load("<?php echo $this->webroot; ?>Cashbanks/bank_receipt_show_ajax/" +from+ "/" +to);
	});
	
});
</script>	

<script>
$(document).ready(function() {
<?php	
$status5=(int)$this->Session->read('bank_rrr');
if($status5==1)
{
?>
$.gritter.add({
title: ' Bank Receipt ',
text: '<p>Thank you.</p><p>The Bank Receipt is generated successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(11)));
} ?>
});
</script>	



<script>
$(document).ready(function() {
<?php	
$status5=(int)$this->Session->read('bank_rrr2');
if($status5==1)
{
?>
$.gritter.add({
title: ' Bank Receipt ',
text: '<p>Thank you.</p><p>The excel file is imported successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(111)));
} ?>
});
</script>


<script>
$(document).ready(function() {
<?php	
$status5=(int)$this->Session->read('bank_eddd');
if($status5==1)
{
?>
$.gritter.add({
title: ' Bank Receipt ',
text: '<p>Thank you.</p><p>The Bank Receipt Updated Successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(5511)));
} ?>
});
</script>


<script>
$(document).ready(function() {
<?php	
$status5=(int)$this->Session->read('new_bank_rrr');
if($status5==1)
{
?>
$.gritter.add({
title: ' Bank Receipt ',
text: '<p>Thank you.</p><p>The Bank Receipts Genarated Successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(5512)));
} ?>
});
</script>




