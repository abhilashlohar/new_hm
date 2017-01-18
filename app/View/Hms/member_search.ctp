<div style="background-color:#EFEFEF;padding:10px; box-shadow:5px; font-size:16px; color:#006;">
Member Search
</div>

<div style="background-color:#EFEFEF;padding:4px; box-shadow:5px; font-size:16px; color:#006;">
	<div class="controls controls-row">
		<input type="text" class="span4 m-wrap search_member" id="name" name="name" placeholder="Name" style="background-color:#FFF !important;">
		<input type="text" class=" span4 m-wrap search_member " id="email"  name="email" placeholder="Email" style="background-color:#FFF !important;" >
		<input type="text" class="span4 m-wrap search_member " id="mobile" name="mobile" placeholder="Mobile" style="background-color:#FFF !important;" >
	</div>
</div>

<div id="search_record">
</div>

<script>
$(document).ready(function() {
	$('.search_member').blur(function() {
		var field=$(this).attr("id");
		var vl=$(this).val();
		if(vl!=""){
			$.ajax({
					url: "member_search_ajax/"+vl+"/"+field,
				}).done(function(response){
					$('#search_record').html(response);
			});
		}else{
			$('#search_record').html("");
		}
	});	
});

</script>
