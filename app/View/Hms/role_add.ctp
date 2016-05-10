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
		$role_name = $collection['role']['role_name'];
		?>
		<tr>
        <th><?php echo $r; ?></th>
        <td><?php echo $role_name; ?></td>
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
        
        
        </div>
        </div>
        </div>
        
        </div>
        </div>
		
<script>
$(document).ready(function(){
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