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
	
	body { line-height: 1.5em; margin: 0px;}
</style>
<style>
td{
	background-color:#FFF;
	color:#000;
}
th{
	background-color: #4682B4;
	font-size: 11px;
}
table#fixed_hdr1 tr:hover td {
background-color: #E6ECE7 !important;
}
input{
	height: 20px; margin: 0px; padding: 0px; text-align: center; width: 80%;
}
input:-moz-read-only { /* For Firefox */
    border:none;background-color: transparent;
}

input:read-only {
    border:none;background-color: transparent;
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
$other_charge_ih_ids=array();
foreach($regular_bills as $regular_bill){
	$other_charge=$regular_bill["regular_bill_temp"]["other_charge"];
	foreach($other_charge as $key=>$value){
		$other_charge_ih_ids[]=(int)$key;
	}
}
if(sizeof($other_charge_ih_ids)>0){
	$other_charge_ih_ids = array_unique($other_charge_ih_ids);
}


?>
<div align="right" id="save_result" style="height:20px;"></div>
<table id="fixed_hdr1">
	<thead>
		<tr>
			<th>Unit</th>
			<th>Member Name</th>
			<?php foreach($income_head_array_th as $income_head=>$amount){ 
			$income_head_name = $this->requestAction(array('controller' => 'Fns', 'action' => 'income_head_name_via_id'),array('pass'=>array($income_head)));?>
			<th><?php echo $income_head_name; ?></th>
			<?php } ?>
			<th>Noc</th>
			<?php foreach($other_charge_ih_ids as $other_charge_ih_id){ 
			$income_head_name = $this->requestAction(array('controller' => 'Fns', 'action' => 'income_head_name_via_id'),array('pass'=>array($other_charge_ih_id)));?>
			<th><?php echo $income_head_name; ?></th>
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
	<?php $income_head_tatal=array(); $noc_tatal=0; $other_charge_tatal=array(); $total_arrear_maintenance=0; $total_arrear_intrest=0; $total_intrest_on_arrears=0;  $total_credit_stock=0; $total_due_for_payment=0;
	foreach($regular_bills as $regular_bill){ 
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
			<?php
			foreach($income_head_array as $income_head=>$amount){ 
			$income_head_tatal[$income_head]=@$income_head_tatal[$income_head]+$amount; ?>
			<td><input type="text" value="<?php echo $amount; ?>" class="auto_save" ledger_sub_account_id="<?php echo $ledger_sub_account_id; ?>" income_head_id="<?php echo $income_head; ?>" /></td>
			<?php } ?>
			<td><input type="text" value="<?php echo $noc_charge; ?>" class="auto_save_noc" ledger_sub_account_id="<?php echo $ledger_sub_account_id; ?>" />
			<?php $noc_tatal+=$noc_charge; ?>
			</td>
			<?php foreach($other_charge_ih_ids as $other_charge_ih_id){
			if (in_array($other_charge_ih_id, $other_charge_key)){
				$other_charge_tatal[$other_charge_ih_id]=@$other_charge_tatal[$other_charge_ih_id]+$other_charge[$other_charge_ih_id];?>
			<td><input type="text" value="<?php echo $other_charge[$other_charge_ih_id]; ?>" class="auto_save_other" ledger_sub_account_id="<?php echo $ledger_sub_account_id; ?>" income_head_id="<?php echo $other_charge_ih_id; ?>" /></td>
			<?php }else{ ?>
			<td><input type="text" value="0" class="auto_save_other" ledger_sub_account_id="<?php echo $ledger_sub_account_id; ?>" income_head_id="<?php echo $other_charge_ih_id; ?>" /></td>
			<?php }} ?>
			<td><input type="text" value="<?php echo $total; ?>" readonly /></td>
			<td><input type="text" value="<?php echo $arrear_maintenance; ?>" readonly />
			<?php $total_arrear_maintenance+=$arrear_maintenance; ?>
			</td>
			<td><input type="text" value="<?php echo $arrear_intrest; ?>" readonly />
			<?php $total_arrear_intrest+=$arrear_intrest; ?>
			</td>
			<td><input type="text" value="<?php echo $intrest_on_arrears; ?>" />
			<?php $total_intrest_on_arrears+=$intrest_on_arrears; ?>
			</td>
			<td><input type="text" value="<?php echo $credit_stock; ?>" />
			<?php $total_credit_stock+=$credit_stock; ?>
			</td>
			<td>
			<?php $due_for_payment=$total+$arrear_maintenance+$arrear_intrest+$intrest_on_arrears+$credit_stock; ?>
			<input type="text" value="<?php echo $due_for_payment; ?>" readonly />
			<?php $total_due_for_payment+=$due_for_payment; ?>
			</td>
		</tr>
	<?php } ?>
		<tr>
			<td colspan="2" ><b>Total</b></td>
			<?php $total_total=0; 
			foreach($income_head_array_th as $income_head=>$amount){ 
			$total_total+=$income_head_tatal[$income_head]; ?>
			<td><input type="text" value="<?php echo $income_head_tatal[$income_head]; ?>" readonly id="ih_total<?php echo $income_head; ?>"/></td>
			<?php } ?>
			<td><input type="text" value="<?php echo $noc_tatal; ?>" readonly id="noc_total" /></td>
			<?php $total_total+=$noc_tatal; 
			foreach($other_charge_ih_ids as $other_charge_ih_id){ 
			$total_total+=$other_charge_tatal[$other_charge_ih_id]; ?>
			<td><input type="text" value="<?php echo $other_charge_tatal[$other_charge_ih_id]; ?>" readonly id="oc_total<?php echo $other_charge_ih_id; ?>"/></td>
			<?php } ?>
			<td><?php echo $total_total; ?></td>
			<td><?php echo $total_arrear_maintenance; ?></td>
			<td><?php echo $total_arrear_intrest; ?></td>
			<td><?php echo $total_intrest_on_arrears; ?></td>
			<td><?php echo $total_credit_stock; ?></td>
			<td><?php echo $total_due_for_payment; ?></td>
		</tr>
	</tbody>
	</table>
	
<script>
$(document).ready(function(){
	$(".auto_save").on("blur",function(){
		$("#save_result").html("<span>Saving...</span>");
		var ledger_sub_account_id=$(this).attr("ledger_sub_account_id");
		var income_head_id=$(this).attr("income_head_id");
		var amount=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Incometrackers/auto_save_income_head_values/"+ledger_sub_account_id+"/"+income_head_id+"/"+amount,
		}).done(function(response){
			$("#save_result").html('<a href="#">Send for approval</a>');
		});
		var total=0;
		$('input[income_head_id='+income_head_id+']').each(function(i, obj) {
			var q=parseInt($(this).val());
			total+=q;
		});
		$("#ih_total"+income_head_id).val(total);
	})
	$(".auto_save_noc").on("blur",function(){
		$("#save_result").html("<span>Saving...</span>");
		var ledger_sub_account_id=$(this).attr("ledger_sub_account_id");
		var amount=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Incometrackers/auto_save_noc_values/"+ledger_sub_account_id+"/"+amount,
		}).done(function(response){
			$("#save_result").html('<a href="#">Send for approval</a>');
		});
		var total=0;
		$('input.auto_save_noc').each(function(i, obj) {
			var q=parseInt($(this).val());
			total+=q;
		});
		$("#noc_total").val(total);
	})
	$(".auto_save_other").on("blur",function(){
		$("#save_result").html("<span>Saving...</span>");
		var ledger_sub_account_id=$(this).attr("ledger_sub_account_id");
		var income_head_id=$(this).attr("income_head_id");
		var amount=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Incometrackers/auto_save_other_charge/"+ledger_sub_account_id+"/"+income_head_id+"/"+amount,
		}).done(function(response){
			$("#save_result").html('<a href="#">Send for approval</a>');
		});
		var total=0;
		$('input[income_head_id='+income_head_id+']').each(function(i, obj) {
			var q=parseInt($(this).val());
			total+=q;
		});
		$("#oc_total"+income_head_id).val(total);
	})
	
});
</script>