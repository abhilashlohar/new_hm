<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div class="tabbable tabbable-custom">
<ul class="nav nav-tabs">
	
</ul>
        <div class="tab-content">
        <div class="tab-pane active" >
        <div class="span6" style="margin-left:25%;  ">
        <div class="portlet-body" >
        <table class="table table-hover table-bordered" id="tb">
        <tr>
        <th>Sr.no.</th>
        <th>Role Name</th>
        </tr>
		<?php 
		$r=0;
		foreach ($result_role as $collection) 
		{ 
		$r++;
		$auto_id = (int)$collection['role']['auto_id'];
		$role_id = (int)$collection['role']['role_id'];
		$role_name = $collection['role']['role_name'];
		$delete_id = @$collection['role']['delete_id'];
		$result_assign_role = $this->requestAction(array('controller' => 'Fns', 'action' => 'find_out_role_assign_member'),array('pass'=>array($role_id)));
	
		?>
		<tr>
        <th><?php echo $r; ?></th>
        <td>
		<?php echo $role_name; ?>
		<?php if($delete_id==1){ ?>
		<div class="pull-right">
			<span class="btn mini yellow edit_role " update_id="<?php echo $auto_id; ?>" update_text="<?php echo $role_name; ?>"><i class=" icon-edit"></i>  </span>
			<?php if($result_assign_role=="true"){ ?>
			<span class=""><a role="button" class="btn mini role_delete red" update_id="<?php echo $auto_id; ?>"> <i class="icon-trash"></i></a></span>
				<?php } ?>
		</div>
		<?php } ?>
		</td>
        </tr>
		<?php } ?>
        </table>
        <form method="post" id="contact-form">
		
			<div class="input-append" style="margin-left:23%;">   
				<div align="left" style="float:left;">			
				<input class="m-wrap" size="16" type="text" placeholder="Role name" id="role_name" name="role_name"> </div>
				<div align="left"> <button class="btn blue" type="submit" name="add_role">Add New Role</button>
				</div>
		   </div>
		   
			
		   
		   
        </form>
        
		
		<form id="edit_submit" method="post">
		<div class="edit_div" style="display: none;">
			<div class="modal-backdrop fade in"></div>
			<div class="modal">
				<div class="modal-header" >
					<h4 id="myModalLabel1">Update Role Name</h4> 	
				</div>
				<div class="modal-body">
					
					<input type="hidden" name="update" value="" id="update">
					<div class="control-group">
					  <label class="control-label">Role Name</label>
					  <div class="controls">
						<input class="m-wrap " id="role_edit_auto" name="edit_text" type="text" value="">
					  </div>
				   </div>
				   
				  
					
									   
				</div>
				<div class="modal-footer">

					<button class="btn" id="close_edit">Close</button>
					<button class="btn blue " type="submit" name="update_data" >Save</button>
				</div>

			</div>
		</div>	
       </form>  
        </div>
        </div>
        </div>
        
        </div>
        </div>
		
		<div id="delete_topic_result"></div>
		
<script>
$(document).ready(function(){
	
$( ".edit_role" ).click(function() {
		var role_id = $(this).attr("update_id");
		var update_text = $(this).attr("update_text");
		$(".edit_div").show();
		$("#role_edit_auto").val(update_text);
		$("#update").val(role_id);
	});	
	
	 $("#close_edit").live('click',function(e){
		 e.preventDefault();
		$(".edit_div").hide();
	 });
	 
	 $("#can").live('click',function(e){
		
		$("#pp").hide();
	 });
	
	$( ".role_delete" ).click(function() {
		var role_id = $(this).attr("update_id");
		
		$('#delete_topic_result').html('<div id="pp"><div class="modal-backdrop fade in"></div><div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"><div class="modal-body" style="font-size:14px;"><i class="icon-warning-sign" style="color:#d84a38;"></i> Sure, you want to delete this role ?</div><div class="modal-footer"><a href="<?php echo $webroot_path; ?>Hms/role_new_delete?con='+role_id+'" class="btn blue" id="yes">Yes</a><a href="#" role="button" id="can" class="btn">No</a></div></div></div>');
	});	
	
	$('#edit_submit').validate({
		rules: {
			  edit_text: {
				required: true
			  },
		},	  
	
	});
	
	
	$('#contact-form').validate({
		rules: {
			  role_name: {
				required: true
			  },
		},	  
		submitHandler: function () {
				$("button[name=add_role]").attr('disabled','disabled');
			    form.submit();
			}
	});
});
</script>		