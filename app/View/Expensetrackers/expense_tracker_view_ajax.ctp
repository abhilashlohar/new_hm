<style>
.table th{
   background-color:#FFF;padding:3px 5px 3px 5px !important;  white-space: nowrap;
}
.table td{
   background-color:#FFF;padding:3px 5px 3px 5px !important;  white-space: nowrap;
} 
</style>

<div style="">
<div align="center"> 
<span style="font-size:16px;"><?php echo $society_name; ?><span>
<br/>
<span>Expense Tracker: <?php echo $from; ?> to <?php echo $to; ?> <span>
</div>
<div align="right" class="hide_at_print">
<a href="expense_tracker_excel?to=<?php echo $to; ?>&from=<?php echo $from; ?>" class="btn blue mini"><i class="icon-download"></i></a>
<a  class="btn green mini" onclick="window.print()" ><i class="icon-print"></i>  </a>
<!--<button type="button" class=" printt btn green mini" onclick="window.print()"><i class="icon-print"></i> Print</button>
<a href="expense_tracker_pdf?to=<?php echo $to; ?>&from=<?php echo $from; ?>" class="btn purple">Pdf</a>-->
</div>
</div>
<div style="width:100%; overflow:auto; margin-top:10px;" class="hide_at_print">
<label class="m-wrap pull-right"><input type="text" id="search" class="m-wrap medium" style="background-color:#FFF !important;" placeholder="Search"></label>	
</div>	
<div style="width:100%; overflow-x:scroll;"> 
<table class="table table-bordered table-striped table-hover" width="100%" id="table_ex">
<thead>
<tr>
<th >Voucher Id</th>
<th >Posting date</th>
<th >Date of Invoice</th>
<th >Due Date</th>
<th >Party Account Head </th>
<th >Invoice Reference</th>
<th >Expense Head</th>
<th width="20%">Description</th>
<th >Amount</th>
<th class="hide_at_print"><span style="font-size:14px;"><i class="icon-paper-clip"></i></span></th>
</tr>

</thead>
<tbody id="count_row">
<?php 
//pr($result_expense_tracker);
$total=0;
foreach($result_expense_tracker as $data){
	$expense_tracker_id=$data['expense_tracker']['expense_tracker_id'];
	$user_id=(int)$data['expense_tracker']['user_id'];
	$voucher_id=$data['expense_tracker']['expense_id'];
	$posting_date=$data['expense_tracker']['posting_date'];
	$posting_date=date('d-m-Y',$posting_date);
	$creation_date = $data['expense_tracker']['current_date'];
	$due_date=$data['expense_tracker']['due_date'];
	$cancel_user=@$data['expense_tracker']['cancel_user'];
	$cancled=@$data['expense_tracker']['cancled'];
	$cancled_on=@$data['expense_tracker']['cancled_on'];
	
	$creation_date = date('d-m-Y',strtotime($creation_date));
	
	if(!empty($due_date)){
	$due_date=date('d-m-Y',$due_date);
	}
	$date_of_invoice=$data['expense_tracker']['date_of_invoice'];
	$date_of_invoice=date('d-m-Y',$date_of_invoice);
	$expense_head=$data['expense_tracker']['expense_head'];
	$invoice_reference=$data['expense_tracker']['invoice_reference'];
	$party_ac_head=(int)$data['expense_tracker']['party_ac_head'];
	$ammount_of_invoice=$data['expense_tracker']['ammount_of_invoice'];
	$description=$data['expense_tracker']['description'];
	$edited_by=@$data['expense_tracker']['edited_by'];
	$edited_on=@$data['expense_tracker']['edited_on'];
	if(!empty($edited_by)){
		
		$member_info_edit = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array($edited_by)));
		$wing_flats=$member_info_edit['wing_flat'];
		foreach($wing_flats as $wing_flat){
			
		}
		$edit_info="<br/><b>Edited By: </b>".$member_info_edit["user_name"]." ".$wing_flat."<br/><b>Edited On: </b>".$edited_on."";	
	}else{
		$edit_info="";
	}
	
	if(!empty($cancel_user)){
		
		$member_info_edit = $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array((int)$cancel_user)));
		$wing_flats=$member_info_edit['wing_flat'];
		foreach($wing_flats as $wing_flat){
			
		}
		$cancel_info="<br/><b>Canceled By: </b>".$member_info_edit["user_name"]." ".$wing_flat."<br/><b>Canceled On: </b>".$cancled_on."";	
	}else{
		$cancel_info="";
	}
	
	@$file=$data['expense_tracker']['file'];
	$result_ledger_account = $this->requestAction(array('controller' => 'hms', 'action' => 'ledger_account_fetch2'),array('pass'=>array($expense_head)));
	foreach($result_ledger_account as $collection){
	$ledger_name = $collection['ledger_account']['ledger_name'];
	}

	$result_ledger_sub_account = $this->requestAction(array('controller'=>'Fns','action'=> 'fetch_ledger_sub_account_info_via_ledger_sub_account_id'),array('pass'=>array($party_ac_head)));
	foreach($result_ledger_sub_account as $collection)
	{
	 $party_name = $collection['ledger_sub_account']['name'];
	}
