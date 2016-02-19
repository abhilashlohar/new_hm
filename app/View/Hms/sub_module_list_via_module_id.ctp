<span style="font-weight: bold; color: rgb(92, 92, 92);">Sub-Modules</span><br/>
<?php foreach($sub_modules as $data){
	$sub_module_id=$data["sub_module"]["auto_id"];
	$sub_module_name=$data["sub_module"]["sub_module_name"];
	$module_id=$data["sub_module"]["module_id"];?>
	<li class="pqr" >
	<label><input type="checkbox" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_id; ?>" /><?php echo $sub_module_name; ?></label></li>
<?php } ?>
<script>
$("input:checkbox").bind("click",function(){
	$("body").find("#success_msg").html("saving changes...");
	var module_id=$(this).attr("module_id");
	var sub_module_id=$(this).attr("sub_module_id");
	if(module_id!="" && sub_module_id!=""){
		var action=$(this).is(":checked");
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/save_role_privilage/"+module_id+"/"+sub_module_id+"/"+action+"/<?php echo $role_id; ?>",
		}).done(function(response) {
			if(response=="ok"){
				$("body").find("#success_msg").html("");
			}else{
				$("body").find("#success_msg").html("Something went wrong.Didn't save changes.");
			}
		});
	}
})
</script>