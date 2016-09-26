<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

<input type="hidden" name="fd1" value="<?php echo @$fd1; ?>" id="fd1"/>
<input type="hidden" name="td1" value="<?php echo @$td1; ?>" id="td1" />
<center>
<a href="<?php echo $webroot_path; ?>Accounts/master_financial_period_status" class="btn" rel='tab'>Financial Year Status</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_financial_year" class="btn yellow" rel='tab'>Open New Year</a>
</center>
<br />
<center>
<?php

if(!empty($td1)){
	
$yy = date('Y',strtotime(@$td1));
$yyy = $yy + 1;

$fromm = date('01-04-'.$yy.'');
$tooo = date('31-03-'.$yyy.'');
}else{
    $date=date('Y-m-d');
	$yy = date('Y',strtotime(@$date));
	$yyy = $yy + 1;
	$fromm = date('01-04-'.$yy.'');
	$tooo = date('31-03-'.$yyy.'');
}

?>

<div class="portlet box grey" style="width:90%; margin-left:1%; margin-right:1%;">
<div class="portlet-title">
<h4><i class="icon-reorder"></i>Open New Financial Year</h4>
</div>
<div class="portlet-body form" style="background-color:white;"> 
<br><br>
<form method="post" id="contact-form">			  
<table border="0">
<tr>
<td  colspan="4" style="text-align:center;">
<label style="font-size:18px"><b>Open New Financial Year for Posting Entries</b></label>
</td>
</tr>
<tr>

<td><label style="font-size:22px;"><b>From</b></label></td>
<td><input type="text" name="from" class="m-wrap medium date-picker" data-date-format="dd-mm-yyyy"  style="background-color:white !important;" id="from" placeholder="Select Start Date" readonly  data-date-start-date="<?php echo $fromm; ?>"data-date-end-date="<?php echo $fromm; ?>" value="<?php echo $fromm; ?>">

</td>
<td><label style="font-size:22px;"><b>To</b></label></td>
<td><input type="text" name="to" class="m-wrap medium date-picker mor" data-date-format="dd-mm-yyyy" style="background-color:white !important;" id="to" placeholder="Select End Date" readonly data-date-start-date="<?php echo $tooo; ?>" data-date-end-date="<?php echo $tooo; ?>" value="<?php echo $tooo; ?>"></td>

</tr>
<tr>
<td></td>
<td><label id="from"></label></td>
<td></td>
<td><label id="to"></label></td>
</tr>
<tr>
<td colspan="4" id="result5" style="padding:0px; margin:0px; text-align:center;"></td>
</tr>
</table>
<label id="result5"></label>
<br>
<br>

<div class="form-actions" style="background-color:#D7DACD;">
<button type="submit" class="btn blue" name="sub1" id="go">Submit</button>
<button type="reset" class="btn">Cancel</button>
</div>
    
        
</form>      
</div>
</div>
			  
			  
</center>

<script>
$(document).ready(function(){
//$('.date-picker').datepicker( "option", "minDate", selectedDate);
 //$('.date-picker').datepicker({ minDate:'02-09-2016',maxDate:'16-09-2016' });

		$.validator.setDefaults({ ignore: ":hidden:not(select)"});
		
		$('#contact-form').validate({
		
		errorElement: "label",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        //error.appendTo("label#errors");
						error.appendTo('label#' + element.attr('id'));
                    },
					
	    rules: {
	      from: {
	       
	        required: true
	      },
		  
		   to: {
	       
	        required: true
	      },
	
		},
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			},
			submitHandler: function (){
				$("button[name=sub1]").attr('disabled','disabled');
			    form.submit();
			}
	  });

}); 
</script>

	<script>
		$(document).ready(function() {
		$("#go").live('click',function(){

		 var fromd1 = document.getElementById("from").value;
		 var tod1 = document.getElementById("to").value;
         var fd1 = document.getElementById("fd1").value;
		 var td1 = document.getElementById("td1").value;
         var fromd = fromd1.split("-").reverse().join("-");
		 var tod = tod1.split("-").reverse().join("-");
		 if(fromd == "")
		 {
			
		 }
		 else if(tod == "")
		 {
		   	 
		 }
		 else if(Date.parse(td1) >= Date.parse(fromd))
		 {
         $("#result5").load("financial_vali_ajax?ss=" + 1 + "");
       	 return false;
		 } 
		 else if(Date.parse(tod) <= Date.parse(fromd))
		 {
		 $("#result5").load("financial_vali_ajax?ss=" + 2 + "");
       	 return false;
		 }
		 else
		 {
		 $("#result5").load("financial_vali_ajax?ss=" + 3 + "");
				 
		
		 }
		
		 
		
		});
		});
		</script>	


