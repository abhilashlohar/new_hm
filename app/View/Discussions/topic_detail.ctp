<?php 
if(sizeof($posts)==0){ echo "No any topic created."; exit; }
$discussion_post_id=$posts[0]["discussion_post"]["discussion_post_id"];
$topic=$posts[0]["discussion_post"]["topic"];
$description=$posts[0]["discussion_post"]["description"];
$creator_user_id=$posts[0]["discussion_post"]["user_id"];
$file=$posts[0]["discussion_post"]["file"];
$date=$posts[0]["discussion_post"]["date"];
$time=$posts[0]["discussion_post"]["time"];
$result_user=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($creator_user_id)));
$user_name=$result_user["user_name"];			
$wing_flat=$result_user["wing_flat"];
$profile_pic=$result_user["profile_pic"];
foreach($wing_flat as $data){
	$wing_flat=$data;
}?>
<div style="text-align:center;  font-size:16px; font-weight:bold; padding:5px;" post_id="<?php echo $discussion_post_id; ?>">
<?php echo $topic; ?>
</div>
<table>
	<tr>
		<td width="15%"><img src="<?php echo $webroot_path; ?>profile/<?php echo $profile_pic; ?>" style="height:50px; width:50px;"></td>
		<td style="padding-left:5px;" valign="top" width="85%">
			<span style="font-size:16px;"><?php echo $user_name; ?>&nbsp;&nbsp;<?php echo $wing_flat; ?></span>
			<br>
			<span style="color:#ADABAB;"><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp;<?php echo $time; ?></span>
		</td>
	</tr>
</table>
<div style="text-align: justify;">
	<?php echo $description; ?>
</div>
<?php if(!empty($file)){ ?>
<div style="text-align: justify;">
	<img src="<?php echo $webroot_path; ?>discussion_file/<?php echo $file; ?>" style="width:100%; ">
</div>
<?php } ?>

<div id="comments">
	
</div>
<div class="chat-form hide_at_print" style="margin-left: 5px;width: 94%;">
	<form method="post" id="idForm">
		<input type="hidden" value="<?php echo $discussion_post_id; ?>" name="post_id"/>
		<textarea class="span12 m-wrap" type="text" name="comment_box" placeholder="Type a message here..." style="background-color:#FFF !important; resize:none;"></textarea>
		<div align="right">
		<div class="pull-left" id="save_comment"></div>
		<button type="submit" id="sub" style="margin-top:-10px;" class="btn blue icn-only tooltips" data-placement="bottom" data-original-title="Tab + Enter for post comment">POST</button>
		</div>
	</form>
</div>
<script>
$(document).ready(function(){
	$("#idForm").on("submit",function(e){
		$('#sub').attr('disabled','disabled');
		$.ajax({
		   type: "POST",
		   url: "<?php echo $webroot_path; ?>Discussions/submit_comment",
		   data: $("#idForm").serialize(), // serializes the form's elements.
		   success: function(data){
			   $('#sub').removeAttr('disabled');
			   $("textarea[name=comment_box]").val("");
			   $("#save_comment").html(data); // show response from the php script.
		   }
		});
		e.preventDefault(); 
	});
});
</script>