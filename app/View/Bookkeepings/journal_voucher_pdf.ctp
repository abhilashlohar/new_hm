<?php
App::import('Vendor','xtcpdf');  
$tcpdf = new XTCPDF(); 
$textfont = 'times'; // looks better, finer, and more condensed than 'dejavusans' 

$tcpdf->SetAuthor("KBS Homes & Properties at http://kbs-properties.com"); 
$tcpdf->SetAutoPageBreak( true ); 
//$tcpdf->setHeaderFont(array($textfont,'',40)); 
$tcpdf->xheadercolor = array(255,255,255); 
$tcpdf->xheadertext = ''; 
$tcpdf->xfootertext = 'HousingMatters'; 

// add a page (required with recent versions of tcpdf) 
$tcpdf->AddPage(); 

// Now you position and print your page content 
// example:  
$tcpdf->SetTextColor(0, 0, 0); 
$tcpdf->SetFont($textfont,12); 
$tcpdf->SetLineWidth(0.1);
$pdf_view='<table border="1" style="width:100%;"><tr><td>';
$pdf_view.='<div class="bg_co" align="center" style="background-color: rgb(0, 141, 210);padding: 5px;font-size: 16px;font-weight: bold;color: #fff;">'.$society_name.'</div>
<div align="center" style="padding: 2px;">
<span style="font-size:14px;"> <b> Journal Voucher </b> </span>
</div>


<div align="" style="padding: 10px;">
<span style="font-size:14px; float:left;"> <b> Journal Voucher # : </b> '.$voc_id.'</span>
<span style="font-size:14px; float:right;"> <b> Date :</b>';
 $transaction_date=$result_journal[0]['journal']['transaction_date'];
$transaction_date=date('d-m-Y',$transaction_date);
$pdf_view.=''.$transaction_date.'</span>
</div>
<br/>
<div align="" style="padding: 5px;">
<table cellpadding="5" width="100%;" border="1">
<tr>
<td><span style="font-size:14px;"><b> Ledger A/c  </b></span></td>
<td align="right"> <span style="font-size:14px;"><b> Debit  </b></span></td>
<td align="right"> <span style="font-size:14px;"><b> Credit  </b></span></td>
</tr>';

$total_credit=0; $total_debit=0; $credit=""; $debit="";
foreach($result_journal as $data){
$voucher_id=(int)$data['journal']['voucher_id'];	
$ledger_account_id=(int)$data['journal']['ledger_account_id'];
$ledger_sub_account_id=(int)$data['journal']['ledger_sub_account_id'];
$transaction_date=$data['journal']['transaction_date'];
$credit=$data['journal']['credit'];
$debit=$data['journal']['debit'];
$user_id=$data['journal']['user_id'];
$remark=$data['journal']['remark'];
$transaction_date=date('d-m-Y',$transaction_date);

$result_ledger_account=$this->requestAction(array('controller' => 'Hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($ledger_account_id)));
$ledger_ac_name=$result_ledger_account[0]['ledger_account']['ledger_name'];

if($ledger_account_id == 34){
			$result_member = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
			$ledger_ac_name=$result_member['user_name'];
			$wing_name=$result_member['wing_name'];
			$flat_name=$result_member['flat_name'];
			$wing_flat=$wing_name.'-'.$flat_name;
		
 }else{
	$user_name =null;
	$wing_flat=null;

 }
	if($ledger_account_id == 33 || $ledger_account_id == 33 || $ledger_account_id == 35 || $ledger_account_id == 15 || $ledger_account_id == 112){
		$result_ledger_sub_account=$this->requestAction(array('controller' => 'Hms', 'action' => 'subledger_fetch_by_auto_id'),array('pass'=>array($ledger_sub_account_id)));
		$led_sub_name=$result_ledger_sub_account[0]['ledger_sub_account']['name'];
		@$bank_account=@$result_ledger_sub_account[0]['ledger_sub_account']['bank_account'];
		$ledger_ac_name =$led_sub_name.'  '.$bank_account;
	}	
	






$result_user=$this->requestAction(array('controller'=>'Fns','action'=>'user_info_via_user_id'),array('pass'=>array($user_id)));
$prepared_by=$result_user[0]['user']['user_name'];

$result_user_flat=$this->requestAction(array('controller'=>'Fns','action'=>'user_flat_info_via_user_id'),array('pass'=>array((int)$user_id)));
foreach($result_user_flat as $data)
{
@$wing=@$data['user_flat']['wing'];
@$flat=@$data['user_flat']['flat'];
}
if(!empty($wing) && !empty($flat))
{
@$wing_flat_prepared=$this->requestAction(array('controller' =>'Fns', 'action' => 'wing_flat_via_wing_id_and_flat_id'), array('pass' => array(@$wing,@$flat))); 
}
$total_debit+=@$debit;
$total_credit+=@$credit;
$pdf_view.='<tr>
<td>'.@$ledger_ac_name.' '.@$wing_flat.'</td>
<td align="right">'.@$debit.'</td>
<td align="right">'.@$credit.'</td>
</tr>'; 
}

$pdf_view.='<tr>
<td align="right" colspan="1" ><span style="float:left;"><b>Narration:</b>'.$remark.'</span><span><b> Total </b> </span> </td>
<td align="right" >'.$total_debit.'</td>
<td align="right">'.$total_credit.'</td>
</tr>
</table>
</div>
<div align="" style="padding: 10px;">
<center><span style="font-size:14px;float:left;"><b> Prepared By : </b>  '. $prepared_by.' '. @$wing_flat_prepared.'</span>
 <span style="font-size:14px;"><b> Approved By : </b>   </span > </center>
</div>'; 
$pdf_view.='<br><br></td></tr></table>'; 
$tcpdf->writeHTML($pdf_view);

echo $tcpdf->Output('Journal.pdf', 'D');
?>
