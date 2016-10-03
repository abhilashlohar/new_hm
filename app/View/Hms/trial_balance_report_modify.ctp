
<center>
<h5> <b> All Society Report <?php echo date("d-m-Y",$from).' to '. date("d-m-Y",$to) ;?> </b> </h5>

</center>
</div>

    
	<a class="btn purple send_email" style="float:right"> Send Email</a>
	<a href="trial_balance_report_closed" class="btn red " style="float:right;margin-right: 4px;">Cancel</a>
</div>
<div id="send_data">
<div id="report" style="display:none;">
<center>
<h5> <b> All Society Report <?php echo date("d-m-Y",$from).' to '. date("d-m-Y",$to) ;?> </b> </h5>

</center>
</div>
<table class="table table-bordered " width="100%" style="background-color: aliceblue;">
	<thead>
		<tr>
			<th style="text-align: left;">Date :  <?php echo $date; ?> </th>
			
			<th style="text-align: center;" colspan="2">Closing Balance</th>
			<th></th>
		</tr>
		<tr>
			<th style="text-align: left;">Society Name</th>
			<th style="text-align: right;width: 10%;">Debit</th>
			<th style="text-align: right;width: 10%;">Credit</th>
			<th  style="text-align: center;">Status</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	foreach($result_trial_balance as $data){
		$society_name=$data['trial_balance_converted']['society_name'];
		$closing_debit=$data['trial_balance_converted']['closing_debit'];
		$closing_credit=$data['trial_balance_converted']['closing_credit'];
		$date=$data['trial_balance_converted']['date'];
			if($closing_debit==$closing_credit){
				$status="Ok";
			}else{
				$status="Not Ok";
			}
		?>
			<tr>
				<td ><?php echo $society_name; ?> </td>
				<td style="text-align: right;"><?php echo $closing_debit; ?></td>
				<td style="text-align: right;"><?php echo $closing_credit; ?></td>
				<td style="text-align: center;"><?php echo $status; ?></td> 
				
			</tr>
	<?php } ?>			
	</tbody>
</table>
</div>
<div id="test"></div>

<script>

$( document ).ready(function() {
	
	$(".send_email").click(function(){
		$('table').attr('border', '1');
		$("#report").show();
		var mes=$("#send_data").html();
		var mes = encodeURIComponent(mes);
		$('table').attr('border', '0');
		$("#report").hide();
		$.ajax({
		url: "trial_balance_report_send_email?con="+mes,
		type: 'POST',
		dataType: 'json'
	}).done(function(response){
		//$("#test").html(response);
		if(response=="SEND"){
				change_page_automatically("<?php echo $webroot_path; ?>Hms/trial_balance_report_society_wise");
			}
	 });
	});
	
});


</script>