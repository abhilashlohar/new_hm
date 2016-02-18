<?php foreach($sub_modules as $data){
	$sub_module_id=$data["sub_module"]["auto_id"];
	$sub_module_name=$data["sub_module"]["sub_module_name"];?>
	<li class="pqr" sub_module_id="<?php echo $sub_module_id; ?>">
	<label><input type="checkbox" /><?php echo $sub_module_name; ?></label></li>
<?php } ?>