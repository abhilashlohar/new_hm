
<br/>
<?php //$default_date = date('d-m-Y'); 

//pr($result_fix_asset);
foreach($result_fix_asset as $data){
	$fix_asset_id=$data['fix_asset']['fix_asset_id'];
	$fix_receipt_id=(int)$data['fix_asset']['fix_receipt_id'];
	$asset_category_id=$data['fix_asset']['asset_category_id'];
	$asset_supplier_id=$data['fix_asset']['asset_supplier_id'];
	$asset_name=$data['fix_asset']['asset_name'];
	$purchase_date=$data['fix_asset']['purchase_date'];
	$purchase_date=date('d-m-Y',$purchase_date);
	$description=$data['fix_asset']['description'];
	$file = @$data['fix_asset']['file_name'];
	$amount=$data['fix_asset']['cost_of_purchase'];
	$warranty_period_to=$data['fix_asset']['warranty_period_to'];
	$warranty_period_from=$data['fix_asset']['warranty_period_from'];
	$maintanance_schedule=$data['fix_asset']['maintanance_schedule'];
	
}


?> 

<!--------------------------------- Start Fixed Assets Form -------------------------------------->
<form method="post" id="contact-form" name="myform" enctype="multipart/form-data">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Update Fixed Assets</h4>
</div>
<div class="portlet-body form">
<div id="validdn"></div> 
<table class="table table-hover" style="background-color:#CDE9FE;" id="main_table">
<tr>
<td style="">
         <table class="table table-bordered" id="subb_table">  
         
		       <tr style="background-color:#E8EAE8;">
		       <th style="width:20%;">
			   Asset Category <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
		       <th style="width:20%;">
			   Date of Purchase <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
               <th style="width:20%;">
			   Name of Supplier <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
               <th style="width:20%;">
			   Rupees <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
			   <th style="width:20%;">
			   Asset Name <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></th>
               </tr>
		

	              <tr style="background-color:#E8F3FF;">
			   
					<td>
					<select name="asset_category" class="m-wrap span12 chosen" id="category1">
					<option value="">Select category</option>
					<?php
					foreach ($result_ledger_account as $collection) 
					{
					$auto_id = (int)$collection['ledger_account']['auto_id'];
					$ledger_name = $collection['ledger_account']['ledger_name'];	
					if($auto_id != 18)
					{	
					?>
					<option value="<?php echo $auto_id; ?>" <?php if($auto_id==$asset_category_id){ ?> selected <?php } ?>><?php echo $ledger_name; ?></option>
					<?php }} ?>
					</select>
					</td>
			
			
						<td>
						<input type="text" class="date-picker m-wrap span12" 
						data-date-format="dd-mm-yyyy" name="purchase_date" value="<?php echo $purchase_date; ?>" 
						style="margin-top:3px; background-color:white !important;" id="datt1">
						</td>


						<td>
						<select name="vendor" class="m-wrap span12 chosen" id="vendrr1">
						<option value="">Select</option>
						<?php
						foreach ($result_ledger_sub_account as $db) 
						{
						$auto_id=(int)$db['ledger_sub_account']["auto_id"];
						$ledger_sub_account_name=$db['ledger_sub_account']["name"];
						?>
						<option value="<?php echo $auto_id; ?>" <?php if($auto_id==$asset_supplier_id){ ?> selected <?php } ?>><?php echo $ledger_sub_account_name; ?></option>
						<?php } ?>
						</select>
						</td>
				
					<td>
					<input type="text" class="m-wrap span12" 
					style="text-align:right; margin-top:3px; background-color:white !important;" 
					maxlength="10" onkeyup="amt_vali(this.value,1)" id="amountt1" value="<?php echo $amount; ?>">
					</td>
		 
		 
				<td>
				<input type="text" class="m-wrap span12" 
				style="margin-top:3px; background-color:white !important;" id="asstnamm1" value="<?php echo $asset_name; ?>">
				</td>

				</tr>
                <tr style="background-color:#E8EAE8;">
  		   
			   <th colspan="2">Warranty Period (Optional)</th> 
			   <th>Asset Description (Optional)</th> 
			   <th>Maintanance Schedule (Optional)</th> 
			   <th>File (Optional)</th> 
			   </tr>

                <tr style="background-color:#E8F3FF;">
					   <td>
					   <input type="text" class="span12 m-wrap date-picker" 
					   data-date-format="dd-mm-yyyy" id="from1"
					   placeholder="From" style="margin-top:3px; background-color:white !important;"value="<?php echo $warranty_period_from; ?>">
					   </td>
			   
				   <td>
				   <input type="text" class="span12  m-wrap date-picker" 
				   data-date-format="dd-mm-yyyy"  id="to1"
				   placeholder="to" style="margin-top:3px; background-color:white !important;" value="<?php echo $warranty_period_to; ?>">
				   </td>
				   
				   
					   <td>
					   <input type="text" class="m-wrap span12" 
					   style="margin-top:3px; background-color:white !important;" id="desc1" value="<?php echo $description; ?>">
					   </td>
			   
				   <td>
				   <input type="text" class="m-wrap span12" 
				   style="margin-top:3px; background-color:white !important;" id="shedul1" value="<?php echo $maintanance_schedule; ?>">
				   </td>
			   
			   <td>
					<span class="btn btn-file">
					<i class="icon-upload-alt"></i>
					<input type="file" class="default" name="file1">
					</span>
			   </td>			   
			   </tr>

         </table>
