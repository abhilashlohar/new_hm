<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>

<div style="padding:5px;" align="center" class="mobile-align">
<a href="message_view" class="btn blue" rel='tab'>SMS History</a>
<a href="message" class="btn red" rel='tab'>Compose SMS</a>
</div>

<span class="btn mini purple" style="padding: 5px;font-size: 12px;margin-left:10%;margin-bottom: 2px;" ><b> Sms limit  : <?php echo @$sms_limit; ?> </b></span> <span class="btn mini red" style="padding: 5px;font-size: 12px;margin-bottom: 2px;" ><b> Sms remaining  : <?php echo @$sms_limit-@$count_sms;  ?> </b></span>

<div style="border:solid 2px #4cae4c; width:80%; margin-left:10%;">

<div style="border-bottom:solid 2px #4cae4c; color:white; background-color: #5cb85c; padding:4px; font-size:20px;" ><i class="icon-envelope-alt"></i> Send SMS</div>
<div style="padding:10px;background-color:#FFF;">
<form method="post" id="contact-form" onsubmit="return hello()" >

		<div class="controls">
			<label class="radio">
				<div class="radio" id="uniform-undefined"><input type="radio"  id="r1" checked name="radio" value="1" style="opacity: 0;"></div>
				<span style="font-size:16px;" >Send SMS to Individual</span>
			</label>
			<label class="radio">
				<div class="radio" id="uniform-undefined"><input type="radio"  id="r3"  name="radio" value="3" style="opacity: 0;"></div>
				<span style="font-size:16px;" >Send SMS to Default Groups</span>
			</label>
		</div>



	<label style="font-size:14px; font-weight:bold;">To <i class=" icon-info-sign tooltips" data-placement="right" data-original-title="SMS will be sent to only those users whose valid mobile numbers are registered with HousingMatters"> </i></label>


	<div class="control-group" id="d1">
	<div class="controls">
		<select data-placeholder="Type or select name"  name="multi[]" id="multi" class="chosen span9" multiple="multiple" tabindex="6">
		<?php foreach ($result_users as $collection){
				$user_id=$collection["user"]["user_id"];
				$user_name=$collection["user"]["user_name"];
				$mobile=$collection["user"]["mobile"];
					$result_user_flat=$this->requestAction(array('controller'=>'Fns','action'=>'user_flat_info_via_user_id'),array('pass'=>array((int)$user_id)));
					foreach($result_user_flat as $data){
					@$wing=(int)@$data["user_flat"]["wing"];
					@$flat=(int)@$data["user_flat"]["flat"];	
					}		
					@$wing_flat=$this->requestAction(array('controller'=>'Fns','action'=>'wing_flat_via_wing_id_and_flat_id'),array('pass'=> array(@$wing,@$flat)));
		?>
		<option value="<?php echo $user_id; ?>,<?php echo $mobile; ?>"><?php echo $user_name; ?>&nbsp;&nbsp;<?php echo $wing_flat; ?>,<?php echo $mobile; ?></option>
		<?php } ?>           
		</select>
		<label id="multi"></label>
	</div>
	</div>

<!--
<div style="display:none; padding:5px;" id="d2" >
<?php
//foreach ($result_group as $collection) 
//{
//$group_name=$collection["group"]["group_name"];
//$group_id=$collection["group"]["group_id"];
?>
<label class="checkbox">
<input type="checkbox" name="grp<?php //echo $group_id; ?>" value="<?php //echo $group_id; ?>" class="requirecheck3 ignore" id="group_check"> <?php //echo $group_name; ?>
</label>
<?php //} ?> 
<label id="group_check"></label>
</div>-->

<div style="display:none; padding:5px;" id="d3">
	<?php
	$this->requestAction(array('controller'=>'Fns','action'=>'sending_options'));
	?>	
</div>


