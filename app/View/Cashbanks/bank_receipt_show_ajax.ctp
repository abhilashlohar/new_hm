<div class="portlet box">
	<div class="portlet-body">
	<?php
	$society_name=$society_info[0]["society"]["society_name"];
	?>
		<div align="center"><?php echo strtoupper($society_name); ?> Bank Receipt Register From : <?php echo date("d-m-Y",$from);?> To : <?php echo date("d-m-Y",$to);?></div>
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Number</th>
					<th>Transaction date</th>
					<th>Receipt Type</th>
					<th>Party Name</th>
					<th>Deposited in</th>
					<th>Payment Mode</th>
					<th>Instrument/UTR</th>
					<th>Narration</th>
					<th>Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($receipts as $receipt){
			
				$auto_id=$receipt["cash_bank"]["auto_id"];
				$receipt_number=$receipt["cash_bank"]["receipt_number"];
				$transaction_date=$receipt["cash_bank"]["transaction_date"];
				$received_from = $receipt['cash_bank']['received_from'];
				if($received_from == "residential")
				{
				$receipt_type=$receipt["cash_bank"]["receipt_type"];
				$ledger_sub_account_id=$receipt["cash_bank"]["ledger_sub_account_id"];
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				$user_name=$member_info["user_name"];
				$wing_name=$member_info["wing_name"];
				$flat_name=$member_info["flat_name"];
				}
				else
				{
					$receipt_type="";
				$ledger_sub_account_id=$receipt["cash_bank"]["ledger_sub_account_id"];	
				$result_ledger_sub_account = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id)));
				foreach($result_ledger_sub_account as $data)
				{
				$user_name = $data['ledger_sub_account']['name'];	
				}
				
				
				
				
				}
				$deposited_in=$receipt["cash_bank"]["deposited_in"];
				$deposited_in_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($deposited_in)));
				
				$bank_name=$deposited_in_info[0]["ledger_sub_account"]["name"];
				$bank_account=$deposited_in_info[0]["ledger_sub_account"]["bank_account"];
				$receipt_mode=$receipt["cash_bank"]["receipt_mode"];
				$cheque_number=$receipt["cash_bank"]["cheque_number"];
				$narration=$receipt["cash_bank"]["narration"];
				$amount=$receipt["cash_bank"]["amount"];?>
				<tr>
					<td><?php echo $receipt_number; ?></td>
					<td><?php echo date("d-m-Y",$transaction_date); ?></td>
					<td><?php echo $receipt_type; ?></td>
					<td>
					<?php if($received_from == "residential"){ ?>
					<?php echo $user_name.' ('.$wing_name.' - '.$flat_name.')'; ?> <?php }else { ?>
					<?php echo $user_name; ?>
					<?php } ?>
					</td>
					<td><?php echo $bank_name.' - '.$bank_account; ?></td>
					<td><?php echo $receipt_mode; ?></td>
					<td><?php echo $cheque_number; ?></td>
					<td><?php echo $narration; ?></td>
					<td style="text-align: right;"><?php echo $amount; ?></td>
					<td>
						<div class="btn-group" style="margin: 0px !important;">
							<a class="btn blue mini" href="#" data-toggle="dropdown">
							<i class="icon-chevron-down"></i>	
							</a>
							<ul class="dropdown-menu" style="min-width:80px !important;left:-53px;padding: 3px 0px; box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.3); font-size: 12px;">
							<li><a href="bank_receipt_html_view/<?php echo $auto_id; ?>" target="_blank"><i class="icon-search"></i>View</a></li>
							</ul>
						</div>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
