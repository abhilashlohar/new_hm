<?php
$default_date = date('d-m-Y');
?>

<tr class="content_<?php echo $count; ?>">
<td style="">
         <table class="table table-bordered" id="subb_table">  
         
		       <tr style="background-color:#E8EAE8;">
		       <th style="width:20%;">
			   Asset Category <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span>
			   </th>
		       <th style="width:20%;">
			   Date of Purchase <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span>
			   </th>
               <th style="width:20%;">
			   Name of Supplier <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span>
			   </th>
               <th style="width:20%;">
			   Rupees <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span>
			   </th>
			   <th style="width:20%;">
			   Asset Name <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span>
			   </th>
               </tr>
		

	              <tr style="background-color:#E8F3FF;">
			   
					<td>
					<select name="asset_category" class="m-wrap span12 chosen" id="category<?php echo $count; ?>">
					<option value="">Select category</option>
					<?php
					foreach ($result_ledger_account as $collection) 
					{
					$auto_id = (int)$collection['ledger_account']['auto_id'];
					$ledger_name = $collection['ledger_account']['ledger_name'];	
					if($auto_id != 18)
					{	
					?>
					<option value="<?php echo $auto_id; ?>"><?php echo $ledger_name; ?></option>
					<?php }} ?>
					</select>
					</td>
			
			
						<td>
						<input type="text" class="date-picker m-wrap span12" 
						data-date-format="dd-mm-yyyy" name="purchase_date" value="<?php echo $default_date; ?>" 
						style="margin-top:3px; background-color:white !important;" id="datt<?php echo $count; ?>">
						</td>


						<td>
						<select name="vendor" class="m-wrap span12 chosen" id="vendrr<?php echo $count; ?>">
						<option value="">Select</option>
						<?php
						foreach ($result_ledger_sub_account as $db) 
						{
						$auto_id=(int)$db['ledger_sub_account']["auto_id"];
						$ledger_sub_account_name=$db['ledger_sub_account']["name"];
						?>
						<option value="<?php echo $auto_id; ?>"><?php echo $ledger_sub_account_name; ?></option>
						<?php } ?>
						</select>
						</td>
				
					<td>
					<input type="text" class="m-wrap span12" style="text-align:right; margin-top:3px; background-color:white !important;" 
					maxlength="10" onkeyup="amt_vali(this.value,<?php echo $count; ?>)" id="amountt<?php echo $count; ?>">
					</td>
		 
		 
				<td>
				<input type="text" class="m-wrap span12" style="margin-top:3px;
				background-color:white !important;" id="asstnamm<?php echo $count; ?>">
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
					   data-date-format="dd-mm-yyyy"  id="from<?php echo $count; ?>"
					   placeholder="From" style="margin-top:3px; background-color:white !important;">
					   </td>
			   
				   <td>
				   <input type="text" class="span12  m-wrap date-picker" 
				   data-date-format="dd-mm-yyyy" id="to<?php echo $count; ?>"
				   placeholder="to" style="margin-top:3px; background-color:white !important;">
				   </td>
				   
				   
					   <td>
					   <input type="text" class="m-wrap span12" 
					   style="margin-top:3px; background-color:white !important;" id="desc<?php echo $count; ?>">
					   </td>
			   
				   <td>
				   <input type="text" class="m-wrap span12" 
				   style="margin-top:3px; background-color:white !important;" id="shedul<?php echo $count; ?>">
				   </td>
			   
			   <td>
					<span class="btn btn-file">
					<i class="icon-upload-alt"></i>
					<input type="file" class="default" name="file<?php echo $count; ?>">
					</span>
			   </td>			   
			   </tr>

         </table>
</td>
<td style="vertical-align:middle;">
<a class="btn green mini adrww" onclick="add_rowwss()"><i class="icon-plus"></i></a><br>
<a  class="btn mini" onclick="delete_row(<?php echo $count; ?>)"><i class="icon-trash"></i></a><br>
</td>
</tr>