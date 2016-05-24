<?php foreach($result_import_record as $data_import){
	$step1=(int)@$data_import["import_user_enrollment_record"]["step1"];
	$step2=(int)@$data_import["import_user_enrollment_record"]["step2"];
	$step3=(int)@$data_import["import_user_enrollment_record"]["step3"];
	$step4=(int)@$data_import["import_user_enrollment_record"]["step4"];
	$step5=(int)@$data_import["import_user_enrollment_record"]["step5"];
	$date=@$data_import["import_user_enrollment_record"]["date"];
	$file_name=@$data_import["import_user_enrollment_record"]["file_name"];
}
$process_status= @$step1+@$step2+@$step3+@$step4+@$step5; ?>
<div id="first_div">
<?php if(sizeof(@$result_import_record)==0){ ?>
<div class="portlet box green" style="width: 50%; margin: auto;">
	<div class="portlet-title">
		<h4><i class="icon-cogs"></i> Import User Enrollment</h4>
	</div>
	<div class="portlet-body" align="">
		<form method="post" id="form1" style="margin: 0px;">
			<h5>Upload CSV file in given format to import user enrollment.</h5>
			<input name="file" class="default" id="image-file" type="file">
			<label id="vali"></label>
			<a href="<?php echo $webroot_path; ?>new_user_enrollment_csv/user_enrollment_file.csv" download=""><b>Click here for sample format</b></a>
			<br/>
			<h4>Instruction set to import users</h4>
			<ol>
			<li>Wing and Flat name be valid as per society setting.</li>
			<li>Email ID should be correct as all the further communication will be send to this email id. No duplicate Email is allowed.</li>
			<li>Mobile number should be 10 digits. No Duplicate Mobile No is allowed.</li>
			<li>Owner,Committee,Residing should be only "Yes" or "No".</li>
			</ol><br/>
			<h5 id="submit_element" >
			<button type="submit" class="btn blue">IMPORT </button>
			</h5>
		</form>
	</div>
</div>
<?php } ?>

<?php if(@$process_status==1){ ?>
<div style="width: 40%; margin: auto; background-color: rgb(210, 243, 196); border: 2px solid rgb(113, 177, 85); padding: 10px;">
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">File Uploaded Succesfully.</span>
	<br/><span style="padding-left: 35px; color: rgb(114, 113, 113);"><b>Uploaded on:</b> </span><span style="color: rgb(114, 113, 113);"> <?php echo $date; ?></span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>as/loding.gif" /> 
	<span style="padding-left: 10px; font-weight: bold; color: red;">Do Not Close Window, Reading CSV file...</span>
</div>
<script>
$( document ).ready(function() {
    $.ajax({
		url: "read_user_enrollment_csv",
		dataType: 'json'
	}).done(function(response){
		
		if(response=="READ"){
			change_page_automatically("<?php echo $webroot_path; ?>Hms/import_user_enrollment");
		}
	});
});
</script>
<?php } ?>

<?php if(@$process_status==2){ ?>
<div style="width: 40%; margin: auto; background-color: rgb(210, 243, 196); border: 2px solid rgb(113, 177, 85); padding: 10px;">
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">File Uploaded Succesfully.</span>
	<br/><span style="padding-left: 35px; color: rgb(114, 113, 113);"><b>Uploaded on:</b> </span><span style="color: rgb(114, 113, 113);"> <?php echo $date; ?></span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">To Read Uploaded File Succesfully Done.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>as/loding.gif" /> 
	<span style="padding-left: 10px; font-weight: bold; color: red;">Preparing Data For More Modifications.</span>
	<div class="progress progress-striped progress-danger active">
		<div id="progress" style="width: <?php echo $converted_per; ?>%;" class="bar"></div>
	</div>
</div>
<script>
$( document ).ready(function() {
	convert_csv_data_ajax();
});
function convert_csv_data_ajax(){
	$( document ).ready(function() {
		$.ajax({
			url: "convert_user_enrollment_info_data",
			dataType: 'json'
		}).done(function(response){
			if(response.again_call_ajax=="YES"){
				$("#progress").css("width",response.converted_per+"%");
				convert_csv_data_ajax();
			}
			if(response.again_call_ajax=="NO"){
				change_page_automatically("<?php echo $webroot_path; ?>Hms/import_user_enrollment");
			}
		});
	});
}
</script>
<?php } ?>

