<div class="hide_at_print">	
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

<center>
<a href="<?php echo $webroot_path; ?>Cashbanks/fix_deposit_add" class="btn" rel='tab'>Add</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/fix_deposit_view" class="btn yellow" rel='tab'>Active Deposits</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/matured_deposit_view" class="btn" rel='tab'>Matured Deposits</a>
<!--<a href="<?php //echo $webroot_path; ?>Cashbanks/fixed_deposit_bar_chart" class="btn" rel='tab'>Maturity Profile</a>-->
<!--<a href="<?php //echo $webroot_path; ?>Cashbanks/matured_deposit_add" class="btn" rel='tab'>Approve matured Deposit</a>-->
<a href="<?php echo $webroot_path; ?>Cashbanks/fixed_deposit_renewal_show" class="btn" rel='tab'>Renewal View</a>
</center>
</div>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<?php
$c_date = date('d-m-Y');
$b_date = date('1-m-Y');
?> 

<!--
<center>
            <div class="hide_at_print">
            <form method="post" id="contact-form">
            
            <table>
            <tbody><tr>
           
            <td><input type="text" id="date1" class="date-picker m-wrap medium" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;"  value="<?php echo $b_date; ?>"></td>
            
            <td><input type="text" id="date2" class="date-picker m-wrap medium" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;"  value="<?php echo $c_date; ?>"></td>
            <td valign="top"><button type="button" name="sub" class="btn yellow" id="go">Go</button></td>
            </tr>
            </tbody></table>
           
            </form>
            </div>
</center>


<center>
<div id="result" style="width:100%;">
</div>
</center>
-->

<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<script>
$(document).ready(function() {
$("#go").bind('click',function(){
var date1=document.getElementById('date1').value;
var date2=document.getElementById('date2').value;
$("#result").html('<div align="center" style="padding:10px;"><img src="as/loding.gif" />Loading....</div>').load("fixed_diposit_show_ajax?date1=" +date1+ "&date2=" +date2+ "");
});
});
</script>




<?php //////////////////////////////////////////////////////////////////////////////////////// ?>
</script> 
<style>
#bg_color th{
font-size: 10px !important;background-color:#C8EFCE;padding:2px;border:solid 1px #55965F;
}
#report_tb td{
padding:2px;
font-size: 12px;border:solid 1px #55965F;background-color:#FFF;
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

$nnn = 55;
foreach ($cursor1 as $collection) 
{
$nnn = 5555;
}

if($nnn == 5555)
{
?>

<div style="width:100%;" class="hide_at_print">
<span style="float:right;"><a href="<?php echo $webroot_path; ?>Cashbanks/fixed_deposit_bar_chart" class="btn blue mini" rel='tab'>Maturity Profile</a></span>
<span style="float:right; margin-right:1%;"><a href="fix_deposit_excel" class="btn blue mini"><i class="icon-download"></i></a></span>
<span style="float:right; margin-right:1%;"><a  class=" printt btn green mini" onclick="window.print()"><i class="icon-print"></i> </a></span>
</div>
<br /><br />
<div style="width:100%; overflow:auto;" class="hide_at_print">
<label class="m-wrap pull-right"><input type="text" id="search" class="m-wrap medium" style="background-color:#FFF !important;" placeholder="Search"></label>	
</div>
<table width="100%" style="background-color:white;" id="report_tb">
<thead>
<tr>
<th colspan='10' style='text-align:center;'><?php echo $society_name; ?> Fixed Deposit Register on <?php echo $c_date; ?></th>
</tr>
<tr id="bg_color">
<th>Deposit ID</th>
<th>Bank name</th>
<th>Bank Branch</th>
<th>Account Reference</th>
<th>Start Date</th>
<th>Maturity Date</th>
<th>Interest Rate</th>
<th>Principal Amount</th>
<th>Purpose</th>
<th class="hide_at_print">Action </th>
</tr>
</thead>
<tbody id="table">
<?php
$tt_amt = 0;
foreach($cursor1 as $data)
{
$transaction_id = (int)$data['fix_deposit']['transaction_id'];
$receipt_id = $data['fix_deposit']['receipt_id'];
$start_date = $data['fix_deposit']['start_date'];	
$bank_name = $data['fix_deposit']['bank_name'];	
$branch = $data['fix_deposit']['bank_branch'];	
$rate = $data['fix_deposit']['interest_rate'];	
$mat_date = $data['fix_deposit']['maturity_date'];	
$remarks = $data['fix_deposit']['purpose'];		
$reference = $data['fix_deposit']['account_reference'];		
$amt = $data['fix_deposit']['principal_amount'];
$file_name = $data['fix_deposit']['file_name'];
$edited_by = @$data['fix_deposit']['edited_by'];
$edited_on = @$data['fix_deposit']['edited_on'];
$creation_date = $data['fix_deposit']['current_date'];
$creater_id = (int)$data['fix_deposit']['prepaired_by'];
$creation_date = date('d-m-Y',strtotime($creation_date));
$tt_amt = $tt_amt + $amt;
$start_date	= date('d-m-Y',($start_date));	
$mat_date	= date('d-m-Y',($mat_date));
$result_gh = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($creater_id)));
foreach ($result_gh as $collection) 
{
$prepaired_by_name = $collection['user']['user_name'];
}	

	if(!empty($edited_by)){
			$creator_info=$this->requestAction(array('controller'=>'Fns','action'=> 'member_info_via_user_id'),array('pass'=>array((int)$edited_by)));
			$edited_by=$creator_info["user_name"];
			$wing_flats=$creator_info['wing_flat'];
			foreach($wing_flats as $wing_flat){

			}
			$edited_on=date('d-m-Y',strtotime($edited_on));
			$edit_info="<br/><b>Edited By: </b>".$edited_by." ".$wing_flat."<br/><b>Edited On: </b>".$edited_on."";	
		}else{
			$edit_info='';
		 }



