<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
				   
<div align="center">
<a href="help_desk_sm_open_ticket"  rel='tab' class="btn blue tooltips"  data-placement="bottom" data-original-title="Click to view tickets which are not yet resolved"><i class="icon-folder-open"></i> Open Tickets</a>
<a href="help_desk_sm_close_ticket"  rel='tab' class="btn red  tooltips"  data-placement="bottom" data-original-title="Click to view old tickets resolved and closed"><i class="icon-folder-close"></i> Closed Tickets</a>
<a href="help_desk_sm_all_ticket" rel='tab' class="btn blue tooltips"  data-placement="bottom" data-original-title="View all your open and closed tickets"><i class="icon-globe"></i> All Tickets</a>
</div>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box ">
							<!--<div class="portlet-title">
							</div>-->
							<div class="portlet-body">
								<table class="table  table-bordered" id="sample_1">
									<thead>
    									<tr>
											<th style="width:5%;">Sr No</th>
                                        	<th>Date</th>
                                            <th>Time</th>
											<th>Ticket No.</th>
                                            <th>Priority</th>
                                            <th>Raised by</th>
                                            <th>Unit</th>
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
		$ticket_priority=(int)$collection['help_desk']['ticket_priority'];
		if($ticket_priority==1)
		{
			$ticket_priority="Urgent";
		}
		else
		{
			$ticket_priority="Normal";
		}
		
		
	$result_member_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($d_user_id)));
	$name=$result_member_info['user_name'];
	$profile_pic= @$result_member_info['profile_pic'];
	$result_wing_flat=$result_member_info['wing_flat'];
	foreach($result_wing_flat as $data){

		$flat=$data;
	}

$help_desk_category_name = $this->requestAction(array('controller' => 'hms', 'action' => 'help_desk_category_name'),array('pass'=>array($complain_type_id)));
$result_regular_bill = $this->requestAction(array('controller' => 'hms', 'action' => 'regular_bill_check_due_date'),array('pass'=>array($d_user_id)));
	 $n=sizeof($result_regular_bill);
?>
			<tr class="odd gradeX">
				<td><?php echo $z; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $time; ?></td>
				<td><?php echo $ticket_id; ?></td>
				<td><?php echo $ticket_priority; ?></td>
				<td><?php echo $name; ?> <?php if($n>0) {?><span class="tooltips" data-placement="right" data-original-title="Due payment"><i class="icon-flag" style="color:red;font-size:14px;"></i></span> <?php } ?></td>
				<td><?php echo $flat ?></td>
				<td><?php echo $help_desk_category_name; ?></td>
				<td><a href="help_desk_sm_view/<?php echo $help_desk_id; ?>/<?php echo $help_desk_status; ?>" rel='tab' class="btn yellow mini green"  >View</a></td>
				
				
				
			</tr>
<?php } ?>

		</tbody>
	</table>
</div>
</div>
						<!-- END EXAMPLE TABLE PORTLET-->
				<!-- END PAGE CONTENT-->
			</div>









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
				//$("#ticket_view").load('help_desk_sm_view?id=' + id + '&status=' + status);
				
				$( "#ticket_view" ).load( '<?php echo $this->webroot;?>Helpdesks/help_desk_sm_view/' + id + '/' + status, function() {
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
	$("#reply").live('click',function(){
	
			var r=$("#msg_reply").val();
			var a=$("#hd_id").val();

			if(r!="")
			{
			$("#reply_post").append('<div class="outt"><div><span class="pull-right" style="font-size:12px; color:#A5A5A5;">Few minutes ago</span><br>'+ r +'</div></div>');
			r=encodeURIComponent(r);
			$("#save_reply").html('Saving reply...').load('save_reply_resident?reply=' + r + '&id=' + a);
			$("#msg_reply").val('');
			}
			
				
	});
});

</script>

