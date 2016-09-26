<?php 

//$society_name=$society_info[0]["society"]["society_name"];


$filename="Ledger accounts";
$filename = str_replace(' ', '_', $filename);
$filename = str_replace(' ', '-', $filename);
header ("Expires: 0");
header ("border: 1");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );

?>

<center>
<div>
<div>
<b>  Ledger Accounts View </b>
</div>
<div >
<div style="width:100%;">
<table border="1">
<thead>			
<tr>
<th>Sr.No.</th>
<th>Account Category</th>
<th>Accounts Group</th>
<th>Ledger</th>

</tr>        
</thead>
<tbody>
<?php
$n = 1;
foreach ($cursor2 as $collection) 
{
$sub_id = (int)$collection['ledger_account']['group_id'];
$name = $collection['ledger_account']['ledger_name'];
$auto_id5 = (int)$collection['ledger_account']['auto_id'];
$ledger_number=str_pad($auto_id5,3,"0",STR_PAD_LEFT);
@$edit_id = (int)@$collection['ledger_account']['edit_user_id'];
$result_ag = $this->requestAction(array('controller' => 'hms', 'action' => 'accounts_group'),array('pass'=>array($sub_id)));
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
<td id="kk<?php echo $auto_id5; ?>"><?php echo $group_name; ?></td>
<td id="tt<?php echo $auto_id5; ?>"><?php echo $cat_number.$group_number.$ledger_number.': '.$name; ?></td>

</tr>
<?php $n++; } ?> 
</tbody>  
</table>
</div>  
</div> 
</div>      
</center>






