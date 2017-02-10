
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
<style>
.er{
color: rgb(198, 4, 4);
font-size: 11px;
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

<div style="background-color:#fff;" align="center">
 
<?php

//$opening_balance=$this->requestAction(array('controller' => 'Fns', 'action' => 'calculate_opening_balance_for_ledger'), array('pass' => array($ledger_account_id,$ledger_sub_account_id,strtotime($from))));
?>
<input class="m-wrap medium pull-right hide_at_print" placeholder="Search" id="search" style="height: 15px; margin-bottom: 4px; font-size: 12px;padding: 4px !important;" type="text">
<table width="100%" class="table table-bordered " id="receiptmain">
	<thead>
		<tr>
			<th>Transaction Date</th>
			<th>Corresponding a/c </th>
            <th>Description</th>
			<th>Source</th>
            <th>Reference</th>
			<th>Debit</th>
			<th>Credit</th>
			<th style="width: 200px;">Passbook Date</th>
		</tr>
	</thead>
	<tbody id="table">
	
	<?php 
	$i=0; $total_debit=0; $total_credit=0; 
	foreach($result_bank_reconciliation as $data){ $i++;
	$auto_id=(int)$data["bank_reconciliation"]["auto_id"];
	$debit=$data["bank_reconciliation"]["debit"];
	$credit=$data["bank_reconciliation"]["credit"];
	$transaction_date=$data["bank_reconciliation"]["transaction_date"];
	$table_name=$data["bank_reconciliation"]["table_name"]; 
	$element_id=(int)$data["bank_reconciliation"]["element_id"];
	$subledger_id = (int)@$data["bank_reconciliation"]["ledger_sub_account_id"];
	$ledger_id = (int)@$data["bank_reconciliation"]["ledger_account_id"];
	
	$total_debit=$total_debit+$debit;
	$total_credit=$total_credit+$credit;
	if($table_name=="cash_bank"){  
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
    }elseif($receipt_source == "bank_payment")
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
	}elseif($receipt_source == "petty_cash_receipt")
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

	}elseif($receipt_source == "petty_cash_payment")
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



		
		}elseif($table_name=="journal"){
			
			$source="Journal";
			
			$result_journal=$this->requestAction(array('controller' => 'Hms', 'action' => 'fetch_journal_table'), array('pass' => array($element_id)));
			foreach($result_journal as $data){
				$description=$data['journal']['remark'];
				$journal_id=$data['journal']['journal_id'];
				$journal_voucher_id=$data['journal']['voucher_id'];
			   
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
			
		
	
	}
}
		
		
		?>
		<tr >
			<td><?php echo date("d-m-Y",$transaction_date); ?></td>
		    <td><?php echo @$user_name; ?>  <?php echo @$wing_flat; ?></td>
            <td><?php echo @$description; ?></td>
			<td><?php echo $source; ?></td>
            <td>
			<?php 
			if($table_name=="cash_bank"){
				if($receipt_source == "bank_receipt")
				{
				echo '<a href="'.$this->webroot.'Cashbanks/bank_receipt_html_view/'.$trans_id.'" target="_blank">'.$refrence_no.'</a>';
			}else if($receipt_source == "bank_payment") { echo '<a href="'.$this->webroot.'Cashbanks/bank_payment_html_view/'.$trans_id.'" target="_blank">'.$refrence_no.'</a>'; } else if($receipt_source == "petty_cash_payment") { echo '<a href="'.$this->webroot.'Cashbanks/petty_cash_payment_html_view/'.$trans_id.'" target="_blank">'.$refrence_no.'</a>'; }else if($receipt_source == "petty_cash_receipt"){
				 echo '<a href="'.$this->webroot.'Cashbanks/petty_cash_receipt_html_view/'.$trans_id.'" target="_blank">'.$refrence_no.'</a>'; } } ?>
				 
			<?php if($table_name=="journal"){
				echo '<a href="'.$this->webroot.'Bookkeepings/journal_voucher_view/'.$journal_voucher_id.'" target="_blank">'.$journal_voucher_id.'</a>';
			}?>
				
			
			</td>
			<td style="text-align:right;"><?php echo $debit; ?></td>
			<td style="text-align:right;"><?php echo $credit; ?></td>
			
			<td>
		
			<input type="text" class="m-wrap span8 pull-left date-picker" placeholder="Date" name="pass_book" data-date-format="dd-mm-yyyy">
			<a href="#" class="btn blue icn-only move_match" role="button" bank_id="<?php echo $auto_id; ?>" >	 
			<i class="m-icon-swapright m-icon-white"></i></a>
		
		   </td>
			
			
		</tr>
	<?php } ?>
		<tr>
			<td colspan="5" style="text-align:right;"><b>Total</b></td>
			<td style="text-align:right;"><b><?php echo $total_debit; ?></b></td>
			<td style="text-align:right;"><b><?php echo $total_credit; ?></b></td>
			<td></td>
		</tr>
		
	</tbody>
