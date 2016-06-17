<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
           
<table  align="center" border="1" bordercolor="#FFFFFF" cellpadding="0">
<tr>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/select_income_heads" class="btn" rel='tab'>Selection of Income Heads</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_rate_card" class="btn" style="font-size:16px;" rel='tab'>Rate Card</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_noc" class="btn" style="font-size:16px;" rel='tab'>Non Occupancy Charges</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_penalty" class="btn yellow" style="font-size:16px;" rel='tab'>Penalty Option</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/neft_add" class="btn" style="font-size:16px;" rel='tab'>Add NEFT</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_setup" class="btn" style="font-size:16px;" rel='tab'>Remarks</a>
</td>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/other_charges" class="btn" rel='tab'>Other Charges</a>
</td>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/map_other_members" class="btn" rel='tab'>Bill(s) Maping</a></td>
</tr>
</table> 

<form method="post" id="contact-form">
<center>
<div id="output"><span class="label label-important">NOTE</span><span> No need to save this form. The system will automatically save updated data. </span></div>
<div style="width:60%; border:solid 1px #F00; background-color:white;">

<h4 style="color:red;"><b>Penalty Option</b></h4>
<h5 style="color:red"><b>Enter Penalty in Percentage</b></h5>
<table border="0">
<tr>
<td colspan="2"><!--
<label class="radio">
<div class="radio" id="uniform-undefined"><span><input type="radio" name="type" value="1" style="opacity: 0;" id="type" <?php //if($tax_type == 1) { ?> checked="checked" <?php //} ?>></span></div>
From Due Date
</label>


<label class="radio">
<div class="radio" id="uniform-undefined"><span><input type="radio" name="type" value="2" style="opacity: 0;" id="type" <?php //if($tax_type == 2) { ?> checked="checked" <?php //} ?>></span></div>
From First day
</label>
<label id="type"></label>
<br />-->
<input type="hidden" value="1" name="type" />
</td>
</tr>
<tr>
<td>Percentage in Number:</td>
<td>
<div class="input-append">
   <input type="text" name="tax" class="m-wrap span4" style="background-color:white !important;" id="tax" value="<?php echo $tax; ?>"/><button class="btn" type="button">%</button>
</div>
</td>
</tr>
<tr>
<td colspan="2">
<label id="tax"></label>
</td>
</tr>
</table><!--
<div style="">
<button class="btn green" name="sub" >Update</button>
</div>-->
<br />
</div>
</center>
</form>

<script>
$('input[name="tax"]').die().live("keyup",function(){
	var tax=$(this).val();
	if($.isNumeric(tax)){
	}else{
		$(this).val('');	
	}
});
</script>

<script>
$(document).ready(function(){
	$("input").bind("blur keyup",function(){
		var penalty=$(this).val();
			$("#output").html("Saving changes...");
			$.ajax({
				url: "<?php echo $webroot_path; ?>Incometrackers/auto_save_penalty/"+penalty,
			}).done(function(response){
				$("#output").html("<span class='label label-important'>NOTE</span><span> No need to save this form. The system will automatically save updated data. </span>");
			});
		
		
	});
});

</script>














