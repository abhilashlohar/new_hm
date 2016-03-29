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
$("#select_all").die().bind("click",function(){
	var action=true;
	$('#sub_modules input[type="checkbox"][module_id]').each(function(i, obj) {
		$(this).attr("checked","checked");
		$(this).closest("span").addClass("checked");
		var module_id=$(this).attr("module_id");
		var sub_module_id=$(this).attr("sub_module_id");
		if(module_id!="" && sub_module_id!=""){
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

	});
});
$("#deselect_all").die().bind("click",function(){
	var action=false;
	$('#sub_modules input[type="checkbox"][module_id]').each(function(i, obj) {
		$(this).removeAttr("checked");
		$(this).closest("span").removeClass("checked");
		var module_id=$(this).attr("module_id");
		var sub_module_id=$(this).attr("sub_module_id");
		if(module_id!="" && sub_module_id!=""){
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

	});
});
</script>


