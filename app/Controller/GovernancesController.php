<?php

App::import('Controller', 'Hms');
class GovernancesController extends HmsController {
var $helpers = array('Html', 'Form','Js');
public $components = array(
'Paginator',
'Session','Cookie','RequestHandler'
);


var $name = 'Governances';


////////////////////////// Governance_designation ////////////////////////////////////////


function governance_designation()
{
if($this->RequestHandler->isAjax()){
$this->layout='blank';
}else{
$this->layout='session';
}
$this->ath();
$this->check_user_privilages();
$s_society_id=$this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');
$this->loadmodel('governance_designation');
$condition=array('society_id'=>$s_society_id);
$result=$this->governance_designation->find('all',array('conditions'=>$condition)); 
$this->set('result_governance_designation',$result);

}


function governace_meeting_resend($meeting_id=null){
	
	$this->layout=null;
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('governance_invite');
	$conditions=array('governance_invite_id'=>(int)$meeting_id);
	$result_governace_invite=$this->governance_invite->find('all',array('conditions'=>$conditions));
	foreach($result_governace_invite as $data){
		
		$message=$data['governance_invite']['message'];
		$date=$data['governance_invite']['date'];
		$creater_user_id=$data['governance_invite']['user_id'];
		$time=$data['governance_invite']['time'];
		$subject=$data['governance_invite']['subject'];
		$type_mettings=$data['governance_invite']['meeting_type'];
		$user_resend=$data['governance_invite']['user'];
		$location=$data['governance_invite']['location'];
		$covering_note=$data['governance_invite']['covering_note'];
		$notice_of_date=$data['governance_invite']['notice_of_date'];
		$any_other=$data['governance_invite']['any_other_note'];
	}
		if($type_mettings==1)
			{
				$moc="Managing Committee";

			}
			if($type_mettings==2)
			{
				$moc="General Body";

			}
			if($type_mettings==3)
			{
				$moc="Special General Body";

			}
	
	$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));
	
	$result_society=$this->society_name($s_society_id);
	foreach($result_society as $child)	{
		$society_name=$child['society']['society_name'];
	}
	
	$result_user_creater=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_info_via_user_id'),array('pass'=>array($creater_user_id))); 
	$email=$result_user_creater[0]['user']['email'];
	$user_name=$result_user_creater[0]['user']['user_name'];
	if(!empty($email)){
		$reply=$email;
	  }else{
		$reply="donotreply@housingmatters.in"; 
	  }
	
	foreach($user_resend as $user_send_id){
		
		$result_user=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_info_via_user_id'),array('pass'=>array($user_send_id))); 
			
			$to=$result_user[0]['user']['email'];
	
				$message_web='<table  align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					  <tbody>
						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0">
									<tbody>
									
											<tr>
												<td colspan="2">
													<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
													<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
													<tr>
													<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
													<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
													<td width="100%"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px"><span style="color:#00a0e3">Housing</span><span style="color:#777776">Matters</span></a></td>
													<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
														
													</td>
													</tr>
													<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
													</tbody>
													</table>
												</td>
											</tr>
											
												
											
									</tbody>
								</table>
								
								<table width="100%" cellpadding="0" cellspacing="0">
									<tbody>
									
											<tr>
													<td style="padding:5px;" width="100%" align="left">
													<span style="color:rgb(100,100,99)" align="justify"><p><center><b>'.$society_name.'</b></center></p> </span> 
													</td>
																			
											</tr>
											
											<tr>
													<td style="padding:5px;" width="100%" align="left">
													<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Type:</b> [ '.$moc .' Meeting ]  </span> 
													</td>
																			
											</tr>
											
											<tr>
													<td style="padding:5px;" width="100%" align="left">
													<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Title:</b> '.$subject .' </span> 
													</td>
																			
											</tr>
											
											<tr>
													<td style="padding:5px;" width="100%" align="left">
													<span style="color:rgb(100,100,99)" align="justify"><b>Date of Notice:</b> '.$notice_of_date.'  </span> 
													</td>
																			
											</tr>
											<tr>
													<td style="padding:5px;" width="100%" align="left">
													 
															<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
															<tr class="tr_heading" style="background-color:#00A0E3;color:white;">
															<td width="10%">Meeting ID</td>
															<td width="20%">Date of Meeting</td>
															<td width="10%">Time</td>
															<td width="60%">Location</td>
															</tr>
															<tr class="tr_content" style="background-color:#E9E9E9;">
															<td>'.$meeting_id.'</td>
															<td>'.$date.'</td>
															<td>'.$time.'</td>
															<td>'.$location.'</td>

															</tr>
															</table>
													
													</td>
																			
											</tr>
											
											
											
											
											<tr>
													<td style="padding:5px;" width="100%" align="left">
															<p><b>Covering Note:</b><br/>
															<p>'.$covering_note.'</p>
													</td>
																			
											</tr>
											
											<tr>
													<td style="padding:5px;" width="100%" align="left">
															<p> <b>	Agenda to be discussed: </b></p><br/>
																	<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
																	<tr style="background-color:#00A0E3;color:white;">
																	<td>Time</td>
																	<td>Meeting Agenda</td>

																	</tr>';
																	 $jj=0;
																	foreach($message as $ddd)
																	{	$jj++;

																	$message_web.='<tr>
																	<td width="10%">'.urldecode($ddd[2]).'</td>
																	<td>'.$jj.'. '.urldecode($ddd[0]). ' <br/> '.urldecode($ddd[1]).'</td>
																	</tr>';	
																	 } 
																	 $message_web.='</table><br/>
													</td>
																			
											</tr>
											
											<tr>
													<td style="padding:5px;" width="100%" align="left">
															<p><b>Any other Note:</b><br/>
															<p>'.$any_other.'</p>	
													</td>
																			
											</tr>
											
											
											<tr>
												<td style="padding:5px;" width="100%" align="left">
														<span > 
																For  '.$society_name.' .<br/>
																'.$user_name.'<br/>
																
														</span>
												</td>
																			
											</tr>
								
								</table>
								
							</td>
						</tr>

					</tbody>
			</table>';
			
			
		@$title.= '['. $society_name . ']  - '.' Meeting Reminder '.$moc.' Meeting scheduled'.'  on   '.''.$date.'';	

		$this->send_email($to,'support@housingmatters.in','HousingMatters',$title,$message_web,$reply);
		$title="";	
	}			
			
echo 'done'	;
}


