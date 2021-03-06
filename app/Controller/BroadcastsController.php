<?php
App::import('Controller', 'Hms');
class BroadcastsController extends HmsController {
var $helpers = array('Html', 'Form','Js');
public $components = array(
'Paginator',
'Session','Cookie','RequestHandler'
);


var $name = 'Broadcasts';

function check_sms_schedule_time(){
	
date_default_timezone_set('Asia/Kolkata');		
 $time=$this->request->data['time']; 
 $date=$this->request->data['date'];

$date_new=date("d-m-Y");

/// validation 

  $y_date=date("Y-m-d",strtotime($date));
 
   $y_date2=date("Y-m-d h:i A",strtotime($date ." ".$time));
  $date_fill=strtotime($y_date2);

  $time_plus=date('h:i A',strtotime('+15 minutes'));
 
    $y_datef=date("Y-m-d h:i A",strtotime($date_new ." ".$time_plus));

 $current= strtotime($y_datef);

 if($current<$date_fill){
	echo"true";
 }else{
	echo"false"; 
 }	
 exit;

	
}


function sms_schedule_cancel(){
	
		 $g_id=$this->request->query('g_id');
		$id=(int)$this->request->query('id');
		$this->ath();
		$s_user_id=$this->Session->read('hm_user_id'); 
		$s_society_id=$this->Session->read('hm_society_id'); 
		$this->loadmodel('society');
		$conditions=array('society_id'=>$s_society_id);
		$result_society=$this->society->find('all',array('conditions'=>$conditions));
		
		$this->loadmodel('sms');
		$conditions=array('sms_id'=>$id);
		$result_sms=$this->sms->find('all',array('conditions'=>$conditions));
		
		$send_sms_count=$result_sms[0]['sms']['send_sms_count'];
		$sms_credit=$result_society[0]['society']['sms_credit'];
		$remaining_sms=$sms_credit-$send_sms_count;
				
		$r_sms=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_sms_ip')); 
		$working_key=$r_sms->working_key;
		$sms_sender=$r_sms->sms_sender; 
		if(!empty($g_id)){
			$ge=file_get_contents('http://api-alerts.solutionsinfini.com/v4/?method=sms.schedule&api_key='.$working_key.'&groupid='.$g_id); 
		}
	
	 
	  $find_froup=json_decode($ge);	
	 
		  if($find_froup->status=='A432'){
			  $status='completed';
		  }
		if($find_froup->status=='OK'){
			$current_date=date('d-m-Y');
			$current_time=date('h:i:a',time());
			$this->loadmodel('sms');
			$this->sms->updateAll(array('cancel_sms_date'=>$current_date,'cancel_sms_time'=>$current_time,'cancel_sms_status'=>'done','cancel_sms_message'=>$find_froup->message,'cancel_sms_by'=>$s_user_id,'send_sms_count'=>0,'status'=>'Canceled'),array('sms_id'=>$id));
						
			$this->society->updateAll(array('sms_credit'=>$remaining_sms),array('society_id'=>$s_society_id));
			
		 }else{
			$this->sms->updateAll(array('status'=>$status),array('sms_id'=>$id)); 
		 }
		 
	     $this->response->header('Location', 'message_view');
	
}

//start Message//
function message()
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

		$this->loadmodel('user');
		$conditions=array("society_id"=>$s_society_id,'user.mobile'=>array('$ne'=>""));
		$this->set('result_users',$this->user->find('all',array('conditions'=>$conditions))); 

