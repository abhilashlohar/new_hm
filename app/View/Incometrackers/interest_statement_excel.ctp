<?php
$filename='Interest_statement_Report';

$filename = str_replace(' ', '_', $filename);
$filename = str_replace(' ', '-', $filename);

header ("Expires: 0");
header ("border: 1");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );


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
	
<br>
<table border="1">
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
<td style="text-align: right;"><b><?php $total= round($total_interest);  echo number_format((float)$total, 2, '.', ''); ?></b></td>
</tr>
</table>