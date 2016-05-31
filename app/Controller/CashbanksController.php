<?php
App::import('Controller','Hms');
class CashbanksController extends HmsController {
var $helpers = array('Html', 'Form','Js');
public $components = array(
'Paginator',
'Session','Cookie','RequestHandler'
);
var $name = 'Cashbanks';
//Start validate_transaction_date//
function validate_transaction_date($transaction_date=null){
	$transaction_date=date("Y-m-d",strtotime($transaction_date));
	$transaction_date=strtotime($transaction_date);
	$this->ath();
	$s_society_id = (int)$this->Session->read('hm_society_id');
	$this->loadmodel('financial_year');
	$conditions=array("society_id" => $s_society_id,"status"=>1);
	$financial_years=$this->financial_year->find('all',array('conditions'=>$conditions));
	
	if(!empty($transaction_date)){
		//$output=0;
		foreach($financial_years as $financial_year){
			$from=$financial_year["financial_year"]["from"];
			$to=$financial_year["financial_year"]["to"];
			if($transaction_date>=$from && $transaction_date<=$to){
				$output='true'; break;
			}else{
				$output='false';
			}
			
		} echo $output; exit;
		
	}else{
		echo 'false';
	}
	
}
//End validate_transaction_date//
//Start import_bank_receipts_csv// 
function import_bank_receipts_csv(){
	if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	$this->ath();
	$s_society_id = $this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	
	$this->loadmodel('import_record');
	$conditions=array("society_id" => $s_society_id,"module_name" => "BR");
	$result_import_record = $this->import_record->find('all',array('conditions'=>$conditions));
	$this->set('result_import_record',$result_import_record);
	foreach($result_import_record as $data_import){
		$step1=(int)@$data_import["import_record"]["step1"];
		$step2=(int)@$data_import["import_record"]["step2"];
		$step3=(int)@$data_import["import_record"]["step3"];
		$step4=(int)@$data_import["import_record"]["step4"];
	}
	$process_status= @$step1+@$step2+@$step3+@$step4;
	if(@$process_status==2){
		$this->loadmodel('bank_receipt_csv');
		$conditions=array("society_id" => $s_society_id,"is_converted" => "YES");
		$total_converted_records = $this->bank_receipt_csv->find('count',array('conditions'=>$conditions));
		
		$this->loadmodel('bank_receipt_csv');
		$conditions=array("society_id" => $s_society_id);
		$total_records = $this->bank_receipt_csv->find('count',array('conditions'=>$conditions));
		
		$this->set("converted_per",($total_converted_records*100)/$total_records);
	}
	if(@$process_status==4){
		$this->loadmodel('bank_receipt_csv_converted');
		$conditions=array("society_id" => $s_society_id,"is_imported" => "YES");
		$total_converted_records = $this->bank_receipt_csv_converted->find('count',array('conditions'=>$conditions));
		
		$this->loadmodel('bank_receipt_csv_converted');
		$conditions=array("society_id" => $s_society_id);
		$total_records = $this->bank_receipt_csv_converted->find('count',array('conditions'=>$conditions));
		
		$this->set("converted_per_im",($total_converted_records*100)/$total_records);
	}
}
//End import_bank_receipts_csv// 
//Start Upload_Bank_receipt_csv_file// 
function Upload_Bank_receipt_csv_file(){
	$s_society_id = $this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	$this->ath();
	if(isset($_FILES['file'])){
		$file_name=$s_society_id.".csv";
		$file_tmp_name =$_FILES['file']['tmp_name'];
		$target = "Bank_Receipt_csv_files/";
		$target=@$target.basename($file_name);
		move_uploaded_file($file_tmp_name,@$target);
		
		
		$today = date("d-M-Y");
		
		$this->loadmodel('import_record');
		$auto_id=$this->autoincrement('import_record','auto_id');
		$this->import_record->saveAll(Array( Array("auto_id" => $auto_id, "file_name" => $file_name,"society_id" => $s_society_id, "user_id" => $s_user_id, "module_name" => "BR", "step1" => 1,"date"=>$today))); 
		
		die(json_encode("UPLOADED"));
	}
}
//End Upload_Bank_receipt_csv_file// 
//Start read_csv_file// 
function read_csv_file(){
	$this->layout=null;
	$s_society_id = $this->Session->read('hm_society_id');
	
	$f = fopen('Bank_Receipt_csv_files/'.$s_society_id.'.csv', 'r') or die("ERROR OPENING DATA");
	$batchcount=0;
	$records=0;
	while(($line = fgetcsv($f, 4096, ',')) !== false) {
	$line = implode(";", $line);
	$numcols = count($line);
	$test[]=$line;
	++$records;
	}
	$i=0;
	
	foreach($test as $child){ $i++;
		if($i>1){
			
			//$child_ar=implode(';',$child[0]);
			$child_ar=explode(';',$child);
			
			$trajection_date=$child_ar[0];
			$deposited_in=$child_ar[1];
			$receipt_mode=$child_ar[2];
			$cheque_or_reference_no=$child_ar[3];
			$date=$child_ar[4];
			$drown_in_which_bank=$child_ar[5];
			$branch_of_bank=$child_ar[6];
			$member_name=$child_ar[7];
			$wing=$child_ar[8];
			$flat=$child_ar[9];
			//$receipt_type=$child_ar[10];
			$amount=$child_ar[10];  
			$amount = str_replace(',', '', $amount); 
			$narration=$child_ar[11];
			
			$this->loadmodel('bank_receipt_csv');
			$auto_id=$this->autoincrement('bank_receipt_csv','auto_id');
			$this->bank_receipt_csv->saveAll(Array(Array("auto_id" => $auto_id, "trajection_date" => $trajection_date,"deposited_in" => $deposited_in, "receipt_mode" => $receipt_mode, "cheque_or_reference_no" => $cheque_or_reference_no, "date" => $date,"drown_in_which_bank"=>$drown_in_which_bank,"branch_of_bank"=>$branch_of_bank,"member_name"=>$member_name,"wing"=>$wing,"flat"=>$flat,"amount"=>$amount,"narration"=>$narration,"society_id"=>$s_society_id,"is_converted"=>"NO")));
		}
	}
	$this->loadmodel('import_record');
	$this->import_record->updateAll(array("step2" => 1),array("society_id" => $s_society_id, "module_name" => "BR"));
	die(json_encode("READ"));
}
//End Upload_Bank_receipt_csv_file//
//End convert_imported_data//
function convert_imported_data(){
	$this->layout=null;
	$s_society_id = $this->Session->read('hm_society_id');
	
	$this->loadmodel('bank_receipt_csv');
	$conditions=array("society_id" => $s_society_id,"is_converted" => "NO");
	$result_import_record = $this->bank_receipt_csv->find('all',array('conditions'=>$conditions,'limit'=>20));
	foreach($result_import_record as $import_record){
		$bank_receipt_csv_id=$import_record["bank_receipt_csv"]["auto_id"];
		$trajection_date=trim($import_record["bank_receipt_csv"]["trajection_date"]);
		$deposited_in=trim($import_record["bank_receipt_csv"]["deposited_in"]);
		$receipt_mode=trim(strtolower($import_record["bank_receipt_csv"]["receipt_mode"]));
		$cheque_or_reference_no=trim($import_record["bank_receipt_csv"]["cheque_or_reference_no"]);
		$date=trim($import_record["bank_receipt_csv"]["date"]);
		$drown_in_which_bank=trim($import_record["bank_receipt_csv"]["drown_in_which_bank"]);
		$branch_of_bank=trim($import_record["bank_receipt_csv"]["branch_of_bank"]);
		$member_name=$import_record["bank_receipt_csv"]["member_name"];
		$wing=trim($import_record["bank_receipt_csv"]["wing"]);
		$flat=(int)trim($import_record["bank_receipt_csv"]["flat"]);
		$flat=str_pad($flat,10,"0",STR_PAD_LEFT);
		//$receipt_type=trim(strtolower($import_record["bank_receipt_csv"]["receipt_type"]));
		$amount=trim($import_record["bank_receipt_csv"]["amount"]);
		$narration=trim($import_record["bank_receipt_csv"]["narration"]);
		
		$this->loadmodel('ledger_sub_account'); 
		$conditions=array("name"=> new MongoRegex('/^' . $deposited_in . '$/i'),"society_id"=>$s_society_id,"ledger_id"=>33);
		$result_ac=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
		if(sizeof($result_ac)>0){
			foreach($result_ac as $collection){
				$bank_id = (int)$collection['ledger_sub_account']['auto_id'];
			}
		}else{
			$bank_id=0;
		}
		
		
		$this->loadmodel('wing'); 
		$conditions=array("wing_name"=> new MongoRegex('/^' . $wing . '$/i'),"society_id"=>$s_society_id);
		$result_ac=$this->wing->find('all',array('conditions'=>$conditions));
		if(sizeof($result_ac)>0){
			foreach($result_ac as $collection){
				$wing_id = (int)$collection['wing']['wing_id'];
			}
		}else{
			$wing_id=0;
		}
		

		$this->loadmodel('flat'); 
		$conditions=array("flat_name"=>$flat, "society_id"=>$s_society_id, "wing_id"=>$wing_id);
		$result_ac=$this->flat->find('all',array('conditions'=>$conditions));
		if(sizeof($result_ac)>0){
			foreach($result_ac as $collection){
				$flat_id = (int)$collection['flat']['flat_id'];
				$true_wing_id = (int)$collection['flat']['wing_id'];
			}
		}else{
			$flat_id=0; $true_wing_id=0;
		}
		
		
		if($true_wing_id==$wing_id && ($true_wing_id!=0)){
			$ledger_sub_account_id = $this->requestAction(array('controller' => 'Fns', 'action' => 'ledger_sub_account_id_via_wing_id_and_flat_id'),array('pass'=>array($wing_id,$flat_id))); 
		}else{
			$ledger_sub_account_id = 0;
		}
		
		

		$this->loadmodel('bank_receipt_csv_converted');
		$auto_id=$this->autoincrement('bank_receipt_csv_converted','auto_id');
		$this->bank_receipt_csv_converted->saveAll(Array(Array("auto_id" => $auto_id, "trajection_date" => $trajection_date,"deposited_in" => $bank_id, "receipt_mode" => $receipt_mode, "cheque_or_reference_no" => $cheque_or_reference_no,"date"=>$date,"drown_in_which_bank"=>$drown_in_which_bank,"branch_of_bank"=>$branch_of_bank,"ledger_sub_account_id"=>$ledger_sub_account_id,"amount"=>$amount,"narration"=>$narration,"society_id"=>$s_society_id,"is_imported"=>"NO")));
		
		$this->loadmodel('bank_receipt_csv');
		$this->bank_receipt_csv->updateAll(array("is_converted" => "YES"),array("auto_id" => $bank_receipt_csv_id));
	}
	
	$this->loadmodel('bank_receipt_csv');
	$conditions=array("society_id" => $s_society_id,"is_converted" => "YES");
	$total_converted_records = $this->bank_receipt_csv->find('count',array('conditions'=>$conditions));
	
	$this->loadmodel('bank_receipt_csv');
	$conditions=array("society_id" => $s_society_id);
	$total_records = $this->bank_receipt_csv->find('count',array('conditions'=>$conditions));
	
	$converted_per=($total_converted_records*100)/$total_records;
	if($converted_per==100){ $again_call_ajax="NO"; 
		$this->loadmodel('import_record');
		$this->import_record->updateAll(array("step3" => 1),array("society_id" => $s_society_id, "module_name" => "BR"));
	}else{
		$again_call_ajax="YES"; 
			
		}
	die(json_encode(array("again_call_ajax"=>$again_call_ajax,"converted_per"=>$converted_per)));
}
//Start convert_imported_data//
//Start modify_bank_receipt_csv_data//
function modify_bank_receipt_csv_data($page=null){
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	
	
	$s_society_id = $this->Session->read('hm_society_id');
	$page=(int)$page;
	$this->set('page',$page);
	
	$this->loadmodel('financial_year');
	$conditions=array("society_id" => $s_society_id,"status"=>1);
	$financial_years=$this->financial_year->find('all',array('conditions'=>$conditions));
	$financial_year_array=array();
	foreach($financial_years as $financial_year){
		$from=date("d-m-Y",$financial_year["financial_year"]["from"]);
		$to=date("d-m-Y",$financial_year["financial_year"]["to"]);
		$pair=array($from,$to);
		$pair=implode('/',$pair);
		$financial_year_array[]=$pair;
	}
	$financial_year_string=implode(',',$financial_year_array);
	$this->set(compact("financial_year_string"));
	
	$this->loadmodel('import_record');
	$conditions=array("society_id" => $s_society_id,"module_name" => "BR");
	$result_import_record = $this->import_record->find('all',array('conditions'=>$conditions));
	$this->set('result_import_record',$result_import_record);
	foreach($result_import_record as $data_import){
		$step1=(int)@$data_import["import_record"]["step1"];
		$step2=(int)@$data_import["import_record"]["step2"];
		$step3=(int)@$data_import["import_record"]["step3"];
	}
	$process_status= @$step1+@$step2+@$step3;
	if($process_status==3){
		$this->loadmodel('bank_receipt_csv_converted'); 
		$conditions=array("society_id"=>(int)$s_society_id);
		$result_bank_receipt_converted=$this->bank_receipt_csv_converted->find('all',array('conditions'=>$conditions,"limit"=>20,"page"=>$page));
		$this->set('result_bank_receipt_converted',$result_bank_receipt_converted);
		
		$this->loadmodel('bank_receipt_csv_converted'); 
		$conditions=array("society_id"=>(int)$s_society_id);
		$count_bank_receipt_converted=$this->bank_receipt_csv_converted->find('count',array('conditions'=>$conditions));
		$this->set('count_bank_receipt_converted',$count_bank_receipt_converted);
	}
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id" => 33,"society_id"=>$s_society_id);
	$result_banks=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('result_banks',$result_banks);
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id" => 34,"society_id"=>$s_society_id,"exited"=>"no");
	$result_members=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('result_members',$result_members);
			
}
//End modify_bank_receipt_csv_data//
//Start cancle_bank_receipt_import// 
function cancle_bank_receipt_import(){
	$s_society_id = $this->Session->read('hm_society_id');
	
	$this->loadmodel('bank_receipt_csv_converted');
	$conditions=array("society_id"=>(int)$s_society_id);
	$this->bank_receipt_csv_converted->deleteAll($conditions);
	
	$this->loadmodel('bank_receipt_csv');
	$conditions=array("society_id"=>(int)$s_society_id);
	$this->bank_receipt_csv->deleteAll($conditions);
	
	$this->loadmodel('import_record');
	$conditions=array("society_id"=>(int)$s_society_id);
	$this->import_record->deleteAll($conditions);
	
	$this->redirect(array('controller' => 'Cashbanks','action' => 'import_bank_receipts_csv'));
}
//End cancle_bank_receipt_import//
//Start check_bank_receipt_csv_validation// 
function check_bank_receipt_csv_validation($page=null){
	$this->layout=null;
	
	$this->ath();
	$s_society_id = $this->Session->read('hm_society_id');
	$page=(int)$page;
	
	$this->loadmodel('bank_receipt_csv_converted'); 
	$conditions=array("society_id"=>(int)$s_society_id);
	$order=array('bank_receipt_csv_converted.auto_id'=>'ASC');
	$result_bank_receipt_converted=$this->bank_receipt_csv_converted->find('all',array('conditions'=>$conditions,'order'=>$order,"limit"=>20,"page"=>$page));
	foreach($result_bank_receipt_converted as $receipt_converted){
		$auto_id=$receipt_converted["bank_receipt_csv_converted"]["auto_id"];
		$trajection_date=$receipt_converted["bank_receipt_csv_converted"]["trajection_date"];
		$deposited_in=(int)$receipt_converted["bank_receipt_csv_converted"]["deposited_in"];
		$receipt_mode=$receipt_converted["bank_receipt_csv_converted"]["receipt_mode"];
		$cheque_or_reference_no=$receipt_converted["bank_receipt_csv_converted"]["cheque_or_reference_no"];
		$date=$receipt_converted["bank_receipt_csv_converted"]["date"];
		$drown_in_which_bank=$receipt_converted["bank_receipt_csv_converted"]["drown_in_which_bank"];
		$branch_of_bank=$receipt_converted["bank_receipt_csv_converted"]["branch_of_bank"];
		$ledger_sub_account_id=$receipt_converted["bank_receipt_csv_converted"]["ledger_sub_account_id"];
		$amount=(int)$receipt_converted["bank_receipt_csv_converted"]["amount"];
		$receipt_type=(int)$receipt_converted["bank_receipt_csv_converted"]["receipt_type"];
		$narration=$receipt_converted["bank_receipt_csv_converted"]["narration"];
		
		
		if(empty($trajection_date)){ $trajection_date_v=1; }else{ $trajection_date_v=0; }
		if(empty($deposited_in)){ $deposited_in_v=1; }else{ $deposited_in_v=0; }
		$receipt_mode_v=0;
		if($receipt_mode=="cheque"){
			if(empty($cheque_or_reference_no)){	$cheque_or_reference_no_v=1; }else{ $cheque_or_reference_no_v=0; }
			if(empty($date)){	$date_v=1; }else{ $date_v=0; }
			if(empty($drown_in_which_bank)){ $drown_in_which_bank_v=1; }else{ $drown_in_which_bank_v=0; }
			if(empty($branch_of_bank)){ $branch_of_bank_v=1; }else{ $branch_of_bank_v=0; }
		}elseif($receipt_mode=="neft" || $receipt_mode=="pg"){
			if(empty($cheque_or_reference_no)){	$cheque_or_reference_no_v=1; }else{ $cheque_or_reference_no_v=0; }
			if(empty($date)){	$date_v=1; }else{ $date_v=0; }
			$drown_in_which_bank_v=0;
			$branch_of_bank_v=0;
		}
		
		if(empty($ledger_sub_account_id)){ $ledger_sub_account_id_v=1; }else{ $ledger_sub_account_id_v=0; }
		if(empty($amount)){ $amount_v=1; }else{ $amount_v=0; }
		if(empty($receipt_type)){ $receipt_type_v=1; }else{ $receipt_type_v=0; }
		
		$v_result[]=array($trajection_date_v,$deposited_in_v,$receipt_mode_v,$cheque_or_reference_no_v,$date_v,$drown_in_which_bank_v,$branch_of_bank_v,$ledger_sub_account_id_v,$amount_v,$receipt_type_v,$auto_id);
	}
		
	die(json_encode($v_result));
}
//End check_bank_receipt_csv_validation//
//Start auto_save_bank_receipt//
function auto_save_bank_receipt($record_id=null,$field=null,$value=null){
	$this->layout=null;
	
	$this->ath();
	$s_society_id = $this->Session->read('society_id');
	$record_id=(int)$record_id; 
	
	if($field=="trajection_date"){
		if(empty($value)){ echo "F";}
		else{
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("trajection_date" => $value),array("auto_id" => $record_id));
			echo "T";
		}
	}
	
	if($field=="deposited_in"){
		if(empty($value)){ echo "F";}
		else{
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("deposited_in" => (int)$value),array("auto_id" => $record_id));
			echo "T";
		}
	}
	
	if($field=="receipt_mode"){
		if(empty($value)){ echo "F";}
		else{
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("receipt_mode" => strtolower($value)),array("auto_id" => $record_id));
			echo "T";
		}
	}
	
	if($field=="cheque_or_reference_no"){
		if(empty($value)){ echo "F";}
		else{
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("cheque_or_reference_no" => $value),array("auto_id" => $record_id));
			echo "T";
		}
	}
	
	if($field=="date"){
		if(empty($value)){ echo "F";}
		else{
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("date" => $value),array("auto_id" => $record_id));
			echo "T";
		}
	}
	
	if($field=="drown_in_which_bank"){
		if(empty($value)){ echo "F";}
		else{
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("drown_in_which_bank" => $value),array("auto_id" => $record_id));
			echo "T";
		}
	}
	
	if($field=="branch_of_bank"){
		if(empty($value)){ echo "F";}
		else{
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("branch_of_bank" => $value),array("auto_id" => $record_id));
			echo "T";
		}
	}
	
	if($field=="ledger_sub_account_id"){
		if(empty($value)){ echo "F";}
		else{
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("ledger_sub_account_id" => (int)$value),array("auto_id" => $record_id));
			echo "T";
		}
	}
	
	
	if($field=="amount"){
		$value = str_replace(',', '', $value);
		if(empty($value)){ echo "F"; 
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("amount" => (int)$value),array("auto_id" => $record_id));
		}
		else{
			$this->loadmodel('bank_receipt_csv_converted');
			$this->bank_receipt_csv_converted->updateAll(array("amount" => (int)$value),array("auto_id" => $record_id));
			echo "T";
		}
	}
	
	if($field=="receipt_type"){
		$this->loadmodel('bank_receipt_csv_converted');
		$this->bank_receipt_csv_converted->updateAll(array("receipt_type" => $value),array("auto_id" => $record_id));
		echo "T";
	}
	
	if($field=="narration"){
		$this->loadmodel('bank_receipt_csv_converted');
		$this->bank_receipt_csv_converted->updateAll(array("narration" => $value),array("auto_id" => $record_id));
		echo "T";
	}
	
}
//End auto_save_bank_receipt//
//Start allow_import_bank_receipt//
function allow_import_bank_receipt(){
	$this->layout=null;
	
	$this->ath();
	$s_society_id = $this->Session->read('hm_society_id');
	
	
	$this->loadmodel('bank_receipt_csv_converted'); 
	$conditions=array("society_id"=>(int)$s_society_id);
	$order=array('bank_receipt_csv_converted.auto_id'=>'ASC');
	$result_bank_receipt_converted=$this->bank_receipt_csv_converted->find('all',array('conditions'=>$conditions,'order'=>$order));
	foreach($result_bank_receipt_converted as $receipt_converted){
		$deposited_in=(int)$receipt_converted["bank_receipt_csv_converted"]["deposited_in"];
		$ledger_sub_account_id=$receipt_converted["bank_receipt_csv_converted"]["ledger_sub_account_id"];
		$amount=(float)$receipt_converted["bank_receipt_csv_converted"]["amount"];
		$trajection_date=$receipt_converted["bank_receipt_csv_converted"]["trajection_date"];
        $transaction_date_for_regular_bill=date('Y-m-d',strtotime($trajection_date)); 
	    $transaction_date_for_regular_bill=strtotime($transaction_date_for_regular_bill);
	
	$nn=0;
	$this->loadmodel('regular_bill'); 
	$order=array('regular_bill.start_date'=>'DESC');
	$conditions=array("society_id"=>(int)$s_society_id,"ledger_sub_account_id"=>(int)$ledger_sub_account_id);
	$result_regular_bill=$this->regular_bill->find('all',array('conditions'=>$conditions,'order'=>$order,'limit'=>2));
	foreach($result_regular_bill as $data){
	$start_date=$data['regular_bill']['start_date'];	
	$nn++;
	}
	
   if($nn==1 || $nn==0){
		$regular_bill_date_valid="not_match";   
   }
   else
   {
		if($transaction_date_for_regular_bill <= $start_date)
		{
		$regular_bill_date_valid="match";  
		}
		else
		{
		$regular_bill_date_valid="not_match";  
		}   
   }	

		
		$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				$from1 = date('Y-m-d',($from));
				$to1 = date('Y-m-d',($to));
				$from2 = strtotime($from1);
				$to2 = strtotime($to1);
				$transaction1 = date('Y-m-d',strtotime($trajection_date));
				$transaction2 = strtotime($transaction1);
					if($transaction2 <= $to2 && $transaction2 >= $from2){
					$abc = 5;
					break;
					}	
		}

		
		
		if(empty($deposited_in) or empty($ledger_sub_account_id) or empty($amount) or $abc==555 or $regular_bill_date_valid=="match"){
			die("not_validate");
		}
	}
	
	
	$this->loadmodel('import_record');
	$this->import_record->updateAll(array("step4" => 1),array("society_id" => $s_society_id, "module_name" => "BR"));
}
//End allow_import_bank_receipt//
//Start final_import_bank_receipt_ajax// 
function final_import_bank_receipt_ajax(){
	$this->layout=null;
	$s_society_id = $this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	
	$this->loadmodel('import_record');
	$conditions=array("society_id" => $s_society_id,"module_name" => "BR");
	$result_import_record = $this->import_record->find('all',array('conditions'=>$conditions));
	$this->set('result_import_record',$result_import_record);
	foreach($result_import_record as $data_import){
		$step1=(int)@$data_import["import_record"]["step1"];
		$step2=(int)@$data_import["import_record"]["step2"];
		$step3=(int)@$data_import["import_record"]["step3"];
		$step4=(int)@$data_import["import_record"]["step4"];
	}
	$process_status= @$step1+@$step2+@$step3+@$step4;
	
	if($process_status==4){
		$this->loadmodel('bank_receipt_csv_converted');
		$conditions=array("society_id" => $s_society_id,"is_imported" => "NO");
		$result_import_converted = $this->bank_receipt_csv_converted->find('all',array('conditions'=>$conditions,'limit'=>2));
		
		foreach($result_import_converted as $import_converted){
			$bank_receipt_csv_id=$import_converted["bank_receipt_csv_converted"]["auto_id"];
			$trajection_date=$import_converted["bank_receipt_csv_converted"]["trajection_date"];
			$trajection_date = date('Y-m-d',strtotime($trajection_date));
			$trajection_date = strtotime($trajection_date); 
			$deposited_in=$import_converted["bank_receipt_csv_converted"]["deposited_in"];
			$receipt_mode=$import_converted["bank_receipt_csv_converted"]["receipt_mode"];
			$cheque_or_reference_no=$import_converted["bank_receipt_csv_converted"]["cheque_or_reference_no"];
			$date=$import_converted["bank_receipt_csv_converted"]["date"];
			$drown_in_which_bank=$import_converted["bank_receipt_csv_converted"]["drown_in_which_bank"];
			$branch_of_bank=$import_converted["bank_receipt_csv_converted"]["branch_of_bank"];
			$ledger_sub_account_id=$import_converted["bank_receipt_csv_converted"]["ledger_sub_account_id"];
			$amount=$import_converted["bank_receipt_csv_converted"]["amount"];
			$narration=$import_converted["bank_receipt_csv_converted"]["narration"];
			//$receipt_type=$import_converted["bank_receipt_csv_converted"]["receipt_type"];
			
			
			
				
				$current_date = date('d-m-Y');
				
				$this->loadmodel('cash_bank');
				$auto_id=$this->autoincrement('cash_bank','transaction_id');
				$receipt_number=$this->autoincrement_with_society_ticket('cash_bank','receipt_number');
				$this->cash_bank->saveAll(Array( Array("transaction_id" => $auto_id, "transaction_date" => $trajection_date,"deposited_in" => $deposited_in, "receipt_mode" => $receipt_mode, "cheque_number" => $cheque_or_reference_no,"date"=>$date,"drown_in_which_bank"=>$drown_in_which_bank,"branch_of_bank"=>$branch_of_bank,"received_from"=>"residential","ledger_sub_account_id"=>$ledger_sub_account_id,"amount"=>$amount,"narration"=>$narration,"society_id"=>$s_society_id,"created_by"=>$s_user_id,"source"=>"bank_receipt","applied"=>"no","receipt_number"=>$receipt_number,"created_on"=>$current_date))); 
				
				
				$this->loadmodel('ledger');
				$ledger_id=$this->autoincrement('ledger','auto_id');
				$this->ledger->saveAll(Array( Array("auto_id" => $ledger_id, "transaction_date"=> $trajection_date, "debit" => $amount, "credit" =>null, "ledger_account_id" => 33, "ledger_sub_account_id" => $deposited_in,"table_name" => "cash_bank","element_id" => $auto_id, "society_id" => $s_society_id))); 

				$ledger_id=$this->autoincrement('ledger','auto_id');
				$this->ledger->saveAll(Array( Array("auto_id" => $ledger_id, "transaction_date"=> $trajection_date, "credit" => $amount,"debit" =>null,"ledger_account_id" => 34, "ledger_sub_account_id" => $ledger_sub_account_id,"table_name" => "cash_bank","element_id" => $auto_id,"society_id"=>$s_society_id)));
				
				$this->loadmodel('bank_receipt_csv_converted');
				$this->bank_receipt_csv_converted->updateAll(array("is_imported" => "YES"),array("auto_id" => $bank_receipt_csv_id));
						
			
	}
		
		
		$this->loadmodel('bank_receipt_csv_converted');
		$conditions=array("society_id" => $s_society_id,"is_imported" => "YES");
		$total_converted_records = $this->bank_receipt_csv_converted->find('count',array('conditions'=>$conditions));
		
		$this->loadmodel('bank_receipt_csv_converted');
		$conditions=array("society_id" => $s_society_id);
		$total_records = $this->bank_receipt_csv_converted->find('count',array('conditions'=>$conditions));
		
		$converted_per=($total_converted_records*100)/$total_records;
		if($converted_per==100){ $again_call_ajax="NO"; 
			
			$this->loadmodel('bank_receipt_csv_converted');
			$conditions4=array('society_id'=>$s_society_id);
			$this->bank_receipt_csv_converted->deleteAll($conditions4);
			
			$this->loadmodel('bank_receipt_csv');
			$conditions4=array('society_id'=>$s_society_id);
			$this->bank_receipt_csv->deleteAll($conditions4);
			
			$this->loadmodel('import_record');
			$conditions4=array("society_id" => $s_society_id, "module_name" => "BR");
			$this->import_record->deleteAll($conditions4);
		}else{
			$again_call_ajax="YES"; 
			}
		die(json_encode(array("again_call_ajax"=>$again_call_ajax,"converted_per_im"=>$converted_per)));
	}
}
//End final_import_bank_receipt_ajax// 
//Start delete_bank_receipt_row//
function delete_bank_receipt_row($record_id=null){
	$this->layout=null;
	$s_society_id = $this->Session->read('society_id');
	$s_user_id=$this->Session->read('user_id');
	$this->loadmodel('bank_receipt_csv_converted');
	$conditions4=array("auto_id" => (int)$record_id);
	$this->bank_receipt_csv_converted->deleteAll($conditions4);
	echo "1";
}
//End delete_bank_receipt_row//
//Start bank receipt View//
function bank_receipt_view()
{
		if($this->RequestHandler->isAjax()){
		$this->layout='blank';
		}else{
		$this->layout='session';
		}
	
		$this->ath();
		$this->check_user_privilages();	
	
		$s_society_id = $this->Session->read('hm_society_id');
		$s_user_id=$this->Session->read('hm_user_id');

		
	if($this->request->is('post'))	
	{
	 $cancel_type=$this->request->data['cancel'];
	 $transaction_id=(int)$this->request->data['transaction_id_for_cancel'];
		
	
		$this->loadmodel('cash_bank');
		$conditions=array("society_id"=>$s_society_id,"transaction_id"=>$transaction_id);
		$result_cash_bank=$this->cash_bank->find('all',array('conditions'=>$conditions));
		foreach($result_cash_bank as $data){
		$ledger_sub_account_id_old=(int)$data['cash_bank']['ledger_sub_account_id'];	
		$ignore_receipt_number=$data['cash_bank']['receipt_number'];
		$amount=$data['cash_bank']['amount'];
		$transaction_date=$data['cash_bank']['transaction_date'];
		}
		
		if($cancel_type==1){
		$narration="Due to cheque bounce the receipt cancelled of amount ".$amount."";		
		}else{
		$narration="Due to duplicacy the receipt cancelled of amount ".$amount."";
		}
		
		
    $transaction_date=date('d-m-Y',($transaction_date));
	$this->loadmodel('cash_bank');
	$this->cash_bank->updateAll(Array("amount"=>0,"narration"=>$narration),Array("transaction_id"=>$transaction_id));	
		
	$this->loadmodel('ledger');
	$conditions4=array("element_id"=>(int)$transaction_id);
	$this->ledger->deleteAll($conditions4);
	
	
	$old_user_data=$this->requestAction(array('controller'=>'Fns','action'=>'member_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id_old)));
	$old_user_name=$old_user_data['user_name'];		
	$old_wing=$old_user_data['wing_name'];
	$old_flat=$old_user_data['flat_name'];
	$old_user_email_id=$old_user_data['email'];
	$old_user_mobile=$old_user_data['mobile'];
	$old_wing_flat=$old_wing.'-'.$old_flat;
	 
	$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));
	$email_message='<table width="80%" class="hmlogobox">
		<tr>
		<td width="50%" style="padding: 10px 0px 0px 10px;"><img src="'.$ip.$this->webroot.'/as/hm/hm-logo.png" style="max-height: 60px; " height="60px" /></td>
		<td width="50%" align="right" valign="middle"  style="padding: 7px 10px 0px 0px;">
		<a href="https://www.facebook.com/HousingMatters.co.in"><img src="'.$ip.$this->webroot.'/as/hm/SMLogoFB.png" style="max-height: 30px; height: 30px; width: 30px; max-width: 30px;" height="30px" width="30px" /></a>
		</td>
		</tr>
		</table><br/><br/>';

		if($cancel_type==1){
		$email_message.='Receipt- '.$ignore_receipt_number.' is cancelled due to cheque bounce.';
    	}else{
		$email_message.='Receipt- '.$ignore_receipt_number.' is cancelled due to duplicacy.';
		}
		$email_message.='<br/><br/> Thank You <br/>
		HousingMatters (Support Team)<br/>
			www.housingmatters.in';
		
		$this->loadmodel('society'); 
		$conditions=array("society_id"=>$s_society_id);
		$cursor1=$this->society->find('all',array('conditions'=>$conditions));
		foreach($cursor1 as $dataa){
		$society_name=$dataa['society']['society_name'];	
		$society_reg_no=$dataa['society']['society_reg_num']; 
		$society_address=$dataa['society']['society_address'];
		$sig_title=$dataa['society']['sig_title'];
		$email_is_on_off=(int)@$dataa["society"]["account_email"];
		$sms_is_on_off=(int)@$dataa['society']['account_sms'];
		}

	 if($email_is_on_off==1){
			    	if(!empty($old_user_email_id)){
					$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".$transaction_date." against Unit ".$old_wing_flat."";
				
					$this->send_email($old_user_email_id,'accounts@housingmatters.in','HousingMatters',$subject,$email_message,'donotreply@housingmatters.in');
				}
			}		 
	$this->Session->write('bank_receipt_cancel',1);		
	
	}		
}
//End Bank receipt View//
//Start bank_receipt_excel//
function bank_receipt_excel()
{
	$this->layout=null;
	$this->ath();

	$s_society_id = (int)$this->Session->read('hm_society_id');
	$s_role_id= $this->Session->read('role_id');
	$s_user_id= $this->Session->read('hm_user_id');

	 $from =(int)$this->request->query('from');
	 $to =(int)$this->request->query('to');
	 
	 $this->set('from',$from);
	 $this->set('to',$to);
	
	$this->loadmodel('cash_bank');
	$conditions=array('society_id'=>$s_society_id,"source"=>"bank_receipt",	'cash_bank.transaction_date'=>array('$gte'=>$from,'$lte'=>$to));
	
	$order=array('cash_bank.transaction_date'=> 'ASC');
	$receipts=$this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
	
	$this->set('receipts',$receipts);
	
	$this->loadmodel('society');
	$conditions=array('society_id'=>$s_society_id);
	$society_info=$this->society->find('all',array('conditions'=>$conditions));
	$this->set('society_info',$society_info);
}
//End bank_receipt_excel//
//Start bank_receipt_show_ajax// 
function bank_receipt_show_ajax($from=null,$to=null)
{
	$this->layout='ajax_blank';

	$this->ath();
	$s_society_id = $this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');

	 $from = date('Y-m-d',strtotime($from));
	 $to = date('Y-m-d',strtotime($to));

	$from = strtotime($from);
	$to = strtotime($to);

	$this->set('from',$from);
	$this->set('to',$to);

	$this->loadmodel('cash_bank');
	$conditions=array('society_id'=>$s_society_id,"source"=>"bank_receipt",	'cash_bank.transaction_date'=>array('$gte'=>$from,'$lte'=>$to));
	$order=array('cash_bank.transaction_date'=> 'ASC');
	$receipts=$this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
	$this->set('receipts',$receipts);
	
	$this->loadmodel('society');
	$conditions=array('society_id'=>$s_society_id);
	$society_info=$this->society->find('all',array('conditions'=>$conditions));
	$this->set('society_info',$society_info);

	
}
//End bank_receipt_show_ajax// 
//Start cancel_receipt_due_to_check_bounce//
function cancel_receipt_due_to_check_bounce($record_id=null){
	$this->ath();
	$s_role_id=$this->Session->read('role_id');
	$s_society_id = $this->Session->read('society_id');
	$s_user_id=$this->Session->read('user_id');
		
	$this->loadmodel('new_cash_bank');
	$conditions=array("transaction_id"=>(int)$record_id);
	$result_new_cash_bank = $this->new_cash_bank->find('all',array('conditions'=>$conditions));
	foreach($result_new_cash_bank as $data){
		$amount=$data["new_cash_bank"]["amount"];
		$deposited_bank_id=$data["new_cash_bank"]["deposited_bank_id"];
		$flat_id=(int)$data["new_cash_bank"]["flat_id"];
		$bill_one_time_id=$data["new_cash_bank"]["bill_one_time_id"];
	}
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id"=>34,"flat_id"=>$flat_id);
	$result_ledger_sub_account= $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	foreach($result_ledger_sub_account as $data){
		$ledger_sub_account_id=$data["ledger_sub_account"]["auto_id"];
	}
	
	$current_date = date('Y-m-d');
	$current_date = strtotime($current_date); 
	
	$voucher_id=$this->autoincrement_with_society_ticket('journal','voucher_id');
	$journal_id=$this->autoincrement('journal','journal_id');
	$this->loadmodel('journal');
	$multipleRowData = Array( Array("journal_id" => $journal_id,"ledger_account_id" => 34,"ledger_sub_account_id"=>$ledger_sub_account_id,"user_id" => $s_user_id, "transaction_date" => $current_date,"current_date" => $current_date, "credit" => null,'debit'=>$amount, "remark" => "Receipt canceled due to cheque bounce" ,"society_id" => $s_society_id,'voucher_id'=>$voucher_id));
	$this->journal->saveAll($multipleRowData);
	
	$this->loadmodel('ledger');
	$auto_id=$this->autoincrement('ledger','auto_id');
	$this->ledger->saveAll(array("auto_id" => $auto_id,"ledger_account_id" => 34,"ledger_sub_account_id" =>$ledger_sub_account_id,"debit"=>$amount,"credit"=>null,"table_name"=>"journal","element_id"=>$journal_id,"society_id"=>$s_society_id,"transaction_date"=>$current_date));
	
	$journal_id=$this->autoincrement('journal','journal_id');
	$this->loadmodel('journal');
	$multipleRowData = Array( Array("journal_id" => $journal_id,"ledger_account_id" => 33,"ledger_sub_account_id"=>$deposited_bank_id,"user_id" => $s_user_id, "transaction_date" => $current_date,"current_date" => $current_date, "credit" => $amount,'debit'=>null, "remark" => "Receipt canceled due to cheque bounce" ,"society_id" => $s_society_id,'voucher_id'=>$voucher_id));
	$this->journal->saveAll($multipleRowData);
	
	$this->loadmodel('ledger');
	$auto_id=$this->autoincrement('ledger','auto_id');
	$this->ledger->saveAll(array("auto_id" => $auto_id,"ledger_account_id" => 33,"ledger_sub_account_id" =>$deposited_bank_id,"debit"=>null,"credit"=>$amount,"table_name"=>"journal","element_id"=>$journal_id,"society_id"=>$s_society_id,"transaction_date"=>$current_date));
	
	$this->loadmodel('new_cash_bank');
	$this->new_cash_bank->updateAll(array('narration'=>'Receipt canceled due to cheque bounce','is_cancel'=>'YES'),array("transaction_id"=>(int)$record_id));	
	
	
	
	
	
	//APPLY RECEIPT
	$this->loadmodel('new_cash_bank');
	$condition=array('society_id'=>$s_society_id,"flat_id"=>$flat_id,"bill_one_time_id"=>$bill_one_time_id,"edit_status"=>"NO","is_cancel"=>"NO");
	$result_new_cash_bank=$this->new_cash_bank->find('all',array('conditions'=>$condition));
	
	
	$q=0; foreach($result_new_cash_bank as $cash_bank){ $q++;
		$amount=$cash_bank["new_cash_bank"]["amount"];
		
		
		$this->loadmodel('new_regular_bill');
		$condition=array("flat_id"=>$flat_id,"edit_status"=>"NO","one_time_id"=>$bill_one_time_id);
		$result_new_regular_bill=$this->new_regular_bill->find('all',array('conditions'=>$condition)); 
		
		 foreach($result_new_regular_bill as $bill_data){ 
			$bill_auto_id=$bill_data["new_regular_bill"]["auto_id"];
			
			if($q==1){
				$arrear_intrest=$bill_data["new_regular_bill"]["arrear_intrest"];
				$intrest_on_arrears=$bill_data["new_regular_bill"]["intrest_on_arrears"];
				$total=$bill_data["new_regular_bill"]["total"];
				$arrear_maintenance=$bill_data["new_regular_bill"]["arrear_maintenance"];
			}else{
				$arrear_intrest=$bill_data["new_regular_bill"]["new_arrear_intrest"];
				$intrest_on_arrears=$bill_data["new_regular_bill"]["new_intrest_on_arrears"];
				$total=$bill_data["new_regular_bill"]["new_total"];
				$arrear_maintenance=$bill_data["new_regular_bill"]["new_arrear_maintenance"];
			}
			
		}
		
		$amount_after_arrear_intrest=$amount-$arrear_intrest;
		if($amount_after_arrear_intrest<0)
		{
		$new_arrear_intrest=abs($amount_after_arrear_intrest);
		$new_intrest_on_arrears=$intrest_on_arrears;
		$new_arrear_maintenance=$arrear_maintenance;
		$new_total=$total;
		}
		else
		{
		$new_arrear_intrest=0;
		$amount_after_intrest_on_arrears=$amount_after_arrear_intrest-$intrest_on_arrears;
			if($amount_after_intrest_on_arrears<0)
			{
			$new_intrest_on_arrears=abs($amount_after_intrest_on_arrears);
			$new_arrear_maintenance=$arrear_maintenance;
			$new_total=$total;
			}
			else
			{
			$new_intrest_on_arrears=0;
			$amount_after_arrear_maintenance=$amount_after_intrest_on_arrears-$arrear_maintenance;
				if($amount_after_arrear_maintenance<0){
				$new_arrear_maintenance=abs($amount_after_arrear_maintenance);
				$new_total=$total;
				}else{
				$new_arrear_maintenance=0;
				$amount_after_total=$amount_after_arrear_maintenance-$total; 
				if($amount_after_total>0){
				$new_total=0;
				$new_arrear_maintenance=-$amount_after_total;
				}else{
							$new_total=abs($amount_after_total);
							
					}
				}
			}
		}
		
		$this->loadmodel('new_regular_bill');
		$this->new_regular_bill->updateAll(array('new_arrear_intrest'=>$new_arrear_intrest,"new_intrest_on_arrears"=>$new_intrest_on_arrears,"new_arrear_maintenance"=>$new_arrear_maintenance,"new_total"=>$new_total),array('auto_id'=>(int)$bill_auto_id));
	}
	
	if(sizeof($result_new_cash_bank)==0){
		$this->loadmodel('new_regular_bill');
		$this->new_regular_bill->updateAll(array('new_arrear_intrest'=>null,"new_intrest_on_arrears"=>null,"new_arrear_maintenance"=>null,"new_total"=>null),array('auto_id'=>(int)$record_id));
	}
	
	
	
	?>
	<button type="button" class="close" id="close_model" ></button>
	<div style="font-size: 14px;">
		<strong>Success!</strong> <span>Receipt canceled successfully.</span>
	</div>
	<?php
}
//End cancel_receipt_due_to_check_bounce//
//Start bank receipt//
function bank_receipt()
{
		if($this->RequestHandler->isAjax())
		{
		$this->layout='blank';
		}else{
		$this->layout='session';
		}
$s_society_id=(int)$this->Session->read('society_id');
		$this->ath();

    $credit_dc=0; $debit_dc=0;
	//$this->loadmodel('ledger_sub_account');
	//$conditions=array('society_id'=>$s_society_id,'ledger_id'=>34);	
	//$aaaa=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	//foreach($aaaa as $dataa)
	//{
	//$bank_id = (int)$dataa['ledger_sub_account']['auto_id'];	
	
    $this->loadmodel('ledger');
	$conditions2=array('society_id'=>$s_society_id,'ledger_account_id'=>34);	
	$ledger_result_dc=$this->ledger->find('all',array('conditions'=>$conditions2));
	
	foreach($ledger_result_dc as $data_dc){
		$debit_dc+=$data_dc["ledger"]["debit"];
		$credit_dc+=$data_dc["ledger"]["credit"];
}
	echo $credit_dc;
	exit;


/*
$this->loadmodel('new_cash_bank');
$conditions=array('society_id'=>$s_society_id,"receipt_source"=>1);	
$aaaa=$this->new_cash_bank->find('all',array('conditions'=>$conditions));
foreach($aaaa as $dataa)
{
$element = (int)$dataa['new_cash_bank']['transaction_id'];
$n=0;
$this->loadmodel('ledger');
$conditions=array('society_id'=>$s_society_id,"element_id"=>$element,"table_name"=>"new_cash_bank");	
$aaaaa=$this->ledger->find('all',array('conditions'=>$conditions));
foreach($aaaaa as $dataaa)
{
$n++;	
}
if($n == 3)
{
echo "three";
break;	
}	
}
echo"sdgdsg";
exit;

*/
}
//End bank receipt//
//Start Bank Payment//
function bank_payment()
{
if($this->RequestHandler->isAjax()){
$this->layout='blank';
}else{
$this->layout='session';
}
	
	$this->ath();
	$this->check_user_privilages();	
		$s_role_id=$this->Session->read('role_id');
			$s_society_id = $this->Session->read('hm_society_id');
				$s_user_id=$this->Session->read('hm_user_id');
	$this->set('s_role_id',$s_role_id);

$this->loadmodel('financial_year');
	$conditions=array("society_id" => $s_society_id,"status"=>1);
	$financial_years=$this->financial_year->find('all',array('conditions'=>$conditions));
	$financial_year_array=array();
	foreach($financial_years as $financial_year){
		$from=date("d-m-Y",$financial_year["financial_year"]["from"]);
		$to=date("d-m-Y",$financial_year["financial_year"]["to"]);
		$pair=array($from,$to);
		$pair=implode('/',$pair);
		$financial_year_array[]=$pair;
	}
	$financial_year_string=implode(',',$financial_year_array);
	$this->set(compact("financial_year_string"));	
	
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("society_id" => $s_society_id, "ledger_id" => 33);
	$cursor2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor2',$cursor2);

	$this->loadmodel('master_tds');
	$cursor3=$this->master_tds->find('all');
	$this->set('cursor3',$cursor3);

	$this->loadmodel('reference');
	$conditions=array("auto_id"=>3);
	$cursor = $this->reference->find('all',array('conditions'=>$conditions));
	foreach($cursor as $collection){
		$tds_arr = @$collection['reference']['reference'];
		}
		$this->set("tds_arr",@$tds_arr);
       
	if(isset($this->request->data['submit'])){
			$transaction_dates=$this->request->data['transaction_date'];
			  $invoice_references=$this->request->data['invoice_reference'];
			    $ledger_accounts=$this->request->data['ledger_account'];
			      $instruments=$this->request->data['instrument'];
			        $modes=$this->request->data['payment_mode'];
			          $amounts=$this->request->data['amount'];
			            $tdss=$this->request->data['tds'];
			              $net_amounts=$this->request->data['net_amount'];
			                $bank_accounts=$this->request->data['bank_account'];
			                  $narrations=$this->request->data['narration'];
		$n=0;  $receipt_array=array();
		foreach($transaction_dates as $transaction_date){ $tds="";
			 $transaction_date=date('Y-m-d',strtotime($transaction_date));
			   $invoice_reference=@$invoice_references[$n];
			     $ledger_account=$ledger_accounts[$n];
			       $instrument=$instruments[$n];
			         $mode=$modes[$n];
			           $amount=$amounts[$n];
						 $tds=$tdss[$n];
						   $net_amount=$net_amounts[$n];
							 $bank_account=(int)$bank_accounts[$n];
						       $narration=$narrations[$n];
							   
						$ledger_account_array=explode(',',$ledger_account);
						  $ledger_account_id=(int)$ledger_account_array[0];
						     $ledger_account_type=(int)$ledger_account_array[1];
	          	$current_date=date('Y-m-d');	
	
	$i=$this->autoincrement('cash_bank','transaction_id');
	$bbb=$this->autoincrement_with_receipt_source('cash_bank','receipt_number','bank_payment');
	$receipt_array[]=$bbb;
	$this->loadmodel('cash_bank');
	$multipleRowData=Array(Array("transaction_id"=>$i,"receipt_number"=>$bbb,"created_on"=>$current_date, 
	"transaction_date"=>strtotime($transaction_date),"created_by"=>$s_user_id, 
	"sundry_creditor_id"=>$ledger_account_id,"invoice_reference"=>@$invoice_reference,"narration"=>$narration, "receipt_mode"=>$mode,"receipt_instruction"=>$instrument,"account_head"=>$bank_account, 
	"amount"=>$amount,"society_id"=>$s_society_id,"tds_id" =>$tds,"account_type"=>$ledger_account_type,"source"=>"bank_payment","auto_inc"=>"YES","tds_tax_amount"=>$tds));
	$this->cash_bank->saveAll($multipleRowData);  

	if($ledger_account_type==1){
			$l=$this->autoincrement('ledger','auto_id');
			$this->loadmodel('ledger');
			$multipleRowData = Array( Array("auto_id"=> $l,"transaction_date"=>strtotime($transaction_date),"debit"=>$amount,"credit"=>null,"ledger_account_id"=>15, "ledger_sub_account_id"=>$ledger_account_id,"table_name"=>"cash_bank","element_id"=>$i, "society_id"=>$s_society_id));
			$this->ledger->saveAll($multipleRowData); 
	}else{
			$l=$this->autoincrement('ledger','auto_id');
			$this->loadmodel('ledger');
			$multipleRowData=Array(Array("auto_id"=>$l,"transaction_date"=>strtotime($transaction_date),"debit"=>$amount,"credit"=>null,"ledger_account_id"=>$ledger_account_id,"ledger_sub_account_id" =>null,"table_name"=>"cash_bank","element_id" =>$i,"society_id"=>$s_society_id));
			$this->ledger->saveAll($multipleRowData); 
    }

			$tds_amount=round($tds);
			$total_tds_amount=$amount-$tds_amount;
			$l=$this->autoincrement('ledger','auto_id');
			$this->loadmodel('ledger');
			$multipleRowData=Array(Array("auto_id"=>$l,"transaction_date"=>strtotime($transaction_date),"debit"=>null,"credit"=>$total_tds_amount,"ledger_account_id" =>33, 
			"ledger_sub_account_id"=>$bank_account,"table_name" =>"cash_bank","element_id" =>$i, 
			"society_id"=>$s_society_id));
			$this->ledger->saveAll($multipleRowData); 

			if($tds_amount > 0){
			
			$l=$this->autoincrement('ledger','auto_id');
			$this->loadmodel('ledger');
			$multipleRowData = Array( Array("auto_id"=>$l,"transaction_date"=>strtotime($transaction_date),"debit"=>null,"credit"=>$tds_amount,"ledger_account_id" =>16, 
			"ledger_sub_account_id"=>null,"table_name"=>"cash_bank","element_id"=>$i, 
			"society_id"=>$s_society_id));
			$this->ledger->saveAll($multipleRowData); 			
		}						   
		$n++;	
	}	
/// voucher code
    $first = reset($receipt_array);
    $last = end($receipt_array);
   if($first!=$last){
	 $show_voucher=$first.' to '.$last; 
  }else{
	  $show_voucher=$first;
  }
////  

	$show_vouch=array(1,$show_voucher);
	$this->Session->write('bank_payment', $show_vouch);
	$this->redirect(array('controller' => 'Cashbanks','action' => 'bank_payment_view'));
}

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 15,"society_id"=>$s_society_id);
$cursor11=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor11',$cursor11);


