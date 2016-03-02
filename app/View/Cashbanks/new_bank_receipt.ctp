<?php
$transaction_date = date('d-m-Y');
?>
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
  
<center>

<a href="<?php echo $webroot_path; ?>Cashbanks/new_bank_receipt" class="btn yellow" rel='tab'>Create</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" class="btn" rel='tab'>View</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_deposit_slip" class="btn" rel='tab'>Deposit Slip</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_approve" class="btn" rel='tab'>Approve Receipts</a>
<!--<a href="#" class="btn purple" role="button" id="import" style="float:right; margin-right:8px;">Import csv</a>-->
<a href="<?php echo $webroot_path; ?>Cashbanks/import_bank_receipts_csv" class="btn purple"   style="float:right; margin-right:8px;">Import csv</a>
</center>

<style>

</style>
<!--
<div id="url_main">
</div> -->
<!-------- Start New Code for Bank Receipt in New_Hm --------------------->
<form method="post">
<div id="url_main">
<table class="table table-bordered" style="background-color:white; width:100%; overflow:inherit;">
<thead>
<tr>
<th>Transaction Date</th>
<th>Deposited In</th>
<th>Receipt Mode</th>
<th>Receipt Type</th>
<th>Amount</th>
<th>Narration</th>
</tr>

</thead>

<tbody id="new_cash_add">

<tr>

	<td> 
	<input type="text" class="date-picker m-wrap small" 
	data-date-format="dd-mm-yyyy" style="background-color:white !important; margin-top:3px;" 
	value="<?php echo $transaction_date; ?>" id="date1" name="transaction_date[]">
	</td>
					  
					  
	<td>
	<select class="small m-wrap chosen" id="wbnk1">
	<option value="" style="display:none;">Select Bank</option>    
	<?php
	foreach ($result_ledger_sub_account as $db) 
	{
	$bank_id = (int)$db['ledger_sub_account']["auto_id"];
	$bank_ac = $db['ledger_sub_account']["name"];
	$bank_account_number = $db['ledger_sub_account']["bank_account"];
	?>
	<option value="<?php echo $bank_id; ?>"><?php echo $bank_ac; ?> &nbsp;(<?php echo $bank_account_number; ?>)</option>
	<?php } ?>
	</select>
	</td>

<td>
	<select class="medium m-wrap chosen show_div">
	<option value="" style="display:none;">receipt mode</option>    
	<option value="Cheque">Cheque</option>
	<option value="NEFT">NEFT</option>
	<option value="PG">PG</option>
	</select><br>
<div class="hide receipt_mode_first">
<input type="text" placeholder="Cheque No." class="m-wrap span6" 
id="chhno1" style="background-color:#FFF !important; margin-top:3px;">

<input type="text" class="date-picker m-wrap span6" data-date-format="dd-mm-yyyy" 
placeholder="Date" id="dtt1" style="background-color:#FFF !important; margin-top:3px;"/><br>
	
<div class="hide receipt_mode" >
<input type="text" class="m-wrap span6" placeholder="Drawn on which bank?" id="bnkkk1" 
style="background-color:#FFF !important; margin-top:3px;" data-provide="typeahead" 
data-source="[<?php if(!empty($kendo_implode)) { echo $kendo_implode; } ?>]">

<input type="text" class="m-wrap span6" placeholder="Branch of Bank" 
id="branchh1" style="background-color:#FFF !important; margin-top:3px;" data-provide="typeahead" 
data-source="[<?php if(!empty($kendo_implode2)) { echo $kendo_implode2; } ?>]">
</div>
</td>

