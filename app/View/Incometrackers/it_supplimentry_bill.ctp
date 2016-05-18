<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
<?php $default_date = date('d-m-Y'); ?>
<input type="hidden" value="<?php echo $financial_year_string; ?>" id="f_y"/>
<!-----------Start New Supplimentry Bill Form -------->
<div class="portlet box">
<div class="portlet-body">
<form method="post">
	<table class="table table-condensed table-bordered" id="main" width="100%">
	<thead>
			<tr>
				<th>Billing Date</th>
				<th>Payment Due Date</th>
				<th style="width:200px !important;">Bill Type</th>
				<th>Income Head</th>
				<th>Amount</th>
				<th>Narration</th>
			</tr>
	</thead>
	<tbody>
				
				
			</tbody>
			</table>
		<button type="submit" class="btn blue pull-right" name="submit">Create Receipt</button>
</form>
<!--<a href="#" role="button" id="add_row" class="btn" ><i class="icon-plus"></i> Add Row</a>-->
</div>
</div>
<!------------ Start sample code ------------->
<table id="sample" style="display:none;">
<tr>
	<td>
		<input type="text" class="date-picker m-wrap small" 
		data-date-format="dd-mm-yyyy" placeholder="Bill Date" value="<?php echo $default_date; ?>" style="background-color:white !important;" name="transaction_date[]"/>
	</td>
	<td>
		<input type="text" class="date-picker m-wrap small" Placeholder="Payment Due Date"name="payment_due_date[]" data-date-format="dd-mm-yyyy"></td>
	<td>
		<select class="m-wrap medium" name="bill_type[]" style="width:200px;">
		<option value="" style="display:none;">Select</option>
		<option value="resident">Residential</option>
		<option value="non_resident">Non Residential</option>
		</select>
		
		<div id="div_non_resident_drop_down" class="hide">
			<select class="m-wrap medium" name="non_resident[]">
			<option value="" style="display:none;">Select</option>
			<?php
			foreach ($cursor11 as $collection) 
			{
			$auto_id = (int)$collection['ledger_sub_account']['auto_id'];
			$user_name = $collection['ledger_sub_account']['name'];
			?>
			<option value="<?php echo $auto_id; ?>"><?php echo $user_name; ?></option>
			<?php } ?>
			</select>
		</div>
		
		<div id="div_resident_drop_down" class="hide">
		<select  class="m-wrap medium" style="width:200px;" name="resident[]">
				<option value="" style="display:none;">--member--</option>
				<?php foreach($members_for_billing as $ledger_sub_account_id){
				$member_info = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id)));
				echo '<option value='.$ledger_sub_account_id.'>'.$member_info["user_name"].' '.$member_info["wing_name"].'-'.ltrim($member_info["flat_name"],'0').'</option>';
				} ?>
			</select>
		
		</div>
		
		<div id="div_company_name" class="hide">
		<input type="text" class="m-wrap medium" Placeholder="Company Name" name="company_name[]">
		</div>
	</td>
	<td>
		<select class="m-wrap" style="width:200px;" name="income_head[]">
		<option value="" style="display:none;">Select</option>
		<?php  
		foreach ($cursor2 as $collection) 
		{
		$income_heads_id= (int)$collection['ledger_account']["auto_id"];
		$income_heads_name=$collection['ledger_account']["ledger_name"];
		if($income_heads_id != 43 && $income_heads_id != 39 && $income_heads_id != 40)
		{
		?>
		<option value="<?php echo $income_heads_id; ?>"><?php echo $income_heads_name; ?></option>
		<?php }} ?>
		</select>
	</td>
	<td>
	<input type="text" class="m-wrap small" name="amount[]" style="text-align:right;">
	</td>
	<td>
	<div style="margin-top: -4px; margin-right: -5px;" class="pull-right">
	<a style="" role="button" class="btn mini  remove_row" href="#"><i class="icon-trash"></i></a><br>
	<a href="#" role="button" class="btn mini add_row"><i class="icon-plus"></i></a>
	</div>
	<input type="text" class="m-wrap span10" style="width:150px;" name="narration[]">
	
	</td>
</tr>
</table>

