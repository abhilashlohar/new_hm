<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));
?>

<?php 
foreach($result_society as $data){
  $select_income_head_array = @$data['society']['income_head'];
  $penalty_tax = @$data['society']['tax'];
  $neft_type = @$data['society']['neft_type'];
}
	$nn=55; 
	if(!empty($select_income_head_array)){
	foreach($select_income_head_array as $income_head){  
	foreach($flat_type_ids as $flat_type_id){  
	$rate_card_count = $this->requestAction(array('controller' => 'Fns', 'action' => 'rate_card_info_via_flat_type_id_and_income_head_id'),array('pass'=>array(@$flat_type_id,@$income_head)));  
		 if($rate_card_count == 0)
		 {
			$nn=555;
			break;		
		 }		 
	}}}


$nnn=55; 

	if(!empty($flat_type_idss)){
	foreach($flat_type_idss as $flat_type_id){
	$noc_card_count = $this->requestAction(array('controller' => 'Fns', 'action' => 'noc_rate_info_via_flat_type_id'),array('pass'=>array((int)$flat_type_id)));  
		
		 if($noc_card_count == 0)
		 {
			$nnn=555;
			break;		
		 }		 
	}}


	 
if(empty($select_income_head_array) || empty($penalty_tax) || empty($neft_type) || $nn==555 || $nnn==555)
{
?>
<br>
<center>
<div style="width:100%;">
<br>
	<ul>
	    <?php if(empty($select_income_head_array)){ ?>
		<li style="text-align:left;"><p style="font-size:18px;">Please Select Income Heads in Selection of Income Head</p></li><?php } ?>
		<?php if(empty($penalty_tax)){ ?>
		<li style="text-align:left;"><p style="font-size:18px;">Please Fill Penalty</p></li>
		<?php } ?>
		<?php if(empty($neft_type)){ ?>
		<li style="text-align:left;"><p style="font-size:18px;">Please Fill NEFT Detail</p></li>
		<?php } ?>
		<?php if($nn==555 || empty($select_income_head_array)){?>
		<li style="text-align:left;"><p style="font-size:18px;">Please Fill Rate Card</p></li>
		<?php } ?>
		<?php if($nnn==555){?>
		<li style="text-align:left;"><p style="font-size:18px;">Please Fill NOC Charges</p></li>
		<?php } ?>
		<?php if($ledger_sub_account_data == 0){ ?>
		<li style="text-align:left;"><p style="font-size:18px;">There is no any member for billing</p></li>	
		<?php } ?>
	</ul>
<br>
</div>
</center>
<?php } ?>

<?php 

if(sizeof($result_regular_bill_temp)>0){
	echo'<center><h5><b>Your bills are already under process </b></h5> <a href="preview_regular_bill" class="btn blue" role="btn" >Preview bills </a> </center>';
	goto a;
}


?>

<?php if(!empty($select_income_head_array) && !empty($penalty_tax) && !empty($neft_type) && $nn==55 && $nnn==55){ ?>

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
					<select class="span6 m-wrap" name="billing_cycle" required="required">
						<option value="" >--Billing Cycle--</option>
						<option value="1">Monthly</option>
						<option value="2">Bi-Monthly</option>
						<option value="3">Quarterly</option>
						<option value="6">Half Yearly</option>
						<option value="12">Yearly</option>
					</select>
				  </div>
			   </div>
			   
			   <div class="control-group">
				  <label class="control-label">Billing Start Date<span style="color:red;">*</span></label>
				  <div class="controls">
					<input type="text" name="start_date" class="m-wrap span7 date-picker" data-date-format="dd-mm-yyyy" placeholder="Billing Start Date" required="required">
				  </div>
			   </div>
			   
			    <div class="control-group">
				  <label class="control-label">Payment Due Date<span style="color:red;">*</span></label>
				  <div class="controls">
					<input type="text" name="due_date" class="m-wrap span7 date-picker" data-date-format="dd-mm-yyyy" placeholder="Payment Due Date"style="border-color:rgb(206, 73, 73);" required="required">
				  </div>
			   </div>
			</div>
			<div class="span6">
				<div class="control-group">
				  <label class="control-label">Penalty</label>
				  <div class="controls">
					<label class="radio">
					<input type="radio" value="yes" name="panalty" checked>Yes
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
				
				<div class="control-group" style="display: none;" id="wing_box">
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

<?php } a: ; ?>

<script>
$(document).ready(function(){
	$("input[name=bill_for]").on("click",function(){
		var bill_for=$(this).val();
		if(bill_for=="wing_wise"){
			$("#wing_box").show();
		}else{
			$("#wing_box").hide();
		}
	});
});
</script>
