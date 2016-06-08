<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>


<?php if(!empty($error_addgroup)) { ?>
<div class="alert alert-error">
	<strong>Error!</strong> <?php echo @$error_addgroup; ?>
</div>
<?php } ?>

<div style="border:solid 2px #4cae4c; width:90%; margin:auto;" class="portal">
<div style="border-bottom:solid 2px #4cae4c; color:white; background-color: #5cb85c; padding:4px; font-size:20px;"> All Groups</div>
<div style="padding:10px;background-color:#FFF;">

<div class="row-fluid">
<div class="span12 responsive">


<div class="control-group">
  <table class="table table-bordered ">
				<thead>
					<tr>
						<th width="10%">Sr. No.</th>
						<th>Group Name</th>
						<th>Members</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=0;
					foreach($result_group as $data)
					{
					$i++;
					$group_id=$data["group"]["group_id"];
					$group_name=$data["group"]["group_name"];
					$users_d=@$data["group"]["users"];
					?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $group_name; ?></td>
							<td><span class="label label-info"><?php echo sizeof($users_d); ?></span></td>
							<td>
							<a href="groupview/<?php echo $group_id; ?>" rel="tab" class="btn mini yellow" >View</a>
							
							<a  role="button" class="btn red mini delete_group" group="<?php echo $group_id; ?>" ><i class=" icon-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
</div>


</div>

</div>

<div class="row-fluid">
<div class="span12 responsive">

<label>Add new group</label>
			<div class="">
				<form id="contact-form" method="POST">
			   <input class="m-wrap" type="text" name="group_name" id="group_name_error" style="background-color: #fff !important;"><button class="btn green" type="submit" name="add"><i class="icon-plus"></i> Add new group</button>
			   </form>
			   <label id="group_name_error"></label>
			</div>

</div>

</div>
</div>
</div>
<div id="show_div"> </div>
<script>
$(document).ready(function(){

	$(".delete_group").bind('click', function(){
		var id=$(this).attr('group');
					
					$('#show_div').show().html('<div class="modal-backdrop fade in"></div><div class="modal" id="poll_edit_content"><div class="modal-body"><span style="font-size:16px;"><i class="icon-warning-sign" style="color:#d84a38;"></i>  Are you sure you want to delete group ? </span></div><div class="modal-footer"><a href="group_delete?con='+id+'" class="btn red tooltips"  role=""> Yes</a><button class="btn" id="close_div">No</button></div></div>');
	
	});
	$("#close_div").die().live('click', function(){
		$('#show_div').hide();
		
	});
});
</script>