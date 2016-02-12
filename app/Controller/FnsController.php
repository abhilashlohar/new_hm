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

function sub_module_info_via_module_id($module_id){
	$this->loadmodel('sub_module');
	$conditions=array('module_id'=>$module_id);
	return $this->sub_module->find('all',array('conditions'=>$conditions));
}

function fetch_user_type_via_user_id($user_id){
	$this->loadmodel('user');
	$conditions=array('user_id'=>$user_id);
	$user_info=$this->user->find('all',array('conditions'=>$conditions));
	return $user_info[0]["user"]["user_type"];
}

function fetch_default_role_via_user_id($user_id){
	$this->loadmodel('user_role');
	$conditions=array('user_id'=>$user_id,'default'=>'yes');
	$role_info=$this->user_role->find('all',array('conditions'=>$conditions));
	return $role_info[0]["user_role"]["role_id"];
}

function fetch_module_type_id_via_module_id($module_id){
	$this->loadmodel('main_module');
	$conditions=array('auto_id'=>$module_id);
	$main_module_info=$this->main_module->find('all',array('conditions'=>$conditions));
	return $main_module_info[0]["main_module"]["mt_id"];
}

function fetch_module_type_name_via_module_type_id($module_type_id){
	$this->loadmodel('module_type');
	$conditions=array('module_type_id'=>$module_type_id);
	$module_type_info=$this->module_type->find('all',array('conditions'=>$conditions));
	return $module_type_info[0]["module_type"]["module_type_name"];
}

function fetch_module_name_via_module_id($module_id){
	$this->loadmodel('main_module');
	$conditions=array('auto_id'=>$module_id);
	$module_info=$this->main_module->find('all',array('conditions'=>$conditions));
	return $module_info[0]["main_module"]["module_name"];
}

}
?>