function governance_invite_submit()
{
	
	$this->layout=null;
	$post_data=$this->request->data;

	$this->ath();
	$s_society_id=$this->Session->read('hm_society_id');
	$s_role_id=$this->Session->read('role_id'); 
	$s_user_id=$this->Session->read('hm_user_id');
	$current_date=date("d-m-Y");
	$save=(int)$post_data['save'];

	$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip')); 
	$Invitations_type=(int)$post_data['Invitations_type'];
	$type_mettings=(int)$post_data['type_mettings'];
	$subject=$post_data['subject'];
	$date=$post_data['date'];
	$time=$post_data['time'];
	$location=$post_data['location'];
	$covering_note=$post_data['covering_note'];
	$any_other=$post_data['any_other'];
	 $meeting_agenda_time=$post_data['meeting_agenda_time'];
	 $meeting_agenda_input=$post_data['meeting_agenda_input'];
	 $meeting_agenda_textarea=$post_data['meeting_agenda_textarea'];
	 $meeting_agenda_time=explode(",",$meeting_agenda_time);
	$meeting_agenda_input=explode(",",$meeting_agenda_input);
	$meeting_agenda_textarea=explode(",",$meeting_agenda_textarea);
	
	/////////////////// validation ///////////////////////////
	
		$report=array();
		if(empty($subject)){
		$report[]=array('label'=>'subject', 'text' => 'Please fill title');
		}
		if(empty($date)){
		$report[]=array('label'=>'date', 'text' => 'Please fill date');
		}
		if(!empty($date)){
			if(strtotime($date) < strtotime($current_date)){
				
			$report[]=array('label'=>'date', 'text' => 'you are selected wrong date');
			}
		}
		if(empty($time)){
		$report[]=array('label'=>'time', 'text' => 'Please fill time');
		}
		if(empty($location)){
		$report[]=array('label'=>'location', 'text' => 'Please fill location');
		}
		
		
			
	/////////////////////////////////////////////////////////////////////////
	
	
		$message="";
		for($z=0;$z<sizeof($meeting_agenda_input);$z++)
		{
			
			$message[]=array($meeting_agenda_input[$z],$meeting_agenda_textarea[$z],$meeting_agenda_time[$z]);
		}
				
			if($type_mettings==1)
			{
				$moc="Managing Committee";

			}
			if($type_mettings==2)
			{
				$moc="General Body";

			}
			if($type_mettings==3)
			{
				$moc="Special General Body";

			}
			
				if(isset($_FILES['file'])){
				$target = "governances_file/";
				 $file_name=@$_FILES['file']['name']; 
				$file_tmp_name =$_FILES['file']['tmp_name'];
				$target=@$target.basename($file_name);
				move_uploaded_file($file_tmp_name,@$target);
				}
				$file_att="";
				if(!empty($file_name))
				{
				@$file_att='<br/><a href="'.$ip.'/'.$this->webroot.'governances_file/'.$file_name.'" download>Download attachment</a>';
				}

				
					$result_society=$this->society_name($s_society_id);
					foreach($result_society as $data)
					{
					 $society_name=$data['society']['society_name'];
					//$user_id=$data['society']['user_id'];
					
					}
					$result_user=$this->profile_picture($s_user_id);
					foreach($result_user as $data4)
					{
						  $user_name=$data4['user']['user_name'];
						  $send_email_member=$data4['user']['email'];
					}
					if(!empty($send_email_member)){
						$reply=$send_email_member;
					}else{
						$reply="donotreply@housingmatters.in";
					}
		
				$email_id=$this->autoincrement('governance_invite','governance_invite_id');
				$gov_invite_me_id=$this->autoincrement_with_society('governance_invite','gov_invite_me_id');
			
	if($save==1){
		
		if($Invitations_type==1){
			$invite_user_multi=$post_data['Invite_user1'];
			$invite_user_multi=explode(",",$invite_user_multi);
			
			////////////////////////////// validation check//////////////////
			
					if($invite_user_multi[0]=='null'){

					$report[]=array('label'=>'multi', 'text' => 'Please select at-least one recipient.');
					}

					if(sizeof($report)>0){
					$output=json_encode(array('report_type'=>'error','report'=>$report));
					die($output);
					}
			
			//////////////////////////////// end ////////////////////////////////
			
			//$user=$invite_user_multi;
		/////////////////  start email code ////////////////////////////////
		
			foreach($invite_user_multi as $data)
				{
					$da_user_id[]=(int)$data;
					$user[]=(int)$data;
					$result_user=$this->profile_picture((int)$data);
					
					foreach($result_user as $da)
					{
											
						$to=$da['user']['email']; 
						
											
		$message_web='<table  align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
			<tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								<tr>
									<td colspan="2">
										<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
										<tbody>
										<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										<tr>
										<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
										<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
										<td width="100%"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px"><span style="color:#00a0e3">Housing</span><span style="color:#777776">Matters</span></a></td>
										<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
											
										</td>
										</tr>
										<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										</tbody>
										</table>
									</td>
								</tr>
								
									
								
						</tbody>
					</table>
					
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><p><center><b>'.$society_name.'</b></center></p> </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Type:</b> [ '.$moc .' Meeting ]  </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Title:</b> '.$subject .' </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Date of Notice:</b> '.$current_date.'  </span> 
										</td>
																
								</tr>
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										 
												<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
												<tr class="tr_heading" style="background-color:#00A0E3;color:white;">
												<td width="10%">Meeting ID</td>
												<td width="20%">Date of Meeting</td>
												<td width="10%">Time</td>
												<td width="60%">Location</td>
												</tr>
												<tr class="tr_content" style="background-color:#E9E9E9;">
												<td>'.$gov_invite_me_id.'</td>
												<td>'.$date.'</td>
												<td>'.$time.'</td>
												<td>'.$location.'</td>

												</tr>
												</table>
										
										</td>
																
								</tr>
								
								
								
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p><b>Covering Note:</b><br/>
												<p>'.$covering_note.'</p>
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p> <b>	Agenda to be discussed: </b></p><br/>
														<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
														<tr style="background-color:#00A0E3;color:white;">
														<td>Time</td>
														<td>Meeting Agenda</td>

														</tr>';
														 $jj=0;
														foreach($message as $ddd)
														{	$jj++;

														$message_web.='<tr>
														<td width="10%">'.urldecode($ddd[2]).'</td>
														<td>'.$jj.'. '.urldecode($ddd[0]). ' <br/> '.urldecode($ddd[1]).'</td>
														</tr>';	
														 } 
														 $message_web.='</table><br/>
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p><b>Any other Note:</b><br/>
												<p>'.$any_other.'</p>	
										</td>
																
								</tr>
								
								
								<tr>
									<td style="padding:5px;" width="100%" align="left">
											<span > 
													For  '.$society_name.' .<br/>
													'.$user_name.'<br/>
													
											</span>
									</td>
																
								</tr>
					
					</table>
					
				</td>
			</tr>

        </tbody>
</table>';
						
					
						
					 @$title.= '['. $society_name . ']  - '.'Notice of '.$moc.' Meeting scheduled'.'  on   '.''.$date.'';	
					
					$this->send_email($to,'support@housingmatters.in','HousingMatters',$title,$message_web,$reply);
					$title="";
					
		
				
					}
					
				}
			///////////////// end email code /////////////////////////////////////////
			
			
			  
				$this->loadmodel('governance_invite');
				$multipleRowData = Array( Array("governance_invite_id" => $email_id,"message"=>$message,"user_id"=>$s_user_id,"date"=>$date,"time"=>$time,"society_id"=>$s_society_id,"subject"=>$subject,"type"=>$Invitations_type,"file"=>@$file_name,"deleted"=>0,'user'=>$user,'location'=>$location,'meeting_type'=>$type_mettings,'covering_note'=>$covering_note,'agenda_id'=>0,'notice_of_date'=>$current_date,'any_other_note'=>$any_other,'gov_invite_me_id'=>$gov_invite_me_id));
				$this->governance_invite->saveAll($multipleRowData); 
			
		
		}
		
		/*
		if($Invitations_type==2)
		{
			    //$to=$post_data['Invite_user2'];
				 $Invite_group=$post_data['Invite_group'];
				$Invite_group=explode(",",$Invite_group);
				
				
				////////////////////////////// validation check//////////////////
			
					if($Invite_group[0]=='null' || $Invite_group[0]=='' ){

					$report[]=array('label'=>'multi_check', 'text' => 'Please check at-least one ');
					}

					if(sizeof($report)>0){
					$output=json_encode(array('report_type'=>'error','report'=>$report));
					die($output);
					}
			
			//////////////////////////////// end ////////////////////////////////
				foreach($Invite_group as $group_id)
				{
					
					$this->loadmodel('group');
					$conditions=array('group_id'=>(int)$group_id);
					$result_group=$this->group->find('all',array('conditions'=>$conditions));
					foreach($result_group as $data2)
					{
						$userl_group=$data2['group']['users'];
						
						foreach($userl_group as $data3)
						{
							$user[]=(int)$data3;
							
						}
						
						
					}
					
				}

				$user=array_unique($user);
				$user=array_values($user);
				$da_user_id=$user;
				
	/////////////////// Start email code ///////////////////////////
	
				foreach($user as $data6)
				{
					
					$result_user1=$this->profile_picture($data6);
					foreach($result_user1 as $data7)
					{
						 $to=$data7['user']['email'];
						
						
						
						
$message_web='<table  align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
			<tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								<tr>
									<td colspan="2">
										<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
										<tbody>
										<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										<tr>
										<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
										<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
										<td width="100%"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px"><span style="color:#00a0e3">Housing</span><span style="color:#777776">Matters</span></a></td>
										<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
											
										</td>
										</tr>
										<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										</tbody>
										</table>
									</td>
								</tr>
								
									
								
						</tbody>
					</table>
					
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><p><center><b>'.$society_name.'</b></center></p> </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Type:</b> [ '.$moc .' Meeting ]  </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Title:</b> '.$subject .' </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Date of Notice:</b> '.$current_date.'  </span> 
										</td>
																
								</tr>
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										 
												<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
												<tr class="tr_heading" style="background-color:#00A0E3;color:white;">
												<td width="10%">Meeting ID</td>
												<td width="20%">Date of Meeting</td>
												<td width="10%">Time</td>
												<td width="60%">Location</td>
												</tr>
												<tr class="tr_content" style="background-color:#E9E9E9;">
												<td>'.$gov_invite_me_id.'</td>
												<td>'.$date.'</td>
												<td>'.$time.'</td>
												<td>'.$location.'</td>

												</tr>
												</table>
										
										</td>
																
								</tr>
								
								
								
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p><b>Covering Note:</b><br/>
												<p>'.$covering_note.'</p>
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p> <b>	Agenda to be discussed: </b></p><br/>
														<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
														<tr style="background-color:#00A0E3;color:white;">
														<td>Time</td>
														<td>Meeting Agenda</td>

														</tr>';
														 $jj=0;
														foreach($message as $ddd)
														{	$jj++;

														$message_web.='<tr>
														<td width="10%">'.urldecode($ddd[2]).'</td>
														<td>'.$jj.'. '.urldecode($ddd[0]). ' <br/> '.urldecode($ddd[1]).'</td>
														</tr>';	
														 } 
														 $message_web.='</table><br/>
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p><b>Any other Note:</b><br/>
												<p>'.$any_other.'</p>	
										</td>
																
								</tr>
								
								
								<tr>
									<td style="padding:5px;" width="100%" align="left">
											<span > 
													For  '.$society_name.' .<br/>
													'.$user_name.'<br/>
													
											</span>
									</td>
																
								</tr>
					
					</table>
					
				</td>
			</tr>

        </tbody>
</table>';

						
					@$title.= '['. $society_name . ']  - '.'Notice of '.$moc.' Meeting scheduled'.'  on   '.''.$date.'';	
					$this->send_email($to,'support@housingmatters.in','HousingMatters',$title,$message_web,$reply);
						$title="";
				     
					}
				}
		///////////////////////// End code ///////////////////////////////////////		
			
			
			$this->loadmodel('governance_invite');
			$multipleRowData = Array( Array("governance_invite_id" => $email_id,"message"=>$message,"user_id"=>$s_user_id,"date"=>$date,"time"=>$time,"society_id"=>$s_society_id,"subject"=>$subject,"type"=>$Invitations_type,"file"=>@$file_name,"deleted"=>0,'location'=>$location,'meeting_type'=>$type_mettings,'covering_note'=>$covering_note,'user'=>$user,'group_id'=>$Invite_group,'agenda_id'=>0,'notice_of_date'=>$current_date,'any_other_note'=>$any_other,'gov_invite_me_id'=>$gov_invite_me_id));
			$this->governance_invite->saveAll($multipleRowData); 
			
			
			
		} */
		
		
		
		if($Invitations_type==3)
		{
			 $visible=$post_data['visible'];
			
			$sub_visible=$post_data['sub_visible'];
			
			
			//////////////////// validation //////////////
			
				if($visible=="role_wise")
				{
					
					
					if($post_data['sub_visible']==0)
					{
						
						$report[]=array('label'=>'rol_wing', 'text' => 'Please select at-least one role');
						
					}
					
					
				}
				if($visible=="wing_wise")
				{
					
					if($post_data['sub_visible']==0)
					{
						
						$report[]=array('label'=>'rol_wing', 'text' => 'Please select at-least one wing');
						
					}
					
					
				}
				if($visible=="group_wise")
				{
					
					if($post_data['sub_visible']==0)
					{
						
						$report[]=array('label'=>'rol_wing', 'text' => 'Please select at-least one group');
						
					}
					
					
				}
				if(sizeof($report)>0){
					$output=json_encode(array('report_type'=>'error','report'=>$report));
					die($output);
					}
			
			///////////////  end /////////////////////////
			
				if($visible=="all_users"){
				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,null)));
				$sub_visible=null;
				}
				if($visible=="role_wise"){

				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,$sub_visible)));

				}elseif($visible=="wing_wise"){

				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,$sub_visible)));

				}elseif($visible=="group_wise"){

				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,$sub_visible)));

				}
			
			$sub_visible=explode(",",$sub_visible);
			
			
			
			////////////////////  Start email code ////////////////////////////
			
			foreach($receivers as $user_id=>$data)
			{
				 $to = @$data['email'];
				 $d_user_id = (int)@$user_id;	
				 $da_user_id[]=$d_user_id;		
				 
				
	$message_web='<table  align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
			<tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								<tr>
									<td colspan="2">
										<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
										<tbody>
										<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										<tr>
										<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
										<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
										<td width="100%"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px"><span style="color:#00a0e3">Housing</span><span style="color:#777776">Matters</span></a></td>
										<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
											
										</td>
										</tr>
										<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										</tbody>
										</table>
									</td>
								</tr>
								
									
								
						</tbody>
					</table>
					
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><p><center><b>'.$society_name.'</b></center></p> </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Type:</b> [ '.$moc .' Meeting ]  </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Title:</b> '.$subject .' </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Date of Notice:</b> '.$current_date.'  </span> 
										</td>
																
								</tr>
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										 
												<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
												<tr class="tr_heading" style="background-color:#00A0E3;color:white;">
												<td width="10%">Meeting ID</td>
												<td width="20%">Date of Meeting</td>
												<td width="10%">Time</td>
												<td width="60%">Location</td>
												</tr>
												<tr class="tr_content" style="background-color:#E9E9E9;">
												<td>'.$gov_invite_me_id.'</td>
												<td>'.$date.'</td>
												<td>'.$time.'</td>
												<td>'.$location.'</td>

												</tr>
												</table>
										
										</td>
																
								</tr>
								
								
								
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p><b>Covering Note:</b><br/>
												<p>'.$covering_note.'</p>
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p> <b>	Agenda to be discussed: </b></p><br/>
														<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
														<tr style="background-color:#00A0E3;color:white;">
														<td>Time</td>
														<td>Meeting Agenda</td>

														</tr>';
														 $jj=0;
														foreach($message as $ddd)
														{	$jj++;

														$message_web.='<tr>
														<td width="10%">'.urldecode($ddd[2]).'</td>
														<td>'.$jj.'. '.urldecode($ddd[0]). ' <br/> '.urldecode($ddd[1]).'</td>
														</tr>';	
														 } 
														 $message_web.='</table><br/>
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p><b>Any other Note:</b><br/>
												<p>'.$any_other.'</p>	
										</td>
																
								</tr>
								
								
								<tr>
									<td style="padding:5px;" width="100%" align="left">
											<span > 
													For  '.$society_name.' .<br/>
													'.$user_name.'<br/>
													
											</span>
									</td>
																
								</tr>
					
					</table>
					
				</td>
			</tr>

        </tbody>
</table>';
					
				if(!empty($to)){	
					@$title.= '['. $society_name . ']  - '.'Notice of '.$moc.' Meeting scheduled'.'  on   '.''.$date.'';
					$this->send_email($to,'support@housingmatters.in','HousingMatters',$title,$message_web,$reply);
					$title="";
				}
			}
			
			/////////////////////  End code /////////////////////////////
			
			$this->loadmodel('governance_invite');
			$multipleRowData = Array( Array("governance_invite_id" => $email_id,"message"=>$message,"user_id"=>$s_user_id,"date"=>$date,"time"=>$time,"society_id"=>$s_society_id,"subject"=>$subject,"type"=>$Invitations_type,"file"=>@$file_name,"deleted"=>0,'user'=>$da_user_id,'location'=>$location,'visible'=>$visible,'sub_visible'=>$sub_visible,'meeting_type'=>$type_mettings,'covering_note'=>$covering_note,'agenda_id'=>0,'notice_of_date'=>$current_date,'any_other_note'=>$any_other,'gov_invite_me_id'=>$gov_invite_me_id));
			$this->governance_invite->saveAll($multipleRowData); 
			
			
		}
		
			if(sizeof($report)>0){
			$output=json_encode(array('report_type'=>'error','report'=>$report));
			die($output);
			}

			$output = json_encode(array('type'=>'created', 'text' =>'Invitation successfully submitted'));
			die($output);

	}else{
		
		if($Invitations_type==1){
					$invite_user_multi=$post_data['Invite_user1'];
					$invite_user_multi=explode(",",$invite_user_multi);
					
			////////////////////////////// validation check//////////////////
			
					if($invite_user_multi[0]=='null'){

					$report[]=array('label'=>'multi', 'text' => 'Please select at-least one recipient.');
					}

					if(sizeof($report)>0){
					$output=json_encode(array('report_type'=>'error','report'=>$report));
					die($output);
					}
			
			//////////////////////////////// end ////////////////////////////////
			
			foreach($invite_user_multi as $data){
					$da_user_id[]=(int)$data;
					$user[]=(int)$data;
			}
			
				$this->loadmodel('governance_invite');
				$multipleRowData = Array( Array("governance_invite_id" => $email_id,"message"=>$message,"user_id"=>$s_user_id,"date"=>$date,"time"=>$time,"society_id"=>$s_society_id,"subject"=>$subject,"type"=>$Invitations_type,"file"=>@$file_name,"deleted"=>1,'user'=>$user,'location'=>$location,'meeting_type'=>$type_mettings,'covering_note'=>$covering_note,'agenda_id'=>0,'notice_of_date'=>$current_date,'any_other_note'=>$any_other,'gov_invite_me_id'=>$gov_invite_me_id));
				$this->governance_invite->saveAll($multipleRowData); 
		}
		
		/* if($Invitations_type==2)
		{
			    //$to=$post_data['Invite_user2'];
				 $Invite_group=$post_data['Invite_group'];
				$Invite_group=explode(",",$Invite_group);
				
				
				////////////////////////////// validation check//////////////////
			
					if($Invite_group[0]=='null' || $Invite_group[0]=='' ){

					$report[]=array('label'=>'multi_check', 'text' => 'Please check at-least one ');
					}

					if(sizeof($report)>0){
					$output=json_encode(array('report_type'=>'error','report'=>$report));
					die($output);
					}
			
			//////////////////////////////// end ////////////////////////////////
			foreach($Invite_group as $group_id){
					
					$this->loadmodel('group');
					$conditions=array('group_id'=>(int)$group_id);
					$result_group=$this->group->find('all',array('conditions'=>$conditions));
					foreach($result_group as $data2)
					{
						$userl_group=$data2['group']['users'];
						
						foreach($userl_group as $data3)
						{
							$user[]=(int)$data3;
							
						}
						
						
					}
					
				}

				$user=array_unique($user);
				$user=array_values($user);
				$da_user_id=$user;
			$this->loadmodel('governance_invite');
			$multipleRowData = Array( Array("governance_invite_id" => $email_id,"message"=>$message,"user_id"=>$s_user_id,"date"=>$date,"time"=>$time,"society_id"=>$s_society_id,"subject"=>$subject,"type"=>$Invitations_type,"file"=>@$file_name,"deleted"=>1,'location'=>$location,'meeting_type'=>$type_mettings,'covering_note'=>$covering_note,'user'=>$user,'group_id'=>$Invite_group,'agenda_id'=>0,'notice_of_date'=>$current_date,'any_other_note'=>$any_other,'gov_invite_me_id'=>$gov_invite_me_id));
			$this->governance_invite->saveAll($multipleRowData); 
			
			
			
		} */
		if($Invitations_type==3){
			 $visible=$post_data['visible'];
			$sub_visible=$post_data['sub_visible'];
			
			
			//////////////////// validation //////////////
			
				if($visible=="role_wise"){
					if($post_data['sub_visible']==0){
						$report[]=array('label'=>'rol_wing', 'text' => 'Please select at-least one role');
						}
				}
				if($visible=="wing_wise"){
					if($post_data['sub_visible']==0){
						$report[]=array('label'=>'rol_wing', 'text' => 'Please select at-least one wing');
					}
				}
				if($visible=="group_wise"){
					if($post_data['sub_visible']==0){
						$report[]=array('label'=>'rol_wing', 'text' => 'Please select at-least one group');
					}
				}
				if(sizeof($report)>0){
					$output=json_encode(array('report_type'=>'error','report'=>$report));
					die($output);
					}
			
			///////////////  end /////////////////////////
			
			if($visible=="all_users"){
				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,null)));
				$sub_visible=null;
				}
				if($visible=="role_wise"){

				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,$sub_visible)));

				}elseif($visible=="wing_wise"){

				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,$sub_visible)));

				}elseif($visible=="group_wise"){

				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,$sub_visible)));

				}
			
			$sub_visible=explode(",",$sub_visible);
			foreach($receivers as $data=>$key){
				 //$to = @$key['email'];
				 $d_user_id = (int)@$data;	
				 $da_user_id[]=$d_user_id;	
			}
			
			$this->loadmodel('governance_invite');
			$multipleRowData = Array( Array("governance_invite_id" => $email_id,"message"=>$message,"user_id"=>$s_user_id,"date"=>$date,"time"=>$time,"society_id"=>$s_society_id,"subject"=>$subject,"type"=>$Invitations_type,"file"=>@$file_name,"deleted"=>1,'user'=>$da_user_id,'location'=>$location,'visible'=>$visible,'sub_visible'=>$sub_visible,'meeting_type'=>$type_mettings,'covering_note'=>$covering_note,'agenda_id'=>0,'notice_of_date'=>$current_date,'any_other_note'=>$any_other,'gov_invite_me_id'=>$gov_invite_me_id));
			$this->governance_invite->saveAll($multipleRowData);
			
		}
		$output = json_encode(array('type'=>'created', 'text' =>'Invitation successfully Saved.'));
		die($output);
		
		
 }	
				
}


