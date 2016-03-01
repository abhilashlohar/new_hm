<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>

<div class="portlet box blue">
	<div class="portlet-title">
	<h4 class="block"><i class="icon-reorder"></i>Create regular bill</h4>
	</div>
	<div class="portlet-body form">
	<!-- BEGIN FORM-->
	<form method="post" class="form-horizontal">
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">
				  <label class="control-label">Billing Cycle<span style="color:red;">*</span></label>
				  <div class="controls">
					<select class="span6 m-wrap" name="billing_cycle">
						<option value="" >--Billing Cycle--</option>
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
					<input type="text" name="start_date" class="m-wrap span7 date-picker" data-date-format="dd-mm-yyyy" placeholder="Billing Start Date">
				  </div>
			   </div>
			   
			    <div class="control-group">
				  <label class="control-label">Payment Due Date<span style="color:red;">*</span></label>
				  <div class="controls">
					<input type="text" name="due_date" class="m-wrap span7 date-picker" data-date-format="dd-mm-yyyy" placeholder="Payment Due Date"style="border-color:rgb(206, 73, 73);" >
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
					<input type="radio" value="all" name="bill_for" checked> All Units 
					</label>
					<label class="radio">
					<input type="radio" value="wing_wise" name="bill_for"> Wing Wise
					</label>
				  </div>
				</div>
				
				<div class="control-group">
				  <div class="controls">
				  <?php foreach($result_wing as $wings){
					$wing_id=$wings["wing"]["wing_id"];
					$wing_name=$wings["wing"]["wing_name"];?>
					<label><input type="checkbox" value="<?php echo $wing_id; ?>" name="wings[]"><?php echo $wing_name; ?></label>
				  <?php } ?>
					
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label">Billing Description</label>
				  <div class="controls">
					<input type="text" name="description" class="m-wrap span12" placeholder="Billing Description" >
				  </div>
			   </div>
			</div>
		</div>
		<div class="form-actions">
		  <button type="submit" class="btn blue" name="preview">Preview Bills</button>
		</div>
	</form>
	<!-- END FORM-->
	</div>
</div>