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
function user_profile_info_via_user_id($user_id){
	$this->loadmodel('user_profile');
	$conditions=array("user_id" =>$user_id);
	return $this->user_profile->find('all',array('conditions'=>$conditions));	
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
	$conditions=array('auto_id'=>3);
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

function fetch_default_role_via_user_id_hm($user_id){
	$this->loadmodel('hms_right');
	$conditions=array('user_id'=>$user_id,'default'=>'yes');
	$role_info=$this->hms_right->find('all',array('conditions'=>$conditions));
	return $role_info[0]["hms_right"]["role_id"];
}


function fetch_module_type_id_via_module_id($module_id){
	$this->loadmodel('main_module');
	$conditions=array('auto_id'=>$module_id);
	$main_module_info=$this->main_module->find('all',array('conditions'=>$conditions));
	return $main_module_info[0]["main_module"]["mt_id"];
}

function fetch_module_type_info_via_module_type_id($module_type_id){
	$this->loadmodel('module_type');
	$conditions=array('module_type_id'=>$module_type_id);
	return $this->module_type->find('all',array('conditions'=>$conditions));
}

function fetch_module_info_via_module_id($module_id){
	$this->loadmodel('main_module');
	$conditions=array('auto_id'=>$module_id);
	return $this->main_module->find('all',array('conditions'=>$conditions));
}

function fetch_page_info_via_module_id($module_id){
	$this->loadmodel('page');
	$conditions=array('module_id'=>$module_id);
	return $this->page->find('all',array('conditions'=>$conditions));
}

function role_name_via_role_id($role_id){
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('role');
	$conditions=array('role_id'=>(int)$role_id,'society_id'=>$s_society_id);
	$result=$this->role->find('all',array('conditions'=>$conditions));
	return $result[0]["role"]["role_name"];
}

function all_flats_of_wing_id($wing_id){
	$this->loadmodel('flat');
	$conditions=array("wing_id" => $wing_id);
	$order=array('flat.flat_name'=>'ASC');	
	return $this->flat->find('all',array('conditions'=>$conditions,'order'=>$order));
}

function flat_type_name_via_flat_type_id($flat_type_id){
	$this->loadmodel('flat_type_name');
	$conditions=array("auto_id" => $flat_type_id);
	$result=$this->flat_type_name->find('all',array('conditions'=>$conditions));
	return @$result[0]["flat_type_name"]["flat_name"];
}

function income_head_name_via_income_head_id($income_head_id){
	$this->loadmodel('ledger_account');
	$conditions=array("auto_id" => $income_head_id);
	$result=$this->ledger_account->find('all',array('conditions'=>$conditions));
	return $result[0]["ledger_account"]["ledger_name"];
}

function get_rates_via_flat_type_id_and_income_head_id($flat_type_id,$income_head_id){
	$this->loadmodel('rate_card');
	$conditions=array("flat_type_id" => $flat_type_id,"income_head_id" => $income_head_id);
	return $this->rate_card->find('all',array('conditions'=>$conditions));
}

function get_rates_via_flat_type_id_in_noc_rate($flat_type_id){
	$this->loadmodel('noc_rate');
	$conditions=array("flat_type_id"=>$flat_type_id);
	return $this->noc_rate->find('all',array('conditions'=>$conditions));
}


function ledger_sub_account_id_via_wing_id_and_flat_id($wing_id,$flat_id){
	$this->loadmodel('user_flat');
	$conditions=array("wing" => $wing_id,"flat" => $flat_id,"owner" =>"yes");
	$result=$this->user_flat->find('all',array('conditions'=>$conditions));
	$user_flat_id=(int)@$result[0]["user_flat"]["user_flat_id"];
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("user_flat_id" => $user_flat_id);
	$result2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	return (int)@$result2[0]["ledger_sub_account"]["auto_id"];
}


function calculate_income_head_amount($ledger_sub_account_id,$income_head_id,$billing_cycle){
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("auto_id" => $ledger_sub_account_id);
	$result2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$user_flat_id=(int)@$result2[0]["ledger_sub_account"]["user_flat_id"];
	
	$this->loadmodel('user_flat');
	$conditions=array("user_flat_id" => $user_flat_id,"owner"=>"yes");
	$result3=$this->user_flat->find('all',array('conditions'=>$conditions));
	$flat_id=(int)@$result3[0]["user_flat"]["flat"];
	
	$this->loadmodel('flat');
	$conditions=array("flat_id" => $flat_id);
	$result4=$this->flat->find('all',array('conditions'=>$conditions));
	$flat_type_id=(int)@$result4[0]["flat"]["flat_type_id"];
	$flat_area=(int)@$result4[0]["flat"]["flat_area"];
	
	$this->loadmodel('rate_card');
	$conditions=array("flat_type_id" => $flat_type_id,"income_head_id" => $income_head_id,"society_id" => $s_society_id);
	$result5=$this->rate_card->find('all',array('conditions'=>$conditions));
	$rate_type=(int)@$result5[0]["rate_card"]["rate_type"];
	$rate=$result5[0]["rate_card"]["rate"];
	if($rate_type==1 or $rate_type==3){
		return $rate*$billing_cycle;
	}
	if($rate_type==2){
		return $rate*$flat_area*$billing_cycle;
	}
}

function calculate_noc_charge($ledger_sub_account_id,$billing_cycle){
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("auto_id" => $ledger_sub_account_id);
	$result2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$user_flat_id=(int)@$result2[0]["ledger_sub_account"]["user_flat_id"];
	
	$this->loadmodel('user_flat');
	$conditions=array("user_flat_id" => $user_flat_id,"owner"=>"yes");
	$result3=$this->user_flat->find('all',array('conditions'=>$conditions));
	$flat_id=(int)@$result3[0]["user_flat"]["flat"];
	
	$this->loadmodel('flat');
	$conditions=array("flat_id" => $flat_id);
	$result4=$this->flat->find('all',array('conditions'=>$conditions));
	$flat_type_id=(int)@$result4[0]["flat"]["flat_type_id"];
	$flat_area=(int)@$result4[0]["flat"]["flat_area"];
	
	$this->loadmodel('noc_rate');
	$conditions=array("flat_type_id" => $flat_type_id,"society_id" => $s_society_id);
	$result5=$this->noc_rate->find('all',array('conditions'=>$conditions));
	$rate_type=(int)@$result5[0]["noc_rate"]["rate_type"];
	$rate=$result5[0]["noc_rate"]["rate"];
	if($rate_type==1 or $rate_type==3){
		return $rate*$billing_cycle;
	}
	if($rate_type==2){
		return $rate*$flat_area*$billing_cycle;
	}
	if($rate_type==5){
		return 0;
	}
}

function member_info_via_ledger_sub_account_id($ledger_sub_account_id){
	$this->loadmodel('ledger_sub_account');
	$conditions=array("auto_id" => $ledger_sub_account_id);
	$result=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$user_flat_id=(int)@$result[0]["ledger_sub_account"]["user_flat_id"];
	
	$this->loadmodel('user_flat');
	$conditions=array("user_flat_id" => $user_flat_id);
	$result2=$this->user_flat->find('all',array('conditions'=>$conditions));
	$user_id=$result2[0]["user_flat"]["user_id"];
	$wing=$result2[0]["user_flat"]["wing"];
	$flat=$result2[0]["user_flat"]["flat"];
	
	$this->loadmodel('user');
	$conditions=array("user_id" => $user_id);
	$result3=$this->user->find('all',array('conditions'=>$conditions));
	$user_name=$result3[0]["user"]["user_name"];
	
	$this->loadmodel('wing');
	$conditions=array("wing_id" => $wing);
	$result4=$this->wing->find('all',array('conditions'=>$conditions));
	$wing_name=$result4[0]["wing"]["wing_name"];
	
	$this->loadmodel('flat');
	$conditions=array("flat_id" => $flat);
	$result5=$this->flat->find('all',array('conditions'=>$conditions));
	$flat_name=$result5[0]["flat"]["flat_name"];
	
	return array("user_name"=>$user_name,"wing_name"=>$wing_name,"flat_name"=>$flat_name);
}

function calculate_other_charges($ledger_sub_account_id,$billing_cycle){
	$this->loadmodel('other_charge');
	$conditions=array("ledger_sub_account_id" => $ledger_sub_account_id);
	$result=$this->other_charge->find('all',array('conditions'=>$conditions));
	$other_charge=array();
	foreach($result as $data){
		$income_head_id=$data["other_charge"]["income_head_id"];
		$amount=$data["other_charge"]["amount"];
		$charge_type=$data["other_charge"]["charge_type"];
		if($charge_type==1){
			$other_charge[$income_head_id]=$amount;
		}else{
			$other_charge[$income_head_id]=$amount*$billing_cycle;
		}
		
	}
	return $other_charge;
}

function income_head_name_via_id($income_head_id){
	$this->loadmodel('ledger_account');
	$conditions=array("auto_id" => $income_head_id);
	$result=$this->ledger_account->find('all',array('conditions'=>$conditions));
	return $result[0]["ledger_account"]["ledger_name"];
}

function fetch_ledger_sub_account_info_via_ledger_sub_account_id($ledger_sub_account_id){
	$this->loadmodel('ledger_sub_account');
	$conditions=array("auto_id" => $ledger_sub_account_id);
	return $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
}

function fetch_ledger_account_info_via_ledger_id($ledger_id){
	$this->loadmodel('ledger_account');
	$conditions=array("auto_id" => $ledger_id);
	return $this->ledger_account->find('all',array('conditions'=>$conditions));
}

}
?>