<div class="control-group">                    
<div class="controls">
	<table  width="100%">
		<tr>
			<td>
				<label style="font-size:14px; font-weight:bold;">Message</label> <div  style="float:left;">
				<span style="background-color:#d84a38; color:white; padding:2px;">Note</span>: Please restrict your message length to 459 characters in one message.
				</div>
			</td>
			<td>
				<a href="#myModal3" role="button" class="btn blue pull-right" data-toggle="modal">Templates</a>
	<div id="myModal3" style="margin-top:-5%;" class="modal hide " tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h3 id="myModalLabel3">Select Template</h3>
		</div>
	
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1_1" data-toggle="tab">Events</a></li>
			<li class=""><a href="#tab_1_2" data-toggle="tab">Finance</a></li>
			<li class=""><a href="#tab_1_3" data-toggle="tab">Maintenance</a></li>
			<li class=""><a href="#tab_1_4" data-toggle="tab">Meetings</a></li>
			<li class=""><a href="#tab_1_5" data-toggle="tab">Notice</a></li>
			<li class=""><a href="#tab_1_6" data-toggle="tab">Updates</a></li>
			<li class=""><a href="#tab_1_7" data-toggle="tab">Vendors</a></li>
		</ul>
		<div class="scroller" data-height="400px">
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1_1">
				<?php
				foreach ($result_template1 as $cat1){
				$template=$cat1["template"]["template"];
				?>                                 
				<div class="tmplt t_hov" onClick="templt('<?php echo $template; ?>')" data-dismiss="modal">
				<?php echo $template; ?>
				</div>
				<?php } ?>
			</div>
			
			<div class="tab-pane" id="tab_1_2">
			<?php
			foreach ($result_template2 as $cat2) 
			{
			$template=$cat2["template"]["template"];
			?>                                 
			<div class="tmplt t_hov" onClick="templt('<?php echo $template; ?>')" data-dismiss="modal">
			<?php echo $template; ?>
			</div>
			<?php } ?>
			</div>
			
			<div class="tab-pane" id="tab_1_3">
			<?php
			foreach ($result_template3 as $cat3) 
			{
			$template=$cat3["template"]["template"];
			?>                                 
			<div class="tmplt t_hov" onClick="templt('<?php echo $template; ?>')" data-dismiss="modal">
			<?php echo $template; ?>
			</div>
			<?php } ?>
			</div>
			
			<div class="tab-pane" id="tab_1_4">
			<?php
			foreach ($result_template4 as $cat4) 
			{
			$template=$cat4["template"]["template"];
			?>                                 
			<div class="tmplt t_hov" onClick="templt('<?php echo $template; ?>')" data-dismiss="modal">
			<?php echo $template; ?>
			</div>
			<?php } ?>
			</div>
			
			<div class="tab-pane" id="tab_1_5">
			<?php
			foreach ($result_template5 as $cat5) 
			{
			$template=$cat5["template"]["template"];
			?>                                 
			<div class="tmplt t_hov" onClick="templt('<?php echo $template; ?>')" data-dismiss="modal">
			<?php echo $template; ?>
			</div>
			<?php } ?>
			</div>
			
			<div class="tab-pane" id="tab_1_6">
			<?php
			foreach ($result_template6 as $cat6) 
			{
			$template=$cat6["template"]["template"];
			?>                                 
			<div class="tmplt t_hov" onClick="templt('<?php echo $template; ?>')" data-dismiss="modal">
			<?php echo $template; ?>
			</div>
			<?php } ?>
			</div>
			
			<div class="tab-pane" id="tab_1_7">
			<?php
			foreach ($result_template7 as $cat7) 
			{
			$template=$cat7["template"]["template"];
			?>                                 
			<div class="tmplt t_hov" onClick="templt('<?php echo $template; ?>')" data-dismiss="modal">
			<?php echo $template; ?>
			</div>
			<?php } ?>
			</div>
		</div>
		</div>


	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
			</td>
		</tr>
	</table>
	
	<textarea  style="resize:none;font-size: 18px;" class="m-wrap span12"  onKeyUp="count_msg()" id="massage" name="massage" rows="7"></textarea>
	<label id="massage"></label>
 
 <table width="100%">
 <tr>
 <td>
 <div id="count_result" style="float:right;"><span style="font-size:14px; color:#666; font-weight:bold;">No. of Messages </span><input  type="text" style="width:80px; background-color:#008000; color:#FFF;" value="0 / 1 SMS" readonly class="count_pre" ></div>
 </td>
 <td>
	
