<?php
App::import('Controller', 'Hms');
class EventsController extends HmsController {
var $helpers = array('Html', 'Form','Js');
public $components = array(
'Paginator',
'Session','Cookie','RequestHandler'
);
var $name = 'Events';
//Start Eveny Add//
function event_add()
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
	$s_result= $this->society_name($s_society_id);

	foreach($s_result as $data){
	$society_name=$data['society']['society_name'];
	}
	$date = new MongoDate(strtotime(date('Y-m-d')));

	$this->loadmodel('role');
	$conditions=array("society_id" => $s_society_id);
	$role_result=$this->role->find('all',array('conditions'=>$conditions));
	$this->set('role_result',$role_result);

	$this->loadmodel('wing');
	$wing_result=$this->wing->find('all');
	$this->set('wing_result',$wing_result);

	$this->loadmodel('user');
	$conditions=array("society_id"=>$s_society_id,'active'=>'yes');
	$this->set('result_users',$this->user->find('all',array('conditions'=>$conditions))); 

}
//End Eveny Add//
//Start event_submit// 
function event_submit(){
	$this->layout=null;
	$post_data=$this->request->data;
	$this->ath();
	
	$s_society_id=$this->Session->read('hm_society_id');
	$s_role_id=$this->Session->read('hm_role_id'); 
	$s_user_id=$this->Session->read('hm_user_id');
	$date=date('d-m-Y');
	$time = date(' h:i a', time());
	
	$result_society=$this->society_name($s_society_id);
	foreach($result_society as $child)	{
		@$notice=$child['society']['notice'];
	}
	
	
	$ask_no_of_member=(int)$post_data["ask_no_of_member"];
	
	$report=array();
	$e_name=htmlentities($post_data["e_name"]);
	if(empty($e_name)){
		$report[]=array('label'=>'e_name', 'text' => 'Please fill event name.');
	}
	$description=htmlentities($post_data["description"]);
	if(empty($description)){
		$report[]=array('label'=>'description', 'text' => 'Please fill description.');
	}
	$day_type=$post_data["day_type"];
	if($day_type==1){
		if(empty($post_data["date_single"])){
			$report[]=array('label'=>'day_type', 'text' => 'Please select date_single');
		}
		$date_email='On '.$post_data["date_single"];
		$date_from=date("Y-m-d",strtotime($post_data["date_single"]));
		$date_from = $date_to = new MongoDate(strtotime($date_from));
		
	}else{
		if(empty($post_data["date_from"]) or empty($post_data["date_to"])){
			$report[]=array('label'=>'day_type', 'text' => 'Please select a valid data-range.');
		}
		$date_email='from '.$post_data["date_from"].' to '.$post_data["date_to"];
		$date_from=date("Y-m-d",strtotime($post_data["date_from"]));
		$date_from = new MongoDate(strtotime($date_from));
		$date_to=date("Y-m-d",strtotime($post_data["date_to"]));
		$date_to = new MongoDate(strtotime($date_to));
		
	}
	$e_time=$post_data["e_time"];
	if(empty($e_time)){
		$report[]=array('label'=>'e_time', 'text' => 'Please select e_time');
	}
	$location=htmlentities($post_data["location"]);
	if(empty($location)){
		$report[]=array('label'=>'location', 'text' => 'Please select location');
	}
	
	$visible=$post_data['visible'];
	$sub_visible=$post_data['sub_visible'];
	
	if($visible==0){
		$report[]=array('label'=>'visible', 'text' => 'Please select visible');
	}elseif($visible=='role_wise' and $sub_visible==0){
		$report[]=array('label'=>'visible_role', 'text' => 'Please select role.');
		$sub_visible=explode(",",$sub_visible);
	}elseif($visible=='wing_wise' and $sub_visible==0){
		$report[]=array('label'=>'visible_wing', 'text' => 'Please select wing.');
		$sub_visible=explode(",",$sub_visible);
	}
	
	
	if(sizeof($report)>0){
		$output=json_encode(array('report_type'=>'error','report'=>$report));
		die($output);
	}
	
	@$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip')); 
	
	$recieve_info=$this->visible_subvisible($visible,$sub_visible);
		
		
		
		
		
		
	$event_id=$this->autoincrement('event','event_id');
	$this->loadmodel('event');
	$this->event->saveAll(array('event_id' => $event_id,'e_name' => $e_name, 'user_id' => $s_user_id, 'society_id' => $s_society_id, 'date_from' => $date_from , 'date_to' => $date_to, 'day_type' => $day_type, 'location' => $location,'description' => $description,'visible' => $visible,'sub_visible' => $sub_visible,'visible_user_id' => $recieve_info[2],'date' => $date,'time'=>$e_time,'ask_no_of_member'=>$ask_no_of_member,'no_of_member'=>0));


	
	$result_user_info=$this->profile_picture($s_user_id);
	foreach($result_user_info as $collection2)
	{
	$user_name_created=$collection2["user"]["user_name"];
	$profile_pic=$collection2["user"]["profile_pic"];
	$wing=$collection2["user"]["wing"];
	$flat=$collection2["user"]["flat"];
	}

	$flat_info=$this->wing_flat($wing,$flat);


	
	$from="Support@housingmatters.in";
	$reply="Support@housingmatters.in";
	$from_name="HousingMatters";
	$society_result=$this->society_name($s_society_id);
	foreach($society_result as $data)
	{
	$society_name=$data['society']['society_name'];
	}
		
		
	foreach($recieve_info[0] as $user_id=>$email)
	{
	$to = @$email;
	$d_user_id = @$user_id;	
	$da_user_id[]=$d_user_id;		
	$result_user=$this->profile_picture($user_id);
	$user_name=$result_user[0]['user']['user_name'];

	
		
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
										<span style="color:rgb(100,100,99)" align="justify"> Hello '.$user_name.', </span> <br>
										</td>
								
								
								</tr>
								
								<tr>
									<td style="padding:5px;" width="100%" align="left">
											<span style="color:rgb(100,100,99)"> A new event has been created. </span>
									</td>
																
								</tr>
								
								
								<tr>
									<td style="border:1px solid;">
									<table width="100%" cellpadding="5" cellspacing="0"  >
									<tbody>

									<tr>
									
										<td>
									
										<span style="font-size:20px;">  '.$e_name.'  </span>
									
										</td>
										
									</tr>
									
									<tr>
									<td align="right">
									
										<span style="font-weight: 100;">Created by: </span><span>
										'.$user_name_created.'  '.$flat_info.'</span>
									
										</td>
									</tr>
									
									<tr>
									
										<td>
									
										<span >  '.$date_email.'  </span>
									
										</td>
										
										
									</tr>
									
									<tr>
									
										<td>
									
										<span>Time:- '.$e_time.'</span>
									
										</td>
										
									</tr>
									
									
									<tr>
									
										<td>
									
										<h4>Location:- '.$location.'</h4>
										<p align="justify">Description:- '.$description.'</p>
										</td>
										
									</tr>
									
									</tbody>
									</table>
									</td>
								</tr>
								
								<tr>
										<td style="padding:10px;" width="100%" align="center">
										<a href="'.$ip.$this->webroot.'/Events/events" style="width: 100px; min-height: 30px; background-color: rgb(0, 142, 213); padding: 10px; font-family: Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif; white-space: nowrap; font-weight: bold; vertical-align: middle; font-size: 14px; line-height: 14px; color: rgb(255, 255, 255); border: 1px solid rgb(2, 106, 158); text-decoration: none;" target="_blank">view on HousingMatters</a>
										</td>
								</tr>
								
					
					
					</table>
					<br/>
					
					<table width="100%" cellpadding="0" cellspacing="0">
						<tbody>
						
								<tr>
									<td style="" width="100%" align="left">
										Thank you.<br/>
										HousingMatters (Support Team) <br/>
										www.housingmatters.in
									</td>
								</tr>
							
						</tbody>
					</table>
					
					
					
					
				</td>
			</tr>

        </tbody>
</table>';
		
	@$subject.= '['. $society_name . ']' .'  - New event:  '.' '.$e_name.'';
	$this->send_email($to,$from,$from_name,$subject,$message_web,$reply);
	$subject="";
		
	}
	
	$output=json_encode(array('report_type'=>'success','report'=>''));
	die($output);
	
}
//End event_submit//