<td>
<select class="medium m-wrap chosen receive_from" valign="top" onchange="rcpttypp(this.value,1)" id="rec_typp1">
<option value="" style="display:none;">received from</option>    
<option value="1">Residential</option>
<option value="2">Non-Residential</option>
</select>
	<div class="resident_drop_down">
	<?php
	$this->requestAction(array('controller' => 'Hms', 'action' => 'resident_drop_down')); ?>
	</div>
		
		<div  class='receipt_type'>
		<select class="m-wrap chosen medium" id="ttppp1" onchange="amtshw2(this.value,1)">
		<option value="" style="display:none;">Select Receipt Type</option>
		<option value="1">Maintanace Receipt</option>
		<option value="2">Other Receipt</option>
		</select><br>
		</div>
		<div class="hide bill_reference">
		<input type="text" class="m-wrap span12"  placeholder="Bill Reference" 
				 style="background-color:#FFF !important; margin-top:3px;"/>
		
		</div>
		
		<div class="hide party_acount">
		<select class="m-wrap chosen span12" >
			<option value="" style="display:none;">Select</option>
			<?php 
			foreach($cursor4 as $dataa)
			{
			$name = $dataa['ledger_sub_account']['name'];	
			$auto_id = $dataa['ledger_sub_account']['auto_id'];	
			?>
			<option value="<?php echo $auto_id; ?>"><?php echo $name; ?></option>
			<?php	
			}
			?>
		</select>
		
		</div>
</td>
<td>
<input type="text" class="m-wrap small" 
style="text-align:right; background-color:#FFF !important; margin-top:3px;"
maxlength="10" onkeyup="numeric_vali(this.value,1)" id="amttt1" placeholder="Amount" />
</td>
<td>
 <input type="text" class="m-wrap small" style="background-color:#FFF !important; margin-top:3px;" id="desc1" Placeholder="Narration" />
</td>
</tr>
</tbody>
</table>
<button type="button" name="sub" id="add" class="btn blue">Add </button>
</div>
</form>

<script>
$(document).ready(function() { 
 $("#add").bind('click',function(){
		var count = $("#new_cash_add tr").length;
		count++;
		$.get('new_cash_receipt_add?q='+count, function(data){
			content= data;
			$('#new_cash_add').append(content);
		});
		
	    });
		
	$(".delete").die().live('click',function(){
		
	var id = $(this).attr("id");
	$('#ad'+id).remove();
	});
	
	
$(".show_div").live('change',function(){
	var value=$(this).val();
	
	if(value == "Cheque"){
			$(this).closest("tr").find(".receipt_mode_first").show();	
			$(this).closest("tr").find(".receipt_mode").show();
					
	}else{
		
		
			$(this).closest("tr").find(".receipt_mode_first").show();	
			$(this).closest("tr").find(".receipt_mode").hide();
		}	
});
 });
</script>

<!--------------------- End Import Code ------------------------------>


<script>
function numeric_vali(vv,dd)
{

if($.isNumeric(vv))
{
$("#validdn").html('');	
}
else
{
$("#validdn"+dd).html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">Amount Should be Numeric value in row '+ dd +'</div>');
$("#amttt"+ dd).val("");
return false;		
}
}
</script>
<script>
function rcpttypp(tt,ii)
{
	alert(tt);
	alert(ii);
	if(tt == 2)
	{
	$("#prt_nam" + ii).show();
    $("#sel_resdnt" + ii).hide();
    $("#refrnc" + ii).show();
    $("#recet_typp" + ii).hide();

	$("#pppp_nnn" + ii).load("non_member_add_ajax?&kk="+ii+"&typ="+2+"");
	$("#bill_refe_type" + ii).load("bank_receipt_type_ajax?&kk="+ii+"&typ="+2+"");
	
	}	
	else{
		
		$("#pppp_nnn" + ii).load("non_member_add_ajax?&kk="+ii+"&typ="+1+"");
		$("#bill_refe_type" + ii).load("bank_receipt_type_ajax?&kk="+ii+"&typ="+1+"");
		
	
   $("#prt_nam" + ii).hide();
   $("#sel_resdnt" + ii).show();
   $("#refrnc" + ii).hide();
    $("#recet_typp" + ii).show();
	
	}
	
}


</script>
<script>



