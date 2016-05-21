<?php
$default_date = date('d-m-Y');
?>
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

<center>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_payment" class="btn yellow" rel='tab'>Create</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_payment_view" class="btn" rel='tab'>View</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_payment_import_csv" class="btn purple" role="button"  style="float:right; margin-right:8px;" rel="tab"><i class="fa fa-database"></i> Import csv</a>
</center>


<?php $default_date = date('d-m-Y'); ?>
<input type="hidden" value="<?php echo $financial_year_string; ?>" id="f_y"/>
<div class="portlet box">
<div class="portlet-body">
	<form method="post">
		<table class="table table-condensed table-bordered" id="main">
			<thead>
				<tr>
					<th width="20%">Transaction Date</th>
					<th width="20%">Ledger A/c</th>
					<th width="20%">Mode of Payment</th>
					<th width="20%">Amount</th>
					<th width="20%">Bank Account</th>
				</tr>
			</thead>
			<tbody>
				
				
			</tbody>
		</table>
		<button type="submit" class="btn blue pull-right" name="submit">Create Voucher</button>
	</form>
		<!--<a href="#" role="button" id="add_row" class="btn"><i class="icon-plus"></i> Add Row</a>-->
</div>
</div>	

<table id="sample" style="display:none;">
	<tbody>
	<tr>
	     <td>
			<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy" 
			value="<?php echo $default_date; ?>" 
			style="background-color:white !important; margin-top:2.5px;" name="transaction_date[]">
		 </td>
		 <td>
					<select class="m-wrap span12" name="ledger_account[]">
					<option value="" style="display:none;">Select</option>
					<?php foreach($cursor11 as $collection){
					$auto_id = $collection['ledger_sub_account']['auto_id'];
					$name = $collection['ledger_sub_account']['name'];
					?>
					<option value="<?php echo $auto_id; ?>,1" ><?php echo $name; ?></option>
					<?php } ?>
					<?php foreach($cursor12 as $collection){
					$auto_id_a=(int)$collection['accounts_group']['auto_id'];
					$result33=$this->requestAction(array('controller'=>'hms','action' => 'expense_tracker_fetch2'),array('pass'=>array($auto_id_a)));
					foreach($result33 as $collection){
					$auto_id = (int)$collection['ledger_account']['auto_id'];
					$name = $collection['ledger_account']['ledger_name'];
					if($auto_id == 15)
					continue;
					?>
					<option value="<?php echo $auto_id; ?>,2" ><?php echo $name; ?></option>
					<?php }} ?>
					<?php foreach($cursor13 as $collection){
					$auto_id_b = (int)$collection['accounts_group']['auto_id'];
					$result33 = $this->requestAction(array('controller'=>'hms','action'=> 'expense_tracker_fetch2'),array('pass'=>array($auto_id_b)));
					foreach($result33 as $collection){
					$auto_id = (int)$collection['ledger_account']['auto_id'];
					$name = $collection['ledger_account']['ledger_name'];
					?>
					<option value="<?php echo $auto_id; ?>,2" ><?php echo $name; ?></option>
					<?php }} ?>
					<option value="32,2">Cash-in-hand</option>
					</select>
					<input type="text" class="m-wrap span12" 
			style="background-color:white !important; margin-top:2.5px;" Placeholder="Invoice Reference"
			name="invoice_reference[]">
			
		 </td>
		 <td>
			<select class="m-wrap span12" name="payment_mode[]">
			<option value="" style="display:none;">Select</option>
			<option value="Cheque">Cheque</option>
			<option value="NEFT">NEFT</option>
			<option value="PG">PG</option>
			</select>
		 
		 <input type="text" class="m-wrap span12" 
			style="text-align:right; background-color:white !important; margin-top:2.5px;" Placeholder="Instrument/UTR" name="instrument[]">
		 
		 </td>
		 <td>
		  <input type="text" class="m-wrap span12" style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="10" Placeholder="Amount" name="amount[]">
			<input type="text" class="m-wrap span6" name="tds[]" Placeholder="TDS Amount">
			
		    <input type="text"  class="m-wrap span6" 
			readonly="readonly" style="background-color:white !important; margin-top:2.5px;" Placeholder="Net Amount" name="net_amount[]">
		 </td>
		 <td>
		 <div style="margin-top: -4px; margin-right: -5px;" class="pull-right">
		 <a style="" role="button" class="btn mini remove_row" href="#"><i class="icon-trash"></i></a><br>
		 <a href="#" role="button" class="btn mini add_row"><i class="icon-plus"></i></a>
		 </div>
		 
		 
				<select class="m-wrap span10" name="bank_account[]">
				<option value="" style="display:none;">Select</option>    
				<?php
				foreach($cursor2 as $db){
				$sub_account_id =(int)$db['ledger_sub_account']['auto_id'];
				$sub_account_name =$db['ledger_sub_account']['name'];
				$ac_number = $db['ledger_sub_account']['bank_account']; 
				$bank_acccc = substr($ac_number,-4);  
				?>
				<option value="<?php echo $sub_account_id; ?>"><?php echo $sub_account_name; ?>&nbsp;&nbsp;<?php echo $bank_acccc; ?></option>
				<?php } ?>
				</select>
				<input type="text" class="m-wrap span10" style="background-color:white !important; margin-top:2.5px;" Placeholder="Narration" name="narration[]">
		 </td>
	</tr>
	</tbody>
</table>