function calendar()
{
$this->layout='blank';

$s_society_id=$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');

$m_y=@$this->request->query('m_y');
if(empty($m_y))
{ 
$m_y = date('m-Y');
}


$m_y_ex=explode('-',$m_y);
$m=$m_y_ex[0];
$y=$m_y_ex[1];

/////////////////
$start='1-'.$m_y;
$start = date("Y-m-d", strtotime($start));
$start = new MongoDate(strtotime($start));

$days_in_month = cal_days_in_month(CAL_GREGORIAN, $m, $y);

$end=$days_in_month.'-'.$m_y;
$end = date("Y-m-d", strtotime($end));
$end = new MongoDate(strtotime($end));

$event_info=array();
$this->loadmodel('event');
$conditions=array('date_from' => array('$gte'=>$start,'$lte'=>$end));
$result_event_info=$this->event->find('all',array('conditions'=>$conditions));
foreach($result_event_info as $data)
{
$date_from = date("Y-m-d", $data['event']['date_from']->sec);
$date_to = date("Y-m-d", $data['event']['date_to']->sec);
$event_info[]=array($data['event']['event_id'],$data['event']['e_name'],$date_from,$date_to);
}
if(sizeof($event_info)==0) { $event_info=array(); }
$this->set('event_info',$event_info);
/////////////////



$dateObj   = DateTime::createFromFormat('!m', $m);
$month_name = $dateObj->format('F'); // March

$this->set('month',$m);
$this->set('month_name',$month_name);
$this->set('year',$y);

}