$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 1);
$cursor12=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor12',$cursor12);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 4);
$cursor13=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor13',$cursor13);

}
//End Bank Payment//
//Start Bank Payment View (Accounts)//
function bank_payment_view()
{
if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	
$this->ath();
$this->check_user_privilages();	
	
$s_role_id=$this->Session->read('role_id');
$s_society_id = $this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');

$this->set('s_role_id',$s_role_id);
}
//End Bank Payment View (Accounts)//
//Start Bank Payment Show Ajax (Accounts)//
function bank_payment_show_ajax(){
$this->layout='ajax_blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = $this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');
$this->ath();
$this->set('s_role_id',$s_role_id);
$this->set('s_user_id',$s_user_id);

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor = $this->society->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection)
{
$society_name = $collection['society']['society_name'];
}
$this->set('society_name',$society_name);

$from = $this->request->query('date1');
$to = $this->request->query('date2');
$this->set('from',$from);
$this->set('to',$to);

$this->loadmodel('bank_payment');
$conditions=array("society_id" => $s_society_id);
$cursor1=$this->bank_payment->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('cash_bank');
$conditions=array("society_id"=>$s_society_id,"source"=>"bank_payment");
$order=array('cash_bank.transaction_date'=> 'ASC');
$cursor2=$this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
$this->set('cursor2',$cursor2);

}
//End Bank Payment Show Ajax (Accounts)//
//Start Bank Payment Excel//
function bank_payment_excel()
{
$this->layout="";
$this->ath();
	$s_society_id = (int)$this->Session->read('hm_society_id');
	  $s_role_id=$this->Session->read('role_id');
		$from = $this->request->query('f');
		  $to = $this->request->query('t');
			$fdddd = date('d-M-Y',strtotime($from));
			  $tdddd = date('d-M-Y',strtotime($to));

	$this->loadmodel('society');
	$conditions=array("society_id" => $s_society_id);
	$cursor=$this->society->find('all',array('conditions'=>$conditions));
		foreach($cursor as $collection){
			$society_name = $collection['society']['society_name'];
	}
	$sss_namm = str_replace(' ','-',$society_name);

$filename="".$sss_namm."_Bank_Payment_Register_".$fdddd."_".$tdddd."";
header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );

	$from = $this->request->query('f');
		$to = $this->request->query('t');
			$this->set('from',$from);
				$this->set('to',$to);
	
	

	$this->loadmodel('society');
	$conditions=array("society_id" => $s_society_id);
	$cursor=$this->society->find('all',array('conditions'=>$conditions));
		foreach($cursor as $collection){
			$society_name = $collection['society']['society_name'];
	}
		$this->set('society_name',$society_name);
	
		
$this->loadmodel('cash_bank');
$conditions=array("society_id" => $s_society_id,"source"=>"bank_payment");
$order=array('cash_bank.transaction_date'=> 'ASC');
$cursor2=$this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
$this->set('cursor2',$cursor2);
}
//End Bank Payment Excel//
//Start Petty cash Receipt (Accounts)//
function petty_cash_receipt()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	
$this->ath();
$this->check_user_privilages();	
	
	$s_role_id=$this->Session->read('role_id');
	  $s_society_id = $this->Session->read('hm_society_id');
		$s_user_id=$this->Session->read('hm_user_id');
		  $this->set('s_role_id',$s_role_id);

$this->loadmodel('ledger_account');
$conditions=array('$or'=>array(array("group_id"=>8,'society_id'=>$s_society_id),array("group_id"=>8,"society_id"=>0)));
$cursor2=$this->ledger_account->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

	$this->loadmodel('ledger_sub_account');
	$condition=array('society_id'=>$s_society_id,'ledger_id'=>34);
	$members=$this->ledger_sub_account->find('all',array('conditions'=>$condition));
	foreach($members as $data3){
	$ledger_sub_account_ids[]=$data3["ledger_sub_account"]["auto_id"];
	}
		$this->loadmodel('wing');
        $condition=array('society_id'=>$s_society_id);
        $order=array('wing.wing_name'=>'ASC');
        $wings=$this->wing->find('all',array('conditions'=>$condition,'order'=>$order));
        foreach($wings as $data){
			$wing_id=$data["wing"]["wing_id"];
			$this->loadmodel('flat');
			$condition=array('society_id'=>$s_society_id,'wing_id'=>$wing_id);
			$order=array('flat.flat_name'=>'ASC');
			$flats=$this->flat->find('all',array('conditions'=>$condition,'order'=>$order));
			foreach($flats as $data2){
				$flat_id=$data2["flat"]["flat_id"];
				$ledger_sub_account_id = $this->requestAction(array('controller' => 'Fns', 'action' => 'ledger_sub_account_id_via_wing_id_and_flat_id'),array('pass'=>array($wing_id,$flat_id)));
				if(!empty($ledger_sub_account_id)){
					if (in_array($ledger_sub_account_id, $ledger_sub_account_ids)){
						$members_for_billing[]=$ledger_sub_account_id;
					}
				}
			}
		}
		$this->set(compact("members_for_billing"));

if(isset($this->request->data['submit'])){
	$transaction_dates=$this->request->data['transaction_date'];
	$account_groups=$this->request->data['account_group'];
	$ledger_sub_accounts=$this->request->data['ledger_sub_account'];
	$other_incomes=$this->request->data['other_income'];
	$account_heads=$this->request->data['account_head'];
	$amounts=$this->request->data['amount'];
	$narrations=$this->request->data['narration'];
    $n=0;
	$receipt_array=array();
	foreach($transaction_dates as $transaction_date){
	$transaction_date=date('Y-m-d',strtotime($transaction_date));
	$account_group=(int)$account_groups[$n];
		if($account_group==1){
			$ledger_sub_account_id=(int)$ledger_sub_accounts[$n];
			$party_ac=(int)$ledger_sub_account_id;
		}else{
			$other_income_id=(int)$other_incomes[$n];
		    $party_ac=(int)$other_income_id;
		}
    $account_head_id=(int)$account_heads[$n];
	$amount=$amounts[$n];
	$narration=$narrations[$n];
    $current_date=date('Y-m-d');
	
$auto=$this->autoincrement('cash_bank','transaction_id');
$i=$this->autoincrement_with_receipt_source('cash_bank','receipt_number','petty_cash_receipt');
$receipt_array[]=$i;
$this->loadmodel('cash_bank');
$multipleRowData = Array( Array("transaction_id"=>$auto,"receipt_number" =>$i,"ledger_sub_account_id"=>$party_ac, 
"created_on"=>$current_date,"account_type"=>$account_group,"transaction_date"=>strtotime($transaction_date),"created_by"=>$s_user_id,"narration"=>$narration,"account_head"=>$account_head_id,"amount"=>$amount,"society_id"=>$s_society_id,"source"=>"petty_cash_receipt","auto_inc"=>"YES"));
$this->cash_bank->saveAll($multipleRowData);  

if($account_group == 1){
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData=Array(Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date),"debit"=>null,"credit"=>$amount,"ledger_account_id"=>34,"ledger_sub_account_id"=>$party_ac,"table_name"=>"cash_bank","element_id"=>$auto,"society_id"=>$s_society_id));
$this->ledger->saveAll($multipleRowData);
}else{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id"=>$l,"transaction_date"=>strtotime($transaction_date),"debit" =>null,"credit"=>$amount,"ledger_account_id"=>$party_ac,"ledger_sub_account_id" =>null,"table_name" =>"cash_bank","element_id" => $auto,"society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData);
}

$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id"=>$l,"transaction_date"=>strtotime($transaction_date),"debit" =>$amount,"credit" =>null,"ledger_account_id" =>$account_head_id,"ledger_sub_account_id"=>null,"table_name"=>"cash_bank","element_id"=>$auto,"society_id"=>$s_society_id));
$this->ledger->saveAll($multipleRowData);
$n++;
}
//$receipt_array_for_view=implode(',',$receipt_array);

 $first=reset($receipt_array);
 $last=end($receipt_array);

if($first!=$last){
	$show_voucher=$first.' to '.$last;	
}else{
	$show_voucher=$first;	
}

$show_vouch=array(1,$show_voucher);

$this->Session->write('petty_cash_receipt',$show_vouch);
$this->redirect(array('controller' => 'Cashbanks','action'=>'petty_cash_receipt_view'));
}		
}
//End Petty Cash Receipt (Accounts)//
//Start Petty Cash Receipt Show Ajax (Accounts)//
function petty_cash_receipt_show_ajax()
{
$this->layout='ajax_blank';
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = $this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');
$this->ath();
$this->set('s_society_id',$s_society_id);
$this->set('s_role_id',$s_role_id);
$this->set('s_user_id',$s_user_id);

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor = $this->society->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection)
{
$society_name = $collection['society']['society_name'];
}
$this->set('society_name',$society_name);


$from = $this->request->query('date1');
$to = $this->request->query('date2');
$this->set('from',$from);
$this->set('to',$to);

$this->loadmodel('cash_bank');
$order=array('cash_bank.transaction_date'=> 'ASC');
$conditions=array("society_id" => $s_society_id,"source"=>"petty_cash_receipt");
$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
$this->set('cursor1',$cursor1);
}
//End Petty Cash Receipt Show Ajax (Accounts)//
//Start Petty Cash Receipt View (Accounts)//
function petty_cash_receipt_view()
{
if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	
$this->ath();
$this->check_user_privilages();	
	
$s_role_id=$this->Session->read('role_id');
$s_society_id = $this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');
$this->set('s_role_id',$s_role_id);
}
//End Petty Cash Receipt View (Accounts)//
//Start Petty cash receipt excel//
function petty_cash_receipt_excel()
{
	$this->layout="";
	$this->ath();
	$s_society_id = (int)$this->Session->read('hm_society_id');
	$s_role_id = (int)$this->Session->read('role_id');
        
		$this->loadmodel('society');
		$conditions=array("society_id" => $s_society_id);
		$cursor = $this->society->find('all',array('conditions'=>$conditions));
		foreach ($cursor as $collection){
		$society_name = $collection['society']['society_name'];
		}	
		$from = $this->request->query('f');
		$to = $this->request->query('t');
		$fdddd = date('d-M-Y',strtotime($from));
		$tdddd = date('d-M-Y',strtotime($to));
		$socitty_nammm = str_replace(' ','-',$society_name);
	
	$filename="".$socitty_nammm."_Petty_Cash_Receipt_Register_".$fdddd."_".$tdddd."";
	header ("Expires: 0");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=".$filename.".xls");
	header ("Content-Description: Generated Report" );

		$this->loadmodel('society');
		$conditions=array("society_id"=>$s_society_id);
		$cursor = $this->society->find('all',array('conditions'=>$conditions));
			foreach ($cursor as $collection){
			$society_name = $collection['society']['society_name'];
			}
			$this->set('society_name',$society_name);
			$from = $this->request->query('f');
			$to = $this->request->query('t');
			$this->set('from',$from);
			$this->set('to',$to);
			$m_from = 	date('Y-m-d',strtotime($from));
			$m_to = date('Y-m-d',strtotime($to));
			$from_strto = strtotime($m_from);
			$to_strto = strtotime($m_to);

		$this->loadmodel('cash_bank');
		$order=array('cash_bank.transaction_date'=>'ASC');
		$conditions=array("society_id"=>$s_society_id,"source"=>"petty_cash_receipt");
		$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
		$this->set('cursor1',$cursor1);

}
//End Petty cash receipt excel//
//Start Petty Cash Receipt Ajax (Accounts)//
function petty_cash_receipt_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = $this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');
$this->set('s_role_id',$s_role_id);
$value=(int)$this->request->query('value');

//$ussidd=(int)@$this->request->query('ussidd');
$this->set('value',$value);
//$this->set('ussidd',$ussidd);

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 34, "society_id" => $s_society_id,"deactive"=>0);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('ledger_account');
$conditions=array("group_id" => 8);
$cursor2=$this->ledger_account->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

	$this->loadmodel('ledger_sub_account');
	$condition=array('society_id'=>$s_society_id,'ledger_id'=>34);
	$members=$this->ledger_sub_account->find('all',array('conditions'=>$condition));
	foreach($members as $data3){
	$ledger_sub_account_ids[]=$data3["ledger_sub_account"]["auto_id"];
	}
 $this->loadmodel('wing');
        $condition=array('society_id'=>$s_society_id);
        $order=array('wing.wing_name'=>'ASC');
        $wings=$this->wing->find('all',array('conditions'=>$condition,'order'=>$order));
        foreach($wings as $data){
			$wing_id=$data["wing"]["wing_id"];
			$this->loadmodel('flat');
			$condition=array('society_id'=>$s_society_id,'wing_id'=>$wing_id);
			$order=array('flat.flat_name'=>'ASC');
			$flats=$this->flat->find('all',array('conditions'=>$condition,'order'=>$order));
			foreach($flats as $data2){
				$flat_id=$data2["flat"]["flat_id"];
				$ledger_sub_account_id = $this->requestAction(array('controller' => 'Fns', 'action' => 'ledger_sub_account_id_via_wing_id_and_flat_id'),array('pass'=>array($wing_id,$flat_id)));
				if(!empty($ledger_sub_account_id)){
					if (in_array($ledger_sub_account_id, $ledger_sub_account_ids)){
						$members_for_billing[]=$ledger_sub_account_id;
					}
				}
			}
		}
		$this->set(compact("members_for_billing"));
}
//End Petty Cash Receipt Ajax (Accounts)//
//Start Petty cash Receipt Pdf (Accounts)//
function petty_cash_receipt_pdf()
{
$this->layout = 'pdf'; //this will use the pdf.ctp layout 
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');	

$tns_id = (int)$this->request->query('c');
$this->set('tns_id',$tns_id);


$this->loadmodel('new_cash_bank');
$conditions=array("transaction_id" => $tns_id,"receipt_source"=>3,"society_id"=>$s_society_id);
$cursor1=$this->new_cash_bank->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

}
//End Petty cash Receipt Pdf (Accounts)//
//Start Petty Cash Payment (Accounts)//
function petty_cash_payment()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();	
	$s_role_id=$this->Session->read('role_id');
	$s_society_id=$this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	$this->set('s_role_id',$s_role_id);

$this->loadmodel('financial_year');
	$conditions=array("society_id" => $s_society_id,"status"=>1);
	$financial_years=$this->financial_year->find('all',array('conditions'=>$conditions));
	$financial_year_array=array();
	foreach($financial_years as $financial_year){
		$from=date("d-m-Y",$financial_year["financial_year"]["from"]);
		$to=date("d-m-Y",$financial_year["financial_year"]["to"]);
		$pair=array($from,$to);
		$pair=implode('/',$pair);
		$financial_year_array[]=$pair;
	}
	$financial_year_string=implode(',',$financial_year_array);
	$this->set(compact("financial_year_string"));

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id"=>15,"society_id"=>$s_society_id);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id"=>4);
$cursor2=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

	if(isset($this->request->data['submit'])){
		$transaction_dates=$this->request->data['transaction_date'];
		$account_groups=$this->request->data['account_group'];
		$sundry_creditors=$this->request->data['sundry_creditor'];
		$expenditures=$this->request->data['expenditure'];
		$taxs=$this->request->data['tax'];
		$paid_froms=$this->request->data['paid_from'];
		$amounts=$this->request->data['amount'];
		$narrations=$this->request->data['narration']; 
			$n=0; $receipt_array=array();
			foreach($transaction_dates as $transaction_date){
			  $transaction_date=date('Y-m-d',strtotime($transaction_date));
			  $account_group_id=(int)$account_groups[$n];
				  if($account_group_id==1){
					 $sundry_creditor_id=(int)$sundry_creditors[$n];
					 $expense_party=(int)$sundry_creditor_id;
				  }else if($account_group_id==2){
					 $expenditure_id=(int)$expenditures[$n]; 
					 $expense_party=(int)$expenditure_id;
				  }else{
					 $tax_id=(int)$taxs[$n]; 
					 $expense_party=(int)$tax_id;  
				 }
			   $paid_from_id=(int)$paid_froms[$n];
			   $amount=$amounts[$n];
			   $narration=$narrations[$n];
			
			$current_date = date('Y-m-d');

		$auto=$this->autoincrement('cash_bank','transaction_id');
		$i=$this->autoincrement_with_receipt_source('cash_bank','receipt_number','petty_cash_payment');
		$this->loadmodel('cash_bank');
		$multipleRowData=Array(Array("transaction_id"=>$auto,"receipt_number"=>$i,"sundry_creditor_id"=>$expense_party,"created_on"=>$current_date,"account_type"=>$account_group_id,"transaction_date"=>strtotime($transaction_date),"created_by"=>$s_user_id,"narration"=>$narration,"account_head"=>$paid_from_id,"amount"=>$amount,"society_id"=>$s_society_id,"source"=>"petty_cash_payment","auto_inc"=>"YES"));
		$this->cash_bank->saveAll($multipleRowData);  
        $receipt_array[]=$i;
	if($account_group_id == 1){
	$l=$this->autoincrement('ledger','auto_id');
	$this->loadmodel('ledger');
	$multipleRowData = Array( Array("auto_id"=>$l,"transaction_date"=>strtotime($transaction_date), "debit"=>$amount,"credit" =>null,"ledger_account_id"=>15,"ledger_sub_account_id"=>$expense_party, "table_name"=>"cash_bank","element_id"=>$auto,"society_id" => $s_society_id));
	$this->ledger->saveAll($multipleRowData);
	}else{
	$l=$this->autoincrement('ledger','auto_id');
	$this->loadmodel('ledger');
	$multipleRowData = Array( Array("auto_id"=>$l,"transaction_date"=>strtotime($transaction_date), "debit"=>$amount,"credit"=>null,"ledger_account_id"=>$expense_party,"ledger_sub_account_id" =>null,"table_name"=>"cash_bank","element_id"=>$auto,"society_id"=>$s_society_id));
	$this->ledger->saveAll($multipleRowData);
	}

	$l=$this->autoincrement('ledger','auto_id');
	$this->loadmodel('ledger');
	$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => null,"credit" =>$amount,"ledger_account_id"=>$paid_from_id,"ledger_sub_account_id"=>null,"table_name"=>"cash_bank","element_id"=>$auto,"society_id"=>$s_society_id));
	$this->ledger->saveAll($multipleRowData);			
	$n++;		
	}
	//$receipt_array_for_view=implode(',',$receipt_array);
	$first=reset($receipt_array);
	$last=end($receipt_array);
	if($first!=$last){
		$show_vouchar=$first.' to '.$last;
	}else{
		$show_vouchar=$first;
	}
	$show_vouch=array(1,$show_vouchar);
	$this->Session->write('petty_cash_payment', $show_vouch);
	$this->redirect(array('controller' => 'Cashbanks','action'=>'petty_cash_payment_view'));
	}
}
//End Petty cash Payment (Accounts)//
//Start Petty cash Payment View (Accounts)//
function petty_cash_payment_view()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	
$this->ath();
$this->check_user_privilages();	
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = $this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');
$this->set('s_role_id',$s_role_id);
}
//End Petty cash Payment View (Accounts)// 
//Start Petty Cash Payment Show Ajax (Accounts)//
function petty_cash_payment_show_ajax()
{
$this->layout='ajax_blank';
$this->ath();
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = $this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor = $this->society->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection){
$society_name = $collection['society']['society_name'];
}
$this->set('society_name',$society_name);
$this->set('s_user_id',$s_user_id);
$this->set('s_role_id',$s_role_id);
$from = $this->request->query('date1');
$to = $this->request->query('date2');
$this->set('from',$from);
$this->set('to',$to);

$this->loadmodel('cash_bank');
$conditions=array("society_id" => $s_society_id,"source"=>"petty_cash_payment");
$order=array('cash_bank.transaction_date'=>'ASC');
$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
$this->set('cursor1',$cursor1);
}
//End Petty Cash Payment Show Ajax (Accounts)//
//Start Petty Cash Payment Pdf (Accounts)//
function petty_cash_payment_pdf()
{
$this->layout = 'pdf'; //this will use the pdf.ctp layout 
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');	

$module_id = (int)$this->request->query('m');
$tns_id = (int)$this->request->query('c');
$this->set('tns_id',$tns_id);
$this->set('module_id',$module_id);


$this->loadmodel('cash_bank');
$conditions=array("transaction_id" => $tns_id,"module_id"=>4);
$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);


$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

}
//End Petty Cash Payment Pdf (Accounts)//
//Start Petty Cash Payment Ajax (Accounts)//
function petty_cash_payment_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = $this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');

$this->set('s_role_id',$s_role_id);

$value1 = (int)$this->request->query('value1');
$ussidd = (int)@$this->request->query('usdd');
$this->set('value1',$value1);
$this->set('ussidd',$ussidd);

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 15,"society_id"=>$s_society_id);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 4);
$cursor2=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);
}
//End Petty Cash Payment Ajax (Accounts)//
//Start Petty Cash Payment Excel//
function petty_cash_payment_excel()
{
$this->layout="";
$this->ath();
$s_society_id = (int)$this->Session->read('hm_society_id');
$s_role_id=$this->Session->read('role_id');
$s_user_id = (int)$this->Session->read('hm_user_id');

$this->loadmodel('society');
$conditions=array("society_id"=>$s_society_id);
$cursor = $this->society->find('all',array('conditions'=>$conditions));
foreach ($cursor as $collection){
$society_name = $collection['society']['society_name'];
}
$this->set('society_name',$society_name);
$from = $this->request->query('f');
$to = $this->request->query('t');
$this->set('from',$from);
$this->set('to',$to);
$fdddd = date('d-M-Y',strtotime($from));
$tdddd = date('d-M-Y',strtotime($to));
$socitty_nammm = str_replace(' ','-',$society_name);
$filename="".$socitty_nammm."_Petty_Cash_Payment_Register_".$fdddd."_".$tdddd."";
header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );

$this->loadmodel('cash_bank');
$conditions=array("society_id" => $s_society_id,"source"=>"petty_cash_payment");
$order=array('cash_bank.transaction_date'=>'ASC');
$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions,'order'=>$order));
$this->set('cursor1',$cursor1);

}
//End Petty Cash Payment Excel//
//Start Bank receipt Reference Ajax (Accounts)//
function bank_receipt_reference_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = $this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');

$this->ath();

