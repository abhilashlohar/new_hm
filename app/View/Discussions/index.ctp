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

	
	

$(document).ready(function(){
	//clearInterval(interval);
	$.ajax({
	   url: "<?php echo $webroot_path; ?>Discussions/topic_detail/"+"<?php echo $id; ?>",
	   success: function(data) {
		   $("#topic_detail").html(data);
		   $("html, body").animate({
				scrollTop:0
			},"slow");
	   }
	});

	$(".topic").die().live("click",function(){
		//clearInterval(interval);
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
});
</script>
<style>
.topic{
	margin: auto auto 2px; width: 80%; border: 1px solid rgb(204, 204, 204); padding: 5px; cursor: pointer;
}
.topic:hover{
	border: 1px solid rgba(80, 80, 80, 0.78);
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
