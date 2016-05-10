                  
<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>

<div class="row-fluid" >
					<div style='width:80%;margin:auto;'>
                        <div class="row-fluid"  >
              			 <div class="">
                  <!-- BEGIN VALIDATION STATES-->
                 		 <div class="portlet box green">
                     <div class="portlet-title">
                        <h4><i class="icon-file" style='font-size:16px;'></i>Add Resources</h4>
                        
                     </div>
                     <div class="portlet-body form">
                        <h3 class="block"></h3>
                        <!-- BEGIN FORM-->
                        <form  id="contact-form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        
						 
						
						 
                           <div class="control-group ">
                              <div class="controls">
                               <label class="" style="font-size:14px;" >Title <span style="color:red;">*</span> <span style="font-size:12px; color:#999;">(Maximum 100 characters.)</span></label>
                                 <input type="text" class="span6 m-wrap" id="inputWarning" name="title" maxlength="100">
								 <label id="inputWarning"></label>
                              </div>
                           </div>
                          
                           <div class="control-group ">
                              <div class="controls">
                               <label class="" style="font-size:14px;">Category <span style="color:red;">*</span> </label>
                                 <select name="sel" id="category" class="span6 m-wrap chosen" >
                            <option value="">--Please select any category--*</option>
                                                 
                            <?php
                         
				foreach ($result_resource_category as $collection) 
				{
					$resource_cat_id=$collection['resource_category']["resource_cat_id"];
					$resource_cat_name=$collection['resource_category']["resource_cat_name"];
				
				?>
                            <option value="<?php echo $resource_cat_id ?> "><?php echo $resource_cat_name ?></option>
                            <?php } ?>
                            </select> 
                            <label id="category"></label>                            
                              </div>
                           </div>
                           <div class="control-group ">
                              <div class="controls">
                              <label class="" style="font-size:14px;">Attachment  <span style="font-size:12px; color:#999; margin:2%">(Limit 2MB)</span></label>
                                
                               <input name="file" class="default" type="file" multiple id='att'>
                              <label id="att"></label>



                              </div>
                           </div>
                           <?php
	$sending_options=$this->requestAction(array('controller' => 'Fns', 'action' => 'sending_options'));
	?> 
              
			
			
			
			
                           <div class="form-actions">
                              <input type="submit" class="btn green" value="Publish" name="sub">
                           </div>
                          
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END VALIDATION STATES-->
               </div>
            </div>
					</div>
				</div>
				
				
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

$.validator.addMethod('requirecheck1', function (value, element) {
	 return $('.requirecheck1:checked').size() > 0;
}, 'Please check at least one role.');

$.validator.addMethod('requirecheck2', function (value, element) {
	 return $('.requirecheck2:checked').size() > 0;
}, 'Please check at least one wing.');

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

$.validator.setDefaults({ ignore: ":hidden:not(select)" });
		$('#contact-form').validate({
		
		errorElement: "label",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        //error.appendTo("label#errors");
						error.appendTo('label#' + element.attr('id'));
                    }, 
	    groups: {
            asdfg: checkbox_names,
			qwerty: checkbox_names2
        },
	    rules: {
	      title: {
	       
	        required: true,
			maxlength:100
	      },
		 
		   sel: {
	       
	        required: true
	      },
		  file: {
	       
	        required: true,
			filesize: 2097152
	      },
		  
	    },
		messages: {
	                title: {
	                    maxlength: "Please Maximum 50 characters."
	                },
					file: {
	                   filesize: "File size must be less than 2MB."
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
			submitHandler: function () {
				
				$("input[name=sub]").attr('disabled','disabled');
				
				 form.submit();
			}
	  });

}); 
</script>			