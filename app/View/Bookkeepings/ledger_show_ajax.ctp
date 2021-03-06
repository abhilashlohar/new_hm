<?php
$webroot_path=$this->requestAction(array('controller' => 'Hms', 'action' => 'webroot_path'));
?>
<style>
#report_tb th{
	font-size: 14px !important;background-color:#C8EFCE;padding:5px;border:solid 1px #55965F;
}
#report_tb td{
	padding:5px;
	font-size: 14px;border:solid 1px #55965F;background-color:#FFF;
}
table#report_tb tr:hover td {
background-color: #E6ECE7;
}
</style>
<?php 
function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            @$length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                @$output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}

?>
<div style="overflow:auto;" class="hide_at_print"> 
<a href="ledger_excel?l=<?php echo $ledger_account_id; ?>&sl=<?php echo $ledger_sub_account_id; ?>&f=<?php echo $from; ?>&t=<?php echo $to; ?>" class="btn blue mini pull-right" target="_blank" style="margin-left:1%;"><i class="icon-download"></i></a>
<a href="#" role="button" class="btn green mini pull-right" onclick="window.print()"> <i class="icon-print"></i> </a>
</div>
<div style="width:100%; overflow:auto; margin-top:10px;" class="hide_at_print">
<label class="m-wrap pull-right"><input type="text" id="search" class="m-wrap medium" style="background-color:#FFF !important;" placeholder="Search"></label>	
</div>	
<div style="background-color:#fff;" align="center">
<?php
$sub_ledger_name = "";

$result_income_head = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($ledger_account_id)));	
$ledger_account_name=$result_income_head[0]["ledger_account"]["ledger_name"];

$result_income_head2 = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($ledger_sub_account_id)));
$account_number = "";
$wing_flat = "";

$sub_ledger_name=@$result_income_head2[0]["ledger_sub_account"]["name"];
if($ledger_account_id == 33)
{
$account_number = @$result_income_head2[0]['ledger_sub_account']['bank_account'];	
}
if($ledger_account_id == 34)
{
$user_id = (int)@$result_income_head2[0]['ledger_sub_account']['user_id'];

				$result_user = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($user_id)));
				foreach ($result_user as $collection) 
				{
				$user_name = $collection['user']['user_name'];  
				$wing_id = @$collection['user']['wing'];
				$flat_id = @$collection['user']['flat'];
				}


$wing_flat=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'wing_flat'), array('pass' => array($wing_id,$flat_id)));

}

?>
<div style="font-size:14px;">
	<span style="color:#6F6D6D;font-size:16px;">LEDGER REPORT</span><br/>
	<span><b><?php echo $ledger_account_name; ?> </b></span>
	<?php if(!empty($sub_ledger_name)){
		echo '<i class="icon-chevron-right" style="font-size: 11px;"></i>';
	} ?>
	
	<span ><b> <?php echo $sub_ledger_name; ?> &nbsp;&nbsp; <?php echo $account_number; ?>  <?php echo $wing_flat; ?></b></span><br/>
	<span>From: <?php echo date("d-m-Y",strtotime($from)); ?> To: <?php echo date("d-m-Y",strtotime($to)); ?></span>
</div>
 
