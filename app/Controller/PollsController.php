<?php
App::import('Controller', 'Hms');
class PollsController extends HmsController {
var $helpers = array('Html', 'Form','Js');
public $components = array(
'Paginator',
'Session','Cookie','RequestHandler'
);


var $name = 'Polls';




function polls(){
	if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();
	$s_society_id=$this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	$this->set('s_user_id',$s_user_id);

	$current_date=date("Y-m-d");
	$current_date = new MongoDate(strtotime($current_date));

	$this->loadmodel('poll');
	$conditions=array("society_id" => $s_society_id,"visible_user_id" =>array('$in' => array($s_user_id)),"deleted" => 0,'close_date' => array('$gt' => $current_date));
	$order=array('poll.poll_id'=>'DESC');
	$result_poll=$this->poll->find('all', array('conditions' => $conditions,'order' => $order));
	$this->set('result_poll',$result_poll);
}

function poll_save_vote(){
$this->layout='blank';

$type=(int)$this->request->query('type');
$poll_id=(int)$this->request->query('poll_id');
$c_id=$this->request->query('c_id');

$s_user_id=$this->Session->read('hm_user_id');
$this->set('s_user_id',$s_user_id);

if($type==1)
{
$c_id=(int)$c_id;

$this->loadmodel('poll');
$conditions=array("poll_id" => $poll_id);
$poll_vote=$this->poll->find('all', array('conditions' => $conditions));
$this->set('poll_vote',$poll_vote);
$vote=@$poll_vote[0]['poll']['result'];
if(sizeof($vote)==0)
{
$vote[]=array($s_user_id,$c_id);
}
else
{
$t=array($s_user_id,$c_id);
array_push($vote,$t);
}
$this->poll->updateAll(array('result'=>$vote),array('poll.poll_id'=>$poll_id));
}

if($type==2)
{
$choices_id=explode(",",$c_id);

$this->loadmodel('poll');
$conditions=array("poll_id" => $poll_id);
$poll_vote=$this->poll->find('all', array('conditions' => $conditions));
$this->set('poll_vote',$poll_vote);
$vote=@$poll_vote[0]['poll']['result'];

foreach($choices_id as $ch_id)
{
$ch_id=(int)$ch_id;
if(sizeof($vote)==0)
{
$vote[]=array($s_user_id,$ch_id);
}
else
{
$t=array($s_user_id,$ch_id);
array_push($vote,$t);
}
}

$this->poll->updateAll(array('result'=>$vote),array('poll.poll_id'=>$poll_id));
}
}



function poll_result_after_vote(){
$this->layout='blank';

$type=(int)$this->request->query('type');
$poll_id=(int)$this->request->query('poll_id');
$c_id=(int)$this->request->query('c_id');

$s_user_id=$this->Session->read('hm_user_id');
$this->set('s_user_id',$s_user_id);

$this->loadmodel('poll');
$conditions=array("poll_id" => $poll_id);
$poll_vote=$this->poll->find('all', array('conditions' => $conditions));
$this->set('poll_vote',$poll_vote);
}

function poll_add(){
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
	$conditions=array("user_id"=>$s_user_id,"active"=>"yes");
	$users=$this->user->find('all',array('conditions'=>$conditions));
	foreach($users as $data){
		
		$sender_email=$data["user"]["email"];
	}
	if(!empty($sender_email)){
		$reply=$sender_email;
	}else{
		$reply="donotreply@housingmatters.in";
	}
	
	if (isset($this->request->data['create_poll'])){
		$ip= $this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));
			
		$question=htmlentities($this->request->data['question']);
		$question=wordwrap($question, 25, " ", true);
		$description=htmlentities($this->request->data['description']);
		$description=wordwrap($description, 25, " ", true);
		$poll_close_date=$this->request->data['poll_close_date']; 
		$type=(int)$this->request->data['type'];
		$private=(int)@$this->request->data['private']; 
		if(empty($private)) { $private=0; }
		$choice_text_box=(int)$this->request->data['choice_text_box'];
		for($z=1;$z<=$choice_text_box;$z++)
		{
		$color=$this->rendom_color_new();
		
		$choice[]=array(htmlentities($this->request->data['choice'.$z]),$color);

		}
		$current_date = date('Y-m-d');
		$current_date = new MongoDate(strtotime($current_date));


