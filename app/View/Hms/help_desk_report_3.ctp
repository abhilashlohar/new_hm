<?php 
function check_in_range($d1, $d2, $help_desk_date)
	{
	  // Convert to timestamp
	  $d1 = strtotime($d1);
	  $d2 = strtotime($d2);
	  $help_desk_date = strtotime($help_desk_date);

	  // Check that user date is between start & end
	  return (($help_desk_date >= $d1) && ($help_desk_date <= $d2));
	}
	
foreach ($result_help_desk_report1 as $collection) 
{
 $help_desk_date=$collection['help_desk']['help_desk_date'];
 $help_desk_date=date("Y-m-d",strtotime(date("d-m-Y",strtotime($help_desk_date))));
	
	if(check_in_range($d1, $d2, $help_desk_date)==1)
	{
	 $help_desk_result[]=(int)$collection['help_desk']['user_id'];
	}
}
 
if(sizeof(@$help_desk_result)==0){ $help_desk_result=array(); };
$c= array_count_values($help_desk_result); 
@$val_max = array_search(max($c), $c);
@$val_min = array_search(min($c), $c);


$result_user_info_max=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($val_max)));


$user_name_max=$result_user_info_max["user_name"]; 
$wing_flat_result=$result_user_info_max["wing_flat"]; 
foreach($wing_flat_result as $data){
	$flat_info_max=$data;
}


$result_user_info_min=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($val_min)));

$user_name_min=$result_user_info_min["user_name"]; 
$wing_flat_result=$result_user_info_min["wing_flat"]; 
foreach($wing_flat_result as $data){
	$flat_info_min=$data;
}

?>
<br/>
<div style="background-color:#fff;padding:20px;">
<span style="font-size:18px;">Maximum Tickets received from: <?php echo @$user_name_max.' '.$flat_info_max; ?> (<?php echo @$c[$val_max]; ?> tickets) </span>
<br/><br/>
<span style="font-size:18px;">Minimum Tickets received from: <?php echo @$user_name_min.' '.$flat_info_min; ?> (<?php echo @$c[$val_min]; ?> tickets) </span>
</div>
