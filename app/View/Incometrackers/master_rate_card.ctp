<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div>
<a href="<?php echo $webroot_path; ?>Incometrackers/select_income_heads" class="btn" rel='tab'>Selection of Income Heads</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_rate_card" class="btn yellow" style="font-size:16px;" rel='tab'>Rate Card</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_noc" class="btn" style="font-size:16px;" rel='tab'>Non Occupancy Charges</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_penalty" class="btn" style="font-size:16px;" rel='tab'>Penalty Option</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/neft_add" class="btn" style="font-size:16px;" rel='tab'>Add NEFT</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_setup" class="btn" style="font-size:16px;" rel='tab'>Remarks</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/other_charges" class="btn" rel='tab'>Other Charges</a>
</div>

<div style="background-color: rgb(255, 255, 255);padding: 5px;overflow-x: auto;">
<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th>Flat type</th>
			<?php foreach($income_heads as $income_head):
				$income_head_name=$this->requestAction(array('controller' => 'Fns', 'action' => 'income_head_name_via_income_head_id'), array('pass' => array($income_head)));?>
			<th><?php echo $income_head_name; ?></th>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tbody>
	<?php foreach($flat_type_ids as $flat_type_id){
		$flat_type_name=$this->requestAction(array('controller' => 'Fns', 'action' => 'flat_type_name_via_flat_type_id'), array('pass' => array($flat_type_id)));?>
		<tr>
			<th><?php echo $flat_type_name; ?></th>
			<?php foreach($income_heads as $income_head){
				$rate_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'get_rates_via_flat_type_id_and_income_head_id'), array('pass' => array($flat_type_id,$income_head)));
				$rate_type=@$rate_info[0]["rate_card"]["rate_type"];
				$rate=@$rate_info[0]["rate_card"]["rate"];?>
			<td>
				<select class="m-wrap small" flat_type_id="<?php echo $flat_type_id; ?>" income_head_id="<?php echo $income_head; ?>">
					<option value="" style="display:none;">Select</option>
					<option value="1" <?php if($rate_type==1){ echo "selected"; } ?>>Lump Sum</option>
					<option value="2" <?php if($rate_type==2){ echo "selected"; } ?>>Per Square Feet</option>
					<option value="3"<?php if($rate_type==3){ echo "selected"; } ?>>Flat Type</option>
				</select>
				<input class="m-wrap small" style="text-align:right;" maxlength="10" type="text" value="<?php echo $rate; ?>" flat_type_id="<?php echo $flat_type_id; ?>" income_head_id="<?php echo $income_head; ?>">
			</td>
			<?php } ?>
		</tr>
	<?php } ?>
	</tbody>
</table>
</div>
<script>
$(document).ready(function(){
	$("input").bind("blur",function(){
		var flat_type_id=$(this).attr("flat_type_id");
		var income_head_id=$(this).attr("income_head_id");
		var rate_type=$(this).closest("td").find("select").val();
		var rate=parseFloat($(this).closest("td").find("input").val());
		if(rate_type!=""){
			if(isNaN(rate)===true){rate=0;}
			$.ajax({
				url: "<?php echo $webroot_path; ?>Incometrackers/auto_save_rate_card/"+flat_type_id+"/"+income_head_id+"/"+rate_type+"/"+rate,
			}).done(function(response){
				//alert(response);
			});
		}
		
	})
	
	$("select").bind("change",function(){
		var flat_type_id=$(this).attr("flat_type_id");
		var income_head_id=$(this).attr("income_head_id");
		var rate_type=$(this).closest("td").find("select").val();
		if(rate_type!=""){
			var rate=parseFloat($(this).closest("td").find("input").val());
			if(isNaN(NaN)===true){rate=0;}
			$.ajax({
				url: "<?php echo $webroot_path; ?>Incometrackers/auto_save_rate_card/"+flat_type_id+"/"+income_head_id+"/"+rate_type+"/"+rate,
			}).done(function(response){
				//alert(response);
			});
		}
		
	})
});
</script>