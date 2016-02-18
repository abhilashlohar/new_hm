<style>
.qwe{
padding: 5px;
margin-bottom: 2px;
list-style: none;
font-size: 12px;
color: rgb(111, 111, 111);
cursor: pointer;
}
.qwe:hover{
background-color:#E9E7E7;
}
.on{
background-color: rgb(221, 221, 221);
font-weight: bold;
color: rgb(111, 111, 111);
}
</style>
<div class="row-fluid ">
	<div class="span4">
	<?php foreach($result_module_type as $data){
		$module_type_id=$data["module_type"]["module_type_id"];
		$module_type_name=$data["module_type"]["module_type_name"];?>
		<li class="qwe" module_type_id="<?php echo $module_type_id; ?>"><?php echo $module_type_name; ?></li>
	<?php } ?>
	</div>
	<div class="span4" id="modules">2</div>
	<div class="span4">3</div>
</div>
<script>
$(document).ready(function() {
	$(".qwe").on("click",function(){
		var module_type_id=$(this).attr("module_type_id");
		$('.qwe').each(function(i, obj) {
			$(this).removeClass("on");
		});
		$(this).addClass("on");
		alert(module_type_id);
	})
});
</script>