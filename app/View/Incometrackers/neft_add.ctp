<div class="hide_at_print">
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   
</div>
<?php
	foreach($cursor1 as $collection){
		 $type = @$collection['society']['neft_type'];
			$neft_detail = @$collection['society']['neft_detail'];
	}
if($type == "ALL"){
	$account_name = $neft_detail['account_name'];	
		$bank_name = $neft_detail['bank_name'];
			$account_number = $neft_detail['account_number'];
				$branch = $neft_detail['branch'];
					$ifsc_code = $neft_detail['ifsc_code'];	
}
else
{
	$account_name = "";
		$bank_name = "";
			$account_number = "";
				$branch = "";
					$ifsc_code = "";	
}
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
<a href="<?php echo $webroot_path; ?>Incometrackers/it_penalty" class="btn" style="font-size:16px;" rel='tab'>Penalty Option</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/neft_add" class="btn yellow" style="font-size:16px;" rel='tab'>Add NEFT</a>
</td>
<td>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_setup" class="btn" style="font-size:16px;" rel='tab'>Remarks</a>
</td>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/other_charges" class="btn" rel='tab'>Other Charges</a>
</td>
<td><a href="<?php echo $webroot_path; ?>Incometrackers/map_other_members" class="btn" rel='tab'>Advance</a></td>
</tr>
</table> 

<form method="post" id="contact-form">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Post NEFT Detail</h4>
</div>
<div class="portlet-body form">
<div class="row-fluid">                     
<div class="span6">                      
<!--
<label  style="font-size:14px;">NEFT Detail For<span style="color:red;">*</span> </label>
<div class="controls">
<label class="radio">
<div class="radio" id="uniform-undefined"><span><input type="radio" name="neft_for" value="ALL" style="opacity: 0;" onclick="all_wing()" checked="checked"></span></div>
All
</label>
<label class="radio">
<div class="radio" id="uniform-undefined"><span><input type="radio" name="neft_for" value="WW" style="opacity: 0;" onclick="wing_wise()"></span></div>
Wing Wise
</label>
</div>
<br />-->
<input type="hidden" value="ALL" name="neft_for">
<div id="show1">
<label style="font-size:14px;">Account Name<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span9" name="acno" id="acno" value="<?php echo $account_name; ?>">
<label id="acno"></label>
</div>
<br />

<label style="font-size:14px;">Bank Name<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span9" name="bank_name" id="bnk" value="<?php echo $bank_name; ?>"/>
<label id="bnk"></label>
</div>
<br />
</div>













 
</div>
<div class="span6">

<div id="show_wing" class="hide">
<label  style="font-size:14px;">Select Wing<span style="color:red;">*</span> </label>
<div class="controls">
<select name="select_wing" class="large m-wrap chosen" id="wwww">
<option value="" style="display:none;">Select Wing</option>
<label  style="font-size:14px;">NEFT Detail For<span style="color:red;">*</span> </label>
<?php
foreach($cursor5 as $data)
{
$wing_name = $data['wing']['wing_name'];
$wing_id = (int)$data['wing']['wing_id'];	
?>
<option value="<?php echo $wing_id; ?>"><?php echo $wing_name; ?></option>
<?php	
}
?>
</select>
</div>
<br />
</div>



<div id="show2">
<label style="font-size:14px;">Account Number<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" name="acnu" class="m-wrap span9" id="acn" value="<?php echo $account_number; ?>"/>
<label id="acn"></label>
</div>
<br />

<label style="font-size:14px;">Repeate Account Number<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" name="acnu2" class="m-wrap span9" id="acn2" value="<?php echo $account_number; ?>"/>
<label id="acn2"></label>
</div>
<br />

<label style="font-size:14px;">Branch<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" name="branch" class="m-wrap span9" id="bnch" value="<?php echo $branch; ?>"/>
<label id="bnch"></label>
</div>
<br />


<label style="font-size:14px;">IFSC Code<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span9" placeholder="eg. Asdf0asd456" name="ifsc" id="cdd" value="<?php echo $ifsc_code; ?>"/>
<label id="cdd"></label>
</div>
<br />
</div>


</div>                         
</div>  
<div id="show_wwww" style="overflow:auto;">

</div>                       
<div class="form-actions">
<button type="submit" class="btn green" name="sub" value="xyz">Submit</button>
<a href="<?php echo $webroot_path; ?>Incometrackers/neft_add" class="btn" rel='tab'>Reset</a>
</div>
</form>
</div>
</div>
</form>



<script>
$(document).ready(function(){
$('#acn2').bind('paste', function(){
  return false
});

jQuery.validator.addMethod("ifc", function(value, element) {
return this.optional(element) || /^([a-zA-Z]){4}([0]){1}([a-zA-Z0-9]){6}?$/.test( value );
	},"First four alphabetic, fifth zero, rest alphanumeric");


jQuery.validator.addMethod("notEqual", function(value, element, param) {
return this.optional(element) || value !== param;
}, "Please choose Other value!");	


$.validator.setDefaults({ ignore: ":hidden:not(select)" });

$('#contact-form').validate({
errorElement: "label",
//place all errors in a <div id="errors"> element
errorPlacement: function(error, element) {
//error.appendTo("label#errors");
error.appendTo('label#' + element.attr('id'));
},

rules: {

acno: {
required: true
},

acnu : {
	required: true,
	number:true
},

acnu2 : {
 equalTo: "#acn"	
},

bank_name: {
required: true
},

branch: {
required: true
},

ifsc: {
required: true,
//maxlength: 11,
ifc:true
},

},
highlight: function(element) {
$(element).closest('.control-group').removeClass('success').addClass('error');
},
success: function(element) {
element
.text('OK!').addClass('valid')
.closest('.control-group').removeClass('error').addClass('success');
}
});

}); 
</script>	

<script>
function wing_wise()
{
$("#show_wing").show();

$("#show1").hide();
$("#show2").hide();

$("#show3").show();
}
function all_wing()
{
$("#show_wwww").html("");
$("#show_wing").hide();	
$("#show1").show();
$("#show2").show();
$("#show3").hide();
}
</script>



<script>
		$(document).ready(function() {
		$("#wwww").bind('change',function(){
        var value=$("#wwww").val();	
		$("#show_wwww").html('Loading...').load("neft_show_ajax?val="+value+"");
			
		});
		});

</script>

