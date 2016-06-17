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
	$url=$notification["notification"]["url"];
	$noti_date=$notification["notification"]["date"];
	$current_date=strtotime(date('Y-m-d'));
	if($current_date==$noti_date){
		$time_text="Today";
	}else{
		$datediff = $current_date - $noti_date;
        $days=floor($datediff/(60*60*24));
		$days=abs($days);
		if($days==1){
			$time_text="Yesterday";
		}
		elseif($days<=28){
			$time_text=$days." days ago";
		}elseif($days>=28){
			$ts1 = $current_date;
			$ts2 = $noti_date;

			$year1 = date('Y', $ts1);
			$year2 = date('Y', $ts2);

			$month1 = date('m', $ts1);
			$month2 = date('m', $ts2);

			$month = (($year2 - $year1) * 12) + ($month2 - $month1);
			$month=abs($month);
			if($month==1){
				$time_text=$month." month ago";
			}elseif($month>1){
				$time_text=$month." months ago";
			}
		}
		
	}?>
<li>
	<a href="<?php echo $url; ?>" role="button" rel='tab' class="notification_tab" notification_id="<?php echo $notification_id; ?>" style="text-align: justify;">
	<span class="task">
	<span ><?php echo $icon; ?> <?php echo $text; ?></span>
	<span class="percent time_text"><?php echo $time_text; ?></span>
	</span>
	</a>
</li>
<?php } ?>
<style>
.time_text{
	font-weight: 400 !important;
    font-size: 12px !important;
    color: #aeaeae !important;
}
</style>