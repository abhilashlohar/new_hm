<?php
//pr($result_journal);
?>
  
<style>
#main_table th{
	font-size: 12px !important;padding:2px;border:solid 1px #55965F;white-space: nowrap !important; 
}
#main_table td{
	padding:2px;
	font-size: 12px;border:solid 1px #55965F;background-color:#FFF;white-space: nowrap !important; 
}
.text_bx{
	width: 50px;
	height: 15px !important;
	margin-bottom: 0px !important;
	font-size: 12px;
}
.text_rdoff{
	width: 50px;
	height: 15px !important;
	border: none !important;
	margin-bottom: 0px !important;
	font-size: 12px;
}
</style>  

<div id="submiting_div" style="display:none;">
	<div class="modal-backdrop fade in"></div>
	<div class="modal" id="poll_edit_content">
		<div class="modal-body">
		<div align="center">
		<img src="<?php echo $webroot_path; ?>as/fb_loading.gif" style="height: 15px;" />
		<h4>Please Wait</h4>
		<h5>Your data is under processing, kindly wait.</h5>
		</div>
        </div>
	</div>
</div>
 <div style="padding-left: 2px;">
	<a href="<?php echo $webroot_path; ?>Bookkeepings/journal_view" role="button" rel="tab" class="btn blue"> Back </a>
 </div>			
<div id="succ">
<center><h4>Edit Journal Voucher: <?php echo $result_journal[0]["journal"]["voucher_id"]; ?></h4></center>
<div class="portlet box" style="width:100%;">
<div class="portlet-title">
<h4><i class="icon-reorder"></i>Create Journal Voucher</h4>
</div>
<div class="portlet-body form">
<?php $transaction_date=$result_journal[0]["journal"]["transaction_date"];
$remark=$result_journal[0]["journal"]["remark"]; ?>
<form  method="POST" onSubmit="return balance()" >	
<input type="text" id="date"  name="date" class="all_validate  m-wrap m-ctrl-medium date-picker"  data-date-format="dd-mm-yyyy" style="background-color:#FFF !important;" placeholder="Transaction Date" value="<?php echo date("d-m-Y",$transaction_date) ?>">
<br><br>




<div id="error_msg"></div>
<div id="result11"></div>

<input type="hidden" id="t_box" name="xyz" value="<?php echo sizeof($result_journal); ?>">

