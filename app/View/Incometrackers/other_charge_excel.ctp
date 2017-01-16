<?php

$filename='other_charge';

@header("Expires: 0");
@header("border: 1");
@header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
@header("Cache-Control: no-cache, must-revalidate");
@header("Pragma: no-cache");
@header("Content-type: application/vnd.ms-excel");
@header("Content-Disposition: attachment; filename=".$filename.".xls");
@header("Content-Description: Generated Report");

$result1 = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch'),array('pass'=>array(7)));			
foreach($result1 as $collection)
{
$ac_name = $collection['ledger_account']['ledger_name'];
$ac_id = (int)$collection['ledger_account']['auto_id'];		
if($ac_id != 43 && $ac_id != 39 && $ac_id != 40)
{
$income_head_arr1[] = (int)$ac_id;	
}
}
foreach($cursor3 as $collection)
{
$income_head_selected_arr = @$collection['society']['income_head'];
}
if(!empty($income_head_selected_arr))
{
@$income_head_arr2 = array_diff($income_head_arr1,$income_head_selected_arr);
}
else
{
$income_head_arr2 = $income_head_arr1;	
}
foreach($income_head_arr2 as $data)
{
$income_arrr[] = $data;
}
?>

		
		<table border="1" >
		<thead>
		<tr>
		<td>Unit</td>
		<td>Name</td>
		<td>Income head</td>
		<td>Amount </td>
		<td>Charge Type </td>
		</tr>
		</thead>
		
				<tbody>
				<?php  
								if(!empty($flats_for_bill)) { $sr_no=0; foreach($flats_for_bill as $flat){ $sr_no++;
				
				
								//wing_id via flat_id//
								$result_flat_info=$this->requestAction(array('controller' => 'Hms', 'action' => 'fetch_wing_id_via_flat_id'),array('pass'=>array($flat)));
								foreach($result_flat_info as $flat_info){
								$wing=$flat_info["flat"]["wing_id"];
								} 

								
								
					$ledger_sub_account_id=$this->requestAction(array('controller' => 'Fns', 'action' => 'ledger_sub_account_id_via_wing_id_and_flat_id'),array('pass'=>array($wing,$flat)));
				
				$result_user_flat=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_flat_info_via_wing_flat_id'),array('pass'=>array($wing,$flat)));
				foreach($result_user_flat as $data)
				{
				$user_id = $data['user_flat']['user_id'];
				}

								
								$result_user_info=$this->requestAction(array('controller' => 'Fns', 'action' => 'user_info_via_user_id'),array('pass'=>array($user_id)));
								foreach($result_user_info as $user_info){
								$user_id=(int)$user_info["user"]["user_id"];
								$user_name=$user_info["user"]["user_name"];
								} 
									
					    if(!empty($flat)){
						$wing_flat=$this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat'), array('pass' => array($wing,$flat))); 
						
						$result_other_charges = $this->requestAction(array('controller' => 'Incometrackers', 'action' => 'fetch_other_charges_via_ledger_sub_account_id'),array('pass'=>array($ledger_sub_account_id))); 
						if(sizeof($result_other_charges)>0){
						?>
						  
							
							<?php 
							if(sizeof($result_other_charges)>0){
									
										
								foreach($result_other_charges as $other_charges){ 
								 
							 $amount2=$other_charges['other_charge']['amount'];
							 $type=$other_charges['other_charge']['charge_type'];
							 $income_head_id=$other_charges['other_charge']['income_head_id'];
							$result_income_head = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($income_head_id)));	
							foreach($result_income_head as $data2){
										$income_head_name = $data2['ledger_account']['ledger_name'];
									} ?>
								<tr>
									
									<td><?php echo $wing_flat; ?></td>
									<td><?php echo $user_name; ?></td>
									<td><?php echo $income_head_name; ?></td>
									<td><?php echo $amount2; ?> </td> 
									<td>
										<?php if($type ==1){ ?> One Time/Lumpsum <?php }else if($type ==2){ ?> Periodic <?php } ?>
											
										</td>
								</tr>
										
								<?php } ?>
							<?php } ?>
							
								
							
				<?php } } } }?>
				</tbody>
			</table>
			
	