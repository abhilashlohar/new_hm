<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>				 
<div align="center" class="mobile-align">
<a href="help_desk_r_open_ticket" rel='tab' class="btn red space-responsive"><i class="icon-folder-open"></i> Open Tickets</a>
<a href="help_desk_r_close_ticket" rel='tab' class="btn blue space-responsive"><i class="icon-folder-close"></i> Closed Tickets</a>
<a href="help_desk_r_all_ticket" rel='tab' class="btn blue space-responsive"><i class="icon-globe"></i> All Tickets</a>
<a href="help_desk_r_draft_ticket" rel='tab' class="btn blue space-responsive"><i class="icon-briefcase"></i> Draft Ticket</a>
</div>
<div class="portlet box ">

<div class="portlet-body mobile_responce">
	<table class="table table-striped table-bordered" id="sample_1">
		<thead>
			<tr>
				<th style="width:5%;">Sr No</th>
				<th>Date</th>
				<th>Time</th>
				<th>Ticket No.</th>
				<th>Ticket Priority</th>
				<th>Category</th>
				<th style="width:10%;">View</th>
			</tr>
		</thead>
		<tbody>
   <?php
  
   $z=0;
	foreach ($result_help_desk as $collection) 
	{
		$z++;
		$help_desk_id=$collection['help_desk']['help_desk_id'];
		$date=$collection['help_desk']['help_desk_date'];
	    $time=$collection['help_desk']['help_desk_time'];
		$ticket_id=$collection['help_desk']['ticket_id'];
		$complain_type_id=(int)$collection['help_desk']['help_desk_complain_type_id'];
		$d_user_id=(int)$collection['help_desk']['user_id'];
		$help_desk_status=(int)$collection['help_desk']['help_desk_status'];
		$ticket_priority=$collection['help_desk']['ticket_priority'];
		if($ticket_priority==1)
		{
			$ticket_priority="Urgent";
		}
		else
		{
			$ticket_priority="Normal";
		}
	
	$help_desk_category_name = $this->requestAction(array('controller' => 'hms', 'action' => 'help_desk_category_name'),array('pass'=>array($complain_type_id)));
								
	
	?>
	<tr class="odd gradeX">
		<td><?php echo $z; ?></td>
		<td><?php echo $date; ?></td>
		<td><?php echo $time; ?></td>
		<td><?php echo $ticket_id; ?></td>
		<td><?php echo $ticket_priority; ?></td>
		<td><?php echo $help_desk_category_name; ?></td>
		<td><a href="<?php echo $this->webroot;?>Helpdesks/help_desk_r_view/<?php echo $help_desk_id; ?>/<?php echo $help_desk_status; ?>" rel='tab'  class="btn yellow mini green">View</a></td>
		
		
		
	</tr>
<?php } ?>

	</tbody>
</table>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
<!-- END PAGE CONTENT-->





<script>
$(document).ready(function() {
	$("#back").live('click',function(){
			$("#ticket_view").hide();
			$("#all_tickets").show();	
	});
});

</script>

<script>

function view_ticket(id,status)
{

	$(document).ready(function() {
				//$("#all_tickets").hide();
				//$("#ticket_view").show();	
				//$("#ticket_view").load('help_desk_r_view?id=' + id + '&status=' + status);
				
				$( "#ticket_view" ).load('<?php echo $this->webroot;?>Helpdesks/help_desk_r_view/' + id + '/' + status, function() {
				  $("#all_tickets").hide();
				  $("#ticket_view").show();
				});
		
		
		});
	
}
</script>
<!--------REPLY------------>
<link href="<?php echo $this->webroot ; ?>/as/reply.css" rel="stylesheet" />
<?php $a=1; ?>

<script>
$(document).ready(function() {
<?php
$status=$this->Session->read('help_desk_status');
$sts=(int)$status[0];
$t=$status[1];
if($sts==1)
{
?>
$.gritter.add({

			title: '<i class="icon-headphones"></i> Helpdesks',
			text: '<p>Your Ticket has been generated.</p><p>Your Ticket Id is: #<?php echo $t; ?> .</p>',
			sticky: false,
			time: '10000',

			});
			
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(1)));

}
?>			

});
</script>