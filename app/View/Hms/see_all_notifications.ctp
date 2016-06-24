<div class="row-fluid">
	<div class="span3"></div>
	<div class="span6">
		<h4 style="color:#02689b;"><i class=" icon-bell"></i> All Notifications</h4>
		<div style=" background-color: #fff; padding: 5px; ">
		<?php
		if(sizeof($result_notifications)==0) { echo '<div align="center"><h4>No Unread Notifications.</h4></div>'; }
		foreach($result_notifications as $notification){
			$notification_id=$notification["notification"]["notification_id"];
			$icon=$notification["notification"]["icon"];
			$text=$notification["notification"]["text"];
			$url=$notification["notification"]["url"];?>
		<li style=" border-bottom: solid 1px #CCC; padding: 5px; text-decoration: none; list-style: none; ">
			<a href="<?php echo $url; ?>" role="button" rel='tab' class="notification_tab" notification_id="<?php echo $notification_id; ?>">
			<span class="task">
			<span ><?php echo $icon; ?> <?php echo $text; ?></span><br/>
			<span class="percent">5 mins</span>
			</span>
			</a>
		</li>
		<?php } ?>
		</div>
	</div>
	<div class="span3"></div>	
</div>					