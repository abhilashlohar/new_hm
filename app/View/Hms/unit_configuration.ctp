<?php
foreach($cursor11 as $dataaaa)
{
$vallll = (int)@$dataaaa['society']['area_scale'];
}
?>



<style>
input,select{
	    margin-bottom: 0 !important;
}
</style>
<div style="background-color:#EFEFEF; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;">
Society Setup
</div>
<div class="tabbable tabbable-custom">
<ul class="nav nav-tabs">
<li><a href="<?php echo @$webroot_path; ?>Hms/master_sm_wing" rel='tab'> Wing</a></li>
<li><a href="<?php echo $webroot_path; ?>Hms/flat_type" rel='tab'>Unit Number</a></li>
<li class="active"><a href="<?php echo $webroot_path; ?>Hms/unit_configuration" rel='tab'>Unit Configuration</a></li>
<li><a href="<?php echo $webroot_path; ?>Hms/society_details" rel='tab'>Society Details</a></li>
<li><a href="<?php echo $webroot_path; ?>Hms/society_settings" rel='tab'>Society Settings</a></li>
</ul>

<div class="tab-content" style="min-height:300px;">
<div class="tab-pane active" id="tab_1_1">
Every change you make is automatically saved.<br>

<a href="<?php echo @$webroot_path; ?>Hms/unit_configuration_import" class="btn purple" style="float:right; margin-right:8px;"><i class="fa fa-database"></i> Import csv</a>
<a href="<?php echo @$webroot_path; ?>Hms/unit_configuration_excel" class="btn blue" style="float:right; margin-right:8px;">Excel</a>
<p id="msg" style="height:20px;"></p>

<table class="table table-bordered table-condensed">
	<tr>
		<th>Wing </th>
		<th>Unit </th>
		<th>Flat Type</th>
		<th>Flat Area  <a onclick="area_type()" class="btn mini blue">Area Type</a></th>
	</tr>
<?php $c=0;
foreach($cursor2 as $collection)
{
$c++;
$wing_id = (int)$collection['wing']['wing_id'];	
$wing_name = $collection['wing']['wing_name'];	

$result_prb = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_all_flat_via_wing_id'),array('pass'=>array($wing_id)));
foreach ($result_prb as $data) 
{
$flat_name = $data['flat']['flat_name'];
$flat_id = $data['flat']['flat_id'];
@$flat_area = (int)$data['flat']['flat_area'];
@$flat_type_id = (int)$data['flat']['flat_type_id'];

$flat_name = ltrim($flat_name,0);	
?>
<tr>
<td><?php echo $wing_name; ?></td>
<td><?php echo $flat_name; ?></td>
<td>
<select class="m-wrap span6"  record_id="<?php echo $flat_id; ?>" field="flat_type">
<option value="">Select Flat Type</option>
<?php
foreach($cursor3 as $dataa)
{
$auto_id = (int)$dataa['flat_type_name']['auto_id'];	
$flat_name = $dataa['flat_type_name']['flat_name'];

?>
<option value="<?php echo $auto_id; ?>" <?php if($auto_id == $flat_type_id){ ?> selected="selected" <?php } ?>><?php echo $flat_name; ?></option>
<?php	
}
?>
</select>
</td>
<td><input type="text" class="m-wrap span6" record_id="<?php echo $flat_id; ?>" field="flat_area" value="<?php echo $flat_area; ?>"></td>
</tr>
<?php }} ?>
</table>
</div>
</div>
</div>

<script>
$( document ).ready(function() {
	$( 'input[type="text"]').blur(function() {
		var record_id=$(this).attr("record_id");
		var field=$(this).attr("field");
		var value=$(this).val();
		$("#msg").html("Saving Changes....");
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/auto_save_unit_config/"+record_id+"/"+field+"/"+value,
		}).done(function(response){
				if(response=="F"){
			$("#msg").html("");
			}else{
				
			}
		});
	});
	
	$( 'select' ).change(function() {
		var record_id=$(this).attr("record_id");
		var field=$(this).attr("field");
		var value=$("option:selected",this).val();
		$("#msg").html("Saving Changes....");
		$.ajax({
			url: "<?php echo $webroot_path; ?>Hms/auto_save_unit_config/"+record_id+"/"+field+"/"+value,
		}).done(function(response){
			if(response=="F"){
				$("#msg").html("");
			}else{
				
			}
		});
	});
});
</script>

<script>
function area_type()
{
$("#pppupp").show();
}

function area_type2()
{
$("#pppupp").hide();
}
</script>

<div id="pppupp" class="hide">
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<form method="post">
<div class="modal-body">
<center>
<select name="arra_typpp" class="m-wrap medium">
<option value="0" <?php if($vallll == 0) { ?> selected="selected" <?php } ?>>Per Square Feet</option>
<option value="1" <?php if($vallll == 1) { ?> selected="selected" <?php } ?> >Per Square Meter</option>
</select>
</center>
</div>
<div class="modal-footer">
<a class="btn" onclick="area_type2()">Cancel</a>
<button type="submit" class="btn green" name="sssbbb">Submit</button>
</form>
</div>
</div>
</div> 











