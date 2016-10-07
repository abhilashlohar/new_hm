<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));?>

<div style="padding:5px;" align="center" class="mobile-align">
<a href="discussion_forum_approval" class="btn blue" rel='tab'>Discussion Approval</a>
<a href="poll_approve" class="btn blue" rel='tab'>Polls Approval</a>
<a href="resource_approval" class="btn red" rel='tab'>Documents Approval</a>
<a href="notice_approval" class="btn blue" rel='tab'>Notice Approval</a>
</div>

<div class="portlet box light-grey">
    <div style="background-color:#EFEFEF; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;">
            Document for  Approval &nbsp; <span>
        </div>
		
	<div id="delete_topic_result"></div>	
		<div class="portlet-body">
		<table class="table table-striped table-bordered" id="sample_2">
									<thead>
										<tr >
											<th>Sr No.</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Uploaded on</th>
                                            <th>Uploaded By</th>
											<th>Recipients</th>
											
											<th class="hidden-phone">Action</th>
                                            <th class="hidden-phone">Reject</th>
                         					</tr>
									</thead>
									<tbody>
                                    <?php 
									$i=0; $to='';
										foreach ($result_resource as $collection) 
 										{ 
											$i++;
											$title=$collection['resource']["resource_title"];
											$name=$collection['resource']["resource_attachment"];
											$ext = pathinfo($name, PATHINFO_EXTENSION);
											$category_id=(int)$collection['resource']['resource_category'];
											$date=$collection['resource']['resource_date'];
											$upload_id=$collection['resource']['user_id'];
											$id=$collection['resource']['resource_id'];
											 $visitor_notice_id=@(int)$collection['resource']['visible'];
											$wing_notice_id=@$collection['resource']['sub_visible'];
											$data='';
											if($visitor_notice_id==1)
											{
											 $to='All Users';
											}
											if($visitor_notice_id==4)
											{
											 $to='All Owners';
											}
											if($visitor_notice_id==5)
											{
											 $to='All Tenants';
											}
											if($visitor_notice_id==2)
											{
											  $to='Roll Wise';
											}
											if($visitor_notice_id==3)
											{
											  $to='Wing Wise';
											}
						$cursor = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($upload_id)));
						foreach ($cursor as $collection) 
						{
						$uploadby=$collection['user']['user_name'];
						}
						$category = $this->requestAction(array('controller' => 'hms', 'action' => 'resource_category_name'),array('pass'=>array($category_id)));
			

										?>
										<tr class="odd gradeX" id='load_data_t<?php echo $id ; ?>'>
											<td><?php echo $i; ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td><?php echo $category; ?></td>
                                            <td><?php echo $date; ?></td>
                                             <td><?php echo $uploadby; ?></td>
											 <td><?php echo @$to; ?></td>
											
									<td><a href='#' class='btn mini green app' role='button' ap_id='<?php echo $id ; ?>'>Approved</a> </td>                       
                                                                                 
									<td><a href='#' class='btn mini red reject' role='button' ap_id='<?php echo $id ; ?>' >Reject</a> </td>               
                                             
										</tr>
                                        
                                     
                                        
                                        
							<?php  }  ?>
                                        
									</tbody>
								</table>
								
							
								 </div>
								 
								 
								  </div>
								  
								
<script>
$(document).ready(function() {
 $(".app").bind('click',function(){
 
 var a_id=$(this).attr("ap_id");
 

 $("#load_data_t" + a_id).html("<td colspan='8'>loading......</td>").load('resource_approve_ajax?t=' + a_id);
  });
 
 $(".reject").live('click',function(){
 var a_id=$(this).attr("ap_id");

 	$('#delete_topic_result').html('<div id="pp"><div class="modal-backdrop fade in"></div><div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"><div class="modal-body" style="font-size:16px;"><i class="icon-warning-sign" style="color:#d84a38;"></i> Are you sure you want to reject documents ? </div><div class="modal-footer"><a href="resource_reject?con='+a_id+'" class="btn blue" id="yes" >Yes</a><a href="#" role="btn" id="can" class="btn"> No </a>  </div></div></div>');
	$("#can").live('click',function(){
	$("#pp").hide();
});
 });
 
 
 
});


</script>