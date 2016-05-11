<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>

<div id="output"></div>	
<div class="portlet box" style="background-color:#4B77BE;">
<div class="portlet-title" >
<h4 class="block"><i class="icon-bullhorn"></i> Create New Notice</h4>
</div>
<div class="portlet-body form" style=" border: solid 1px #4B77BE; ">
<!-- BEGIN FORM-->
<form method="POST" class="form-horizontal">
   <div class="row-fluid">
		<div class="span6">
			<label class="" style="font-size:14px;">Subject<span style="color:red;">*</span><span style="font-size:12px; color:#999;">(Maximum 100 characters.)</span> </label>
			<input type="text" maxlength="100" class="span12 m-wrap" placeholder="Subject for e.g. Power shut down" name="notice_subject" >
		</div>
		<div class="span3" >
			<label class="" style="font-size:14px;">Category<span style="color:red;">*</span></label>
			<select class="span12 m-wrap " name="notice_category"   tabindex="1">
			<option value="">--Please select any category--*</option>
			<?php	foreach($result1 as $data){
			$category_id=$data['master_notice_category']['category_id'];
			$category_name=$data['master_notice_category']['category_name']; ?>
				<option value="<?php echo $category_id; ?>" ><?php echo $category_name; ?> </option>
			<?php } ?>
			</select>
		</div>
		<div class="span3" >
			<label class="" style="font-size:14px;">Expires By<span style="color:red;">*</span> <i class=" icon-info-sign tooltips" data-placement="right" data-original-title="Your notice will expire by this date and Archived"> </i></label>
			<input type="text"  class="span12 m-wrap  m-ctrl-medium date-picker" data-date-format="dd-mm-yyyy" placeholder="Please select date" name="notice_expire_date">
		</div>
	</div>
	
	
	<br/>
	<label class="" style="font-size:14px;">Notice<span style="color:red;">*</span></label>
	<div id="summernote"></div>
	<div class="control-group">
	  <label class="control-label">Attachment</label>
	  <div class="controls">
		 <div class="fileupload fileupload-new" data-provides="fileupload">
			<div class="input-append">
			   <div class="uneditable-input">
				  <i class="icon-file fileupload-exists"></i> 
				  <span class="fileupload-preview"></span>
			   </div>
			   <span class="btn btn-file">
			   <span class="fileupload-new">Select file</span>
			   <span class="fileupload-exists">Change</span>
			   <input type="file" name="file" class="default">
			   </span>
			   <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
			</div>
		 </div>
	  </div>
	</div>
						   
	<br/>
	
		
		<div class="row-fluid">
		<div class="span6">
			<!---------------start visible-------------------------------->
			<div class="controls">
			<label class="" style="font-size:14px;">Notice should be visible to<span style="color:red;">*</span>   <i class=" icon-info-sign tooltips" data-placement="right" data-original-title="Please select any one"> </i></label>
			</div>
			
			<?php
				echo $sending_options=$this->requestAction(array('controller' => 'Fns', 'action' => 'sending_options'));
			?>
			
		</div>
		<!---------------end visible-------------------------------->
		
		<div class="span6">
			<div class="control-group">
			<label class="checkbox">
			<div class="checker"><span><div class="checker" id="uniform-undefined"><span><input type="checkbox" value="1" name="allowed" style="opacity: 0;" checked="checked"></span></div></span></div>
			if checked, members can comment on this notice.
			</label>
			</div>
		</div>
	</div>
	
	
	
	
	
	<div class="form-actions">
	  <button type="submit" class="btn blue form_post" name="publish" submit_type="post">Publish Notice</button>
	  <button type="submit" class="btn blue form_post" name="draft" submit_type="draft">Save as Draft</button>
	 
	</div>
	 <div style="display:none;" id='wait'><img src="<?php echo $webroot_path; ?>as/fb_loading.gif" /> Please Wait...</div>
</form>
<!-- END FORM-->
</div>
</div>



<div class="alert alert-block alert-success fade in" style="display:none;">
	<h4 class="alert-heading">Success!</h4>
</div>
								
								
			  


