<style>
#tbb th{
	font-size: 10px !important;background-color:#69F1AD; border:solid 1px #000; 
}
#tbb td{
	font-size: 10px;border:solid 1px #55965F;background-color:#F7F7F7; 
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
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
<center>
<a href="<?php echo $webroot_path; ?>Cashbanks/fix_deposit_add" class="btn yellow" rel='tab'>Add</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/fix_deposit_view" class="btn" rel='tab'>Active Deposits</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/matured_deposit_view" class="btn" rel='tab'>Matured Deposits</a>
<a href="<?php echo $webroot_path; ?>Cashbanks/fixed_deposit_renewal_show" class="btn" rel='tab'>Renewal View</a>
</center>	
<?php
$default_date = date('d-m-Y');
?>
<!------------------------------ Start Fixed Deposit Form ------------------------------->
<form method="post">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Create New Fixed Deposit</h4>
</div>
<div class="portlet-body form" id="load_class">
<div id="validdn"></div>
<table class="table table-hover" style="background-color:#CDE9FE;" id="main_table">
 <tr>          
   <td >
       <table class="table table-bordered" id="sub_tablll">		 
		 <tr style="background-color:#E8EAE8;">
               <th style="width:20%;">Bank Name <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
			   <th style="width:20%;">Branch <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
			   <th style="width:20%;">Account Reference <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
			   <th style="width:20%;">Principal Amount <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
			   <th style="width:20%;">Start Date</th>
			</tr> 
              
             <tr style="background-color:#E8F3FF;">
               <td>
			   <input type="text" class="m-wrap span12 corsrr" data-provide="typeahead" 
			   data-source="[<?php if(!empty($kendo_implode)) { echo $kendo_implode; } ?>]" 
			   style="background-color:#FFF !important;">
			   </td>
			   
			   <td>
			   <input type="text" class="m-wrap span12 corsrr" style="background-color:#FFF !important;" 
			   data-provide="typeahead" 
			   data-source="[<?php if(!empty($kendo_implode2)) { echo $kendo_implode2; } ?>]">
			   </td>
			   
			   
               <td>
			   <input type="text" class="m-wrap span12 corsrr" style="background-color:#FFF !important;">
			   </td>
			   
			   <td>
			   <input type="text" class="m-wrap span12 corsrr" style="text-align:right; background-color:#FFF !important;" 
			   maxlength="10" onkeyup="numeric_vali(this.value,1)" id="amttt1">
			   </td>
			   
				 <td>
				 <input type="text" class="date-picker m-wrap span12 corsrr datepick" data-date-format="dd-mm-yyyy" 
				 value="<?php echo $default_date; ?>" style="background-color:#FFF !important;">
				 </td>
			 
			 </tr>
			 <tr style="background-color:#E8EAE8;">
                 <th>Maturity Date <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span> </th>
				 <th>Interest Rate% <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
				 <th>Attachment</th>
				 <th colspan="2">Purpose <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
				 
             </tr>
					
					<tr style="background-color:#E8F3FF;">
					
                    <td>
					<input type="text" class="date-picker m-wrap span12 corsrr datepick" 
					data-date-format="dd-mm-yyyy" style="background-color:#FFF !important;">
					</td>
					
					<td>
					<input type="text"  name="interest_rate" class="m-wrap span12 corsrr" 
					maxlength="5" onkeyup="intrest_vali(this.value,1)" 
					id="intrate1" style="background-color:#FFF !important; text-align:right;">
					</td>
					
						<td>
						<span class="btn btn-file">
						<i class="icon-upload-alt"></i>
						<input type="file" class="default">
						</span>
						</td>
						
					<td colspan="2">
					<select class="m-wrap span12 chosen">
					<option value="" style="display:none;">Select</option>
					<option value="General Fund">General Fund</option>
					<option value="Reserve Fund">Reserve Fund</option>
					<option value="Repairs and Maintenance Fund">Repairs and Maintenance Fund</option>
					<option value="Sinking Fund">Sinking Fund</option>
					<option value="Major Repair Fund">Major Repair Fund</option>
					<option value="Education and Training Fund">Education and Training Fund</option>
					</select>
					</td>
					</tr>			 
			</table> 
     </td>
			
			
			<td style="vertical-align:middle" >
			<a class="btn green mini adrww" onclick="fix_deposit_add_row()"><i class="icon-plus"></i></a><br>
			</td>