$result_user = $this->requestAction(array('controller' => 'hms', 'action' => 'profile_picture'),array('pass'=>array($user_id)));
$prepaired_by_name=$result_user[0]['user']['user_name'];
?>
<tr>
<td><?php echo $voucher_id; ?></td>
<td><?php echo $posting_date; ?></td>
<td><?php echo $date_of_invoice; ?></td>
<td><?php echo $due_date; ?></td>
<td><?php echo $party_name; ?></td>
<td><?php echo $invoice_reference; ?></td>
<td><?php echo $ledger_name; ?></td>
<td><?php echo $description; ?></td>
<td style="text-align:right;"><?php echo $ammount_of_invoice; ?> <?php $total+=$ammount_of_invoice ; ?></td>
<td class="hide_at_print">

<div class="btn-group">
<a class="btn blue mini" href="#" data-toggle="dropdown">
<i class="icon-chevron-down"></i>	
</a>
<ul class="dropdown-menu" style="min-width: 80px ! important; margin-left: -52px;">
<?php if(empty($cancel_user)){ ?>
<li><a href="expense_tracker_update/<?php echo $expense_tracker_id; ?>"><i class="icon-edit"></i>Edit</a> </li>
<?php } ?>
<?php if(empty($cancel_user)){ ?>
<li><a href="#" role="button" class="cancel_voucher" voucher_id="<?php echo $expense_tracker_id; ?>"><i class="icon-remove"></i> Cancel</a> </li>
<?php } ?>
</ul>
</div>

<a href="#" class="btn mini black popovers" data-trigger="hover" data-placement="left" data-content="<b>Generated By: </b><?php echo $prepaired_by_name ?><br/><b>Generated On: </b><?php echo $creation_date ?><?php echo @$edit_info; ?><?php echo @$cancel_info; ?>" role="button"><i class="icon-exclamation-sign"></i></a>
<!--
<i class="icon-info-sign tooltips" data-placement="left" data-original-title="Created By: <?php echo $prepaired_by_name; ?> on: <?php echo $creation_date; ?>"></i> -->

<?php if(!empty($file)){ ?><a href="<?php echo $webroot_path ; ?>/expenset/<?php echo $file; ?>" target="_blank" class=""  download=""> <i class=" icon-download-alt"></i></a><?php } ?>

</td>
</tr>
<?php } ?>

<tr>
<td colspan="8" style="text-align:right;"> <b> Total </b> </td>
<td style="text-align:right;" > <b><?php echo $total; ?></b> </td>
<td class="hide_at_print"></td>

</tr>

</tbody>
</table>
</div>

<script>
jQuery('.popovers').popover({html: true});
		 var $rows = $('#count_row tr');
		 $('#search').keyup(function() {
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
			
			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				return !~text.indexOf(val);
			}).hide();
		});
		
		
$(document).ready(function() {		
	$(".cancel_voucher").die().live('click',function(){
	$(".edit_div").show();
	var voucher_id=$(this).attr("voucher_id");
	
	$("#confirm_msg").html('<div align="center" style="padding:20px;"><img src="<?php echo $this->webroot ; ?>/as/indicator_blue_small.gif" /><br/><h5>Please Wait</h5></div>').load('<?php echo $this->webroot; ?>Expensetrackers/cancel_voucher?v_id='+voucher_id+'&delete=0');
	});
	
	 $("#close_edit").die().live('click',function(){
		$(".edit_div").hide();
	 });
	 
	 $(".cancel_voucher_btn").die().live('click',function(){
		var voucher_id=$(this).attr("voucher_id");
		var resion=$("#resion").val();
		
		$("#confirm_msg").load('<?php echo $this->webroot; ?>Expensetrackers/cancel_voucher?v_id='+voucher_id+'&delete=1&resion='+resion, function() {
			
		});
		
	 });
});
 </script>	






