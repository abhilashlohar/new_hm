<?php foreach($main_modules as $data){
	$module_id=$data["main_module"]["auto_id"];
	$module_name=$data["main_module"]["module_name"];?>
	<li class="asd" module_id="<?php echo $module_id; ?>"><?php echo $module_name; ?></li>
<?php } ?>