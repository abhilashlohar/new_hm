<?php 

	foreach($result_society as $collection){
					$society_name = $collection['society']['society_name'];
					$society_reg_no = @$collection['society']['society_reg_num'];
					$society_address = @$collection['society']['society_address'];
					$sig_title = @$collection['society']['sig_title'];
					$email_is_on_off=(int)@$collection["society"]["account_email"];
					$sms_is_on_off=(int)@$collection["society"]["account_sms"];
			}


foreach($result_cash_bank as $receipt){
			
				$auto_id=$receipt["cash_bank"]["transaction_id"];
				$receipt_number=$receipt["cash_bank"]["receipt_number"];
				$transaction_date=$receipt["cash_bank"]["transaction_date"];
				$received_from=$receipt["cash_bank"]["received_from"];
				if($received_from == "residential"){				
				$receipt_type="Residential";
				$ledger_sub_account_id=$receipt["cash_bank"]["ledger_sub_account_id"];
				 $date=date("d-m-Y",$transaction_date);
				$result_member_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'), array('pass' => array($ledger_sub_account_id))); 
				
						 $user_name=$result_member_info["user_name"];
						 $wing_name=$result_member_info["wing_name"];
						 $flat_name=$result_member_info["flat_name"];
						 $wing_flat=$wing_name.'-'.$flat_name;
						 $email=$result_member_info["email"];
						 $mobile=$result_member_info["mobile"];
						 $wing_id=$result_member_info["wing_id"];
				
				}else{
					$wing_flat="";
					 $date=date("d-m-Y",$transaction_date);
				$ledger_sub_account_id=$receipt["cash_bank"]["ledger_sub_account_id"];
				$ledger_sub_account_id=$receipt["cash_bank"]["ledger_sub_account_id"];	
				$result_ledger_sub_account = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id)));
				foreach($result_ledger_sub_account as $data)
				{
				$user_name = $data['ledger_sub_account']['name'];	
				}	
					
					
				}
				
						
				$deposited_in=$receipt["cash_bank"]["deposited_in"];
				$deposited_in_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($deposited_in)));

				$bank_name=$deposited_in_info[0]["ledger_sub_account"]["name"];
				$bank_account=$deposited_in_info[0]["ledger_sub_account"]["bank_account"];
				$receipt_mode=$receipt["cash_bank"]["receipt_mode"];
				$cheque_number=$receipt["cash_bank"]["cheque_number"];
				$narration=$receipt["cash_bank"]["narration"];
				$amount=$receipt["cash_bank"]["amount"];
				$drown_in_which_bank=$receipt["cash_bank"]["drown_in_which_bank"];
				$cheque_date=$receipt["cash_bank"]["date"];
}	
				
				
				// start Email & Sms code
					$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));
					$amount = str_replace( ',', '', $amount );
					$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));
					
				
				
				
				
					$html_receipt='<table style="padding:24px;background-color:#F5F8F9" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="">
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
										<td style="padding:0px 0 2px 5px" colspan="2">Receipt No: '.$receipt_number.'</td>
										
										<td colspan="2" align="right" style="padding:0px 5px 0 0px"><b>Date:</b> '.$date.' </td>
										
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
										<td style="padding:0px 0 2px 5px"  colspan="4">'.$receipt_type.'</td>
										
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


?>
<div style="width:100%;" class="hide_at_print">
           <span style="margin-left:90%;"><button type="button" class=" printt btn green" onclick="window.print()"><i class="icon-print"></i> Print</button></span>
            </div>
			
	<?php echo $html_receipt; ?>		
			
			


<style>
.hmlogobox{
display: none;
	
}
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