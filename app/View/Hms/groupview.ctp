
<style>
.r_d{
width:44%; float:left; padding:5px;
}

@media (min-width: 650px) and (max-width: 1200px){
.r_d{
width:46%;float:left; padding:5px;
}
}

@media (max-width: 650px) {
.r_d{
width:100%; float:left; padding:5px;
}
}

.qwe{
	background-color: #FFF; padding: 4px;border: 1px solid #ECECEC;
}
.qwe:hover{
background: transparent linear-gradient(141deg, #0FB8AD 0%, #1FC8DB 61%, #2CB5E8 75%) repeat scroll 0% 0%;

color:#FFF;
}
</style>
<a href="<?php echo $this->webroot; ?>Hms/groups_new" rel="tab" class="btn  blue"><i class="icon-caret-left"></i> All Groups</a><br/><br/>
<div class="span9" >
	<!-- BEGIN BORDERED TABLE PORTLET-->
	<div class="portlet box green">
		<div class="portlet-title">
			<h4><?php echo $group_name; ?></h4>
		</div>
		<div class="portlet-body">
		<div class="pull-left">Total Members :<span class="label label-info"><?php echo sizeof($result_group_info); ?></span></div>
		<form  method="POST">
		<a href="#myModal1" role="button" class="btn btn-primary pull-right" data-toggle="modal">Add or Remove Members</a>
		
		<div id="myModal1" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
		
			<div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel1">Add or Remove Members <input class="m-wrap medium" placeholder="Search" id="search" style="margin-top: 5px; margin-bottom: 5px;" type="text"></h3>
			</div>
			
			<div class="modal-body  " id="show_serch" >
			
		<?php foreach($all_users as $user) { 
							$user_id=$user['user']['user_id'];
							$name=$user['user']['user_name'];
							$profile_pic=@$user['user']['profile_pic'];
							if(empty($profile_pic)){ $profile_pic="blank.jpg"; }
							$result_member = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array($user_id)));
							$wing_flat=$result_member['wing_flat'];
							foreach($wing_flat as $flat){ }
				?>
				
	<div class="r_d">
		
			<div class="qwe">
				<div class="hv_b" style="overflow: auto;padding: 5px;cursor: pointer;" title="">
					<?php if(!empty($profile_pic)){ ?>
							<img alt="" src="<?php echo $webroot_path; ?>profile/<?php echo @$profile_pic; ?>" 
							style="float:left;width: 40px;height: 50px;" class="profile_pic"/>
							<?php } ?>
							
					<div style="float:left;margin-left:3%;">
					<div class="checker" id="uniform-undefined">
						<span>
							<input type="checkbox" value="1" name="user<?php echo $user_id; ?>" <?php if (in_array($user_id, $result_group_info)) { echo 'checked="checked"'; } ?> style="opacity: 0;">
						</span>
					</div> 
						<span style="font-size:12px;"><?php echo $name; ?></span> 
						 <br>
						<span style="font-size:12px;margin-left: 26px;"><?php echo $flat; ?></span>
						
					</div>
				</div>
			</div>
		
	</div>
					
				<?php } ?>
				
			</div>

			
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button type="submit" class="btn blue" name="update_members">Update Members</button>
			</div>
			
						
		</div>
		</form>						
								
			<table class="table-striped" width="100%" >
				<tbody>
				<?php if($result_group_info==null) { $result_group_info=array();} ?>
				<?php foreach($result_group_info as $user_id) { 
				$result_user_info=$this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'), array('pass' => array($user_id)));
				foreach($result_user_info as $collection2)
				{
				$user_name=$collection2["user"]["user_name"];
				$profile_pic=@$collection2["user"]["profile_pic"];
				}
				if(empty($profile_pic)){ $profile_pic="blank.jpg"; }
				$result_member = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array($user_id)));
				$wing_flat=$result_member['wing_flat'];
				foreach($wing_flat as $flat_info){ }
				?>
					<tr>
						<td width="50px"><img src="<?php echo $this->webroot; ?>profile/<?php echo $profile_pic; ?>" style="width: 35px;height: 35px;"/></td>
						<td width="40%"><?php echo $user_name; ?></td>
						<td><?php echo $flat_info; ?></td>
					</tr>
				
				<?php } ?>
				<?php if(sizeof($result_group_info)==0){ ?>
					<tr>
						<td colspan="3" align="center">
						<div align="center">No member added.<br/><a href="#myModal1" role="button" class="btn btn-primary " data-toggle="modal">Add Members</a></div>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- END BORDERED TABLE PORTLET-->
</div>

<style>
.user_div:hover{
background-color:#F0EFEF;
}
</style>
<script>
<?php 
$status1=(int)$this->Session->read('group_status');
if($status1==1)
{ ?>
$.gritter.add({
               
               title: ' Group',
               text: '<p>The group is successfully create.</p>',
               sticky: false,
                time: '10000',
				
            });

<?php 
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array('group_create')));
} ?>
</script>
<script type="text/javascript">
		 var $rows = $('#show_serch .r_d');
		 $('#search').keyup(function() {
			
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
			
			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				return !~text.indexOf(val);
			}).hide();
		});
 </script>