?>

<tr>
<td><?php echo $receipt_id; ?></td>
<td style="width:15%;"><?php echo $bank_name; ?></td>
<td><?php echo $branch; ?></td>
<td><?php echo $reference; ?></td>
<td style="text-align:right;"><?php echo $start_date; ?></td>
<td style="text-align:right;"><?php echo $mat_date; ?></td>
<td style="text-align:center; width:11%;"><?php echo $rate; ?>%</td>
<td style="text-align:right; width:10%;"><?php $amt2= number_format($amt); echo $amt2; ?></td>
<td style="width:20%;"><?php echo $remarks; ?></td>
<td class="hide_at_print" style="width:12%;">
     <div class="btn-group">
	<a class="btn blue mini" href="#" data-toggle="dropdown">
	<i class="icon-chevron-down"></i>	
	</a>
	<ul class="dropdown-menu" style="min-width:100px !important;">
	<li><a href="fix_deposit_view?aa=<?php echo $transaction_id; ?>">Reading</a></li>
	<li><a href="renewal_fixed_deposit?nn=<?php echo $transaction_id; ?>">Renewal</a></li>
	<li>
<a href="active_deposit_edit?rccidd=<?php echo $transaction_id; ?>">Edit</a>
</li>
	</ul>
	</div>
     <a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $prepaired_by_name ?><br/><b>Generated On: </b><?php echo $creation_date ?><?php echo @$edit_info; ?>" role="button"><i class="icon-exclamation-sign"></i></a>
		
	<?php if(!empty($file_name)){ ?><a href="<?php echo $webroot_path ; ?>/fix_deposit/<?php echo $file_name; ?>" target="_blank" > <i class=" icon-download-alt"></i> </a> <?php } ?>

</td>
</tr>
<?php
}
?>
            <tr>
            <td colspan="7" style="text-align:right;"><b>Total</b></td>
            <td style="text-align:right;"><b><?php $tt_amt2=number_format($tt_amt); echo $tt_amt2; ?></b></td>
            <td></td>
            <td class="hide_at_print"></td>
            </tr>
            </tbody>
</table>	
	
<?php	
}
?>

<script>
jQuery('.popovers').popover({html: true});
		 var $rows = $('#table tr');
		 $('#search').keyup(function() {
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
			
			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				return !~text.indexOf(val);
			}).hide();
		});
 </script>

<script>
$(document).ready(function() {
	<?php	
	$fix_deposit_reading=(int)$this->Session->read('fix_deposit_reading');
	if($fix_deposit_reading==1)
	{
	?>
	$.gritter.add({
	title: 'Success',
	text: '<p>Fixed Deposit Moved Successfully</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller'=>'hms','action'=>'griter_notification'),array('pass' => array('fix_deposit_reading')));
	} ?>
	});
</script>   

<script>
$(document).ready(function() {
	<?php	
	$fix_deposit_renew=(int)$this->Session->read('fix_deposit_renew');
	if($fix_deposit_renew==1)
	{
	?>
	$.gritter.add({
	title: 'Success',
	text: '<p>Fixed Deposit Renewed Successfully</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller'=>'hms','action'=>'griter_notification'),array('pass' => array('fix_deposit_renew')));
	} ?>
	});
</script> 

<script>
$(document).ready(function() {
	<?php	
	$fix_deposit_edit=(int)$this->Session->read('fix_deposit_edit');
	if($fix_deposit_edit==1)
	{
	?>
	$.gritter.add({
	title: 'Success',
	text: '<p>Fixed Deposit Updated Successfully</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller'=>'hms','action'=>'griter_notification'),array('pass' => array('fix_deposit_edit')));
	} ?>
	});
</script> 




