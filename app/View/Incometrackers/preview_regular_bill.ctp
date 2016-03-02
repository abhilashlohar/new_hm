<link type="text/css" rel="stylesheet" media="all" href="<?php echo $webroot_path; ?>fixed-table-rows-cols/jquery/jquery-ui.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $webroot_path; ?>fixed-table-rows-cols/css/styles.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $webroot_path; ?>fixed-table-rows-cols/css/fixed_table_rc.css" />
<script src="<?php echo $webroot_path; ?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo $webroot_path; ?>fixed-table-rows-cols/js/fixed_table_rc.js" type="text/javascript"></script>
<style>
	.dwrapper #fixed_hdr1 { width: 1500px; }
	#fixed_hdr1 th { font-weight: bold; }
	#fixed_hdr1 th, td { border-width: 1px; border-style: solid; padding: 2px 4px; }
	
	.dwrapper { padding: 2px; overflow: hidden; vertical-align: top; }
	.dwrapper div.tblWrapper { height: 300px; overflow: auto; margin-top: 10px;}
	.dwrapper div.ft_container { width: 100%; margin-top: 10px; }		
	
	body { line-height: 1.5em; }
</style>
<style>
td{
	background-color:#FFF;
	color:#000;
}
th{
	background-color: #4682B4;
}
table#fixed_hdr1 tr:hover td {
background-color: #E6ECE7 !important;
}
</style>
<script>
	$(function () {
			$('#fixed_hdr1').fxdHdrCol({
				fixedCols: 2,
				width:     '100%',
				height:    600,
				colModal: [
				<?php for($i=1; $i<=100; $i++)
				{
					if($i==1){
						?>
						{ width: 100, align: 'left' },
						<?php
					}elseif($i==2){
						?>
						{ width: 200, align: 'left' },
						<?php
					}else{
						?>
						{ width: 150, align: 'center' },
						<?php
					}
					
				}
					
				?>
				]					
			});
	});
</script>
<?php 
$income_head_array_th=$regular_bills[0]["regular_bill_temp"]["income_head_array"];
$income_head_array_th=$regular_bills[0]["regular_bill_temp"]["income_head_array"];

foreach($regular_bills as $regular_bill){
	$other_charge=$regular_bill["regular_bill_temp"]["other_charge"];
	foreach($other_charge as $key=>$value){
		$other_charge_ih_ids[]=(int)$key;
	}
}
$other_charge_ih_ids = array_unique($other_charge_ih_ids);

?>
<table class="table table-condensed table-hover" id="fixed_hdr1">
									<thead>
										<tr>
											<th>Unit</th>
											<th>Member Name</th>
											<?php foreach($income_head_array_th as $income_head=>$amount){ ?>
											<th><?php echo $income_head; ?></th>
											<?php } ?>
											<th>Noc</th>
											<?php foreach($other_charge_ih_ids as $other_charge_ih_id){ ?>
											<th><?php echo $other_charge_ih_id; ?></th>
											<?php } ?>
											<th>Total</th>
											<th>arrear_maintenance</th>
											<th>arrear_intrest</th>
											<th>intrest_on_arrears</th>
											<th>credit_stock</th>
											<th>due_for_payment</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($regular_bills as $regular_bill){ 
									$ledger_sub_account_id=$regular_bill["regular_bill_temp"]["ledger_sub_account_id"];
									$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
									$income_head_array=$regular_bill["regular_bill_temp"]["income_head_array"];
									$noc_charge=$regular_bill["regular_bill_temp"]["noc_charge"];
									$other_charge=$regular_bill["regular_bill_temp"]["other_charge"];
									$total=$regular_bill["regular_bill_temp"]["total"];
									$arrear_maintenance=$regular_bill["regular_bill_temp"]["arrear_maintenance"];
									$arrear_intrest=$regular_bill["regular_bill_temp"]["arrear_intrest"];
									$intrest_on_arrears=$regular_bill["regular_bill_temp"]["intrest_on_arrears"];
									$credit_stock=$regular_bill["regular_bill_temp"]["credit_stock"];
									$due_for_payment=$regular_bill["regular_bill_temp"]["due_for_payment"];
									$other_charge_key=array(); 
									foreach($other_charge as $key=>$value){
										$other_charge_key[]=$key;
									}?>
										<tr>
											<td><?php echo $member_info["wing_name"]."-".$member_info["flat_name"]; ?></td>
											<td><?php echo $member_info["user_name"]; ?></td>
											<?php foreach($income_head_array as $income_head=>$amount){ ?>
											<td><?php echo $income_head; ?></td>
											<?php } ?>
											<td><?php echo $noc_charge; ?></td>
											<?php foreach($other_charge_ih_ids as $other_charge_ih_id){ 
											if (in_array($other_charge_ih_id, $other_charge_key)){?>
											<td><?php echo $other_charge_ih_id; ?></td>
											<?php }else{ ?>
											<td>00</td>
											<?php }} ?>
											<td><?php echo $total; ?></td>
											<td><?php echo $arrear_maintenance; ?></td>
											<td><?php echo $arrear_intrest; ?></td>
											<td><?php echo $intrest_on_arrears; ?></td>
											<td><?php echo $credit_stock; ?></td>
											<td><?php echo $due_for_payment; ?></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
