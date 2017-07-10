<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<center>
<a href="budget_import"  rel='tab' class="btn red tooltips space-responsive"  ><i class="icon-folder-open"></i> Budget Import </a>
<a href="budget_report"  rel='tab' class="btn blue  tooltips space-responsive" ><i class="icon-folder-close"></i> Report </a>
</center>
<br>
	<?php 
	foreach($result_import_record as $data_import){
	$auto_id=(int)@$data_import["budget_import"]["auto_id"];
	$step1=(int)@$data_import["budget_import"]["step1"];
	$step2=(int)@$data_import["budget_import"]["step2"];
	$step3=(int)@$data_import["budget_import"]["step3"];
	$step4=(int)@$data_import["budget_import"]["step4"];
	$step5=(int)@$data_import["budget_import"]["step5"];
	$date=@$data_import["budget_import"]["date"];
	$file_name=@$data_import["budget_import"]["file_name"];
	}
	 $process_status= @$step1+@$step2+@$step3+@$step4+@$step5; ?>
<div id="first_div">
<?php if(sizeof(@$result_import_record)==0 or $process_status==3 ){ ?>
<div class="portlet box green" style="width: 50%; margin: auto;">
	<div class="portlet-title">
		<h4><i class="icon-cogs"></i> Import Budget</h4>
	</div>
	<div class="portlet-body" align="">
		<form method="post" id="form1" style="margin: 0px;">
			
			<select id="budget_status">
				<option value="yearly">Yearly</option>
				<option value="month">Monthly</option>
				<option value="quarter">Quarterly</option>
			</select>
			<br/>
			<div>
				<input class="date-picker m-wrap medium" id="date1" data-date-format="dd-mm-yyyy" name="from" placeholder="From" style="background-color:white !important;" value="" type="text">
				<input class="date-picker m-wrap medium" id="date2" data-date-format="dd-mm-yyyy" name="to" placeholder="To" style="background-color:white !important;" value="" type="text">
			</div>
			<a  id="budget_show" href="budget_sample/yearly"  target="_blank">Download sample format</a><br/>
			
			<h5>Upload CSV file in given format to import Budget.</h5>
			<input name="file" class="default" id="image-file" type="file">
			<label id="vali"></label>
			
						
			<h4>Instruction set to import users</h4>
			<ol>
			<li>Budget Balance Amount should be Numeric </li>
			</ol>
						
			<h5 id="submit_element" >
			<button type="submit" class="btn blue">IMPORT BUDGET</button>
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
		url: "read_csv_file_budget/<?php echo $auto_id; ?>",
		dataType: 'json'
	}).done(function(response){
		//$("#change").html(response);
		//alert(response);
		if(response=="READ"){
			change_page_automatically("<?php echo $webroot_path; ?>Accounts/budget_import");
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
<img src="<?php echo $webroot_path; ?>img/test-pass-icon.png" style="height: 20px;"/>
<span style="padding-left: 10px; font-weight: bold; color: rgb(0, 106, 0);">Uploaded Data Is Ready To More Modification.</span>
<br/><br/>
<a href="<?php echo $webroot_path; ?>Accounts/modify_budget_import/<?php echo $auto_id; ?>" class="btn red"  id="pulsate-regular">MODIFY DATA</a>
</div>
<?php } ?>

</div>

<div id="change"></div>
<script>
$(document).ready(function() {
	$('#budget_status').change(function(){
		var status=$(this).val();
		$('#budget_show').attr('href','budget_sample/'+status+'');
	});
});


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
var from=$("#date1").val();
var to=$("#date2").val();
var status=$("#budget_status").val();

	$("#submit_element").html("<img src='<?php echo $webroot_path; ?>as/loding.gif' /> Please Wait, Csv file is Uploading...");
	var m_data = new FormData();
	m_data.append('from',from);
	m_data.append('to',to);
	m_data.append('status',status);
	m_data.append( 'file', $('input[name=file]')[0].files[0]);
	$.ajax({
	url: "<?php echo $webroot_path; ?>Accounts/upload_budget_csv_file",
	data: m_data,
	processData: false,
	contentType: false,
	type: 'POST',
	dataType: 'json'
	}).done(function(response){ 
			if(response=="UPLOADED"){
			change_page_automatically("<?php echo $webroot_path; ?>Accounts/budget_import");
		}
	});
});

</script>

<script>
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
















