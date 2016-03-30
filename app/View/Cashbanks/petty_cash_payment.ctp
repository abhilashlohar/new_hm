<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
<input type="hidden" id="fi" value="<?php echo $datef1; ?>" />
<input type="hidden" id="ti" value="<?php echo $datet1; ?>" />
<input type="hidden" id="cn" value="<?php echo $count; ?>" />
<center>
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_payment" class="btn yellow" rel='tab'>Create</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_payment_view" class="btn" rel='tab'>View</a>
</center>	   
<?php
$default_date = date('d-m-Y');
?>

<!-------------------------- START NEW CODE--------------------------->
<div class="portlet box">
<div class="portlet-body">
	<form method="post">
		<table class="table table-condensed table-bordered" id="main">
			<thead>
				<tr>
					<th width="120px">Transaction Date</th>
					<th width="200px">A/c Group</th>
					<th width="200px">Expense/Party A/c</th>
					<th width="130px">Paid From</th>
					<th width="100px">Amount</th>
					<th>Narration</th>
				</tr>
			</thead>
			<tbody>
				
				
			</tbody>
		</table>
		<button type="submit" class="btn blue pull-right" name="submit">Create Receipt</button>
	</form>
		<a href="#" role="button" id="add_row" class="btn"><i class="icon-plus"></i> Add Row</a>
</div>
</div>

<table id="sample" style="display:none;">
	<tbody>
		<tr>
			<td><input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy"  value="<?php echo $default_date; ?>" name="transaction_date[]"></td>
			
			<td><select class="m-wrap span12" name="account_group[]">
			<option value="" style="display:none;">Select</option>
			<option value="1">Sundry Creditors Control A/c</option>
			<option value="2">All Expenditure A/cs</option>
			</select></td>

			<td>
			<div id="default_select_box">
			<select class="m-wrap span12">
			<option value="" style="display:none;">Select</option>
			</select>
			</div>
			<div class="hide" id="sundry_creditors_select_box">
			Creditors
			</div>
			<div class="hide" id="expenditure_select_box">
			Expense
			</div>
			</td>

			<td><select name="paid_from[]" class="m-wrap span12">
			<option value="" style="display:none;">Select</option>
			<option value="32" selected="selected">Cash-in-hand</option>
			</select></td>

			<td><input type="text" class="m-wrap span12" maxlength="5" name="amount[]">
			</td>
			
			<td><input type="text" class="m-wrap span10" name="narration[]"><a style="margin-top: -4px; margin-right: -5px;" role="button" class="btn mini pull-right remove_row" href="#"><i class="icon-trash"></i></a></td>
		</tr>
	</tbody>
</table>

<script>
$(document).ready(function(){
	add_row();
	function add_row(){
	var new_line=$("#sample tbody").html();
	$("#main tbody").append(new_line);
	$('#main tbody tr:last select[name="account_group[]"]').chosen();
	$('#main tbody tr:last select[name="paid_from[]"]').chosen();
	//$('#main tbody tr:last select[name="other_income[]"]').chosen();
	//$('#main tbody tr:last select[name="ledger_sub_account[]"]').chosen();
	$('#main tbody tr:last input[name="transaction_date[]"]').datepicker();
	}
	
	$("#add_row").on("click",function(){
		add_row();
	})
	$(".remove_row").die().live("click",function(){
		$(this).closest("tr").remove();
	})

});
</script>

<script>
$('select[name="account_group[]"]').die().live("change",function(){
		var account_group=$(this).val();
		if(account_group=='1'){
			$(this).parent().next('td').find("#default_select_box").hide();
			$(this).parent().next('td').find("#expenditure_select_box").hide();
			$(this).parent().next('td').find("#sundry_creditors_select_box").show();
		}else{
			$(this).parent().next('td').find("#default_select_box").hide();
			$(this).parent().next('td').find("#expenditure_select_box").show();
			$(this).parent().next('td').find("#sundry_creditors_select_box").hide();
		}
});

</script>

<!---------------------------END NEW CODE---------------------------->