$flat_id = (int)$this->request->query('flat');
$type = (int)$this->request->query('rf');
$this->set('type',$type);
$this->set('flat_id',$flat_id);
}
//End Bank Receipt Reference Ajax (Accounts)//
//Start Bank Receipt Amount Ajax(Accounts)//
function bank_receipt_amount_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = $this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');
$i_head = $this->request->query('ss');
$this->set('i_head',$i_head);
}
//End Bank Receipt Amount Ajax(Accounts)//
//Start Bank Receipt Pdf (Accounts)//
function bank_receipt_pdf($auto_id=null)
{
$this->layout = 'pdf'; //this will use the pdf.ctp layout 
$this->ath();
	$s_role_id=$this->Session->read('role_id');
		$s_society_id = (int)$this->Session->read('society_id');
			$s_user_id=$this->Session->read('user_id');	
				$auto_id = (int)$auto_id;
					$s_role_id=$this->Session->read('role_id');
						$s_society_id = (int)$this->Session->read('society_id');
							$s_user_id = (int)$this->Session->read('user_id');	


$this->loadmodel('new_cash_bank');
$conditions=array("transaction_id" => $auto_id,"receipt_source"=>1,"society_id"=>$s_society_id);
$cursor1=$this->new_cash_bank->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);
}
//End Bank Receipt Pdf (Accounts)//
//Start b_receipt_view//
function b_receipt_view()
{
$this->layout = 'session'; //this will use the pdf.ctp layout 
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');	

$this->ath();

$module_id = (int)$this->request->query('m');
$trns_id = (int)$this->request->query('c');
$this->set('trns_id',$trns_id);
$this->set('module_id',$module_id);

$this->loadmodel('cash_bank');
$conditions=array("transaction_id" => $trns_id,"module_id"=>$module_id);
$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);



$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);
}
//End b_receipt_view//
//Start b_receipt_edit//
function b_receipt_edit($transaction_id=null){
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$s_role_id = (int)$this->Session->read('role_id');
	$s_society_id = (int)$this->Session->read('hm_society_id');
	$s_user_id = (int)$this->Session->read('hm_user_id');	
	$this->ath();
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id" => 33,"society_id"=>$s_society_id);
	$cursor3=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor3',$cursor3);
    
	$this->loadmodel('ledger_sub_account');
	$conditions=array("society_id"=>$s_society_id,"ledger_id"=>112);
	$non_members = $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set(compact("non_members"));
	
	$this->loadmodel('cash_bank');
	$conditions=array("transaction_id"=>(int)$transaction_id,"society_id"=>$s_society_id);
	$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
	$this->set('cursor1',$cursor1);
	foreach($cursor1 as $receipt_data){
		$receipt_id=$receipt_data["cash_bank"]["receipt_number"];
		$receipt_id=$receipt_id.'-R';
		
	}

	$this->loadmodel('ledger_sub_account');
	$conditions=array("society_id"=>$s_society_id,"ledger_id"=>112);
	$non_members = $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set(compact("non_members"));
	
	$this->loadmodel('ledger_sub_account');
        $condition=array('society_id'=>$s_society_id,'ledger_id'=>34);
        $members=$this->ledger_sub_account->find('all',array('conditions'=>$condition));
        foreach($members as $data3){
            $ledger_sub_account_ids[]=$data3["ledger_sub_account"]["auto_id"];
        }
       
       
        $this->loadmodel('wing');
        $condition=array('society_id'=>$s_society_id);
        $order=array('wing.wing_name'=>'ASC');
        $wings=$this->wing->find('all',array('conditions'=>$condition,'order'=>$order));
        foreach($wings as $data){
			$wing_id=$data["wing"]["wing_id"];
			$this->loadmodel('flat');
			$condition=array('society_id'=>$s_society_id,'wing_id'=>$wing_id);
			$order=array('flat.flat_name'=>'ASC');
			$flats=$this->flat->find('all',array('conditions'=>$condition,'order'=>$order));
			foreach($flats as $data2){
				$flat_id=$data2["flat"]["flat_id"];
				$ledger_sub_account_id = $this->requestAction(array('controller' => 'Fns', 'action' => 'ledger_sub_account_id_via_wing_id_and_flat_id'),array('pass'=>array($wing_id,$flat_id)));
				if(!empty($ledger_sub_account_id)){
					if (in_array($ledger_sub_account_id, $ledger_sub_account_ids)){
						$members_for_billing[]=$ledger_sub_account_id;
					}
				}
			}
		}
		$this->set(compact("members_for_billing"));
	
	if(isset($this->request->data['bank_receipt_update'])){
		$transaction_id=(int)$this->request->data['transaction_id'];
		$tranjection_date=$this->request->data['transaction_date']; 
		$tranjection_date=date('Y-m-d',strtotime($tranjection_date));
		$deposited_bank_id=(int)$this->request->data['deposited_bank_id'];
		$receipt_mode=$this->request->data['receipt_mode'];
		$edited_date=date('Y-m-d');
		$cheque_number = null;
		$cheque_date = null;
		$drawn_on_which_bank = null;
		$reference_utr = null;
		if($receipt_mode=="Cheque" || $receipt_mode=="cheque"){
			 $cheque_number=@$this->request->data['cheque_number'];
			 $cheque_date=@$this->request->data['cheque_date1'];
			 $drawn_on_which_bank=@$this->request->data['drawn_on_which_bank'];
			 $branch_of_bank=@$this->request->data['branch'];
		}
		if($receipt_mode=="NEFT" || $receipt_mode=="PG" || $receipt_mode=="neft" || $receipt_mode=="pg"){
			 $cheque_number = @$this->request->data['reference_number'];
			 $cheque_date = @$this->request->data['neft_date'];
		}
		 $member_type = @$this->request->data['member_type'];
		
		$party_name = null;
		$bill_reference = null;
		$receipt_type = null;
		$ledger_sub_account_id = null;
		if($member_type=='residential'){
			//$receipt_type = @$this->request->data['receipt_type'];
		$ledger_sub_account_id=(int)@$this->request->data['ledger_sub_account'];
		}
		if($member_type=='non_residential'){
			 $non_member_ledger_sub_account_id=(int)@$this->request->data['non_member_ledger_sub_account'];
			 $bill_reference=@$this->request->data['bill_reference'];
		}
		 $amount = @$this->request->data['amount'];
		 $narration = @$this->request->data['description'];
		 $current_date = date('Y-m-d');
				
	if($member_type=='residential'){
		
	$this->loadmodel('cash_bank');
	$conditions=array("society_id"=>$s_society_id,"transaction_id"=>$transaction_id);
	$result_cash_bank=$this->cash_bank->find('all',array('conditions'=>$conditions));
	foreach($result_cash_bank as $data){
	$ledger_sub_account_id_old=(int)$data['cash_bank']['ledger_sub_account_id'];	
	$ignore_receipt_number=$data['cash_bank']['receipt_number'];
	}
	$old_user_data=$this->requestAction(array('controller'=>'Fns','action'=>'member_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id_old)));
	$old_user_name=$old_user_data['user_name'];		
	$old_wing=$old_user_data['wing_name'];
	$old_flat=$old_user_data['flat_name'];
	$old_user_email_id=$old_user_data['email'];
	$old_user_mobile=$old_user_data['mobile'];
	$old_wing_flat=$old_wing.'-'.$old_flat;
	
	$edit_text=$ignore_receipt_number."-R";	
	$this->loadmodel('cash_bank');
	$this->cash_bank->updateAll(Array("transaction_date"=>strtotime($tranjection_date),"deposited_in"=>$deposited_bank_id,"receipt_mode"=>$receipt_mode,"cheque_number" =>@$cheque_number,"date"=>@$cheque_date,"drown_in_which_bank"=>@$drawn_on_which_bank,"branch_of_bank"=>@$branch_of_bank,"received_from"=>$member_type,"ledger_sub_account_id"=>$ledger_sub_account_id,"amount"=>$amount,"narration"=>@$narration,"edit_text"=>$edit_text,"edited_by"=>$s_user_id,"edited_on"=>$edited_date),Array("transaction_id"=>$transaction_id)); 
					
	$this->loadmodel('ledger');
	$this->ledger->updateAll(Array("transaction_date"=>strtotime($tranjection_date),"debit"=>$amount, "credit"=>null,"ledger_account_id"=>33,"ledger_sub_account_id"=>$deposited_bank_id),Array("element_id"=>$transaction_id,"credit"=>null,"table_name"=>"cash_bank")); 
				
	$this->loadmodel('ledger');
	$this->ledger->updateAll(Array("transaction_date"=>strtotime($tranjection_date),"credit"=>$amount,"ledger_account_id"=>34,"ledger_sub_account_id"=>$ledger_sub_account_id),Array("element_id"=>$transaction_id,"debit"=>null,"table_name"=>"cash_bank"));
	
	if($ledger_sub_account_id_old == $ledger_sub_account_id){
	   $ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));
	$email_message='<table width="80%" class="hmlogobox">
		<tr>
		<td width="50%" style="padding: 10px 0px 0px 10px;"><img src="'.$ip.$this->webroot.'/as/hm/hm-logo.png" style="max-height: 60px; " height="60px" /></td>
		<td width="50%" align="right" valign="middle"  style="padding: 7px 10px 0px 0px;">
		<a href="https://www.facebook.com/HousingMatters.co.in"><img src="'.$ip.$this->webroot.'/as/hm/SMLogoFB.png" style="max-height: 30px; height: 30px; width: 30px; max-width: 30px;" height="30px" width="30px" /></a>
		</td>
		</tr>
		</table><br/><br/>';

	   $email_message.='Please Ignore Receipt-'.$ignore_receipt_number.' as it was errorneouly sent to you.';

		$email_message.='<br/><br/> Thank You <br/>
	HousingMatters (Support Team)<br/>
			www.housingmatters.in';
		
		
		
		
		
		
		$this->loadmodel('society'); 
		$conditions=array("society_id"=>$s_society_id);
		$cursor1=$this->society->find('all',array('conditions'=>$conditions));
		foreach($cursor1 as $dataa){
		$society_name=$dataa['society']['society_name'];	
		$society_reg_no=$dataa['society']['society_reg_num']; 
		$society_address=$dataa['society']['society_address'];
		$sig_title=$dataa['society']['sig_title'];
		$email_is_on_off=(int)@$dataa["society"]["account_email"];
		$sms_is_on_off=(int)@$dataa['society']['account_sms'];
		}
	
	$this->loadmodel('cash_bank'); 
	$conditions=array("society_id"=>$s_society_id,"transaction_id"=>$transaction_id);
	$cursor=$this->cash_bank->find('all',array('conditions'=>$conditions));
	foreach($cursor as $data){
       $receipt_number=$data['cash_bank']['receipt_number']; 	   
	   $transaction_id=$data['cash_bank']['transaction_id'];
		$transaction_date=$data['cash_bank']['transaction_date'];
		$deposited_bank_id=$data['cash_bank']['deposited_in'];
		$receipt_mode=$data['cash_bank']['receipt_mode'];
		if($receipt_mode=="Cheque" || $receipt_mode=="cheque"){
			 $cheque_number=$data['cash_bank']['cheque_number'];
			 $cheque_date=$data['cash_bank']['date'];
			 $drown_in_which_bank=$data['cash_bank']['drown_in_which_bank'];
			 $branch_of_bank=$data['cash_bank']['branch_of_bank'];
		}
		if($receipt_mode=="NEFT" || $receipt_mode=="PG" || $receipt_mode=="neft" || $receipt_mode=="pg"){
			 $cheque_number = $data['cash_bank']['cheque_number'];
			 $cheque_date = $data['cash_bank']['date'];
		}
		 $member_type = $data['cash_bank']['received_from'];
		if($member_type=='residential'){
			$ledger_sub_account_id=$data['cash_bank']['ledger_sub_account_id'];
		}
		 $amount = $data['cash_bank']['amount'];
		 $narration = $data['cash_bank']['narration'];
		 $current_date = date('Y-m-d');	
}
$transaction_date=date('d-m-Y',$transaction_date);

$user_data=$this->requestAction(array('controller'=>'Fns','action'=>'member_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id)));
$user_name=$user_data['user_name'];		
$wing=$user_data['wing_name'];
$flat=$user_data['flat_name'];
$user_email_id=$user_data['email'];
$user_mobile=$user_data['mobile'];

$wing_flat=$wing.'-'.$flat;
$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));

$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));

 $html_receipt='<table style="padding:24px;background-color:#34495e" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
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
										<td style="padding:0px 0 2px 5px" colspan="2">Receipt No: '.$receipt_number.'-R</td>
										
										<td colspan="2" align="right" style="padding:0px 5px 0 0px"><b>Date:</b> '.$transaction_date.' </td>
										
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
										<td style="padding:0px 0 2px 5px"  colspan="4">'.$member_type.'</td>
										
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
		
				////Start Email Sms Code////
			if($email_is_on_off==1){
			    	if(!empty($user_email_id)){
					$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".$transaction_date." against Unit ".$wing_flat."";
				
					$this->send_email($user_email_id,'accounts@housingmatters.in','HousingMatters',$subject,$email_message,'donotreply@housingmatters.in');
				}
			}		
				
			if($email_is_on_off==1){
			    	if(!empty($user_email_id)){
					$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".$transaction_date." against Unit ".$wing_flat."";
				
					$this->send_email($user_email_id,'accounts@housingmatters.in','HousingMatters',$subject,$html_receipt,'donotreply@housingmatters.in');
				}
			}	
		
				if($sms_is_on_off==1){
						if(!empty($user_mobile)){
								$r_sms=$this->requestAction(array('controller'=>'Fns','action'=> 'hms_sms_ip')); 
								$working_key=$r_sms->working_key;
								$sms_sender=$r_sms->sms_sender; 
								$sms_allow=(int)$r_sms->sms_allow;
							if($sms_allow==1){
									$user_name_short=$this->check_charecter_name($user_name);
									$sms="Dear ".$user_name_short." ,we have received Rs ".$amount." on ".$transaction_date." towards Society Maint. dues. Cheques are subject to realization,".$society_name;
									$sms1=str_replace(' ', '+', $sms);

									$payload = file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$user_mobile.'&message='.$sms1.''); 
							}
						}	
					}

				   ////Start Email Sms Code////	
	}
	else
	{
	$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));	
	$email_message='<table width="80%" class="hmlogobox">
		<tr>
		<td width="50%" style="padding: 10px 0px 0px 10px;"><img src="'.$ip.$this->webroot.'/as/hm/hm-logo.png" style="max-height: 60px; " height="60px" /></td>
		<td width="50%" align="right" valign="middle"  style="padding: 7px 10px 0px 0px;">
		<a href="https://www.facebook.com/HousingMatters.co.in"><img src="'.$ip.$this->webroot.'/as/hm/SMLogoFB.png" style="max-height: 30px; height: 30px; width: 30px; max-width: 30px;" height="30px" width="30px" /></a>
		</td>
		</tr>
		</table><br/><br/>';	
		
	$email_message.='Please Ignore Receipt-'.$ignore_receipt_number.' as it was errorneouly sent to you.';			
	
	$email_message.='<br/><br/> Thank You <br/>
	HousingMatters (Support Team)<br/>
			www.housingmatters.in';
	
	
	
	
		$this->loadmodel('society'); 
		$conditions=array("society_id"=>$s_society_id);
		$cursor1=$this->society->find('all',array('conditions'=>$conditions));
		foreach($cursor1 as $dataa){
		$society_name=$dataa['society']['society_name'];	
		$society_reg_no=$dataa['society']['society_reg_num']; 
		$society_address=$dataa['society']['society_address'];
		$sig_title=$dataa['society']['sig_title'];
		$email_is_on_off=(int)@$dataa["society"]["account_email"];
		$sms_is_on_off=(int)@$dataa['society']['account_sms'];
		}
	
	$this->loadmodel('cash_bank'); 
	$conditions=array("society_id"=>$s_society_id,"transaction_id"=>$transaction_id);
	$cursor=$this->cash_bank->find('all',array('conditions'=>$conditions));
	foreach($cursor as $data){
       $receipt_number=$data['cash_bank']['receipt_number']; 	   
	   $transaction_id=$data['cash_bank']['transaction_id'];
		$transaction_date=$data['cash_bank']['transaction_date'];
		$deposited_bank_id=$data['cash_bank']['deposited_in'];
		$receipt_mode=$data['cash_bank']['receipt_mode'];
		if($receipt_mode=="Cheque" || $receipt_mode=="cheque"){
			 $cheque_number=$data['cash_bank']['cheque_number'];
			 $cheque_date=$data['cash_bank']['date'];
			 $drown_in_which_bank=$data['cash_bank']['drown_in_which_bank'];
			 $branch_of_bank=$data['cash_bank']['branch_of_bank'];
		}
		if($receipt_mode=="NEFT" || $receipt_mode=="PG" || $receipt_mode=="neft" || $receipt_mode=="pg"){
			 $cheque_number = $data['cash_bank']['cheque_number'];
			 $cheque_date = $data['cash_bank']['date'];
		}
		 $member_type = $data['cash_bank']['received_from'];
		if($member_type=='residential'){
			$ledger_sub_account_id=$data['cash_bank']['ledger_sub_account_id'];
		}
		 $amount = $data['cash_bank']['amount'];
		 $narration = $data['cash_bank']['narration'];
		 $current_date = date('Y-m-d');	
}
$transaction_date=date('d-m-Y',$transaction_date);

$user_data=$this->requestAction(array('controller'=>'Fns','action'=>'member_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id)));
$user_name=$user_data['user_name'];		
$wing=$user_data['wing_name'];
$flat=$user_data['flat_name'];
$user_email_id=$user_data['email'];
$user_mobile=$user_data['mobile'];

$wing_flat=$wing.'-'.$flat;
$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));

$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));

 $html_receipt='<table style="padding:24px;background-color:#34495e" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
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
										<td style="padding:0px 0 2px 5px" colspan="2">Receipt No: '.$receipt_number.'-R</td>
										
										<td colspan="2" align="right" style="padding:0px 5px 0 0px"><b>Date:</b> '.$transaction_date.' </td>
										
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
										<td style="padding:0px 0 2px 5px"  colspan="4">'.$member_type.'</td>
										
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

                   ////Start Email Sms Code////
				   
				  if($email_is_on_off==1){
			    	if(!empty($old_user_email_id)){
					$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".$transaction_date." against Unit ".$old_wing_flat."";
				
					$this->send_email($old_user_email_id,'accounts@housingmatters.in','HousingMatters',$subject,$email_message,'donotreply@housingmatters.in');
				}
			}		 
				   
				   
				   
				   
			if($email_is_on_off==1){
			    	if(!empty($user_email_id)){
					$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".$transaction_date." against Unit ".$wing_flat."";
				
					$this->send_email($user_email_id,'accounts@housingmatters.in','HousingMatters',$subject,$html_receipt,'donotreply@housingmatters.in');
				}
			}	
		
				if($sms_is_on_off==1){
						if(!empty($user_mobile)){
								$r_sms=$this->requestAction(array('controller'=>'Fns','action'=> 'hms_sms_ip')); 
								$working_key=$r_sms->working_key;
								$sms_sender=$r_sms->sms_sender; 
								$sms_allow=(int)$r_sms->sms_allow;
							if($sms_allow==1){
									$user_name_short=$this->check_charecter_name($user_name);
									$sms="Dear ".$user_name_short." ,we have received Rs ".$amount." on ".$transaction_date." towards Society Maint. dues. Cheques are subject to realization,".$society_name;
									$sms1=str_replace(' ', '+', $sms);

									$payload = file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$user_mobile.'&message='.$sms1.''); 
							}
						}	
					}

				   ////Start Email Sms Code////
		
				}
			}
			else{
		
	$this->loadmodel('cash_bank');
	$conditions=array("society_id"=>$s_society_id,"transaction_id"=>$transaction_id);
	$result_cash_bank=$this->cash_bank->find('all',array('conditions'=>$conditions));
	foreach($result_cash_bank as $data){
	$ignore_receipt_number=$data['cash_bank']['receipt_number'];
	}
    $ignore_receipt_number=$ignore_receipt_number.'-R';
		
	$this->loadmodel('cash_bank');
	$this->cash_bank->updateAll(Array("transaction_date"=>strtotime($tranjection_date),"deposited_in"=>$deposited_bank_id,"receipt_mode" => $receipt_mode,"cheque_number"=>$cheque_number,"date"=>@$cheque_date,"drown_in_which_bank"=>@$drawn_on_which_bank,"branch_of_bank"=>@$branch_of_bank,"received_from"=>$member_type,"ledger_sub_account_id"=>$non_member_ledger_sub_account_id,"amount"=>$amount,"narration"=>@$narration,"bill_reference"=>$bill_reference,"edit_text"=>$ignore_receipt_number,"edited_by"=>$s_user_id,"edited_on"=>$edited_date),Array("transaction_id"=>$transaction_id)); 
					
	$this->loadmodel('ledger');
	$this->ledger->updateAll(Array("transaction_date"=>strtotime($tranjection_date),"debit"=>$amount, "ledger_account_id"=>33,"ledger_sub_account_id"=>$deposited_bank_id),Array("element_id"=>$transaction_id,"credit"=>null,"table_name"=>"cash_bank")); 

	$this->loadmodel('ledger');
	$this->ledger->updateAll(Array("transaction_date"=>strtotime($tranjection_date),"credit"=>$amount,"ledger_account_id"=>112,"ledger_sub_account_id"=>$non_member_ledger_sub_account_id),Array("element_id"=>$transaction_id,"debit"=>null,"table_name"=>"cash_bank"));	
				
}
	
$this->Session->write('bank_receipt_updated',1);
$this->redirect(array('controller'=>'Cashbanks','action'=>'bank_receipt_view'));

	}
}
//End b_receipt_edit//
//Start Cash Bank Vali (Accounts)//
function cash_bank_vali()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');	

$cc = (int)$this->request->query('ss');
$this->set('cc',$cc);
}
//End Cash Bank Vali (Accounts)//
//Start Bank Receipt ajax (Accounts)//
function bank_receipt_ajax()
{
$this->layout = 'blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');	

$ff = $this->request->query('ff');
$this->set('ff',$ff);

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 33);
$cursor3=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor3',$cursor3);

$this->loadmodel('ledger_sub_account');
$conditions=array("society_id" => $s_society_id, "ledger_id" => 34,"deactive"=>0);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

}
//End bank receipt Ajax (Accounts)//
//Start tds Bank Payment Ajax (Accounts)//
function bank_payment_tds_ajax()
{
$this->layout=null;
$s_role_id=$this->Session->read('role_id');
$s_society_id = $this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');

$tds = (int)$this->request->query('tds');
$amount = (float)$this->request->query('amount');


$this->loadmodel('reference');
$conditions=array("auto_id" => 3);
$cursor1=$this->reference->find('all',array('conditions'=>$conditions));
foreach ($cursor1 as $collection) 
{
$tds_arr = $collection['reference']['reference'];
}
for($t=0; $t<sizeof($tds_arr); $t++)
{
$tds_arr2 = $tds_arr[$t];
$tds_id = (int)$tds_arr2[1];
if($tds_id == $tds)
{
$charge = $tds_arr2[0];
break;
}
}
echo $charge;
//$tds_charge = (float)((@$charge/100)*$amount);
//$total_amount = round($amount - $tds_charge); 
//$this->set('total_amount',$total_amount);
}
//End tds bank Payment Ajax (Accounts)//
//Start bank_payment_type_json_ajax//
function bank_payment_type_json_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = $this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');

$type= (int)$this->request->query('type');
//$ussidd= (int)@$this->request->query('ussidd');
$this->set('type',$type);
//$this->set('ussidd',$ussidd);

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 15);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);


$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 1);
$cursor2=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 4);
$cursor3=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor3',$cursor3);
}
//End bank_payment_type_json_ajax//
//Start Bank Payment Type Ajax//
function bank_payment_type_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id=(int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');

	$type= (int)$this->request->query('type');
		$ussidd= (int)@$this->request->query('ussidd');
			$this->set('type',$type);
				$this->set('ussidd',$ussidd);

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 15);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);


$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 1);
$cursor2=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 4);
$cursor3=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor3',$cursor3);
}
//End Bank Payment Type Ajax//
//Start bank payment Pdf (Accounts)//
function bank_payment_pdf($trans_id=null)
{
	$this->layout = 'pdf'; //this will use the pdf.ctp layout 
	$s_role_id = (int)$this->Session->read('role_id');
	$s_society_id = (int)$this->Session->read('hm_society_id');
	$s_user_id = (int)$this->Session->read('hm_user_id');	
	$this->ath();
	$trans_id = (int)$trans_id;

$this->loadmodel('cash_bank');
$conditions=array("transaction_id"=>$trans_id,"source"=>'bank_payment',"society_id"=>$s_society_id);
$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('society');
$conditions=array("society_id"=>$s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

	$this->loadmodel('reference');
	$conditions=array("auto_id"=>3);
	$cursor = $this->reference->find('all',array('conditions'=>$conditions));
		foreach($cursor as $collection){
		$tds_arr = $collection['reference']['reference'];
	}
	$this->set("tds_arr",$tds_arr);	
}
//End bank payment Pdf (Accounts)//
//Start Fix Deposit Add (Accounts)//
function fix_deposit_add()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	$this->check_user_privilages();		
		$s_role_id=$this->Session->read('role_id');
			$s_society_id = $this->Session->read('society_id');
				$s_user_id=$this->Session->read('user_id');
$this->set('s_role_id',$s_role_id);

if(isset($this->request->data['sub']))
{
	$bank_name = $this->request->data['bank_name'];
	  $branch = $this->request->data['branch'];
		$account_reference = $this->request->data['account_reference'];
		  $principal_amount = $this->request->data['principal_amount'];
		    $start_date = $this->request->data['start_date'];
			  $maturity_date = $this->request->data['maturity_date'];
				$interest_rate = $this->request->data['interest_rate'];
				  $remark = $this->request->data['remark'];
					$reminder = $this->request->data['reminder'];
					  $name = $this->request->data['name'];
						$email = $this->request->data['email'];
						  $mobile = $this->request->data['mobile'];

	$current_date = date('d-m-Y');
		$current_date = date("Y-m-d", strtotime($current_date));
			$current_date = new MongoDate(strtotime($current_date));

	$start_date = date("Y-m-d", strtotime($start_date));
		$start_date = new MongoDate(strtotime($start_date));

	$maturity_date = date("Y-m-d", strtotime($maturity_date));
		$maturity_date = new MongoDate(strtotime($maturity_date));

$this->loadmodel('fix_deposit');
$conditions=array("society_id" => $s_society_id);
$order=array('fix_deposit.auto_id'=> 'DESC');
$cursor=$this->fix_deposit->find('all',array('conditions'=>$conditions,'order' =>$order,'limit'=>1));
foreach ($cursor as $collection) 
{
$last11 = $collection['fix_deposit']['auto_id'];
}
if(empty($last11))
{
$i=0;
}	
else
{	
$i=$last11;
}
$i++; 
$this->loadmodel('fix_deposit');
$multipleRowData = Array( Array("auto_id" => $i, "bank_name" => $bank_name,  "branch" => $branch, "account_reference" => $account_reference, "prepaired_by" => $s_user_id, 
"principal_amount" => $principal_amount, "start_date" => $start_date,"maturity_date" => $maturity_date, "interest_rate" => $interest_rate,"remark" => $remark, "reminder" => $reminder,"name" => $name, "society_id" => $s_society_id, "email" => $email,"mobile" => $mobile, "current_date"=>$current_date));
$this->fix_deposit->saveAll($multipleRowData);

}

$this->loadmodel('reference');
$conditions=array("auto_id"=>6);
$rfff=$this->reference->find('all',array('conditions'=>$conditions));
foreach($rfff as $dddtttt)
{
$kendo_array = @$dddtttt['reference']['reference'];			
}
if(!empty($kendo_array))
{
@$kendo_implode = implode(",",$kendo_array);
}
$this->set('kendo_implode',@$kendo_implode);



$this->loadmodel('reference');
$conditions=array("auto_id"=>7);
$rfff2=$this->reference->find('all',array('conditions'=>$conditions));
foreach($rfff2 as $dddtttt2)
{
$kendo_array2 = @$dddtttt2['reference']['reference'];			
}
if(!empty($kendo_array2))
{
@$kendo_implode2 = implode(",",$kendo_array2);
}
$this->set('kendo_implode2',@$kendo_implode2);

}
//End Fix Deposit Add (Accounts)//
//Start Fix Deposit View (Accounts)//
function fix_deposit_view()
{
if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	
	$this->ath();
		$this->check_user_privilages();		
			$s_role_id=$this->Session->read('hm_role_id');
				$s_society_id = $this->Session->read('hm_society_id');
		$s_user_id=(int)$this->Session->read('hm_user_id');


$rrrr = (int)$this->request->query('aa');
if(!empty($rrrr))
{
$move_on_date = date('Y-m-d');	
$this->loadmodel('fix_deposit');
$this->fix_deposit->updateAll(array('matured_status'=>2,"move_by"=>$s_user_id,"move_on"=>$move_on_date),array('transaction_id'=>$rrrr,"society_id"=>$s_society_id));

	$this->Session->write('fix_deposit_reading',1);
}

$readinggg = (int)$this->request->query('rr');
if(!empty($readinggg))
{
$this->loadmodel('fix_deposit');
$this->fix_deposit->updateAll(array('matured_status'=>2),array('transaction_id'=>$readinggg,"society_id"=>$s_society_id));
}

$this->set('s_role_id',$s_role_id);
$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1);
$order=array('fix_deposit.start_date'=>'ASC');
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions,'order'=>$order));
$this->set('cursor1',$cursor1);


$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
foreach($cursor2 as $dataa)
{
$society_name = $dataa['society']['society_name'];
}
$this->set('society_name',$society_name);

}
//End Fix Deposit View (Accounts)//
//Start Fix Deposit Show Ajax//
function fixed_diposit_show_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id=(int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');

$this->ath();

	$from = $this->request->query('date1');
		$to = $this->request->query('date2');
			$this->set('from',$from);
				$this->set('to',$to);
					$from = date('Y-m-d',strtotime($from));
						$to = date('Y-m-d',strtotime($to));
							$from = strtotime($from);
								$to = strtotime($to);

$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1,'fix_deposit.start_date'=>array('$gte'=>$from,'$lte'=>$to));
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
foreach($cursor2 as $dataa)
{
$society_name = $dataa['society']['society_name'];
}
$this->set('society_name',$society_name);
}
//End Fix Deposit Show Ajax//
//Start Bank Payment Json//
function bank_payment_json()
{
$this->layout="";
$this->ath();
	$s_society_id=$this->Session->read('hm_society_id');
		$s_user_id=$this->Session->read('hm_user_id');
			$date=date('d-m-Y');
				$time = date(' h:i a', time());
					$q=$this->request->query('q');
						$q = html_entity_decode($q);
							$myArray = json_decode($q, true);

$c = 0;
foreach($myArray as $child)
{
	$c++;
	if(empty($child[0])){
	$output = json_encode(array('type'=>'error', 'text' => 'Transaction Date is Required in row '.$c));
	die($output);
}	


 $TransactionDate = $child[0];
		$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				$from1 = date('Y-m-d',$from->sec);
				$to1 = date('Y-m-d',$to->sec);
				$from2 = strtotime($from1);
				$to2 = strtotime($to1);
				$transaction1 = date('Y-m-d',strtotime($TransactionDate));
				$transaction2 = strtotime($transaction1);
					if($transaction2 <= $to2 && $transaction2 >= $from2){
					$abc = 5;
					break;
					}	
		}
	if($abc == 555){
		$output=json_encode(array('type'=>'error','text'=>'Transaction date Should be in Open Financial Year in row '.$c));
		die($output);
	}

if(empty($child[1])){
$output = json_encode(array('type'=>'error', 'text' => 'Ledger Account is Required in row '.$c));
die($output);
}	

if(empty($child[2])){
$output = json_encode(array('type'=>'error', 'text' => 'Amount is Required in row '.$c));
die($output);
}	

if(is_numeric($child[2]))
{
}
else
{
$output = json_encode(array('type'=>'error', 'text' => 'Amount Should be Numeric Value in row '.$c));
die($output);
}


if(empty($child[5])){
$output = json_encode(array('type'=>'error', 'text' => 'Mode of Payment is Required in row '.$c));
die($output);
}	

if(empty($child[6])){
$output = json_encode(array('type'=>'error', 'text' => 'Instrument/Utr is Required in row '.$c));
die($output);
}	

if(empty($child[7])){
$output = json_encode(array('type'=>'error', 'text' => 'Bank Account is Required in row '.$c));
die($output);
}	
	
}
$rr_arr = array();
$current_date = date('Y-m-d');
foreach($myArray as $child)
{
$transaction_date = $child[0];
$ledgr_acc = $child[1];
$amount = $child[2];
$tds_id = $child[3];
$net_amt = $child[4];
$mode = $child[5];
$instrument = $child[6];
$bank_ac = (int)$child[7];
$invoice = @$child[8];
$narration = $child[9];

$accctyypp = explode(',',$ledgr_acc);
$ledger_acc = (int)$accctyypp[0];
$acc_type = (int)$accctyypp[1];

$i=$this->autoincrement('cash_bank','transaction_id');
$bbb=$this->autoincrement_with_receipt_source('cash_bank','receipt_id','bank_payment');
$rr_arr[] = $bbb;
$this->loadmodel('new_cash_bank');
$multipleRowData = Array( Array("transaction_id" => $i,"receipt_id"=>$bbb,"created_on"=> $current_date,"transaction_date"=>strtotime($transaction_date), "prepaired_by" => $s_user_id, 
"user_id" => $ledger_acc,"invoice_reference" => @$invoice,"narration" => $narration, "receipt_mode" => $mode,"receipt_instruction" => $instrument,"account_head" => $bank_ac,  
"amount" => $amount,"society_id" => $s_society_id,"tds_id"=>$tds_id,"account_type"=>$acc_type,"source"=>"bank_payment","auto_inc"=>"YES"));
$this->cash_bank->saveAll($multipleRowData);  

$this->loadmodel('reference');
$conditions=array("auto_id" => 3);
$cursor4=$this->reference->find('all',array('conditions'=>$conditions));
foreach($cursor4 as $collection)
{
$tds_arr = $collection['reference']['reference'];	
}
if(!empty($tds_id))
{
for($r=0; $r<sizeof($tds_arr); $r++)
{
$tds_sub_arr = $tds_arr[$r];
$tds_id2 = (int)$tds_sub_arr[1];
if($tds_id2 == $tds_id)
{
$tds_rate = $tds_sub_arr[0];
break;
}
}
$tds_amount = (round(($tds_rate/100)*$amount));
$total_tds_amount = ($amount - $tds_amount);
}
else
{
$total_tds_amount = $amount;
$tds_amount = 0;
}

if($acc_type == 1)
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => $amount, "credit" =>null,"ledger_account_id" => 15, "ledger_sub_account_id" =>$ledger_acc, "table_name" =>"cash_bank","element_id" => $i, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 
}
else
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => $amount,"credit" =>null,"ledger_account_id" =>$ledger_acc, "ledger_sub_account_id" =>null, "table_name" =>"cash_bank","element_id" =>$i, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 
}

$sub_account_id_a = (int)$bank_ac;
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), 
"debit" =>null,"credit" =>$total_tds_amount,"ledger_account_id" =>33, 
"ledger_sub_account_id" =>$sub_account_id_a, "table_name" =>"cash_bank","element_id" =>$i, 
"society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 


if($tds_amount > 0)
{
$sub_account_id_t = 16;
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date),
"debit" =>null,"credit" =>$tds_amount,"ledger_account_id" =>$sub_account_id_t, 
"ledger_sub_account_id" =>null, "table_name" =>"cash_bank","element_id" =>$i, 
"society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 
}
}
$this->Session->write('bank_ppp',1);
$rr_arr2 = implode(",",$rr_arr);
$output = json_encode(array('type'=>'success', 'text' => 'Bank Payment Voucher '.$rr_arr2.' Generated Successfully'));
die($output);
}
//End Bank Payment Json//
//Start Petty Cash Receipt Json//
function petty_cash_receipt_json()
{
$this->layout="";
$this->ath();
$s_society_id=$this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');
$date=date('d-m-Y');
$time = date(' h:i a', time());


$q=$this->request->query('q');
$q = html_entity_decode($q);
$myArray = json_decode($q, true);

$c = 0;
foreach($myArray as $child)
{
$c++;
if(empty($child[0])){
$output = json_encode(array('type'=>'error', 'text' => 'Transaction Date is Required in row '.$c));
die($output);
}	

    $TransactionDate = $child[0];
		$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				$from1 = date('Y-m-d',$from->sec);
				$to1 = date('Y-m-d',$to->sec);
				$from2 = strtotime($from1);
				$to2 = strtotime($to1);
				$transaction1 = date('Y-m-d',strtotime($TransactionDate));
				$transaction2 = strtotime($transaction1);
					if($transaction2 <= $to2 && $transaction2 >= $from2){
					$abc = 5;
					break;
					}	
		}
	if($abc == 555){
		$output=json_encode(array('type'=>'error','text'=>'Transaction date Should be in Open Financial Year in row '.$c));
		die($output);
	}



if(empty($child[1])){
$output = json_encode(array('type'=>'error', 'text' => 'A/c Group is Required in row '.$c));
die($output);
}	

if(empty($child[2])){
$output = json_encode(array('type'=>'error', 'text' => 'Income/Party A/c is Required in row '.$c));
die($output);
}	

if(empty($child[3])){
$output = json_encode(array('type'=>'error', 'text' => 'Account Head is Required in row '.$c));
die($output);
}	

if(empty($child[4])){
$output = json_encode(array('type'=>'error', 'text' => 'Amount is Required in row '.$c));
die($output);
}	

if(is_numeric($child[4]))
{
}
else
{
$output = json_encode(array('type'=>'error', 'text' => 'Amount Should be Numeric Value in row '.$c));
die($output);
}
}