</table>

<a class="btn blue button-next" id="continue" >Continue <i class="m-icon-swapright m-icon-white"></i></a>


<div id="reconciliation_form" style="display:none;"> 

<!---- reconciliation form --->
<h3>Reconciliation Form</h3>

<div class="portlet box">
	<div class="portlet-body">
	<form method="post" id="myForm">
		<table class="table table-condensed table-bordered" id="main">
			<thead>
				<tr>
					<th width="130px">Passbook Date <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="50px">Bank name <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="150px">Check number/Neft <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="150px">Deposit amount <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="150px" >Withdraw Amount <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
					<th width="" >Narration</th>
				</tr>
			</thead>
			<tbody>
				
				
			</tbody>
		</table>
		<button type="submit" class="btn blue pull-right" name="submit">Submit</button>
	</form>
		<!--<a href="#" role="button" id="add_row" class="btn"><i class="icon-plus"></i> Add Row</a>-->
	</div>
</div>

<table id="sample" style="display:none;">
<tbody>
	<tr>
		<td>
			<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy"  value="" name="passbook_date[]" placeholder="Passbook date">
		</td>
		<td>
				<select class="medium m-wrap"  name="bank_name[]" style="width:130px !important;">
				<option value="" style="display:none;width:50px;">Select Bank</option>
					<?php
						 foreach($result_ledger_sub_account as $data){
							 
							  $ledger_sub_ac_id=$data['ledger_sub_account']['auto_id'];
							  $bank_name=$data['ledger_sub_account']['name'];
							 ?>
						  
								<option value="<?php echo $ledger_sub_ac_id; ?>"><?php echo $bank_name; ?> </option>
						  
					<?php } ?>
				</select>
		</td>
		<td>
			
			<input type="text" placeholder="Cheque/Utr No." class="m-wrap span12" name="cheque_number[]">
					
		</td>
		<td>
			<!--<select class="medium m-wrap "  name="transection_type[]" style="width:150px !important;">
					<option value="" style="display:none;">Select transection type</option>
						<option value="Deposit">Deposited</option>
						<option value="Withdraw">Withdraw</option>
					
			</select>-->
			<input type="text" class="m-wrap span12" placeholder="Amount" name="deposit_amount[]">
			
		</td>
		<td>
			<input type="text" class="m-wrap span12" placeholder="Amount" name="withdraw_amount[]">
		</td>
		<td>
		
			<input type="text" class="m-wrap span11 pull-left" placeholder="Narration" name="narration[]">
		<div style="margin-top: -4px; margin-right: -5px;font-size: 14px !important;" class="pull-right">

			<a style="" role="button" class="btn mini  remove_row" href="#"><i class="icon-trash"></i></a><br>
			<a href="#" class="btn mini add_row" role="button">	 
			<i class="icon-plus"></i></a>
		</div>
		</td>
	</tr>
</tbody>
</table>




<!-----  end ---->

</div>

<div id="reconciliation_report_main" style="display:none;">

<!-- reconciliation report --->
<br>

<center>
<h3>Reconciliation Report</h3>
<form method="post" onSubmit="return valid()">
<div  class="hide_at_print">
        <table style="">
        <tr>
        
				<td>
						<select class="medium m-wrap chosen" id="ledger_account1">
						<option value="" style="display:none;">Select Bank A/c</option>
						<?php
						 foreach($result_ledger_sub_account as $data){
							 
							  $ledger_sub_ac_id=$data['ledger_sub_account']['auto_id'];
							  $bank_name=$data['ledger_sub_account']['name'];
							 ?>
                          
								<option value="<?php echo $ledger_sub_ac_id; ?>"><?php echo $bank_name; ?> </option>
						  
						  <?php } ?>
						</select>
				</td>
		
				<td>
				<input type="text" placeholder="To" id="date2" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="to" style="background-color:white !important; margin-top:7px;" value="<?php echo date("d-m-Y"); ?>">
				</td>
		
				<td valign="top">
				<button type="button" id="go_1" name="sub" class="btn yellow" style="margin-top:7px;">Search</button>
				</td>
		</tr>
