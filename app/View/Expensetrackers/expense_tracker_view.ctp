<div class="hide_at_print">
<center>
<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
</center>
</div>
<style>
#tbb th{
	font-size: 10px !important;background-color:#C8EFCE;padding:2px;border:solid 1px #55965F;white-space: nowrap !important; 
}
#tbb td{
	padding:2px;
	font-size: 12px;border:solid 1px #55965F;background-color:#FFF;white-space: nowrap !important; 
}
.text_bx{
	width: 50px;
	height: 15px !important;
	margin-bottom: 0px !important;
	font-size: 12px;
}
.text_rdoff{
	width: 50px;
	height: 15px !important;
	border: none !important;
	margin-bottom: 0px !important;
	font-size: 12px;
}
</style>

<?php  
$default_date_from = date('d-m-Y',$from); 
$default_date_to = date('d-m-Y',$to);
?> 
<center>
<table class="hide_at_print">
<tr>
<td>
<input type="text" id="date1" class="date-picker m-wrap medium" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;" value="<?php echo $default_date_from; ?>">
</td>
<td>
<input type="text" id="date2" class="date-picker m-wrap medium" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;" value="<?php echo $default_date_to; ?>">
</td>
<td valign="top"><button type="button" name="sub" class="btn blue" id="go"><i class="m-icon-swapright m-icon-white"></i></button></td>
</tr>
</table>
<div id="show_result"></div>
</center>

<div id="show_content"></div>

<script>
$(document).ready(function() {
	$("#go").bind('click',function(){
		var from=$("#date1").val();
		var to=$("#date2").val();
		if(from==""){
         $('#show_result').html('<div style=" color:red; padding:5px;">Please Fill Date</div>'); return false; 
		}
		if(to==""){
         $('#show_result').html('<div style=" color:red; padding:5px;">Please Fill Date</div>'); return false; 
		}
		$('#show_result').html('<div></div>');
		$("#show_content").html('<div align="center" style="padding:10px;"><img src="as/loding.gif" />Loading....</div>').load("expense_tracker_view_ajax?date1=" +from+"&date2="+to);
		
});
});
</script>

<script>
$(document).ready(function() {
<?php	
$voucher=$this->Session->read('exp_ttt');
$status5=(int)$voucher[0];
if($status5==1)
{
?>
$.gritter.add({
title: 'Expense Tracker',
text: '<p>voucher <?php echo $voucher[1]; ?> is generated successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(1701)));
} ?>
});
</script>     

<div class="edit_div" style="display: none;">
<div class="modal-backdrop fade in"></div>
<div class="modal"  id="confirm_msg">
	
</div>
</div>