</td>
</tr>
</table>
</div>
</div>
<?php
date_default_timezone_set('Asia/Kolkata');
$date=date("d-m-Y");
$time=time();
 $time=strtotime('+15 minutes');
 $time_h = date('H', $time); 
 $time_m = date('i', $time);
 $r=$time_m%15;
 $add=15-$r;
 $m =$time_m+$add;
 
?>
<div class="row-fluid">
	<div class="span4">
		<div class="control-group">
			<label style="font-size:14px; font-weight:bold;">Date</label>
			<div class="controls">
			<input class="m-wrap m-ctrl-medium date-picker" readonly name="date" size="16" data-date-format="dd-mm-yyyy" id="sel_date" type="text" data-date-start-date="<?php echo $date; ?>" value="<?php echo $date; ?>">
			</div>
		</div>
	</div>
<div class="span6">
<!--<div class="control-group">		
		<label style="font-size:14px; font-weight:bold;">Time <i class=" icon-info-sign tooltips" data-placement="right" data-original-title="Please select 15 minutes or later from your current time" style="color:#d84a38;"> </i></label>
		<select class="span2 m-wrap" name="time_h">
		<?php for($w=1;$w<=24;$w++) { ?>
		<option value="<?php echo $w; ?>" <?php if($w==$time_h) { ?> selected <?php } ?>><?php echo $w; ?></option>
		<?php } ?>
		</select>

		<select class="span2 m-wrap" name="time_m">
		<option value="00" <?php if($m==00) { ?> selected <?php } ?>>00</option>
		<option value="15" <?php if($m==15) { ?> selected <?php } ?>>15</option>
		<option value="30" <?php if($m==30) { ?> selected <?php } ?>>30</option>
		 <option value="45" <?php if($m==45) { ?> selected <?php } ?>>45</option>
		</select>
</div>	-->	
	
<div class="control-group">
 <label style="font-size:14px; font-weight:bold;">Time <i class=" icon-info-sign tooltips" data-placement="right" data-original-title="Please select 15 minutes or later from your current time" style="color:#d84a38;"> </i></label>
  <div class="controls">
	 <div class="input-append bootstrap-timepicker-component">
		<input class="m-wrap m-ctrl-small timepicker-default" type="text" name="time" id="time" value="">
		<span class="add-on"><i class="icon-time"></i></span>
	 </div>
  </div>
</div>
<label id="time"></label>	
</div>
</div>

<div class="form-actions" style="margin-bottom:0px !important;">
<button type="submit" name="send"  class="btn blue"> Preview </button>
<a href="#myModal1" role="button" style="display:none;" class="btn yellow" id="preview" data-toggle="modal">Preview</a>
</div>


	<!--preview-------->
	<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<span style="color:#3B6B96;font-weight: bold; ">Preview of Sms </span>
		</div>
		<div class="modal-body">
		<table width="100%" class="table  table-bordered dataTable">
		<tr>
			<td width="25%"><span style="color:#3B6B96;font-weight: bold; ">Send SMS to: </span></td><td><span id="get_question"></span></td>
		</tr>
		
		<tr>
			<td valign="top"><span style="color:#3B6B96;font-size: 14px;font-weight: bold;">Message: </span> </td><td><span id="message_pre"></span></td>
		</tr>
		
		<tr>
			<td><span style="color:#3B6B96;font-size: 14px;font-weight: bold;">Date: </span> </td><td><span id="date"></span></td>
		</tr>
		
		<tr>
			<td><span style="color:#3B6B96;font-size: 14px;font-weight: bold;">Time: </span> </td><td><span id="time_pre"></span></td>
		</tr>
		
		<tr>
			<td><span style="color:#3B6B96;font-size: 14px;font-weight: bold;">No. of Messages</span> </td><td><span id="sms_count"></span></td>
		</tr>
		
		</table>
		
			
		</div>
		<div class="modal-footer">
		<input type="hidden" id="sub_check" value="0" >
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button type="submit" name="send" id="submit_data" class="btn blue"><i class=" icon-share-alt"></i> SEND SMS</button>
		</div>
	</div>
	<!--preview-------->


