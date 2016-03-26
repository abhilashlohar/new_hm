<?php 
$discussion_post_id=$posts[0]["discussion_post"]["discussion_post_id"];
$topic=$posts[0]["discussion_post"]["topic"];
$description=$posts[0]["discussion_post"]["description"];
$creator_user_id=$posts[0]["discussion_post"]["user_id"];
$date=$posts[0]["discussion_post"]["date"];
$time=$posts[0]["discussion_post"]["time"];
$result_user=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($creator_user_id)));
$user_name=$result_user["user_name"];			
$wing_flat=$result_user["wing_flat"];
foreach($wing_flat as $data){
	$wing_flat=$data;
}?>
<div style="text-align:center;  font-size:16px; font-weight:bold; padding:5px;">
<?php echo $topic; ?>
</div>
<table>
	<tr>
		<td width="15%"><img src="http://app.housingmatters.co.in//profile/blank.jpg" style="height:50px; width:50px;"></td>
		<td style="padding-left:5px;" valign="top" width="85%">
			<span style="font-size:16px;"><?php echo $user_name; ?>&nbsp;&nbsp;<?php echo $wing_flat; ?></span>
			<br>
			<span style="color:#ADABAB;"><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp;<?php echo $time; ?></span>
		</td>
	</tr>
</table>
<div>
	<?php echo $description; ?>
</div>
<div id="comments">
	Loading comments...
</div>
<div class="chat-form hide_at_print" style="margin-left: 5px;width: 94%;">
	<form method="post" id="idForm">
		<input type="hidden" value="<?php echo $discussion_post_id; ?>" name="post_id"/>
		<textarea class="span12 m-wrap" type="text" name="comment_box" placeholder="Type a message here..." style="background-color:#FFF !important; resize:none;"></textarea>
		<div align="right">
		<div class="pull-left" id="save_comment"></div>
		<button type="submit"  style="margin-top:-10px;" class="btn blue icn-only tooltips" data-placement="bottom" data-original-title="Tab + Enter for post comment">POST</button>
		</div>
	</form>
</div>
<script>
$(document).ready(function(){
	$.ajax({
		url: "<?php echo $webroot_path; ?>Discussions/comments/"+"<?php echo $discussion_post_id; ?>",
		success: function(data) {
		   $("#comments").html(data);
		}
	});
});
</script>