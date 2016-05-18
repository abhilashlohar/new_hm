<?php
foreach($cursor1 as $data){
		$transaction_id=(int)$data['cash_bank']['transaction_id'];
		$receipt_id=$data["cash_bank"]["receipt_number"];
		$transaction_date=$data["cash_bank"]["transaction_date"];
		$transaction_date=date("d-m-Y",($transaction_date));
		$receipt_mode=$data["cash_bank"]["receipt_mode"];
		if($receipt_mode == "Cheque" || $receipt_mode == "cheque" ){
		$cheque_number=@$data["cash_bank"]["cheque_number"];
		$which_bank=@$data["cash_bank"]["drown_in_which_bank"];
		$receipt_date1=@$data["cash_bank"]["date"];
		$branch_of_bank=@$data["cash_bank"]["branch_of_bank"];
	}
	else
	{
		$refrence_utr = @$data["cash_bank"]["cheque_number"];
		$receipt_date2 = @$data["cash_bank"]["date"];	
	}
	$member_type = @$data["cash_bank"]["received_from"];
	if($member_type=='residential')
	{
	//$receipt_type = @$data["cash_bank"]["receipt_type"];	
	$ledger_sub_account_id=(int)@$data["cash_bank"]["ledger_sub_account_id"];	
	$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
					$user_name=$member_info["user_name"];
					$wing_name=$member_info["wing_name"];
					$flat_name=$member_info["flat_name"];

	}
else
{
$ledger_sub_account_id=(int)@$data["cash_bank"]["ledger_sub_account_id"];
$bill_reference = @$data["cash_bank"]["bill_reference"];	
		
				$result_ledger_sub_account = $this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array((int)$ledger_sub_account_id)));
				foreach($result_ledger_sub_account as $dataa)
				{
				$user_name = $dataa['ledger_sub_account']['name'];	
				}
}
$amount = @$data["cash_bank"]["amount"];
$deposited_bank_id = @$data["cash_bank"]["deposited_in"];
$narration = @$data["cash_bank"]["narration"];
}
	
?>
<input type="hidden" value="<?php echo $financial_year_string; ?>" id="f_y"/>
<form method="post">
<input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">
<div class="portlet box blue">
	<div class="portlet-title">
	<h4 class="block"><i class="icon-reorder"></i>Edit Receipt - <?php echo $receipt_id; ?></h4>
	</div>
	<div class="portlet-body form">
	<div class="row-fluid">

	
	
	
	
<div class="span6">
<label style="font-size:14px;">Transaction date<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="date-picker m-wrap span7" data-date-format="dd-mm-yyyy" name="transaction_date" placeholder="Transaction Date" style="background-color:white !important;"  value="<?php echo $transaction_date; ?>">
<p class="date" style="color: rgb(198, 4, 4);
font-size: 11px;"></p>
</div>
<br />   


<label style="font-size:14px;">Deposited In<span style="color:red;">*</span></label>
<div class="controls">
<select name="deposited_bank_id" class="span9 m-wrap chosen">
<option value="" style="display:none;">which bank?</option>    
<?php
foreach ($cursor3 as $db) 
{
$bank_id = (int)$db['ledger_sub_account']["auto_id"];
$bank_ac = $db['ledger_sub_account']["name"];
$bank_account_number = $db['ledger_sub_account']["bank_account"];
?>
<option value="<?php echo $bank_id; ?>" <?php if($deposited_bank_id == $bank_id) { ?> selected="selected" <?php } ?>><?php echo $bank_ac; ?> &nbsp;&nbsp; <?php echo $bank_account_number; ?></option>
<?php } ?>
</select>
<p class="bank" style="color: rgb(198, 4, 4);
font-size: 11px;"></p>
</div>
<br />
	   
	   
<label  style="font-size:14px;">Receipt Mode<span style="color:red;">*</span></label>
<div class="controls">
<label class="radio">
<div class="radio" id="uniform-undefined"><span><input type="radio" name="receipt_mode" value="Cheque" style="opacity: 0;" class="chn" onclick="cheque_view()" <?php if($receipt_mode == "Cheque" || $receipt_mode == "cheque") { ?> checked="checked" <?php } ?>></span></div>
Cheque
</label>
<label class="radio">
<div class="radio" id="uniform-undefined"><span><input type="radio" name="receipt_mode" value="NEFT" style="opacity: 0;" class="neft" onclick="neft_text_view()" <?php if($receipt_mode == "NEFT" || $receipt_mode == "neft") { ?> checked="checked" <?php } ?>></span></div>
NEFT
</label>
<label class="radio">
<div class="radio" id="uniform-undefined"><span><input type="radio" name="receipt_mode" value="PG" style="opacity: 0;" class="pg" onclick="pg_show()" <?php if($receipt_mode == "PG" || $receipt_mode == "pg") { ?> checked="checked" <?php } ?>></span></div>
PG
</label> 
<p class="mode" style="color: rgb(198, 4, 4);
font-size: 11px;"></p>
</div>
<br />
		
		 
<div id="cheque_show_by_query" <?php if($receipt_mode != "Cheque" && $receipt_mode != "cheque") { ?> class="hide"  <?php } ?> >
<label style="font-size:14px;">Cheque No.<span style="color:red;">*</span><span style="margin-left:12%;">Cheque Date<span style="color:red;">*</span></span></label>
<div class="controls">
<input type="text"  name="cheque_number" class="m-wrap span3 chhh1 ignore" placeholder="Cheque No." style="background-color:white !important;" id="ins" value="<?php echo @$cheque_number; ?>">
<input type="text"  class="date-picker m-wrap span4 chhh2 ignore" name="cheque_date1" data-date-format="dd-mm-yyyy" placeholder="Date" id="chh" value="<?php echo @$receipt_date1; ?>"/>
<table border="0" width="65%"><tr><td style="width:44%;"><p class="instruction" style="color: rgb(198, 4, 4);
font-size: 11px;"></p></td><td><p class="cheque_date" style="color: rgb(198, 4, 4);
font-size: 11px;"></p></td></tr></table>
</div>
<br />