</td>

</tr>
</table>
<div class="form-actions">
		<a href="<?php echo $webroot_path; ?>Hms/fix_asset_view" class="btn green" rel="tab"><i class="icon-arrow-left"></i> Back</a>
		<button type="submit" class="btn form_post"  style="background-color: #09F; color:#fff;" value="xyz">Update</button>
		<div style="display:none;" id='wait'><img src="<?php echo $webroot_path; ?>as/fb_loading.gif" /> Please Wait...</div>
		</div>
</div>
</div>
</form>
<!-----------------------------------End Fixed Assets Form ---------------------------------------->


<script>
function amt_vali(amttt,vv)
{
if($.isNumeric(amttt))
{
$("#validdn").html('');	
}
else
{
$("#validdn").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">Amount Should be Numeric Value in row '+vv+'</div>');
$("#amountt" + vv).val("");
return false;		
}
}
</script>

<script>
$(document).ready(function() { 
	$('form').submit( function(ev){
		ev.preventDefault();
	    var m_data = new FormData(); 	
		var count = $("#main_table")[0].rows.length;
		var ar = [];
     	for(var i=1;i<=count;i++)
		{
		var asset_cat = $("#main_table tr:nth-child("+i+") td:nth-child(1) #subb_table tr:nth-child(2) td:nth-child(1) select").val();
		var purchase_date = $("#main_table tr:nth-child("+i+") td:nth-child(1) #subb_table tr:nth-child(2) td:nth-child(2) input").val();
		var supplier = $("#main_table tr:nth-child("+i+") td:nth-child(1) #subb_table tr:nth-child(2) td:nth-child(3) select").val();
		var cost = $("#main_table tr:nth-child("+i+") td:nth-child(1) #subb_table tr:nth-child(2) td:nth-child(4) input").val();
		var asset_name = $("#main_table tr:nth-child("+i+") td:nth-child(1) #subb_table tr:nth-child(2) td:nth-child(5) input").val();
		var from_war =  $("#main_table tr:nth-child("+i+") td:nth-child(1) #subb_table tr:nth-child(4) td:nth-child(1) input").val();
		var to_war = $("#main_table tr:nth-child("+i+") td:nth-child(1) #subb_table tr:nth-child(4) td:nth-child(2) input").val();
		var desc = $("#main_table tr:nth-child("+i+") td:nth-child(1) #subb_table tr:nth-child(4) td:nth-child(3) input").val();
		var shedule = $("#main_table tr:nth-child("+i+") td:nth-child(1) #subb_table tr:nth-child(4) td:nth-child(4) input").val();
		m_data.append( 'file'+i, $('input[name=file'+i+']')[0].files[0]);
		ar.push([asset_cat,purchase_date,supplier,cost,asset_name,from_war,to_war,desc,shedule]);
		
		}
		//$('button').hide();
		m_data.append( 'fix_asset_id', <?php echo $fix_asset_id; ?>);
		var myJsonString = JSON.stringify(ar);
		m_data.append('myJsonString',myJsonString);
			$.ajax({
			url: "<?php echo $webroot_path; ?>/Hms/fix_asset_json_update",
			data: m_data,
			processData: false,
			contentType: false,
			type: 'POST',
			dataType:'json',
			}).done(function(response){
				
			if(response.type == 'error'){
				$('button').show();
			 $("#validdn").html('<div class="alert alert-error" style="color:red; font-weight:600; font-size:13px;">'+response.text+'</div>');
			}
		    if(response.type == 'success'){
			//  window.location.href = '<?php echo $webroot_path; ?>Hms/fix_asset_view';
				$("#shwd").show();
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
<p class="swwtxx">Fixed Asset is successfully updated</p>
</div>
<div class="modal-footer">
<a href="<?php echo $webroot_path; ?>Hms/fix_asset_view" class="btn red" rel='tab'>OK</a>
</div>
</div>
</div> 	