		$this->loadmodel('society');
		$conditions=array("society_id"=>$s_society_id);
		$result_society=$this->society->find('all',array('conditions'=>$conditions));
		$sms_s_count=(int)@$result_society[0]['society']['sms_credit'];
		$count_sms=(int)@$result_society[0]['society']['sms_credit'];
		$sms_limit=(int)@$result_society[0]['society']['sms_limit'];
		$this->set(compact('count_sms'));
		$this->set(compact('sms_limit'));
		
	 
		
		
		/*$this->loadmodel('group');
		$conditions=array("society_id"=>$s_society_id);
		$result_group=$this->group->find('all',array('conditions'=>$conditions)); 
		$this->set('result_group',$result_group); */
		/*
		$this->loadmodel('role');
		$conditions=array("society_id" => $s_society_id);
		$role_result=$this->role->find('all',array('conditions'=>$conditions));
		$this->set('role_result',$role_result);
		$this->loadmodel('wing');
		$wing_result=$this->wing->find('all');
		$this->set('wing_result',$wing_result);*/


$this->loadmodel('template');
$conditions=array("cat"=>1);
$this->set('result_template1',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>2);
$this->set('result_template2',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>3);
$this->set('result_template3',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>4);
$this->set('result_template4',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>5);
$this->set('result_template5',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>6);
$this->set('result_template6',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>7);
$this->set('result_template7',$this->template->find('all',array('conditions'=>$conditions))); 
$sms_sount_total=0;
if(isset($this->request->data['send'])) 
{
	
	
	$radio=$this->request->data['radio'];
	$s_date=$this->request->data['date'];

	$ti=$this->request->data['time']; 
	$t2=date('h:ia',strtotime($ti)); 
	$store_time=$ti;


$date=date("d-m-y");
$date_new=date("d-m-Y");
$time=date('h:i:a',time());

/// validation 

  $y_date=date("Y-m-d",strtotime($s_date));
 
   $y_date2=date("Y-m-d h:i A",strtotime($s_date ." ".$ti));
  $date_fill=strtotime($y_date2);

  $time_plus=date('h:i A',strtotime('+15 minutes'));
 
    $y_datef=date("Y-m-d h:i A",strtotime($date_new ." ".$time_plus));

 $current= strtotime($y_datef);

 if($current<$date_fill){
	
 }else{
	goto z; 
 }

$massage=$this->request->data['massage'];
$massage_str=str_replace(' ', '+', $massage);


$result_user_info=$this->requestAction(array('controller'=>'Fns','action'=>'user_info_via_user_id'), array('pass'=>array((int)$s_user_id)));
foreach ($result_user_info as $collection2){
$name=$collection2["user"]["user_name"];
$sender_email=$collection2["user"]["email"];
$sender_mobile=$collection2["user"]["mobile"];
}
$result_user_flat=$this->requestAction(array('controller'=>'Fns','action'=>'user_flat_info_via_user_id'),array('pass'=>array($s_user_id)));
foreach($result_user_flat as $data)
{
@$wing=@$data["user_flat"]["wing"];
@$flat=@$data["user_flat"]["flat"];	
}
//$ti="05:00pm";
$r_sms=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_sms_ip')); 
$working_key=$r_sms->working_key;
$sms_sender=$r_sms->sms_sender; 
$sms_allow=(int)$r_sms->sms_allow;
		if($radio==1){
		$multi=$this->request->data['multi'];
		$multi[]="$s_user_id,$sender_mobile";

		$multi=array_unique($multi);
	
		for($i=0; $i<sizeof($multi); $i++)
		{
		$multi_new=$multi[$i];
		$ex = explode(",", $multi_new);
		$mobile[]=$ex[1];
		$user[]=$ex[0];
		}
		 $mobile_im=implode(",", $mobile);
		
		//$s_date_ex0.$s_date_ex1.$s_date_ex2.$time_h.$time_m;
		if($sms_allow==1){ 
			$sms_count=$this->check_sms_count($massage_str,$multi);
			
			$allow= $this->check_sms_allow_for_generate($sms_limit,$sms_s_count,$sms_count);
			if($allow=='no'){
				goto a;
			}
		
		
		//$payload = file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$mobile_im.'&message='.$massage_str.'&time='.$s_date_ex0.$s_date_ex1.$s_date_ex2.$time_h.$time_m.'&format=json');
		
		$payload = file_get_contents('http://alerts.sinfini.com/api/v3/index.php?method=sms&api_key='.$working_key.'&sender='.$sms_sender.'&to='.$mobile_im.'&message='.$massage_str.'&time='.$y_date.$t2);
				
		}
		$find_froup=json_decode($payload);	
		//pr($find_froup);
		$group_id=$find_froup->data->group_id;
		
		$sms_id=$this->autoincrement('sms','sms_id');
		$this->loadmodel('sms');
		$multipleRowData=Array( Array("sms_id"=>$sms_id,"text"=>$massage,"user_id"=>$user,"date"=>$date,"time"=>$time,"society_id"=>$s_society_id,"type"=>1,"deleted"=>0,"send_sms_time"=>$store_time,"send_sms_count"=>$sms_count,'send_sms_date'=>$s_date,"group_id"=>$group_id,"s_user_id"=>$s_user_id));
		$this->sms->saveAll($multipleRowData);
		}

if($radio==3)
{
$visible=$this->request->data['send_to'];

	if($visible=='all_users'){
	 $sub_visible=0;
	}
	if($visible=='role_wise'){
	$sub_visible=$this->request->data['roles'];	
	$sub_visible=implode(',',$sub_visible);
	}
	if($visible=='wing_wise'){
	$sub_visible=$this->request->data['wings'];	
	$sub_visible=implode(',',$sub_visible);
	}
	if($visible=='group_wise'){
	$sub_visible=$this->request->data['groups'];	
	$sub_visible=implode(',',$sub_visible);
	}

$recieve_info=$this->requestAction(array('controller'=>'Fns','action'=>'sending_option_results'), array('pass'=>array($visible,$sub_visible)));
	
$mobile_array=array();	
$user_id_array=array();
foreach($recieve_info as $user_id=>$data){
	$mobile_new=@$data['mobile'];
	if(!empty($mobile_new)){
		$mobile_array[]=@$mobile_new;	
		$user_id_array[]=$user_id;
	}
}
$user_id_array=array_unique($user_id_array);	
$mobile_array=array_unique($mobile_array);	
$mobile_array_implode = implode(',',$mobile_array);



	$r_sms=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_sms_ip'));
	$working_key=$r_sms->working_key;
	$sms_sender=$r_sms->sms_sender; 
	$sms_allow=(int)$r_sms->sms_allow;
	if($sms_allow==1){
	    $sms_count=$this->check_sms_count($massage_str,$user_id_array);
	
    	$allow= $this->check_sms_allow_for_generate($sms_limit,$sms_s_count,$sms_count);
			if($allow=='no'){
				goto a;
			}
		
	//$payload = file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$mobile_array_implode.'&message='.$massage_str.'&time='.$s_date_ex0.$s_date_ex1.$s_date_ex2.$time_h.$time_m);
		
	
	$payload = file_get_contents('http://alerts.sinfini.com/api/v3/index.php?method=sms&api_key='.$working_key.'&sender='.$sms_sender.'&to='.$mobile_array_implode.'&message='.$massage_str.'&time='.$y_date.$t2);
	
	}
	
   $find_froup=json_decode($payload);	
   $group_id=$find_froup->data->group_id;
	$sms_id=$this->autoincrement('sms','sms_id');
	$this->loadmodel('sms');
	$multipleRowData = Array( Array("sms_id" => $sms_id,"text"=>$massage,"user_id"=>$user_id_array,"date"=>$date,"time"=>$time,"type"=>1,"society_id"=>$s_society_id,"deleted"=>0,"send_sms_count"=>$sms_count,'send_sms_date'=>$s_date,"send_sms_time"=>$store_time,"group_id"=>$group_id,"s_user_id"=>$s_user_id));	
	$this->sms->saveAll($multipleRowData);
}
	 $sms_s_count+=$sms_count;
     $this->loadmodel('society');
	 $this->society->updateAll(array('sms_credit'=>$sms_s_count),array('society_id'=>$s_society_id));
	
?>
<!----alert-------------->
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body" style="font-size:16px;">
Your SMS has been Sent.
</div> 
<div class="modal-footer">
<a href="message_view" class="btn green">OK</a>
</div>
</div>
<!----alert-------------->
<?php	

a: 
	if($allow=='no'){
	?>
	<!----alert-------------->
	<div class="modal-backdrop fade in"></div>
	<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-body" style="font-size:16px;">
	Your sms pack limit is expired. Kindly renew it from housingmatters portal.
	</div> 
	<div class="modal-footer">
	<a href="message_view" class="btn green">OK</a>
	</div>
	</div>
	<!----alert-------------->

<?php	}
z: 
}


}




