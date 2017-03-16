<?php

if($bill_count>0){
 $result_interest = $this->requestAction(array('controller' => 'Fns', 'action' => 'calculate_arrears_and_interest_edit_test'),array('pass'=>array($led_sub_id,$period)));
	//pr($result_interest); 
	//pr($result_member_info);
}
	
?>

	<div align="center" style="font-weight: 600;">
		
			<span> <?php echo $result_member_info['user_name']; echo"&nbsp;";  
			echo $result_member_info['wing_name']; echo"-";
			echo $result_member_info['flat_name']; ?> 
			</span>
			<br/>
			Interest calculation for Bill of <?php echo $period_show; ?>
	</div> 
	<a href="interest_statement_excel/<?php echo $period_show;?>/<?php echo $led_sub_id; ?>" class="btn green mini pull-right tooltips hide_at_print" data-placement="left" target="_btn" data-original-title="Download in excel"><i class="fa fa-file-excel-o"></i></a>
	<a class="btn blue mini hide_at_print pull-right" style="margin-right: 2px;" onclick="window.print()"><i class="icon-print"></i></a>
	
<br>
<table class="table table-striped table-bordered dataTable">
<thead>
<tr>
<th>Due Since</th>
<th>Paid/Pending on Date</th>
<th>Days delayed</th>
<th>Principal Amount</th>
<th>Interest Rate</th>
<th>Interest(Rs.)</th>
</tr>
</thead>
<?php  

$total_interest=0;
if(sizeof(@$result_interest)>0){
foreach($result_interest as $data){
$amount= $data['amount'];
$due_date= $data['due_date'];
$current_transaction_date= $data['current_transaction_date'];
$day= $data['day'];
$interest=$data['interest'];
if($interest<0){
	$interest=0;
}
?>
<tr>
	
	<td> <?php echo date("d-m-Y",$due_date); ?> </td>
	<td> <?php echo date("d-m-Y",$current_transaction_date); ?> </td>
	<td> <?php echo $day; ?> </td>
	<td style="text-align: right;"> <?php echo $amount;  ?> </td>
	<td> <?php echo $tax; ?>% </td>
	<td style="text-align: right;"> 
		<?php if($interest>0){
				echo $interest= number_format((float)$interest, 2, '.', ''); 
			}else{
				echo $interest;
				}  
			$total_interest+=$interest; ?>  
	</td>
</tr>

<?php } } ?>
<tr> 
<td colspan="4"></td>
<td style="text-align: right;"><b>Total (Rounded Off)</b></td>
<td style="text-align: right;"><b><?php $total= round($total_interest);  echo  number_format((float)$total, 2, '.', ''); ?></b></td>
</tr>
</table>