function check_event($e_date)
{
$this->layout='blank';

$s_society_id=$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');

$this->loadmodel('event');
$conditions=array("date_from" =>$e_date);
$result_event_info=$this->event->find('all');

return $result_event_info;
}

function events()
{
if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	
$this->ath();
$this->check_user_privilages();

$s_society_id=$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');


$this->loadmodel('event');
$conditions=array("society_id" => $s_society_id,"visible_user_id" =>array('$in' => array($s_user_id)));
$order=array('event.event_id'=>'DESC');
$this->set('result_event',$this->event->find('all', array('conditions' => $conditions,'order' => $order)));
}



function event_info($e_id=null)
{
if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	
$this->ath();
$this->check_user_privilages();
$s_society_id=$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');
$this->set('s_user_id',$s_user_id);

$e_id=(int)$e_id;
$this->set('e_id',$e_id);

$this->seen_notification(6,$e_id);
$this->seen_alert(6,$e_id);

if (isset($this->request->data['sub_update'])) 
{
	

$title=htmlentities($this->request->data['title']);
$title=wordwrap($title, 25, " ", true);
$title_cat=$this->request->data['title_cat'];
$title_des=htmlentities($this->request->data['description']);


$this->loadmodel('event');
$conditions=array("event_id" => $e_id);
$event_result_update=$this->event->find('all', array('conditions' => $conditions));
$this->set('event_result_update',$event_result_update);
$update=@$event_result_update[0]['event']['updates'];
$e_name=@$event_result_update[0]['event']['e_name'];
$visible_user_id=@$event_result_update[0]['event']['visible_user_id'];

if(sizeof($update)==0)
{
$update[]=array("title"=>$title,"color"=>$title_cat,"des"=>$title_des);
}
else
{
$t=array("title"=>$title,"color"=>$title_cat,"des"=>$title_des);
array_push($update,$t);
}

//$updates=array("title"=>$title,"color"=>$title_cat,"des"=>$title_des);
$this->event->updateAll(array('updates'=>$update),array('event.event_id'=>$e_id));


$this->send_notification('<span class="label" style="background-color:#d43f3a;"><i class="icon-tags"></i></span>','Updates for Event <b>'.$e_name.'</b> submitted by',6,$e_id,$this->webroot.'Events/event_info?e='.$e_id,$s_user_id,$visible_user_id);

}

if (isset($this->request->data['up_photo'])) 
{
$file=$this->request->form['file']['name'];


$file=$this->request->form['file']['name'];
if (!file_exists('event_file/event'.$e_id)) 
{
mkdir('event_file/event'.$e_id);
}
move_uploaded_file(@$this->request->form['file']['tmp_name'], "event_file/event".$e_id."/".$file);

$this->loadmodel('event');
$conditions=array("event_id" => $e_id);
$event_result_update=$this->event->find('all', array('conditions' => $conditions));
$this->set('event_result_update',$event_result_update);
$photo=@$event_result_update[0]['event']['photos'];

if(sizeof($photo)==0)
{
$photo[]=$file;
}
else
{
array_push($photo,$file);
}

$updates=array(array("title"=>"dfdgdf","color"=>"dfdgdf","des"=>"dfdgdf"));
$this->event->updateAll(array('photos'=>$photo),array('event.event_id'=>$e_id));

}

$this->loadmodel('event');
$conditions=array("event_id" => $e_id,"visible_user_id" => array('$in' => array($s_user_id)));
$result_event_detail=$this->event->find('all', array('conditions' => $conditions));
$this->set('result_event_detail',$result_event_detail);



}


