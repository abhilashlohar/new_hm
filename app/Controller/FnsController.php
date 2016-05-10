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

function fetch_all_role_via_user_id($user_id){
	
	$this->loadmodel('user_role');
	$conditions=array('user_id'=>$user_id);
	return $role_info=$this->user_role->find('all',array('conditions'=>$conditions));
	
}


function fetch_default_role_via_user_id($user_id){
	$this->loadmodel('user_role');
	$conditions=array('user_id'=>$user_id,'default'=>'yes');
	$role_info=$this->user_role->find('all',array('conditions'=>$conditions));
	return @$role_info[0]["user_role"]["role_id"];
}

function fetch_default_role_via_user_id_hm($user_id){
	$this->loadmodel('hms_right');
	$conditions=array('user_id'=>$user_id,'default'=>'yes');
	$role_info=$this->hms_right->find('all',array('conditions'=>$conditions));
	return $role_info[0]["hms_right"]["role_id"];
}

function fetch_default_society_hm_child_user_id($user_id){
	$this->loadmodel('hms_right');
	$conditions=array('user_id'=>$user_id);
	return $role_info=$this->hms_right->find('all',array('conditions'=>$conditions));
	
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
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('role_privilege');
	$conditions=array('module_id'=>$module_id,'society_id'=>$s_society_id);
	$privilege=$this->role_privilege->find('all',array('conditions'=>$conditions,'limit'=>1));
	$sub_module_id=$privilege[0]["role_privilege"]["sub_module_id"];
	
	$this->loadmodel('page');
	$conditions=array('module_id'=>$module_id,'sub_module_id'=>$sub_module_id);
	return $this->page->find('all',array('conditions'=>$conditions));
}

