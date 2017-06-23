<div class="hide_at_print">	
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));
?>
</div>
<center>

<form method="post" onSubmit="return valid()">
<div  class="hide_at_print main_search">
        <table style="">
        <tr>
       
				<td>
						<select class="medium m-wrap chosen" id="account_category">
						<option value="" style="display:none;">Select A/c</option>
						<option value="1">Liability accounts </option>
						<option value="2">Asset accounts </option>
						<option value="3"> Income accounts </option>
						<option value="4"> Expenditure accounts </option>
						<option value="34"> Member control accounts </option>
						<option value="33"> Bank accounts </option>
						
						</select>
				</td>

				<td>
				<input type="text" placeholder="From" id="date1" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="to" style="background-color:white !important; margin-top:7px;" value="" >
				</td>
				<td>
				<input type="text" placeholder="To" id="date2" class="date-picker medium m-wrap" data-date-format="dd-mm-yyyy" name="to" style="background-color:white !important; margin-top:7px;" value="" >
				</td>
		
				<td valign="top">
				<button type="button" id="go" name="sub" class="btn yellow" style="margin-top:7px;">Go</button>
				</td>
		</tr>
</table>
</div>
</form>
</center>

<div id="ledger_view_1" style="width:100%;">

<table width="100%" class="table table-bordered " id="receiptmain">
	<thead>
		<tr>
			
            <th>Sr no.</th>
			<th>Title</th>
			<th>From date</th>
		    <th>To date</th>
			<th>Requested</th>
			<th>Prepared</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="table">
	<?php
	$i=0;
	
	foreach($ledger_yearly as $data){
	$i++;	
	$ledger_yearly_id=$data['ledger_yearly']['ledger_yearly_id'];
		$account_category_id=$data['ledger_yearly']['account_category_id'];
		$from=$data['ledger_yearly']['from'];
		$to=$data['ledger_yearly']['to'];
		$request_date=$data['ledger_yearly']['request_date'];
		$request_time=$data['ledger_yearly']['request_time'];
		$prepared_date=@$data['ledger_yearly']['prepared_date'];
		$prepared_time=@$data['ledger_yearly']['prepared_time'];
		
		if($account_category_id==34){
			$account_name="Member control accounts";
			
		}elseif($account_category_id==2){
			$account_name="Asset accounts";
		}elseif($account_category_id==3){
			$account_name="Income Accounts";
		}elseif($account_category_id==4){
			$account_name="Expenditure accounts";
		}elseif($account_category_id==1){
			$account_name="Liability accounts";
		}elseif($account_category_id==33){
			$account_name="Bank accounts";
		}
		
		$flag=$data['ledger_yearly']['flag'];
		if($flag==0){
			$status="Preparing ...";
		}else{
			$status="<a href='ledger_yearly_excel?from=$from&to=$to&account_category_id=$account_category_id'>download</a>";
		}
	?>
	 <tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $account_name; ?></td>
		<td><?php echo date("d-m-Y",$from); ?></td>
		<td><?php echo date("d-m-Y",$to); ?></td>
		<td><?php echo $request_date; echo "  ".$request_time; ?></td>
		<td><?php echo $prepared_date; echo "  ".$prepared_time; ?></td>
		<td><?php echo $status; ?></td>
		<td>
		<a style="" role="button" class="btn mini pull-left remove_row" remove_id="<?php echo $ledger_yearly_id; ?>"  href="#"><i class="icon-trash"></i></a>
		</td>
	</tr>
	<?php } ?>
	</tbody>
	
</table>



</div>


<script>
$(document).ready(function() {

	 $("#go").bind('click',function(){
			var account_category = $('#account_category').val();
			var from=$('#date1').val();
		    var to=$('#date2').val();
			$("#ledger_view_1").html('<div align="center" style="padding:10px;"><img src="<?php echo $webroot_path; ?>as/loding.gif" />Loading....</div>').load("ledger_yearly_ajax/" +account_category+ "/" +to+"/"+from);
		
	});
	
	
	 $('.remove_row').die().live('click',function(){
		var tr_find= $(this).closest('tr');
		var id=$(this).attr('remove_id');
	
			if (confirm('Are you sure you want to delete? Press ok else cancel') == true) {

				$.ajax({
					url: "ledger_yearly_delete/"+id,
				}).done(function(response) { 
					tr_find.remove();
					serial_number();
				});
			
			}	
	});

	function serial_number(){
		var i=0;
			$('#receiptmain tbody tr').each(function(){  i++ ; 
			$(this).find("td").eq(0).html(i);

		});

	}

});
</script>