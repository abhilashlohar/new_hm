<?php foreach($comments as $data){
	$user_id=$data["discussion_comment"]["user_id"];
	$comment=$data["discussion_comment"]["comment"];
	$color=$data["discussion_comment"]["color"];
	$date=$data["discussion_comment"]["date"];
	$time=$data["discussion_comment"]["time"];
	$result_user=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($user_id)));
	$profile_pic=$result_user["profile_pic"];
	$user_name=$result_user["user_name"];			
	$wing_flat=$result_user["wing_flat"];
	foreach($wing_flat as $data){
		$wing_flat=$data;
	}?>
	<div style="background-color: #fafafa;border: 1px solid rgba(204, 204, 204, 0.27);margin-bottom: 2px;">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding:2px;" valign="top" width="10%"><img src="<?php echo $webroot_path; ?>profile/<?php echo $profile_pic; ?>" style="height:40px; width:40px;"></td>
				<td valign="top" width="90%">
					<div class="btn-group  " style="float:right;">
						<a class="badge ok_t  dropdown-toggle" data-toggle="dropdown" style="background-color: transparent;"><i class="icon-angle-down" style="font-size: 16px;color: rgb(175, 173, 173);"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#" role="button" onclick="offensive_delete(2,324)"><i class="icon-ban-circle"> </i> offensive</a></li>
						</ul>
					</div>

					<span style="font-size:14px;color:<?php echo $color; ?>"><?php echo $user_name; ?>&nbsp;&nbsp;<?php echo $wing_flat; ?></span>
					<span style="color:#ADABAB;font-size:12px;" class="pull-right"><?php echo date("d-m-Y",strtotime($date)); ?>&nbsp;&nbsp;<?php echo $time; ?> &nbsp; </span><br>
					<span style="color:#000;font-size:12px;"><?php echo $comment; ?></span>
				</td>
			</tr>
		</table>
	</div>
<?php } ?>
