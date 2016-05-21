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

?>

<table border="1">
			<thead>
            <tr>
			<th colspan="6" style="text-align:center;">Account Statement <?php echo $society_name; ?> Register from : <?php echo date('d-m-Y',strtotime($from)); ?>-to:<?php echo date('d-m-Y',strtotime($to)); ?></th>
			</tr>
			<tr>
				<th>Transaction Date</th>
				<th>Reference</th>
				<th>Description</th>
				<th>Source</th>
				<th>Debit</th>
				<th>Credits</th>
				
			</tr>
			<?php 
			if(sizeof($result_ledger)==0){
				?>
				<tr>
					<td colspan="6" align="center">No Record Found for above selected period.</td>
				</tr>
               
				<?php
			}
			?>
			 </thead>
                <tbody id="table">
		<?php	
		
		   $total_credit=0; $total_debit=0;
			foreach($result_ledger as $ledger_data){ 
			
				$transaction_date=$ledger_data["ledger"]["transaction_date"];
				$table_name=$ledger_data["ledger"]["table_name"];
				$element_id=$ledger_data["ledger"]["element_id"];
				$debit=$ledger_data["ledger"]["debit"];
				$credit=$ledger_data["ledger"]["credit"];
				
				if($table_name=="opening_balance"){
					$description="Opening Balance/Arrears";
					$source="Opening balance";
					$refrence_no="";
					
				}
				if($table_name=="regular_bill"){
					$source="Regular Bill";
					$result_regular_bill=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'regular_bill_info_via_auto_id'), array('pass' => array($element_id)));
					if(sizeof($result_regular_bill)>0){
						 $refrence_no=$result_regular_bill[0]["regular_bill"]["bill_number"];
						$description = $result_regular_bill[0]["regular_bill"]["description"];
						$prepaired_by = (int)$result_regular_bill[0]["regular_bill"]["created_by"]; 
						$current_date = $result_regular_bill[0]["regular_bill"]["current_date"];
	
							$date = date('d-m-Y',strtotime($current_date));

							$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array($prepaired_by)));
							foreach ($user_dataaaa as $user_detailll) 
							{
								$creater_name = @$user_detailll['user']['user_name'];
							}	
					
					}
				
				}
				if($table_name=="cash_bank"){
					
					$element_id=$element_id;
					
					$result_cash_bank=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'bank_receipt_info_via_auto_id'), array('pass' => array($element_id)));
					//$refrence_no=@$result_cash_bank[0]["cash_bank"]["receipt_number"]; 
					$ledger_sub_account_id = (int)@$result_cash_bank[0]["cash_bank"]["ledger_sub_account_id"];
					$description = @$result_cash_bank[0]["cash_bank"]["narration"];
					$receipt_source = $result_cash_bank[0]["cash_bank"]["source"];  
					$date = $result_cash_bank[0]["cash_bank"]["created_on"];	
					$prepaired_by = (int)$result_cash_bank[0]["cash_bank"]["created_by"];	
						if($receipt_source=='bank_receipt'){
								$source="Receipt";
								$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_number"]; 
							}
							if($receipt_source=='bank_payment'){
								$source="Bank payment";
								$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_id"]; 
							}
							if($receipt_source=='petty_cash_receipt'){
								$source="Petty Cash Receipt";
								$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_id"];
							}
							if($receipt_source == "petty_cash_payment")
							{
								$source="Petty Cash Payment";
								$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_id"];
							}		
				}
				
			if($table_name=="journal"){
					
					$source="Journal";
					
					$result_journal=$this->requestAction(array('controller' => 'Hms', 'action' => 'fetch_journal_table'), array('pass' => array($element_id)));
					foreach($result_journal as $data){
						$description=$data['journal']['remark'];
						$journal_id=$data['journal']['journal_id'];
						$refrence_no=$data['journal']['voucher_id'];
					}

				}
				
				if($table_name=="expense_tracker"){

						$source="Expenses";
						$result_expense_tracker=$this->requestAction(array('controller' => 'Hms', 'action' => 'fetch_expense_tracker'), array('pass' => array($element_id)));
							foreach($result_expense_tracker as $data){
								$description=$data['expense_tracker']['description'];
								$refrence_no=$data['expense_tracker']['expense_id'];
							}

				}		
	if($table_name=='supplimentry_bill')
	{
		$source="Supplimentry Bill";
		$element_id=(int)$element_id;	
		$result_adhoc=$this->requestAction(array('controller' => 'Bookkeepings', 'action' => 'adhoc_info_via_auto_id'), array('pass' =>array($element_id)));

		$refrence_no=@$result_adhoc[0]["supplimentry_bill"]["receipt_id"]; 
		$ledger_sub_account_id = @$result_adhoc[0]["supplimentry_bill"]["ledger_sub_account_id"];
		$description = @$result_adhoc[0]["supplimentry_bill"]["description"];
		$date = $result_adhoc[0]["supplimentry_bill"]["date"];	
		$prepaired_by = (int)$result_adhoc[0]["supplimentry_bill"]["created_by"];		

	}				
				
	$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array(@$prepaired_by)));
	foreach ($user_dataaaa as $user_detailll) 
	{
	@$creater_name = @$user_detailll['user']['user_name'];
	}	
	@$dattt = date('d-m-Y',strtotime(@$date));			
		
			
				?>
					<tr>
						<td><?php echo date("d-m-Y",$transaction_date); ?></td>
						<td align="left"><?php echo $refrence_no; ?></td>
						<td><?php echo $description; ?></td>
						<td><?php echo $source; ?></td>
						
						<td style="text-align:right;"><?php echo $debit;  $total_debit+=$debit; ?></td>
						<td style="text-align:right;"><?php echo $credit; $total_credit+=$credit; ?></td>
						<!--<td>
						<?php if(!empty($creater_name))
						{
							?>
						<i class="icon-info-sign tooltips" data-placement="left" data-original-title="Created by: 
						<?php echo $creater_name; ?> on: <?php echo $dattt; ?>"></i>
						 <?php } ?>
						
						</td>  -->            
					</tr>
				
			<?php } ?>
					<tr>
						<td colspan="4" align="right"><b>Total</b></td>
						<td style="text-align:right;"><b><?php echo $total_debit; ?></b></td>
						<td style="text-align:right;"><b><?php echo $total_credit; ?></b></td>
						
					</tr>
				
                    </tbody>
		</table>