function message_view()
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
 
 ///SMS COUNT
    $count_sms=0;
	$this->loadmodel('society');
	$conditions=array("society_id"=>$s_society_id);
	$result_sms=$this->society->find('all',array('conditions'=>$conditions));
	$count_sms=(int)@$result_sms[0]['society']['sms_credit'];
	$sms_limit=(int)@$result_sms[0]['society']['sms_limit'];
	$this->set(compact('count_sms'));
	$this->set(compact('sms_limit'));
	 
//////

	 
$this->loadmodel('sms');
$conditions=array("society_id"=>$s_society_id,"deleted"=>0);
$order=array('sms.sms_id'=>'DESC');
$this->set('result_sms',$this->sms->find('all',array('conditions'=>$conditions,'order'=>$order))); 
}

function message_view_ajax()
{
$this->layout='blank';
$s_user_id=$this->Session->read('user_id'); 
$s_society_id=$this->Session->read('society_id'); 

$id=(int)$this->request->query('id');

$this->loadmodel('sms');
$conditions=array("sms_id"=>$id);
$this->set('result_smsview',$this->sms->find('all',array('conditions'=>$conditions))); 

}

//Start EMAIL//
function email()
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

	$this->loadmodel('user');
	$conditions=array("society_id"=>$s_society_id,'user.email'=> array('$ne'=>""));
	$this->set('result_users',$this->user->find('all',array('conditions'=>$conditions))); 
	/*
	$this->loadmodel('group');
	$conditions=array("society_id"=>$s_society_id,"group_show_id"=>1);
	$result_group=$this->group->find('all',array('conditions'=>$conditions)); 
	$this->set('result_group',$result_group); */
