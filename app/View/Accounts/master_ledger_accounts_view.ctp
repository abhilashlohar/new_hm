<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<center>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_account_coa" class="btn" rel='tab'>Ledger Accounts Add</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_sub_accounts_coa" class="btn" rel='tab'>Ledger Sub Accounts Add</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_accounts_view" class="btn yellow" rel='tab'>Master Ledger  Account View</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_sub_account_view" class="btn" rel='tab'>Master Ledger Sub Account View</a>
</center>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<br /> <a href="master_ledger_accounts_view_excel" class="btn green mini tooltips pull-right" data-placement="left" data-original-title="Download in excel"><i class="fa fa-file-excel-o"></i></a>
<center> 
<div class="portlet box grey" style="width:100%;">

<div style="background-color:#B2B2B2; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;">
<b style="color:white;">  Ledger Accounts View </b>
</div>
<div class="portlet-body">
<div style="width:100%;">
<table style="width:100%; background-color:white;" class="table table-bordered" id="sample_1">
<thead>			
<tr>
<th>Sr.No.</th>
<th>Account Category</th>
<th>Accounts Group</th>
<th>Ledger</th>
<th>Edit</th>
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
<td> 
<?php if($edit_id == $s_user_id)
{
?>
<a href="#" role='button' edit_id="<?php echo $auto_id5; ?>" class="btn mini blue edit_ledger"><i class="icon-pencil"></i> Edit</a>
<?php  } ?>
</td>
</tr>
<?php $n++; } ?> 
</tbody>  
</table>
</div>  
</div> 
</div>      
</center>

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<script>
$(document).ready(function() {

$("#close_edit").live('click',function(){
$(".edit_div").hide();
});	 



$(".edit_ledger").live('click',function(){
    
	 $(".edit_div").show();
     var t_id=$(this).attr("edit_id");

  $("#tems_edit_content").html('<div align="center" style="padding:20px;"><img src="<?php echo $this->webroot ; ?>/as/indicator_blue_small.gif" /><br/><h5>Please Wait</h5></div>').load('<?php echo $this->webroot; ?>Accounts/ledger_edit?t_id='+t_id+'&edit=0');
});	 


$(".save_edited_terms").live('click',function(){
	
		var t_id=$(this).attr("tems_id");
		 
		var ledger1=$("#ledger").val();
		var ledger2=encodeURIComponent(ledger1);
		$("#tt"+t_id).html(ledger1);
			
		$("#tems_edit_content").load('<?php echo $this->webroot; ?>Accounts/ledger_edit?t_id='+t_id+'&led='+ledger2+'&edit=1', function() {
			
		});
			
		
		
	 });












});
</script>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////// ?>

<div class="edit_div"  style="display:none;">
<div class="modal-backdrop fade in"></div>
<div class="modal"  id="tems_edit_content">
	
</div>
</div>





