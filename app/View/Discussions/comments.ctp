<?php foreach($comments as $data){
	$user_id=$data["discussion_comment"]["user_id"];
	$comment=$data["discussion_comment"]["comment"];
	$date=$data["discussion_comment"]["date"];
	$time=$data["discussion_comment"]["time"];
	$result_user=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($user_id)));
	$profile_pic=$result_user["profile_pic"];
	$user_name=$result_user["user_name"];			
	$wing_flat=$result_user["wing_flat"];
	foreach($wing_flat as $data){
		$wing_flat=$data;
	}?>
	<div style="background-color: #fafafa;border-top: solid 2px #f1f3fa;" id="comm2" class="showhim">
		<table width="100%">
			<tr>
				<td style="padding:10px;" valign="top" width="15%"><img src="<?php echo $webroot_path; ?>profile/<?php echo $profile_pic; ?>" style="height:50px; width:50px;"></td>
				<td style="padding-left:5px;" valign="top" width="85%">
					<div class="btn-group  " style="float:right;">
						<a class="badge ok_t  dropdown-toggle" data-toggle="dropdown"><i class="icon-angle-down" style="font-size: 16px;color: rgb(175, 173, 173);"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#" role="button" onclick="offensive_delete(2,324)"><i class="icon-ban-circle"> </i> offensive</a></li>
						</ul>
					</div>

					<span style="font-size:14px;color:#9b59b6"><?php echo $user_name; ?>&nbsp;&nbsp;<?php echo $wing_flat; ?></span>
					<span style="color:#ADABAB;font-size:12px;" class="pull-right"><?php echo date("d-m-Y",strtotime($date)); ?>&nbsp;&nbsp;<?php echo $time; ?> &nbsp; </span><br>
					<span style="color:#000;font-size:14px;"><?php echo $comment; ?></span>
				</td>
			</tr>
		</table>
	</div>
<?php } ?>
