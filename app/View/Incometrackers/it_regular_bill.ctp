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
	} }
foreach($result_society as $data){
		$society_name=$data["society"]["society_name"];
		$society_reg_num=$data["society"]["society_reg_num"];
		$society_address=$data["society"]["society_address"];
		$society_email=$data["society"]["society_email"];
		$society_phone=$data["society"]["society_phone"];
		$terms_conditions=$data["society"]["terms_conditions"];
		$signature=$data["society"]["signature"];
		$sig_title=$data["society"]["sig_title"];
	    $neft_type = @$data["society"]["neft_type"];
	    $neft_detail = @$data["society"]["neft_detail"];
	    $society_logo = @$data["society"]["logo"];
		$area_scale = (int)@$data["society"]["area_scale"];
		$email_is_on_off=(int)@$data["society"]["account_email"];
		$sms_is_on_off=(int)@$data["society"]["account_sms"];
		}
	 
if(empty($select_income_head_array) || empty($penalty_tax) || empty($neft_type) || $nn==555 || $nnn==555 || $financial_year_count==0 || empty($society_reg_num) || empty($society_address) || empty($sig_title))
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
		<?php if($financial_year_count == 0){ ?>
		<li style="text-align:left;"><p style="font-size:18px;">Kindly Open Financial Year.</p></li>	
		<?php } ?>
		<?php if(empty($society_reg_num) || empty($society_address) || empty($society_email) || empty($society_phone) || empty($sig_title) || empty($society_logo)){ ?>
		<li style="text-align:left;"><p style="font-size:18px;">Kindly Fill the Society Details.</p></li>	
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

<?php if(!empty($select_income_head_array) && !empty($penalty_tax) && !empty($neft_type) && $nn==55 && $nnn==55 && $financial_year_count>0 && !empty($society_reg_num) && !empty($society_address) && !empty($sig_title)){ ?>
<input type="hidden" id="validat_value">
<input type="hidden" id="validat_date">
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
		<p id="start_date" style="color: rgb(198, 4, 4);
font-size: 11px;"></p>
				  </div>
			   </div>
			   
			    <div class="control-group">
				  <label class="control-label">Payment Due Date<span style="color:red;">*</span></label>
				  <div class="controls">
					<input type="text" name="due_date" class="m-wrap span7 date-picker" data-date-format="dd-mm-yyyy" placeholder="Payment Due Date"style="border-color:rgb(206, 73, 73);" required="required">
						<p id="due_date" style="color: rgb(198, 4, 4);
font-size: 11px;"></p>
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

<script>
$(document).ready(function(){
	$("form").on("submit",function(e){
		
		var allow="yes";
		var value=$("#validat_value").val();
		var date_valid=$("#validat_date").val();
		
		//value=10;
	    if(value==5){
			allow="no";
			$('#start_date').html('Bills already generated for this period');
		}
		else{
			$('#start_date').html('');
		}

		var start_date=$('input[name="start_date"]').val();
		var transaction_date=start_date;
		var due_date=$('input[name="due_date"]').val();
		start_date=start_date.split('-').reverse().join('');
		due_date=due_date.split('-').reverse().join('');
		if(due_date<start_date){
			allow="no";
			$('#due_date').html('Due date is small than start date');
		}else{
		  //$('#due_date').html('');	
		}
		
		if(date_valid==3){
			allow="no";
			$('#due_date').html('Due date is Big according billing cycle');
		}
		else{
			//$('#due_date').html('');
		}
		
		$.ajax({
			url:"financial_year_validation_open/"+transaction_date, 
			async: false,
			success: function(data){
			result=data;
			}
		});	
		if(result==0){
			allow="no";
			$('#start_date').html('Financial year is not open for transaction date');
		}else{
			//$('#start_date').html('');
		}
		
		if(allow=="no"){
			e.preventDefault();
		}
		
		if(allow=="yes"){
			$(".sucess_msg").show();
		}
	});
});  
</script>
<div class="sucess_msg" style="display:none ;">
<div class="modal-backdrop fade in"></div>
<div class="modal"  id="confirm_msg">
	<div class="modal-body" align="center">
		<img src="<?php echo $webroot_path; ?>as/fb_loading.gif" ><BR/>
		<h5>Please Wait, Preparing Bills Preview.</h5>
	</div>
</div>
</div>
<script>
function validation(t){
$('#validat_value').val(t);	
}

function validation_date(t){
$('#validat_date').val(t);	
}
</script>
<script>
$('select[name="billing_cycle"]').die().live("change",function(){ 
   validation_due_date();
});	
$('input[name="start_date"]').die().live("blur",function(){ 
			var start_date=$(this).val();
				var a1=0;	    
					$.ajax({url:"regular_bill_validation_ajax/"+start_date, 
						success: function(result){
					if(result=="match"){
					//validation(5)
				//$('#start_date').html('Bills already generated for this period');
				}else{
					$('#start_date').html('');
				validation(10)		
			}
			}
		});
	});	
	
	$('input[name="due_date"]').die().live("blur keyup",function(){	
	  var due_date=$(this).val();
	  var start_date=$('input[name="start_date"]').val();
	   var billing_cycle=$('select[name="billing_cycle"]').val();
	   var start=start_date;
	    var due=due_date;
	    start_date=start_date.split('-').reverse().join('');
		due_date=due_date.split('-').reverse().join('');
		if(due_date<start_date){
			$('#due_date').html('Due date is small than start date');
		}else{
		  $('#due_date').html('');	
		}
		$.ajax({
			url:"regular_bill_validation/"+start+"/"+due+"/"+billing_cycle, 
		}).done(function(response){
		 
		 	if(response=="error"){
				$('#due_date').html('Due date is Big according billing cycle');
				validation_date(3);
				}else{
				   validation_date(10);
					$('#due_date').html('');
				}
			});
		});
	function validation_due_date(){
		
	   var start=$('input[name="start_date"]').val();
	   var billing_cycle=$('select[name="billing_cycle"]').val();
	   var due=$('input[name="due_date"]').val();
		$.ajax({
			url:"regular_bill_validation/"+start+"/"+due+"/"+billing_cycle, 
		}).done(function(response){
		  if(response=="error"){
				$('#due_date').html('Due date is Big according billing cycle');
				validation_date(3);
				}else{
				   validation_date(10);
					$('#due_date').html('');
				}
			});
	}
	
</script>