<?php if(@$process_status==3){ ?>
<div style="width: 40%; margin: auto; background-color: rgb(210, 243, 196); border: 2px solid rgb(113, 177, 85); padding: 10px;">
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">File Uploaded Succesfully.</span>
	<br/><span style="padding-left: 35px; color: rgb(114, 113, 113);"><b>Uploaded on:</b> </span><span style="color: rgb(114, 113, 113);"> <?php echo $date; ?></span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">To Read Uploaded File Succesfully Done.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Uploaded Data Is Ready To More Modification.</span>
	<br/><br/>
	
</div>

<script>
$( document ).ready(function() {
	change_page_automatically("<?php echo $webroot_path; ?>Hms/modify_user_enrollment_csv");
});
</script>
<?php } ?>

<?php if(@$process_status==4){ ?>
<div style="width: 40%; margin: auto; background-color: rgb(210, 243, 196); border: 2px solid rgb(113, 177, 85); padding: 10px;">
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">File Uploaded Succesfully.</span>
	<br/><span style="padding-left: 35px; color: rgb(114, 113, 113);"><b>Uploaded on:</b> </span><span style="color: rgb(114, 113, 113);"> <?php echo $date; ?></span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">To Read Uploaded File Succesfully Done.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Uploaded Data Is Ready To More Modification.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
	<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Data Validation Process Completed.</span>
	<br/><br/>
	<img src="<?php echo $webroot_path; ?>as/loding.gif" /> 
	<span style="padding-left: 10px; font-weight: bold; color: red;">Importing User Enrollment Into The System.</span>
	<div class="progress progress-striped progress-danger active">
		<div id="progress_im" style="width: <?php echo $converted_per_im; ?>%;" class="bar"></div>
	</div>
	<span style="padding-left: 35px; color: rgb(114, 113, 113);"><b id="text_per_im"></b> User Enrollments Imported.</span>
</div>
<script>
$( document ).ready(function() {
	final_import_bank_receipt_ajax();
});
function final_import_bank_receipt_ajax(){
	$( document ).ready(function() {
		$.ajax({
			url: "final_import_user_enrollment",
			dataType: 'json'
		}).done(function(response){
			//alert(response);
			if(response.again_call_ajax=="YES"){
				$("#progress_im").css("width",response.converted_per_im+"%");
				$("#text_per_im").html(response.converted_per_im.toFixed(2)+"%");
				final_import_bank_receipt_ajax();
			}
			if(response.again_call_ajax=="NO"){
				$("#first_div").html('<div class="alert alert-block alert-success fade in"><h4 class="alert-heading">Success!</h4><p>User Enrollment Imported successfully.</p><p><a class="btn green" href="<?php echo $webroot_path; ?>Hms/import_user_enrollment" >OK</a> </p></div>');
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
$('form#form1').submit( function(ev){
	ev.preventDefault();
	var im_name=$("#image-file").val();
		var insert = 1;
		if(im_name==""){
		$("#vali").html("<span style='color:red;'>Please Select a Csv File</span>");	
		return false;
		}
		
		var ext = $('#image-file').val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['csv']) == -1) {
		$("#vali").html("<span style='color:red;'>Please Select a Csv File</span>");
		return false;
		}
	$("#submit_element").html("<img src='<?php echo $webroot_path; ?>as/loding.gif' /> Please Wait, Csv file is Uploading...");
	var m_data = new FormData();
	m_data.append( 'file', $('input[name=file]')[0].files[0]);
	$.ajax({
	url: "Upload_user_enrollment_csv_file",
	data: m_data,
	processData: false,
	contentType: false,
	type: 'POST',
	dataType: 'json'
	}).done(function(response){
		
		if(response=="UPLOADED"){
			change_page_automatically("<?php echo $webroot_path; ?>Hms/import_user_enrollment");
		}
	});
});

function change_page_automatically(pageurl){
	$.ajax({
		url: pageurl,
		}).done(function(response) {
		
		//$("#loading_ajax").html('');
		
		$(".page-content").html(response);
		$("html, body").animate({
			scrollTop:0
		},"slow");
		 $('#submit_success').hide();
		});
	
	window.history.pushState({path:pageurl},'',pageurl);
}
</script>