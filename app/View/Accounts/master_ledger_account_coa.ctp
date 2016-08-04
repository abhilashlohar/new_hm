<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>				   

<center>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_account_coa" class="btn yellow" rel='tab'>Ledger Accounts Add</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_sub_accounts_coa" class="btn" rel='tab'>Ledger Sub Accounts Add</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_accounts_view" class="btn" rel='tab'>Master Ledger  Account View</a>
<a href="<?php echo $webroot_path; ?>Accounts/master_ledger_sub_account_view" class="btn" rel='tab'>Master Ledger Sub Account View</a>
</center>
<input type="hidden" id="yy" value="<?php echo $y; ?>" />
<input type="hidden" id="ledger" value="<?php echo $ledger2; ?>" />

<form method="post" id="contact-form"> 
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block"><i class="icon-reorder"></i>Add Ledger Account</h4>
</div>
<div class="portlet-body form">


<label style="font-aize:14px;">Accounts Group <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></label>
<div class="controls">
<select class="m-wrap chosen span5" name="main_id" id="go">
<option value="" style="display:none;">Select Accounts Group</option>
<?php
foreach ($cursor1 as $collection) 
{
$auto_id = (int)$collection['accounts_groups']['auto_id'];
$name = $collection['accounts_groups']['group_name']; 
?>
<option value="<?php echo $auto_id; ?>"><?php echo $name; ?></option>
<?php } ?>
</select>
<label id="go"></label>
</div>
<br>



<label style="font-size:14px;">Ledger Account <span style="color:red; font-size:10px;"><i class=" icon-star"></i></span></label>
<div class="controls">
<input type="text" name="cat_name" placeholder="Name" class="m-wrap span5" style="background-color:white !important;" id="cat">
<label id="cat"></label>
<div id="over"></div>
</div>
<br>

<div id="result">
</div>



<div class="form-actions">
<button type="submit" name="sub" class="btn blue" id="vali">Add</button>                            
</div>

</div>
</div>
</form>

<script>
$(document).ready(function() {
	$("#go").bind('change',function(){
		var value = document.getElementById('go').value;
		
		$("#result").load("master_ledger_account_ajax?value=" +value+ "");
		
		
	});
	
});
</script>			   
			   
			   
<script>

$(document).ready(function(){
		$.validator.setDefaults({ ignore: ":hidden:not(select)" });
		
		$('#contact-form').validate({ 
		
		errorElement: "label",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        //error.appendTo("label#errors");
						error.appendTo('label#' + element.attr('id'));
                    },
					
	    rules: {
	      main_id: {
	       
	        required: true,
			
	      },
		  
		  
		  cat_name: {
	       
	        required: true,
			remote: {
					url: "master_ledger_account_validation",
					type: "post",
					data: {
					main_id: function() { return $('select[name=main_id]').val();}
					
					}
			},
			
	      },
		  
		   rate: {
	       
	        required: true
	      },
		  
		  
		  
		   amount: {
	       
	        required: true
	      },
		 
		},
		messages: {
	                cat_name: {
	                    remote: "The ledger name is already exist,Please select another"
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
			submitHandler: function () {
				//$("button[name=sub]").attr('disabled','disabled');
			    form.submit();
			}
	  });

}); 
</script>			   
			   
<script>			   
$(document).ready(function(){	


 });
</script>			   
		   
			   
<script>
$(document).ready(function() {
<?php	
$status5=(int)$this->Session->read('ledd_accc');
if($status5==1)
{
?>
$.gritter.add({
title: 'Success',
text: '<p>Ledger Account added sucessfully.</p>',
sticky: false,
time: '10000',
});
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(3101)));
} ?>
});
</script> 	   

			   