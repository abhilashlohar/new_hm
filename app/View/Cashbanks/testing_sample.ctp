<?php 
foreach($cursor as $data){
       $receipt_number=$data['cash_bank']['receipt_number']; 	   
	   $transaction_id=$data['cash_bank']['transaction_id'];
		$transaction_date=$data['cash_bank']['transaction_date'];
		$deposited_bank_id=$data['cash_bank']['deposited_in'];
		$receipt_mode=$data['cash_bank']['receipt_mode'];
		if($receipt_mode=="Cheque" || $receipt_mode=="cheque"){
			 $cheque_number=$data['cash_bank']['cheque_number'];
			 $cheque_date=$data['cash_bank']['date'];
			 $drown_in_which_bank=$data['cash_bank']['drown_in_which_bank'];
			 $branch_of_bank=$data['cash_bank']['branch_of_bank'];
		}
		if($receipt_mode=="NEFT" || $receipt_mode=="PG" || $receipt_mode=="neft" || $receipt_mode=="pg"){
			 $cheque_number = $data['cash_bank']['cheque_number'];
			 $cheque_date = $data['cash_bank']['date'];
		}
		 $member_type = $data['cash_bank']['received_from'];
		if($member_type=='residential'){
			$ledger_sub_account_id=$data['cash_bank']['ledger_sub_account_id'];
		}
		 $amount = $data['cash_bank']['amount'];
		 $narration = $data['cash_bank']['narration'];
		 $current_date = date('Y-m-d');	
}
$transaction_date=date('d-m-Y',$transaction_date);

