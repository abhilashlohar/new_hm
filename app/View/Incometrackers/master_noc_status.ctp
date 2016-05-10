<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
           
<table  align="center" border="1" bordercolor="#FFFFFF" cellpadding="0">
<tr>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/select_income_heads" class="btn" rel='tab'>Selection of Income Heads</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_rate_card" class="btn" style="font-size:16px;" rel='tab'>Rate Card</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_noc" class="btn yellow" style="font-size:16px;" rel='tab'>Non Occupancy Charges</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_penalty" class="btn" style="font-size:16px;" rel='tab'>Penalty Option</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/neft_add" class="btn" style="font-size:16px;" rel='tab'>Add NEFT</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_setup" class="btn" style="font-size:16px;" rel='tab'>Remarks</a>
</td>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/other_charges" class="btn" rel='tab'>Other Charges</a>
</td>
</tr>
</table> 

<div align="center">
<a href="master_noc" class='btn blue' role="button" rel='tab'>Non Occupancy Charges</a>
<a href="master_noc_status" class='btn red' role="button"  rel='tab'>Non Occupancy Status</a>
</div>
<br/>
<div align="right">
<?php 
$z=0;$j=0;

?>
<div id="new_update">
<span class="label label-info"> Number of Self Occupied flats <span style="font-size:15px;"><?php echo $result_count_flat_self; ?> </span> </span> 
<span class="label label-info"> Number of Leased flats <span style="font-size:15px;"><?php echo $result_count_flat_les; ?> </span></span> </div>
</div>
<form method="post">

<div style="background-color: #fff;">
<br/>
 <span><span class="label label-important">NOTE</span><span> No need to save this form. The system will automatically save updated data. </span></span>
<table class="table table-striped table-bordered dataTable" id="" aria-describedby="sample_1_info" >
<thead>
<tr>
<th>Sr.n.</th>

<th >Unit</th>
<th>NOC Type
 &nbsp; 
<label class="radio"><input type="radio"  name="" class="all_chk" value="1" ><span style="font-size:12px;">Select All (Self Occupied)</span></label>
<label class="radio"><input type="radio"  name="" class="all_chk"  value="2" ><span style="font-size:12px;">Select All (Leased)</span></label>
	</th>
</tr>
</thead>
<tbody>
<?php 

$i=0;

foreach($result_wing as $data){

	$wing_id = (int)$data['wing']['wing_id'];	
	$wing_name = $data['wing']['wing_name'];	
	$result_flat = $this->requestAction(array('controller' => 'hms', 'action' => 'fetch_all_flat_via_wing_id'),array('pass'=>array($wing_id)));
	foreach($result_flat as $data2){
		$i++;
		$flat_name = $data2['flat']['flat_name'];
		$flat_id = (int)$data2['flat']['flat_id'];
		$noc_ch_tp = (int)$data2['flat']['noc_ch_tp'];
		$wing_flat = $this->requestAction(array('controller' => 'hms', 'action' => 'wing_flat'),array('pass'=>array($wing_id,$flat_id)));
	?>
	<tr>
	<td><?php echo $i ; ?></td>
	
	<td><?php echo $wing_flat ; ?></td>
	
	<td>
	<div class="controls" id="residing_div1">
	<label class="radio"><input type="radio" class="self_occ noc_updat" name="<?php echo $flat_id;?>" update="<?php echo $flat_id;?>" value="1" <?php if($noc_ch_tp==1){?>checked <?php } ?>>Self Occupied</label>
	<label class="radio"><input type="radio" class="leas noc_updat"  name="<?php echo $flat_id;?>" update="<?php echo $flat_id;?>"  value="2" <?php if($noc_ch_tp==2){?>checked <?php } ?>>Leased</label>
	</div>
	</td>
	</tr>
	<?php
	} 	
}	
	

?>
</tbody>
</table>
</div>
	
</form>

<script>
$(document).ready(function(){
	var x='';
	$.ajax({
			url: "<?php echo $webroot_path; ?>Incometrackers/master_noc_status_update_ajax_all/"+x,
		     }).done(function(response){
			$('#new_update').html(response);
		});	
	
	
	$('input[type="radio"].noc_updat').click(function() {
		var value=$(this).val();
		var flat_id=$(this).attr('update');	
		$.ajax({
				url: "<?php echo $webroot_path; ?>Incometrackers/master_noc_status_update_ajax/"+value+"/"+flat_id,
			}).done(function(response){
			$('#new_update').html(response);	
		});	

});

$(".all_chk").bind("click",function(){
var r=$(this).val();

if(r==1)
{
$(".self_occ").attr('checked','checked');
$(".self_occ").parent('span').addClass('checked');

$(".leas").parent('span').removeClass('checked');
$(".leas").removeAttr('checked','checked');

		$.ajax({
			url: "<?php echo $webroot_path; ?>Incometrackers/master_noc_status_update_ajax_all/"+r,
		     }).done(function(response){
			$('#new_update').html(response);
		});	

}
else
{
$(".leas").attr('checked','checked');
$(".leas").parent('span').addClass('checked');

$(".self_occ").parent('span').removeClass('checked');
$(".self_occ").removeAttr('checked','checked');
		$.ajax({
				url: "<?php echo $webroot_path; ?>Incometrackers/master_noc_status_update_ajax_all/"+r,
			}).done(function(response){
			$('#new_update').html(response);	
		});	
}
});


});
</script>