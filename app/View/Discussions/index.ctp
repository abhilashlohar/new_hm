<div style="background-color: #FFF; padding: 0px 10px; border: 1px solid rgb(233, 231, 231);">
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td style="white-space: nowrap;"><span style="font-size: 16px; font-weight: bold; color: rgb(83, 81, 81);"><i class="icon-comments"></i> Discussion Forum</span></td>
		<td align="right">
			<a  topic_type="all" role="button"  class="btn btn_menu btn_active select_type" style="margin-top: 5px; margin-bottom: 5px;"><i class="icon-cloud"></i> All Topics</a>
			<a  topic_type="my" role="button"  class="btn btn_menu select_type" style="margin-top: 5px; margin-bottom: 5px;"><i class="icon-heart"></i> My Topics</a>
			<a href="<?php echo $webroot_path; ?>Discussions/new_topic" role="button" rel="tab" class="btn btn_menu" style="margin-top: 5px; margin-bottom: 5px;"><i class=" icon-plus-sign"></i> Start Topic</a>
			<input class="m-wrap medium" placeholder="Search" id="search" style="margin-top: 5px; margin-bottom: 5px;" type="text">
			<a  topic_type="archive" role="button"  class="btn btn_menu select_type" style="margin-top: 5px; margin-bottom: 5px;"><i class="icon-trash"></i> Archives</a>
		</td>
	</tr>
</table>
</div>

<div style="background-color: #FFF; padding: 0px 10px; border: 1px solid rgb(233, 231, 231);margin-top: 2px;min-height:500px;">
	<div class="row-fluid" id="hello">
		<div class="span6" id="topic_detail">
			
		</div>
		
		<div class="span3" id="topic_list">
		<div align="center" style="color: rgb(84, 83, 83); font-weight: 600;" style="width:100%;">ALL TOPICS</div>
		<?php foreach($posts as $post){
			$discussion_post_id=$post["discussion_post"]["discussion_post_id"];
			$topic=$post["discussion_post"]["topic"];
			$date=$post["discussion_post"]["date"];
			$result_count_comment=$this->requestAction(array('controller' => 'Discussions', 'action' => 'count_comment_via_discussion_post_id'), array('pass' => array($discussion_post_id)));
			$time=$post["discussion_post"]["time"];?>
			<div class="topic show_list" post_id="<?php echo $discussion_post_id; ?>" style="width:100%;">
				<div align="left" style="font-size: 12px;"><?php echo $topic; ?></div>
				<div align="left" style="font-size: 10px;"><span >(<?php echo sizeof($result_count_comment); ?> Comments ) </span><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp; <?php echo $time; ?></div>
			</div>
		<?php } ?>
		</div>
		<div class="span3" >
			<div  align="center" style="color: rgb(84, 83, 83); font-weight: 600;" style="width:100%;">Photo galery to be updated</div>
				<div class="photo_galery" style="min-height:200px;font-size:12px; width:100%;">
					<center>
						New features coming soon...
					</center>
				</div>
		
		</div>
	</div>
