<?php 
if(sizeof($posts)==0){ echo "No any topic created."; exit; }
$discussion_post_id=$posts[0]["discussion_post"]["discussion_post_id"];
$topic=$posts[0]["discussion_post"]["topic"];
$topic=$posts[0]["discussion_post"]["topic"];
$visible=$posts[0]["discussion_post"]["visible"];
$sub_visible=$posts[0]["discussion_post"]["sub_visible"];
$description=$posts[0]["discussion_post"]["description"];
$creator_user_id=$posts[0]["discussion_post"]["user_id"];
$file=$posts[0]["discussion_post"]["file"];
$date=$posts[0]["discussion_post"]["date"];
$time=$posts[0]["discussion_post"]["time"];
$status=$posts[0]["discussion_post"]["status"];
$result_user=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($creator_user_id)));
$user_name=$result_user["user_name"];			
$wing_flat=$result_user["wing_flat"];
$profile_pic=$result_user["profile_pic"];
foreach($wing_flat as $data){
	$wing_flat=$data;
}
if(empty($profile_pic)){
$profile_pic="blank.jpg";	
}
	$visible_detail='';
	if($visible=="all_users"){
		
		$visible_show="All Users";
		$visible_detail="All Users";
	}

	if($visible=="role_wise") {
		
		unset($role_name); 
		$visible_show="Role wise";
		foreach ($sub_visible as $role_id) 
		{
		if($role_id!="resident_family" and $role_id!="resident" ){
			$role_name1=$this->requestAction(array('controller' => 'Fns', 'action' => 'role_name_via_role_id'), array('pass' => array($role_id)));
				if(!empty($role_name1))
				{
				$role_name[]=$role_name1;
				}
			}
		}
		$visible_detail=implode(" , ",$role_name);
	}

	if($visible=="wing_wise"){
		
		unset($wing_name);
		$visible_show="Wing wise";
		foreach ($sub_visible as $wing_id) {
			
			$wing_id=(int)$wing_id;
			$wing_name1="wing-".$this->requestAction(array('controller' => 'Fns', 'action' => 'wing_name_via_wing_id'), array('pass' => array($wing_id)));
				if(!empty($wing_name1)){
					
					$wing_name[]=$wing_name1;
				}
			}
		$visible_detail=implode(" , ",$wing_name);
	}
if($visible=="group_wise"){
	unset($group_name);
	foreach($sub_visible as $group_id) {
		$group_names=$this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_group_name_via_group_id'), array('pass' => array($group_id)));
		 $group_name[]=$group_names;
	}
	$visible_detail=implode(" , ",$group_name);
}


?>
<div style="text-align:center;  font-size:16px; font-weight:bold; padding:5px;" post_id="<?php echo $discussion_post_id; ?>">
<?php echo $topic; ?>
</div>
<table>
	<tr>
		<td width="15%"><img src="<?php echo $webroot_path; ?>profile/<?php echo $profile_pic; ?>" style="height:50px; width:50px;"></td>
		<td style="padding-left:5px;" valign="middle" width="85%">
			<span style="font-size:16px;"><?php echo $user_name; ?>&nbsp;&nbsp;<?php echo $wing_flat; ?>
			<i class="tooltips icon-info-sign" data-placement="bottom" data-original-title="This discussion is visible to :-<?php echo $visible_detail; ?>"></i>
			</span>
			<br>
			<span style="color:#ADABAB;"><?php echo date("d-m-Y",$date); ?>&nbsp;&nbsp;<?php echo $time; ?></span>
		</td>
	</tr>
</table>
<div style="text-align: justify;">
	<?php echo $description; ?>
</div>

<?php if(!empty($file)){ ?>
<div style="text-align: justify;">
	<img src="<?php echo $webroot_path; ?>discussion_file/<?php echo $file; ?>" style="width:100%; ">
</div>
<?php } ?>

<div id="comments" style="padding-top: 5px;">
	
</div>
<?php if($status!=1){ ?>
<div class="chat-form hide_at_print" style="margin-left: 5px;width: 94%;">
	<form method="post" id="idForm">
		<input type="hidden" value="<?php echo $discussion_post_id; ?>" name="post_id"/>
		<textarea class="span12 m-wrap" type="text" name="comment_box" placeholder="Type your comments..." style="background-color:#FFF !important; resize:none;"></textarea>
		<div align="right">
		<div class="pull-left" id="save_comment"></div>
		<button type="submit" id="sub" style="margin-top:-10px;" class="btn blue icn-only tooltips" data-placement="bottom" data-original-title="Tab + Enter for post comment" >POST</button>
		</div>
	</form>
</div>
<?php } ?>
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
	
	$("#idForm").on("submit",function(e){
		
		nn++;
		$('#sub').attr('disabled','disabled');
		if(nn==1){
		$.ajax({
		   type: "POST",
		   url: "<?php echo $webroot_path; ?>Discussions/submit_comment",
		   data: $("#idForm").serialize(), // serializes the form's elements.
		   success: function(data){
			   $('#sub').removeAttr('disabled');
			   $("textarea[name=comment_box]").val("");
			   $("#save_comment").html(data); // show response from the php script.
			   
			   load_comments();
		   }
		});
		}
		e.preventDefault(); 
	});
});
</script>