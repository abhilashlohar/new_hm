<div class="portlet box">
	<div class="portlet-body">
	<?php
	$society_name=$society_info[0]["society"]["society_name"];
	?>
		<div align="center"><?php echo strtoupper($society_name); ?> Bank Receipt Register From : <?php echo date("d-m-Y",$from);?> To : <?php echo date("d-m-Y",$to);?>
		
		<input class="m-wrap medium pull-right hide_at_print" placeholder="Search" id="search" style="height: 15px; margin-bottom: 4px; font-size: 12px;padding: 4px !important;" type="text">
		<div class="pull-right hide_at_print">
		<a href="bank_receipt_excel?from=<?php echo $from;?>&to=<?php echo $to; ?>" class="btn green mini tooltips " data-placement="left" data-original-title="Download in excel"><i class="fa fa-file-excel-o"></i></a>
		<a class="btn blue mini" onclick="window.print()"><i class="icon-print"></i></a>
		</div>
		</div>
		
		<table class="table table-condensed table-bordered" id="receiptmain">
			<thead>
				<tr>
					<th>Receipt No.</th>
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
			     <?php $total=0; ?> 
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
					$receipt_type="Non Residential";
				$ledger_sub_account_id=$receipt["cash_bank"]["ledger_sub_account_id"];	
				$result_ledger_sub_account = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id)));
				foreach($result_ledger_sub_account as $data)
				{
				$user_name = $data['ledger_sub_account']['name'];	
				}
				
				
				
				
				}
				$created_by = $receipt['cash_bank']['created_by'];
				$created_on = @$receipt['cash_bank']['created_on'];
				$creator_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array($created_by)));
				$creator_name=$creator_info["user_name"];
				
				$deposited_in=$receipt["cash_bank"]["deposited_in"];
				$deposited_in_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($deposited_in)));
				
				$bank_name=$deposited_in_info[0]["ledger_sub_account"]["name"];
				$bank_account=$deposited_in_info[0]["ledger_sub_account"]["bank_account"];
				$receipt_mode=$receipt["cash_bank"]["receipt_mode"];
				$cheque_number=$receipt["cash_bank"]["cheque_number"];
				$narration=$receipt["cash_bank"]["narration"];
				$amount=$receipt["cash_bank"]["amount"];
				$total=$total+$amount;
				?>
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
					<td style="text-align: right;"><?php $amount_for_view=number_format($amount); echo $amount_for_view; ?></td>
					<td>
						<div class="btn-group" style="margin: 0px !important;">
							<a class="btn blue mini" href="#" data-toggle="dropdown">
							<i class="icon-chevron-down"></i>	
							</a>
							<ul class="dropdown-menu" style="min-width:80px !important;left:-53px;padding: 3px 0px; box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.3); font-size: 12px;">
							<li><a href="bank_receipt_html_view/<?php echo $auto_id; ?>" target="_blank"><i class="icon-search"></i>View</a></li>
							<?php if($receipt_type!="maintenance"){ ?>
							<li><a href="b_receipt_edit/<?php echo $auto_id; ?>" target="_blank"><i class="icon-search"></i>Edit</a></li>
							<?php } ?>
							</ul>
						</div>
						<i class="icon-info-sign tooltips " data-placement="left" data-original-title="Created by: <?php echo $creator_name; ?> On: <?php echo $created_on; ?>" style="cursor: default;"></i>
					</td>
				</tr>
			<?php } ?>
			<tr>
			<th colspan="8" style="text-align:right;">Total</td>
			<th style="text-align:right;"><?php $total_for_view=number_format($total); echo $total_for_view; ?></th>
			<th></th>
			</tbody>
			<tfoot style="font-weight: 600;">
				<tr>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<script>
$(document).ready(function(){
	/* var tr=1; 
	$('#receiptmain thead tr th').each(function(i, obj) {
		var total=0;
		$('#receiptmain tbody tr td:nth-child('+tr+')').each(function(i, obj) {
			var value=parseInt($(this).text());
			if($.isNumeric(value)){ }else{ value=0; }
			total=total+value;
		});
		$('#receiptmain tfoot tr').append('<td style="text-align: right;">'+total+'</td>');
		tr++;
	});
	$('#receiptmain tfoot tr td:lt(7)').remove();
	$('#receiptmain tfoot tr td:first').attr("colspan",8).html('<b>Total</b>');
	$('#receiptmain tfoot tr td:last').html("");
	*/
	
	var $rows = $('#receiptmain tbody tr');
	$('#search').keyup(function() {
		var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

		$rows.show().filter(function() {
			var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
			return !~text.indexOf(val);
		}).hide();
	});

}); 

 </script>	

