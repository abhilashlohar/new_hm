<div style="background-color:#EFEFEF; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;">
Sms allow society
</div>
<div style="padding: 10px;">
<span class="label label-important">NOTE</span><span> No need to save this form. The system will automatically save updated data. </span>
</div>
<table class="table table-bordered table-hover">
	<tr>
		<th>Society Name</th>
		<th> Allow SMS </th>
	</tr>
	<?php 
	foreach($result_society as $data){
		$society_id=(int)$data['society']['society_id'];
		$society_name=$data['society']['society_name'];
		$total_sms=@$data['society']['sms_limit'];
		?>
		<tr>
		  <td><?php echo $society_name; ?></td>
		  <td> 
		    <input class="span4 m-wrap society" society_id="<?php echo $society_id; ?>" value="<?php echo $total_sms; ?>" type="text">
		  </td>
		</tr>
		
		
<?php	}

	?>
</table>
<script>
$(document).ready(function(){
	
	$(".society").bind('blur',function(){
		var value = $(this).val();
		var society_id=$(this).attr('society_id');
		if($.isNumeric(value)){
			
			$.ajax({
				url: "hm_sms_allow_society_ajax/"+society_id+"/"+value,
			}).done(function(response) {

				});	
			
		}else{
			$(this).val('');
		}
		
	});
	
});
</script>