function governance_invite()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();
	 $s_society_id=$this->Session->read('hm_society_id');
	 $s_user_id=$this->Session->read('hm_user_id');	
	
$this->loadmodel('user');
$conditions1=array("society_id"=>$s_society_id,'user.email'=> array('$ne' => ""),'active'=>'yes');
$this->set('result_users',$this->user->find('all',array('conditions'=>$conditions1))); 

$this->loadmodel('group');
$conditions=array("society_id"=>$s_society_id,'group_show_id'=>0,'delete_id'=>0);
$result_group=$this->group->find('all',array('conditions'=>$conditions)); 
$this->set('result_group',$result_group); 


$this->loadmodel('governance_designation');
$conditions=array("society_id" => $s_society_id);
$gov_result=$this->governance_designation->find('all',array('conditions'=>$conditions));
$this->set('governance_designation_result',$gov_result);

$this->loadmodel('template');
$conditions=array("cat" => 8);
$template_result_agenda=$this->template->find('all',array('conditions'=>$conditions));
$this->set('template_result_agenda',$template_result_agenda);

$this->loadmodel('template');
$conditions=array("cat" => 9);
$template_result_agenda_other=$this->template->find('all',array('conditions'=>$conditions));
$this->set('template_result_agenda_other',$template_result_agenda_other);


	
}