</form>
</div>
</div>
<!------------------------------------------->
<script>
function count_msg()
{

	len=0; c=0;
	var c2=document.getElementById("massage").value;
	var len = c2.length;
	
	if(len<153) { var c = 1; }
	if(len>=153 && len<306) { var c = 2; }
	if(len>=306 && len<=459) { var c = 3; }
	if(len>459) { 
	var t_cut = c2.substring(0, 459);
	document.getElementById("massage").value=t_cut;
	 return false;
	 }
	
	var l=len+ ' / ' + c + ' SMS';

	
	document.getElementById("count_result").innerHTML='<span style="font-size:14px; color:#666;font-weight:bold;">No. of Messages </span><input type="text" style="width:80px; background-color:#008000; color:#FFF; " value="'+l+'" readonly id="count_result" class="count_pre">';
	if(len==459) {
		document.getElementById("count_result").innerHTML='<span style="font-size:14px; color:#666;font-weight:bold;">No. of Messages </span><input type="text" style="width:80px;background-color:#d84a38; color:#FFF; " value="'+l+'" readonly id="count_result" class="count_pre">';
	}

}
</script>

<script>
$(document).ready(function(){
	
	 $("#preview").bind('click',function(){
			var send="";
			var count_sms= $('.count_pre').val();
			//var co=(count_sms.split('SMS'));
			//var z=co[0].split('/');
			//$("#sms_count").text(z[1]);
			$("#sms_count").text(count_sms);

		var radio=$('input[name=radio]:checked').val();
		if(radio==1){
			
			send="Individual";
		}else{
			send="Default Groups";
			var visible=$('input:radio[name=send_to]:checked').val();
			if(visible=="role_wise"){
			var allVals = [];
			$('.requirecheck1:checked').each(function() {
				allVals.push($(this).closest('label').text());
			});
			
		}
				
		}
		
		var message=$("#massage").val();
		var date=$("#sel_date").val();
		var time=$("#time").val();
		
		$("#get_question").text(send);
		$("#message_pre").text(message);
		$("#date").text(date);
		$("#time_pre").text(time);
	 });
	
	
  $("#r1").click(function(){
    $("#d2").hide();
    $("#d1").show();
	$("#d3").hide();
	$(".chosen").removeClass("ignore");
	
  });
  $("#r2").click(function(){
    $("#d1").hide();
    $("#d2").show();
	$("#d3").hide();
	$(".chosen").addClass("ignore");
	
  });
  $("#r3").click(function(){
    $("#d1").hide();
    $("#d3").show();
	$("#d2").hide();
	$(".chosen").addClass("ignore");
	
  });
});
</script>


<script>
$(document).ready(function() { 
	 $("#v3").live('click',function(){
		$("#show_3").slideDown('fast');
		$("#show_2").slideUp('fast');
		$("#show_1").slideUp('fast');
		
	 });
	 
	 $("#v2").live('click',function(){
		$("#show_2").slideDown('fast');
		$("#show_3").slideUp('fast');
		$("#show_1").slideUp('fast');
		
	 });
	 
	 $("#v1").live('click',function(){
		$("#show_1").slideDown('fast');
		$("#show_2").slideUp('fast');
		$("#show_3").slideUp('fast');
	 });
});
</script>

<script>
function templt(t)
{
	document.getElementById("massage").value=t;
	count_msg();
}
</script>


<style>
.tmplt{
border-bottom:solid 2px #ccc; padding:15px; font-size:16px; cursor:pointer;	
}
.t_hov:hover{
background-color:rgba(207, 202, 255, 0.32);	
}
</style>



<script>


