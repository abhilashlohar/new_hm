<div style="float:right;">
<a class="btn blue hide_at_print"  onclick="window.print();" >Print </a>
</div>
<br/>
<br/>

<div style="background-color:#EFEFEF; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;"><i class="icon-user-md"></i>
             Exited Report For Users
</div>


<div class="tab-content">

<div class="tab-pane active" id="tab_1_2">


<div class="portlet box ">

<div class="portlet-body">
<table class="table table-striped table-bordered" id="">
<thead>
<tr>
<th>Sr No.</th>
<th>Flat</th>
<th>User Name</th>
<th>Exited users Date and Time</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$i=0;
foreach($result_user_flat as $data)
{
$i++;
		$da_user_id=(int)$data['user_flat']['user_id'];
		@$wing_id=(int)@$data['user_flat']['wing'];
		@$flat_id=(int)@$data['user_flat']['flat'];	 
		$exited_date=$data['user_flat']['exited_date'];
		$exited_time=$data['user_flat']['exited_time'];
		$exited_by_user=$data['user_flat']['exited_by_user'];
  
	$resulr_user1=$this->requestAction(array('controller'=>'Fns','action'=>'user_info_via_user_id'), array('pass'=> array($exited_by_user)));
	$exit_by_user_name=$resulr_user1[0]['user']['user_name'];
  $resulr_user=$this->requestAction(array('controller'=>'Fns','action'=>'user_info_via_user_id'), array('pass'=> array($da_user_id)));
  $user_name=$resulr_user[0]['user']['user_name'];
	$flat=$this->requestAction(array('controller'=>'Fns','action'=>'wing_flat_via_wing_id_and_flat_id'), array('pass'=> array($wing_id,$flat_id)));
 
?>
<tr class="odd gradeX" >
<td><?php echo $i; ?></td>
<td><?php echo $flat ; ?> </td>
<td> <?php echo $user_name ; ?> </td>
<td><?php echo @$exited_date ; ?> &nbsp <?php echo @$exited_time ; ?></td>
<td><?php echo $exit_by_user_name; ?></td>
</tr>
<?php  } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>