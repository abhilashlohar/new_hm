<input type="text" class="date-picker m-wrap span4" data-date-format="dd-mm-yyyy" 
value="<?php echo $tra_date; ?>" 
style="background-color:white !important; margin-top:2.5px;" field="transaction_date" record_id="1" placeholder="Date">
<br>
 <br>
<div style="background-color: #FFF;"> 
<table class="table table-bordered table-striped" style="width:100%; background-color:white;" id="open_bal">
<tr>
<th>Account Group</th>
<th>Account Name</th>
<th>Debit</th>
<th>Credit</th>
<th>Penalty</th>
<th>Delete</th>
</tr>
<?php $j=0;
$total_debit = 0;
$total_credit = 0; 
$total_penalty = 0;
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
<input type="text" class="m-wrap span10" style="background-color:white !important;"
value="<?php echo @$debit; ?>" field="debit" record_id="<?php echo $csv_id; ?>" />
</td>

<td>
<input type="text" class="m-wrap span10" style="background-color:white !important;"
value="<?php echo @$credit; ?>" field="credit" record_id="<?php echo $csv_id; ?>" />
</td>

<td>
<input type="text" class="m-wrap span10" style="background-color:white !important;"
value="<?php echo @$penalty; ?>" field="penalty" record_id="<?php echo $csv_id; ?>" />                       
</td>                      

<td>
<a href="#" role="button" class="btn mini red delete" del="<?php echo $j; ?>"><i class="icon-remove icon-white"></i></a>
</td>

	
</tr>
<?php } ?>
<tr>
<th colspan="2" style="text-align:right;">Total</th>
<th><input type="text" class="m-wrap small" value="<?php echo $total_debit; ?>" style="background-color:white !important;"></th>
<th><input type="text" class="m-wrap small" value="<?php echo $total_credit; ?>" style="background-color:white !important;"></th>
<th><input type="text" class="m-wrap small" value="<?php echo $total_penalty; ?>" style="background-color:white !important;"></th>
<th></th>
</tr>
</table>
</div>



<br/>
<a href="<?php echo $webroot_path; ?>Accounts/opening_balance_import?bbb=55" rel="tab" class="btn purple big"><i class="m-icon-big-swapleft m-icon-white"></i> Back</a>
<a class="btn purple big" role="button" id="final_import">IMPORT OPENING BALANCE <i class="m-icon-big-swapright m-icon-white"></i></a>									
<div id="check_validation_result"></div>		  



<script>/*
$( document ).ready(function() {
	$( 'input[type="text"]' ).keyup(function() {
		
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


	
}); */
</script> 

<script>
$( document ).ready(function() {
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
$( "#final_import" ).click(function() {
$("#check_validation_result").html('<img src="<?php echo $webroot_path; ?>as/loding.gif" /><span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Importing Receipts.</span>');

$.ajax({
url: "<?php echo $webroot_path; ?>Accounts/allow_import_opening_balance",
}).done(function(response){
	alert(response);
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