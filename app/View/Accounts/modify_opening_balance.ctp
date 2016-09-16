<input type="hidden" id="fi" value="<?php echo $datef1; ?>" />
<input type="hidden" id="ti" value="<?php echo $datet1; ?>" />
<input type="hidden" id="cn" value="<?php echo $count; ?>" />

<input type="text" class="date-picker m-wrap span4" data-date-format="dd-mm-yyyy" 
value="<?php echo $tra_date; ?>" 
style="background-color:white !important; margin-top:2.5px;" field="transaction_date" record_id="1" placeholder="Transaction Date" id="date">

<div style="background-color: #FFF;"> 
<table class="table table-bordered table-condensed" style="width:100%; background-color:white;" id="open_bal">
<tr>
<th>Account Group</th>
<th>Account Group</th>
<th>Account Name</th>
<th>Account Name</th>
<th>Debit</th>
<th>Credit</th>
<th>Penalty</th>
</tr>
<?php $j=0;
$total_debit = 0;
$total_credit = 0; 
$total_penalty = 0;
$grand_total_debit=0;
$grand_total_credit=0;
?>
			
<?php foreach($result_bank_receipt_converted as $data){ 
 $csv_id=(int)$data['opening_balance_csv_converted']['auto_id']; 
 $group_id2=(int)$data['opening_balance_csv_converted']['group_id'];
 $ledger_id=(int)$data['opening_balance_csv_converted']['ledger_id'];
 $ledger_type=(int)$data['opening_balance_csv_converted']['ledger_type'];
 $wing_id = (int)$data['opening_balance_csv_converted']['wing_id'];
 $flat_id = (int)$data['opening_balance_csv_converted']['flat_id'];
 $debit = $data['opening_balance_csv_converted']['debit'];
 $credit = $data['opening_balance_csv_converted']['credit'];
 $penalty = $data['opening_balance_csv_converted']['penalty'];
 $total_debit=$total_debit+$debit;
 $total_credit=$total_credit+$credit;
 $total_penalty=$total_penalty+$penalty;
 $grand_total_credit=$grand_total_credit+$credit;
 $grand_total_debit=$grand_total_debit+$debit+$penalty;
 ?>
<tr id="<?php echo $csv_id; ?>">
<td>
<?php foreach($cursor3 as $collection){
$group_id5 = (int)$collection['accounts_group']['auto_id'];
$group_name1= $collection['accounts_group']['group_name'];
?>
<?php if($group_id2 == $group_id5) { ?><?php echo $group_name1; ?><?php }} ?>
<?php if($group_id2 == 15) { ?> Sundry Creditors Control A/c <?php } ?>
<?php if($group_id2 == 112) { ?> Sundry Debtors Control A/c <?php } ?>
<?php if($group_id2 == 33) { ?> Bank Accounts <?php } ?>
<?php if($group_id2 == 35) { ?> Tax deducted at source (TDS receivable) <?php } ?>
<?php if($group_id2 == 34) { ?> Members Control Account <?php } ?>
</td>

<td>
<select class="chosen main_account" update_id="<?php echo $csv_id; ?>"  >
<?php foreach($cursor3 as $collection){
$group_id5 = (int)$collection['accounts_group']['auto_id'];
$group_name1= $collection['accounts_group']['group_name'];
?>

<option value="<?php echo $group_id5; ?>,2" <?php if($group_id2 == $group_id5) { ?> selected <?php } ?> ><?php echo $group_name1; ?></option>
<?php } ?>
<option value="15,1" <?php if($group_id2 == 15) { ?> selected <?php } ?> > Sundry Creditors Control A/c </option>
<option value="112,1" <?php if($group_id2 == 112) { ?> selected <?php } ?> > Sundry Debtors Control A/c </option>
<option value="33,1" <?php if($group_id2 == 33) { ?> selected <?php } ?> > Bank Accounts </option>
<option value="35,1" <?php if($group_id2 == 35) { ?> selected <?php } ?> > Tax deducted at source (TDS receivable) </option>
<option value="34,1" <?php if($group_id2 == 34) { ?> selected <?php } ?>> Members Control Account </option>
</select>

</td>

<td>
<select class="group_account">
<option> hello</option>
</select>

</td>




<td>
<?php if($ledger_type == 1){ ?>	
<?php foreach($cursor1 as $dataa){
$auto_id = (int)$dataa['ledger_sub_account']['auto_id'];
$name = $dataa['ledger_sub_account']['name'];
?>
<?php if($auto_id == $ledger_id) { ?><?php echo $name; ?><?php } ?>
<?php } ?>
<?php	
}
else{
?>	
<?php foreach($cursor2 as $dataa){
$auto_id = (int)$dataa['ledger_account']['auto_id'];
$name = $dataa['ledger_account']['ledger_name'];
?>
<?php if($auto_id == $ledger_id) { ?><?php echo $name; ?><?php } ?></option>
<?php	
}
?>
</select>
<?php	
}
?>
</td>

<td>
<input type="text" class="m-wrap span10 debit" style="background-color:white !important; text-align:right;"
value="<?php echo @$debit; ?>" field="debit" record_id="<?php echo $csv_id; ?>"/>
</td>

<td>
<input type="text" class="m-wrap span10 credit" style="background-color:white !important; text-align:right;"
value="<?php echo @$credit; ?>" field="credit" record_id="<?php echo $csv_id; ?>" />
</td>

<td>
<input type="text" class="m-wrap span10 penalty" style="background-color:white !important; text-align:right;"
value="<?php echo @$penalty; ?>" field="penalty" record_id="<?php echo $csv_id; ?>" />                       
</td>                      

</tr>
<?php } ?>
<tr>
<th colspan="2" style="text-align:right;">Total</th>
<th><input type="text" class="m-wrap small total_debit" value="<?php echo $total_debit; ?>" style="background-color:white !important; text-align:right;" id="total_debit" readonly="readonly"></th>
<th><input type="text" class="m-wrap small total_credit" value="<?php echo $total_credit; ?>" style="background-color:white !important; text-align:right;" id="total_credit" readonly="readonly"></th>
<th><input type="text" class="m-wrap small total_penalty" value="<?php echo $total_penalty; ?>" style="background-color:white !important; text-align:right;" id="total_penalty" readonly="readonly"></th>
</tr>
<tr>
<th colspan="2" style="text-align:right;">Grand Total</th>
<th><input type="text" class="m-wrap small" id="grand_total_debit" value="<?php echo $grand_total_debit; ?>" readonly="readonly" style="text-align:right;"><br><b>Total Debit</b></th>
<th colspan="2"><input type="text" class="m-wrap small" id="grand_total_credit" value="<?php echo $grand_total_credit; ?>" readonly="readonly" style="text-align:right;"><br><b>Total Credit</b></th>
</table>
</div>
<div id="validat" style="color:red;"></div>


