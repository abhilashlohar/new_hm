<?php 
if(sizeof($result_notifications)==0){
	?>
	<div align="center" style="color:#BBB;"><br/>No Unread Notifications</div>
	<?php
}
foreach($result_notifications as $notification){
	$notification_id=$notification["notification"]["notification_id"];
	$icon=$notification["notification"]["icon"];
	$text=$notification["notification"]["text"];
	$url=$notification["notification"]["url"];?>
<li>
	<a href="<?php echo $url; ?>" role="button" rel='tab' class="notification_tab" notification_id="<?php echo $notification_id; ?>">
	<span class="task">
	<span class="desc"> <i class=" <?php echo $icon; ?>"></i> <?php echo $text; ?></span>
	<span class="percent">5 mins</span>
	</span>
	</a>
</li>
<?php } ?>