$rr_arr = array();
foreach($myArray as $child)
{
$transaction_date = $child[0];
$ac_group = (int)$child[1];
$party_ac = (int)$child[2];
$ac_head = (int)$child[3];
$amount = $child[4];
$narration = $child[5];
$current_date = date('Y-m-d');

$auto=$this->autoincrement('cash_bank','transaction_id');
$i=$this->autoincrement_with_receipt_source('cash_bank','receipt_id','petty_cash_receipt');
$rr_arr[] = $i;
$this->loadmodel('cash_bank');
$multipleRowData = Array( Array("transaction_id" => $auto, "receipt_id" => $i,  "user_id" => $party_ac, 
"current_date" => $current_date, "account_type" => $ac_group,"transaction_date" => strtotime($transaction_date), "prepaired_by" => $s_user_id,"narration" => $narration, "account_head" => $ac_head,  "amount"=>$amount,"society_id" => $s_society_id,"source"=>"petty_cash_receipt","auto_inc"=>"YES"));
$this->cash_bank->saveAll($multipleRowData);  

if($ac_group == 1)
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData=Array(Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date),"debit"=>null,"credit"=>$amount,"ledger_account_id" => 34,"ledger_sub_account_id"=>$party_ac,"table_name"=>"cash_bank","element_id"=>$auto,"society_id"=>$s_society_id));
$this->ledger->saveAll($multipleRowData);
}
else
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => null, "credit" =>$amount,"ledger_account_id" =>$party_ac, "ledger_sub_account_id" =>null,"table_name" =>"cash_bank","element_id" => $auto, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData);
}


$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date),"debit" =>$amount, "credit" =>null,"ledger_account_id" =>$ac_head,"ledger_sub_account_id"=>null,"table_name" =>"cash_bank","element_id"=>$auto, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData);
}

$this->Session->write('petty_cc_rr',1);


$rr_arr2 = implode(",",$rr_arr);
$output = json_encode(array('type'=>'success', 'text' => 'Petty Cash Receipt '.$rr_arr2.' generated successfully '));
die($output);
}
//End Petty Cash Receipt Json//
//Start Fix Deposit Jason//
function fix_deposit_json()
{
$this->layout='blank';
	$s_society_id = (int)$this->Session->read('hm_society_id');
		$s_user_id = (int)$this->Session->read('hm_user_id');
			$post_data=$this->request->data;
				$this->ath();
					$q=$post_data['myJsonString'];
						$myArray = json_decode($q, true);
		$c=0;
foreach($myArray as $child){
$c++;

		if(empty($child[0])){
		$output = json_encode(array('type'=>'error', 'text' => 'Bank Name is Required in row '.$c));
		die($output);
		}	

if(empty($child[1])){
		$output = json_encode(array('type'=>'error', 'text' => 'Branch is Required in row '.$c));
		die($output);
		}	
  if(empty($child[2])){
		$output = json_encode(array('type'=>'error', 'text' => 'Account Reference is Reqired in row '.$c));
		die($output);
		}	
if(empty($child[3])){
		$output = json_encode(array('type'=>'error', 'text' => 'Principal Amount is Required in row '.$c));
		die($output);
		}

if(is_numeric($child[3]))
{
}
else
{
$output = json_encode(array('type'=>'error', 'text' => 'Principal Amount Should be Numeric Value in row '.$c));
die($output);
}


		
if(empty($child[4])){
		$output = json_encode(array('type'=>'error', 'text' => 'Start Date is Required in row '.$c));
		die($output);
		}

$TransactionDate = $child[4];
		$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				//$from1 = date('Y-m-d',$from->sec);
				//$to1 = date('Y-m-d',$to->sec);
				$from2=$from;
				$to2=$to;  
				$transaction1 = date('Y-m-d',strtotime($TransactionDate));
				$transaction2 = strtotime($transaction1);
					if($transaction2 <= $to2 && $transaction2 >= $from2){
					$abc = 5;
					break;
					}	
		}
	if($abc == 555){
		$output=json_encode(array('type'=>'error','text'=>'Start Date Should be in Open Financial Year in row '.$c));
		die($output);
	}

		
if(empty($child[5])){
		$output = json_encode(array('type'=>'error', 'text' => 'Maturity Date is Required in row '.$c));
		die($output);
		}

$stattt_date = $child[4];
$mat_dateee = $child[5];
$stt_dat = date('Y-m-d',strtotime($stattt_date));
$matt_date = date('Y-m-d',strtotime($mat_dateee));
$start_com_date = strtotime($stt_dat);
$mat_com_date = strtotime($matt_date);

if($mat_com_date < $start_com_date)
{
$output = json_encode(array('type'=>'error', 'text' => 'Maturity Date Should be Greater than Start Date in row '.$c));
		die($output);	
	
}

		
if(empty($child[6])){
		$output = json_encode(array('type'=>'error', 'text' => 'Interest Rate is Required in row '.$c));
		die($output);
		}			
if(is_numeric($child[6]))
{
}
else
{
$output = json_encode(array('type'=>'error', 'text' => 'Interest Rate Should be Numeric Value in row '.$c));
die($output);
}


if(empty($child[7])){
		$output = json_encode(array('type'=>'error', 'text' => 'Purpose is Required in row '.$c));
		die($output);
		}





		
}
$rr = array();
$z=0;
foreach($myArray as $child)
{
$z++;
$bank_name = $child[0];
$branch = $child[1];
$ac_reference = $child[2];
$principal_amt = $child[3];
$start_date = $child[4];
$maturity_date = $child[5];
$rate = $child[6];
$purpose = @$child[7];

 $knddd = "&quot;".$bank_name."&quot;";
			$this->loadmodel('reference');
			$conditions=array("auto_id"=>6);
			$rfff=$this->reference->find('all',array('conditions'=>$conditions));
			foreach($rfff as $dddttt)
			{
			$knnddd = @$dddttt['reference']['reference'];			
			}
				$nnnn = 555;
				for($n=0; $n<sizeof($knnddd); $n++)
				{
				$kendo_name = $knnddd[$n];
				if($kendo_name == $knddd)
				{
				$nnnn = 5;
				break;
				}
				else
				{
				$nnnn = 555;
				}
				}
					
						if($nnnn == 555){
						$knnddd[] = $knddd;
						$this->loadmodel('reference');
						$this->reference->updateAll(array("reference" => $knnddd),array("auto_id" =>6));
						}	










$knddd = "&quot;".$branch."&quot;";
			$this->loadmodel('reference');
			$conditions=array("auto_id"=>7);
			$rfff=$this->reference->find('all',array('conditions'=>$conditions));
			foreach($rfff as $dddttt)
			{
			$knnddd = @$dddttt['reference']['reference'];			
			}
				$nnn = 555;
				for($n=0; $n<sizeof($knnddd); $n++)
				{
				$kendo_name = $knnddd[$n];
				if($kendo_name == $knddd)
				{
				$nnn = 5;
				break;
				}
				else
				{
				$nnn = 555;
				}
				}
					
						if($nnn == 555){
						$knnddd[] = $knddd;
						$this->loadmodel('reference');
						$this->reference->updateAll(array("reference" => $knnddd),array("auto_id" =>7));
						}













$start_date = date('Y-m-d',strtotime($start_date));
$maturity_date = date('Y-m-d',strtotime($maturity_date));
$current_date = date('Y-m-d');

		$file_name=@$_FILES["file".$z]["name"];
		if(!empty($file_name)){
		$file_name=$_FILES["file".$z]["name"];
		$file_tmp_name =$_FILES['file'.$z]['tmp_name'];
		$target = "fix_deposit/";
		$target=@$target.basename($file_name);
		move_uploaded_file($file_tmp_name,@$target);
		}



$l=$this->autoincrement('fix_deposit','transaction_id');
$re_id = $this->autoincrement_with_fixed_deposit('fix_deposit','receipt_id');
$rr[] = $re_id; 
$this->loadmodel('fix_deposit');
$multipleRowData = Array( Array("transaction_id" => $l,"receipt_id"=>$re_id,"bank_name"=>$bank_name,
"bank_branch"=>$branch,"account_reference"=>$ac_reference,"principal_amount"=>$principal_amt,
"start_date"=>strtotime($start_date),"maturity_date"=>strtotime($maturity_date),"interest_rate"=>$rate,
"purpose"=>$purpose,"file_name"=>$file_name,"society_id" => $s_society_id,"matured_status"=>1,
"auto_inc"=>"YES","current_date"=>$current_date,"prepaired_by"=>$s_user_id));
$this->fix_deposit->saveAll($multipleRowData);
}

$first=reset($rr);
$last=end($rr);

if($first!=$last){
	$show_vouchar=$first.' to '.$last;
}else{
	$show_vouchar=$first;
}
$show_vouch=array(1,$show_vouchar);

$this->Session->write('fix_ddd',$show_vouch);

$rrr = implode(',',$rr);

$output = json_encode(array('type'=>'success', 'text' => 'fixed deposit #'.$rrr.' generated successfully'));
die($output);
}
// End Fix Deposit Jason //
// Start Matured Deposit View //
function matured_deposit_view()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}

$this->ath();
$this->check_user_privilages();

$s_society_id=(int)$this->Session->read('hm_society_id');


$rrrr = (int)$this->request->query('aa');
if(!empty($rrrr))
{
$move_on_date = date('Y-m-d');	
$this->loadmodel('fix_deposit');
$this->fix_deposit->updateAll(array('matured_status'=>1),array('transaction_id'=>$rrrr,"society_id"=>$s_society_id));

$this->Session->write('fix_deposit_reverse',1);

}

$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>2);
$order=array('fix_deposit.start_date'=>'ASC');
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions,'order' => $order));
$this->set('cursor1',$cursor1);


$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
foreach($cursor2 as $dataa)
{
$society_name = $dataa['society']['society_name'];
}
$this->set('society_name',$society_name);

}
//End Matured Deposit View//
//Start Fix Deposit view (Active) Excel//
function fix_deposit_excel()
{
$this->layout="";
$this->ath();

	$s_society_id = (int)$this->Session->read('hm_society_id');
		$s_role_id= (int)$this->Session->read('role_id');
			$s_user_id= (int)$this->Session->read('hm_user_id');

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor=$this->society->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection)
{
$society_name = $collection['society']['society_name'];
}

$socc_namm = str_replace(' ', '_', $society_name);

$filename="".$socc_namm."_Fixed_Deposits";

//$filename="Fix Deposit Excel";
header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );

$currr_datee = date('d-M-Y');

$excel="<table border='1'>
<tr>
<th colspan='9' style='text-align:center;'>$society_name: Fixed Deposit Register on $currr_datee</th>
</tr>
<tr>
<th>Deposit ID</th>
<th>Bank name</th>
<th>Bank Branch</th>
<th>Account Reference</th>
<th>Start Date</th>
<th>Maturity Date</th>
<th>Interest Rate</th>
<th>Principal Amount</th>
<th>Purpose</th>
</tr>";

$tt_amt = 0;
$this->loadmodel('fix_deposit');
$order=array('fix_deposit.start_date'=>'ASC');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1);
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions,'order'=>$order));
foreach($cursor1 as $data)
{
$receipt_id = $data['fix_deposit']['receipt_id'];
$start_date = $data['fix_deposit']['start_date'];	
$bank_name = $data['fix_deposit']['bank_name'];	
$branch = $data['fix_deposit']['bank_branch'];	
$rate = $data['fix_deposit']['interest_rate'];	
$mat_date = $data['fix_deposit']['maturity_date'];	
$remarks = $data['fix_deposit']['purpose'];		
$reference = $data['fix_deposit']['account_reference'];		
$amt = $data['fix_deposit']['principal_amount'];
$file_name = $data['fix_deposit']['file_name'];
$tt_amt = $tt_amt + $amt;
$start_date	= date('d-m-Y',($start_date));	
$mat_date	= date('d-m-Y',($mat_date));

$excel.="<tr>
<td>$receipt_id</td>
<td>$bank_name</td>
<td>$branch</td>
<td>$reference</td>
<td>$start_date</td>
<td>$mat_date</td>
<td>$rate</td>
<td>$amt</td>
<td>$remarks</td>
</tr>";
}
$excel.="<tr><td colspan='7' style='text-align:right;'><b>Total</b></td>
            <td><b>$tt_amt</b></td>
            <td></td></tr>
</table>";	

echo $excel;
}
//End Fix Deposit view (Active) Excel//
//Start Edit PCP//
function edit_pcp($rr_id)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	
	$s_role_id=$this->Session->read('role_id');
		$s_society_id = (int)$this->Session->read('society_id');
			$s_user_id = (int)$this->Session->read('user_id');	

$this->loadmodel('cash_bank');
$conditions=array("society_id" => $s_society_id,"module_id"=>4,"receipt_id"=>$rr_id);
$cursor1 = $this->cash_bank->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);
}
//End Edit PCP//
//Start bank_receipt_import//
function bank_receipt_import()
{
$this->layout="";
$filename="Bank_Receipt_Import";
header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . "GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".csv");
header ("Content-Description: Generated Report" );

$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id = (int)$this->Session->read('user_id');

$excel = "Transaction Date,Receipt Mode,Cheque No.,branch,Reference/UTR,Drawn Bank name,Deposited In,Date,Member Name,Wing,Unit #,Amount,Narration \n";

$excel.="12-5-2015,Cheque,55434,Hiran Magri,445566H,SBBJ,SBBJ,25-5-2015,Abhilash,Wing A,101,5000,Receipt for bill";

echo $excel;
}
//End bank_receipt_import//
//Start bank_receipt_import_ajax//
function bank_receipt_import_ajax()
{
$this->layout="blank";
$this->ath();

$s_society_id= (int)$this->Session->read('society_id');


if(isset($_FILES['file'])){
$file_name=$_FILES['file']['name'];
$file_tmp_name =$_FILES['file']['tmp_name'];
$target = "csv_file/bank/";
$target=@$target.basename($file_name);
move_uploaded_file($file_tmp_name,@$target);

$f = fopen('csv_file/bank/'.$file_name, 'r') or die("ERROR OPENING DATA");
$batchcount=0;
$records=0;
while (($line = fgetcsv($f, 4096, ';')) !== false) {
// skip first record and empty ones
$numcols = count($line);
$test[]=$line;
++$records;
}
fclose($f);
$records;
}
$i=0;
foreach($test as $child)
{
if($i>0)
{
$child_ex=explode(',',$child[0]);
/////////////////////////////////////////////////////
$TransactionDate = $child_ex[0];
$ReceiptMod = $child_ex[1];
$ChequeNo = $child_ex[2];
$branch = $child_ex[3];
$Reference = $child_ex[4];
$DrawnBankname = $child_ex[5];
$Deposited = $child_ex[6];
$Date1 = $child_ex[7];
$MemberName = $child_ex[8];
$Wing = $child_ex[9];
$Flat = $child_ex[10];
$Amount = $child_ex[11];
$narration = $child_ex[12];
	  
////////////////////////////////////////////////////////////

$this->loadmodel('wing'); 
$conditions=array("wing_name"=> new MongoRegex('/^' . $Wing . '$/i'),"society_id"=>$s_society_id);
$result_ac=$this->wing->find('all',array('conditions'=>$conditions));
foreach($result_ac as $collection)
{
$wing_id = (int)$collection['wing']['wing_id'];
}

$this->loadmodel('flat'); 
$conditions=array("flat_name"=> new MongoRegex('/^' . trim($Flat) . '$/i'), "society_id"=>$s_society_id);
$result_ac=$this->flat->find('all',array('conditions'=>$conditions));
foreach($result_ac as $collection)
{
$flat_id = (int)$collection['flat']['flat_id'];
}

 
$this->loadmodel('ledger_sub_account'); 
$conditions=array("name"=> new MongoRegex('/^' . $MemberName . '$/i'),"society_id"=>$s_society_id,"ledger_id"=>34,"flat_id"=>$flat_id);
$result_ac=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
foreach($result_ac as $collection)
{
$user_id = (int)$collection['ledger_sub_account']['user_id'];
$auto_id = (int)$collection['ledger_sub_account']['auto_id'];


		$result_flat_info=$this->requestAction(array('controller' => 'Hms', 'action' => 'fetch_wing_id_via_flat_id'),array('pass'=>array($flat_id)));
		foreach($result_flat_info as $flat_info){
		$wing_id= (int)$flat_info["flat"]["wing_id"];
		}
}		
			
@$wing_flat = $this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat_with_brackets'),array('pass'=>array($wing_id,$flat_id)));


$this->loadmodel('ledger_sub_account'); 
$conditions=array("name"=> new MongoRegex('/^' . $Deposited . '$/i'),"society_id"=>$s_society_id);
$result_ac=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
foreach($result_ac as $collection)
{
$bank_id = (int)$collection['ledger_sub_account']['auto_id'];
}


$table[] = array(@$TransactionDate,@$ReceiptMod,@$ChequeNo,@$Reference,@$DrawnBankname,@$bank_id,@$Date1,@$auto_id,@$Amount,@$narration,@$flat_id,@$wing_id,@$branch);
} 
$i++;
}
$this->set('aaa',$table);

$this->loadmodel('ledger_sub_account');
$conditions=array("society_id" => $s_society_id,"ledger_id"=>33);
$cursor1 = $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('ledger_sub_account');
$conditions=array("society_id" => $s_society_id,"ledger_id"=>34);
$cursor2 = $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);
}
//End bank_receipt_import_ajax//
//Start Save bank Imp//
function save_bank_imp()
{
$this->layout='blank';
	$s_society_id = (int)$this->Session->read('society_id');
		$s_user_id = (int)$this->Session->read('user_id');
			$this->ath();
				$q=$this->request->query('q'); 
					$myArray = json_decode($q, true);

$r=1;
foreach($myArray as $child){
	$r++;
	$TransactionDate = $child[0];
	$ReceiptMod = $child[1];
	$bank_id = $child[6];
	$auto_id = $child[7];
	$Amount = $child[8];
  
		if(empty($TransactionDate)){
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Transaction Date in row'.$r));
		die($output);
		}

	if(empty($ReceiptMod)){
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Receipt Mode in row'.$r));
		die($output);
	}
	$c = (int)strcasecmp("Cheque",$ReceiptMod);
	$n = (int)strcasecmp("NEFT",$ReceiptMod);
	$p = (int)strcasecmp("PG",$ReceiptMod);
	if($c == 0){
		$ChequeNo = $child[2];
		$DrawnBankname = $child[4];
		$Date1 = $child[5];	
        $branch = $child[11];
	
	
			if(empty($ChequeNo)){
			$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Cheque Number in row'.$r));
			die($output);
			}
				if(is_numeric($ChequeNo))
				{
				}
				else
				{
				$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Numeric Cheque Number in row'.$r));
				die($output);
				}
			
			
		
		if(empty($Date1)){
			$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Date in row'.'30'));
			die($output);
			}
		
			if(empty($branch)){
			$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Branch in row'.$r));
			die($output);
			}	
	}
	else if($n == 0){
		
		
		$Date1 = $child[5];
		if(empty($Date1)){
			$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Date in row'.$r));
			die($output);
		}
	}
	else if($p == 0){
		$Date1 = $child[5];	
		
		if(empty($Date1)){
			$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Date in row'.$r));
			die($output);
		}
	}
	else{
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill "Cheque", "NEFT" or PG in Receipt Mode in row'.$r));
		die($output);
	}

		
	
	
	  $abc = 555;
	$this->loadmodel('financial_year');
	$conditions=array("society_id" => $s_society_id,"status"=>1);
	$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
	foreach($cursor as $collection){
		$from = $collection['financial_year']['from'];
		$to = $collection['financial_year']['to'];
		$from1 = date('Y-m-d',$from->sec);
		$to1 = date('Y-m-d',$to->sec);
		$from2 = strtotime($from1);
		$to2 = strtotime($to1);
		$transaction1 = date('Y-m-d',strtotime($TransactionDate));
		$transaction2 = strtotime($transaction1);
				if($transaction2 <= $to2 && $transaction2 >= $from2){
				$abc = 5;
				break;
				}
	}
	if($abc == 555){
		$output=json_encode(array('report_type'=>'validation','text'=>'Transaction date is not in open Financial Year in row'.$r));
		die($output);
	}

	if(empty($Amount)){
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Amount in row'.$r));
		die($output);
	
	}
	
	if(is_numeric($Amount)){
	}
	else{
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Numeric Amount in row'.$r));
		die($output);
	}
	}

	$r=0;

foreach($myArray as $child){
		
			$r++;
			$Reference="";
			$type = (int)$child[9];
			$current_date = date('Y-m-d');
			$TransactionDate = $child[0];
			$TransactionDate = date('Y-m-d',strtotime($TransactionDate));
			$ReceiptMod = $child[1];
			$bank_id = (int)$child[6];
			$auto_id77 = (int)$child[7];
			$amount = $child[8];
			$narration = $child[10];
		    $branch = $child[11];
		
		
	$ledger_sub_account = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($auto_id77)));
	foreach($ledger_sub_account as $data){
	$flat_id = (int)$data['ledger_sub_account']['flat_id'];
	}

	
	
			$current_date = date('Y-m-d');
			$c = (int)strcasecmp("Cheque",$ReceiptMod);
			$n = (int)strcasecmp("NEFT",$ReceiptMod);
			$p = (int)strcasecmp("PG",$ReceiptMod);
		
		if($c == 0){
		$ChequeNo = $child[2];
		$DrawnBankname = $child[4];
		$cheque_date = $child[5];
		}
		else if($n == 0){
			$Reference = $child[3];
			$cheque_date = $child[5];
		}
		else if($p == 0){
			$Reference = $child[3];
			$cheque_date = $child[5];	
		}


		$flat_dttt = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_wing_id_via_flat_id'),array('pass'=>array(@$flat_id)));
		foreach($flat_dttt as $flat_datttt){
		$wing_iddd = (int)$flat_datttt['flat']['wing_id'];
		}

		$result_rb1 = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_user_info_via_flat_id'),array('pass'=>array($wing_iddd,@$flat_id)));
		foreach($result_rb1 as $data2){
		$user_id = (int)$data2['user']['user_id'];
		}
		
		$result_rb = $this->requestAction(array('controller' => 'hms', 'action' => 'new_regular_bill_detail_via_flat_id'),array('pass'=>array(@$flat_id)));
		foreach ($result_rb as $collection){
			$bill_no = (int)$collection['new_regular_bill']['bill_no'];
		}



	if($type == 2){

	$sub_leddr_dattt=$this->requestAction(array('controller' => 'Hms', 'action' => 'fetch_subLedger_detail_via_flat_id'),array('pass'=>array(@$flat_id)));
	foreach($sub_leddr_dattt as $sub_leddr_dattttt){
	$account_id = (int)$sub_leddr_dattttt["ledger_sub_account"]["auto_id"];
	}

	
			
	$this->loadmodel('new_regular_bill');
	$condition=array('society_id'=>$s_society_id,"flat_id"=>$flat_id);
	$order=array('new_regular_bill.one_time_id'=>'DESC');
	$result_new_regular_bill=$this->new_regular_bill->find('first',array('conditions'=>$condition,'order'=>$order)); 
	$this->set('result_new_regular_bill',$result_new_regular_bill);
	foreach($result_new_regular_bill as $data){
	$auto_id=$data["auto_id"]; 
	$regular_bill_one_time_id = (int)$data["one_time_id"];
	$flat_id = (int)$data["flat_id"];
	$number_of_receipt=$this->count_receipt_against_bill($regular_bill_one_time_id,$flat_id);
	if($number_of_receipt==0){
		$arrear_intrest=$data["arrear_intrest"];
		$intrest_on_arrears=$data["intrest_on_arrears"];
		$total=$data["total"];
		$arrear_maintenance=$data["arrear_maintenance"];
	}else{
		$arrear_intrest=$data["new_arrear_intrest"];
		$intrest_on_arrears=$data["new_intrest_on_arrears"];
		$total=$data["new_total"];
		$arrear_maintenance=$data["new_arrear_maintenance"];
	}
	
	
	}
    	$amount_after_arrear_intrest=$amount-@$arrear_intrest;
		if($amount_after_arrear_intrest<0)
		{
		$new_arrear_intrest=abs($amount_after_arrear_intrest);
		$new_intrest_on_arrears=$intrest_on_arrears;
		$new_arrear_maintenance=$arrear_maintenance;
		$new_total=$total;
		}
		else
		{
		$new_arrear_intrest=0;
		$amount_after_intrest_on_arrears=$amount_after_arrear_intrest-@$intrest_on_arrears;
			if($amount_after_intrest_on_arrears<0)
			{
			$new_intrest_on_arrears=abs($amount_after_intrest_on_arrears);
			$new_arrear_maintenance=$arrear_maintenance;
			$new_total=$total;
			}
			else
			{
			$new_intrest_on_arrears=0;
			$amount_after_arrear_maintenance=$amount_after_intrest_on_arrears-@$arrear_maintenance;
				if($amount_after_arrear_maintenance<0){
				$new_arrear_maintenance=abs($amount_after_arrear_maintenance);
				$new_total=$total;
				}else{
				$new_arrear_maintenance=0;
				$amount_after_total=$amount_after_arrear_maintenance-@$total; 
				if($amount_after_total>0){
				$new_total=0;
				$new_arrear_maintenance=-$amount_after_total;
				}else{
							$new_total=abs($amount_after_total);
							
					}
				}
			}
		}
			
			$this->loadmodel('new_regular_bill');
			$this->new_regular_bill->updateAll(array('new_arrear_intrest'=>$new_arrear_intrest,"new_intrest_on_arrears"=>$new_intrest_on_arrears,"new_arrear_maintenance"=>$new_arrear_maintenance,"new_total"=>$new_total),array('auto_id'=>$auto_id));
		
			
			
			
			$t1=$this->autoincrement('new_cash_bank','transaction_id');	
			$k = (int)$this->autoincrement_with_receipt_source('new_cash_bank','receipt_id',1);
			$this->loadmodel('new_cash_bank');
			$multipleRowData = Array( Array("transaction_id"=> $t1, "receipt_id" => $k,"receipt_date" => strtotime($TransactionDate), "receipt_mode" => $ReceiptMod, "cheque_number" =>@$ChequeNo,"cheque_date" =>$cheque_date,"drawn_on_which_bank" =>@$DrawnBankname,"reference_utr" => @$Reference,"deposited_bank_id" => $bank_id,"member_type" => 1,"party_name_id"=>$flat_id,"receipt_type" => 1,"amount"=>$amount,"current_date" => $current_date,"society_id"=>$s_society_id,"flat_id"=>$flat_id,"bill_auto_id"=>$auto_id,"bill_one_time_id"=>@$regular_bill_one_time_id,"narration"=>$narration,"receipt_source"=>1,"prepaired_by" => $s_user_id,"edit_status"=>"NO","auto_inc"=>"YES","bank_branch"=>$branch));
			$this->new_cash_bank->saveAll($multipleRowData);

			
			
		$l=$this->autoincrement('ledger','auto_id');
		$this->loadmodel('ledger');
		$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> strtotime($TransactionDate), "debit" => $amount, "credit" =>null, "ledger_account_id" => 33, "ledger_sub_account_id" => $bank_id,"table_name" => "new_cash_bank","element_id" => $t1, "society_id" => $s_society_id,));
		$this->ledger->saveAll($multipleRowData); 


$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> strtotime($TransactionDate), "credit" => $amount,"debit" =>null,"ledger_account_id" => 34, "ledger_sub_account_id" => $account_id,"table_name" => "new_cash_bank","element_id" => $t1, "society_id" => $s_society_id,));
$this->ledger->saveAll($multipleRowData);
			
		$this->loadmodel('new_cash_bank');
		$conditions=array("receipt_id" => $k,"society_id"=>$s_society_id,"receipt_source"=>1);
		$cursor=$this->new_cash_bank->find('all',array('conditions'=>$conditions));
		foreach($cursor as $collection)
		{
			$receipt_no = (int)$collection['new_cash_bank']['receipt_id'];
			$d_date = @$collection['new_cash_bank']['receipt_date'];
			$today = date("d-M-Y");
			$flat_id = $collection['new_cash_bank']['party_name_id'];
			$amount = $collection['new_cash_bank']['amount'];
			$society_id = (int)$collection['new_cash_bank']['society_id'];
			$bill_reference = $collection['new_cash_bank']['reference_utr'];
			$narration = $collection['new_cash_bank']['narration'];
			$member = (int)$collection['new_cash_bank']['member_type'];
			$receiver_name = @$collection['new_cash_bank']['receiver_name'];
			$receipt_mode = $collection['new_cash_bank']['receipt_mode'];
			$cheque_number = @$collection['new_cash_bank']['cheque_number'];
			$which_bank = @$collection['new_cash_bank']['drawn_on_which_bank'];
			$reference_number = @$collection['new_cash_bank']['reference_number'];
			$cheque_date = @$collection['new_cash_bank']['cheque_date'];
			$sub_account = (int)$collection['new_cash_bank']['deposited_bank_id'];
			$sms_date=date("d-m-Y",($d_date));

	$amount = str_replace( ',', '', $amount );
	$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));

			$this->loadmodel('society');
			$conditions=array("society_id" => $s_society_id);
			$cursor2=$this->society->find('all',array('conditions'=>$conditions));
			foreach ($cursor2 as $collection) 
			{
			$society_name = $collection['society']['society_name'];
			$society_reg_no = $collection['society']['society_reg_num'];
			$society_address = $collection['society']['society_address'];
			$sig_title = $collection['society']['sig_title'];
			}
				if($member == 2)
				{
				$user_name = $receiver_name;
				$wing_flat = "";
				}
				else
				{
				$flatt_datta = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_wing_id_via_flat_id'),array('pass'=>array($flat_id)));
					foreach ($flatt_datta as $fltt_datttaa) 
					{
					$wnngg_idddd = (int)$fltt_datttaa['flat']['wing_id'];
					}

					$result_lsa = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_user_info_via_flat_id'),array('pass'=>array($wnngg_idddd,$flat_id)));
					foreach ($result_lsa as $collection) 
					{
					$wing_id = $collection['user']['wing'];  
					$flat_id = (int)$collection['user']['flat'];
					$tenant = (int)$collection['user']['tenant'];
					$user_name = $collection['user']['user_name'];
					$to_mobile = $collection['user']['mobile'];
					$to_email = $collection['user']['email'];
					}
			        $wing_flat = $this->requestAction(array('controller' => 'hms', 'action'=>'wing_flat'),array('pass'=>array($wing_id,$flat_id)));									
				    }  
			$result2 = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($sub_account))); 
			foreach($result2 as $collection)
			{
			$bank_name = $collection['ledger_sub_account']['name'];
			}
											

		$date=date("d-m-Y",($d_date));
$ip=$this->hms_email_ip();

				$html_receipt='<table style="padding:24px;background-color:#34495e" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
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
									<td style="padding:0px 0 2px 5px" colspan="2">Receipt No: '.$receipt_no.'</td>
									
									<td colspan="2" align="right" style="padding:0px 5px 0 0px"><b>Date:</b> '.$date.' </td>
									
								</tr>
								<tr>
									<td style="padding:0px 0 2px 5px" colspan="2"> Received with thanks from: <b>'.$user_name.' '.$wing_flat.'</b></td>
																		
								</tr>
								<tr>
									<td style="padding:0px 0 2px 5px"  colspan="4">Rupees '.$am_in_words.' Only </td>
									
								</tr>';
								
							if($receipt_mode=="Cheque"){
							$receipt_mode_type='Via '.$receipt_mode.'-'.$cheque_number.' drawn on '.$which_bank.' dated '.$cheque_date;
							}
							else{
							$receipt_mode_type='Via '.$receipt_mode.'-'.$reference_number.' dated '.$cheque_date;
							}

								
								$html_receipt.='<tr>
									<td style="padding:0px 0 2px 5px"  colspan="4">'.$receipt_mode_type.'</td>
									
								</tr>
								
								<tr>
									<td style="padding:0px 0 2px 5px" colspan="4">Payment of previous bill</td>
									
								</tr>
								
							</tbody></table>
							
							
							
							<table style="font-size:12px;" width="100%" cellspacing="0">
								<tbody><tr>
									<td width="50%" style="padding:5px" valign="top">
									<span style="font-size:16px;"> <b>Rs '.$amount.'</b></span><br>';
									if($receipt_mode=="Cheque"){
									$receipt_title_cheq='Subject to realization of Cheque(s)';
									}
																		
									$html_receipt.='<span>'.@$receipt_title_cheq.'</span></td>
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
                                        <td align="right" style="font-size: 10px;"><b>Phone :</b></td>
                                        <td width="84" style="color:#fff!important;text-decoration:none;font-size:10px;"><b>022-41235568</b></td>
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


////////////////my Email//////////////
}

/////////////////////////////////////////////////////////////////////////////
$this->loadmodel('society');
$condition=array('society_id'=>$s_society_id);
$result_society=$this->society->find('all',array('conditions'=>$condition)); 
$this->set('result_society',$result_society);
foreach($result_society as $data_society){
	$society_name=$data_society["society"]["society_name"];
	$email_is_on_off=(int)@$data_society["society"]["account_email"];
	$sms_is_on_off=(int)@$data_society["society"]["account_sms"];
   }

if($email_is_on_off==1){
	$r_sms=$this->hms_sms_ip();
	$working_key=$r_sms->working_key;
	$sms_sender=$r_sms->sms_sender; 
	$sms_allow=(int)$r_sms->sms_allow;

$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".date('d-M-Y',$d_date)." against Unit ".$wing_flat."";
  
	$this->send_email($to_email,'accounts@housingmatters.in','HousingMatters',$subject,$html_receipt,'donotreply@housingmatters.in');
}

if($sms_is_on_off==1){
if($sms_allow==1){
	
$user_name_short=$this->check_charecter_name($user_name);

$sms="Dear ".$user_name_short." ,we have received Rs ".$amount." on ".$sms_date." towards Society Maint. dues. Cheques are subject to realization,".$society_name;
$sms1=str_replace(' ', '+', $sms);

$payload = file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$to_mobile.'&message='.$sms1.''); 
}
}	
			
}
}

$this->Session->write('bank_rrr2',1);
	
$output=json_encode(array('report_type'=>'done','text'=>'Please Fill Date in row'));
die($output);
}
//End Save bank Imp//
//Start bank receipt html view//
function bank_receipt_html_view($auto_id=null)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
 
	$this->ath();
		$auto_id = (int)$auto_id;
			$s_role_id=$this->Session->read('role_id');
				$s_society_id = (int)$this->Session->read('hm_society_id');
					$s_user_id = (int)$this->Session->read('hm_user_id');	


$this->loadmodel('cash_bank');
$conditions=array("transaction_id" => $auto_id,"society_id"=>$s_society_id);
$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
$this->set('result_cash_bank',$cursor1);

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
$this->set('result_society',$cursor2);

}
//End bank receipt html view//
//Start Bank Receipt Deposit Slip//
function bank_receipt_deposit_slip()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$s_role_id=$this->Session->read('hm_role_id');
		$s_society_id = (int)$this->Session->read('hm_society_id');
			$s_user_id = (int)$this->Session->read('hm_user_id');
				$this->set('s_role_id',$s_role_id);
					$this->ath();
						$this->check_user_privilages();

if(isset($this->request->data['dep_slip']))
{
	 $arr = array();
		$this->loadmodel('cash_bank');
		$conditions=array('society_id'=>$s_society_id,"source"=>"bank_receipt");
		$cursor2=$this->cash_bank->find('all',array('conditions'=>$conditions));
		foreach($cursor2 as $data)
		{
		$trns_id = (int)$data['cash_bank']['transaction_id'];
		$receipt_mode = $data['cash_bank']['receipt_mode'];
		$value = @$this->request->data['dd'.$trns_id];
			if(!empty($value)){
			$arr[] = $value;
			
			$this->loadmodel('cash_bank');
			$this->cash_bank->updateAll(array("deposit_status"=>1),array('society_id'=>$s_society_id,"transaction_id"=>$trns_id));	
			
			}
		}
	$arrr =implode(",",$arr);
	$this->response->header('Location', 'show_deposit_slip?ar='.$arrr.'');
}

