<?php 
foreach($cursor1 as $collection){
	$receipt_no = (int)$collection['cash_bank']['receipt_id'];
	$d_date = $collection['cash_bank']['transaction_date'];
	$today = date("d-M-Y");
	$amount = $collection['cash_bank']['amount'];
	$society_id = (int)$collection['cash_bank']['society_id'];
	$narration = @$collection['cash_bank']['narration'];
	$user_id = (int)@$collection['cash_bank']['user_id'];
	$account_type = (int)@$collection['cash_bank']['account_type'];
	$sub_account = (int)$collection['cash_bank']['account_head'];
}
	$amount = str_replace( ',', '', $amount );
	$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));
foreach($cursor2 as $collection){
$society_name = $collection['society']['society_name'];
@$society_reg_no = @$collection['society']['society_reg_num'];
@$society_address = @$collection['society']['society_address'];
@$sig_title = @$collection['society']['sig_title'];
}
if($account_type == 1){
	$result_ledger_sub_account=$this->requestAction(array('controller'=>'Fns','action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array((int)$user_id)));
	foreach ($result_ledger_sub_account as $data){
	$user_name = $data['ledger_sub_account']['name'];
	$user_flat_id = (int)$data['ledger_sub_account']['user_flat_id'];	  
	}
	$result_user_flat=$this->requestAction(array('controller'=>'Fns','action'=>'user_flat_info_via_user_flat_id'),array('pass'=>array($user_flat_id)));
	foreach($result_user_flat as $data){
	@$wing=(int)@$data["user_flat"]["wing"];
	@$flat=(int)@$data['user_flat']['flat'];
	} 
	$wing_flat=$this->requestAction(array('controller'=>'Fns','action'=>'wing_flat_via_wing_id_and_flat_id'),array('pass'=>array(@$wing,@$flat)));
}
else
{
$ledger_resullt = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($user_id)));
foreach ($ledger_resullt as $collection) 
{
$user_name = $collection['ledger_account']['ledger_name'];	  
}
$wing_flat = "";
}
	
$acc_headd = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($sub_account)));
foreach ($acc_headd as $resull_acc) 
{
$account_head_name = $resull_acc['ledger_account']['ledger_name'];	  
}		

 
				
				
				//user info via flat_id//
				

                                    

$date=date("d-m-Y",($d_date));
?>
<div style="width:100%;" class="hide_at_print">
           <span style="margin-left:90%;"><button type="button" class=" printt btn green" onclick="window.print()"><i class="icon-print"></i> Print</button></span>
            </div>
<?php 
echo '<div style="width:70%;margin:auto;border:solid 1px;background-color:#FFF;" class="bill_on_screen">';
echo '<div align="center" style="background-color: rgb(0, 141, 210);padding: 5px;font-size: 16px;font-weight: bold;color: #fff;">'.strtoupper($society_name).'</div>
<div align="center" style="border-bottom:solid 1px;">
<span style="font-size:12px;color:rgb(100, 100, 99);">Regn# '.$society_reg_no.'</span><br/>
<span style="font-size:12px;color:rgb(100, 100, 99);">'.$society_address.'</span><br>
<span style="font-size:15px;color:rgb(100, 100, 99); font-weight:400;">Petty Cash Receipt</span>
</div>
<table width="100%" >
<tr>
<td>
		<table width="100%" cellpadding="5px">
			<tr>
				<td>Receipt No: '.$receipt_no.'</td>
				<td align="right">Date: '.$date.'</td>
			</tr>
			<tr>
				<td>
				Received with thanks from:  <b>'.$user_name.'  '.$wing_flat.'</b>
				<br/>
				Rupees '.$am_in_words.' Only
				<br/>';
				//if($receipt_mode=="Cheque"){
					//echo 'Via '.$receipt_mode.'-'.$cheque_number.' drawn on '.$which_bank.' dated '.$cheque_date;
				//}
				//else{
					//echo 'Via '.$receipt_mode.'-'.$reference_number.' dated '.$cheque_date;
				//}
				
				
				echo '<br/>
				Narration: '.$narration.'
				</td>
				<td></td>
			</tr>
		</table>
		<div style="border-bottom:solid 1px;"></div>
		<table width="100%" cellpadding="5px">
			<tr>
				<td><span style="font-size:16px;"> <b>Rs '.$amount.'</b></span><br/>';
				//if($receipt_mode=="Cheque"){
					//echo 'Subject to realization of Cheque(s)';
				//}
				echo '</td>
			</tr>
		</table>
		<table width="100%" cellpadding="5px">
			<tr>
				<td width="50%"></td>
				<td align="right">
				<table width="100%">
					<tr>
						<td align="center">
						For '.$society_name.'
						</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
			<td width="50%"></td>
			<td align="right">
			<table width="100%">
					<tr>
						<td align="center"><br/>'.$sig_title.'</td>
					</tr>
				</table>
			</td>
			</tr>
		</table>
</td>
</tr>
</table>';
echo '</div>';
?>

<style>
@media screen {
    .bill_on_screen {
       width:70%;
    }
}

@media print {
    .bill_on_screen {
       width:96% !important;
    }
}
</style>