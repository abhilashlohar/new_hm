<?php
if($type_list=="all"){ ?>
<div align="center" style="color: rgb(84, 83, 83); font-weight: 600;">All Topics</div>
		<?php foreach($posts as $post){
			$discussion_post_id=$post["discussion_post"]["discussion_post_id"];
			$topic=$post["discussion_post"]["topic"];
			$date=$post["discussion_post"]["date"];
			$time=$post["discussion_post"]["time"];?>
			
			<div class="topic" post_id="<?php echo $discussion_post_id; ?>">
				<div align="center" style="font-size: 14px;"><?php echo $topic; ?></div>
				<div align="center"><span>(0 Comments ) </span><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp; <?php echo $time; ?></div>
			</div>
<?php } } ?>


<?php
if($type_list=="my"){ ?>
<div align="center" style="color: rgb(84, 83, 83); font-weight: 600;">My Topics</div>
		<?php foreach($posts as $post){
			$discussion_post_id=$post["discussion_post"]["discussion_post_id"];
			$topic=$post["discussion_post"]["topic"];
			$date=$post["discussion_post"]["date"];
			$time=$post["discussion_post"]["time"];?>
			<div class="topic" post_id="<?php echo $discussion_post_id; ?>">
				<span class="pull-right move_archive tooltips" data-placement="top" post_id="<?php echo $discussion_post_id; ?>" data-original-title="close topics" >
					<i class="icon-trash"></i>
				</span>
					<div align="center" style="font-size: 14px;"><?php echo $topic; ?></div>
					<div align="center"><span>(0 Comments ) </span><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp; <?php echo $time; ?></div>
			</div>
<?php } } ?>


<?php
if($type_list=="archive"){ ?>
<div align="center" style="color: rgb(84, 83, 83); font-weight: 600;">Archive Topics</div>
		<?php foreach($posts as $post){
			$discussion_post_id=$post["discussion_post"]["discussion_post_id"];
			$topic=$post["discussion_post"]["topic"];
			$date=$post["discussion_post"]["date"];
			$time=$post["discussion_post"]["time"];?>
			<div class="topic" post_id="<?php echo $discussion_post_id; ?>">
				<span class="pull-right delete_per" post_id="<?php echo $discussion_post_id; ?>">
					<i class="icon-trash"></i>
				</span>
					<div align="center" style="font-size: 14px;"><?php echo $topic; ?></div>
					<div align="center"><span>(0 Comments ) </span><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp; <?php echo $time; ?></div>
			</div>
<?php } } ?>