<?php
$ledger_account_id; 
$opening_balance=$this->requestAction(array('controller' => 'Fns', 'action' => 'calculate_opening_balance_for_ledger'), array('pass' => array($ledger_account_id,$ledger_sub_account_id,strtotime($from))));
?>
<div class="pull-right" style="text-align:right;font-size:15px;padding:5px;background-color: antiquewhite;">Opening Balance: <?php echo $opening_balance; ?></div>
<table width="100%" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Transaction Date</th>
			<th>Corresponding a/c </th>
            <th>Description</th>
			<th>Source</th>
            <th>Reference</th>
			<th>Debit</th>
			<th>Credit</th>
			<th class="hide_at_print"></th>
		</tr>
	</thead>
	<tbody id="table">
	<?php 
	$i=0; $total_debit=0; $total_credit=0; // pr($result_ledger); exit;
	foreach($result_ledger as $data){ $i++;
	$created_by = "";
	$created_on = "";
	$creater_name = "";	
	$approver_name = "";
		 
	$debit=$data["ledger"]["debit"];
	$credit=$data["ledger"]["credit"];
	$transaction_date=$data["ledger"]["transaction_date"];
	$arrear_int_type=@$data["ledger"]["intrest_on_arrears"];
	$table_name=$data["ledger"]["table_name"];
	$element_id=(int)$data["ledger"]["element_id"];
	$subledger_id = (int)@$data["ledger"]["ledger_sub_account_id"];
	$ledger_id = (int)@$data["ledger"]["ledger_account_id"];
	$tds_ledger_id = "";
	$refrence_no="";
	$total_debit=$total_debit+$debit;
	$total_credit=$total_credit+$credit;
		
	if($table_name=="regular_bill"){
		if($arrear_int_type=="YES"){
			$source="Regular Bill (interest)";
		}else{
		  $source="Regular Bill";
		} 
		 //$source="Regular Bill";
			$result_regular_bill=$this->requestAction(array('controller' => 'Bookkeepings', 'action'=>'regular_bill_info_via_auto_id'), array('pass' => array($element_id)));
			$bill_approved="";
			if(sizeof($result_regular_bill)>0){
				$bill_approved="yes";
				$refrence_no=$result_regular_bill[0]["regular_bill"]["bill_number"];
				$description=$result_regular_bill[0]["regular_bill"]["description"];
				$description=substrwords($description,200,'...');
				$ledger_sub_account_id = (int)$result_regular_bill[0]["regular_bill"]["ledger_sub_account_id"]; 
				$prepaired_by = (int)$result_regular_bill[0]["regular_bill"]["created_by"]; 
				@$current_date = @$result_regular_bill[0]["regular_bill"]["current_date"];
				@$current_datttt = date('d-m-Y',strtotime(@$current_date));
	
		$user_dataaaa = $this->requestAction(array('controller'=>'hms','action'=>'user_fetch'),array('pass'=>array($prepaired_by)));
		foreach ($user_dataaaa as $user_detailll){
		$creater_name = @$user_detailll['user']['user_name'];
		}	
		$user_id1 = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
		
		$user_id=$user_id1['user_id'];
		$user_name=$user_id1['user_name'];
		$wing_id=(int)$user_id1['wing_id'];
		$flat_id=(int)$user_id1['flat_id'];
		
			
		$wing_flat=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'wing_flat'), array('pass' => array($wing_id,$flat_id)));
		
		}
		}
		if($table_name=="cash_bank"){ $wing_flat="";  
				$element_id=$element_id;
			$result_cash_bank=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'receipt_info_via_auto_id'), array('pass' => array((int)$element_id)));
			$receipt_source = $result_cash_bank[0]["cash_bank"]["source"];  
	
	if($receipt_source == "bank_receipt"){
	$source="Receipt";
	$trans_id = (int)$result_cash_bank[0]["cash_bank"]["transaction_id"]; 
	$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_number"]; 
	$ledger_sub_account_id = (int)$result_cash_bank[0]["cash_bank"]["ledger_sub_account_id"];
	$description = @$result_cash_bank[0]["cash_bank"]["narration"];
	$date=@$result_cash_bank[0]["cash_bank"]["created_on"];
	$creater_user_id =(int)@$result_cash_bank[0]['cash_bank']['created_by'];
	$approved_by=(int)@$result_cash_bank[0]['cash_bank']['approved_by'];
	$approved_date=@$result_cash_bank[0]['cash_bank']['approved_date'];
	$ledger_id_for_view=(int)@$result_cash_bank[0]['cash_bank']['ledger_sub_account_id'];
	$description=substrwords($description,200,'...');
	$bank_id=(int)$result_cash_bank[0]['cash_bank']['deposited_in'];
	
	$current_datttt = date('d-m-Y',strtotime($date));
	$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($approved_by)));
	foreach ($user_dataaaa as $user_detailll) {
	$approver_name = @$user_detailll['user']['user_name'];
	}	
	
	$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($creater_user_id)));
	foreach ($user_dataaaa as $user_detailll){
	$creater_name = $user_detailll['user']['user_name'];
	}	
		if($subledger_id != 0){
			
			if($credit==null){
			$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($subledger_id)));
			foreach($subleddger_detaill as $subledger_datttaa){
			$user_name = $subledger_datttaa['ledger_sub_account']['name'];
			$ledger_id_forwingflat = (int)$subledger_datttaa['ledger_sub_account']['ledger_id'];
			}
			if($ledger_id_forwingflat != 34){
			
			$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass'=> array($ledger_id_for_view)));
			foreach($subleddger_detaill as $subledger_datttaa){
			$user_name = $subledger_datttaa['ledger_sub_account']['name'];
			$ledger_id_forwingflat = (int)$subledger_datttaa['ledger_sub_account']['ledger_id'];
			}
			}else{
			$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass'=> array($bank_id)));
			foreach($subleddger_detaill as $subledger_datttaa){
			$user_name = $subledger_datttaa['ledger_sub_account']['name'];
			}
		}
		}else{
		
		$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass'=> array($bank_id)));
		foreach($subleddger_detaill as $subledger_datttaa){
		$user_name = $subledger_datttaa['ledger_sub_account']['name'];
		}	
	
		}
		}
		else
		{
			
		}		
			


		$wing_flat="";	
		
	if(@$ledger_id_forwingflat == 34){
		
		$member_info=$this->requestAction(array('controller' => 'Fns','action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
		$wing_id = $member_info['wing_id'];
		$flat_id = $member_info['flat_id'];

		$wing_flat=$this->requestAction(array('controller'=>'Fns','action' => 'wing_flat_via_wing_id_and_flat_id'), array('pass' => array($wing_id,$flat_id)));
		
		}
    }
	if($receipt_source == "bank_payment")
	{
		$tds_amount=0;
		$tds_array_for_bank_payment = array();
		$source="Bank payment";
		$trans_id = (int)$result_cash_bank[0]["cash_bank"]["transaction_id"];  
		$description = @$result_cash_bank[0]["cash_bank"]["narration"];
		$description=substrwords($description,200,'...');
		$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_number"]; 
		$vendor_id = (int)$result_cash_bank[0]["cash_bank"]["sundry_creditor_id"];
		$account_type = (int)$result_cash_bank[0]["cash_bank"]["account_type"];	
		$amttt = $result_cash_bank[0]["cash_bank"]["amount"];			
		$tds_amount = $result_cash_bank[0]["cash_bank"]["tds_tax_amount"];		
		$current_date = $result_cash_bank[0]['cash_bank']['created_on'];
		$prepaired_by_id = (int)$result_cash_bank[0]['cash_bank']['created_by'];
		$bank_id=(int)$result_cash_bank[0]['cash_bank']['account_head'];
		$current_datttt = date('d-m-Y',strtotime($current_date));									
		$ussr_dataa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($prepaired_by_id)));  
		foreach ($ussr_dataa as $ussrrr) 
		{
		$creater_name = $ussrrr['user']['user_name'];  
		}		
			
		if($subledger_id != 0){
			$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 
			'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($bank_id)));
			foreach($subleddger_detaill as $subledger_datttaa){
			$user_name=$subledger_datttaa['ledger_sub_account']['name'];
		}

		$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 
		'action'=>'ledger_sub_account_detail_via_auto_id'), array('pass' => array($subledger_id)));
		foreach($subleddger_detaill as $subledger_datttaa){
		$tds_ledger_id = (int)$subledger_datttaa['ledger_sub_account']['ledger_id'];
		}
             if($tds_ledger_id == 33)
			 {
			   if($account_type==2){
					$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($vendor_id)));
					foreach($leddger_detaill as $ledger_datttaa)
					{
					$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
					}
				 }else{
					$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 
					'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($vendor_id)));
					foreach($subleddger_detaill as $subledger_datttaa){
					$user_name=$subledger_datttaa['ledger_sub_account']['name'];
					} }
			}
			if($tds_ledger_id == 15)
			{
						
			$total_tds_amount=$debit-$tds_amount;				
						
			if(!empty($tds_amount)){
			$tds_array_for_bank_payment[] = array($tds_amount,"tds payable",$creater_name,$current_datttt);
			}
		   $tds_array_for_bank_payment[] = array($total_tds_amount,$description,$creater_name,$current_datttt);			
							
			}
			}
			else
			{
		
				   if($ledger_id == 16)
					 {
						 if($account_type == 1)
						 {
		$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($vendor_id)));
						foreach($subleddger_detaill as $subledger_datttaa)
						{
						$user_name = $subledger_datttaa['ledger_sub_account']['name'];
						}
					
						}
	            		else
						{
						$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($vendor_id)));
						foreach($leddger_detaill as $ledger_datttaa)
						{
						$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
						}	
						}

			        }
					else{

			$tds_ledger_id = 15;
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array((int)$ledger_id)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}
			
			$total_tds_amount=$debit-$tds_amount;	
				
			if(!empty($tds_amount)){
			$tds_array_for_bank_payment[] = array($tds_amount,"tds payable",$creater_name,$current_datttt);
			}
            $tds_array_for_bank_payment[] = array($total_tds_amount,$description,$creater_name,$current_datttt);	
			}
		}
	}
	if($receipt_source == "petty_cash_receipt")
	{
	$source="Petty Cash Receipt";
		$trans_id=(int)$result_cash_bank[0]["cash_bank"]["transaction_id"]; 
		$description=@$result_cash_bank[0]["cash_bank"]["narration"];
		$description=substrwords($description,200,'...');
		$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_number"]; 
		$prepaired_by=(int)$result_cash_bank[0]['cash_bank']['created_by'];   
        $current_date=$result_cash_bank[0]['cash_bank']['created_on'];	
		$ledger_id_for_party_name=(int)$result_cash_bank[0]['cash_bank']['ledger_sub_account_id'];
        $ledger_id_type=(int)$result_cash_bank[0]['cash_bank']['account_type'];
        $ledger_account_id=(int)$result_cash_bank[0]['cash_bank']['account_head'];

		
		$current_datttt = date('d-m-Y',strtotime($current_date));

		$result_gh = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($prepaired_by)));
		foreach ($result_gh as $collection) 
		{
		$creater_name = $collection['user']['user_name'];
		}		

			
			
			
			if($subledger_id != 0)
			{
				$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_account_id)));
				foreach($leddger_detaill as $ledger_datttaa)
				{
				$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
				}
			}
		else
		{
			if($credit==null){
			 if($ledger_id_type==1){
				$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($ledger_id_for_party_name)));
				foreach($subleddger_detaill as $subledger_datttaa)
				{
				$user_name = $subledger_datttaa['ledger_sub_account']['name'];
				}
		   }else{
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id_for_party_name)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}
			
		}
			}else{
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_account_id)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}	
				
			}
		}

	}
	if($receipt_source == "petty_cash_payment")
	{
		$source="Petty Cash Payment";
		$trans_id = (int)$result_cash_bank[0]["cash_bank"]["transaction_id"]; 
			$description = @$result_cash_bank[0]["cash_bank"]["narration"];
			$description=substrwords($description,200,'...');
			$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_number"]; 
			$prepaired_by = (int)$result_cash_bank[0]['cash_bank']['created_by'];
			$current_date = $result_cash_bank[0]['cash_bank']['created_on'];
            $ledger_account_id_for_view=(int)$result_cash_bank[0]['cash_bank']['sundry_creditor_id']; 
	        $ledger_id_type=(int)$result_cash_bank[0]['cash_bank']['account_type'];
		    $ledger_id_for_view=(int)$result_cash_bank[0]['cash_bank']['account_head'];
		$current_datttt = date('d-m-Y',strtotime($current_date));
		$result_gh = $this->requestAction(array('controller' => 'hms','action'=> 'profile_picture'),array('pass'=>array($prepaired_by)));
		foreach ($result_gh as $collection) 
		{
		$creater_name = $collection['user']['user_name'];
		}	
		
			
			
			
			if($subledger_id != 0)
			{
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id_for_view)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}
			}
			else
			{
			 if($debit==null){
				if($ledger_id_type==1){
				$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($ledger_account_id_for_view)));
				foreach($subleddger_detaill as $subledger_datttaa)
				{
				$user_name = $subledger_datttaa['ledger_sub_account']['name'];
				}
				}else{
				$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_account_id_for_view)));
				foreach($leddger_detaill as $ledger_datttaa)
				{
				$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
				}
				}
			 }else
			 {
				$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id_for_view)));
				foreach($leddger_detaill as $ledger_datttaa)
				{
				$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
				}	 
				 
			 }
			}

	}



		
		}
		
		if($table_name=="opening_balance" && $arrear_int_type=="YES"){
			$source="Opening Balance (Penalty)";
			$description='Interest arrears';
		
		 if($subledger_id != 0)
		{
			$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($subledger_id)));
			foreach($subleddger_detaill as $subledger_datttaa)
			{
			$user_name = $subledger_datttaa['ledger_sub_account']['name'];
			$ledger_id_forwingflat = (int)$subledger_datttaa['ledger_sub_account']['ledger_id'];
			}
		}
		else
		{
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}
		}
		
		}elseif($table_name=="opening_balance"){
			$source="Opening Balance";
			$description='Opening balance migrated';
		
		 if($subledger_id != 0)
		{
			$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($subledger_id)));
			foreach($subleddger_detaill as $subledger_datttaa)
			{
			$user_name = $subledger_datttaa['ledger_sub_account']['name'];
			$ledger_id_forwingflat = (int)$subledger_datttaa['ledger_sub_account']['ledger_id'];
			}
		}
		else
		{
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}
		}
		
		}
		
		if($table_name=="closing_process"){
			 $creater_id=(int)$data["ledger"]["user_id"];
			 $current_datttt=$data["ledger"]["current_date"];
			$source="JV for Closing process";
			$description='Year Closing JV';
	    	$user_name=" ";
			$wing_flat="";
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
				$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}
			$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($creater_id)));
			foreach ($user_dataaaa as $user_detailll) 
			{
				$creater_name = $user_detailll['user']['user_name'];
			}	
			
		}
		if($table_name=="expense_tracker"){
			
			$source="Expenses";
			 
			
		$result_expense_tracker=$this->requestAction(array('controller' => 'Hms', 'action' => 'fetch_expense_tracker'), array('pass' => array($element_id)));
		foreach($result_expense_tracker as $data){
		$description=$data['expense_tracker']['description'];
		$refrence_no=$data['expense_tracker']['expense_id'];
		//$refrence_no=$data['expense_tracker']['expense_id'];
		$expense_user_id = (int)$data['expense_tracker']['party_ac_head'];
		$user_id22=(int)$data['expense_tracker']['user_id'];	
		$current_datttt = $data['expense_tracker']['current_date'];	
		$ledger_id_for_view=$data['expense_tracker']['expense_head'];	
		$result_user = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($user_id22)));
		$creater_name=$result_user[0]['user']['user_name'];	
			
			
             if($subledger_id != 0)
			 {
				
		$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id_for_view)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}
 
			 }
			 else{
				 
			$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($expense_user_id)));
	foreach($subleddger_detaill as $subledger_datttaa)
	{
	$user_name = $subledger_datttaa['ledger_sub_account']['name'];
	} 	 
			 
			 }
