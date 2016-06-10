<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>




<div align="center">
<a href='<?php echo $webroot_path; ?>Notices/notice_publish' rel='tab' <?php if(empty($blue_cat)){ ?> class="btn yellow " <?php } else { ?> class="btn"  <?php } ?> style="margin-bottom: 2px;">All</a>
<?php
foreach($result1 as $data)
{
$category_id=$data['master_notice_category']['category_id'];
 $cat=$this->requestAction(array('controller' => 'hms', 'action' => 'encode'), array('pass' => array($category_id,'housingmatters')));
$category_name=$data['master_notice_category']['category_name'];
?>
<a href='<?php echo $webroot_path; ?>Notices/notice_publish?con=<?php echo $cat; ?>' rel='tab' <?php if(@$red_cat==$category_id) {  ?> class="btn yellow "<?php } else { ?> class="btn" <?php } ?> style="margin-bottom: 2px;"><?php echo $category_name; ?></a>
<?php } ?>
</div>

<br/><br/>
<div style="background-color:#fff;padding:10px;" class="mobile_responce">
<table class="table table-striped table-bordered" id="sample_1">
<thead>
    <tr>
    <th width="7%"> Sr. No.</th>
    <th width="50%">Subject</th>
    <th>Posted on</th>
	 <th>Valid Till</th>
	 <th>Recipients</th>
    <th ></th>
    </tr>
</thead>
<tbody>
<?php

$i=0;
$current_date=date("d-m-Y");
foreach($result_notice_publish as $data){
		
	$notice_id=$data['notice']['notice_id'];
	$n_subject=$data['notice']['n_subject'];
	$n_message=$data['notice']['n_message'];
	$n_date=$data['notice']['n_date'];
	 $n_expire_date=$data['notice']['n_expire_date'];
	 $n_expire_date= date('d-m-Y',$n_expire_date->sec);
	$visible=$data['notice']['visible'];
	$sub_visible=$data['notice']['sub_visible'];

	$visible_detail='';
	if($visible=="all_users") 
	{
		$visible_show="All Users";
		$visible_detail="All Users";
	}

	if($visible=="role_wise") 
	{
		unset($role_name); 
		$visible_show="Role wise";
		foreach ($sub_visible as $role_id) 
		{
		if($role_id!="resident_family" and $role_id!="resident" ){
			$role_name1=$this->requestAction(array('controller' => 'Fns', 'action' => 'role_name_via_role_id'), array('pass' => array($role_id)));
				if(!empty($role_name1))
				{
				$role_name[]=$role_name1;
				}
			}
		}
		$visible_detail=implode(" , ",$role_name);
	}

	if($visible=="wing_wise"){
		
		unset($wing_name);
		$visible_show="Wing wise";
		foreach ($sub_visible as $wing_id) {
			
			$wing_id=(int)$wing_id;
			$wing_name1="wing-".$this->requestAction(array('controller' => 'Fns', 'action' => 'wing_name_via_wing_id'), array('pass' => array($wing_id)));
				if(!empty($wing_name1)){
					
					$wing_name[]=$wing_name1;
				}
			}
		$visible_detail=implode(" , ",$wing_name);
	}
	if($visible=="group_wise"){
		unset($group_name);
	   $visible_show="Group wise";
		foreach($sub_visible as $group_id) {
			$group_names=$this->requestAction(array('controller' => 'Fns', 'action' => 'fetch_group_name_via_group_id'), array('pass' => array($group_id)));
			 $group_name[]=$group_names;
		}
		$visible_detail=implode(" , ",$group_name);
	}


	if(strtotime($n_expire_date) >= strtotime($current_date)){

			$i++;
			?>
			<tr class="odd gradeX">
				<td><?php echo $i; ?></td>
				<td><?php echo $n_subject; ?></td>
				<td><?php echo $n_date; ?></td>
				 <td><?php echo $n_expire_date; ?></td>
				 <td><a class="tooltips" style="cursor: default;" data-placement="bottom" data-original-title="<?php echo @$visible_detail; ?>"><?php echo $visible_show; ?></a></td>
				<td><a href="<?php echo $webroot_path; ?>Notices/notice_publish_view/<?php echo $notice_id; ?>" rel='tab' class="btn mini yellow tooltips" ><i class="icon-search"></i> <span class="notice_text_mobile">View Notice </span></a>
				<?php if($s_role_id==1)
				{ ?>
				<a href='notice_move_archive/<?php echo $notice_id; ?>' class='btn mini tooltips' data-placement="bottom" data-original-title="Send to Archives " style='background-color:#FFA500;' > <i class=' icon-move'></i></a>
			<?php } ?>
				</td>
				
				
			</tr>
<?php } }  ?> 
</tbody>
</table> 

</div>


<script>
$(document).ready(function() {
	
<?php 
$notice_create=$this->Session->read('create_notice');

if($notice_create==1){ 
 ?>	
		$.gritter.add({
			title: '<i class="icon-bullhorn"></i> Notice',
			text: '<p>Your notice has been created and sent via email to all users selected by you.</p>',
			sticky: false,
			time: '10000',

		});
		
<?php   
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array('notice_create')));
}  ?>

});
</script>










