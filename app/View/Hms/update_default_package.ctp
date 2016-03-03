<style>
.qwe{
	padding: 5px;
margin-bottom: 2px;
list-style: outside none none;
font-size: 12px;

cursor: pointer;
background-color: rgb(219, 219, 219);
}
.qwe:hover{
	background-color: #CCC;
}
.active{
	background-color: rgb(0, 143, 208) !important;
color: rgb(255, 255, 255) !important;
}
</style>
<div class="row-fluid">
	<div class="span3">
	<ul>
	<?php foreach($main_modules as $module_data){
		$module_id=$module_data["main_module"]["auto_id"]; 
		$module_name=$module_data["main_module"]["module_name"]; ?>
		<li class="qwe" module_id="<?php echo $module_id; ?>"><?php echo $module_name; ?></li>
	<?php } ?>
	</ul>
	</div>
	<div class="span9" id="result">

	</div>
</div>


<script>
$(document).ready(function() {
	$(".qwe").on("click",function(){
		var module_id=$(this).attr("module_id");
		$(".qwe").each(function(i, obj) {
			$(this).removeClass("active");
		});
		$(this).addClass("active");
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/sub_module_list_table/"+module_id,
		}).done(function(response) {
			$("#result").html(response);
		});
		$("html, body").animate({
			scrollTop:0
		},"slow");
	})
});
</script>