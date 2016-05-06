<?php

$filename=$society_name.'_Tenant_List';
$filename = str_replace(' ', '_', $filename);
$filename = str_replace(' ', '-', $filename);

@header("Expires: 0");
@header("border: 1");
@header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
@header("Cache-Control: no-cache, must-revalidate");
@header("Pragma: no-cache");
@header("Content-type: application/vnd.ms-excel");
@header("Content-Disposition: attachment; filename=".$filename.".xls");
@header("Content-Description: Generated Report");

?>

<table class="table table-striped table-bordered" border="1">
            <thead>
            <tr >
            <th>#</th>
            <th>Name</th>
			<th>Flat</th>
            <th>Mobile</th>
			 <th>Email</th>
            <th>Start date</th>
             <th>End date</th>
			  <th>Agreement Copy</th>
            <th>Police NOC</th>
            <th>Remarks</th>
             <th>Permanent Address</th>
			
            </tr>
            </thead>
   <tbody>
          
            <?php
			$i=0;
           
     foreach ($user_tenant as $collection){
			$i++;
            $name=$collection['tenant']['name'];
			$d_user_id=(int)$collection['tenant']['user_id'];
            $mobile=$collection['tenant']['t_mobile'];
            $t_address=@$collection['tenant']['t_address'];
            $t_agreement=@$collection['tenant']['t_agreement'];
			$t_police=@$collection['tenant']['t_police'];
            $verification=@$collection['tenant']['verification'];
            $t_start_date=@$collection['tenant']['t_start_date'];
            $t_end_date=@$collection['tenant']['t_end_date'];
			$t_file=@$collection['tenant']['t_file'];
				if($t_agreement==1){
					$t_agreement='Yes';
				}
				else{
					$t_agreement='No';
				
				}
			
				if($t_police==1){
					$t_police='Yes';
				}
				else{
					$t_police='No';
				
				}
					$result_user = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array($d_user_id)));
					
					$user_name=$result_user['user_name'];
					$wing_flat_result=$result_user['wing_flat'];
						foreach($wing_flat_result as $data){
							 $wing_flat= $data;
						}
					$email=$result_user['email'];
					$mobile=$result_user['mobile'];


            ?>
             <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $name; ?></td>
			 <td><?php echo $wing_flat; ?></td>
            <td><?php echo $mobile; ?></td>
			 <td><?php echo $email; ?></td>
            <td><?php echo $t_start_date; ?></td>
            <td><?php echo $t_end_date; ?></td>
			 <td><?php echo $t_agreement; ?></td> 
			  <td><?php echo $t_police; ?></td>
            <td class="hidden-phone"><?php echo $verification; ?></td>
             <td width="20%"><?php echo $t_address; ?></td>
			
            </tr> <?php } ?>
    </tbody>
</table>
           