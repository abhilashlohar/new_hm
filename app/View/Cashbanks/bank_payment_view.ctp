<div class="hide_at_print">	
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
</div>
		   
   
<center>
<div class="hide_at_print">
<?php
//if($s_role_id == 3)
//{
?>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_payment" class="btn" rel='tab'>Create</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_payment_view" class="btn yellow" rel='tab'>View</a>
<?php //} ?>
</div>

  
<?php
$c_date = date('d-m-Y');
$b_date = date('1-m-Y');
?>



  <center>
            <div class="hide_at_print">
            <form method="post" id="contact-form">
          
            <table>
            <tbody><tr>
           
            <td><input type="text" id="date1" class="date-picker m-wrap small" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;" value="<?php echo $b_date; ?>"></td>
           
            <td><input type="text" id="date2" class="date-picker m-wrap small" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;" value="<?php echo $c_date; ?>"></td>
            <td valign="top"><button type="button" name="sub" class="btn yellow" id="go">Go</button></td>
            </tr>
            </tbody></table>
          
            </form>
            </div>
</center>
<?php
//$this->requestAction(array('controller' => 'hms', 'action' => 'resident_drop_down'));
?>


<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<center>
<div id="result" style="width:100%;">

</div>
</center>   

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>

<script>
$(document).ready(function() {
	$("#go").bind('click',function(){
		var date1=document.getElementById('date1').value;
		var date2=document.getElementById('date2').value;
		
		if((date1=='')) { alert('Please Input Date-from'); }
		if((date2=='')) { alert('Please Input Date-to'); }
		else
		{
		$("#result").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path;?>as/loding.gif" />Loading....</div>').load("bank_payment_show_ajax?date1=" +date1+ "&date2=" +date2+ "");
		}
		
	});
	
});
</script>	
   
   
<script>
$(document).ready(function() {
<?php	
$status5=(int)$this->Session->read('bank_ppp');
if($status5==1)
{
?>
$.gritter.add({
title: ' Bank Payment',
text: '<p>Thank you.</p><p>Bank Payment voucher generated successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(1101)));
} ?>
});
</script>  
  
    
<script>
$(document).ready(function() {
<?php	
$status5=(int)$this->Session->read('bank_ppp2');
if($status5==1)
{
?>
$.gritter.add({
title: ' Bank Payment',
text: '<p>Thank you.</p><p>The excel file is imported successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(1102)));
} ?>
});
</script>  
     
   
 <script>
$(document).ready(function() {
	<?php	
	$bank_receipt=(int)$this->Session->read('bank_payment');
	if($bank_receipt==1)
	{
	?>
	$.gritter.add({
	title: 'Success',
	text: '<p>Vouchers generated sucessfully.</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array('bank_payment')));
	} ?>
	});
</script>  
 
   
 <script>
$(document).ready(function() {
	<?php	
	$bank_payment_update=(int)$this->Session->read('bank_payment_update');
	if($bank_payment_update==1)
	{
	?>
	$.gritter.add({
	title: 'Success',
	text: '<p>Vouchers Updated sucessfully.</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller'=>'hms','action'=>'griter_notification'),array('pass' => array('bank_payment_update')));
	} ?>
	});
</script>    
   
     	