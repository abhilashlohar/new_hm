<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>					   
					   
<div align="center">
<a href="help_desk_r_open_ticket" rel='tab' class="btn blue"><i class="icon-folder-open"></i> Open Tickets</a>
<a href="help_desk_r_close_ticket" rel='tab' class="btn blue"><i class="icon-folder-close"></i> Closed Tickets</a>
<a href="help_desk_r_all_ticket" rel='tab' class="btn blue"><i class="icon-globe"></i> All Tickets</a>
<a href="help_desk_r_draft_ticket" rel='tab' class="btn red"><i class="icon-briefcase"></i> Draft Ticket</a>
</div>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
	<div class="portlet box">
							
							<div class="portlet-body">
								<table class="table table-striped table-bordered" id="sample_1" >
									<thead>
    									<tr>
											<th style="width:5%;">Sr No</th>
                                        	<th>Date</th>
                                            <th >Time</th>
											<th >Category</th>
											<th>Ticket Priority</th>
                                            <!--<th style="width:10%;">View</th>-->
                                            <th >Action</th>
										</tr>
									</thead>
									<tbody>
   <?php
   $z=0;
	
	foreach ($result_help_desk_draft as $collection) 
	{
		$z++;
		$help_desk_id=$collection['help_desk']['help_desk_id'];
		$date=$collection['help_desk']['help_desk_date'];
	    $time=$collection['help_desk']['help_desk_time'];
		$complain_type_id=(int)$collection['help_desk']['help_desk_complain_type_id'];
		$d_user_id=(int)$collection['help_desk']['user_id'];
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
		<td><?php echo $help_desk_category_name; ?></td>
		<td><?php echo $ticket_priority; ?></td>
			<td> 
			<!---- action popup ----->

			<div class="btn-group">
			<a class="btn mini blue " href="#" data-toggle="dropdown"> Action</a>
			<ul class="dropdown-menu">
			<li><a href="<?php echo $this->webroot;?>Helpdesks/help_desk_send_to_sm/<?php echo $help_desk_id; ?>" rel='tab'><i class="icon-pencil"></i> Edit</a></li>
			<li><a href="##<?php echo $z; ?>"  data-toggle="modal"><i class="icon-trash"></i> Delete</a></li>
			</ul>
			</div>
			<!----- end action popup ------->
			</td>

			<!--popup start -->
			<div id="<?php echo $z; ?>" class="modal hide " tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true" style="display: none;">
			<div class="modal-header" >
					
			</div>
			<div class="modal-body">
			<span style="font-size:14px;"> <i class="icon-warning-sign" style="color:#d84a38;"></i> Are you sure you want to delete help desk tickets ?</span>
			</div>
			<div class="modal-footer">

			<a href="help_desk_draft_delete?con=<?php echo $help_desk_id; ?>" role="btn"  class="btn blue" >Yes</a>
			<button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
			</div>
			</div>
			<!--popup end -->	
											
                                           	
</tr>
  <?php }  



  ?>

	</tbody>
	</table>
	</div>
	</div>
	<!-- END EXAMPLE TABLE PORTLET-->
	<!-- END PAGE CONTENT-->
	</div>
	<!-- END PAGE CONTAINER-->	
	</div>
	<!-- END PAGE -->	 	
	</div>
	
	
	
	<script>
$(document).ready(function() {
<?php
$status=$this->Session->read('help_desk_draft_status');

if($status==1)
{
?>
$.gritter.add({

			title: '<i class="icon-headphones"></i> Helpdesks',
			text: 'Your Ticket has been saved in draft folder.',
			sticky: false,
			time: '10000',

			});
			
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(1)));

}
?>			

});
</script>