<div id="add_div" >
<table width="100%" id="main_table" >
<thead>
<tr class="table table-bordered table-hover" style="font-size:16px;" >
<th>Ledger A/c</th>
<th>Debits</th>
<th>Credits</th>
<th></th>
</tr>
</thead>
<tbody>
<?php 
$cq=0;
foreach($result_journal as $data) { $cq++;
	$journal_id=$data["journal"]["journal_id"];
	 $ledger_account_id=$data["journal"]["ledger_account_id"];echo"<br>";
	 $ledger_sub_account_id=$data["journal"]["ledger_sub_account_id"];
	$debit=$data["journal"]["debit"];
	$credit=$data["journal"]["credit"];?>
<tr class="table table-bordered table-hover" id="tr<?php echo $cq; ?>">
	<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px; ">
		<select class="large m-wrap chosen">
			<option value="" style="display:none;">Select Ledger A/c</option>
			<?php
			foreach ($cursor1 as $collection) 
			{
			$auto_id = (int)$collection['ledger_account']['auto_id'];
			$name = $collection['ledger_account']['ledger_name'];
			if($auto_id != 34 && $auto_id != 33 && $auto_id != 15 && $auto_id != 112)
			{
				if($ledger_account_id==$auto_id){$checked='selected="selected"';}else{$checked='';}
			?>
			<option value="<?php echo $auto_id; ?>,2" <?php echo $checked; ?>><?php echo $name; ?></option>
			<?php }}
			foreach ($cursor2 as $collection) 
			{
			$account_number = "";
			$wing_flat = "";
			$auto_id2 = (int)$collection['ledger_sub_account']['auto_id'];
			$name2 = $collection['ledger_sub_account']['name']; 
			$ledger_id = (int)$collection['ledger_sub_account']['ledger_id'];

			if($ledger_sub_account_id==$auto_id2 ){$checked='selected="selected"';}else{$checked='';}
			
			if($ledger_id == 34){
				$result_member = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($auto_id2)));
				$name2=$result_member['user_name'];
				$wing_name=$result_member['wing_name'];
				$flat_name=$result_member['flat_name'];
				$wing_flat=$wing_name.'-'.$flat_name;
			}
			if($ledger_id == 33){
			$account_number = $collection['ledger_sub_account']['bank_account'];  	

			}
			?>

			<option value="<?php echo $auto_id2; ?>,1" <?php echo $checked; ?>><?php echo $name2; ?> &nbsp;&nbsp; <?php echo @$wing_flat; ?><?php echo @$account_number; ?></option>

			<?php } ?>
		</select>
	</td>	
	<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px;">
		<div class="control-group">
			<div class="controls">
			<input type="text" class="all_validate span12 m-wrap" style="background-color:#FFF !important;text-align:right;" onblur="total_am('<?php echo $cq; ?>')" name="debit1" placeholder="" id="debit<?php echo $cq; ?>" maxlength="10" onkeyup="amtvalidat1(this.value,<?php echo $cq; ?>)" value="<?php echo $debit; ?>" />
			</div>
		</div>
	</td>					
	<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px; ">
		<div class="control-group">
			<div class="controls">
			<input type="text" class="all_validate span12 m-wrap" style="background-color:#FFF !important;text-align:right;" name="credit1" onblur="total_amc('<?php echo $cq; ?>')" placeholder="" id="credit<?php echo $cq; ?>" maxlength="10" onkeyup="amtvalidat2(this.value,<?php echo $cq; ?>)" value="<?php echo $credit; ?>" />
			</div>
		</div>
	</td>
	<td width="2%">  <?php  if($cq!=1 and $cq!=2){ ?> <a href="#" role="button" class="btn mini delete_ledger" update_id="<?php echo $journal_id; ?>"><i class="icon-trash"></i></a><?php } ?></td>
</tr>
<?php } ?>


</tbody>
<tfoot>
<tr class="table table-bordered table-hover">

<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px; text-align:right;">
<div align="left">
<input type="text"  name="remark1" class="all_validate span10 m-wrap m-ctrl-medium" value="<?php echo $remark; ?>"  style="background-color:#FFF !important;" placeholder="Narration" id="desc1">
<span style="float:right;"> <b> Total </b> </span>
</div>

</td>
<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px;">
<div class="control-group">
<div class="controls">
<input type="text" class="all_validate span12 m-wrap" style="background-color:#FFF !important; border:none !important; text-align:right;" id="total" style="border:none !important;">
</div>
</div>
</td>
<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px;">
<div class="control-group">
<div class="controls">
<input type="text" class="all_validate span12 m-wrap" style="background-color:#FFF !important; border:none !important; text-align:right;" id="total_c" style="border:none !important;text-align:right;">
</div>
</div>
</td>

<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px; "></td>
</tr>

</tfoot>
</table>
</div>

<br><br>
<div class="form-actions" style="background-color:#fff">

<button type="button" id="button_add" class="btn blue"> <i class="icon-plus"></i> Add Row</button>
<a href="journal_add" class="btn">Reset</a>
<div class="pull-right">
<button type="submit" class="btn blue" name="journal_add" id="submit">Submit</button> </div>
</div>


</form>
</div>
</div>
</div>
<div id="test"></div>
<script>
function amtvalidat1(vvv,ddd)
{
if($.isNumeric(vvv))
{
$("#error_msg").html('');	
}
else
{
$("#error_msg").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">Amount Should be Numeric Value in row '+ ddd +'</div>');
$("#debit"+ ddd).val("");
return false;		
}
}


function amtvalidat2(vvv,ddd)
{
if($.isNumeric(vvv))
{
$("#error_msg").html('');	
}
else
{
$("#error_msg").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">Amount Should be Numeric Value in row '+ ddd +'</div>');
$("#credit"+ ddd).val("");
return false;		
}

}










</script>

