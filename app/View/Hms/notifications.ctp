<?php foreach($result_notifications as $notification){
	$icon=$notification["notification"]["icon"];
	$text=$notification["notification"]["text"];
	$url=$notification["notification"]["url"];?>
<li>
	<a href="<?php echo $url; ?>">
	<span class="task">
	<span class="desc"> <i class=" <?php echo $icon; ?>"></i> <?php echo $text; ?></span>
	<span class="percent">5 mins</span>
	</span>
	</a>
</li>
<?php } ?>