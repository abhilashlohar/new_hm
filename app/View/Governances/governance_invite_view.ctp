<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));

 $result_role_security=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard_sub'), array('pass' => array($s_society_id,$s_role_id,40,94)));
?>

<div style="background-color:#fff;padding:10px;" class="mobile_responce">
<label class="m-wrap pull-right">Search: <input type="text" id="search" class="m-wrap medium" style="background-color:#FFF !important;"></label>
<table class="table table-striped table-bordered dataTable" width="100%">
<thead>
    <tr>
    <th>Meeting ID </th>
	<th >Date of Notice</th>
    <th >Meeting Title</th>
	 <th>Meeting Type</th>
    <th >Date of Meeting</th>
	 <th >Meeting Time</th>
	 <th >Meeting Location</th>
	 <th>Invitees </th>
    <th>Meeting</th>
    </tr>
</thead>
<tbody id="table">
<?php
$i=0;
foreach($result_gov_invite as $data){
$gov_id=(int)$data['governance_invite']['governance_invite_id'];
$gov_invite_me_id=(int)$data['governance_invite']['gov_invite_me_id'];
$subject=$data['governance_invite']['subject'];
$notice_of_date=@$data['governance_invite']['notice_of_date'];
$message_web=$data['governance_invite']['message'];
$date=$data['governance_invite']['date'];
$time=$data['governance_invite']['time'];
$type=$data['governance_invite']['type'];
$deleted=$data['governance_invite']['deleted'];
$location=$data['governance_invite']['location'];
$meeting_type=(int)@$data['governance_invite']['meeting_type'];
 $user=@$data['governance_invite']['user'];
 $invite_user=sizeof($user);
 if($meeting_type==1)
 {
	$moc="Managing Committee";
 
 }
 if($meeting_type==2)
 {
	$moc="General Body";
 
 }
 if($meeting_type==3)
 {
	$moc="Special General Body";
 
 }

if($type==3)
{
$visible=$data['governance_invite']['visible'];
$sub_visible=$data['governance_invite']['sub_visible'];
}

$result_gov_minute=$this->requestAction(array('controller' => 'governances', 'action' => 'governace_minute_meeting'), array('pass' => array($gov_id)));

$minute_id=@$result_gov_minute[0]['governance_minute']['governance_minute_id'];
$i++;
?>
<tr>
    <td><?php echo $gov_invite_me_id; ?></td>
	 <td><?php echo $notice_of_date ; ?></td>
    <td><?php echo $subject ; ?></td>
	 <td><?php echo $moc ; ?></td>
    <td><?php echo $date ; ?></td>
	 <td><?php echo $time ; ?></td>
	 <td><?php echo $location ; ?></td>
	  <td><span class="label label-info"><?php echo $invite_user ; ?></span></td>
    <td><?php if($deleted==0){ ?><a href="<?php echo $webroot_path; ?>Governances/governance_invite_view1/<?php echo $gov_id; ?>" rel='tab' class="btn mini yellow tooltips" data-placement="bottom" data-original-title="Agenda View" ><i class="icon-search"></i></a> <?php } else { ?>
	
	 <a href="<?php echo $webroot_path; ?>Governances/governance_invite_draft/<?php echo $gov_id; ?>" rel='tab' class="btn mini blue tooltips" data-placement="bottom" data-original-title="Draft" ><i class="icon-inbox"></i></a>
	<?php } ?>
	<?php if(!empty($minute_id)){ ?><a href="<?php echo $webroot_path; ?>Governances/governance_minute_view1/<?php echo $minute_id; ?>" rel='tab' class="btn mini yellow tooltips" data-placement="bottom" data-original-title="Minutes View" ><i class="icon-search"></i></a> <?php } ?>
	<?php if(sizeof($result_role_security)>0){ ?>
	<span id="rep<?php echo $gov_id; ?>"><a  class='btn mini red resend_meeting tooltips' element_id="<?php echo $gov_id; ?>" data-placement="bottom" data-original-title="Resend Email" > <i class=' icon-envelope'></i></a></span> <?php } ?>
	</td>
<?php } ?>	
	
</tr>

</tbody>
</table> 
</div>

<script type="text/javascript">

$(document).ready(function() {
	
$(".resend_meeting").click(function(){

	var meeting_id=$(this).attr("element_id");
		$.ajax({
			url: "governace_meeting_resend/"+meeting_id,
		}).done(function(response){
			if(response=="done"){
				$("#rep"+meeting_id).html('<a class="btn mini green"><i class="icon-ok"></i> Email Sent</a>');
			 } 
			
		});
	});	
});		

		 var $rows = $('#table tr');
		 $('#search').keyup(function() {
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
			
			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				return !~text.indexOf(val);
			}).hide();
		});
 </script>