/*
	$this->loadmodel('role');
	$conditions=array("society_id" => $s_society_id);
	$role_result=$this->role->find('all',array('conditions'=>$conditions));
	$this->set('role_result',$role_result);
	$this->loadmodel('wing');
	$wing_result=$this->wing->find('all');
	$this->set('wing_result',$wing_result);*/


$this->loadmodel('template');
$conditions=array("cat"=>1);
$this->set('result_template1',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>2);
$this->set('result_template2',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>3);
$this->set('result_template3',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>4);
$this->set('result_template4',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>5);
$this->set('result_template5',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>6);
$this->set('result_template6',$this->template->find('all',array('conditions'=>$conditions))); 

$this->loadmodel('template');
$conditions=array("cat"=>7);
$this->set('result_template7',$this->template->find('all',array('conditions'=>$conditions))); 

if(isset($this->request->data['send'])) 
{
	$ip=$this->requestAction(array('controller'=>'Fns','action'=>'hms_email_ip'));
	$radio=$this->request->data['radio'];
	$message_db=$this->request->data['email'];
	$file=$this->request->form['file']['name'];

	$this->loadmodel('society');
	$conditions12=array('society_id'=>$s_society_id);
	$result12=$this->society->find('all',array('conditions'=>$conditions12));
	foreach($result12 as $data){
	$s_name=$data['society']['society_name'];
	}

	$result_user_info=$this->requestAction(array('controller'=>'Fns','action'=>'user_info_via_user_id'),array('pass'=>array((int)$s_user_id)));
	foreach ($result_user_info as $collection2) 
	{
	$name=$collection2["user"]["user_name"];
	$sender_email=$collection2["user"]["email"];
		if(!empty($sender_email)){
			$reply=$sender_email;
		}else{
			$reply="donotreply@housingmatters.in";
		}
	$result_user_flat=$this->requestAction(array('controller'=>'Fns','action'=>'user_flat_info_via_user_id'),array('pass'=>array((int)$s_user_id)));
	foreach($result_user_flat as $data){
		@$wing=(int)@$data["user_flat"]["wing"];
		@$flat=(int)@$data["user_flat"]["flat"];
	}
	}
	
	@$wing_flat=$this->requestAction(array('controller'=>'Fns','action'=>'wing_flat_via_wing_id_and_flat_id'),array('pass'=>array(@$wing,@$flat)));
	
	$result_society_info=$this->society_name((int)$s_society_id);
	foreach($result_society_info as $data_info){
	$society_name=$data_info['society']['society_name'];
	}

$message_web='<div>
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
<br/>';

$message_web.='<table style="border-collapse: collapse; border: 1px solid rgb(204, 204, 204);" cellpadding="0" cellspacing="0" width="100%"><tbody>
		<tr>
			<td style="padding:5px" height="10">'.$message_db.'<br/><br/>
<div style="color: #7B7B7B;">Regards,</div>
<div style="color: #7B7B7B;">'.$name.'&nbsp;&nbsp;'.$wing_flat.'</div>
<div style="color: #7B7B7B;">'.$society_name.'</div>
</div >
</div></td>
		</tr>
	</tbody>
</table>';

if(!empty($file))
{
$message_web.='<br/><a href="'.$ip.'/'.$this->webroot.'email_file/'.$file.'" download>Download attachment</a>';
}


$message_web.='<br/><table>
<tr>
<td style="padding:10px;" width="100%" align="center">
<a href="'.$ip.$this->webroot.'Broadcasts/email_view" style="width: 100px; min-height: 30px; background-color: rgb(0, 142, 213); padding: 10px; font-family: Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif; white-space: nowrap; font-weight: bold; vertical-align: middle; font-size: 14px; line-height: 14px; color: rgb(255, 255, 255); border: 1px solid rgb(2, 106, 158); text-decoration: none;" target="_blank">view on HousingMtters</a>
</td>
</tr>

</table><br/>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td  width="15">&nbsp;&nbsp;&nbsp;</td>
	<td>
	<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			
			<tr>
			<td  align="left" valign="middle" width="">
			Thank you <br/>HousingMatters (Support Team)<br/>www.housingmatters.in
			
			</td>
			<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
			
			
			</tr>
			
			</tbody>
	</table>
	</td>
			
</tr>
</table>';
$subject="[".$s_name."]-";
$subject.=htmlentities($this->request->data['subject']);

$target = "email_file/";
$target=@$target.basename( @$this->request->form['file']['name']);
$ok=1;
move_uploaded_file(@$this->request->form['file']['tmp_name'],@$target); 

$date=date("d-m-y");
$time=date('h:i:a',time());

if($radio==1){
	$multi=$this->request->data['multi'];
	$multi[]="$s_user_id,$sender_email";
	$multi=array_unique($multi);
		foreach($multi as $data){
			$ex = explode(",", $data);
			$user[]=$ex[0];
			$to=$ex[1];
			$this->send_email($to,'support@housingmatters.in','HousingMatters',$subject,$message_web,$reply);
		}
$email_id=$this->autoincrement('email_communication','email_id');
$this->loadmodel('email_communication');
$multipleRowData = Array( Array("email_id"=>$email_id,"message_web"=>$message_web,"user_id"=>$user,"date"=>$date,"time"=>$time,"society_id"=>$s_society_id,"subject"=>$subject,"type"=>1,"file"=>$file,"deleted"=>0));
$this->email_communication->saveAll($multipleRowData); 
}

if($radio==3)
{
$visible=$this->request->data['send_to'];
if($visible=="all_users"){
$sub_visible=0;	
}	
if($visible=="role_wise"){
$sub_visible=$this->request->data['roles'];	
$sub_visible=implode(',',$sub_visible);
}	
if($visible=="wing_wise"){
$sub_visible=$this->request->data['wings'];
$sub_visible=implode(',',$sub_visible);	
}

if($visible=="group_wise"){
$sub_visible=$this->request->data['groups'];
$sub_visible=implode(',',$sub_visible);	
}

$recieve_info=$this->requestAction(array('controller'=>'Fns','action'=>'sending_option_results'),array('pass'=>array($visible,$sub_visible)));
$email_array=array();	
$user_id_array=array();
foreach($recieve_info as $user_id=>$data){
$email_array[]=@$data['email'];	
$user_id_array[]=$user_id;
}	

$user_id_array=array_unique($user_id_array);	
$email_array=array_unique($email_array);
foreach($email_array as $email){
$this->send_email($email,'support@housingmatters.in','HousingMatters',$subject,$message_web,$reply);
}

$email_id=$this->autoincrement('email_communication','email_id');
$this->loadmodel('email_communication');
$multipleRowData=Array( Array("email_id"=>$email_id,"message_web"=>$message_web,"user_id"=>$user_id_array,"date"=>$date,"time"=>$time,"society_id"=>$s_society_id,"subject"=>$subject,"type"=>1,"file"=>$file,"deleted"=>0));
$this->email_communication->saveAll($multipleRowData);
} 

?>
<!----alert-------------->
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body" style="font-size:16px;">
Your Email has been sent.
</div> 
<div class="modal-footer">
<a href="email_view" class="btn green">OK</a>
</div>
</div>
<!----alert-------------->
<?php	
}
}
//End Email//
//Start email_view// 
function email_view()
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