<script>
$(document).ready(function(){
	add_row();
	function add_row(){
	
		var new_line=$("#sample tbody").html();
		$("#main tbody").append(new_line);
		$('#main tbody tr:last select[name="bill_type[]"]').chosen();
		$('#main tbody tr:last select[name="income_head[]"]').chosen();
		$('#main tbody tr:last select[name="non_resident[]"]').chosen();
		$('#main tbody tr:last select[name="resident[]"]').chosen();
		$('#main tbody tr:last input[name="transaction_date[]"]').datepicker();
		$('#main tbody tr:last input[name="payment_due_date[]"]').datepicker();
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
$('select[name="bill_type[]"]').die().live("change",function(){
		var received_from=$(this).val();
		if(received_from=='resident'){
			$(this).closest("td").find("#div_resident_drop_down").show();
			$(this).closest("td").find("#div_non_resident_drop_down").hide();
			$(this).closest("td").find("#div_company_name").hide();
			
		}else{
			$(this).closest("td").find("#div_resident_drop_down").hide();
			$(this).closest("td").find("#div_non_resident_drop_down").show();
			$(this).closest("td").find("#div_company_name").show();
		    
		}
		var received_from=$(this).val();
					if(received_from==""){
						$(this).closest('td').find(".er").remove();
							$(this).closest('td').append('<span class="er">Required</span>');
								allow="no";
						}else{
							$(this).closest('td').find(".er").remove();
						}
					if(received_from=='resident'){
				
			var ledger_sub_account=$(this).closest("td").find('select[name="resident[]"]').val();
			if(ledger_sub_account==""){
				$(this).closest("td").find(".er").remove();
				$(this).closest("td").append('<span class="er">Required</span>');
				allow="no";
			}else{
				$(this).closest("td").find(".er").remove();
			}
			}
			else
			{
			var non_resident=$(this).closest("td").find('select[name="non_resident[]"]').val();
			var company_name=$(this).closest("td").find('input[name="company_name[]"]').val();
			if(non_resident=="" || company_name==""){
				$(this).closest("td").find(".er").remove();
				$(this).closest("td").append('<p class="er">Required</p>');
				allow="no";
			}else{
				$(this).closest("td").find(".er").remove();
			}	
				
			}
		
		
		
		
		
		
		
		
		
		
	})

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
					$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();
					al=al+1;
				}else{
					$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();
					$('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').append('<p class="er">Not in financial year</p>');
					al=al+0;
					
				}
			});
			if(al==0){
				allow="no";
			}
		});

/*$('#main tbody tr input[name="transaction_date[]"]').die().each(function(ii, obj){
	   var transaction_date=$(this).val();
	   var type_member=$('#main tbody tr:eq('+ii+') select[name="bill_type[]"]').val();
	   if(type_member=='resident'){
		  var ledger_sub_account_id=$('#main tbody tr:eq('+ii+') select[name="resident[]"]').val();
		   $.ajax({
			url:"<?php echo $webroot_path; ?>Incometrackers/it_supplimentry_bill_validation/"+transaction_date+"/"+ledger_sub_account_id, 
			async: false,
			success: function(data){
			 result_data=data;
			}
		});
		
		if(result_data=="not"){
		   allow="no";
		   $('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();
		   $('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').append('<p class="er">Regular bill date error</p>');	
		}else{
			 $('#main tbody tr:eq('+ii+') input[name="transaction_date[]"]').closest('td').find(".er").remove();
		}
	   }
	});		
		*/

		
		$('#main tbody tr input[name="payment_due_date[]"]').die().each(function(i, obj){
			var payment_due_date=$(this).val();
				if(payment_due_date==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
							allow="no";
					}else{
						$(this).closest('td').find(".er").remove();
					}
					
        var transaction_date= $(this).parent().prev('td').find('input[name="transaction_date[]"]').val();	
		if(transaction_date != "" && payment_due_date != ""){
		transaction_date=transaction_date.split('-').reverse().join('');		
		payment_due_date=payment_due_date.split('-').reverse().join('');		
				if(payment_due_date<transaction_date){
				$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Due date is big</p>');
							allow="no";	
				}else{
				$(this).closest('td').find(".er").remove();	
				}	
		}		
		});	




			$('#main tbody tr select[name="bill_type[]"]').die().each(function(i, obj){
				var bill_type=$(this).val();
					if(bill_type==""){
						$(this).closest('td').find(".er").remove();
							$(this).closest('td').append('<p class="er">Required</p>');
								allow="no";
						}else{
							$(this).closest('td').find(".er").remove();
						}
					if(bill_type=='resident'){
				
			var ledger_sub_account=$(this).closest("td").find('select[name="resident[]"]').val();
			if(ledger_sub_account==""){
				$(this).closest("td").find(".er").remove();
				$(this).closest("td").append('<p class="er">Required</p>');
				allow="no";
			}else{
				$(this).closest("td").find(".er").remove();
			}
			}
			else
			{
			var non_resident=$(this).closest("td").find('select[name="non_resident[]"]').val();
			var company_name=$(this).closest("td").find('input[name="company_name[]"]').val();
			if(non_resident=="" || company_name==""){
				$(this).closest("td").find(".er").remove();
				$(this).closest("td").append('<p class="er">Required</p>');
				allow="no";
			}else{
				$(this).closest("td").find(".er").remove();
			}	
				
			}
			});	

		$('#main tbody tr select[name="income_head[]"]').die().each(function(i, obj){
			var income_head=$(this).val();
				if(income_head==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
							allow="no";
					}else{
						$(this).closest('td').find(".er").remove();
					}
		});	

		$('#main tbody tr input[name="amount[]"]').die().each(function(i, obj){
			var amount=$(this).val();
				if(amount==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
							allow="no";
					}else{
						$(this).closest('td').find(".er").remove();
					}
						
		});	
 
 if(allow=="no"){
			e.preventDefault();
		} 
  
});


