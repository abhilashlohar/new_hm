<style>
.qwe{
padding: 5px;
margin-bottom: 2px;
list-style: none;
font-size: 12px;
color: #565454;
cursor: pointer;
background-color: #F8F6F6;
}
.qwe:hover{
background-color:#E9E7E7;
}
.asd{
padding: 5px;
margin-bottom: 2px;
list-style: none;
font-size: 12px;
color: #565454;
cursor: pointer;
background-color: #F8F6F6;
}
.asd:hover{
background-color:#E9E7E7;
}
.pqr{
margin-bottom: 2px;
list-style: none;
font-size: 12px;
color: rgb(111, 111, 111);
cursor: pointer;
}

.on{
background-color: rgb(221, 221, 221);
font-weight: bold !important;
color: rgb(111, 111, 111);
}
</style>
<div><h4>Control modules access of role "<b><?php echo $role_name; ?></b>"</h4></div>
<div align="center" id="success_msg" style="min-height:20px;"></div>
<div class="row-fluid ">
	<div class="span3">
	<span style="font-weight: bold; color: rgb(92, 92, 92);">Module Categories</span><br/>
	<?php foreach($result_module_type as $data){
		$module_type_id=$data["module_type"]["module_type_id"];
		$module_type_name=$data["module_type"]["module_type_name"];?>
		<li class="qwe" module_type_id="<?php echo $module_type_id; ?>"><?php echo $module_type_name; ?></li>
	<?php } ?>
	</div>
	<div class="span4" id="modules"></div>
	<div class="span5" id="sub_modules"></div>
</div>
<script>
$(document).ready(function() {
	$(".qwe").on("click",function(){
		var module_type_id=$(this).attr("module_type_id");
		$('.qwe').each(function(i, obj) {
			$(this).removeClass("on");
			$(this).find("i.icon-caret-right").remove();
		});
		$(this).addClass("on").append('<i class="icon-caret-right pull-right"></i>');
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/module_list_via_type_id/"+module_type_id,
		}).done(function(response) {
			$("#modules").html(response);
			$("#sub_modules").html("");
		});
	})
	$(".asd").live("click",function(){
		var module_id=$(this).attr("module_id");
		$('.asd').each(function(i, obj) {
			$(this).removeClass("on");
			$(this).find("i.icon-caret-right").remove();
		});
		$(this).addClass("on").append('<i class="icon-caret-right pull-right"></i>');
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/sub_module_list_via_module_id/"+module_id+"/<?php echo $role_id; ?>",
		}).done(function(response) {
			$("#sub_modules").html(response);
		});
	})
});
</script>

<script>
$(document).ready(function(){
$('#select_all').live("click",function(){
if($(this).is(":checked")){
       
     
    }
   else
   {
	
	   
   }
});
});
</script>



