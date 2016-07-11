<center>
<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
</center>

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////// ?>

<?php  
$default_date_from = date('d-m-Y',$from); 
$default_date_to = date('d-m-Y',$to);
?> 
 <center>
            <div style="width:50%;" class="hide_at_print">
            <form method="post" id="contact-form">
             <table>
            <tbody><tr>
           
            <td><input type="text" id="date1" class="date-picker m-wrap medium" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;" value="<?php echo $default_date_from; ?>"></td>
           
            <td><input type="text" id="date2" class="date-picker m-wrap medium" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;" value="<?php echo $default_date_to; ?>"></td>
            <td valign="top"><button type="button" name="sub" class="btn yellow" id="go">Go</button></td>
            </tr>
            </tbody></table>
            </form>
            </div>
</center>

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////// ?>

<center>
<div id="result" style="width:100%;">
</div>
</center>  

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////// ?>

<script>
$(document).ready(function() {
	$("#go").bind('click',function(){
		var date1=document.getElementById('date1').value;
		var date2=document.getElementById('date2').value;
		
		if((date1=='')) { alert('Please Input Date-from'); }
		if((date2=='')) { alert('Please Input Date-to'); }
		else
		{
		$("#result").html('<div align="center" style="padding:10px;"><img src="as/loding.gif" />Loading....</div>').load("expense_tracker_pie_chart_ajax?date1=" +date1+ "&date2=" +date2+ "");
		}
		
	});
	
});
</script>	