$this->loadmodel('cash_bank');
$conditions=array('society_id'=>$s_society_id,"source"=>"bank_receipt");
$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);
}
//End Bank Receipt Deposit Slip//
//Start print_deposit_slip//
function print_deposit_slip()
{
	$this->layout='blank';
}
//End print_deposit_slip//
//Start petty_cash_payment_html_view//
function petty_cash_payment_html_view($auto_id=null)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$s_role_id=$this->Session->read('role_id');
		$s_society_id = (int)$this->Session->read('hm_society_id');
			$s_user_id = (int)$this->Session->read('hm_user_id');
				$this->ath();
					$auto_id = (int)$auto_id;

	$this->loadmodel('cash_bank');
	$conditions=array("transaction_id"=>$auto_id,"source"=>"petty_cash_payment","society_id"=>$s_society_id);
	$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
	$this->set('cursor1',$cursor1);

	$this->loadmodel('society');
	$conditions=array("society_id" => $s_society_id);
	$cursor2=$this->society->find('all',array('conditions'=>$conditions));
	$this->set('cursor2',$cursor2);

}
//End petty_cash_payment_html_view//
//Start petty_cash_receipt_html_view//
function petty_cash_receipt_html_view($auto_id=null)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$s_role_id=$this->Session->read('role_id');
		$s_society_id = (int)$this->Session->read('hm_society_id');
			$s_user_id = (int)$this->Session->read('hm_user_id');
				$this->ath();
					$auto_id = (int)$auto_id;

	$this->loadmodel('cash_bank');
	$conditions=array("transaction_id"=>$auto_id,"source"=>"petty_cash_receipt","society_id"=>$s_society_id);
	$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
	$this->set('cursor1',$cursor1);

	$this->loadmodel('society');
	$conditions=array("society_id" => $s_society_id);
	$cursor2=$this->society->find('all',array('conditions'=>$conditions));
	$this->set('cursor2',$cursor2);
}
//End petty_cash_Receipt_html_view//
//Start petty_cash_receipt_Update//
function petty_cash_receipt_update($auto_id=null)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$s_role_id = (int)$this->Session->read('role_id');
		$s_society_id = (int)$this->Session->read('hm_society_id');
			$s_user_id = (int)$this->Session->read('hm_user_id');	
				$auto_id=(int)$auto_id;
					$this->ath();
						$this->check_user_privilages();
	
		
	$this->loadmodel('ledger_account');
	$conditions=array('$or'=>array(array("group_id"=>8,'society_id'=>$s_society_id),array("group_id"=>8,"society_id"=>0)));
	$cursor2=$this->ledger_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor2',$cursor2);

	$this->loadmodel('ledger_sub_account');
	$condition=array('society_id'=>$s_society_id,'ledger_id'=>34);
	$members=$this->ledger_sub_account->find('all',array('conditions'=>$condition));
	foreach($members as $data3){
	$ledger_sub_account_ids[]=$data3["ledger_sub_account"]["auto_id"];
	}
		$this->loadmodel('wing');
        $condition=array('society_id'=>$s_society_id);
        $order=array('wing.wing_name'=>'ASC');
        $wings=$this->wing->find('all',array('conditions'=>$condition,'order'=>$order));
        foreach($wings as $data){
			$wing_id=$data["wing"]["wing_id"];
			$this->loadmodel('flat');
			$condition=array('society_id'=>$s_society_id,'wing_id'=>$wing_id);
			$order=array('flat.flat_name'=>'ASC');
			$flats=$this->flat->find('all',array('conditions'=>$condition,'order'=>$order));
			foreach($flats as $data2){
				$flat_id=$data2["flat"]["flat_id"];
				$ledger_sub_account_id = $this->requestAction(array('controller' => 'Fns', 'action' => 'ledger_sub_account_id_via_wing_id_and_flat_id'),array('pass'=>array($wing_id,$flat_id)));
				if(!empty($ledger_sub_account_id)){
					if (in_array($ledger_sub_account_id, $ledger_sub_account_ids)){
						$members_for_billing[]=$ledger_sub_account_id;
					}
				}
			}
		}
		$this->set(compact("members_for_billing"));	
	
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id"=>33,"society_id"=>$s_society_id);
	$cursor3=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor3',$cursor3);

	$this->loadmodel('cash_bank');
	$conditions=array("transaction_id"=>$auto_id,"source"=>"petty_cash_receipt","society_id"=>$s_society_id);
	$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
	$this->set('cursor1',$cursor1);

if(isset($this->request->data['submit']))	
{
	 $receipt_id=$this->request->data['receipt_no'];
	 $element_id=(int)$this->request->data['element_id'];
	 $transaction_date=$this->request->data['transaction_date'];	
	 $account_group=(int)$this->request->data['account_group'];	
		if($account_group==1){
		 $ledger_sub_account_id=$this->request->data['ledger_sub_account'];	
		 $party_acc=(int)$ledger_sub_account_id;
		}else{
		 $other_income=$this->request->data['other_income'];
		 $party_acc=(int)$other_income;		 
		}
     $account_head_id=(int)$this->request->data['account_head'];	
	 $amount=$this->request->data['amount'];	
	 $narration=$this->request->data['narration'];	

	$this->loadmodel('cash_bank');
	$this->cash_bank->updateAll(array("ledger_sub_account_id"=>$party_acc,"account_type"=>$account_group,"transaction_date"=> strtotime($transaction_date),"narration"=>$narration,"account_head"=>$account_head_id,"amount"=>$amount),array('society_id'=>$s_society_id,"transaction_id"=>$element_id));
	
	
	$this->loadmodel('ledger');
   	if($account_group == 1){
	$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"credit"=>$amount,"ledger_account_id"=>34,"ledger_sub_account_id" =>$party_acc),array('society_id'=>$s_society_id,"element_id"=>$element_id,"table_name"=>"cash_bank","debit"=>null));
	}else{
	$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"credit"=>$amount,"ledger_account_id"=>$party_acc,"ledger_sub_account_id"=>null),array('society_id'=>$s_society_id,"element_id"=>$element_id,"table_name"=>"cash_bank","debit"=>null));
	}

	$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"debit"=>$amount, "ledger_account_id"=>$account_head_id,"ledger_sub_account_id"=>null),array('society_id'=>$s_society_id,"element_id"=>$element_id,"table_name"=>"cash_bank","credit"=>null));

$this->Session->write('petty_cash_receipt_update',1);
$this->redirect(array('controller' => 'Cashbanks','action'=>'petty_cash_receipt_view'));
}	

}
//End petty_cash_Receipt_Update//
//Start petty_cash_Payment_Update//
function petty_cash_payment_update($auto_id=null)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$s_role_id = (int)$this->Session->read('role_id');
		$s_society_id = (int)$this->Session->read('hm_society_id');
			$s_user_id = (int)$this->Session->read('hm_user_id');	
				$auto_id=(int)$auto_id;
		$this->ath();
		
	$this->loadmodel('financial_year');
	$conditions=array("society_id" => $s_society_id,"status"=>1);
	$financial_years=$this->financial_year->find('all',array('conditions'=>$conditions));
	$financial_year_array=array();
	foreach($financial_years as $financial_year){
		$from=date("d-m-Y",$financial_year["financial_year"]["from"]);
		$to=date("d-m-Y",$financial_year["financial_year"]["to"]);
		$pair=array($from,$to);
		$pair=implode('/',$pair);
		$financial_year_array[]=$pair;
	}
	$financial_year_string=implode(',',$financial_year_array);
	$this->set(compact("financial_year_string"));
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id"=>15,"society_id"=>$s_society_id);
	$cursor4=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor4',$cursor4);

	$this->loadmodel('accounts_group');
	$conditions=array("accounts_id"=>4);
	$cursor2=$this->accounts_group->find('all',array('conditions'=>$conditions));
	$this->set('cursor2',$cursor2);
		
		
	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id"=>33,"society_id"=>$s_society_id);
	$cursor3=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor3',$cursor3);

	$this->loadmodel('cash_bank');
	$conditions=array("transaction_id"=>$auto_id,"source"=>"petty_cash_payment","society_id"=>$s_society_id);
	$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
	$this->set('cursor1',$cursor1);

		if(isset($this->request->data['submit'])){
             $receipt_id=$this->request->data['receipt_no'];
			 $element_id=(int)$this->request->data['element_id'];
			 $transaction_date=$this->request->data['transaction_date']; 
             $transaction_date=date('Y-m-d',strtotime($transaction_date));			 
			 $account_group=(int)$this->request->data['account_group'];
				if($account_group==1){
					 $sundry_creditor_id=(int)$this->request->data['sundry_creditor'];
				     $expense_party=(int)$sundry_creditor_id;
				}else if($account_group==2){
					 $expenditure_id=(int)$this->request->data['expenditure'];
					 $expense_party=(int)$expenditure_id;
				}else{
					 $expenditure_id=(int)$this->request->data['tax'];
					 $expense_party=(int)$expenditure_id;
				}
			 $paid_from_id=(int)$this->request->data['paid_from'];
			 $amount=$this->request->data['amount'];
			 $narration=$this->request->data['narration'];		   

			 
			 
			 
		 
			 
$this->loadmodel('cash_bank');
$this->cash_bank->updateAll(array("sundry_creditor_id"=>$expense_party,"account_type" =>$account_group,"transaction_date"=>strtotime($transaction_date),"narration"=>$narration,"account_head" =>$paid_from_id,"amount"=>$amount),array('society_id'=>$s_society_id,"transaction_id"=>$element_id));		
	
	
	if($account_group == 1){
		$this->loadmodel('ledger');	
		$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"debit"=>$amount,"ledger_sub_account_id"=>$expense_party,"ledger_account_id"=>15),array('society_id'=>$s_society_id,"element_id"=>$element_id,"table_name"=>"cash_bank","credit"=>null));	
	}else{
		$this->loadmodel('ledger');	
		$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"debit"=>$amount,"ledger_account_id"=>$expense_party,"ledger_sub_account_id"=>null),array('society_id'=>$s_society_id,"element_id"=>$element_id,"table_name"=>"cash_bank","credit"=>null));	
	}
        $this->loadmodel('ledger');	
		$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"credit"=>$amount,"ledger_account_id"=>$paid_from_id,"ledger_sub_account_id"=>null),array('society_id'=>$s_society_id,"element_id"=>$element_id,"table_name"=>"cash_bank","debit"=>null));	
		
$this->Session->write('petty_cash_payment_update', 1);
$this->redirect(array('controller' => 'Cashbanks','action'=>'petty_cash_payment_view'));
}
}
//End petty_cash_Payment_Update//
//Start bank_payment_html_view//
function bank_payment_html_view($auto_id=null)
{
		if($this->RequestHandler->isAjax()){
		$this->layout='blank';
		}else{
		$this->layout='session';
		}
	
	$s_role_id = (int)$this->Session->read('role_id');
		$s_society_id = (int)$this->Session->read('hm_society_id');
			$s_user_id = (int)$this->Session->read('hm_user_id');	
				$auto_id=(int)$auto_id;
					$this->ath();
	
		$this->loadmodel('cash_bank');
		$conditions=array("transaction_id"=>$auto_id,"source"=>"bank_payment","society_id"=>$s_society_id);
		$cursor1=$this->cash_bank->find('all',array('conditions'=>$conditions));
		$this->set('cursor1',$cursor1);

		$this->loadmodel('society');
		$conditions=array("society_id"=>$s_society_id);
		$cursor2=$this->society->find('all',array('conditions'=>$conditions));
		$this->set('cursor2',$cursor2);

		$this->loadmodel('reference');
		$conditions=array("auto_id"=>3);
		$cursor = $this->reference->find('all',array('conditions'=>$conditions));
		foreach($cursor as $collection){
		$tds_arr = $collection['reference']['reference'];
		}
		$this->set("tds_arr",$tds_arr);	
			
}

//Start bank_payment_update//
function bank_payment_update($auto_id=null)
{
		if($this->RequestHandler->isAjax()){
		$this->layout='blank';
		}else{
		$this->layout='session';
		}
		$this->ath();
	$s_role_id=(int)$this->Session->read('role_id');
		$s_society_id=(int)$this->Session->read('hm_society_id');
			$s_user_id=(int)$this->Session->read('hm_user_id');	
		
	if(isset($this->request->data['submit'])){
	   $element_id=(int)$this->request->data['element_id'];
	     $transaction_date=$this->request->data['transaction_date'];	
	       $transaction_date=date('Y-m-d',strtotime($transaction_date));
   		    $invoice_reference=$this->request->data['invoice_reference'];
	          $ledger_account=$this->request->data['ledger_account'];
		        $instrument_utr=$this->request->data['instrument'];
		          $mode_of_payment=$this->request->data['payment_mode'];
		            $tds_id=$this->request->data['tds'];
		              $bank_account=(int)$this->request->data['bank_account'];
			            $amount=$this->request->data['amount'];
			              $narration=$this->request->data['narration'];
		$ledger_account_array=explode(',',$ledger_account);			  
          $ledger_account_id=(int)$ledger_account_array[0];
		    $ledger_account_type=(int)$ledger_account_array[1];
				$edited_on=date('Y-m-d');
		   
		   
	$this->loadmodel('cash_bank');
	$this->cash_bank->updateAll(array("transaction_date"=>strtotime($transaction_date),"sundry_creditor_id"=>$ledger_account_id,"invoice_reference"=>@$invoice_reference,"narration"=>$narration,"receipt_mode"=>$mode_of_payment,"receipt_instruction"=>$instrument_utr,"account_head"=>$bank_account,"amount"=>$amount,"account_type"=>$ledger_account_type,"tds_tax_amount"=>$tds_id,"edited_by"=>$s_user_id,"edited_on"=>$edited_on),array("society_id"=>$s_society_id,"transaction_id"=>$element_id));
    $tds_amount=round($tds_id);
	$total_tds_amount=$amount-$tds_amount;


if($ledger_account_type == 1){
	$this->loadmodel('ledger');
	$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"debit"=>$amount,"ledger_account_id"=>15,"ledger_sub_account_id"=>$ledger_account_id),array("society_id"=>$s_society_id,"element_id"=>$element_id,"credit" =>null));
}
else
{
$this->loadmodel('ledger');
$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"debit"=>$amount,"ledger_account_id"=>$ledger_account_id,"ledger_sub_account_id"=>null),array("society_id"=>$s_society_id,"element_id"=>$element_id,"credit" =>null));
}

$this->loadmodel('ledger');
$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"credit"=>$total_tds_amount,"ledger_sub_account_id"=>$bank_account),array("society_id"=>$s_society_id,"element_id"=>$element_id,"debit"=>null,"ledger_account_id"=>33));

if($tds_amount > 0){
$sub_account_id_t = 16;
$this->loadmodel('ledger');
$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"credit"=>$tds_amount,"ledger_sub_account_id"=>null),array("society_id"=>$s_society_id,"element_id"=>$element_id,"debit"=>null,"ledger_account_id"=>16));
}
$this->Session->write('bank_payment_update', 1);
$this->redirect(array('controller' => 'Cashbanks','action' => 'bank_payment_view'));
}		

	
		$transaction_id=(int)$auto_id;
			$this->ath();
	
	$this->loadmodel('financial_year');
	$conditions=array("society_id" => $s_society_id,"status"=>1);
	$financial_years=$this->financial_year->find('all',array('conditions'=>$conditions));
	$financial_year_array=array();
	foreach($financial_years as $financial_year){
		$from=date("d-m-Y",$financial_year["financial_year"]["from"]);
		$to=date("d-m-Y",$financial_year["financial_year"]["to"]);
		$pair=array($from,$to);
		$pair=implode('/',$pair);
		$financial_year_array[]=$pair;
	}
	$financial_year_string=implode(',',$financial_year_array);
	$this->set(compact("financial_year_string"));	
		
	$this->loadmodel('ledger_sub_account');
	$conditions=array("society_id" => $s_society_id, "ledger_id" => 33);
	$cursor2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor2',$cursor2);

	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id" => 15,"society_id"=>$s_society_id);
	$cursor11=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor11',$cursor11);

	$this->loadmodel('accounts_group');
	$conditions=array("accounts_id" => 1);
	$cursor12=$this->accounts_group->find('all',array('conditions'=>$conditions));
	$this->set('cursor12',$cursor12);

	$this->loadmodel('accounts_group');
	$conditions=array("accounts_id" => 4);
	$cursor13=$this->accounts_group->find('all',array('conditions'=>$conditions));
	$this->set('cursor13',$cursor13);
	
		$this->loadmodel('cash_bank');
		$conditions=array("transaction_id"=>$transaction_id,"source"=>'bank_payment',"society_id"=>$s_society_id);
		$result_cash_bank=$this->cash_bank->find('all',array('conditions'=>$conditions));
		$this->set('result_cash_bank',$result_cash_bank);
	
}
//End Bank_Payment_Update//
//Start Petty Cash Payment Json//
function petty_cash_payment_json()
{
$this->layout="";
$this->ath();
	$s_society_id=(int)$this->Session->read('hm_society_id');
		$s_user_id=(int)$this->Session->read('hm_user_id');
			$date=date('d-m-Y');
				$time = date(' h:i a', time());
					$q=$this->request->query('q');
						$q = html_entity_decode($q);
							$myArray = json_decode($q, true);
		$c = 0;
		foreach($myArray as $child){
		$c++;
		if(empty($child[0])){
		$output = json_encode(array('type'=>'error','text'=>'Transaction Date is Required in row '.$c));
		die($output);
		}	


        $TransactionDate = $child[0];
 		$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				$from1 = date('Y-m-d',$from->sec);
				$to1 = date('Y-m-d',$to->sec);
				$from2 = strtotime($from1);
				$to2 = strtotime($to1);

				$transaction1 = date('Y-m-d',strtotime($TransactionDate));
				$transaction2 = strtotime($transaction1);
					if($transaction2<=$to2 && $transaction2>=$from2){
					$abc = 5;
					break;
					}	
		}
	if($abc == 555){
		$output=json_encode(array('type'=>'error','text'=>'Transaction Date Should be in Open Financial Year in row '.$c));
		die($output);
	}


if(empty($child[1])){
$output = json_encode(array('type'=>'error', 'text' => 'Account Group is Required in row '.$c));
die($output);
}	

if(empty($child[2])){
$output = json_encode(array('type'=>'error', 'text' => 'Expense Party Account is Required in row '.$c));
die($output);
}	

if(empty($child[3])){
$output = json_encode(array('type'=>'error', 'text' => 'Paid From is Required in row '.$c));
die($output);
}	

if(empty($child[4])){
$output = json_encode(array('type'=>'error', 'text' => 'Amount is Required in row '.$c));
die($output);
}	

if(is_numeric($child[4]))
{

}
else
{
$output = json_encode(array('type'=>'error', 'text' => 'Amount Should be Numeric Value in row '.$c));
die($output);
}
}
$rrr_arr = array();
foreach($myArray as $child)
{
$transaction_date = $child[0];
$ac_group = (int)$child[1];
$expense_party = (int)$child[2];
$paid_from = (int)$child[3];
$amount = $child[4];
$narration = $child[5];

$current_date = date('Y-m-d');

$auto=$this->autoincrement('cash_bank','transaction_id');
$i=$this->autoincrement_with_receipt_source('cash_bank','receipt_id','petty_cash_payment');
$rrr_arr[] = $i;
$this->loadmodel('cash_bank');
$multipleRowData = Array( Array("transaction_id" => $auto, "receipt_id" => $i,  "user_id" => $expense_party, 
"current_date" => $current_date, "account_type" => $ac_group,"transaction_date" => strtotime($transaction_date), "prepaired_by" => $s_user_id,"narration" => $narration, "account_head" => $paid_from,  "amount" => $amount,"society_id" => $s_society_id,"source"=>"petty_cash_payment","auto_inc"=>"YES"));
$this->cash_bank->saveAll($multipleRowData);  

if($ac_group == 1)
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => $amount, "credit" =>null,"ledger_account_id" => 15, "ledger_sub_account_id" =>$expense_party, "table_name" =>"cash_bank","element_id" => $auto, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData);
}
else
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => $amount, "credit" =>null,"ledger_account_id" =>$expense_party, "ledger_sub_account_id" =>null,"table_name" =>"cash_bank","element_id" => $auto, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData);
}

$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => null, "credit" =>$amount,"ledger_account_id" =>$paid_from,"ledger_sub_account_id" =>null,"table_name" =>"cash_bank","element_id" => $auto, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData);
}
$this->Session->write('petty_cc_pp',1);
$rr_shww = implode(",",$rrr_arr);
$output = json_encode(array('type'=>'success', 'text' => 'Petty Cash Payment voucher '.$rr_shww.' generated successfully'));
die($output);
}
//End Petty Cash Payment Json//
//Start Petty Cash receipt update Json//
function petty_cash_receipt_update_json()
{
$this->layout=null;
	$post_data=$this->request->data;
		$this->ath();
			$s_society_id=(int)$this->Session->read('society_id');
				$s_user_id=(int)$this->Session->read('user_id');

	$transaction_date = $post_data['dddd'];
	  $acgroup = (int)$post_data['actpp'];
		$party_acc = (int)$post_data['usssr'];
		  $achddd = (int)$post_data['acheadd'];
			$amttt = $post_data['amttt'];
			  $narration = $post_data['nrrr'];
				$element_id = (int)$post_data['elidd'];

$report = array();
if(empty($transaction_date)){
$report[]=array('label'=>'dddd', 'text' => 'Please select transaction date');
}	
	
if(empty($acgroup)){
$report[]=array('label'=>'acggg', 'text' => 'Please select account group');
}	

if(empty($party_acc)){
$report[]=array('label'=>'ussrr', 'text' => 'Please select Income/Party A/c');
}	

if(empty($achddd)){
$report[]=array('label'=>'achdd', 'text' => 'Please select account head');
}	

if(empty($amttt)){
$report[]=array('label'=>'amttt', 'text' => 'Please Fill Amount');
}

if(is_numeric($amttt))
{
}
else
{
$report[]=array('label'=>'amttt', 'text' => 'Please Fill Numeric Amount');
}
	
if(sizeof($report)>0)
{
$output=json_encode(array('report_type'=>'error','report'=>$report));
die($output);
}


$transaction_date = date('Y-m-d',strtotime($transaction_date));

$output=json_encode(array('report_type'=>'publish','text'=>$element_id));
die($output);

$this->new_cash_bank->updateAll(array("user_id" => $party_acc,"account_type" => $acgroup,"transaction_date" => strtotime($transaction_date),"narration" => $narration, "account_head" => $achddd,  "amount"=>$amttt),array('society_id'=>$s_society_id,"transaction_id"=>$element_id));

if($acgroup == 1)
{
$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"debit"=>null, "credit" =>$amttt,"ledger_account_id" => 34, "ledger_sub_account_id" =>$party_acc),array('society_id'=>$s_society_id,"element_id"=>$element_id,"table_name" =>"new_cash_bank"));
}
else
{
$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date), "debit" => null, "credit" =>$amttt,"ledger_account_id" =>$party_acc, "ledger_sub_account_id" =>null),array('society_id'=>$s_society_id,"element_id"=>$element_id,"table_name" =>"new_cash_bank"));
}


$this->ledger->updateAll(array("transaction_date"=>strtotime($transaction_date),"debit" =>$amttt, "credit" =>null,"ledger_account_id" =>$achddd,"ledger_sub_account_id"=>null),array('society_id'=>$s_society_id,"element_id"=>$element_id,"table_name" =>"new_cash_bank"));


$output=json_encode(array('report_type'=>'publish','text'=>'sdgdgdssdgds'));
die($output);

}
//End Petty Cash receipt update Json//
//Start bank_payment_import_excel//
function bank_payment_import_excel()
{
$this->layout="";
$filename="Bank_Payment_Import";
header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . "GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".csv");
header ("Content-Description: Generated Report" );

$this->ath();
	$s_role_id=$this->Session->read('role_id');
		$s_society_id = (int)$this->Session->read('society_id');
			$s_user_id = (int)$this->Session->read('user_id');


$excel = "Transaction Date,Ledger A/c,Amount,TDS Amount,Mode of Payment,Instrument/UTR,Bank Account,Invoice Reference,Narration \n";
$excel.="12-10-2015,Sinking Fund,10000,200,NEFT,HHHG4455,SBI,for marketing,narration \n";
echo $excel;

}
//End bank_payment_import_excel//
//Start bank_payment_import_view//
function bank_payment_import_view()
{
$this->layout="blank";
$this->ath();

$s_society_id= (int)$this->Session->read('society_id');

if(isset($_FILES['file'])){
$file_name=$_FILES['file']['name'];
$file_tmp_name =$_FILES['file']['tmp_name'];
$target = "csv_file/bank/";
$target=@$target.basename($file_name);
move_uploaded_file($file_tmp_name,@$target);

$f = fopen('csv_file/bank/'.$file_name, 'r') or die("ERROR OPENING DATA");
$batchcount=0;
$records=0;
while (($line = fgetcsv($f, 4096, ';')) !== false) {
$numcols = count($line);
$test[]=$line;
++$records;
}
fclose($f);
$records;
}
$i=0;
foreach($test as $child)
{
if($i>0)
{
$child_ex=explode(',',$child[0]);
$TransactionDate = $child_ex[0];
$ledger_account = $child_ex[1];
$amount = $child_ex[2];
$tds_persent = $child_ex[3];
$mode = $child_ex[4];
$instrument = $child_ex[5];
$bank_account = $child_ex[6];
$invoice = $child_ex[7];
$narration = $child_ex[8];

  
$this->loadmodel('ledger_account'); 
$conditions=array("ledger_name"=> new MongoRegex('/^' . trim($ledger_account) . '$/i'));
$ledggrr_acc_datt=$this->ledger_account->find('all',array('conditions'=>$conditions));
foreach($ledggrr_acc_datt as $ledggrr_acc_datttaa)
{
$auto_id = (int)$ledggrr_acc_datttaa['ledger_account']['auto_id'];
$typppp = 2;
}

$this->loadmodel('ledger_sub_account'); 
$conditions=array("name"=> new MongoRegex('/^' . trim($ledger_account) . '$/i'),"society_id"=>$s_society_id);
$ledggr_sub_acc_resulltt = $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
foreach($ledggr_sub_acc_resulltt as $ledd_detaill)
{
$auto_id = (int)$ledd_detaill['ledger_sub_account']['auto_id'];
$typppp = 1;
}			

$this->loadmodel('ledger_sub_account'); 
$conditions=array("name"=> new MongoRegex('/^' . trim($bank_account) . '$/i'),"society_id"=>$s_society_id);
$result_ac=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
foreach($result_ac as $collection)
{
$bank_id = (int)$collection['ledger_sub_account']['auto_id'];
}

$table[] = array(@$TransactionDate,@$typppp,@$auto_id,@$amount,@$tds_persent,@$mode,@$instrument,@$bank_id,@$invoice,@$narration);
} 
$i++;
}
$this->set('aaa',$table);

$this->loadmodel('reference');
$conditions=array("auto_id"=>3);
$cursor = $this->reference->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection)
{
$tds_arr = $collection['reference']['reference'];
}
$this->set("tds_arr",$tds_arr);


$this->loadmodel('ledger_sub_account');
$conditions=array("society_id"=>$s_society_id,"ledger_id"=>15);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 33,"society_id"=>$s_society_id);
$cursor2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 1);
$cursor12=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor12',$cursor12);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 4);
$cursor13=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor13',$cursor13);

}
//End bank_payment_import_view//
//Start save_bank_payment_imp//
function save_bank_payment_imp()
{
	$this->layout='blank';
		$s_society_id = (int)$this->Session->read('hm_society_id');
			$s_user_id = (int)$this->Session->read('hm_user_id');
	
	$this->ath();
	
	$q=$this->request->query('q'); 
	$myArray = json_decode($q, true);
		$r=1;
			foreach($myArray as $child){
				$r++;
				$TransactionDate = $child[0];
				$ledger_acount = $child[1];
				$amount = $child[2];
				$tds_amount = $child[3];
				$total_amt = $child[4];
				$mode = $child[5];
				$instrument = $child[6];
				$bank_id = $child[7];
				$invoice_ref = @$child[8];
		        $narration = $child[9];
		
		
		
		if(empty($TransactionDate)){
		$output=json_encode(array('report_type'=>'validation','text'=>'Please fill Transaction Date in row'.$r));
		die($output);
		}

		
		
	$this->loadmodel('financial_year');
	$conditions=array("society_id" => $s_society_id,"status"=>1);
	$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
	$abc = 555;
	foreach($cursor as $collection){
		$from = $collection['financial_year']['from'];
		$to = $collection['financial_year']['to'];
		$from1 = date('Y-m-d',$from->sec);
		$to1 = date('Y-m-d',$to->sec);
		$from2 = strtotime($from1);
		$to2 = strtotime($to1);
		$transaction1 = date('Y-m-d',strtotime($TransactionDate));
		$transaction2 = strtotime($transaction1);
		if($transaction2 <= $to2 && $transaction2 >= $from2){
			$abc = 5;
			break;
		}
	}
			if($abc == 555){
			$output=json_encode(array('report_type'=>'validation','text'=>'Transaction date is not in open Financial Year in row'.$r));
			die($output);
			}
				

		if(empty($ledger_acount)){
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Ledger Account in row'.$r));
		die($output);
		}
	
	
		if(empty($amount)){
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Amount in row'.$r));
		die($output);
		}
	
			if(is_numeric($amount))
			{
			}
			else
			{
			$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Numeric Amount in row'.$r));
			die($output);
			}

	
		
	

			
		if(empty($mode)){
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Mode in row'.$r));
		die($output);
		}
	
	
		if(empty($instrument)){
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Fill Instrument in row'.$r));
		die($output);
		}

		
	
		if(empty($bank_id)){
		$output=json_encode(array('report_type'=>'validation','text'=>'Please Select bank in row'.$r));
		die($output);
		}
		
}
$current_date = date('Y-m-d');
foreach($myArray as $child){
		$r++;
		$TransactionDate = $child[0];
		$transaction_date = date('Y-m-d',strtotime($TransactionDate));
		$ledger_acount = $child[1];
		$amount = $child[2];
		$tds_id = $child[3];
		$total_amt = $child[4];
		$mode = $child[5];
		$instrument = $child[6];
		$bank_id = $child[7];
		$invoice_ref = @$child[8];
		$narration = $child[9];
        $ins_type = (int)$child[10];
		
$accctyypp = explode(',',$ledger_acount);
$ledger_acc = (int)$accctyypp[0];
$acc_type = (int)$accctyypp[1];

$i=$this->autoincrement('new_cash_bank','transaction_id');
$bbb=$this->autoincrement_with_receipt_source('new_cash_bank','receipt_id',2);
$rr_arr[] = $bbb;
$this->loadmodel('new_cash_bank');
$multipleRowData = Array( Array("transaction_id" => $i, "receipt_id" => $bbb,  "current_date" => $current_date, 
"transaction_date" => strtotime($transaction_date), "prepaired_by" => $s_user_id, 
"user_id" => $ledger_acc, "invoice_reference" => @$invoice_ref,"narration" => $narration, "receipt_mode" => $mode,
"receipt_instruction" => $instrument, "account_head" => $bank_id,  
"amount" => $amount,"society_id" => $s_society_id, "tds_id" =>$tds_id,"account_type"=>$acc_type,"receipt_source"=>2,"auto_inc"=>"YES"));
$this->new_cash_bank->saveAll($multipleRowData);  

//////////////////// End Insert///////////////////////////////
///////////// TDS CALCULATION /////////////////////
$this->loadmodel('reference');
$conditions=array("auto_id" => 3);
$cursor4=$this->reference->find('all',array('conditions'=>$conditions));
foreach($cursor4 as $collection)
{
$tds_arr = $collection['reference']['reference'];	
}
if(!empty($tds_id))
{
for($r=0; $r<sizeof($tds_arr); $r++)
{
$tds_sub_arr = $tds_arr[$r];
$tds_id2 = (int)$tds_sub_arr[1];
if($tds_id2 == $tds_id)
{
$tds_rate = $tds_sub_arr[0];
break;
}
}
$tds_amount = (round(($tds_rate/100)*$amount));
$total_tds_amount = ($amount - $tds_amount);
}
else
{
$total_tds_amount = $amount;
$tds_amount = 0;
}

////////////END TDS CALCULATION //////////////////// 
////////////////START LEDGER ENTRY///////////////////////
if($acc_type == 1)
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => $amount, "credit" =>null,"ledger_account_id" => 15, "ledger_sub_account_id" =>$ledger_acc, "table_name" =>"new_cash_bank","element_id" => $i, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 
}
else
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => $amount,"credit" =>null,"ledger_account_id" =>$ledger_acc, "ledger_sub_account_id" =>null, "table_name" =>"new_cash_bank","element_id" =>$i, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 
}

$sub_account_id_a = (int)$bank_id;
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" =>null,"credit" =>$total_tds_amount,"ledger_account_id" =>33, "ledger_sub_account_id" =>$sub_account_id_a, "table_name" =>"new_cash_bank","element_id" =>$i, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 


if($tds_amount > 0)
{
$sub_account_id_t = 16;
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" =>null,"credit" =>$tds_amount,"ledger_account_id" =>$sub_account_id_t, "ledger_sub_account_id" =>null, "table_name" =>"new_cash_bank","element_id" =>$i, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 
}	
}

$this->Session->write('bank_ppp2',1);

$output=json_encode(array('report_type'=>'done','text'=>'Please Fill Date in row'));
die($output);
}
//End save_bank_payment_imp//
//Start bank_payment_add_row// 
function bank_payment_add_row()
{
	$this->layout='blank';
		$s_society_id = (int)$this->Session->read('hm_society_id');
			$s_user_id = (int)$this->Session->read('hm_user_id');

$this->ath();

$count = (int)$this->request->query('con');
$this->set('count',$count);
//////////////////////////////////////

$this->loadmodel('ledger_sub_account');
$conditions=array("society_id" => $s_society_id, "ledger_id" => 33);
$cursor2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

$this->loadmodel('master_tds');
$cursor3=$this->master_tds->find('all');
$this->set('cursor3',$cursor3);

$this->loadmodel('reference');
$conditions=array("auto_id"=>3);
$cursor = $this->reference->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection)
{
$tds_arr = $collection['reference']['reference'];
}
$this->set("tds_arr",$tds_arr);



$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 15,"society_id"=>$s_society_id);
$cursor11=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor11',$cursor11);