</table>
</div>
</form>
</center>

<div id="ledger_view" style="width:100%;">
</div>

</div>


<!-- end code --->

</div>

<script>
$(document).ready(function() {
	$(".move_match").bind('click',function(){
		var z=$(this);
		var date=$(this).closest('tr').find('input').val();
		var bank_id=$(this).attr("bank_id");
		$.ajax({
			url: "bank_reconciliation_update/"+bank_id+"/"+date,
		}).done(function(response) { 
			if(response=="done"){ 
				z.closest('tr').remove();
			}
			
		});
		
	});
	
	$("#continue").bind('click',function(){
		$(this).hide();
		$("#reconciliation_form").show();
	});
	
	
	
	var $rows = $('#receiptmain tbody tr');
	$('#search').keyup(function() {
		var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

		$rows.show().filter(function() {
			var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
			return !~text.indexOf(val);
		}).hide();
	});
	
<!-- Reconciliation form code ---->
	
	add_row();
	$(".add_row").die().live("click",function(){
		add_row();
	});
	
	$(".remove_row").die().live("click",function(){
		$(this).closest("tr").remove();
	})
	
	function add_row(){
		var new_line=$("#sample tbody").html();
		$("#main tbody").append(new_line);
		$('#main tbody tr:last select[name="bank_name[]"]').chosen();
		$('#main tbody tr:last select[name="transection_type[]"]').chosen();
		$('#main tbody tr:last input[name="passbook_date[]"]').datepicker();
	}
	
	
	$("form").die().on("submit",function(e){
		var allow="yes";
		
		
		
		$('#main tbody tr input[name="passbook_date[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		
		$('#main tbody tr input[name="cheque_number[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		
	$('#main tbody tr').die().each(function(i, obj) {
		var deposit_amount=$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').val();
		var withdraw_amount=$('#main tbody tr:eq('+i+') td').find('input[name="withdraw_amount[]"]').val();
		if(deposit_amount && withdraw_amount ){
			$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').closest('td').find(".er").remove();
			$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').closest('td').append('<span class="er">only one amount required</span>');
			allow="no";
		}else{
			$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').closest('td').find(".er").remove();
		}
		if(!deposit_amount && !withdraw_amount ){
			$('#main tbody tr:eq('+i+') td').find('input[name="deposit_amount[]"]').closest('td').append('<span class="er">one amount required</span>');
			allow="no";
		}
	});
		
		$('#main tbody tr select[name="bank_name[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});
		
		
		if(allow=="no"){
			e.preventDefault();
		}else{
			$("button[name=submit]").hide();	
		}
		
	});
	
		
	$('select[name="bank_name[]"]').die().live("change",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	$('input[name="passbook_date[]"]').die().live("change",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	
	$('input[name="cheque_number[]"]').die().live("keyup blur",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	$('select[name="transection_type[]"]').die().live("change",function(){
		var ledger_sub_account=$(this).val();
		if(ledger_sub_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});
	
	$('input[name="deposit_amount[]"]').die().live("keyup blur",function(){
		var amount=$(this).val();
		
		$(this).val($(this).val().toString().replace(/^[0-9]\./g, ',')
    .replace(/\./g, ''));
			if($.isNumeric(amount))
		{
		}else{
		$(this).val('');	
		}
	});
	
 <!-- end code ---->
 
 <!-- Reconciliation report code --->
 
		$("#go_1").bind('click',function(){
			var ledger_account_id = $('#ledger_account').val();
			//var from=$('#date1').val();
		    var to=$('#date2').val();
			$("#ledger_view").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("reconciliation_report_ajax/" +ledger_account_id+ "/" +to+"");
		});
 
 
 
 
 <!--end --->
 
 
 
	
});










</script>


