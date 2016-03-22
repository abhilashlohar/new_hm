<div style="background-color: #FFF; padding: 0px 10px; border: 1px solid rgb(233, 231, 231);">
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td style="white-space: nowrap;"><span style="font-size: 16px; font-weight: bold; color: rgb(83, 81, 81);"><i class="icon-comments"></i> Discussion Forum</span></td>
		<td align="right">
			<a href="<?php echo $webroot_path; ?>Discussions/index/all" role="button" rel="tab" class="btn btn_menu btn_active" style="margin-top: 5px; margin-bottom: 5px;"><i class="icon-cloud"></i> All Topics</a>
			<a href="<?php echo $webroot_path; ?>Discussions/index/my" role="button" rel="tab" class="btn btn_menu" style="margin-top: 5px; margin-bottom: 5px;"><i class="icon-heart"></i> My Topics</a>
			<a href="<?php echo $webroot_path; ?>Discussions/new_topic" role="button" rel="tab" class="btn btn_menu" style="margin-top: 5px; margin-bottom: 5px;"><i class=" icon-plus-sign"></i> Start Topic</a>
			<input class="m-wrap medium" placeholder="Search" id="search" style="margin-top: 5px; margin-bottom: 5px;" type="text">
			<a href="<?php echo $webroot_path; ?>Discussions/index/archives" role="button" rel="tab" class="btn btn_menu" style="margin-top: 5px; margin-bottom: 5px;"><i class="icon-trash"></i> Archives</a>
		</td>
	</tr>
</table>
</div>
<div style="background-color: #FFF; padding: 0px 10px; border: 1px solid rgb(233, 231, 231);margin-top: 2px;">
	<div class="row-fluid">
		<div class="span6" id="topic_detail">
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
		</div>
		<div class="span6" id="topic_list">
			<div align="center" style="color: rgb(84, 83, 83); font-weight: 600;">ALL TOPICS</div>
		<?php foreach($posts as $post){
			$discussion_post_id=$post["discussion_post"]["discussion_post_id"];
			$topic=$post["discussion_post"]["topic"];
			$date=$post["discussion_post"]["date"];
			$time=$post["discussion_post"]["time"];?>
			<div class="topic" post_id="<?php echo $discussion_post_id; ?>">
				<div align="center" style="font-size: 14px;"><?php echo $topic; ?></div>
				<div align="center"><span>(0 Comments ) </span><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp; <?php echo $time; ?></div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
<script>
$("#idForm").on("submit",function(e){
	$.ajax({
	   type: "POST",
	   url: "<?php echo $webroot_path; ?>Discussions/submit_comment",
	   data: $("#idForm").serialize(), // serializes the form's elements.
	   success: function(data){
		   $("textarea[name=comment_box]").val("");
		   $("#save_comment").html(data); // show response from the php script.
	   }
    });

    e.preventDefault(); 
});
$(".topic").die().live("click",function(){
	$('.topic').each(function(i, obj) {
		$(this).removeClass("run");
	});
	$(this).addClass("run");
	var post_id=$(this).attr("post_id");
	$.ajax({
	   url: "<?php echo $webroot_path; ?>Discussions/topic_detail/"+post_id,
	   success: function(data) {
		   $("#topic_detail").html(data);
		   $("html, body").animate({
				scrollTop:0
			},"slow");
	   }
    });
});
	var $rows = $('#topic_list');
	 $('#search').keyup(function() {
		var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
		
		$rows.show().filter(function() {
			var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
			return !~text.indexOf(val);
		}).hide();
	});
</script>
<style>
.topic{
	margin: auto auto 2px; width: 80%; border: 1px solid rgb(204, 204, 204); padding: 5px; cursor: pointer;
}
.topic:hover{
	background-color: rgba(204, 204, 204, 0.17);
}
.run{
	background-color: rgba(204, 204, 204, 0.29);
}
.btn_menu{
	background-color: transparent;
}
.btn_active{
	font-weight: bold;
}
</style>
