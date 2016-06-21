<style>



.div_adjesment{
	
	width:30% !important;
}
@media screen and (max-width: 750px){
    .div_adjesment {
      width: auto !important;
    }
}

.elements{
	padding:5px;
}
.elements:hover{
	background-color: #DDD;
}
</style>

<?php 
function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            @$length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                @$output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}

?>





<div class="row-fluid" style="background-color:#fff;">
<!---------left section start------------------>
	<div class="span9" >
	<!---------last 3 section start------------------>
		<div class="row-fluid">
		<div class="span" style="margin-top:-20px;"></div>
		<?php 
		
		 $result_role_security_dashboard=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard'), array('pass' => array($s_society_id,$role_id,3)));
		if(sizeof($result_role_security_dashboard)>0){
		?>
			<div class="span4 div_adjesment" style="">
			<!-------content----------->
			<table class="table shadow table-bordered table-advance table-hover">
				<thead>
					<tr>
						<th style="background-color:#C3DEEB;font-weight: 500;">
						<span class="label label-info"><i class=" icon-comments"></i></span> Discussion Forum
						<a href="<?php echo $this->webroot; ?>Discussions/index" rel='tab' class="pull-right" style="font-size: 12px;" ><i class="icon-search" style="text-decoration: none;font-size: 14px;"></i></a>  
						<a href="<?php echo $this->webroot; ?>Discussions/new_topic" rel='tab' style="margin-right: 5px;"  class="pull-right"><i class="icon-plus" style="text-decoration: none;font-size: 14px;padding: 0px 5px 0px 0px;"></i></a>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(sizeof($result_discussion_topics)==0)
					{
					?>
					<tr>
						<td>
						<div align="center" style="color: #A5A5A5;padding: 16px;"><i class="icon-thumbs-down" style="font-size: 20px;"></i>
						<br>There are no topics in your discussion forum.</div>
						</td>
					</tr>
					<?php
					}
					
					foreach($result_discussion_topics as $discussion_data) 
					{
					$discussion_id=(int)$discussion_data['discussion_post']['discussion_post_id'];
					$topic=$discussion_data['discussion_post']['topic'];
					$description=$discussion_data['discussion_post']['description'];
					
					$topic_cut=substrwords($topic,25,'...');
					?>
					<tr>
						<td><a href="<?php echo $this->webroot; ?>Discussions/index/<?php echo $discussion_id; ?>/0" rel='tab' class="" data-trigger="hover" data-placement="bottom" data-content="<?php echo $description; ?>" data-original-title="<?php echo $topic; ?>"> <?php echo $topic_cut; ?> </a></td>
					</tr>
					<?php } 
					
					if(sizeof($result_discussion_topics)==1)
					{
					?>
					<tr>
						<td style="height: 57px;"></td>
					</tr>
					<?php
					}
						
						
					if(sizeof($result_discussion_topics)==2)
					{
					?>
					<tr>
						<td style="height: 20px;"></td>
					</tr>
					<?php
					}
					
					?>
				</tbody>
			</table>
			<!-------content----------->
			</div>
		<?php } ?>
		
		<?php 
		 $result_role_security_dashboard=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard'), array('pass' => array($s_society_id,$role_id,6)));
		if(sizeof($result_role_security_dashboard)>0){
		?>
		
			<div class="span4 div_adjesment" >
			<!-------content----------->
			<table class="table shadow table-bordered table-advance table-hover">
				<thead>
					<tr >
						<th style="background-color:#C0EEEB;font-weight: 500;">
						<span class="label" style="background-color:#44b6ae;"><i class=" icon-gift"></i></span> Events
						<a href="<?php echo $this->webroot; ?>Events/events" rel='tab' class="tooltips pull-right" style="font-size: 12px;"> <i class="icon-search" style="text-decoration: none;font-size: 14px;"></i></a>
						 <?php 
						 $result_role_security_dashboard_sub=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard_sub'), array('pass' => array($s_society_id,$role_id,6,17)));
							if(sizeof($result_role_security_dashboard_sub)>0){ ?>
								<a href="<?php echo $this->webroot; ?>Events/event_add" rel='tab' style="margin-right: 5px;"  class="pull-right"><i class="icon-plus" style="text-decoration: none;font-size: 14px;padding: 0px 5px 0px 0px;"></i></a>
							<?php } ?>
						
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(sizeof($result_event_last)==0)
					{
					?>
					<tr>
						<td>
						<div align="center" style="color: #A5A5A5;padding: 16px;"><i class="icon-thumbs-down" style="font-size: 20px;"></i>
						<br>There are no events to display.<br/><br/></div>
						</td>
					</tr>
					<?php
					}
					
					
					
					foreach($result_event_last as $event_data) 
					{
					$event_id=(int)$event_data['event']['event_id'];
					$e_name=$event_data['event']['e_name'];
					
					$e_name_cut=substrwords($e_name,25,'...');
					?>
					<tr>
						<td><a href="<?php echo $this->webroot; ?>Events/event_info/<?php echo $event_id; ?>" rel='tab'> <?php echo $e_name_cut; ?> </a></td>
					</tr>
					<?php }

					if(sizeof($result_event_last)==1)
					{
					?>
					<tr>
						<td style="height: 57px;"></td>
					</tr>
					<?php
					}
						
						
					if(sizeof($result_event_last)==2)
					{
					?>
					<tr>
						<td style="height: 20px;"></td>
					</tr>
					<?php
					}
					
					?>
				</tbody>
			</table>
			<!-------content----------->
			</div>
		<?php } ?>
		
		<?php 
		 $result_role_security_dashboard=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard'), array('pass' => array($s_society_id,$role_id,1)));
		if(sizeof($result_role_security_dashboard)>0){
		?>
			<div class="span4 div_adjesment"  >
			<!-------content----------->
			<?php if($role_id==3) { 
			$url_see_all='help_desk_sm_all_ticket';
			}

			if($role_id!=3) { 
			$url_see_all='help_desk_r_all_ticket';
			} ?>
			<table class="table shadow table-bordered table-advance table-hover">
				<thead>
					<tr >
						<th style="background-color:#FDEFD2;font-weight: 500;">
						<span class="label label-warning"><i class="icon-headphones"></i></span> Help-Desk
						<a href="<?php echo $this->webroot; ?>Helpdesks/<?php echo $url_see_all; ?>" rel='tab' class="pull-right" style="font-size: 12px;" ><i class="icon-search" style="text-decoration: none;font-size: 14px;"></i></a>
						<?php 
						 $result_role_security_dashboard_sub=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard_sub'), array('pass' => array($s_society_id,$role_id,1,3)));
						 if(sizeof($result_role_security_dashboard_sub)>0){ ?>
							<a href="<?php echo $this->webroot; ?>Helpdesks/help_desk_genarate_ticket" style="margin-right: 5px;"  rel='tab' class="pull-right"><i class="icon-plus" style="text-decoration: none;font-size: 14px;padding: 0px 5px 0px 0px;"></i></a>
						<?php } ?>
						</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				if(sizeof($result_help_desk)==0)
				{
				?>
				<tr>
					<td>
					<div align="center" style="color: #A5A5A5;padding: 16px;"><i class="icon-thumbs-down" style="font-size: 20px;"></i>
					<br>There are no helpdesk tickets to display.</div>
					</td>
				</tr>
				<?php
				}
					
				foreach($result_help_desk as $help_desk_data) 
				{
				$help_desk_id=(int)$help_desk_data['help_desk']['help_desk_id'];
				$ticket_id=$help_desk_data['help_desk']['ticket_id'];
				$complain_type_id=$help_desk_data['help_desk']['help_desk_complain_type_id'];
				$help_desk_status=(int)$help_desk_data['help_desk']['help_desk_status'];
				
				$complain_name=$this->requestAction(array('controller' => 'hms', 'action' => 'help_desk_category_name'), array('pass' => array($complain_type_id)));
				
				if($role_id==3) { 
				$url='help_desk_sm_view/'.$help_desk_id.'/'.$help_desk_status;
				}

				if($role_id!=3) { 
				$url='help_desk_r_view/'.$help_desk_id.'/'.$help_desk_status;
				}
				?>
					<tr>
						<td><a href="<?php echo $this->webroot; ?>Helpdesks/<?php echo $url; ?>" rel='tab'> <?php echo $ticket_id.' - '.$complain_name; ?> </a></td>
					</tr>
				<?php } 
				
				
				if(sizeof($result_help_desk)==1)
				{
				?>
				<tr>
					<td style="height: 57px;"></td>
				</tr>
				<?php
				}
					
					
				if(sizeof($result_help_desk)==2)
				{
				?>
				<tr>
					<td style="height: 20px;"></td>
				</tr>
				<?php
				}
				
				?>
				</tbody>
			</table>
			<!-------content----------->
			</div> 
		<?php } ?>
		
	<!---------last 3 section end------------------>
	
	

	<!---------last 3 section start------------------>
		
		<?php 
		 $result_role_security_dashboard=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard'), array('pass' => array($s_society_id,$role_id,2)));
		if(sizeof($result_role_security_dashboard)>0){
		?>
		
			<div class="span4 div_adjesment"  >
			<!-------content----------->
			<?php if($role_id==3) { 
			$url_see_all='notice_publish';
			}

			if($role_id!=3) { 
			$url_see_all='notice_publish';
			} ?>
			<table class="table shadow table-bordered table-advance table-hover">
				<thead>
					<tr >
						<th style="background-color:#F3DDD8;font-weight: 500;">
						<span class="label label-important"><i class="icon-bullhorn"></i></span> Notices
						<a href="<?php echo $webroot_path; ?>Notices/<?php echo $url_see_all; ?>" rel='tab' class="pull-right" style="font-size: 12px;" ><i class="icon-search" style="text-decoration: none;font-size: 14px;    "></i></a>
						 <?php 
						 $result_role_security_dashboard_sub=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard_sub'), array('pass' => array($s_society_id,$role_id,2,5)));
						 if(sizeof($result_role_security_dashboard_sub)>0){ ?>
							<a href="<?php echo $webroot_path; ?>Notices/new_notice" rel='tab' style="margin-right: 5px;" class="pull-right"><i class="icon-plus" style="text-decoration: none;font-size: 14px;padding: 0px 5px 0px 0px;"></i></a>
						<?php } ?>
						
					</tr>
				</thead>
				<tbody>
					<?php 
					
					if(sizeof($result_notice_visible_last)==0)
					{
					?>
					<tr>
						<td>
						<div align="center" style="color: #A5A5A5;padding: 16px;"><i class="icon-thumbs-down" style="font-size: 20px;"></i>
						<br>There are no notices in the notice board</div>
						</td>
					</tr>
					<?php
					}
					
					
					foreach($result_notice_visible_last as $notice_data) 
					{
					$notice_id=(int)$notice_data['notice']['notice_id'];
					$n_subject=$notice_data['notice']['n_subject'];
					
					$n_subject_cut=substrwords($n_subject,25,'...');
					
					$url='notice_publish_view/'.$notice_id;

					
					?>
					<tr>
						<td><a href="<?php echo $webroot_path; ?>Notices/<?php echo $url; ?>" rel='tab'> <?php echo $n_subject_cut; ?> </a></td>
					</tr>
					<?php } 
					
					if(sizeof($result_notice_visible_last)==1)
					{
					?>
					<tr>
						<td style="height: 57px;"></td>
					</tr>
					<?php
					}
						
						
					if(sizeof($result_notice_visible_last)==2)
					{
					?>
					<tr>
						<td style="height: 20px;"></td>
					</tr>
					<?php
					}
					
					?>
				</tbody>
			</table>
			<!-------content----------->
			</div>
		<?php } ?>
		
		<?php 
		 $result_role_security_dashboard=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard'), array('pass' => array($s_society_id,$role_id,7)));
		if(sizeof($result_role_security_dashboard)>0){
		?>
			<div class="span4 div_adjesment"  >
			<!-------content----------->
			<table class="table shadow table-bordered table-advance table-hover">
				<thead>
					<tr >
						<th style="background-color:#EDC8F6;font-weight: 500;">
						<span class="label" style="background-color:#6d1b81;"><i class="icon-question-sign"></i></span> Polls
						<a href="<?php echo $this->webroot ; ?>Polls/polls" rel='tab' class="pull-right" style="font-size: 12px;" ><i class="icon-search" style="text-decoration: none;font-size: 14px;"></i></a>
						<?php 
						$result_role_security_dashboard_sub=$this->requestAction(array('controller'=>'hms','action'=>'role_security_dashboard_sub'),array('pass'=>array($s_society_id,$role_id,7,19)));
						  if(sizeof($result_role_security_dashboard_sub)>0){ ?>
							<a href="<?php echo $this->webroot ; ?>Polls/poll_add" rel='tab' style="margin-right: 5px;" class="pull-right"><i class="icon-plus" style="text-decoration: none;font-size: 14px;padding: 0px 5px 0px 0px;"></i></a>
						 <?php } ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					
					if(sizeof($result_poll_last)==0)
					{
					?>
					<tr>
						<td>
						<div align="center" style="color: #A5A5A5;padding: 16px;"><i class="icon-thumbs-down" style="font-size: 20px;"></i>
						<br>There are no active polls in the Polling Booth.</div>
						</td>
					</tr>
					<?php
					}
					
					foreach($result_poll_last as $poll_data) 
					{
					$poll_id=(int)$poll_data['poll']['poll_id'];
					$question=$poll_data['poll']['question'];
					
					$question_cut=substrwords($question,25,'...');
					?>
					<tr>
						<td><a href="<?php echo $this->webroot ; ?>Polls/polls" rel='tab'> <?php echo $question_cut; ?> </a></td>
					</tr>
					<?php } 
					
					if(sizeof($result_poll_last)==1)
					{
					?>
					<tr>
						<td style="height: 57px;"></td>
					</tr>
					<?php
					}
						
						
					if(sizeof($result_poll_last)==2)
					{
					?>
					<tr>
						<td style="height: 20px;"></td>
					</tr>
					<?php
					}
					
					?>
				</tbody>
			</table>
			<!-------content----------->
			</div>
		<?php } ?>
		<?php 
		 $result_role_security_dashboard=$this->requestAction(array('controller' => 'hms', 'action' => 'role_security_dashboard'), array('pass' => array($s_society_id,$role_id,4)));
		if(sizeof($result_role_security_dashboard)>0){
		?>
			<div class="span4 div_adjesment" >
			<!-------content----------->
			<table class="table shadow table-bordered table-advance table-hover">
				<thead>
					<tr >
						<th style="background-color:#BDE5C3;font-weight: 500;">
						<span class="label label-success"><i class="icon-file"></i></span> Documents
						<a href="<?php echo $this->webroot ; ?>Documents/resource_view" rel='tab' class="pull-right" style="font-size: 12px;" ><i class="icon-search" style="text-decoration: none;font-size: 14px;"></i></a>
						<?php 
						$result_role_security_dashboard_sub=$this->requestAction(array('controller'=>'hms','action'=>'role_security_dashboard_sub'),array('pass'=>array($s_society_id,$role_id,4,14)));
						 if(sizeof($result_role_security_dashboard_sub)>0){ ?>
							<a href="<?php echo $this->webroot ; ?>Documents/resource_add" rel='tab' style="margin-right: 5px;" class="pull-right"><i class="icon-plus" style="text-decoration: none;font-size: 14px;padding: 0px 5px 0px 0px;"></i></a>
						 <?php }  ?>
						
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					
					if(sizeof($result_resource_last)==0)
					{
					?>
					<tr>
						<td>
						<div align="center" style="color: #A5A5A5;padding: 16px;"><i class="icon-thumbs-down" style="font-size: 20px;"></i>
						<br>There are no documents in the Resources.</div>
						</td>
					</tr>
					<?php
					}
					
					foreach($result_resource_last as $resource_data) 
					{
					$resource_id=(int)$resource_data['resource']['resource_id'];
					$resource_title=$resource_data['resource']['resource_title'];
					
					$resource_title_cut=substrwords($resource_title,25,'...');
					?>
					<tr>
						<td><a href="<?php echo $this->webroot ; ?>Documents/resource_view" rel='tab'> <?php echo $resource_title_cut; ?> </a></td>
					</tr>
					<?php } 
					
					if(sizeof($result_resource_last)==1)
					{
					?>
					<tr>
						<td style="height: 57px;"></td>
					</tr>
					<?php
					}
						
						
					if(sizeof($result_resource_last)==2)
					{
					?>
					<tr>
						<td style="height: 20px;"></td>
					</tr>
					<?php
					}
					
					?>
				</tbody>
			</table>
			<!-------content----------->
		</div> <?php } ?>
		</div>
	<!---------last 3 section end------------------>
	</div>
<!---------left section end------------------>	

<!---------right section start------------------>	
	<div class="span3" >
	<!-------content----------->
	<div align="center" style="border: solid 2px #E2E2E2;padding: 20px;height: 270px;    color: #3D3D3D;">
	<i class="icon-time" style="font-size: 20px;"></i><br>
	<h5>New features coming soon, watchout for this space!</h5>
	</div>
	<!-------content----------->
	</div>
<!---------right section end------------------>
</div>