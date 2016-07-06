<div class="hide_at_print">	
<?php echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array())); ?>
</div>	
<div style="background-color:#EFEFEF; border-top:1px solid #e6e6e6; border-bottom:1px solid #e6e6e6; padding:10px; box-shadow:5px; font-size:16px; color:#006;">
Society Details
</div>
<?php

foreach($result_society as $data)
{
@$society_pan=$data['society']['pan'];
@$tex_number=$data['society']['tex_number'];
@$society_address=$data['society']['society_address'];
@$society_reg_num=$data['society']['society_reg_num'];
@$society_phone = $data['society']['society_phone'];
@$society_email = $data['society']['society_email'];
$sig_title = @$data['society']['sig_title'];
$society_logo = @$data['society']['logo'];
$society_sig = @$data['society']['signature'];
}



?>				 
<div class="tabbable tabbable-custom">
<ul class="nav nav-tabs">
<li  ><a href="<?php echo $webroot_path; ?>Hms/master_sm_wing" rel='tab'> Wing</a></li>
<li><a href="<?php echo $webroot_path; ?>Hms/flat_type" rel='tab' >Unit Number</a></li>
<li ><a href="<?php echo $webroot_path; ?>Hms/unit_configuration" rel='tab' >Unit Configuration</a></li>
<!--<li><a href="<?php //echo $webroot_path; ?>Hms/flat_nu_import" rel='tab' >Flat Number Import</a></li>-->
<li class="active" ><a href="<?php echo $webroot_path; ?>Hms/society_details" rel='tab' >Society Details</a></li>
<li><a href="<?php echo $webroot_path; ?>Hms/society_settings" rel='tab' >Society Settings</a></li>
</ul>
<div class="tab-content" style="min-height:300px;">
<div class="tab-pane active" id="tab_1_1">
<div style="">
<span class="label label-important">NOTE</span><span> No need to save this form. The system will automatically save updated data. </span>
</div>
<div class="portlet-body">
<?php ///////////////////////////////////////////////////////////////////////////////////////// ?>
<br />
<div style="background-color:#fff;padding:5px;width:96%;margin:auto; overflow:auto;" class="form_div">

<form method="POST" id="contact-form" enctype="multipart/form-data">
<div class="row-fluid">
<div class="span6">



<label style="font-size:14px;">Society PAN #<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" maxlength="10"  class="m-wrap span9" style="font-size:16px;" field="society_pan"  name="pan" value='<?php echo $society_pan ; ?>'>
</div>
<br />

<label style="font-size:14px;">Society Registrations Number<span style="color:red;">*</span></label>
<div class="controls">
<input type="text"   class="m-wrap span9" style="font-size:16px;" field="society_reg_no"  name="s_number" value='<?php echo $society_reg_num ; ?>'>
</div>
<br />

<label style="font-size:14px;">Registered Address of Society<span style="color:red;">*</span></label>
<div class="controls">
<textarea rows='5' cols='5' style='resize:none;' name='address' field="society_add"  class="m-wrap span9"><?php echo $society_address ; ?></textarea>
</div>
<br />



<label style="font-size:14px;">Society Signature<span style="color:red;">*</span></label>
<div class="controls">
<div class="fileupload fileupload-new" data-provides="fileupload">
<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
<?php if(empty($society_sig)){ ?>
<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
<?php }else{ ?>
<span id="sig_hide"><img src="<?php echo $webroot_path; ?>sig/<?php echo $society_sig; ?>" alt=""> </span>
<?php } ?>
</div>
<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
<div>
<span class="btn btn-file"><span class="fileupload-new">Select image</span>
<span class="fileupload-exists">Change</span>
<input type="file" class="default change_file" field="society_signature" name="sig"></span>
<a href="#" class="btn fileupload-exists rem_sig" data-dismiss="fileupload">Remove</a>
</div>
</div>
<label id="sig_vali"></label>
</div>
<br />


<label style="font-size:14px;">Society Logo<span style="color:red;">*</span></label>
<div class="controls">
<div class="fileupload fileupload-new" data-provides="fileupload">
<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
<?php if(empty($society_logo)){ ?>
<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
<?php }else{ ?>
<span id="img_hide"><img src="<?php echo $webroot_path; ?>sig/<?php echo $society_logo; ?>" alt=""></span>
<?php } ?>
</div>
<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
<div>
<span class="btn btn-file"><span class="fileupload-new">Select image</span>
<span class="fileupload-exists">Change</span>
<input type="file" class="default change_file" field="society_logo" name="logo" value=""></span>
<a href="#" class="btn fileupload-exists rem" data-dismiss="fileupload">Remove</a>
</div>
</div>
<label id="sig_vali"></label>
</div>
<br />


