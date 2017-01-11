<style>
.erred{
	border:solid 1px red !important;
}
</style>
<div class="portlet-body" style="background-color:#FFF;">
	<table class="table table-bordered ">
		<thead>
			<tr>
				<th>Name</th>
				<th>Unit</th>
				<th>Email</th>
				<th>Mobile</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($result_user_info_csv_converted as $data){
			$auto_id=$data["user_info_csv_converted"]["auto_id"];
			$user_id=$data["user_info_csv_converted"]["user_id"];
			$user_flat_id=$data["user_info_csv_converted"]["user_flat_id"];
			$email=$data["user_info_csv_converted"]["email"];
			$mobile=$data["user_info_csv_converted"]["mobile"];
			$emailErr=$data["user_info_csv_converted"]["emailErr"];
			$mobileErr=$data["user_info_csv_converted"]["mobileErr"];
			if($emailErr==0){ $err="erred"; }else{ $err=""; }
			if($mobileErr==0){ $mrr="erred"; }else{ $mrr=""; }
			if(!empty($user_id)){
			$result_user_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array($user_id)));
			
			 $user_name=$result_user_info['user_name'];
			 $wing_flat=$result_user_info['wing_flat'];	
			 $wing_flat=$wing_flat[$user_flat_id];
			
			 ?>
			<tr id="<?php echo $auto_id; ?>">
				<td><?php echo $user_name; ?></td>
				<td><?php echo $wing_flat; ?></td>
				<td><input class="span9 m-wrap editthis edit_email" field="email" type="text" value="<?php echo $email; ?>"></td>
				<td><input class="span6 m-wrap editthis edit_mobile " field="mobile" type="text" value="<?php echo $mobile; ?>" maxlength="10"> 
					<div style="margin-top: -4px; margin-right: -5px;font-size: 14px !important;" class="pull-right">

					<a style="" role="button" class="btn mini  remove_row" id="<?php echo $auto_id; ?>" href="#"><i class="icon-trash"></i></a>	 
					</div>
			    </td>
			</tr>
		<?php } } ?>
		</tbody>
	</table>
</div>

<div class="pagination pagination-large ">
<ul>
<?php 
$loop=(int)($count_user_info_csv_converted/10);
if($count_user_info_csv_converted%10>0){
	$loop++;
}
for($ii=1;$ii<=$loop;$ii++){ ?>
	<li><a href="<?php echo $webroot_path; ?>Hms/modify_user_info_csv_data/<?php echo $ii; ?>" rel='tab' role="button" ><?php echo $ii; ?></a></li>
<?php } ?>
</ul>
</div>
<br/>

<button type="button" id="submit" class="btn blue">UPDATE</button>
<a href="user_info_delete_all" class="btn cancel_user">Cancel Process</a>
<script>
$( document ).ready(function() {
	
	function check_befor_submit(){
		
		$('.edit_email').die().each(function(i, obj){
			var id=$(this).closest('tr').attr("id");
			var field=$(this).attr("field");
			var val=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/check_user_info_csv_validation/"+id+"/"+field+"/"+val,
		}).done(function(response){
			if(response=="true"){
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").removeClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").removeClass('erred')
				}
			}
			else{
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").addClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").addClass('erred')
				}
			}
		});
			
		});
	
	$('.edit_mobile').die().each(function(i, obj){
			var id=$(this).closest('tr').attr("id");
			var field=$(this).attr("field");
			var val=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/check_user_info_csv_validation/"+id+"/"+field+"/"+val,
		}).done(function(response){
			if(response=="true"){
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").removeClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").removeClass('erred')
				}
			}
			else{
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").addClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").addClass('erred')
				}
			}
		});
			
	});
	
		
	}
	
	$('.edit_email').die().each(function(i, obj){
			var id=$(this).closest('tr').attr("id");
			var field=$(this).attr("field");
			var val=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/check_user_info_csv_validation/"+id+"/"+field+"/"+val,
		}).done(function(response){
			if(response=="true"){
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").removeClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").removeClass('erred')
				}
			}
			else{
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").addClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").addClass('erred')
				}
			}
		});
			
		});
	
	$('.edit_mobile').die().each(function(i, obj){
			var id=$(this).closest('tr').attr("id");
			var field=$(this).attr("field");
			var val=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/check_user_info_csv_validation/"+id+"/"+field+"/"+val,
		}).done(function(response){
			if(response=="true"){
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").removeClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").removeClass('erred')
				}
			}
			else{
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").addClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").addClass('erred')
				}
			}
		});
			
	});
	
	
	$( '.editthis' ).blur(function() {
		var id=$(this).closest('tr').attr("id");
		var field=$(this).attr("field");
		var val=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/check_user_info_csv_validation/"+id+"/"+field+"/"+val,
		}).done(function(response){
			if(response=="true"){
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").removeClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").removeClass('erred')
				}
			}
			else{
				if(field=="email"){
					 $("#"+id+ " td:eq(2) input").addClass('erred')
				}
				if(field=="mobile"){
					 $("#"+id+ " td:eq(3) input").addClass('erred')
				}
			}
		});
		   check_befor_submit();
	});
	
	$('#submit').click(function(){ 
	   //check_befor_submit();
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/check_user_info_before_submit",
		}).done(function(response){ 
			if(response=="true"){
				window.location.replace("<?php echo $webroot_path; ?>Hms/email_mobile_update");
			}else{
				alert("There is error or next page error");
			}
		});
	});
	
	$('.remove_row').click(function() {
		
		var record_id=$(this).attr("id");
		var z=$(this);
			$.ajax({
				url: "<?php echo $webroot_path; ?>Hms/user_info_delete_row/"+record_id,
			}).done(function(response){
				z.closest("tr").remove();
			});
	});
	
	
	
});
</script>

