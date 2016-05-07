<?php
if($type_list=="all"){ ?>
<div align="center" style="color: rgb(84, 83, 83); font-weight: 600; width:100%;">All Topics</div>
		<?php 
		if(empty($posts)){ echo'<center>No any record found </center>';  }
		
		foreach($posts as $post){
			$discussion_post_id=$post["discussion_post"]["discussion_post_id"];
			$topic=$post["discussion_post"]["topic"];
			$date=$post["discussion_post"]["date"];
			$result_count_comment=$this->requestAction(array('controller' => 'Discussions', 'action' => 'count_comment_via_discussion_post_id'), array('pass' => array($discussion_post_id)));
			$time=$post["discussion_post"]["time"];?>
			
			<div class="topic show_list" post_id="<?php echo $discussion_post_id; ?>" style="width:100%;">
				<div align="left" style="font-size: 12px;"><?php echo $topic; ?></div>
				<div align="left" style="font-size: 10px;"><span >(<?php echo sizeof($result_count_comment); ?> Comments ) </span><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp; <?php echo $time; ?></div>
			</div>
<?php } } ?>


<?php
if($type_list=="my"){ ?>
<div align="center" style="color: rgb(84, 83, 83); font-weight: 600;">My Topics</div>
		<?php 
		if(empty($posts)){ echo'<center>No any record found </center>';  }
		foreach($posts as $post){
			$discussion_post_id=$post["discussion_post"]["discussion_post_id"];
			$topic=$post["discussion_post"]["topic"];
			$date=$post["discussion_post"]["date"];
			$result_count_comment=$this->requestAction(array('controller' => 'Discussions', 'action' => 'count_comment_via_discussion_post_id'), array('pass' => array($discussion_post_id)));
			$time=$post["discussion_post"]["time"];?>
			<div class="show_list">
				<span class="btn mini pull-right move_archive tooltips  " data-placement="top" post_id="<?php echo $discussion_post_id; ?>" style="margin-right: 15px;" data-original-title="close topics" >
				<i class="icon-trash"></i>
				</span>
				<div class="topic " post_id="<?php echo $discussion_post_id; ?>">
				
					<div align="left" style="font-size: 12px;"><?php echo $topic; ?></div>
					<div align="left" style="font-size: 10px;"><span >(<?php echo sizeof($result_count_comment); ?> Comments ) </span><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp; <?php echo $time; ?></div>
				</div>
			</div>
<?php } } ?>


<?php
if($type_list=="archive"){ ?>
<div align="center" style="color: rgb(84, 83, 83); font-weight: 600;">Archive Topics</div>
		<?php 
		if(empty($posts)){ echo'<center>No any record found </center>';  }
		foreach($posts as $post){
			$discussion_post_id=$post["discussion_post"]["discussion_post_id"];
			$topic=$post["discussion_post"]["topic"];
			$date=$post["discussion_post"]["date"];
			$result_count_comment=$this->requestAction(array('controller' => 'Discussions', 'action' => 'count_comment_via_discussion_post_id'), array('pass' => array($discussion_post_id)));
			$time=$post["discussion_post"]["time"];?>
			<div class="show_list">
				<span class="btn mini pull-right delete_per" style="margin-right: 15px;" post_id="<?php echo $discussion_post_id; ?>">
				<i class="icon-trash"></i>
				</span>
			
				<div class="topic" post_id="<?php echo $discussion_post_id; ?>">
				
					<div align="left" style="font-size: 12px;"><?php echo $topic; ?></div>
					<div align="left" style="font-size: 10px;"><span >(<?php echo sizeof($result_count_comment); ?> Comments ) </span><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp; <?php echo $time; ?></div>
			   </div>
			</div>  
<?php } } ?>
