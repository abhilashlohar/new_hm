<?php 
//echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'));

foreach($result_import_record as $data_import){
	$step1=(int)@$data_import["ledger_yearly"]["step1"];
	$step2=(int)@$data_import["ledger_yearly"]["step2"];
	$step3=(int)@$data_import["ledger_yearly"]["step3"];
	$step4=(int)@$data_import["ledger_yearly"]["step4"];
	$step5=(int)@$data_import["ledger_yearly"]["step5"];
	$date=@$data_import["ledger_yearly"]["request_date"];
	//$file_name=@$data_import["import_record"]["file_name"];
}
echo $process_status= @$step1+@$step2+@$step3+@$step4+@$step5; ?>

<?php if(@$process_status==1){ ?>

<div style="width: 40%; margin: auto; background-color: rgb(210, 243, 196); border: 2px solid rgb(113, 177, 85); padding: 10px;">
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Society detail trial balance report Succesfully preparing.</span>
	<br/><span style="padding-left: 35px; color: rgb(114, 113, 113);"><b>Created on:</b> </span><span style="color: rgb(114, 113, 113);"> <?php echo $date; ?></span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>as/loding.gif" /> 
	<span style="padding-left: 10px; font-weight: bold; color: red;">Do Not Close Window, Reading report file...</span>
</div>
<script> 
$( document ).ready(function() { alert();
    $.ajax({
		url: "ledger_yearly_read",
		dataType: 'json'
	}).done(function(response){
	
		if(response=="READ"){
			change_page_automatically("<?php echo $webroot_path; ?>Accounts/ledger_yearly_background");
		}
	});
});
</script>
<?php } ?>

<?php if(@$process_status==2){ ?>
<div style="width: 40%; margin: auto; background-color: rgb(210, 243, 196); border: 2px solid rgb(113, 177, 85); padding: 10px;">
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Society detail trial balance report Succesfully  preparing</span>
	<br/><span style="padding-left: 35px; color: rgb(114, 113, 113);"><b>Created on:</b> </span><span style="color: rgb(114, 113, 113);"> <?php echo $date; ?></span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">To Read report File Succesfully Done.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>as/loding.gif" /> 
	<span style="padding-left: 10px; font-weight: bold; color: red;">Preparing Data For More Modifications.</span>
	<div class="progress progress-striped progress-danger active">
		<div id="progress" style="width: <?php echo $converted_per; ?>%;" class="bar"></div>
	</div>
	<span style="padding-left: 35px; color: rgb(114, 113, 113);"><b id="text_per_im"></b> Report prepared.</span>
</div>
<script>
$( document ).ready(function() {
	convert_csv_data_ajax();
});
function convert_csv_data_ajax(){
	$( document ).ready(function() {
		$.ajax({
			url: "ledger_yearly_converted",
			dataType: 'json'
		}).done(function(response){
			
			if(response.again_call_ajax=="YES"){ 
				$("#progress").css("width",response.converted_per+"%");
				$("#text_per_im").html(response.converted_per.toFixed(2)+"%");
				convert_csv_data_ajax();
			}
			if(response.again_call_ajax=="NO"){
				change_page_automatically("<?php echo $webroot_path; ?>Accounts/ledger_yearly_background");
			}
			//convert_csv_data_ajax();
		});
	});
}
</script>
<?php } ?>

<?php if(@$process_status==3){ ?>
<div style="width: 40%; margin: auto; background-color: rgb(210, 243, 196); border: 2px solid rgb(113, 177, 85); padding: 10px;">
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Society Detail trial balance report Succesfully</span>
	<br/><span style="padding-left: 35px; color: rgb(114, 113, 113);"><b>Created on:</b> </span><span style="color: rgb(114, 113, 113);"> <?php echo $date; ?></span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">To Read report File Succesfully Done.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);"> Data Is Ready To More Modification.</span>
	<br/><br/>
	<a href="<?php echo $webroot_path; ?>Accounts/ledger_yearly" class="btn red"  id="pulsate-regular">MODIFY DATA </a>
</div>
<script>
$( document ).ready(function() {
	change_page_automatically("<?php echo $webroot_path; ?>Accounts/ledger_yearly");
});
</script>
<?php } ?>

<?php if(@$process_status==4){ ?>
<div style="width: 40%; margin: auto; background-color: rgb(210, 243, 196); border: 2px solid rgb(113, 177, 85); padding: 10px;">
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">File Uploaded Succesfully.</span>
	<br/><span style="padding-left: 35px; color: rgb(114, 113, 113);"><b>Creted on:</b> </span><span style="color: rgb(114, 113, 113);"> <?php echo $date; ?></span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">To Read report File Succesfully Done.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Uploaded Data Is Ready To More Modification.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Data Validation Process Completed.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>as/loding.gif" /> 
	<span style="padding-left: 10px; font-weight: bold; color: red;">Importing Receipt Into The System.</span>
	<div class="progress progress-striped progress-danger active">
		<div id="progress_im" style="width: <?php echo $converted_per_im; ?>%;" class="bar"></div>
	</div>
	<span style="padding-left: 35px; color: rgb(114, 113, 113);"><b id="text_per_im"></b> Receipts Imported.</span>
</div>
<script>

function final_import_bank_receipt_ajax(){
	$( document ).ready(function() {
		$.ajax({
			url: "<?php echo $webroot_path; ?>Cashbanks/final_import_bank_receipt_ajax",
			dataType: 'json'
		}).done(function(response){
			
			if(response.again_call_ajax=="YES"){
				$("#progress_im").css("width",response.converted_per_im+"%");
				$("#text_per_im").html(response.converted_per_im.toFixed(2)+"%");
				final_import_bank_receipt_ajax();
			}
			if(response.again_call_ajax=="NO"){
				$("#first_div").html('<div class="alert alert-block alert-success fade in"><h4 class="alert-heading">Success!</h4><p>Receipts Imported successfully.</p><p><a class="btn green" href="<?php echo $webroot_path; ?>Cashbanks/bank_receipt_view" >OK</a> </p></div>');
			}
		});
	});
}
</script>
<?php } ?>

<?php if(@$process_status==5){ ?>
	<span>Done</span>
<?php } ?>

</div>
<script>
$( document ).ready(function() {
	
});

$('form#contact').submit( function(ev){
	ev.preventDefault();
	
	var from = $("#date1").val();
	var to = $("#date2").val();
		$("#submit_element").html("<img src='<?php echo $webroot_path; ?>as/loding.gif' /> Please Wait, Society report is Uploading...");
		
		$.ajax({
		  url: "trial_balance_report_up/"+from+"/"+to,
		  type: 'POST',
		  dataType: 'json'
		}).done(function(response){
			
			if(response=="UPLOADED"){
				change_page_automatically("<?php echo $webroot_path; ?>Accounts/trial_balance_report_society");
			}
		});
	
	
});

function change_page_automatically(pageurl){
	$.ajax({
		url: pageurl,
		}).done(function(response) {
		
		$(".page-content").html(response);
		$("html, body").animate({
			scrollTop:0
		},"slow");
		 $('#submit_success').hide();
		});
	
	window.history.pushState({path:pageurl},'',pageurl);
}
</script>