function governance_invite_view()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();
	$s_society_id=$this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');	
	$this->loadmodel('governance_invite');
	$conditions=array('society_id'=>$s_society_id);
    $order=array('governance_invite.governance_invite_id'=> 'DESC');
	$result_gov_inv=$this->governance_invite->find('all',array('conditions'=>$conditions,'order'=>$order));
	$this->set('result_gov_invite',$result_gov_inv);
	foreach($result_gov_inv as $data4)
	{
		$this->seen_notification(40,$data4["governance_invite"]["governance_invite_id"]);
		
	}
}

function governance_invite_draft($invit_id){
	
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
		
	$this->loadmodel('governance_invite');
	$conditions=array('governance_invite_id'=>(int)$invit_id);
	$result_gov_inv=$this->governance_invite->find('all',array('conditions'=>$conditions));
	$this->set('result_gov_invite',$result_gov_inv);
		
}
function governance_invite_submit_draft(){
 
 
 $this->layout=null;	
 $post_data=$this->request->data;

 $s_society_id=$this->Session->read('hm_society_id');
 $s_user_id=$this->Session->read('hm_user_id');
 $current_date=date("d-m-Y");
 $ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip')); 
 $id=(int)$post_data['id'];
 $type_mettings=$post_data['type_mettings'];
 $date=$post_data['date'];
 $time=$post_data['time'];
 $subject=$post_data['subject'];
 $location=$post_data['location'];
 $covering_note=$post_data['covering_note'];
 $any_other_note=$post_data['any_other'];
 $meeting_agenda_time=$post_data['meeting_agenda_time'];
 $meeting_agenda_time=explode(",",$meeting_agenda_time);
 $meeting_agenda_input=$post_data['meeting_agenda_input'];
 $meeting_agenda_input=explode(",",$meeting_agenda_input);
 $meeting_agenda_textarea=$post_data['meeting_agenda_textarea'];
 $meeting_agenda_textarea=explode(",",$meeting_agenda_textarea);
	
	
	    $message="";
		for($z=0;$z<sizeof($meeting_agenda_input);$z++){
			
			$message[]=array($meeting_agenda_input[$z],$meeting_agenda_textarea[$z],$meeting_agenda_time[$z]);
		}
		if($type_mettings==1){ $moc="Managing Committee"; }
		if($type_mettings==2){ $moc="General Body"; }
		if($type_mettings==3){ $moc="Special General Body"; }
		
		
		
		
				$this->loadmodel('governance_invite');	
				$conditions=array('governance_invite_id'=>$id);
				$result_governance_invite=$this->governance_invite->find('all',array('conditions'=>$conditions));
				$invite_user=$result_governance_invite[0]['governance_invite']['user'];
				$file_data=$result_governance_invite[0]['governance_invite']['file'];
				

		
		
				
				$file_name=@$_FILES['file']['name']; 
				if(!empty($file_name)){
					$file=$file_name;
					$file_name=@$_FILES['file']['name'];
					$target = "governances_file/";
					$file_tmp_name =$_FILES['file']['tmp_name'];
					$target=@$target.basename($file_name);
					move_uploaded_file($file_tmp_name,@$target);
				}else{
					if(empty($file_name) and $post_data['edit_attachment']==1){
						
						$file='';
						
					}else{
					   $file=$file_data;
					}
				}
							
				$file_att="";
				if(!empty($file)){
						@$file_att='<br/><a href="'.$ip.'/'.$this->webroot.'governances_file/'.$file.'" download>Download attachment</a>';
				}
		
		
		
		$this->loadmodel('governance_invite');		
		$this->governance_invite->updateAll(array('date'=>$date,'time'=>$time,'subject'=>$subject,'location'=>$location,'meeting_type'=>$type_mettings,'covering_note'=>$covering_note,'any_other_note'=>$any_other_note,'message'=>$message,'deleted'=>0,'notice_of_date'=>$current_date,'file'=>@$file),array('governance_invite_id'=>$id));


		/////////////////////////// Send Email code start/////////////////////////////
		
			$result_society=$this->society_name($s_society_id);
			$society_name=$result_society[0]['society']['society_name'];
			
			$result_user=$this->profile_picture($s_user_id);
			$user_name=$result_user[0]['user']['user_name'];
			$send_reply_member=$result_user[0]['user']['email'];
			if(!empty($send_reply_member)){
				$reply=$send_reply_member;
			}else{
				$reply='donotreply@housingmatters.in';
			}
			
			
			
			
			foreach($invite_user as $data){
				$result_user=$this->profile_picture($data);
				$to=$result_user[0]['user']['email'];
					
	$message_web='<table  align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
			<tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								<tr>
									<td colspan="2">
										<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
										<tbody>
										<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										<tr>
										<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
										<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
										<td width="100%"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px"><span style="color:#00a0e3">Housing</span><span style="color:#777776">Matters</span></a></td>
										<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
											
										</td>
										</tr>
										<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										</tbody>
										</table>
									</td>
								</tr>
								
									
								
						</tbody>
					</table>
					
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><p><center><b>'.$society_name.'</b></center></p> </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Type:</b> [ '.$moc .' Meeting ]  </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Title:</b> '.$subject .' </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Date of Notice:</b> '.$current_date.'  </span> 
										</td>
																
								</tr>
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										 
												<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
												<tr class="tr_heading" style="background-color:#00A0E3;color:white;">
												<td width="10%">Meeting ID</td>
												<td width="20%">Date of Meeting</td>
												<td width="10%">Time</td>
												<td width="60%">Location</td>
												</tr>
												<tr class="tr_content" style="background-color:#E9E9E9;">
												<td>'.$id.'</td>
												<td>'.$date.'</td>
												<td>'.$time.'</td>
												<td>'.$location.'</td>

												</tr>
												</table>
										
										</td>
																
								</tr>
								
								
								
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p><b>Covering Note:</b><br/>
												<p>'.$covering_note.'</p>
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p> <b>	Agenda to be discussed: </b></p><br/>
														<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
														<tr style="background-color:#00A0E3;color:white;">
														<td>Time</td>
														<td>Meeting Agenda</td>

														</tr>';
														 $jj=0;
														foreach($message as $ddd)
														{	$jj++;

														$message_web.='<tr>
														<td width="10%">'.urldecode($ddd[2]).'</td>
														<td>'.$jj.'. '.urldecode($ddd[0]). ' <br/> '.urldecode($ddd[1]).'</td>
														</tr>';	
														 } 
														 $message_web.='</table><br/>
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
												<p><b>Any other Note:</b><br/>
												<p>'.$any_other_note.'</p>	
										</td>
																
								</tr>
								
								
								<tr>
									<td style="padding:5px;" width="100%" align="left">
											<span > 
													For  '.$society_name.' .<br/>
													'.$user_name.'<br/>
													
											</span>
									</td>
																
								</tr>
					
					</table>
					
				</td>
			</tr>

        </tbody>
</table>';
			if(!empty($to)){			
				@$title.= '['. $society_name . ']  - '.'Notice of '.$moc.' Meeting scheduled'.'  on   '.''.$date.'';	
				$this->send_email($to,'support@housingmatters.in','HousingMatters',$title,$message_web,$reply);
				$title="";
			}		
}
			
		//////////////////////// End email code //////////////////////////////////////
		
		
		
		$output = json_encode(array('type'=>'created', 'text' =>'Invitation successfully submitted'));
		die($output);		
}
function governance_invite_view1($id)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	
	 $s_society_id=$this->Session->read('hm_society_id');
		$result_society=$this->society_name($s_society_id);
		foreach($result_society as $data)
		{
			$society_name=$data['society']['society_name'];
			$this->set('society_name',$society_name);
		}
		$this->set('invite_id',$id);
	$this->loadmodel('governance_invite');
	$conditions=array('governance_invite_id'=>(int)$id);
	$result_gov_inv=$this->governance_invite->find('all',array('conditions'=>$conditions));
	
	$this->set('result_gov_invite',$result_gov_inv);

	
}