<br/>
<a href="<?php echo $webroot_path; ?>Accounts/opening_balance_import?bbb=55" rel="tab" class="btn blue"><i class="icon-circle-arrow-left"></i> Back</a>
<a class="btn blue" role="button" id="final_import">IMPORT OPENING BALANCE <i class="icon-circle-arrow-right"></i></a>									
<div id="check_validation_result"></div>		  





<script>
$( document ).ready(function() {

$( 'select.main_account' ).change(function() {	
	var accounts_group=$(this).val();
	var update_id=$(this).attr("update_id");
	$(this).closest('tr').find('td:nth-child(3)').load('group_wise_show_ledger_account/'+accounts_group+'/'+update_id);
	
});	
	
	$( 'input[type="text"]' ).blur(function() {
		var record_id=$(this).attr("record_id");
		var field=$(this).attr("field");
		var value=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Accounts/auto_save_opening_balance/"+record_id+"/"+field+"/"+value,
		}).done(function(response){
			
			if(response=="F"){
				$("#main_table tr#"+record_id+" td").each(function(){
					$(this).find('input[field="'+field+'"]').parent("div").css("border", "solid 1px red");
				});
			}else{
				$("#main_table tr#"+record_id+" td").each(function(){
					$(this).find('input[field="'+field+'"]').parent("div").css("border", "");
				});
			}
		});
	});
	$('.debit,.credit,.penalty').die().live("keyup",function(){
		var amount=$(this).val();
		if($.isNumeric(amount)){
		}else{
			$(this).val('');	
		}
	});
}); 
</script>


