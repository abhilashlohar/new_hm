<style>
#table th{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
#table td{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
</style>
	<div class="hide_at_print">
	<?php
	echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
	?>				   
	</div>
	<center>  
	<div class="hide_at_print">            
	<a href="<?php echo $webroot_path; ?>Cashbanks/new_bank_receipt" class="btn" rel='tab'>Create</a>
	<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" class="btn" rel='tab'>View</a>
	<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_deposit_slip" class="btn yellow" rel='tab'>Deposit Slip</a>
	<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_approve" class="btn" rel='tab'>Approve Receipts</a>
	</div>
	</center>
<?php $nnn = 55;
	foreach($cursor1 as $collection){
	$receipt_mode = $collection['cash_bank']['receipt_mode'];
	if($receipt_mode == "Cheque" || $receipt_mode == "cheque"){	
	$nnn = 555;
	}}	
?>
<?php
if($nnn == 555)
{
?>
<br>
<form method="post">
<table style="width:100%;" class="table table-bordered table-striped" id="table">
<tr>
<th>Receipt Date</th>
<th>Receipt No.</th>
<th>Party Name</th>
<th>Deposited In</th>
<th>Cheque Number</th>
<th>Cheque Date</th>
<th>Drawn Bank Name</th>
<th>Amount</th>
<th style="text-align:center;">
<label class="checkbox">
<div class="checker" id="uniform-undefined"><span><input type="checkbox" value="" style="opacity: 0;" onclick="allchkk()" id="chhkk"></span></div>
</label>
</th>
</tr>
<?php
$total_credit = 0;
$total_debit = 0;
$n=0;
foreach($cursor1 as $collection){
	$n++;
	$receipt_no = $collection['cash_bank']['receipt_number'];
	$receipt_mode = $collection['cash_bank']['receipt_mode'];
	$TransactionDate = $collection['cash_bank']['transaction_date'];
	$transaction_id = (int)$collection['cash_bank']['auto_id'];
	$bill_one_time_id = @$collection['cash_bank']['bill_one_time_id'];
	$receipt_date = $collection['cash_bank']['transaction_date'];
	@$deposit_status=(int)@$collection['cash_bank']['deposit_status'];
		if($receipt_mode == "Cheque" || $receipt_mode == "cheque"){
		$cheque_number = $collection['cash_bank']['cheque_number'];
		$cheque_date = $collection['cash_bank']['date'];
		$drawn_on_which_bank = $collection['cash_bank']['drown_in_which_bank'];
		}
		else{
		$reference_utr = @$collection['cash_bank']['reference_utr'];
		$cheque_date = @$collection['cash_bank']['cheque_date'];
		}
		$member_type = $collection['cash_bank']['received_from'];
		$narration = @$collection['cash_bank']['narration'];
			if($member_type == "residential"){
			$ledger_sub_account_id=(int)$collection['cash_bank']['ledger_sub_account_id'];
			$receipt_type = $collection['cash_bank']['receipt_type'];

			$member_info=$this->requestAction(array('controller'=>'Fns','action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
			$flat_id = $member_info['flat_id'];
			$wing_id = $member_info['wing_id'];
			$party_name = $member_info['user_name'];
			
			$wing_flat=$this->requestAction(array('controller'=>'Fns','action'=>'wing_flat_via_wing_id_and_flat_id'),array('pass'=>array($wing_id,$flat_id)));
        }else{
			$wing_flat = "";
			$party_name = $collection['cash_bank']['party_name_id'];
			$bill_reference = @$collection['cash_bank']['bill_reference'];	
		}
		$amount=$collection['cash_bank']['amount'];
		$deposited_bank_id = (int)$collection['cash_bank']['deposited_in'];
			if($receipt_mode == "Cheque" || $receipt_mode == "cheque"){
				$receipt_mode = $receipt_mode;
				}
		
			$ledger_sub_account_fetch_result = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_sub_account_fetch'),array('pass'=>array($deposited_bank_id)));			
			foreach($ledger_sub_account_fetch_result as $rrrr){
			$deposited_bank_name = $rrrr['ledger_sub_account']['name'];
			$bank_account = $rrrr['ledger_sub_account']['bank_account'];				
			}			
			$TransactionDate = date('d-m-Y',$TransactionDate);
			 
$receipt_date = date('d-m-Y',($receipt_date));		
if($receipt_mode == "Cheque" || $receipt_mode == "cheque")
{
$total_debit =  $total_debit + $amount; 
?>
	<tr>
			<td <?php if(@$deposit_status==1){ ?>style="background-color:rgba(248, 148, 6, 0.19);" <?php } ?>><?php echo $receipt_date; ?></td>
			<td <?php if(@$deposit_status==1){ ?>style="background-color:rgba(248, 148, 6, 0.19);" <?php } ?>><?php echo $receipt_no; ?></td>
			<td <?php if(@$deposit_status==1){ ?>style="background-color:rgba(248, 148, 6, 0.19);" <?php } ?>><?php echo $party_name; ?> &nbsp;&nbsp; <?php echo $wing_flat; ?></td>
			<td <?php if(@$deposit_status==1){ ?>style="background-color:rgba(248, 148, 6, 0.19);" <?php } ?>><?php echo $deposited_bank_name; ?>&nbsp;(<?php echo $bank_account; ?>)</td>
			<td <?php if(@$deposit_status==1){ ?>style="background-color:rgba(248, 148, 6, 0.19);" <?php } ?>><?php echo $cheque_number; ?></td>
			<td <?php if(@$deposit_status==1){ ?>style="background-color:rgba(248, 148, 6, 0.19);" <?php } ?>><?php echo $cheque_date; ?></td>
			<td <?php if(@$deposit_status==1){ ?>style="background-color:rgba(248, 148, 6, 0.19);" <?php } ?>><?php echo $drawn_on_which_bank; ?></td>
			<td style="text-align:right; <?php if(@$deposit_status==1){ ?>background-color:rgba(248, 148, 6, 0.19);<?php } ?>"><?php $amount2 = number_format($amount); echo $amount2; ?></td>
			<td style="text-align:center; <?php if(@$deposit_status==1){ ?>background-color:rgba(248, 148, 6, 0.19);<?php } ?>">
			<label class="checkbox">
			<div class="checker" id="uniform-undefined"><span>
			<input type="checkbox" value="<?php echo $transaction_id; ?>" style="opacity: 0;" class="dep" name="dd<?php echo $transaction_id; ?>"></span></div>
			</label>
			</td>
	</tr>
<?php
}
}
?>
<tr>
<td style="text-align:right;" colspan="7"><b>Total</b></td>
<td style="text-align:right;"><b><?php $total2 = number_format($total_debit); echo $total2; ?></b></td>
<td></td>
</tr>
</table>
<br />

<button type="submit" name="dep_slip" class="btn green" style="margin-left:75%;">Generate Deposit Slip</button>


<?php } else { ?>
<center>
<br><br>
<h3>No Receipt Found for Deposit Slip</h3>
</center>
<?php } ?>
<script>
function allchkk()
{
if($("#chhkk").is(":checked")==true){
			$(".dep").parent('span').addClass('checked');
			$(".dep").prop('checked',true);
		}else{
			$(".dep").parent('span').removeClass('checked');
			$(".dep").prop('checked',false);
		}
		
}
</script>