function governace_invite_pdf()
{
	$this->layout=null;
	$invite_id=$this->request->query('con');
	$s_society_id=$this->Session->read('hm_society_id');
		$result_society=$this->society_name($s_society_id);
		foreach($result_society as $data)
		{
			$society_name=$data['society']['society_name'];
			$this->set('society_name',$society_name);
		}
	$this->loadmodel('governance_invite');
	$conditions=array('governance_invite_id'=>(int)$invite_id);
	$result_gov_inv=$this->governance_invite->find('all',array('conditions'=>$conditions));
	$this->set('result_gov_invite',$result_gov_inv);	

}


function governance_minutes()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('user');
	$conditions1=array("society_id"=>$s_society_id,'active'=>'yes');
	$this->set('result_users',$this->user->find('all',array('conditions'=>$conditions1))); 
	

	$this->loadmodel('user');
	$conditions1=array("society_id"=>$s_society_id,'user.email'=> array('$ne' => ""),'active'=>'yes');
	$this->set('result_users_new',$this->user->find('all',array('conditions'=>$conditions1))); 
	
	
	$this->loadmodel('group');
	$conditions=array("society_id"=>$s_society_id,'group_show_id'=>0,'delete_id'=>0);
	$result_group=$this->group->find('all',array('conditions'=>$conditions)); 
	$this->set('result_group',$result_group); 

	
	
	
	
	$this->loadmodel('governance_invite');
	$conditions1=array("society_id"=>$s_society_id,'agenda_id'=>0,'deleted'=>0);
	$order=array('governance_invite.governance_invite_id'=>'DESC');
	$result_gover=$this->governance_invite->find('all',array('conditions'=>$conditions1,'order'=>$order));
	$this->set('result_governance_invite',$result_gover);
	foreach($result_gover as $data)
	{
		 $gov_invite_id=@$data['governance_invite']['governance_invite_id'];
		 $this->set('gov_invite_id2',@$gov_invite_id);
	}
	
	
	
$this->loadmodel('template');
$conditions=array("cat" => 8);
$template_result_agenda=$this->template->find('all',array('conditions'=>$conditions));
$this->set('template_result_agenda',$template_result_agenda);

$this->loadmodel('template');
$conditions=array("cat" => 9);
$template_result_agenda_other=$this->template->find('all',array('conditions'=>$conditions));
$this->set('template_result_agenda_other',$template_result_agenda_other);

}



function governance_minute_ajax()
{
	$this->layout='blank';
	$meeting_id=(int)$this->request->query('con');
	//$this->set('key',$key);
	//$meeting_id=(int)$this->request->query('con1');
	$this->loadmodel('governance_invite');
	$conditions1=array("governance_invite_id"=>$meeting_id);
	$result_gover=$this->governance_invite->find('all',array('conditions'=>$conditions1));
	$this->set('result_governance_invite',$result_gover);
}
function minute_view()
{
	
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('governance_minute');
	$conditions=array('society_id'=>$s_society_id);
    $order=array('governance_minute.governance_minute_id'=> 'DESC');
	$result_gov_inv=$this->governance_minute->find('all',array('conditions'=>$conditions,'order'=>$order));
	$this->set('result_gov_inv',$result_gov_inv);
}

function governace_invite_meeting($id){
	
	$this->loadmodel('governance_invite');
	$conditions=array('governance_invite_id'=>(int)$id);
	return $this->governance_invite->find('all',array('conditions'=>$conditions));
}

function governace_minute_meeting($id){
	
	$this->loadmodel('governance_minute');
	$conditions=array('meeting_id'=>(int)$id);
	return $this->governance_minute->find('all',array('conditions'=>$conditions));
}



function designation_find_by_user($des_id){
	$this->loadmodel('governance_designation');
	$conditions=array('governance_designation_id'=>$des_id);
	$result_desi=$this->governance_designation->find('all',array('conditions'=>$conditions));
		foreach($result_desi as $data){
		return @$data['governance_designation']['designation_name'];
	}
}

