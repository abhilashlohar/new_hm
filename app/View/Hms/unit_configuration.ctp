<div style="background-color:#EFEFEF; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;">
Society Setup
</div>
<div class="tabbable tabbable-custom">
<ul class="nav nav-tabs">
<li><a href="<?php echo @$webroot_path; ?>Hms/master_sm_wing" rel='tab'> Wing</a></li>
<li><a href="<?php echo $webroot_path; ?>Hms/flat_type" rel='tab'>Unit Number</a></li>
<li class="active"><a href="<?php echo $webroot_path; ?>Hms/unit_configuration" rel='tab'>Unit Configuration</a></li>
<!--<li ><a href="<?php echo $webroot_path; ?>Hms/flat_nu_import" rel='tab'>Flat Number Import</a></li>-->
<li><a href="<?php echo $webroot_path; ?>Hms/society_details" rel='tab'>Society Details</a></li>
<li><a href="<?php echo $webroot_path; ?>Hms/society_settings" rel='tab'>Society Settings</a></li>
</ul>
<div class="tab-content" style="min-height:300px;">
<div class="tab-pane active" id="tab_1_1">
<br>
<table class="table table-striped table-bordered">
<tr>
<th>Wing Name</th>
<th>Flat Name</th>
<th>Flat Type</th>
<th>Flat Area</th>
</tr>
<?php
foreach($cursor2 as $collection)
{
$c++;
$wing_id = (int)$collection['wing']['wing_id'];	
$wing_name = $collection['wing']['wing_name'];	

$result_prb = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_all_flat_via_wing_id'),array('pass'=>array($wing_id)));
foreach ($result_prb as $data) 
{
$flat_name = $data['flat']['flat_name'];	
?>
<tr>
<td><?php echo $wing_name; ?></td>
<td><?php echo $flat_name; ?></td>
<td>
<select class="m-wrap span12">
<option value="">Select Flat Type</option>
<?php
foreach($cursor3 as $dataa)
{
$auto_id = $dataa['flat_type_name']['auto_id'];	
$flat_name = $dataa['flat_type_name']['flat_name'];
?>
<option value="<?php echo $auto_id; ?>"><?php echo $flat_name; ?></option>
<?php	
}
?>
</select>
</td>
<td><input type="text" class="m-wrap span12"></td>
</tr>
<?php }}?>
</table>
</div>
</div>
</div>