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
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_payment" class="btn" rel='tab'>Create</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_payment_view" class="btn yellow"  rel='tab'>View</a>
<?php //} ?>
</div>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<?php  
$b_date = date('d-m-Y',$from); 
$c_date = date('d-m-Y',$to);
?> 
     




            <div class="hide_at_print">
            <form method="post" id="contact-form">
            
            <table>
            <tbody><tr>
           
            <td><input type="text" id="date1" class="date-picker m-wrap small" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;"  value="<?php echo $b_date; ?>"></td>
            
            <td><input type="text" id="date2" class="date-picker m-wrap small" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;"  value="<?php echo $c_date; ?>"></td>
            <td valign="top"><button type="button" name="sub" class="btn yellow" id="go">Go</button></td>
            </tr>
            </tbody></table>
           
            </form>
            </div>

<center>
<div id="result" style="width:100%;">
</div>
</center>

<script>
$(document).ready(function() {
	$("#go").bind('click',function(){
		var date1=document.getElementById('date1').value;
		var date2=document.getElementById('date2').value;
		
		if((date1=='')) { alert('Please Input Date-from'); }
		if((date2=='')) { alert('Please Input Date-to'); }
		else
		{
		$("#result").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path;?>as/loding.gif" />Loading....</div>').load("petty_cash_payment_show_ajax?date1=" +date1+ "&date2=" +date2+ "");
		 $("#scrolllll").css("overflow","hidden");
		}
		
	});
	
});
</script>	

<script>
$(document).ready(function() {
	<?php
	$voucher=$this->Session->read('petty_cash_payment');
	$petty_cash_payment=(int)$voucher[0];
	if($petty_cash_payment==1)
	{
	?>
	$.gritter.add({
	title: 'Petty Cash Payment Voucher',
	text: '<p>Voucher <?php echo $voucher[1]; ?> is generated successfully</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller'=>'hms','action'=>'griter_notification'),array('pass' => array('petty_cash_payment')));
	} ?>
	});
</script>  

<script>
$(document).ready(function() {
	<?php	
	$petty_cash_payment_update=(int)$this->Session->read('petty_cash_payment_update');
	if($petty_cash_payment_update==1)
	{
	?>
	$.gritter.add({
	title: 'Success',
	text: '<p>Voucher Updated sucessfully.</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller'=>'hms','action'=>'griter_notification'),array('pass' => array('petty_cash_payment_update')));
	} ?>
	});
</script>  