$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 1);
$cursor12=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor12',$cursor12);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 4);
$cursor13=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor13',$cursor13);

}
//End bank_payment_add_row//
//Start show_deposit_slip//
function show_deposit_slip()
{
$this->layout='session';
	$s_society_id = (int)$this->Session->read('hm_society_id');
		$s_user_id = (int)$this->Session->read('hm_user_id');
			$this->ath();

	$this->loadmodel('society');
	$conditions=array("society_id" =>$s_society_id);
	$cursor=$this->society->find('all',array('conditions'=>$conditions));
	foreach($cursor as $collection){
	$society_name = $collection['society']['society_name'];
	}

	$this->set('society_name',$society_name);

	$arrr = $this->request->query('ar');
	$this->set('arrr',$arrr);


$this->loadmodel('ledger_sub_account');
$conditions=array('society_id'=>$s_society_id,"ledger_id"=>33);
$cursor=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
foreach($cursor as $data)
{
$bank_account = $data['ledger_sub_account']['bank_account'];
}
$this->set('bank_account',$bank_account);
}
//End show_deposit_slip//
//Start new_cash_receipt_add// 
function new_cash_receipt_add(){
	
$this->layout="blank";
$count=(int)$this->request->query('q');
$this->set('count',$count);
$s_society_id=$this->Session->read('hm_society_id');
$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 33,"society_id"=>$s_society_id);
$result_ledger_sub_account=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('result_ledger_sub_account',$result_ledger_sub_account);
}
//End new_cash_receipt_add//
//Start new_bank_receipt//
function new_bank_receipt(){
	
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}

	$this->ath();
		$this->check_user_privilages();
			$s_society_id = (int)$this->Session->read('hm_society_id');
				$s_user_id = (int)$this->Session->read('hm_user_id');
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("society_id"=>$s_society_id,"ledger_id"=>112);
	$non_members = $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set(compact("non_members"));
	
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("society_id" => $s_society_id,"ledger_id"=>33);
	$bank_data = $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set(compact("bank_data"));
	
	$this->loadmodel('ledger_sub_account');
        $condition=array('society_id'=>$s_society_id,'ledger_id'=>34);
        $members=$this->ledger_sub_account->find('all',array('conditions'=>$condition));
        foreach($members as $data3){
            $ledger_sub_account_ids[]=$data3["ledger_sub_account"]["auto_id"];
        }
       
       
        $this->loadmodel('wing');
        $condition=array('society_id'=>$s_society_id);
        $order=array('wing.wing_name'=>'ASC');
        $wings=$this->wing->find('all',array('conditions'=>$condition,'order'=>$order));
        foreach($wings as $data){
			$wing_id=$data["wing"]["wing_id"];
			$this->loadmodel('flat');
			$condition=array('society_id'=>$s_society_id,'wing_id'=>$wing_id);
			$order=array('flat.flat_name'=>'ASC');
			$flats=$this->flat->find('all',array('conditions'=>$condition,'order'=>$order));
			foreach($flats as $data2){
				$flat_id=$data2["flat"]["flat_id"];
				$ledger_sub_account_id = $this->requestAction(array('controller' => 'Fns', 'action' => 'ledger_sub_account_id_via_wing_id_and_flat_id'),array('pass'=>array($wing_id,$flat_id)));
				if(!empty($ledger_sub_account_id)){
					if (in_array($ledger_sub_account_id, $ledger_sub_account_ids)){
						$members_for_billing[]=$ledger_sub_account_id;
					}
				}
			}
		}
		$this->set(compact("members_for_billing"));
		
			$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip')); 
			$this->loadmodel('society');
			$conditions=array("society_id" => $s_society_id);
			$cursor2=$this->society->find('all',array('conditions'=>$conditions));
			foreach ($cursor2 as $collection){
					$society_name = $collection['society']['society_name'];
					$society_reg_no = @$collection['society']['society_reg_num'];
					$society_address = @$collection['society']['society_address'];
					$sig_title = @$collection['society']['sig_title'];
					$email_is_on_off=(int)@$collection["society"]["account_email"];
					$sms_is_on_off=(int)@$collection["society"]["account_sms"];
			}
			
			
		if(isset($this->request->data['submit'])){
			$transaction_dates = $this->request->data['transaction_date'];
			$deposited_ins = $this->request->data['deposited_in'];
			$receipt_modes = $this->request->data['receipt_mode'];
			$cheque_numbers = $this->request->data['cheque_number'];
			$dates = $this->request->data['date'];
			$drown_in_which_banks = $this->request->data['drown_in_which_bank'];
			$branch_of_banks = $this->request->data['branch_of_bank'];
			$received_froms = $this->request->data['received_from'];
			$non_members_ledger_sub_account_ids=$this->request->data['non_member_ledger_sub_account'];
			$bill_references=$this->request->data['bill_reference'];
			$ledger_sub_accounts = $this->request->data['ledger_sub_account'];
			//$receipt_types = $this->request->data['receipt_type'];
			$amounts = $this->request->data['amount'];
			$narrations = $this->request->data['narration'];
			
			$created_on=date("d-m-Y");
			
			$i=0;
			foreach($transaction_dates as $transaction_date){
				$transaction_date=date("Y-m-d",strtotime($transaction_date));
				$deposited_in=(int)$deposited_ins[$i];
				$receipt_mode=$receipt_modes[$i];
				$cheque_number=$cheque_numbers[$i];
				$date=$dates[$i];
				$drown_in_which_bank=$drown_in_which_banks[$i];
				$branch_of_bank=$branch_of_banks[$i];
				$received_from=$received_froms[$i];
				if($received_from == 'residential'){
				$ledger_sub_account_id=(int)$ledger_sub_accounts[$i];
				//$receipt_type=$receipt_types[$i];	
				$ledger_sub_account_id_for_insertion=$ledger_sub_account_id;
				$bill_reference=null;
				}else{
				 $non_members_ledger_sub_account_id=(int)$non_members_ledger_sub_account_ids[$i];
				 $bill_reference=$bill_references[$i];
				 $ledger_sub_account_id_for_insertion=$non_members_ledger_sub_account_id;
				 //$receipt_type=null;
				}
				$amount=$amounts[$i];
				$narration=$narrations[$i];
				$cheque_date=$date;
				
					$this->loadmodel('cash_bank');
					$auto_id=$this->autoincrement('cash_bank','transaction_id');
					$receipt_number=$this->autoincrement_with_society_ticket('cash_bank','receipt_number');
					$this->cash_bank->saveAll(Array( Array("transaction_id"=>$auto_id, "transaction_date" => strtotime($transaction_date),"deposited_in" => $deposited_in, "receipt_mode" => $receipt_mode, "cheque_number" => $cheque_number,"date"=>$date,"drown_in_which_bank"=>$drown_in_which_bank,"branch_of_bank"=>$branch_of_bank,"received_from"=>$received_from,"ledger_sub_account_id"=>$ledger_sub_account_id_for_insertion,"amount"=>$amount,"narration"=>$narration,"society_id"=>$s_society_id,"created_by"=>$s_user_id,"source"=>"bank_receipt","applied"=>"no","receipt_number"=>$receipt_number,"bill_reference"=>$bill_reference,"created_on"=>$created_on))); 
					$receipt_array_num[]=$receipt_number;
					
					$this->loadmodel('ledger');
					$ledger_id=$this->autoincrement('ledger','auto_id');
					$this->ledger->saveAll(Array( Array("auto_id" => $ledger_id, "transaction_date"=> strtotime($transaction_date), "debit" => $amount, "credit" =>null, "ledger_account_id" => 33, "ledger_sub_account_id" => $deposited_in,"table_name" => "cash_bank","element_id" => $auto_id, "society_id" => $s_society_id))); 
                    
					if($received_from == "residential"){
					$ledger_id=$this->autoincrement('ledger','auto_id');
					$this->ledger->saveAll(Array( Array("auto_id" => $ledger_id, "transaction_date"=> strtotime($transaction_date), "credit" => $amount,"debit" =>null,"ledger_account_id" => 34, "ledger_sub_account_id" => $ledger_sub_account_id,"table_name"=>"cash_bank","element_id" => $auto_id, "society_id" => $s_society_id)));
				    }else{
					$ledger_id=$this->autoincrement('ledger','auto_id');
					$this->ledger->saveAll(Array( Array("auto_id" => $ledger_id, "transaction_date"=> strtotime($transaction_date), "credit" => $amount,"debit" =>null,"ledger_account_id" => 112, "ledger_sub_account_id" => $non_members_ledger_sub_account_id,"table_name"=>"cash_bank","element_id" => $auto_id, "society_id" => $s_society_id)));	
					}
				
				// start Email & Sms code
				
					$amount = str_replace( ',', '', $amount );
					$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));
					
				$date=date("d-m-Y",strtotime($transaction_date));
				$result_member_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'), array('pass' => array($ledger_sub_account_id))); 
				
						 $user_name=$result_member_info["user_name"];
						 $wing_name=$result_member_info["wing_name"];
						 $flat_name=$result_member_info["flat_name"];
						 $wing_flat=$wing_name.'-'.$flat_name;
						 $email=$result_member_info["email"];
						 $mobile=$result_member_info["mobile"];
						 $wing_id=$result_member_info["wing_id"];
				
				
				
					$html_receipt='<table style="padding:24px;background-color:#34495e" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
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
										<td style="padding:0px 0 2px 5px"  colspan="4">'.$received_from.'</td>
										
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
				

	
			if($email_is_on_off==1){
			////email code//
					if(!empty($email)){
					$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".$date." against Unit ".$wing_flat."";
					

					$this->send_email($email,'accounts@housingmatters.in','HousingMatters',$subject,$html_receipt,'donotreply@housingmatters.in');
				}
			}	

			
				if($sms_is_on_off==1){
						if(!empty($mobile)){
								$r_sms=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_sms_ip')); 

								$working_key=$r_sms->working_key;
								$sms_sender=$r_sms->sms_sender; 
								$sms_allow=(int)$r_sms->sms_allow;
								
							if($sms_allow==1){
									
									$user_name_short=$this->check_charecter_name($user_name);
									
									$sms="Dear ".$user_name_short." ,we have received Rs ".$amount." on ".$date." towards Society Maint. dues. Cheques are subject to realization,".$society_name;
									$sms1=str_replace(' ', '+', $sms);

									$payload = file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$mobile.'&message='.$sms1.''); 
							}
						}	
				}
				
				
			$i++; }
		//vochar code
		
			$first=reset($receipt_array_num);
			$last=end($receipt_array_num);
			if($first!=$last){
				$show_vouchar=$first.' to '.$last;
			}else{
				
				$show_vouchar=$first;
			}
			$show_vouch=array(1,$show_vouchar);
		///	
			$this->Session->write('bank_receipt', $show_vouch);
		}
	
}
///End new bank receipt//
//Start bank_receipt_mode_ajax//
function bank_receipt_amt_ajax()
{
$this->layout="blank";
$s_society_id=$this->Session->read('society_id');
 
 $this->ath();
 
$flat_id = (int)$this->request->query('flat');
$type = (int)$this->request->query('type');
$ccc = (int)$this->request->query('cc');
 
$this->set('flat_id',$flat_id);
$this->set('type',$type);
$this->set('ccc',$ccc);
}
//End bank_receipt_mode_ajax//
//Start bank_receipt_json//
function bank_receipt_json()
{
		$this->layout='blank';
		$s_society_id = (int)$this->Session->read('society_id');
		$s_user_id = (int)$this->Session->read('user_id');

          $this->ath();	
		
		$q=$this->request->query('q'); 
		$q = html_entity_decode($q);
		$myArray = json_decode($q, true);
		
		$r=0;
		foreach($myArray as $child)
		{
		$r++;

			if(empty($child[0]))
			{
			$output = json_encode(array('type'=>'error', 'text' => 'Transaction Date is Required in row '.$r));
			die($output);
			}
			
			$ddatttt = $child[0];
			$dattttt = date('Y-m-d',strtotime($ddatttt));
			$dddatttt = strtotime($dattttt);
			
			$this->loadmodel('financial_year');
			$conditions=array("society_id"=>$s_society_id,"status"=>1);
			$cursor=$this->financial_year->find('all',array('conditions'=>$conditions));
			if(sizeof($cursor) == 0)
			{
			$nnnnn = 555;	
			}
			foreach($cursor as $dataaa)
			{
				$fin_from_date = $dataaa['financial_year']['from'];
				$fin_to_date = $dataaa['financial_year']['to'];
				$from_date = date('Y-m-d',$fin_from_date->sec);
				$to_date = date('Y-m-d',$fin_to_date->sec);
				$from = strtotime($from_date);
				$to = strtotime($to_date);
					if($from <= $dddatttt && $to >= $dddatttt)
					{
					$nnnnn = 55;
					break;
					}
					else
					{
					$nnnnn = 555;
					}
			}
			
			if($nnnnn == 555)
			{
			$output = json_encode(array('type'=>'error', 'text' => 'Transaction Date Should be in Open Financial Year in row '.$r));
			die($output);
			}

			
			
			
			if(empty($child[1]))
			{
			$output = json_encode(array('type'=>'error', 'text' => 'Deposited In is Required in row '.$r));
			die($output);
			}
		
		if(empty($child[2]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Receipt Mode is Required in row '.$r));
		die($output);
		}

if($child[2] == "Cheque")
{		
	if(empty($child[3]))
	{
	$output = json_encode(array('type'=>'error', 'text' => 'Cheque Number is Required in row '.$r));
	die($output);
	}
	
	if(is_numeric($child[3]))
	{
	}	
	else
	{
	$output = json_encode(array('type'=>'error', 'text' => 'Cheque Number Should be Numeric Value in row '.$r));
	die($output);
	}
	
	if(empty($child[4]))
	{
	$output = json_encode(array('type'=>'error', 'text' => 'Cheque Date is Required in row '.$r));
	die($output);
	}
		
		if(empty($child[5]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Drawn in which Bank is Required in row '.$r));
		die($output);
		}
		
	if(empty($child[15]))
	{
	$output = json_encode(array('type'=>'error', 'text' => 'Branch of Bank is Required in row '.$r));
	die($output);
	}
		
		
}	
else
{
        if(empty($child[7]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Reference/Utr is Required in row '.$r));
		die($output);
		}		
		
		if(empty($child[6]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Date is Required in row '.$r));
		die($output);
		}

}		
		if(empty($child[8]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Received From is Required in row '.$r));
		die($output);
		}
		
 if($child[8] == 1)
 {
 
		if(empty($child[9]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Select Resident is Required in row '.$r));
		die($output);
		}
 
		if(empty($child[10]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Receipt Type is Required in row '.$r));
		die($output);
		}
}
else
{
		if(empty($child[11]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Party Name is Required in row '.$r));
		die($output);
		}

		if(empty($child[12]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Bill Reference is Required in row '.$r));
		die($output);
		}
        }		
		
		if(empty($child[13]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Amount is Required in row '.$r));
		die($output);
		}

		if(is_numeric($child[13]))
		{
		}
		else
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Amount Should be Numeric Value in row '.$r));
		die($output);
		}
}
$receipt_arr = array();
foreach($myArray as $child)
{
		$current_date = date('Y-m-d');
		$receipt_date = $child[0];
			$TransactionDate = date('Y-m-d',strtotime($receipt_date));
			$TransactionDate = strtotime($TransactionDate); 

		$deposited_bank_id = (int)$child[1];
		$receipt_mode = $child[2];
			if($receipt_mode == "Cheque")
			{
				$cheque_number = $child[3];
				$cheque_date = $child[4];
				$drawn_on_which_bank = $child[5];

			 $branch = $child[15]; 
				
				
				
		    $knddd = "&quot;".$branch."&quot;";
			$this->loadmodel('reference');
			$conditions=array("auto_id"=>7);
			$rfff=$this->reference->find('all',array('conditions'=>$conditions));
			foreach($rfff as $dddttt)
			{
			$knnddd = @$dddttt['reference']['reference'];			
			}
				$nnnn = 555;
				for($n=0; $n<sizeof($knnddd); $n++)
				{
				$kendo_name = $knnddd[$n];
				if($kendo_name == $knddd)
				{
				$nnnn = 5;
				break;
				}
				else
				{
				$nnnn = 555;
				}
				}
					
						if($nnnn == 555){
						$knnddd[] = $knddd;
						$this->loadmodel('reference');
						$this->reference->updateAll(array("reference" => $knnddd),array("auto_id" =>7));
						}		
				
				
				
				
				
			$knddd = "&quot;".$drawn_on_which_bank."&quot;";
			$this->loadmodel('reference');
			$conditions=array("auto_id"=>6);
			$rfff=$this->reference->find('all',array('conditions'=>$conditions));
			foreach($rfff as $dddttt)
			{
			$knnddd = @$dddttt['reference']['reference'];			
			}
				$nnn = 555;
				for($n=0; $n<sizeof($knnddd); $n++)
				{
				$kendo_name = $knnddd[$n];
				if($kendo_name == $knddd)
				{
				$nnn = 5;
				break;
				}
				else
				{
				$nnn = 555;
				}
				}
					
						if($nnn == 555){
						$knnddd[] = $knddd;
						$this->loadmodel('reference');
						$this->reference->updateAll(array("reference" => $knnddd),array("auto_id" =>6));
						}			
				}
					else
					{
					$reference_utr = $child[7];
					$cheque_date = $child[6];
					}		
		$member_type = (int)$child[8];
				if($member_type == 1)
				{
					$party_name = (int)$child[9];
					$receipt_type = (int)$child[10];
					$flat_id = $party_name;
					}
				else
				{
				$party_name = $child[11];
				$bill_reference = $child[12];
				}
		$amount = $child[13];
		$narration = $child[14];
       
		
///////////////////////////
if($member_type == 1)
{
	if($receipt_type == 1)
	{
     //apply receipt in regular_bill//
	 
	 $result_new_regular_bill = $this->requestAction(array('controller' => 'Incometrackers', 'action' => 'fetch_last_bill_info_via_flat_id'),array('pass'=>array($flat_id)));
	
	 $auto_id=null; $regular_bill_one_time_id=null;
	if(sizeof($result_new_regular_bill)>0){
		foreach($result_new_regular_bill as $data){
	$auto_id=$data["auto_id"];  
	$edit_status=$data["edit_status"]; 
	$latest_bill=@$data["latest_bill"]; 
	$receipt_applied=@$data["receipt_applied"]; 
	$regular_bill_one_time_id = (int)$data["one_time_id"];
	$flat_id = (int)$data["flat_id"];
	if($edit_status=="NO" && $latest_bill=="YES"){
			if(empty($receipt_applied)){
				$arrear_intrest=$data["arrear_intrest"];
				$intrest_on_arrears=$data["intrest_on_arrears"];
				$total=$data["total"];
				$arrear_maintenance=$data["arrear_maintenance"];
			}else{
				$arrear_intrest=$data["new_arrear_intrest"];
				$intrest_on_arrears=$data["new_intrest_on_arrears"];
				$total=$data["new_total"];
				$arrear_maintenance=$data["new_arrear_maintenance"];
			}
	}else{
		$number_of_receipt=$this->count_receipt_against_bill($regular_bill_one_time_id,$flat_id);
		if($number_of_receipt==0){
			$arrear_intrest=$data["arrear_intrest"];
			$intrest_on_arrears=$data["intrest_on_arrears"];
			$total=$data["total"];
			$arrear_maintenance=$data["arrear_maintenance"]; 
		}else{
			$arrear_intrest=$data["new_arrear_intrest"];
			$intrest_on_arrears=$data["new_intrest_on_arrears"];
			$total=$data["new_total"];
			$arrear_maintenance=$data["new_arrear_maintenance"];
		}
	}
	
	
	
	
	}
    	$amount_after_arrear_intrest=$amount-$arrear_intrest;
		if($amount_after_arrear_intrest<0)
		{
		$new_arrear_intrest=abs($amount_after_arrear_intrest);
		$new_intrest_on_arrears=$intrest_on_arrears;
		$new_arrear_maintenance=$arrear_maintenance;
		$new_total=$total;
		}
		else
		{
		$new_arrear_intrest=0;
		$amount_after_intrest_on_arrears=$amount_after_arrear_intrest-$intrest_on_arrears;
			if($amount_after_intrest_on_arrears<0)
			{
			$new_intrest_on_arrears=abs($amount_after_intrest_on_arrears);
			$new_arrear_maintenance=$arrear_maintenance;
			$new_total=$total;
			}
			else
			{
			$new_intrest_on_arrears=0;
			$amount_after_arrear_maintenance=$amount_after_intrest_on_arrears-$arrear_maintenance;
				if($amount_after_arrear_maintenance<0){
				$new_arrear_maintenance=abs($amount_after_arrear_maintenance);
				$new_total=$total;
				}else{
				$new_arrear_maintenance=0;
				$amount_after_total=$amount_after_arrear_maintenance-$total; 
				if($amount_after_total>0){
				$new_total=0;
				$new_arrear_maintenance=-$amount_after_total;
				}else{
							$new_total=abs($amount_after_total);
							
					}
				}
			}
		}
			
		$this->loadmodel('new_regular_bill');
		$this->new_regular_bill->updateAll(array('new_arrear_intrest'=>$new_arrear_intrest,"new_intrest_on_arrears"=>$new_intrest_on_arrears,"new_arrear_maintenance"=>$new_arrear_maintenance,"new_total"=>$new_total),array('auto_id'=>$auto_id));
	}
	
			
		$t1=$this->autoincrement('new_cash_bank','transaction_id');
		$k = (int)$this->autoincrement_with_receipt_source('new_cash_bank','receipt_id',1); 
		$this->loadmodel('new_cash_bank');
		$multipleRowData = Array( Array("transaction_id"=> $t1,"receipt_id" => $k, 
		"receipt_date" => $TransactionDate, "receipt_mode" => $receipt_mode, 
		"cheque_number" =>@$cheque_number,"cheque_date" =>$cheque_date,
		"drawn_on_which_bank" =>@$drawn_on_which_bank,"reference_utr" => @$reference_utr,
		"deposited_bank_id" => $deposited_bank_id,"member_type" => $member_type,
		"party_name_id"=>$party_name,"receipt_type" => $receipt_type,"amount" => $amount,
		"current_date" => $current_date,"society_id"=>$s_society_id,"flat_id"=>$party_name,
		"bill_auto_id"=>$auto_id,"bill_one_time_id"=>$regular_bill_one_time_id,"narration"=>$narration,
		"receipt_source"=>1,"edit_status"=>"NO","auto_inc"=>"YES","prepaired_by" => $s_user_id,"bank_branch"=>@$branch,"is_cancel"=>"NO"));
		$this->new_cash_bank->saveAll($multipleRowData);
	    $receipt_arr[] = $k;
	
	
		$result_flat_info=$this->requestAction(array('controller' => 'Hms', 'action' => 'ledger_SubAccount_dattta_by_flat_id'),array('pass'=>array($party_name)));
		foreach($result_flat_info as $flat_info){
		$account_id = (int)$flat_info["ledger_sub_account"]["auto_id"];
		}


$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> $TransactionDate, "debit" => $amount, "credit" =>null,"ledger_account_id" => 33, "ledger_sub_account_id" => $deposited_bank_id, "table_name" => "new_cash_bank","element_id" => $t1, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 

$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> $TransactionDate, "credit" => $amount, "debit" =>null,"ledger_account_id" => 34, "ledger_sub_account_id" => $account_id,"table_name" => "new_cash_bank","element_id" => $t1, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData);
//////////////////////////////////////////////////


$this->loadmodel('new_cash_bank');
$conditions=array("receipt_id" => $k,"receipt_source"=>1,"society_id"=>$s_society_id);
$cursor=$this->new_cash_bank->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection)
{
$receipt_no = (int)$collection['new_cash_bank']['receipt_id'];
$d_date = $collection['new_cash_bank']['receipt_date'];
$today = date("d-M-Y");
$flat_id = $collection['new_cash_bank']['party_name_id'];
$amount = $collection['new_cash_bank']['amount'];
$society_id = (int)$collection['new_cash_bank']['society_id'];
$bill_reference = $collection['new_cash_bank']['reference_utr'];
$narration = $collection['new_cash_bank']['narration'];
$member = (int)$collection['new_cash_bank']['member_type'];
$receiver_name = @$collection['new_cash_bank']['receiver_name'];
$receipt_mode = $collection['new_cash_bank']['receipt_mode'];
$cheque_number = @$collection['new_cash_bank']['cheque_number'];
$which_bank = @$collection['new_cash_bank']['drawn_on_which_bank'];
$reference_number = @$collection['new_cash_bank']['reference_number'];
$cheque_date = @$collection['new_cash_bank']['cheque_date'];
$sub_account = (int)$collection['new_cash_bank']['deposited_bank_id'];
$sms_date=date("d-m-Y",($d_date));

$amount = str_replace( ',', '', $amount );
$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
foreach ($cursor2 as $collection) 
{
$society_name = $collection['society']['society_name'];
$society_reg_no = $collection['society']['society_reg_num'];
$society_address = $collection['society']['society_address'];
$sig_title = $collection['society']['sig_title'];
}
if($member == 2)
{
$user_name = $receiver_name;
$wing_flat = "";
}
else
{
$flatt_datta = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_wing_id_via_flat_id'),array('pass'=>array($flat_id)));
foreach ($flatt_datta as $fltt_datttaa) 
{
$wnngg_idddd = (int)$fltt_datttaa['flat']['wing_id'];
}

$result_lsa = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_user_info_via_flat_id'),array('pass'=>array($wnngg_idddd,$flat_id)));
foreach ($result_lsa as $collection) 
{
$wing_id = $collection['user']['wing'];  
$flat_id = (int)$collection['user']['flat'];
$tenant = (int)$collection['user']['tenant'];
$user_name = $collection['user']['user_name'];
$to_mobile = $collection['user']['mobile'];
$to_email = $collection['user']['email'];
}
$wing_flat = $this->requestAction(array('controller' => 'hms', 'action'=>'wing_flat'),array('pass'=>array($wing_id,$flat_id)));									
}  
$result2 = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($sub_account))); 
foreach($result2 as $collection)
{
$bank_name = $collection['ledger_sub_account']['name'];
}
                                    
$ip=$this->hms_email_ip();
$date=date("d-m-Y",($d_date));

$html_receipt='<table style="padding:24px;background-color:#34495e" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
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
									<td style="padding:0px 0 2px 5px" colspan="2">Receipt No: '.$receipt_no.'</td>
									
									<td colspan="2" align="right" style="padding:0px 5px 0 0px"><b>Date:</b> '.$date.' </td>
									
								</tr>
								<tr>
									<td style="padding:0px 0 2px 5px" colspan="2"> Received with thanks from: <b>'.$user_name.' '.$wing_flat.'</b></td>
																		
								</tr>
								<tr>
									<td style="padding:0px 0 2px 5px"  colspan="4">Rupees '.$am_in_words.' Only </td>
									
								</tr>';
								
							if($receipt_mode=="Cheque"){
							$receipt_mode_type='Via '.$receipt_mode.'-'.$cheque_number.' drawn on '.$which_bank.' dated '.$cheque_date;
							}
							else{
							$receipt_mode_type='Via '.$receipt_mode.'-'.$reference_number.' dated '.$cheque_date;
							}

								
								$html_receipt.='<tr>
									<td style="padding:0px 0 2px 5px"  colspan="4">'.$receipt_mode_type.'</td>
									
								</tr>
								
								<tr>
									<td style="padding:0px 0 2px 5px" colspan="4">Payment of previous bill</td>
									
								</tr>
								
							</tbody></table>
							
							
							
							<table style="font-size:12px;" width="100%" cellspacing="0">
								<tbody><tr>
									<td width="50%" style="padding:5px" valign="top">
									<span style="font-size:16px;"> <b>Rs '.$amount.'</b></span><br>';
									if($receipt_mode=="Cheque"){
									$receipt_title_cheq='Subject to realization of Cheque(s)';
									}
																		
									$html_receipt.='<span>'.@$receipt_title_cheq.'</span></td>
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
                                        <td align="right" style="font-size: 10px;"><b>Phone :</b></td>
                                        <td width="84" style="color:#fff!important;text-decoration:none;font-size:10px;"><b>022-41235568</b></td>
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
////////////////my Email//////////////
}


/////////////////////////////////////////////////////////////////////////////
$this->loadmodel('society');
$condition=array('society_id'=>$s_society_id);
$result_society=$this->society->find('all',array('conditions'=>$condition)); 
$this->set('result_society',$result_society);
foreach($result_society as $data_society){
	$society_name=$data_society["society"]["society_name"];
	$email_is_on_off=(int)@$data_society["society"]["account_email"];
	$sms_is_on_off=(int)@$data_society["society"]["account_sms"];
   }
//////////////////////////////////////////////////////////////////////////


if($email_is_on_off==1){
////email code//
$r_sms=$this->hms_sms_ip();
$working_key=$r_sms->working_key;
$sms_sender=$r_sms->sms_sender; 
$sms_allow=(int)$r_sms->sms_allow;

$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".date('d-M-Y',$d_date)." against Unit ".$wing_flat."";
//$subject = "[".$society_name."]- Receipt,"date('d-M-Y',$d_date).""; 

$this->send_email($to_email,'accounts@housingmatters.in','HousingMatters',$subject,$html_receipt,'donotreply@housingmatters.in');

}

if($sms_is_on_off==1){
	if($sms_allow==1){

	
$r_sms=$this->hms_sms_ip();
$working_key=$r_sms->working_key;
$sms_sender=$r_sms->sms_sender; 
$sms_allow=(int)$r_sms->sms_allow;
$user_name_short=$this->check_charecter_name($user_name);
$sms="Dear ".$user_name_short." ,we have received Rs ".$amount." on ".$sms_date." towards Society Maint. dues. Cheques are subject to realization,".$society_name;
$sms1=str_replace(' ', '+', $sms);

$payload = file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$to_mobile.'&message='.$sms1.''); 
}
}	
//////////////////////////////////////////////////////////////////////////////
		
}
if($receipt_type == 2)
	{
	$t2=$this->autoincrement('new_cash_bank','transaction_id');
	$k = (int)$this->autoincrement_with_receipt_source('new_cash_bank','receipt_id',1);
	$this->loadmodel('new_cash_bank');
	$multipleRowData = Array( Array("transaction_id"=>$t2, "receipt_id" => $k, 
	"receipt_date" => $TransactionDate, "receipt_mode" => $receipt_mode, "cheque_number" =>@$cheque_number,
	"cheque_date" =>$cheque_date,"drawn_on_which_bank" =>@$drawn_on_which_bank,
	"reference_utr" => @$reference_utr,"deposited_bank_id" => $deposited_bank_id,"member_type" => $member_type,
	"party_name_id"=>$party_name,"receipt_type" => $receipt_type,"amount" => $amount,
	"current_date" => $current_date,"society_id"=>$s_society_id,"flat_id"=>$party_name,
	"narration"=>$narration,"receipt_source"=>1,"prepaired_by" => $s_user_id,
	"edit_status"=>"NO","auto_inc"=>"YES","bank_branch"=>@$branch));
	$this->new_cash_bank->saveAll($multipleRowData);
     $receipt_arr[] = $k;
	
	
$result_flat_info=$this->requestAction(array('controller' => 'Hms', 'action' => 'ledger_SubAccount_dattta_by_flat_id'),array('pass'=>array($party_name)));
foreach($result_flat_info as $flat_info){
$account_id = (int)$flat_info["ledger_sub_account"]["auto_id"];
}

$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> $TransactionDate, "debit" => $amount, "credit" =>null, "ledger_account_id" => 33, "ledger_sub_account_id" => $deposited_bank_id,"table_name" => "new_cash_bank","element_id" => $t2, "society_id" => $s_society_id,));
$this->ledger->saveAll($multipleRowData); 

$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> $TransactionDate, "credit" => $amount, "debit" =>null, "ledger_account_id" => 34, "ledger_sub_account_id" => $account_id,"table_name" => "new_cash_bank","element_id" => $t2, "society_id" => $s_society_id,));
$this->ledger->saveAll($multipleRowData);
	
}
}
else if($member_type == 2)
{
$t3=$this->autoincrement('new_cash_bank','transaction_id');
$k = (int)$this->autoincrement_with_receipt_source('new_cash_bank','receipt_id',1);
$this->loadmodel('new_cash_bank');
$multipleRowData = Array( Array("transaction_id"=>$t3,"receipt_id" => $k,"receipt_date" => $TransactionDate,
"receipt_mode" => $receipt_mode, "cheque_number" =>@$cheque_number,"cheque_date" =>$cheque_date,
"drawn_on_which_bank" =>@$drawn_on_which_bank,"reference_utr" => @$reference_utr,
"deposited_bank_id" => $deposited_bank_id,"member_type" => $member_type,"party_name_id"=>$party_name,
"receipt_type" => @$receipt_type,"amount" => $amount,
"current_date" => $current_date,"society_id"=>$s_society_id,"flat_id"=>$party_name,
"narration"=>$narration,"bill_reference"=>$bill_reference,"receipt_source"=>1,
"prepaired_by" => $s_user_id,"edit_status"=>"NO","auto_inc"=>"YES","bank_branch"=>@$branch));
$this->new_cash_bank->saveAll($multipleRowData);
$receipt_arr[] = $k;

$party_name = (int)$party_name;
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> $TransactionDate, "debit" => $amount, "credit" =>null, "ledger_account_id" => 33, "ledger_sub_account_id" => $deposited_bank_id,"table_name" => "new_cash_bank","element_id" => $t3, "society_id" => $s_society_id,));
$this->ledger->saveAll($multipleRowData); 

$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> $TransactionDate, "credit" => $amount, "debit" =>null, "ledger_account_id" => 112, "ledger_sub_account_id" => $party_name,"table_name" => "new_cash_bank","element_id" => $t3,"society_id" => $s_society_id,));
$this->ledger->saveAll($multipleRowData);







}
	
$result_new_regular_bill = $this->requestAction(array('controller' => 'Incometrackers', 'action' => 'fetch_last_bill_info_via_flat_id'),array('pass'=>array($party_name)));
if(sizeof($result_new_regular_bill)==1){
foreach($result_new_regular_bill as $last_bill){
$bill_auto_id=$last_bill["auto_id"];
$bill_one_time_id=$last_bill["one_time_id"];
}
}		
		
}
$arr_rrr = implode(',',$receipt_arr);
$this->Session->write('new_bank_rrr', 1);
$output = json_encode(array('type'=>'success', 'text' => 'The Bank Receipt #'.$arr_rrr.' Generated Sucessfully'));
die($output);
}
//End bank_receipt_json//
//Start new_bank_receipt_reference_ajax//
function new_bank_receipt_reference_ajax()
{
$this->layout='blank';
	$s_role_id=$this->Session->read('role_id');
		$s_society_id = $this->Session->read('society_id');
			$s_user_id=$this->Session->read('user_id');
				$this->ath();
					$flat_id = (int)$this->request->query('flat');
						$type = (int)$this->request->query('rf');
							$this->set('type',$type);
								$this->set('flat_id',$flat_id);
}
//End new_bank_receipt_reference_ajax//
//Start petty_cash_payment_add_row//
function petty_cash_payment_add_row()
{
$this->layout='blank';
	$s_role_id=$this->Session->read('hm_role_id');
		$s_society_id = $this->Session->read('hm_society_id');
			$s_user_id=$this->Session->read('hm_user_id');
				$this->ath();
					$count = (int)$this->request->query('con');
						$this->set('count',$count);
}
//End petty_cash_payment_add_row//
//Start Fixed Deposit Bar chart //
function fixed_deposit_bar_chart()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
		$this->ath();
			$this->check_user_privilages();
				$s_society_id=(int)$this->Session->read('society_id');
					$s_user_id= (int)$this->Session->read('user_id');

$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1);
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);
}
//End Fixed Deposit Bar chart//
//Start fixed_deposit_bar_chart_ajax//
function fixed_deposit_bar_chart_ajax()
{
	$this->layout='blank';
		$s_role_id=$this->Session->read('role_id');
			$s_society_id = $this->Session->read('society_id');
				$s_user_id=$this->Session->read('user_id');
					$this->ath();
						$from = $this->request->query('date1');
							$to = $this->request->query('date2');
								$this->set('from',$from);
									$this->set('to',$to);


$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1);
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

}
//End fixed_deposit_bar_chart_ajax//
//Start matured_deposit_add //
function matured_deposit_add()
{
		if($this->RequestHandler->isAjax()){
		$this->layout='blank';
		}else{
		$this->layout='session';
		}
		
		$this->ath();
			$this->check_user_privilages();
				$s_society_id=(int)$this->Session->read('hm_society_id');
					$s_user_id= (int)$this->Session->read('hm_user_id');
	if(isset($this->request->data['sub'])){		
		$arr = array();	
			
	$this->loadmodel('fix_deposit');
	$conditions=array('society_id'=>$s_society_id,"matured_status"=>1);
	$cursor=$this->fix_deposit->find('all',array('conditions'=>$conditions));
		foreach($cursor as $dataaa){
		$receipt_id = (int)$dataaa['fix_deposit']['receipt_id'];
		$auto_id = (int)$dataaa['fix_deposit']['transaction_id'];
		$value = (int)@$this->request->data['app'.$auto_id];
	if($value == 1){
$arr[] = $receipt_id;
$this->loadmodel('fix_deposit');
$this->fix_deposit->updateAll(array('matured_status'=>2),array('transaction_id'=>$auto_id,"society_id"=>$s_society_id));
}
}
$arrrr = implode(',',$arr);

?>

<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body">
<p style="font-size:15px; font-weight:600;">Fixed Deposit Receipt <?php echo $arrrr; ?> is updated suceesfully</p>
</div>
<div class="modal-footer">
<a href="matured_deposit_add" class="btn green">OK</a>
</div>
</div>
<?php
}		

}
/////////////////////////////////// End matured_deposit_add //////////////////////////////////////////
/////////////////////////////////// Start matured_deposit_approve //////////////////////////////////////////
function matured_deposit_approve_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = $this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');

$this->ath();

$from = $this->request->query('date1');
$to = $this->request->query('date2');

$this->set('from',$from);
$this->set('to',$to);


$from = date('Y-m-d',strtotime($from));
$to = date('Y-m-d',strtotime($to));

$from = strtotime($from);
$to = strtotime($to);

$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1,'fix_deposit.maturity_date'=>array('$gte'=>$from,'$lte'=>$to));
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);


$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
foreach($cursor2 as $dataa)
{
$society_name = $dataa['society']['society_name'];
}
$this->set('society_name',$society_name);
}
/////////////////////////////////// End matured_deposit_approve //////////////////////////////////////////
//////////////////////////// Start matured_deposit_excel /////////////////////////////////////////////////// 
function matured_deposit_excel()
{
$this->layout="";
$this->ath();

$s_society_id = (int)$this->Session->read('society_id');
$s_role_id= (int)$this->Session->read('role_id');
$s_user_id= (int)$this->Session->read('user_id');

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor=$this->society->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection)
{
$society_name = $collection['society']['society_name'];
}

$currr_dateee = date('d-M-Y');

$socc_namm = str_replace(' ', '_', $society_name);

$filename="".$socc_namm."Matured_Fixed_Deposits";

//$filename="Fix Deposit Excel";
header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );

$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id = (int)$this->Session->read('user_id');	



$excel="<table border='1'>
<tr>
<th colspan='9' style='text-align:center;'>$society_name Fixed Deposit Register $currr_dateee</th>
</tr>
<tr>
<th>Deposit ID</th>
<th>Bank name</th>
<th>Bank Branch</th>
<th>Account Reference</th>
<th>Start Date</th>
<th>Maturity Date</th>
<th>Interest Rate</th>
<th>Principal Amount</th>
<th>Purpose</th>
</tr>";

$tt_amt = 0;
$this->loadmodel('fix_deposit');
$order=array('fix_deposit.start_date'=>'ASC');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>2);
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions,'order'=>$order));
foreach($cursor1 as $data)
{
$receipt_id = $data['fix_deposit']['receipt_id'];
$start_date = $data['fix_deposit']['start_date'];	
$bank_name = $data['fix_deposit']['bank_name'];	
$branch = $data['fix_deposit']['bank_branch'];	
$rate = $data['fix_deposit']['interest_rate'];	
$mat_date = $data['fix_deposit']['maturity_date'];	
$remarks = $data['fix_deposit']['purpose'];		
$reference = $data['fix_deposit']['account_reference'];		
$amt = $data['fix_deposit']['principal_amount'];
$file_name = $data['fix_deposit']['file_name'];
@$renewal = @$data['fix_deposit']['renewal'];

$start_date	= date('d-m-Y',($start_date));	
$mat_date	= date('d-m-Y',($mat_date));
if($renewal != 'y')
{
	$tt_amt = $tt_amt + $amt;
$excel.="<tr>
<td>$receipt_id</td>
<td>$bank_name</td>
<td>$branch</td>
<td>$reference</td>
<td>$start_date</td>
<td>$mat_date</td>
<td>$rate</td>
<td>$amt</td>
<td>$remarks</td>
</tr>";
}}
$excel.="<tr><td colspan='7' style='text-align:right;'><b>Total</b></td>
            <td><b>$tt_amt</b></td>
            <td></td></tr>
</table>";	

echo $excel;
}
//////////////////////////// End matured_deposit_excel /////////////////////////////////////////////////// 
/////////////////////////////// Start bar_chart_pdf ///////////////////////////////////////////////////////// 
function bar_chart_pdf()
{
$this->layout = 'pdf'; //this will use the pdf.ctp layout 
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');	

$this->ath();

$from = $this->request->query('date1');
$to = $this->request->query('date2');

$this->set('from',$from);
$this->set('to',$to);


$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1);
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);
}
//End bar_chart_pdf//
//Start active_deposit_edit//
function active_deposit_edit()
{
$this->layout = 'session'; 
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = (int)$this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');	

$this->ath();

$receipt_id = (int)$this->request->query('rccidd');

$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1,"transaction_id"=>$receipt_id);
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('reference');
$conditions=array("auto_id"=>6);
$rfff=$this->reference->find('all',array('conditions'=>$conditions));
foreach($rfff as $dddtttt)
{
$kendo_array = @$dddtttt['reference']['reference'];			
}
if(!empty($kendo_array))
{
$kendo_implode = implode(",",$kendo_array);
}
$this->set('kendo_implode',@$kendo_implode);