</div>
<div id="delete_topic_result"></div>
<script>
$(document).ready(function(){
	var nn=0;
	function load_comments(){
		
		 
		var post_id=$("div[post_id]").attr("post_id");
		var comment_id=$("#comments div[comment_id]:last").attr("comment_id");
		if(!comment_id){ comment_id=0; }
		
        $.ajax({
            url: "<?php echo $webroot_path; ?>Discussions/comments/"+post_id+'/'+comment_id,
            success: function(data) {
                $("#comments").append(data);
            }
        });
		 
		nn=0;
	};

	$.ajax({
	   url: "<?php echo $webroot_path; ?>Discussions/topic_detail/"+"<?php echo $id; ?>",
	   success: function(data) {
		  
		   $("#topic_detail").html(data);
		   load_comments();
		   $("html, body").animate({
				scrollTop:0
			},"slow");
	   }
	});
    
	$(".topic").die().live("click",function(){ 
		nn++;
		//clearInterval(interval);
		$('.topic').each(function(i, obj) {
			$(this).removeClass("run");
		});
		$(this).addClass("run");
		var post_id=$(this).attr("post_id");
		if(nn==1){
		$.ajax({
		   url: "<?php echo $webroot_path; ?>Discussions/topic_detail/"+post_id,
		   success: function(data) {
			  $("#topic_detail").html(data);
				   load_comments();
			    $("html, body").animate({
					scrollTop:0
				},"slow");
			
		   }
		});
		}
	});
	
	$(".select_type").die().live("click",function(){
		$("#topic_list").html("<center>loading.....</center>");
		var topic_type=$(this).attr("topic_type");
		
		$.ajax({
		   url: "<?php echo $webroot_path; ?>Discussions/topic_show_type/"+topic_type,
		   success: function(data) {
			   $("#topic_list").html(data);
			   load_comments();
			   $("html, body").animate({
					scrollTop:0
				},"slow");
		   }
		});
	});
		$(".move_archive").die().live("click",function(){
			var dt=$(this).attr('post_id');
			
			$('#delete_topic_result').html('<div id="pp"><div class="modal-backdrop fade in"></div><div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"><div class="modal-body" style="font-size:14px;"><i class="icon-warning-sign" style="color:#d84a38;"></i> Are you sure you want to archive the topic & close it for further discussion ? </div><div class="modal-footer"><a href="<?php echo $webroot_path; ?>Discussions/delete_topic?con='+dt+'" class="btn blue" id="yes">Yes</a><a href="#"  role="button" id="can" class="btn">No</a></div></div></div>');
		});
		$("#can").live('click',function(){
			$('#pp').hide();
		});
	
			$(".delete_comments").die().live("click",function(){
			 $(".edit_div").show();
			var dt=$(this).attr('element_id');
	
  $("#tems_edit_content").html('<div align="center" style="padding:20px;"><img src="<?php echo $this->webroot ; ?>/as/indicator_blue_small.gif" /><br/><h5>Please Wait</h5></div>').load('<?php echo $this->webroot; ?>Discussions/delete_comments?con='+dt+'&edit=0');
		});	
	
	$(".delete_tems_btn").live('click',function(){
		var t_id=$(this).attr("tems_id");
		$("#tems_edit_content").load('<?php echo $this->webroot; ?>Discussions/delete_comments?con='+t_id+'&edit=1', function() {
			$("#comments"+t_id).remove();
			$(".edit_div").hide();
		});	 
	 
	 });
	
		
	
	
	$(".delete_per").die().live("click",function(){
			var dp=$(this).attr('post_id');
		$('#delete_topic_result').html('<div id="pp"><div class="modal-backdrop fade in"></div><div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"><div class="modal-body" style="font-size:14px;"><i class="icon-warning-sign" style="color:#d84a38;"></i> Sure, you want to delete the discussion permanently ?</div><div class="modal-footer"><a href="<?php echo $webroot_path; ?>Discussions/archive?con='+dp+'" class="btn blue" id="yes">Yes</a><a href="#" role="button" id="can" class="btn">No</a></div></div></div>');
	});
	
	
		$('#search').keyup(function(){
			var $rows = $('.show_list');
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
			$rows.show().filter(function() {
			var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
			return !~text.indexOf(val);
			}).hide();
		});
});
</script>
<style>

.photo_galery{
	margin: auto auto 2px; width: 80%; border: 1px solid rgb(204, 204, 204); padding: 5px; cursor: pointer;
}
.photo_galery:hover{
	border: 1px solid rgba(80, 80, 80, 0.78);
}




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

<div class="edit_div"  style="display:none;">
<div class="modal-backdrop fade in"></div>
<div class="modal"  id="tems_edit_content">
	
</div>
</div>