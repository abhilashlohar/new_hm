<a href="#" class="btn green pull-right hide_at_print" role="button" onclick="window.print()">Print</a>

<?php 
foreach($result_society as $data){
		$society_name=$data["society"]["society_name"];
		$society_reg_num=$data["society"]["society_reg_num"];
		$society_address=$data["society"]["society_address"];
		$society_email=$data["society"]["society_email"];
		$society_phone=$data["society"]["society_phone"];
		//$terms_conditions=$data["society"]["terms_conditions"];
		
		$sig_title=$data["society"]["sig_title"];
		$neft_type = @$data["society"]["neft_type"];
		$neft_detail = @$data["society"]["neft_detail"];
		$society_logo = @$data["society"]["logo"];
		$area_scale = (int)@$data["society"]["area_scale"];
		$email_is_on_off=(int)@$data["society"]["account_email"];
		$sms_is_on_off=(int)@$data["society"]["account_sms"];
}
if($area_scale==0 or $area_scale==null){
	$area_scale_text="sq.ft.";
}
if($area_scale==1){
	$area_scale_text="sq.mtr.";
}
			

foreach($regular_bills as $data){
					$auto_id=$data["regular_bill"]["auto_id"];
					$bill_number=$data["regular_bill"]["bill_number"];
					$edit_text=@$data["regular_bill"]["edit_text"];
					 $ledger_sub_account_id=(int)$data["regular_bill"]["ledger_sub_account_id"];
					$billing_cycle=$data["regular_bill"]["billing_cycle"];	
					$income_head_array=$data["regular_bill"]["income_head_array"];
					$income_head_for_rate=@$data["regular_bill"]["income_head_for_rate"];
					$noc_charge=$data["regular_bill"]["noc_charge"];
					$other_charge=$data["regular_bill"]["other_charge"];
					$total=$data["regular_bill"]["total"];
					$arrear_principle=$data["regular_bill"]["arrear_principle"];
					$arrear_intrest=$data["regular_bill"]["arrear_intrest"];
					$intrest_on_arrears=$data["regular_bill"]["intrest_on_arrears"];
					$credit_stock=$data["regular_bill"]["credit_stock"];
					$due_for_payment=$data["regular_bill"]["due_for_payment"];
					$start_date=$data["regular_bill"]["start_date"];
					$end_date=$data["regular_bill"]["end_date"];
					$due_date=$data["regular_bill"]["due_date"];
					$description=$data["regular_bill"]["description"];
					$terms_condition_id=@$data["regular_bill"]["terms_condition_id"];
					$terms_condition_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_terms_condition'), array('pass' => array($terms_condition_id)));
					$terms_conditions=@$terms_condition_info[0]["terms_condition"]["terms_conditions"];
					if(empty($terms_conditions)){
						$terms_conditions=array();
					}
					$result_member_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'), array('pass' => array($ledger_sub_account_id))); 
				
						 $user_name=$result_member_info["user_name"];
						 $wing_name=$result_member_info["wing_name"];
						 $flat_name=$result_member_info["flat_name"];
						 $wing_flat=$wing_name.'-'.$flat_name;
						 $email=$result_member_info["email"];
						 $mobile=$result_member_info["mobile"];
						 $wing_id=$result_member_info["wing_id"];
						
					$result_flat_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'flat_info_via_ledger_sub_account_id'), array('pass' => array($ledger_sub_account_id))); 
					$flat_area=$result_flat_info[0]['flat']['flat_area'];
					
					if($neft_type ==  "ALL"){
						$account_name = @$neft_detail['account_name'];	
						$bank_name = @$neft_detail['bank_name'];
						$account_number = @$neft_detail['account_number'];
						$branch = @$neft_detail['branch'];
						$ifsc_code = @$neft_detail['ifsc_code'];	
					}
					if($neft_type ==  "WW"){			
						$neft_detail2 = @$neft_detail[$wing_id];
						$account_name = @$neft_detail2['account_name'];	
						$bank_name = @$neft_detail2['bank_name'];
						$account_number = @$neft_detail2['account_number'];
						$branch = @$neft_detail2['branch'];
						$ifsc_code = @$neft_detail2['ifsc_code'];		
					}
		
					
					if($billing_cycle!=1){
						$billing_period_text=date("M",$start_date).' - '.date("M",$end_date).'  '.date("Y",$end_date);
					}else{
						$billing_period_text=date("M-Y",$start_date);
					}