$user_data=$this->requestAction(array('controller'=>'Fns','action'=>'member_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id)));
$user_name=$user_data['user_name'];		
$wing=$user_data['wing_name'];
$flat=$user_data['flat_name'];
$user_email_id=$user_data['email'];

$wing_flat=$wing.'-'.$flat;
$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));





 $ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));

 $html_receipt='<table style="padding:24px;background-color:#34495e" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody><tr>
					<td>
						<table style="padding:38px 30px 30px 30px;background-color:#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="540">
							<tbody>
							<tr>
								<td height="10">
								<table width="100%" class="hmlogobox">
		<tr>
		<td width="50%" style="padding: 10px 0px 0px 10px;"><img src="'.$ip.$this->webroot.'/as/hm/hm-logo.png" style="max-height: 60px; " height="60px" /></td>
		<td width="50%" align="right" valign="middle"  style="padding: 7px 10px 0px 0px;">
		<a href="https://www.facebook.com/HousingMatters.co.in"><img src="'.$ip.$this->webroot.'/as/hm/SMLogoFB.png" style="max-height: 30px; height: 30px; width: 30px; max-width: 30px;" height="30px" width="30px" /></a>
		</td>
		</tr>
								</table>
								</td>
							</tr>
							<tr>
								<td height="10"></td>
							</tr>
							<tr>
								<td colspan="2" style="font-size:12px;line-height:1.4;font-family:Arial,Helvetica,sans-serif;color:#34495e;border:solid 1px #767575">
								<table style="font-size:12px" width="100%" cellspacing="0">
									<tbody><tr>
										<td style="padding:2px;background-color:rgb(0,141,210);color:#fff" align="center" width="100%"><b>'.strtoupper($society_name).'</b></td>
									</tr>
								</tbody></table>
								<table style="font-size:12px" width="100%" cellspacing="0">
									<tbody>
									<tr>
										<td style="padding:5px;border-bottom:solid 1px #767575;border-top:solid 1px #767575" width="100%" align="center">
										<span style="color:rgb(100,100,99)">Regn# &nbsp; '.$society_reg_no.'</span><br>
										<span style="color:rgb(100,100,99)">'.$society_address.'</span><br
										</td>
									</tr>
									</tbody>
								</table>
								<table style="font-size:12px;border-bottom:solid 1px #767575;" width="100%" cellspacing="0">
									<tbody><tr>
										<td style="padding:0px 0 2px 5px" colspan="2">Receipt No: '.$receipt_number.'-R</td>
										
										<td colspan="2" align="right" style="padding:0px 5px 0 0px"><b>Date:</b> '.$transaction_date.' </td>
										
									</tr>
									<tr>
										<td style="padding:0px 0 2px 5px" colspan="2"> Received with thanks from: <b>'.$user_name.' '.$wing_flat.'</b></td>
																			
									</tr>
									<tr>
										<td style="padding:0px 0 2px 5px"  colspan="4">Rupees '.$am_in_words.' Only </td>
										
									</tr>';
									
								if($receipt_mode=="cheque"){
								$receipt_type='Via '.$receipt_mode.'-'.$cheque_number.' drawn on '.$drown_in_which_bank.' dated '.$cheque_date;
								}
								else{
								$receipt_type='Via '.$receipt_mode.'-'.$cheque_number.' dated '.$cheque_date;
								}

									
									$html_receipt.='<tr>
										<td style="padding:0px 0 2px 5px"  colspan="4">'.$member_type.'</td>
										
									</tr>
									
									<tr>
										<td style="padding:0px 0 2px 5px" colspan="4">Payment of previous bill</td>
										
									</tr>
									
								</tbody></table>
								
								
								
								<table style="font-size:12px;" width="100%" cellspacing="0">
									<tbody><tr>
										<td width="50%" style="padding:5px" valign="top">
										<span style="font-size:16px;"> <b>Rs '.$amount.'</b></span><br>';
										$receipt_title_cheq="";
										if($receipt_mode=="cheque"){
											$receipt_title_cheq='Subject to realization of Cheque(s)';
										}
																			
										$html_receipt.='<span>'.@$receipt_title_cheq.' </span></td>
										<td align="center" width="50%" style="padding:5px" valign="top">
										For  <b>'.$society_name.'</b><br><br><br>
										<div><span style="border-top:solid 1px #424141">'.$sig_title.'</span></div>
										</td>
									</tr>
								</tbody></table>
													
								
								</td>
							</tr>
							
							<tr>
								<td colspan="2">
									<table style="background-color:#008dd2;font-size:11px;color:#fff;border:solid 1px #767575;border-top:none" width="100%" cellspacing="0">
									 <tbody>
									 
										<tr>
											<td align="center" colspan="7"><b>
											Your Society is empowered by HousingMatters - <b> <i>"Making Life Simpler"</i>
											</b></b></td>
										</tr>
										<tr>
											<td width="50" align="right" style="font-size: 10px;"><b>Email :</b></td>
											<td width="120" style="color:#fff!important;font-size: 10px;"> 
											<a href="mailto:support@housingmatters.in" style="color:#fff!important" target="_blank"><b>support@housingmatters.in</b></a>
											</td>
											<td align="center" style="font-size: 10px;"></td>
										   
											<td align="right" width="50"><b><a href="intent://send/+919869157561#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end"><img src="'.$ip.$this->webroot.'/as/hm/whatsup.png"  width="18px" /></a></b></td>
											<td width="104" style="color:#FFF !important;text-decoration: none;"><b>+91-9869157561</b></td>
											<td align="center" style="font-size: 10px;"></td>
											<td width="100" style="padding-right:10px;text-decoration:none"> <a href="http://www.housingmatters.in" style="color:#fff!important" target="_blank"><b>www.housingmatters.in</b></a></td>
										</tr>
										
										
									</tbody>
								</table>
								</td>
							</tr>
							<tr>
								<td align="center"><div class="hmlogobox" ><a href="mailto:Support@housingmatters.in">Do not miss important e-mails from HousingMatters,  add us to your address book</a></div></td>
							</tr>
						</tbody></table>
					</td>
				</tr>
			</tbody>
		</table>';





echo $html_receipt;























?>