$subledger_id = (int)@$data["ledger"]["ledger_sub_account_id"];
$ledger_id = (int)@$data["ledger"]["ledger_account_id"];

			}
			
		}
		
		
		if($table_name=="journal"){
			
			$source="Journal";
			
			$result_journal=$this->requestAction(array('controller' => 'Hms', 'action' => 'fetch_journal_table'), array('pass' => array($element_id)));
			foreach($result_journal as $data){
				$description=$data['journal']['remark'];
				$journal_id=$data['journal']['journal_id'];
				$journal_voucher_id=$data['journal']['voucher_id'];
			    //$ledger_sub_acc = (int)$data['journal']['ledger_sub_account_id'];
			    //$ledger_acc = (int)$data['journal']['ledger_account_id'];
				$user_name1='';
				$result_journal_voucher=$this->requestAction(array('controller' => 'Fns', 'action' => 'journal_info_via_voucher_id'), array('pass' => array($journal_voucher_id,$ledger_id)));
				foreach($result_journal_voucher as $data){
					$subledger_id=$data['journal']['ledger_sub_account_id'];
					$ledger_id=$data['journal']['ledger_account_id'];
					$wing_flat='';
					if($ledger_id==34 or $ledger_id==33 or $ledger_id==15 or $ledger_id==112){
							$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($subledger_id)));
							foreach($subleddger_detaill as $subledger_datttaa)
							{
							$user_name1[] = $subledger_datttaa['ledger_sub_account']['name'];
							//$ledger_id_forwingflat = (int)$subledger_datttaa['ledger_sub_account']['ledger_id'];
							}
						
					}else{
						$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id)));
						foreach($leddger_detaill as $ledger_datttaa)
						{
						$user_name1[] = $ledger_datttaa['ledger_account']['ledger_name'];
						
						}	
					}
				}
				$user_name=implode(', ',$user_name1);
				
				
			$user_id22=$data['journal']['user_id'];
	
	    $current_datttt=$data['journal']['current_date'];
			
		$user_detaillll = $this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'user_fetch'), array('pass' => array($user_id22)));		
		foreach($user_detaillll as $dataaaa){
		$creater_name = $dataaaa['user']['user_name'];
		}
			
			
	
			
			
	/*	if($subledger_id != 0)
		{
			$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($subledger_id)));
			foreach($subleddger_detaill as $subledger_datttaa)
			{
			$user_name = $subledger_datttaa['ledger_sub_account']['name'];
			$ledger_id_forwingflat = (int)$subledger_datttaa['ledger_sub_account']['ledger_id'];
			}
		}
		else
		{
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}
		}	*/
	}
}
		

		if($table_name=="fix_asset"){
			
			$source="Fixed Asset";
			$result_fix_asset=$this->requestAction(array('controller' => 'Hms', 'action' => 'fetch_fix_asset_table'), array('pass' => array($element_id)));
			foreach($result_fix_asset as $data){
			$description=$data['fix_asset']['description'];
			$expense_id=$data['fix_asset']['fix_receipt_id'];
			$prepaired_by_id = (int)$data['fix_asset']['user_id'];	
		    $current_datttt = $data['fix_asset']['current_date'];
            $ledger_id_for_view=$data['fix_asset']['asset_supplier_id'];
			$ledger_id_for_view2=(int)$data['fix_asset']['asset_category_id'];
		$user_detaill = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($prepaired_by_id)));
		foreach($user_detaill as $data){
		$creater_name = $data['user']['user_name'];
		}
		
		if($subledger_id != 0)
		{
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($ledger_id_for_view2)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			}
		}
		else
		{
			$subleddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_sub_account_detail_via_auto_id'), array('pass' => array($ledger_id_for_view)));
			foreach($subleddger_detaill as $subledger_datttaa)
			{
			$user_name = $subledger_datttaa['ledger_sub_account']['name'];
			$ledger_id_forwingflat = (int)$subledger_datttaa['ledger_sub_account']['ledger_id'];
			}
		}		
				
				
				
				
				
				
				
			}
			

		}
		if($table_name=="supplimentry_bill"){
		$wing_flat="";
          $source="Supplimentry Bill";
		  
	$result_supplimentry_bill=$this->requestAction(array('controller' => 'Hms', 'action'=>'supplimentry_bill_detail_via_supplimentry_bill_id'), array('pass' => array($element_id)));
		foreach($result_supplimentry_bill as $result_supplimentry_bill_data){
		$description=$result_supplimentry_bill_data['supplimentry_bill']['description'];
		$supplimentry_receipt=$result_supplimentry_bill_data['supplimentry_bill']['receipt_id'];
		 $supplimentry_ledger_sub_account_id=$result_supplimentry_bill_data['supplimentry_bill']['ledger_sub_account_id'];
		  $supplimentry_ledger_income_head=$result_supplimentry_bill_data['supplimentry_bill']['income_head'];
		$adhoc_id= (int)$result_supplimentry_bill_data['supplimentry_bill']['supplimentry_bill_id'];
		$date=$result_supplimentry_bill_data['supplimentry_bill']["date"];
		$creater_id = (int)$result_supplimentry_bill_data['supplimentry_bill']['created_by'];
			
	$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($creater_id)));
	foreach ($user_dataaaa as $user_detailll) 
	{
	$creater_name = $user_detailll['user']['user_name'];
	}	
	$current_datttt = date('d-m-Y',strtotime($date));	
			}
			

			
		if($subledger_id != 0)
		{   
			$leddger_detaill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'ledger_account_detail_via_auto_id'), array('pass' => array($supplimentry_ledger_income_head)));
			foreach($leddger_detaill as $ledger_datttaa)
			{
			$user_name = $ledger_datttaa['ledger_account']['ledger_name'];
			} 
			
			
		}
		else
		{  
	
			$user_id1 = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array((int)$supplimentry_ledger_sub_account_id)));

			$user_id=$user_id1['user_id'];
			$user_name=$user_id1['user_name'];
			$wing_id=(int)$user_id1['wing_id'];
			$flat_id=(int)$user_id1['flat_id'];


			$wing_flat=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'wing_flat'), array('pass' => array($wing_id,$flat_id)));

			
		}		

	}
	
		
		if(($table_name=="regular_bill"  &&  $bill_approved=="yes") || $table_name=="cash_bank" || $table_name=="opening_balance" || $table_name=="expense_tracker" || $table_name=="journal" || $table_name=="fix_asset" || $table_name=="supplimentry_bill" || $table_name=="closing_process"){
		
		if($tds_ledger_id == 15)
		{
			
		  foreach($tds_array_for_bank_payment as $tdssss_daaataa)
		  {
			$amttt = $tdssss_daaataa[0];  
			$description = $tdssss_daaataa[1];
		    $creater_name = $tdssss_daaataa[2];
			$current_datttt = $tdssss_daaataa[3];
			?> 
            <tr>
			<td><?php echo date("d-m-Y",$transaction_date); ?></td>
			<td><?php echo @$user_name; ?>  <?php echo @$wing_flat; ?></td>
            <td><?php echo @$description; ?></td>
			<td><?php echo $source; ?></td>
          	<td><?php
           if($receipt_source == "bank_payment") { 
		   echo '<a href="'.$this->webroot.'Cashbanks/bank_payment_html_view/'.$trans_id.'" target="_blank">'.$refrence_no.'</a>'; } ?>
           </td>
            <td style="text-align:right;"><?php echo $amttt; ?></td>
			<td style="text-align:right;"><?php echo $credit; ?></td>
			<td class="hide_at_print">
			<?php if(!empty($creater_name))
			{ ?>
			
			<a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $creater_name; ?><br/><b>Generated On: </b><?php echo $current_datttt ?><br/><?php if(!empty($approver_name)) { ?><b>Approved by:</b><?php echo $approver_name; ?><br/><b>on:</b> <?php echo $approved_date; } ?>" role="button"><i class="icon-exclamation-sign"></i></a>
			
			<?php } ?>
			</td>
           </tr>
			<?php
		  } 		  
		}
		else
		{
		
		?>
		<tr>
			<td><?php echo date("d-m-Y",$transaction_date); ?></td>
		    <td><?php echo @$user_name; ?>  <?php echo @$wing_flat; ?></td>
            <td><?php echo @$description; ?></td>
			<td><?php echo $source; ?></td>
            <td>
			<?php if($table_name=="regular_bill"){
				echo '<a href="'.$this->webroot.'Incometrackers/regular_bill_view/'.$element_id.'" target="_blank">'.$refrence_no.'</a>';
			}
			if($table_name=="cash_bank"){
				if($receipt_source == "bank_receipt")
				{
				echo '<a href="'.$this->webroot.'Cashbanks/bank_receipt_html_view/'.$trans_id.'" target="_blank">'.$refrence_no.'</a>';
			}else if($receipt_source == "bank_payment") { echo '<a href="'.$this->webroot.'Cashbanks/bank_payment_html_view/'.$trans_id.'" target="_blank">'.$refrence_no.'</a>'; } else if($receipt_source == "petty_cash_payment") { echo '<a href="'.$this->webroot.'Cashbanks/petty_cash_payment_html_view/'.$trans_id.'" target="_blank">'.$refrence_no.'</a>'; }else if($receipt_source == "petty_cash_receipt"){
				 echo '<a href="'.$this->webroot.'Cashbanks/petty_cash_receipt_html_view/'.$trans_id.'" target="_blank">'.$refrence_no.'</a>'; } } ?>
				 
			<?php if($table_name=="journal"){
				echo '<a href="'.$this->webroot.'Bookkeepings/journal_voucher_view/'.$journal_voucher_id.'" target="_blank">'.$journal_voucher_id.'</a>';
			}?>
				<?php if($table_name=="supplimentry_bill"){
				echo '<a href="'.$this->webroot.'Incometrackers/supplimentry_view/'.$adhoc_id.'" target="_blank">'.$supplimentry_receipt.'</a>';
			}?> 
			
			<?php if($table_name=="expense_tracker"){
				echo $refrence_no;
			}?> 
			
			<?php if($table_name=="fix_asset"){
				echo $expense_id;
			}?> 
			
			
			</td>
			<td style="text-align:right;"><?php echo $debit; ?></td>
			<td style="text-align:right;"><?php echo $credit; ?></td>
			<td class="hide_at_print">
			<?php if(!empty($creater_name))
			{ ?>
				<a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $creater_name; ?><br/><b>Generated On: </b><?php echo $current_datttt ?><br/><?php if(!empty($approver_name)) { ?><b>Approved by:</b><?php echo $approver_name; ?><br/><b>on:</b> <?php echo $approved_date; } ?>" role="button"><i class="icon-exclamation-sign"></i></a>
			<?php } ?>
			</td>
		</tr>
	<?php }}} ?>
		<tr>
			<td colspan="5" style="text-align:right;"><b>Total</b></td>
			<td style="text-align:right;"><b><?php echo $total_debit; ?></b></td>
			<td style="text-align:right;"><b><?php echo $total_credit; ?></b></td>
			<td class="hide_at_print"></td>
		</tr>
		<tr >
		<?php
					if($opening_balance!=0){
						$opening_be=explode(" ",$opening_balance);
						$opening_balance=$opening_be[0];
						if($opening_be[1]=="Dr"){
							$closing_balance=$opening_balance+$total_debit-$total_credit;
						}elseif($opening_be[1]=="Cr"){
							$closing_balance=$total_debit-$total_credit-$opening_balance;
						}
					}else{
						$closing_balance=$total_debit-$total_credit;
					}
					?>
			<td colspan="7" style="text-align:right;font-size:15px;background-color: aliceblue !important;">Closing Balance</td>
			<td style="text-align:right;font-size:15px;background-color: aliceblue !important;"><?php  echo abs($closing_balance); if($closing_balance>0){ echo " Dr."; }elseif($closing_balance<0){ echo " Cr."; } ?></td>
		</tr>
	</tbody>
</table>
</div>



<script>
jQuery('.popovers').popover({html: true});
  var $rows = $('#table tr');
  $('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

     $rows.show().filter(function() {
     var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
      return !~text.indexOf(val);
}).hide();
});
</script>	












