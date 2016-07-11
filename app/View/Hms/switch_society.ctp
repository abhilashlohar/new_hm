<div class="row-fluid">
   <div class="span12">
	  <!-- BEGIN PORTLET-->   
	  <div class="portlet box green">
		 <div class="portlet-title">
			<h4><i class="fa fa-home" aria-hidden="true"></i> Switch Society</h4>
		 </div>
		 <div class="portlet-body form">
			<!-- BEGIN FORM-->
		   <form novalidate="novalidate" method="post" class="form-horizontal" id="contact-form">
				<?php foreach($hms_rights as $hms_right){ 
				$society_id=(int)$hms_right["hms_right"]["society_id"];?>
					 <label class="radio line">
					 <input name="society_id" value="<?php echo $society_id; ?>" type="radio" <?php if($s_society_id==$society_id){ echo 'checked=""'; } ?>>
					 <?php echo @$this->requestAction(array('controller' => 'Fns', 'action' => 'society_name_via_society_id'), array('pass' => array($society_id))); ?>
					 </label><br/>
				<?php } ?>
			   <div class="form-actions">
				  <button type="submit" class="btn green" name="submit">Submit</button>
				 
			   </div>
			</form>
			<!-- END FORM-->  
		 </div>
	  </div>
	  <!-- END PORTLET-->
   </div>
</div>