$this->loadmodel('reference');
$conditions=array("auto_id"=>7);
$rfff2=$this->reference->find('all',array('conditions'=>$conditions));
foreach($rfff2 as $dddtttt2)
{
$kendo_array2 = @$dddtttt2['reference']['reference'];			
}
if(!empty($kendo_array2))
{
$kendo_implode2 = implode(",",$kendo_array2);
}
$this->set('kendo_implode2',@$kendo_implode2);








if(isset($this->request->data['subbb']))
{
$bank_name = $this->request->data['bank_name'];
$branch = $this->request->data['branch'];
$reference = $this->request->data['reference'];
$amount = $this->request->data['amount'];
$start_date = $this->request->data['start_date'];
$maturity_date = $this->request->data['maturity_date'];
$rate = $this->request->data['rate'];
$remarks = $this->request->data['purpose'];
$receipt_iddd = (int)$this->request->data['rriddd'];
$current_date = date('Y-m-d');
$file_name=@$_FILES["file2"]["name"];
$transaction_id = (int)$this->request->data['ttrcidd'];

$start_date = date('Y-m-d',strtotime($start_date));
$maturity_date = date('Y-m-d',strtotime($maturity_date));

$target = "fix_deposit/";
$target = $target . basename($_FILES['file2']['name']);
move_uploaded_file($_FILES['file2']['tmp_name'], $target);

$this->loadmodel('fix_deposit');
$this->fix_deposit->updateAll(array("bank_name" =>$bank_name,"bank_branch"=>$branch,
"account_reference"=>$reference, "principal_amount"=>$amount,"start_date"=>strtotime($start_date),
"maturity_date"=>strtotime($maturity_date),"interest_rate"=>$rate,"purpose"=>$remarks,
"society_id"=>$s_society_id,"file_name"=>$file_name),array("transaction_id" => $transaction_id));

$this->Session->write('fix_deposit_edit',1);
$this->redirect(array('controller' => 'Cashbanks','action'=>'fix_deposit_view'));

}
}
//End active_deposit_edit//
//Start renewal_fixed_deposit//
function renewal_fixed_deposit()
{
$this->layout = 'session'; 
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = (int)$this->Session->read('hm_society_id');
$s_user_id=(int)$this->Session->read('hm_user_id');	
$this->ath();
$receipt_id = (int)$this->request->query('nn');
$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1,"transaction_id"=>$receipt_id);
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);
if(isset($this->request->data['subbb']))
{
$amount = $this->request->data['amount'];
$start_date = $this->request->data['start_date'];
$maturity_date = $this->request->data['maturity_date'];
$rate = $this->request->data['rate'];
$remarks = @$this->request->data['purpose'];
$receipt_iddddd = (int)$this->request->data['rriddd'];
$file_name=@$_FILES["file2"]["name"];
$target = "fix_deposit/";
$target = $target . basename($_FILES['file2']['name']);
move_uploaded_file($_FILES['file2']['tmp_name'], $target);
$current_date = date('Y-m-d');
$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>1,"transaction_id"=>$receipt_iddddd);
$cursor=$this->fix_deposit->find('all',array('conditions'=>$conditions));
foreach($cursor as $dataaa)
{
$bank_name = $dataaa['fix_deposit']['bank_name'];
$branch = $dataaa['fix_deposit']['bank_branch'];
$reference = $dataaa['fix_deposit']['account_reference'];
$receipt_idddd = $dataaa['fix_deposit']['receipt_id'];
@$renewal_id = (int)@$dataaa['fix_deposit']['renewal_id'];
}
$renewal_id++;
if($renewal_id == 2)
{
$rrrcccidd = explode('/',$receipt_idddd);
$rrrrddd = $rrrcccidd[0];
}
else
{
$rrrrddd = $receipt_idddd; 
}
$rrrrr_idddd = $rrrrddd."/".$renewal_id;

$this->loadmodel('fix_deposit');
$this->fix_deposit->updateAll(array('matured_status'=>2,"renewal"=>"y"),array('transaction_id'=>$receipt_iddddd,"society_id"=>$s_society_id));

$l=$this->autoincrement('fix_deposit','transaction_id');
$this->loadmodel('fix_deposit');
$multipleRowData = Array( Array("transaction_id" => $l,"receipt_id"=>$rrrrr_idddd,"bank_name"=>$bank_name,
"bank_branch"=>$branch,"account_reference"=>$reference,"principal_amount"=>$amount,
"start_date"=>strtotime($start_date),"maturity_date"=>strtotime($maturity_date),"interest_rate"=>$rate,
"purpose"=>$remarks,"file_name"=>$file_name,"society_id" => $s_society_id,"matured_status"=>1,
"auto_inc"=>"NO","renewal_id"=>$renewal_id,"prepaired_by"=>$s_user_id,"current_date"=>$current_date));
$this->fix_deposit->saveAll($multipleRowData);

$this->Session->write('fix_deposit_renew',1);
$this->redirect(array('controller' => 'Cashbanks','action'=>'fix_deposit_view'));
}
}
//End renewal_fixed_deposit//
//Start petty_cash_receipt_add_row//
function petty_cash_receipt_add_row()
{
$this->layout = 'blank'; 
$s_role_id = $this->Session->read('hm_role_id');
$s_society_id = (int)$this->Session->read('hm_society_id');
$s_user_id = $this->Session->read('hm_user_id');	
$this->ath();
$count = (int)$this->request->query('con');
$this->set('count',$count);
}
//End petty_cash_receipt_add_row//
//Start fixed_deposit_add_row//
function fixed_deposit_add_row()
{
$this->layout = 'blank'; 
$s_role_id = $this->Session->read('hm_role_id');
$s_society_id = (int)$this->Session->read('hm_society_id');
$s_user_id = $this->Session->read('hm_user_id');	
$this->ath();

$count = (int)$this->request->query('con');
$this->set('count',$count);


$this->loadmodel('reference');
$conditions=array("auto_id"=>6);
$rfff=$this->reference->find('all',array('conditions'=>$conditions));
foreach($rfff as $dddtttt)
{
$kendo_array = @$dddtttt['reference']['reference'];			
}
if(!empty($kendo_array))
{
@$kendo_implode = implode(",",$kendo_array);
}
$this->set('kendo_implode',@$kendo_implode);


$this->loadmodel('reference');
$conditions=array("auto_id"=>7);
$rfff2=$this->reference->find('all',array('conditions'=>$conditions));
foreach($rfff2 as $dddtttt2)
{
$kendo_array2 = @$dddtttt2['reference']['reference'];			
}
if(!empty($kendo_array2))
{
@$kendo_implode2 = implode(",",$kendo_array2);
}
$this->set('kendo_implode2',@$kendo_implode2);

}
//End fixed_deposit_add_row//
//Start new_bank_receipt_add_row//
function new_bank_receipt_add_row()
{
$this->layout = 'blank'; 
$s_role_id = $this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id = $this->Session->read('user_id');	

$this->ath();

$count = (int)$this->request->query('con');
$this->set('count',$count);

$this->loadmodel('ledger_sub_account');
$conditions=array("society_id" => $s_society_id, "ledger_id" => 34,"deactive"=>0);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);
foreach($cursor1 as $collection)
{
$user_id = (int)@$collection['ledger_sub_account']['user_id'];
$this->loadmodel('user');
$conditions=array("user_id" => $user_id);
$cursor2=$this->user->find('all',array('conditions'=>$conditions));
$this->set('cursor',$cursor2);
}
		
$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 33,"society_id"=>$s_society_id);
$cursor3=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor3',$cursor3);

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 112,"society_id"=>$s_society_id);
$cursor4=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor4',$cursor4);

$this->loadmodel('reference');
$conditions=array("auto_id"=>6);
$rfff=$this->reference->find('all',array('conditions'=>$conditions));
foreach($rfff as $dddtttt)
{
$kendo_array = @$dddtttt['reference']['reference'];			
}
if(!empty($kendo_array))
{
@$kendo_implode = implode(",",$kendo_array);
}
$this->set('kendo_implode',@$kendo_implode);


$this->loadmodel('reference');
$conditions=array("auto_id"=>7);
$rfff2=$this->reference->find('all',array('conditions'=>$conditions));
foreach($rfff2 as $dddtttt2)
{
$kendo_array2 = @$dddtttt2['reference']['reference'];			
}
if(!empty($kendo_array2))
{
@$kendo_implode2 = implode(",",$kendo_array2);
}
$this->set('kendo_implode2',@$kendo_implode2);

}
//End new_bank_receipt_add_row//
//Start bill_show_ajax//
function bill_show_ajax()
{
$this->layout = 'blank'; 
$s_role_id = $this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id = $this->Session->read('user_id');	

$this->ath();	
	
$flat_id = (int)$this->request->query('ff');	
$this->set('flat_id',$flat_id);	

}
//End bill_show_ajax//
//Start non_member_add_ajax//
function non_member_add_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');	
	
$this->ath();	
$kkk = (int)$this->request->query('kk');
$type = (int)$this->request->query('typ');
$this->set('type',$type);
$this->set('kkk',$kkk);

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 112,"society_id"=>$s_society_id);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 34,"society_id"=>$s_society_id);
$cursor2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);


}

//End non_member_add_ajax//
//Start bank_receipt_member_add_ajax//
function bank_receipt_member_add_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');	
	
$this->ath();
$kkk = (int)$this->request->query('kk');
$this->set('kkk',$kkk);
$member_name = $this->request->query('nammm');
$hhh = (int)$this->request->query('hh');

if($hhh == 1)
{
$auto_id=(int)$this->autoincrement('ledger_sub_account','auto_id');
$this->loadmodel('ledger_sub_account');
$multipleRowData = Array( Array("auto_id"=>$auto_id,"ledger_id"=>112,"name"=>$member_name,"delete_id"=>0,
"society_id"=>$s_society_id));
$this->ledger_sub_account->saveAll($multipleRowData);
}
	
	
$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 112,"society_id"=>$s_society_id);
$cursor1=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);

}
//End bank_receipt_member_add_ajax//
//Start bank_receipt_type_ajax//
function bank_receipt_type_ajax()
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('society_id');
$s_user_id=$this->Session->read('user_id');	
	
$this->ath();	

$kkk = (int)$this->request->query('kk');
$type = (int)$this->request->query('typ');
$this->set('type',$type);
$this->set('kkk',$kkk);	
}
// End bank_receipt_type_ajax //
//Start fixed_deposit_renewal_show//
function fixed_deposit_renewal_show()
{
if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = (int)$this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');	

$this->ath();		
$this->check_user_privilages();

$this->loadmodel('society');
$conditions=array('society_id'=>$s_society_id);
$cursor=$this->society->find('all',array('conditions'=>$conditions));
foreach($cursor as $data)
{
$society_name = $data['society']['society_name'];	
}
$this->set('society_name',$society_name);






	
$this->loadmodel('fix_deposit');
$conditions=array('society_id'=>$s_society_id,"matured_status"=>2,"renewal"=>"y");
$cursor1=$this->fix_deposit->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);
	
}
//End fixed_deposit_renewal_show//
//Start bank_receipt_approve//
function bank_receipt_approve($rrr=null)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = (int)$this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');	

$approved_date = date('d-m-Y');
$this->set('s_role_id',$s_role_id);
$this->ath();		
$this->check_user_privilages();	
$this->seen_notification(28,$rrr);
$auto_id22 = (int)$this->request->query('aa');

if(!empty($auto_id22))
{

$this->loadmodel('my_flat_receipt_update');
$conditions=array('society_id'=>$s_society_id,"approval_id"=>1,"auto_id"=>$auto_id22);
$cursor=$this->my_flat_receipt_update->find('all',array('conditions'=>$conditions));
foreach($cursor as $data)
{
$transaction_date = $data['my_flat_receipt_update']['receipt_date'];
$transaction_date = date('Y-m-d',strtotime($transaction_date));
$transaction_date = strtotime($transaction_date);
$mode = $data['my_flat_receipt_update']['receipt_mode'];
if($mode == "Cheque" || $mode == "cheque")
{
  $cheque_number = @$data['my_flat_receipt_update']['cheque_number'];
  $cheque_date = @$data['my_flat_receipt_update']['cheque_date'];
  $drawn_bank_name = @$data['my_flat_receipt_update']['drawn_on_which_bank'];
  $branch = @$data['my_flat_receipt_update']['bank_branch'];
}
else
{
 $utr_ref = @$data['my_flat_receipt_update']['reference_utr'];
 $cheque_date = @$data['my_flat_receipt_update']['date'];
}
$amount = $data['my_flat_receipt_update']['amount'];
$narration = $data['my_flat_receipt_update']['narration'];	
$deposited_bank_id = (int)$data['my_flat_receipt_update']['deposited_bank_id'];
$party_name_id = (int)$data['my_flat_receipt_update']['party_name_id'];
$current_date = $data['my_flat_receipt_update']['current_date'];
$prepaired_by = $data['my_flat_receipt_update']['prepaired_by'];
}

/////////////////// Bill Code//////
 
	 $result_new_regular_bill = $this->requestAction(array('controller' => 'Incometrackers', 'action' => 'fetch_last_bill_info_via_flat_id'),array('pass'=>array($party_name_id)));
	
	 $auto_id=null; $regular_bill_one_time_id=null;
	if(sizeof($result_new_regular_bill)>0){
		foreach($result_new_regular_bill as $data){
	$auto_id=$data["auto_id"];  
	$edit_status=$data["edit_status"]; 
	$latest_bill=@$data["latest_bill"]; 
	$receipt_applied=@$data["receipt_applied"]; 
	$regular_bill_one_time_id = (int)$data["one_time_id"];
	$flat_id = (int)$data["flat_id"];
	if($edit_status=="NO" && $latest_bill=="YES"){
			if(empty($receipt_applied)){
				$arrear_intrest=$data["arrear_intrest"];
				$intrest_on_arrears=$data["intrest_on_arrears"];
				$total=$data["total"];
				$arrear_maintenance=$data["arrear_maintenance"];
			}else{
				$arrear_intrest=$data["new_arrear_intrest"];
				$intrest_on_arrears=$data["new_intrest_on_arrears"];
				$total=$data["new_total"];
				$arrear_maintenance=$data["new_arrear_maintenance"];
			}
	}else{
		$number_of_receipt=$this->count_receipt_against_bill($regular_bill_one_time_id,$flat_id);
		if($number_of_receipt==0){
			$arrear_intrest=$data["arrear_intrest"];
			$intrest_on_arrears=$data["intrest_on_arrears"];
			$total=$data["total"];
			$arrear_maintenance=$data["arrear_maintenance"]; 
		}else{
			$arrear_intrest=$data["new_arrear_intrest"];
			$intrest_on_arrears=$data["new_intrest_on_arrears"];
			$total=$data["new_total"];
			$arrear_maintenance=$data["new_arrear_maintenance"];
		}
	}
	
	
	
	
	}
    	$amount_after_arrear_intrest=$amount-$arrear_intrest;
		if($amount_after_arrear_intrest<0)
		{
		$new_arrear_intrest=abs($amount_after_arrear_intrest);
		$new_intrest_on_arrears=$intrest_on_arrears;
		$new_arrear_maintenance=$arrear_maintenance;
		$new_total=$total;
		}
		else
		{
		$new_arrear_intrest=0;
		$amount_after_intrest_on_arrears=$amount_after_arrear_intrest-$intrest_on_arrears;
			if($amount_after_intrest_on_arrears<0)
			{
			$new_intrest_on_arrears=abs($amount_after_intrest_on_arrears);
			$new_arrear_maintenance=$arrear_maintenance;
			$new_total=$total;
			}
			else
			{
			$new_intrest_on_arrears=0;
			$amount_after_arrear_maintenance=$amount_after_intrest_on_arrears-$arrear_maintenance;
				if($amount_after_arrear_maintenance<0){
				$new_arrear_maintenance=abs($amount_after_arrear_maintenance);
				$new_total=$total;
				}else{
				$new_arrear_maintenance=0;
				$amount_after_total=$amount_after_arrear_maintenance-$total; 
				if($amount_after_total>0){
				$new_total=0;
				$new_arrear_maintenance=-$amount_after_total;
				}else{
							$new_total=abs($amount_after_total);
							
					}
				}
			}
		}
			
		$this->loadmodel('new_regular_bill');
		$this->new_regular_bill->updateAll(array('new_arrear_intrest'=>$new_arrear_intrest,"new_intrest_on_arrears"=>$new_intrest_on_arrears,"new_arrear_maintenance"=>$new_arrear_maintenance,"new_total"=>$new_total),array('auto_id'=>$auto_id));
	}
/////////////////////////////










	
$t1=$this->autoincrement('new_cash_bank','transaction_id');
$k = (int)$this->autoincrement_with_receipt_source('new_cash_bank','receipt_id',1); 
$this->loadmodel('new_cash_bank');
$multipleRowData = Array( Array("transaction_id"=> $t1,"receipt_id" => $k, 
"receipt_date" => $transaction_date, "receipt_mode" => $mode, 
"cheque_number" =>@$cheque_number,"cheque_date" =>@$cheque_date,
"drawn_on_which_bank" =>@$drawn_bank_name,"reference_utr" => @$utr_ref,
"deposited_bank_id" => $deposited_bank_id,"member_type" => 1,
"party_name_id"=>$party_name_id,"receipt_type" => 1,"amount" => $amount,
"current_date" => $current_date,"society_id"=>$s_society_id,"flat_id"=>$party_name_id,
"bill_auto_id"=>$auto_id,"bill_one_time_id"=>@$regular_bill_one_time_id,"narration"=>$narration,
"receipt_source"=>1,"edit_status"=>"NO","auto_inc"=>"YES","prepaired_by" => $prepaired_by,"bank_branch"=>@$branch,"approved_by"=>$s_user_id,"approved_date"=>$approved_date,"is_cancel"=>"NO"));
$this->new_cash_bank->saveAll($multipleRowData);

	
	
$result_flat_info=$this->requestAction(array('controller' => 'Hms', 'action' => 'ledger_SubAccount_dattta_by_flat_id'),array('pass'=>array($party_name_id)));
foreach($result_flat_info as $flat_info){
$account_id = (int)$flat_info["ledger_sub_account"]["auto_id"];
}


$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> $transaction_date, "debit" => $amount, "credit" =>null,"ledger_account_id" => 33, "ledger_sub_account_id" => $deposited_bank_id, "table_name" => "new_cash_bank","element_id" => $t1, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 

$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l, "transaction_date"=> $transaction_date, "credit" => $amount, "debit" =>null,"ledger_account_id" => 34, "ledger_sub_account_id" => $account_id,"table_name" => "new_cash_bank","element_id" => $t1, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData);

//////////////Email Sms///////////////////

$this->loadmodel('new_cash_bank');
$conditions=array("receipt_id" => $k,"receipt_source"=>1,"society_id"=>$s_society_id);
$cursor=$this->new_cash_bank->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection)
{
$receipt_no = (int)$collection['new_cash_bank']['receipt_id'];
$d_date = $collection['new_cash_bank']['receipt_date'];
$today = date("d-M-Y");
$flat_id = $collection['new_cash_bank']['party_name_id'];
$amount = $collection['new_cash_bank']['amount'];
$society_id = (int)$collection['new_cash_bank']['society_id'];
$bill_reference = $collection['new_cash_bank']['reference_utr'];
$narration = $collection['new_cash_bank']['narration'];
$member = (int)$collection['new_cash_bank']['member_type'];
$receiver_name = @$collection['new_cash_bank']['receiver_name'];
$receipt_mode = $collection['new_cash_bank']['receipt_mode'];
$cheque_number = @$collection['new_cash_bank']['cheque_number'];
$which_bank = @$collection['new_cash_bank']['drawn_on_which_bank'];
$reference_number = @$collection['new_cash_bank']['reference_number'];
$cheque_date = @$collection['new_cash_bank']['cheque_date'];
$sub_account = (int)$collection['new_cash_bank']['deposited_bank_id'];
$sms_date=date("d-m-Y",($d_date));

$amount = str_replace( ',', '', $amount );
$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));

$this->loadmodel('society');
$conditions=array("society_id" => $s_society_id);
$cursor2=$this->society->find('all',array('conditions'=>$conditions));
foreach ($cursor2 as $collection) 
{
$society_name = $collection['society']['society_name'];
$society_reg_no = $collection['society']['society_reg_num'];
$society_address = $collection['society']['society_address'];
$sig_title = $collection['society']['sig_title'];
}
if($member == 2)
{
$user_name = $receiver_name;
$wing_flat = "";
}
else
{
$flatt_datta = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_wing_id_via_flat_id'),array('pass'=>array($flat_id)));
foreach ($flatt_datta as $fltt_datttaa) 
{
$wnngg_idddd = (int)$fltt_datttaa['flat']['wing_id'];
}

$result_lsa = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_user_info_via_flat_id'),array('pass'=>array($wnngg_idddd,$flat_id)));
foreach ($result_lsa as $collection) 
{
$wing_id = $collection['user']['wing'];  
$flat_id = (int)$collection['user']['flat'];
$tenant = (int)$collection['user']['tenant'];
$user_name = $collection['user']['user_name'];
$to_mobile = $collection['user']['mobile'];
$to_email = $collection['user']['email'];
}
$wing_flat = $this->requestAction(array('controller' => 'hms', 'action'=>'wing_flat'),array('pass'=>array($wing_id,$flat_id)));									
}  
$result2 = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($sub_account))); 
foreach($result2 as $collection)
{
$bank_name = $collection['ledger_sub_account']['name'];
}
                                    
$ip=$this->hms_email_ip();
$date=date("d-m-Y",($d_date));

$html_receipt='<table style="padding:24px;background-color:#34495e" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
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
									<td style="padding:0px 0 2px 5px" colspan="2">Receipt No: '.$receipt_no.'</td>
									
									<td colspan="2" align="right" style="padding:0px 5px 0 0px"><b>Date:</b> '.$date.' </td>
									
								</tr>
								<tr>
									<td style="padding:0px 0 2px 5px" colspan="2"> Received with thanks from: <b>'.$user_name.' '.$wing_flat.'</b></td>
																		
								</tr>
								<tr>
									<td style="padding:0px 0 2px 5px"  colspan="4">Rupees '.$am_in_words.' Only </td>
									
								</tr>';
								
							if($receipt_mode=="Cheque"){
							$receipt_mode_type='Via '.$receipt_mode.'-'.$cheque_number.' drawn on '.$which_bank.' dated '.$cheque_date;
							}
							else{
							$receipt_mode_type='Via '.$receipt_mode.'-'.$reference_number.' dated '.$cheque_date;
							}

								
								$html_receipt.='<tr>
									<td style="padding:0px 0 2px 5px"  colspan="4">'.$receipt_mode_type.'</td>
									
								</tr>
								
								<tr>
									<td style="padding:0px 0 2px 5px" colspan="4">Payment of previous bill</td>
									
								</tr>
								
							</tbody></table>
							
							
							
							<table style="font-size:12px;" width="100%" cellspacing="0">
								<tbody><tr>
									<td width="50%" style="padding:5px" valign="top">
									<span style="font-size:16px;"> <b>Rs '.$amount.'</b></span><br>';
									if($receipt_mode=="Cheque"){
									$receipt_title_cheq='Subject to realization of Cheque(s)';
									}
																		
									$html_receipt.='<span>'.@$receipt_title_cheq.'</span></td>
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
                                        <td align="right" style="font-size: 10px;"><b>Phone :</b></td>
                                        <td width="84" style="color:#fff!important;text-decoration:none;font-size:10px;"><b>022-41235568</b></td>
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
////////////////my Email//////////////
}


/////////////////////////////////////////////////////////////////////////////
$this->loadmodel('society');
$condition=array('society_id'=>$s_society_id);
$result_society=$this->society->find('all',array('conditions'=>$condition)); 
$this->set('result_society',$result_society);
foreach($result_society as $data_society){
	$society_name=$data_society["society"]["society_name"];
	$email_is_on_off=(int)@$data_society["society"]["account_email"];
	$sms_is_on_off=(int)@$data_society["society"]["account_sms"];
   }
//////////////////////////////////////////////////////////////////////////


if($email_is_on_off==1){
////email code//
$r_sms=$this->hms_sms_ip();
$working_key=$r_sms->working_key;
$sms_sender=$r_sms->sms_sender; 
$sms_allow=(int)$r_sms->sms_allow;

$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".date('d-M-Y',$d_date)." against Unit ".$wing_flat."";
//$subject = "[".$society_name."]- Receipt,"date('d-M-Y',$d_date).""; 

$this->send_email($to_email,'accounts@housingmatters.in','HousingMatters',$subject,$html_receipt,'donotreply@housingmatters.in');

}

if($sms_is_on_off==1){
	if($sms_allow==1){

	
$r_sms=$this->hms_sms_ip();
$working_key=$r_sms->working_key;
$sms_sender=$r_sms->sms_sender; 
$sms_allow=(int)$r_sms->sms_allow;
$user_name_short=$this->check_charecter_name($user_name);
$sms="Dear ".$user_name_short." ,we have received Rs ".$amount." on ".$sms_date." towards Society Maint. dues. Cheques are subject to realization,".$society_name;
$sms1=str_replace(' ', '+', $sms);

$payload = file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$to_mobile.'&message='.$sms1.''); 
}
}



$this->loadmodel('my_flat_receipt_update');
$this->my_flat_receipt_update->updateAll(array("approval_id"=>2),array('society_id'=>$s_society_id,"approval_id"=>1,"auto_id"=>$auto_id22));

?>	

<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body">
<h4><b>Thank You!</b></h4>
<p>The Receipt Approved Successfully</p>
</div>
<div class="modal-footer">
<a href="bank_receipt_approve" class="btn red">OK</a>
</div>
</div>


<?php	
}

$this->loadmodel('temp_cash_bank');
$conditions=array('society_id'=>$s_society_id);
$result_temp_cash_bank=$this->temp_cash_bank->find('all',array('conditions'=>$conditions));
$this->set('result_temp_cash_bank',$result_temp_cash_bank);

}
//End bank_receipt_approve//
//Start aprrove_bank_receipt_update//
function aprrove_bank_receipt_update()
{
if($this->RequestHandler->isAjax()){
$this->layout='blank';
}else{
$this->layout='session';
}
$s_role_id=$this->Session->read('hm_role_id');
$s_society_id = (int)$this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');		
	
$transaction_id = (int)$this->request->query('bb');	

$this->loadmodel('temp_cash_bank');
$conditions=array('society_id'=>$s_society_id,"auto_id"=>$transaction_id);
$cursor1=$this->temp_cash_bank->find('all',array('conditions'=>$conditions));
$this->set('cursor1',$cursor1);	

$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 34,"society_id"=>$s_society_id,"deactive"=>0);
$ledger_sub_account_data = $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('ledger_sub_account_data',$ledger_sub_account_data);	


$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id" => 33,"society_id"=>$s_society_id);
$bank_detail=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('bank_detail',$bank_detail);