<!--
<label style="font-size:14px;">Society Logo<span style="color:red;">*</span></label>
<div class="controls">
<div class="fileupload <?php if(empty($society_logo)){ ?> fileupload-new <?php }else{ ?> fileupload-exists <?php } ?>" data-provides="fileupload">
<div class="<?php if(empty($society_logo)){ ?> fileupload-new <?php }else{ ?> fileupload-exists <?php } ?> thumbnail hide_remo " style="width: 200px; height: 150px;">
<?php if(empty($society_logo)){ ?>
<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
<?php }else{ ?>
<img src="<?php echo $webroot_path; ?>logo/<?php echo $society_logo; ?>" alt="">
<?php } ?>
</div>
<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
<div>
<span class="btn btn-file"><span class="fileupload-new">Select image</span>
<span class="fileupload-exists">Change</span>
<input type="file" class="default change_file" field="society_logo" name="logo" value=""></span>
<a href="#" class="btn fileupload-exists rem" data-dismiss="fileupload">Remove</a>
</div>
</div>
</div>
<br />-->







</div>
<div class="span6">
<h4 style="color:#999;">Optional Field</h4>
<br />

<label style="font-size:14px;">Society Service Tax Number</label>
<div class="controls">
<input type="text" class="m-wrap span9" style="font-size:16px;" field="society_ser_tax"  name="s_tax" value='<?php echo $tex_number ; ?>'>
</div>
<br />

<label style="font-size:14px;">Society Phone Number</label>
<div class="controls">
<input type="text" class="m-wrap span9" name="society_phone" field="society_ph_num" value="<?php echo $society_phone; ?>" />
</div>
<br />

<label style="font-size:14px;">Society E-mail</label>
<div class="controls">
<input type="text" class="m-wrap span9" name="society_email" field="society_email" value="<?php echo $society_email; ?>" />
</div>
<br />

<label style="font-size:14px;">Signature Title<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span9" name="title" field="society_signature" value="<?php echo @$sig_title; ?>" />
</div>
<br />

</div>
</div>
<!--<hr/>
<button type="submit" class="btn blue" id="go">Update </button>
<br /><br />-->
</form>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////// ?>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function(){
	
	$('.rem').click(function(){
		
		$('#img_hide').css("display", "none");
		
	});
	
	$('.rem_sig').click(function(){
		
		$('#sig_hide').css("display", "none");
		
	});
	
	$('input,textarea').blur(function(){
		var field=$(this).attr('field');
		var update=$(this).val();
		$.ajax({
			url: "<?php echo $webroot_path; ?>/Hms/society_detail_auto_save/"+field+"/"+update,
			}).done(function(response) {
				
		});	
	});
	
	$('.change_file').change(function(){ 
		var m_data = new FormData(); 
		var field=$(this).attr('field');
		m_data.append( 'file', $(this)[0].files[0]);
		m_data.append( 'field',field );
		$.ajax({
			url: "<?php echo $this->webroot;?>hms/society_detail_auto_save_file_upload",
			data: m_data,
			processData: false,
			contentType: false,
			type: 'POST',
		}).done(function(response) {
			
		});
		
	});
	
 $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "Only enter alphanumeric letters.");


		$('#contact-form').validate({
	    rules: {
				pan: {
				required: true,
				loginRegex : true 
				},

					  
				s_number: {
				required: true,
				},
		
		title: {
				required: true,
				},
		
		
		       address: {
				  required: true, 
			      },
		 
				mobile: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
				remote: "signup_mobileexit"
				}
	    },
		            messages: {
	                email: {
	                    remote: "Login-Id is Already Exist."
	                },
					 mobile: {
	                    remote: "Mobile-No is Already Exist."
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

<script>
$(document).ready(function() {
	<?php	
	$society_detail=(int)$this->Session->read('society_detail');
	if($society_detail==1)
	{
	?>
	$.gritter.add({
	title: 'Success',
	text: '<p>Society Detail Updated Successfully</p>',
	sticky: false,
	time: '10000',
	});
	<?php
	$this->requestAction(array('controller'=>'hms','action'=>'griter_notification'),array('pass' => array('society_detail')));
	} ?>
	});
</script>  