<script>
$(document).ready(function(){
	add_row();
	function add_row(){
	var new_line=$("#sample tbody").html();
	$("#main tbody").append(new_line);
		$('#main tbody tr:last select[name="ledger_account[]"]').chosen();
			//$('#main tbody tr:last select[name="payment_mode[]"]').chosen();
				//$('#main tbody tr:last select[name="tds[]"]').chosen();
					$('#main tbody tr:last select[name="bank_account[]"]').chosen();
						$('#main tbody tr:last input[name="transaction_date[]"]').datepicker();
	}
	
	$(".add_row").die().live("click",function(){
		add_row();
	})
	$(".remove_row").die().live("click",function(){
		$(this).closest("tr").remove();
	})

});
</script>

<script>
$('input[name="tds[]"]').die().live("keyup blur",function(){
		var tds=parseInt($(this).val());
			var amount=parseFloat($(this).closest("tr").find('input[name="amount[]"]').val());
				var total_amount=Math.round(amount-tds);	
	if($.isNumeric(total_amount)==false){ total_amount=amount; }						
		$(this).closest("tr").find('input[name="net_amount[]"]').val(total_amount);
});
</script>

<script>
$('input[name="amount[]"]').die().live("blur",function(){
	var charge=parseInt($(this).closest("tr").find('select[name="tds[]"] option:selected').attr('charge'));
		var amount=parseFloat($(this).val());
			var tds_charge=parseFloat((charge/100)*amount);
					var total_amount=Math.round(amount-tds_charge);	
	if($.isNumeric(total_amount)==false){ total_amount=amount; }						
		$(this).closest("tr").find('input[name="net_amount[]"]').val(total_amount);
});
</script>

<script>
$("form").on("submit",function(e){
var allow="yes";
  	$('#main tbody tr input[name="transaction_date[]"]').die().each(function(ii, obj){
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
					$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".err").remove();
					al=al+1;
				}else{
					$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".err").remove();
					$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').append('<span class="err">Not in financial year</span>');
					al=al+0;
					
				}
			});
			if(al==0){
				allow="no";
			}
		});
  
 
	 $('#main tbody tr select[name="ledger_account[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Ledger A/c Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});	
		 $('#main tbody tr input[name="instrument[]"]').die().each(function(i, obj){
			var instrument=$(this).val();
			var payment_mode=$('#main tbody tr:eq('+i+') select[name="payment_mode[]"]').val();
			if(instrument=="" || payment_mode==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<p class="er">Required</p>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});	
		
		 
		 $('#main tbody tr input[name="amount[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Amount Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
			
			
		});
  
 
  
      	
   $('#main tbody tr select[name="bank_account[]"]').die().each(function(i, obj){
			var deposited_in=$(this).val();
			if(deposited_in==""){
				$(this).closest('td').find(".err").remove();
				$(this).closest('td').append('<p class="err">Select bank Account</p>');
				allow="no";
			}else{
				$(this).closest('td').find(".err").remove();
			}
		});	
  
  if(allow=="no"){
			e.preventDefault();
		}else{
		$("button[name=submit]").hide();	
		} 
  
});

 $('select[name="bank_account[]"]').die().live("change",function(){
			var bank_account=$(this).val();
			if(bank_account==""){
				$(this).closest('td').find(".err").remove();
				$(this).closest('td').append('<p class="err">Select bank Account</p>');
				allow="no";
			}else{
				$(this).closest('td').find(".err").remove();
			}
		});	
		
 $('input[name="amount[]"]').die().live("keyup blur",function(){
			var amount=$(this).val();
			if(amount==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<span class="er">Amount Required</span>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
	$(this).val($(this).val().toString().replace(/^[0-9]\./g, ',')
    .replace(/\./g, ''));
			if($.isNumeric(amount))
		{
		}else{
		$(this).val('');	
		}
		var tds=parseFloat($(this).closest("tr").find('input[name="tds[]"]').val());
		
				var total_amount=Math.round(amount-tds);	
	if($.isNumeric(total_amount)==false){ total_amount=amount; }						
		$(this).closest("tr").find('input[name="net_amount[]"]').val(total_amount);	
		});


$('input[name="instrument[]"]').die().live("keyup blur",function(i, obj){
		var instrument=$(this).val();
		var payment_mode=$(this).closest("td").find('select[name="payment_mode[]"]').val();
			if(instrument=="" || payment_mode==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});

$('select[name="payment_mode[]"]').die().live("change",function(i, obj){
	var payment_mode=$(this).val();
	var instrument=$(this).closest("td").find('input[name="instrument[]"]').val();
			
			if(instrument=="" || payment_mode==""){
				$(this).closest('td').find(".er").remove();
				$(this).closest('td').append('<p class="er">Required</p>');
				allow="no";
			}else{
				$(this).closest('td').find(".er").remove();
			}
		});	




$('select[name="ledger_account[]"]').die().live("change",function(){
		var ledger_account=$(this).val();
		if(ledger_account==""){
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<span class="er">Required</span>');
			allow="no";
		}else{
			$(this).closest('td').find(".er").remove();
		}
	});

$('input[name="transaction_date[]"]').die().live("keyup blur",function(){
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
					
					al=al+1;
				}else{
						al=al+0;
					
				}
			});
			if(al==0){
			$(this).closest('td').find(".err").remove();
			$(this).closest('td').append('<p class="err">Not in financial year</p>');	
			}else{
				
				$(this).closest('td').find(".err").remove();
			}
		}); 
	


</script>
<script>
$(document).ready(function() {
	<?php	
	$bank_receipt=(int)$this->Session->read('bank_payment');
	if($bank_receipt==1)
	{
	?>
	$.gritter.add({
	title: 'Success',
	text: '<p>Vouchers generated sucessfully.</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array('bank_payment')));
	} ?>
	});
</script>
<style>
input,select{
	margin:0 !important;
}
.er{
color: rgb(198, 4, 4);
font-size: 11px;
}
.err{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>


    
    
    
    
    