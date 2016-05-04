<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<center>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_account_coa" class="btn" rel='tab'>Ledger Accounts Add</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_sub_accounts_coa" class="btn" rel='tab'>Ledger Sub Accounts Add</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_accounts_view" class="btn" rel='tab'>Master Ledger  Account View</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_sub_account_view" class="btn yellow" rel='tab'>Master Ledger Sub Account View</a>
</center>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<br />
<center>
<div class="portlet box grey" style="width:100%;">
<div style="background-color:#B2B2B2; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;">
<b style="color:white;">  Ledger Sub Accounts View </b>
</div>
<div class="portlet-body">
<div style="width:100%;">
					<table style="width:100%; background-color:white;" class="table table-bordered" id="sample_2">			
					<thead>
                    <tr>
					<th>Sr.No.</th>
					<th>Account Category</th>
					<th>Accounts Group</th>
					<th>Ledger Account</th>
					<th>Ledger Sub Account</th>
                   	</tr>        
                    </thead>
                    <tbody>
					<?php
					$n = 1; 
					foreach ($cursor2 as $collection) 
					{
					 $ledger_id = (int)$collection['ledger_sub_account']['ledger_id'];
					$deactive = @$collection['ledger_sub_account']['deactive'];
					$name = $collection['ledger_sub_account']['name'];
                    $auto_id = (int)$collection['ledger_sub_account']['auto_id'];
					$ledgersub_number=str_pad($auto_id,4,"0",STR_PAD_LEFT);
					$wing_flat = "";
					$wing_id = "";
                    $flat_id = "";
					$user_id = "";
					if($ledger_id==33){
					$name.=' - '.$collection['ledger_sub_account']['bank_account'];
					}
					if($ledger_id == 34)
					{
						
					
					
					$result_member = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_ledger_sub_account_id'),array('pass'=>array($auto_id)));
						$name=$result_member['user_name'];
						$wing_name=$result_member['wing_name'];
						$flat_name=$result_member['flat_name'];
						$wing_flat=$wing_name.'-'.$flat_name;
					}
  $result_la = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account'),array('pass'=>array($ledger_id)));
					foreach ($result_la as $collection) 
					{
					$group_id = (int)$collection['ledger_account']['group_id'];	
					$ledger_name = $collection['ledger_account']['ledger_name'];
					$ledger_account_id = $collection['ledger_account']['auto_id'];
					$ledger_number=str_pad($ledger_account_id,3,"0",STR_PAD_LEFT);					
					}
					
					
					
					
					
$result_ag = $this->requestAction(array('controller' => 'hms', 'action' => 'accounts_group'),array('pass'=>array($group_id)));
foreach ($result_ag as $collection) 
{
$accounts_id = (int)$collection['accounts_group']['accounts_id'];	
$group_name = $collection['accounts_group']['group_name'];
$group_number = $collection['accounts_group']['number'];
}

$result_ac = $this->requestAction(array('controller' => 'hms', 'action' => 'accounts_category'),array('pass'=>array($accounts_id)));		   
foreach ($result_ac as $collection) 
{
$main_name = $collection['accounts_category']['category_name'];	
$cat_number = $collection['accounts_category']['number'];
} 
?>        
					
<tr>
<td><?php echo $n; ?></td>
<td><?php echo $main_name; ?></td>
<td><?php echo $group_name; ?></td>
<td><?php echo $ledger_name.' ['.$cat_number.$group_number.$ledger_number.']'; ?></td>
<td><?php echo '['.$cat_number.$group_number.$ledger_number.$ledgersub_number.'] '.$name; ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $wing_flat;  ?>  </td>
</tr>           
<?php $n++; $name=''; } ?> 
</tbody>  
</table>
</div> 
</div>
</div>        
</center>