<script>
$(document).ready(function(){
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

				  
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link href="<?php echo $webroot_path ; ?>summernote.css" rel="stylesheet">
<script src="<?php echo $webroot_path ; ?>summernote.min.js"></script>

<script>
$(document).ready(function() {
$('#summernote').summernote({
  height: 300,   
});
});
</script>

<script>
$(document).ready(function() {
	$(".form_post").bind('click', function(e){
		$(".form_post").removeClass("clicked");
		$(this).addClass("clicked");
	});

			
	$('form').submit( function(ev){
		
	ev.preventDefault();
	
		if( $(this).find(".clicked").attr("submit_type") === "post" ){
			var post_type=1;
		}
		if( $(this).find(".clicked").attr("submit_type") === "draft" ){
			var post_type=2;
		}
		
		var m_data = new FormData();    
		m_data.append( 'notice_subject', $('input[name=notice_subject]').val());
		m_data.append( 'notice_category', $('select[name=notice_category]').val());
		m_data.append( 'notice_expire_date', $('input[name=notice_expire_date]').val());
		m_data.append( 'code', $('#summernote').code());
		m_data.append( 'file', $('input[name=file]')[0].files[0]);
		m_data.append( 'post_type', post_type);
		var visible=$('input:radio[name=send_to]:checked').val();
		m_data.append( 'visible', visible);
		m_data.append( 'allowed', $('input:checkbox[name=allowed]:checked').val());
		
		if(visible=="role_wise"){
			var allVals = [];
			$('.requirecheck1:checked').each(function() {
				allVals.push($(this).val());
			});
			if(allVals.length==0){
				m_data.append( 'sub_visible', 0);
			}else{
				m_data.append( 'sub_visible', allVals);
			}
		}
		
		if(visible=="wing_wise"){
			var allVals = [];
			$('.requirecheck2:checked').each(function() {
			allVals.push($(this).val());
			});
			if(allVals.length==0){
				m_data.append( 'sub_visible', 0);
			}else{
				m_data.append( 'sub_visible', allVals);
			}
		}
		
		if(visible=="group_wise"){
			var allVals = [];
			$('.requirecheck3:checked').each(function() {
				allVals.push($(this).val());
			});
			if(allVals.length==0){
				m_data.append( 'sub_visible', 0);
			}else{
				m_data.append( 'sub_visible', allVals);
			}
		}
		
		if(visible=="all_users"){
			m_data.append( 'sub_visible', 0);
		}
		$(".form-actions").hide();
		
		$("#wait").show();
			
			$.ajax({
			url: "submit_notice",
			data: m_data,
			processData: false,
			contentType: false,
			type: 'POST',
			dataType:'json',
			}).done(function(response) {
			//	alert(response);
			$("#output").html(response);
			if(response.type=='approve'){
				$(".portlet").remove();
				$(".alert-success").show().append("<p>"+response.text+"</p><p><a class='btn green' href='<?php echo $webroot_path; ?>Notices/new_notice' rel='tab' >ok</a></p>");
				$("#output").remove();
			}
			if(response.type=='created'){
				$(".portlet").remove();
				//$(".alert-success").show().append("<p>"+response.text+"</p><p><a class='btn green' href='<?php echo $webroot_path; ?>Notices/notice_publish' rel='tab' >ok</a></p>");
				$("#output").remove();
								
				change_page_automatically("<?php echo $webroot_path; ?>Notices/notice_publish");
			}
			if(response.type=='draft'){
				$(".portlet").remove();
				//$(".alert-success").show().append("<p>"+response.text+"</p><p><a class='btn green' href='<?php echo $webroot_path; ?>Notices/notice_draft' rel='tab' >ok</a></p>");
				$("#output").remove();
				
				change_page_automatically("<?php echo $webroot_path; ?>Notices/notice_draft");
			}
			if(response.type=='error'){
				$("#output").html('<div class="alert alert-error">'+response.text+'</div>');
				 $('.form-actions').show();
			}
			$("html, body").animate({
			scrollTop:0
			},"slow");
			$(".form_post").removeClass("disabled");
			$("#wait").hide();
			});

	 
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