$this->loadmodel('ledger_sub_account');
	$condition=array('society_id'=>$s_society_id,'ledger_id'=>34);
	$members=$this->ledger_sub_account->find('all',array('conditions'=>$condition));
	foreach($members as $data3){
	$ledger_sub_account_ids[]=$data3["ledger_sub_account"]["auto_id"];
	}
 $this->loadmodel('wing');
        $condition=array('society_id'=>$s_society_id);
        $order=array('wing.wing_name'=>'ASC');
        $wings=$this->wing->find('all',array('conditions'=>$condition,'order'=>$order));
        foreach($wings as $data){
			$wing_id=$data["wing"]["wing_id"];
			$this->loadmodel('flat');
			$condition=array('society_id'=>$s_society_id,'wing_id'=>$wing_id);
			$order=array('flat.flat_name'=>'ASC');
			$flats=$this->flat->find('all',array('conditions'=>$condition,'order'=>$order));
			foreach($flats as $data2){
				$flat_id=$data2["flat"]["flat_id"];
				$ledger_sub_account_id = $this->requestAction(array('controller' => 'Fns', 'action' => 'ledger_sub_account_id_via_wing_id_and_flat_id'),array('pass'=>array($wing_id,$flat_id)));
				if(!empty($ledger_sub_account_id)){
					if (in_array($ledger_sub_account_id, $ledger_sub_account_ids)){
						$members_for_billing[]=$ledger_sub_account_id;
					}
				}
			}
		}
		$this->set(compact("members_for_billing"));

}
//End aprrove_bank_receipt_update//
//Start approve_receipt_update_json//
function approve_receipt_update_json()
{
$this->layout=null;
$this->ath();
$s_society_id=$this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');
$date=date('d-m-Y');
$time = date(' h:i a', time());

$q=$this->request->query('q');
$q = html_entity_decode($q);
$myArray = json_decode($q, true);

$c = 0;
foreach($myArray as $child)
{	

	if(empty($child[0])){
	$output = json_encode(array('type'=>'error', 'text' => 'Please Select transaction date'));
	die($output);
	}	
	
	
 $TransactionDate = $child[0];
		$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				$from1 = date('Y-m-d',$from->sec);
				$to1 = date('Y-m-d',$to->sec);
				$from2 = strtotime($from1);
				$to2 = strtotime($to1);
				$transaction1 = date('Y-m-d',strtotime($TransactionDate));
				$transaction2 = strtotime($transaction1);
					if($transaction2 <= $to2 && $transaction2 >= $from2){
					$abc = 5;
					break;
					}	
		}
	if($abc == 555){
		$output=json_encode(array('type'=>'error','text'=>'Transaction date is not in open Financial Year '));
		die($output);
	}	

if(empty($child[10]))
{
$output = json_encode(array('type'=>'error', 'text' => 'Please Select Deposited In '));
die($output);
}





	
if(empty($child[1]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Please Select Receipt Mode '));
		die($output);
		}

if($child[1] == "Cheque")
{		
	if(empty($child[2]))
	{
	$output = json_encode(array('type'=>'error', 'text' => 'Please Fill Cheque Number '));
	die($output);
	}
	
	if(is_numeric($child[2]))
	{
	}	
	else
	{
	$output = json_encode(array('type'=>'error', 'text' => 'Please Fill Numeric Cheque Number '));
	die($output);
	}
	
	if(empty($child[3]))
	{
	$output = json_encode(array('type'=>'error', 'text' => 'Please Select Cheque Date '));
	die($output);
	}
		
		if(empty($child[4]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Please Fill Drawn in which Bank '));
		die($output);
		}
		
	if(empty($child[5]))
	{
	$output = json_encode(array('type'=>'error', 'text' => 'Please Fill Baranch of Bank '));
	die($output);
	}
	
}	
else
{
        if(empty($child[7]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Please Fill Reference/Utr '));
		die($output);
		}		
		
		if(empty($child[6]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Please Select Date '));
		die($output);
		}

}	
        if(empty($child[11]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Please Select Resident'));
		die($output);
		}
		
        if(empty($child[8]))
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Please Fill Amount '));
		die($output);
		}

		if(is_numeric($child[8]))
		{
		}
		else
		{
		$output = json_encode(array('type'=>'error', 'text' => 'Please Fill Numeric Amount '));
		die($output);
		}	
	
	
	
}

foreach($myArray as $child)
{	
$transaction_date = $child[0];
$mode = $child[1];

if($mode == "Cheque" || $mode == "cheque")
{
$cheque_number = $child[2];
$cheque_date = $child[3];
$drawn_bank_name = $child[4];
$branch = $child[5];
}
else
{
$utr_ref = $child[7];
$cheque_date = $child[6];
}
$amount = $child[8];
$narration = $child[9];
$bank_id = (int)$child[10];
$ledger_sub_account_id = (int)$child[11];
$transaction_id = (int)$child[12];
$current_date = date('d-m-Y');

$l=$this->autoincrement('temp_cash_bank','auto_id');
$this->loadmodel('temp_cash_bank');
$multipleRowData = Array( Array("auto_id"=> $l,"receipt_date" => $transaction_date,"receipt_mode" => $mode,"cheque_number" =>@$cheque_number,"cheque_date" =>@$cheque_date,"drawn_on_which_bank" =>@$drawn_bank_name,"reference_utr" => @$utr_ref,"deposited_bank_id"=>$bank_id,"member_type"=>"residential","ledger_sub_account_id"=>$ledger_sub_account_id,"receipt_type"=>"maintenance","amount"=>$amount,
"current_date"=>$current_date,"society_id"=>$s_society_id,"narration"=>$narration,"prepaired_by"=>$s_user_id,"bank_branch"=>@$branch));
$this->temp_cash_bank->saveAll($multipleRowData);
}  


$output = json_encode(array('type'=>'success', 'text' => 'Please Fill Numeric Amount '));
die($output);	
}
//End approve_receipt_update_json//
//Start approve_bank_receipt_ajax//
function approve_bank_receipt_ajax($temp_cash_bank_id=null)
{
$this->layout='blank';
$s_role_id=$this->Session->read('role_id');
$s_society_id = (int)$this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');	

$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip')); 
			$this->loadmodel('society');
			$conditions=array("society_id" => $s_society_id);
			$cursor2=$this->society->find('all',array('conditions'=>$conditions));
			foreach ($cursor2 as $collection){
					$society_name = $collection['society']['society_name'];
					$society_reg_no = @$collection['society']['society_reg_num'];
					$society_address = @$collection['society']['society_address'];
					$sig_title = @$collection['society']['sig_title'];
					$email_is_on_off=(int)@$collection["society"]["account_email"];
					$sms_is_on_off=(int)@$collection["society"]["account_sms"];
			}







$this->loadmodel('temp_cash_bank');
$conditions=array("auto_id"=>(int)$temp_cash_bank_id,"society_id"=>$s_society_id);
$temp_cash_bank_datas=$this->temp_cash_bank->find('all',array('conditions'=>$conditions));
foreach($temp_cash_bank_datas as $data){
	$transaction_date=$data['temp_cash_bank']['receipt_date'];
	$transaction_date=date("Y-m-d",strtotime($transaction_date));
	$deposited_in=(int)$data['temp_cash_bank']['deposited_bank_id'];
	$receipt_mode=$data['temp_cash_bank']['receipt_mode'];
	$cheque_number=@$data['temp_cash_bank']['cheque_number'];
	$date=@$data['temp_cash_bank']['cheque_date'];
	$drown_in_which_bank=@$data['temp_cash_bank']['drawn_on_which_bank'];
	$branch_of_bank=@$data['temp_cash_bank']['bank_branch'];
	$received_from=$data['temp_cash_bank']['member_type'];
	$ledger_sub_account_id=(int)$data['temp_cash_bank']['ledger_sub_account_id'];
	$receipt_type=$data['temp_cash_bank']['receipt_type'];
	$amount=$data['temp_cash_bank']['amount'];
	$narration=$data['temp_cash_bank']['narration'];
	@$cheque_date=@$date;
	

if($receipt_type=="maintenance"){
					$this->loadmodel('cash_bank');
					$auto_id=$this->autoincrement('cash_bank','auto_id');
					$receipt_number=$this->autoincrement_with_society_ticket('cash_bank','receipt_number');
					$this->cash_bank->saveAll(Array( Array("auto_id" => $auto_id,"transaction_date" => strtotime($transaction_date),"deposited_in" => $deposited_in, "receipt_mode" => $receipt_mode, "cheque_number" => $cheque_number,"date"=>$date,"drown_in_which_bank"=>$drown_in_which_bank,"branch_of_bank"=>$branch_of_bank,"received_from"=>$received_from,"ledger_sub_account_id"=>$ledger_sub_account_id,"receipt_type"=>$receipt_type,"amount"=>$amount,"narration"=>$narration,"society_id"=>$s_society_id,"created_by"=>$s_user_id,"source"=>"bank_receipt","applied"=>"no","receipt_number"=>$receipt_number))); 
					
					
					$this->loadmodel('ledger');
					$ledger_id=$this->autoincrement('ledger','auto_id');
					$this->ledger->saveAll(Array( Array("auto_id" => $ledger_id, "transaction_date"=> strtotime($transaction_date), "debit" => $amount, "credit" =>null, "ledger_account_id" => 33, "ledger_sub_account_id" => $deposited_in,"table_name" => "cash_bank","element_id" => $auto_id, "society_id" => $s_society_id))); 

					$ledger_id=$this->autoincrement('ledger','auto_id');
					$this->ledger->saveAll(Array( Array("auto_id" => $ledger_id, "transaction_date"=> strtotime($transaction_date), "credit" => $amount,"debit" =>null,"ledger_account_id" => 34, "ledger_sub_account_id" => $ledger_sub_account_id,"table_name"=>"cash_bank","element_id" => $auto_id, "society_id" => $s_society_id,"receipt_type" =>$receipt_type)));
				}
				
				// start Email & Sms code
				
					$amount = str_replace( ',', '', $amount );
					$am_in_words=ucwords($this->requestAction(array('controller' => 'hms', 'action' => 'convert_number_to_words'), array('pass' => array($amount))));
					
				$date=date("d-m-Y",strtotime($transaction_date));
				$result_member_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'), array('pass' => array(($ledger_sub_account_id)))); 
				
						 $user_name=$result_member_info["user_name"];
						 $wing_name=$result_member_info["wing_name"];
						 $flat_name=$result_member_info["flat_name"];
						 $wing_flat=$wing_name.'-'.$flat_name;
						 $email=$result_member_info["email"];
						 $mobile=$result_member_info["mobile"];
						 $wing_id=$result_member_info["wing_id"];
				
$ip=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip')); 				
				
					$html_receipt='<table style="padding:24px;background-color:#34495e" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
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
				
    
			if($email_is_on_off==1){
			////email code//
					if(!empty($email)){
					$subject="[".$society_name."]- e-Receipt of Rs ".$amount." on ".$date." against Unit ".$wing_flat."";
					

					$this->send_email($email,'accounts@housingmatters.in','HousingMatters',$subject,$html_receipt,'donotreply@housingmatters.in');
				}
			}	

			////Sms code//
				if($sms_is_on_off==1){
						if(!empty($mobile)){
								$r_sms=$this->requestAction(array('controller' => 'Fns', 'action' => 'hms_sms_ip')); 

								$working_key=$r_sms->working_key;
								$sms_sender=$r_sms->sms_sender; 
								$sms_allow=(int)$r_sms->sms_allow;
								
							if($sms_allow==1){
									
									$user_name_short=$this->check_charecter_name($user_name);
									
									$sms="Dear ".$user_name_short." ,we have received Rs ".$amount." on ".$date." towards Society Maint. dues. Cheques are subject to realization,".$society_name;
									$sms1=str_replace(' ', '+', $sms);

									$payload = file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$mobile.'&message='.$sms1.''); 
							}
						}	
				}
				
	
	
	$this->loadmodel('temp_cash_bank');
	$conditions=array("auto_id"=>(int)$temp_cash_bank_id,"society_id"=>$s_society_id);
	$this->temp_cash_bank->deleteAll($conditions);

}
$this->response->header('Location',''.$this->webroot.'Cashbanks/bank_receipt_approve');

}
//End approve_bank_receipt_ajax//
//Start bank_payment_new//
function bank_payment_new()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}	
	$s_role_id=$this->Session->read('role_id');
	$s_society_id = (int)$this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');	

	$this->loadmodel('ledger_sub_account');
	$conditions=array("ledger_id" => 15,"society_id"=>$s_society_id);
	$cursor11=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor11',$cursor11);

	$this->loadmodel('accounts_group');
	$conditions=array("accounts_id" => 1);
	$cursor12=$this->accounts_group->find('all',array('conditions'=>$conditions));
	$this->set('cursor12',$cursor12);

	$this->loadmodel('accounts_group');
	$conditions=array("accounts_id" => 4);
	$cursor13=$this->accounts_group->find('all',array('conditions'=>$conditions));
	$this->set('cursor13',$cursor13);
	
	$this->loadmodel('reference');
	$conditions=array("auto_id"=>3);
	$cursor = $this->reference->find('all',array('conditions'=>$conditions));
	foreach($cursor as $collection){
	$tds_arr = @$collection['reference']['reference'];
	}
	$this->set("tds_arr",@$tds_arr);
	
	$this->loadmodel('ledger_sub_account');
	$conditions=array("society_id" => $s_society_id, "ledger_id" => 33);
	$cursor2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
	$this->set('cursor2',$cursor2);
}
//End bank_payment_new//
//Start bank_payment_import_csv//
function bank_payment_import_csv()
{
if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	$this->ath();
	$s_society_id = $this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');	
   
    $value = ""; 
	$value = $this->request->query('vvv');
	if(!empty($value))
	{
		$this->loadmodel('payment_csv_converted');
		$conditions4=array('society_id'=>$s_society_id);
		$this->payment_csv_converted->deleteAll($conditions4);
					
		$this->loadmodel('bank_payment_csv');
		$conditions4=array('society_id'=>$s_society_id);
		$this->bank_payment_csv->deleteAll($conditions4);
			
	$this->loadmodel('import_payment_record');
	$conditions4=array("society_id" => $s_society_id, "module_name" => "BP");
	$this->import_payment_record->deleteAll($conditions4);	
		
	}

	$this->loadmodel('import_payment_record');
	$conditions=array("society_id" => $s_society_id,"module_name" => "BP");
	$result_import_record = $this->import_payment_record->find('all',array('conditions'=>$conditions));
	$this->set('result_import_record',$result_import_record);
	foreach($result_import_record as $data_import){
		$step1=(int)@$data_import["import_payment_record"]["step1"];
		$step2=(int)@$data_import["import_payment_record"]["step2"];
		$step3=(int)@$data_import["import_payment_record"]["step3"];
		$step4=(int)@$data_import["import_payment_record"]["step4"];
	}
	$process_status= @$step1+@$step2+@$step3+@$step4;
	if(@$process_status==2){
		$this->loadmodel('bank_payment_csv');
		$conditions=array("society_id" => $s_society_id,"is_converted" => "YES");
		$total_converted_records = $this->bank_payment_csv->find('count',array('conditions'=>$conditions));
		
		$this->loadmodel('bank_payment_csv');
		$conditions=array("society_id" => $s_society_id);
		$total_records = $this->bank_payment_csv->find('count',array('conditions'=>$conditions));
		
		$this->set("converted_per",(@$total_converted_records*100)/@$total_records);
	}

	if(@$process_status==4){
		$this->loadmodel('payment_csv_converted');
		$conditions=array("society_id" => $s_society_id,"is_imported" => "YES");
		$total_converted_records = $this->payment_csv_converted->find('count',array('conditions'=>$conditions));
		
		$this->loadmodel('payment_csv_converted');
		$conditions=array("society_id" => $s_society_id);
		$total_records = $this->payment_csv_converted->find('count',array('conditions'=>$conditions));
		
		$this->set("converted_per_im",($total_converted_records*100)/$total_records);
	}
}
//End bank_payment_import_csv//
//Start read_payment_csv_file//
function read_payment_csv_file(){
	$this->layout=null;
		$s_society_id = $this->Session->read('hm_society_id');
	
$f = fopen('Bank_Payment_csv_files/'.$s_society_id.'.csv', 'r') or die("ERROR OPENING DATA");
	$batchcount=0;
	$records=0;
	while (($line = fgetcsv($f, 4096, ';')) !== false) {
	$numcols = count($line);
	$test[]=$line;
	++$records;
	}
	$i=0;
	foreach($test as $child){ $i++;
		if($i>1){
			$child_ar=explode(',',$child[0]);
			$trajection_date=$child_ar[0];
			$ledger=$child_ar[1];
			$amount=$child_ar[2];
			$tds=$child_ar[3];
			$mode=$child_ar[4];
			$instrument=$child_ar[5];
			$bank=$child_ar[6];
			$invoice_ref=$child_ar[7];
			$narration=$child_ar[8];
			
			
			$this->loadmodel('bank_payment_csv');
			$auto_id=$this->autoincrement('bank_payment_csv','auto_id');
			$this->bank_payment_csv->saveAll(Array(Array("auto_id" => $auto_id, "trajection_date"=>$trajection_date,"ledger_ac"=>$ledger,"amount"=>$amount, "tds" => $tds, "mode" => $mode,"instrument"=>$instrument,"bank"=>$bank,"invoice_ref"=>$invoice_ref,"narration"=>$narration,"society_id"=>$s_society_id,"is_converted"=>"NO")));
		}
	}
	$this->loadmodel('import_payment_record');
	$this->import_payment_record->updateAll(array("step2" => 1),array("society_id" => $s_society_id,"module_name"=>"BP"));
	die(json_encode("READ"));
}
//End read_payment_csv_file//
//Start convert_payment_imported_data//
function convert_payment_imported_data()
{
$this->layout=null;
	$s_society_id = $this->Session->read('hm_society_id');
	
	$this->loadmodel('bank_payment_csv');
	$conditions=array("society_id"=>$s_society_id,"is_converted"=>"NO");
	$result_import_record=$this->bank_payment_csv->find('all',array('conditions'=>$conditions,'limit'=>20));
	foreach($result_import_record as $import_record){
		$ledger_id="";
		$typppp="";
		$bank_id="";
		$tds="";
		$bank_payment_csv_id=$import_record["bank_payment_csv"]["auto_id"];
		$trajection_date=trim($import_record["bank_payment_csv"]["trajection_date"]);
		$ledger_ac=trim($import_record["bank_payment_csv"]["ledger_ac"]);
		$amount=trim($import_record["bank_payment_csv"]["amount"]);
		$tds=trim($import_record["bank_payment_csv"]["tds"]);
		$mode=trim($import_record["bank_payment_csv"]["mode"]);
		$instrument=trim($import_record["bank_payment_csv"]["instrument"]);
		$bank=trim($import_record["bank_payment_csv"]["bank"]);
		$invoice_ref=$import_record["bank_payment_csv"]["invoice_ref"];
		$narration=trim($import_record["bank_payment_csv"]["narration"]);
		
$this->loadmodel('ledger_account'); 
$conditions =array('$or' => array(array("ledger_name"=> new MongoRegex('/^' . trim($ledger_ac) . '$/i'),"society_id"=>$s_society_id),array("ledger_name"=> new MongoRegex('/^' . trim($ledger_ac) . '$/i'),"society_id"=>0)));
$ledggrr_acc_datt=$this->ledger_account->find('all',array('conditions'=>$conditions));
foreach($ledggrr_acc_datt as $ledggrr_acc_datttaa){
$ledger_id = (int)$ledggrr_acc_datttaa['ledger_account']['auto_id'];
$typppp = 2;
}

$this->loadmodel('ledger_sub_account'); 
$conditions=array("name"=> new MongoRegex('/^' . trim($ledger_ac) . '$/i'),"society_id"=>$s_society_id);
$ledggr_sub_acc_resulltt = $this->ledger_sub_account->find('all',array('conditions'=>$conditions));
foreach($ledggr_sub_acc_resulltt as $ledd_detaill)
{
$ledger_id = (int)$ledd_detaill['ledger_sub_account']['auto_id'];
$typppp = 1;
}			

$this->loadmodel('ledger_sub_account'); 
$conditions=array("name"=> new MongoRegex('/^' . trim($bank) . '$/i'),"society_id"=>$s_society_id);
$result_ac=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
foreach($result_ac as $collection)
{
$bank_id = (int)$collection['ledger_sub_account']['auto_id'];
}

		$this->loadmodel('payment_csv_converted');
		$auto_id=$this->autoincrement('payment_csv_converted','auto_id');
		$this->payment_csv_converted->saveAll(Array(Array("auto_id" => $auto_id, "trajection_date" => $trajection_date,"ledger_ac"=>$ledger_id,"type"=>$typppp,"amount"=>$amount,"tds"=>$tds, "mode" => $mode,"instrument"=>$instrument,"bank"=>$bank_id,"invoice_ref"=>$invoice_ref,"narration"=>$narration,"society_id"=>$s_society_id,"is_imported"=>"NO")));
		
		$this->loadmodel('bank_payment_csv');
		$this->bank_payment_csv->updateAll(array("is_converted" => "YES"),array("auto_id" => $bank_payment_csv_id));
	}
	
	$this->loadmodel('bank_payment_csv');
	$conditions=array("society_id" => $s_society_id,"is_converted" => "YES");
	$total_converted_records = $this->bank_payment_csv->find('count',array('conditions'=>$conditions));
	
	$this->loadmodel('bank_payment_csv');
	$conditions=array("society_id" => $s_society_id);
	$total_records = $this->bank_payment_csv->find('count',array('conditions'=>$conditions));
	
	$converted_per=($total_converted_records*100)/$total_records;
	if($converted_per==100){ $again_call_ajax="NO"; 
		$this->loadmodel('import_payment_record');
		$this->import_payment_record->updateAll(array("step3" => 1),array("society_id" => $s_society_id, "module_name"=>"BP"));
	}else{
		$again_call_ajax="YES"; 
			
		}
	die(json_encode(array("again_call_ajax"=>$again_call_ajax,"converted_per"=>$converted_per)));	
}
//End convert_payment_imported_data//
//Start modify_bank_payment_csv_data//
function modify_bank_payment_csv_data($page=null)
{
if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();
	
	
	$s_society_id = $this->Session->read('hm_society_id');
	$page=(int)$page;
	$this->set('page',$page);
	
	$this->loadmodel('financial_year');
	$conditions=array("society_id" => $s_society_id,"status"=>1);
	$financial_years=$this->financial_year->find('all',array('conditions'=>$conditions));
	$financial_year_array=array();
	foreach($financial_years as $financial_year){
		$from=date("d-m-Y",$financial_year["financial_year"]["from"]);
		$to=date("d-m-Y",$financial_year["financial_year"]["to"]);
		$pair=array($from,$to);
		$pair=implode('/',$pair);
		$financial_year_array[]=$pair;
	}
	$financial_year_string=implode(',',$financial_year_array);
	$this->set(compact("financial_year_string"));
	
	
	$this->loadmodel('import_payment_record');
	$conditions=array("society_id" => $s_society_id,"module_name"=>"BP");
	$result_import_record = $this->import_payment_record->find('all',array('conditions'=>$conditions));
	$this->set('result_import_record',$result_import_record);
	foreach($result_import_record as $data_import){
		$step1=(int)@$data_import["import_payment_record"]["step1"];
		$step2=(int)@$data_import["import_payment_record"]["step2"];
		$step3=(int)@$data_import["import_payment_record"]["step3"];
	}
	$process_status= @$step1+@$step2+@$step3;
	if($process_status==3){
		$this->loadmodel('payment_csv_converted'); 
		$conditions=array("society_id"=>(int)$s_society_id);
		$result_bank_receipt_converted=$this->payment_csv_converted->find('all',array('conditions'=>$conditions,"limit"=>20,"page"=>$page));
		$this->set('result_bank_receipt_converted',$result_bank_receipt_converted);
		
		$this->loadmodel('payment_csv_converted'); 
		$conditions=array("society_id"=>(int)$s_society_id);
		$count_bank_receipt_converted=$this->payment_csv_converted->find('count',array('conditions'=>$conditions));
		$this->set('count_bank_receipt_converted',$count_bank_receipt_converted);
	   }	
$this->loadmodel('ledger_sub_account');
$conditions=array("society_id"=>$s_society_id,"ledger_id"=>33);
$cursor2=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor2',$cursor2);

$this->loadmodel('master_tds');
$cursor3=$this->master_tds->find('all');
$this->set('cursor3',$cursor3);

$this->loadmodel('reference');
$conditions=array("auto_id"=>3);
$cursor = $this->reference->find('all',array('conditions'=>$conditions));
foreach($cursor as $collection)
{
$tds_arr = $collection['reference']['reference'];
}
$this->set("tds_arr",$tds_arr);


$this->loadmodel('ledger_sub_account');
$conditions=array("ledger_id"=>15,"society_id"=>$s_society_id);
$cursor11=$this->ledger_sub_account->find('all',array('conditions'=>$conditions));
$this->set('cursor11',$cursor11);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 1);
$cursor12=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor12',$cursor12);

$this->loadmodel('accounts_group');
$conditions=array("accounts_id" => 4);
$cursor13=$this->accounts_group->find('all',array('conditions'=>$conditions));
$this->set('cursor13',$cursor13);
}
//End modify_bank_payment_csv_data//
//Start allow_import_bank_payment//
function allow_import_bank_payment()
{
$this->layout=null;
	
	$this->ath();
	$s_society_id = (int)$this->Session->read('hm_society_id');

	$this->loadmodel('payment_csv_converted'); 
	$conditions=array("society_id"=>(int)$s_society_id);
	$order=array('bank_receipt_csv_converted.auto_id'=>'ASC');
	$result_bank_receipt_converted=$this->payment_csv_converted->find('all',array('conditions'=>$conditions));
	foreach($result_bank_receipt_converted as $receipt_converted){
		$amount="";
		$auto_id=$receipt_converted["payment_csv_converted"]["auto_id"];
		$trajection_date=$receipt_converted["payment_csv_converted"]["trajection_date"];
		$ledger = $receipt_converted["payment_csv_converted"]["ledger_ac"];
		$type = (int)$receipt_converted["payment_csv_converted"]["type"];
		$invoice = $receipt_converted["payment_csv_converted"]["invoice_ref"];
		$amount=$receipt_converted["payment_csv_converted"]["amount"];
		$tds = $receipt_converted["payment_csv_converted"]["tds"];
		$mode = $receipt_converted["payment_csv_converted"]["mode"];
		$instrument = $receipt_converted["payment_csv_converted"]["instrument"];
		$bank=$receipt_converted["payment_csv_converted"]["bank"];
		$narration=$receipt_converted["payment_csv_converted"]["narration"];
		

if(empty($trajection_date)){ $trnsaction_v = 1; } else { $trnsaction_v = 0;  }	


    	$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				$from1 = date('Y-m-d',($from));
				$to1 = date('Y-m-d',($to));
				$from2 = strtotime($from1);
				$to2 = strtotime($to1);
				$transaction1 = date('Y-m-d',strtotime($trajection_date));
				$transaction2 = strtotime($transaction1);
					if($transaction2 <= $to2 && $transaction2 >= $from2){
					$abc = 5;
					break;
					}	
		}
	if($abc == 555){ $transs_v = 1;	}else { $transs_v = 0;  }

if(empty($ledger)){ $ledger_v = 1; }else { $ledger_v = 0;  }	

if(empty($amount)){ $amount_v = 1;  }else { $amount_v = 0;  }

if(is_numeric($amount))
{ 
$amount_vv = 0;
}
else
{
$amount_vv = 1;
}


if(empty($mode)){ $mode_v = 1; }else{ $mode_v = 0; }	



if(empty($instrument)){ $inst_v = 1; }else{ $inst_v = 0;  }	


if(empty($bank)){ $bank_v = 1; }else{ $bank_v = 0; }		
		
		$v_result[]=array($bank_v,$inst_v,$mode_v,$amount_vv,$amount_v,$ledger_v,$transs_v,$trnsaction_v);
		
	} 
	foreach($v_result as $data){
		if(array_sum($data)==0) { $tt ="T"; }else{ $tt="F"; break;  }
	}
	
		
		if($tt == "T"){ echo"T";
			$this->loadmodel('import_payment_record');
			$this->import_payment_record->updateAll(array("step4" => 1),array("society_id" => $s_society_id, "module_name" => "BP"));	
 }else{  die("not_validate"); }
}
//End allow_import_bank_payment//
//Start auto_save_bank_payment//
function auto_save_bank_payment($record_id=null,$field=null,$value=null){
	$this->layout=null;
	$this->ath();
	$s_society_id = $this->Session->read('hm_society_id');
	$record_id=(int)$record_id; 
		  
	if($field=="transaction_date"){
			$this->loadmodel('payment_csv_converted');
			$this->payment_csv_converted->updateAll(array("trajection_date" => $value),array("auto_id"=>$record_id));
			echo "T";
		
	}
	
	if($field=="ledger_data"){
		
		$val_arr = explode(',',$value);	
			$led_id = (int)$val_arr[0];
			$typp = (int)$val_arr[1];
			
			$this->loadmodel('payment_csv_converted');
			$this->payment_csv_converted->updateAll(array("ledger_ac"=>(int)$led_id,"type"=>(int)$typp),array("auto_id" => $record_id));
			echo "T";
		
	}
	
	
	
	if($field=="invoice"){
		
			$this->loadmodel('payment_csv_converted');
			$this->payment_csv_converted->updateAll(array("invoice_ref"=>$value),array("auto_id" => $record_id));
			echo "T";
		
	}
	
	if($field=="amt"){
		
		
			$this->loadmodel('payment_csv_converted');
			$this->payment_csv_converted->updateAll(array("amount"=>$value),array("auto_id" => $record_id));
			echo "T";
			}
	
	if($field=="tdss"){
		
			$this->loadmodel('payment_csv_converted');
			$this->payment_csv_converted->updateAll(array("tds" => $value),array("auto_id" => $record_id));
			echo "T";
		
	}
	

	
	if($field=="mode"){
		
			$this->loadmodel('payment_csv_converted');
			$this->payment_csv_converted->updateAll(array("mode" => $value),array("auto_id" => $record_id));
			echo "T";
		
	}
	
	
	if($field=="inst"){
		
		
			$this->loadmodel('payment_csv_converted');
			$this->payment_csv_converted->updateAll(array("instrument" => $value),array("auto_id" => $record_id));
			echo "T";
		
	}
	
	if($field=="bankk"){
		
			$this->loadmodel('payment_csv_converted');
			$this->payment_csv_converted->updateAll(array("bank" => (int)$value),array("auto_id" => $record_id));
			echo "T";
		
	}

	if($field=="desc"){
		$this->loadmodel('payment_csv_converted');
		$this->payment_csv_converted->updateAll(array("narration"=>$value),array("auto_id" => $record_id));
		echo "T";
	}
}
//End auto_save_bank_payment//
//Start check_bank_payment_csv_validation//
function check_bank_payment_csv_validation()
{
$this->layout=null;
	
	$this->ath();
	$s_society_id = (int)$this->Session->read('hm_society_id');
	$page=(int)$page;



		
		$this->payment_csv_converted->saveAll(Array(Array("auto_id" => $auto_id, "trajection_date" => $trajection_date,"ledger_ac"=>$ledger_id,"type"=>$typppp,"amount"=>$amount,"tds" => $tds, "mode" => $mode,"instrument"=>$instrument,"bank"=>$bank_id,"invoice_ref"=>$invoice_ref,"narration"=>$narration,"society_id"=>$s_society_id,"is_imported"=>"NO")));

	
	$this->loadmodel('payment_csv_converted'); 
	$conditions=array("society_id"=>(int)$s_society_id);
	$order=array('payment_csv_converted.auto_id'=>'ASC');
	$result_bank_receipt_converted=$this->payment_csv_converted->find('all',array('conditions'=>$conditions,'order'=>$order,"limit"=>20,"page"=>$page));
	foreach($result_bank_receipt_converted as $receipt_converted){
		$auto_id=(int)$receipt_converted["payment_csv_converted"]["auto_id"];
		$trajection_date=$receipt_converted["payment_csv_converted"]["trajection_date"];
		$ledger_ac=$receipt_converted["payment_csv_converted"]["ledger_ac"];
		$amount=$receipt_converted["payment_csv_converted"]["amount"];
		$tds=$receipt_converted["payment_csv_converted"]["tds"];
		$mode=$receipt_converted["payment_csv_converted"]["mode"];
		$instrument=$receipt_converted["payment_csv_converted"]["instrument"];
		$bank=(int)$receipt_converted["payment_csv_converted"]["bank"];
		$invoice_ref=$receipt_converted["payment_csv_converted"]["invoice_ref"];
		$narration=$receipt_converted["payment_csv_converted"]["narration"];
		
		if(empty($trajection_date)){ $trajection_date_v=1; }else{ $trajection_date_v=0; }
		if(empty($ledger_ac)){ $ledger_ac_in_v=1; }else{ $ledger_ac_in_v=0; }
		if(empty($amount)){	$amount_in_v=1; }else{ $amount_in_v=0; }
		if(empty($mode)){	$mode_in_v=1; }else{ $mode_in_v=0; }
		if(empty($instrument)){ $instrument_in_v=1; }else{ $instrument_in_v=0; }
		if(empty($bank)){ $bank_in_v=1; }else{ $bank_in_v=0; }
				
		$v_result[]=array($trajection_date_v,$ledger_ac_in_v,$amount_in_v,$mode_in_v,$instrument_in_v,$bank_in_v,$auto_id);
	}
		
	die(json_encode($v_result));
	
}
//End check_bank_payment_csv_validation//
//Start final_import_bank_payment_ajax//
function final_import_bank_payment_ajax()
{
$this->layout=null;
	$s_society_id = (int)$this->Session->read('hm_society_id');
	$s_user_id= (int)$this->Session->read('hm_user_id');
	$this->ath();
	$this->loadmodel('import_payment_record');
	$conditions=array("society_id" => $s_society_id,"module_name" => "BP");
	$result_import_record = $this->import_payment_record->find('all',array('conditions'=>$conditions));
	$this->set('result_import_record',$result_import_record);
	foreach($result_import_record as $data_import){
		$step1=(int)@$data_import["import_payment_record"]["step1"];
		$step2=(int)@$data_import["import_payment_record"]["step2"];
		$step3=(int)@$data_import["import_payment_record"]["step3"];
		$step4=(int)@$data_import["import_payment_record"]["step4"];
	}
	$process_status= @$step1+@$step2+@$step3+@$step4;
	
	if($process_status==4){
		
		$this->loadmodel('payment_csv_converted');
		$conditions=array("society_id" => $s_society_id,"is_imported" => "NO");
		$result_import_converted = $this->payment_csv_converted->find('all',array('conditions'=>$conditions,'limit'=>2));
		
		foreach($result_import_converted as $import_converted){
			$tds_id="";
			$bank_payment_csv_id=(int)$import_converted["payment_csv_converted"]["auto_id"];
			$transaction_date=$import_converted["payment_csv_converted"]["trajection_date"];
			$ledger_acc=(int)$import_converted["payment_csv_converted"]["ledger_ac"];
			$acc_type=(int)$import_converted["payment_csv_converted"]["type"];
			$invoice=$import_converted["payment_csv_converted"]["invoice_ref"];
			$amount=$import_converted["payment_csv_converted"]["amount"];
			$tds_id=$import_converted["payment_csv_converted"]["tds"];
			$mode=$import_converted["payment_csv_converted"]["mode"];
			$instrument=$import_converted["payment_csv_converted"]["instrument"];
			$bank_ac=(int)$import_converted["payment_csv_converted"]["bank"];
			$narration=$import_converted["payment_csv_converted"]["narration"];
			$transaction_date = date('Y-m-d',strtotime($transaction_date));
	
	$tds_amount=round($tds_id);
	$total_tds_amount=$amount-$tds_amount;

	
		
$current_date = date('Y-m-d');		
$i=$this->autoincrement('cash_bank','transaction_id');
$bbb=$this->autoincrement_with_receipt_source('cash_bank','receipt_number','bank_payment');
$rr_arr[] = $bbb;
$this->loadmodel('cash_bank');
$multipleRowData = Array( Array("transaction_id"=>$i,"receipt_number"=>$bbb,"created_on"=>$current_date, 
"transaction_date" => strtotime($transaction_date),"created_by" => $s_user_id, 
"sundry_creditor_id"=>$ledger_acc,"invoice_reference" => @$invoice,"narration" => $narration,"receipt_mode" => $mode,
"receipt_instruction" => $instrument, "account_head" => $bank_ac,  
"amount" => $amount,"society_id" => $s_society_id,"tds_tax_amount"=>$tds_amount,"account_type"=>$acc_type,"source"=>"bank_payment","auto_inc"=>"YES"));
$this->cash_bank->saveAll($multipleRowData);  


if($acc_type == 1)
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => $amount, "credit" =>null,"ledger_account_id" => 15, "ledger_sub_account_id" =>$ledger_acc, "table_name" =>"cash_bank","element_id" => $i, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 
}
else
{
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), "debit" => $amount,"credit" =>null,"ledger_account_id" =>$ledger_acc, "ledger_sub_account_id" =>null, "table_name" =>"cash_bank","element_id" =>$i, "society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 
}




$sub_account_id_a = (int)$bank_ac;
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date), 
"debit" =>null,"credit" =>$total_tds_amount,"ledger_account_id" =>33, 
"ledger_sub_account_id" =>$sub_account_id_a, "table_name" =>"cash_bank","element_id" =>$i, 
"society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 


if($tds_amount > 0)
{
$sub_account_id_t = 16;
$l=$this->autoincrement('ledger','auto_id');
$this->loadmodel('ledger');
$multipleRowData = Array( Array("auto_id" => $l,"transaction_date"=>strtotime($transaction_date),
"debit" =>null,"credit" =>$tds_amount,"ledger_account_id" =>$sub_account_id_t, 
"ledger_sub_account_id" =>null,"table_name"=>"cash_bank","element_id"=>$i, 
"society_id" => $s_society_id));
$this->ledger->saveAll($multipleRowData); 
}

            $this->loadmodel('payment_csv_converted');
			$this->payment_csv_converted->updateAll(array("is_imported" => "YES"),array("auto_id" => $bank_payment_csv_id));
		
	}
	
		
		$this->loadmodel('payment_csv_converted');
		$conditions=array("society_id" => $s_society_id,"is_imported" => "YES");
		$total_converted_records = (int)$this->payment_csv_converted->find('count',array('conditions'=>$conditions));
		
		$this->loadmodel('payment_csv_converted');
		$conditions=array("society_id" => $s_society_id);
		$total_records = (int)$this->payment_csv_converted->find('count',array('conditions'=>$conditions));
		
		
	
		$converted_per=($total_converted_records*100)/$total_records;
		
		
			
		if($converted_per==100){ $again_call_ajax="NO"; 
			
		
			$this->loadmodel('payment_csv_converted');
			$conditions4=array('society_id'=>$s_society_id);
			$this->payment_csv_converted->deleteAll($conditions4);
		
			
			$this->loadmodel('bank_payment_csv');
			$conditions4=array('society_id'=>$s_society_id);
			$this->bank_payment_csv->deleteAll($conditions4);
			
			
			
			
			
			$this->loadmodel('import_payment_record');
			$conditions4=array("society_id" => $s_society_id, "module_name" => "BP");
			$this->import_payment_record->deleteAll($conditions4);
		  }else{
			$again_call_ajax="YES"; 
			}
			
		die(json_encode(array("again_call_ajax"=>$again_call_ajax,"converted_per_im"=>$converted_per)));
	}		

}
//End final_import_bank_payment_ajax//
//Start delete_bank_payment_row//
function delete_bank_payment_row($record_id=null)
{
$this->layout=null;
$s_society_id = $this->Session->read('hm_society_id');
$s_user_id=$this->Session->read('hm_user_id');
$this->loadmodel('payment_csv_converted');
$conditions4=array("auto_id" => (int)$record_id);
$this->payment_csv_converted->deleteAll($conditions4);
echo "1";	
	
}
//End delete_bank_payment_row//
//Start Upload_Bank_payment_csv_file//
function Upload_Bank_payment_csv_file()
{
$s_society_id = $this->Session->read('hm_society_id');
	$s_user_id=$this->Session->read('hm_user_id');
	$this->ath();
	if(isset($_FILES['file'])){
		$file_name=$s_society_id.".csv";
		$file_tmp_name =$_FILES['file']['tmp_name'];
		$target = "Bank_Payment_csv_files/";
		$target=@$target.basename($file_name);
		move_uploaded_file($file_tmp_name,@$target);
		
		
		$today = date("d-M-Y");
		
		$this->loadmodel('import_payment_record');
		$auto_id=$this->autoincrement('import_payment_record','auto_id');
		$this->import_payment_record->saveAll(Array( Array("auto_id" => $auto_id, "file_name" => $file_name,"society_id" => $s_society_id, "user_id" => $s_user_id, "module_name" => "BP", "step1" => 1,"date"=>$today))); 
		die(json_encode("UPLOADED"));
	}	
}
//End Upload_Bank_payment_csv_file//
//Start cancle_bank_payment_import//
function cancle_bank_payment_import()
{
$s_society_id = $this->Session->read('hm_society_id');
	
	$this->loadmodel('payment_csv_converted');
	$conditions=array("society_id"=>(int)$s_society_id);
	$this->payment_csv_converted->deleteAll($conditions);
	
	$this->loadmodel('bank_payment_csv');
	$conditions=array("society_id"=>(int)$s_society_id);
	$this->bank_payment_csv->deleteAll($conditions);
	
	$this->loadmodel('import_payment_record');
	$conditions=array("society_id"=>(int)$s_society_id);
	$this->import_payment_record->deleteAll($conditions);
	
	$this->redirect(array('controller' => 'Cashbanks','action' => 'bank_payment_import_csv'));	
	
}
//End cancle_bank_payment_import//
//Start bank_receipt_date_validation//
function bank_receipt_date_validation($transaction_date=null,$ledger_sub_account_id=null)
{
	$this->ath();
$s_society_id = $this->Session->read('hm_society_id');	

		$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				$from1 = date('Y-m-d',$from);
				$to1 = date('Y-m-d',$to);
				$from2 = strtotime($from1);
				$to2 = strtotime($to1);
				$transaction1 = date('Y-m-d',strtotime($transaction_date));
				$transaction2 = strtotime($transaction1);
					if($transaction2 <= $to2 && $transaction2 >= $from2){
					$abc = 5;
					break;
					}	
		}
		if($abc==555)
		{
		echo "financial_year";	
		}
        else{

$transaction_date=date('Y-m-d',strtotime($transaction_date));
$transaction_date=strtotime($transaction_date);
	$nn=0;
	$this->loadmodel('regular_bill'); 
	$order=array('regular_bill.start_date'=>'DESC');
	$conditions=array("society_id"=>(int)$s_society_id,"ledger_sub_account_id"=>(int)$ledger_sub_account_id,"edited"=>"no");
	$result_regular_bill=$this->regular_bill->find('all',array('conditions'=>$conditions,'order'=>$order,'limit'=>2));
	foreach($result_regular_bill as $data){
	$start_date=$data['regular_bill']['start_date'];	
	$nn++;
	}
	
   if($nn==1){
		echo "not_match";   
   }
   else
   {
		if($transaction_date <= $start_date)
		{
		echo "match";  
		}
		else
		{
		echo "not_match";  
		}   
   }
}
}
//End bank_receipt_date_validation//
//Start petty_cash_receipt_date_validation//
function petty_cash_receipt_date_validation($transaction_date=null,$ledger_sub_account_id=null)
{
	$this->ath();
	$s_society_id = $this->Session->read('hm_society_id');
		$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				$from1 = date('Y-m-d',$from);
				$to1 = date('Y-m-d',$to);
				$from2 = strtotime($from1);
				$to2 = strtotime($to1);
				$transaction1 = date('Y-m-d',strtotime($transaction_date));
				$transaction2 = strtotime($transaction1);
					if($transaction2 <= $to2 && $transaction2 >= $from2){
					$abc = 5;
					break;
					}	
		}
		if($abc==555)
		{
		echo "financial_year";	
		}
        else{
	
$transaction_date=date('Y-m-d',strtotime($transaction_date));
$transaction_date=strtotime($transaction_date);
	$nn=0;
	$this->loadmodel('regular_bill'); 
	$order=array('regular_bill.start_date'=>'DESC');
	$conditions=array("society_id"=>(int)$s_society_id,"ledger_sub_account_id"=>(int)$ledger_sub_account_id,"edited"=>"no");
	$result_regular_bill=$this->regular_bill->find('all',array('conditions'=>$conditions,'order'=>$order,'limit'=>2));
	foreach($result_regular_bill as $data){
	$start_date=$data['regular_bill']['start_date'];	
	$nn++;
	}
	
   if($nn==1 || $nn==0){
		echo "not_match";   
   }
   else
   {
		if($transaction_date <= $start_date)
		{
		echo "match";  
		}
		else
		{
		echo "not_match";  
		}   
   }
}   
}
//End petty_cash_receipt_date_validation//
//Start testing_sampe//
function testing_sample()
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	$this->ath();

	$s_society_id=(int)$this->Session->read('hm_society_id');	
	$this->loadmodel('cash_bank'); 
	$conditions=array("society_id"=>$s_society_id,"transaction_id"=>1);
	$cursor=$this->cash_bank->find('all',array('conditions'=>$conditions));
	$this->set('cursor',$cursor);

	$this->loadmodel('society'); 
	$conditions=array("society_id"=>$s_society_id);
	$cursor1=$this->society->find('all',array('conditions'=>$conditions));
	foreach($cursor1 as $dataa){
	$society_name=$dataa['society']['society_name'];	
	$society_reg_no=$dataa['society']['society_reg_num']; 
	$society_address=$dataa['society']['society_address'];
	$sig_title=$dataa['society']['sig_title'];
	}
    $this->set('society_name',$society_name);
	 $this->set('society_reg_no',$society_reg_no);
	  $this->set('society_address',$society_address);
	   $this->set('sig_title',$sig_title);
}
//End testing_sampe//
//Start bank_receipt_cancel//
function bank_receipt_cancel($transaction_id=null)
{
	if($this->RequestHandler->isAjax()){
	$this->layout='blank';
	}else{
	$this->layout='session';
	}
	
	$this->set('transaction_id',$transaction_id);

}
//End bank_receipt_cancel//
//Start financial_year_validation//
function financial_year_validation($transaction_date=null)
{
$this->ath();
$s_society_id=$this->Session->read('hm_society_id');	

		$this->loadmodel('financial_year');
		$conditions=array("society_id" => $s_society_id,"status"=>1);
		$cursor = $this->financial_year->find('all',array('conditions'=>$conditions));
		$abc = 555;
		foreach($cursor as $collection){
				$from = $collection['financial_year']['from'];
				$to = $collection['financial_year']['to'];
				$from1 = date('Y-m-d',$from);
				$to1 = date('Y-m-d',$to);
				$from2 = strtotime($from1);
				$to2 = strtotime($to1);
				$transaction1 = date('Y-m-d',strtotime($transaction_date));
				$transaction2 = strtotime($transaction1);
					if($transaction2 <= $to2 && $transaction2 >= $from2){
					$abc = 5;
					break;
					}	
		}
	
		if($abc==5)
		{
		echo "match";	
		}
        else{
		echo "not_match";	
		}
}
//Start financial_year_validation//
//Start modify_database//
function modify_database()
{
$this->layout="blank";
$s_society_id=(int)$this->Session->read('hm_society_id');	
$this->ath();		
	
	$this->loadmodel('ledger');
	$conditions=array("table_name"=>"new_regular_bill");
	$result_ledger=$this->ledger->find('all',array('conditions'=>$conditions));
	foreach($result_ledger as $data){
	$auto_id=(int)$data['ledger']['auto_id'];	
	$element_id=(int)$data['ledger']['element_id'];	
		
	
	$this->loadmodel('ledger');
	$this->ledger->updateAll(array("table_name"=>"regular_bill","element_id"=>(int)$element_id),array("auto_id"=>$auto_id));

	}	
	
	
}
//End modify_database//
}
?>