$('input[name="amount[]"]').die().live("keyup blur",function(){
			var amount=$(this).val();
				if(amount==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
							allow="no";
					}else{
						$(this).closest('td').find(".er").remove();
					}
				if($.isNumeric(amount))
				{
				}else{
					$(this).val('');	
				}
						
		});	




$('select[name="income_head[]"]').die().live("change",function(){
			var income_head=$(this).val();
				if(income_head==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
							allow="no";
					}else{
						$(this).closest('td').find(".er").remove();
					}
		});	



$('select[name="non_resident[]"]').die().live("change",function(){
	var non_resident=$(this).val();
		var bill_type=$(this).closest("td").find('select[name="bill_type[]"]').val();	
			var company_name=$(this).closest("td").find('input[name="company_name[]"]').val();
					if(non_resident=="" || bill_type=="" || company_name==""){
						$(this).closest('td').find(".er").remove();
							$(this).closest('td').append('<p class="er">Required</p>');
								allow="no";
						}else{
							$(this).closest('td').find(".er").remove();
						}
				
			});	
			
	$('input[name="company_name[]"]').die().live("keyup blur",function(){
	var company_name=$(this).val();
		var non_resident=$(this).closest("td").find('select[name="non_resident[]"]').val();	
			var bill_type=$(this).closest("td").find('select[name="bill_type[]"]').val();
					if(non_resident=="" || bill_type=="" || company_name==""){
						$(this).closest('td').find(".er").remove();
							$(this).closest('td').append('<p class="er">Required</p>');
								allow="no";
						}else{
							$(this).closest('td').find(".er").remove();
						}
				
			});			
			
			
			
			

$('select[name="resident[]"]').die().live("change",function(){
		var resident=$(this).val();
			var bill_type=$(this).closest("td").find('select[name="bill_type[]"]').val();	
					if(resident=="" || bill_type==""){
						$(this).closest('td').find(".er").remove();
							$(this).closest('td').append('<p class="er">Required</p>');
								allow="no";
						}else{
							$(this).closest('td').find(".er").remove();
						}
				
			});				
			
			
			
			
			
$('input[name="payment_due_date[]"]').die().live("keyup blur",function(){
			var payment_due_date=$(this).val();
				if(payment_due_date==""){
					$(this).closest('td').find(".er").remove();
						$(this).closest('td').append('<p class="er">Required</p>');
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
			$(this).closest('td').find(".er").remove();
			$(this).closest('td').append('<p class="er">Not in financial year</p>');	
			}else{
				
				$(this).closest('td').find(".er").remove();
			}
		});
	

$(document).ready(function() {
	<?php	
	$supplimentry_bill=(int)$this->Session->read('supplimentry_bill');
	if($supplimentry_bill==1)
	{
	?>
	$.gritter.add({
	title: 'Success',
	text: '<p>Supplimentry bills generated sucessfully.</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array('supplimentry_bill')));
	} ?>
	});
</script>















</script>
<style>
input,select{
	margin:0 !important;
}
.er{
color: rgb(198, 4, 4);
font-size: 11px;
}
</style>
