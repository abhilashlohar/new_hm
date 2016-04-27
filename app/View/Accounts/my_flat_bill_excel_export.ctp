<?php 
$sss_namm = str_replace(' ','-',$society_name);	
$filename="".$sss_namm."_My_Flat_Register_".$from."_".$to."";

header ("Expires: 0");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );


foreach($result_ledger as $ledger_data){
	$table_name=$ledger_data["ledger"]["table_name"];
	$debit=$ledger_data["ledger"]["debit"];
	$credit=$ledger_data["ledger"]["credit"];
	//$credit=$ledger_data["ledger"]["credit"];
	$arrear_int_type=@$ledger_data["ledger"]["arrear_int_type"];
	if($table_name=="opening_balance"){
		if($arrear_int_type=="YES"){
			$opening_balance_int=$debit+$credit;
		}else{
			$opening_balance=$debit+$credit;
		}
	}
}

?>
	<table border="1">
		<tr>
			
				<th>Date</th>
				<th>Reference</th>
				<th>Type</th>
				<th>Description</th>
				<th>Maint. Charges</th>
				<th>Interest</th>
				<th>Credits</th>
				<th>Account Balance</th>
			
		</tr>
		<?php
       
		$account_balance=0; $total_maint_charges=0; $total_interest=0; $total_credits=0;  $total_account_balance=0; 
			foreach($result_ledger as $ledger_data){ 
				$credits = "";
				$creater_name = "";
				$prepaired_by = "";
				$transaction_date=$ledger_data["ledger"]["transaction_date"];
				$table_name=$ledger_data["ledger"]["table_name"];
				$element_id=$ledger_data["ledger"]["element_id"];
				$debit=$ledger_data["ledger"]["debit"];
				$credit=$ledger_data["ledger"]["credit"];
				$credit=$ledger_data["ledger"]["credit"];
				$arrear_int_type=@$ledger_data["ledger"]["arrear_int_type"];
				$intrest_on_arrears=@$ledger_data["ledger"]["intrest_on_arrears"];
				if($table_name=="opening_balance"){
					$description="Opening Balance/Arrears";
					$refrence_no="";
					if($arrear_int_type=="YES"){
						$maint_charges="";
						$interest=$debit+$credit;
						$account_balance=$account_balance+(int)$interest;
					}else{
						$interest="";
						$maint_charges=$debit+$credit;
						$account_balance=$account_balance+(int)$maint_charges;
					}
					$credits="";
					
					
				}
				if($table_name=="regular_bill"){
					$result_regular_bill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'regular_bill_info_via_auto_id'), array('pass' => array($element_id)));
					if(sizeof($result_regular_bill)>0){
						$bill_approved="yes";
						$refrence_no = $result_regular_bill[0]["regular_bill"]["bill_number"];
						$description = $result_regular_bill[0]["regular_bill"]["description"];
						$prepaired_by = (int)$result_regular_bill[0]["regular_bill"]["created_by"]; 
						$current_date = $result_regular_bill[0]["regular_bill"]["current_date"];
	
				       $date = date('d-m-Y',strtotime($current_date));
					}
					
					
					if($intrest_on_arrears=="YES"){
						$maint_charges="";
						$interest=$debit+$credit;
						$account_balance=$account_balance+(int)$interest;
					}else{
						$interest="";
						$maint_charges=$debit+$credit;
						$account_balance=$account_balance+(int)$maint_charges;
					}
					$credits="";
				}
				if($table_name=="cash_bank"){
					
					$element_id=$element_id;
					
					$result_cash_bank=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'receipt_info_via_auto_id'), array('pass' => array($element_id)));
					 $source_type=@$result_cash_bank[0]["cash_bank"]["source"]; 
					 if($source_type=='petty_cash_receipt'){
						 $table_show_receipt="petty_cash_receipt_html_view";
						 $refrence_no=@$result_cash_bank[0]["cash_bank"]["receipt_id"];
						 $prepaired_by = (int)$result_cash_bank[0]["cash_bank"]["prepaired_by"];	
						 $date = $result_cash_bank[0]["cash_bank"]["current_date"];
					 }else{
						 $prepaired_by = (int)$result_cash_bank[0]["cash_bank"]["created_by"];
						 $refrence_no=@$result_cash_bank[0]["cash_bank"]["receipt_number"];
						 $table_show_receipt="bank_receipt_html_view";
						 $date = $result_cash_bank[0]["cash_bank"]["created_on"];
					 }
				     
					$ledger_sub_account_id = (int)@$result_cash_bank[0]["cash_bank"]["ledger_sub_account_id"];
					$description = @$result_cash_bank[0]["cash_bank"]["narration"];
					$interest="";
					$maint_charges="";
					$credits=$debit+$credit;
					$account_balance=$account_balance-(int)$credits;
				} 
				if($table_name=='supplimentry_bill')
				{
				$element_id=$element_id;	
				$result_adhoc=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'adhoc_info_via_auto_id'), array('pass' => array($element_id)));
			
	$refrence_no=@$result_adhoc[0]["supplimentry_bill"]["receipt_id"]; 
	$ledger_sub_account_id = @$result_adhoc[0]["supplimentry_bill"]["ledger_sub_account_id"];
	$description = @$result_adhoc[0]["supplimentry_bill"]["description"];
	$date = $result_adhoc[0]["supplimentry_bill"]["date"];	
	$prepaired_by = (int)$result_adhoc[0]["supplimentry_bill"]["created_by"];
			
			
               $maint_charges=$debit+$credit;
			   $interest="";
			   $account_balance=$account_balance+(int)$maint_charges;
				}

$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array(@$prepaired_by)));
foreach ($user_dataaaa as $user_detailll) 
{
@$creater_name = @$user_detailll['user']['user_name'];
}	
@$dattt = date('d-m-Y',strtotime(@$date));	


				
				$total_maint_charges=$total_maint_charges+(int)$maint_charges;
				$total_interest=$total_interest+(int)$interest;
				$total_credits=$total_credits+(int)$credits;
				?>
					<tr>
						<td><?php echo date("d-m-Y",$transaction_date); ?></td>
						<td>
						<?php if($table_name=="regular_bill"){
							echo $refrence_no;
						}
						if($table_name=="cash_bank"){
							echo $refrence_no;
						} 
						if($table_name=="supplimentry_bill"){
						echo $refrence_no;	
						}
						?>
						</td>
						<td>
						<?php if($table_name=="regular_bill"){
						echo "Regular Bill";
						}
						if($table_name=="cash_bank"){
							echo "Bank Receipt";
						}
						if($table_name=="supplimentry_bill")
						{
							echo "Supplimentry Bill";
						}
						?>
						</td>
						<td><?php echo $description; ?></td>
						<td style="text-align:right;"><?php echo $maint_charges; ?></td>
						<td style="text-align:right;"><?php echo $interest; ?></td>
						<td style="text-align:right;"><?php echo $credits; ?></td>
						<td style="text-align:right;"><?php echo $account_balance; ?></td>
						
					</tr>
				
			<?php } ?>
					<tr>
						<td colspan="4" align="right"><b>Total</b></td>
						<td style="text-align:right;"><b><?php echo $total_maint_charges; ?></b></td>
						<td style="text-align:right;"><b><?php echo $total_interest; ?></b></td>
						<td style="text-align:right;"><b><?php echo $total_credits; ?></b></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="7" align="right" style="color:#33773E;"><b>Closing Balance</b></td>
						<td style="color:#33773E; text-align:right;"><b><?php echo $account_balance; ?></b></td>
					</tr> 
		
		
		
	</table>
	