$this->loadmodel('email_communication');
$conditions=array("society_id"=>$s_society_id,"deleted"=>0);
$order=array('email_communication.email_id'=>'DESC');
$this->set('result_email',$this->email_communication->find('all',array('conditions'=>$conditions,'order'=>$order))); 
}
//End email_view//


function email_view_ajax()
{
$this->layout='blank';
$s_user_id=$this->Session->read('user_id'); 
$s_society_id=$this->Session->read('society_id'); 


$this->loadmodel('society');
$conditions12=array('society_id'=>$s_society_id);
$result12=$this->society->find('all',array('conditions'=>$conditions12));
foreach($result12 as $data)
{
$this->set('s_name',$data['society']['society_name']);
}


$id=(int)$this->request->query('id');

$this->loadmodel('email_communication');
$conditions=array("email_id"=>$id);
$this->set('result_eamilview',$this->email_communication->find('all',array('conditions'=>$conditions))); 

}

function email_delete()
{
$this->layout='blank';

$id=(int)$this->request->query('id');

$this->loadmodel('email_communication');
$this->email_communication->updateAll(array("deleted" => 1),array("email_id" => $id));

$this->response->header('Location', 'email_view');
}

function sms_delete()
{
$this->layout='blank';

$id=(int)$this->request->query('id');

$this->loadmodel('sms');
$this->sms->updateAll(array("deleted" => 1),array("sms_id" => $id));

$this->response->header('Location', 'message_view');
}


