<div style="background-color: #FFF; padding: 0px 10px; border: 1px solid rgb(233, 231, 231);">
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td style="white-space: nowrap;"><span style="font-size: 16px; font-weight: bold; color: rgb(83, 81, 81);"><i class="icon-comments"></i> Discussion Forum</span></td>
		<td align="right">
			<a href="<?php echo $webroot_path; ?>Discussions/index/0" role="button" rel="tab" class="btn" style="margin-top: 5px; margin-bottom: 5px;"><i class="icon-cloud"></i> All Topics</a>
			<a href="<?php echo $webroot_path; ?>Discussions/index/1" role="button" rel="tab" class="btn" style="margin-top: 5px; margin-bottom: 5px;"><i class="icon-heart"></i> My Topics</a>
			<a href="<?php echo $webroot_path; ?>Discussions/new_topic" role="button" rel="tab" class="btn" style="margin-top: 5px; margin-bottom: 5px;"><i class=" icon-plus-sign"></i> Start Topic</a>
			<input class="m-wrap medium" placeholder="Search" id="search" style="margin-top: 5px; margin-bottom: 5px;" type="text">
			<a href="<?php echo $webroot_path; ?>Discussions/index/2" role="button" rel="tab" class="btn" style="margin-top: 5px; margin-bottom: 5px;"><i class="icon-trash"></i> Archives</a>
		</td>
	</tr>
</table>
</div>
<div style="background-color: #FFF; padding: 5px 10px; border: 1px solid rgb(233, 231, 231);margin-top: 2px;">
	<form  method="post" id="contact-form" name="myform" enctype="multipart/form-data" >
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group ">
					<div class="controls">
					<label  style="font-size:14px;">Topic Name <span style="font-size:12px; color:#999;">(Maximum 100 characters.)</span></label>
					<input type="text" class="span12 m-wrap" e_id="alloptions" style="background-color: #fff !important;" maxlength="100"  name="topic" >
					<label id="alloptions" ></label>
					</div>
				</div>
				<div class="control-group ">
					<div class="controls">
					<label class="" style="font-size:14px;">Description  <span style="font-size:12px; color:#999;">(Maximum 500 characters.)</span></label>
					<textarea class="span8 m-wrap" e_id="textarea" maxlength="500" style="background-color: #fff !important; resize:none; width:100%" name=description onkeyup=limiter()  rows="4"></textarea>
					<label id="textarea" ></label>
					</div>
				</div>
			
				<div class="controls">
					<label class="" style="font-size:14px;">Image &nbsp; (Limit 1MB)</label>
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 150px; height: 75px;">
						<img src="http://www.placehold.it/150x75/EFEFEF/AAAAAA&amp;text=no+image" alt="">
						</div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 75px; line-height: 10px;"></div>
						<div>
							<span class="btn  btn-file" ><span class="fileupload-new" ><i class="icon-camera"></i> Select image</span>
							<span class="fileupload-exists">Change</span>
							<input type="file" name="file" e_id="file" class="default"></span>
							<a href="#" role='button' class="btn  fileupload-exists" data-dismiss="fileupload" >Remove</a>
							<span>Allowed: jpg,gif</span>
						</div>
					</div>
					<label id="file" ></label>
				</div>
			</div>
			<div class="span6">
				<label class="" style="font-size:14px;">Discussion should be visible to<span style="color:red;">*</span> <i class=" icon-info-sign tooltips" data-placement="right" data-original-title="Please select any one"> </i></label>
				<?php
				echo $sending_options=$this->requestAction(array('controller' => 'Fns', 'action' => 'sending_options'));
				?>
				<div style="padding-top:25px;"><button type="submit" class="btn green" name="sub">Start Topic</button></div>
			</div>
		</div>
	</form>
</div>

<script>
$.validator.addMethod('requirecheck1', function (value, element) {
	 return $('.requirecheck1:checked').size() > 0;
}, 'Please select at least one role.');

$.validator.addMethod('requirecheck2', function (value, element) {
	 return $('.requirecheck2:checked').size() > 0;
}, 'Please select at least one wing.');

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
			
			
			
	
		$('#contact-form').validate({
		
		 errorElement: "label",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        //error.appendTo("label#errors");
						error.appendTo('label#' + element.attr('e_id'));
                    }, 
	    groups: {
            asdfg: checkbox_names,
			qwerty: checkbox_names2
        },
		
		
		rules: {
	      topic: {
	       
	        required: true,
			maxlength: 100
	      },
		  
		  description: {
	        required: true,
			maxlength: 500,
	      },
		  file: {
			accept: "gif,jpg",
			filesize: 1048576
	      },
		 
	    },
		messages: {
	                topic: {
	                    maxlength: "Maximum 100 characters only."
	                },
					file: {
						accept: "File extension must be gif or jpg",
	                    filesize: "File size must be less than 1MB."
	                },
					description: {
	                    maxlength: "Max 500 characters allowed.",
						remote:"You have enter wrong word."
	                }
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