<table class="table table-bordered" style="background-color:white;">
<tr>
<th>Accounts Group</th>
<th>ledger Name</th>
<th>Debit</th>
<th>Credit</th>
<th>Penalty</th>
</tr>
<?php
foreach($accounts_group_dataa as $dataaa)
{
$group_name =$dataaa['accounts_group']['group_name'];
$group_id = (int)$dataaa['accounts_group']['auto_id'];

$result_lsa = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch'),array('pass'=>array($group_id)));  
foreach ($result_lsa as $collection) 
{
$ledger_name = $collection['ledger_account']['ledger_name']; 

 

?>
<tr>
<td><?php echo $group_name; ?></td>
<td><?php echo $ledger_name; ?></td>
<td><input type="text" class="m-wrap small"></td>
<td><input type="text" class="m-wrap small"></td>
<td><input type="text" class="m-wrap small"></td>
</tr>
<?php	
}}
?>

</table>