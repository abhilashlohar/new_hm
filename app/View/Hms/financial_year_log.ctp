<div style="float:right;">
<a class="btn blue hide_at_print"  onclick="window.print();" >Print </a>
</div>
<br/>
<br/>

<div style="background-color:#EFEFEF; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;"><i class="fa fa-foursquare"></i>
            Financial year log details
</div>


<div class="tab-content">

<div class="tab-pane active" id="tab_1_2">


<div class="portlet box ">

<div class="portlet-body">
<table class="table table-striped table-bordered" id="">
<thead>
<tr>
<th>Sr No.</th>
<th>Period</th>
<th>Status</th>
<th>Updated by</th>
<th>Financial year details Date and Time</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
foreach($result_financial_year_log as $data){
$i++;
$from=$data['financial_year_log']['from'];
$to=$data['financial_year_log']['to'];	
$status=$data['financial_year_log']['status'];
$update_by=$data['financial_year_log']['update_by'];
$date=$data['financial_year_log']['date'];
$time=$data['financial_year_log']['time'];
	$from_date=date('Y-m-d',($from));
	$to_date=date('Y-m-d',($to));
	$from_date_for_view=date('d-m-Y',strtotime($from_date));
	$to_date_for_view=date('d-m-Y',strtotime($to_date));
	$resulr_user=$this->requestAction(array('controller'=>'Fns','action'=>'user_info_via_user_id'), array('pass'=> array($update_by)));
	$update_by_name=$resulr_user[0]['user']['user_name'];
	if($status==2){
		$status_name='<span class="label label-important">Closed</span>';
	}else{
		$status_name='<span class="label label-success">Opened</span>';
	}
 ?>

<tr class="odd gradeX" >
<td><?php echo $i; ?></td>
<td><?php echo $from_date_for_view; ?> - <?php echo $to_date_for_view; ?> </td>
<td><?php echo $status_name; ?></td>
<td> <?php echo $update_by_name ; ?> </td>
<td><?php echo @$date ; ?> &nbsp <?php echo @$time ; ?></td>
</tr>
 <?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>