<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu'), array('pass' => array()));
?>				   
<script>
$(document).ready(function() {
$("#fix<?php echo $id_current_page; ?>").removeClass("blue");
$("#fix<?php echo $id_current_page; ?>").addClass("red");
});
</script>


<table class="table table-bordered">
<tr>
<th>Accounts Category</th>
<th>Accounts Group</th>
<th>Ledger Account</th>
</tr>
<?php 

foreach($result_accounts_category as $data)
{
$accounts_id = (int)$data['accounts_category']['auto_id'];	
$accounts_name = $data['accounts_category']['category_name'];
$aaa=0;
$eee=0;
$result_group = $this->requestAction(array('controller' => 'hms', 'action' => 'accounts_group_via_accounts_id'),array('pass'=>array($accounts_id)));
foreach ($result_group as $dataa) 
{
$aaa++;
}
$bbb=0;
$result_group = $this->requestAction(array('controller' => 'hms', 'action' => 'accounts_group_via_accounts_id'),array('pass'=>array($accounts_id)));
foreach ($result_group as $dataa) 
{
$bbb++;
$group_id = (int)$dataa['accounts_group']['auto_id'];	
$group_name = $dataa['accounts_group']['group_name'];	

$ccc=0;
$result_ledger = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_via_group_id'),array('pass'=>array($group_id)));
foreach ($result_ledger as $dataaa) 
{
$ccc++;
$eee++;
}

$ddd=0;
$result_ledger = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_via_group_id'),array('pass'=>array($group_id)));
foreach ($result_ledger as $dataaa) 
{
$ddd++;
$bbb++;
$accounts_id = (int)$dataaa['ledger_account']['auto_id'];	
$ledger_name = $dataaa['ledger_account']['ledger_name'];

	
?>
<tr>
<?php //if($bbb == 1){ ?>
<td rowspan="<?php //echo $eee; ?>"><?php echo $accounts_name; ?></td><?php //} ?>
<?php if($ddd == 1){ ?>
<td rowspan="<?php echo $ccc; ?>"><?php echo $group_name; ?></td><?php } ?>
<td><?php echo $ledger_name; ?></td>
</tr>
<?php }}} ?>

</table>

<?php echo $eee; ?>










