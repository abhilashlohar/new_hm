<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

<center>
<a href="<?php echo $webroot_path; ?>Accounts/master_financial_period_status" class="btn yellow" rel='tab'>Financial Year Status</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_financial_year" class="btn" rel='tab'>Open New Year</a>
</center>
<br />
<form method="post">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block"><i class="icon-reorder"></i>Financial Year Status</h4>
</div>
<div class="portlet-body form">
<center>
<table class="table table-bordered" style="width:80%; background-color:white;">
<tr style="background-color:#CAFCC9;">
<th style="text-align:center;"><p style="font-size:18px;">#</p></th>
<th style="text-align:center;"><p style="font-size:18px;">Period</p></th>
<th style="text-align:center;"><p style="font-size:18px;">Status</p></th>
<th style="text-align:center;"><p style="font-size:18px;">Edit/Change</p></th>
</tr>
<?php 
$n = 0;

foreach($cursor1 as $collection){
	$n++;
	$auto_id = (int)$collection['financial_year']['auto_id'];
	$from = $collection['financial_year']['from'];
	$to = $collection['financial_year']['to'];
	$from_date=date('Y-m-d',($from));
	$to_date=date('Y-m-d',($to));
	$from_date_for_view=date('d-m-Y',strtotime($from_date));
	$to_date_for_view=date('d-m-Y',strtotime($to_date));
	$status = (int)$collection['financial_year']['status'];
	$society_id = (int)$collection['financial_year']['society_id'];
?>
<tr>
<td style="text-align:center;"><p style="font-size:18px;"><?php echo $n; ?></p></td>
<td style="text-align:center;"><p style="font-size:18px;"><?php echo $from_date_for_view; ?> - <?php echo $to_date_for_view; ?></p></td>
<td style="text-align:center;"> <?php if($status == 2) { ?>
<span class="label label-important">Closed</span>
<?php } else { ?>
<span class="label label-success">Opened</span>
<?php } ?>
</td>
<td style="text-align:center;"> 

 
                            
                              <div class="controls">
                                 <div class="basic-toggle-button check_on " update_id="<?php echo $auto_id; ?>">
                                    <input type="checkbox" class="toggle " 
									<?php if($status == 1) { ?>
									checked="checked" <?php } ?> value="2" name="abc<?php echo $auto_id; ?>"/>
                                 </div>
                              </div>
                           
                               






</td>
</tr>
<?php } ?>
<tr>
</table>
</center>
<br>


</div>
</div>
</form>

	

<div id="delete_topic_result" style="display: none;" >
<div class="modal-backdrop fade in"></div>
<div class="modal"  id="profile_edit_content">

</div>
</div>

<script>
$(document).ready(function() {
	
	$('#new_email').live("cut copy paste",function(e) { 
	  e.preventDefault();
	});
	
$(".check_on").die().live("click",function() {
	var id=$(this).attr("update_id");
	var z=$(this).find('input:checked').val();
	$('#delete_topic_result').show();
	$('#profile_edit_content').html('<div class="modal-header"><h4 id="myModalLabel1">Verification</h4></div><div class="modal-body"><div class="control-group" ><label class="control-label" >  Please type CONFIRM in box below </label><div class="controls"><input class="m-wrap "  id="new_email"  type="text" value=""></div><div id="validation_email" style="color:red;"></div></div><div class="control-group"  id="otp_code_email"></div></div><div class="modal-footer"><button class="btn" id="close_edit">Close</button><button class="btn blue save_email" update_id="'+id+'" status_id="'+z+'"  >Save</button></div>');
	
});

$(".save_email").die().live("click",function() {
	var id=$(this).attr("update_id");
	var status=$(this).attr("status_id");
	var str=$("#new_email").val(); 
		if(str==""){
			$("#otp_code_email").html('<span style="color:red;">Please type CONFIRM</span>');
		}else{
			$("#otp_code_email").html('');
			
			if(str=="CONFIRM"){
				if(status==2){
					status=1;
				}else{
					status=2;
				}
				 $.ajax({
					url: "<?php echo $webroot_path; ?>/Accounts/master_financial_period_status_update/"+id+"/"+status,
					}).done(function(response) {
					
					window.location.href="master_financial_period_status";
				});		
				
				
			}else{
				$("#otp_code_email").html('<span style="color:red;">You have enter wrong string.</span>');
				
			}
			
		}
	//alert(status); alert(id);
});

$("#close_edit").live('click',function(){
		window.location.href="master_financial_period_status";
	});
	
<?php	
$status5=(int)$this->Session->read('ffyyyy');
if($status5==1)
{
?>
$.gritter.add({
title: 'Success',
text: '<p>The Financial year added successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(3104)));
} ?>
});
</script> 


<script>
$(document).ready(function() {
<?php	
$financial_status=(int)$this->Session->read('financial_status');
if($financial_status==1)
{
?>
$.gritter.add({
title: 'Success',
text: '<p>The Financial year Updated successfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array('financial_status')));
} ?>
});
</script> 