<script>
$( document ).ready(function() {
	$( 'input[type="text"]' ).blur(function() {
		
		var record_id=$(this).attr("record_id");
		var field=$(this).attr("field");
		var value=$(this).val();
		
		$.ajax({
			url: "<?php echo $webroot_path; ?>Accounts/auto_save_opening_balance_date/"+record_id+"/"+field+"/"+value,
		}).done(function(response){
			
			if(response=="F"){
				$("#main_table tr#"+record_id+" td").each(function(){
					$(this).find('input[field="'+field+'"]').parent("div").css("border", "solid 1px red");
				});
			}else{
				$("#main_table tr#"+record_id+" td").each(function(){
					$(this).find('input[field="'+field+'"]').parent("div").css("border", "");
				});
			}
		});
	});


	
});
</script>

<script>			  
$(document).ready(function() {
$("#final_import" ).click(function() {
var total_credit = $('#grand_total_credit').val();
var total_debit = $('#grand_total_debit').val();	
if(total_credit != total_debit)
{
$("#validat").html('Total Debit Shold be Equal to Total Credit');	
return false;	
}	

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
	$("#validat").html('Please Select Transaction Date');	
	return false;
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
$("#validat").html('Date Should be in Open Financial Year');	
return false;		
}	
	
$("#check_validation_result").html('<img src="<?php echo $webroot_path; ?>as/loding.gif" /><span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Importing Receipts.</span>');

$.ajax({
url: "<?php echo $webroot_path; ?>Accounts/allow_import_opening_balance",
}).done(function(response){
	//alert(response);
response = response.replace(/\s+/g,' ').trim();
if(response=="F"){
$("#check_validation_result").html("");
alert("Your Data Is Not Valid.");
}else{
	
change_page_automatically("<?php echo $webroot_path; ?>Accounts/opening_balance_import");
}
});
});	
});	  
</script>


<script>			  
	function change_page_automatically(pageurl){
	$("#loading").show();

	$.ajax({
		url: pageurl,
		}).done(function(response) {
		
		//$("#loading_ajax").html('');
		
		$(".page-content").html(response);
		$("#loading").hide();
		$("html, body").animate({
			scrollTop:0
		},"slow");
		 $('#submit_success').hide();
		});
	
	window.history.pushState({path:pageurl},'',pageurl);
}		  
</script>	
<style>
input{
margin: 0 !important;
padding: 2px !important;
}
</style>


<script>
$(document).ready(function(){
	  function grand_total(){
		var total_debit = $("#total_debit").val();
		var total_credit = $("#total_penalty").val();
		if($.isNumeric(total_debit)==false){ total_debit=0; }
		if($.isNumeric(total_credit)==false){ total_credit=0; }
		var grand_total_debit = parseFloat(total_debit) + parseFloat(total_credit);
		var grand_total_credit=parseFloat($("#total_credit").val());
		if($.isNumeric(grand_total_credit)==false){ grand_total_credit=0; }
		$("#grand_total_debit").val(grand_total_debit);	
		$("#grand_total_credit").val(grand_total_credit);
	}   
	
	$(".debit").on("blur",function(){
		var sum = 0;
		$(".debit").each(function(){
			sum2 = +$(this).val();
			if($.isNumeric(sum2)==false){ sum2=0; }
			sum+=sum2;
			total_debit+= +$(this).val();
		});
		$(".total_debit").val(sum);
		grand_total();
	});
	
	$(".credit").on("blur",function(){
		
		 var sum = 0;
		$(".credit").each(function(){
			sum2=+$(this).val();
			if($.isNumeric(sum2)==false){ sum2=0; }
			sum+=sum2;
		});
		$(".total_credit").val(sum);
		grand_total();
	});
	
	$(".penalty").on("blur",function(){
				var sum = 0;
		$(".penalty").each(function(){
			sum2= +$(this).val();
			if($.isNumeric(sum2)==false){ sum2=0; }
			sum+=sum2;
		});
		$(".total_penalty").val(sum);
		grand_total();
	});
});
</script>