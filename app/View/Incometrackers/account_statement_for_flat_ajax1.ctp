<div style="overflow: auto;">
<a href="<?php echo $webroot_path; ?>Incometrackers/account_statement_for_flat_excel1/<?php echo $ledger_sub_account_id; ?>/<?php echo $from; ?>/<?php echo $to; ?>" class="btn mini blue pull-right hide_at_print" style="margin-left: 2px;"><i class="icon-download"></i></a>
<a href="#" role="button" class="btn mini purple pull-right hide_at_print" style="margin-left: 2px;" onclick="window.print();"><i class="fa fa-print"></i></a>
</div>
<?php
	foreach($result_society as $data){
	$society_name=@$data["society"]["society_name"];
	$society_reg_num=@$data["society"]["society_reg_num"];
	$society_address=@$data["society"]["society_address"];
	$society_email=@$data["society"]["society_email"];
	$society_phone=@$data["society"]["society_phone"];
	} 
?>


	<div align="center" style="color:#606060;">
		<h4 style="color:#5D9B5D;"><b><?php echo strtoupper($society_name); ?></b></h4>
		Regn # <?php echo $society_reg_num; ?><br/>
		
		Email: <?php echo $society_email; ?> | Phone : <?php echo $society_phone; ?>
	</div>
	<div class="row-fluid" style="font-size:14px;">
		<div class="span6">
			For : <?php echo $user_name; ?> (<?php echo $wing_flat; ?>)
		</div>
		<div class="span6" align="right">
			<span style="font-size:16px;">Statement of Account</span><br/>
			<span style="font-size:12px;">From <?php echo date("d-m-Y",strtotime($from)); ?> to <?php echo date("d-m-Y",strtotime($to)); ?></span>
		</div>
	</div>
	
	<div>
	<?php
	$opening_balance=$this->requestAction(array('controller' => 'Fns', 'action' => 'calculate_opening_balance'), array('pass' => array(34,$ledger_sub_account_id,strtotime($from))));
	?>
	<div class="pull-right" style="text-align:right;font-size:15px;padding:5px;">Opening Balance: <?php echo $opening_balance; ?></div>
		<table width="100%" class="table table-bordered table-condensed">
			<thead>
            <tr>
				<th>Transaction Date</th>
				<th>Reference</th>
				<th>Description</th>
				<th>Source</th>
				<th>Debit</th>
				<th>Credits</th>
				<th class="hide_at_print"></th>
			</tr>
			<?php 
			if(sizeof($result_ledger)==0){
				?>
				<tr>
					<td colspan="7" align="center">No Record Found for above selected period.</td>
				</tr>
               
				<?php
			}
			?>
			 </thead>
                <tbody id="table">
		<?php	
		
		   $total_credit=0; $total_debit=0; $closing_balance="";
			foreach($result_ledger as $ledger_data){ 
			    $intrest_on_arrears="";
				$transaction_date=$ledger_data["ledger"]["transaction_date"];
				$table_name=$ledger_data["ledger"]["table_name"];
				$element_id=$ledger_data["ledger"]["element_id"];
				$debit=$ledger_data["ledger"]["debit"];
				$credit=$ledger_data["ledger"]["credit"];
				
		if($table_name=="opening_balance"){
			@$intrest_on_arrears=@$ledger_data['ledger']['intrest_on_arrears'];
				if(@$intrest_on_arrears=="YES"){
				$description="Opening Balance/Penalty";
				}else{
				$description="Opening Balance/Arrears";
				}
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
			$receipt_source = @$result_cash_bank[0]["cash_bank"]["source"];  
			$date = @$result_cash_bank[0]["cash_bank"]["created_on"];	
			$prepaired_by = (int)@$result_cash_bank[0]["cash_bank"]["created_by"];	
				if($receipt_source=='bank_receipt'){
					$source="Receipt";
					$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_number"]; 
					}
					if($receipt_source=='petty_cash_receipt'){
						$source="Petty Cash Receipt";
						$refrence_no=$result_cash_bank[0]["cash_bank"]["receipt_number"];
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
						
		if($table_name=='supplimentry_bill'){
			$source="Supplimentry Bill";
			$element_id=(int)$element_id;	
			$result_adhoc=$this->requestAction(array('controller' => 'Bookkeepings','action' => 'adhoc_info_via_auto_id'), array('pass' =>array($element_id)));
			$refrence_no=@$result_adhoc[0]["supplimentry_bill"]["receipt_id"]; 
			$ledger_sub_account_id = @$result_adhoc[0]["supplimentry_bill"]["ledger_sub_account_id"];
			$description = @$result_adhoc[0]["supplimentry_bill"]["description"];
			$date = $result_adhoc[0]["supplimentry_bill"]["date"];	
			$prepaired_by = (int)$result_adhoc[0]["supplimentry_bill"]["created_by"];		
		}				
				
	$user_dataaaa = $this->requestAction(array('controller' => 'hms', 'action' => 'user_fetch'),array('pass'=>array(@$prepaired_by)));
	foreach ($user_dataaaa as $user_detailll){
	@$creater_name = @$user_detailll['user']['user_name'];
	}	
	@$dattt = date('d-m-Y',strtotime(@$date));			
		
			
				?>
					<tr>
						<td><?php echo date("d-m-Y",$transaction_date); ?></td>
						<td><?php echo $refrence_no; ?></td>
						<td><?php echo $description; ?></td>
						<td><?php echo $source; ?></td>
						
						<td style="text-align:right;"><?php echo $debit;  $total_debit+=$debit; ?></td>
						<td style="text-align:right;"><?php echo $credit; $total_credit+=$credit; ?></td>
						<td class="hide_at_print">
						<?php if(!empty($creater_name)) { ?>
						<a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $creater_name ?><br/><b>Generated On: </b><?php echo $dattt; ?>" role="button"><i class="icon-exclamation-sign"></i></a>
						<?php } ?>
						</td>            
					</tr>
				
			<?php } ?>
			
					<tr>
						<td colspan="4" style="text-align:right;"><b>Total</b></td>
						<td style="text-align:right;"><b><?php echo $total_debit; ?></b></td>
						<td style="text-align:right;"><b><?php echo $total_credit; ?></b></td>
						<td class="hide_at_print"></td>
					</tr>
					<tr>
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
	                <td colspan="4" style="text-align:right;font-size:15px;">Closing Balance</td>
					<td colspan="2" style="text-align:right;font-size:15px;"><?php echo abs($closing_balance); if($closing_balance>0){ echo " Dr."; }elseif($closing_balance<0){ echo " Cr."; } ?></td>
					<td class="hide_at_print"></td>					
     				</tr>
				    </tbody>
		</table>
	</div>

<script>
jQuery('.popovers').popover({html: true});

</script>


	