<?php /*
<form method="post">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block"><i class="icon-reorder"></i>Post Petty Cash Payment</h4>
</div>
<div class="portlet-body form">
<div id="validdn" style="font-size:14px; font-weight:600; color:red;"></div>
<table style="width:100%" id="tbb" class="table table-bordered">
	<thead>
		<tr style="background-color:#E8EAE8;">
			<th style="width:15%;">Transaction Date</th>
			<th style="width:20%;">A/c Group</th>
			<th style="width:15%;">Expense/Party A/c</th>
			<th style="width:15%;">Paid From</th>
			<th style="width:15%;">Amount</th>
			<th style="width:20%;">Narration</th>
			<th></th>
		</tr>
	</thead>
<tbody id="tbbb">
<tr style="background-color:#E8F3FF;">
<td valign="top">
<input type="text" class="date-picker m-wrap span12" data-date-format="dd-mm-yyyy" name="date" id="date" style="background-color:white !important; margin-top:2.5px;" value="<?php echo $default_date; ?>">
</td>
<td valign="top">
<select name="type" class="m-wrap span12 chosen" onchange="type_ajjxx(this.value,1)" style="background-color:white !important;">
<option value="" style="display:none;">Select</option>
<option value="1">Sundry Creditors Control A/c</option>
<option value="2">All Expenditure A/cs</option>
</select>
</td valign="top">
<td id="show_user1" valign="top">
<select   name="user_id" class="m-wrap span12 chosen" style="background-color:white !important;">
<option value="" style="display:none;">Select</option>
</select>
</td>
<td valign="top">
<select name="account_head" class="m-wrap span12 chosen" style="background-color:white !important;">
<option value="" style="display:none;">Select</option>
<option value="32" selected="selected">Cash-in-hand</option>
</select>
</td>
<td valign="top"><input type="text"   class="m-wrap span12" id="amttt1" style="text-align:right; background-color:white !important; margin-top:2.5px;" maxlength="5" onkeyup="numeric_vali(this.value,1)">
</td>
<td valign="top">
<input type="text" class="m-wrap span12" style="background-color:white !important; margin-top:2.5px;">
</td>
<td> <a class="btn green mini adrww" onclick="add_rowww()"><i class="icon-plus"></i></a><br></td>
</tr>
</tbody>
</table>
<div class="form-actions">
<button type="submit" class="btn green">Submit</button>
</div>
</div>
</div>
</form>

<script>
function numeric_vali(vv,dd)
{
if($.isNumeric(vv))
{
$("#validdn").html('');	
}
else
{
$("#validdn").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">Amount Should be Numeric Value in row '+ dd +'</div>');
$("#amttt"+ dd).val("");
return false;		
}
}

</script>
<script>
function add_rowww()
{
var count = $("#tbbb tr").length;
$(".adrww").hide();
count++;
		$.ajax({
		url: 'petty_cash_payment_add_row?con=' + count,
		}).done(function(response) {
		$("#tbbb").append(response);
		$(".adrww").show();
});	
}

function delete_row(tttt)
{
$('.content_'+tttt).remove();
}
</script>


<script>
function type_ajjxx(tt,dd)
{
$("#show_user" + dd).load("<?php echo $webroot_path; ?>Cashbanks/petty_cash_payment_ajax?value1=" + tt + "");
}
</script>

<script>
$(document).ready(function() { 
	$('form').submit( function(ev){
	ev.preventDefault();
		var count = $("#tbbb tr").length;
		var ar = [];

		for(var i=1;i<=count;i++)
		{
		var transaction_date = $("#tbbb tr:nth-child("+i+") td:nth-child(1) input").val();
		var ac_group = $("#tbbb tr:nth-child("+i+") td:nth-child(2) select").val();
		var party_ac = $("#tbbb tr:nth-child("+i+") td:nth-child(3) select").val();
		var paid_from = $("#tbbb tr:nth-child("+i+") td:nth-child(4) select").val();
		var amount = $("#tbbb tr:nth-child("+i+") td:nth-child(5) input").val();
		var narration = $("#tbbb tr:nth-child("+i+") td:nth-child(6) input").val();
		ar.push([transaction_date,ac_group,party_ac,paid_from,amount,narration]);
		
		}
		var myJsonString = JSON.stringify(ar);
			$.ajax({
			url: "petty_cash_payment_json?q="+myJsonString,
			dataType:'json',
			}).done(function(response){
				//alert(response);
			if(response.type == 'error'){
			$("#validdn").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">'+response.text+'</div>');
			$("html, body").animate({
					 scrollTop:0
					 },"slow");
			
			}
		    if(response.type == 'success'){
			  $("#shwd").show();
			  $(".shwtxt").html(response.text);
			  
			}
});			
});
});

</script>		


<div id="shwd" class="hide">
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body">
<h4><b>Thank You!</b></h4>
<p class="shwtxt"></p>

</div>
<div class="modal-footer">
<a href="<?php echo $webroot_path; ?>Cashbanks/petty_cash_payment_view" class="btn red" rel='tab'>OK</a>
</div>
</div>
</div> 
<!-- End new Front End -->
<script>
$(document).ready(function() {
	$("#data_tds").live('change',function(){
		var data_tds = document.getElementById('data_tds').value;
		var amount = document.getElementById('amount').value;
		$("#total_am").load("amount_cal_p?data=" + data_tds + "&amount="+ amount +"");
	});
});
</script>	
<script>
$(document).ready(function() {
$("#vali").bind('click',function(){
    var fi = document.getElementById("fi").value;
	var ti = document.getElementById("ti").value;
	var cn = document.getElementById("cn").value;
	var fe = fi.split(",");
	var te = ti.split(",");
	var date1 = document.getElementById("date").value;
	var date = date1.split("-").reverse().join("-");
	var nnn = 55;
		for(var i=0; i<cn; i++)
		{
		var fd = fe[i];
		var td = te[i]
			if(date == "")
			{
			nnn = 555;
			break;	
			}
			else if(Date.parse(fd) <= Date.parse(date))
		    {
				if(Date.parse(td) >= Date.parse(date))
				{
				nnn = 5;
				break;
				}
				else
				{
					 
				}
        	} 
		}
			if(nnn == 55)
			{
			$("#result11").load("cash_bank_vali?ss=" + 2 + "");
			return false;	
			}
			else if(nnn == 555)
			{
				
			}
			else
			{
			$("#result11").load("cash_bank_vali?ss=" + 12 + "");		
			}
});
});
</script>		
		   
		   
	*/ ?>	   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   