<label style="font-size:14px;">Drawn on which bank?<span style="color:red;">*</span> </label>
<div class="controls">
<input type="text"  name="drawn_on_which_bank" class="m-wrap span9 chhh3 ignore" placeholder="Drawn on which bank?" style="background-color:white !important;" id="ins" data-provide="typeahead" data-source="[<?php if(!empty($kendo_implode)) { echo $kendo_implode; } ?>]" value="<?php echo @$which_bank; ?>">
<p class="drawn_bank" style="color: rgb(198, 4, 4);
font-size: 11px;"></p>
</div>
<br />
<label style="font-size:14px;">Branch of Bank<span style="color:red;">*</span> </label>
<div class="controls">
<input type="text"  name="branch" class="m-wrap span9 chhh3 ignore" placeholder="Branch of Bank" style="background-color:white !important;" value="<?php echo @$branch_of_bank; ?>">
<p class="branch" style="color: rgb(198, 4, 4);
font-size: 11px;"></p>
</div>
</div>


<div <?php if($receipt_mode == "Cheque" || $receipt_mode == "cheque") { ?> class="hide"  <?php } ?> id="neft_show">
<label style="font-size:14px;">Reference/UTR #<span style="color:red;">*</span><span style="margin-left:15%;">Date<span style="color:red;">*</span></span></label>
<div class="controls">
<input type="text"  name="reference_number" class="m-wrap span4 nefftt1 ignore" placeholder="Reference/UTR #" style="background-color:white !important;" id="reff" value="<?php echo @$refrence_utr; ?>">&nbsp;&nbsp;
<input type="text"  name="neft_date" class="m-wrap span3 date-picker nefftt2 ignore" placeholder="Date" data-date-format="dd-mm-yyyy" style="background-color:white !important;" id="dtt" value="<?php //echo @$receipt_date2; ?>">
<table border="0" width="80%"><tr><td style="width:44%;"><p class="reference" style="color: rgb(198, 4, 4);
font-size: 11px;"></p></td><td><p class="date2" style="color: rgb(198, 4, 4);
font-size: 11px;"></p></td></tr></table>
</div>
<br />
</div>
</div>

<div class="span6">		
<?php if($member_type == 'residential') { ?>		
<h5><b>Receipt For : Residential</b></h5>	
<input type="hidden" name="member_type" value="residential" />	
<br>

	<label style="font-size:14px;">Select Resident<span style="color:red;">*</span></label>
	<select name="ledger_sub_account" class="m-wrap large chosen" style="width:200px;">
	<option value="" style="display:none;">--member--</option>
	<?php foreach($members_for_billing as $ledger_sub_account_ids){
	$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_ids))); ?>
	<option value="<?php echo $ledger_sub_account_ids; ?>" <?php if($ledger_sub_account_id== $ledger_sub_account_ids){ ?> selected="selected" <?php } ?>><?php echo $member_info["user_name"]; echo $member_info["wing_name"]; echo ltrim($member_info["flat_name"]); ?></option>
	<?php } ?>
	</select>

<br/><br/>
<?php
} else { ?>
<h5><b>Receipt For : Non-Residential</b></h5>
<input type="hidden" name="member_type" value="non_residential"/>


<h5><b>Party Name: <?php echo $user_name; ?></b></h5>
<input type="hidden" name="ledger_sub_account" value="<?php echo $ledger_sub_account_id; ?>"/>
<br />

<label style="font-size:14px;">Bill Reference<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span9 nonrr2 ignore" name="bill_reference" value="<?php echo $bill_reference; ?>"/>
<p class="bill_reference"></p>
</div>
<br />

<?php } ?>	

<label style="font-size:14px;">Amount Applied<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" name="amount" class="m-wrap span5" value="<?php echo $amount; ?>" style="text-align:right;"/>
<p class="amount" style="color: rgb(198, 4, 4);
font-size: 11px;"></p>
</div>
<br />