$(".chosen").change(function(){
	$("button[name=send]").removeAttr('disabled');
});

function hello(){ 
	$("button[name=send]").removeAttr('disabled');
	
	var r=$("input:radio[name=radio]:checked").val();
	if(r==1){
		var m=$("#multi").val();
		
		if(m==null){
			//$("button[name=send]").attr('disabled','');
			$("label#multi").html("<span style='color:red;'>Please select at-least one recipient.</span>");
			return false;
		}else{
			//$("button[name=send]").attr('disabled','');
			$("label#multi").html("");
		}
	}
	
	
} 

jQuery.validator.addMethod("specialChar", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9-{}.:/_ ]*$/.test(value);
},"Please remove specialcharacter."); 

 /*jQuery.validator.addMethod("specialChar", function(value, element) {
     return this.optional(element) || /([0-9a-zA-Z\s])$/.test(value);
  }, "Please remove specialcharacter.");
*/

$.validator.addMethod('requirecheck1', function (value, element) {
	 return $('.requirecheck1:checked').size() > 0;
}, 'Please select at least one role.');

$.validator.addMethod('requirecheck2', function (value, element) {
	 return $('.requirecheck2:checked').size() > 0;
}, 'Please select at least one wing.');

$.validator.addMethod('requirecheck3', function (value, element) {
	 return $('.requirecheck3:checked').size() > 0;
}, 'Please select at least one group.');

$.validator.addMethod('filesize', function(value, element, param) {
    // param = size (en bytes) 
    // element = element to validate (<input>)
    // value = value of the element (file name)
    return this.optional(element) || (element.files[0].size <= param) 
});

$(document).ready(function(){

var checkboxes = $('.requirecheck1');
var checkbox_names = $.map(checkboxes, function(e, i) {
return $(e).attr("name")
}).join(" ");

var checkboxes2 = $('.requirecheck2');
var checkbox_names2 = $.map(checkboxes2, function(e, i) {
return $(e).attr("name")
}).join(" ");
			
var checkboxes3 = $('.requirecheck3');
var checkbox_names3 = $.map(checkboxes3, function(e, i) {
return $(e).attr("name")
}).join(" ");

//$.validator.setDefaults({ ignore: ":hidden:not(select)" });
$('#contact-form').validate({
//ignore: ".ignore",
			errorElement: "label",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        //error.appendTo("label#errors");
						error.appendTo('label#' + element.attr('id'));
						error.appendTo('label#' + element.attr('e_id'));
                    }, 
	    groups: {
            asdfg: checkbox_names,
			qwerty: checkbox_names2,
			qwerty2: checkbox_names3
        },
	

rules: {
   "multi[]": {
	required: true,
  },
   massage: {
	required: true,
	//specialChar: true
  },
  notice_visible_to: {
   
	required: true
  },
 file: {
		accept: "png,jpg",
		filesize: 1048576
	  },
 time: {
	required: true,
	remote: {
			url: "check_sms_schedule_time",
			type: "post",
		data: {
			date: function() { return $("#sel_date").val();},
		
		}
	}
  },
  
  

},

messages: {
			"multi[]": {
				required: "Please select at-least one recipient."
			},
			file: {
					accept: "File extension must be png or jpg",
					filesize: "File size must be less than 1MB."
				},
				 time: {
	                    remote: "Please select 15 minutes later from your current time"
	                }
		},
	highlight: function(element) {
		$(element).closest('.control-group').removeClass('success').addClass('error');
	},
	success: function(element) {
		element
		.text('OK!').addClass('valid')
		.closest('.control-group').removeClass('error').addClass('success');
	},
	submitHandler: function (form) {
				
				var z=$("#sub_check").val();
				$("#preview").click();
				$("#submit_data").live('click',function(){
					$("#sub_check").val(1);
				});
							
				if(z==1){
					$("button[name=send]").attr('disabled','disabled');
					 form.submit();
				}
				
				//$("button[name=send]").attr('disabled','disabled');
			   // form.submit();
			}
	
});

}); 
</script>