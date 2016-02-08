<?php
class FnsController extends AppController {

var $name = 'Fns';

function webroot_path(){
	$this->loadmodel('assistant');
	$conditions=array("auto_id" => 1);
	$resultwebroot_path=$this->assistant->find('all',array('conditions'=>$conditions));
	return @$resultwebroot_path[0]['assistant']['path'];
}

function user_flat_info_via_user_id($user_id){
	$this->loadmodel('user_flat');
	$conditions=array("user_id" =>$user_id);
	return $this->user_flat->find('all',array('conditions'=>$conditions));
}

function user_info_via_user_id($user_id){
	$this->loadmodel('user');
	$conditions=array("user_id" =>$user_id);
	return $this->user->find('all',array('conditions'=>$conditions));
}

function hms_sms_ip(){
	$this->loadmodel('assistant');
	$conditions=array('auto_id'=>2);
	$assistant_info=$this->assistant->find('all',array('conditions'=>$conditions));
	
	foreach($assistant_info as $data){
		$w= $data['assistant']['sms_working_key'];
		$s= $data['assistant']['sms_sender'];
		$alow= @$data['assistant']['sms_allow'];
		
		return $sms=(object)array("working_key"=>$w,"sms_sender"=>$s,"sms_allow"=>$alow);
	}
}

function hms_email_ip(){
	$this->loadmodel('assistant');
	$conditions=array('auto_id'=>2);
	$assistant_info=$this->assistant->find('all',array('conditions'=>$conditions));
	foreach($assistant_info as $data)
	{
		return @$data['assistant']['email_ip'];
	}

}

}
?>