function governance_minute_view1($idd){
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	$this->set('governance_minute_id',$idd);
	 $s_society_id=$this->Session->read('hm_society_id');
		$result_society=$this->society_name($s_society_id);
		
		foreach($result_society as $data){
			$society_name=$data['society']['society_name'];
			$this->set('society_name',$society_name);
		}
	$this->loadmodel('governance_minute');
	$conditions=array('governance_minute_id'=>(int)$idd);
	$result_gov_inv=$this->governance_minute->find('all',array('conditions'=>$conditions));
	$this->set('result_gov_minute',$result_gov_inv);

}

function governance_minute_drft_submit_newII(){
	 $post_data=$this->request->data;
	 pr($post_data);
	echo 'hello'; exit;
	
}

function governance_minute_drft_submit_new()
{
	$post_data=$this->request->data;
	$this->ath();
	$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip')); 
	$s_society_id=$this->Session->read('hm_society_id');
	$s_role_id=$this->Session->read('role_id'); 
	$s_user_id=$this->Session->read('hm_user_id');
	$minute_id=(int)$post_data['minute_id'];
	$present_user1=$post_data['present_user'];
	$present_user1=explode(',',$present_user1);
	foreach($present_user1 as $data2){
		$present_user[]=(int)$data2;
	}
	$present_member='';
	foreach($present_user as $data){
						$result_member=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($data)));
						$user_name=$result_member['user_name'];
						$email=$result_member['email'];
						$wing_flat=$result_member['wing_flat'];
						foreach($wing_flat as $wing_flat_name){

						}
						if(!empty($wing_flat_name)){
								 $flat_name='('.$wing_flat_name.')';
								}
								$present_member.=$user_name.' '.$flat_name.' ,';

		}
											
	$result_society=$this->society_name($s_society_id);
	$society_name=$result_society[0]['society']['society_name'];
	$meeting_id=$post_data['meeting_id'];
	$any_other=$post_data['any_other'];
	$minute_agenda=$post_data['minute_agenda'];
	$minute_agenda=explode(',',$minute_agenda);
	$result_governance_invite=$this->governace_invite_meeting($meeting_id);
	foreach($result_governance_invite as $data3){
		$message_1=$data3['governance_invite']['message'];
		$subject=$data3['governance_invite']['subject'];
		$gov_invite_me_id=(int)$data3['governance_invite']['gov_invite_me_id'];
		$date=$data3['governance_invite']['date'];
		$time=$data3['governance_invite']['time'];
		$location=$data3['governance_invite']['location'];
		$notice_of_date=@$data3['governance_invite']['notice_of_date'];
		$type_mettings=(int)@$data3['governance_invite']['meeting_type'];
		
		}
		
		
			if($type_mettings==1){
				$moc="Managing Committee";

			}
			if($type_mettings==2){
				$moc="General Body";

			}
			if($type_mettings==3){
				$moc="Special General Body";

			}
		foreach($message_1 as $key=>$value){
		$value[]=$minute_agenda[$key];
	    $message[]=$value;
		}
	
					
					$this->loadmodel('governance_minute');
					$condition2=array('governance_minute_id'=>$minute_id);
					$result_gov_min=$this->governance_minute->find('all',array('conditions'=>$condition2));
					$file_data=$result_gov_min[0]['governance_minute']['file'];
					$user=$result_gov_min[0]['governance_minute']['user'];
					$file_name=@$_FILES['file']['name']; 
					if(!empty($file_name)){
						$file=$file_name;
						$file_name=@$_FILES['file']['name'];
						$target = "governances_file/";
						$file_tmp_name =$_FILES['file']['tmp_name'];
						$target=@$target.basename($file_name);
						move_uploaded_file($file_tmp_name,@$target);
					}else{
						if(empty($file_name) and $post_data['edit_attachment']==1){
							
							$file='';
							
						}else{
						$file=$file_data;
						}
					}
				

	$this->loadmodel('governance_minute');
	$this->governance_minute->updateAll(array('present_user'=>$present_user,'any_other'=>$any_other,'message'=>$message,'final'=>1),array('governance_minute_id'=>$minute_id));
			if(!empty($file)){
				@$file_att='<br/><a href="'.$ip.'/'.$this->webroot.'governances_file/'.$file.'" download>Download attachment</a>';
			}
			$result_user=$this->profile_picture($s_user_id);
			foreach($result_user as $data3){
				$user_name_session=$data3['user']['user_name'];
				$send_email_member=$data3['user']['email'];
			}
				if(!empty($send_email_member)){
					$reply=$send_email_member;
				}else{
					$reply='donotreply@housingmatters.in';
				}
					
////// start to mail code 


foreach($user as $id){
	$result_user=$this->profile_picture((int)$id);
	$to=$result_user[0]['user']['email'];
	
	$message_web='<table  align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
			<tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								<tr>
									<td colspan="2">
										<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
										<tbody>
										<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										<tr>
										<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
										<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
										<td width="100%"><a href="#150d7894359a47c6_" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px"><span style="color:#00a0e3">Housing</span><span style="color:#777776">Matters</span></a></td>
										<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img class="CToWUd" src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
											
										</td>
										</tr>
										<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
										</tbody>
										</table>
									</td>
								</tr>
								
									
								
						</tbody>
					</table>
					
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
						
								
								<tr>
									<td style="padding:5px;" width="100%" >
											<p><center><b> '.$society_name.' </b></center></p>
									</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Type:</b> [ '.$moc .' Meeting ]  </span> 
										</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										<span style="color:rgb(100,100,99)" align="justify"><b>Meeting Title:</b> '.$subject .' </span> 
										</td>
																
								</tr>
								
								
								<tr>
										<td style="padding:5px;" width="100%" align="left">
										 
												<table  cellpadding="10" width="100%;" border="1" bordercolor="#e1e1e1"  >
												<tr class="tr_heading" style="">
												<td width="10%" style="color:#00A0E3;"><b>Meeting ID</b></td>
												<td width="20%" style="color:#00A0E3;"><b>Date of Meeting</b></td>
												<td width="10%" style="color:#00A0E3;"><b>Time</b></td>
												<td width="60%" style="color:#00A0E3;"><b>Location</b></td>
												</tr>
												<tr class="tr_content" style="">
												<td>'.$gov_invite_me_id.'</td>
												<td>'.$date.'</td>
												<td>'.$time.'</td>
												<td>'.$location.'</td>

												</tr>
												</table>
										
										</td>
																
								</tr>
								
																
								
								<tr>
									<td style="padding:5px;" width="100%" >
											<span><b> Following Members were present: </b></span><br/>
											'.$present_member.'
																						
									</span> </td>
																
								</tr>
								
								<tr>
									<td style="padding:5px;" width="100%" align="left" >
											<span><b> Agenda to be discussed:</b></span>
									</td>
																
								</tr>';
								$message_web.='<tr>
									<td>
									
										<table  cellpadding="5" cellspacing="0" width="100%;"border="1" style="border:1px solid #e5e5e5;">
						
										<tr>
										<td align="" style="color:#00A0E3;" ><b> Agenda </b></td>
										<td align="" style="color:#00A0E3;" ><b> Minutes </b> </td>
										</tr>';
										$jj=0;
										foreach($message as $ddd){	$jj++;
										$message_web.='<tr>
										<td align="left" style="" >'.$jj.'. '.urldecode($ddd[0]). ' <br/> '.urldecode($ddd[1]).'</td>
										<td align="left" style="" >'.urldecode($ddd[3]).'</td>
										</tr>';
										}
										@$message_web.='</table> 
									
									</td>
								
								
								
								</tr>
								
								<tr>
									<td style="padding:5px;" width="100%" align="left" >
											<span><b> Any Other business :</b></span>
											<p align="justify">'.urldecode($any_other).' </p>
									</td>
																
								</tr>		
								<tr>
								<td style="" width="100%" align="left">
									For  '.$society_name.' <br/>
									'.$user_name_session.'<br/>
									'.$file_att.' <br/>
								</td>
								</tr>

					
					
					</table>
					
				</td>
			</tr>

        </tbody>
</table>';

	if(!empty($to)){
		@$title.= '['. $society_name . ']  - '.'Minutes of Agenda'; 
		$this->send_email($to,'support@housingmatters.in','HousingMatters',$title,$message_web,$reply);		
		$title="";
	}
}

//// end code 

$output = json_encode(array('type'=>'created', 'text' =>'Minutes successfully submitted'));
die($output);
	
}

function governance_minute_draft($idd=null)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	//$this->set('governance_minute_id',$idd);
	 $s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('governance_minute');
	$conditions=array('governance_minute_id'=>(int)$idd);
	$result_gov_inv=$this->governance_minute->find('all',array('conditions'=>$conditions));
	$this->set('result_gov_minute',$result_gov_inv);
	
	$this->loadmodel('user');
	$conditions1=array("society_id"=>$s_society_id,'active'=>'yes');
	$this->set('result_users',$this->user->find('all',array('conditions'=>$conditions1))); 
	
}

