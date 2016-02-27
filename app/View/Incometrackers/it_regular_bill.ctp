<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>

<div class="portlet box blue">
	<div class="portlet-title">
	<h4 class="block"><i class="icon-reorder"></i>Create regular bill</h4>
	</div>
	<div class="portlet-body form">
	<!-- BEGIN FORM-->
	<form action="#" class="form-horizontal">
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">
				  <label class="control-label">Billing Cycle<span style="color:red;">*</span></label>
				  <div class="controls">
					<select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1">
						<option value="" >--Select--</option>
						<option value="1">Monthly</option>
						<option value="2">Bi-Monthly</option>
						<option value="3">Quarterly</option>
						<option value="4">Half Yearly</option>
						<option value="5">Yearly</option>
					</select>
				  </div>
			   </div>
			   
			   <div class="control-group">
				  <label class="control-label">Billing Start Date<span style="color:red;">*</span></label>
				  <div class="controls">
					<input class="m-wrap span7 date-picker" data-date-format="dd-mm-yyyy" placeholder="Bill Date" id="from" type="text">
				  </div>
			   </div>
			   
			    <div class="control-group">
				  <label class="control-label">Payment Due Date<span style="color:red;">*</span></label>
				  <div class="controls">
					<input class="m-wrap span7 date-picker" data-date-format="dd-mm-yyyy" placeholder="Due Date" id="due" style="border-color:rgb(206, 73, 73);" type="text">
				  </div>
			   </div>
			</div>
			<div class="span6">
				<div class="control-group">
				  <label class="control-label">Penalty</label>
				  <div class="controls">
					<label class="radio">
					<input type="radio" value="yes" name="panalty">Yes
					</label>
					<label class="radio">
					<input type="radio" value="no" name="panalty">No
					</label>
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label">Bill For<span style="color:red;">*</span></label>
				  <div class="controls">
					<label class="radio">
					<input type="radio" value="all" name="panalty" checked> All Units 
					</label>
					<label class="radio">
					<input type="radio" value="wing_wise" name="panalty"> Wing Wise
					</label>
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label">Billing Description</label>
				  <div class="controls">
					<input type="text" class="m-wrap span12" placeholder="Billing Description" >
				  </div>
			   </div>
			</div>
		</div>
		<div class="form-actions">
		  <button type="submit" class="btn blue">Save</button>
		  <button type="button" class="btn">Cancel</button>
		</div>
	</form>
	<!-- END FORM-->
	</div>
</div>