		if(empty($poll_close_date)) 
		{ 
		$current_date_add=date('Y-m-d', strtotime(date('Y-m-d'). ' + 15 days'));
		$poll_close_date=$current_date_add;

		}
		
		$poll_close_date=date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$poll_close_date.' days'));
		$close_date = new MongoDate(strtotime($poll_close_date));
		$s_message='Your Poll has been created.';

		$file=$this->request->form['file']['name'];

		$target = "polls_file/";
		$target=@$target.basename( @$this->request->form['file']['name']);
		$ok=1;
		move_uploaded_file(@$this->request->form['file']['tmp_name'],@$target); 


		$send_to=$this->request->data['send_to'];
		if($send_to=="all_users"){
			$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($send_to,null)));
			$sub_visible=null;
		}
		if($send_to=="role_wise"){
			$roles=$this->request->data['roles'];
			$details=implode(",",$roles);
			$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($send_to,$details)));
			$sub_visible=$roles;
		}elseif($send_to=="wing_wise"){
			$wings=$this->request->data['wings'];
			$details=implode(",",$wings);
			$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($send_to,$details)));
			$sub_visible=$wings;
		}elseif($send_to=="group_wise"){
			$groups=$this->request->data['groups'];
			$details=implode(",",$groups);
			$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($send_to,$details)));
			$sub_visible=$groups;
		}
		
		$visible_user_id=array();
		foreach($receivers as $user_id=>$user_info){
			$visible_user_id[]=$user_id;
		}
		
		
		$poll_id=$this->autoincrement('poll','poll_id');
		$this->loadmodel('poll');
		$this->poll->saveAll(array('poll_id' => $poll_id,'question' => $question , 'des' => $description, 'type' => $type, 'choice' => $choice,'visible' => $send_to,'sub_visible' => $sub_visible,'visible_user_id' => $visible_user_id,'date' => $current_date,'close_date' => $close_date,'file' => $file,'society_id' => $s_society_id,'user_id' => $s_user_id,"deleted" => 0,"private" => $private));

		$this->loadmodel('society');
		$conditions12=array('society_id'=>$s_society_id);
		$result12=$this->society->find('all',array('conditions'=>$conditions12));
		foreach($result12 as $data)
		{
			$s_name=$data['society']['society_name'];
		}
		
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
											<span style="color:rgb(100,100,99)"> A new poll has been created on your society poll booth. </span>
									</td>
																
								</tr>
								
								<tr>
										<td style="padding:5px; border: solid 1px #ccc;" width="100%">
										
										<span style="color:#00A0E3;">'.$question.'</span><br/>
										<p style="color:#000;font-size:12px;" align="justify">'.$description.'</p>
																			
										</td>
								
								
								</tr>
								
								<tr>
										<td style="padding:5px;border: solid 1px #ccc;" width="100%">';
											
										$message_web.="<ol Type='A' >";
										foreach($choice as $data)
										{
										$message_web.="<li ><span style='font-size:14px;'>".$data[0]."</span></li>";
										}
										$message_web.="</ol>";

																		
										$message_web.='</td>
								
								
								</tr>
								
								
								<tr>
										<td style="padding:10px;" width="100%" align="center">
										<a href="'.$ip.$this->webroot.'/Polls/polls" style="width: 100px; min-height: 30px; background-color: rgb(0, 142, 213); padding: 10px; font-family: Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif; white-space: nowrap; font-weight: bold; vertical-align: middle; font-size: 14px; line-height: 14px; color: rgb(255, 255, 255); border: 1px solid rgb(2, 106, 158); text-decoration: none;" target="_blank">view / vote on HousingMatters</a>
										</td>
								</tr>
					

								<tr>
								<td style="" width="100%" align="left">
								<p align="justify">	www.housingmatters.in </p>
								</td>
								</tr>

					
					
					</table>
					
				</td>
			</tr>

        </tbody>
