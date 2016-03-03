<?php 
$sub_modules=$this->requestAction(array('controller' => 'Fns', 'action' => 'sub_module_info_via_module_id'), array('pass' => array((int)$module_id))); 
foreach($sub_modules as $sub_module_data){ 
	$sub_module_id=$sub_module_data["sub_module"]["auto_id"];
	$sub_module_name=$sub_module_data["sub_module"]["sub_module_name"];
	$admin=@$sub_module_data["sub_module"]["admin"]; 
	$owner=@$sub_module_data["sub_module"]["owner"];
	$tenant=@$sub_module_data["sub_module"]["tenant"];
	$owner_family=@$sub_module_data["sub_module"]["owner_family"];
	$tenant_family=@$sub_module_data["sub_module"]["tenant_family"];	
	$combine=(int)@$sub_module_data["sub_module"]["combine"];
	$arranged_sub_modules[$combine][]=array("sub_module_id"=>$sub_module_id,"sub_module_name"=>$sub_module_name,"admin"=>$admin,"owner"=>$owner,"tenant"=>$tenant,"owner_family"=>$owner_family,"tenant_family"=>$tenant_family);
	}
	
	if($society=="yes"){ $society_checked='checked'; }else{ $society_checked=''; }
	?>
	
	<label><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_id; ?>" society="yes" <?php echo $society_checked; ?> /> Assign to society</label>
	<table class="table table-bordered table-condensed ">
	<tr>
		<th>Sub-module Name</th>
		<th>Admin</th>
		<th>Owner</th>
		<th>Tenant</th>
		<th>Owner family member</th>
		<th>Tenant family member</th>
	</tr>
	<?php
	foreach($arranged_sub_modules as $key=>$data){ 
		if($key==0){ 
		foreach($data as $key2=>$info){ 
			$admin=$info["admin"];
			$owner=$info["owner"];
			$tenant=$info["tenant"];
			$owner_family=$info["owner_family"];
			$tenant_family=$info["tenant_family"];
			if($admin=="yes"){ $admin_checked='checked'; }else{ $admin_checked=''; }
			if($owner=="yes"){ $owner_checked='checked'; }else{ $owner_checked=''; }
			if($tenant=="yes"){ $tenant_checked='checked'; }else{ $tenant_checked=''; }
			if($owner_family=="yes"){ $owner_family_checked='checked'; }else{ $owner_family_checked=''; }
			if($tenant_family=="yes"){ $tenant_family_checked='checked'; }else{ $tenant_family_checked=''; } ?>
			<tr>
				<td><?php echo $info["sub_module_name"]; ?></td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $info["sub_module_id"]; ?>" society="no" role="admin" <?php echo $admin_checked; ?> /></td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $info["sub_module_id"]; ?>" society="no" role="owner" <?php echo $owner_checked; ?> /></td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $info["sub_module_id"]; ?>" society="no" role="tenant" <?php echo $tenant_checked; ?> /></td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $info["sub_module_id"]; ?>" society="no" role="owner_family" <?php echo $owner_family_checked; ?> /></td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $info["sub_module_id"]; ?>" society="no" role="tenant_family" <?php echo $tenant_family_checked; ?> /></td>
			</tr>
		<?php } 
		}else{ ?>
			<tr>
				<td>
				<?php foreach($data as $key3=>$info){
					$name_arr[]=$info["sub_module_name"];
					$sub_module_arr[]=$info["sub_module_id"];
				}
				$admin=$info["admin"];
				$owner=$info["owner"];
				$tenant=$info["tenant"];
				$owner_family=$info["owner_family"];
				$tenant_family=$info["tenant_family"];
				if($admin=="yes"){ $admin_checked='checked'; }else{ $admin_checked=''; }
				if($owner=="yes"){ $owner_checked='checked'; }else{ $owner_checked=''; }
				if($tenant=="yes"){ $tenant_checked='checked'; }else{ $tenant_checked=''; }
				if($owner_family=="yes"){ $owner_family_checked='checked'; }else{ $owner_family_checked=''; }
				if($tenant_family=="yes"){ $tenant_family_checked='checked'; }else{ $tenant_family_checked=''; }
				echo $sub_module_name = implode(" + ", $name_arr); 
				$sub_module_arr = implode(",", $sub_module_arr); ?>
				</td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_arr; ?>" society="no" role="admin" <?php echo $admin_checked; ?> /></td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_arr; ?>" society="no" role="owner" <?php echo $owner_checked; ?> /></td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_arr; ?>" society="no" role="tenant" <?php echo $tenant_checked; ?> /></td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_arr; ?>" society="no" role="owner_family" <?php echo $owner_family_checked; ?> /></td>
				<td><input type="checkbox" value="1" module_id="<?php echo $module_id; ?>" sub_module_id="<?php echo $sub_module_arr; ?>" society="no" role="tenant_family" <?php echo $tenant_family_checked; ?> /></td>
			</tr>
		<?php }
	} ?>
	</table>
<script>
$(document).ready(function() {
	$("input[type=checkbox]").bind("click",function(){
		var enable=$(this).is(":checked");
		var society=$(this).attr("society");
		if(society=="yes"){
			var module_id=$(this).attr("module_id");
			var sub_module_id=$(this).attr("sub_module_id");
			if(enable===true){
				$.ajax({
					url: "<?php echo $webroot_path; ?>Hms/update_default_module_by_hm_ajax/"+module_id+"/yes",
				}).done(function(response) {
					
				});
			}else{
				$.ajax({
					url: "<?php echo $webroot_path; ?>Hms/update_default_module_by_hm_ajax/"+module_id+"/no",
				}).done(function(response){
					
				});
			}
		}else{
			var module_id=$(this).attr("module_id");
			var sub_module_id=$(this).attr("sub_module_id");
			var role=$(this).attr("role");
			if(enable===true){
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
		}
		if(enable===false && society=="yes"){
			$("input[type=checkbox][society=no][module_id="+module_id+"]").each(function(i, obj) {
				$(this).prop('checked', false);
				$(this).attr("disabled", true);
			});
		}
		if(enable===true && society=="yes"){
			$("input[type=checkbox][society=no][module_id="+module_id+"]").each(function(i, obj) {
				$(this).attr("disabled", false);
			});
		}
	})
});
</script>