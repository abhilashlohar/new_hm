
<tr class="table table-bordered table-hover" id="tr<?php echo $t; ?>">
<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px; ">
<select class="large m-wrap chosen ledger_account_by_group">
						<option value="" style="display:none;">Select Ledger A/c</option>
						<?php
							 foreach ($cursor1 as $collection) 
							 {
							   $auto_id = (int)$collection['ledger_account']['auto_id'];
							   $name = $collection['ledger_account']['ledger_name'];
						if($auto_id != 34 && $auto_id != 33  && $auto_id != 15 && $auto_id != 112)
						{
						?>
						<option value="<?php echo $auto_id; ?>,2"><?php echo $name; ?></option>
							 <?php }}
                             foreach ($cursor2 as $collection) 
							 {
							$account_number = "";
							$wing_flat = "";
							 $auto_id2 = (int)$collection['ledger_sub_account']['auto_id'];
							 $name2 = $collection['ledger_sub_account']['name']; 
                             $ledger_id = (int)$collection['ledger_sub_account']['ledger_id'];
						
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
                          
					<option value="<?php echo $auto_id2; ?>,1"><?php echo $name2; ?> &nbsp;&nbsp; <?php echo @$wing_flat; ?><?php echo @$account_number; ?></option>
						  
						  <?php } ?>
					</select><div class="group_name" style="float:right"></div>

</td>





<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px; ">
<div class="control-group">
<div class="controls">

<input type="text" name="debit<?php echo $t; ?>"  class=" span12 m-wrap m-ctrl-medium" onblur="total_am(<?php echo $t; ?>)" style="background-color:#FFF !important;text-align:right;" placeholder="" maxlength="10" id="debit<?php echo $t; ?>" onkeyup="amtvalidat1(this.value,<?php echo $t; ?>)">

</div>
</div>
</td>

<td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:0px; ">
<div class="control-group">
<div class="controls">
<input type="text" class="span12 m-wrap" style="background-color:#FFF !important;text-align:right;" name="credit<?php echo $t; ?>" onblur="total_amc(<?php echo $t; ?>)"placeholder="" maxlength="10" id="credit<?php echo $t; ?>" onkeyup="amtvalidat2(this.value,<?php echo $t; ?>)">
</div>
</div>
</td>


<td width="2%"><a href="#" role="button" class="btn mini delete_row" id="<?php echo $t; ?>"><i class="icon-trash"></i></a></td>
</tr>

