function governace_minute_pdf(){
	$this->layout=null;	
	$governance_minute_id=$this->request->query('con');
	 $s_society_id=$this->Session->read('hm_society_id');
		$result_society=$this->society_name($s_society_id);
		
		foreach($result_society as $data){
			$society_name=$data['society']['society_name'];
			$this->set('society_name',$society_name);
		}
	$this->loadmodel('governance_minute');
	$conditions=array('governance_minute_id'=>(int)$governance_minute_id);
	$result_gov_inv=$this->governance_minute->find('all',array('conditions'=>$conditions));
	$this->set('result_gov_minute',$result_gov_inv);
	
	
}
function governance_minute_submit()
{
	
	$this->layout=null;
	$post_data=$this->request->data;
	$this->ath();
	$s_society_id=$this->Session->read('hm_society_id');
	$s_role_id=$this->Session->read('role_id'); 
	$s_user_id=$this->Session->read('hm_user_id');
	
	$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip')); 
	$present_user1=$post_data['present_user'];
	$meeting_id=(int)$post_data['meeting_id'];
	$any_other=$post_data['any_other'];
	$Invitations_type=$post_data['Invitations_type'];
	$minute_agenda=$post_data['minute_agenda'];
	$minute_agenda=explode(",",$minute_agenda);
	
			$report=array();
			if(empty($meeting_id)){
			$report[]=array('label'=>'subject', 'text' => 'Please select meeting id');
			}
			
			
	
	     $present_user12=explode(",",$present_user1);
		
			foreach($present_user12 as $data4){
				$present_user[]=(int)$data4;
			}
			if($Invitations_type==1){
				
				$Invite_user1=$post_data['Invite_user1'];
				$Invite_user1=explode(",",$Invite_user1);
				$user_minute=$Invite_user1;
				if($Invite_user1[0]=='null'){

					$report[]=array('label'=>'multi12', 'text' => 'Please select at-least one recipient.');
					}
					
			}
			/*if($Invitations_type==2){
				
				$Invite_group=$post_data['Invite_group'];
				$Invite_group=explode(",",$Invite_group);
				if($Invite_group[0]=='null' || $Invite_group[0]=='' ){

					$report[]=array('label'=>'multi_check', 'text' => 'Please check at-least one ');
					}
					if(sizeof($report)>0){
					$output=json_encode(array('report_type'=>'error','report'=>$report));
					die($output);
					}	
					
				
				foreach($Invite_group as $group_id){
					$this->loadmodel('group');
					$conditions=array('group_id'=>(int)$group_id);
					$result_group=$this->group->find('all',array('conditions'=>$conditions));
					foreach($result_group as $data2){
						$userl_group=$data2['group']['users'];
						
						foreach($userl_group as $data3){
							
							$user[]=(int)$data3;
							
						}
						
						
					}
					
				}
			
				$user=array_unique($user);
				$user_minute=array_values($user);
				
			} */
			if($Invitations_type==3){
					$visible=$post_data['visible'];
					$sub_visible=$post_data['sub_visible'];
					

			//////////////////// validation //////////////

			if($visible=="role_wise"){
				if($post_data['sub_visible']==0){
					$report[]=array('label'=>'wing_check', 'text' => 'Please select at-least one role');
					}
			}
			if($visible=="wing_wise"){
				if($post_data['sub_visible']==0){
						$report[]=array('label'=>'wing_check', 'text' => 'Please select at-least one wing');
				  }
			}
			if($visible=="group_wise"){
				if($post_data['sub_visible']==0){
					$report[]=array('label'=>'wing_check', 'text' => 'Please select at-least one group');
					}
			}
			if(sizeof($report)>0){
			$output=json_encode(array('report_type'=>'error','report'=>$report));
			die($output);
			}

			/////////////// end /////////////////////////

				if($visible=="all_users"){
				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,null)));
				$sub_visible=null;
				}
				if($visible=="role_wise"){

				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,$sub_visible)));

				}elseif($visible=="wing_wise"){

				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,$sub_visible)));

				}elseif($visible=="group_wise"){

				$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($visible,$sub_visible)));

				}
				
					
					foreach($receivers as $data=>$key){
					$user_minute[]=(int)$data;
					}
				$sub_visible=explode(",",$sub_visible);		
					
			}
		if(sizeof($report)>0){
			$output=json_encode(array('report_type'=>'error','report'=>$report));
			die($output);
			}	
			
		$result_society=$this->society_name($s_society_id);
		foreach($result_society as $data2){
			$society_name=$data2['society']['society_name'];
			
		}
		$result_user=$this->profile_picture($s_user_id);
		foreach($result_user as $data3){
			$user_name=$data3['user']['user_name'];
			
		}
		if(isset($_FILES['file'])){
				$target = "governances_file/";
				  $file_name=@$_FILES['file']['name']; 
				$file_tmp_name =$_FILES['file']['tmp_name'];
				$target=@$target.basename($file_name);
				move_uploaded_file($file_tmp_name,@$target);
				}
				$file_att="";
				if(!empty($file_name)){
				@$file_att='<br/><a href="'.$ip.'/'.$this->webroot.'governances_file/'.$file_name.'" download>Download attachment</a>';
				}

	
			$this->loadmodel('governance_invite');
			$conditions=array("governance_invite_id"=>$meeting_id);
			$result_gov_int=$this->governance_invite->find("all",array('conditions'=>$conditions));
				foreach($result_gov_int as $data){
					
					//$user=$data['governance_invite']['user'];
					$message1=$data['governance_invite']['message'];
					
				}
				
				foreach($message1 as $key=> $value){
					
					$value[]=$minute_agenda[$key];
					$message[]=$value;
								
					
				}
				
				//$user1=array_merge($user,$present_user);
				//$user=array_unique($user1);
				//$user=array_values($user);
				
				
						
				
				$date=date("d-m-y");
				$minut_id=$this->autoincrement('governance_minute','governance_minute_id');
				$this->loadmodel('governance_minute');
				$multipleRowData = Array( Array("governance_minute_id" => $minut_id,"message"=>$message,"user_id"=>$s_user_id,"society_id"=>$s_society_id,"file"=>@$file_name,'user'=>$user_minute,'meeting_id'=>$meeting_id,'present_user'=>$present_user,'date'=>$date,'invitation_type'=>$Invitations_type,'visible'=>@$visible,'sub_visible'=>@$sub_visible,'any_other'=>$any_other,'final'=>0));
				$this->governance_minute->saveAll($multipleRowData);
	
	////////////////  update  ///////////////////////////////////////////
	
				$this->loadmodel('governance_invite');
				$this->governance_invite->updateAll(array('agenda_id'=>1),array('governance_invite_id'=>$meeting_id));
			
	/////////////////// // End //////////////////////////
	
	////////////////////////////// Email code start //////////////////////////////////
	/*
				foreach($user as $data){
					$result_user=$this->profile_picture($data);
					$to=@$result_user[0]['user']['email'];
					
					   @$message_web="<div>
						<img src='$ip".$this->webroot."/as/hm/hm-logo.png'/><span  style='float:right; margin:2.2%;'>
						<span class='test' style='margin-left:5px;'><a href='https://www.facebook.com/HousingMatters.co.in' target='_blank' ><img src='$ip".$this->webroot."/as/hm/fb.png'/></a></span>
						<a href='#' target='_blank'><img src='$ip".$this->webroot."/as/hm/tw.png'/></a><a href'#'><img src='$ip".$this->webroot."/as/hm/ln.png'/ class='test' style='margin-left:5px;'></a></span>
						<br/><br/>
						<p><center><b>[$society_name]</b></center></p>
						<div>
						<p> <b>	Agenda to be discussed: </b></p>
						<table  cellpadding='10' width='100%;' border='1' bordercolor='#e1e1e1'  >
						<tr class='tr_heading' style='background-color:#00A0E3;color:white;'>
						<td>Minutes</td>
						</tr>";
						$jj=0;
						foreach($message as $ddd){	$jj++;

							$message_web.="<tr>
							
							<td>".$jj.". ".urldecode($ddd[0]). " <br/> ".urldecode($ddd[1])."</td>
							</tr>";	
						}
						$message_web.="</table>
						</div>
						<br/>
						For [ $society_name ].<br/>
						$user_name<br/>
						$file_att <br/>
						</div>";
						@$title.= '['. $society_name . ']';	
						$this->send_email($to,'support@housingmatters.in','HousingMatters',$title,$message_web,'donotreply@housingmatters.in');
						$title="";
						
				}
	*/
	
	//////////////////////////////// End ////////////////////////////////////////
	
	$output = json_encode(array('type'=>'created', 'text' =>'Minutes successfully submitted'));
	die($output);
	
	
}

