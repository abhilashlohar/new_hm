<?php foreach($main_modules as $module_data){
	$module_name=$module_data["main_module"]["module_name"]; 
	$default_assign=$module_data["main_module"]["default_assign"];
	if($default_assign=="yes"){$checked="checked";}else{$checked="";} ?>
	<div>
	<input type="checkbox" value="1" <?php echo $checked; ?> /><span><?php echo $module_name; ?></span>
	<div>
		<table class="table table-bordered table-condensed">
			<tr>
				<th>Sub-Module</th>
				<th>Admin</th>
				<th>Resident</th>
			</tr>
			<tr>
				<td>Sub-Module</td>
				<td>Admin</td>
				<td>Resident</td>
			</tr>
		</table>
	</div>
	</div>
<?php } ?>