<script>
$(document).ready(function() {
	
	$(".delete_ledger").die().live('click',function(){ 
		var id=$(this).attr("update_id");
		/* $.ajax({
			url: "<?php echo $webroot_path; ?>/Bookkeepings/journal_edit_delete_row/"+id,
			}).done(function(response) {
				
		});	*/
		$(this).closest("tr").remove();	
	});
	
	
$("#button_add").bind('click',function(){
var c=$("#main_table tbody tr").length;

c++;
$.ajax({
url: '<?php echo $webroot_path; ?>Bookkeepings/journal_add_row?con=' + c,
}).done(function(response) {
$('table#main_table tbody').append(response);
});
});

$(".delete_row").live('click',function(){
var id=$(this).attr("id");
$('#tr'+id).remove();
});
});
</script>	

<script>
function show_ledger_type(c1,t)
{
$(document).ready(function() {
$("#show_ledger_type" + t).load("show_ledger_type?c1=" +c1+ "&t=" +t+ "");
});
}
</script>
<script>
function total_amc(l)
{
var t_c = 0;
var count = $("#main_table tbody tr").length;
for(var k = 1; k<=count; k++)
{
var credit = document.getElementById('credit' + k).value;
if(credit == "")
{
credit = 0;
}
else
{
credit = eval(credit);
}
t_c = eval(t_c + credit);
}
document.getElementById('total_c').value = t_c;
}
</script>

<script>
function total_am(x)
{
var t_d = 0;
var count = $("#main_table tbody tr").length;
for(var j = 1; j<=count; j++)
{
var debit = document.getElementById('debit' + j).value;
if(debit == "")
{
debit = 0;
}
else
{
debit = eval(debit);
}
if(debit!=0)
{
t_d = eval(t_d + debit);
}
}
document.getElementById('total').value = t_d;
}
</script>

<script>
$(document).ready(function() {
	$('form').submit( function(ev){
		
	ev.preventDefault();
	$("#submit").addClass("disabled").text("submiting...");
		
		var hidden=$("#main_table tbody tr").length;
		
		var date = $("#date").val();
		
		var ar = [];
		for(var i=1;i<=hidden;i++)
		{
		var ledger = $("#main_table tbody tr:nth-child("+i+") td:nth-child(1) select").val();
		var debit = $("#main_table tbody tr:nth-child("+i+") td:nth-child(2) input").val();
		var credit = $("#main_table tbody tr:nth-child("+i+") td:nth-child(3) input").val();
		var desc = encodeURIComponent($("#desc1").val());
		
		ar.push([ledger,debit,credit,desc]);
		
		var myJsonString = JSON.stringify(ar);
		var date2 = JSON.stringify(date)
		}
		$('#test').show().html('<div id="submiting_div" style="position: absolute;top: 100;z-index: 99999;left: 45%;background-color: #FFE2E2;padding: 10px;"><div class="modal-backdrop fade in"></div><div class="modal" id="poll_edit_content"><div class="modal-body"><div align="center"><img src="<?php echo $webroot_path; ?>as/fb_loading.gif" style="height: 15px;" /><h4>Please Wait</h4></div></div></div></div>');
			$.ajax({
			url: "<?php echo $webroot_path; ?>Bookkeepings/journal_update?q="+myJsonString+"&b="+date2+"&v_id="+<?php echo $voucher_id; ?>,
			dataType:'json',
			}).done(function(response) {
			 $("#output").html(response);
				
				if(response.type == 'error'){  
				$('#test').hide();
					output = '<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">'+response.text+'</div>';
					$("#submit").removeClass("disabled").text("submit");
					$("html, body").animate({
					 scrollTop:0
					 },"slow");
				     }
					
				if(response.type=='succ'){
				  window.location.href = '<?php echo $webroot_path; ?>Bookkeepings/journal_view';
				}
				
				$("#error_msg").html(output);
});
});
});
</script>



<div id="succes_show" class="hide">
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body">
<h4><b>Thank You!</b></h4>
The Journal Vouchers Genarated Successfully
</div>
<div class="modal-footer">
<a class="btn red" href="<?php echo $webroot_path; ?>Bookkeepings/journal_view" rel="tab">OK</a>
</div>
</div>
</div>