function testing_pdf(){
	
}
function email_view_pdf()
{
//$this->layout = 'pdf'; //this will use the pdf.ctp layout 
$this->ath(); 

$con=(int)$this->request->query('con');
$this->set('con',$con);

$s_user_id=$this->Session->read('hm_user_id'); 
$s_society_id=$this->Session->read('hm_society_id'); 

$this->loadmodel('email_communication');
$conditions=array("email_id"=>$con);
$this->set('result_eamilview',$this->email_communication->find('all',array('conditions'=>$conditions))); 
}

function sms_view_pdf()
{
//$this->layout = 'pdf'; //this will use the pdf.ctp layout 
$this->ath(); 

$con=(int)$this->request->query('con');
$this->set('con',$con);

$s_user_id=$this->Session->read('user_id'); 
$s_society_id=$this->Session->read('society_id'); 


$this->loadmodel('sms');
$conditions=array("sms_id"=>$con);
$this->set('result_smsview',$this->sms->find('all',array('conditions'=>$conditions))); 
}

////////////////////////////////////////////////////////////////////////////////////////	
/////////////////////////////////////////////////////start groups//////////////////////
////////////////////////////////////////////////////////////////////////////////////////
function groups()
{
if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
$this->ath();
$this->check_user_privilages();
$s_user_id=$this->Session->read('user_id'); 
$s_society_id=$this->Session->read('society_id'); 

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
	$multipleRowData = Array( Array("group_id" => $group_id,"group_name"=>$group_name,'group_show_id'=>1,"society_id"=>$s_society_id,"users"=>array()));
	$this->group->saveAll($multipleRowData); 
	$this->response->header('Location', 'groupview/'.$group_id);
	}
	else{
		$this->set('error_addgroup','Group name should not be duplicate.');
	}
}

$this->loadmodel('group');
$conditions=array("society_id"=>$s_society_id,'group_show_id'=>1);
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
	$s_user_id=$this->Session->read('user_id'); 
	$s_society_id=$this->Session->read('society_id'); 
	$gid=(int)$gid;
	$this->set('gid',$gid);
	$group_name=$this->fetch_group_name_from_gruop_id($gid);
	$this->set('group_name',$group_name);
	
	if (isset($this->request->data['update_members'])) 
	{
		$all_users=$this->all_user_deactive();
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

	$this->set('result_group_info',$result_group_info);
	$this->set('all_users',$this->all_user_deactive());
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

} ?>