function amtshw2(r,s)
{
	
var flat_id = $("#fltt" + s).val();	

$("#amtview" + s).load("bank_receipt_amt_ajax?type="+r+"&flat="+flat_id+"&cc="+s+"");
}
function amtshw1(p,q)
{
var type = $("#ttppp" + q).val();	
$("#amtview" + q).load("bank_receipt_amt_ajax?type="+type+"&flat="+p+"&cc="+q+"");
}
</script>

<script>
function add_rowww()
{
var count = $("#main_table")[0].rows.length;
$(".adrww").hide();
count++;
$.ajax({
		url: 'new_bank_receipt_add_row?con=' + count,
		}).done(function(response) {
			$("#main_table").append(response);	
         $(".adrww").show();
});	
}
function delete_row(idd)
{
	$('.content_'+idd).remove();
}
</script>



<script>
$(document).ready(function() { 




	$('form').submit( function(ev){
	ev.preventDefault();
		var count = $("#main_table")[0].rows.length;
		var ar = [];
	for(var i=1;i<=count;i++)
		{
	var transaction_date = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(1) input").val();
	var bank_id = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(2) select").val();
	var mode = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(3) select").val();
			
			if(mode == "Cheque")
			{
	var cheque_no = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(4) input").val();
	var cheque_date = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(5) input").val();
	var drawn_bank = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(6) input").val();
	var branch = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(1) input").val();
			}
				else
				{
				var utr = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(4) input").val();	
				var date = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(2) td:nth-child(5) input").val();
				}
	var received_from = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(2) select").val();
			  if(received_from == 1)
			  {
			  var flat_id = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(3) select").val();
			
			 var receipt_type = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(4) select").val();
			     }
				else
				{
				var party_name = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(3) select").val();
				 
				var bill_ref = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(4) input").val();
				
				}
		var amount = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(5) input").val();
		var narration = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_table tr:nth-child(4) td:nth-child(6) input").val();
		
		ar.push([transaction_date,bank_id,mode,cheque_no,cheque_date,drawn_bank,date,utr,received_from,flat_id,receipt_type,party_name,bill_ref,amount,narration,branch]);
		
		}
		
		var myJsonString = JSON.stringify(ar);
			$.ajax({
			url: "bank_receipt_json?q="+myJsonString,
			dataType:'json',
			}).done(function(response){
					
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
<a href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" class="btn red" rel='tab'>OK</a>
</div>
</div>
</div> 

<script>
$(document).ready(function() {
$("#import").bind('click',function(){
$("#myModal3").show();
});
$("#close_div").bind('click',function(){
$("#myModal3").hide();
});
});
</script>
<script>
function hiddd()
{
$("#billlshh").hide();	
}

</script>
<script>
        $(document).ready(function(){
		$(".delete").live('click',function(){
		var id = $(this).attr("del");
		$('#tr'+id).remove();
		});	
		$('form#form1').submit( function(ev){
		ev.preventDefault();
		
		var im_name=$("#image-file").val();
		var insert = 1;
		if(im_name==""){
		$("#vali").html("<span style='color:red;'>Please Select a Csv File</span>");	
		return false;
		}
		
		var ext = $('#image-file').val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['csv']) == -1) {
		$("#vali").html("<span style='color:red;'>Please Select a Csv File</span>");
		return false;
		}

			$(".import_btn").text("Importing...");
			var m_data = new FormData();
			m_data.append( 'file', $('input[name=file]')[0].files[0]);
			$.ajax({
			url: "bank_receipt_import_ajax",
			data: m_data,
			processData: false,
			contentType: false,
			type: 'POST',
			}).done(function(response){
			$("#myModal3").hide();
			$("#url_main").html(response);
		
			$(".bank_receipt_import").bind('click',function(){
			var count = $("#open_bal tr").length;
			var ar = [];
			var insert = 2;

			for(var i=1; i<=count; i++)
			{
			$("#open_bal tr:nth-child("+i+") span.report").remove();
			$("#open_bal tr:nth-child("+i+") span.report").css("background-color","#FFF;");
			var TransactionDate = $("#open_bal tr:nth-child("+i+") td:nth-child(1) input").val();
			var ReceiptMod=$("#open_bal tr:nth-child("+i+") td:nth-child(2) input").val();
			var ChequeNo=$("#open_bal tr:nth-child("+i+") td:nth-child(3) input").val();
			var branch = $("#open_bal tr:nth-child("+i+") td:nth-child(4) input").val();
			var Reference=$("#open_bal tr:nth-child("+i+") td:nth-child(5) input").val();
			var DrawnBankname=$("#open_bal tr:nth-child("+i+") td:nth-child(6) input").val();
			var Date1=$("#open_bal tr:nth-child("+i+") td:nth-child(7) input").val();
			var bank_id=$("#open_bal tr:nth-child("+i+") td:nth-child(8) select").val();
			var auto_id=$("#open_bal tr:nth-child("+i+") td:nth-child(9) select").val();
			var Amount=$("#open_bal tr:nth-child("+i+") td:nth-child(10) input").val();
			var narration=$("#open_bal tr:nth-child("+i+") td:nth-child(11) input").val();
			ar.push([TransactionDate,ReceiptMod,ChequeNo,Reference,DrawnBankname,Date1,bank_id,auto_id,Amount,insert,narration,branch]);
			}

			var myJsonString = JSON.stringify(ar);
			myJsonString=encodeURIComponent(myJsonString);
			$.ajax({
			url: "save_bank_imp?q="+myJsonString,
			type: 'POST',
			dataType:'json',
			}).done(function(response) {
			if(response.report_type=='validation')
			{
			$("#validdn").html('<div class="alert alert-error">'+response.text+'</div>');
			}
			if(response.report_type=='done')
			{
			$("#url_main").html('<div class="alert alert-block alert-success fade in"><h4 class="alert-heading">Success!</h4><p>Record Inserted Successfully</p><p><a class="btn green" href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" rel="tab">OK</a></p></div>');
		}
		});
		});
		});
		});
		});
</script>

<script>
function bill_detall(tt)
{
$("#showww").html('Loading...').load("bill_show_ajax?ff=" +tt+ "");	
}
</script>



<div id="add_memrr" class="hide">
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body">
<label style="font-size:14px;">Member Name</label>
<div class="controls">
<input type="text" id="mem_name" class="m-wrap span8">
<span id="vall"></span>
</div>
</div>
<div class="modal-footer">
<a class="btn" onclick="hide_add_mem()">Cancel</a>
<a class="btn red" onclick="add_non_member()">Add</a>
</div>
</div>
</div> 
<div id="add_memrr2" class="hide">
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body">
<h4><b>Thank You!</b></h4>
The Non Residential Member Added Successfully
</div>
<div class="modal-footer">
<a class="btn red" onclick="add_non_member2()">OK</a>
</div>
</div>
</div> 
<script>
function add_member()
{
	
$("#add_memrr").show();	
}

function hide_add_mem()
{
$("#add_memrr").hide();	
} 
function add_non_member()
{
var name = $("#mem_name").val();	
if(name == "")
{
$("#vall").html('<p style="font-size:14px; color:red;">Member Name can not be Empty</p>');	
}
else
{
var count = $("#main_table")[0].rows.length;
var hhh = 1;
for(var k=1; k<=count; k++)	
{
$("#pppp_nnn" + k).load("bank_receipt_member_add_ajax?nammm="+name+"&kk="+k+"&hh="+hhh+"");
$("#add_memrr").hide();
$("#mem_name").val("");	
$("#add_memrr2").show();
hhh++;
}
}
}
function add_non_member2()
{
var count = $("#main_table")[0].rows.length;
for(var k=1; k<=count; k++)	
{
var type = $("#rec_typp" + k).val();	
	
$("#pppp_nnn" + k).load("non_member_add_ajax?&kk="+k+"&typ="+type+"");
$("#add_memrr2").hide();
}	
}

</script>


<div id="ggggggg"></div>







