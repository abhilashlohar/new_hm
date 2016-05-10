<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>




<div style="background-color:#fff;padding:10px;">
<table class="table table-striped table-bordered" id="sample_2">
<thead>
    <tr>
    <th width="7%"> Sr. No.</th>
    <th>Subject</th>
    <th class="hidden-phone">Date</th>
    <th width="15%"></th>
    </tr>
</thead>
<tbody>
<?php
$i=0;
foreach($result_notice_draft as $data)
{ $i++;
$notice_id=$data['notice']['notice_id'];
$n_subject=$data['notice']['n_subject'];
$n_message=$data['notice']['n_message'];
$n_date=$data['notice']['n_date'];




?>
<tr class="odd gradeX">
    <td><?php echo $i; ?></td>
    <td><?php echo $n_subject; ?></td>
    <td><?php echo $n_date; ?></td>
    <td><a href="<?php echo $webroot_path; ?>Notices/edit_notice/<?php echo $notice_id; ?>" rel='tab' role="button" class="btn yellow mini "><i class="icon-edit"></i> Edit Notice</a></td>
	
</tr>
<?php } ?> 
</tbody>
</table>
<?php if(sizeof($result_notice_draft)==0){ echo '<div align="center">No Notice Published</div>'; } ?>
</div>

<script>

<?php 
 $draft_notice_griter=$this->Session->read('draft_notice');
if($draft_notice_griter==1){
 ?>	
		$.gritter.add({
			title: '<i class="icon-bullhorn"></i> Notice',
			text: '<p>Your notice has been saved in Draft box. You can edit/post later.</p>',
			sticky: false,
			time: '10000',

		});
		
<?php 
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array('draft_notice_griter')));
} ?>

</script>