function updates($e_id=null){
if($this->RequestHandler->isAjax()){
$this->layout='blank';
}else{
$this->layout='session';
}
$this->ath();
//$this->check_user_privilages();
$s_society_id=$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');
$this->set('s_user_id',$s_user_id);

	


$e_id=(int)$e_id;
$this->set('e_id',$e_id);

$this->seen_notification(6,$e_id);
$this->seen_alert(6,$e_id);

$this->loadmodel('event');
$conditions=array("event_id" => $e_id,"visible_user_id" => array('$in' => array($s_user_id)));
$result_event_detail=$this->event->find('all', array('conditions' => $conditions));
$this->set('result_event_detail',$result_event_detail);
}

function save_data(){
	echo "hello";
	
}

function gallery($e_id=null)
{
if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	
$this->ath();
//$this->check_user_privilages();
$s_society_id=$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');
$this->set('s_user_id',$s_user_id);

$e_id=(int)$e_id;
$this->set('e_id',$e_id);

$this->seen_notification(6,$e_id);
$this->seen_alert(6,$e_id);

$this->loadmodel('event');
$conditions=array("event_id" => $e_id,"visible_user_id" => array('$in' => array($s_user_id)));
$result_event_detail=$this->event->find('all', array('conditions' => $conditions));
$this->set('result_event_detail',$result_event_detail);
}


function save_rsvp()
{
$this->layout='blank';

$s_society_id=$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');

$e=(int)$this->request->query('e');
$type=(int)$this->request->query('type');
$this->set('e',$e);
$this->set('type',$type);

	if($type==1)
	{
	$this->loadmodel('event');
	$conditions=array("event_id" => $e);
	$event_result=$this->event->find('all', array('conditions' => $conditions));
	$rsvp=@$event_result[0]['event']['rsvp'];
	if(sizeof($rsvp)==0)	{ $rsvp=array(); }
	
	if (!in_array($s_user_id, $rsvp))
	{
	
		if(sizeof($rsvp)==0)
		{
		$rsvp[]=$s_user_id;
		
		}
		else
		{
		$t=$s_user_id;
		array_push($rsvp,$t);
		}
		
		
		$this->event->updateAll(array('rsvp'=>$rsvp),array('event.event_id'=>$e));
	}
	 // echo "Thanks for participation.";
	}
	
	if($type==2)
	{
	$this->loadmodel('event');
	$conditions=array("event_id" => $e);
	$event_result=$this->event->find('all', array('conditions' => $conditions));
	@$not_in_rsvp=@$event_result[0]['event']['not_in_rsvp'];
	
	if(sizeof($not_in_rsvp)==0)	{ $not_in_rsvp=array(); }
	
	if (!in_array($s_user_id, $not_in_rsvp))
	{
	
		if(sizeof($not_in_rsvp)==0)
		{
		$not_in_rsvp[]=$s_user_id;
		
		}
		else
		{
		$t=$s_user_id;
		array_push($not_in_rsvp,$t);
		}
		
		
		$this->event->updateAll(array('not_in_rsvp'=>$not_in_rsvp),array('event.event_id'=>$e));
	}
	
		echo "Thanks for tell us.";
	}
	
	if($type==3)
	{
	$no=(int)$this->request->query('no');
	
	$this->loadmodel('event');
	$conditions=array("event_id" => $e);
	$event_result=$this->event->find('all', array('conditions' => $conditions));
	@$no_of_member=@$event_result[0]['event']['no_of_member'];
	$no_of_member=$no_of_member+$no;
	
	
		
	$this->event->updateAll(array('no_of_member'=>$no_of_member),array('event.event_id'=>$e));
	
	
		echo "Thanks for participation.";
	}
}


} ?>