/// start Html generate for bill//
	 $ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip')); 
		$bill_html='<div style="margin: 0px;">
        <table style="padding:24px;background-color:#34495e" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="main_table">
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
									<a href="https://www.facebook.com/HousingMatters.co.in"><img src="'.$ip.$this->webroot.'/as/hm/SMLogoFB.png"    style="max-height: 30px; height: 30px; width: 30px; max-width: 30px;" height="30px" width="30px" /></a>
									</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td height="10"></td>
						</tr>
                        <tr>
                            <td colspan="2" style="font-size:12px;line-height:1.4;font-family:Arial,Helvetica,sans-serif;color:#34495e;border: solid 1px #767575;">
							<table style="font-size:12px" width="100%" cellspacing="0">
								<tbody><tr>
									<td style="padding:2px;background-color:rgb(0,141,210);color:#fff" align="center" width="100%"><b>'.strtoupper($society_name).'</b></td>
								</tr>
							</tbody></table>
							<table style="font-size:12px" width="100%" cellspacing="0">
								<tbody>
								<tr>
									<td width="30%" style="border-bottom: solid 1px #767575;    border-top: solid 1px #767575;">';
									if(!empty($society_logo)){
									$bill_html.='<img src="'.$webroot_path.'/logo/'.$society_logo.'"  height="45px" width="45px">';	
									}
						$bill_html.='</td>
									<td style="padding:5px;border-bottom: solid 1px #767575;    border-top: solid 1px #767575;"  width="70%" align="right">
									<span style="color: rgb(100, 100, 99); ">Regn# &nbsp; '.$society_reg_num.'</span><br>
									<span style="color: rgb(100, 100, 99); ">'.$society_address.'</span><br><span>Email :</span><a href="mailto:'.$society_email.'" target="_blank" style="color:#000 !important;text-decoration: none;"> '.$society_email.'</a> | <span>Phone : '.$society_phone.'</span>
									</td>
								</tr>
								</tbody>
							</table>
							<table style="font-size:12px" width="100%" cellspacing="0">
								<tbody><tr>
									<td style="padding: 0px 0 0 5px;"><b>Name:</b></td>
									<td>'.$user_name.'</td>
									<td><b>Flat/Shop No.:</b></td>
									<td>'.$wing_flat.'</td>
								</tr>
								<tr>
									<td style="padding: 0px 0 0 5px;"><b>Bill No.:</b></td>
									<td>'.$bill_number.$edit_text.'</td>
									<td><b>Area ('.$area_scale_text.'):</b></td>
									<td>'.$flat_area.'</td>
								</tr>
								<tr>
									<td style="padding: 0px 0 0 5px;"><b>Bill Date:</b></td>
									<td>'.date("d-m-Y",$start_date).'</td>
									<td><b>Billing Period:</b></td>
									<td>'.$billing_period_text.'</td>
								</tr>
								<tr>
									<td style="padding: 0px 0 0 5px;"><b>Due Date:</b></td>
									<td>'.date("d-m-Y",$due_date).'</td>
									<td><b>Description:</b></td>
									<td>'.$description.'</td>
								</tr>
							</tbody></table>
							<table style="font-size:12px;border-bottom: solid 1px #767575;" width="100%" cellspacing="0">
								<tbody><tr>
									<td style="padding: 0 0 0 5px;background-color:rgb(0,141,210);color:#fff;border-top: solid 1px #767575;border-bottom: solid 1px #767575;border-right: solid 1px #FFFFFF;" align="left" width="60%"><b>Particulars of charges</b></td>
									<td style="padding: 0 5px  0;background-color:rgb(0,141,210);color:#fff;border-top: solid 1px #767575;border-bottom: solid 1px #767575;border-right: solid 1px #FFFFFF;" align="center" width="20%"><b>Rate (sq.ft.)</b> </td>
									<td style="padding: 0 5px 0 0;background-color:rgb(0,141,210);color:#fff;border-top: solid 1px #767575;border-bottom: solid 1px #767575;" align="right" width="20%"><b>Amount (Rs.)</b> </td>
								</tr>';
								
								
							foreach($income_head_array as $key=>$value){ 
							$result_income_head = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($key)));	
								foreach($result_income_head as $data2){ 
									$income_head_name = $data2['ledger_account']['ledger_name'];
								}
								if(!empty($value)){
									$bill_html.='<tr>
										<td align="left" style="border-right: solid 1px #767575;padding: 0 0 0 5px;" >'.$income_head_name.'</td>
										<td align="center" style="border-right: solid 1px #767575;padding: 0 0 0 5px;">';if(!empty($income_head_for_rate[$key])){ $size_of= explode('.',$income_head_for_rate[$key]); if(strlen($size_of[1])>2){ $bill_html.=''.number_format($income_head_for_rate[$key] ,3).''; }else{ $bill_html.=''.number_format($income_head_for_rate[$key] ,2).'';} } $bill_html.=' </td>
										<td align="right" style="padding: 0 5px 0 0;">'.$value.'</td>
									</tr>';
								}
							}
							
							
							if(!empty($noc_charge)){
							$bill_html.='<tr>
										<td align="left" style="border-right: solid 1px #767575;padding: 0 0 0 5px;" >Non Occupancy charges</td>
										<td align="center" style="border-right: solid 1px #767575;padding: 0 0 0 5px;"></td>
										<td align="right" style="padding: 0 5px 0 0;">'.$noc_charge.'</td>
									</tr>';
							}
							
							foreach($other_charge as $key=>$vlaue){
								$income_head_name = $this->requestAction(array('controller' => 'Fns', 'action' => 'income_head_name_via_income_head_id'),array('pass'=>array($key)));	
																
								$bill_html.='<tr>
										<td align="left" style="border-right: solid 1px #767575;padding: 0 0 0 5px;" >'.$income_head_name.'</td>
										<td align="center" style="border-right: solid 1px #767575;padding: 0 0 0 5px;"></td>
										<td align="right" style="padding: 0 5px 0 0;">'.$vlaue.'</td>
									</tr>';
							} 
							
							
							$bill_html.='</tbody></table>
							<table style="font-size:12px;border-bottom: solid 1px #767575;" width="100%" cellspacing="0">
								<tbody><tr>
									<td width="60%" valign="top" style="border-right: solid 1px #767575;">
										<table style="font-size:11px" width="100%">
											<tbody>
											<tr>
												<td colspan="2" style="padding: 0 0 0 5px;"><b>Cheque/NEFT payment instructions:</b></td>
											</tr>
											<tr>
												<td width="40%" style="padding: 0 0 0 5px;"><b>Account Name:</b></td>
												<td width="60%">'.$account_name.'</td>
											</tr>
											<tr>
												<td width="40%" style="padding: 0 0 0 5px;"><b>Account No.:</b></td>
												<td width="60%">'.$account_number.'</td>
											</tr>
											<tr>
												<td width="40%" style="padding: 0 0 0 5px;"><b>Bank Name:</b></td>
												<td width="60%">'.$bank_name.'</td>
											</tr>
											<tr>
												<td width="40%" style="padding: 0 0 0 5px;"><b>Branch Name:</b></td>
												<td width="60%">'.$branch.'</td>
											</tr>
											<tr>
												<td width="40%" style="padding: 0 0 0 5px;"><b>IFSC no.:</b></td>
												<td width="60%">'.$ifsc_code.'</td>
											</tr>
										</tbody></table>
									</td>
									<td width="40%" valign="top">
										<table style="font-size:12px" width="100%">
											<tbody><tr>
												<td align="right" width="70%">Total:</td>
												<td align="right" width="30%" style="padding: 0 5px 0 0;">'.$total.'</td>
											</tr>
											<tr>
												<td align="right">Interest on arrears:</td>
												<td align="right" style="padding: 0 5px 0 0;">'.$intrest_on_arrears.'</td>
											</tr>
											<tr>
												<td align="right">Arrears-Principal:</td>
												<td align="right" style="padding: 0 5px 0 0;">'.$arrear_principle.'</td>
											</tr>
											<tr>
												<td align="right">Arrears-Interest:</td>
												<td align="right" style="padding: 0 5px 0 0;">'.$arrear_intrest.'</td>
											</tr>';
								
								$credit_stock_text=$credit_stock;
								$bill_html.='<tr>
												<td align="right" width="60%">Credit/Adjustment:</td>
												<td align="right" width="40%" style="padding: 0 5px 0 0;">'.$credit_stock_text.'</td>
											</tr>';
								$bill_html.='<tr>
												<td align="right" width="60%"><b>Due For Payment:</b></td>
												<td align="right" width="40%" style="padding: 0 5px 0 0;">'.$due_for_payment.'</td>
											</tr>
										</tbody></table>
									</td>
								</tr>
							</tbody></table>';
							$due_for_payment = str_replace( ',', '', $due_for_payment );
							if($due_for_payment<0){
							$write_am_word="Nil";
							}else{
								
							$am_in_words=ucwords(strtolower($this->requestAction(array('controller' => 'Hms', 'action' => 'convert_number_to_words'),array('pass'=>array($due_for_payment)))));
							$write_am_word="Rupees ".$am_in_words." Only";
							}
							$bill_html.='<table style="font-size:12px" width="100%" cellspacing="0">
								<tbody><tr>
									<td width="100%" style="font-size:12px;border-bottom: solid 1px #767575;padding: 0 0 0 5px;"><b>Due For Payment (in words) :</b> '.$write_am_word.'</td>
								</tr>
							</tbody></table>';
							$bill_html.='<table style="font-size:12px;border-bottom:1px solid;" width="100%" cellspacing="0">
								<tbody><tr>
									<td width="100%" style="padding:5px;" valign="top">
									<span>Remarks:</span><br>';
									$inc_t_c=0;
									foreach($terms_conditions as $t_c){ $inc_t_c++;
										$bill_html.='<span>'.$inc_t_c.'. '.$t_c.'</span><br>';
									}
									
									$bill_html.='</td>
								</tr>
							</tbody></table>';
			///................ Receipt code start..................... /// 
			
							$result_last_receipt=$this->requestAction(array('controller' => 'Incometrackers', 'action' => 'print_show_last_receipt'), array('pass' => array($ledger_sub_account_id,$start_date)));
							if(sizeof($result_last_receipt)>0){ 
							$bill_html.='<table style="font-size:12px;" width="100%" cellspacing="0">
									<tbody><tr>
										<td style="padding:2px;background-color:rgb(0,141,210);color:#fff" align="center" width="100%"><b>R E C E I P T</b></td>
									</tr>
								</tbody></table>
								<table style="font-size:12px;border-bottom:1px solid;" width="100%" cellspacing="0">
								   <tbody>
									<tr>
										<td style="padding:5px;border-top:solid 1px #767575" width="100%" align="left">
										<span style="color:rgb(100,100,99)">
										Received with thanks from: <b>'.$user_name.' '.$wing_flat.'</b>
										 <br/>
										Details of last three payments received before '.date("d-m-Y",$start_date).'
										</span>
										</td>
									</tr>
									</tbody>
								</table>
								<table style="font-size:12px;border-bottom:1px solid;" width="100%" cellspacing="0">
								<thead>
								<th style="border-bottom: solid 1px;border-right: solid 1px;">Date</th>
								<th style="border-bottom: solid 1px;border-right: solid 1px;">Receipt# </th>
								<th style="border-bottom: solid 1px;border-right: solid 1px;">Cheque/Neft </th>
								<th style="border-bottom: solid 1px;border-right: solid 1px;">Drawee Bank</th>
								<th style="border-bottom: solid 1px;">Amount (Rs.)</th>
								
								</thead>
								<tbody>';
								
								 
	// pr($result_last_receipt);
	
		$total_receipt=0;
			foreach($result_last_receipt as $receipt){

				$auto_id=$receipt["cash_bank"]["transaction_id"];
				$receipt_number=$receipt["cash_bank"]["receipt_number"];
				$transaction_date=$receipt["cash_bank"]["transaction_date"];
				$received_from=$receipt["cash_bank"]["received_from"];
				$date=date("d-m-Y",$transaction_date);			
				$cheque_number=$receipt["cash_bank"]["cheque_number"];
				$narration=$receipt["cash_bank"]["narration"];
				$amount=$receipt["cash_bank"]["amount"];
				$drown_in_which_bank=$receipt["cash_bank"]["drown_in_which_bank"];
				$cheque_date=$receipt["cash_bank"]["date"];
				
			    $total_receipt+=$amount;
				
				
				$bill_html.='<tr>
								<td style="text-align:center;border-right: solid 1px;">'.$date.'</td>
								<td style="text-align:center;border-right: solid 1px;">'.$receipt_number.'</td>
								<td style="border-right: solid 1px;padding-right: 6px;" align="right">'.$cheque_number.'</td>
								<td style="text-align:center;border-right: solid 1px;">'.$drown_in_which_bank.'</td>
								<td align="right" style="padding-right: 6px;">'.$amount.'</td>
								</tr>';
								
								
		
	   }
	
				$total_receipt = str_replace( ',', '', $total_receipt );
					$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($total_receipt))));
								
						$bill_html.='</tbody></table>
						<table style="font-size:12px;border-bottom:1px solid" width="100%" cellspacing="0">
									<tbody>
									<tr>
										<td style="padding:0px 0 2px 5px"  colspan="4">Rupees '.$am_in_words.' Only </td>
										<td align="right" style="padding-right: 6px;"><b>Total: '.$total_receipt.'</b></td>
									</tr>';
								
									
									$bill_html.='
									
									
									
								</tbody></table>';	
							}					
							
			////.......end receipt code ..................////////		
			
							$bill_html.='<table style="font-size:12px;border-bottom: dotted 1px;" width="100%" cellspacing="0">
								<tbody><tr>
								<td align="right" width="60%" style="padding:5px;" valign="top">
									<br/>For  <b>'.$society_name.'</b>: <span >'.$sig_title.'</span>
									
									</td>
									<td align="right" width="40%" style="padding:0px 20px 5px 20px;" valign="bottom">
									<br/><div style="border-bottom:solid 1px #424141"></div>
									</td>
								</tr>
							</tbody></table>
							
							<table style="font-size:12px" width="100%" cellspacing="0">
								<tbody><tr>
									<td align="center" width="100%">Note: This is a computer generated bill hence no signature required.</td>
								</tr>
							</tbody></table>
							
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" >
                                <table style="background-color: #008DD2;font-size:11px;color:#FFF;border: solid 1px #767575;border-top:none;" width="100%" cellspacing="0">
                                 <tbody>
								 
									<tr>
                                        <td  align="center" colspan="7"><b>
										Your Society is empowered by HousingMatters - <b/> <i>"Making Life Simpler"</i>
										</td>
                                    </tr>
									<tr>
                                        <td width="20" align="right"><b></b></td>
                                        <td  width="120" style="color:#FFF !important;"> 
										<a href="mailto:support@housingmatters.in" target="_blank" style="color:#FFF !important;"><b>support@housingmatters.in</b></a>
                                        </td>
										<td align="center"></td>
                                        <td align="right" width="50"><b><a href="intent://send/+919869157561#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end"  style="display:none;"><img src="'.$ip.$this->webroot.'/as/hm/whatsup.png"  width="18px" /></a></b></td>
                                        <td width="104" style="color:#FFF !important;text-decoration: none;"><b  style="display:none;">+91-9869157561</b></td>
										<td align="center"></td>
                                        <td width="100" style="padding-right: 10px;text-decoration: none;"> <a href="http://www.housingmatters.in" target="_blank" style="color:#FFF !important;"><b>www.housingmatters.in</b></a></td>
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
        </tbody></table>
                   
            </div>';
	//End Bill html 
					
	 echo $bill_html;
	
	/* $html_receipt='<table style="padding:24px;background-color:#F5F8F9" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="">
				<tbody><tr>
					<td>
						<table style="padding:38px 30px 30px 30px;background-color:#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="540">
							<tbody>
							<tr>
								<td height="10">
								<table width="100%" class="hmlogobox">
		<tr>
		<td width="50%" style="padding: 10px 0px 0px 10px;"></td>
		<td width="50%" align="right" valign="middle"  style="padding: 7px 10px 0px 0px;">
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
										<td style="padding:2px;background-color:rgb(0,141,210);color:#fff" align="center" width="100%"><b>R E C E I P T</b></td>
									</tr>
								</tbody></table>
								<table style="font-size:12px" width="100%" cellspacing="0">
									<tbody>
									<tr>
										<td style="padding:5px;border-top:solid 1px #767575" width="100%" align="left">
										<span style="color:rgb(100,100,99)">
										There are showing last three receipt. to Details of last three payments received.<br/>
										Received with thanks from: <b>'.$user_name.' '.$wing_flat.'</b>
										
										</span>
										</td>
									</tr>
									</tbody>
								</table>
								</td>
								</tr>
								
								<tr>
								<td colspan="2" style="font-size:12px;line-height:1.4;font-family:Arial,Helvetica,sans-serif;color:#34495e;border:solid 1px #767575;border-bottom:none;border-top:none;">
								
								<table style="font-size:12px;" width="100%" cellspacing="0">
								<thead>
								<th style="border-bottom: solid 1px;border-right: solid 1px;">Date</th>
								<th style="border-bottom: solid 1px;border-right: solid 1px;">Receipt# </th>
								<th style="border-bottom: solid 1px;border-right: solid 1px;">Cheque/Neft </th>
								<th style="border-bottom: solid 1px;border-right: solid 1px;">Drawee Bank</th>
								<th style="border-bottom: solid 1px;">Amount(Rs.)</th>
								
								</thead>
								<tbody>';
	
	 $result_last_receipt=$this->requestAction(array('controller' => 'Incometrackers', 'action' => 'print_show_last_receipt'), array('pass' => array($ledger_sub_account_id)));
	// pr($result_last_receipt);
	if(sizeof($result_last_receipt)>0){
		$total_receipt=0;
			foreach($result_last_receipt as $receipt){

				$auto_id=$receipt["cash_bank"]["transaction_id"];
				$receipt_number=$receipt["cash_bank"]["receipt_number"];
				$transaction_date=$receipt["cash_bank"]["transaction_date"];
				$received_from=$receipt["cash_bank"]["received_from"];
				$date=date("d-m-Y",$transaction_date);			
				$cheque_number=$receipt["cash_bank"]["cheque_number"];
				$narration=$receipt["cash_bank"]["narration"];
				$amount=$receipt["cash_bank"]["amount"];
				$drown_in_which_bank=$receipt["cash_bank"]["drown_in_which_bank"];
				$cheque_date=$receipt["cash_bank"]["date"];
				
			    $total_receipt+=$amount;
				
				// start Email & Sms code
				$html_receipt.='<tr>
								<td style="text-align:center;border-right: solid 1px;">'.$date.'</td>
								<td style="text-align:center;border-right: solid 1px;">'.$receipt_number.'</td>
								<td style="border-right: solid 1px;" align="right">'.$cheque_number.'</td>
								<td style="text-align:center;border-right: solid 1px;">'.$drown_in_which_bank.'</td>
								<td align="right" style="padding-right: 6px;">'.$amount.'</td>
								</tr>';
								
								
		
	   }
	
				$total_receipt = str_replace( ',', '', $total_receipt );
					$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($total_receipt))));
	
	$html_receipt.='</tbody>
								
								
								
								</table>
								
								</td>
								
								</tr>
																							
								<tr>
								<td colspan="2" style="font-size:12px;line-height:1.4;font-family:Arial,Helvetica,sans-serif;color:#34495e;border:solid 1px #767575">
								
								<table style="font-size:12px;" width="100%" cellspacing="0">
									<tbody>
									<tr>
										<td style="padding:0px 0 2px 5px"  colspan="4">Rupees '.$am_in_words.' Only </td>
										<td align="right"><b>Total: '.$total_receipt.'</b></td>
									</tr>';
								
									
									$html_receipt.='
									
									
									
								</tbody></table>
								
												
								
								</td>
							</tr>
							
						</tbody></table>
					</td>
				</tr>
			</tbody>
		</table>';
echo $html_receipt; 

} */
 echo '<DIV style="page-break-after:always"></DIV>';	
}
?>
<style>
@media screen {
    .bill_on_screen {
       width:70%;
    }
	
}

@media print {
    .bill_on_screen {
       width:90% !important;
    }

}
.main_table{
	background-color: #F1F3FA !important;
}
.hmlogobox{
	display:none;
}
</style>



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

