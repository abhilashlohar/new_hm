<div style="background-color:#FFF;"> 
<table class="table table-bordered table-condensed ">
	<tr>
		<th>Module Name</th>
		<th>Sub-module Name </th>
		<th>Society</th>
		<th>Admin</th>
		<th>Resident</th>
	</tr>
	<?php foreach($main_modules as $module_data){
		$module_id=$module_data["main_module"]["auto_id"]; 
		$module_name=$module_data["main_module"]["module_name"]; 
		$default_assign=$module_data["main_module"]["default_assign"];
		if($default_assign=="yes"){$checked="checked"; $bcolor="background-color:#FFF;"; $disabled=''; }else{$checked=""; $bcolor="background-color:#E7E7E7;"; $disabled='disabled="disabled"'; }
		$sub_modules=$this->requestAction(array('controller' => 'Fns', 'action' => 'sub_module_info_via_module_id'), array('pass' => array($module_id)));
		$rowspan=sizeof($sub_modules); 
		
		$i=0;
		foreach($sub_modules as $sub_module_data){ $i++;
		$sub_module_id=$sub_module_data["sub_module"]["auto_id"];
		$sub_module_name=$sub_module_data["sub_module"]["sub_module_name"];
		$admin=@$sub_module_data["sub_module"]["admin"]; 
		$resident=@$sub_module_data["sub_module"]["resident"]; 
		if($admin=="yes"){$admin="checked";}else{$admin="";} 
		if($resident=="yes"){$resident="checked";}else{$resident="";} ?>
		<?php if($i==1){ ?>
		<tr>
			<td rowspan="<?php echo $rowspan; ?>" style="border-top: 2px solid #CCC;"><?php echo $module_name; ?></td>
			<td style="border-top: 2px solid #CCC;"><?php echo $sub_module_name; ?></td>
			<td rowspan="<?php echo $rowspan; ?>" style="border-top: 2px solid #CCC;">
			<input type="checkbox" class="enable" value="1" <?php echo $checked; ?> module_id="<?php echo $module_id; ?>" />
			</td>
			<td style="border-top: 2px solid #CCC;<?php echo $bcolor; ?>">
			<input type="checkbox" class="dis<?php echo $module_id; ?> sub_enable" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_id; ?>" <?php echo $admin; ?> <?php echo $disabled; ?> role="admin" />
			</td>
			<td style="border-top: 2px solid #CCC;<?php echo $bcolor; ?>">
			<input type="checkbox" class="dis<?php echo $module_id; ?> sub_enable" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_id; ?>" <?php echo $resident; ?> <?php echo $bcolor; ?> <?php echo $disabled; ?> role="resident" />
			</td>
		</tr>
		<?php }else{ ?>
		<tr>
			<td><?php echo $sub_module_name; ?></td>
			<td style="<?php echo $bcolor; ?>">
			<input type="checkbox" class="dis<?php echo $module_id; ?> sub_enable" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_id; ?>" <?php echo $disabled; ?> <?php echo $admin; ?> role="admin" />
			</td>
			<td style="<?php echo $bcolor; ?>">
			<input type="checkbox" class="dis<?php echo $module_id; ?> sub_enable" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_id; ?>" <?php echo $disabled; ?> <?php echo $resident; ?> role="resident" />
			</td>
		</tr>
		<?php } ?>
		
	<?php } } ?>
</table>
</div>

<script>
$(document).ready(function() {
	 $(".enable").on('click',function(){
		var enable=$(this).is(":checked");
		var module_id=$(this).attr("module_id");
		if(enable===true){
			$(".dis"+module_id).attr("disabled", false);
			$(".dis"+module_id).closest("td").css("background-color","#FFF");
			$.ajax({
				url: "<?php echo $webroot_path; ?>Hms/update_default_module_by_hm_ajax/"+module_id+"/yes",
			}).done(function(response) {
			});
		}else{
			$(".dis"+module_id).attr("disabled", true);
			$(".dis"+module_id).closest("span").removeClass('checked');
			$(".dis"+module_id).prop('checked', false);
			$(".dis"+module_id).closest("td").css("background-color","#E7E7E7");
			$.ajax({
				url: "<?php echo $webroot_path; ?>Hms/update_default_module_by_hm_ajax/"+module_id+"/no",
			}).done(function(response) {
			});
		}
	 });
	 
	$(".sub_enable").on('click',function(){
		var checked=$(this).is(":checked");
		var sub_module_id=$(this).attr("sub_module_id");
		var role=$(this).attr("role");
		if(checked===true){
			$.ajax({
				url: "<?php echo $webroot_path; ?>Hms/update_default_sub_module_by_hm_ajax/"+sub_module_id+"/"+role+"/yes",
			}).done(function(response) {
			});
		}else{
			$.ajax({
				url: "<?php echo $webroot_path; ?>Hms/update_default_sub_module_by_hm_ajax/"+sub_module_id+"/"+role+"/no",
			}).done(function(response) {
			});
		}
	});
});
</script>	