function governance_assign_user()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('user');
	$conditions2=array("society_id"=>$s_society_id,'active'=>'yes');
	$result_user=$this->user->find('all',array('conditions'=>$conditions2));
	//pr($result_user);
	
	foreach($result_user as $data){
				$user_id=$data['user']['user_id'];
				$user_name=$data['user']['user_name'];
				$designation_id=@$data['user']['designation_id'];
				$this->loadmodel('user_flat');
				$conditions1=array("user_id"=>$user_id);
				$result_user_flat=$this->user_flat->find('all',array('conditions'=>$conditions1));
				foreach($result_user_flat as $data){
							$user_flat_id=$data["user_flat"]["user_flat_id"];
							$wing=@$data["user_flat"]["wing"];
							$flat=@$data["user_flat"]["flat"];

							$this->loadmodel('wing');
							$conditions=array("wing_id"=>$wing);
							$wing_info=$this->wing->find('all',array('conditions'=>$conditions));
							@$wing_name=$wing_info[0]["wing"]["wing_name"];

							$this->loadmodel('flat');
							$conditions=array("flat_id"=>$flat);
							$flat_info=$this->flat->find('all',array('conditions'=>$conditions));
							@$flat_name=ltrim($flat_info[0]["flat"]["flat_name"],'0');
							$flats=$wing_name.' - '.$flat_name;
					}
				
				$this->loadmodel('user_role');
				$conditions3=array("user_id"=>$user_id,'role_id'=>2);
				$result_user_role=$this->user_role->find('all',array('conditions'=>$conditions3));
				if(!empty($result_user_role)){
					$result_users_com[]=array('user_name'=>$user_name,'wing_flat'=>$flats,'user_id'=>$user_id,'user_flat_id'=>$user_flat_id,'designation_id'=>$designation_id);
				}
				
	}
	if(empty($result_users_com)){
			$result_users_com=array();
	}
	$this->set('result_users_com',$result_users_com); 
	$this->loadmodel('governance_designation');
	$conditions=array("society_id" => $s_society_id);
	$gov_result=$this->governance_designation->find('all',array('conditions'=>$conditions));
	$this->set('governance_designation_result',$gov_result);
	if(isset($this->request->data['send'])) {

			foreach ($result_users_com as $collection){
				
				$user_id=$collection["user_id"];
				$designation=(int)$this->request->data['designation'.$user_id];	
					if($designation!=0){
						$this->loadmodel('user');
						$this->user->updateAll(array('designation_id'=>$designation),array('user_id'=>$user_id));
					}
					else{
						$this->loadmodel('user');
						$this->user->updateAll(array('designation_id'=>$designation),array('user_id'=>$user_id));

					}	
			}
			
			
	    ?>
		
		<!----alert-------------->
		<div class="modal-backdrop fade in"></div>
		<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
		<div class="modal-body" style="font-size:16px;">
		Successfully assign to designation role.
		</div> 
		<div class="modal-footer">
		<a href="governance_assign_user" class="btn green">OK</a>
		</div>
		</div>
		<!----alert-------------->
		
		
		<?php
	
	}
}


function designation_edit()
{
	$this->layout='blank';
	$designation_id=(int)$this->request->query('d_id');
	 $edit=(int)$this->request->query('edit');
	 $this->set('edit',$edit);
	if($edit==0)
	{
	$this->loadmodel('governance_designation');
	$conditions=array("governance_designation_id" => $designation_id);
	$des_result=$this->governance_designation->find('all', array('conditions' => $conditions));
	$this->set('des_result',$des_result);
	}
	if($edit==1)
	{
	 $des=$this->request->query('des');	
	 $this->loadmodel('governance_designation');
	 $this->governance_designation->updateAll(array('designation_name'=>$des),array('governance_designation.governance_designation_id'=>$designation_id));
		
	}
	
}
function governance_designation_ajax()
{
	$this->layout=null;	
	$post_data=$this->request->data;
	$s_society_id=$this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	$date=date('d-m-Y');
	$time = date(' h:i a', time());	
	$designation = htmlentities($post_data['designation']);
	$report = array();
	if(empty($designation)){
	$report[]=array('label'=>'win', 'text' => 'Please Fill designation Name');
	}
				
	if(sizeof($report)>0)
	{
	$output=json_encode(array('report_type'=>'error','report'=>$report));
	die($output);
	}
	
	
	$this->loadmodel('governance_designation');
	$governance_designation_id=$this->autoincrement('governance_designation','governance_designation_id');
	$this->governance_designation->saveAll(array('governance_designation_id'=>$governance_designation_id,'society_id'=>$s_society_id,'user_id'=>$s_user_id,'date'=>$date,'time'=>$time,'designation_name'=>$designation));

$output=json_encode(array('report_type'=>'publish','report'=>'Designation Inserted Successfully'));
die($output);
	
}
//////////////////////////  end deginations ////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////

	
/////////////////////////////////////////////////////start groups//////////////////////
////////////////////////////////////////////////////////////////////////////////////////
function groups_new()
{
if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
$this->ath();
$this->check_user_privilages();
$s_user_id=$this->Session->read('hm_user_id'); 
$s_society_id=$this->Session->read('hm_society_id'); 

if (isset($this->request->data['add'])) 
{
	$group_name=$this->request->data['group_name'];

	$this->loadmodel('group');
	$conditions=array("society_id"=>$s_society_id,"group_name"=>$group_name);
	$group_duplicate=$this->group->find('count',array('conditions'=>$conditions));

	
	if(!empty($group_name) and ($group_duplicate==0))
	{
	$group_id=$this->autoincrement('group','group_id');
	$this->loadmodel('group');
	$multipleRowData = Array( Array("group_id" => $group_id,"group_name"=>$group_name,"society_id"=>$s_society_id,'group_show_id'=>0,"users"=>array(),'delete_id'=>0));
	$this->group->saveAll($multipleRowData); 
	$this->response->header('Location', 'groupview/'.$group_id);
	
	$this->Session->write('group_status', 1);
	}
	else{
		$this->set('error_addgroup','Group name should not be duplicate.');
	}
}

$this->loadmodel('group');
$conditions=array("society_id"=>$s_society_id,'group_show_id'=>0,'delete_id'=>0);
$order=array('group.group_id'=>'DESC');
$this->set('result_group',$this->group->find('all',array('conditions'=>$conditions,'order'=>$order))); 
}

function groupview($gid=null) 
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	
	$this->ath();
	//$this->check_user_privilages();
	$s_user_id=$this->Session->read('hm_user_id'); 
	$s_society_id=$this->Session->read('hm_society_id'); 
	$gid=(int)$gid;
	$this->set('gid',$gid);
	$group_name=$this->fetch_group_name_from_gruop_id($gid);
	$this->set('group_name',$group_name);
	
	if (isset($this->request->data['update_members'])) 
	{
		$this->loadmodel('user');
		$conditions=array("society_id"=>$s_society_id,"active"=>"yes");
		$order=array('user.user_name'=> 'ASC');
		$all_users=$this->user->find('all',array('conditions'=>$conditions,'order'=>$order));
		
		$members=array();
		foreach($all_users as $user)
		{
		
			$value=@$this->request->data['user'.$user['user']['user_id']];
			if(!empty($value)) { $members[]=$user['user']['user_id']; }
		}
		
		$this->loadmodel('group');
		$this->group->updateAll(array("users" =>$members),array("group_id" => $gid));
	}
	
	$this->loadmodel('group');
	$conditions=array("group_id" => $gid);
	$result_group_info=$this->group->find('all',array('conditions'=>$conditions));
	
	$result_group_info=$result_group_info[0]['group']['users'];
	$this->loadmodel('user');
	$conditions=array("society_id"=>$s_society_id,"active"=>"yes");
	$order=array('user.user_name'=> 'ASC');
	$users=$this->user->find('all',array('conditions'=>$conditions,'order'=>$order));
	$this->set('result_group_info',$result_group_info);
	$this->set('all_users',$users);
}

function group_delete(){
	
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$id=$this->request->query('con'); 
	$this->ath();
	$s_user_id=$this->Session->read('hm_user_id'); 
	$s_society_id=$this->Session->read('hm_society_id'); 
	$this->loadmodel('group');
	$this->group->updateAll(array("delete_id" =>1),array("group_id" => (int)$id));
	$this->response->header('Location', 'groups_new');
	
}

function fetch_group_name_from_gruop_id($group_id)
{


$this->loadmodel('group');
$conditions=array("group_id" => $group_id);
$result_group_name=$this->group->find('all',array('conditions'=>$conditions));

foreach ($result_group_name as $collection) 
{
return $group_name=$collection['group']['group_name'];
}
}


}

?>