function fetch_page_info_via_module_id_for_hm($module_id){
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

function wing_name_via_wing_id($wing){
	$s_society_id=$this->Session->read('hm_society_id');
		$this->loadmodel('wing');
		$conditions=array("wing_id"=>$wing,'society_id'=>$s_society_id);
		$wing_info=$this->wing->find('all',array('conditions'=>$conditions));
		return $wing_name=$wing_info[0]["wing"]["wing_name"];
	
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
	return @$result[0]["ledger_account"]["ledger_name"];
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
	$conditions=array("user_flat_id" => $user_flat_id,"exited" => "no");
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
	$noc_ch_tp=(int)@$result4[0]["flat"]["noc_ch_tp"];
	if($noc_ch_tp==2){
		$this->loadmodel('noc_rate');
		$conditions=array("flat_type_id" => $flat_type_id,"society_id" => $s_society_id);
		$result5=$this->noc_rate->find('all',array('conditions'=>$conditions));
		$rate_type=(int)@$result5[0]["noc_rate"]["rate_type"];
		@$rate=@$result5[0]["noc_rate"]["rate"];
		if($rate_type==1 or $rate_type==3){
			return $rate*$billing_cycle;
		}
		if($rate_type==2){
			return $rate*$flat_area*$billing_cycle;
		}
		if($rate_type==4){
			$income_heads=$result5[0]["noc_rate"]["income_heads"];
			$income_heads=explode(',',$income_heads);
			$ih_amount=0;
			foreach($income_heads as $income_head_id){
				$income_head_id=(int)$income_head_id;
				$ih_amount+= round($this->requestAction(array('controller' => 'Fns', 'action' => 'calculate_income_head_amount'),array('pass'=>array($ledger_sub_account_id,$income_head_id,$billing_cycle))));
			}
			return $ih_amount*0.1;
		}
		if($rate_type==5){
			return 0;
		}
	}else{
		return 0;
	}
	
}

function member_info_via_ledger_sub_account_id($ledger_sub_account_id){
	$this->loadmodel('ledger_sub_account');
	$conditions=array("auto_id" => $ledger_sub_account_id);
	$result=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$user_flat_id=(int)@$result[0]["ledger_sub_account"]["user_flat_id"];
	$representative=@$result[0]["ledger_sub_account"]["representative"];
	$representator=(int)@$result[0]["ledger_sub_account"]["representator"];
	
	$this->loadmodel('user_flat');
	$conditions=array("user_flat_id" => $user_flat_id);
	$result2=$this->user_flat->find('all',array('conditions'=>$conditions));
	@$user_id=@$result2[0]["user_flat"]["user_id"];
	@$wing=@$result2[0]["user_flat"]["wing"];
	@$flat=@$result2[0]["user_flat"]["flat"];
	
	$this->loadmodel('user');
	$conditions=array("user_id" => $user_id);
	$result3=$this->user->find('all',array('conditions'=>$conditions));
	@$user_name=@$result3[0]["user"]["user_name"];
	@$mobile=@$result3[0]["user"]["mobile"];
	@$email=@$result3[0]["user"]["email"];
	
	$this->loadmodel('wing');
	$conditions=array("wing_id" => $wing);
	$result4=$this->wing->find('all',array('conditions'=>$conditions));
	@$wing_name=@$result4[0]["wing"]["wing_name"];
	
	$this->loadmodel('flat');
	$conditions=array("flat_id" => $flat);
	$result5=$this->flat->find('all',array('conditions'=>$conditions));
	@$flat_name=ltrim(@$result5[0]["flat"]["flat_name"],'0');
	$flat_area=@$result5[0]["flat"]["flat_area"];
	
	return array("user_name"=>$user_name,"wing_name"=>$wing_name,"flat_name"=>$flat_name,"email"=>$email,"mobile"=>$mobile,"wing_id"=>$wing,"flat_id"=>$flat,"flat_area"=>$flat_area,"user_id"=>$user_id,"representative"=>$representative,"representator"=>$representator);
}

function flat_info_via_ledger_sub_account_id($ledger_sub_account_id){
	$this->loadmodel('ledger_sub_account');
	$conditions=array("auto_id" => $ledger_sub_account_id);
	$result=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$user_flat_id=(int)@$result[0]["ledger_sub_account"]["user_flat_id"];
	
	$this->loadmodel('user_flat');
	$conditions=array("user_flat_id" => $user_flat_id);
	$result2=$this->user_flat->find('all',array('conditions'=>$conditions));
	$flat=$result2[0]["user_flat"]["flat"];
	
	$this->loadmodel('flat');
	$conditions=array("flat_id" => $flat);
	return $result5=$this->flat->find('all',array('conditions'=>$conditions));
}


function calculate_other_charges($ledger_sub_account_id,$billing_cycle){
	$this->loadmodel('other_charge');
	$conditions=array("ledger_sub_account_id" => $ledger_sub_account_id);
	$result=$this->other_charge->find('all',array('conditions'=>$conditions));
	$other_charge=array();
	foreach($result as $data){
		$income_head_id=$data["other_charge"]["income_head_id"];
		$amount=$data["other_charge"]["amount"];
		$charge_type=(int)$data["other_charge"]["charge_type"];
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
	return @$result[0]["ledger_account"]["ledger_name"];
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

function default_role_name_via_user_id($user_id){
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->loadmodel('user_role');
	$conditions=array("user_id" => $user_id,"default"=>"yes");
	$result=$this->user_role->find('all',array('conditions'=>$conditions));
	$role_id=$result[0]["user_role"]["role_id"];
	
	$this->loadmodel('role');
	$conditions=array("society_id" => $s_society_id,"role_id"=>$role_id);
	$result=$this->role->find('all',array('conditions'=>$conditions));
	return $result[0]["role"]["role_name"];
}

function calculate_arrears($ledger_sub_account_id){
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->loadmodel('ledger');
	$conditions =array('society_id' =>$s_society_id,'ledger_account_id' =>34,'ledger_sub_account_id' =>(int)$ledger_sub_account_id);
	$result=$this->ledger->find('all',array('conditions'=>$conditions));
	$total_arrear_principle=0;
	$total_arrear_intrest=0;
	foreach($result as $data){
		//Positive=debit & nagetive=credit
		$intrest_on_arrears=@$data["ledger"]["intrest_on_arrears"];
		$table_name=$data["ledger"]["table_name"];
		$debit=$data["ledger"]["debit"];
		$credit=$data["ledger"]["credit"];
		if($intrest_on_arrears=="YES"){
			$total_arrear_intrest+=$debit-$credit;
		}else{
			$total_arrear_principle+=$debit-$credit;
		}
	}
	
	return array("arrear_principle"=>$total_arrear_principle,"arrear_interest"=>$total_arrear_intrest);
}

function last_receipts_info($ledger_sub_account_id){
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->loadmodel('cash_bank');
	$conditions=array("source" => "bank_receipt","receipt_type"=>"maintenance","applied"=>"no","society_id"=>$s_society_id,"ledger_sub_account_id"=>$ledger_sub_account_id);
	$order=array('cash_bank.transaction_date'=>'ASC');
	return $this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
}

function last_receipts_info_for_bill_regeneration($ledger_sub_account_id,$last_bill_start,$current_bill_start_date){
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->loadmodel('cash_bank');
	$conditions=array("source" => "bank_receipt","receipt_type"=>"maintenance","society_id"=>$s_society_id,"ledger_sub_account_id"=>$ledger_sub_account_id,"transaction_date"=>array('$gte'=>$last_bill_start),"transaction_date"=>array('$lte'=>$current_bill_start_date));
	$order=array('cash_bank.transaction_date'=>'ASC');
	return $this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
}

function last_bill_info($ledger_sub_account_id){
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->loadmodel('regular_bill');
	$conditions=array("society_id"=>$s_society_id,"ledger_sub_account_id"=>$ledger_sub_account_id);
	$order=array('regular_bill.auto_id'=> 'DESC');
	return $this->regular_bill->find('all',array('conditions'=>$conditions,'order'=>$order,'limit'=>1));
}
function last_bill_info_for_bill_regeneration($ledger_sub_account_id){
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->loadmodel('regular_bill');
	$conditions=array("society_id"=>$s_society_id,"ledger_sub_account_id"=>$ledger_sub_account_id);
	$order=array('regular_bill.auto_id'=> 'DESC');
	return $this->regular_bill->find('all',array('conditions'=>$conditions,'order'=>$order,'limit'=>1,'offset'=>1));
}

function user_flat_info_via_user_flat_id($user_flat_id){
	$this->loadmodel('user_flat');
	$conditions=array("user_flat_id" =>$user_flat_id);
	return $this->user_flat->find('all',array('conditions'=>$conditions));
}
function user_flat_info_via_wing_flat_id($wing,$flat){
	$this->loadmodel('user_flat');
	$conditions=array("wing"=>$wing,"flat"=>$flat);
	return $this->user_flat->find('all',array('conditions'=>$conditions));
}

function society_name_via_society_id($society_id){
	$this->loadmodel('society');
	$conditions=array("society_id"=>$society_id);
	$result=$this->society->find('all',array('conditions'=>$conditions));
	return $result[0]["society"]["society_name"];
}
function regular_bill_info_via_ledger_sub_account($ledger_sub_account_id){
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->loadmodel('regular_bill');
	$conditions=array("society_id"=>$s_society_id,"ledger_sub_account_id"=>$ledger_sub_account_id);
	$order=array('regular_bill.auto_id'=> 'ASC');
	return $this->regular_bill->find('all',array('conditions'=>$conditions,'order'=>$order));
}
function is_empty_for_owner($flat_id){
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('user_flat');
	$conditions=array("flat"=>$flat_id,'owner'=>"yes");
	return $this->user_flat->find('count',array('conditions'=>$conditions));
}
function ledger_info_via_ledger_sub_account_id($ledger_sub_account_id){
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('ledger');
	$conditions=array("ledger_account_id"=>34,'ledger_sub_account_id'=>$ledger_sub_account_id);
	return $this->ledger->find('all',array('conditions'=>$conditions));
}
function ledger_sub_account_info_via_user_flat_id($user_flat_id){
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id"=>34,'user_flat_id'=>$user_flat_id);
	return $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
}
function rate_card_info_via_flat_type_id_and_income_head_id($flat_type_id,$income_head_id){
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('rate_card');
	$conditions=array("income_head_id"=>$income_head_id,"flat_type_id"=>$flat_type_id,'society_id'=>$s_society_id);
	return $this->rate_card->find('count',array('conditions'=>$conditions));
}

function noc_rate_info_via_flat_type_id($flat_type_id){
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('noc_rate');
	$conditions=array("flat_type_id"=>$flat_type_id,'society_id'=>$s_society_id);
	return $this->noc_rate->find('count',array('conditions'=>$conditions));
}

function member_info_via_user_id($user_id){
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('user');
	$conditions=array("user_id"=>$user_id);
	$userresult=$this->user->find('all',array('conditions'=>$conditions));
	$user_name=$userresult[0]["user"]["user_name"];
	$email=$userresult[0]["user"]["email"];
	$mobile=$userresult[0]["user"]["mobile"];
	$profile_pic=@$userresult[0]["user"]["profile_pic"];
	
	$this->loadmodel('user_flat');
	$conditions=array("user_id"=>$user_id, "exited"=>"no");
	$result=$this->user_flat->find('all',array('conditions'=>$conditions));
	$flats=array();
	foreach($result as $data){
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
		
		$flats[$user_flat_id]=$wing_name.' - '.$flat_name;
	}
	return array("user_name"=>$user_name,"wing_flat"=>$flats,"email"=>$email,"mobile"=>$mobile,"profile_pic"=>$profile_pic);
}
function society_info_via_society_id($society_id){
	$this->loadmodel('society');
	$conditions=array('society_id'=>$society_id);
	return $this->society->find('all',array('conditions'=>$conditions));
}

function hms_role_info_via_role_id($role_id){
	$this->loadmodel('hms_role');
	$conditions=array('auto_id'=>$role_id);
	return $this->hms_role->find('all',array('conditions'=>$conditions));
}




function wing_flat_via_wing_id_and_flat_id($wing_id,$flat_id){
	$this->loadmodel('wing');
	$conditions=array("wing_id"=>$wing_id);
	$result=$this->wing->find('all',array('conditions'=>$conditions));
	foreach($result as $data){
		$wing_name=$data['wing']['wing_name'];
	}
	$this->loadmodel('flat');
	$conditions=array("flat_id"=>$flat_id);
	$result2=$this->flat->find('all',array('conditions'=>$conditions));
		foreach($result2 as $data){
	$flat_name=$data['flat']['flat_name'];
	}
	@$flat_name=ltrim(@$flat_name,'0');
	if(!empty($wing_name) && !empty($flat_name)){
		return @$wing_name.' '.@$flat_name;
	}

}




 function member_info_via_user_flat_id($user_flat_id){
		$s_society_id=$this->Session->read('hm_society_id');
		
		
		$this->loadmodel('user_flat');
		$conditions=array("user_flat_id"=>$user_flat_id, "exited"=>"no");
		$result_user_flat=$this->user_flat->find('all',array('conditions'=>$conditions));
			foreach($result_user_flat as $data){
				$user_id=(int)$data["user_flat"]["user_id"];
				$wing=$data["user_flat"]["wing"];
				$flat=$data["user_flat"]["flat"];
				$owner=$data["user_flat"]["owner"];
			}
			$this->loadmodel('wing');
			$conditions=array("wing_id"=>$wing);
			$wing_info=$this->wing->find('all',array('conditions'=>$conditions));
			$wing_name=$wing_info[0]["wing"]["wing_name"];
			
			$this->loadmodel('flat');
			$conditions=array("flat_id"=>$flat);
			$flat_info=$this->flat->find('all',array('conditions'=>$conditions));
			$flat_name=ltrim($flat_info[0]["flat"]["flat_name"],'0');
			
			$flats=$wing_name.' - '.$flat_name;
			
			$this->loadmodel('user');
			$conditions=array("user_id"=>$user_id);
			$result_user=$this->user->find('all',array('conditions'=>$conditions));
			
			$this->loadmodel('user_profile');
			$conditions=array("user_id"=>$user_id);
			$result_user_profile=$this->user_profile->find('all',array('conditions'=>$conditions));
			
			
			return array("wing_flat"=>$flats,"owner"=>$owner,"result_user"=>$result_user,"result_user_profile"=>$result_user_profile);
	}

function tenant_member_info_via_society_id(){
		$s_society_id=$this->Session->read('hm_society_id');

		$this->loadmodel('user_flat');
		$conditions=array("society_id"=>$s_society_id, "owner"=>"no");
		$result_user_flat=$this->user_flat->find('all',array('conditions'=>$conditions));
			foreach($result_user_flat as $data){
				$user_id=(int)$data["user_flat"]["user_id"];
				$wing=$data["user_flat"]["wing"];
				$flat=$data["user_flat"]["flat"];
				$owner=$data["user_flat"]["owner"];
				
				$this->loadmodel('wing');
				$conditions=array("wing_id"=>$wing);
				$wing_info=$this->wing->find('all',array('conditions'=>$conditions));
				$wing_name=$wing_info[0]["wing"]["wing_name"];

				$this->loadmodel('flat');
				$conditions=array("flat_id"=>$flat);
				$flat_info=$this->flat->find('all',array('conditions'=>$conditions));
				$flat_name=ltrim($flat_info[0]["flat"]["flat_name"],'0');

				$flats=$wing_name.' - '.$flat_name;

				$this->loadmodel('user');
				$conditions=array("user_id"=>$user_id);
				$result_user=$this->user->find('all',array('conditions'=>$conditions));

				$this->loadmodel('tenant');
				$conditions=array("user_id"=>$user_id);
				$result_user_tenant=$this->tenant->find('all',array('conditions'=>$conditions));
				
				
				
				
				$result_tenant_info[]=array("wing_name"=>$flats,"result_user"=>$result_user,"result_user_tenant"=>$result_user_tenant);
			}
		return $result_tenant_info ;
}
function tenancy_agreement_via_user_fetch($society_id,$user_id){
	
	$this->loadmodel('tenant');
	$conditions=array("society_id" => $society_id,'user_id'=>$user_id);
	return $this->tenant->find('all',array('conditions'=>$conditions));
}

function sending_options(){
	$s_society_id=$this->Session->read('hm_society_id');
	?>
	<div class="controls">
		<label class="radio line">
		<div class="radio"><span><input name="send_to" value="all_users" type="radio" checked></span></div>
		All users
		</label>
		<label class="radio line">
		<div class="radio"><span><input name="send_to" value="role_wise" type="radio"></span></div>
		Role wise
		</label>
			<div style="padding-left:5%;display:none;" id="role_wise">
				<div class="" style="background-color: rgb(252, 250, 250); padding: 2px; border: 1px solid rgba(204, 204, 204, 0.3);">
					<table width="100%">
					<tr>
						<td>
							<label class="checkbox">
							<div class="checker"><span><input class="owner requirecheck1" e_id="requirecheck1" value="3" type="checkbox" name="roles[]"></span></div> Owners
							</label>
						</td>
						<td class="owner_family" style="display:none;">
							<label class="checkbox" >
							<div class="checker"><span><input value="5" class="requirecheck1" type="checkbox" name="roles[]"></span></div> Add Family Members also?
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<label class="checkbox">
							<div class="checker"><span><input class="tenant requirecheck1" e_id="requirecheck1" value="4" type="checkbox" name="roles[]"></span></div> Tenants
							</label>
						</td>
						<td class="tenant_family" style="display:none;">
							<label class="checkbox">
							<div class="checker"><span><input value="6" class="requirecheck1" type="checkbox" name="roles[]"></span></div> Add Family Members also?
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<label class="checkbox">
							<div class="checker"><span><input class="resident requirecheck1" e_id="requirecheck1" value="resident" type="checkbox" name="roles[]"></span></div> Residents
							</label>
						</td>
						<td class="resident_family" style="display:none;">
							<label class="checkbox">
							<div class="checker"><span><input class="requirecheck1" value="resident_family" type="checkbox" name="roles[]"></span></div> Add Family Members also?
							</label>
						</td>
					</tr>
					<?php
					$this->loadmodel('role');
					$conditions =array( '$and' => array( 
						array("society_id"=>$s_society_id,'role.role_id'=>array('$ne'=>3)),
						array("society_id"=>$s_society_id,'role.role_id'=>array('$ne'=>4)),
						array("society_id"=>$s_society_id,'role.role_id'=>array('$ne'=>5)),
						array("society_id"=>$s_society_id,'role.role_id'=>array('$ne'=>6)),
					));
					$result_role=$this->role->find('all',array('conditions'=>$conditions));
					foreach($result_role as $data){
						$role_id=$data["role"]["role_id"];
						$role_name=$data["role"]["role_name"];?>
						<tr>
							<td colspan="2">
								<label class="checkbox">
								<div class="checker"><span><input class="requirecheck1" e_id="requirecheck1" value="<?php echo $role_id; ?>" type="checkbox" name="roles[]"></span></div> <?php echo $role_name; ?>
								</label>
							</td>
						</tr>
					<?php } ?>
					<tr>
						<td >
							<label id="requirecheck1"></label>
						</td>
					</tr>
					</table>
				</div>
			</div>
		<label class="radio line">
		<div class="radio"><span><input name="send_to" value="wing_wise" type="radio"></span></div>
		Wing wise
		</label>
			<div style="padding-left:5%;display:none;" id="wing_wise">
				<div style="background-color: rgb(252, 250, 250); padding: 2px; border: 1px solid rgba(204, 204, 204, 0.3);">
				<?php
				$this->loadmodel('wing');
				$conditions=array("society_id"=>$s_society_id);
				$result_wing=$this->wing->find('all',array('conditions'=>$conditions));
				foreach($result_wing as $data2){
					$wing_id=$data2["wing"]["wing_id"];
					$wing_name=$data2["wing"]["wing_name"];?>
					<label class="checkbox">
					<div class="checker"><span><input class="requirecheck2" e_id="requirecheck2" value="<?php echo $wing_id; ?>" type="checkbox" name="wings[]"></span></div> <?php echo $wing_name; ?>
					</label>
				<?php } ?>
				<label id="requirecheck2"></label>
				</div>
			</div>
		<label class="radio line">
		<div class="radio"><span><input name="send_to" value="group_wise" type="radio"></span></div>
		Group wise
		</label>
			<div style="padding-left:5%;display:none;" id="group_wise">
				<div style="background-color: rgb(252, 250, 250); padding: 2px; border: 1px solid rgba(204, 204, 204, 0.3);">
				<?php
				$this->loadmodel('group');
				$conditions=array("society_id"=>$s_society_id);
				$result_group=$this->group->find('all',array('conditions'=>$conditions));
				foreach($result_group as $data5){
					$group_id=$data5["group"]["group_id"];
					$group_name=$data5["group"]["group_name"];?>
					<label class="checkbox">
					<div class="checker"><span><input class="requirecheck3" e_id="requirecheck3" value="<?php echo $group_id; ?>" type="checkbox" name="groups[]"></span></div> <?php echo $group_name; ?>
					</label>
				<?php } ?>
				<label id="requirecheck3"></label>
				</div>
			</div>
	</div>
<script>
$(document).ready(function() {
	$("input[type=radio][name=send_to]").on("click",function(){
		var send_to=$(this).val();
		if(send_to=="all_users"){
			$("#role_wise").hide();
			$("#wing_wise").hide();
			$("#group_wise").hide();
		}
		if(send_to=="role_wise"){
			$("#role_wise").show();
			$("#wing_wise").hide();
			$("#group_wise").hide();
		}
		if(send_to=="wing_wise"){
		
			$("#wing_wise").show();
			$("#role_wise").hide();
			$("#group_wise").hide();
		}
		if(send_to=="group_wise"){
			$("#group_wise").show();
			$("#role_wise").hide();
			$("#wing_wise").hide();
		}
	});
	$(".owner").on("click",function(){
		if($(this).is(":checked")===true){
			$(".owner_family").show();
		}else{
			$(".owner_family").hide();
		}
	});
	$(".tenant").on("click",function(){
		if($(this).is(":checked")===true){
			$(".tenant_family").show();
		}else{
			$(".tenant_family").hide();
		}
	});
	$(".resident").on("click",function(){
		if($(this).is(":checked")===true){
			$(".resident_family").show();
		}else{
			$(".resident_family").hide();
		}
	});
});
</script>
	<?php
}
	
function sending_option_results($send_to=null,$details=null){
	$s_society_id=$this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	$arranged_array=array();
	if($send_to=="all_users"){
		$this->loadmodel('user');
		$conditions=array("society_id"=>$s_society_id,"active"=>"yes");
		$order=array('user.user_name'=> 'ASC');
		$users=$this->user->find('all',array('conditions'=>$conditions,'order'=>$order));
		foreach($users as $data){
			$user_id=$data["user"]["user_id"];
			$email=$data["user"]["email"];
			$mobile=$data["user"]["mobile"];
			$user_name=$data["user"]["user_name"];
			$arranged_array[$user_id]=array("email"=>$email,"mobile"=>$mobile,"user_name"=>$user_name);
		}
	}elseif($send_to=="role_wise"){
		$details=explode(",",$details);
		
		$this->loadmodel('user');
		$conditions=array("society_id"=>$s_society_id,"active"=>"yes");
		$users=$this->user->find('all',array('conditions'=>$conditions));
		foreach($users as $data){
			$user_id=$data["user"]["user_id"];
			$email=$data["user"]["email"];
			$mobile=$data["user"]["mobile"];
			$user_name=$data["user"]["user_name"];
			foreach($details as $role){
				if($role!="resident" and $role!="resident_family"){
					$this->loadmodel('user_role');
					$conditions=array("user_id"=>$user_id,"role_id"=>(int)$role);
					$count_role=$this->user_role->find('count',array('conditions'=>$conditions));
					if($count_role==1){
						$arranged_array[$user_id]=array("email"=>$email,"mobile"=>$mobile,"user_name"=>$user_name);
					}
				}else{
					if($role=="resident"){
						$this->loadmodel('user_flat');
						$conditions=array("user_id"=>$user_id);
						$user_flats=$this->user_flat->find('all',array('conditions'=>$conditions));
						foreach($user_flats as $data2){
							$wing=@$data2["user_flat"]["wing"];
							$flat=@$data2["user_flat"]["flat"];
							$owner=@$data2["user_flat"]["owner"];
							if($owner=="yes" && (!empty($wing) && !empty($flat))){
								$this->loadmodel('flat');
								$conditions=array("wing_id"=>$wing,"flat_id"=>$flat);
								$flat_info=$this->flat->find('all',array('conditions'=>$conditions));
								$noc_status=$flat_info[0]["flat"]["noc_ch_tp"];
								if($noc_status==1){
									$arranged_array[$user_id]=array("email"=>$email,"mobile"=>$mobile,"user_name"=>$user_name);
								}
							}elseif($owner=="no" && (!empty($wing) && !empty($flat))){
								$arranged_array[$user_id]=array("email"=>$email,"mobile"=>$mobile,"user_name"=>$user_name);
							}
						}
					}
					if($role=="resident_family"){
						$this->loadmodel('user_flat');
						$conditions=array("user_id"=>$user_id);
						$user_flats=$this->user_flat->find('all',array('conditions'=>$conditions));
						foreach($user_flats as $data2){
							$wing=@$data2["user_flat"]["wing"];
							$flat=@$data2["user_flat"]["flat"];
							$owner=@$data2["user_flat"]["owner"];
							if($owner=="yes" && (!empty($wing) && !empty($flat))){
								$this->loadmodel('flat');
								$conditions=array("wing_id"=>$wing,"flat_id"=>$flat);
								$flat_info=$this->flat->find('all',array('conditions'=>$conditions));
								$noc_status=$flat_info[0]["flat"]["noc_ch_tp"];
								if($noc_status==1){
									$this->loadmodel('user');
									$conditions=array("family_main_member"=>$user_id,"is_family_member"=>"yes");
									$family_users=$this->user->find('all',array('conditions'=>$conditions));	
									foreach($family_users as $data3){
										$user_id=$data3["user"]["user_id"];
										$email=$data3["user"]["email"];
										$mobile=$data3["user"]["mobile"];
										$user_name=$data3["user"]["user_name"];
										$arranged_array[$user_id]=array("email"=>$email,"mobile"=>$mobile,"user_name"=>$user_name);
									}	
								}
							}else{
								$this->loadmodel('user');
								$conditions=array("family_main_member"=>$user_id,"is_family_member"=>"yes");
								$family_users=$this->user->find('all',array('conditions'=>$conditions));	
								foreach($family_users as $data3){
									$user_id=$data3["user"]["user_id"];
									$email=$data3["user"]["email"];
									$mobile=$data3["user"]["mobile"];
									$user_name=$data3["user"]["user_name"];
									$arranged_array[$user_id]=array("email"=>$email,"mobile"=>$mobile,"user_name"=>$user_name);
								}
							}
						}
					}
				}
			}
		}
		
		
	}elseif($send_to=="wing_wise"){
		$details=explode(",",$details);
		$this->loadmodel('user');
		$conditions=array("society_id"=>$s_society_id,"active"=>"yes");
		$users=$this->user->find('all',array('conditions'=>$conditions));
		foreach($users as $data){
			$user_id=$data["user"]["user_id"];
			$email=$data["user"]["email"];
			$mobile=$data["user"]["mobile"];
			$user_name=$data["user"]["user_name"];
			
			$this->loadmodel('user_flat');
			$conditions=array("user_id"=>$user_id);
			$user_flats=$this->user_flat->find('all',array('conditions'=>$conditions));
			foreach($user_flats as $data2){
				$wing=@$data2["user_flat"]["wing"];
				if(in_array($wing,$details)){
					$arranged_array[$user_id]=array("email"=>$email,"mobile"=>$mobile,"user_name"=>$user_name);
				}
			}
		}
	}elseif($send_to=="group_wise"){
		$details=explode(",",$details);
		
		foreach($details as $group_id){
			$this->loadmodel('group');
			$conditions=array("society_id"=>$s_society_id,"group_id"=>(int)$group_id);
			$group_info=$this->group->find('all',array('conditions'=>$conditions));
			$users=$group_info[0]["group"]["users"];
			foreach($users as $user_id){
				$user_ids[]=$user_id;
			}
		}
		$user_ids=array_unique($user_ids);
		
		foreach($user_ids as $user_id){
			$this->loadmodel('user');
			$conditions=array("society_id"=>$s_society_id,"user_id"=>(int)$user_id);
			$users=$this->user->find('all',array('conditions'=>$conditions));
			foreach($users as $data){
				$email=$data["user"]["email"];
				$mobile=$data["user"]["mobile"];
				$user_name=$data["user"]["user_name"];
				
				$arranged_array[$user_id]=array("email"=>$email,"mobile"=>$mobile,"user_name"=>$user_name);
			}
		}
	}
	
	$this->loadmodel('user');
	$conditions=array("user_id"=>$s_user_id,"active"=>"yes");
	$users=$this->user->find('all',array('conditions'=>$conditions));
	foreach($users as $data){
		$user_id=$data["user"]["user_id"];
		$email=$data["user"]["email"];
		$mobile=$data["user"]["mobile"];
		$user_name=$data["user"]["user_name"];
		$arranged_array[$user_id]=array("email"=>$email,"mobile"=>$mobile,"user_name"=>$user_name);
	}
		
	if(sizeof($arranged_array)==0){ $arranged_array=array(); }
	return $arranged_array;
}

function check_wing_can_delete_or_not($wing_id=null){
	$this->loadmodel('flat');
	$conditions=array("wing_id"=>(int)$wing_id);
	return $this->flat->find('count',array('conditions'=>$conditions));
}

}
?>