</tr>	 
</table>
<div class="form-actions">
<button type="submit" class="btn green corsrr">Submit</button>
</div>
</div>
</div>
</form>
<!--------------------------------End Fixed Deposit Form -------------------------------------->

<script>
function numeric_vali(vv,dd)
{
if($.isNumeric(vv))
{
$("#validdn").html('');	
}
else
{
$("#validdn").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">Principal Amount Should be Numeric Value in row '+ dd +'</div>');
$("#amttt"+ dd).val("");
return false;		
}
}

function intrest_vali(vvv,ddd)
{
if($.isNumeric(vvv))
{
$("#validdn").html('');	
}
else
{
$("#validdn").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">Interest Rate Should be Numeric Value in row '+ ddd +'</div>');
$("#intrate"+ ddd).val("");
return false;		
}
}
</script>


<script>
function fix_deposit_add_row()
{
var count = $("#main_table")[0].rows.length;
$(".adrww").hide();
count++;
$.ajax({
		url: 'fixed_deposit_add_row?con=' + count,
		}).done(function(response) {
			$("#main_table").append(response);	
         $(".adrww").show();
});		
}
function delete_rowwww(tt)
{
$('.content_'+tt).remove();	
}
</script>

  
 <script>
$(document).ready(function(){ 
	$('form').submit( function(ev){
	
	ev.preventDefault();
	var m_data = new FormData(); 	
		var count = $("#main_table")[0].rows.length;
		var ar = [];
       
		for(var i=1;i<=count;i++)
		{
		var bank_name = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_tablll tr:nth-child(2) td:nth-child(1) input").val();
		var branch = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_tablll tr:nth-child(2) td:nth-child(2) input").val();
		var ac_reference = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_tablll tr:nth-child(2) td:nth-child(3) input").val();
		var pricipal_amt = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_tablll tr:nth-child(2) td:nth-child(4) input").val();
		var start_date = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_tablll tr:nth-child(2) td:nth-child(5) input").val();
		var maturity_date = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_tablll tr:nth-child(4) td:nth-child(1) input").val();
		var interest = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_tablll tr:nth-child(4) td:nth-child(2) input").val();
		var purpose = $("#main_table tr:nth-child("+i+") td:nth-child(1) #sub_tablll tr:nth-child(4) td:nth-child(4) select").val();
		
		 m_data.append('file'+i,$('#main_table tr:nth-child('+i+') td:nth-child(1) #sub_tablll tr:nth-child(4) td:nth-child(3) input[type=file]')[0].files[0]);
		ar.push([bank_name,branch,ac_reference,pricipal_amt,start_date,maturity_date,interest,purpose]);
		
		}
		$('.form-actions').hide();
		var myJsonString = JSON.stringify(ar);
		m_data.append('myJsonString',myJsonString);
			$.ajax({
			url: "<?php echo $webroot_path; ?>Cashbanks/fix_deposit_json",
			data: m_data,
			processData: false,
			contentType: false,
			type: 'POST',
			dataType:'json',
			}).done(function(response){
					//alert(response);
		if(response.type == 'error'){
			$('.form-actions').show();
			 $("#validdn").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">'+response.text+'</div>');
			$("html, body").animate({
					 scrollTop:0
					 },"slow");
			}
		    if(response.type == 'success'){
			  window.location.href = '<?php echo $webroot_path; ?>Cashbanks/fix_deposit_add';
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
<p class="swwtxx"></p>
</div>
<div class="modal-footer">
<a href="<?php echo $webroot_path; ?>Cashbanks/fix_deposit_add" class="btn red" rel='tab'>OK</a>
</div>
</div>
</div> 	
<script>
$(document).ready(function() {
<?php
$vouchar=$this->Session->read('fix_ddd');
$status5=(int)$vouchar[0];
if($status5==1)
{
?>
$.gritter.add({
title: 'Fixed Deposit',
text: '<p>Voucher <?php echo $vouchar[1]; ?> is generated successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(1501)));
} ?>
});
</script> 
	

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			























