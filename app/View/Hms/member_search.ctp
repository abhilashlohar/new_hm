<div style="background-color:#EFEFEF;padding:10px; box-shadow:5px; font-size:16px; color:#006;">
Member Search
</div>

<div style="background-color:#EFEFEF;padding:4px; box-shadow:5px; font-size:16px; color:#006;">
	<div class="controls controls-row">
		<input type="text" class="span4 m-wrap search_member" id="name" name="name" placeholder="Name" style="background-color:#FFF !important;">
		<input type="text" class=" span4 m-wrap search_member " id="email"  name="email" placeholder="Email" style="background-color:#FFF !important;" >
		<input type="text" class="span3 m-wrap search_member " id="mobile" name="mobile" placeholder="Mobile" style="background-color:#FFF !important;" >
		<button class="btn blue search">Search</button>
	</div>
</div>

<div id="search_record">
</div>

<script>
$(document).ready(function() {
	/*$(".search_member").bind('blur keyup',function(e) {  
		 if (e.type == 'blur' || e.keyCode == '13'){ 
				var field=$(this).attr("id");
				var vl=$(this).val();
				$("#search_record").html("<center>loading.....</center>");
				if(vl!=""){
					$.ajax({
							url: "member_search_ajax/"+vl+"/"+field,
						}).done(function(response){
							$('#search_record').html(response);
					});
				}else{
					$('#search_record').html("");
				}
		   }
	});	
	*/
	
	$(".search").bind('click',function(e) {  
		var v1;
		var name=$("input[name='name']").val();	
		var email=$("input[name='email']").val();	
		var mobile=$("input[name='mobile']").val();			
		 if(name!=""){
			 v1=name;
			 field=$("input[name='name']").attr('id');	
			 
		 }else if(email!=""){
			 v1=email;
			 field=$("input[name='email']").attr('id');	
			 
		 }else if(mobile!=""){
			 v1=mobile;
			 field=$("input[name='mobile']").attr('id');	
		 }
		 if(name!="" || email!="" || mobile!=""){
			
			$("#search_record").html("<center>loading.....</center>");
				$.ajax({
						url: "member_search_ajax/"+v1+"/"+field,
					}).done(function(response){
						
						$('#search_record').html(response);
				});
		 }else{
			 
			 $('#search_record').html("");
		 }
	});	
	
	
	
});

</script>