<label style="font-size:14px;">Narration</label>
<div class="controls">
<textarea   rows="4" name="description" class="span9 m-wrap" placeholder="Narration" style="background-color:white !important;resize:none;" id="nar" ><?php echo $narration; ?></textarea>
</div>
<br />
	
 
</div> 
</div>

		<div class="confirm_div" style="display: none;">
			<div class="modal-backdrop fade in"></div>
			<div class="modal" id="poll_edit_content">
			<div class="modal-body">
				Are you sure to edit this bill?				   			   
			</div>
			<div class="modal-footer">
				<button type="button" class="btn" role="button" id="close_button">CLOSE</button>
				
			</div>
			</div>
		</div>
		
<div class="form-actions">
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" role="button" rel="tab" class="btn green"><i class="icon-arrow-left"></i> Back</a>
<button type="submit" class="btn red" name="bank_receipt_update">UPDATE RECEIPT</button>
</div>
</div>
</div>
</form>

<script>
$(document).ready(function() {
	$('.submit_button').live('click',function(){
		$('.confirm_div').show();
	});
	$('#close_button').live('click',function(){
		$('.confirm_div').hide();
	});
});
</script>
<script>
function cheque_view(){
$("#cheque_show_by_query").show();
$("#neft_show").hide();
}
function neft_text_view(){	
$("#cheque_show_by_query").hide();
$("#neft_show").show();
}
function pg_show(){
$("#cheque_show_by_query").hide();
$("#neft_show").show();
}
</script>

<script>
$("form").on("submit",function(e){
		var allow="yes";

		$('input[name="transaction_date"]').die().each(function(ii, obj){
			var transaction_date=$(this).val();
			transaction_date=transaction_date.split('-').reverse().join('');
			
			var f_y=$("#f_y").val();
			var f_y2=f_y.split(',');
			var al=0;
			$.each(f_y2, function( index, value ) {
				var f_y3=value.split('/');
				var from=f_y3[0];
				from=from.split('-').reverse().join('');
				var to=f_y3[1];
				to=to.split('-').reverse().join('');
				
				if(transaction_date>=from && transaction_date<=to){
					$('.date').html('');
					al=al+1;
				}else{
					$('.date').html('not in Financial year');
					al=al+0;
					
				}
			});
			if(al==0){
				allow="no";
			}
		});

		$('select[name="deposited_bank_id"]').die().each(function(ii, obj){
				var bankk=$(this).val();
				if(bankk==""){
					allow="no";
					$('.bank').html('Required');
				}else{
				   $('.bank').html('');	
				}
				
		});	
				
		var mode=$("input[type='radio'][name='receipt_mode']:checked").val();
		if(mode=="Cheque" || mode=="cheque")
		{
		
		$('input[name="cheque_number"]').die().each(function(ii, obj){
			var cheque_number=$(this).val();
				if(cheque_number==""){
					allow="no";
						$('.instruction').html('Required');
					}else{
						$('.instruction').html('');	
					}
		});	

		$('input[name="cheque_date1"]').die().each(function(ii, obj){
			var cheque_date1=$(this).val();
			
				if(cheque_date1==""){
					allow="no";
					$('.cheque_date').html('Required');
				}else{
					$('.cheque_date').html('');	
				}
		});	

		$('input[name="drawn_on_which_bank"]').die().each(function(ii, obj){
			var drawn_on_which_bank=$(this).val();
				if(drawn_on_which_bank==""){
					allow="no";
					$('.drawn_bank').html('Required');
				}else{
					$('.drawn_bank').html('');	
				}
		});	
		
		$('input[name="branch"]').die().each(function(ii, obj){
			var branch=$(this).val();
				if(branch==""){
					allow="no";
					$('.branch').html('Required');
				}else{
					$('.branch').html('');	
				}
		});		
		}
        else{
			
		$('input[name="reference_number"]').die().each(function(ii, obj){
			var reference_number=$(this).val();
				if(reference_number==""){
					allow="no";
			  $('.reference').html('Required');
				}else{
					$('.reference').html('');	
				}
		});		
			
		$('input[name="neft_date"]').die().each(function(ii, obj){
			var neft_date=$(this).val();
				if(neft_date==""){
					allow="no";
				$('.date2').html('Required');
				}else{
					$('.date2').html('');	
				}
		});		
			
			
			
		}

		$('input[name="amount"]').die().each(function(ii, obj){
			var amount=$(this).val();
				if(amount==""){
					allow="no";
				$('.amount').html('Required');
				}else{
					$('.amount').html('');	
				}
				
		});	




	

if(allow=="no"){
			e.preventDefault();
		}
});


$('input[name="amount"]').die().live("keyup blur",function(){
			var amount=$(this).val();
				if(amount==""){
					
				$('.amount').html('Required');
				}else{
					$('.amount').html('');	
				}
				$(this).val($(this).val().toString().replace(/^[0-9]\./g, ',')
    .replace(/\./g, ''));
		if($.isNumeric(amount))
		{
		}else{
		$(this).val('');	
		}
				
		});	











</script>