</table>';

		
		$subject="[".$s_name."]- New Poll: ".$question;
		$from_name="HousingMatters";
		$this->loadmodel('email');
		$conditions=array("auto_id" => 4);
		$result_email = $this->email->find('all',array('conditions'=>$conditions));
		foreach ($result_email as $collection) 
		{
		$from=$collection['email']['from'];
		}

		foreach($receivers as $user_id=>$user_info){
			$email=$user_info["email"];
			$user_name=$user_info["user_name"];
			if(!empty($email)){
				$this->send_email($email,$from,$from_name,$subject,$message_web,$reply);
			}
		}
		
		$this->Session->write('poll_status',1);
		$this->response->header('Location', $this->webroot.'Polls/polls');	
		}
}


function my_polls(){
	if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();

	$s_society_id=$this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	$this->set('s_user_id',$s_user_id);

	if (isset($this->request->data['edit_save'])){
	$p_id=(int)$this->request->data['poll_id'];
	$poll_des=htmlentities($this->request->data['poll_des']);

	$this->loadmodel('poll');
	$this->poll->updateAll(array('des'=>$poll_des),array('poll.poll_id'=>$p_id));
	}

	if (isset($this->request->data['delete_save'])){
	$p_id=(int)$this->request->data['poll_id_d'];

	$this->loadmodel('poll');
	$this->poll->updateAll(array('deleted'=>1),array('poll.poll_id'=>$p_id));
	}


	$this->loadmodel('poll');
	$conditions=array("user_id" => $s_user_id,"deleted" => 0);
	$order=array('poll.poll_id'=>'DESC');
	$this->set('result_poll',$this->poll->find('all', array('conditions' => $conditions,'order' => $order)));
}




function poll_edit(){
	$this->layout='blank';
	$p_id=(int)$this->request->query('p_id');
	$edit=(int)$this->request->query('edit');
	$this->set('edit',$edit);
	if($edit==1)
	{
	$des=$this->request->query('des');
	$c_date=$this->request->query('c_date');

	$c_date = date("Y-m-d", strtotime($c_date));
	$c_date = new MongoDate(strtotime($c_date));

	$this->loadmodel('poll');
	$this->poll->updateAll(array('des'=>$des,'close_date'=>$c_date),array('poll.poll_id'=>$p_id));
	}

	if($edit==0)
	{
	$this->loadmodel('poll');
	$conditions=array("poll_id" => $p_id);
	$poll_result=$this->poll->find('all', array('conditions' => $conditions));
	$this->set('poll_result',$poll_result);
	}

}




function poll_delete(){
	$this->layout='blank';
	$p_id=(int)$this->request->query('p_id');
	$delete=(int)$this->request->query('delete');
	$this->set('delete',$delete);
	if($delete==1)
	{
	$this->loadmodel('poll');
	$this->poll->updateAll(array('deleted'=>1),array('poll.poll_id'=>$p_id));
	}

	if($delete==0)
	{
	$this->set('poll_id',$p_id);
	}

}




function closed_polls(){
	if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();

	$s_society_id=$this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	$this->set('s_user_id',$s_user_id);

	$current_date=date("Y-m-d");
	$current_date = new MongoDate(strtotime($current_date));

	$this->loadmodel('poll');
	$conditions=array("society_id" => $s_society_id,"visible_user_id" =>array('$in' => array($s_user_id)),"deleted" => 0,'close_date' => array('$lt' => $current_date));
	$order=array('poll.poll_id'=>'DESC');
	$result_poll=$this->poll->find('all', array('conditions' => $conditions,'order' => $order));
	$this->set('result_poll',$result_poll);


	foreach($result_poll as $poll)
	{
		$this->seen_alert(7,$poll["poll"]["poll_id"]);
	}
}

}
?>